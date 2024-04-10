-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 10 2024 г., 14:59
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `arm`
--
CREATE DATABASE IF NOT EXISTS `arm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `arm`;

-- --------------------------------------------------------

--
-- Структура таблицы `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `animals`:
--

--
-- Дамп данных таблицы `animals`
--

INSERT INTO `animals` (`id`, `animal_type`) VALUES
(1, 'Кот'),
(2, 'Собака'),
(3, 'Кролик'),
(4, 'Попугай'),
(5, 'Хомяк');

-- --------------------------------------------------------

--
-- Структура таблицы `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `appointments`:
--

--
-- Дамп данных таблицы `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `time`, `doctor_id`, `patient`, `created_at`) VALUES
(1, '2024-04-10', '14:59:00', 1, '0', '2024-04-10 11:59:02'),
(2, '2024-04-11', '15:33:00', 1, '1', '2024-04-10 12:31:36');

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `doctors`:
--

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`) VALUES
(1, 'Иван', 'Иванов'),
(2, 'Петр', 'Петров'),
(3, 'Анна', 'Сидорова'),
(4, 'Мария', 'Козлова'),
(5, 'Дмитрий', 'Смирнов');

-- --------------------------------------------------------

--
-- Структура таблицы `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expiration_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `inventory`:
--

--
-- Дамп данных таблицы `inventory`
--

INSERT INTO `inventory` (`id`, `medicine_id`, `quantity`, `expiration_date`, `created_at`) VALUES
(1, 1, 4, '2027-06-16', '2024-04-10 12:49:06');

-- --------------------------------------------------------

--
-- Структура таблицы `medicines`
--

DROP TABLE IF EXISTS `medicines`;
CREATE TABLE IF NOT EXISTS `medicines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `medicines`:
--

--
-- Дамп данных таблицы `medicines`
--

INSERT INTO `medicines` (`id`, `medicine_name`) VALUES
(1, 'Витамин А'),
(2, 'Антибиотик B'),
(3, 'Противоглистное средство С'),
(4, 'Анальгетик D'),
(5, 'Противоблошинное средство E');

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `diagnosis` text DEFAULT NULL,
  `prescriptions` text DEFAULT NULL,
  `results` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `patients`:
--

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `animal_id`, `name`, `age`, `diagnosis`, `prescriptions`, `results`) VALUES
(1, 1, 'Муся', 2, 'Вирус иммунодецифита кошек', 'борьба с паразитами;\r\nполноценное и сбалансированное питание;\r\nпосещение ветеринара не реже одного раза в полгода для плановых осмотров;\r\nрегулярное проведение анализа крови', 'ВИК+'),
(2, 1, 'Барсик', 5, 'Гастрит', 'Назначено лечение: сульфадимезолин 0,2 г 2 раза в день на 7 дней', 'Результаты обследования: уровень кислотности желудочного сока повышен, обнаружены признаки воспаления слизистой оболочки желудка');


--
-- Метаданные
--
USE `phpmyadmin`;

--
-- Метаданные для таблицы animals
--

--
-- Метаданные для таблицы appointments
--

--
-- Метаданные для таблицы doctors
--

--
-- Метаданные для таблицы inventory
--

--
-- Метаданные для таблицы medicines
--

--
-- Метаданные для таблицы patients
--

--
-- Метаданные для базы данных arm
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
