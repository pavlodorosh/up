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



/*

Рядкові функції:
------------------------------
1. CONCAT (str1, str2, ...)
Повертає рядок, який є результатом конкатенації аргументів. Якщо хоча б один із аргументів дорівнює NULL, повертається NULL. Може приймати більше ніж 2 аргументи. Числовий аргумент перетворюється на еквівалентну рядкову форму

SELECT CONCAT(sname, ' ', city) AS result FROM salers;

2. CONCAT_WS(separator, str1, str2, ...)
Функція CONCAT_WS() означає CONCAT With Separator (конкатенація з роздільником) і являє собою спеціальну форму функції CONCAT(). Перший аргумент є роздільником інших аргументів. Розділювач, як і інші аргументи, може бути рядком. Якщо роздільник дорівнює NULL, результат буде NULL. Ця функція пропускатиме всі величини NULL і порожні рядки, розташовані після аргументу-розділювача. Розділювач буде додаватися між рядками, що підлягають конкатенації

SELECT CONCAT_WS(' ', sname, city, comm) AS result FROM salers;

3. LENGTH(str) - повертає довжину рядка в байтах, CHAR_LENGTH(str) - повертає кількість символів, CHARACTER_LENGTH(str) - - повертає кількість символів

SELECT sname , LENGTH(sname) AS result FROM salers;
SELECT sname , CHAR_LENGTH(sname) AS result FROM salers;
SELECT sname , CHARACTER_LENGTH(sname) AS result FROM salers;

4. LOCATE(substr,str)
Повертає позицію першого входження підрядка substr у рядок str. Якщо підстрока substr у рядку str відсутня, повертається 0

5. LEFT (str, len)
Повертає крайні ліворуч len символи з рядка str. Ця функція підтримує багатобайтні величини

6. RIGHT(str, len)
Повертає крайні праворуч символів з рядка str. Ця функція підтримує багатобайтні величини

7. SUBSTRING(str, pos, len)
Повертає підстроку довжиною len символів з рядка str, починаючи з позиції pos. Ця функція підтримує багатобайтні величини

8. SUBSTRING(str, pos)
Повертає підрядок із рядка str, починаючи з позиції pos. Ця функція підтримує багатобайтні величини

9. SUBSTRING_INDEX(str, delim, count)
Повертає підрядок з рядка str перед появою count входжень роздільника delim. Якщо count позитивний, то повертається все, що знаходиться ліворуч від останнього роздільника (вважаючи ліворуч). Якщо count від'ємний, то повертається все, що знаходиться праворуч від останнього роздільника (вважаючи праворуч). Ця функція підтримує багатобайтні величини

10. LTRIM(str)
Повертає рядок str із віддаленими початковими пробілами. Ця функція підтримує багатобайтні величини

11. RTRIM(str)
Повертає рядок str із віддаленими кінцевими пробілами. Ця функція підтримує багатобайтні величини

12. TRIM([[BOTH | LEADING | TRAILING] [remstr] FROM] str)
Повертає рядок str з усіма віддаленими префіксами та/або суфіксами, зазначеними в remstr. Якщо не вказано жодного зі специфікаторів BOTH, LEADING або TRAILING, то мається на увазі BOTH. Якщо аргумент remstr не заданий, видаляються пробіли:
mysql> SELECT TRIM('bar');
         -> 'bar'
mysql> SELECT TRIM(LEADING 'x' FROM 'xxxbarxxx');
         -> 'barxxx'
mysql> SELECT TRIM(BOTH 'x' FROM 'xxxbarxxx');
         -> 'bar'
mysql> SELECT TRIM(TRAILING 'xyz' FROM 'barxxyz');
         -> 'barx'
Ця функція підтримує багатобайтні величини

13. REPLACE (str, from_str, to_str)
Повертає рядок str, де всі входження рядка from_str замінені на to_str. Ця функція підтримує багатобайтні величини

14. LCASE(str), LOWER(str)
Повертає рядок str, у якому всі символи переведено до нижнього регістру. Ця функція підтримує багатобайтні величини

15. UCASE(str), UPPER(str)
Повертає рядок str, у якому всі символи переведені у верхній регістр. Ця функція підтримує багатобайтні величини

*/


