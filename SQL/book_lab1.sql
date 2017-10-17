-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Tid vid skapande: 11 okt 2017 kl 11:36
-- Serverversion: 10.1.16-MariaDB
-- PHP-version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `book_lab1`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Author`
--

CREATE TABLE `Author` (
  `ID` int(11) NOT NULL,
  `ssn` char(20) NOT NULL,
  `first name` varchar(50) NOT NULL,
  `last name` varchar(50) NOT NULL,
  `birthyear` int(4) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Author`
--

INSERT INTO `Author` (`ID`, `ssn`, `first name`, `last name`, `birthyear`, `link`) VALUES
(1, '23566788', 'Anna', 'Svensson', 1990, '');

-- --------------------------------------------------------

--
-- Tabellstruktur `Book`
--

CREATE TABLE `Book` (
  `isbn` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pages` int(11) NOT NULL,
  `edition number` int(20) NOT NULL,
  `year` year(4) NOT NULL,
  `company` varchar(50) NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Book`
--

INSERT INTO `Book` (`isbn`, `title`, `pages`, `edition number`, `year`, `company`, `reserved`, `author`) VALUES
(0, 'dfgdf', 0, 0, 0000, '', 0, '12345'),
(35780, 'jul', 0, 0, 0000, '', 0, 'dfgdfg'),
(758463, 'hej', 0, 0, 0000, '', 0, '0');

-- --------------------------------------------------------

--
-- Tabellstruktur `Comments`
--

CREATE TABLE `Comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Comments`
--

INSERT INTO `Comments` (`comment_id`, `comment`) VALUES
(1, 'hello'),
(2, '<strong>testing</strong>'),
(3, '&lt;strong&gt;test2&lt;/strong&gt;');

-- --------------------------------------------------------

--
-- Tabellstruktur `librarians`
--

CREATE TABLE `librarians` (
  `username_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `librarians`
--

INSERT INTO `librarians` (`username_id`, `username`, `password`) VALUES
(1, 'Julia', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Tabellstruktur `User`
--

CREATE TABLE `User` (
  `userid` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `User`
--

INSERT INTO `User` (`userid`, `username`, `password`) VALUES
(4, 'julialjung', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Tabellstruktur `Writes`
--

CREATE TABLE `Writes` (
  `Isbn` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`isbn`);

--
-- Index för tabell `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index för tabell `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`username_id`);

--
-- Index för tabell `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userid`);

--
-- Index för tabell `Writes`
--
ALTER TABLE `Writes`
  ADD PRIMARY KEY (`Isbn`,`ID`),
  ADD KEY `Foreign key` (`Isbn`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `Author`
--
ALTER TABLE `Author`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `Comments`
--
ALTER TABLE `Comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `librarians`
--
ALTER TABLE `librarians`
  MODIFY `username_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `User`
--
ALTER TABLE `User`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `Writes`
--
ALTER TABLE `Writes`
  ADD CONSTRAINT `writes_ibfk_1` FOREIGN KEY (`Isbn`) REFERENCES `Book` (`isbn`),
  ADD CONSTRAINT `writes_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `Author` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
