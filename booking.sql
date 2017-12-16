-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 10:46 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `name`, `email`, `content`) VALUES
(16, 'raven', 'raven@yahoo.com', 'qweqwdhaskdas'),
(8, 'they', 'deoasejo@yahoo.com', 'wew'),
(13, 'william', 'william@gmail.com', 'hello'),
(14, 'mariza', 'mariza@ymail.com', 'hi'),
(15, 'jay', 'jay@gmail.com', 'yow'),
(17, 'test', 'test@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `province` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `adults` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `no_room` int(11) NOT NULL,
  `payable` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `confirmation` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `firstname`, `lastname`, `city`, `zip`, `province`, `country`, `email`, `contact`, `username`, `password`, `arrival`, `departure`, `adults`, `child`, `result`, `room_id`, `no_room`, `payable`, `status`, `confirmation`) VALUES
(109, 'test3', 'test3', 'davao', 8000, 'usep', 'Philippines', 'test3@gmail.com', 1234, '', 'qwerty', '16/12/2017', '17/12/2017', 1, 0, 1, 13, 2, 1900, '', '4cnt7atd'),
(108, 'test2', 'test2', 'davao', 8000, 'usep', 'Philippines', 'test2@gmail.com', 123, '', 'qwerty', '16/12/2017', '17/12/2017', 1, 0, 1, 13, 1, 950, '', 'bkzodhch'),
(107, 'test1', 'test1', 'davao', 8000, 'usep', 'Philippines', 'test1@gmail.com', 1234, '', 'qwerty', '17/12/2017', '18/12/2017', 1, 0, 1, 13, 1, 950, '', 'pi4xgt0t'),
(106, 'test', 'test', 'davao', 8000, 'usep', 'Philippines', 'test@gmail.com', 123456789, '', 'qwerty', '16/12/2017', '17/12/2017', 1, 0, 1, 13, 1, 950, '', 'xfzy0eqg'),
(105, 'hello', 'hi', 'davao', 8000, 'usep', 'Philippines', 'hello@gmail.com', 1234567, '', 'qwerty', '16/12/2017', '20/12/2017', 1, 0, 4, 13, 1, 3800, '', 'uxqcqkit'),
(103, 'raven', 'alinsonorin', 'davao', 8000, 'usep', 'Philippines', 'raven@yahoo.com', 123456, '', 'qwerty', '13/12/2017', '15/12/2017', 3, 0, 2, 27, 1, 3000, '', 'h5m02rho'),
(104, 'they', 'asejo', 'davao', 8000, 'mandug', 'Philippines', 'deoasejo@yahoo.com', 987654321, '', 'qwerty', '13/12/2017', '14/12/2017', 1, 0, 1, 13, 1, 950, '', 'z5td87hu'),
(101, 'mariza', 'ocoy', 'davao', 8000, 'usep', 'Philippines', 'mariza@ymail.com', 1234, '', 'qwerty', '13/12/2017', '16/12/2017', 3, 0, 3, 20, 1, 3300, '', '8eso83nb'),
(100, 'Jay', 'Daquipa', 'davao', 8000, 'usep', 'Philippines', 'jay@gmail.com', 1234567890, '', 'qwerty', '14/12/2017', '16/12/2017', 2, 0, 2, 14, 1, 1900, '', 'gba6nn07');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `max_adult` int(11) NOT NULL,
  `max_child` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `type`, `rate`, `description`, `image`, `qty`, `max_adult`, `max_child`) VALUES
(13, 'Single 101', 950, 'Single Room- Single bed', 'img/single1.jpg', 5, 1, 1),
(14, 'Single 102', 950, 'Single Room- Single bed', 'img/single2.jpg', 5, 1, 1),
(15, 'Single 103', 950, 'Single Room- Single bed', 'img/single3.jpg', 5, 1, 1),
(16, 'Single 104', 950, 'Single Room- Single bed', 'img/single4.jpg', 5, 1, 1),
(17, 'Single 105', 950, 'Single Room- Single bed', 'img/single5.jpg', 5, 1, 1),
(18, 'Double 101', 1100, 'Double Room-Queen-size bed', 'img/double1.jpg', 5, 2, 1),
(19, 'Double 102', 1100, 'Double Room-Queen-size bed', 'img/double2.jpg', 5, 2, 1),
(20, 'Double 103', 1100, 'Double Room-Queen-size bed', 'img/double3.JPG', 5, 2, 1),
(21, 'Double 104', 1100, 'Double Room-Queen-size bed', 'img/double4.jpg', 5, 2, 1),
(22, 'Double 105', 1100, 'Double Room-Queen-size bed', 'img/double5.jpg', 5, 2, 1),
(23, 'Deluxe101', 1500, 'Deluxe Room-King-size bed', 'img/deluxe1.jpg', 5, 3, 2),
(24, 'Deluxe102', 1500, 'Deluxe Room-King-size bed', 'img/deluxe2.jpg', 5, 3, 2),
(25, 'Deluxe103', 1500, 'Deluxe Room-King-size bed', 'img/deluxe3.jpg', 5, 3, 2),
(26, 'Deluxe104', 1500, 'Deluxe Room-King-size bed', 'img/deluxe4.jpg', 5, 3, 2),
(27, 'Deluxe105', 1500, 'Deluxe Room-King-size bed', 'img/deluxe5.png', 5, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roominventory`
--

CREATE TABLE `roominventory` (
  `roominventory_id` int(11) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `qty_reserve` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roominventory`
--

INSERT INTO `roominventory` (`roominventory_id`, `arrival`, `departure`, `qty_reserve`, `room_id`, `confirmation`, `status`) VALUES
(2, '14/12/2017', '16/12/2017', 1, 14, 'gba6nn07', 'Active'),
(3, '13/12/2017', '16/12/2017', 1, 20, '8eso83nb', 'Active'),
(5, '13/12/2017', '15/12/2017', 1, 27, 'h5m02rho', 'Active'),
(6, '13/12/2017', '14/12/2017', 1, 13, 'z5td87hu', 'Active'),
(7, '16/12/2017', '20/12/2017', 1, 13, 'uxqcqkit', 'Active'),
(8, '16/12/2017', '17/12/2017', 1, 13, 'xfzy0eqg', 'Active'),
(9, '17/12/2017', '18/12/2017', 1, 13, 'pi4xgt0t', 'Active'),
(10, '16/12/2017', '17/12/2017', 1, 13, 'bkzodhch', 'Active'),
(11, '16/12/2017', '17/12/2017', 2, 13, '4cnt7atd', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `position` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `position`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `roominventory`
--
ALTER TABLE `roominventory`
  ADD PRIMARY KEY (`roominventory_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `roominventory`
--
ALTER TABLE `roominventory`
  MODIFY `roominventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