/*

Функції порівняння рядків
SELECT 'a' REGEXP 'a'; 1


*/

/*
1. ABS(X)
Повертає абсолютне значення величини X

2. SIGN(X)
Повертає знак аргументу як -1, 0 чи 1, залежно від цього, є X негативним, нулем чи позитивним

3. MOD(N,M)
Значення за модулем. Повертає залишок від поділу N на M

4. FLOOR(X)
Округлює дріб у менший бік

5. CEILING(X), CEIL(X)
Округлює дріб у велику сторону

6. ROUND(X)
Округлює дріб за правилами математики. Застосовувати з обережністю - залежить від програми

7. ROUND(X,D)
Повертає аргумент X, округлений до числа з десятковими знаками D. Якщо D дорівнює 0, результат буде представлений без десяткового знака або дрібної частини

8. POW(X,Y), POWER(X,Y)
Повертає значення аргументу X, зведене до ступеня Y

9. SQRT(X)
Повертає невід'ємний квадратний корінь числа X

10. RAND()
Повертає випадкову величину з плаваючою точкою в діапазоні від 0 до 1,0

11. TRUNCATE(X,D)
Повертає X, усічений до кількості знаків D після десяткової точки. Якщо D представлений нулем, результат буде без десяткової точки або дрібної частини. Якщо D негативно, то частина числа обнулюється.
*/



SELECT CONCAT(sname, city) FROM salers;
SELECT CONCAT(sname, ' ', city) AS res FROM salers;
SELECT CONCAT_WS(' ', sname, city) AS res FROM salers;
SELECT sname, LENGTH(sname) FROM salers;
SELECT sname, CHAR_LENGTH(sname) FROM salers;
SELECT sname, CHARACTER_LENGTH(sname) FROM salers;
SELECT * FROM salers WHERE CHAR_LENGTH(sname) <= 6;
SELECT * FROM salers WHERE LOCATE('kin', sname);
SELECT odate, LEFT(odate,7) FROM orders;
SELECT odate, RIGHT(odate,5) FROM orders;
SELECT odate, SUBSTRING(odate,6) FROM orders;
SELECT odate, SUBSTRING(odate,1,7) FROM orders;
SELECT odate, SUBSTRING_INDEX(odate, '-', 2) FROM orders;
SELECT LTRIM('string   ');
SELECT RTRIM('   string');
SELECT LTRIM(RTRIM('   string   ')) AS res;
SELECT TRIM('   string   ') AS res;
SELECT TRIM(TRAILING '-10' FROM odate) FROM orders;
SELECT TRIM(LEADING '1990-' FROM odate) FROM orders;
SELECT TRIM(BOTH 'xx' FROM 'xxbarxx');
SELECT comm, REPLACE(comm, '0.', '') AS res FROM salers;
SELECT LOWER(sname) FROM salers;
SELECT LCASE(sname) FROM salers;
SELECT UPPER(sname) FROM salers;
SELECT UCASE(sname) FROM salers;
SELECT 'a' REGEXP 'a'; -- 1
SELECT 'a' REGEXP 'b'; -- 0
SELECT * FROM salers WHERE sname REGEXP '[a-z]';
SELECT * FROM salers WHERE sname REGEXP '[а-я]';
SELECT * FROM salers WHERE sname REGEXP '[a-zа-я]';
SELECT * FROM salers WHERE sname REGEXP '^s';
SELECT * FROM salers WHERE sname REGEXP 'n$';
SELECT comm, ABS(comm) AS res FROM salers;
SELECT comm, SIGN(comm) AS res FROM salers;
SELECT * FROM salers WHERE SIGN(comm) = -1;
SELECT MOD(5,2); -- 1
SELECT comm, FLOOR(comm) FROM salers;
SELECT comm, CEIL(comm) FROM salers;
SELECT ROUND(2.6);
SELECT comm, ROUND(comm, 1) FROM salers;
SELECT comm, ROUND(comm, 0) FROM salers;
SELECT POW(3,2);
SELECT SQRT(9);
SELECT * FROM salers ORDER BY RAND() LIMIT 1;
SELECT comm, TRUNCATE(comm, 1) FROM salers;

