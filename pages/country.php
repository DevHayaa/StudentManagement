<?php
include "connection.php"
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudentManagement</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
       <!-- Query to select all country -->
    <?php
     $sql = "SELECT * FROM country ";
     $result = mysqli_query($con,$sql);
    ?>
 <div class="container mx-auto my-5 d-flex justify-content-center">
 <a class="btn btn-success add shadow-sm" href="addcountry.php">Add Country here <i class="fa fa-plus" ></i></a>
</div>
 <div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title">Data <span>List</span></h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                                <th>Name</th>
                                <th>Contenant</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       <!-- Looping through each row of data fetched from the database -->
                    <?php
                    while($data=mysqli_fetch_array($result)){           

                    ?>
                            <tr>
                              <th scope="row"><?php echo $data['id']?></th>
                                <td><?php echo $data['name']?></td>
                                <td><?php echo $data['contenant']?></td>
                                <td>
                                    <ul class="action-list">
                                        <li><a href="./edit/country.php?country_id=<?php echo $data['id']?>" data-tip="edit"><i class="fa fa-edit" style="color:blue"></i></a></li>
                                        <li><a href="delete/country.php?country_id=<?php echo $data['id']?>" data-tip="delete"><i class="fa fa-trash" style="color:red"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            <?php 
    }
    ?>   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="../assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></>
  </body>
</html>