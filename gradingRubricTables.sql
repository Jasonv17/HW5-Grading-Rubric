CREATE DATABASE IF NOT EXISTS school_grades;
USE school_grades;

CREATRE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL
);

