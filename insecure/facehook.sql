-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2020 at 06:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facehook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(3, 17, 20, 'cute', 'daniele_bianchi_487211', '2020-11-18 14:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(17, 20, '', '6e3e7ed4169601373bf3f7abcb6d80a4.jpg.79', '2020-11-18 14:31:59'),
(18, 20, 'Hello', 'think-different-wallpaper-preview.jpg.60', '2020-11-18 14:40:58'),
(19, 16, '', 'mount-fuji-mac-os-x-lion-wallpaper-preview.jpg.62', '2020-11-18 14:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `describe_user` varchar(255) NOT NULL,
  `Relationship` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` date NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `recovery_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `Relationship`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `user_reg_date`, `status`, `posts`, `recovery_account`) VALUES
(16, 'Daniele', 'Bianchi', 'daniele_bianchi_487211', 'Still thinking about it!', 'Unavailable', '123123123', 'daniele@gmail.com', 'France', 'Male', '2020-11-12', 'male.svg', 'default_image.jpeg', '2020-11-18 12:09:30', 'verified', 'yes', 'Nobody'),
(17, 'Marta', 'Rossi', 'marta_rossi_871459', 'Still thinking about it!', 'Unavailable', '123123123', 'marta@gmail.com', 'Italy', 'Female', '2020-11-19', 'female.svg', 'default_image.jpeg', '2020-11-18 12:11:56', 'verified', 'no', 'Nobody'),
(18, 'Teresa', 'Verdi', 'teresa_verdi_770100', 'Still thinking about it!', 'Unavailable', '123123123', 'teresa@gmail.com', 'Japan', 'Female', '2020-10-31', 'female.svg', 'default_image.jpeg', '2020-11-18 12:12:38', 'verified', 'no', 'Nobody'),
(19, 'Matteo', 'Neri', 'matteo_neri_361952', 'Still thinking about it!', 'Unavailable', '123123123', 'matteo@gmail.com', 'Italy', 'Male', '2020-11-13', 'male.svg', 'default_image.jpeg', '2020-11-18 12:36:41', 'verified', 'no', 'Nobody'),
(20, 'Luca', 'Verdi', 'luca_verdi_462476', 'Still thinking about it!', 'Unavailable', '123123123', 'luca@gmail.com', 'Italy', 'Male', '2020-11-02', 'male.svg', 'default_image.jpeg', '2020-11-18 14:08:55', 'verified', 'yes', 'Nobody');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
