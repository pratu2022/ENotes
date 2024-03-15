-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 06:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noteswap`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_event_master`
--

CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `calendar_event_master`
--

INSERT INTO `calendar_event_master` (`event_id`, `event_name`, `event_start_date`, `event_end_date`) VALUES
(2, 'dfgx', '2024-02-14', '2024-02-15'),
(3, 'jj', '2024-02-15', '2024-02-16'),
(4, 'Upload Your assignment By Given Date', '2024-02-23', '2024-02-28'),
(5, 'assignment upload by today only', '2024-02-28', '2024-02-28'),
(6, 'upload assignment 2', '2024-03-15', '2024-03-16'),
(7, 'upload assignment 3 soon', '2024-03-21', '2024-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `assign_id`, `comment_id`, `name`, `description`, `register_date`) VALUES
(20, 3, 0, 'Nikisha Mithaiwala', 'must complete within 5 days', '2024-03-05 11:57:31'),
(21, 3, 20, 'Nikisha Mithaiwala', 'after that it not be accepted!', '2024-03-05 11:58:04'),
(22, 3, 0, 'Nikisha Mithaiwala', 'gsg', '2024-03-05 11:58:20'),
(23, 3, 22, 'Nikisha Mithaiwala', 'reply of gsg', '2024-03-05 11:58:36'),
(24, 3, 21, 'Nikisha Mithaiwala', 'ok', '2024-03-05 11:58:47'),
(25, 4, 0, 'pratiksha bendre', 'gg', '2024-03-05 13:31:24'),
(26, 4, 25, 'Nikisha Mithaiwala', 'ok', '2024-03-05 13:32:10'),
(27, 3, 24, 'Nikisha Mithaiwala', 'hh', '2024-03-06 04:41:05'),
(28, 4, 0, 'pratiksha bendre', 'nice notess.\r\n', '2024-03-13 07:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `comments_notes`
--

CREATE TABLE `comments_notes` (
  `id` int(11) NOT NULL,
  `notes_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments_notes`
--

INSERT INTO `comments_notes` (`id`, `notes_id`, `comment_id`, `name`, `description`, `register_date`) VALUES
(23, 16, 0, 'Nikisha Mithaiwala', 'ok', '2024-03-08 21:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblassignment`
--

CREATE TABLE `tblassignment` (
  `srno` int(100) NOT NULL,
  `UploadedBy` varchar(255) NOT NULL,
  `UploadedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `Subject` varchar(255) NOT NULL,
  `Assignment` varchar(255) NOT NULL,
  `Start_Date` date NOT NULL,
  `Start_End` date NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblassignment`
--

INSERT INTO `tblassignment` (`srno`, `UploadedBy`, `UploadedOn`, `Subject`, `Assignment`, `Start_Date`, `Start_End`, `Type`, `Description`, `Title`) VALUES
(3, 'Nikisha Mithaiwala', '2024-02-25 15:27:53', 'Web Development', 'unit 1.pdf', '2024-02-25', '2024-03-20', 'pdf', '            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora autem cumque accusamus. Tenetur minima quisquam nam quas impedit aliquid architecto vel numquam. Autem repellat minima dolore, consequuntur accusantium, vel porro qui sequi perfe', 'Assignment 1'),
(4, 'Nikisha Mithaiwala', '2024-02-28 15:09:10', 'Computer & Programming', 'resume-1.pdf', '2024-02-28', '2024-02-29', 'pdf', 'qwerrrrty', 'Assignment1'),
(5, 'Nikisha Mithaiwala', '2024-03-05 14:49:37', 'Computer & Programming', 'resume-1 (2).pdf', '2024-03-05', '2024-03-14', 'pdf', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, fugiat accusantium! Provident minus officia cum doloremque voluptates quos vero eveniet alias reiciendis sequi. A neque, sed vel nulla officia ratione architecto iusto inventore?', 'Assignment 2'),
(6, 'Nikisha Mithaiwala', '2024-03-13 15:58:41', 'Web Development', 'Progress Report 2.pdf', '2024-03-13', '2024-03-22', 'pdf', 'Submit it! before 22 ', 'Assignment 2');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `register_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `first_name`, `last_name`, `email`, `message`, `register_date`) VALUES
(1, 'Pratiksha', 'Bendre', 'bendrepratiksha747@gmail.com', 'fff', '2024-02-26'),
(2, 'Anjali', 'Bendre', 'pra@gmail.com', 'ii', '2024-02-26'),
(3, 'Shivangi', 'Mishra', 'janki@gmail.com', 'hh', '2024-02-26'),
(4, 'Pratiksha', 'Rai', 'bendrepratiksha747@gmail.com', 'bgg', '2024-03-13'),
(5, 'shreya', 'Choudhary', 'shreya55@gmail.com', 'i want to be a member.', '2024-03-13'),
(6, 'Nitya', 'Rai', 'nitya@gmail.com', 'i want to  be part of your services', '2024-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `id` int(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `fac_phone` varchar(100) NOT NULL,
  `fac_email` varchar(100) NOT NULL,
  `fac_address` varchar(100) NOT NULL,
  `fac_username` varchar(100) NOT NULL,
  `fac_password` varchar(100) NOT NULL,
  `fac_gender` varchar(100) NOT NULL,
  `fac_image` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`id`, `regno`, `fac_name`, `fac_phone`, `fac_email`, `fac_address`, `fac_username`, `fac_password`, `fac_gender`, `fac_image`, `date`, `resettoken`, `resettokenexpire`, `register_date`, `time`) VALUES
(22, 'FS221708253639', 'Nikisha Mithaiwala', '9574831868', 'bendrepratiksha747@gmail.com', 'gfg', 'nikisha23', '$2y$10$Xs.4Lzy7tJNG.sYvxbAoSOYegeHolJ1bA4SaLk.uzsHWQa3C/wfAe', 'Female', 'a.png', '2024-02-18', NULL, NULL, '2024-02-18 10:53:59', 1710477807),
(23, 'FS121708260194', 'Bhautika Patel', '9574831860', 'bendrepratiksha@gmail.com', 'hha', 'bhautika23', '$2y$10$82MrcM.ZN2cC7UoiVTxaJOnydbO1MQpEeuBeSJx7sMKWEeNe3i6f2', 'Female', 'd.png', '2024-02-18', NULL, NULL, '2024-02-18 12:43:14', 1710419128),
(24, 'FS991708260279', 'Kartik Thakkar', '9574831862', 'nikisha234@gmail.com', 'hh', 'kartik23', '$2y$10$0e8W6zQd0jrm/SBePO976OpzeHGvupiD9DNZfSrhKruInBEc846Xe', 'Female', 'e.png', '2024-02-18', NULL, NULL, '2024-02-18 12:44:40', 0),
(25, 'FS291708260792', 'Devika Gupta', '9574831866', 'nikisha23@gmail.com', 'mmgggjg', 'devika23', '$2y$10$UmJxO80ZJ0/osmgoBm.EousJXo9UzGDpVzszb9flSpP2TxhcuyIqO', 'Female', 'g.png', '2024-02-18', NULL, NULL, '2024-02-18 12:53:12', 0),
(26, 'FS321709187620', 'Sangita Makhija', '9574831862', 'Sangita@gmail.com', 'hjh', 'sangita23', '$2y$10$HHIJ0YV0YysAAfqdlzc/Bu3.QVLncPuf/N8JMrOFAE6IE.fANHnUy', 'Female', 'c.png', '2024-02-29', NULL, NULL, '2024-02-29 06:20:20', NULL),
(28, 'FS181709191291', 'Vijay Verma', '9574831444', 'vijya@gmail.com', 'kk', 'vijay23', '$2y$10$nXtlUfvuVaXCeNPZP9rOoulgLliBvkScMjqAETMovUEinciBSnMCC', 'Female', 'jsfram.png', '2024-02-29', NULL, NULL, '2024-02-29 07:21:31', NULL),
(29, 'FS661709211456', 'Jenish Mishra', '9575831868', 'jenishbhai@gmail.com', 'hh', 'jenish23', '$2y$10$DXvzbWuFq05VL/B4RVpMf.m7iv93rWstnAYKyMMoXoUxF4eQfKLZ6', 'Female', 'javier-trueba-iQPr1XkF5F0-unsplash.jpg', '2024-02-29', NULL, NULL, '2024-02-29 12:57:36', NULL),
(30, 'FS141710314258', 'K.P Singh', '98232156443', 'singh.kp@gmail.com', 'hahahahahhah', 'admin', '$2y$10$eyr5IvESjy0vs2DYuVQo2usueTVWNXSQc52nbX0k0WLXlGuXXmT9S', 'Male', 'mongoblack.png', '2024-03-13', NULL, NULL, '2024-03-13 07:17:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotes`
--

CREATE TABLE `tblnotes` (
  `srno` int(100) NOT NULL,
  `UploadedBy` varchar(255) NOT NULL,
  `Uploadedon` date NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnotes`
--

INSERT INTO `tblnotes` (`srno`, `UploadedBy`, `Uploadedon`, `Subject`, `Notes`, `Type`, `Description`, `Title`) VALUES
(16, 'Nikisha Mithaiwala', '2024-02-24', 'Computer & Programming', 'WIN_20240205_19_13_30_Pro.mp4', 'mp4', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora autem cumque accusamus. Tenetur minima quisquam nam quas impedit aliquid architecto vel numquam. Autem repellat minima dolore, consequuntur accusantium, vel porro qui sequi perferendis quo ', 'Chapter1'),
(17, 'Nikisha Mithaiwala', '2024-02-25', 'Computer & Programming', 'resume-1.pdf', 'pdf', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ipsam cum a culpa quasi aliquid quaerat soluta illo, eius quis cumque eaque eos. Quasi doloremque laudantium non nesciunt! Maiores enim provident, eveniet quod, natus fuga assumenda vero od', 'Chapter 2'),
(25, 'Nikisha Mithaiwala', '2024-03-13', 'Computer & Programming', 'phpproblemsheet.pdf', 'pdf', 'Notes on Php crud operations', 'Chapter 3');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `id` int(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `stud_name` varchar(100) NOT NULL,
  `stud_phone` varchar(100) NOT NULL,
  `stud_email` varchar(100) NOT NULL,
  `stud_address` varchar(100) NOT NULL,
  `stud_username` varchar(100) NOT NULL,
  `stud_password` varchar(100) NOT NULL,
  `stud_gender` varchar(100) NOT NULL,
  `stud_image` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `regno`, `stud_name`, `stud_phone`, `stud_email`, `stud_address`, `stud_username`, `stud_password`, `stud_gender`, `stud_image`, `date`, `resettoken`, `resettokenexpire`, `register_date`, `time`) VALUES
(50, 'TS551708920494', 'pratiksha bendre', '9574831868', 'bendrepratiksha747@gmail.com', 'jmjj', 'pratu23', '$2y$10$SY/cTK/fFZMJ03ZzCUEfB.eDsmrC01Dx2z1ynQQyE8yZpQ24CkArK', 'Female', 'd.png', '2024-02-26', NULL, NULL, '2024-02-26 04:08:14', 1710422401),
(51, 'TS991709138692', 'nisha yadav', '7865523456', 'Nishadidi@gmail.com', 'jjz', 'nisha23', '$2y$10$ihDP2F8Ye/mJL5CvaMU.IuR97sBcUC232iFWgVjjJRdesx4Luyad6', 'Female', 'g.png', '2024-02-28', NULL, NULL, '2024-02-28 16:44:52', 1709871788),
(52, 'TS461709191694', 'Sakshi Yadav', '9574831454', 'bendrepratiksha747@gmail.com', 'nn', 'sakshi23', '$2y$10$OFrCPMBfw82xN0I5B5n70eXh.ixL5gD.DKgc4v1BwrVdWylk/oj4C', 'Female', 'a.png', '2024-02-29', NULL, NULL, '2024-02-29 07:28:14', 1710419978),
(53, 'TS961709192977', 'jinal shah', '7865763456', 'jinalsha@gmail.com', 'hh', 'jinal23', '$2y$10$39OQKWb0e36Zr66Yv6m.VOE3TwsqkFx8XlQxgN11L3ZmI3sKtcm.G', 'Female', 'e.png', '2024-02-29', NULL, NULL, '2024-02-29 07:49:37', NULL),
(54, 'TS281709199087', 'diksha roy', '94244667578', 'diksharoy@gmail.com', 'hh', 'diksha23', '$2y$10$OTiWr.fPRD84dk429akWJ..mH6U0bJlpkmUeJS4fVozVIjzs/jWA.', 'Female', 'admin.png', '2024-02-29', NULL, NULL, '2024-02-29 09:31:27', NULL),
(55, 'TS141709205184', 'ram setu', '85676656777', 'ram@gmail.com', 'gg', 'ram23', '$2y$10$XOP1BH2Yi.0DcD.CbBxutOFC73PIiCKfTdJBfB56ATlAPzaiALcm6', 'Male', 'admin.jpg', '2024-02-29', NULL, NULL, '2024-02-29 11:13:04', NULL),
(56, 'TS301710344797', 'Nikita bendre', '9574831845', 'bendreniki@gmail.com', 'm-38 jayraj Society, ichhapore-3 surat', 'nikita23', '$2y$10$QuSDrEJk5bA8y8rr2VJZc.1MFb2BcMv.175m9DvcbD.N7voG/CSnS', 'Female', 'IMG_20211218_071440_0982.jpg', '2024-03-13', NULL, NULL, '2024-03-13 15:46:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `id` int(100) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `allocated_faculty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`id`, `subject_code`, `subject_name`, `short_name`, `allocated_faculty`) VALUES
(15, 101, 'Computer & Programming', 'CP', 'Nikisha Mithaiwala'),
(16, 102, 'Data Analysis ', 'DAM', 'Bhautika Patel'),
(17, 103, 'Web Development', 'WD', 'Nikisha Mithaiwala'),
(19, 105, 'Data Structure', 'DSA', 'Vijay Verma');

-- --------------------------------------------------------

--
-- Table structure for table `tbluploadassign`
--

CREATE TABLE `tbluploadassign` (
  `id` int(100) NOT NULL,
  `uploadedby_stud` varchar(255) NOT NULL,
  `uploaded_assign` varchar(255) NOT NULL,
  `uploadedon` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluploadassign`
--

INSERT INTO `tbluploadassign` (`id`, `uploadedby_stud`, `uploaded_assign`, `uploadedon`, `title`, `description`, `subject`, `date`, `status`) VALUES
(2, 'pratiksha bendre', 'Progress Report 2.pdf', '2024-02-28 11:33:58', 'Assignment 1', 'hogya', 'Web Development', '2024-02-28', 'approved'),
(3, 'pratiksha bendre', 'resume-1.pdf', '2024-02-28 15:10:26', 'Assignment 1', 'mm', 'Computer & Programming', '2024-02-28', 'denied'),
(4, 'nisha yadav', 'SEMINAR_DETAILS.pdf', '2024-02-28 16:46:28', 'Assignment 1', 'kr dia hum!', 'Computer & Programming', '2024-02-28', 'approved'),
(5, 'nisha yadav', 'SEMINAR-PART2.pdf', '2024-02-29 02:00:37', 'Assignment 1', 'hjj', 'Web Development', '2024-02-29', 'denied'),
(6, 'ram setu', '6thSemSyllabus.pdf', '2024-02-29 12:18:27', 'Assignment1', 'jj', 'Computer & Programming', '2024-02-29', 'denied'),
(7, 'nisha yadav', 'resume-1 (1).pdf', '2024-03-07 08:10:04', 'Assignment 2', 'hh', 'Computer & Programming', '2024-03-07', 'pending'),
(8, 'Sakshi Yadav', 'resum.pdf', '2024-03-14 12:25:07', 'Assignment 1', ' Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod optio doloremque eius, nulla voluptates suscipit amet sapiente quam, eligendi nam non itaque!\r\n', 'Computer Programming', '2024-03-14', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_notes`
--
ALTER TABLE `comments_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblassignment`
--
ALTER TABLE `tblassignment`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`fac_email`);

--
-- Indexes for table `tblnotes`
--
ALTER TABLE `tblnotes`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`regno`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluploadassign`
--
ALTER TABLE `tbluploadassign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments_notes`
--
ALTER TABLE `comments_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblassignment`
--
ALTER TABLE `tblassignment`
  MODIFY `srno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblnotes`
--
ALTER TABLE `tblnotes`
  MODIFY `srno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbluploadassign`
--
ALTER TABLE `tbluploadassign`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
