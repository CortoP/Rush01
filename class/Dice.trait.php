<?PHP


trait Dice
{
	function roll()
	{
		return mt_rand(1,6);
	}
}


?>