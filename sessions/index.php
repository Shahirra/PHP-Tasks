<?php  
require 'config.php';
// Check if user is logged in
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $query = "SELECT * FROM signup WHERE id = $id";
    $run_query= mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($run_query);
    // User is logged in, display welcome message
    $username = $row["username"];

}else{
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        a:link, a:visited {
        background-color: #f44336;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        border-radius: 12px;
        }

        a:hover, a:active {
        background-color: red;
        }
</style>
</head>
<body>
    <div class="container">
        <p style="text-align:center; font-size: 30px;">  Hi,&nbsp;<b><?php echo $username ?> </b>. Welcome to our site.</p>
        <div  style="text-align: center">
            <img src="iti.jpg" alt="iti" width="1200px" height="550px"> 
        </div>
        <br><br>
        <div style="text-align: center;">
            <a href="logout.php">Sign Out of Your Account</a>

        </div>
        
    </div>
    
</body>
</html>