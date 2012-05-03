<?php
/**
 * Classes
 *
 * @author Shelby Munsch
 * @version Pre-Alpha (0.1)
 * @copyright Shelby Munsch, 30 April, 2012
 * @package default
 **/

/**
 * post class
 *
 * @package default
 * @author Shelby Munsch
 **/
class post
{
	public $body, $name, $title, $link, $isLoaded = false;
	
	public function __construct($file) {
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		if ($ext == "page") {
			$this->name = str_replace(".".$ext, "", pathinfo($file, PATHINFO_BASENAME));
			$this->link = $this->name;
			$contents = @file($file) or die("dicks");
			$this->body = "";
			foreach ($contents as $id => $line) {
				if ($id == 0) {
					$this->title = str_replace(array("\r\n", "\n", "\r"), "", $line);
				} else {
					$this->body .= str_replace(array("\r\n", "\n", "\r"), "<br>\n", $line);
				}
			}
			$this->isLoaded = true;
		}
	}
	
	public function link() {
		return "<li><a href=\"".$this->link."\">".$this->title."</a></li>\n";
	}
} // END class 
