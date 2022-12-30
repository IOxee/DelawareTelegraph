-- --------------------------------------------------------
-- Host:                         db4free.net
-- Versión del servidor:         8.0.31 - MySQL Community Server - GPL
-- SO del servidor:              Linux
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para my_cms_ioxee_27
CREATE DATABASE IF NOT EXISTS `my_cms_ioxee_27` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_cms_ioxee_27`;

-- Volcando estructura para tabla my_cms_ioxee_27.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `postDesc` varchar(10000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `postTag` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `postAuthor` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `postHeaderIMG` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `postCategory` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`postID`),
  UNIQUE KEY `postTitle` (`postTitle`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla my_cms_ioxee_27.posts: ~4 rows (aproximadamente)
INSERT INTO `posts` (`postID`, `postTitle`, `postDesc`, `postTime`, `postTag`, `postAuthor`, `postHeaderIMG`, `postCategory`) VALUES
	(1, 'Eficiencia de Mascaras', 'FFP1: Es el nivel de protección más bajo.\r\n      Estas máscaras no son eficientes contra gases venenosos ni fibrogénicas de polvo o aerosoles. Este nivel es apto en construcción o en industria alimentaria.\r\nFPP2: Las máscaras de gas de este nivel se utilizan en entornos de trabajo en los que las partículas nocivas y mutagénicas se pueden encontrar en el aire: por ejemplo, en la industria metalúrgica y la minería. Los trabajadores están en contacto frecuente con aerosoles, niebla y humo que se afectan a las vías respiratorias.', '2022-12-29 14:50:56', 'survival, mask', 'Survivor', 'https://i.imgur.com/ehnORnz.png', '3'),
	(2, 'Los 6 ciberataques que serán más habituales en 2023', '<b>Ransomware</b> Más sofisticados y rescates más caros. Los ciberatacantes actuales utilizan formas sofisticadas para evadir las medidas de detección de ransomware tradicionales y se aprovechan de los procesos comunes para introducirse en los sistemas. De esta manera, se mueven por la red buscando la sustracción y el cifrado de datos. Una vez que tienen lo que necesitan, amenazan con vender o filtrar los datos exfiltrados o la información de autenticación si no se paga el rescate.', '2022-12-29 14:50:51', 'hacking, virus, malware, software', 'IT Expert', 'https://imagenes.20minutos.es/files/image_990_v3/uploads/imagenes/2022/05/11/malware-windows.jpeg', '2'),
	(3, 'Crean detectores de texto artificial para los profesores como respuesta al uso de IA para hacer trabajos académicos', 'Esta herramienta apenas recibe actualizaciones. Esta herramienta apenas recibe actualizaciones.GPT-2\r\nChatGPT es toda una revolución por la capacidad que tiene su inteligencia artificial (IA) de escribir textos, contestar a mensajes o redactar. Hace escasos días informábamos en 20Bits que dicha IA se empezó a colar en Twitter, pero actualmente, esta tecnología está presente en los trabajos académicos.\r\n\r\nLos profesores pueden evitar la trampa si utilizan este detector creado por OpenAI. En este caso, los maestros solo tendrán que introducir la redacción y la herramienta mostrará el porcentaje de lo que es real y falso.\r\n\r\nDesafortunadamente, el detector está anticuado porque apenas recibe actualizaciones, por lo tanto, hay veces que la inteligencia artificial engaña a los usuarios cuando se escriben textos complejos.', '2022-12-29 14:42:20', 'IA, GPT-2', 'IT Expert', 'https://imagenes.20minutos.es/files/image_990_v3/uploads/imagenes/2022/12/22/detector-de-openai.jpeg', '1'),
	(4, 'Susanna Griso no ha utilizado Photoshop: su retrato para desear felices fiestas se ha creado con inteligencia artificial', 'La inteligencia artificial está arrasando entre la sociedad. Muchos la usan en su día a día para realizar sus labores cotidianas. Una de sus funciones que más llama la atención es la manera en la que logra hacer retratos animados que parecen fotografías reales.\r\n\r\nSusanna Griso se ha servido de ella para crear su propia felicitación navideña. En una publicación de Instagram ha compartido tres fotografías en las que muestra su rostro caricaturizado que destaca por la brillante manera en la que está conseguido.\r\n\r\n"Mi avatar y yo os felicitamos estas fiestas. La inteligencia artificial de me ha enfundado en el traje de Papá Noel" escribe en relación a las imágenes.', '2022-12-29 14:50:51', 'IA, Susana Griso', 'IT Expert', 'https://i.imgur.com/M1SbKYn.jpeg', '1');

-- Volcando estructura para tabla my_cms_ioxee_27.posts_categories
CREATE TABLE IF NOT EXISTS `posts_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla my_cms_ioxee_27.posts_categories: ~2 rows (aproximadamente)
INSERT INTO `posts_categories` (`id`, `name`, `description`, `image`) VALUES
	(1, 'Artificial Intelligence', 'Les aplicacions d\'intel·ligència artificial inclouen motors de cerca web avançats (per exemple, Google), sistemes de recomanació (utilitzats per YouTube, Amazon i Netflix), comprensió de la parla humana (com Siri i Alexa), cotxes auto-conduint (per exemple, Waymo), presa de decisions automatitzada i competir al més alt nivell en sistemes de joc estratègics (com els escacs i Go). A mesura que les màquines són cada vegada més capaces, les tasques considerades que requereixen "intel·ligència" sovint s\'eliminen de la definició d\'IA, un fenomen conegut com l\'efecte d\'IA. Per exemple, el reconeixement òptic de caràcters s\'exclou amb freqüència de les coses considerades com a IA, que s\'han convertit en una tecnologia rutinària.', 'https://i.imgur.com/EGzdCyf.jpg'),
	(2, 'Virus', 'Un virus informàtic és un programari que té per objectiu alterar el funcionament normal de qualsevol tipus de dispositiu informàtic, sense el permís o el coneixement de l\'usuari principalment per a aconseguir fins maliciosos sobre el dispositiu. Els virus, habitualment, reemplacen arxius executables per altres infectats amb el codi d\'aquest mateix. Els virus poden destruir, de manera intencionada, les dades emmagatzemades en una computadora, encara que també existeixen altres més inofensius, que només produeixen molèsties o imprevistos.', 'https://i.imgur.com/ml5ucqo.jpg'),
	(3, 'Survival', 'La supervivència, o l\'acte de sobreviure, és la propensió d\'alguna cosa per continuar existint, especialment quan això es fa malgrat les condicions que podrien matar-lo o destruir-lo. El concepte es pot aplicar als éssers humans i altres éssers vius (o, hipotèticament, qualsevol ésser sensible), a l\'objecte físic, i a coses abstractes com creences o idees. Les coses vives generalment tenen un instint d\'autoconservació per sobreviure, mentre que els objectes destinats a ser utilitzats en condicions dures estan dissenyats per a la supervivència.', 'https://i.imgur.com/N8r4ktK.jpg');

