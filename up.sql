-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Лис 24 2022 р., 23:07
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
-- Структура таблиці `phonebook`
--

CREATE TABLE `phonebook` (
  `ID` int NOT NULL,
  `name` varchar(35) DEFAULT '',
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
(1, 'And', 'P', 'student', '+380964525612', 'comments', '2022-11-16'),
(2, 'MAX', 'K', 'students', '+380974561241', 'comments', '2022-11-11');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `phonebook`
--
ALTER TABLE `phonebook`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `phonebook`
--
ALTER TABLE `phonebook`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



CREATE TABLE IF NOT EXISTS `customers` (
  `cnum` smallint(5) unsigned NOT NULL,
  `cname` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `rating` smallint(5) unsigned NOT NULL,
  `snum` smallint(5) unsigned  NOT NUll,
  `text` text NOT NULL,
  PRIMARY KEY (`cnum`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `customers` ( `cnum` , `cname`, `city`, `rating`, `snum`, `text`) VALUES
(2001, 'Andrey','London', 100, 1001, 'php'),
(2002, 'Max', 'UK', 200, 1003, 'mysql'),
(2003, 'Nazar', 'San Jose', 300, 1002, 'Hello'),
(2004, 'Olga', 'Paris', 500, 1004, 'World'),
(2005, 'Taras', 'Poland', 800, 1010, 'Test Html'),
(2006, 'Nik', 'Ukraine', 300, 1002, 'PHP MYSQL');


CREATE TABLE IF NOT EXISTS `salers` (
  `snum` smallint(5) unsigned NOT NULL,
  `sname` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `comm` decimal(3,2) NOT NULL,
  PRIMARY KEY (`snum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `salers` (`snum`, `sname`, `city` , `comm`) VALUES
(1001, 'Pol', 'London', 0.12),
(1002, 'Monika', 'San Jose', 0.15),
(1003, 'Mikle', 'UK', 0.13),
(1004, 'Skif', 'Paris', 0.17),
(1010, 'Staf', 'New York', 0.00);


CREATE TABLE IF NOT EXISTS `orders`(
  `onum` smallint(5) unsigned NOT NULL,
  `amt` decimal(6,2) unsigned NOT NULL,
  `odate` date NOT NULL,
  `cnum` smallint(5) unsigned NOT NULL,
  `snum` smallint(5) unsigned NOT NULL,
  PRIMARY KEY(`onum`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `orders` ( `onum`, `amt`, `odate`, `cnum`, `snum`) VALUES
(3001, 18.69, '2022-12-12', 2004, 1004),
(3002, 767.25, '2022-05-05', 2005, 1010),
(3003, 785.13, '2022-08-08', 2006, 1003),
(3004, 147.23, '2021-06-06', 2003, 1002),
(3005, 159.15, '2020-04-04', 2002, 1001),
(3006, 65.12, '2019-07-07', 2001, 1010);