/*

============================================
Функції дати та часу
============================================

1. NOW(), SYSDATE(), CURRENT_TIMESTAMP
Повертає поточну дату і час як величину у форматі YYYY-MM-DD HH:MM:SS або YYYYMMDDHHMMSS, залежно від того, в якому контексті функція використовується - у рядковому або числовому.
Зауважте, що NOW() обчислюється лише один раз кожного запиту, саме - на початку його виконання. Це дозволяє бути впевненим у тому, що множинні посилання на NOW() в рамках одного запиту дадуть одне й те саме значення

2. CURDATE(), CURRENT_DATE
Повертає сьогоднішню дату як величину у форматі YYYY-MM-DD або YYYYMMDD, залежно від того, в якому контексті використовується функція – у рядковому чи числовому

3. CURTIME(), CURRENT_TIME
Повертає поточний час як величину у форматі HH:MM:SS або HHMMS, залежно від того, в якому контексті використовується функція - у рядковому чи числовому

4. DAYOFWEEK(date)
Повертає індекс дня тижня для date аргументу (1 = неділя, 2 = понеділок, ... 7 = субота). Ці індексні величини відповідають стандарту ODBC.

5. WEEKDAY(date)
Повертає індекс дня тижня для аргументу date (0 = понеділок, 1 = вівторок, ... 6 = неділя)

6. DAY(date), DAYOFMONTH(date)
Повертає порядковий номер місяця для аргументу date в діапазоні від 1 до 31

7. DAYOFYEAR(date)
Повертає порядковий номер дня року для date аргументу в діапазоні від 1 до 366

8. MONTH(date)
Повертає порядковий номер місяця на рік для аргументу date в діапазоні від 1 до 12

9. DAYNAME(date)
Повертає назву дня тижня для аргументу date

10. MONTHNAME(date) || SET lc_time_names = 'ru_RU'
Повертає назву місяця для аргументу date

11. QUARTER(date)
Повертає номер кварталу року для date аргументу в діапазоні від 1 до 4

12. YEAR(date)
Повертає рік для date аргументу в діапазоні від 1000 до 9999 або 0 для "zero" дати

13. HOUR(time)
Повертає годину для аргументу часу в діапазоні від 0 до 23

14. MINUTE(time)
Повертає кількість хвилин для аргументу часу в діапазоні від 0 до 59

15. SECOND(time)
Повертає кількість секунд для аргументу часу в діапазоні від 0 до 59

16. PERIOD_ADD(P,N)
Додає N місяців до періоду P (у форматі YYMM або YYYYMM). Повертає розмір у форматі YYYYMM. Слід враховувати, що аргумент періоду P не є значенням дати

17. PERIOD_DIFF(P1, P2)
Повертає кількість місяців між періодами P1 та P2. P1 та P2 мають бути у форматі YYMM або YYYYMM. Слід враховувати, що аргументи періоду P1 та P2 не є значеннями дати

18. DATE_ADD(date,INTERVAL expr type) син. ADDDATE(date,INTERVAL expr type); ADDDATE(expr,days)
DATE_SUB(date,INTERVAL expr type) син. SUBDATE(date,INTERVAL expr type); SUBDATE(expr,days)
Дані функції здійснюють арифметичні дії над датами. Обидві є нововведенням MySQL версії 3.22. Функції ADDDATE() та SUBDATE() - синоніми для DATE_ADD() та DATE_SUB(). У версії MySQL 3.23 замість функцій DATE_ADD() і DATE_SUB() можна використовувати оператори + і -, якщо вираз праворуч є стовпець типу DATE чи DATETIME. Аргумент date є величиною типу DATETIME або DATE, що задає початкову дату. Вираз expr визначає величину інтервалу, який слід додати до початкової дати або відняти з початкової дати. Вираз expr є рядком, який може починатися з - для негативних значень інтервалів. Ключове слово type показує, як необхідно інтерпретувати цей вираз. Допоміжна функція EXTRACT(type FROM date) повертає інтервал зазначеного типу (type) значення дати.

19. EXTRACT(type FROM date)
Типи інтервалів для функції EXTRACT() використовуються ті ж, що і для функцій DATE_ADD() або DATE_SUB(), але EXTRACT() робить швидше вилучення частини значення дати, ніж виконання арифметичних дій

20. DATE_FORMAT(date,format)
Форматує величину date відповідно до рядка format

21. TIME_FORMAT(time,format)
Ця функція використовується аналогічно до описаної вище функції DATE_FORMAT(), але рядок format може містити тільки ті визначники формату, які відносяться до годин, хвилин і секунд. За вказівкою інших визначників буде видано величину NULL або 0

22. SEC_TO_TIME(seconds)
Повертає аргумент seconds, перетворений у години, хвилини та секунди, як величину у форматі HH:MM:SS або HHMMSS, залежно від того, в якому контексті використовується функція - у рядковому чи числовому

23. TIME_TO_SEC(time)
Повертає аргумент time, перетворений на секунди

24. DATE(expr)
Повертає частину, яка відповідає за дату

25. TIME(expr)
Повертає частину, що відповідає за час
*/


