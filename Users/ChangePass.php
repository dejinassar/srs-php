<?php
include_once("../DB_Files/db.php");
include_once("ProfileHeader.php");

$stu_email = $_SESSION['stu_email'];
$sql = "SELECT stu_img FROM students WHERE stu_email='$stu_email'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuImg = $row["stu_img"];
}
if (isset($_REQUEST['updatePass'])) {
    if (empty($_REQUEST['stu_pass'])) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields Required</div>';
    } else {
        $stu_pass = $_REQUEST['stu_pass'];

        // Validate the new password before hashing
        if (strlen($stu_pass) < 8) {
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Password must be at least 8 characters long</div>';
        } else {
            // Hash the password 
            $hashed_password = password_hash($stu_pass, PASSWORD_BCRYPT);

            $sql = "UPDATE students SET stu_pass='$hashed_password' WHERE stu_email='$stu_email'";
            if ($conn->query($sql) === TRUE) {
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Password Updated Successfully</div>';


                // Destroy the current session to log out the student
                session_destroy();

                // Redirect to the login page for re-login
                header("Location:Logout.php");
                exit();
            } else {
                $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Password Update Failed</div>';
            }
        }
    }
}


?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css" rel="stylesheet">
<style>
    /* Custom Styles */
    body {
        background-color: #f8f9fa;
    }

    .profile-content {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .profile-image {
        max-width: 200px;
        height: auto;
        margin-bottom: 20px;
        border-radius: 50%;
    }

    .profile-form label {
        font-weight: 600;
    }

    .profile-form input[type="file"] {
        display: none;
    }

    .profile-form label.upload-label {
        cursor: pointer;
        color: #007bff;
        text-decoration: underline;
    }

    .profile-form label.upload-label:hover {
        text-decoration: none;
    }

    /* Sidebar Styles */
    .sidebar {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding-top: 20px;
    }

    .sidebar .img-thumbnail {
        display: block;
        margin: 0 auto;
        border: 5px solid #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .sidebar .nav-link {
        color: #333;
        font-weight: 600;
        padding: 10px 20px;
        margin-bottom: 5px;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .sidebar .nav-link.active {
        background-color: var(--primary);
        color: #fff;
        border-radius: 25px 0 0 25px;
    }

    .sidebar .nav-link i {
        font-size: 20px;
        margin-right: 10px;
    }

    .sidebar .nav-link .uil {
        font-size: 24px;
        margin-right: 10px;
    }

    .sidebar-sticky {
        position: sticky;
        top: 100px;
    }
</style>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stuImg ?>" alt="" class="img-thumbnail rounded-circle" style="margin-left: 10px; height: 150px; width: 150px;">
                        </li>
                        <li class="nav-item">
                            <a href="Profile.php" class="nav-link">
                                <i class="uil uil-user-square"></i>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="MyCourse.php" class="nav-link">
                                <i class="uil uil-book"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="ChangePass.php" class="nav-link">
                                <i class="uil uil-key-skeleton-alt"></i>
                                Change Password
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="col-sm-9 mt-5 ms-5">
                <div class="row">
                    <div class="col-sm-6">
                        <form method="POST" enctype="multipart/form-data" class="mx-5 mt-5">
                            <p class="btn btn-primary">Change Password</p>
                            <?php if (isset($passmsg)) {
                                echo $passmsg;
                            } ?>
                            <div class="form-group">
                                <label class="text-dark" for="email">Email</label>
                                <input type="text" id="email" class="form-control" value="<?php echo $_SESSION['stu_email'] ?>" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="text-dark" for="stu_pass">New Password</label>
                                <input type="password" id="stu_pass" name="stu_pass" class="form-control">

                            </div>
                            <br>
                            <button type="submit" name="updatePass" class="btn btn-primary">Update</button>
                            <br><br><br>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            include_once("../Inc/footer.php");
            ?>
            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/wow/wow.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="js/main.js"></script>

</body>

</html>