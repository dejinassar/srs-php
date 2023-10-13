<?php

session_start();
include_once("../DB_Files/db.php");

if (!isset($_SESSION['stu_id'])) {
    header('Location:../index.php');
}
$stu_email = $_SESSION['stu_email'];
if (isset($stu_email)) {
    $sql = "SELECT stu_img FROM students WHERE stu_email='$stu_email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
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
    <link rel="icon" href="../img/download.png" type="image/png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <style>
        .fw-medium {
            font-weight: 600 !important;
        }

        .fw-semi-bold {
            font-weight: 700 !important;
        }


        /*** Button ***/
        .btn {
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            transition: .5s;
        }

        .btn.btn-primary,
        .btn.btn-secondary {
            color: #FFFFFF;
        }

        .btn-square {
            width: 38px;
            height: 38px;
        }

        .btn-sm-square {
            width: 32px;
            height: 32px;
        }

        .btn-lg-square {
            width: 48px;
            height: 48px;
        }

        .btn-square,
        .btn-sm-square,
        .btn-lg-square {
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: normal;
            border-radius: 0px;
        }


        /*** Navbar ***/


        .navbar-light .navbar-nav .nav-link {
            margin-right: 30px;
            padding: 25px 0;
            color: #FFFFFF;
            font-size: 15px;
            text-transform: uppercase;
            outline: none;
        }

        .navbar-light .navbar-nav .nav-link:hover,
        .navbar-light .navbar-nav .nav-link.active {
            color: var(--primary);
        }

        @media (max-width: 991.98px) {
            .navbar-light .navbar-nav .nav-link {
                margin-right: 0;
                padding: 10px 0;
            }

            .navbar-light .navbar-nav {
                border-top: 1px solid #EEEEEE;
            }
        }

        .navbar-light .navbar-brand,
        .navbar-light a.btn {
            height: 75px;
        }

        .navbar-light .navbar-nav .nav-link {
            color: var(--dark);
            font-weight: 500;
        }

        .navbar-light.sticky-top {
            top: -100px;
            transition: .5s;
        }

        /*** Footer ***/
        .footer .btn.btn-social {
            margin-right: 5px;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            font-weight: normal;
            border: 1px solid #FFFFFF;
            border-radius: 35px;
            transition: .3s;
        }

        .footer .btn.btn-social:hover {
            color: var(--primary);
        }

        .footer .btn.btn-link {
            display: block;
            margin-bottom: 5px;
            padding: 0;
            text-align: left;
            color: #FFFFFF;
            font-size: 15px;
            font-weight: normal;
            text-transform: capitalize;
            transition: .3s;
        }

        .footer .btn.btn-link::before {
            position: relative;
            content: "\f105";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            margin-right: 10px;
        }

        .footer .btn.btn-link:hover {
            letter-spacing: 1px;
            box-shadow: none;
        }

        .footer .copyright {
            padding: 25px 0;
            font-size: 15px;
            border-top: 1px solid rgba(256, 256, 256, .1);
        }

        .footer .copyright a {
            color: var(--light);
        }

        .footer .footer-menu a {
            margin-right: 15px;
            padding-right: 15px;
            border-right: 1px solid rgba(255, 255, 255, .1);
        }

        .footer .footer-menu a:last-child {
            margin-right: 0;
            padding-right: 0;
            border-right: none;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="../index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Pediforte</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="../index.php" class="nav-item nav-link active">Home</a>
                <a href="../about.php" class="nav-item nav-link active">About</a>
                <a href="../courses.php" class="nav-item nav-link active">Courses</a>
                <a href="../contact.php" class="nav-item nav-link active">Contact</a>
                <?php
                if (isset($_SESSION['stu_id'])) {
                    $stu_id = $_SESSION['stu_id'];
                    $sql = "SELECT stu_name FROM students WHERE stu_id = $stu_id";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                ?>
                        <a class="nav-item nav-link active" href="Profile.php">
                            <div class="profile-info">
                                <span class="profile-name"><?php echo $user['stu_name']; ?></span>
                            </div>
                        </a>
                        <a class="btn btn-primary py-4 px-lg-5" href="Logout.php">Logout<i class="fa fa-arrow-right ms-3"></i></a>

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


</body>

</html>