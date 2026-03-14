# Session 06 - Database Design

This repository contains the solutions for Session 06 Database Design exercises, including normalization, relationship analysis, and ERD schema design.

---

# Part 1: Normalization

Original table: STUDENT_GRADES_RAW

Columns:
StudentID, StudentName, CourseID, CourseName, ProfessorName, ProfessorEmail, Grade

After normalization to 3NF, the data is separated into the following tables.

| Table Name | Primary Key | Foreign Key | Normal Form | Description |
|---|---|---|---|---|
| students | student_id | - | 3NF | Stores student information |
| professors | professor_id | - | 3NF | Stores professor information |
| courses | course_id | professor_id | 3NF | Stores course information |
| enrollments | student_id, course_id | student_id, course_id | 3NF | Stores student grades |

Explanation:

1NF: Each column contains atomic values.

2NF: Removed partial dependencies by separating Students and Courses.

3NF: Removed transitive dependencies by separating Professors.

---

# Part 2: Relationship Analysis

The following relationship types are identified:

Author → Book  
One-to-Many (1:N)  
One author can write many books.

Citizen → Passport  
One-to-One (1:1)  
Each citizen has exactly one passport.

Customer → Order  
One-to-Many (1:N)  
One customer can have multiple orders.

Student → Class  
Many-to-Many (N:N)  
Students can enroll in many classes and classes contain many students.

Team → Player  
One-to-Many (1:N)  
One team has multiple players.

---