-- 1
SELECT NOW();

-- 2
SELECT SYSDATE();

-- 3
SELECT CURRENT_TIMESTAMP;

-- 4
SELECT NOW() + 0;

-- 5
SELECT NOW(), SLEEP(2), NOW();

-- 6
SELECT SYSDATE(), SLEEP(2), SYSDATE();

-- 7
SELECT CURDATE(); -- CURRENT_DATE

-- 8
SELECT CURTIME(); -- CURRENT_TIME

-- 9
SELECT odate, DAYOFWEEK(odate) FROM orders;

-- 10
SELECT DAYOFWEEK(NOW());

-- 11
SELECT odate, WEEKDAY(odate) FROM orders;

-- 12
SELECT odate, DAY(odate) FROM orders; -- DAYOFMONTH()

-- 13
SELECT DAYOFYEAR(NOW());

-- 14
SELECT odate, MONTH(odate) FROM orders;

-- 15
SELECT DAYNAME(NOW());

-- 16
SELECT @@lc_time_names;

-- 17
SET lc_time_names = 'ru_Ru';

-- 18
SELECT MONTHNAME(NOW());

-- 19
SELECT DAY(NOW()), MONTHNAME(NOW());

-- 20
SELECT CONCAT_WS(' ', DAY(NOW()), MONTHNAME(NOW())) AS date;

-- 21
SELECT QUARTER(NOW());

-- 22
SELECT odate, YEAR(odate) FROM orders;

-- 24
SELECT NOW(), HOUR(NOW());

-- 25
SELECT NOW(), MINUTE(NOW());

-- 26
SELECT NOW(), SECOND(NOW());

-- 27 3/03/2012
SELECT NOW(), DATE_FORMAT(NOW(), '%e/%m/%Y');

-- 28 3 ����� 2012
SELECT NOW(), DATE_FORMAT(NOW(), '%e %M %Y');

-- 29
SELECT PERIOD_ADD(DATE_FORMAT(NOW(), '%Y%m'), 2);

-- 30
SELECT PERIOD_ADD(201203, 2);

-- 31
SELECT PERIOD_DIFF(201205, 201203);

-- 32
SELECT NOW(), ADDDATE(NOW(), INTERVAL 1 SECOND);

-- 33
SELECT NOW(), ADDDATE(NOW(), INTERVAL 2 MINUTE);

-- 34
SELECT NOW(), ADDDATE(NOW(), INTERVAL '2:5' DAY_HOUR);

-- 35
SELECT NOW(), NOW() + INTERVAL 1 HOUR;

-- 36
SELECT NOW(), NOW() - INTERVAL 1 HOUR;

-- 37
SELECT NOW(), SUBDATE(NOW(), INTERVAL 2 HOUR);

-- 38
SELECT NOW(), ADDDATE(NOW(), 10);

-- 39
SELECT NOW(), SUBDATE(NOW(), 10);

-- 40
SELECT NOW(), EXTRACT(MINUTE FROM NOW());

-- 41
SELECT NOW(), TIME_FORMAT(NOW(), '%H:%i');

-- 42
SELECT SEC_TO_TIME(60);

