<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include("../../config/db.php");
include("../../model/image.php");

$db = new db();
$connect = $db->connect();


$image = new Image($connect);
$read = $image->read();

$num = $read->rowCount();
if($num>0)
{
    $image_arr = [];
    $image_arr['Image'] = [];

    while($row =$read->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        $image_items = array(
            'image_id' => $image_id,
            'image_url' => $image_url
        );
        array_push($image_arr['Image'],$image_items);

    }
    echo json_encode($image_arr);

}

$image = new Image($connect);
$read = $image->read_id();


?>