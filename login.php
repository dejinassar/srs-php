<?php
include_once("Inc/header.php");

?>
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
        font-weight: bolder;
    }

    #error-box {
        display: <?php echo !empty($_SESSION['errors']) ? 'block' : 'none'; ?>;
    }
</style>
</head>

<body>


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
</body>

</html>