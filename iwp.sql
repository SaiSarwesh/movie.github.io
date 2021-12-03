-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 06:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--

--

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `BookingId` int(255) NOT NULL,
  `UserId` int(255) NOT NULL,
  `ShowId` int(255) NOT NULL,
  `SeatDetails` varchar(255) NOT NULL,
  `TimeofBooking` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`BookingId`, `UserId`, `ShowId`, `SeatDetails`, `TimeofBooking`) VALUES
(64, 21, 70, '42,43,44', '2021-05-29 16:36:19.002461'),
(65, 21, 69, '34,35,36', '2021-05-29 16:36:42.136202'),
(66, 21, 69, '0,1', '2021-05-29 16:47:33.397695'),
(67, 22, 69, '48,49', '2021-05-29 16:51:09.524277'),
(68, 22, 68, '4,5,6', '2021-05-29 16:51:32.919074'),
(69, 7, 70, '2,3,4', '2021-05-30 01:10:23.791123'),
(70, 7, 68, '42,43,44', '2021-05-30 01:10:42.794486'),
(71, 21, 69, '18,19', '2021-05-30 03:17:10.017153'),
(72, 21, 71, '37', '2021-05-30 04:02:31.697071'),
(73, 22, 70, '48,49', '2021-05-30 04:45:58.787248'),
(74, 21, 72, '46,47', '2021-05-30 05:00:38.100980'),
(75, 21, 73, '48,49', '2021-05-30 06:59:37.271707'),
(76, 7, 74, '3,4,5', '2021-05-30 07:20:22.886093'),
(77, 7, 74, '42,43,44', '2021-05-30 07:22:39.618066'),
(78, 7, 76, '3,4,5', '2021-05-30 07:24:12.368016');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MovieId` int(255) NOT NULL,
  `MovieName` varchar(255) DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Director` varchar(255) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Imdb` int(255) DEFAULT NULL,
  `Trailer` varchar(255) DEFAULT NULL,
  `Duration` int(255) DEFAULT NULL,
  `InDate` date DEFAULT NULL,
  `OutDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`MovieId`, `MovieName`, `Genre`, `Director`, `Description`, `Image`, `Imdb`, `Trailer`, `Duration`, `InDate`, `OutDate`) VALUES
