<?php
/**
 * Processing Core
 *
 * @author Shelby Munsch
 * @version Pre-Alpha (0.1)
 * @copyright Shelby Munsch, 29 April, 2012
 * @package default
 **/

require_once("includes/class.php");
require_once("includes/config.php");

/**
 * processor
 *
 * @package default
 * @author Shelby Munsch
 **/
// class processor
// {
	function render($content) {
		global $header;
		if ($header != "404"){
			foreach ($content as $part) {
				echo $part;
			}
		}
	}
	
	function buildPage($page, &$content) {
		if (isset($page)) {
			$content["page"] .=  "<h2>".$page->title."</h2>\n";
			$content["page"] .=  "<p>".$page->body."</p>\n";
		} else {
			global $header;
			$header = "404";
			header('HTTP/1.0 404 Not Found', true, 404);
			echo $content["head"];
			echo "<h1>404 Not Found</h1>";
			echo $content["close"];
		}
	}
// } // END class 

?>