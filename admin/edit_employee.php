<?php 
	include 'connect.php';

	if (isset($_COOKIE['admin_id'])) {
		$admin_id = $_COOKIE['admin_id'];
	}else{
		$admin_id = '';
		header('location:login.php');
	}

	

	//edit service in database 
	if (isset($_POST['edit_employee'])) {
		
		$emp_id = $_POST['employee_id'];
		$emp_id = filter_var($emp_id, FILTER_SANITIZE_STRING);

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

		$status = $_POST['status'];
		$status = filter_var($status, FILTER_SANITIZE_STRING);

		$update_employee = $conn->prepare("UPDATE `employee` SET name = ?, profession = ?, email = ?, number = ?, profile_desc = ?, status = ? WHERE id = ?");
		$update_employee->execute([$name, $profession, $email, $number, $content, $status, $emp_id]);

		$success_msg[] = 'employee updated successfully';

		//update profile

		$old_image = $_POST['old_image'];
		$image = $_FILES['image']['name'];
		$image = filter_var($image, FILTER_SANITIZE_STRING);
		$ext = pathinfo($image, PATHINFO_EXTENSION);
		$rename = unique_id().'.'.$ext;
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = '../uploaded_files/'.$rename;

		$select_image = $conn->prepare("SELECT * FROM `employee` WHERE image = ?");
		$select_image->execute([$image]);

		if (!empty($image)) {
			if ($image_size > 2000000) {
				$warning_msg[] = 'image size is too large';
			}elseif($select_image->rowCount() > 0 AND $image != ''){
				$warning_msg[] = 'please rename your image';
			}else{
				$update_image = $conn->prepare("UPDATE `employee` SET profile = ? WHERE id = ?");
				$update_image->execute([$rename, $emp_id]);
				 move_uploaded_file($image_tmp_name, $image_folder);

				 
				 $success_msg[] = 'image updated';
			}
		}
		
	
	}

	//delete service

	if (isset($_POST['delete'])) {

		$employee_id = $_POST['employee_id'];
		$employee_id =filter_var($employee_id, FILTER_SANITIZE_STRING);

		$delete_image = $conn->prepare("SELECT * FROM `employee` WHERE id = ?");
		$delete_image->execute([$employee_id]);
		$fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);

		if ($fetch_delete_image['profile'] != '') {
			unlink('../uploaded_files/'.$fetch_delete_image['profile']);
		}
		$delete_employee = $conn->prepare("DELETE FROM `employee` WHERE id = ?");
		$delete_employee->execute([$employee_id]);

		$success_msg[] = 'service deleted successfully';
		header('location:view_employee.php');

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
			<h1>edit services</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="dashboard.php">admin</a><i class="bx bx-right-arrow-alt"></i>edit services</span>
		</div>
	</div>

	<section class="add_services">
		<div class="heading">
			<h1>edit services</h1>
			<img src="../image/layer.png" width="100">
		</div>
		<div class="container">
			<?php 

				$employee_id = $_GET['id'];
				$select_employee = $conn->prepare("SELECT * FROM `employee` WHERE id = ?");
				$select_employee->execute([$employee_id]);

				if ($select_employee->rowCount() > 0) {
					while($fetch_employee = $select_employee->fetch(PDO::FETCH_ASSOC)){


				
			?>
			<div class="form-container">
				<form action="" method="post" enctype="multipart/form-data" class="register">
					<input type="hidden" name="old_image" value="<?= $fetch_employee['profile']; ?>">
					<input type="hidden" name="employee_id" value="<?= $fetch_employee['id']; ?>">
					
					<div class="flex">
						<div class="col">
							<div class="input-field">
								<p>your name <span>*</span></p>
								<input type="text" name="name" value="<?= $fetch_employee['name']; ?>" class="box">
							</div>
							<div class="input-field">
								<p>your email <span>*</span></p>
								<input type="email" name="email" value="<?= $fetch_employee['email']; ?>" class="box">
							</div>
						</div>
						<div class="col">
							<div class="input-field">
								<p>your profession <span>*</span></p>
								<input type="text" name="profession" value="<?= $fetch_employee['profession']; ?>" class="box">
							</div>
							<div class="input-field">
								<p>your number <span>*</span></p>
								<input type="number" name="number" value="<?= $fetch_employee['number']; ?>" class="box">
							</div>
						</div>

					</div>
					<div class="input-field">
						<p>profile description <span>*</span></p>
						<textarea name="content" class="box"><?= $fetch_employee['profile_desc']; ?></textarea>
					</div>
					<div class="input-field">
						<p>employee status <span>*</span></p>
						<select name="status" class="box">
							<option selected disabled value="<?= $fetch_employee['status']; ?>"><?= $fetch_employee['status']; ?></option>
							<option value="active">active</option>
							<option value="deactive">deactive</option>
						</select>

					</div>
					<div class="input-field">
						<p>selelct profile <span>*</span></p>
						<input type="file" name="image" accept="image/*" class="box">

					</div>
					<img src="../uploaded_files/<?= $fetch_employee['profile']; ?>"class="img">
					<div class="flex-btn">
						<button type="submit" name="edit_employee" class="btn">edit employee</button>
						<button type="submit" name="delete" class="btn" onclick="return confirm('want to delete this service');">delete employee</button>
					</div>
				</form>
			</div>
			<?php 
					}
				}else{
					echo '
						<div class="empty">
							<p>no employee added yet ! <br> <a href="add_employee.php" class="btn" style="margin-top: 1rem;">add employee</a> </p>
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