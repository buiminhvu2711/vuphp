<!DOCTYPE html>

<h1>Post to content.php</h1>
<form method="post" action="content.php">
    Name: <input type="text" name="fname">
    <input type="submit" value="Send">
</form>

<h1>Post to index.php</h1>
<form action="index.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

<?php
// if($_SERVER["REQUEST_METHOD"] == "POST")
// {
//     $name = $_REQUEST['fname'];
//     if(empty($name))
//     {
//         echo "Name is empty";
//     }
//     else
//     {
//         echo $name;
//     }  
// }
//echo "Study ".$_GET['subject']." at ".$_GET['web'];

//setcookie(name, value, expire, path, domain, secure, httponly);
//tên cookie, giá trị, hiệu lực,...



function GetImage()
{
    $targert_dir ="Style/";
    $target_file= $targert_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk =1 ;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"]))
    {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check!==false)
        {
            echo "File is an image - ".$check["mime"] . ".";
        }
        else{
            echo "File is not an image";
            $uploadOk = 0;
        }
    }
    
    if(file_exists($target_file))
    {
        echo "Sorry, file already exits.";
        $uploadOk = 0;
    }
    
    if($_FILES["fileToUpload"]["size"] > 5000000)
    {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    if($uploadOk == 0)
    {
        echo "Sorry, your file was not uploaded.";
    
    }else{
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
        {
            echo "The file" .htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "has been uploaded.";
            echo "<img width=500px height=500px src=".$target_file.">";
        }else{
            echo "Sorry, there was an error uploading your life.";
        }
    }
}



?>


</html>

