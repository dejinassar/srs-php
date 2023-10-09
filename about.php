<?php
include_once("Inc/header.php");
include_once("DB_Files/db.php"); ?>

<body>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


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
    <!-- FAQ Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Frequently Asked Questions</h6>
                <h2 class="mb-5">Got Questions? We Have Answers!</h2>
            </div>
            <div class="accordion" id="faqAccordion">
                <!-- FAQ Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            Question 1: What is Pediforte?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Pediforte is an online educational platform that offers a wide range of courses and resources to help you expand your knowledge and skills. Our platform provides access to skilled instructors, online classes, home projects, and a vast resources library.
                        </div>
                    </div>
                </div>
                <!-- FAQ Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            Question 2: How can I join Pediforte?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Joining Pediforte is easy! Simply click the "Join Now" button on our website, and you'll be guided through the registration process. Once you're a member, you can explore our courses and start learning.
                        </div>
                    </div>
                </div>
                <!-- FAQ Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Question 3: Are there any free courses available?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, Pediforte offers a selection of free courses that you can enroll in. These courses cover various topics and are a great way to get started on your learning journey without any cost.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ End -->
    <?php
    include_once("Inc/footer.php");
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