<?php

require_once('JusticarStorm.class.php')

class EldarsJusticarStorm extends JusticarStorm
{
	protected $color = 'green';

	public function __construct()
	{
		$this->setColor(self::$color);
		return;
	}
}

?>
