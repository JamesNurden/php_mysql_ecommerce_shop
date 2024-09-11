<?php 
	include 'connect.php';

	if (isset($_COOKIE['admin_id'])) {
		$admin_id = $_COOKIE['admin_id'];
	}else{
		$admin_id = '';
		header('location:login.php');
	}

	
	$select_service = $conn->prepare("SELECT * FROM `services`");
	$select_service->execute();
	$total_service = $select_service->rowCount();

	$select_appointment = $conn->prepare("SELECT * FROM `appointments`");
	$select_appointment->execute();
	$tottal_appointments = $select_appointment->rowCount();

	$select_employee = $conn->prepare("SELECT * FROM `employee`");
	$select_employee->execute();
	$total_employee = $select_employee->rowCount();
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>cherrie spa salon website template</title>
	<!-- box icon cdn link  -->
   	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   	<link rel="stylesheet" type="text/css" href="../css/admin_style.css?v=<?php echo time(); ?>">
</head>
<body>

	
	<?php include '../components/admin_header.php'; ?>
	<div class="banner">
		<div class="detail">
			<h1>admin profile</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="dashboard.php">admin</a><i class="bx bx-right-arrow-alt"></i>admin profile</span>
		</div>
	</div>

	<section class="admin_profile">
		<div class="heading">
			<h1>admin profile</h1>
			<img src="../image/layer.png" width="100">
		</div>
		<div class="details">
			<div class="admin">
				<img src="../uploaded_files/<?= $fetch_profile['image']; ?>">
				<h3><?= $fetch_profile['name']; ?></h3>
				<a href="update.php" class="btn">update profile</a>
			</div>
			<div class="flex">
				<div class="box">
					<span><?= $total_service; ?></span>
					<p>total services</p>
					<a href="view_service.php" class="btn">view services</a>
				</div>
				<div class="box">
					<span><?= $tottal_appointments; ?></span>
					<p>total appointments</p>
					<a href="admin_appointment.php" class="btn">view appointments</a>
				</div>
				<div class="box">
					<span><?= $total_employee; ?></span>
					<p>total employee</p>
					<a href="view_employee.php" class="btn">view employee</a>
				</div>
			</div>
		</div>
	</section>

	<?php include '../components/admin_footer.php'; ?>

	<!-- sweetalert cdn link  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<!-- custom js link  -->
	<script type="text/javascript" src="../js/admin_script.js"></script>
	<!-- alert  -->
	<?php include '../components/alert.php'; ?>
</body>
</html>