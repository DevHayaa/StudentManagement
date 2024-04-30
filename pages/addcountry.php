<?php
include "connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudentManagement</title>
    <link rel="stylesheet" href="../assets/css/style">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    



<!--Div for Background-->

<div class="bg text-center">

<!--Div for Centered Text & Input--> 
<div class="centered">
 
   <p class="firstLine mt-5"> F &nbsp; I &nbsp; L &nbsp; L  </p>
 
<form method = "POST" enctype="multipart/form-data">
  <input class="InputStyle form-control" name="name" required placeholder="Enter your country name" type="text">
  <br>
  <input class="InputStyle form-control" name="contenant" required placeholder="Enter your contenant" type="text">
  <br>
  <button type="submit" name = "insert" class="btn btn-primary mt-3">Submit</button>
  </form>
  </div>
</div>

<?php
    
    if(isset($_POST['insert'])){
      $country_name = $_POST['name'];
      $contenant = $_POST['contenant'];
      $q = "INSERT INTO country(`name`,`contenant`)
      VALUES ('".$country_name."' , '".$contenant."')";

     $result = mysqli_query($con,$q);

     if($result){
      echo '<script>alert("Form submitted successfully!");</script>';
      header("Location: country.php");
  }

    }
    
    
    ?>

   
    <script src="../assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></>
  </body>
</html>