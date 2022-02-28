<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hình ảnh</title>
</head>
<body>
<form action="content.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<form method="post" action="imageRequest.php" enctype="multipart/form-data">
 Nhập ID cần tìm:
 <input type="input" name="image_id" id="image_id" >
 <input type="submit" value="Search" name="submit">
</form>
<p>Đây là commit git</p>
</body>
</html>



<script type="text/javascript">
    $.ajax(    
        {
            type:'GET',
            url:'imageRequest.php',
            data:$(this).serialize(),
            success:function(data)
            {
                alert('AJAX call was successful!');
                //alert('Data from the server' + data);
                showdata(data);
                document.body.onload = showdata(data);
            },
            error:function()
            {
                alert('There was some error performing the AJAX call!');
            }
            
        }
    )
    function showdata(data)
    {
        const obj = JSON.parse(data);
        for(const i in obj){
            console.log(obj[i].image_url);
            const para = document.createElement('img');
            para.setAttribute("width","200px");
            para.setAttribute("height","300px");
            //document.getElementById('image_source').src = obj[i].image_url;
        }
        
    }
    
    
</script>
<!-- <img id="image_source" width="200px" height="300px" /> -->

<?php

include('imageRequest.php');
include('getAPI.php');
include'footer.php';

?>
