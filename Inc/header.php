<?php
include_once("DB_Files/db.php");
session_start();

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Pediforte</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="img/download.png" type="image/png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
        <!-- Unicons CSS -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <style>
        
.profile-image-small {
        width: 35px;
        height: 29px;
        border-radius: 50%;
        object-fit: cover;
    }
    </style>
</head>
<body>
     <!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Pediforte</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="about.php" class="nav-item nav-link active">About</a>
            <a href="courses.php" class="nav-item nav-link active">Courses</a>
            <a href="contact.php" class="nav-item nav-link active">Contact</a>
            <?php
            if (isset($_SESSION['stu_id'])) {
                $stu_id = $_SESSION['stu_id'];
                $sql = "SELECT stu_name FROM students WHERE stu_id = $stu_id";
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    ?>
                    <a class="nav-item nav-link active" href="Users/Profile.php">
                        <div class="profile-info">
                            <span class="profile-name"><?php echo $user['stu_name']; ?></span>
                        </div>
                    </a>
                    <a class="btn btn-primary py-4 px-lg-5" href="Users/Logout.php">Logout<i class="fa fa-arrow-right ms-3"></i></a>
                       
                    <?php
                }
            } else {
                ?>
                <a href="login.php" class="nav-item nav-link active">Login</a>
                <a href="signup.php" class="btn btn-primary py-4 px-lg-5">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
<!-- Navbar End -->
