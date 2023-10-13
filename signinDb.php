<?php
session_start();

include_once("DB_Files/db.php");
$errors = [];

if (isset($_POST['login'])) {
    $sigInEmail = $_POST['email2'];
    $signInPassword = $_POST['password2'];
    
    // Check if the "Remember Me" checkbox is selected
    $rememberMe = isset($_POST['rememberMe']) ? 1 : 0;

    if (empty($sigInEmail)) {
        $errors[] = "Email Address is Required";
    }

    if (empty($signInPassword)) {
        $errors[] = "Password is Required";
    }

    if ($sigInEmail && $signInPassword) {
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT stu_id, stu_email, stu_pass FROM students WHERE stu_email = ?");
        $stmt->bind_param("s", $sigInEmail);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($stu_id, $stu_email, $stu_pass);
            $stmt->fetch();

            // Verify the hashed password
            if (password_verify($signInPassword, $stu_pass)) {
                $_SESSION['stu_id'] = $stu_id;
                $_SESSION['stu_email'] = $stu_email;

                // Redirect to index.php upon successful login
                header("Location: index.php");
                exit();
            } else {
                $errors[] = "Incorrect Password";
            }
        } else {
            $errors[] = "User doesn't exist";
        }

        $stmt->close();
    }
}

// Store errors in a session variable
$_SESSION['errors'] = $errors;

// Redirect back to login.php with errors, if any
header("Location: login.php");
exit();
?>
