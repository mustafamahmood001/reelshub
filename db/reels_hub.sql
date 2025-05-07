-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 07:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reels_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `reelshub`
--

CREATE TABLE `reelshub` (
  `id` int(11) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `movie_year` int(4) NOT NULL,
  `movie_description` varchar(255) NOT NULL,
  `movie_genre` varchar(255) NOT NULL,
  `movie_banner` varchar(255) NOT NULL,
  `movie_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reelshub`
--

INSERT INTO `reelshub` (`id`, `movie_title`, `movie_year`, `movie_description`, `movie_genre`, `movie_banner`, `movie_video`) VALUES
(3, 'Doremoon', 2012, 'Doraemon: Nobita’s New Dinosaur is an animated adventure where Nobita discovers two mysterious dinosaur eggs. After they hatch, he names the twin dinosaurs Kyu and Myu. Alongside Doraemon and friends, Nobita travels back in time to return them to their na', 'Drama', 'doremon.jpeg', 'Doremoon.mp4'),
(5, 'Mr Been', 2018, 'When Mr. Bean wins a holiday to France', 'Comedy', 'been.jpg', 'Mr Bean- The Animated Series is now on CiTV. Watch the trailer here!.mp4'),
(6, 'Dora', 2010, 'Dora explores and solves fun puzzles!', 'Animation', 'dora.jpeg', 'DORA - New Series Trailer - Paramount+.mp4'),
(7, 'Cat Fight', 2012, 'Cat drifting', 'Action', 'cat.jpg', 'Cat Drifting 😼 - #cat.mp4'),
(8, 'Elio', 1999, 'Elio Thriller Wonderfull', 'Thriller', 'elio.jpeg', 'Elio - Official Trailer.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reelshub`
--
ALTER TABLE `reelshub`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reelshub`
--
ALTER TABLE `reelshub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
