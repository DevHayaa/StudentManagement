<?php

include '../connection.php';

if(isset($_GET['student_id'])){
    $stu_id = $_GET['student_id'];

    $q= "DELETE FROM student WHERE id = '".$stu_id."' ";

    // echo $q;die;
    $res = mysqli_query($con ,$q);
    if($res){
        header("Location: ../student.php");
    }


}

?>