-- 43
SELECT TIME_TO_SEC('1:00:00');

-- 44
SELECT NOW(), DATE(NOW());

-- 45
SELECT NOW(), TIME(NOW());


# mysql.exe -u root -p
Enter password: ****
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 71
Server version: 8.0.19 MySQL Community Server - GPL

Copyright (c) 2000, 2020, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> use `up`
Database changed
mysql> SELECT DATEDIFF('2023-01-01', '2023-01-19');
+--------------------------------------+
| DATEDIFF('2023-01-01', '2023-01-19') |
+--------------------------------------+
|                                  -18 |
+--------------------------------------+
1 row in set (0.00 sec)

mysql> SELECT DATEDIFF('2023-01-01', '2023-01-19') AS days;
+------+
| days |
+------+
|  -18 |
+------+
1 row in set (0.00 sec)

mysql> SELECT TO_DAYS('2023-01-19') as days;
+--------+
| days   |
+--------+
| 738904 |
+--------+
1 row in set (0.00 sec)

mysql> SELECT TO_DAYS('1582-01-01') as days;
+--------+
| days   |
+--------+
| 577814 |
+--------+
1 row in set (0.00 sec)

mysql> SELECT TO_DAYS('0-0-0') as days;
+------+
| days |
+------+
| NULL |
+------+
1 row in set, 1 warning (0.00 sec)

mysql> SELECT TO_DAYS('0-0-1') as days;
+------+
| days |
+------+
| NULL |
+------+
1 row in set, 1 warning (0.00 sec)

mysql> SELECT TO_DAYS('0-1-1') as days;
+------+
| days |
+------+
|    1 |
+------+
1 row in set (0.00 sec)

mysql> SELECT TO_DAYS('0-1-1') as days;
+------+
| days |
+------+
|    1 |
+------+
1 row in set (0.00 sec)

mysql> SELECT TO_DAYS('100-1-1') as days;
+-------+
| days  |
+-------+
| 36525 |
+-------+
1 row in set (0.00 sec)

mysql> SELECT TO_DAYS('1000-1-1') as days;
+--------+
| days   |
+--------+
| 365243 |
+--------+
1 row in set (0.00 sec)

mysql> SELECT TO_DAYS('2000-1-1') as days;
+--------+
| days   |
+--------+
| 730485 |
+--------+
1 row in set (0.00 sec)

mysql> SELECT f.cname, s.name, f.rating FROM customers f, customers s WHERE f.rating = s.rating;
ERROR 1054 (42S22): Unknown column 's.name' in 'field list'
mysql> SELECT f.cname, s.cname, f.rating FROM customers f, customers s WHERE f.rating = s.rating;
+--------+--------+--------+
| cname  | cname  | rating |
+--------+--------+--------+
| Andrey | Andrey |    100 |
| Max    | Max    |    200 |
| Nazar  | Nazar  |    300 |
| Nik    | Nazar  |    300 |
| Olga   | Olga   |    500 |
| Taras  | Taras  |    800 |
| Nazar  | Nik    |    300 |
| Nik    | Nik    |    300 |
+--------+--------+--------+
8 rows in set (0.00 sec)

mysql> SELECT f.cname, s.cname, f.rating FROM customers f, customers s WHERE f.rating = s.rating AND f.cname > s.cname;
+-------+-------+--------+
| cname | cname | rating |
+-------+-------+--------+
| Nik   | Nazar |    300 |
+-------+-------+--------+
1 row in set (0.00 sec)

mysql> SELECT f.cname, s.cname, f.rating FROM customers f, customers s WHERE f.rating = s.rating AND f.cname < s.cname;
+-------+-------+--------+
| cname | cname | rating |
+-------+-------+--------+
| Nazar | Nik   |    300 |
+-------+-------+--------+
1 row in set (0.00 sec)

mysql> SELECT f.sname, s.sname, s.city FROM salers f, salers s WHERE f.city = s.city AND f.sname < s.sname;
Empty set (0.00 sec)

