<?php

/*

	{FrameWork.Lite}
	
	initialize {FrameWork.Lite} in your index.php file
		$fw = new FrameWork($config);
	
	$fw->get_cwp();
	
	$fw->get_menu("main_menu");

*/

class FrameWork {

	public function __construct($config = null) {
	
		$this->config = $config;
		
		$this->uri = get_uri();
	
	}
	
	public function get_cwp() {
	
		$config = $this->config;
		
		foreach ($pages as $page):
		
			if ($this->uri == $page['uri']):
			
				$cwp = $page;
			
			elseif ($this->uri == "default"):
			
				if (in_array("is_default", $page['attributes']))
					$cwp = $page;
			
			endif;
		
		endforeach;
		
		return $cwp;
	
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
	
	private function get_uri() {
	
		$config = $this->config;
		
		if (isset($config->framework['use_clean_urls'])):
		
		else:
		
			if (isset($_GET['page'])):
			
				$uri = $_GET['page'];
			
			else:
			
				$uri = "default";
			
			endif;
		
		endif;
		
		$this->uri = $uri;
	
	}

}

?>