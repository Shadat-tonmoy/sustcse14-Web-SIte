-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2017 at 10:24 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_update`
--

CREATE TABLE `class_update` (
  `date` date NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `end_time` varchar(100) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_update`
--

INSERT INTO `class_update` (`date`, `course_name`, `start_time`, `end_time`, `venue`, `id`) VALUES
('2017-02-02', 'Database System', '2:00', '3:00', '329,', 21),
('2017-02-02', 'Operating System and System Programming', '10:00', '11:00', 'IICT', 22),
('2017-02-07', 'Database System', '8:00', '9:00', 'IIct', 23);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(100) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `comment_by` varchar(100) NOT NULL,
  `comment_to` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `comment_by`, `comment_to`) VALUES
(6, 'sdjshajdkhAS', '1', '18'),
(7, 'hdshfksad', '1', '18'),
(8, 'hdsajdhfkjsad', '1', '18'),
(10, 'djsakd', '1', '18'),
(17, 'HeyMax', '3', '20'),
(18, 'Bokachoda', '3', '20'),
(19, 'Sobuj', '3', '18'),
(20, 'Hello', '3', '13'),
(21, 'skjfkas', '3', '13'),
(22, 'sjfksad', '3', '18'),
(24, 'AMi fozu', '2', '19'),
(25, 'It is the bockchodest web application i have ever found in my entire life.....Why you people have created this after hours of coding?? We have facebook right? Stop copying someone else..... : (', '1', '20'),
(35, 'gg', '2', '15'),
(36, 'Hi World', '1', '9'),
(37, 'hfljkx', '1', '21');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `semester` varchar(100) NOT NULL,
  `course1` varchar(100) DEFAULT NULL,
  `course2` varchar(100) DEFAULT NULL,
  `course3` varchar(100) DEFAULT NULL,
  `course4` varchar(100) DEFAULT NULL,
  `course5` varchar(100) DEFAULT NULL,
  `course6` varchar(100) DEFAULT NULL,
  `course7` varchar(100) DEFAULT NULL,
  `course8` varchar(100) DEFAULT NULL,
  `course9` varchar(100) DEFAULT NULL,
  `course10` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`semester`, `course1`, `course2`, `course3`, `course4`, `course5`, `course6`, `course7`, `course8`, `course9`, `course10`, `id`, `type`) VALUES
('3/1', 'Database System', 'Database System Lab', 'Operating System and System Programming', 'Operating System and System Programming Lab', 'Management Information System', 'Communication Engineering', 'Communication Engineering Lab', 'Microprocessor and Interfacing', 'Microprocessor and Interfacing Lab', NULL, 1, 'course_name'),
('3/1', 'cse333', 'cse334', 'cse335', 'cse336', 'cse351', 'cse365', 'cse366', 'cse367', 'cse368', NULL, 3, 'course_num'),
('2/2', 'Object Oriented Programming Language', 'Object Oriented Programming Language Lab', 'Numerical Analysis', 'Numerical Analysis Lab', 'Theory of Computation and Concrete Mathematics', 'Principles of Economics', 'Complex Variables, Laplace Transform and Fourier Series', 'Project Work II', NULL, NULL, 4, 'course_name'),
('2/2', 'cse223', 'cse223', 'cse239', 'cse240', 'cse245', 'eco105d', 'mat204d', 'cse250', NULL, NULL, 5, 'course_num'),
('2/1', 'Digital Logic Design', 'Digital Logic Design Lab', 'Algorithm Design & Analysis', 'Algorithm Design & Analysis Lab', 'Cost and Management Accounting', 'Electromagnetism, Optics & Modern Physics', 'Basic Physics Lab', 'Basic Statistics & Probability', NULL, NULL, 6, 'course_name'),
('2/1', 'eee201', 'eee202', 'cse237', 'cse328', 'bus203', 'phy207d', 'phy202d', 'sta202d', NULL, NULL, 7, 'course_num'),
('3/2', 'Computer Architecture', 'Software Engineering & Design Patterns', 'Software Engineering & Design Patterns Lab', 'Introduction to Data Science', 'Introduction to Data Science Lab', 'Computer Networking', 'Computer Networking Lab', 'Computer Graphics and Image Processing', 'Computer Graphics and Image Processing Lab', 'Technical Writing And Presentation', 8, 'course_name'),
('3/2', 'cse329', 'cse331', 'cse332', 'cse345', 'cse346', 'cse361', 'cse362', 'cse373', 'cse374', 'cse375', 9, 'course_num');

-- --------------------------------------------------------

--
-- Table structure for table `exam_update`
--

