<?php
include_once("ProfileHeader.php");
include_once("../DB_Files/db.php");

$stu_email = $_SESSION['stu_email'];
$sql = "SELECT * FROM students WHERE stu_email='$stu_email'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row['stu_id'];
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_occ"];
    $stuImg = $row["stu_img"];
}

if (isset($_REQUEST['updateStuNameBtn'])) {
    if (empty($_REQUEST['stuName'])) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields Required</div>';
    } else {
        $stuName = $_REQUEST["stuName"];
        $stuOcc = $_REQUEST["stuOcc"];

        // Check if a new profile picture is uploaded
        if (!empty($_FILES['stuImg']['name'])) {
            $stu_image = $_FILES['stuImg']['name'];
            $stu_image_temp = $_FILES['stuImg']['tmp_name'];
            $img_folder = '../Img/Student/' . $stu_image;
            move_uploaded_file($stu_image_temp, $img_folder);
        } else {
            $img_folder = $stuImg; // Keep the existing profile picture URL
        }

        $sql = "UPDATE students SET stu_name='$stuName',
        stu_occ='$stuOcc',stu_img='$img_folder' WHERE stu_email='$stu_email'";
        if ($conn->query($sql) == TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
            $stuImg = $img_folder; // Update the displayed image URL
        } else {
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Updated Failed</div>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css" rel="stylesheet">
    <style>
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
</head>

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
                        <!-- Add more menu items as needed -->
                    </ul>
                </div>
            </nav>
            <div class="col-sm-9">
                <div class="profile-content">
                    <p class="btn btn-primary">Public Profile</p>
                    <form method="POST" enctype="multipart/form-data">
                        <!-- Your form content goes here -->
                        <?php if (isset($passmsg)) {
                            echo $passmsg;
                        } ?>
                        <div class="form-group">
                            <label class="text-dark" for="stuId">Student ID</label>
                            <input type="text" id="stuId" class="form-control" name="stuId" value="<?php if (isset($stuId)) {
                                                                                                        echo $stuId;
                                                                                                    } ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="stuEmail">Student Email</label>
                            <input type="email" id="stuEmail" class="form-control" value="<?php echo $stu_email ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="stuName">Student Name</label>
                            <input type="text" id="stuName" name="stuName" class="form-control" value="<?php if (isset($stuName)) {
                                                                                                            echo $stuName;
                                                                                                        } ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="stuOcc">Student Occupation</label>
                            <input type="text" id="stuOcc" name="stuOcc" class="form-control" value="<?php if (isset($stuOcc)) {
                                                                                                            echo $stuOcc;
                                                                                                        } ?>">
                        </div>

                        <!-- Hidden input field for the profile image URL -->
                        <input type="hidden" name="existing_stuImg" value="<?php echo $stuImg; ?>">
                        <div class="form-group">
                            <label class="text-dark">Upload Image</label>
                            <br>
                            <img src="<?php echo $stuImg; ?>" alt="Profile Image" class="profile-image">
                            <label class="upload-label">
                                <input type="file" id="stuImg" name="stuImg">
                                Choose File
                            </label>
                        </div>
                        <button type="submit" name="updateStuNameBtn" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
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