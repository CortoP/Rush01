<?php

require_once('JusticarStorm.class.php')

class ImperialGuardJusticarStorm extends JusticarStorm
{
	protected $color = 'red';

	public function __construct()
	{
		$this->setColor(self::$color);
		return;
	}
}

?>
