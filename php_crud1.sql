-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 03:39 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `name`) VALUES
(3, '23215431_1455051107941608_8539632908141094821_o.jpg'),
(4, 'Search Engine Optimization Today.pdf'),
(5, 'BSE_ICT.doc'),
(6, 'BSE_ICT.doc'),
(7, 'Profile2.jpg'),
(8, 'Search Engine Optimization Today.pdf'),
(9, 'BSE_ICT.doc');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `email`, `password`) VALUES
(1, 'shakil', 'shakilkhan621@gmail.com', '123456'),
(2, 'shakil khan', 'shakilkhan5@gmail.com', '$2y$10$XaI7vykFLVUxOdw4jAs0y..fP.pySguY2IemhKoGu/1E5GAX1MTNe'),
(3, 'ali', 'alikhan@gmail.com', '$2y$10$mX4KFsCl/aoITkN4GGKET.Zjz9nlni9k/tmmvTpldESfCDuSif0kC'),
(4, 'farman', 'farman@gmail.com', '$2y$10$wRoDvd0zHIIsdfq6Z41iC.Nf40xDTUCcizq0l2wMYaNrwHXPCRzQC'),
(5, 'shakil ', 'shakilkhan@gmail.com', '$2y$10$Q3KTolyt5Ajxpl03QdIgeu9CVx8Dr16Tk6rUIxTR9CLM6uyF7WbEK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
