<?php

require_once('HammerOfRighteous.class.php');

class EldarsHammerOfRighteous extends HammerOfRighteous
{
	protected $color = 'green';

	public function __construct ()
	{
		$this->setColor(self::$color);
		return;
	}
}

?>
