<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once("Inc/header.php");
include_once("DB_Files/db.php");
?>
   <style>
    /* Custom styles for the Forgot Password page */
body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

.card {
    border: none;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.card-title {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

.form-label {
    font-weight: bold;
}



.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border-color: #f5c6cb;
    margin-top: 20px;
}

.text-center {
    text-align: center;
}

.mt-3 {
    margin-top: 15px;
}

/* Adjust the container width and spacing */
.container {
    margin-top: 50px;
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

    <!-- Forgot Password Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Forgot Password</h2>
                        <!-- Error Box -->
                        <?php
                        if (!empty($errors)) {
                            echo '<div class="alert alert-danger">';
                            foreach ($errors as $error) {
                                echo $error . '<br>';
                            }
                            echo '</div>';
                        }
                        ?>
                        <form action="forget-password.php" method="POST" class="form" id="forgot-password">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your email" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <!-- Return to the login page link -->
                        <div class="mt-3 text-center">
                            <a href="login.php" class="btn btn-primary">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
include_once("Inc/footer.php");?>

    <!-- Back to Top button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

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
