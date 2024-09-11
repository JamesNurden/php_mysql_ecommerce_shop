<?php 
	include 'connect.php';

	if (isset($_COOKIE['admin_id'])) {
		$admin_id = $_COOKIE['admin_id'];
	}else{
		$admin_id = '';
		header('location:login.php');
	}

	if (isset($_POST['update'])) {
		
		$select_admin = $conn->prepare("SELECT * FROM `admin` WHERE id = ? LIMIT 1");
		$select_admin->execute([$admin_id]);
		$fetch_admin = $select_admin->fetch(PDO::FETCH_ASSOC);

		$prev_pass = $fetch_admin['password'];
		$prev_image = $fetch_admin['image'];

		$name = $_POST['name'];
		$name = filter_var($name, FILTER_SANITIZE_STRING);

		$email = $_POST['email'];
		$email = filter_var($email, FILTER_SANITIZE_STRING);


		//update user name
		if (!empty($name)) {
			$update_name = $conn->prepare("UPDATE `admin` SET name = ? WHERE id = ?");
			$update_name->execute([$name, $admin_id]);
			$success_msg[] = 'username updated successfully';
		}
		//update user mail address

		if (!empty($email)) {
			$select_email = $conn->prepare("SELECT email FROM `admin` WHERE id = ? AND email= ?");
			$select_email->execute([$admin_id, $email]);

			if ($select_email->rowCount() > 0) {
				$warning_msg[] = 'email already taken!';
			}else{
				$update_email = $conn->prepare("UPDATE `admin` SET email = ? WHERE id = ?");
				$update_email->execute([$email, $admin_id]);
				$success_msg[] = 'email updated successfully';
			}
		}

		//update profile
		$image = $_FILES['image']['name'];
		$image = filter_var($image, FILTER_SANITIZE_STRING);
		$ext = pathinfo($image, PATHINFO_EXTENSION);
		$rename = unique_id().'.'.$ext;
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = '../uploaded_files/'.$rename;

		if (!empty($image)) {
			if ($image_size > 2000000) {
				$warning_msg[] = 'image size is too large';
			}else{
				$update_image = $conn->prepare("UPDATE `admin` SET `image` = ? WHERE id = ?");
				$update_image->execute([$rename, $admin_id]);
				move_uploaded_file($image_tmp_name, $image_folder);

				if ($prev_image != '' AND $prev_image != $rename) {
					unlink('../uploaded_files/'.$prev_image);
				}
				$success_msg[] = 'image updated successfully';
			}
		}

		//update password
		$empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
	   $old_pass = sha1($_POST['old_pass']);
	   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
	   $new_pass = sha1($_POST['new_pass']);
	   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
	   $cpass = sha1($_POST['cpass']);
	   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

	   if($old_pass != $empty_pass){
	      if($old_pass != $prev_pass){
	         $warning_msg[] = 'old password not matched!';
	      }elseif($new_pass != $cpass){
	         $warning_msg[] = 'confirm password not matched!';
	      }else{
	         if($new_pass != $empty_pass){
	            $update_pass = $conn->prepare("UPDATE `admin` SET password = ? WHERE id = ?");
	            $update_pass->execute([$cpass, $admin_id]);
	            $success_msg[] = 'password updated successfully!';
	         }else{
	            $warning_msg[] = 'please enter a new password!';
	         }
	      }
	   }

	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- box icon cdn link  -->
   	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   	<link rel="stylesheet" type="text/css" href="../css/admin_style.css?v=<?php echo time(); ?>">
	<title>lereana - spa and wellness center website</title>
</head>
<body>

	<?php include '../components/admin_header.php'; ?>
	<div class="banner">
		<div class="detail">
			<h1>update profile</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="dashboard.php">admin</a><i class="bx bx-right-arrow-alt"></i>update profile</span>
		</div>
	</div>
	
	<section class="form-container"> 
		<form action="" method="post" enctype="multipart/form-data" class="register">
			<div class="img-box">
				<img src="../uploaded_files/<?= $fetch_profile['image']; ?>" class="img">
			</div>
			<h3>update profile</h3>
			<div class="flex">
				<div class="col">
					<div class="input-field">
						<p>your name</p>
						<input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>" class="box">
					</div>
					<div class="input-field">
						<p>your email</p>
						<input type="email" name="email" placeholder="<?= $fetch_profile['email']; ?>" class="box">
					</div>
					<div class="input-field">
						<p>update profile</p>
						<input type="file" name="image" accept="image/*" class="box">
					</div>
				</div>
				<div class="col">
					<div class="input-field">
						<p>old password</p>
						<input type="password" name="old_pass" placeholder="enter your old password" class="box">
					</div>
					<div class="input-field">
						<p>new password</p>
						<input type="password" name="new_pass" placeholder="enter your new password" class="box">
					</div>
					<div class="input-field">
						<p>confirm password</p>
						<input type="password" name="cpass" placeholder="confirm password" class="box">

					</div>
				</div>
			</div>
			<input type="submit" name="update" class="btn" value="update profile">
		</form>
		
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