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
		
		$delete_id = $_POST['delete_id'];
		$delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

		$verify_delete = $conn->prepare("SELECT * FROM `message` WHERE id = ?");
		$verify_delete->execute([$delete_id]);

		if ($verify_delete->rowCount() > 0) {
			
			$delete_msg = $conn->prepare("DELETE FROM `message` WHERE id = ?");
			$delete_msg->execute([$delete_id]);

			$success_msg[] = 'message delete';
		}else{
			$warning_msg[] = 'message already deleted';
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
			<h1>registered user's</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="dashboard.php">admin</a><i class="bx bx-right-arrow-alt"></i>registered user's</span>
		</div>
	</div>

	<section class="user_container">
		<div class="heading">
			<h1>registered user's</h1>
			<img src="../image/layer.png" width="100">
		</div>
		<div class="box-container">
			<?php 
				$select_users = $conn->prepare("SELECT * FROM `users`");
				$select_users->execute();

				if ($select_users->rowCount() > 0) {
					while($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)){

						$user_id = $fetch_users['id'];

			?>
			<div class="box">
				<img src="../uploaded_files/<?= $fetch_users['image']; ?>">
				<div class="detail">
					<p>user id : <span><?= $fetch_users['id']; ?></span></p>
					<p>user name : <span><?= $fetch_users['name']; ?></span></p>
					<p>user email : <span><?= $fetch_users['email']; ?></span></p>
				</div>
			</div>
			<?php 
					}
				}else{
					echo '
						<div class="empty">
							<p>no users registered yet !</p>
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