CREATE TABLE `exam_update` (
  `id` int(20) NOT NULL,
  `course_name` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_post`
--

CREATE TABLE `new_post` (
  `new_post` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_post`
--

INSERT INTO `new_post` (`new_post`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `course_name`, `author`, `link`, `type`, `added_by`, `description`) VALUES
(15, 'Database System', 'Sobuj', 'sakfj', 'Class Notes', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(50) NOT NULL,
  `post` text NOT NULL,
  `posted_by` int(50) NOT NULL,
  `posted_at` datetime(6) NOT NULL,
  `liked_by` varchar(5000) NOT NULL,
  `disliked_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post`, `posted_by`, `posted_at`, `liked_by`, `disliked_by`) VALUES
(1, 'hello', 1, '0000-00-00 00:00:00.000000', '', ''),
(2, 'fsdfsdfs', 1, '0000-00-00 00:00:00.000000', '', ''),
(3, 'fsdfsdfs', 1, '0000-00-00 00:00:00.000000', '', ''),
(4, 'are you bokachoda???', 1, '0000-00-00 00:00:00.000000', '', ''),
(5, 'hey dedd', 1, '2016-12-13 13:14:38.000000', '', ''),
(6, 'hey dedd', 1, '2016-12-13 18:15:57.000000', '', ''),
(7, 'hey dedd', 1, '2016-12-13 18:21:23.000000', '', ''),
(8, 'hey dedd', 1, '2016-12-13 18:23:27.000000', '', ''),
(9, 'hello world', 1, '2016-12-13 18:36:08.000000', '', ''),
(11, 'fsdfsd', 1, '2016-12-13 18:37:43.000000', ',3', ''),
(14, 'hi guis', 2, '2016-12-13 19:06:53.000000', ',3', ''),
(15, 'hello buddiws', 2, '2016-12-13 19:07:04.000000', ',1,3', ''),
(18, 'Hello WOrld', 1, '2017-01-25 16:28:01.000000', ',1,3', ''),
(19, 'sdfsdfsdf', 3, '2017-01-25 20:32:02.000000', ',3', ',2,1'),
(20, 'Hello People...How are You??', 1, '2017-01-29 18:49:43.000000', ',3,1', ',2,3'),
(21, 'hldfkjsdlf', 1, '2017-02-07 14:08:27.000000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(10) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hometown` varchar(100) NOT NULL,
  `current_position` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `nick_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `reg_no`, `name`, `hometown`, `current_position`, `email`, `image`, `nick_name`) VALUES
(1, '2014331070', 'Shadat Mufakhkhar Tonmoy', 'Sherpur,Dhaka,Bangladesh', 'Student', 'shadat.tonmoy@gmail.com', '2014331070.jpg', 'Shadat Tonmoy'),
(2, '2014331063', 'Shamsul Arefin Mahtab', 'Dhaka, Bangladesh', 'Student', 'N/A', '2014331063.jpg', 'Mahtab'),
(3, '2014331009', 'Foyaz Rahman Akondo', 'Mymensingh, Bangladesh', 'Student', 'foyaz05@gmail.com', '2014331009.jpg', 'Foyaz Akanda'),
(4, '2014331062', 'Alim Al Sajib', 'Rajshahi, Bangladesh', 'Student', 'N/A', '2014331062.jpg', 'Sajib'),
(5, '2014331064', 'Mong Ting Wong Marma', 'Banderban, Bangladesh', 'Student', 'N/A', '2014331064.jpg', 'Mong Ting'),
(6, '2014331001', 'Hridoy Akanda', 'Jamalpur, Dhaka, Bangladesh', 'Student', 'N/A', '2014331001.jpg', 'Hridoy Akanda'),
(7, '2014331069', 'Muhammad Hasan', 'Chittagong, Bangladeh', 'Student', 'N/A', '2014331069.jpg', 'Muhammad Hasan'),
(8, '2014331071', 'Sarwar Hossain ', 'Chadpur, Chittagong, Bangladesh', 'Student', 'N/A', '2014331071.jpg', 'Sarwar'),
(9, '2014331074', 'Shakib Jahan Tonmoy', 'Mymensingh, Bangladesh', 'Student', 'N/A', '2014331074.jpg', 'Shakib Tonmoy'),
(10, '2014331007', 'Rahima Jahan Mitu', 'Sylhet, Bangladesh', 'Student', 'N/A', '2014331007.jpg', 'Mitu'),
(11, '2014331008', 'Maliha Nusrat Arpa', 'Dhaka, Bangladesh', 'Student', 'N/A', '2014331008.jpg', 'Arpa'),
(12, '2014331006', 'Maliha Tabassum', 'Sylhet, Bangladesh', 'Student', 'N/A', '2014331006.jpg', 'Maliha Tabassum'),
(13, '2014331003', 'Kazi Saley Mahmud Dipta', 'Mymensingh, Bangladesh', 'Student', 'N/A', '2014331003.jpg', 'Dipta');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(10) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `liked_posts` varchar(5000) DEFAULT NULL,
  `disliked_posts` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `phone`, `image`, `reg_no`, `liked_posts`, `disliked_posts`) VALUES
(1, 'shadat', 'tonmoy', 'shadat_tonmoy', '12345', 'shadat.tonmoy@gmail.com', '+8801965036172', 'tonmoy.jpg', '2014331070', ',16,17,18,15,20', ',19'),
(2, 'Foyaz', 'Akondo', 'Foyaz05', '12345', 'foyaz05@gmail.com', '+8801965036172', 'fozu.jpg', '2014331009', ',17', ',20,19'),
(3, 'Shamsul ', 'Arafin', 'shamsul.arafin', '12345', 'shadat.tonmoy@gmail.com', '+8801965036172', '2014331063.jpg', '2014331063', ',14,12,11,17,15,20,18,19', ',20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_update`
--
ALTER TABLE `class_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_update`
--
ALTER TABLE `exam_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_update`
--
ALTER TABLE `class_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `exam_update`
--
ALTER TABLE `exam_update`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
