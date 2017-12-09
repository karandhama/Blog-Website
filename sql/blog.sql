-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2017 at 09:50 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Username` varchar(5) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`) VALUES
(2, 'Admin', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Blog_Id` varchar(10) NOT NULL,
  `Comment` text NOT NULL,
  `comment_date` varchar(20) NOT NULL,
  `comment_time` varchar(20) NOT NULL,
  `View_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Id`, `Email`, `Name`, `Blog_Id`, `Comment`, `comment_date`, `comment_time`, `View_status`) VALUES
(140, 'vkdhama9@gmail.com', 'Karan', '11483229', 'Wow', '5th September 2017', '01:50:23 PM', 1),
(141, 'vkdhama9@gmail.com', 'Nirja', '11483229', 'Wow', '5th September 2017', '01:55:47 PM', 1),
(142, 'vkdhama9@gmail.com', 'Karan', '11483229', 'What wow', '5th September 2017', '01:55:58 PM', 1),
(143, 'vkdhama9@gmail.com', 'Nirjari', '11483229', 'do you have any problem?', '5th September 2017', '01:56:16 PM', 1),
(144, 'vkdhama9@gmail.com', 'Karan', '11483229', 'Yaa', '5th September 2017', '01:56:28 PM', 1),
(145, 'vkdhama9@gmail.com', 'Nirjari', '11483229', 'WHAT', '5th September 2017', '01:56:59 PM', 1),
(146, 'nirjaridhama@gmail.com', 'Karan', '62295058', '1', '5th September 2017', '02:22:13 PM', 1),
(147, 'nirjaridhama@gmail.com', 'n', '62295058', '2', '5th September 2017', '02:22:20 PM', 1),
(148, 'nirjaridhama@gmail.com', 'k', '62295058', '3', '5th September 2017', '02:22:26 PM', 1),
(149, 'nirjaridhama@gmail.com', 'n', '62295058', '4\r\n', '5th September 2017', '02:22:33 PM', 1),
(150, 'nirjaridhama@gmail.com', 'k', '62295058', '5', '5th September 2017', '02:22:39 PM', 1),
(151, 'nirjaridhama@gmail.com', 'n', '62295058', '6', '5th September 2017', '02:22:44 PM', 1),
(152, 'vkdhama9@gmail.com', 'k', '1', '1', '5th September 2017', '02:41:20 PM', 1),
(153, 'vkdhama9@gmail.com', 'n', '1', '2', '5th September 2017', '02:41:29 PM', 1),
(154, 'vkdhama9@gmail.com', 'k', '1', '3', '5th September 2017', '02:41:34 PM', 1),
(155, 'vkdhama9@gmail.com', 'n', '1', '4\r\n', '5th September 2017', '02:41:40 PM', 1),
(156, 'vkdhama9@gmail.com', 'k', '1', '5\r\n\r\n', '5th September 2017', '02:41:45 PM', 1),
(157, 'vkdhama9@gmail.com', 'n', '1', '6th\r\n\r\n', '5th September 2017', '02:41:51 PM', 1),
(158, 'vkdhama9@gmail.com', 'k', '1', '7', '5th September 2017', '02:47:26 PM', 1),
(159, 'vkdhama9@gmail.com', 'Nirjari', '52176421', 'Thank you so much!!!', '6th September 2017', '12:48:17 PM', 1),
(160, 'akshkpatel@gmail.com', 'Karan', '89971981', 'wow!!!', '27th September 2017', '02:13:32 PM', 1),
(161, 'akshkpatel@gmail.com', 'Karthik', '89971981', 'wow!!!', '27th September 2017', '02:17:52 PM', 1),
(162, 'vkdhama9@gmail.com', 'Karan', '52176421', 'Hello', '28th September 2017', '11:11:41 AM', 1),
(163, 'vkdhama9@gmail.com', '', '52176421', '', '28th September 2017', '12:46:00 PM', 1),
(164, 'vkdhama9@gmail.com', 'Dhrumil', '11483229', 'Wow!!!', '28th September 2017', '01:41:24 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Id` int(11) NOT NULL,
  `Firstname` varchar(200) NOT NULL,
  `Lastname` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Mobile` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `Firstname`, `Lastname`, `Email`, `Mobile`) VALUES
(10, 'Karan', 'Dhama', 'akshpatel@gmail.com', 9426772815),
(11, 'Karan', 'Dhama', 'akshkpatel@gmail.com', 9426772815);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `Id` int(11) NOT NULL,
  `Follower_email` varchar(100) NOT NULL,
  `Following_email` varchar(100) NOT NULL,
  `View_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`Id`, `Follower_email`, `Following_email`, `View_status`) VALUES
