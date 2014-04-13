<?php

require_once('HammerOfRighteous.class.php');

class ImperialGuardHammerOfRighteous extends HammerOfRighteous
{
	protected $color = 'red';

	public function __construct ()
	{
		$this->setColor(self::$color);
		return;
	}
}

?>
