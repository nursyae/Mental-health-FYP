-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2023 at 03:42 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mental_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int NOT NULL,
  `message_user_id` int NOT NULL,
  `message_subject` varchar(255) NOT NULL,
  `message_content` text NOT NULL,
  `message_attachment` varchar(255) DEFAULT NULL,
  `message_status` int NOT NULL DEFAULT '0',
  `message_seen` tinyint NOT NULL DEFAULT '0',
  `message_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int NOT NULL,
  `question_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `question_category` int NOT NULL,
  `question_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_name`, `question_category`, `question_created_at`, `question_updated_at`) VALUES
(2, 'I found it hard to wind down / Saya rasa susah untuk bertenang', 3, '2023-03-18 23:01:23', '2023-03-18 23:22:02'),
(3, 'I was aware of dryness of my mouth / Saya sedar mulut saya terasa kering', 2, '2023-03-18 23:12:41', '2023-03-18 23:12:41'),
(4, 'I couldn\'t seem to experience any positive feeling at all / Saya seolah-olah tidak dapat mengalami perasaan positif sama sekali', 1, '2023-03-19 20:43:28', '2023-03-19 20:43:28'),
(5, 'I experienced breathing difficulty (eg, excessively rapid breathing,breathlessness in the absence of physical exertion) / Saya mengalami kesukaran bernafas (contohnya, bernafas terlalu cepat tercungap-cungap walaupun tidak melakukan aktiviti fizikal', 2, '2023-03-19 20:43:49', '2023-03-19 20:43:49'),
(6, 'I found it difficult to work up the initiative to do things / Saya rasa tidak bersemangat untuk memulakan sesuatu keadaan', 1, '2023-03-19 20:44:09', '2023-03-19 20:44:09'),
(7, 'I tended to over-react to situations / Saya cenderung bertindak secara berlebihan kepada sesuatu keadaan', 3, '2023-03-19 20:44:31', '2023-03-19 20:44:31'),
(8, '	 I experienced trembling (eg, in the hands) / Saya pernah menggeletar (contohnya tangan)', 2, '2023-03-19 20:44:48', '2023-03-19 20:44:48'),
(9, 'I felt that I was using a lot of nervous energy / Saya rasa saya terlalu gelisah', 3, '2023-03-19 20:45:11', '2023-03-19 20:45:11'),
(10, 'I was worried about situations in which I might panic and make a fool of myself / Saya risau akan berlaku keadaan di mana saya panik dan berkelakuan bodoh', 2, '2023-03-19 20:45:38', '2023-03-19 20:45:38'),
(11, 'I felt that I had nothing to look forward to / Saya rasa tidak ada yang saya harapkan (putus harapan)', 1, '2023-03-19 20:45:55', '2023-03-19 20:45:55'),
(12, 'I found myself getting agitated / Saya dapati saya mudah resah', 3, '2023-03-19 20:46:18', '2023-03-19 20:46:18'),
(13, 'I found it difficult to relax / Saya merasa sukar untuk relaks', 3, '2023-03-19 20:46:35', '2023-03-19 20:46:35'),
(14, 'I felt down-hearted and blue / Saya rasa muram dan sedih', 1, '2023-03-19 20:46:53', '2023-03-19 20:46:53'),
(15, 'I was intolerant of anything that kept me from getting on with what I was doing / Saya tidak boleh terima apa jua yang menghalangi saya daripada meneruskan apa yang saya sedang lakukan', 3, '2023-03-19 20:47:20', '2023-03-27 21:12:21'),
(16, 'I felt I was close to panic / Saya rasa hampir panik', 2, '2023-03-19 20:47:42', '2023-03-19 20:47:42'),
(17, 'I was unable to become enthusiastic about anything / Saya tidak bersemangat langsung', 1, '2023-03-19 20:48:07', '2023-03-19 20:48:07'),
(18, 'I felt I wasn\'t worth much as a person / Saya rasa diri saya tidak berharga', 1, '2023-03-19 20:48:23', '2023-03-19 20:48:23'),
(19, 'I felt that I was rather touchy / Saya mudah tersinggung', 3, '2023-03-19 20:48:40', '2023-03-19 20:48:40'),
(20, 'I was aware of the action of my heart in the absence of physical exertion (eg, sense of heart rate increase, heart missing a beat) / Walaupun saya tidak melakukan aktiviti fizikal, saya sedar akan debaran jantung saya (contoh: degupan jantung lebih cepat)', 2, '2023-03-19 20:49:03', '2023-03-19 20:49:03'),
(21, 'I felt scared without any good reason / Saya rasa takut tanpa sebab', 2, '2023-03-19 20:49:20', '2023-03-19 20:49:20'),
(22, 'I felt that life was meaningless / Saya rasa hidup ini tidak beerti lagi', 1, '2023-03-19 20:49:30', '2023-03-19 20:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `message_id` int NOT NULL,
  `message_user_id` int NOT NULL,
  `message_subject` varchar(255) NOT NULL,
  `message_content` text NOT NULL,
  `message_attachment` varchar(255) DEFAULT NULL,
  `message_status` int NOT NULL DEFAULT '0',
  `message_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` int NOT NULL,
  `score_user_id` int NOT NULL,
  `score_depression` int NOT NULL,
  `score_anxiety` int NOT NULL,
  `score_stress` int NOT NULL,
  `score_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `score_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(80) DEFAULT NULL,
  `user_email` varchar(256) DEFAULT NULL,
  `user_matrix_number` varchar(20) DEFAULT NULL,
  `user_phone_number` varchar(20) DEFAULT NULL,
  `user_password` varchar(256) DEFAULT NULL,
  `user_programme` varchar(256) DEFAULT NULL,
  `user_role` varchar(10) NOT NULL DEFAULT 'user',
  `user_created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_matrix_number`, `user_phone_number`, `user_password`, `user_programme`, `user_role`, `user_created_at`) VALUES
(1, 'Admin Miit ', 'adminmiit@gmail.com', '52225120755', '0175024905', '$2y$10$qDrAeFuozw3aPCjzy/mFleIYxvQPpy/F0lFhrgTUPlZA9GEOLM4M.', 'computing', 'admin', '2023-04-15 23:42:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_user_id` (`message_user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_user_id` (`message_user_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`message_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
