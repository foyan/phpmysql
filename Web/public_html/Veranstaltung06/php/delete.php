<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("item.php");
require_once("context.php");

$id = $_REQUEST["id"];

$context = new Context();

$item = $context->find($id);

$context->delete($item);

header("Location: index.php");

?>
