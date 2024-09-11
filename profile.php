<?php 
	include 'connect.php';

	if(isset($_COOKIE['user_id'])){
		$user_id = $_COOKIE['user_id'];
	}else{
		$user_id = 'login.php';
	}

	$select_appointments = $conn->prepare("SELECT * FROM `appointments` WHERE user_id = ?");
	$select_appointments->execute([$user_id]);
	$total_appointments = $select_appointments->rowCount();

	$select_message = $conn->prepare("SELECT * FROM `message` WHERE user_id = ?");
	$select_message->execute([$user_id]);
	$total_message = $select_message->rowCount();
	
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
	<div class="banner">
		<div class="detail">
			<h1>my profile</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>my profile</span>
		</div>
	</div>
	
	<div class="profile">
		<div class="heading">
			<h1>profile details</h1>
			<img src="image/layer.png" width="100">
		</div>
		<div class="details">
			<div class="user">
				<img src="uploaded_files/<?= $fetch_profile['image']; ?>">
				<h3><?= $fetch_profile['name']; ?></h3>
				<span>user</span>
				<a href="update.php" class="btn">update profile</a>
			</div>
			<div class="box-container">
				<div class="box">
					<div class="flex">
						<i class="bx bxs-food-menu"></i>
						<h3>Total appointments <?= $total_appointments; ?></h3>
					</div>
					<a href="book_appointment.php" class="btn">view appointments</a>
				</div>
				<div class="box">
					<div class="flex">
						<i class="bx bxs-chat"></i>
						<h3>total messages : <?= $total_message; ?></h3>
					</div>
					<a href="contact.php" class="btn">send messages</a>
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