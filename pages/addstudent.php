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
<div class="centered">
   <p class="firstLine mt-5"> F &nbsp; I &nbsp; L &nbsp; L  </p>
 
<form method = "POST" enctype="multipart/form-data">
  <input class="InputStyle form-control" name="name" required placeholder="Enter your name" type="text">
  <br>
  <input class="InputStyle form-control" name="age" required placeholder="Enter your age" type="text">
  <br>
  <input class="InputStyle form-control" name="roll_no" required placeholder="Enter your roll_No" type="text">
  <br>
  <select name="country_id" class="form-control" required id="country_id" onchange="getCountry(this.value)">
  <option value="">Select country</option>
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
  <select name="city_id" id="city_id" class="form-control" required   >
        <option value="">Select city</option>
   </select>
  <br>
  <input class="InputStyle form-control"  name="image" required name="name" placeholder="Insert image" type="file">
  <br>
  <button type="submit" name = "insert" class="btn btn-primary mt-3">Submit</button>
  </form>
  </div>
</div>

<?php
 // Inserting data into the database after form submission   
    if(isset($_POST['insert'])){
      $student_name = $_POST['name'];
      $age = $_POST['age'];
      $roll_no = $_POST['roll_no'];
      $country_id = $_POST['country_id'];
      $city_id = $_POST['city_id'];
      $fileName= $_FILES['image']['name'];
      $tmpName = $_FILES['image']['tmp_name'];
      $location = "../assets/images/";
      $saveImage = $location.time().$fileName;
      move_uploaded_file($tmpName,$saveImage);
      $q = "INSERT INTO student(`name`,`age`,roll_no,country_id,`city_id`,`image`)
      VALUES ('".$student_name."' , '".$age."', '".$roll_no."' , '".$country_id."' , '".$city_id."'  , '".$saveImage."')";

     $result = mysqli_query($con,$q);

     if($result){
      header("Location: student.php");
  }

    }
    ?>

<!-- Script to get cities based on selected country -->
<script>
  function getCountry() {
    var country_id = $("#country_id option:selected").attr('value');
 

    $.ajax({
        type: "POST",
        url: "addstudent.php",
        cache:false,
        data: "country_id="+country_id , 
        success: function (response) {
            $("#city_id").html(response);
        }
    });
}
</script>

<!-- Fetching cities based on selected country -->
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