<?php

class View{

	public $type;
	public $name;
	public $args;

	function __construct( $name, $args = array() ){
		$aName = explode(".", $name);
		$this->type = "view";
		$this->layout = $aName[0];
		$this->view = $aName[1];
		$this->args = $args;
	}

}