mysql> SELECT f.sname, s.sname, s.city FROM salers f, salers s WHERE f.city = s.city;
+--------+--------+----------+
| sname  | sname  | city     |
+--------+--------+----------+
| Pol    | Pol    | London   |
| Monika | Monika | San Jose |
| Mikle  | Mikle  | UK       |
| Skif   | Skif   | Paris    |
| Staf   | Staf   | New York |
+--------+--------+----------+
5 rows in set (0.00 sec)

mysql> SELECT cname FROM customers WHERE snum = ( SELECT snum FROM salers WHERE  sname = 'Mikle');
+-------+
| cname |
+-------+
| Max   |
+-------+
1 row in set (0.00 sec)

mysql> SELECT * FROM orders WHERE snum = ( SELECT snum FROM salers WHERE city = 'London');
ERROR 1242 (21000): Subquery returns more than 1 row
mysql> SELECT * FROM orders WHERE snum IN ( SELECT snum FROM salers WHERE city = 'London');
+------+--------+------------+------+------+
| onum | amt    | odate      | cnum | snum |
+------+--------+------------+------+------+
| 3003 | 785.13 | 2022-08-08 | 2006 | 1003 |
| 3005 | 159.15 | 2020-04-04 | 2002 | 1001 |
+------+--------+------------+------+------+
2 rows in set (0.00 sec)

mysql> SELECT snum, sname FROM salers WHERE snum IN ( SELECT snum FROM GROUP BY  snum HAVING COUNT (snum) > 1);
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'GROUP BY  snum HAVING COUNT (snum) > 1)' at line 1
mysql> SELECT snum, sname FROM salers WHERE snum IN ( SELECT snum FROM GROUP BY  snum HAVING COUNT(snum) > 1);
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'GROUP BY  snum HAVING COUNT(snum) > 1)' at line 1
mysql> SELECT snum, sname FROM salers WHERE snum IN ( SELECT snum FROM customers GROUP BY  snum HAVING COUNT(snum) > 1);
+------+--------+
| snum | sname  |
+------+--------+
| 1002 | Monika |
+------+--------+
1 row in set (0.00 sec)

mysql> SELECT snum, sname FROM salers WHERE snum NOT IN (SELECT snum FROM customers) ;
Empty set (0.00 sec)

mysql>  SELECT snum, sname FROM salers WHERE snum IN ( SELECT snum FROM customers GROUP BY  snum WHERE COUNT(snum) > 1);
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE COUNT(snum) > 1)' at line 1
mysql>  SELECT snum, sname FROM salers WHERE snum IN ( SELECT snum FROM customers WHERE COUNT(snum) > 1);
ERROR 1111 (HY000): Invalid use of group function
mysql>  SELECT * FROM customers c WHERE '2020-04-04' IN SELECT odate FROM orders o WHERE o.cnum - c.num ) ;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'SELECT odate FROM orders o WHERE o.cnum - c.num )' at line 1
mysql>  SELECT * FROM customers c WHERE '2020-04-04' IN ( SELECT odate FROM orders o WHERE o.cnum - c.num ) ;
ERROR 1054 (42S22): Unknown column 'c.num' in 'where clause'
mysql>  SELECT * FROM customers c WHERE '2020-04-04' IN ( SELECT odate FROM orders o WHERE o.cnum - c.cnum ) ;
ERROR 1690 (22003): BIGINT UNSIGNED value is out of range in '(`up`.`o`.`cnum` - `up`.`c`.`cnum`)'
mysql>  SELECT * FROM customers c WHERE '2020-04-04' IN ( SELECT odate FROM orders o WHERE o.cnum - c.cnum ) ;
ERROR 1690 (22003): BIGINT UNSIGNED value is out of range in '(`up`.`o`.`cnum` - `up`.`c`.`cnum`)'
mysql>  SELECT * FROM customers c WHERE '2020-04-04' IN ( SELECT odate FROM orders o WHERE o.cnum = c.cnum ) ;
+------+-------+------+--------+------+-------+
| cnum | cname | city | rating | snum | text  |
+------+-------+------+--------+------+-------+
| 2002 | Max   | UK   |    200 | 1003 | mysql |
+------+-------+------+--------+------+-------+
1 row in set (0.00 sec)

