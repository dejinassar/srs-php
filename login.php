<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <style>
        .password-toggle {
            position: absolute;
            top: 80%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .error-message {
            background-color: #ffcccc;
            border: 1px solid #ff0000;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            color: #ff0000;
            font-weight: bold;
        }
        #error-box {
            display: <?php echo !empty($_SESSION['errors']) ? 'block' : 'none'; ?>;
        }
    </style>
</head>
<body>

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

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
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="courses.php" class="nav-item nav-link">Courses</a>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
            <?php
            if (isset($_SESSION['stu_id'])) {
                $stu_id = $_SESSION['stu_id'];
                $sql = "SELECT stu_name, stu_img FROM students WHERE stu_id = $stu_id";
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    ?>
                    <a class="nav-item nav-link" href="Users/Profile.php">
                        <div class="profile-info">
                            <?php
                            if (isset($user['stu_img']) && !empty($user['stu_img'])) {
                                // User has uploaded a profile picture, display it
                                ?>
                                <img src="<?php echo $user['stu_img']; ?>" alt="User Profile" class="profile-image">
                                <?php
                            } else {
                                // User has not uploaded a profile picture, display a default user icon from Font Awesome
                                ?>
                                <i class="fa fa-user-circle profile-icon"></i>
                                <?php
                            }
                            ?>
                            <span class="profile-name"><?php echo $user['stu_name']; ?></span>
                        </div>
                    </a>
                    <a class="nav-item nav-link" href="Users/Logout.php">Logout</a>
                    <?php
                }
            } else {
                ?>
                <a href="login.php" class="nav-item nav-link">Login</a>
                <a href="signup.php" class="btn btn-primary py-4 px-lg-5">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- Login Form -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Login</h2>
                    <div id="error-box">
                        <?php
                        if (!empty($_SESSION['errors'])) {
                            echo '<div class="alert alert-danger error-message">';
                            foreach ($_SESSION['errors'] as $error) {
                                echo $error . "<br>";
                            }
                            echo '</div>';
                            unset($_SESSION['errors']); // Clear the errors once displayed
                        }
                        ?>
                    </div>
                    <form action="signinDb.php" method="POST" class="form" id="login">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email2" placeholder="Your email" required>
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password2" id="password" placeholder="Your password" required>
                            <i class="fa fa-eye password-toggle" onclick="togglePasswordVisibility('password')"></i>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember Me</label>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>

                    <!-- Forgot Password and Create an Account Links -->
                    <div class="mt-3 text-center">
                        <a href="forget-password.php">Forgot Password?</a>
                        <span class="mx-2">|</span>
                        <a href="signup.php">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("Inc/footer.php");
?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<script>
    function togglePasswordVisibility(inputId) {
        const passwordField = document.getElementById(inputId);
        const eyeIcon = passwordField.nextElementSibling;

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>

<!-- JavaScript and Footer -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
