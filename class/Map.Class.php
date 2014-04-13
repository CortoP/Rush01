<?PHP
require_once 'Object.class.php';
require_once 'JusticarStorm.class.php';
Class Map{

	private $_map;
	private $_id;
	private $_obstacles;
	private $_zone = array(1 => array('rowMin' => 20, 'rowMax' => 80, 'colMin' => 5, 'colMax' => 30)
		, 2 => array('rowMin' => 70, 'rowMax' => 95, 'colMin' => 25, 'colMax' => 125)
		, 3 => array('rowMin' => 20, 'rowMax' => 80, 'colMin' => 120, 'colMax' => 145)
		, 4 => array('rowMin' => 5, 'rowMax' => 30, 'colMin' => 25, 'colMax' => 125));

	public static $verbose = FALSE;

	public function __construct(array $kwargs)
	{
		$this->_map = array_fill(0,100,array_fill(0,150,0));
		$this->_obstacles[] = new Asteroide();
		$this->_obstacles[] = new Station();
		$this->_id[0] = 'bh';
		$this->putShips($kwargs['p1'], 1);
		$this->putShips($kwargs['p2'], 3);
		if (array_key_exists('p3', $kwargs))
			$this->putShips($kwargs['p3'], 4);
		if (array_key_exists('p4', $kwargs))
			$this->putShips($kwargs['p4'], 2);
		$this->setObstacles();
	}

	private function setObstacles()
	{
		for($i = 0; $i < 15; $i++)
		{
			$obj = clone $this->_obstacles[0];
			do{
				$row = mt_rand(0, 100);
				$col = mt_rand(0, 150);
				$touch = $this->_touch($obj, $row, $col);
			}
			while ($touch != 0);
			$this->_addObj($obj, $row, $col);
		}
		for($i = 0; $i < 7; $i++)
		{
			$obj = clone $this->_obstacles[1];
			do{
				$row = mt_rand(0, 100);
				$col = mt_rand(0, 150);
				$touch = $this->_touch($obj, $row, $col);
			}
			while ($touch != 0);
			$this->_addObj($obj, $row, $col);
		}

	}

	private function putShips($ply, $or)
	{
		$i = 0;
		while (($ship = $ply->getShip($i)) !== -1)
		{
			$ship->setOrientation($or);
			do{
				$row = mt_rand($this->_zone[$or]['rowMin'], $this->_zone[$or]['rowMax']);
				$col = mt_rand($this->_zone[$or]['colMin'], $this->_zone[$or]['colMax']);
				$touch = $this->_touch($ship, $row, $col);
			}
			while ($touch != 0);
			$ship->setX($col);
			$ship->setY($row);
			$this->_addObj($ship, $row, $col);
			$i++;
		}
	}

	private function _addObj($obj, $row, $col)
	{
		$this->_id[++$this->_count] = $obj;
		$long = $obj->getLong();
		$wide = $obj->getWide();
		if ($obj->getOrientation() % 2 == 0)
		{
			$tmp = $long;
			$long = $wide;
			$wide = $tmp;
		}
		$row -= $wide / 2;
		$col -= $long / 2;
		$wide = $wide + $row;
		$long = $long + $col;
		$i = $col;
		for ($row; $row < $wide; $row++)
		{
			$col = $i;
			for ($col; $col < $long; $col++)
			{
				$this->_map[$row][$col] = $this->_count;
			}
		}

	}

	public function fire($id, $range)
	{
		$obj = $this->_id[$id];
		$i = 1;
		if ($obj->getOrientation() > 2)
			$i = -1;
		$row = $obj->getY();
		$col = $obj->getX();
		if ($obj->getOrientation() % 2 == 0)
		{
			echo "dans premier if\n";
			$row += (($obj->getLong() / 2 ) + 1) * $i;
			$range += $row * $i;
			while ($row != $range)
			{
				if ($this->_map[$row][$col] != 0)
				{
					echo "Jai Touchaaaiioo\n";
					printf("row:%d  col:%d\n", $row, $col);
					$ret = $this->_map[$row][$col];
					$this->_map[$row][$col] = 42;
					return $ret;
				}
				$row++;
			}
			$row--;
		}
		else
		{
			$col += (($obj->getLong() / 2) + 1) * $i;
			$range += $col * $i;
			while ($col != $range)
			{
				if ($this->_map[$row][$col] != 0)
				{
					$ret = $this->_map[$row][$col];
					$this->_map[$row][$col] = 42;
					return $ret;
				}
				$col++;
			}
			$col--;
		}
		$this->_map[$row][$col] = 42;
		return 0;
	}

	private function _touch($obj, $row, $col)
	{
		$long = $obj->getLong();
		$wide = $obj->getWide();
		if ($obj->getOrientation() % 2 == 0)
		{
			$tmp = $long;
			$long = $wide;
			$wide = $tmp;
		}
		$row -= $wide / 2;
		$col -= $long / 2;
		$wide = $wide + $row;
		$long = $long + $col;
		if ($row < 0 || $col < 0)
			return 1;
		$i = $col;
		for ($row; $row < $wide; $row++)
		{
			$col = $i;
			for ($col; $col < $long; $col++)
			{
				if ($row > 99 || $col > 149)
					break ;
				if ($this->_map[$row][$col] != 0)
					return $this->_map[$row][$col];
			}
		}
		return 0;
	}

	public function htmlize()
	{
		echo '<div id="map">';
		for ($row = 0; $row < 100; $row++)
		{
			echo '<div class="line">';
			for ($col = 0; $col < 150; $col++)
			{
				if ($this->_map[$row][$col] == 0)
					echo '<div class="square empty"></div>';
				else if ($this->_map[$row][$col] == 42)
					echo '<div class="square touched"></div>';
				else
					$this->htmlObj($this->_id[$this->_map[$row][$col]]);
			}
			echo '</div>';
		}
		echo '</div>';
	}
	public function htmlObj($obj)
	{
		echo '<div class="square object ';
		echo $obj->getName();
		echo ' '.$obj;
		echo '">';
		if ($obj instanceof Ship)
		{
			if ($obj->getState() == 'inactive')
				inactive($obj);
		}
		echo '</div>';
	}

function inactive($obj)
{
?>
<div class="info">
<h3 class="name"><?PHP echo $obj->getName()?></h3>
<h4>PV:<?PHP echo $obj->getPV()?></h4>
<h4>PP:<?PHP echo $obj->getPP()?></h4>
<h4>Speed:<?PHP echo $obj->getSpeed()?></h4>
<h4>Shield:<?PHP echo $obj->getShield()?></h4>
<h4>Weapon:<?PHP echo $obj->getWeapons()->getName()?></h4>
<h4>X:<?PHP echo $obj->getX()?></h4>
<h4>Y:<?PHP echo $obj->getY()?></h4>
</div>

<?PHP
}



	public function __toString()
	{
		for ($row = 0; $row < 100; $row++)
		{
			if ($row != 0)
				$str = $str.PHP_EOL;
			for ($col = 0; $col < 150; $col++)
			{
				if ($this->_map[$row][$col] == 0)
					$str = $str.".";
				else if ($this->_map[$row][$col] == 42)
					$str = $str."X";
				else
					$str = $str.$this->_map[$row][$col];
			}
		}
		$str = $str.PHP_EOL;
		return $str;
	}
}
?>