mysql> SELECT o.cnum, c.name,  c.city, c.rating, c.snum FROM orders o, customers c WHERE c.num = o.num AND odate = '2020-04-04';
ERROR 1054 (42S22): Unknown column 'c.name' in 'field list'
mysql> SELECT o.cnum, c.cname,  c.city, c.rating, c.snum FROM orders o, customers c WHERE c.num = o.num AND odate = '2020-04-04';
ERROR 1054 (42S22): Unknown column 'c.num' in 'where clause'
mysql> SELECT o.cnum, c.cname,  c.city, c.rating, c.snum FROM orders o, customers c WHERE c.cnum = o.cnum AND odate = '2020-04-04';
+------+-------+------+--------+------+
| cnum | cname | city | rating | snum |
+------+-------+------+--------+------+
| 2002 | Max   | UK   |    200 | 1003 |
+------+-------+------+--------+------+
1 row in set (0.00 sec)

mysql> SELECT * FROM salers WHERE EXISTS ( SELECT * FROM customers WHERE rating > 500 );
+------+--------+----------+-------+
| snum | sname  | city     | comm  |
+------+--------+----------+-------+
| 1001 | Pol    | London   |  0.12 |
| 1002 | Monika | San Jose |  0.15 |
| 1003 | Mikle  | London   |  0.13 |
| 1004 | Skif   | Paris    |  0.17 |
| 1010 | Staf   | New York | -0.25 |
+------+--------+----------+-------+
5 rows in set (0.00 sec)

mysql> SELECT * FROM customers WHERE rating > 500
    ->
    ->
    -> 1
    ->
    ->
    ->
    -> q
    -> SELECT * FROM salers WHERE EXISTS ( SELECT * FROM customers WHERE 5 > 1 );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '1



q
SELECT * FROM salers WHERE EXISTS ( SELECT * FROM customers WHERE 5 > 1 )' at line 4
mysql> SELECT * FROM salers WHERE EXISTS ( SELECT * FROM customers WHERE rating < 100 );
Empty set (0.00 sec)

mysql> SELECT * FROM salers WHERE EXISTS ( SELECT * FROM customers WHERE rating > 500 );
+------+--------+----------+-------+
| snum | sname  | city     | comm  |
+------+--------+----------+-------+
| 1001 | Pol    | London   |  0.12 |
| 1002 | Monika | San Jose |  0.15 |
| 1003 | Mikle  | London   |  0.13 |
| 1004 | Skif   | Paris    |  0.17 |
| 1010 | Staf   | New York | -0.25 |
+------+--------+----------+-------+
5 rows in set (0.00 sec)

mysql> SELECT s.sname FROM salers s, orders o WHERE o.snum = s.snum ;
+--------+
| sname  |
+--------+
| Skif   |
| Staf   |
| Mikle  |
| Monika |
| Pol    |
| Staf   |
+--------+
6 rows in set (0.00 sec)

mysql> SELECT s.snum , s.sname FROM salers s, orders o WHERE o.snum = s.snum ;
+------+--------+
| snum | sname  |
+------+--------+
| 1004 | Skif   |
| 1010 | Staf   |
| 1003 | Mikle  |
| 1002 | Monika |
| 1001 | Pol    |
| 1010 | Staf   |
+------+--------+
6 rows in set (0.00 sec)

mysql> SELECT s.snum , s.sname FROM salers s, orders o WHERE o.snum = s.snum AND o.cnum = ( SELECT c.cnum FROM customers c WHERE rating = 500 ) ;
+------+-------+
| snum | sname |
+------+-------+
| 1004 | Skif  |
+------+-------+
1 row in set (0.00 sec)

mysql> SELECT s.snum , s.sname FROM salers s, orders o WHERE o.snum = s.snum AND o.cnum IN ( SELECT c.cnum FROM customers c WHERE rating > 500 ) ;
+------+-------+
| snum | sname |
+------+-------+
| 1010 | Staf  |
+------+-------+
1 row in set (0.00 sec)

mysql> SELECT s.snum , s.sname FROM salers s, orders o WHERE o.snum = s.snum AND o.cnum IN ( SELECT c.cnum FROM customers c WHERE rating > 400 ) ;
+------+-------+
| snum | sname |
+------+-------+
| 1004 | Skif  |
| 1010 | Staf  |
+------+-------+
2 rows in set (0.00 sec)

