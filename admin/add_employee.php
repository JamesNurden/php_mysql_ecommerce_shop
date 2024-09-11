<?php 
	include 'connect.php';

	if (isset($_COOKIE['admin_id'])) {
		$admin_id = $_COOKIE['admin_id'];
	}else{
		$admin_id = '';
		header('location:login.php');
	}

	//adding service in database
	if (isset($_POST['add_employee'])) {
		
		$id = unique_id();

		$name = $_POST['name'];
		$name = filter_var($name, FILTER_SANITIZE_STRING);

		$email = $_POST['email'];
		$email = filter_var($email, FILTER_SANITIZE_STRING);

		$profession = $_POST['profession'];
		$profession = filter_var($profession, FILTER_SANITIZE_STRING);

		$content = $_POST['content'];
		$content = filter_var($content, FILTER_SANITIZE_STRING);

		$number = $_POST['number'];
		$number = filter_var($number, FILTER_SANITIZE_STRING);

		$image = $_FILES['image']['name'];
		$image = filter_var($image, FILTER_SANITIZE_STRING);
		$ext = pathinfo($image, PATHINFO_EXTENSION);
		$rename = unique_id().'.'.$ext;
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = '../uploaded_files/'.$rename;

		$status = 'active';

		$select_image = $conn->prepare("SELECT * FROM `employee` WHERE image = ?");
		$select_image->execute([$image]);

		if (isset($image)) {
			if ($select_image->rowCount() > 0) {
				$warning_msg[] = 'image name repeated';
			}elseif ($image_size > 2000000) {
				$warning_msg[] = 'image size is too large';
			}else{
				move_uploaded_file($image_tmp_name, $image_folder);
			}
		}else{
			$image = '';
		}
		if($select_image->rowCount() > 0 AND $image != ''){
			$warning_msg[] = 'please rename your image';
		}else{
			$insert_employee = $conn->prepare("INSERT INTO `employee`(id, name, profession, email, number, profile_desc, profile, status) VALUES(?,?,?,?,?,?,?,?)");

			$insert_employee->execute([$id, $name, $profession, $email, $number, $content, $rename, $status]);

			$success_msg[] = 'employee add successfully';
		}

	}

	//adding service in database as draft
	if (isset($_POST['draft'])) {
		
		$id = unique_id();

		$name = $_POST['name'];
		$name = filter_var($name, FILTER_SANITIZE_STRING);

		$email = $_POST['email'];
		$email = filter_var($email, FILTER_SANITIZE_STRING);

		$profession = $_POST['profession'];
		$profession = filter_var($profession, FILTER_SANITIZE_STRING);

		$content = $_POST['content'];
		$content = filter_var($content, FILTER_SANITIZE_STRING);

		$number = $_POST['number'];
		$number = filter_var($number, FILTER_SANITIZE_STRING);

		$image = $_FILES['image']['name'];
		$image = filter_var($image, FILTER_SANITIZE_STRING);
		$ext = pathinfo($image, PATHINFO_EXTENSION);
		$rename = unique_id().'.'.$ext;
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = '../uploaded_files/'.$rename;

		$status = 'deactive';

		$select_image = $conn->prepare("SELECT * FROM `employee` WHERE image = ?");
		$select_image->execute([$image]);

		if (isset($image)) {
			if ($select_image->rowCount() > 0) {
				$warning_msg[] = 'image name repeated';
			}elseif ($image_size > 2000000) {
				$warning_msg[] = 'image size is too large';
			}else{
				move_uploaded_file($image_tmp_name, $image_folder);
			}
		}else{
			$image = '';
		}
		if($select_image->rowCount() > 0 AND $image != ''){
			$warning_msg[] = 'please rename your image';
		}else{
			$insert_employee = $conn->prepare("INSERT INTO `employee`(id, name, profession, email, number, profile_desc, profile, status) VALUES(?,?,?,?,?,?,?,?)");

			$insert_employee->execute([$id, $name, $profession, $email, $number, $content, $rename, $status]);

			$success_msg[] = 'employee save as draft successfully';
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
			<h1>add employee</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="dashboard.php">admin</a><i class="bx bx-right-arrow-alt"></i>add employee</span>
		</div>
	</div>
	
	<section class="add_services">
		<div class="heading">
			<h1>add employee</h1>
			<img src="../image/layer.png" width="100">
		</div>
		<div class="form-container">
			<form action="" method="post" enctype="multipart/form-data" class="register">
				<div class="flex">
					<div class="col">
						<div class="input-field">
							<p>your name <span>*</span></p>
							<input type="text" name="name" placeholder="add your name" required class="box">
						</div>
						<div class="input-field">
							<p>your email <span>*</span></p>
							<input type="email" name="email" placeholder="add your email" required class="box">
						</div>
					</div>
					<div class="col">
						<div class="input-field">
							<p>your profession <span>*</span></p>
							<input type="text" name="profession" placeholder="add your profession" required class="box">
						</div>
						<div class="input-field">
							<p>your number <span>*</span></p>
							<input type="number" name="number" placeholder="add your number" required class="box">
						</div>
					</div>
				</div>
				<div class="input-field">
					<p>profile description <span>*</span></p>
					<textarea name="content" required placeholder="profile description" class="box"></textarea>
				</div>
				<div class="input-field">
					<p>selelct profile <span>*</span></p>
					<input type="file" name="image" accept="image/*" required class="box">

				</div>
				<div class="flex-btn">
					<button type="submit" name="add_employee" class="btn">add employee</button>
					<button type="submit" name="draft" class="btn">save as draft</button>
				</div>
			</form>
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