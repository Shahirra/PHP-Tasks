<?php 
    require 'config.php';
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $select_query = "SELECT * FROM signup WHERE username = '$username' ";
        $run_query = mysqli_query($con, $select_query );
        if(mysqli_num_rows($run_query) > 0 ){
            echo
            "<script>alert('username has already taken')</script> ";
        }else{
            if($password == $confirmPassword ){
                $insert_query = "INSERT INTO signup (username , password , confirm_password) VALUES ('$username' , '$password' , '$confirmPassword')";
                mysqli_query($con,$insert_query);
                echo "<script>alert('Registration Successful');</script>";
                echo "<script>window.location.href = 'login.php';</script>";
                exit();
            }else{
                echo
                "<script>alert('Password doesn't match')</script> ";
            }
        }

}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>Sign Up</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #2e9acc
        }

        .container {
            /* text-align: center; */
            border-radius: 12px;
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5);
            width: fit-content;
            padding: 20px;
            background-color: white;
        }
        form i {
            margin-left: -30px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><center>Sign Up</center></h2>
        <p>Please fill this form to create an account.</p>
        <form action="signup.php" method="post">
            <label >Username</label>
            <br>
            <input type="text" name="username" placeholder=" Please Enter Your Username" size="25" required><br><br>
            <label>Password</label>
            <br>
            <input type="password" name="password" id="password" placeholder="Please Enter Your Password" size="28" required>
            <i class="bi bi-eye-slash" id="togglePassword"></i><br><br>
            <label>Confirm Password</label>
            <br>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Please Re-enter Your Password" size="28" required>
            <i class="bi bi-eye-slash" id="toggleConfirmPassword"></i><br><br>

            <div style="text-align: center;">
                <button type="submit" name="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
            <p>Already have an account? <a href="login.php">Login here.</a></p>
        </form>
    </div>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        const toggleConfirmPassword =document.querySelector("#toggleConfirmPassword");
        const confirmPassword = document.querySelector("#confirmPassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
         toggleConfirmPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
            confirmPassword.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

    </script>
</body>
</html>