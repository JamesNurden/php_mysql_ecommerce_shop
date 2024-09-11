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
	<div class="banner">
		<div class="detail">
			<h1>our teams</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>our teams</span>
		</div>
	</div>
	<div class="services">
		<div class="box-container">
			<?php 
				$select_teams = $conn->prepare("SELECT * FROM `employee` WHERE status = ?");
				$select_teams->execute(['active']);

				if ($select_teams->rowCount() > 0) {
					while($fetch_teams = $select_teams->fetch(PDO::FETCH_ASSOC)){


			?>
			<form action="" method="post" class="box">
				<img src="uploaded_files/<?= $fetch_teams['profile']; ?>" class="image">
				
				<div class="content">
					<div><h3><?= $fetch_teams['name']; ?></h3></div>
					<p>profesion : <span><?= $fetch_teams['profession']; ?></span></p>
					<input type="hidden" name="employee_id" value="<?= $fetch_teams['id']; ?>">
					<div class="flex-btn">
						<a href="employee_detail.php?get_id=<?= $fetch_teams['id']; ?>" class="btn">view details</a>
					</div>
				</div>
				
			</form>
			<?php 
					}
				}else{
					echo '
						<div class="empty">
							<p>no employee registered yet!</p>
						</div>
					';
				}
			?>
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