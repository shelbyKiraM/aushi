<?php
/**
 * Configuration
 *
 * @author Shelby Munsch
 * @version Pre-Alpha (0.1)
 * @copyright Shelby Munsch, 29 April, 2012
 * @package default
 **/

/**
 * configuration class
 *
 * @package default
 * @author Shelby Munsch
 **/
//class config
//{
	$content[] = "";
	$data_directory = "/Users/user/github/aushi/data/"; # contains pages and other files
	$site_title = "Shelby's Shit";
	$data_dir = directoryToArray($data_directory, false);
	$pages = getPages($data_dir);
	
	
	/**
	 * directoryToArray
	 *
	 * @param string $directory The dir to search
	 * @param string $recursive Whether to recurse the dir
	 * @return array
	 * @author Shelby Munsch
	 */
	function directoryToArray($directory, $recursive)
	{
		$array_items = array();
		if ($handle = opendir($directory)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					if (is_dir($directory. "/" . $file)) {
						if($recursive) {
							$array_items = array_merge($array_items, directoryToArray($directory. "/" . $file, $recursive));
						}
						$file = $directory . "/" . $file;
						$array_items[] = preg_replace("/\/\//si", "/", $file);
					} else {
						$file = $directory . "/" . $file;
						$array_items[] = preg_replace("/\/\//si", "/", $file);
					}
				}
			}
			closedir($handle);
		}
		return $array_items;
	}
	function addStylesheet($stylesheet, &$content) {
		if (file_exists(str_replace($SCRIPT_NAME, "", $SCRIPT_FILENAME)."../css/".$stylesheet)) {
			$content["head"] .= '<link rel="stylesheet" href="css/'.$stylesheet.'">';
			return 1;
		}
	}
	/**
	 * getPages
	 *
	 * @return array
	 * @author Shelby Munsch
	 **/
	function getPages($files)
	{
		foreach ($files as $file) {
			$page = new post($file);
			if($page->isLoaded) {
				$pages[$page->name] = $page;
			}
			unset($page);
		}
		return $pages;
	}
	
// } // END class 

?>