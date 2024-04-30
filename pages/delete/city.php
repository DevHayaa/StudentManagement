<?php

include '../connection.php';

if(isset($_GET['city_id'])){
    $city_id = $_GET['city_id'];

    $q= "DELETE FROM city WHERE id = '".$city_id."' ";

    // echo $q;die;
    $res = mysqli_query($con ,$q);
    if($res){
        header("Location: ../city.php");
    }


}

?>