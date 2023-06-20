-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 02:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `chartofaccount`
--

CREATE TABLE `chartofaccount` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(16) NOT NULL,
  `fees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `fees`) VALUES
(1, 'Ø§ÙˆÙ„', 13500),
(2, 'Ø¯ÙˆÙ…', 13500),
(3, 'Ø³ÙˆÙ…', 13500),
(4, 'Ú†Ù‡Ø§Ø±Ù…', 15300),
(5, 'Ù¾Ù†Ø¬Ù…', 15300),
(6, 'Ø´Ø´Ù…', 15300),
(7, 'Ù‡ÙØªÙ…', 16000),
(9, 'Ù‡Ø´ØªÙ…', 16000),
(10, 'Ù†Ù‡Ù…', 16000),
(11, 'Ø¯Ù‡Ù…', 18000),
(12, 'ÛŒØ§Ø²Ø¯Ù‡Ù…', 18000),
(13, 'Ø¯ÙˆØ§Ø²Ø¯Ù‡Ù…', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `class_section`
--

CREATE TABLE `class_section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(32) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_section`
--

INSERT INTO `class_section` (`section_id`, `section_name`, `class_id`) VALUES
(1, 'Ø§ÙˆÙ„ Ø§Ù„Ù', 1),
(2, 'Ø§ÙˆÙ„ Ø¨', 1),
(3, 'Ø¯ÙˆÙ… Ø§Ù„Ù', 2),
(4, 'Ø¯ÙˆÙ… Ø¨', 2),
(6, 'Ú†Ù‡Ø§Ø±Ù… Ø§Ù„Ù', 4);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `expense_amount` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `income_amount` int(11) NOT NULL,
  `income_date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `source_id`, `income_amount`, `income_date`, `student_id`, `section_id`) VALUES
