<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include("../../config/db.php");
include("../../model/image.php");

$db = new db();
$connect = $db->connect();

$get_id = $_GET['image_id'];

$image = new Image($connect);
$image->image_id = isset($get_id) ? $get_id : die();

$image->read_id();

$image_items = array(
    'image_id' => $image->image_id,
    'image_url' => $image->image_url
);
print_r(json_encode($image_items));

?>