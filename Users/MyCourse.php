<?php
include_once("ProfileHeader.php");
include_once("../DB_Files/db.php");

$stu_email = $_SESSION['stu_email'];
$sql = "SELECT stu_img FROM students WHERE stu_email='$stu_email'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuImg = $row["stu_img"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
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
                    </ul>
                </div>
            </nav>

            <div class="col-sm-8 mt-5 ms-5">
                <div class="row">
                    <div class="jumbotron">
                        <p class="btn btn-primary">Enrolled Courses</p>
                        <br>
                        <?php
                        if (isset($stu_email)) {
                            $sql = "SELECT c.course_id,c.course_name,c.course_duration,c.course_desc,c.course_img,c.course_author FROM courseorder AS co JOIN course AS c ON c.course_id=co.course_id WHERE co.stu_email='$stu_email'";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                        ?>
                                    <div class="bg-white mb-3 p-2 rounded">
                                        <div class="row">
                                            <div class="col-sm-3 m-2">
                                                <img class="card-img-top mt-2 text-light" src="<?php echo $row['course_img']; ?>" alt="">
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="card-body">
                                                    <p class="card-text text-dark fw-bolder card-header bg-light"><?php echo $row['course_name']; ?></p>
                                                    <br>
                                                    <small class="card-text text-dark">Duration (Hours) : <?php echo $row['course_duration'] ?></small> <br />
                                                    <small class="card-text text-dark">Instructor: <?php echo $row['course_author'] ?></small>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <?php
            include_once("../Inc/footer.php");
            ?>
        </div>
    </div>
</body>
</html>
