-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Tid vid skapande: 11 okt 2017 kl 11:37
-- Serverversion: 10.1.16-MariaDB
-- PHP-version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `Joins`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Author`
--

CREATE TABLE `Author` (
  `author_id` int(50) NOT NULL,
  `first name` varchar(50) NOT NULL,
  `last name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `Author`
--

INSERT INTO `Author` (`author_id`, `first name`, `last name`) VALUES
(4, 'Erik', 'Svensson'),
(5, 'Ulla', 'Larsson'),
(6, 'Karin', 'Ekroth');

-- --------------------------------------------------------

--
-- Tabellstruktur `Book`
--

CREATE TABLE `Book` (
  `book_id` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `isbn` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `Book`
--

INSERT INTO `Book` (`book_id`, `title`, `isbn`) VALUES
(1, 'Sommar och sol', 132445),
(2, 'Php in my heart', 765326),
(3, 'Economics', 745635);

-- --------------------------------------------------------

--
-- Tabellstruktur `Book_author`
--

CREATE TABLE `Book_author` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `Book_author`
--

INSERT INTO `Book_author` (`book_id`, `author_id`) VALUES
(1, 4);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`author_id`);

--
-- Index för tabell `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`book_id`);

--
-- Index för tabell `Book_author`
--
ALTER TABLE `Book_author`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `Author`
--
ALTER TABLE `Author`
  MODIFY `author_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT för tabell `Book`
--
ALTER TABLE `Book`
  MODIFY `book_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
