<?php 
session_start(); 
?>
<!doctype html>
<html lang="en">
  <head>
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
                        <h4> User Registeration Form
                            <a href="index.php" class="btn btn btn-dark float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method= "POST">
                            <p>Please fill this form and submit to add user record to the database.</p>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                             <div class="mb-3">
                                 <label>Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>

                             <div class="mb-3">
                                <label>Gender</label>
                                <br>
                                <!-- <input type="radio" id="male" name="gender" value="Male" class="form-control">Male
                                <input type="radio" id="female" name="gender" value="Female" class="form-control">Female -->
                                <input class="form-check-input" type="radio" id="female" name="gender" value="female" required >
                                <label class="form-check-label">
                                    Female
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" id="male" name="gender" value="male" required>
                                <label class="form-check-label">
                                    Male
                                </label>
                            </div>

                             <div class="mb-3">
                                <input type="checkbox" name="ch-box" class="form-check-input">
                                <label class="form-check-label" for="defaultCheck">
                                    Recieve E-mails from us.
                                </label>
                            </div>

                             <div class="mb-3">
                                <input type="submit" name="submit-btn" value="Submit" class="btn btn-primary">
                                <input type="reset" name="cancel-btn" value="Cancel" class="btn btn-outline-secondary">
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>