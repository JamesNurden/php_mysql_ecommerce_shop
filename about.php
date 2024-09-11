<?php 
	include 'connect.php';

	if(isset($_COOKIE['user_id'])){
		$user_id = $_COOKIE['user_id'];
	}else{
		$user_id = '';
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>lirena spa salon website template</title>
	<!-- box icon cdn link  -->
   	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   	<link rel="stylesheet" type="text/css" href="css/user_style.css?v=<?php echo time(); ?>">
</head>
<body>

	<?php include 'components/user_header.php'; ?>
	
	<!-- home section start  -->
	<div class="banner">
		<div class="detail">
			<h1>about us</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>about us</span>
		</div>
	</div>
	<div class="who-container">
		<div class="box-container">
			<div class="box">
				<div class="heading">
					<span>who we are</span>
					<h1>We are passionate about making beautiful more beautiful</h1>
					<img src="image/layer.png" width="100">
				</div>
				<p>Maria is a Roman-born pastry chef who spent 15 years in his city Rome perfecting his craft and exceptional creations. Vestibulum rhoncus ornare tincidunt. Etiam pretium metus sit amet est aliquet vulputate. Fusce et cursus ligula. Sed accumsan dictum porta. Aliquam rutrum ullamcorper velit hendrerit convallis.</p>
				<div class="flex-btn">
					<a href="service.php" class="btn">explore our services</a>
					<a href="service.php" class="btn">visit our spa salon</a>
				</div>
			</div>
			<div class="img-box">
				<img src="image/gallery-spa-3.jpg" alt="" class="img">
			</div>
		</div>
	</div>

	<div class="spa-offer">
		<div class="detail">
			<span>New service</span>
			<h1>aromatheraphy</h1>
			<h2>save 25%</h2>
			<a href="contact.php" class="btn">contact us</a>
		</div>
	</div>
	<div class="advntages">
		<div class="detail">
			<div class="heading">
				<span>advntages</span>
				<h1>why people choose us</h1>
				<img src="image/layer.png" width="100">
			</div>
			<div class="box-container">
				<div class="box">
					<i class="bx bxs-leaf"></i>
					<h1>ecological cosmetics</h1>
					<p>Using only natural and eco-friendly components for cosmetics</p>
				</div>
				<div class="box">
					<i class="bx bxs-flask"></i>
					<h1>author's recipes</h1>
					<p>Using only natural and eco-friendly components for cosmetics</p>
				</div>
				<div class="box">
					<i class="bx bxs-droplet"></i>
					<h1>ecological cosmetics</h1>
					<p>Using only natural and eco-friendly components for cosmetics</p>
				</div>
				<div class="box">
					<i class="bx bxs-user"></i>
					<h1>ecological cosmetics</h1>
					<p>Using only natural and eco-friendly components for cosmetics</p>
				</div>
			</div>
		</div>
	</div>
	<div class="massage-offer">
		<div class="detail">
			<h1>30% OFF</h1>
			<span>for all massages</span>
			<p>Constant stress and tension can really wear the body out. <br> Relieve the pain with one or more of our many <br> massage services at a very profitable discount.</p>
			<a href="" class="btn">book appointment</a>
		</div>
	</div>

	<div class="spa-service">
		<div class="heading">
			<span>for our clients</span>
			<h1>high quality spa services</h1>
			<img src="image/layer.png" width="100">
			<p>Our Spa accommodates all of your relaxation needs. You will have your perfect day here, at Edem. Visit a category below to view all the great options we have to offer.</p>
		</div>
		<div class="box-container">
			<div class="box">
				<img src="image/spa-1.jpg">
				<h1>medi-SPA & massage</h1>
				<div class="divider"><div class="separator"></div></div>
				<p>Relieve stress and muscle strain with relaxing and gentle massage.</p>
				<p class="price"><del>$60.00</del>$40.00</p>
			</div>
			<div class="box">
                <img src="image/spa-2.jpg" alt="">
                <h1>Cosmetic Procedures</h1>
                <div class="devider"><div class="separator"></div></div>
                <p>Give your skin the radiance and flash it deserves.</p>
                <p class="price"><del>$60.00</del> $40.00</p>
            </div>
            <div class="box">
                <img src="image/spa-3.jpg" alt="">
                <h1>Facial Care</h1>
                <div class="devider"><div class="separator"></div></div>
                <p>Relieve stress and muscle strain with relaxing and gentle massage.</p>
                <p class="price"><del>$60.00</del> $40.00</p>
            </div>
            <div class="box">
                <img src="image/spa-4.jpg" alt="">
                <h1>Paired Procedures</h1>
                <div class="devider"><div class="separator"></div></div>
                <p>Relieve stress and muscle strain with relaxing and gentle massage.</p>
                <p class="price"><del>$60.00</del> $40.00</p>
            </div>
		</div>
	</div>

	<div class="offer-1">
		<div class="detail">
			<h1><span>50%</span>on first couple spa</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.</p>
			<a href="" class="btn">book appointments</a>
		</div>
	</div>

	<div class="about">
		<div class="box-container">
			<div class="box">
				<div class="heading">
					<span>about company</span>
					<h1>lirena spa and wellness center</h1>
					<img src="image/layer.png">
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet elementum ante. Sed mattis sapien vel vestibulum lacinia. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce a fermentum leo. Integer sem nulla, pretium vel purus vel, venenatis vehicula turpis.</p>
				<div class="flex-btn">
					<a class="btn">explore more</a>
					<a class="btn">contact us</a>
				</div>
			</div>
		</div>
	</div>

	<div class="testimonial">
		<div class="heading">
			<h1>testimonial</h1>
			<img src="image/layer.png">
		</div>
		<div class="container">
			<div class="testimonial-item active">
				<i class="bx bxs-qoute-right" id="qoute"></i>
				<img src="image/ourteam.webp">
				<h1>john doe</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="testimonial-item">
				<i class="bx bxs-qoute-right" id="qoute"></i>
				<img src="image/ourteam0.webp">
				<h1>sara smith</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="testimonial-item">
				<i class="bx bxs-qoute-right" id="qoute"></i>
				<img src="image/ourteam1.webp">
				<h1>sara smith</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="testimonial-item">
				<i class="bx bxs-qoute-right" id="qoute"></i>
				<img src="image/ourteam2.webp">
				<h1>sara smith</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="right-slide" onclick="rightSlide()"><i class="bx bx-right-arrow-alt"></i></div>
			<div class="left-slide" onclick="leftSlide()"><i class="bx bx-left-arrow-alt"></i></div>
		</div>
	</div>






	<?php include 'components/user_footer.php'; ?>

	<!-- sweetalert cdn link  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<!-- custom js link  -->
	<script type="text/javascript">
		const userBtn = document.querySelector('#user-btn');
		userBtn.addEventListener("click", function(){
			const userBox = document.querySelector('.profile');
			userBox.classList.toggle('active');
		})


		const toggle = document.querySelector('#menu-btn');
		toggle.addEventListener("click", function(){
			const navbar = document.querySelector('.navbar');
			navbar.classList.toggle('active');
		})

		const searchForm = document.querySelector('.search-form');
		document.querySelector('#search-btn').onclick=()=>{
			searchForm.classList.toggle('active');
			
		}

		let slides = document.querySelectorAll('.testimonial-item');
	    let index = 0;

	    function rightSlide(){
	        slides[index].classList.remove('active');
	        index = (index + 1) % slides.length;
	        slides[index].classList.add('active');
	    }
	    function leftSlide(){
	        slides[index].classList.remove('active');
	        index = (index - 1 + slides.length) % slides.length;
	        slides[index].classList.add('active');
	    }
	</script>
	<!-- alert  -->
	<?php include 'components/alert.php'; ?>
</body>
</html>