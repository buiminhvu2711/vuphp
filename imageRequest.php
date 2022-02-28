

<?php

include("imageResourcesDAO.php");

if(empty($_POST['image_id'])==false)
{
    $_GET['image_id'] = $_POST['image_id'];
}

if(isset($_GET['image_id'])==NULL)
{
    $viva = new imageResources();
    $viva->getAllImageResource();
}
else
{
    $image_id = $_GET['image_id'];
    if(empty($image_id)==false)
    { 
        $img_id =  new imageResources();
        $img_id->getIDImage($image_id);
    }
    else
    {
        $viva = new imageResources();
        $viva->getAllImageResource();
    
    }
}
?>