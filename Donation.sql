-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql12.freesqldatabase.com
-- Generation Time: Nov 15, 2024 at 04:02 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
  AUTOCOMMIT = 0;

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `sql12743807`
--
CREATE TABLE `Donation` (
  `name` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

COMMIT;