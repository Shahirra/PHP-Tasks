<?php
require "dbcon.php"; 
require "code.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Get your code at fontawesome.com-->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </head>
  <body>
    <div class="container mt-5">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Users Details
                            <a href="user-create.php" class="btn btn btn-dark float-end">Add New User</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><center>#</center></th>
                                    <th><center> Name</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Gender</center></th>
                                    <th><center>Mail Status</center></th>
                                    <th><center>Action</center></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM users";
                                $query_run = mysqli_query($con,$query);

                                if(mysqli_num_rows($query_run) > 0 ){

                                    foreach($query_run as $user){
                                        ?>
                                         <tr>
                                            <td><center><?= $user['id']; ?></center></td>
                                            <td><center><?= $user['name']; ?></center></td>
                                            <td><center><?= $user['email']; ?></center></td>
                                            <td><center><?= $user['gender']; ?></center></td>
                                            <td><center><?= $user['agree']; ?></center></td>
                                            <td>
                                                <center>
                                                    <a href="user-view.php?id=<?= $user['id'] ?>"><i class="fa fa-eye" ></i></a> &nbsp;
                                                    <a href="user-edit.php?id=<?= $user['id'] ?>"><i class="fa fa-edit"></i></a> &nbsp; 
                                                    <form action="code.php" method="POST" class="d-inline">
                                                      <button name="delete-btn" style="border: none; " value = "<?= $user['id'] ?>"class="fa fa-trash" ></button>
                                                    </form>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                    }

                                }else{
                                    echo "<h5> No Record Found</h5>";
                                }

                                ?>

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>