<?php

/*

	{FrameWork.Lite}
	
	initialize {FrameWork.Lite} in your index.php file
		$fw = new FrameWork($config);
	
	$fw->get_menu("main_menu");

*/

class FrameWork {

	public function __construct($config = null) {
	
		$this->config = $config;
	
	}
	
	public function get_cwp() {
	
	}
	
	public function get_menu($id = null) {
	
		$menu = array();
		
		foreach ($pages as $page):
		
			$attributes = (isset($page->attributes)) ? $page->attributes : array();
			$in_menu = false;
			
			if (!is_null($id)):
			
				$attribute = "in_menu:" . $id;
				
				if (in_array($attribute, $attributes))
					$in_menu = true;
			
			else:
			
				foreach ($attributes as $attribute):
				
					$regex = "/^in_menu/i";
					
					if (preg_match($regex, $attribute))
						$in_menu = $true;
				
				endforeach;
			
			endif;
			
			if ($in_menu)
				array_push($menu, $page);
		
		endforeach;
		
		return $menu;
	
	}

}

?>