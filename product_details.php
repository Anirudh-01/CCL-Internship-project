<?php
session_start();

$mysqli = new mysqli("localhost","root","","demo");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$pid=$_SESSION['product_id'];

$sql="SELECT * FROM product_details WHERE product_id = '".$pid."'";

$result= $mysqli -> query($sql);

if(mysqli_num_rows($result)==1){

	$row = $result->fetch_assoc();

	$_SESSION['product_name'] = $row["product_name"];
	$_SESSION['product_price'] = $row["product_price"];
	$_SESSION['image'] = $row["image"];
 }
 else{
 	header('location:index.php');
 }

?>

<?php 


$mysqli = new mysqli("localhost","root","","demo");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (ISSET($_POST["product_id"])) {

		$pid=$_POST["product_id"];
		$_SESSION['product_id']=$pid;
		header('location:product_details.php');
	}
}

?>

<?php 


$mysqli = new mysqli("localhost","root","","demo");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	
	if (isset($_POST['add_to_cart'])) {

		$CID=$_POST['add_to_cart'];
		$pid=$_SESSION["product_id"];

		$sql = "INSERT INTO `cart_items`(`cart_item_id` , `product_id`) VALUES ( NULL , '".$pid."')";

		$mysqli -> query($sql);

	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Product_details - eCOMMERCE</title>
	<link rel="stylesheet" type="text/css" href="./CSS/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</head>
<body>
<!---------Header----------->
	<section id="top-nav">
		<nav class="navbar fixed-top navbar-expand-lg navbar-light"> <!-- Navbar -->
		  	<div class="container-fluid">
		    	<a class="navbar-brand" href="index.php">eCOMMERCE</a>
		    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      		<span class="navbar-toggler-icon"></span>
		    	</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="./index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./products.php">Products</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="http://ccl/index.php#more-info">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="http://ccl/index.php#contact-info">Contact Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login.php"><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}else{echo "Login / SignUp";}?></a>
						</li>
					</ul>
					<a href="./cart_items.php"> <img src="media/cart.svg" class="image-fluid shopping_cart" ></a>
				</div>
			</div>
		</nav>
	</section>

	<form id="product_form" method="post" action="#"></form>
	<section id="Single_product" class="Single_product">
		<div class="small_container">
			<div class="row">
				<div class="col-md-5 text-center" >
					<img src="<?php echo $_SESSION['image'] ?>" class="product_detail_img1" width="100%">
				</div>
				<div class="col-md-4 offset-md-1 ">
					<p>Home / <?php echo $_SESSION['product_name'] ?></p>
					<h1><?php echo $_SESSION['product_name'] ?></h1>
					<h3>$<?php echo $_SESSION['product_price'] ?></h3>
					<h4>Description</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					<?php
					  	$mysqli = new mysqli("localhost","root","","demo");

						if ($mysqli -> connect_errno) {
						  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
						  exit();
						}

						$sql = "SELECT * FROM `cart_items` where `product_id` = ".$pid;
						$result = $mysqli -> query($sql);

					  	if(mysqli_num_rows($result)==0){
							echo "<button type=\"submit\" form=\"product_form\" name=\"add_to_cart\" class=\"btn btn-primary btn-lg bg-info\">Add to cart &#8594</button>";
					  	}
					  	else{
					  		echo "<button type=\"submit\" form=\"product_form\" name=\"add_to_cart\" class=\"btn btn-disabled btn-lg \" disabled> Added to cart</button>";
					  	}


						?>
				</div>
			</div>
		</div>
	</section>

<!-------------- cards section--------->

	<section id="Single_product1" class="products">
		<div class="container-fluid">
			<h2 class="text-center latest_products">Our latest offerings</h2>
		</div>
		<div class="container_fluid">
			<div class="row">
				<div class="col-md-3 text-center">
					<div class="card_block">
					  <img src="media/product-02.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 02</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$120.71</h3>
					    <button form="product_form" type="submit" name="product_id" value="2" class="btn btn-outline-info" >Buy Now</button>
					  </div>
					</div>
				</div>
				<div class="col-md-3 text-center">
					<div class="card_block">
					  <img src="media/product-03.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 03</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$75.51</h3>
					    <button form="product_form" type="submit" name="product_id" value="3" class="btn btn-outline-info" >Buy Now</button>
					  </div>
					</div>
				</div>
				<div class="col-md-3 text-center">
					<div class="card_block">
					  <img src="media/product-04.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 04</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$99.99</h3>
					    <button form="product_form" type="submit" name="product_id" value="4" class="btn btn-outline-info" >Buy Now</button>
					  </div>
					</div>
				</div>
				<div class="col-md-3 text-center">
					<div class="card_block">
					  <img src="media/product-05.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 05</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$36.86</h3>
					    <button form="product_form" type="submit" name="product_id" value="5" class="btn btn-outline-info" >Buy Now</button>
					  </div>
					</div>
				</div>
			</div>
		</div>

	</section>


<!----------Footer section------------->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mb-4">eCOMMERCE</h5>
        <p>One stop shop for all Coal India products.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit amet numquam iure provident voluptate
          esse
          quasi, veritatis totam voluptas nostrum.</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mb-4">About</h5>

        <ul class="list-unstyled">
          <li>
            <p>
              <a href="#!">PROJECTS</a>
            </p>
          </li>
          <li>
            <p>
              <a href="#!">ABOUT US</a>
            </p>
          </li>
          <li>
            <p>
              <a href="#!">BLOG</a>
            </p>
          </li>
          <li>
            <p>
              <a href="#!">AWARDS</a>
            </p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Contact details -->
        <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>

        <ul class="list-unstyled">
          <li>
            <p>
              <i class="fas fa-home mr-3"></i> CCL, Ranchi 83001, India</p>
          </li>
          <li>
            <p>
              <i class="fas fa-envelope mr-3"></i> info@example.com</p>
          </li>
          <li>
            <p>
              <i class="fas fa-phone mr-3"></i> + 91 234 567 88</p>
          </li>
          <li>
            <p>
              <i class="fas fa-print mr-3"></i> + 91 234 567 89</p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 text-center mx-auto my-4">

        <!-- Social buttons -->
        <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>

        <!-- Facebook -->
        <a type="button" class="btn-floating btn-fb">
          <i class="fab fa-facebook-f"></i>
        </a>
        <!-- Twitter -->
        <a type="button" class="btn-floating btn-tw">
          <i class="fab fa-twitter"></i>
        </a>
        <!-- Google +-->
        <a type="button" class="btn-floating btn-gplus">
          <i class="fab fa-google-plus-g"></i>
        </a>
        <!-- Dribbble -->
        <a type="button" class="btn-floating btn-dribbble">
          <i class="fab fa-dribbble"></i>
        </a>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

</footer>
</body>
</html>