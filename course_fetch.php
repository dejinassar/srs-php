<?php
include_once("DB_Files/db.php");

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    
    // Perform a database query to search for courses based on the search input
    $sql = "SELECT * FROM course WHERE course_name LIKE '%$search%' OR course_author LIKE '%$search%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Output the search results in HTML format, similar to course cards
            echo '
            <article class="course">
                <a href="CourseDetails.php?course_id=' . $row['course_id'] . '">
                    <div class="course__image">
                        <img src="' . str_replace('..', '.', $row['course_img']) . '" alt="">
                    </div>
                    <div class="course__info">
                        <h3>' . $row['course_name'] . '</h3>
                        <h5>' . $row['course_author'] . '</h5>
                        <h4>&#36;' . $row['course_price'] . '</h4>
                        <br>
                        <a href="CourseDetails.php?course_id=' . $row['course_id'] . '">
                            <button class="btn btn-primary button">Learn More</button>
                        </a>
                    </div>
                </a>
            </article>';
        }
    } else {
        // Handle the case when no results are found
        echo "No results found.";
    }
}
?>
