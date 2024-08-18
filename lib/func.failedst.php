<?php 
function insertFailedStudents() {
    // Create a new instance of the database connection
    $database = new db('localhost', 'root', '', 'drivera_database');

    // Prepare the SQL query to delete students from 'failed_students' table if their result is 'passed' in 'exam' table
    $deletePassedQuery = "DELETE FROM failed_students WHERE studentID IN (
        SELECT Student_ID FROM exam WHERE Result = 'passed'
    )";

    // Execute the delete query to remove the students with 'passed' result in 'exam' table from 'failed_students' table
    $database->query($deletePassedQuery);

    // Prepare the SQL query to select the student IDs with 'failed' result from the 'exam' table
    $selectQuery = "SELECT Student_ID, First_name, Last_name, Exam_stage, Category, Result FROM exam WHERE Result = 'failed'";

    // Execute the query
    $result = $database->query($selectQuery);

    // Check if there are any failed students
    if ($database->numRows() > 0) {
        // Get the student IDs of the failed students
        $failedStudents = $result->fetchAll(PDO::FETCH_ASSOC);

        // Prepare the SQL query to insert the failed students into the 'failed_students' table
        $insertQuery = "INSERT INTO failed_students (studentID, first_name, last_name, stage, category, result) 
                        SELECT e.Student_ID, e.First_name, e.Last_name, e.Exam_stage, e.Category, e.Result 
                        FROM exam e
                        LEFT JOIN failed_students f ON e.Student_ID = f.studentID
                        WHERE e.Result = 'failed' AND f.studentID IS NULL";

        // Execute the insert query to insert only the non-existing students into the 'failed_students' table
        $database->query($insertQuery);

        // Get the number of inserted rows
        $numInsertedRows = $database->affectedRows();

        echo "";
    } else {
        echo "";
    }

    // Close the database connection
    $database->close();
}
?>