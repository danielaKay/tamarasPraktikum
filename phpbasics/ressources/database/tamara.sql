-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Apr 24, 2026 at 07:56 AM
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
(1, 'Tiny dungeon: Zweite edition', 'Alan Bahr', '2021', 'ein schönes einsteigerfreundliches Regelwerk', 1, 'TinyDungeon2E_cover-900px.jpg', 'high fantasy', '208', '32'),
(2, 'Investigators handbook', 'Sandy Petersen', '2016', 'ein gutes Buch wenn man Coc spielen möchte', 1, 'Coc-handbook.jpg', 'Lovecraftian horror', '284', ''),
(3, 'Jäger die Vergeltung', 'Justin Achilli', '2000', 'eine interesannte perspektive in WOD', 1, 'Jaeger-Vergeltung-Cover.jpg', 'horror', '288', ''),
(4, 'Ein schöner Titel', 'John Smith', '2023', 'wow just', 1, '', 'sci-fi', '253', ''),
(5, 'Cthulhu by Gaslight - Investigators Guide', 'Keris McDonald', '2024', 'noch nicht gelesen', 1, 'Coc.jpg', 'mystery', '296', ''),
(6, 'Root - Das Rollenspiel: Grundregelwerk', 'Brenan Conway', '2024', 'noch nicht gelesen', 1, 'root.jpg', 'fantasy', '256', '76'),
(7, 'Vampire: The Masquerade ', 'Martin Ericsson', '2018', 'noch nicht gelesen', 1, 'Vampire-die-Maskerade.jpg', 'urban fantasy', '428', ''),
(8, 'Dungeon Masters Guide', 'Andrew borck', '2024', 'noch nicht gelesen', 1, 'Dmg.jpg', 'fantasy', '384', ''),
(9, 'Monsterhearts 2', 'Avery Alder', '2012', 'noch nicht gelesen', 1, 'monsterhearts.jpg', 'urban fantasy', '178', ''),
(10, 'Dune:Abenteuer im imperium', 'Nathan Dowdell', '2022', 'noch nicht gelesen', 1, 'Dune.webp', 'science-fiction', '330', ''),
(11, 'Cyberpunk red', 'Mike Pondsmith', '2020', 'noch nicht gelesen', 1, 'cyberpunkred.webp', 'Cyberpunk', '450', ''),
(12, 'Alien:Das Rollenspiel', 'Andrew Gaska', '2019', 'noch nicht gelesen', 1, 'Alien.webp', 'survival horror', '398', ''),
(13, 'Shadowrun', 'Jordan Weisman', ' 2005', 'noch nicht gelesen', 1, 'shadowrun.jpg', 'distopian fiction', '408', ''),
(14, 'Das Schwarze Auge', 'Jens Ulrich', '2015', 'noch nicht gelesen', 1, 'DSA.webp', 'highfantasy', '416', ''),
(15, 'Kult:divinity lost', 'Robin Liljenberg', '2018', 'noch nicht gelesen', 1, 'kultdivinitylost.webp', 'contemporary horror', '384', ''),
(16, 'Sigil and Shadow', 'R.E. Davis', '2021', 'noch nicht gelesen', 1, 'sigilandshadow.jpg', 'occult horror', '208', '');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int NOT NULL,
  `page_number` varchar(4) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `book_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id`, `page_number`, `comment`, `book_id`) VALUES
(1, '22', 'Überall dieselbe alte Leier. Das Layout ist fertig, der Text lässt auf sich warten. Damit das Layout nun nicht nackt im Raume steht und sich klein und leer vorkommt, springe ich ein: der Blindtext.', 2),
(2, '49', 'Eine wunderbare Heiterkeit hat meine ganze Seele eingenommen, gleich den süßen Frühlingsmorgen, die ich mit ganzem Herzen genieße.', 2),
(3, '133', 'Weit hinten, hinter den Wortbergen, fern der Länder Vokalien und Konsonantien leben die Blindtexte. Abgeschieden wohnen sie in Buchstabhausen an der Küste des Semantik, eines großen Sprachozeans.', 3),
(4, '5', 'Er hörte leise Schritte hinter sich. Das bedeutete nichts Gutes. Wer würde ihm schon folgen, spät in der Nacht und dazu noch in dieser engen Gasse mitten im übel beleumundeten Hafenviertel?', 14),
(5, '19', 'Dies ist ein Typoblindtext. An ihm kann man sehen, ob alle Buchstaben da sind und wie sie aussehen.', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int NOT NULL,
  `tagname_id` int NOT NULL,
  `book_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tagname_id`, `book_id`) VALUES
(12, 1, 2),
(13, 1, 3),
(14, 2, 5),
(15, 1, 6),
(16, 2, 7),
(17, 2, 8),
(18, 4, 9),
(19, 4, 10),
(20, 4, 11),
(21, 4, 12),
(22, 4, 13),
(23, 4, 14),
(24, 4, 15),
(25, 4, 16),
(33, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tagname`
--

CREATE TABLE `tagname` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `display_name` varchar(256) NOT NULL,
  `icon` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tagname`
--

INSERT INTO `tagname` (`id`, `name`, `display_name`, `icon`) VALUES
(1, 'reading', 'Reading', 'fa-book-open'),
(2, 'unread', 'Unread', 'fa-book'),
(3, 'read', 'Read', 'fa-book-bookmark'),
(4, 'notowned', 'Not Owned', 'fa-binoculars');

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
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagname`
--
ALTER TABLE `tagname`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tagname`
--
ALTER TABLE `tagname`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
