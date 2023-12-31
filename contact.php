<?php
include_once("Inc/header.php");
include_once("DB_Files/db.php");
$Message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $FirstName = $_POST['First_Name'];
    $LastName = $_POST['Last_Name'];
    $Email_Address = $_POST['Email_Address'];
    $Message = $_POST['Message'];

    $sql = "INSERT INTO contact(f_name, l_name, email, msg) VALUES ('$FirstName', '$LastName', '$Email_Address', '$Message')";

    if ($conn->query($sql) === TRUE) {
        // Message sent successfully
        $Message = "Message sent! We will get back to you.";
    } else {
        // Error occurred
        $Message = "Error: " . $conn->error;
    }
}
?>
<style>
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

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Get In Touch</h5>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Office</h5>
                            <p class="mb-0">123 Street, Ibadan, Nigeria</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Mobile</h5>
                            <p class="mb-0">+012 345 67890</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-0">info@pediforte.com</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="" method="POST" class="contact__form">
                        <!-- Message popup div -->
                        <?php if ($Message) : ?>
                            <div id="message-popup" class="mb-4">
                                <?php echo $Message; ?>
                                <span class="close-button" onclick="closeMessage()">X</span>
                            </div>
                        <?php endif; ?>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="First_Name" id="First Name" placeholder="Your First Name" required>
                                    <label for="First Name">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="Last_Name" id="Last Name" placeholder="Your Last Name" required>
                                    <label for="Last Name">Your Last Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="Email_Address" id="Email Address" placeholder="Your Email Address" required>
                                    <label for="Email Address">Email Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="Message" placeholder="Leave a message here" id="Message" style="height: 150px" required></textarea>
                                    <label for="Message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php
    include_once("Inc/footer.php"); ?>
    <!-- JavaScript for closing the message popup -->
    <script>
        function closeMessage() {
            document.getElementById('message-popup').style.display = 'none';
        }
    </script>
</body>