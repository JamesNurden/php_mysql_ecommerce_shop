<?php 
	include 'connect.php';

	if (isset($_COOKIE['admin_id'])) {
		$admin_id = $_COOKIE['admin_id'];
	}else{
		$admin_id = '';
		header('location:login.php');
	}

	//delete message
	if (isset($_POST['delete'])) {
		
		$delete_id = $_POST['appointment_id'];
		$delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

		$verify_delete = $conn->prepare("SELECT * FROM `appointments` WHERE id = ?");
		$verify_delete->execute([$delete_id]);

		if ($verify_delete->rowCount() > 0) {
			
			$delete_appointment = $conn->prepare("DELETE FROM `appointments` WHERE id = ?");
			$delete_appointment->execute([$delete_id]);

			$success_msg[] = 'appointment delete';
		}else{
			$warning_msg[] = 'appointment already deleted';
		}
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
   	<link rel="stylesheet" type="text/css" href="../css/admin_style.css?v=<?php echo time(); ?>">
</head>
<body>

	<?php include '../components/admin_header.php'; ?>
	<div class="banner">
		<div class="detail">
			<h1>booked appointments</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="dashboard.php">admin</a><i class="bx bx-right-arrow-alt"></i>booked appointments</span>
		</div>
	</div>

	<section class="appontment_container">
		<div class="heading">
			<h1>booked appointments</h1>
			<img src="../image/layer.png" width="100">
		</div>
		<div class="box-container">
			<?php 
				$select_appointment = $conn->prepare("SELECT * FROM `appointments`");
				$select_appointment->execute();

				if ($select_appointment->rowCount() > 0) {
					while($fetch_appointment = $select_appointment->fetch(PDO::FETCH_ASSOC)){


			?>
			<div class="box">
				<div class="status" style="color: <?php if($fetch_appointment['status']=='in progress'){echo "limegreen";}else{echo "red";} ?>"><?= $fetch_appointment['status']; ?></div>
				<div class="detail">
					<p>user name : <span><?= $fetch_appointment['name']; ?></span></p>
					<p>user id : <span><?= $fetch_appointment['user_id']; ?></span></p>
					<p>booked on : <span><?= $fetch_appointment['date']; ?></span></p>
					<p>time : <span><?= $fetch_appointment['time']; ?></span></p>
					<p>number : <span><?= $fetch_appointment['number']; ?></span></p>
					<p>email : <span><?= $fetch_appointment['email']; ?></span></p>
					<p>service charge : <span><?= $fetch_appointment['price']; ?></span></p>
					<p>appointment status : <span><?= $fetch_appointment['status']; ?></span></p>
				</div>
				<?php 
					$select_employee = $conn->prepare("SELECT * FROM `employee` WHERE id = ? LIMIT 1");
					$select_employee->execute([$fetch_appointment['employee_id']]);

					if ($select_employee->rowCount() > 0) {
					 	while($fetch_employee = $select_employee->fetch(PDO::FETCH_ASSOC)){


				?>
				<div class="employee">
					<p class="title">select employee : <span><?= $fetch_employee['name']; ?></span></p>
					<img src="../uploaded_files/<?= $fetch_employee['profile']; ?>"><br>
				</div>
				<?php 
						}
					 } 
				?>
				<?php 
					$select_service = $conn->prepare("SELECT * FROM `services` WHERE id = ? LIMIT 1");
					$select_service->execute([$fetch_appointment['service_id']]);

					if ($select_service->rowCount() > 0) {
						while($fetch_service = $select_service->fetch(PDO::FETCH_ASSOC)){


				?>
				<div class="employee">
					<p class="title">selected service : <span><p><?= $fetch_service['name']; ?></p></span></p>
				</div>
				<?php 
						}
					}

				?>
				<form action="" method="post">
					<input type="hidden" name="appointment_id" value="<?= $fetch_appointment['id']; ?>" >
					<div class="flex-btn">
						<button type="submit" name="delete" class="btn" onclick="return confirm('want to delete this appointment');">delete appointment</button>
					</div>
				</form>
			</div>
			<?php 
					}
				}else{
					echo '
						<div class="empty">
							<p>no appointment booked yet !</p>
						</div>
					';
				}
			?>
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