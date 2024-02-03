-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 09:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_property`
--

CREATE TABLE `add_property` (
  `property_id` int(10) NOT NULL,
  `approved` varchar(10) NOT NULL DEFAULT 'No',
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `estimated_price` bigint(10) NOT NULL,
  `total_rooms` int(10) NOT NULL,
  `bedroom` int(10) NOT NULL,
  `living_room` int(10) NOT NULL,
  `bathroom` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `booked` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_property`
--

INSERT INTO `add_property` (`property_id`, `approved`, `country`, `province`, `zone`, `city`, `contact_no`, `property_type`, `estimated_price`, `total_rooms`, `bedroom`, `living_room`, `bathroom`, `description`, `owner_id`, `booked`) VALUES
(171, 'Yes', 'Syria', 'Homs', 'Homs', 'damascus', 1, 'Room', 56777777, 3, 0, 0, 1, 'View fine me gone this name an rank. Compact greater and demands mrs the parlors. Park be fine easy am size away. Him and fine bred knew. At of hardly sister favour. As society explain country raising weather of. Sentiments nor everything off out uncommonly partiality bed.', 2, 'Yes'),
(183, 'No', 'Syria', 'Latakia', '1', '1', 0, 'Apartment', 8222, 1, 1, 1, 1, '1', 2, 'No'),
(184, 'No', 'Syria', 'Latakia', '1', '1', 0, 'Apartment', 8222, 1, 1, 1, 1, '1', 2, 'No'),
(186, 'No', 'Syria', 'Latakia', '1', '1', 0, 'Bed', 8222, 1, 1, 1, 1, '1', 2, 'No'),
(187, 'Yes', 'Syria', 'Homs', 'Homs', 'damascus', 1, 'Bed', 56777777, 0, 0, 0, 1, 'View fine me gone this name an rank. Compact greater and demands mrs the parlors. Park be fine easy am size away. Him and fine bred knew. At of hardly sister favour. As society explain country raising weather of. Sentiments nor everything off out uncommonly partiality bed.', 2, 'Yes'),
(188, 'Yes', 'Syria', 'Homs', 'Homs', 'damascus', 1, 'Room', 56777777, 3, 0, 0, 1, 'View fine me gone this name an rank. Compact greater and demands mrs the parlors. Park be fine easy am size away. Him and fine bred knew. At of hardly sister favour. As society explain country raising weather of. Sentiments nor everything off out uncommonly partiality bed.', 2, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `approve_property`
--

CREATE TABLE `approve_property` (
  `approve_id` int(10) NOT NULL,
  `property_id` int(10) NOT NULL,
  `approve` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `property_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `property_id`, `user_id`) VALUES
(11, 186, 14),
(12, 187, 14),
(13, 171, 14),
(14, 183, 14),
(15, 188, 14);

-- --------------------------------------------------------

--
-- Table structure for table `property_photo`
--

CREATE TABLE `property_photo` (
  `property_photo_id` int(12) NOT NULL,
  `p_photo` varchar(500) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_photo`
--

INSERT INTO `property_photo` (`property_photo_id`, `p_photo`, `property_id`) VALUES
(256, 'owner/product-photo/room1.jpg', 171),
(265, 'owner/product-photo/condo-g3349a97ab_1280.jpg', 183),
(266, 'owner/product-photo/condo-g3349a97ab_1280.jpg', 184),
(268, 'owner/product-photo/room1.jpg', 186),
(269, 'owner/product-photo/condo-g3349a97ab_1280.jpg', 187),
(270, 'owner/product-photo/room2.jpg', 188);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int(5) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `comment`, `rating`, `property_id`) VALUES
(11, 'very good', 0, 171);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_photo` varchar(1000) NOT NULL,
  `profile_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `role`, `email`, `password`, `phone_no`, `address`, `id_type`, `id_photo`, `profile_photo`) VALUES
(2, 'yamen', 'owner', 'yamen@abc.com', '837de4f1ce53a9e66850ade6e82111ac', 971547779032, 'ddddsdsdsd', 'Citizenship', 'images/owner-photo/id.jpg', 'images/owner-photo/profile.png'),
(8, 'samah', 'owner', 'samah@abc.com', 'fbcb60fd2ccf41639774bf03ce5d4f09', 5, 'syria', 'Citizenship', 'images/owner-photo/id.jpg', 'images/owner-photo/profile.png'),
(11, 'm7md', 'admin', 'm7md@abc.com', '45fcb7bb388ba13097b2f392ccd451a7', 0, 'syria', 'Driving Licence', 'images/admin-photo/id.jpg', 'images/admin-photo/profile.png'),
(14, 'sara', 'student', 'sara@abc.com', '5bd537fc3789b5482e4936968f0fde95', 5, 'syria', 'Citizenship', 'images/student-photo/id.jpg', 'images/student-photo/profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_property`
--
ALTER TABLE `add_property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `approve_property`
--
ALTER TABLE `approve_property`
  ADD PRIMARY KEY (`approve_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_ibfk_1` (`property_id`),
  ADD KEY `booking_ibfk_2` (`user_id`);

--
-- Indexes for table `property_photo`
--
ALTER TABLE `property_photo`
  ADD PRIMARY KEY (`property_photo_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_property`
--
ALTER TABLE `add_property`
  MODIFY `property_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `approve_property`
--
ALTER TABLE `approve_property`
  MODIFY `approve_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `property_photo`
--
ALTER TABLE `property_photo`
  MODIFY `property_photo_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_property`
--
ALTER TABLE `add_property`
  ADD CONSTRAINT `add_property_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `approve_property`
--
ALTER TABLE `approve_property`
  ADD CONSTRAINT `approve_property_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_photo`
--
ALTER TABLE `property_photo`
  ADD CONSTRAINT `property_photo_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
