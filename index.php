<?php
include_once("Inc/header.php");
include_once("DB_Files/db.php");
?>

<body>
    <style>
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #f8f9fa;
        }


        /* Courses styles */
        .courses {
            background-color: #ffffff;
            padding: 60px 0;
        }

        .courses h2 {
            color: #343a40;
            font-size: 32px;
            text-align: center;
            margin-bottom: 40px;
        }

        .courses__container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .course {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin: 15px;
            overflow: hidden;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(33.333% - 20px);
            margin: 10px;
        }

        .course__image img {
            max-width: 100%;
            height: auto;
        }

        .course__info {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .course__info h3,
        .course__info h5,
        .course__info h4,
        .course__info .button {
            margin: 10px 0;
        }


        @media screen and (max-width: 768px) {
            .course {
                flex: 1 1 calc(50% - 20px);
            }
        }

        @media screen and (max-width: 576px) {
            .course {
                flex: 1 1 100%;
            }

            .course h3 {
                font-size: 20px;
            }

            .course h5 {
                font-size: 16px;
            }

            .course h4 {
                font-size: 20px;
            }
        }
    </style>

    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h5 class="text-white text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                    <h1 class="display-3 text-white animated slideInDown">Get Educated Online From Your Home</h1>
                    <p class="fs-5 text-white mb-4 pb-2 animated slideInUp">Empower Your Learning Journey from the Comfort of Your Home – Where Knowledge Meets Convenience!</p>
                    <div class="d-flex justify-content-center animated slideInUp">
                        <?php
                        if (isset($_SESSION['stu_id'])) {
                            echo '
                <a href="Users/Profile.php" class="btn btn-primary py-md-3 px-md-5 me-3">Visit Profile</a>
                ';
                        } else {
                            echo '
                <a href="signup.php" class="btn btn-primary py-md-3 px-md-5 me-3">Get Started</a>
                 ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Skilled Instructors</h5>
                            <p>Expert Guidance from Accomplished Instructors. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Online Classes</h5>
                            <p>Engage in Interactive Online Courses.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">Home Projects</h5>
                            <p>Transform Learning into Home Projects</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Resources</h5>
                            <p>Empower Your Education with Valuable Resources.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to Pediforte</h1>
                    <p class="mb-4">At Pediforte, we believe in the transformative power of education. Our journey began with a simple yet profound vision: to provide accessible, high-quality learning opportunities for individuals around the world, regardless of their backgrounds or circumstances. </p>
                    <p class="mb-4">Today, we stand as a beacon of inspiration for lifelong learners, a trusted partner in educational pursuits, and a community dedicated to fostering knowledge, skills, and personal growth.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->




    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Popular Courses</h1>
            </div>
            <section class="courses">
                <div class="container courses__container">
                    <?php
                    $sql = "SELECT * FROM course";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $course_id = $row['course_id'];
                            $_SESSION["course_id"] = $course_id;
                            echo '
                    <article class="course">
                        <a href="CourseDetails.php?course_id=' . $row['course_id'] . '">
                            <div class="course__image">
                                <img src="' . str_replace('..', '.', $row['course_img']) . '" alt="">
                            </div>
                            <div class="course__info">
                                <h3>' . $row['course_name'] . '</h3>
                                <h5>' . $row['course_author'] . '</h5>
                                <h4>&#x20A6;' . $row['course_price'] . '</h4>
                                <a href="CourseDetails.php?course_id=' . $row['course_id'] . '" class="btn btn-primary button">Learn More</a>
                            </div>
                        </a>
                    </article>';
                        }
                    }
                    ?>
                </div>

        </div>
    </div>
    </section>
    <!-- Courses End -->


    <?php
    include_once("Inc/footer.php");
    ?>

</body>

</html>