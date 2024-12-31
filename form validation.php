<!DOCTYPE html>  
<html>  
<head>  
<style>  
.error {color: #FF0001;}  
</style>  
</head>  
<body>    
  
<?php  
// define variables to empty values  
$nameErr = $emailErr = $genderErr =  $agreeErr = "";  
$name = $email = $groupNo = $classDetails = $gender = $website = $agree = $courses = "";  
  
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
//String Validation  
    if (empty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
        $name = input_data($_POST["name"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  
      
    //Email Validation   
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  
    
      
   //Group validation 
   if (!empty($_POST["groupNo"])){
    $groupNo = input_data($_POST["groupNo"]);
   }

   //Class details validation
   if (!empty($_POST["classDetails"])){
    $classDetails = input_data($_POST["classDetails"]);
   } 

      
    //Empty Field Validation  
    if (empty ($_POST["gender"])) {  
            $genderErr = "Gender is required";  
    } else {  
            $gender = input_data($_POST["gender"]);  
    }  
  
    //Checkbox Validation  
    if (!isset($_POST['agree'])){  
            $agreeErr = "Accept terms of services before submit.";  
    } else {  
            $agree = input_data($_POST["agree"]);  
    } 
    

}
function displayCourses(){
    $courses = $_POST["courses"];
    foreach($courses as $selected){
    echo $selected ." /  " ;
    }
}
     
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>  
  
<h2>Registration Form</h2>  
<span class = "error">* required field </span>  
<br><br>  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
    Name:   
    <input type="text" name="name" value="<?php echo $name;?>" >  
    <span class="error">* <?php echo $nameErr; ?> </span>  
    <br><br>  
    E-mail:   
    <input type="text" name="email" value="<?php echo $email;?>">  
    <span class="error">* <?php echo $emailErr; ?> </span>  
    <br><br>  
    Group number:   
    <input type="text" name="groupNo" value="<?php echo $groupNo;?>">   
    <br><br>  
    Class details: 
    <textarea name="classDetails"  cols="30" rows="4"><?php echo $classDetails;?> </textarea>
    <br><br>  
   
    Gender:  
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male  
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female  
    <span class="error">* <?php echo $genderErr; ?> </span>  
    <br><br> 
    
     Select Courses:
    <select name="courses[]"  multiple>
    <option value="php" > PHP</option>
    <option value="javaScript" >Java Script</option>
    <option value="mysql">MySQL</option>
    <option value="html">HTML</option>
    </select>
    <br><br> 
    Agree to Terms of Service:  
    <input type="checkbox" name="agree"  <?php if ($agree) echo "checked";?> >  
    <span class="error">* <?php echo $agreeErr; ?> </span>  
    <br><br> 
                             
    <input type="submit" name="submit" value="Submit">   
    <br><br> 
                                
</form>  
  
<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == ""  && $genderErr == ""  && $agreeErr == "") {  
        echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$name;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>";  
        echo "Group No: " .$groupNo;  
        echo "<br>";  
        echo "Class Details: " .$classDetails;  
        echo "<br>";  
        echo "Gender: " .$gender; 
        echo "<br>"; 
        echo "Courses:";
          if(isset($_POST["courses"])){
          displayCourses() ;
          
         }
         
         echo "<br>";
    } else {  
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }  
    }  
?>  
  
</body>  
</html>  