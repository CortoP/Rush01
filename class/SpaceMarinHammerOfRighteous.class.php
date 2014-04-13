<?php

require_once('HammerOfRighteous.class.php');

class SpaceMarinHammerOfRighteous extends HammerOfRighteous
{
	protected $color = 'blue';

	public function __construct ()
	{
		$this->setColor(self::$color);
		return;
	}
}

?>
