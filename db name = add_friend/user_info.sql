-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 04:53 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `add_friend`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `email`, `password`, `datetime`) VALUES
(1, 'sourov pal', 'sourovpal35@gmail.com', '$2y$10$YNFe8QyK1Df22T/4EnUVGO66fCTktFBOVI3hfiTKJx5OWF0j743ey', '2020-06-30 18:20:23'),
(2, 'Kousike pal', 'kousikepal@gmail.com', '$2y$10$xAvy.45v2QoC.E8ewCXkTeJyZcftdPqIMolPdx5WZC2.NbZrKY46m', '2020-06-30 18:21:02'),
(3, 'partho pal', 'parthopal@gmail.com', '$2y$10$gw0S24k0AwiQYl.128PVo.Q6ZRntvgJm/MSWtZH./TkmTdIv6GEni', '2020-06-30 18:21:40'),
(4, 'shoron pal', 'shoronpal@gmail.com', '$2y$10$Q7L9TI7j5mYFLlQ.2joP4uhQPL.4ZQajMwbAMyJTI4wJWNNl2x2tS', '2020-06-30 18:22:15'),
(5, 'salmon khan', 'sourdovpal35@gmail.com', '$2y$10$YNFe8QyK1Df22T/4EnUVGO66fCTktFBOVI3hfiTKJx5OWF0j743ey', '2020-06-30 18:20:23'),
(6, 'jakir hosan', 'kousiddkepal@gmail.com', '$2y$10$xAvy.45v2QoC.E8ewCXkTeJyZcftdPqIMolPdx5WZC2.NbZrKY46m', '2020-06-30 18:21:02'),
(7, 'ovi jit pal', 'parthodddpal@gmail.com', '$2y$10$gw0S24k0AwiQYl.128PVo.Q6ZRntvgJm/MSWtZH./TkmTdIv6GEni', '2020-06-30 18:21:40'),
(8, 'roktim pal', 'shoronpal@gmail.comddd', '$2y$10$Q7L9TI7j5mYFLlQ.2joP4uhQPL.4ZQajMwbAMyJTI4wJWNNl2x2tS', '2020-06-30 18:22:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
