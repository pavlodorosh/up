-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Січ 20 2023 р., 21:43
-- Версія сервера: 8.0.19
-- Версія PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `up`
--

-- --------------------------------------------------------

--
-- Структура таблиці `customers`
--

CREATE TABLE `customers` (
  `cnum` smallint UNSIGNED NOT NULL,
  `cname` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `rating` smallint UNSIGNED NOT NULL,
  `snum` smallint UNSIGNED NOT NULL,
  `text` text NOT NULL,
  FULLTEXT KEY `text` (`text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `customers`
--

INSERT INTO `customers` (`cnum`, `cname`, `city`, `rating`, `snum`, `text`) VALUES
(2001, 'Andrey', 'London', 100, 1001, 'php'),
(2002, 'Max', 'UK', 200, 1003, 'mysql'),
(2003, 'Nazar', 'San Jose', 300, 1002, 'Hello'),
(2004, 'Olga', 'Paris', 500, 1004, 'World'),
(2005, 'Taras', 'Poland', 800, 1010, 'Test Html'),
(2006, 'Nik', 'Ukraine', 300, 1002, 'PHP MYSQL'),
(2007, 'Hoffman', 'London', 100, 1001, 'php'),
(2008, 'Giovanni', 'New York', 200, 1003, 'mysql'),
(2009, 'Liu', 'San Jose', 200, 1002, 'mysql'),
(2010, 'Grass', 'San Jose', 300, 1002, 'mysql'),
(2011, 'Clemens', 'London', 100, 1001, 'hello'),
(2012, 'Cisneros', 'Barcelona', 300, 1007, 'word'),
(2013, 'Pereira', 'London', 100, 1004, 'программирование'),
(2014, 'Петров', 'Париж', 150, 1010, 'test, mysql'),
(2015, 'Test', 'Test', 150, 1000, 'php, mysql');

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `onum` smallint UNSIGNED NOT NULL,
  `amt` decimal(6,2) UNSIGNED NOT NULL,
  `odate` date NOT NULL,
  `cnum` smallint UNSIGNED NOT NULL,
  `snum` smallint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`onum`, `amt`, `odate`, `cnum`, `snum`) VALUES
(3001, '18.69', '2022-12-12', 2004, 1004),
(3002, '767.25', '2022-05-05', 2005, 1010),
(3003, '785.13', '2022-08-08', 2006, 1003),
(3004, '147.23', '2021-06-06', 2003, 1002),
(3005, '159.15', '2020-04-04', 2002, 1001),
(3006, '65.12', '2019-07-07', 2001, 1010),
(3007, 18.69, '1990-03-10', 2008, 1007),
(3008, 767.19, '1990-03-10', 2001, 1001),
(3009, 1900.10, '1990-03-10', 2007, 1004),
(3010, 5160.45, '1990-03-10', 2003, 1002),
(3011, 1098.16, '1990-03-10', 2008, 1007),
(3012, 1713.23, '1990-04-10', 2002, 1003),
(3013, 75.75, '1990-04-10', 2004, 1002),
(3014, 4723.00, '1990-05-10', 2006, 1001),
(3015, 1309.95, '1990-06-10', 2004, 1002),
(3016, 9891.88, '1990-06-10', 2006, 1001);
-- --------------------------------------------------------

--
-- Структура таблиці `phonebook`
--

CREATE TABLE `phonebook` (
  `ID` int NOT NULL,
  `name` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '',
  `surname` varchar(35) DEFAULT '',
  `spec` varchar(35) DEFAULT '',
  `phone` varchar(15) DEFAULT '',
  `comments` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `phonebook`
--

INSERT INTO `phonebook` (`ID`, `name`, `surname`, `spec`, `phone`, `comments`, `date`) VALUES
(1, 'Max', 'S', 'student', '+380961234567', 'front', '2022-11-26'),
(2, 'Oleg', 'D', 'student', '+380974561236', 'front', '2022-11-22'),
(3, 'Andr', 'F', 'student', '+3806641234848', 'front', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `salers`
--

CREATE TABLE `salers` (
  `snum` smallint UNSIGNED NOT NULL,
  `sname` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `comm` decimal(3,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `salers`
--

INSERT INTO `salers` (`snum`, `sname`, `city`, `comm`) VALUES
(1001, 'Pol', 'London', '0.12'),
(1002, 'Monika', 'San Jose', '0.15'),
(1003, 'Mikle', 'London', '0.13'),
(1004, 'Skif', 'Paris', '0.17'),
(1010, 'Staf', 'New York', '-0.25'),
(1011, 'Peel', 'London', 0.12),
(1012, 'Serres', 'San Jose', 0.13),
(1013, 'Motika', 'London', 0.11),
(1014, 'Rifkin', 'Barcelona', 0.15),
(1015, 'Axelrod', 'New York', 0.10),
(1125, 'Иванов', 'Киев', 0.25),
(1135, NULL, 'Paris', 0.15),
(1136, 'd''Artanian', 'Paris', 0.00),
(1185, 'Sifkin', 'San Jose', -0.17);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cnum`);

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`onum`);

--
-- Індекси таблиці `phonebook`
--
ALTER TABLE `phonebook`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `salers`
--
ALTER TABLE `salers`
  ADD PRIMARY KEY (`snum`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `phonebook`
--
ALTER TABLE `phonebook`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
