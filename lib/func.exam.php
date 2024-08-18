<?php 
function generateExamList() {
    // Create an instance of the db class (replace with your own credentials)
    $database = new db('localhost', 'root', '', 'drivera_database');

    // Query to fetch qualifying students from the enrollment table
    $enrollmentQuery = "SELECT e.StudentID, s.Stage, s.CategoryID
                        FROM enrollement AS e
                        LEFT JOIN exam AS ex ON e.StudentID = ex.Student_ID
                        INNER JOIN student AS s ON e.StudentID = s.IDS
                        WHERE e.attendance = 'present'
                        AND ex.Student_ID IS NULL
                        AND ((s.CategoryID IN (2, 3, 4, 5, 6, 1) AND s.Stage = 'Theoretical')
                             OR (s.CategoryID IN (2, 3, 4, 5, 6,1 ) AND (s.Stage = 'Practical Type 1' OR s.Stage = 'Practical Type 2'))
                             OR (s.CategoryID IN (7, 8, 9) AND s.Stage = 'Practical Type 2'))
                        GROUP BY e.StudentID, s.Stage, s.CategoryID
                        HAVING ((s.CategoryID IN (2, 3, 4, 5, 6, 1) AND s.Stage = 'Theoretical' AND COUNT(*) >= 15)
                                OR (s.CategoryID IN (2, 3, 4, 5, 6, 1) AND (s.Stage = 'Practical Type 1' OR s.Stage = 'Practical Type 2') AND COUNT(*) >= 10)
                                OR (s.CategoryID IN (7, 8, 9) AND s.Stage = 'Practical Type 2' AND COUNT(*) >= 20))";

    // Execute the query using the db class
    $enrollmentResult = $database->query($enrollmentQuery)->fetchAll();

    // Check if there are qualifying students
    if (!empty($enrollmentResult)) {
        // Get the current counts of students in each stage
        $theoreticalCount = 0;
        $practical1Count = 0;
        $practical2Count = 0;

        // Iterate over the enrollment results to count students in each stage
        foreach ($enrollmentResult as $row) {
            $stage = $row['Stage'];
            switch ($stage) {
                case 'Theoretical':
                    $theoreticalCount++;
                    break;
                case 'Practical Type 1':
                    $practical1Count++;
                    break;
                case 'Practical Type 2':
                    $practical2Count++;
                    break;
            }
        }

        // Calculate the remaining slots in each stage
        $theoreticalSlots = 15 - $theoreticalCount;
        $practical1Slots = 15 - $practical1Count;
        $practical2Slots = 15 - $practical2Count;

        // Prepare the insert statement for the exam table
        $insertQuery = "INSERT INTO exam (Student_ID, First_name, Last_name, Exam_stage, Category)
                        SELECT s.IDS, s.fname, s.lname, s.Stage, s.CategoryID
                        FROM student AS s
                        INNER JOIN (
                            SELECT e.StudentID, s.Stage
                            FROM enrollement AS e
                            LEFT JOIN exam AS ex ON e.StudentID = ex.Student_ID
                            INNER JOIN student AS s ON e.StudentID = s.IDS
                            WHERE e.attendance = 'present'
                            AND ex.Student_ID IS NULL
                            AND ((s.CategoryID IN (2, 3, 4, 5, 6,1) AND s.Stage = 'Theoretical')
                                 OR (s.CategoryID IN (2, 3, 4, 5, 6,1) AND (s.Stage = 'Practical Type 1' OR s.Stage = 'Practical Type 2'))
                                 OR (s.CategoryID IN (7, 8, 9) AND s.Stage = 'Practical Type 2'))
                            GROUP BY e.StudentID, s.Stage , s.CategoryID
                            HAVING ((s.CategoryID IN (2, 3, 4, 5, 6, 1) AND s.Stage = 'Theoretical' AND COUNT(*) >= 15)
                                    OR (s.CategoryID IN (2, 3, 4, 5, 6,1) AND (s.Stage = 'Practical Type 1' OR s.Stage = 'Practical Type 2') AND COUNT(*) >= 10)
                                    OR (s.CategoryID IN (7, 8, 9) AND s.Stage = 'Practical Type 2' AND COUNT(*) >= 20))
                        ) AS valid_students ON s.IDS = valid_students.StudentID
                        WHERE (s.Stage = 'Theoretical' AND $theoreticalSlots > 0)
                        OR (s.Stage = 'Practical Type 1' AND $practical1Slots > 0)
                        OR (s.Stage = 'Practical Type 2' AND $practical2Slots > 0)";

        // Execute the insert query to insert qualifying students into the exam table
        $insertResult = $database->query($insertQuery);

        if ($insertResult) {
            echo "Exam list generated successfully.";
        } else {
            echo "";
        }
    } else {
        echo "";
    }

    // Close the database connection
    $database->close();
}
?>