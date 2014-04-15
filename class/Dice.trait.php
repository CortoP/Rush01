<?PHP


trait Dice
{
	function roll()
	{
		$d = mt_rand(1, 6);
		echo "#You rooled the dice and get a beautifull $d\n#";
		return $d;
	}
}


?>
