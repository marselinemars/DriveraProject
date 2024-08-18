<?php
function submitResult($studentId, $result) {
    // Sanitize and validate input
    $studentId = intval($studentId);
    $result = ($result === 'passed' || $result === 'failed') ? $result : ''; // Empty result if not 'passed' or 'failed'

    // Create a new instance of the database connection
    $database = new db('localhost', 'root', '', 'drivera_database');

    // Prepare the SQL query to update the 'Result' column in the 'exam' table for the specific student
    $updateQuery = "UPDATE exam SET Result = CASE WHEN ? IN ('passed', 'failed') THEN ? ELSE Result END WHERE Student_ID = ?";

    // Execute the query with the provided result value and student ID
    $database->query($updateQuery, $result, $result, $studentId);

    // Check if the query was successful
    if ($database->affectedRows() > 0) {
        echo "Result submitted successfully for Student ID: " . $studentId;
    } else {
        echo "Failed to submit result for Student ID: " . $studentId;
    }

    // Close the database connection
    $database->close();
}
?>