<?php
include_once("DB_Files/db.php");
include_once("Inc/header.php");

$fname = '';
$mail = '';
$password = '';
$cpassword = '';
$error_msg = array();
$Message = '';
$success = false;

if (isset($_POST['signup'])) {
    $fname = $_POST['name'];
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['c_password'];

    // Name Validation
    $name = $_POST['name'];
    if (empty($name)) {
        $error_msg['Name'] = "Full Name is Required";
    } elseif (!preg_match("/^[a-zA-Z -]*$/", $name)) {
        $error_msg['Name'] = "Name Must be Only Letters";
    } elseif (strlen($name) < 5) {
        $error_msg['Name'] = "Name Must be Minimum 5 Letters";
    }

    // Email Validation
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg['Email'] = "Invalid Email Address";
    }

    // Password Validation
    $pass = $_POST['password'];
    if (empty($pass)) {
        $error_msg['Password'] = "Password is Required";
    }

    // Confirm Password Validation
    $pass2 = $_POST['c_password'];
    if (empty($pass2)) {
        $error_msg['C_password'] = "Confirm Password is Required";
    }

    // Check if passwords match
    if ($pass != $pass2) {
        $error_msg['C_password'] = "Passwords Do Not Match";
    }

    // Password Strength Validation
    if (
        !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z@&$!#*^%]{6,20}$/', $pass)
    ) {
        $error_msg['Password'] = "Password must meet the following criteria:";
        $error_msg['Password_1'] = "- At least 6 characters.";
        $error_msg['Password_2'] = "- At least one digit (0-9).";
        $error_msg['Password_3'] = "- At least one letter (uppercase or lowercase, A-Za-z).";
    }

    // Signup Code
    if (empty($error_msg)) {
        // Check if the email is already taken
        $email_query = "SELECT * FROM students WHERE stu_email='$email'";
        $email_query_run = mysqli_query($conn, $email_query);
        if (mysqli_num_rows($email_query_run) > 0) {
            $error_msg['Email'] = "Email Already Taken";
        } else {
            // Hash the password
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            // Insert user data into the database
            $sql = "INSERT INTO students (stu_name, stu_email, stu_pass) VALUES ('$name', '$email', '$hashed_password')";
            if ($conn->query($sql)) {
                $success = true;
                $Message = "Registration Successful. You can now login.";
                $fname = "";
                $mail = "";
                $password = '';
                $cpassword = '';
            } else {
                $error_msg['Server'] = "Server Error";
            }
        }
    }
}
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
        }

        .contact__form {
            margin-top: 20px;
        }

        .close-button {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            cursor: pointer;
            color: white;
            font-weight: bold;
        }

        .close-button:hover {
            background-color: #333;
        }
    </style>

</head>

<body>

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

    <?php
    include_once("Inc/footer.php");
    ?>

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


</body>

</html>