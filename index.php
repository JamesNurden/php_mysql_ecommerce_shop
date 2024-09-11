<?php
// Include the database connection file
include 'connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spa Salon</title>

    <!-- Include the appropriate CSS based on the page -->
    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'admin') {
        echo '<link rel="stylesheet" href="css/admin_style.css">';
    } else {
        echo '<link rel="stylesheet" href="css/user_style.css">';
    }
    ?>
</head>
<body>
    <?php
    // Include the appropriate header based on the user/admin view
    if (isset($_GET['page']) && $_GET['page'] == 'admin') {
        include 'components/admin_header.php';
    } else {
        include 'components/user_header.php';
    }
    ?>

    <!-- Page Routing Logic -->
    <?php
    // Determine which page to load based on the 'page' parameter in the URL
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    switch ($page) {
        case 'home':
            include 'home.php';
            break;
        case 'services':
            include 'services.php';
            break;
        case 'contact':
            include 'contact.php';
            break;
        case 'about':
            include 'about.php';
            break;
        case 'register':
            include 'register.php';
            break;
        case 'login':
            include 'login.php';
            break;
        case 'profile':
            include 'profile.php';
            break;
        case 'appointment':
            include 'appointment.php';
            break;
        case 'book_appointment':
            include 'book_appointment.php';
            break;
        case 'view_appointment':
            include 'view_appointment.php';
            break;
        case 'search_service':
            include 'search_service.php';
            break;
        case 'employee_detail':
            include 'employee_detail.php';
            break;
        case 'admin':
            include 'admin/dashboard.php';
            break;
        // Add more cases as needed for other pages
        default:
            include 'home.php'; // Default to home.php if no valid page is found
    }
    ?>

    <!-- Include the appropriate footer based on the user/admin view -->
    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'admin') {
        include 'components/admin_footer.php';
    } else {
        include 'components/user_footer.php';
    }
    ?>

    <!-- JavaScript Files -->
    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'admin') {
        echo '<script src="js/admin_script.js"></script>';
    } else {
        echo '<script src="js/user_script.js"></script>';
    }
    ?>
</body>
</html>
