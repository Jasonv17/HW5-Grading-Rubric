CREATE DATABASE IF NOT EXISTS school_grades;
USE school_grades;

CREATRE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL
);

CREATE TABLE grades (
    grade_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    homework1 INT,
    homework2 INT,
    homework3 INT,
    homework4 INT,
    homework5 INT,
    quiz1 INT,
    quiz2 INT,
    quiz3 INT,
    quiz4 INT,
    quiz5 INT,
    midterm INT,
    final_project INT,
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);

INSERT INTO students (student_name) VALUES ('Jason Valerio');
INSERT INTO students (student_name) VALUES ('Richard Guallpa');
INSERT INTO students (student_name) VALUES ('Donald');

-- Step 5: Insert Grades for These Students
INSERT INTO grades (student_id, homework1, homework2, homework3, homework4, homework5, quiz1, quiz2, quiz3, quiz4, quiz5, midterm, final_project)
VALUES (1, 100, 90, 90, 100, 85, 23, 65, 27, 76, 69, 86, 90);

INSERT INTO grades (student_id, homework1, homework2, homework3, homework4, homework5, quiz1, quiz2, quiz3, quiz4, quiz5, midterm, final_project)
VALUES (2, 80, 95, 90, 85, 87, 70, 85, 93, 77, 82, 78, 85);

INSERT INTO grades (student_id, homework1, homework2, homework3, homework4, homework5, quiz1, quiz2, quiz3, quiz4, quiz5, midterm, final_project)
VALUES (3, 92, 88, 79, 85, 94, 81, 67, 95, 90, 72, 88, 91);

