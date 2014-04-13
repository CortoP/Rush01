<?php

require_once('JusticarStorm.class.php')

class FetishitsOrksJusticarStorm extends JusticarStorm
{
	protected $color = 'pink';

	public function __construct()
	{
		$this->setColor(self::$color);
		return;
	}
}

?>
