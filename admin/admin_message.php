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
			<h1>user messages</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="dashboard.php">admin</a><i class="bx bx-right-arrow-alt"></i>user messages</span>
		</div>
	</div>

	<section class="message_container">
		<div class="heading">
			<h1>user messages</h1>
			<img src="../image/layer.png" width="100">
		</div>
		<div class="box-container">
			<?php 
				$select_message = $conn->prepare("SELECT * FROM `message`");
				$select_message->execute();

				if ($select_message->rowCount() > 0) {
					while($fetch_message = $select_message->fetch(PDO::FETCH_ASSOC)){


			?>
			<div class="box">
				<h3 class="name"><?= $fetch_message['name']; ?></h3>
				<h4>Subject : <?= $fetch_message['subject']; ?></h4>
				<p><?= $fetch_message['message']; ?></p>
				<form action="" method="post">
					<input type="hidden" name="delete_id" value="<?= $fetch_message['id']; ?>">
					<button type="submit" name="delete" class="btn" onclick="return confirm('delete this message');">delete message</button>
				</form>
			</div>
			<?php 
					}
				}else{
					echo '
						<div class="empty">
							<p>no msg received yet !</p>
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