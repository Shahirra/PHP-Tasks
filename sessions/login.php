<?php
    require 'config.php';
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $select_query = "SELECT * FROM signup WHERE username = '$username' ";
        $run_query = mysqli_query($con, $select_query );
        $row = mysqli_fetch_assoc($run_query);
        if(mysqli_num_rows($run_query) > 0 ){
            if ($password == $row["password"]){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: index.php");
                exit();

            }else{
                echo
                "<script>alert('Wrong Password')</script> ";
            }
            
        }else{
            echo "<script>alert('User doesn\'t register')</script>";  
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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
        <h2><center>Login</center></h2>
        <p>Please fill in your credentials to login.</p>
        <form action="login.php" method="post">
            <label >Username</label>
            <br>
            <input type="text" name="username" placeholder=" Please Enter Your Username" size="25" required><br><br>
            <label>Password</label>
            <br>
            <input type="password" name="password" id="password" placeholder="Please Enter Your Password" size="25" required>
            <i class="bi bi-eye-slash" id="togglePassword"></i><br><br>
            <div style="text-align: center;">
                <button type="submit" name="submit">Login</button>
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now.</a></p>
        </form>
    </div>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
        

    </script>
</body>
</html>