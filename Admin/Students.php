<?php
include_once("Header.php");
include_once("../DB_Files/db.php");

$output = ''; // Initialize the $output variable

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List of Students</p>
    <?php

    if ($result->num_rows > 0) {
        echo '<table class="table">
            <tr>
                <th class="text-dark fw-bolder">Student ID</th>
                <th class="text-dark fw-bolder">Name</th>
                <th class="text-dark fw-bolder">Email</th>
                <th class="text-dark fw-bolder">Action</th>
            </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td class="text-dark fw-bolder">' . $row["stu_id"] . '</td>';
            echo '<td class="text-dark fw-bolder">' . $row["stu_name"] . '</td>';
            echo '<td class="text-dark fw-bolder">' . $row["stu_email"] . '</td>';
            echo '<td class="text-dark fw-bolder">
                    <form action="editStudent.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value=' . $row["stu_id"] . '>
                        <button type="submit" class="btn btn-info mr-3 fw-bolder" name="view" value="View">View</button>
                    </form>
                </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p class="text-dark p-2 fw-bolder">Student Not Found.</p>';
    }
    ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>