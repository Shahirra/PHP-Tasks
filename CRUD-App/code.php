<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete-btn'])){
     $user_id = mysqli_real_escape_string($con,$_POST['delete-btn']);
     $query = " DELETE FROM users WHERE id = '$user_id'";
     $query_run = mysqli_query($con,$query);

     if($query_run){
         $_SESSION['message']= "User Deleted Successfully";
        header("Location: index.php");
        exit(0);

     }else{
         $_SESSION['message']= "User Not Deleted Successfully";
        header("Location: index.php");
        exit(0);

     }

}
if(isset($_POST['update-btn'])){
    $user_id = mysqli_real_escape_string($con,$_POST['id']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $gender = mysqli_real_escape_string($con,$_POST['gender']);
    $agreement = mysqli_real_escape_string($con,$_POST['ch-box']);
    if(isset($_POST['ch-box'])){
        $agreement = 'yes';
    }else{
        $agreement = 'no';
    }

    $query = "UPDATE users SET name = '$name' , email = '$email' , gender = '$gender' , agree = '$agreement' WHERE id = '$user_id' ";
    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message']= "User Updated Successfully";
        header("Location: index.php");
        exit(0);
    }else{
        $_SESSION['message']= "User Not Updated Successfully";
        header("Location: index.php");
        exit(0);

    }
}
if(isset($_POST['submit-btn'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $gender = mysqli_real_escape_string($con,$_POST['gender']);
    $agreement = mysqli_real_escape_string($con,$_POST['ch-box']);

    if(isset($_POST['ch-box'])){
        $agreement = 'yes';
    }else{
        $agreement = 'no';
    }

    $query = "INSERT INTO users (name,email,gender,agree) VALUES ('$name','$email','$gender','$agreement')";
    $query_run = mysqli_query($con, $query);
    if($query_run){

        $_SESSION['message']= "User Created Successfully";
        header("Location: user-create.php");
        exit(0);
    }else{
        $_SESSION['message']= "User Not Created Successfully";
        header("Location: user-create.php");
        exit(0);

    }
}

?>