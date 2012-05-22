<?
$content["page"] .= "<article>\n";
buildPage($pages[$_GET['item']], $content);
$content["page"] .= "</article>\n";
?>