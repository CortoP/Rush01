<?php

require_once('HammerOfRighteous.class.php');

class FetishitsOrksHammerOfRighteous extends HammerOfRighteous
{
	protected $color = 'pink';

	public function __construct ()
	{
		$this->setColor(self::$color);
		return;
	}
}

?>
