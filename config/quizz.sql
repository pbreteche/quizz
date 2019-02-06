SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `good_choice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bad_choice_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bad_choice_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `series_question` (
  `series_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `series_question`
  ADD PRIMARY KEY (`series_id`,`question_id`),
  ADD KEY `question_id` (`question_id`);


ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `series_question`
  ADD CONSTRAINT `series_question_ibfk_1` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `series_question_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