(17, 'vkdhama9@gmail.com', 'vijaydhama28@gmail.com', 0),
(24, 'vkdhama9@gmail.com', 'akshkpatel@gmail.com', 0),
(25, 'nirjaridhama@gmail.com', 'akshkpatel@gmail.com', 0),
(26, 'vkdhama9@gmail.com', 'amandeeptiwary01@gmail.com', 0),
(27, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com', 0),
(28, 'vkdhama9@gmail.com', 'nirjaridhama@gmail.com', 0),
(29, 'vkdhama9@gmail.com', 'vijaydhama29@gmail.com', 0),
(30, 'karthikkini1234@gmail.com', 'vkdhama9@gmail.com', 0),
(31, 'karthikkini1234@gmail.com', 'akshkpatel@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `follow_notifications`
--

CREATE TABLE `follow_notifications` (
  `Id` int(11) NOT NULL,
  `Blog_Id` int(11) NOT NULL,
  `following_email` varchar(100) NOT NULL,
  `follower_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow_notifications`
--

INSERT INTO `follow_notifications` (`Id`, `Blog_Id`, `following_email`, `follower_email`) VALUES
(1, 85293661, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com'),
(2, 88243813, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com'),
(3, 44735904, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com'),
(4, 47632628, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com'),
(5, 25915130, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com'),
(6, 83836197, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com'),
(7, 76705832, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com'),
(8, 33386404, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com'),
(9, 70474820, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com'),
(10, 42771797, 'vkdhama9@gmail.com', 'karthikkini1234@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `Id` int(11) NOT NULL,
  `Blog_Id` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Owner_email` varchar(100) NOT NULL,
  `like_date` varchar(20) NOT NULL,
  `like_time` varchar(20) NOT NULL,
  `View_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`Id`, `Blog_Id`, `Email`, `Owner_email`, `like_date`, `like_time`, `View_status`) VALUES
(56, '2', 'vkdhama9@gmail.com', 'vkdhama9@gmail.com', '1st September 2017', '09:17:49 AM', 1),
(57, '85611461', 'vkdhama9@gmail.com', 'nirjaridhama@gmail.com', '2nd September 2017', '05:56:26 AM', 1),
(58, '84912827', 'vkdhama9@gmail.com', 'vkdhama9@gmail.com', '3rd September 2017', '05:50:57 PM', 1),
(59, '11483229', 'vkdhama9@gmail.com', 'vkdhama9@gmail.com', '4th September 2017', '08:16:55 AM', 1),
(60, '52176421', 'vkdhama9@gmail.com', 'vkdhama9@gmail.com', '4th September 2017', '08:18:39 AM', 1),
(61, '1', 'vkdhama9@gmail.com', 'vkdhama9@gmail.com', '5th September 2017', '02:41:08 PM', 1),
(62, '52176421', 'nirjaridhama@gmail.com', 'vkdhama9@gmail.com', '6th September 2017', '12:48:01 PM', 1),
(63, '89971981', 'vkdhama9@gmail.com', 'akshkpatel@gmail.com', '27th September 2017', '02:13:23 PM', 1),
(64, '89971981', 'karthikkini1234@gmail.com', 'akshkpatel@gmail.com', '27th September 2017', '02:17:38 PM', 1),
(65, '53504703', 'karthikkini1234@gmail.com', 'akshkpatel@gmail.com', '27th September 2017', '02:18:06 PM', 1),
(66, '53504703', 'nirjaridhama@gmail.com', 'akshkpatel@gmail.com', '27th September 2017', '02:18:51 PM', 1),
(67, '15617689', 'vkdhama9@gmail.com', 'nirjaridhama@gmail.com', '28th September 2017', '11:12:08 AM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Picture` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Introduction` text NOT NULL,
  `Interests` text NOT NULL,
  `Mobile` bigint(11) NOT NULL,
  `Permission` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Firstname`, `Lastname`, `Picture`, `Email`, `Password`, `Gender`, `Introduction`, `Interests`, `Mobile`, `Permission`) VALUES
('Aksh', 'Patel', '1506505270.JPG', 'akshkpatel@gmail.com', '123', 'male', 'sdsd', 'dfdf', 0, 1),
('Amandeep', 'Tiwari', '', 'amandeeptiwary01@gmail.com', '123', 'male', 'fdfdffd', 'fdfdfdfd', 0, 1),
('Kathik', 'Kini', '', 'karthikkini1234@gmail.com', '123', '', '', '', 0, 1),
('Nirjari', 'Dhama', '1506448430.JPG', 'nirjaridhama@gmail.com', 'shopoholic', 'female', 'I am a great lover of writing. I have written around 50 blogs till now.. ', 'Movies,Music,Reading and Wrting', 0, 1),
('Parth', 'Parmar', '', 'pppnd28@gmail.com', '123', '', '', '', 0, 1),
('Kalpesh', 'Dhama', 'images.jpg', 'vijaydhama28@gmail.com', '12345678', 'male', '', '', 9426772815, 0),
('Karan', 'Dhama', '', 'vijaydhama29@gmail.com', '123', '', '', '', 0, 1),
('Karan', 'Dhama', '1506651388.jpg', 'vkdhama9@gmail.com', '123', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_blogs`
--

CREATE TABLE `user_blogs` (
  `Blog_Id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Blog_title` varchar(200) NOT NULL,
  `Blog_text` varchar(10) NOT NULL,
  `Blog_date` varchar(20) DEFAULT NULL,
  `Blog_time` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_blogs`
--

INSERT INTO `user_blogs` (`Blog_Id`, `Email`, `Blog_title`, `Blog_text`, `Blog_date`, `Blog_time`) VALUES
(1, 'vkdhama9@gmail.com', 'How to cook a cake in just ONE MINUTE', '1502613685', '13th August 2017', '08:41:25 AM'),
(2, 'vkdhama9@gmail.com', 'This is a trial blog', '1502617894', '13th August 2017', '09:51:33 AM'),
(3, 'pppnd28@gmail.com', 'How to make a blog', '1503156170', '19th August 2017', '03:22:50 PM'),
(11483229, 'vkdhama9@gmail.com', 'hELLO Final1', '1504512179', '4th September 2017', '08:02:59 AM'),
(15617689, 'nirjaridhama@gmail.com', 'This is my third blog', '1504098712', '30th August 2017', '01:11:52 PM'),
(19424165, 'vkdhama9@gmail.com', 'New', '1504704389', '6th September 2017', '01:26:28 PM'),
(33386404, 'vkdhama9@gmail.com', 'k', '1506671099', '29th September 2017', '07:44:59 AM'),
(42771797, 'vkdhama9@gmail.com', 'p', '1506671195', '29th September 2017', '07:46:34 AM'),
(51632520, 'vkdhama9@gmail.com', 'Error checking Blog', '1504462057', '3rd September 2017', '06:07:36 PM'),
(52176421, 'vkdhama9@gmail.com', 'Hello Final', '1504511816', '4th September 2017', '07:56:56 AM'),
(53504703, 'akshkpatel@gmail.com', 'check7', '1506521812', '27th September 2017', '02:16:52 PM'),
(54899480, 'karthikkini1234@gmail.com', 'Hi', '1506519748', '27th September 2017', '01:42:27 PM'),
(54967715, 'akshkpatel@gmail.com', 'check3', '1506519819', '27th September 2017', '01:43:39 PM'),
(57696646, 'akshkpatel@gmail.com', 'check5', '1506520352', '27th September 2017', '01:52:31 PM'),
(61050016, 'amandeeptiwary01@gmail.com', 'Hello', '1503850912', '27th August 2017', '04:21:52 PM'),
(62295058, 'nirjaridhama@gmail.com', 'Comparison between Samsung and Iphone mobile phones', '1503772807', '26th August 2017', '06:40:07 PM'),
(66550674, 'akshkpatel@gmail.com', 'Aksh says - 3rd', '1506516890', '27th September 2017', '12:54:49 PM'),
(68520208, 'vkdhama9@gmail.com', 'check4', '1506520291', '27th September 2017', '01:51:31 PM'),
(68823221, 'akshkpatel@gmail.com', 'Aksh says - This is my first blog ever.....', '1506516331', '27th September 2017', '12:45:31 PM'),
(70474820, 'vkdhama9@gmail.com', '', '1506671169', '29th September 2017', '07:46:09 AM'),
(79783587, 'vkdhama9@gmail.com', 'How to upload videos to you tube and make money from that (Very Useful - Public Demand)', '1503312800', '21st August 2017', '10:53:19 AM'),
(79969206, 'amandeeptiwary01@gmail.com', 'check2', '1506519718', '27th September 2017', '01:41:57 PM'),
(82136639, 'nirjaridhama@gmail.com', 'Fifth', '1504098809', '30th August 2017', '01:13:29 PM'),
(84912827, 'vkdhama9@gmail.com', 'How to make a blogging website and publish it on a web server totally free. Many websites are providing free domain names and database facilities which quite good for beginners............', '1503658335', '25th August 2017', '10:52:15 AM'),
(85611461, 'nirjaridhama@gmail.com', 'This is my forth', '1504098754', '30th August 2017', '01:12:34 PM'),
(89266704, 'nirjaridhama@gmail.com', 'This is my second page', '1504098658', '30th August 2017', '01:10:58 PM'),
(89580515, 'nirjaridhama@gmail.com', 'Check 1', '1506519662', '27th September 2017', '01:41:02 PM'),
(89971981, 'akshkpatel@gmail.com', 'check 6', '1506521164', '27th September 2017', '02:06:03 PM'),
(94241982, 'akshkpatel@gmail.com', 'Aksh says - 2nd', '1506516756', '27th September 2017', '12:52:35 PM');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `Id` int(11) NOT NULL,
  `Firstname` varchar(200) NOT NULL,
  `Lastname` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Code` varchar(16) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Introduction` text NOT NULL,
  `Interests` text NOT NULL,
  `Mobile` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `follow_notifications`
--
ALTER TABLE `follow_notifications`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `user_blogs`
--
ALTER TABLE `user_blogs`
  ADD PRIMARY KEY (`Blog_Id`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `follow_notifications`
--
ALTER TABLE `follow_notifications`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_blogs`
--
ALTER TABLE `user_blogs`
  ADD CONSTRAINT `user_blogs_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `users` (`Email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