(6, 1, -1201500, '1396-08-23', 6, 1),
(7, 1, 13500, '1396-08-26', 8, 1),
(8, 1, 8100, '1396-08-26', 9, 1),
(9, 1, 13500, '1396-09-17', 2, 2),
(10, 1, 4050, '1396-09-17', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `income_source`
--

CREATE TABLE `income_source` (
  `source_id` int(11) NOT NULL,
  `source_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income_source`
--

INSERT INTO `income_source` (`source_id`, `source_name`) VALUES
(1, 'fees');

-- --------------------------------------------------------

--
-- Table structure for table `lib_book`
--

CREATE TABLE `lib_book` (
  `book_id` int(11) NOT NULL,
  `isbn` varchar(32) DEFAULT NULL,
  `book_name` varchar(128) NOT NULL,
  `author` varchar(64) DEFAULT NULL,
  `publish_year` int(11) DEFAULT NULL,
  `publisher` varchar(64) DEFAULT NULL,
  `shelf` varchar(32) NOT NULL,
  `shelf_row` varchar(32) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `category` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lib_book`
--

INSERT INTO `lib_book` (`book_id`, `isbn`, `book_name`, `author`, `publish_year`, `publisher`, `shelf`, `shelf_row`, `price`, `category`) VALUES
(1, '234234', 'Ø±ÛŒØ§Ø¶ÛŒØ§Øª Ø¨Ø±Ø§ÛŒ Ù‡Ù…Ù‡', 'ÙˆÛŒÙ„ÛŒØ§Ù… Ù‡Ø§Ø±ÙˆÛŒ', 0, 'Sams Publishing', '230', '4', 1300, 'Ø³Ø§ÛŒÙ†Ø³ÛŒØ§Øª'),
(2, '98979', 'Ø¹Ù„ÙˆÙ… Ø¯ÛŒÙ†ÛŒ', 'Ø­Ø§Ø¬ Ø¢Ù‚Ø§ ÙÙ„Ø§Ù†ÛŒ', 1390, 'Ø®ÙˆØ¯Ù…', '230', '5', 300, 'Ø¯ÛŒÙ†ÛŒ'),
(3, '98798798', 'Ø§ÙØºØ§Ù†Ø³ØªØ§Ù† Ø¯Ø± Ù…Ø³ÛŒØ± ØªØ§Ø±ÛŒØ®', 'Ù†Ø§Ù…Ø¹Ù„ÙˆÙ…', 1398, 'Ø®ÙˆØ¯Ù…', '600', '3', 2000, 'Ø¹Ù„ÙˆÙ… Ø§Ø¬ØªÙ…Ø§Ø¹ÛŒ'),
(4, '989790', 'ØªØ§Ø±ÛŒØ® Ù…Ø¹Ø§ØµØ±', 'Ù†Ø§Ù…Ø¹Ù„ÙˆÙ…', 1398, 'Ø®ÙˆØ¯Ù…', '600', '6', 2500, 'Ø¹Ù„ÙˆÙ… Ø§Ø¬ØªÙ…Ø§Ø¹ÛŒ');

-- --------------------------------------------------------

--
-- Table structure for table `lib_loan`
--

CREATE TABLE `lib_loan` (
  `loan_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lib_loan`
--

INSERT INTO `lib_loan` (`loan_id`, `student_id`, `book_id`, `loan_date`, `return_date`) VALUES
(1, 1, 3, '1396-08-26', NULL),
(2, 1, 4, '1396-08-26', '1396-08-26'),
(3, 8, 2, '1396-08-27', '1396-09-18'),
(4, 6, 1, '1396-08-27', '1396-08-27'),
(5, 8, 1, '1396-08-27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lib_member`
--

CREATE TABLE `lib_member` (
  `student_id` int(11) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lib_member`
--

INSERT INTO `lib_member` (`student_id`, `reg_date`) VALUES
(1, '1396-06-07'),
(2, '1396-08-12'),
(6, '1396-08-08'),
(8, '1393-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_income`
--

CREATE TABLE `other_income` (
  `income_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `income_amount` int(11) NOT NULL,
  `income_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `purchase_date` date NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `unit` varchar(32) NOT NULL,
  `quantity` float NOT NULL,
  `unitprice` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `staff_id`, `purchase_date`, `item_name`, `unit`, `quantity`, `unitprice`, `totalprice`) VALUES
(1, 1, '1396-08-10', ',jhk', 'jygkuy', 890, 67899, 60430110),
(2, 13, '1396-08-20', 'Ø³Ø·Ù„ Ø§Ø´ØºØ§Ù„', '6', 14, 120, 1680);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `subject_id` int(11) NOT NULL DEFAULT '0',
  `exam_year` int(11) NOT NULL DEFAULT '0',
  `section_id` int(11) NOT NULL,
  `mid_exam` tinyint(4) NOT NULL,
  `final_exam` tinyint(4) DEFAULT NULL,
  `second_chance` tinyint(4) DEFAULT NULL,
  `total_mark` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`student_id`, `subject_id`, `exam_year`, `section_id`, `mid_exam`, `final_exam`, `second_chance`, `total_mark`) VALUES
(1, 1, 1396, 1, 30, 39, NULL, 69),
(1, 2, 1396, 1, 30, 60, NULL, 90),
(1, 3, 1396, 1, 20, 50, NULL, 70),
(1, 4, 1396, 1, 40, 60, NULL, 100),
(2, 1, 1396, 2, 34, 60, NULL, 94),
(2, 2, 1396, 2, 0, 50, 74, 50),
(2, 3, 1396, 2, 30, 49, NULL, 79),
(2, 4, 1396, 2, 23, 58, NULL, 81),
(6, 1, 1396, 1, 40, 60, NULL, 100),
(6, 2, 1396, 1, 33, 50, NULL, 83),
(6, 3, 1396, 1, 34, 60, NULL, 94),
(6, 4, 1396, 1, 39, 59, NULL, 98),
(7, 1, 1396, 1, 38, 49, NULL, 87),
(7, 2, 1396, 1, 30, 50, NULL, 80),
(7, 3, 1396, 1, 39, 59, NULL, 98),
(7, 4, 1396, 1, 38, 60, NULL, 98),
(8, 1, 1396, 1, 38, 38, NULL, 76),
(8, 2, 1396, 1, 38, 59, NULL, 97),
(8, 3, 1396, 1, 40, 55, NULL, 95),
(8, 4, 1396, 1, 40, 58, NULL, 98),
(9, 5, 1396, 3, 40, 60, NULL, 100);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `fathername` varchar(32) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `nic` varchar(64) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `province` varchar(64) NOT NULL,
  `district` varchar(64) NOT NULL,
  `village` varchar(64) NOT NULL,
  `current_address` varchar(128) NOT NULL,
  `position` varchar(64) NOT NULL,
  `gross_salary` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `firstname`, `lastname`, `fathername`, `gender`, `birth_year`, `photo`, `nic`, `phone`, `email`, `province`, `district`, `village`, `current_address`, `position`, `gross_salary`, `status`) VALUES
(1, 'ÙØ±Ø²Ø§Ù†Ù‡', 'Ø§Ø³Ø¯ÛŒ', 'Ù†ÙˆØ±Ù…Ø­Ù…Ø¯', 1, 1996, 'images/employee/150957014615095484729hy73.jpg', '234234', '0782342342', 'farzana.dolatshahi@gmail.com', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„,Ø¯Ø§Ø±Ù„Ù…Ø§Ù† , Ø´Ù‡Ø±Ú© Ø§Ù…ÛŒØ¯ Ø³Ø¨Ø²', 'Ù…Ø¯ÛŒØ± Ø¹Ù…ÙˆÙ…ÛŒ', 20000, 1),
(13, 'Ø§Ø­Ù…Ø¯ Ø§Ù„Ù„Ù‡', 'Ù†Ø¹Ù…Øª Ø²Ø§Ø¯Ù‡', 'Ù†ÙˆØ±Ø§Ù„Ù„Ù‡', 0, 1377, 'images/employee/15133152134.jpg', '193344', '0748445004', '', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ù…Ø¯ÛŒØ± Ù…Ø§Ù„ÛŒ', 12000, 1),
(19, 'Ù†Ø§Ø¸Ø±', 'Ø±Ø§Ø³Ø®', 'Ù…Ø­Ù…Ø¯ Ø¸Ø§Ù‡Ø±', 0, 1997, 'images/employee/15095618641319055940.jpg', '78654', '0798321456', 'naaze@yahoo.com', 'Ù…ÛŒØ¯Ø§Ù† ÙˆØ±Ø¯Ú©', 'Ø¨Ù‡Ø³ÙˆØ¯', 'Ø­ØµÙ‡ Ø§ÙˆÙ„', 'Ø§Ù†Ø¯ÙˆÙ†ÛŒØ²ÛŒØ§', 'Ù…Ø¹Ù„Ù…', 8000, 1),
(20, 'Ø§Ù„ÛŒØ§Ø³', 'Ø¯Ø§Ù†Ø´', 'Ù…Ø­Ù…Ø¯Ø¹ÛŒØ³ÛŒ', 0, 1995, 'images/employee/15131443012.jpg', '15007', '0709999497', 'eliaseliay700@gamail.com', 'Ø¯Ø§ÛŒÚ©Ù†Ø¯ÛŒ', 'Ú©ÛŒØªÛŒ', 'ØªØ¬Ø±ÛŒØ¨', 'Ú©Ø§Ø¨Ù„', 'Ù…Ø¹Ù„Ù…', 80000, 1),
(21, 'Ù…Ø­Ù…Ø¯ Ø­Ø³ÛŒÙ†', 'Ù…Ø­Ù…Ø¯ÛŒ', 'Ø¹Ø¨Ø¯Ø§Ù„Ø®Ù„ÛŒÙ„', 0, 1998, 'images/employee/15131476163.JPG', '778899', '0791382482', 'mohammadhussainmohammadi17@gmail.com', 'Ú©Ø§Ø¨Ù„ ', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ø®ÛŒØ±Ø®Ø§Ù†Ù‡', 'Ø§Ø³ØªØ§Ø¯', 80000, 1),
(22, 'ÛŒØ§Ø³Ø±', 'ØµØ§ÙÛŒ', 'Ù…Ø­Ù…Ø¯ ÛŒØ§Ø³ÛŒÙ†', 0, 1370, 'images/employee/15133134295.jpg', '67766', '0798765438', 'yasar@gmail.com', 'Ú©Ø§Ø¨Ù„ ', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ù…Ø¯ÛŒØ± Ø§Ù…ÙˆØ± Ø´Ø§Ú¯Ø±Ø¯Ø§Ù†', 13000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `absent_year` int(11) NOT NULL DEFAULT '0',
  `absent_month` tinyint(4) NOT NULL DEFAULT '0',
  `absent_day` tinyint(4) NOT NULL DEFAULT '0',
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_attendance`
--

INSERT INTO `staff_attendance` (`staff_id`, `absent_year`, `absent_month`, `absent_day`, `remark`) VALUES
(1, 1396, 8, 11, 'Ù…Ø±ÛŒØ¶'),
(1, 1396, 9, 17, 'Ù…Ø±ÛŒØ¶'),
(1, 1396, 9, 22, ''),
(1, 1396, 9, 23, ''),
(19, 1396, 8, 20, 'Ø±Ø®ØµØª'),
(21, 1396, 9, 23, 'Ù…Ø±ÛŒØ¶');

-- --------------------------------------------------------

--
-- Table structure for table `staff_document`
--

CREATE TABLE `staff_document` (
  `document_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `document_name` varchar(128) NOT NULL,
  `document_file` varchar(128) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_document`
--

INSERT INTO `staff_document` (`document_id`, `staff_id`, `document_name`, `document_file`, `upload_date`) VALUES
(1, 1, 'CV', 'document/employee/1509644625sd.txt', '1396-08-11'),
(2, 19, 'Ú©Ø§Ù¾ÛŒ ØªØ°Ú©Ø±Ù‡', 'document/employee/1510408397150476990210.jpg', '1396-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `staff_salary`
--

CREATE TABLE `staff_salary` (
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `salary_year` int(11) NOT NULL DEFAULT '0',
  `salary_month` tinyint(4) NOT NULL DEFAULT '0',
  `tax_amount` int(11) NOT NULL DEFAULT '0',
  `absent_amount` int(11) NOT NULL DEFAULT '0',
  `bonus` int(11) NOT NULL DEFAULT '0',
  `payable_salary` int(11) NOT NULL,
  `guarantee` float NOT NULL,
  `net_salary` int(11) NOT NULL,
  `pay_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_salary`
--

INSERT INTO `staff_salary` (`staff_id`, `salary_year`, `salary_month`, `tax_amount`, `absent_amount`, `bonus`, `payable_salary`, `guarantee`, `net_salary`, `pay_date`) VALUES
(1, 1396, 6, 900, 741, 0, 18359, 13.33, 15912, NULL),
(1, 1396, 8, 900, 741, 0, 18359, 13.33, 15912, '1396-08-26'),
(1, 1396, 9, 900, 741, 0, 18359, 13.33, 15912, NULL),
(13, 1396, 6, 140, 444, 0, 11416, 13.33, 9894, NULL),
(13, 1396, 8, 140, 0, 1000, 14093, 13.33, 12214, NULL),
(13, 1396, 9, 140, 0, 0, 11860, 13.33, 10279, '1396-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `unit` varchar(32) NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `item_name`, `unit`, `quantity`) VALUES
(1, 'ÙˆØ§ÛŒØª Ø¨Ø±Ø¯', 'Ø¯Ø§Ù†Ù‡', 8),
(3, 'Ù…ÛŒØ²', '12', 193),
(4, 'Ú†ÙˆÚ©ÛŒ', '12', 187);

-- --------------------------------------------------------

--
-- Table structure for table `stock_in`
--

CREATE TABLE `stock_in` (
  `stock_in_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `in_date` date NOT NULL,
  `in_quantity` float NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_in`
--

INSERT INTO `stock_in` (`stock_in_id`, `stock_id`, `in_date`, `in_quantity`, `remark`) VALUES
(1, 3, '1396-08-20', 90, ''),
(2, 3, '1396-09-17', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `stock_out_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `out_date` date NOT NULL,
  `out_quanttiy` float NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_out`
--

INSERT INTO `stock_out` (`stock_out_id`, `stock_id`, `out_date`, `out_quanttiy`, `remark`) VALUES
(2, 1, '1396-08-20', 2, ' Ø¨Ù‡ ØµÙ†Ù Ù‡Ø§ÛŒ Ø³Ø§Ù„ Ø§ÙˆÙ„ C13 Ùˆ D13  Ø¯Ø§Ø¯Ù‡ Ø´Ø¯');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `reg_no` varchar(16) DEFAULT NULL,
  `firstname` varchar(32) NOT NULL,
  `fathername` varchar(32) NOT NULL,
  `grandfathername` varchar(32) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `province` varchar(32) NOT NULL,
  `district` varchar(64) NOT NULL,
  `village` varchar(64) NOT NULL,
  `current_address` varchar(128) NOT NULL,
  `nic` varchar(128) NOT NULL,
  `phone` char(10) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `reg_no`, `firstname`, `fathername`, `grandfathername`, `gender`, `birth_year`, `province`, `district`, `village`, `current_address`, `nic`, `phone`, `photo`, `status`, `section_id`) VALUES
(1, '7887', 'Ø¹Ù„ÛŒ', 'Ø§Ø­Ù…Ø¯', 'Ù…Ø­Ù…ÙˆØ¯', 0, 1380, 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„ØŒ Ø¯Ø´Øª Ø¨Ø±Ú†ÛŒ', '2342342', '0782343234', 'images/student/1509510700Afghan-School-Girls-Rada-Akbar-.jpg', 1, 1),
(2, '134344', 'Ø§Ø­Ù…Ø¯Ø¹Ù„ÛŒ', 'Ø±Ø­Ù…Ø§Ù†', 'ÙÙ‡ÛŒÙ…', 0, 1384, 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„ØŒ Ú©Ø§Ø±ØªÙ‡ 4', '23423423', '0782342342', 'images/student/1505019257213252_1bd6_3.jpg', 1, 2),
(6, '975439', 'ÙØ±Ù‡Ø§Ø¯', 'Ù†ÙˆØ±Ù…Ø­Ù…Ø¯', 'ØµÙ…Ø¯', 0, 65, 'ØºØ²Ù†ÛŒ', 'Ø¬Ø§ØºÙˆØ±ÛŒ', 'ØªÙˆÙ¾', 'Ú©Ø§Ø¨Ù„', '677689', '0798631667', 'images/student/1509511105back-to-school.jpg', 1, 1),
(7, '098755', 'ØµØ§Ø¨Ø±Ù‡', 'Ø¬Ø§Ù†Ø¹Ù„ÛŒ', 'Ø§Ù‚Ø¨Ø§Ù„', 1, 1376, 'Ø¨Ø§Ù…ÛŒØ§Ù†', 'Ø´ÛŒØ¨Ø±', 'Ú©Ø§Ù„Ùˆ', 'Ú©Ø§Ø¨Ù„,Ù…ÛŒØ¯Ø§Ù† Ù‡ÙˆØ§ÛŒÛŒ,Ø³Ø±Ú© Ú†Ù‡Ù„ Ù…ØªØ±Ù‡', '23234', '0798321456', 'images/student/1509561106153701846.jpg', 1, 1),
(8, '32456', 'Ù†Ø¬Ù…Ù‡ Ø¬Ø§Ù†', 'Ø§Ø­Ù…Ø¯ Ø·Ø§Ù‡Ø±', 'Ù…Ø­Ù…Ø¯ Ø§Ø³Ø­Ù‚', 1, 1391, 'Ø¯Ø§ÛŒÚ©Ù†Ø¯ÛŒ', 'Ø³Ù†Ú¯ØªØ®Øª Ø¨Ù†Ø¯Ø±', 'Ø¯Ù‡Ù† Ø³Ø§ÛŒ', 'Ú©Ø§Ø¨Ù„,Ø¯Ø§Ø±Ù„Ù…Ø§Ù† , Ø´Ù‡Ø±Ú© Ø§Ù…ÛŒØ¯ Ø³Ø¨Ø²', '23577', '0787673054', 'images/student/1509561242-16545257.jpg', 1, 1),
(9, '7777', 'Ø³Ø§Ø±Ø§', 'Ù…Ø­Ù…Ø¯', 'Ø¹Ù„ÛŒ', 1, 1390, 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', '87865', '0798675544', 'images/student/1510332025363436582.jpg', 1, 1),
(10, 'A_009', 'Ø­Ø³ÛŒÙ†', 'Ù…Ø­Ù…Ø¯ Ø¸Ø±ÛŒÙ', 'Ø¹Ù…Ø± Ø®Ø§Ù†', 0, 1999, 'ØªØ®Ø§Ø±', 'Ø§Ø³Ù„Ø§Ù… Ù‚Ù„Ø¹Ù‡', 'Ø¬Ù‡Ù„Ø³ØªÙˆÙ†', 'Ú©Ø§Ø¨Ù„', '99999', '0705944433', 'images/student/15131445883.JPG', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `absent_date` date NOT NULL DEFAULT '0000-00-00',
  `absent_type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`student_id`, `absent_date`, `absent_type`) VALUES
(1, '1396-08-19', 2),
(1, '1396-08-20', 3),
(2, '1396-06-29', 1),
(6, '1396-08-20', 1),
(8, '1396-08-10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_document`
--

CREATE TABLE `student_document` (
  `document_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `document_name` varchar(128) NOT NULL,
  `document_file` varchar(128) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_document`
--

INSERT INTO `student_document` (`document_id`, `student_id`, `document_name`, `document_file`, `upload_date`) VALUES
(1, 2, 'Ú©Ø§Ù¾ÛŒ ØªØ°Ú©Ø±Ù‡', 'document/student/150501993515_domo_data-never-sleeps-3_final-copy.jpg', '1396-06-22'),
(3, 7, 'Ú©Ø§Ù¾ÛŒ ØªØ°Ú©Ø±Ù‡', 'document/student/1509645280', '1396-08-11'),
(4, 6, 'ØªÙ‚Ø¯ÛŒØ± Ù†Ø§Ù…Ù‡', 'document/student/1512717848', '1396-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `student_relative`
--

CREATE TABLE `student_relative` (
  `relative_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `relative_name` varchar(64) NOT NULL,
  `relative_phone` char(10) NOT NULL,
  `relative_relation` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_relative`
--

INSERT INTO `student_relative` (`relative_id`, `student_id`, `relative_name`, `relative_phone`, `relative_relation`) VALUES
(2, 2, 'Ø¹Ù„ÛŒ', '02342342', 'Ù¾Ø¯Ø±'),
(3, 6, 'ÙØ±Ø²Ø§Ù†Ù‡', '0798634667', 'Ø®ÙˆØ§Ù‡Ø±');

-- --------------------------------------------------------

--
-- Table structure for table `student_transfer`
--

CREATE TABLE `student_transfer` (
  `transfer_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `transfer_date` date NOT NULL,
  `transfer_no` varchar(32) NOT NULL,
  `confirm_no` varchar(32) NOT NULL,
  `school_name` varchar(128) NOT NULL,
  `transfer_type` tinyint(1) NOT NULL,
  `follow_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_transfer`
--

INSERT INTO `student_transfer` (`transfer_id`, `student_id`, `transfer_date`, `transfer_no`, `confirm_no`, `school_name`, `transfer_type`, `follow_no`) VALUES
(3, 2, '1396-06-22', '435345', '2452', 'Ø¹Ø¨Ø¯Ø§Ù„Ø±Ø­ÛŒÙ… Ø´Ù‡ÛŒØ¯', 1, 8788),
(4, 6, '1396-08-23', '09988', '66776', 'Ù†Ø³ÙˆØ§Ù† Ø§Ù…ÛŒØ¯ Ø³Ø¨Ø²', 0, 7766),
(6, 1, '1396-09-17', '98977', '90897', 'Ù†Ø³ÙˆØ§Ù† Ø§Ù…ÛŒØ¯ Ø³Ø¨Ø²', 0, 8686),
(7, 1, '1396-09-22', '878', '898967', 'Ù†Ø³ÙˆØ§Ù† Ø§Ù…ÛŒØ¯ Ø³Ø¨Ø²', 1, 87887);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(32) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `class_id`) VALUES
(1, 'Ø¯Ø±ÛŒ', 1),
(2, 'Ø±ÛŒØ§Ø¶ÛŒ', 1),
(3, 'Ù‚Ø±Ø¢Ù†', 1),
(4, 'Ø§Ù†Ø´Ø§', 1),
(5, 'Ø§Ù†Ø´Ø§', 2),
(6, 'Ù¾Ø´ØªÙˆ', 3),
(7, 'Ø³Ø§ÛŒÙ†Ø³', 3),
(8, 'Ø¬ØºØ±Ø§ÙÛŒÙ‡', 7),
(9, 'Ø¬ÛŒÙˆÙ„ÙˆÚ˜ÛŒ', 11),
(10, 'Ø±ÛŒØ§Ø¶ÛŒ', 11);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `fathername` varchar(32) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `nic` varchar(64) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `province` varchar(64) NOT NULL,
  `district` varchar(64) NOT NULL,
  `village` varchar(64) NOT NULL,
  `current_address` varchar(128) NOT NULL,
  `education_degree` varchar(32) NOT NULL,
  `education_field` varchar(64) NOT NULL,
  `education_university` varchar(64) NOT NULL,
  `graduation_year` int(11) NOT NULL,
  `talent_score` int(11) NOT NULL,
  `gross_salary` int(11) NOT NULL,
  `hod_bonus` int(11) NOT NULL DEFAULT '0',
  `talent_bonus` int(11) NOT NULL DEFAULT '0',
  `academic_bonus` int(11) NOT NULL DEFAULT '0',
  `food_charge` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `firstname`, `lastname`, `fathername`, `gender`, `birth_year`, `photo`, `nic`, `phone`, `email`, `province`, `district`, `village`, `current_address`, `education_degree`, `education_field`, `education_university`, `graduation_year`, `talent_score`, `gross_salary`, `hod_bonus`, `talent_bonus`, `academic_bonus`, `food_charge`, `status`) VALUES
(1, 'Ù†Ø¬ÛŒØ¨', 'Ø³Ø±ÙˆØ´', '', 0, 1360, 'images/teacher/1504679981K8CcxUmpW33a1Myp1384933301.jpg', '234234', '0782342422', 'najeeb.sorush@gmail.com', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„ØŒ Ø¯Ø´Øª Ø¨Ø±Ú†ÛŒ', 'Ù„Ø³Ø§Ù†Ø³', 'Ø­Ù‚ÙˆÙ‚', 'Ú©Ø§Ø¨Ù„', 1390, 800, 20000, 1000, 6400, 1000, 800, 1),
(2, 'Ø±Ù…Ø¶Ø§Ù†', 'Ù…Ø­Ù…ÙˆØ¯', '', 0, 1363, 'images/teacher/1504683919maIC5i46h9fv3X7L1385810212.jpg', '2342342', '0782342420', '', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„ØŒ Ø®ÛŒØ±Ø®Ø§Ù†Ù‡', 'Ø¯ÙˆØ§Ø²Ø¯Ù‡ Ù¾Ø§Ø³', 'Ø¯Ø§Ø±Ø§Ù„Ù…Ø¹Ù„Ù…ÛŒÙ† Ø±ÛŒØ§Ø¶ÛŒ', 'Ø³ÛŒØ¯ Ø¬Ù…Ø§Ù„ Ø§Ù„Ø¯ÛŒÙ†', 1394, 670, 14000, 0, 5360, 700, 0, 0),
(3, 'Ù¾ÛŒÙ…Ø§Ù†', 'Ù†ÙˆØ±ÛŒ', 'Ø§Ø­Ù…Ø¯', 0, 1374, 'images/teacher/151033304915046082352pfdvhmssSiBYrUD1385812192.jpg', '897876', '0798654678', 'payman.noori@gmail.com', 'Ù‡Ø±Ø§Øª', 'Ø§Ù†Ø¬ÛŒÙ„', 'Ø¨Ú©Ø±Ø¢Ø¨Ø§Ø¯', 'Ú©Ø§Ø¨Ù„', 'Ø¯ÙˆØ§Ø²Ø¯Ù‡ Ù¾Ø§Ø³', 'Ø§Ù‚ØªØµØ§Ø¯', 'Ø¯Ø§Ù†Ø´Ú¯Ø§Ù‡ Ù‡Ø±Ø§Øª', 1394, 898, 80000, 6000, 7184, 6000, 800, 1),
(4, 'Ø³ØªØ§ÛŒØ´', 'Ø§Ø³Ø¯ÛŒ', 'Ù…Ø­Ù…Ø¯ Ø¹Ù„ÛŒ', 1, 1370, 'images/teacher/1510409038IMG_20140307_015212_1_.jpg', '980789', '0798654356', 'setayesh@yahoo.com', 'ØºØ²Ù†ÛŒ', 'Ø¬Ø§ØºÙˆØ±ÛŒ', 'Ø¯ÙˆÙ„ØªØ´Ù‡', 'Ú©Ø§Ø¨Ù„', 'Ù„Ø³Ø§Ù†Ø³', 'Ú©Ù…Ù¾ÛŒÙˆØªØ± Ø³Ø§ÛŒÙ†Ø³', 'ØªØ¹Ù„ÛŒÙ… ØªØ±Ø¨ÛŒÙ‡ Ø´Ù‡ÛŒØ¯ Ø±Ø¨Ø§Ù†ÛŒ', 1394, 978, 8000, 900, 7824, 987, 800, 1),
(5, 'ÛŒØ§Ø³Ø±', 'ØµØ§ÙÛŒ', 'ÛŒØ§Ø³ÛŒÙ†', 0, 1370, 'images/teacher/15132313973.gif', '99999', '0705944433', 'ysdit700@yshoo.com', 'Ù„ØºÙ…Ø§Ù†', 'Ø¹Ù„ÛŒØ´ØªÚ¯', 'Ø§Ø³Ù„Ø§Ù… Ø§Ø¨Ø§Ø¯', 'Ú©Ø§Ø¨Ù„', 'Ú†Ù‡Ø§Ø±Ø¯Ù‡ Ù¾Ø§Ø³', 'Ø¯ÛŒØªØ§Ø¨Ø³', 'ØªÚ©Ù†Ø§Ù„ÙˆÚ˜ÛŒ Ú©Ù…Ù¾ÙˆØªØ±', 1394, 987, 7000, 7999, 7896, 500, 700, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `teacher_id` int(11) NOT NULL DEFAULT '0',
  `absent_year` int(11) NOT NULL DEFAULT '0',
  `absent_month` tinyint(4) NOT NULL DEFAULT '0',
  `absent_day` tinyint(4) NOT NULL DEFAULT '0',
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`teacher_id`, `absent_year`, `absent_month`, `absent_day`, `remark`) VALUES
(1, 1396, 5, 10, ''),
(1, 1396, 6, 28, 'Ù…Ø±ÛŒØ¶ Ø¨ÙˆØ¯Ù‡ Ø§Ø³Øª'),
(1, 1396, 6, 29, ''),
(1, 1396, 8, 10, 'Ø¨Ù‡ Ù…Ø³Ø§Ø¨Ù‚Ù‡ Ø±ÙØªÙ‡ Ø¨ÙˆØ¯'),
(2, 1396, 6, 15, 'Ø¨Ù‡ Ø¹Ù„Øª Ù…Ø±ÛŒØ¶ÛŒ Ø±Ø®ØµØª Ú¯Ø±ÙØªÙ‡ Ø¨ÙˆØ¯'),
(3, 1396, 8, 11, 'Ú©Ù†ÙØ±Ø§Ù†Ø³'),
(3, 1396, 8, 19, ''),
(3, 1396, 8, 20, 'Ø±Ø®ØµØª'),
(3, 1396, 9, 17, 'Ù…Ø±ÛŒØ¶'),
(5, 1396, 9, 23, 'ØªÙØ±ÛŒØ­');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_document`
--

CREATE TABLE `teacher_document` (
  `document_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `document_name` varchar(128) NOT NULL,
  `document_file` varchar(128) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_document`
--

INSERT INTO `teacher_document` (`document_id`, `teacher_id`, `document_name`, `document_file`, `upload_date`) VALUES
(1, 1, 'Ø³Ù†Ø¯ Ù„ÛŒØ³Ø§Ù†Ø³', 'document/teacher/15046835669-emerging.png', '1396-06-15'),
(2, 1, 'Ú©Ø§Ù¾ÛŒ ØªØ°Ú©Ø±Ù‡', 'document/teacher/150468377113932780_1214516151932967_6996150698058024687_n.jpg', '1396-06-15'),
(3, 2, 'Ø³Ù†Ø¯ ÙØ±Ø§ØºØª', 'document/teacher/1509510291Ø¢Ø´Ù†Ø§ÛŒÛŒ Ø¨Ø§ ÙˆÛŒØ±ÙˆØ³ Ù‡Ø§ÛŒ Ú©Ø§Ù…Ù¾ÛŒÙˆØªØ±ÛŒ.pdf', '1396-06-22'),
(4, 3, 'Ø§Ø³Ù†Ø§Ø¯ Ø¹Ù…ÙˆÙ…ÛŒ', 'document/teacher/1509645076sd.txt', '1396-08-11'),
(5, 5, 'CV', 'document/teacher/15132316921.gif', '1396-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salary`
--

CREATE TABLE `teacher_salary` (
  `teacher_id` int(11) NOT NULL DEFAULT '0',
  `salary_year` int(11) NOT NULL DEFAULT '0',
  `salary_month` tinyint(4) NOT NULL DEFAULT '0',
  `tax_amount` int(11) NOT NULL DEFAULT '0',
  `absent_amount` int(11) NOT NULL DEFAULT '0',
  `loan_amount` int(11) NOT NULL DEFAULT '0',
  `non_absent_bonus` int(11) NOT NULL DEFAULT '0',
  `bonus` int(11) NOT NULL DEFAULT '0',
  `payable_salary` int(11) NOT NULL,
  `guarantee` float NOT NULL,
  `net_salary` int(11) NOT NULL,
  `pay_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_salary`
--

INSERT INTO `teacher_salary` (`teacher_id`, `salary_year`, `salary_month`, `tax_amount`, `absent_amount`, `loan_amount`, `non_absent_bonus`, `bonus`, `payable_salary`, `guarantee`, `net_salary`, `pay_date`) VALUES
(1, 1396, 9, 900, 0, 0, 600, 0, 27300, 13.33, 23661, '1396-09-22'),
(2, 1396, 6, 300, 519, 0, 300, 0, 19541, 13.33, 16936, NULL),
(2, 1396, 8, 300, 0, 0, 600, 0, 20360, 13.33, 17646, '1396-08-20'),
(3, 1396, 8, 6900, 0, 5000, 300, 1000, 82784, 13.33, 71749, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `weekday` tinyint(4) NOT NULL DEFAULT '0',
  `lesson_hour` tinyint(4) NOT NULL DEFAULT '0',
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`weekday`, `lesson_hour`, `teacher_id`, `subject_id`, `section_id`) VALUES
(0, 1, 1, 3, 2),
(0, 1, 2, 3, 1),
(0, 1, 3, 3, 2),
(0, 1, 4, 3, 2),
(0, 2, 1, 3, 2),
(0, 2, 3, 5, 4),
(0, 2, 4, 3, 1),
(0, 3, 2, 3, 1),
(0, 3, 4, 4, 1),
(0, 4, 3, 3, 2),
(0, 4, 4, 4, 1),
(0, 5, 1, 3, 2),
(0, 5, 3, 2, 1),
(1, 1, 3, 4, 2),
(1, 3, 3, 3, 2),
(1, 6, 2, 3, 2),
(1, 6, 3, 2, 1),
(2, 1, 2, 1, 1),
(2, 1, 3, 2, 2),
(2, 2, 1, 1, 2),
(3, 2, 1, 1, 1),
(3, 3, 1, 3, 2),
(3, 3, 3, 4, 2),
(4, 1, 2, 5, 3),
(4, 1, 3, 3, 1),
(4, 2, 3, 2, 1),
(4, 4, 3, 2, 2),
(4, 5, 3, 2, 1),
(5, 1, 3, 3, 1),
(5, 2, 1, 1, 1),
(5, 6, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tuition_discount`
--

CREATE TABLE `tuition_discount` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `discount_year` int(11) NOT NULL DEFAULT '0',
  `section_id` int(11) NOT NULL,
  `discount_amount` float NOT NULL,
  `discount_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuition_discount`
--

INSERT INTO `tuition_discount` (`student_id`, `discount_year`, `section_id`, `discount_amount`, `discount_type`) VALUES
(1, 1396, 1, 50, 0),
(7, 1396, 1, 70, 0),
(9, 1396, 1, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`staff_id`, `username`, `password`) VALUES
(1, 'farzana', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(13, 'ahmad', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(20, 'elias danish', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(21, 'hussain', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257'),
(22, 'yasar', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `staff_id` int(11) NOT NULL,
  `admin_level` tinyint(4) NOT NULL DEFAULT '0',
  `acadmic_level` tinyint(4) NOT NULL DEFAULT '0',
  `student_level` tinyint(4) NOT NULL DEFAULT '0',
  `teacher_level` tinyint(4) NOT NULL DEFAULT '0',
  `staff_level` tinyint(4) NOT NULL DEFAULT '0',
  `finance_level` tinyint(4) NOT NULL DEFAULT '0',
  `library_level` tinyint(4) NOT NULL DEFAULT '0',
  `stock_level` tinyint(4) NOT NULL DEFAULT '0',
  `it_level` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`staff_id`, `admin_level`, `acadmic_level`, `student_level`, `teacher_level`, `staff_level`, `finance_level`, `library_level`, `stock_level`, `it_level`) VALUES
(1, 8, 8, 8, 8, 8, 8, 8, 8, 8),
(13, 0, 0, 0, 0, 0, 8, 0, 8, 0),
(20, 0, 8, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 8, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 8, 8, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chartofaccount`
--
ALTER TABLE `chartofaccount`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_name` (`account_name`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `class_section`
--
ALTER TABLE `class_section`
  ADD PRIMARY KEY (`section_id`),
  ADD UNIQUE KEY `section_name` (`section_name`),
  ADD KEY `classes_class_section_fk` (`class_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `chartofaccount_expense_fk` (`account_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`),
  ADD KEY `income_source_income_fk` (`source_id`),
  ADD KEY `student_income_fk` (`student_id`);

--
-- Indexes for table `income_source`
--
ALTER TABLE `income_source`
  ADD PRIMARY KEY (`source_id`),
  ADD UNIQUE KEY `source_name` (`source_name`);

--
-- Indexes for table `lib_book`
--
ALTER TABLE `lib_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `lib_loan`
--
ALTER TABLE `lib_loan`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `lib_member_lib_loan_fk` (`student_id`),
  ADD KEY `lib_book_lib_loan_fk` (`book_id`);

--
-- Indexes for table `lib_member`
--
ALTER TABLE `lib_member`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `other_income`
--
ALTER TABLE `other_income`
  ADD PRIMARY KEY (`income_id`),
  ADD KEY `income_source_other_income_fk` (`source_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `staff_purchase_fk` (`staff_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`student_id`,`subject_id`,`exam_year`),
  ADD KEY `subject_score_fk` (`subject_id`),
  ADD KEY `section_score_fk` (`section_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`staff_id`,`absent_year`,`absent_month`,`absent_day`);

--
-- Indexes for table `staff_document`
--
ALTER TABLE `staff_document`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `staff_staff_document_fk` (`staff_id`);

--
-- Indexes for table `staff_salary`
--
ALTER TABLE `staff_salary`
  ADD PRIMARY KEY (`staff_id`,`salary_year`,`salary_month`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD PRIMARY KEY (`stock_in_id`),
  ADD KEY `stock_stock_in_fk` (`stock_id`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`stock_out_id`),
  ADD KEY `stock_stock_out_fk` (`stock_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `reg_no` (`reg_no`),
  ADD KEY `section_student_fk` (`section_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`student_id`,`absent_date`);

--
-- Indexes for table `student_document`
--
ALTER TABLE `student_document`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `student_student_document_fk` (`student_id`);

--
-- Indexes for table `student_relative`
--
ALTER TABLE `student_relative`
  ADD PRIMARY KEY (`relative_id`),
  ADD KEY `student_student_relative_fk` (`student_id`);

--
-- Indexes for table `student_transfer`
--
ALTER TABLE `student_transfer`
  ADD PRIMARY KEY (`transfer_id`),
  ADD KEY `student_student_transfer_fk` (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`teacher_id`,`absent_year`,`absent_month`,`absent_day`);

--
-- Indexes for table `teacher_document`
--
ALTER TABLE `teacher_document`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `teacher_teacher_document_fk` (`teacher_id`);

--
-- Indexes for table `teacher_salary`
--
ALTER TABLE `teacher_salary`
  ADD PRIMARY KEY (`teacher_id`,`salary_year`,`salary_month`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`weekday`,`lesson_hour`,`teacher_id`),
  ADD KEY `teacher_timetable_fk` (`teacher_id`),
  ADD KEY `subject_timetable_fk` (`subject_id`),
  ADD KEY `section_timetable_fk` (`section_id`);

--
-- Indexes for table `tuition_discount`
--
ALTER TABLE `tuition_discount`
  ADD PRIMARY KEY (`student_id`,`discount_year`),
  ADD KEY `section_tuition_discount_fk` (`section_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chartofaccount`
--
ALTER TABLE `chartofaccount`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `class_section`
--
ALTER TABLE `class_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `income_source`
--
ALTER TABLE `income_source`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lib_book`
--
ALTER TABLE `lib_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lib_loan`
--
ALTER TABLE `lib_loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `other_income`
--
ALTER TABLE `other_income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `staff_document`
--
ALTER TABLE `staff_document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stock_in`
--
ALTER TABLE `stock_in`
  MODIFY `stock_in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `stock_out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student_document`
--
ALTER TABLE `student_document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_relative`
--
ALTER TABLE `student_relative`
  MODIFY `relative_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_transfer`
--
ALTER TABLE `student_transfer`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacher_document`
--
ALTER TABLE `teacher_document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_section`
--
ALTER TABLE `class_section`
  ADD CONSTRAINT `classes_class_section_fk` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `chartofaccount_expense_fk` FOREIGN KEY (`account_id`) REFERENCES `chartofaccount` (`account_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_source_income_fk` FOREIGN KEY (`source_id`) REFERENCES `income_source` (`source_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `student_income_fk` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lib_loan`
--
ALTER TABLE `lib_loan`
  ADD CONSTRAINT `lib_book_lib_loan_fk` FOREIGN KEY (`book_id`) REFERENCES `lib_book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lib_member_lib_loan_fk` FOREIGN KEY (`student_id`) REFERENCES `lib_member` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lib_member`
--
ALTER TABLE `lib_member`
  ADD CONSTRAINT `student_lib_member_fk` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_income`
--
ALTER TABLE `other_income`
  ADD CONSTRAINT `income_source_other_income_fk` FOREIGN KEY (`source_id`) REFERENCES `income_source` (`source_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `staff_purchase_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `section_score_fk` FOREIGN KEY (`section_id`) REFERENCES `class_section` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_score_fk` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_score_fk` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD CONSTRAINT `staff_staff_attendance_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_document`
--
ALTER TABLE `staff_document`
  ADD CONSTRAINT `staff_staff_document_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_salary`
--
ALTER TABLE `staff_salary`
  ADD CONSTRAINT `staff_staff_salary_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD CONSTRAINT `stock_stock_in_fk` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD CONSTRAINT `stock_stock_out_fk` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `section_student_fk` FOREIGN KEY (`section_id`) REFERENCES `class_section` (`section_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_student_attendance_fk` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_document`
--
ALTER TABLE `student_document`
  ADD CONSTRAINT `student_student_document_fk` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_relative`
--
ALTER TABLE `student_relative`
  ADD CONSTRAINT `student_student_relative_fk` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_transfer`
--
ALTER TABLE `student_transfer`
  ADD CONSTRAINT `student_student_transfer_fk` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `class_subject_fk` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD CONSTRAINT `teacher_teacher_attendance_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_document`
--
ALTER TABLE `teacher_document`
  ADD CONSTRAINT `teacher_teacher_document_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_salary`
--
ALTER TABLE `teacher_salary`
  ADD CONSTRAINT `teacher_teacher_salary_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `section_timetable_fk` FOREIGN KEY (`section_id`) REFERENCES `class_section` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_timetable_fk` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_timetable_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tuition_discount`
--
ALTER TABLE `tuition_discount`
  ADD CONSTRAINT `section_tuition_discount_fk` FOREIGN KEY (`section_id`) REFERENCES `class_section` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_tuition_discount_fk` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `staff_users_fk` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_level`
--
ALTER TABLE `user_level`
  ADD CONSTRAINT `users_user_level_fk` FOREIGN KEY (`staff_id`) REFERENCES `users` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
