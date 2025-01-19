-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.34 - MySQL Community Server (GPL)
-- Операционная система:         Linux
-- HeidiSQL Версия:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп структуры для таблица site.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Дамп данных таблицы site.migration: ~2 rows (приблизительно)
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1737195798),
	('m250117_071929_create_tasks_table', 1737302225);

-- Дамп структуры для таблица site.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL COMMENT 'Дата',
  `operation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Название операции ',
  `shift` enum('1','2') COLLATE utf8_unicode_ci DEFAULT NULL,
  `line` int(11) DEFAULT NULL COMMENT 'номер линии',
  `workcenter` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'отбор в бублике',
  `plan` int(11) NOT NULL COMMENT 'максимальное значение в бублике',
  `fact` int(11) NOT NULL COMMENT 'На сколько заполнить бублик зеленым цветом относительно plan.',
  `operator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'фио сотрудника',
  PRIMARY KEY (`id`),
  UNIQUE KEY `workcenter` (`workcenter`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Задачи';

-- Дамп данных таблицы site.tasks: ~11 rows (приблизительно)
INSERT INTO `tasks` (`id`, `date`, `operation`, `shift`, `line`, `workcenter`, `plan`, `fact`, `operator`) VALUES
	(1, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '1-2-14', 10, 8, 'Иванов И. И.'),
	(2, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '2-2-14', 10, 5, 'Сладков А. А.'),
	(3, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '3-2-14', 10, 6, 'Марков М. М.'),
	(4, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '4-2-14', 10, 7, 'Гога Ж. Ж.'),
	(5, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '5-2-14', 10, 9, 'Кулич Б. Б.'),
	(6, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '6-2-14', 10, 1, 'Таран Д. Д.'),
	(7, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '7-2-14', 10, 0, 'Марс К. К.'),
	(8, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '8-2-14', 10, 4, 'Демид Д. Д.'),
	(9, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '9-2-14', 10, 5, 'Цлав В. В.'),
	(10, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '10-2-14', 10, 7, 'Савин Л. Л.'),
	(11, '2024-12-05 00:00:00', 'Токарная с ЧПУ 4', '1', 3, '11-2-14', 10, 8, 'Зин К. К.');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
