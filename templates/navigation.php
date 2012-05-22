<?
$content["nav"] .= "<nav>\n<ul>\n";

foreach ($pages as $page) {
	$content["nav"] .= $page->link();
}
unset($page);
$content["nav"] .= "</ul>\n</nav>\n";
?>