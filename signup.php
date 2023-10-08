<?php
include_once("DB_Files/db.php");
include_once("Inc/header.php");

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Pediforte|Join Now</title>
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
    <link rel="stylesheet" href="css/sign.css">
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

        #message-popup {
            display: <?php echo $Message ? 'block' : 'none'; ?>;
            background-color: #009688;
            color: white;
            padding: 10px;
            position: relative;
            margin-top: 20px;
            /* Add space between the form and the message */
        }

        .contact__form {
            margin-top: 20px;
            /* Adjust the margin-top value as needed */
        }

        .close-button {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            cursor: pointer;
            color: white;
            /* Text color for close button */
            font-weight: bold;
            /* Make the close button more prominent */
        }

        .close-button:hover {
            background-color: #333;
            /* Change background color on hover */
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

    <!-- Navbar End -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Sign Up</h2>
                        <div id="response-message">
                            <?php
                            if (!empty($error_msg)) {
                                echo '<div class="alert alert-danger error-message">';
                                foreach ($error_msg as $error) {
                                    echo $error . "<br>";
                                }
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div id="message-popup" class="mb-4">
                            <?php echo $Message; ?>
                            <span class="close-button" onclick="closeMessage()">X</span>
                        </div>
                        <form action="" method="POST" class="form" id="register">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" required <?php echo 'value="' . $fname . '"' ?>>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your email" required <?php echo 'value="' . $mail . '"' ?>>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required <?php echo 'value="' . $password . '"' ?>>
                                <i class="fa fa-eye password-toggle" onclick="togglePasswordVisibility('password')"></i>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="c_password" placeholder="Confirm your password" required <?php echo 'value="' . $cpassword . '"' ?>>
                                <i class="fa fa-eye password-toggle" onclick="togglePasswordVisibility('confirm-password')"></i>
                            </div>
                            <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
                        </form>

                        <p class="mt-3 text-center">Already have an account? <a href="login.php">Sign In</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add this <div> below your form -->
    <div id="response-message"></div>

    <?php
    include_once("Inc/footer.php");
    ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script>
        function closeMessage() {
            document.getElementById('message-popup').style.display = 'none';
        }

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