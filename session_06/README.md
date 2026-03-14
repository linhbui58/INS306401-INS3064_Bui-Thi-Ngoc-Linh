# Session 06 - Database Design

This repository contains solutions for Session 06 database exercises including normalization, relationship analysis, and ERD design.

---

# Part 1: Database Normalization

Original table:

STUDENT_GRADES_RAW

Columns:

StudentID  
StudentName  
CourseID  
CourseName  
ProfessorName  
ProfessorEmail  
Grade  

This table contains redundancy and dependency issues.

---

## Step 1: First Normal Form (1NF)

Rules:
- Each column contains atomic values
- No repeating groups

The table already satisfies 1NF because each field contains a single value.

---

## Step 2: Second Normal Form (2NF)

Primary key:

(StudentID, CourseID)

Problems:
- StudentName depends only on StudentID
- CourseName depends only on CourseID

Solution: separate tables.

Tables created:

Students
Courses
Professors
Enrollments

---

## Step 3: Third Normal Form (3NF)

Transitive dependency exists:

Course → ProfessorName → ProfessorEmail

Solution:
Separate professor information.

---

## Final Tables

| Table | Primary Key | Foreign Key |
|------|-------------|-------------|
| students | student_id | - |
| professors | professor_id | - |
| courses | course_id | professor_id |
| enrollments | student_id, course_id | student_id, course_id |

---

# Part 2: Relationship Analysis

### Author → Book
One-to-Many (1:N)

One author can write many books.

---

### Citizen → Passport
One-to-One (1:1)

Each citizen has one passport.

---

### Customer → Order
One-to-Many (1:N)

A customer can place multiple orders.

---

### Student → Class
Many-to-Many (N:N)

Students can enroll in multiple classes.

---

### Team → Player
One-to-Many (1:N)

One team contains many players.

---

# Part 3: ERD Design – Blog System

Entities:

Users  
Posts  
Categories  
Tags  
Comments  

Relationships:

Users → Posts (1:N)

Categories → Posts (1:N)

Posts → Tags (N:N)

Posts → Comments (1:N)

Users → Comments (1:N)

The ERD diagram is stored in the diagrams folder.

---

# Part 4: ERD Design – Hospital Management System

Entities:

Patients  
Doctors  
Appointments  
Prescriptions  
Medicines  

Relationships:

Patients → Appointments (1:N)

Doctors → Appointments (1:N)

Appointments → Prescriptions (1:1)

Prescriptions → Medicines (N:N)

The ERD diagram is stored in the diagrams folder.

---

# Project Structure

session_06_database_design

diagrams/
- blog_erd.png
- hospital_erd.png

sql/
- blog_schema.sql
- hospital_schema.sql

README.md
