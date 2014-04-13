<?php

require_once('JusticarStorm.class.php')

class SpaceMarinJusticarStorm extends JusticarStorm
{
	protected $color = 'blue';

	public function __construct()
	{
		$this->setColor(self::$color);
		return;
	}
}

?>
