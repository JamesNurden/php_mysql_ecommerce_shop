<?php 
	include 'connect.php';

	if (isset($_COOKIE['admin_id'])) {
		$admin_id = $_COOKIE['admin_id'];
	}else{
		$admin_id = '';
		header('location:login.php');
	}

	//adding service in database
	if (isset($_POST['add_service'])) {
		
		$id = unique_id();

		$name = $_POST['name'];
		$name = filter_var($name, FILTER_SANITIZE_STRING);

		$price = $_POST['price'];
		$price = filter_var($price, FILTER_SANITIZE_STRING);

		$content = $_POST['content'];
		$content = filter_var($content, FILTER_SANITIZE_STRING);

		$category = $_POST['category'];
		$category = filter_var($category, FILTER_SANITIZE_STRING);

		$image = $_FILES['image']['name'];
		$image = filter_var($image, FILTER_SANITIZE_STRING);
		$ext = pathinfo($image, PATHINFO_EXTENSION);
		$rename = unique_id().'.'.$ext;
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = '../uploaded_files/'.$rename;

		$status = 'active';

		$select_image = $conn->prepare("SELECT * FROM `services` WHERE image = ?");
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
			$insert_service = $conn->prepare("INSERT INTO `services`(id, name, price, image, service_detail, category, status) VALUES(?,?,?,?,?,?,?)");
			$insert_service->execute([$id, $name, $price, $rename, $content, $category, $status]);
			$success_msg[] = 'service added successfully';
		}

	}

	//adding service in database as draft
	if (isset($_POST['draft'])) {
		
		$id = unique_id();

		$name = $_POST['name'];
		$name = filter_var($name, FILTER_SANITIZE_STRING);

		$price = $_POST['price'];
		$price = filter_var($price, FILTER_SANITIZE_STRING);

		$content = $_POST['content'];
		$content = filter_var($content, FILTER_SANITIZE_STRING);

		$category = $_POST['category'];
		$category = filter_var($category, FILTER_SANITIZE_STRING);

		$image = $_FILES['image']['name'];
		$image = filter_var($image, FILTER_SANITIZE_STRING);
		$ext = pathinfo($image, PATHINFO_EXTENSION);
		$rename = unique_id().'.'.$ext;
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = '../uploaded_files/'.$rename;

		$status = 'deactive';

		$select_image = $conn->prepare("SELECT * FROM `services` WHERE image = ?");
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
			$insert_service = $conn->prepare("INSERT INTO `services`(id, name, price, image, service_detail, category, status) VALUES(?,?,?,?,?,?,?)");
			$insert_service->execute([$id, $name, $price, $rename, $content, $category, $status]);
			$success_msg[] = 'service save as draft';
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
			<h1>add services</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
	        <span><a href="dashboard.php">admin</a><i class="bx bx-right-arrow-alt"></i>add services</span>
		</div>
	</div>

	<section class="add_services">
		<div class="heading">
			<h1>add services</h1>
			<img src="../image/layer.png" width="100">
		</div>
		<div class="form-container">
			<form action="" method="post" enctype="multipart/form-data" class="register">
				<div class="input-field">
					<p>service name <span>*</span></p>
					<input type="text" name="name" placeholder="add service name" required class="box">
				</div>
				<div class="input-field">
					<p>service price <span>*</span></p>
					<input type="number" name="price" placeholder="add service price" required class="box">
				</div>
				<div class="input-field">
					<p>service description <span>*</span></p>
					<textarea name="content" required placeholder="service description" class="box"></textarea>
				</div>
				<div class="input-field">
					<p>service category <span>*</span></p>
					<select name="category" class="box">
						<option selected disabled>select category</option>
						<option value="spa programs">spa programs</option>
						<option value="massages">massages</option>
						<option value="facial">facial</option>
						<option value="body treatment">body treatment</option>
						<option value="for couple">for couple</option>
					</select>
				</div>
				<div class="input-field">
					<p>service image <span>*</span></p>
					<input type="file" name="image" accept="image/*" required class="box">

				</div>
				<div class="flex-btn">
					<button type="submit" name="add_service" class="btn">add service</button>
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