-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 09:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `email` text NOT NULL,
  `msg` text NOT NULL,
  `sent_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `f_name`, `l_name`, `email`, `msg`, `sent_date`) VALUES
(24, '', '', 'vvbn2@gmail.com', '', '0000-00-00 00:00:00'),
(25, '', '', 'vvbn2@gmail.com', '', '0000-00-00 00:00:00'),
(26, 'ibfg', 'vbnnb', 'vvbn2@gmail.com', 'sadfghjkiyutre', '0000-00-00 00:00:00'),
(27, 'ibfg', 'vbnnb', 'vvbn2@gmail.com', 'tyuiouygyfhgjkk', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_desc` text NOT NULL,
  `course_author` varchar(255) NOT NULL,
  `course_img` text NOT NULL,
  `course_duration` int(11) NOT NULL,
  `course_price` float NOT NULL,
  `course_lessons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_lessons`) VALUES
(1, 'Java Programming', 'Are you aiming to get your first Java Programming job but struggling to find out what skills employers want and which course will give you those skills?  This course is designed to give you the Java skills you need to get a job as a Java developer.  By the end of the course, you will understand Java extremely well and be able to build your own Java apps and be productive as a software developer.  Lots of students have been successful in getting their first job or promotion after going through the course. ', 'Ibrahim Nassar', '../Img/CourseImages/java_logo_640.jpg', 80, 0, 401),
(2, 'The Complete JavaScript Course 2023: From Zero to Expert!', 'This is the most complete JavaScript course. Its an all-in-one package that will take you from the very fundamentals of JavaScript, all the way to building modern and complex applications.  You will learn modern JavaScript from the very beginning, step-by-step.', 'Ibrahim Nassar', '../Img/CourseImages/javascript-1567486564472.jpg', 69, 0, 320),
(3, 'Build Responsive Real-World Websites with HTML and CSS', 'This course is for both beginners and seasoned developers that want to learn how to build responsive websites and user interfaces with modern HTML5 and CSS3 This course includes hours of both learning & studying sections along with real life projects. ', 'Ibrahim Nassar', '../Img/CourseImages/html-basic.png', 37, 0, 150);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_name`, `stu_email`, `course_id`, `course_name`, `amount`, `date`) VALUES
(1, '62758f25b3dba', 'madura', 'maduraprasad.lk@gmail.com', 9, 'iOS & Swift - The Complete iOS App Development Bootcamp', '$0', '2022-05-07'),
(2, '62762ca7b8fc5', 'madura', 'maduraprasad.lk@gmail.com', 12, 'PHP with Laravel for beginners - Become a Master in Laravel', '$0', '2022-05-07'),
(3, '64ff738115a27', 'Ibrahim', 'dejinassar@gmail.com', 1, 'Java Programming Masterclass covering Java 11 & Java 17', '$12.99', '2023-09-12'),
(4, '6503081773810', 'Ibrahim', 'ib@gmail.com', 10, 'Full Stack-site complet Front REACT & Back PHP/MySQL/MVC/POO', '$9.99', '2023-09-14'),
(5, '65031e626ed53', 'Ibrahim', 'ib@gmail.com', 3, 'Build Responsive Real-World Websites with HTML and CSS', '$0', '2023-09-14'),
(6, '650b0a31c39c7', 'Ibrahim', 'dejinassar@gmail.com', 3, 'Build Responsive Real-World Websites with HTML and CSS', '$0', '2023-09-20'),
(11, '', '', 'nassar@gmail.com', 2, 'The Complete JavaScript Course 2023: From Zero to Expert!', '0', '2023-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_link` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_link`, `course_id`, `course_name`) VALUES
(16, 'Why take this Java Course?', 'VHbSopMyc4M', 1, 'Java Programming'),
(17, 'Programs and Programming Languages', '-C88r0niLQQ', 1, 'Java Programming Masterclass covering Java 11 & Java 17'),
(18, 'Introduction to Java Programming', 'mG4NLNZ37y4', 1, 'Java Programming Masterclass covering Java 11 & Java 17'),
(23, 'javascript callback functions tutorial', 'pTbSfCT42_M', 2, 'The Complete JavaScript Course 2023'),
(24, 'javaScript call apply and bind', 'c0mLRpw-9rI', 2, 'The Complete JavaScript Course 2023'),
(25, 'JavaScript object creation patterns tutorial - factory , constructor pattern, prototype pattern', 'xizFJHKHdHw', 2, 'The Complete JavaScript Course 2023'),
(26, 'HTML & CSS Crash Course Tutorial #1 - Introduction', 'hu-q2zYwEYs', 3, 'Build Responsive Real-World Websites with HTML and CSS'),
(27, 'HTML & CSS Crash Course Tutorial #2 - HTML Basics', 'mbeT8mpmtHA', 3, 'Build Responsive Real-World Websites with HTML and CSS'),
(28, 'HTML & CSS Crash Course Tutorial #3 - HTML Forms', 'YwbIeMlxZAU', 3, 'Build Responsive Real-World Websites with HTML and CSS');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_pass` varchar(255) NOT NULL,
  `stu_occ` varchar(255) NOT NULL,
  `stu_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(11, 'Ibrahim Nassar', 'dejinassar@gmail.com', '$2y$10$AVdFQkvQRlhXL/5LY7O5ue/Vp9qZJ66FxlZTINy.4xq41fHWZlUze', '', '../Img/Student/Snapchat-1950822478.jpg'),
(12, 'Bayo Lawal', 'nassar@gmail.com', '$2y$10$9VWQc9HjphgIgs5SQsr1E.4u9NLsi9eUVH.uBDH2xHL4uk2Vp5eqm', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
