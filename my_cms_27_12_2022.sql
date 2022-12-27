-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para my_cms
CREATE DATABASE IF NOT EXISTS `my_cms` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `my_cms`;

-- Volcando estructura para tabla my_cms.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(200) CHARACTER SET latin1 NOT NULL,
  `postDesc` varchar(10000) CHARACTER SET latin1 NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `postTag` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `postAuthor` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `postHeaderIMG` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`postID`),
  UNIQUE KEY `postTitle` (`postTitle`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla my_cms.posts: ~1 rows (aproximadamente)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`postID`, `postTitle`, `postDesc`, `postTime`, `postTag`, `postAuthor`, `postHeaderIMG`) VALUES
	(16, 'Eficiencia de Mascaras', 'FFP1: Es el nivel de protección más bajo.\r\n      Estas máscaras no son eficientes contra gases venenosos ni fibrogénicas de polvo o aerosoles. Este nivel es apto en construcción o en industria alimentaria.\r\nFPP2: Las máscaras de gas de este nivel se utilizan en entornos de trabajo en los que las partículas nocivas y mutagénicas se pueden encontrar en el aire: por ejemplo, en la industria metalúrgica y la minería. Los trabajadores están en contacto frecuente con aerosoles, niebla y humo que se afectan a las vías respiratorias.', '2022-12-20 20:42:54', 'survival', 'Survivor', 'https://i.imgur.com/ehnORnz.png');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Volcando estructura para tabla my_cms.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla my_cms.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nick`, `password`, `fullname`, `mail`, `dob`, `level`, `img`) VALUES
	(9, 'admin', '$2y$04$e7TDxnIIBU7ZL0p1/85r5eooVxDuRg2/tX1ylkaBKtGpNAVLu7MzC', 'admin', 'admin@admin.es', '2022-12-09', 10, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
