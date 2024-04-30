<?php

include '../connection.php';

if(isset($_GET['country_id'])){
    $cont_id = $_GET['country_id'];

    $q= "DELETE FROM country WHERE id = '".$cont_id."' ";

    // echo $q;die;
    $res = mysqli_query($con ,$q);
    if($res){
        header("Location: ../country.php");
    }


}

?>