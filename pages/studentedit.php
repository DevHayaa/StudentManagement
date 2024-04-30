<?php
include "connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudentManagement</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
margin-top:50px;
}

@media only screen and (max-width: 600px) {
  .firstLine{
font-size: 20px;
}
}
    </style>

 <!-- Fetching student data based on the provided student_id -->
<?php
        $q = "SELECT * FROM student WHERE id = '".$_GET['student_id']."'";
        $res = mysqli_query($con,$q);
        $data = mysqli_fetch_array($res);
        ?>
<!--Div for Background-->
<div class="bg text-center"> 
<div class="centered">
 
 <p class="firstLine mt-6"> U &nbsp; P &nbsp; D &nbsp; A  &nbsp; T &nbsp; E </p>
 
<form method = "POST" enctype="multipart/form-data">
  <input class="InputStyle form-control" name="name" value = "<?php echo $data ['name']?>"  placeholder="Enter your name" type="text">
  <br>
  <input class="InputStyle form-control" name="age" value = "<?php echo $data ['age']?>" placeholder="Enter your age" type="text">
  <br>
  <input class="InputStyle form-control" name="roll_no" value = "<?php echo $data ['roll_no']?>" placeholder="Enter your roll_No" type="text">
  <br>
    <select name="country_id" class="form-control"  id="country_id" onchange="getCountry(this.value)">
        <option value="<?php echo $data ['country_id']?>">Select country</option>
        <?php
        $sql = "SELECT * FROM country";
        $result = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($result)) {
      ?>
      <option value="<?php echo $data["id"] ?>"><?php echo $data["name"] ?></option>
      <?php
        }
        ?>
     </select>
  <br>
  <select name="city_id"  class="form-control"  id="city_id">
        <option value="">Select city</option>
   </select>
  <br>
  <!-- <img src="<?php echo $data['image']?>" alt="" height="50px" width="50px" srcset=""> -->
  <input class="InputStyle form-control" name="image" placeholder="Insert image" type="file">
  <br>
  <button type="submit" name = "update" class="btn btn-primary mt-3">Update</button>
  </form>
  </div>
</div>

<!-- Handling the form submission for updating student data -->
<?php   
    if(isset($_POST['update'])){
      $student_name = $_POST['name'];
      $age = $_POST['age'];
      $roll_no = $_POST['roll_no'];
      $country_id = $_POST['country_id'];
      $city_id = $_POST['city_id'];
      $fileName= $_FILES['image']['name'];
      $tmpName = $_FILES['image']['tmp_name'];
      $location = "../assets/images";
      $saveImage = $location.time().$fileName;
      move_uploaded_file($tmpName, $saveImage);
      $q= "UPDATE student SET `name` = '".$student_name ."', age = '".$age."', roll_no = '".$roll_no."', country_id = '".$country_id."', city_id = '".$city_id."', image = '".$saveImage."' WHERE id = '".$_GET['student_id']."' ";
     $result = mysqli_query($con,$q);

     if($result){
      echo '<script>window.location.href = "student.php";</script>';
      // header("Location: student.php");
      
  }
}

    ?>

    
    <!-- Script to get cities based on selected country -->
    <script>
  function getCountry() {
    var country_id = $("#country_id option:selected").attr('value');
 

    $.ajax({
        type: "POST",
        url: "studentedit.php",
        cache:false,
        data: "country_id="+country_id , 
        success: function (response) {
            $("#city_id").html(response);
        }
    });
}

</script>

<?php
if(isset($_POST['country_id'])){
    $country_id = $_POST['country_id'];
    $sql = 'SELECT * FROM city where country_id = "'.$country_id.'"';
    $result = mysqli_query($con,$sql);
    while($data = mysqli_fetch_array($result)){
        ?>
        <option value="<?php echo $data['id']?>"><?php echo $data["name"]?></option>
        <?php
    }
} 
?>

    <script src="../assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></>
  </body>
</html>