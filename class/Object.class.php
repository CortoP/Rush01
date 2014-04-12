<?PHP
class Obj
{
	public $face;
	private $_long;
	private $_wide;
	private $_orientation;
	private $_location;

	public $list = array();

	public function setLoc(array $kwargs)
	{
		$this->_location['x'] = $kwargs['x'];
		$this->_location['y'] = $kwargs['y'];
	}

	public function getX() {return $this->_location['x'];}
	public function getY() {return $this->_location['y'];}
	public function setX($x) {$this->_location['x'] = $x;}
	public function setY($y) {$this->_location['x']= $y;}
}

/*class Ship extends Obj{
	public $type = 0;
	public $name = "chips";

	public function __construct(array $kwargs)
	{
		if (array_key_exists('orientation', $kwargs))
			$this->_orientation = $kwargs['orientation'];
		$this->type = $kwargs['type'];
		if ($this->type == 0)
		   	$this->_destroyer();
		if ($this->type == 1)
			$this->_imperator();
		echo "Constructing $this->_orientation \n";
	}

	public function getLong() {return $this->_long;}
	public function getWide() {return $this->_wide;}
	public function getOr() {return $this->_orientation;}

	private function _destroyer()
	{
		$this->face = 'D';
		$this->_long = 3;
		$this->_wide = 1;
		$name = "Destroyer";
	}

	private function _imperator()
	{
		$this->face = 'I';
		$this->_long = 7;
		$this->_wide = 2;
		$name = "Imperator";
	}
}*/

class Asteroide extends Obj{
	private $_name = "Asteroide";
	public function __clone()
	{
		$this->_wide = mt_rand(1,2);
		$this->_long = $this->_wide;
		$this->face = '@';
		$this->_orientation = 1;
	}

	public function getLong() {return $this->_long;}
	public function getWide() {return $this->_wide;}
	public function getOrientation() {return $this->_orientation;}
	public function getName(){return $this->_name;}
}

class Station extends Obj{
	private $_name = "Station";
	public function __clone()
	{
		$this->_wide = mt_rand(4,8);
		$this->_long = mt_rand(4,9);
		$this->face = '$';
		$this->_orientation = 1;
	}

	public function getLong() {return $this->_long;}
	public function getWide() {return $this->_wide;}
	public function getOrientation() {return $this->_orientation;}
	public function getName(){return $this->_name;}
}

?>
