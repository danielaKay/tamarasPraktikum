-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Apr 21, 2026 at 09:00 AM
-- Server version: 9.6.0
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tamara`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `title` varchar(256) NOT NULL,
  `author` varchar(256) NOT NULL,
  `publishing_year` varchar(256) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `user_id` int NOT NULL,
  `cover_image` varchar(256) NOT NULL,
  `genre` varchar(256) NOT NULL,
  `total_page_number` varchar(4) NOT NULL,
  `read_page_number` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `publishing_year`, `comment`, `user_id`, `cover_image`, `genre`, `total_page_number`, `read_page_number`) VALUES
(1, 'Tiny dungeon: Zweite edition', 'Alan Bahr', '2021', 'ein schönes einsteigerfreundliches Regelwerk', 1, 'TinyDungeon2E_cover-900px.jpg', 'high fantasy', '', ''),
(2, 'Investigators handbook', 'Sandy Petersen', '2016', 'ein gutes Buch wenn man Coc spielen möchte', 1, 'Coc-handbook.jpg', 'Lovecraftian horror', '', ''),
(3, 'Jäger die Vergeltung', 'Justin Achilli', '2000', 'eine interesannte perspektive in WOD', 1, 'Jaeger-Vergeltung-Cover.jpg', 'horror', '', ''),
(13, 'Ein schöner Titel', 'John Smith', '2023', 'wow just', 1, '', 'sci-fi', '', ''),
(14, 'Cthulhu by Gaslight - Investigators Guide', 'Keris McDonald', '2024', 'noch nicht gelesen', 1, 'Coc.jpg', 'mystery', '', ''),
(15, 'Root - Das Rollenspiel: Grundregelwerk', 'Brenan Conway', '2024', 'noch nicht gelesen', 1, 'root.jpg', 'fantasy', '', ''),
(17, 'Vampire: The Masquerade ', 'Martin Ericsson', '2018', 'noch nicht gelesen', 1, 'Vampire-die-Maskerade.jpg', 'urban fantasy', '', ''),
(18, 'Dungeon Masters Guide', 'Andrew borck', '2024', 'noch nicht gelesen', 1, 'Dmg.jpg', 'fantasy', '', ''),
(19, 'Monsterhearts 2', 'Avery Alder', '2012', 'noch nicht gelesen', 1, 'monsterhearts.jpg', 'urban fantasy', '', ''),
(20, 'Dune:Abenteuer im imperium', 'Nathan Dowdell', '2022', 'noch nicht gelesen', 1, 'Dune.webp', 'science-fiction', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(256) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
