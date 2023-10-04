<?php
include_once("Inc/header.php");
include_once("DB_Files/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style>
        /* Add these styles for better UI */
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #f8f9fa;
        }

        /* Categories styles */
        .category {
            background-color: #ffffff;
            padding: 40px 0;
        }

        .section-title {
            background-color: #ffffff;
            color: #007bff;
            font-weight: 500;
        }

        .category h1 {
            color: #343a40;
            font-size: 32px;
        }

        .category h5 {
            color: #343a40;
            font-weight: 500;
            margin-top: 10px;
        }

        .category img {
            border-radius: 5px;
            transition: transform 0.3s;
        }

        .category img:hover {
            transform: scale(1.05);
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

        /* New styles for responsive course cards */
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

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .course {
                flex: 1 1 calc(50% - 20px);
            }
        }

        @media screen and (max-width: 576px) {
            .course {
                flex: 1 1 100%;
            }

            /* Adjust styles for smaller screens */
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
        .course__info {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center horizontally */
            text-align: center; /* Center text within the card */
        }

        .course__info h3,
        .course__info h5,
        .course__info h4,
        .course__info .button {
            margin: 10px 0; /* Add some spacing between elements */
        }


        /* Search Bar styles */
        .search-bar {
            text-align: center;
            margin-bottom: 30px;
        }

        .search-bar input {
            max-width: 300px;
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
    <!-- Header End -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Courses</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Bar -->
    <div class="container search-bar">
        <input type="text" class="form-control" id="search_text" name="search_text" placeholder="Search Here">
    </div>

    <!-- Search Results -->
    <div id="result" class="courses__container"></div>

    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Popular Courses</h1>
            </div>
    </div>
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
    </section>
</body>
</html>

<script>
    //Animation Scroll
    function reveal() {
        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);
</script>

<script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt = $(this).val();
            if(txt != ''){
                $('#result').html('');
                $.ajax({
                    url: "course_fetch.php",
                    type: "post",
                    data: {search: txt},
                    dataType: "text",
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            } else {
                $('#result').html(''); // Clear the search results when the input is empty
            }
        });
    });
</script>
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<?php
include_once("Inc/Footer.php");
?>
<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
