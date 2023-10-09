<?php
include_once("Inc/Header.php");
include_once("DB_Files/db.php"); // Check if the user is logged in
if (isset($_SESSION['stu_id'])) {
    $stu_email = $_SESSION["stu_email"];
    $cid = $_GET['course_id'];
    $_SESSION["course_id"] = $cid;

    // Fetch course details from the database based on the course ID
    $sql = "SELECT * FROM course WHERE course_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cid); // "i" represents an integer (course_id)
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $course_name = $row['course_name'];
        $amount = $row['course_price'];

        if (isset($_POST['view'])) {
            $sql = "SELECT * FROM courseorder WHERE stu_email=? AND course_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $stu_email, $cid); // "s" for string, "i" for integer
            $stmt->execute();
            $order_result = $stmt->get_result();

            if ($order_result->num_rows > 0) {
                // User is already enrolled, show a message
                echo "<script>alert('You are already enrolled in this course.'); </script>";
            } else {
                // Insert the enrollment into the database
                $date = date("Y-m-d"); // Fix the date format
                $insert_sql = "INSERT INTO courseorder (stu_email, course_id, course_name, amount, date) VALUES ( ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insert_sql);
                $stmt->bind_param("sisss",  $stu_email, $cid, $course_name, $amount, $date); // "s" for string, "i" for integer
                if ($stmt->execute()) {
                    // Enrollment successful, redirect to MyCourse.php
                    header("Location: Users/MyCourse.php");
                    exit();
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        }
    }
}
?>

<style>
    body {
        font-family: 'Heebo', sans-serif;
        background-color: #f8f9fa;
        color: #343a40;
        margin: 0;
        padding: 0;
    }

    #course-inner {
        display: flex;
        justify-content: space-between;
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .overview {
        flex: 1;
        padding: 20px;
    }

    .course-img {
        max-width: 100%;
        height: auto;
    }

    .course-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .c-name {
        font-size: 24px;
        font-weight: 600;
    }

    .price {
        font-size: 20px;
    }

    .tutor {
        margin-top: 20px;
    }

    .tutor-dt {
        font-size: 18px;
        font-weight: 500;
    }

    .description {
        margin-top: 20px;
        font-size: 18px;
    }

    .enroll {
        flex: 1;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }

    .enroll h3 {
        font-size: 24px;
        font-weight: 600;
    }

    .enroll p {
        font-size: 18px;
        margin: 10px 0;
    }

    .enroll-btn {
        margin-top: 20px;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 20px;
        font-weight: 300;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    table {
        width: 100%;
        margin-top: 40px;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    th {
        background-color: #f8f9fa;
    }

    @media screen and (max-width: 768px) {
        #course-inner {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .overview,
        .enroll {
            width: 100%;
        }
    }
</style>
<section id="course-inner">
    <?php
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
        $sql = "SELECT * FROM course WHERE course_id='$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <div class="overview">
        <img class="course-img" src="<?php echo str_replace('..', '.', $row['course_img']) ?>" alt="">
        <div class="course-head">
            <div class="c-name">
                <h3><?php echo $row['course_name'] ?></h3>
            </div>
            <span class="price">&#x20A6;<?php echo $row['course_price'] ?></span>
        </div>
        <h3>Instructor Name</h3>
        <div class="tutor">
            <div class="tutor-dt">
                <p> <?php echo $row['course_author']  ?></p>
            </div>
        </div>
        <h3>Description</h3>
        <p class="description"> <?php echo $row['course_desc']  ?></p>
    </div>

    <div class="enroll">
        <h3>This Course Includes:</h3>
        <p><i class="uil uil-book"></i><?php echo $row['course_lessons']  ?> lectures</p>
        <p><i class="uil uil-clock"></i><?php echo $row['course_duration']  ?> hours on-demand video</p>
        <p><i class="uil uil-life-ring"></i>Full Lifetime Access</p>
        <p><i class="uil uil-mobile-android"></i>Access on mobile</p>
        <div class="enroll-btn">
            <?php
            if (isset($_SESSION['stu_id'])) {
                echo '
            <form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value="' . $row["course_price"] . '">
            <button type="submit" class="btn btn-primary button" name="view">Enroll Now</button>
            </form>
            ';
            } else {
                echo '
            <a href="Popupbox.php" class="btn btn-primary button">Enroll Now</a>
            ';
            }
            ?>
        </div>
    </div>
</section>

<table>
    <thead>
        <th scope="col">Lesson No.</th>
        <th scope="col">Lesson Name</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM lesson";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $num = 0;
            while ($row = $result->fetch_assoc()) {
                if ($course_id == $row['course_id']) {
                    $num++;
                    echo ' <tr class="tr">
                    <th scope="row">' . $num . '</th>
                    <td>' . $row['lesson_name'] . '</td>
                    </tr>';
                }
            }
        }
        ?>
    </tbody>
</table>

<?php
include_once("Inc/Footer.php");
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>