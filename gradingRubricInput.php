
<?php
$servername = "localhost";
$username = "csc350";
$password = "xampp";
$dbname = "school_grades";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function calculateFinalGrade($grades) {
    $homework_avg = array_sum($grades['homeworks']) / count($grades['homeworks']);
    $homework_weighted = $homework_avg * 0.2;
    
    // Drop the lowest quiz, then average (10%)
    sort($grades['quizzes']);
    array_shift($grades['quizzes']); // Remove lowest score
    $quiz_avg = array_sum($grades['quizzes']) / count($grades['quizzes']);
    $quiz_weighted = $quiz_avg * 0.1;

    // Midterm (30%)
    $midterm_weighted = $grades['midterm'] * 0.3;

    // Final Project (40%)
    $final_project_weighted = $grades['final_project'] * 0.4;

    // Final Grade
    $final_grade = $homework_weighted + $quiz_weighted + $midterm_weighted + $final_project_weighted;
    return round($final_grade); // Round to nearest whole number
}

// Insert student grades
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $homeworks = [$_POST['homework1'], $_POST['homework2'], $_POST['homework3'], $_POST['homework4'], $_POST['homework5']];
    $quizzes = [$_POST['quiz1'], $_POST['quiz2'], $_POST['quiz3'], $_POST['quiz4'], $_POST['quiz5']];
    $midterm = $_POST['midterm'];
    $final_project = $_POST['final_project'];

    $sql = "INSERT INTO students (student_name) VALUES ('$student_name')";
    $conn->query($sql);
    $student_id = $conn->insert_id;

    $sql = "INSERT INTO grades (student_id, homework1, homework2, homework3, homework4, homework5, quiz1, quiz2, quiz3, quiz4, quiz5, midterm, final_project)
            VALUES ('$student_id', '$homeworks[0]', '$homeworks[1]', '$homeworks[2]', '$homeworks[3]', '$homeworks[4]', '$quizzes[0]', '$quizzes[1]', '$quizzes[2]', '$quizzes[3]', '$quizzes[4]', '$midterm', '$final_project')";
    $conn->query($sql);

    // Calculate and display the final grade
    $grades = [
        'homeworks' => $homeworks,
        'quizzes' => $quizzes,
        'midterm' => $midterm,
        'final_project' => $final_project
    ];

    $final_grade = calculateFinalGrade($grades);
    echo "Final Grade for $student_name: $final_grade";
}

// Close connection
$conn->close();
?>

<form method="post" action="">
    Student Name: <input type="text" name="student_name" required><br>
    Homework 1: <input type="number" name="homework1" required><br>
    Homework 2: <input type="number" name="homework2" required><br>
    Homework 3: <input type="number" name="homework3" required><br>
    Homework 4: <input type="number" name="homework4" required><br>
    Homework 5: <input type="number" name="homework5" required><br>
    Quiz 1: <input type="number" name="quiz1" required><br>
    Quiz 2: <input type="number" name="quiz2" required><br>
    Quiz 3: <input type="number" name="quiz3" required><br>
    Quiz 4: <input type="number" name="quiz4" required><br>
    Quiz 5: <input type="number" name="quiz5" required><br>
    Midterm: <input type="number" name="midterm" required><br>
    Final Project: <input type="number" name="final_project" required><br>
    <input type="submit" value="Submit">
</form>