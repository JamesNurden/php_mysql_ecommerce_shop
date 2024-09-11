<?php 
	include 'connect.php';

	if(isset($_COOKIE['user_id'])){
		$user_id = $_COOKIE['user_id'];
	}else{
		$user_id = '';
	}

	if (isset($_POST['send_message'])) {
		if ($user_id != '') {

			$id = unique_id();

			$name = $_POST['name'];
			$name = filter_var($name, FILTER_SANITIZE_STRING);

			$email = $_POST['email'];
			$email = filter_var($email, FILTER_SANITIZE_STRING);

			$subject = $_POST['subject'];
			$subject = filter_var($subject, FILTER_SANITIZE_STRING);

			$message = $_POST['message'];
			$message = filter_var($message, FILTER_SANITIZE_STRING);

			$verify_msg = $conn->prepare("SELECT * FROM `message` WHERE user_id = ? AND name = ? AND email = ? AND subject = ? AND message = ?");
			$verify_msg->execute([$user_id, $name, $email, $subject, $message]);

			if ($verify_msg->rowCount() > 0) {
				$warning_msg[] = 'message already send';
			}else{
				$insert_msg = $conn->prepare("INSERT INTO `message`(id, user_id, name, email, subject, message) VALUES(?,?,?,?,?,?)");
				$insert_msg->execute([$id, $user_id, $name, $email, $subject, $message]);
				$success_msg[] = 'message send';
			}
		}else{
			$warning_msg[] = 'please login first';
		}
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
	<div class="banner">
		<div class="detail">
			<h1>contact us</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>contact us</span>
		</div>
	</div>
	<div class="contact">
		<div class="heading">
			<h1>droap a line</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit., sed do eiusmod<br>
	       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
	       <img src="image/layer.png">
		</div>
		<div class="form-container">
			<form action="" method="post" enctype="multipart/form-data" class="login">
				<div class="input-field">
					<p>your name <span>*</span></p>
					<input type="text" name="name" placeholder="enter your name" maxlength="50" required class="box">
				</div>
				<div class="input-field">
					<p>your email <span>*</span></p>
					<input type="email" name="email" placeholder="enter your email" maxlength="60" required class="box">
				</div>
				<div class="input-field">
					<p>subject <span>*</span></p>
					<input type="text" name="subject" placeholder="enter your reason" maxlength="150" required class="box">
				</div>
				<div class="input-field">
					<p>message <span>*</span></p>
					<textarea name="message" class="box"></textarea>
				</div>
				<button type="submit" name="send_message" class="btn">send message</button>
			</form>
		</div>
	</div>
	<div class="contact_details">
		<div class="heading">
			<h1>our contact details</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit., sed do eiusmod<br>
	       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
	       <img src="image/layer.png">
		</div>
		<div class="box-container">
			<div class="box">
				<i class="bx bxs-map-alt"></i>
				<div>
					<h4>address</h4>
					<p>1093 Merigold Lane, CoralWay <br>Miami, Florida, 33169</p>
				</div>
			</div>
			<div class="box">
				<i class="bx bxs-phone-incoming"></i>
				<div>
					<div>
					<h4>phone number</h4>
					<p>8899770066</p>
					<p>8899770066</p>
				</div>
				</div>
			</div>
			<div class="box">
				<i class="bx bxs-envelope"></i>
				<div>
					<h4>email</h4>
					<p>selenaansari@gmail.com</p>
					<p>selenaansari47@gmail.com</p>
				</div>
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