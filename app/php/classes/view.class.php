<?php

class View{

	public $type;
	public $name;
	public $args;

	function __construct( $name, $args = array() ){
		$this->type = "view";
		$this->name = $name;
		$this->args = $args;
	}

}