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
	<title>cherrie spa salon website template</title>
	<!-- box icon cdn link  -->
   	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   	<link rel="stylesheet" type="text/css" href="css/user_style.css?v=<?php echo time(); ?>">
</head>
<body>

	<?php include 'components/user_header.php'; ?>
	
	<!-- home section start  -->
	<section class="home">
		<div class="slider">
			<!-- slide start  -->
			<div class="slider_slide slide1">
				<div class="slider-detail">
					<p class="date">14 MAY 2024</p>
					<h1>lerena - spa and wellness center</h1>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, cum? Corrupti placeat ex</p>
					<a href="service.php" class="btn">view services</a>
				</div>
				<div class="right-dec-top"></div>
				<div class="right-dec-bottom"></div>
				<div class="left-dec-top"></div>
				<div class="left-dec-bottom"></div>
			</div>
			<!-- slide end  -->
			<!-- slide start  -->
			<div class="slider_slide slide2">
				<div class="slider-detail">
					<p class="date">14 MAY 2024</p>
					<h1>lerena - spa and wellness center</h1>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, cum? Corrupti placeat ex</p>
					<a href="service.php" class="btn">view services</a>
				</div>
				<div class="right-dec-top"></div>
				<div class="right-dec-bottom"></div>
				<div class="left-dec-top"></div>
				<div class="left-dec-bottom"></div>
			</div>
			<!-- slide end  -->
			<!-- slide start  -->
			<div class="slider_slide slide3">
				<div class="slider-detail">
					<p class="date">14 MAY 2024</p>
					<h1>lerena - spa and wellness center</h1>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, cum? Corrupti placeat ex</p>
					<a href="service.php" class="btn">view services</a>
				</div>
				<div class="right-dec-top"></div>
				<div class="right-dec-bottom"></div>
				<div class="left-dec-top"></div>
				<div class="left-dec-bottom"></div>
			</div>
			<!-- slide end  -->
			<!-- slide start  -->
			<div class="slider_slide slide4">
				<div class="slider-detail">
					<p class="date">14 MAY 2024</p>
					<h1>lerena - spa and wellness center</h1>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, cum? Corrupti placeat ex</p>
					<a href="service.php" class="btn">view services</a>
				</div>
				<div class="right-dec-top"></div>
				<div class="right-dec-bottom"></div>
				<div class="left-dec-top"></div>
				<div class="left-dec-bottom"></div>
			</div>
			<!-- slide end  -->
			<!-- slide start  -->
			<div class="slider_slide slide5">
				<div class="slider-detail">
					<p class="date">14 MAY 2024</p>
					<h1>lerena - spa and wellness center</h1>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, cum? Corrupti placeat ex</p>
					<a href="service.php" class="btn">view services</a>
				</div>
				<div class="right-dec-top"></div>
				<div class="right-dec-bottom"></div>
				<div class="left-dec-top"></div>
				<div class="left-dec-bottom"></div>
			</div>
			<!-- slide end  -->
			<div class="left-arrow"><i class="bx bxs-left-arrow"></i></div>
			<div class="right-arrow"><i class="bx bxs-right-arrow"></i></div>
		</div>
	</section>
	<!-- home section end  -->

	<div class="for">
		<div class="box-container">
			<div class="box">
				<img src="image/him.jpg">
				<div class="detail">
					<h1>for</h1><h1>him</h1>
				</div>
			</div>
			<div class="box">
				<img src="image/her.jpg">
				<div class="detail">
					<h1>for</h1><h1>her</h1>
				</div>
			</div>
			<div class="box">
				<img src="image/couple.jpg">
				<div class="detail">
					<h1>for</h1><h1>couple</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="service">
		<div class="heading">
			<h1>our services</h1>
		</div>
		<div class="box-container">
			<div class="box">
				<div class="icon">
					<div class="icon-box">
						<img src="image/service-icon.png" class="img1">
					</div>
				</div>
				<div class="detail">
					<h4>body treatment</h4>
				</div>
			</div>
			<div class="box">
				<div class="icon">
					<div class="icon-box">
						<img src="image/service-icon0.png" class="img1">
					</div>
				</div>
				<div class="detail">
					<h4>spa programs</h4>
				</div>
			</div>
			<div class="box">
				<div class="icon">
					<div class="icon-box">
						<img src="image/service-icon1.png" class="img1">
					</div>
				</div>
				<div class="detail">
					<h4>massage</h4>
				</div>
			</div>
			<div class="box">
				<div class="icon">
					<div class="icon-box">
						<img src="image/service-icon4.png" class="img1">
					</div>
				</div>
				<div class="detail">
					<h4>aroma therapy</h4>
				</div>
			</div>
			<div class="box">
				<div class="icon">
					<div class="icon-box">
						<img src="image/service-icon2.png" class="img1">
					</div>
				</div>
				<div class="detail">
					<h4>for couple</h4>
				</div>
			</div>
			<div class="box">
				<div class="icon">
					<div class="icon-box">
						<img src="image/service-icon3.png" class="img1">
					</div>
				</div>
				<div class="detail">
					<h4>facials</h4>
				</div>
			</div>
		</div>
		<div class="detail">
			<p>Our crazy-talented master stylists will connect with you on a personal level, using their creativity and skill to envision a natural, ready-to-wear style that embraces your individuality and lifestyle.</p>
			<a href="service.php" class="btn">view our services</a>
		</div>
	</div>
	<img src="image/sub-banner.jpg" class="sub-banner">

	<div class="frame-container">
		<div class="box-container">
			<div class="box">
				<div class="box-detail">
					<img src="image/frame.jpg" class="img">
					<div class="detail">
						<span>wide range</span>
						<h1>spa and wellness</h1>
						<a href="service.php" class="btn">view our services</a>
					</div>
				</div>
				<div class="box-detail">
					<img src="image/frame0.avif" class="img">
					<div class="detail">
						<span>wide range</span>
						<h1>spa and massage</h1>
						<a href="service.php" class="btn">view our services</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="about-us">
		<div class="box-container">
			<div class="img-box">
				<img src="image/choose.jpg" class="img">
				<img src="image/choose0.avif" class="img1">
				<div class="play"><i class="bx bx-play"></i></div>
			</div>
			<div class="box">
				<div class="heading">
					<span>why choose us</span>
					<h1>why cherie spa salon</h1>
					<img src="image/layer.png" alt="" width="100">
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<a href="about.php" class="btn">know more</a>
				<a href="contact.php" class="btn">contact us</a>
			</div>
		</div>
	</div>

	<div class="vid-banner">
		<div class="overlay"></div>
		<video src="image/video.mp4" autoplay loop></video>
		<div class="detail">
			<h1>beauty and spa center</h1>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, fuga Totam, fuga? Maiores, sapiente. </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, fuga? </p>
            <div class="flex-btn">
            	<a href="" class="btn">explore more</a>
            	<a href="about.php" class="btn">more about us</a>
            </div>
		</div>
	</div>

	<div class="center">
		<div class="heading">
			<span>taking care of you</span>
			<h1>professional <br> massage & spa center</h1>
			<img src="image/layer.png">
		</div>
		<div class="box-container">
			<div class="box">
				<img src="image/center.jpg">
				<span>best products</span>
				<h1>online appointments</h1>
				<p>Consectetur adipiscing elit</p>
			</div>
			<div class="box">
				<img src="image/center0.jpg">
				<span>best products</span>
				<h1>gifts cards available</h1>
				<p>Consectetur adipiscing elit</p>
			</div>
			<div class="box">
				<img src="image/center1.jpg">
				<span>best products</span>
				<h1>special offers</h1>
				<p>Consectetur adipiscing elit</p>
			</div>
			<div class="box">
				<img src="image/center2.jpg">
				<span>best products</span>
				<h1>special treatments</h1>
				<p>Consectetur adipiscing elit</p>
			</div>
		</div>
	</div>
	<div class="offer">
		<div class="detail">
			<h1>it takes professional hands <br> To get your daily Stress off...</h1>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga facere ipsum ratione pariatur aperiam perferendis quidem, natus deleniti explicabo asperiores amet omnis alias minima quia impedit dolorum vitae nihil cum.</p>
			<a href="" class="btn">book appointment</a>
		</div>
	</div>

	<div class="accordian">
		<div class="box-container">
			<div class="box">
				<div class="heading">
					<h1>pre treatment queries</h1>
					<p>Sollicitudin tempor id eu nisl nunc mi ipsum. Eget duis at tellus at urna condimentum matti quam quisque diam</p>
				</div>
				<div class="contentBox">
					<div class="label">How can I book an appointment?</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
					</div>
				</div>
				<div class="contentBox">
					<div class="label">How can I book an appointment?</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
					</div>
				</div>
				<div class="contentBox">
					<div class="label">How can I book an appointment?</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
					</div>
				</div>
				<div class="contentBox">
					<div class="label">How can I book an appointment?</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
					</div>
				</div>
				<div class="contentBox">
					<div class="label">How can I book an appointment?</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
					</div>
				</div>
				<div class="contentBox">
					<div class="label">How can I book an appointment?</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
					</div>
				</div>
			</div>
			<div class="box">
				<img src="image/img.webp">
			</div>
		</div>
	</div>



	<?php include 'components/user_footer.php'; ?>

	<!-- sweetalert cdn link  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<!-- custom js link  -->
	<script type="text/javascript" src="js/user_script.js"></script>
	<!-- alert  -->
	<?php include 'components/alert.php'; ?>
</body>
</html>