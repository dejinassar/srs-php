<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: Index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>
        body {
            font-family: "Roboto", sans-serif;
            background-color: #f8f9fa;
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding-top: 20px;
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

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container-fluid">
                <span>Pediforte Admin</span>
                </button>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-3">
                                <h3>Admin Panel</h3>
                            </li>
                            <li class="nav-item">
                                <a href="Dashboard.php" class="nav-link">
                                    <i class="uil uil-tachometer-fast-alt"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Course.php" class="nav-link">
                                    <i class="uil uil-accessible-icon-alt"></i>
                                    Courses
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Lesson.php" class="nav-link">
                                    <i class="uil uil-accessible-icon-alt"></i>
                                    Lessons
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Students.php" class="nav-link">
                                    <i class="uil uil-user"></i>
                                    Students
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Messages.php" class="nav-link">
                                    <i class="uil uil-envelope-add"></i>
                                    Messages
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="ChangePass.php" class="nav-link">
                                    <i class="uil uil-key-skeleton"></i>
                                    Change Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Logout.php" class="nav-link">
                                    <i class="uil uil-sign-out-alt"></i>
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>



                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>