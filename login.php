<?php 

session_start();


$mysqli = new mysqli("localhost","root","","demo");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="SELECT * FROM loginform WHERE User='".$uname."'AND Pass='".$password."' limit 1";
    

    $result=$mysqli -> query($sql);
    
    if(mysqli_num_rows($result)==1){

    	$_SESSION['username']=$uname;
    	header('location:index.php');
    	#echo "string";
    }
    else{

    	echo "incorrect password";
    }    
}
?>


<!DOCTYPE html>
<html>
<head>
    <title> Login Form</title>
    <link rel="stylesheet" a href="css\style2.css">
    <link rel="stylesheet" a href="css\style.css">
    <!-- <link rel="stylesheet" a href="css\font-awesome.min.css"> -->
</head>
<body class="login_signup">
    <div class="container">
        <img src="./media/login.png"/>
            <form method="post" action="#">
                <div class="form-input">
                    <input type="text" name="username" placeholder="Enter the User Name "/>  
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="Password"/>
                </div>
                <input type="submit" type="submit" value="LOGIN" class="btn-login"/>
   		        <a href="./signup.PHP" class="btn-login">Sign up</a>
            </form>
    </div>


</body>
</html>