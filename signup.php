<?php 

$mysqli = new mysqli("localhost","root","","demo");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    $Firstname=$_POST['Firstname'];
    $Lastname=$_POST['Lastname'];
    
    $email=$_POST['email'];
    $Phone_number=$_POST['Phone_number'];
    
    $sql="SELECT * FROM loginform WHERE User = '".$uname."'";

    $result= $mysqli -> query($sql);

    if(mysqli_num_rows($result)==1){

    	echo "username already exist";
    	exit();
    }
    else{
    	$REG = "INSERT INTO `loginform`(`User`, `Pass`) VALUES ('".$uname."' , '".$password."' )";
    	$mysqli -> query($REG);

    	$DET ="INSERT INTO `details`(`Firstname`, `Lastname`, `Email`, `Phone no.`, `User`) VALUES ('".$Firstname."', '".$Lastname."', '".$email."', '".$Phone_number."', '".$uname."')";
    	$mysqli -> query($DET);
    	echo "You have succesfully registered";

    }
  }

 ?>

<!DOCTYPE html>
<html>
<head>
    <title> Sign up form</title>
    <link rel="stylesheet" a href="css\style.css">
    <link rel="stylesheet" a href="css\style2.css">
    <!-- <link rel="stylesheet" a href="css\font-awesome.min.css"> -->
</head>
<body class="login_signup">
    <div class="container">
    <img src="media/login.png"/>
        <form method="POST" action="#">
        	<div class="row">
        	<div class="form-input">
                <input type="text" name="Firstname" placeholder="Firstname" required="text" />  
            </div>
            <div class="form-input">
                <input type="text" name="Lastname" placeholder="Lastname" required="text" />  
            </div>
            <div class="form-input">
                <input type="email" name="email" placeholder="Email Address" required="email" />  
            </div>
            <div class="form-input">
                <input type="text" name="Phone_number" placeholder="Phone Number" required="Number" />  
            </div>
            <div class="form-input">
                <input type="text" name="username" placeholder="Create a Username" required="text" />  
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="password" required="text" />
            </div>
            <input type="submit" type="submit" value="SIGN UP" class="btn-login"/>
		    <a href="./login.PHP" class="btn-login">Go to Login</a>
		    
        </form>
    </div>


</body>
</html>  