-- Volcando estructura para tabla my_cms_ioxee_27.social_media
CREATE TABLE IF NOT EXISTS `social_media` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla my_cms_ioxee_27.social_media: ~1 rows (aproximadamente)
INSERT INTO `social_media` (`id`, `nick`, `facebook`, `twitter`, `instagram`, `linkedin`, `github`) VALUES
	(1, 'admin', NULL, 'https://www.twitter.com/admin', NULL, 'https://www.linkedin.com/admin', 'https://www.github.com/admin');

-- Volcando estructura para tabla my_cms_ioxee_27.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `level` int NOT NULL DEFAULT '0',
  `img` varchar(255) DEFAULT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `show_mail` int NOT NULL DEFAULT '1',
  `show_dob` int NOT NULL DEFAULT '0',
  `show_fullname` int NOT NULL DEFAULT '0',
  `show_bio` int NOT NULL DEFAULT '1',
  `show_social` int NOT NULL DEFAULT '1',
  `send_notifications` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla my_cms_ioxee_27.users: ~3 rows (aproximadamente)
INSERT INTO `users` (`id`, `nick`, `password`, `fullname`, `mail`, `dob`, `level`, `img`, `bio`, `show_mail`, `show_dob`, `show_fullname`, `show_bio`, `show_social`, `send_notifications`) VALUES
	(1, 'admin', '$2y$10$EzWaudFvfh6aD147dExxz.tvSA9Wp8hDYDUYuLUgofB.TJlRFIThC', 'Admin', 'admin@thedailytelegraph.es', '2022-12-09', 10, NULL, 'teste', 1, 0, 0, 1, 1, 1),
	(2, 'IT Expert', '$2y$10$EzWaudFvfh6aD147dExxz.tvSA9Wp8hDYDUYuLUgofB.TJlRFIThC', 'IT Expert', 'itexpert@thedailytelegraph.es', '2022-12-09', 5, NULL, 'teste', 1, 0, 0, 1, 1, 1),
	(3, 'Survivor', '$2y$10$vtjDyZgrWwe32yVZ4zv9KuEUO/brDtfcvQD00DO7RyYgRXydK17T2', 'Survivor', 'survivor@thedailytelegraph.es', '2018-01-13', 0, NULL, NULL, 1, 0, 0, 1, 1, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
