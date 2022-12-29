-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-12-2022 a las 17:58:23
-- Versión del servidor: 8.0.31
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `my_cms_ioxee_27`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `postID` int NOT NULL,
  `postTitle` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `postDesc` varchar(10000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `postTag` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `postAuthor` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `postHeaderIMG` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `postDesc`, `postTime`, `postTag`, `postAuthor`, `postHeaderIMG`) VALUES
(16, 'Eficiencia de Mascaras', 'FFP1: Es el nivel de protección más bajo.\r\n      Estas máscaras no son eficientes contra gases venenosos ni fibrogénicas de polvo o aerosoles. Este nivel es apto en construcción o en industria alimentaria.\r\nFPP2: Las máscaras de gas de este nivel se utilizan en entornos de trabajo en los que las partículas nocivas y mutagénicas se pueden encontrar en el aire: por ejemplo, en la industria metalúrgica y la minería. Los trabajadores están en contacto frecuente con aerosoles, niebla y humo que se afectan a las vías respiratorias.', '2022-12-27 09:01:40', 'survival, mask', 'Survivor', 'https://i.imgur.com/ehnORnz.png'),
(17, 'Los 6 ciberataques que serán más habituales en 2023', '<b>Ransomware</b> Más sofisticados y rescates más caros. Los ciberatacantes actuales utilizan formas sofisticadas para evadir las medidas de detección de ransomware tradicionales y se aprovechan de los procesos comunes para introducirse en los sistemas. De esta manera, se mueven por la red buscando la sustracción y el cifrado de datos. Una vez que tienen lo que necesitan, amenazan con vender o filtrar los datos exfiltrados o la información de autenticación si no se paga el rescate.', '2022-12-27 09:01:40', 'hacking, virus, malware, software', 'IT Expert', 'https://imagenes.20minutos.es/files/image_990_v3/uploads/imagenes/2022/05/11/malware-windows.jpeg'),
(18, 'Crean detectores de texto artificial para los profesores como respuesta al uso de IA para hacer trabajos académicos', 'Esta herramienta apenas recibe actualizaciones. Esta herramienta apenas recibe actualizaciones.GPT-2\r\nChatGPT es toda una revolución por la capacidad que tiene su inteligencia artificial (IA) de escribir textos, contestar a mensajes o redactar. Hace escasos días informábamos en 20Bits que dicha IA se empezó a colar en Twitter, pero actualmente, esta tecnología está presente en los trabajos académicos.\r\n\r\nLos profesores pueden evitar la trampa si utilizan este detector creado por OpenAI. En este caso, los maestros solo tendrán que introducir la redacción y la herramienta mostrará el porcentaje de lo que es real y falso.\r\n\r\nDesafortunadamente, el detector está anticuado porque apenas recibe actualizaciones, por lo tanto, hay veces que la inteligencia artificial engaña a los usuarios cuando se escriben textos complejos.', '2022-12-27 09:01:40', 'IA, GPT-2', 'IT Expert', 'https://imagenes.20minutos.es/files/image_990_v3/uploads/imagenes/2022/12/22/detector-de-openai.jpeg'),
(19, 'Susanna Griso no ha utilizado Photoshop: su retrato para desear felices fiestas se ha creado con inteligencia artificial', 'La inteligencia artificial está arrasando entre la sociedad. Muchos la usan en su día a día para realizar sus labores cotidianas. Una de sus funciones que más llama la atención es la manera en la que logra hacer retratos animados que parecen fotografías reales.\r\n\r\nSusanna Griso se ha servido de ella para crear su propia felicitación navideña. En una publicación de Instagram ha compartido tres fotografías en las que muestra su rostro caricaturizado que destaca por la brillante manera en la que está conseguido.\r\n\r\n\"Mi avatar y yo os felicitamos estas fiestas. La inteligencia artificial de me ha enfundado en el traje de Papá Noel\" escribe en relación a las imágenes.', '2022-12-28 08:59:26', 'IA, Susana Griso', 'IT Expert', 'https://i.imgur.com/M1SbKYn.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_categories`
--

CREATE TABLE `posts_categories` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `posts_categories`
--

INSERT INTO `posts_categories` (`id`, `name`, `description`) VALUES
(1, 'IT', 'INFORMATICA HACKING INTELIGENCIA ARTIFICIAL'),
(3, 'test', 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_media`
--

CREATE TABLE `social_media` (
  `id` int NOT NULL,
  `nick` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `social_media`
--

INSERT INTO `social_media` (`id`, `nick`, `facebook`, `twitter`, `instagram`, `linkedin`, `github`) VALUES
(2, 'admin', NULL, 'https://www.twitter.com/admin', NULL, 'https://www.linkedin.com/admin', 'https://www.github.com/admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nick` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `level` int NOT NULL DEFAULT '0',
  `img` varchar(255) DEFAULT NULL,
  `bio` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nick`, `password`, `fullname`, `mail`, `dob`, `level`, `img`, `bio`) VALUES
(9, 'admin', '$2y$10$EzWaudFvfh6aD147dExxz.tvSA9Wp8hDYDUYuLUgofB.TJlRFIThC', 'Admin', 'admin@thedailytelegraph.es', '2022-12-09', 10, NULL, 'teste'),
(10, 'itexpert', '$2y$10$EzWaudFvfh6aD147dExxz.tvSA9Wp8hDYDUYuLUgofB.TJlRFIThC', 'IT Expert', 'itexpert@thedailytelegraph.es', '2022-12-09', 0, NULL, 'teste'),
(11, 'survivor', '$2y$10$vtjDyZgrWwe32yVZ4zv9KuEUO/brDtfcvQD00DO7RyYgRXydK17T2', 'Survivor', 'survivor@thedailytelegraph.es', '2018-01-13', 5, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD UNIQUE KEY `postTitle` (`postTitle`);

--
-- Indices de la tabla `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `posts_categories`
--
ALTER TABLE `posts_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
