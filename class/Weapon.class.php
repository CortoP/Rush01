<?php

abstract class Weapon
{
	protected $_loads;
	protected $_small_scope;
	protected $_medium_scope;
	protected $_large_scope;
	Protected $_actionField;

	function getLoads()
	{
		return $this->_loads;
	}

	function getMediumScope()
	{
		return $this->_medium_scope;
	}

	function getSmallScope()
	{
		return $this->_small_scope;
	}

	function getLargeScope()
	{
		return $this->_large_scope;
	}

	function setLoads($loads)
	{
		$this->_loads = $loads;
	}

	function setSmallScope($small_scoppe)
	{
		$this->_small_scope = $small_scoppe;
	}

	function setMediumScope($medium_scope)
	{
		$this->_medium_scope = $medium_scope;
	}

	function setLargeScope($large_scope)
	{
		$this->_large_scope = $large_scope;
	}

	function addLoads($loads)
	{
		$this->_loads += $loads;
	}
}

?>