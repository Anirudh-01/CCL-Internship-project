<?php 

session_start();


$mysqli = new mysqli("localhost","root","","demo");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$pid=$_POST["product_id"];
	$_SESSION['product_id']=$pid;
	header('location:product_details.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CCL eCOMMERCE Website</title>
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

<!--------------Banner section------------>
	
	<section id="landing-area" class="landing-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6"><br><br>
					<h1>One stop shop for all Coal India Products</h1><br>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p><br>
					<a href="#more-info" class="btn btn-primary btn-lg bg-info">About Us</a>
					<a href="#products" class="btn btn-primary btn-lg bg-info">Explore Now &#8594</a>

				</div>
				<div class="col-md-6 text-center">
					<img src="media/Big image.svg" class="image-fluid ccl-logo">
				</div>	
			</div>
		</div>
	</section>

<!-------------- cards section--------->
	<form id="product_form" method="post" action="#"></form>
	<section id="products" class="products">

		<div class="container-fluid">
			<div class="row product_row">
				<div class="col-md-4 offset-md-1">
					<h2>Shop for our featured products here, easily and hassle free.</h2>
				</div>
				<div class="col-md-5 offset-md-2 text-center">
					<div class="card_block">
					  <img src="media/product -01.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 01</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$159.99</h3>
					    <button form="product_form" type="submit" name="product_id" value="1" class="btn btn-outline-info" >Buy Now</button>
					  </div>
					</div>
				</div>
				<div class="col-md-5 offset-md-1 text-center">
					<div class="card_block product-02">
					  <img src="media/product-02.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 02</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$120.70</h3>
					    <button form="product_form" type="submit" name="product_id" value="2" class="btn btn-outline-info">Buy Now</button>
					  </div>
					</div>
                </div>
                <div class="col-md-5 offset-md-1 text-center">
                	<div class="card_block product-03">
					  <img src="media/product-03.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 03</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$75.51</h3>
					    <button form="product_form" type="submit" name="product_id" value="3" class="btn btn-outline-info">Buy Now</button>
					  </div>
					</div>
                </div>
                <div class="col-md-5 offset-md-1 text-center">
                	<div class="card_block product-04">
					  <img src="media/product-04.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 04</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$99.99</h3>
					    <button form="product_form" type="submit" name="product_id" value="4" class="btn btn-outline-info">Buy Now</button>
					  </div>
					</div>
                </div>
                <div class="col-md-5 offset-md-1 text-center">
                	<div class="card_block product-05">
					  <img src="media/product-05.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 05</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$36.86</h3>
					    <button form="product_form" type="submit" name="product_id" value="5" class="btn btn-outline-info">Buy Now</button>
					  </div>
					</div>
                </div>
                <div class="col-md-5 offset-md-1 text-center">
                	<div class="card_block product-06">
					  <img src="media/product-06.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 06</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$2500.00</h3>
					    <button form="product_form" type="submit" name="product_id" value="6" class="btn btn-outline-info">Buy Now</button>
					  </div>
					</div>
                </div>
                <div class="col-md-5 offset-md-1 text-center">
                	<div class="card_block product-05">
					  <img src="media/product-07.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 07</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$75.51</h3>
					    <button form="product_form" type="submit" name="product_id" value="7" class="btn btn-outline-info">Buy Now</button>
					  </div>
					</div>
                </div>				
			</div>
		</div>
		<div class="container-fluid">
			<h2 class="text-center latest_products">Latest Products</h2>
		</div>
		<div class="container_fluid">
			<div class="row">
				<div class="col-md-3 text-center">
					<div class="card_block">
					  <img src="media/product-08.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 08</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$48.59</h3>
					    <button form="product_form" type="submit" name="product_id" value="8" class="btn btn-outline-info">Buy Now</button>
					  </div>
					</div>
				</div>
				<div class="col-md-3 text-center">
					<div class="card_block">
					  <img src="media/product-09.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 09</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$75.51</h3>
					    <button form="product_form" type="submit" name="product_id" value="9" class="btn btn-outline-info">Buy Now</button>
					  </div>
					</div>
				</div>
				<div class="col-md-3 text-center">
					<div class="card_block">
					  <img src="media/product -01.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 10</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$159.99</h3>
					    <button form="product_form" type="submit" name="product_id" value="1" class="btn btn-outline-info">Buy Now</button>
					  </div>
					</div>
				</div>
				<div class="col-md-3 text-center">
					<div class="card_block">
					  <img src="media/product-06.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Product 11</h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sed vulputate vitae velit dictum cursus amet. Turpis donec ut velit quis. Cursus commodo, eget urna, sapien amet.</p>
					    <h3>$2500.00</h3>
					    <button form="product_form" type="submit" name="product_id" value="6" class="btn btn-outline-info">Buy Now</button>
					  </div>
					</div>
				</div>
			</div>
		</div>

	</section>


<!--------------services section-------->
	<section id="services" class="service-area">
		<div class="container-fluid">
			<h2 class="text-center">How it works</h2>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 offset-md-2 text-center"><br><br>
					<img src="media/service1.svg" class="image-fluid service1">
					<h4>Create an account</h4>
					<p>Lorem ipsum dolor sit amet,<br> consectetur adipiscing elit.</p>   	
				</div>
				<div class="col-md-4  text-center"><br><br>
					<img src="media/carbon_security.svg" class="image-fluid service2">
            		<h4>Get authorization</h4>
        			<p>Lorem ipsum dolor sit amet,<br> consectetur adipiscing elit.</p>
                </div>
                <div class="col-md-2 text-center"><br><br>
                	<img src="media/service3.svg" class="image-fluid service1">
					<h4>Enjoy the Website</h4>
					<p>Lorem ipsum dolor sit amet,<br> consectetur adipiscing elit.</p>   	
				</div>
			</div>
		</div>

	</section>

<!--------------More Information--------->
	<section id="more-info" class="Information">
		<div class="container-fluid">
			<h2 class="text-center">Want to know more About Us?</h2>
		</div>

		<div class="container-fluid info-content ">
			<div class="row">
				<div class="col-md-6">
					
				</div>
				<div class="col-md-5">
					<img src="media/quote.svg" class="image-fluid quote-logo"><br><br>
					<p class="quote-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Amet sed vulputate vitae velit dictum cursus amet.<br> Turpis donec ut velit quis. Cursus commodo,<br> eget urna, sapien amet.</p><br>
					<h4 class="quote-text">Anirudh Mukherjee</h4>
					<div class="col-md-6">
						<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
							<div class="btn-group mr-2 arrows" role="group" aria-label="Second group">
							    <button type="button" class="btn btn-outline-info ">
							    	<!-- <img src="media/left-arrow.svg" class="image-fluid left-arrow"> -->
							    	<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M28 9.99467L18 19.8886L28 29.7825L26 33.74L12 19.8886L26 6.03711L28 9.99467Z" fill="white"/>
									</svg>
							    </button>
							    <button type="button" class="btn btn-outline-info">
							    	<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12 29.7823L22 19.8884L12 9.9945L14 6.03693L28 19.8884L14 33.7399L12 29.7823Z" fill="white"/>
									</svg>
							    </button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!----------Footer section------------->
<footer class="page-footer font-small mdb-color lighten-3 pt-4" id="contact-info">

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
              <a href="products.php">PRODUCTS</a>
            </p>
          </li>
          <li>
            <p>
              <a href="#more-info">ABOUT US</a>
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