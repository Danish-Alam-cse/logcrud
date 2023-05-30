<?php
    include "config.php";
    session_start();
    if(isset($_GET['del'])){
        $del = $_GET['del'];
        $query = mysqli_query($con,"delete from users where id='$del'");
        if($query){
            session_destroy();
            header("location: signup.php");
        }
        else{
            echo "bach gye bach gye";
        }
    }
?>