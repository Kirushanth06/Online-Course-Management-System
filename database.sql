CREATE DATABASE IF NOT EXISTS elearning;
USE elearning;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    gender VARCHAR(10),
    course VARCHAR(100),
    interests TEXT
);

CREATE TABLE IF NOT EXISTS courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    course_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(course_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT
);

CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert 10 sample users
INSERT IGNORE INTO users (id, name, email, password, gender, course, interests) VALUES
(1, 'John Doe', 'john@example.com', 'pwd123', 'Male', 'Web Dev', 'Coding'),
(2, 'Jane Smith', 'jane@example.com', 'pwd123', 'Female', 'Data Science', 'AI'),
(3, 'Alice Johnson', 'alice@example.com', 'pwd123', 'Female', 'UX Design', 'Design'),
(4, 'Bob Brown', 'bob@example.com', 'pwd123', 'Male', 'Web Dev', 'Coding'),
(5, 'Charlie Davis', 'charlie@example.com', 'pwd123', 'Male', 'Data Science', 'Math'),
(6, 'Diana Evans', 'diana@example.com', 'pwd123', 'Female', 'Web Dev', 'HTML'),
(7, 'Ethan Foster', 'ethan@example.com', 'pwd123', 'Male', 'UX Design', 'Art'),
(8, 'Fiona Green', 'fiona@example.com', 'pwd123', 'Female', 'Data Science', 'Stats'),
(9, 'George Harris', 'george@example.com', 'pwd123', 'Male', 'Web Dev', 'JS'),
(10, 'Hannah Iyer', 'hannah@example.com', 'pwd123', 'Female', 'UX Design', 'Colors');

-- Insert 10 sample courses
INSERT IGNORE INTO courses (course_id, course_name, description) VALUES
(1, 'Web Development Basics', 'Learn HTML, CSS, JS'),
(2, 'Advanced JavaScript', 'Master ES6+ and async concepts'),
(3, 'Data Science for Beginners', 'Introduction to Python and Pandas'),
(4, 'Machine Learning A-Z', 'Deep dive into ML algorithms'),
(5, 'UI/UX Design Masterclass', 'Design beautiful interfaces'),
(6, 'Full Stack Web Development', 'MERN stack from scratch'),
(7, 'Python Programming', 'Learn Python 3 step by step'),
(8, 'Database Management Systems', 'Learn SQL and NoSQL'),
(9, 'Cloud Computing Basics', 'Intro to AWS and Azure'),
(10, 'Cybersecurity Fundamentals', 'Protect systems and networks');

-- Insert 10 sample enrollments
INSERT IGNORE INTO enrollments (id, user_id, course_id) VALUES
(1, 1, 1), (2, 2, 3), (3, 3, 5), (4, 4, 6), (5, 5, 4),
(6, 6, 2), (7, 7, 5), (8, 8, 3), (9, 9, 1), (10, 10, 5);

-- Insert 10 sample messages
INSERT IGNORE INTO messages (id, name, email, message) VALUES
(1, 'Tom', 'tom@test.com', 'Great course!'),
(2, 'Jerry', 'jerry@test.com', 'Need help with login.'),
(3, 'Sam', 'sam@test.com', 'Will there be more courses?'),
(4, 'Pam', 'pam@test.com', 'Thanks for the tutorials.'),
(5, 'Jim', 'jim@test.com', 'When is the next live session?'),
(6, 'Dwight', 'dwight@test.com', 'Security needs improvement!'),
(7, 'Angela', 'angela@test.com', 'Love the UI design.'),
(8, 'Kevin', 'kevin@test.com', 'How do I reset my password?'),
(9, 'Oscar', 'oscar@test.com', 'Can I get a certificate?'),
(10, 'Michael', 'michael@test.com', 'This is the best site ever!');

-- Insert 10 sample admins
INSERT IGNORE INTO admin (id, username, password) VALUES
(1, 'admin', 'admin123'),
(2, 'admin2', 'admin123'),
(3, 'admin3', 'admin123'),
(4, 'admin4', 'admin123'),
(5, 'admin5', 'admin123'),
(6, 'admin6', 'admin123'),
(7, 'admin7', 'admin123'),
(8, 'admin8', 'admin123'),
(9, 'admin9', 'admin123'),
(10, 'admin10', 'admin123');
