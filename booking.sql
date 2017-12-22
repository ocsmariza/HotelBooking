-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2017 at 01:27 PM
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
  `status` varchar(10) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `name`, `email`, `status`, `content`) VALUES
(16, 'raven', 'raven@yahoo.com', 'read', 'qweqwdhaskdas'),
(8, 'they', 'deoasejo@yahoo.com', 'read', 'wew'),
(13, 'william', 'william@gmail.com', 'read', 'hello'),
(14, 'mariza', 'mariza@ymail.com', 'read', 'hi'),
(15, 'jay', 'jay@gmail.com', 'read', 'yow'),
(18, 'hello', 'hello@gmail.com', 'read', 'hello'),
(19, 'hi', 'hi@gmail.com', 'read', 'asdasduasoidasoidasd\r\nasdasdasdld;kasdas\r\ndasdas\r\ndasd;asdasdas\r\nasdasdasdas'),
(20, 'xlr8', 'xlr8@ymail.com', 'read', 'hello ^_^'),
(21, 'jerome', 'jerome@mail.com', 'read', 'jqwjeqlwjeqweqwcewneqweqweqwoieuqwoieqwioueqoweuioqwueiqowueqiwuadjahsdasdasdhas\r\ndasdas\r\ndas\r\ndas\r\ndas\r\ndasdasd\r\nasd\r\nad\r\nas\r\ndas\r\nd\r\nasd\r\nas\r\ndas\r\nd\r\nsa'),
(22, 'qwerty', 'qwerty@gmail.com', 'read', 'dadad'),
(23, 'irene', 'irene@yahoo.com', 'read', '^_^\r\n\r\nasdaskdalsjdlqweq\r\nqweqkwe;qwlekqwe\r\nqweqwekqweqwe\r\nqeqweqweqwe;kqwe\r\nqweqweqweqwewq'),
(24, 'gero', 'geroasejo@gmail.com', 'read', 'klajdlkasjdannczxnc,z\r\nzczxcnzlkcnladasd\r\nsdfsdmfsdlfj\r\nsfsdfjlsdjfsdjf\r\nsfsdjfskjfs\r\nfsdf\r\nsdfsdfsdfsdfsdfsdfhwhweoiwhfhb\r\njoiwejroweijrweirwerwerwerewrew;l'),
(25, 'irish', 'irish@gmail.com', 'read', 'hello'),
(27, 'shun', 'shun@gmail.com', 'read', 'qwerty'),
(29, 'milkyshake', 'milkshake@gmail.com', 'read', 'dasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `confirmation` varchar(100) NOT NULL,
  `imgname` varchar(100) NOT NULL,
  `imgpath` varchar(100) NOT NULL,
  `imgtype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`confirmation`, `imgname`, `imgpath`, `imgtype`) VALUES
('3f3ek8ko', 'IMG_20160212_224901.jpg', 'payment/IMG_20160212_224901.jpg', 'image/jpeg'),
('b674d0z4', 'IMG_20160212_224901.jpg', 'payment/IMG_20160212_224901.jpg', 'image/jpeg'),
('rzw4gzqz', 'IMG_20160212_224816.jpg', 'payment/IMG_20160212_224816.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `date_reservation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `confirmation` varchar(20) NOT NULL,
  `payment` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `date_reservation`, `firstname`, `lastname`, `city`, `zip`, `province`, `country`, `email`, `contact`, `username`, `password`, `arrival`, `departure`, `adults`, `child`, `result`, `room_id`, `no_room`, `payable`, `status`, `confirmation`, `payment`) VALUES
