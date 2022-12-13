-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 13, 2022 at 10:09 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `not-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `heading` varchar(255) DEFAULT NULL,
  `bodytext` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `timestamp`, `heading`, `bodytext`) VALUES
(1, '2022-12-13 06:07:53', 'Here be dragons!', '<p>The phrase \"here be dragons\" is a phrase that is often used to refer to uncharted or unknown territories.&nbsp;It originated in medieval maps, where the unknown areas of the world were often marked with the phrase&nbsp;\"<em>Hic sunt dracones</em>\" (Latin for \"here are dragons\") to indicate the dangers that lurked in these&nbsp;unexplored regions.</p>'),
(2, '2022-12-13 06:08:56', 'What would Samuel ChatGPT Jackson say?', '<p>Listen here, kid. Life is tough, and it ain\'t gonna get any easier. But you gotta push through it, understand? You&nbsp;gotta be strong, and never back down from a challenge. And when things get really tough, just remember: hold on to&nbsp;your motherf***in\' hat, and don\'t let go.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `heading` (`heading`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