(19, 'Big Bull', 'Crime', 'Kookie Gulati', 'The Big Bull is an upcoming Indian Hindi-language crime drama film directed by Kookie Gulati, produced by Ajay Devgn, Anand Pandit, Vikrant Sharma and Kumar Mangat Pathak. ', 'big_bull.jpg', 8, 'Bw6I-KgCSP4', 120, '2021-05-30', '2021-06-20'),
(20, 'Avatar', 'Action', 'James Cameron', 'Jake, who is paraplegic, replaces his twin on the Na\'vi inhabited Pandora for a corporate mission. After the natives accept him as one of their own, he must decide where his loyalties lie.', 'avatar.jpg', 8, '5PSNL1qE6VY', 162, '2021-06-06', '2021-06-27'),
(22, 'Godzilla vs. Kong', 'Action', 'Adam Wingard', 'Kong and his protectors undertake a perilous journey to find his true home. Along for the ride is Jia, an orphaned girl who has a unique and powerful bond with the mighty beast. However, they soon find themselves in the path of an enraged Godzilla as he cuts a swath of destruction across the globe.', 'godzilla.jpg', 6, 'odM92ap8_c0', 114, '2021-06-06', '2021-06-27'),
(23, 'KARNAN', 'Action', 'Mari Selvaraj', 'Karnan, a fearless village youth must fight for the rights of the conservative people of his village.', 'karnan.jpg', 9, 'pgfUzQ8nzBY', 159, '2021-05-30', '2021-06-20'),
(25, 'KGF 2', 'Action', 'Prashanth Neel', 'K.G.F: Chapter 2 is an upcoming Indian Kannada-language period action film written and directed by Prashanth Neel, and produced by Vijay Kiragandur under the banner Hombale Films. The second installment of the two-part series, it is a sequel to the 2018 film K.G.F: Chapter 1.', 'KGF.jpeg', 8, 'Qah9sSIXJqk', 120, '2021-06-06', '2021-06-27'),
(31, 'Tenet', 'Action', 'Christopher Nolan', 'A secret agent is given a single word as his weapon and sent to prevent the onset of World War III. He must travel through time and bend the laws of nature in order to be successful in his mission.', 'tenet.jpg', 9, 'AZGcmvrTX9M', 120, '2021-05-30', '2021-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `ShowId` int(255) NOT NULL,
  `SeatNo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`ShowId`, `SeatNo`) VALUES
(70, 42),
(70, 43),
(70, 44),
(69, 34),
(69, 35),
(69, 36),
(69, 0),
(69, 1),
(69, 48),
(69, 49),
(68, 4),
(68, 5),
(68, 6),
(70, 2),
(70, 3),
(70, 4),
(68, 42),
(68, 43),
(68, 44),
(69, 18),
(69, 19),
(71, 37),
(70, 48),
(70, 49),
(72, 46),
(72, 47),
(73, 48),
(73, 49),
(74, 3),
(74, 4),
(74, 5),
(74, 42),
(74, 43),
(74, 44),
(76, 3),
(76, 4),
(76, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `ShowId` int(255) NOT NULL,
  `MovieId` int(255) DEFAULT NULL,
  `TheaterId` int(255) DEFAULT NULL,
  `Times` varchar(255) DEFAULT NULL,
  `Dates` date DEFAULT NULL,
  `Seats` int(255) DEFAULT NULL,
  `Price` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`ShowId`, `MovieId`, `TheaterId`, `Times`, `Dates`, `Seats`, `Price`) VALUES
(68, 19, 5, '9', '2021-05-30', 50, 400),
(69, 19, 10, '9', '2021-05-30', 50, 500),
(70, 23, 8, '10', '2021-05-30', 50, 300),
(71, 23, 4, '10', '2021-06-01', 50, 500),
(72, 23, 10, '9', '2021-06-03', 50, 300),
(73, 22, 8, '10', '2021-06-06', 50, 600),
(74, 31, 5, '8', '2021-05-30', 50, 300),
(75, 31, 10, '9', '2021-05-30', 50, 200),
(76, 31, 5, '8', '2021-05-31', 50, 400);

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `TheaterId` int(255) NOT NULL,
  `TheaterName` varchar(255) DEFAULT NULL,
  `Seats` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`TheaterId`, `TheaterName`, `Seats`) VALUES
(4, 'Imax', 50),
(5, 'pvr', 50),
(6, 'cinepolis', 50),
(8, 'INOX', 50),
(9, 'Forum', 50),
(10, 'Gopalan', 50);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `TimeId` int(255) NOT NULL,
  `Slots` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`TimeId`, `Slots`) VALUES
(1, '8'),
(2, '9'),
(3, '10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `username`, `password`, `email`) VALUES
(7, 'vishnu', '25f9e794323b453885f5181f1b624d0b', 'email@gmail.com'),
(13, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com'),
(21, 'Sam', '25f9e794323b453885f5181f1b624d0b', 'sam@gmail.com'),
(22, 'pratyush', '25f9e794323b453885f5181f1b624d0b', 'pratyush@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`MovieId`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`ShowId`),
  ADD KEY `con1` (`MovieId`),
  ADD KEY `con2` (`TheaterId`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`TheaterId`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`TimeId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `BookingId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MovieId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `ShowId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `theater`
--
ALTER TABLE `theater`
  MODIFY `TheaterId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `TimeId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `con1` FOREIGN KEY (`MovieId`) REFERENCES `movies` (`MovieId`),
  ADD CONSTRAINT `con2` FOREIGN KEY (`TheaterId`) REFERENCES `theater` (`TheaterId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
