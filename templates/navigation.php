<?
$content["nav"] .= "<nav>\n<ul>\n";
foreach ($pages as $page) {
	$content["nav"] .= "<li><a href=\"".$page["link"]."\">".$page["title"]."</a></li>\n";
}
$content["nav"] .= "</ul>\n</nav>\n";
?>