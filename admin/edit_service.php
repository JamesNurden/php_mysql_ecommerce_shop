<?php 
	include 'connect.php';

	if (isset($_COOKIE['admin_id'])) {
		$admin_id = $_COOKIE['admin_id'];
	}else{
		$admin_id = '';
		header('location:login.php');
	}

	

	//edit service in database 
	if (isset($_POST['edit_service'])) {
		
		$service_id = $_POST['service_id'];
		$service_id =filter_var($service_id, FILTER_SANITIZE_STRING);

		$name = $_POST['name'];
		$name = filter_var($name, FILTER_SANITIZE_STRING);

		$price = $_POST['price'];
		$price = filter_var($price, FILTER_SANITIZE_STRING);

		$content = $_POST['content'];
		$content = filter_var($content, FILTER_SANITIZE_STRING);

		$category = $_POST['category'];
		$category = filter_var($category, FILTER_SANITIZE_STRING);

		$status = $_POST['status'];
		$status = filter_var($status, FILTER_SANITIZE_STRING);

		$update_service = $conn->prepare("UPDATE `services` SET name = ?, price = ?, service_detail = ?, category = ?, status = ? WHERE id = ?");
		$update_service->execute([$name, $price,$content, $category, $status, $service_id]);

		$success_msg[] = 'service updated';

		$old_image = $_POST['old_image'];
		$image = $_FILES['image']['name'];
		$image = filter_var($image, FILTER_SANITIZE_STRING);
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = '../uploaded_files/'.$image;


		$select_image = $conn->prepare("SELECT * FROM `services` WHERE image = ?");
		$select_image->execute([$image]);

		if (!empty($image)) {
			if ($image_size > 2000000) {
				$warning_msg[] = 'image size is too large';
			}elseif($select_image->rowCount() > 0 AND $image != ''){
				$warning_msg[] = 'please rename your image';
			}else{
				$update_image = $conn->prepare("UPDATE `services` SET image = ? WHERE id = ?");
				$update_image->execute([$image, $service_id]);

				move_uploaded_file($image_tmp_name, $image_folder);

				if ($old_image != $image AND $old_image != '') {
					unlink('../uploaded_files/'.$old_image);
				}
				$success_msg[] = 'image updated';
			}
		}
	}

	//delete service

	if (isset($_POST['delete'])) {

		$service_id = $_POST['service_id'];
		$service_id =filter_var($service_id, FILTER_SANITIZE_STRING);

		$delete_image = $conn->prepare("SELECT * FROM `services` WHERE id = ?");
		$delete_image->execute([$service_id]);
		$fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);

		if ($fetch_delete_image['image'] != '') {
			unlink('../uploaded_files/'.$fetch_delete_image['image']);
		}
		$delete_service = $conn->prepare("DELETE FROM `services` WHERE id = ?");
		$delete_service->execute([$service_id]);

		$success_msg[] = 'service deleted successfully';

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

				$service_id = $_GET['id'];
				$select_service = $conn->prepare("SELECT * FROM `services` WHERE id = ?");
				$select_service->execute([$service_id]);

				if ($select_service->rowCount() > 0) {
					while($fetch_service = $select_service->fetch(PDO::FETCH_ASSOC)){


				
			?>
			<div class="form-container">
				<form action="" method="post" enctype="multipart/form-data" class="register">
					<input type="hidden" name="old_image" value="<?= $fetch_service['image']; ?>">
					<input type="hidden" name="service_id" value="<?= $fetch_service['id']; ?>">
					<div class="input-field">
						<p>service status <span>*</span></p>
						<select name="status" class="box">
							<option selected value="<?= $fetch_service['status']; ?>"><?= $fetch_service['status']; ?></option>
							<option value="active">active</option>
							<option value="deactive">deactive</option>
						</select>
					</div>
					<div class="input-field">
						<p>service name <span>*</span></p>
						<input type="text" name="name" value="<?= $fetch_service['name']; ?>" class="box">
					</div>
					<div class="input-field">
						<p>service price <span>*</span></p>
						<input type="number" name="price" value="<?= $fetch_service['price']; ?>" class="box">
					</div>
					<div class="input-field">
						<p>service description <span>*</span></p>
						<textarea name="content" placeholder="service description" class="box"><?= $fetch_service['service_detail']; ?></textarea>
					</div>
					<div class="input-field">
						<p>service category <span>*</span></p>
						<select name="category" class="box">
							<option selected disabled value="<?= $fetch_service['category']; ?>"><?= $fetch_service['category']; ?></option>
							<option value="spa programs">spa programs</option>
							<option value="massages">massages</option>
							<option value="facial">facial</option>
							<option value="body treatment">body treatment</option>
							<option value="for couple">for couple</option>
						</select>
					</div>
					<div class="input-field">
						<p>service image <span>*</span></p>
						<input type="file" name="image" accept="image/*" class="box">
						<img src="../uploaded_files/<?= $fetch_service['image'] ?>" class="img">
					</div>
					<div class="flex-btn">
						<button type="submit" name="edit_service" class="btn">edit service</button>
						<button type="submit" name="delete" class="btn" onclick="return confirm('want to delete this service');">delete service</button>
					</div>
				</form>
			</div>
			<?php 
					}
				}else{
					echo '
						<div class="empty">
							<p>no services added yet ! <br> <a href="add_service.php" class="btn" style="margin-top: 1rem;">add service</a> </p>
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