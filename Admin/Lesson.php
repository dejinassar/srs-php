<?php
include_once("Header.php");
include_once("../DB_Files/db.php");
?>

<div class="col-sm-9 mt-5">
    <h5 class="mt-5 bg-dark text-white p-2">List of Lessons</h5>
    <?php
    // Fetch all lessons from the database
    $sql = "SELECT * FROM lesson";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-dark fw-bolder">Lesson ID</th>
                    <th class="text-dark fw-bolder">Lesson Name</th>
                    <th class="text-dark fw-bolder">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($lesson = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <th class="text-dark fw-bolder" scope="row"><?php echo $lesson['lesson_id']; ?></th>
                        <td class="text-dark fw-bolder"><?php echo $lesson['lesson_name']; ?></td>
                        <td>
                            <form action="editLesson.php" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $lesson['lesson_id']; ?>">
                                <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="uil uil-pen"></i></button>
                            </form>
                            <form action="" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $lesson['lesson_id']; ?>">
                                <button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="uil uil-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
        echo '<p class="text-dark p-2 fw-bolder">No lessons found.</p>';
    }
    ?>
    <div>
        <a href="addLesson.php" class="btn btn-danger box">
            <i class="uil uil-plus fa-2x"></i>
        </a>
    </div>
</div>