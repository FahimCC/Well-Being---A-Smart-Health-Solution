<?php
    $con = mysqli_connect("localhost","root","","well_being");
    
    if(mysqli_connect_error()){
        ?> <script>
alert("Connection Faild");
</script>
<?php die("Connection Faild".mysqli_connect_error()); 
}else{
    ?> <script>
// alert("Connection Successful");
</script>
<?php
}
?>