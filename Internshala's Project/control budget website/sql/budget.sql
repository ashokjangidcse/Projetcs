-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2020 at 05:31 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `bill` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expense_id` (`expense_id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `amount_spent` int(11) NOT NULL,
  `people` varchar(50) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_items_ibfk_4` (`plan_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `title`, `date`, `amount_spent`, `people`, `plan_id`, `user_id`) VALUES
(1, 'first expense', '2020-02-04', 3000, 'deepak', 1, 1),
(2, 'seconplan', '2020-02-14', 4000, 'ashok', 1, 1),
(3, 'third expense', '2020-02-14', 4000, 'bhojak', 1, 1),
(4, 'ashok ka bill', '2020-02-08', 10000, 'ashok', 2, 4),
(5, 'dheeraj bill', '2020-02-14', 12000, 'bhojak', 2, 4),
(6, 'third expense', '2020-02-20', 200, 'deepak', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_items_ibfk_2` (`plan_id`),
  KEY `users_items_ibfk_3` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `user_id`, `plan_id`, `name`) VALUES
(1, 1, 1, 'deepak'),
(2, 1, 1, 'ashok'),
(3, 1, 1, 'bhojak'),
(4, 4, 2, 'deepak'),
(5, 4, 2, 'ashok'),
(6, 4, 2, 'bhojak'),
(7, 4, 2, 'pramod');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `contact`, `id`) VALUES
('Ashok Jangid', 'ashok@gmail.com', '75f34b5502bec3c609734fdf4d37fa5c', '9116828332', 1),
('Ashok Jangid', 'peyafaj953@repshop.net', 'fcea920f7412b5da7be0cf42b8c93759', '9116828332', 2),
('Ashok Jangid', 'purupurshotum@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '9116828332', 3),
('dheeraj', 'dheeraj@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '9116828332', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

DROP TABLE IF EXISTS `user_plan`;
CREATE TABLE IF NOT EXISTS `user_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `initial_budget` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_items_ibfk_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_plan`
--

INSERT INTO `user_plan` (`id`, `title`, `start`, `end`, `initial_budget`, `people`, `user_id`) VALUES
(1, 'firstplan', '2020-02-01', '2020-04-18', 40000, 3, 1),
(2, 'dheeraj ka budget', '2020-02-01', '2020-04-17', 50000, 4, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`expense_id`) REFERENCES `expense` (`id`),
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `user_plan` (`id`);

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_items_ibfk_4` FOREIGN KEY (`plan_id`) REFERENCES `user_plan` (`id`);

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `users_items_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `user_plan` (`id`),
  ADD CONSTRAINT `users_items_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD CONSTRAINT `users_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