mysql> SELECT * FROM salers WHERE EXISTS ( SELECT * FROM customers WHERE rating < 100 );
Empty set (0.00 sec)

mysql> SELECT * FROM salers WHERE EXISTS ( SELECT * FROM customers WHERE rating > 100 );
+------+--------+----------+-------+
| snum | sname  | city     | comm  |
+------+--------+----------+-------+
| 1001 | Pol    | London   |  0.12 |
| 1002 | Monika | San Jose |  0.15 |
| 1003 | Mikle  | London   |  0.13 |
| 1004 | Skif   | Paris    |  0.17 |
| 1010 | Staf   | New York | -0.25 |
+------+--------+----------+-------+
5 rows in set (0.00 sec)

mysql> SELECT * FROM salers WHERE NOT EXISTS ( SELECT * FROM customers WHERE rating > 100 );
Empty set (0.00 sec)

mysql> SELECT * FROM salers WHERE NOT EXISTS ( SELECT * FROM customers WHERE rating < 100 );
+------+--------+----------+-------+
| snum | sname  | city     | comm  |
+------+--------+----------+-------+
| 1001 | Pol    | London   |  0.12 |
| 1002 | Monika | San Jose |  0.15 |
| 1003 | Mikle  | London   |  0.13 |
| 1004 | Skif   | Paris    |  0.17 |
| 1010 | Staf   | New York | -0.25 |
+------+--------+----------+-------+
5 rows in set (0.00 sec)

mysql> SELECT snum, sname FROM salers
    -> UNION
    -> SELECT cnum, cname FROM customers;
+------+--------+
| snum | sname  |
+------+--------+
| 1001 | Pol    |
| 1002 | Monika |
| 1003 | Mikle  |
| 1004 | Skif   |
| 1010 | Staf   |
| 2001 | Andrey |
| 2002 | Max    |
| 2003 | Nazar  |
| 2004 | Olga   |
| 2005 | Taras  |
| 2006 | Nik    |
+------+--------+
11 rows in set (0.00 sec)

mysql> SELECT snum, sname FROM salers  UNION  SELECT cnum, cname FROM customers;
+------+--------+
| snum | sname  |
+------+--------+
| 1001 | Pol    |
| 1002 | Monika |
| 1003 | Mikle  |
| 1004 | Skif   |
| 1010 | Staf   |
| 2001 | Andrey |
| 2002 | Max    |
| 2003 | Nazar  |
| 2004 | Olga   |
| 2005 | Taras  |
| 2006 | Nik    |
+------+--------+
11 rows in set (0.00 sec)

mysql> SELECT snum, sname FROM salers
    ->
    -> ;
+------+--------+
| snum | sname  |
+------+--------+
| 1001 | Pol    |
| 1002 | Monika |
| 1003 | Mikle  |
| 1004 | Skif   |
| 1010 | Staf   |
+------+--------+
5 rows in set (0.00 sec)

mysql> SELECT snum, sname FROM salers
    -> UNION
    -> SELECT cnum FROM customers;
ERROR 1222 (21000): The used SELECT statements have a different number of columns
mysql> SELECT snum, city FROM salers
    -> UNION ALL
    -> SELECT snum, city FROM customers;
+------+----------+
| snum | city     |
+------+----------+
| 1001 | London   |
| 1002 | San Jose |
| 1003 | London   |
| 1004 | Paris    |
| 1010 | New York |
| 1001 | London   |
| 1003 | UK       |
| 1002 | San Jose |
| 1004 | Paris    |
| 1010 | Poland   |
| 1002 | Ukraine  |
+------+----------+
11 rows in set (0.00 sec)

mysql> SELECT snum, city FROM salers
    -> UNION
    -> SELECT snum, city FROM customers
    -> ;
+------+----------+
| snum | city     |
+------+----------+
| 1001 | London   |
| 1002 | San Jose |
| 1003 | London   |
| 1004 | Paris    |
| 1010 | New York |
| 1003 | UK       |
| 1010 | Poland   |
| 1002 | Ukraine  |
+------+----------+
8 rows in set (0.00 sec)