(156, '2017-12-22 20:02:10', 'krysty', 'qwerty', 'davao', 8000, 'usep', 'Philippines', 'krysty@ymail.com', 312312, 'user1', 'user1pass', '22/12/2017', '26/12/2017', 1, 0, 4, 13, 1, 3800, 'Accepted', 'b674d0z4', ''),
(157, '2017-12-22 20:02:41', 'leo', 'padada', 'davao', 8000, 'usep', 'Philippines', 'leo@yahoo.com', 3123123, 'user2', 'user2', '22/12/2017', '24/12/2017', 1, 0, 2, 14, 1, 1900, 'Accepted', 'rzw4gzqz', ''),
(158, '2017-12-22 20:03:43', 'jerome', 'asejo', 'davao', 8000, 'mandug', 'Philippines', 'jerome@mail.com', 978656, 'user3', 'user3pass', '26/12/2017', '29/12/2017', 2, 0, 3, 17, 1, 2850, 'Canceled', '4bqisskz', ''),
(159, '2017-12-22 20:04:50', 'they', 'asejo', 'davao', 8000, 'mandug', 'Philippines', 'deoasejo@yahoo.com', 23423423, 'user5', 'user5pass', '27/12/2017', '29/12/2017', 1, 0, 2, 23, 1, 3000, 'CheckedOut', 'by0e45jb', ''),
(160, '2017-12-22 20:05:26', 'test', 'test', 'davao', 8000, 'usep', 'Philippines', 'test@gmail.com', 8975463, 'user6', 'user6pass', '22/12/2017', '29/12/2017', 1, 0, 7, 13, 1, 6650, 'Pending', 'pxnbug6w', ''),
(161, '2017-12-22 20:08:47', 'qwerty', 'qwerty', 'davao', 8000, 'usep', 'Philippines', 'qwerty@gmail.com', 53453453, 'user9', 'user9pass', '26/12/2017', '28/12/2017', 2, 0, 2, 16, 1, 1900, 'Accepted', '3f3ek8ko', ''),
(162, '2017-12-22 20:21:01', 'ava', 'asejo', 'davao', 8000, 'mandug', 'Philippines', 'ava@ymail.com', 2147483647, 'user7', 'user7pass', '22/12/2017', '22/12/2017', 1, 0, 0, 15, 1, 0, 'Pending', 'sz3bq430', '');

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
(13, 'Single 101', 950, 'Single Room-Single Bed', 'img/single1.jpg', 5, 1, 1),
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
  `confirmation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roominventory`
--

