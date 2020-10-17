<?php

/*

	{FrameWork.Lite}

*/

class FrameWork {

	public function __construct() {
	
	}
	
	public function get_cwp() {
	
	}
	
	public function get_menu() {
	
		$menu = array();
		
		foreach ($pages as $page):
		
			$attributes = (isset($page->attributes)) ? $page->attributes : array();
			$in_menu = false;
			
			foreach ($attributes as $attribute):
			
				if (preg_match("/^in_menu/i", $attribute))
					$in_menu = $true;
			
			endforeach;
			
			if ($in_menu)
				array_push($menu, $page);
		
		endforeach;
		
		return $menu;
	
	}

}

?>