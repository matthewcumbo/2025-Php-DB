-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 22, 2025 at 08:49 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2025-1stDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `userId`, `url`) VALUES
(1, 10, '10-694501e7a66a49.52742172.webp'),
(2, 10, '10-694501ec17fb98.30310938.jpeg'),
(3, 10, '10-69450201efd6b0.49882064.webp'),
(4, 10, '10-694502396d91c7.64383199.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userId`, `title`, `content`) VALUES
(1, 1, 'asdf', 'qwerty'),
(2, 1, '1234', '5678'),
(3, 2, 'poipoi', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `surname` varchar(250) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `imageId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `surname`, `age`, `nationality`, `email`, `imageId`) VALUES
(1, 'joeborg', '123', 'Joe', 'Borg', 99, NULL, NULL, NULL),
(2, 'janedoe', 'abc', 'Jane', 'Doe', 50, NULL, NULL, NULL),
(3, 'hello', 'hello', 'hello', 'hello', 15, NULL, NULL, NULL),
(4, 'oh hai', 'oh hai', 'oh hai', 'oh hai', 15, NULL, NULL, NULL),
(5, 'new test', '$2y$10$9vxlZXu3ZFGXHjEooi6EmOG577ONKOrEDK5BPnh9tPtOYBE915V3m', 'new test', 'new test', 15, NULL, NULL, NULL),
(6, 'poi', '$2y$10$0JGHFs.UD9HSf/9/xe3H.OAt3ZorKkLXto5Sp9APzqJW0ljMcbv7.', 'poi', 'poi', 15, NULL, NULL, NULL),
(7, 'matt', '$2y$10$OdK7pDoUXK1lUIyr9ZWOyOKYL.EswoaUGmkg1jKaOFwPtUfd22nTG', 'Matthew', 'Cumbo', 25, NULL, NULL, NULL),
(8, 'NewTest', '$2y$10$V1PlzXfmWPHj8Wwo3ePDmuONOHN7Rnyb1eYQ3R699FEOgxZMIDgwG', 'New', 'Test', 15, 'Martian', 'newtest@gmail.com', NULL),
(10, '098', '$2y$10$mUDBFSvzc8KFR8j/QlGoTef3xB4t8s1VHNiYfPBbT3/CCOahYhR3q', '098', '098', 19, '123', '123@123.com', 4),
(11, '123', '$2y$10$9w2PzxZUwQbwgsakSCiyWOVgZ20W.MP6iu2QceDPLTq2SmkxAm/pO', '123', '123', 15, '123', '123@123.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PostsUsers_UserId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_PostsUsers_UserId` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