INSERT INTO `roominventory` (`roominventory_id`, `arrival`, `departure`, `qty_reserve`, `room_id`, `confirmation`) VALUES
(63, '22/12/2017', '26/12/2017', 1, 13, 'b674d0z4'),
(64, '22/12/2017', '24/12/2017', 1, 14, 'rzw4gzqz'),
(65, '26/12/2017', '29/12/2017', 1, 17, '4bqisskz'),
(66, '27/12/2017', '29/12/2017', 1, 23, 'by0e45jb'),
(67, '22/12/2017', '29/12/2017', 1, 13, 'pxnbug6w'),
(68, '26/12/2017', '28/12/2017', 1, 16, '3f3ek8ko'),
(69, '22/12/2017', '22/12/2017', 1, 15, 'sz3bq430');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `position` varchar(45) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `position`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'x-axis@gmail.com'),
(31, 'user7', 'user7pass', 'client', 'ava@ymail.com'),
(30, 'user9', 'user9pass', 'client', 'qwerty@gmail.com'),
(29, 'user6', 'user6pass', 'client', 'test@gmail.com'),
(28, 'user5', 'user5pass', 'client', 'deoasejo@yahoo.com'),
(27, 'user3', 'user3pass', 'client', 'jerome@mail.com'),
(26, 'user2', 'user2', 'client', 'leo@yahoo.com'),
(25, 'user1', 'user1pass', 'client', 'krysty@ymail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userinbox`
--

CREATE TABLE `userinbox` (
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `inbox` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinbox`
--

INSERT INTO `userinbox` (`email`, `username`, `inbox`) VALUES
('krysty@ymail.com', 'user1', 'From: X-AXIS@Hotel.com<br>First Name: krysty<br>Last Name: qwerty<br>Email: krysty@ymail.com <br>City: davao <br>Zip Code: 8000 <br>Country: Philippines <br>Contact Number: 312312 <br>Check In: 22/12/2017<br> Check Out: 26/12/2017<br> Number of Adults: 1<br> Number of child: 0<br> Total nights of stay: 4<br> Room Type: Single 101<br> Number of rooms: 1<br> Payable amount: 3800<br> Confirmation Number: b674d0z4<br> '),
('leo@yahoo.com', 'user2', 'From: X-AXIS@Hotel.com<br>First Name: leo<br>Last Name: padada<br>Email: leo@yahoo.com <br>City: davao <br>Zip Code: 8000 <br>Country: Philippines <br>Contact Number: 3123123 <br>Check In: 22/12/2017<br> Check Out: 24/12/2017<br> Number of Adults: 1<br> Number of child: 0<br> Total nights of stay: 2<br> Room Type: Single 102<br> Number of rooms: 1<br> Payable amount: 1900<br> Confirmation Number: rzw4gzqz<br> '),
('jerome@mail.com', 'user3', 'From: X-AXIS@Hotel.com<br>First Name: jerome<br>Last Name: asejo<br>Email: jerome@mail.com <br>City: davao <br>Zip Code: 8000 <br>Country: Philippines <br>Contact Number: 978656 <br>Check In: 26/12/2017<br> Check Out: 29/12/2017<br> Number of Adults: 2<br> Number of child: 0<br> Total nights of stay: 3<br> Room Type: Single 105<br> Number of rooms: 1<br> Payable amount: 2850<br> Confirmation Number: 4bqisskz<br> '),
('deoasejo@yahoo.com', 'user5', 'From: X-AXIS@Hotel.com<br>First Name: they<br>Last Name: asejo<br>Email: deoasejo@yahoo.com <br>City: davao <br>Zip Code: 8000 <br>Country: Philippines <br>Contact Number: 23423423 <br>Check In: 27/12/2017<br> Check Out: 29/12/2017<br> Number of Adults: 1<br> Number of child: 0<br> Total nights of stay: 2<br> Room Type: Deluxe101<br> Number of rooms: 1<br> Payable amount: 3000<br> Confirmation Number: by0e45jb<br> '),
('test@gmail.com', 'user6', 'From: X-AXIS@Hotel.com<br>First Name: test<br>Last Name: test<br>Email: test@gmail.com <br>City: davao <br>Zip Code: 8000 <br>Country: Philippines <br>Contact Number: 8975463 <br>Check In: 22/12/2017<br> Check Out: 29/12/2017<br> Number of Adults: 1<br> Number of child: 0<br> Total nights of stay: 7<br> Room Type: Single 101<br> Number of rooms: 1<br> Payable amount: 6650<br> Confirmation Number: pxnbug6w<br> '),
('ava@ymail.com', 'user7', 'From: X-AXIS@Hotel.com<br>First Name: ava<br>Last Name: asejo<br>Email: ava@ymail.com <br>City: davao <br>Zip Code: 8000 <br>Country: Philippines <br>Contact Number: 342341128907 <br>Check In: 22/12/2017<br> Check Out: 22/12/2017<br> Number of Adults: 1<br> Number of child: 0<br> Total nights of stay: 0<br> Room Type: Single 103<br> Number of rooms: 1<br> Payable amount: 0<br> Confirmation Number: sz3bq430<br> '),
('qwerty@gmail.com', 'user9', 'From: X-AXIS@Hotel.com<br>First Name: qwerty<br>Last Name: qwerty<br>Email: qwerty@gmail.com <br>City: davao <br>Zip Code: 8000 <br>Country: Philippines <br>Contact Number: 53453453 <br>Check In: 26/12/2017<br> Check Out: 28/12/2017<br> Number of Adults: 2<br> Number of child: 0<br> Total nights of stay: 2<br> Room Type: Single 104<br> Number of rooms: 1<br> Payable amount: 1900<br> Confirmation Number: 3f3ek8ko<br> ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`confirmation`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD UNIQUE KEY `username` (`username`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `userinbox`
--
ALTER TABLE `userinbox`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `roominventory`
--
ALTER TABLE `roominventory`
  MODIFY `roominventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
