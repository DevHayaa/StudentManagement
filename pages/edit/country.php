<?php
include "../connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudentManagement</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <style>
        .bg{
    width: 100%;
    height:auto;
	min-height:100vh;
    background-image:url(http://i.imgur.com/w16HASj.png);
    background-size: 100% 100%;
    background-position: top center;
  }

  .content{
margin-top: 20%;
  }

  .centered {
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
}

input.InputStyle.form-control{
  border-radius: 25px;
  border: solid 1px white;
  background: transparent;
  width: 300px;
   padding: 10px 20px;
   color: white;
}

input#file-upload-button{
    border-radius: 25px;
    border: solid 1px white;
    background: transparent;
    width: 300px;
    padding: 10px 20px;
    color: white;
  }
  
select.form-control{
    border-radius: 25px;
    border: solid 1px white;
   background: transparent;
   width: 300px;
   color: white;
   padding: 10px 20px;
  }

  


input,input::-webkit-input-placeholder {
    font-size: 12px;
  color:white;
}

.social-btn{
 position: absolute; 
  bottom: 20px;
  left: 47%;
}

i{
 padding:5px;
  color:white;

}

input, input:focus{
  border: solid 1px white;
        outline:0; 
        -webkit-appearance:none;
        box-shadow: nones;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
}

.secondLine{
  font-weight: 350;
  font-size:15px;
  margin-bottom: 15%;
  color: white;

}

.firstLine{
font-size: 30px;
color: white;
}

@media only screen and (max-width: 600px) {
  .firstLine{
font-size: 20px;
}
}
    </style>


<?php
        $q = "SELECT * FROM country WHERE id = '".$_GET['country_id']."'";
        $res = mysqli_query($con,$q);
        $data = mysqli_fetch_array($res);
        ?>
<!--Div for Background-->

<div class="bg text-center">

<!--Div for Centered Text & Input--> 
<div class="centered">
 
   <p class="firstLine mt-6"> U &nbsp; P &nbsp; D &nbsp; A  &nbsp; T &nbsp; E </p>
 
<form method = "POST" enctype="multipart/form-data">
  <input class="InputStyle form-control" name="name" value = "<?php echo $data ['name']?>"  placeholder="Enter your name" type="text">
  <br>
  <input class="InputStyle form-control" name="contenant" value = "<?php echo $data ['contenant']?>" placeholder="Enter your age" type="text">
  <br>
    
  <button type="submit" name = "update" class="btn btn-primary mt-3">Update</button>
  </form>
  </div>
</div>

<?php
    
    if(isset($_POST['update'])){
      $country_name = $_POST['name'];
      $contenant = $_POST['contenant'];
      $q= "UPDATE country SET `name` = '".$country_name ."' , contenant = '".$contenant."'   WHERE id = '".$_GET['country_id']."' ";
      // echo $q;die;
     $result = mysqli_query($con,$q);

     if($result){
        header("Location: ../country.php");
     }

    }
    
    
    ?>
 
   

    <script src="../assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></>
  </body>
</html>