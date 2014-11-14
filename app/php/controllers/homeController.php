<?php

class homeController{

	public function show(){
		$data = array(
				'metaData' => array(
						'description' => "Ziara is a (very basic) trip planner I made in order to plan my personal journey to canada in 2015. Ziara is Swahili for tour."
					)
			);
		return new View('app.home', $data);
	}

}