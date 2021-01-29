--
-- Скрипт сгенерирован Devart dbForge Studio 2020 for MySQL, Версия 9.0.470.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 29.01.2021 10:09:45
-- Версия сервера: 5.7.29
-- Версия клиента: 4.1
--

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

--
-- Установка базы данных по умолчанию
--
USE `symfony-demo`;

--
-- Удалить таблицу `advert`
--
DROP TABLE IF EXISTS advert;

--
-- Установка базы данных по умолчанию
--
USE `symfony-demo`;

--
-- Создать таблицу `advert`
--
CREATE TABLE advert (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  body text NOT NULL,
  image varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 23,
AVG_ROW_LENGTH = 744,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

-- 
-- Вывод данных для таблицы advert
--
INSERT INTO advert VALUES
(1, 'новость1', 'подробно', 'img1.jpg'),
(2, 'новость2', 'подробно', NULL),
(3, 'новость3', 'подробно', 'img2.jpg'),
(4, 'новость4', 'подробно', NULL),
(5, 'новость5', 'подробно', 'img1.jpg'),
(6, 'новость6', 'подробно', NULL),
(7, 'новость1', 'подробно', 'img1.jpg'),
(8, 'новость2', 'подробно', NULL),
(9, 'новость1', 'подробно', 'img1.jpg'),
(10, 'новость2', 'подробно', NULL),
(11, 'новость1', 'подробно', 'img2.jpg'),
(12, 'новость2', 'подробно', NULL),
(13, 'новость1', 'подробно', 'img1.jpg'),
(14, 'новость2', 'подробно', NULL),
(15, 'новость1', 'подробно', 'img2.jpg'),
(16, 'новость2', 'подробно', NULL),
(17, 'новость1', 'подробно', 'img1.jpg'),
(18, 'новость2', 'подробно', NULL),
(19, 'новость1', 'подробно', 'img1.jpg'),
(20, 'новость2', 'подробно', NULL),
(21, 'новость1', 'подробно', 'img1.jpg'),
(22, 'новость2', 'подробно', NULL);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
--
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;