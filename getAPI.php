<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        // for(const i in obj){
        //     //console.log(obj[i].image_url);
        //     const url = obj[i].image_url;
        //     let para = document.createElement('img').setAttribute('src',url);
        // }
        const url = obj[0].image_url;
        let para = document.createElement('img').setAttribute('src',url);
        
    }   
</script>