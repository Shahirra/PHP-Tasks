<?php 
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <title>User View</title>
  </head>
  <body>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> User View Details
                            <a href="index.php" class="btn btn btn-dark float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            if(isset($_GET['id'])){
                                $user_id = mysqli_real_escape_string($con,$_GET['id']);
                                $query = "SELECT * FROM users WHERE id = '$user_id' ";
                                $query_run = mysqli_query($con,$query);

                                if(mysqli_num_rows($query_run) > 0 ){
                                    $user = mysqli_fetch_array($query_run);
                                    ?>
                            
                                        <form action="code.php" method= "POST">
                                            <div class="mb-3">
                                                <label style="font-weight: bold;">Name</label>
                                                <p class="">
                                                    <?= $user['name']; ?>  
                                                </p>
                                            </div>

                                            <div class="mb-3">
                                                <label style="font-weight: bold;"> Email</label>
                                                 <p class="">
                                                    <?= $user['email']; ?>  
                                                </p>
                                            </div>

                                            <div class="mb-3">
                                                <label style="font-weight: bold;">Gender</label>
                                                <br>
                                                 <p class="">
                                                    <?php if($user['gender'] == 'female'){ 
                                                        echo "Female";
                                                     }else{
                                                        echo "Male";

                                                     } 
                                                     ?>
                                                </p>
                                            </div>

                                            <div class="mb-3">
                                                 <p class="">
                                                    <?php if($user['agree'] == 'yes'){ 
                                                        echo "you will reciceve e-mails from us";
                                                     }else{
                                                        echo "you won't recieve e-mails from us";

                                                     } 
                                                     ?>
                                                    
                                                </p>
                                            </div>

                                            


                                        </form>
                                    <?php
                                }else{
                                     echo "<h5> No Such Id Found</h5>";
                                    }
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>