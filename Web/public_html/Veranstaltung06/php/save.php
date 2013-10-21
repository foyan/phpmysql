<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once("item.php");
require_once("context.php");

$id = $_POST["id"];
$text = $_POST["text"];
$state = isset($_POST["state"]) ? $_POST["state"] : "";

$context = new Context();

$item = null;
if ($id) {
    $item = $context->find($id);
} else {
    $item = new Item();
}

$item->text = $text;
if ($state == "state_done") {
    $item->done_date = time();
}
if ($state == "state_notdone") {
    $item->done_date = null;
}

$context->save($item);

header("Location: index.php");

?>
