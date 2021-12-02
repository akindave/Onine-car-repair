-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 08:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mechlocatorv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `user_id` int(11) NOT NULL,
  `num_plate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`user_id`, `num_plate`) VALUES
(1, 'KBJ 123H'),
(1, 'KCE 112E'),
(3, 'KAA 113B'),
(3, 'KBA 987D'),
(3, 'KDA 123B'),
(4, 'KBA 123A'),
(5, 'KAJ 513G'),
(7, 'kcy 123d');

-- --------------------------------------------------------

--
-- Table structure for table `map_details`
--

CREATE TABLE `map_details` (
  `user_id` int(11) NOT NULL,
  `long_cor` text NOT NULL,
  `lat_cor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`user_id`, `rating`, `message`) VALUES
(3, 3, ''),
(3, 4, 'Great work'),
(3, 4, 'Great work'),
(5, 4, 'Pami is a great mechanic.'),
(5, 5, 'New review'),
(5, 5, 'New one'),
(5, 5, 'New one'),
(5, 5, 'New one'),
(5, 5, 'New one'),
(2, 5, 'sdfsad'),
(2, 5, 'hurray! it works'),
(6, 3, 'Three stars'),
(2, 1, 'Not accurate');

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

CREATE TABLE `repairs` (
  `num_plate` varchar(50) NOT NULL,
  `activity` text NOT NULL,
  `cost` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `repair_id` int(11) NOT NULL,
  `seen` varchar(10) NOT NULL DEFAULT 'NO',
  `mech_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repairs`
--

INSERT INTO `repairs` (`num_plate`, `activity`, `cost`, `date`, `repair_id`, `seen`, `mech_user_id`) VALUES
('KAA 113B', 'Computer diagnosis', 1500, '2021-12-01', 1, 'YES', 0),
('KAA 113B', 'Panel beating', 2000, '2021-12-01', 2, 'YES', 0),
('KAA 113B', 'Differential oil checking', 300, '2021-12-01', 3, 'YES', 0),
('KAA 113B', 'Gear oil checking', 300, '2021-12-01', 4, 'YES', 0),
('KAA 113B', 'Gear oil checking', 300, '2021-12-01', 5, 'YES', 0),
('KAA 113B', 'Gear oil checking', 300, '2021-12-01', 6, 'YES', 0),
('KBA 123A', 'Spark plugs replacement', 1500, '2021-12-01', 7, 'NO', 0),
('KBA 123A', 'Engine pistons replacement', 5000, '2021-12-01', 8, 'NO', 0),
('KBA 123A', 'Wheel alignment', 2000, '2021-12-01', 9, 'NO', 0),
('KAA 113B', 'Brake adjustment', 200, '2021-12-01', 10, 'YES', 0),
('KAA 113B', 'new repair', 500, '2021-12-01', 11, 'YES', 0),
('KBJ 123H', 'Wheel alignment', 2000, '2021-12-01', 12, 'YES', 0),
('KCE 112E', 'Brake adjustment', 400, '2021-12-01', 13, 'YES', 0),
('KBJ 123H', 'new repair', 1000, '2021-12-01', 14, 'YES', 0),
('KCE 112E', 'Comp diagnosis', 1500, '2021-12-01', 15, 'YES', 0),
('KCE 112E', 'Shock absorbers replacement', 3500, '2021-12-01', 16, 'YES', 0),
('KCE 112E', 'activity 1', 2000, '2021-12-01', 17, 'YES', 0),
('KBJ 123H', 'dot added', 100, '2021-12-01', 18, 'YES', 1),
('KBJ 123H', 'hello 1', 88, '2021-12-01', 19, 'YES', 1),
('KBA 987D', 'Wheel alignment', 4999, '2021-12-01', 20, 'YES', 3),
('KBA 987D', 'Rate act', 232, '2021-12-01', 21, 'YES', 3),
('KAA 113B', 'Differential oil checking', 498, '2021-12-01', 22, 'YES', 3),
('KAA 113B', 'Brake service', 2330, '2021-12-01', 23, 'YES', 3),
('KDA 123B', 'Brakes', 1000, '2021-12-01', 24, 'YES', 3),
('KBA 987D', 'Gear oil', 2328, '2021-12-01', 25, 'YES', 3),
('KAA 113B', 'Wheel alignment', 890, '2021-12-01', 26, 'YES', 3),
('KAJ 513G', 'Ball joint replacement', 2500, '2021-12-01', 27, 'YES', 5),
('KCE 112E', 'Wheel alignment', 2345, '2021-12-01', 28, 'YES', 5),
('KCE 112E', 'Ball joint replacement', 2899, '2021-12-01', 29, 'YES', 5),
('KBJ 123H', 'service 1', 2300, '2021-12-02', 30, 'YES', 5),
('KCE 112E', 'Wheel alignment', 1111, '2021-12-02', 31, 'YES', 5),
('KAJ 513G', 'Wheel alignment', 788, '2021-12-02', 32, 'YES', 5),
('KAJ 513G', 'Wheel alignment', 788, '2021-12-02', 33, 'YES', 0),
('KBJ 123H', 'Brake', 324, '2021-12-02', 35, 'YES', 5),
('KBJ 123H', 'new 1', 2343, '2021-12-02', 36, 'YES', 5),
('KCE 112E', 'Wheel alignment', 2000, '2021-12-02', 38, 'YES', 7),
('KBJ 123H', 'Side mirror replacement', 800, '2021-12-02', 39, 'YES', 0),
('KBJ 123H', 'Brake adjustment', 400, '2021-12-02', 40, 'YES', 0),
('KBJ 123H', 'New action', 400, '2021-12-02', 41, 'YES', 5),
('kcy 123d', 'Wheel alignment', 4500, '2021-12-02', 42, 'YES', 7),
('kcy 123d', 'Wheel alignment', 4500, '2021-12-02', 43, 'YES', 0),
('kcy 123d', 'pami activity', 2000, '2021-12-02', 44, 'YES', 5),
('kcy 123d', 'Bushes', 2000, '2021-12-02', 45, 'YES', 5),
('kcy 123d', 'shock absorbers', 2465, '2021-12-02', 46, 'YES', 5),
('kcy 123d', 'hts', 432, '2021-12-02', 47, 'YES', 5),
('KAJ 513G', 'ryfs', 3453, '2021-12-02', 48, 'YES', 2),
('KAJ 513G', 'hrdr', 343, '2021-12-02', 49, 'YES', 2),
('KAJ 513G', 'erger', 345, '2021-12-02', 50, 'YES', 2),
('KAJ 513G', 'nob', 324, '2021-12-02', 51, 'YES', 2),
('KAJ 513G', 'jikori', 322, '2021-12-02', 52, 'YES', 2),
('KAJ 513G', 'IJFII', 434, '2021-12-02', 53, 'YES', 2),
('KAJ 513G', 'rtr', 334, '2021-12-02', 54, 'YES', 2),
('KBJ 123H', 'shock absorbers', 3400, '2021-12-02', 55, 'YES', 2),
('KCE 112E', 'new repair', 2000, '2021-12-02', 56, 'YES', 6),
('KBJ 123H', 'shock absorbers replacement', 2000, '2021-12-02', 57, 'YES', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_mech` varchar(10) NOT NULL DEFAULT 'NO',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `phone`, `password`, `is_mech`, `user_id`) VALUES
('Erick', 'erick@gmail.com', '0712345678', '$2y$10$Bes4LuFtJV3Ms6WwN7EigO/LTMXRVNryKlloRr4Jg76pTFgtykF5m', 'NO', 1),
('admin', 'admin@gmail.com', '07231344543', '$2y$10$IRYqMlbN.lH98oby0yIoKuiFx60KTgKKUqVCUW1NduGNvS0TtC6xy', 'YES', 2),
('John ', 'john@gmail.com', '0712345678', '$2y$10$pHte7vIve8a6pXHfX7G4B.tBs2F89EQCnnlag7A7iqRsdgtdhpWe.', 'NO', 3),
('Jane', 'jane@gmail.com', '072341343', '$2y$10$nA9/JtHUQMCjN59sdQUq6OOMTKJMhGXbhQpK6cOYwPmtw1FNsaFNa', 'NO', 4),
('Paminus King\'ori', 'pkmurungi.pm@gmail.com', '0735435335', '$2y$10$P4pXIu.teAPE1MCOks/Wa.F2jxQJhw4ord2hW51E6xw3OUhJcHjSy', 'YES', 5),
('Venna', 'venna@gmail.com', '092338289', '$2y$10$fvPMB8b577InDEp3b7bLu.4SwzXOvzL29hlEBiaB4EpDkO7dUzpZK', 'YES', 6),
('Bruce', 'bruce@gmail.com', '092095925', '$2y$10$pm5.kidvbp45RaTfnIZqhOTQpIecbPEogqiddR4wj3yOYIm3GhD7a', 'YES', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`num_plate`),
  ADD KEY `car` (`user_id`);

--
-- Indexes for table `map_details`
--
ALTER TABLE `map_details`
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`repair_id`),
  ADD KEY `numPlate` (`num_plate`),
  ADD KEY `user` (`mech_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `repairs`
--
ALTER TABLE `repairs`
  MODIFY `repair_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `map_details`
--
ALTER TABLE `map_details`
  ADD CONSTRAINT `map_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `repairs_ibfk_1` FOREIGN KEY (`num_plate`) REFERENCES `cars` (`num_plate`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
