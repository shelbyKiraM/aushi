<?php require_once("includes/processing.php");
include("templates/head.php");
include("templates/header.php");
include("templates/navigation.php");
include("templates/page.php");
include("templates/footer.php");
render($content);
print_r(get_defined_vars());
?>