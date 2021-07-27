-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2021 a las 02:08:53
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb_publicidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id_dispositivo` int(11) NOT NULL,
  `nombre_dispositivo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_dispositivo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `device_agent` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fk_sucursal` int(11) DEFAULT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`id_dispositivo`, `nombre_dispositivo`, `tipo_dispositivo`, `device_agent`, `fk_sucursal`, `estatus`) VALUES
(1, 'Sala de juntas', 'Television', NULL, NULL, 0),
(2, 'Sala de clientes', 'Television', NULL, NULL, 0),
(3, 'Telefonia clientes', 'Smartphone', NULL, NULL, 0),
(9, 'telefono', 'computadora', 'los pinos', 3, 0),
(10, 'adsad', 'television', '', 2, 0),
(17, '$nombre_dispositivo', '1', '$device_agent', 2, 0),
(18, 'DISPOSITIVO PRUEBA1', 'TELEVISION', '', 3, 0),
(19, 'ASDSADSA', 'television', '', 2, 0),
(20, 'adasdsa', 'television', '', 8, 0),
(21, 'TELEVISION P', 'television', '', 2, 0),
(22, 'TELEVISION PRUEBA 2', 'television', '', 1, 0),
(23, 'TELEVISION PRUEBA', 'television', '', 1, 0),
(24, 'TELEVISION LOS PINOS', 'COMPUTADORA', 'asssssssssssssssssssssa', 2, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `dispositivo_tabla`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `dispositivo_tabla` (
`nombre_dispositivo` varchar(60)
,`tipo_dispositivo` varchar(60)
,`device_agent` text
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatos_multimedia`
--

CREATE TABLE `formatos_multimedia` (
  `id_formato` int(11) NOT NULL,
  `formato_multimedia` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `formatos_multimedia`
--

INSERT INTO `formatos_multimedia` (`id_formato`, `formato_multimedia`) VALUES
(1, '<---------Formatos soportados-------->\r\nImágenes:\r\n.JPG, .PNG , .JPEG, .GIF.\r\nAudio:\r\n.MP3, .WAV, .MIDI, .AAC, .FLAC, .AIFF.\r\nVideo:\r\n.MP4, .AVI, .FLV, .MOV, .WMV, H.264, .XVID, .RM.\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `id_publicidad` int(11) NOT NULL,
  `titulo_publicidad` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `url_archivo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `extension_archivo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_archivo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora_inicio` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `fecha_hora_final` text COLLATE utf8_spanish_ci NOT NULL,
  `estatus` tinyint(4) NOT NULL DEFAULT 1,
  `texto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fk_sucursal` int(11) NOT NULL,
  `fk_dispositivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`id_publicidad`, `titulo_publicidad`, `url_archivo`, `extension_archivo`, `tipo_archivo`, `fecha_hora_inicio`, `fecha_inicio`, `hora_inicio`, `fecha_final`, `hora_final`, `fecha_hora_final`, `estatus`, `texto`, `fecha_creacion`, `fecha_modificacion`, `fk_sucursal`, `fk_dispositivo`) VALUES
(1, 'TITULO', 'MULTIMEDIA/LOCALHOST.COM', 'TEXTO', 'TEXTO', '2020-01-01T15:36:00', '2021-07-07', '11:00:00', '2021-07-07', '12:00:00', '2020-01-01T15:36:00', 1, 'HOLA', '2021-06-17 16:51:40', '2021-07-07 21:11:08', 2, 3),
(2, 'PUBLICIDAD DE PRUEBA', '../multimedia/IMG_1622095760581.png', ' png', 'imagen', '2021-06-15T16:54', '2021-07-08', '10:00:00', '2021-07-08', '11:00:00', '2021-06-26T16:54', 1, '22222222222222', '2021-06-17 16:51:40', '2021-07-07 17:04:49', 3, 5),
(5, 'audio', '../multimedia/kylie-minogue-cant-get-you-out-of-my-head-official-video.mp3', ' mpeg', 'audio', '2021-06-15T10:38', '2021-07-09', '11:00:00', '2021-07-09', '12:00:00', '2021-06-15T10:38:00', 1, '', '2021-06-17 16:51:40', '2021-07-07 17:30:27', 2, 2),
(9, 'wqewqewq', '../multimedia/pexels-bruno-salvadori-2910590.jpg', ' jpeg', 'imagen', '2021-06-16T16:52:00', '2021-07-10', '23:00:00', '2021-07-10', '23:59:00', '2021-06-18T14:52:00', 0, 'adssadsadsadsadsadsadsadssa', '2021-06-17 16:51:40', '2021-07-19 17:05:15', 1, 3),
(10, 'Imagen', '../multimedia/descarga.png', ' png', 'imagen', '2021-06-16T17:04', '2021-07-10', '10:00:00', '2021-07-10', '11:00:00', '2021-06-16T17:04:00', 1, '', '2021-06-17 16:51:40', '2021-07-07 17:04:07', 2, 4),
(11, 'mp3_01', '../multimedia/kylie-minogue-cant-get-you-out-of-my-head-official-video.mp3', ' mpeg', 'audio', '2021-06-16T17:07', '2021-07-07', '10:00:00', '2021-07-07', '11:00:00', '2021-06-19T17:07', 1, '', '2021-06-17 16:51:40', '2021-07-07 21:33:53', 4, 2),
(12, 'video', '../multimedia/Nissan playa - dead.mp4', ' mp4', 'video', '2021-06-16T17:00', '2021-07-07', '12:00:00', '2021-07-07', '13:00:00', '2021-06-25T20:09', 1, '', '2021-06-17 16:51:40', '2021-07-07 21:18:01', 2, 2),
(13, 'IMAGEN', '../multimedia/pexels-djordje-cvetkovic-6389364.jpg', ' jpeg', 'imagen', '2021-06-16T17:00', NULL, NULL, NULL, NULL, '2021-06-16T17:30', 0, 'asdsadadsdsdsa', '2021-06-17 16:51:40', '2021-07-19 17:18:33', 3, 3),
(14, 'IMAGEN', '../multimedia/pexels-daria-sannikova-6739252.jpg', ' jpeg', 'imagen', '2021-06-17T17:00', NULL, NULL, NULL, NULL, '2021-06-24T17:30', 1, '', '2021-06-17 16:51:40', '2021-06-19 20:51:41', 4, 3),
(15, 'audio MODIFICADO', '', ' mpeg', 'audio', '2021-06-15T10:38:00', NULL, NULL, NULL, NULL, '2021-07-23T10:38', 0, '', '2021-06-17 20:52:24', '2021-07-19 16:59:40', 4, 1),
(16, 'HOLA', '../multimedia/descarga.png', ' png', 'imagen', '1997-10-08T00:00', NULL, NULL, NULL, NULL, '2021-11-10T12:00', 0, '', '2021-06-18 22:33:11', '2021-07-19 17:06:19', 3, 1),
(17, 'Hola', '../multimedia/pexels-djordje-cvetkovic-6389366.jpg', ' jpeg', 'imagen', '2021-06-18T16:34', NULL, NULL, NULL, NULL, '2021-06-25T16:34', 1, '', '2021-06-18 22:34:44', '2021-06-18 22:34:44', 2, 4),
(18, 'PROMOCION DE DIA DE LAS MADRES', '../multimedia/Joy on Instagram_ __TodsInOurShoes â¤ï¸___Tods _walterchiapponi __wkorea __ì—ë””í„°ã…£ì§„ì •ì•„__í¬í† ê·¸ëž˜í¼ã…£ìœ¤ì§€ìš©_ìŠ¤íƒ€ì¼ë¦¬ìŠ¤íŠ¸ã…£ê¹€ì„¸ì¤€__í—¤ì–´ã…£ìˆœì´(ìˆœìˆ˜)__ë©”ì´í¬ì—…ã…£ì‹ ê²½ë¯¸(ìˆœìˆ˜)__COiKEVRM6mi_0(JPG)_2.jpg', ' jpeg', 'imagen', '2021-06-19T16:36', NULL, NULL, NULL, NULL, '2021-06-18T16:37', 0, 'texto', '2021-06-18 22:37:10', '2021-07-18 20:46:13', 2, 3),
(19, 'Hola, es una promocion de log', '../multimedia/385a5ea9c057bfb540321460e870911e.gif', ' gif', 'imagen', '2021-06-25T16:39', NULL, NULL, NULL, NULL, '2021-06-18T16:39', 1, 'EstarÃ¡ valida hasta maÃ±ana.', '2021-06-18 22:39:36', '2021-06-18 22:39:36', 1, 3),
(20, 'Hola', '', '', 'texto', '2021-06-18T17:19', NULL, NULL, NULL, NULL, '2021-06-20T17:19', 0, 'Contenido promocional 180621', '2021-06-18 23:19:12', '2021-07-18 20:50:46', 3, 3),
(21, 'NUEVA 19062021', '../multimedia/pexels-cottonbro-4694322.jpg', ' jpeg', 'imagen', '2021-06-19T20:39', NULL, NULL, NULL, NULL, '2021-06-19T20:39', 1, 'PUBLICIDAD', '2021-06-20 02:39:31', '2021-06-20 02:39:31', 1, 4),
(22, 'sss', '../multimedia/c1e850662597ed58cd05e8e664948c68.jpg', ' jpeg', 'imagen', '2021-06-21T00:19', NULL, NULL, NULL, NULL, '2021-06-22T00:19', 1, 'ssss', '2021-06-21 06:19:25', '2021-06-21 06:19:25', 3, 2),
(23, 'Hola', '', 'txt', 'texto', '2021-06-21T12:04', NULL, NULL, NULL, NULL, '2021-06-23T12:04', 0, 'hola', '2021-06-21 18:57:22', '2021-07-18 20:52:09', 2, 1),
(24, 'audio', 'multimedia/kylie-minogue-cant-get-you-out-of-my-head-official-video.mp3', 'mpeg', 'audio', '2021-06-21T12:59', NULL, NULL, NULL, NULL, '2021-06-21T12:59', 1, 'audio', '2021-06-21 18:59:57', '2021-06-21 18:59:57', 1, 1),
(25, 'video', '../multimedia/Nissan playa - dead.mp4', ' mp4', 'video', '2021-06-21T13:00', NULL, NULL, NULL, NULL, '2021-06-21T13:00', 1, 'video', '2021-06-21 19:00:44', '2021-06-21 19:00:44', 3, 5),
(26, 'video', 'multimedia/Nissan playa - dead.mp4', 'mp4', 'video', '2021-06-21T13:02', NULL, NULL, NULL, NULL, '2021-06-14T13:02', 1, 'video', '2021-06-21 19:02:51', '2021-06-21 19:02:51', 1, 3),
(27, 'audio', 'multimedia/kylie-minogue-cant-get-you-out-of-my-head-official-video.mp3', 'mpeg', 'audio', '2021-06-21T13:03', NULL, NULL, NULL, NULL, '2021-06-22T13:03', 1, 'audio', '2021-06-21 19:04:07', '2021-06-21 19:04:07', 1, 2),
(28, 'imagen', 'multimedia/c1e850662597ed58cd05e8e664948c68.jpg', 'jpeg', 'texto', '2021-06-21T13:07', NULL, NULL, NULL, NULL, '2021-06-21T13:07', 1, 'imagen', '2021-06-21 19:07:22', '2021-07-24 19:51:05', 1, 1),
(29, 'solo imagen', 'multimedia/c1e850662597ed58cd05e8e664948c68.jpg', 'jpeg', 'imagen', '2021-06-21T13:10', NULL, NULL, NULL, NULL, '2021-06-21T13:10', 1, '', '2021-06-21 19:10:41', '2021-06-21 19:10:41', 2, 3),
(30, 'texto', '', 'txt', 'texto', '2021-06-21T14:03', NULL, NULL, NULL, NULL, '2021-06-23T14:03', 0, 'Texto', '2021-06-21 20:03:48', '2021-07-18 20:52:44', 1, 1),
(31, 'asdsadsadsad', 'multimedia/imagendescarga.png', '', '', '2021-06-23T14:58', NULL, NULL, NULL, NULL, '2021-06-24T14:58', 1, '', '2021-06-23 21:20:07', '2021-06-23 21:20:07', 1, 1),
(32, 'hola', '', 'txt', 'texto', '2021-06-17T11:03', NULL, NULL, NULL, NULL, '2021-06-25T11:03', 1, '', '2021-06-24 17:03:44', '2021-06-24 17:03:44', 1, 2),
(33, 'ddasdsdsadas', '', 'txt', 'texto', '2021-06-25T15:03', NULL, NULL, NULL, NULL, '2021-06-26T15:03', 1, 'addsasa', '2021-06-25 21:05:53', '2021-06-25 21:05:53', 1, 2),
(34, 'localse', '', 'txt', 'texto', '2021-06-25T15:06', NULL, NULL, NULL, NULL, '2021-06-26T15:06', 1, 'holaaaa', '2021-06-25 21:07:03', '2021-06-25 21:07:03', 2, 2),
(35, 'holaaa', '', 'txt', 'texto', '2021-06-24T15:07', NULL, NULL, NULL, NULL, '2021-06-26T15:07', 1, '', '2021-06-25 21:07:28', '2021-06-25 21:07:28', 1, 1),
(36, 'asdsadsas', '', 'txt', 'texto', '2021-06-18T15:08', NULL, NULL, NULL, NULL, '2021-06-25T15:08', 1, 'adsadsad', '2021-06-25 21:09:11', '2021-06-25 21:09:11', 1, 1),
(37, 'dsadsdsa', '', 'txt', 'texto', '2021-07-05T12:59', NULL, NULL, NULL, NULL, '2021-07-06T12:57', 1, 'texto', '2021-07-05 18:58:16', '2021-07-05 18:58:16', 1, 1),
(38, 'sdsadaads', '', 'txt', 'texto', '2021-07-05T14:13', NULL, NULL, NULL, NULL, '2021-07-06T14:13', 0, 'sadsa', '2021-07-05 20:14:32', '2021-07-18 23:16:06', 1, 3),
(39, 'holaaaaaaaaa', '', 'txt', 'texto', '2021-07-08 13:16', NULL, NULL, NULL, NULL, '2021-07-16 13:17', 1, 'sadsasa', '2021-07-08 19:14:31', '2021-07-08 19:14:31', 1, 1),
(41, 'asdasd', '', 'txt', 'texto', '2021-07-08 13:24', NULL, NULL, NULL, NULL, '2021-07-08 13:25', 1, 'aasdsdsa', '2021-07-08 19:23:39', '2021-07-08 19:23:39', 2, 1),
(42, 'titulo', '', 'extension_archivo', 'tipo_archivo', '2021-07-08T13:30:00', NULL, NULL, NULL, NULL, '2022-07-08T13:30:00', 0, '$texto', '2021-07-08 19:31:00', '2021-07-19 17:03:21', 2, 1),
(43, 'titulo', '', 'extension_archivo', 'tipo_archivo', '2021-07-08T13:30:00', NULL, NULL, NULL, NULL, '2022-07-08T13:30:00', 0, '$texto', '2021-07-08 19:31:58', '2021-07-19 17:02:59', 2, 1),
(44, 'asda', 'asdsadsa', '', '', 'sadsada', NULL, NULL, NULL, NULL, 'asdasdsa', 1, 'asdsadsas', '2021-07-08 19:32:42', '2021-07-08 19:32:42', 4, 2),
(47, 'publicidad uno', '', 'txt', 'texto', '2021-07-10 12:00', NULL, NULL, NULL, NULL, '2021-07-09 13:00', 1, 'asdsadsadsa', '2021-07-08 22:19:40', '2021-07-08 22:51:08', 2, 2),
(48, 'publicidad dos', '', 'txt', 'texto', '2021-07-10 13:00', NULL, NULL, NULL, NULL, '2021-07-09 14:00', 1, 'adsdsada', '2021-07-08 22:25:57', '2021-07-08 22:51:11', 2, 2),
(49, 'publicidad tres', '', 'txt', 'texto', '2021-07-10 15:00', NULL, NULL, NULL, NULL, '2021-07-09 16:00', 1, 'texto publicidad tres de prueba', '2021-07-08 22:26:56', '2021-07-08 22:51:21', 2, 2),
(50, 'publicidad cuatro', '', 'txt', 'texto', '2021-07-13 12:00', NULL, NULL, NULL, NULL, '2021-07-13 13:00', 1, 'publicidad de prueba cuatro', '2021-07-08 22:50:47', '2021-07-12 21:09:43', 3, 1),
(51, 'publicidad cinco', '', 'txt', 'texto', '2021-07-13 13:00', NULL, NULL, NULL, NULL, '2021-07-13 14:00', 1, 'adsadsadsad', '2021-07-08 22:52:51', '2021-07-12 21:08:51', 1, 1),
(52, 'publicidad seis', '', 'txt', 'texto', '2021-07-13 15:00', NULL, NULL, NULL, NULL, '2021-07-13 16:00', 1, 'asdsadsa', '2021-07-08 22:53:29', '2021-07-12 21:09:06', 1, 3),
(53, 'hoaaaa', '', 'txt', 'texto', '2021-07-12 00:00', NULL, NULL, NULL, NULL, '2021-07-12 02:00', 1, 'asdsadsa', '2021-07-11 06:47:38', '2021-07-12 21:09:49', 1, 2),
(54, 'sadsad', '', 'txt', 'texto', '2021-07-12 12:00', NULL, NULL, NULL, NULL, '2021-07-12 23:00', 1, 'sadsadsad', '2021-07-11 10:34:00', '2021-07-11 10:34:00', 7, 3),
(55, 'ASDSADSA', '', 'txt', 'texto', '2021-10-12 22:00', NULL, NULL, NULL, NULL, '2021-10-12 23:20', 1, 'ASDSADASDS', '2021-07-11 10:36:39', '2021-07-11 10:36:39', 10, 9),
(56, 'sadsadsa', '', 'txt', 'texto', '2021-07-11 22:10', NULL, NULL, NULL, NULL, '2021-07-11 22:12', 1, 'asdsadsa', '2021-07-12 16:57:47', '2021-07-12 16:57:47', 2, 3),
(57, 'asaaaa', '', 'txt', 'texto', '2021-07-10 20:10', NULL, NULL, NULL, NULL, '2021-07-10 22:12', 1, 'asdsdas', '2021-07-12 17:01:17', '2021-07-12 17:01:17', 7, 1),
(58, 'FORMULARIO DE PRUEBA XA', '', 'txt', 'texto', '2021-07-12 10:00', NULL, NULL, NULL, NULL, '2021-07-12 10:01', 1, 'SADSADSDS', '2021-07-12 20:10:11', '2021-07-12 20:10:11', 1, 1),
(59, 'dadasdsa', '', 'txt', 'texto', '', NULL, NULL, NULL, NULL, '', 1, 'asdsadsa', '2021-07-15 19:52:39', '2021-07-15 19:52:39', 7, 3),
(60, 'dadasdsa', '', 'txt', 'texto', '', NULL, NULL, NULL, NULL, '', 1, 'Publicidad sadasd', '2021-07-15 19:56:43', '2021-07-15 19:56:43', 7, 3),
(61, 'dadasdsa', '', 'txt', 'texto', '', NULL, NULL, NULL, NULL, '', 1, 'Publicidad sadasd', '2021-07-15 19:58:33', '2021-07-15 19:58:33', 7, 3),
(62, 'dadasdsa', '', 'txt', 'texto', '2021-07-15 13:58', NULL, NULL, NULL, NULL, '2021-07-15 13:59', 1, 'Publicidad sadasd', '2021-07-15 19:58:54', '2021-07-15 19:58:54', 7, 3),
(63, 'ssadsadds', '', 'txt', 'texto', '2021-07-15 14:11', NULL, NULL, NULL, NULL, '2021-07-15 14:20', 1, 'asdsaddsa', '2021-07-15 20:12:01', '2021-07-15 20:12:01', 7, 3),
(64, 'sadsadsa', '', 'txt', 'texto', '2021-07-15 14:25', NULL, NULL, NULL, NULL, '2021-07-15 14:40', 1, 'asdsadsadsa', '2021-07-15 20:25:16', '2021-07-15 20:25:16', 7, 3),
(65, 'sadsadsa', '', 'txt', 'texto', '2021-07-15 14:25', NULL, NULL, NULL, NULL, '2021-07-15 14:30', 1, 'asdsadsadsa', '2021-07-15 20:25:43', '2021-07-15 20:25:43', 7, 3),
(66, 'sadsadsa', '', 'txt', 'texto', '2021-07-15 14:26', NULL, NULL, NULL, NULL, '2021-07-15 14:30', 1, 'asdsadsadsa', '2021-07-15 20:26:58', '2021-07-15 20:26:58', 7, 3),
(67, 'sadsadsa', '', 'txt', 'texto', '2021-07-15 14:28', NULL, NULL, NULL, NULL, '2021-07-15 14:30', 1, 'asdsadsadsa', '2021-07-15 20:28:41', '2021-07-15 20:28:41', 7, 3),
(68, 'sadsadsa', '', 'txt', 'texto', '2021-07-15 14:29', NULL, NULL, NULL, NULL, '2021-07-15 14:30', 1, 'asdsadsadsa', '2021-07-15 20:29:16', '2021-07-15 20:29:16', 7, 3),
(69, 'sadsadsa', '', 'txt', 'texto', '2021-07-15 14:29', NULL, NULL, NULL, NULL, '2021-07-15 14:30', 1, 'asdsadsadsa', '2021-07-15 20:29:32', '2021-07-15 20:29:32', 7, 3),
(70, 'TEXTO', '', 'txt', 'texto', '2021-07-15 14:30', NULL, NULL, NULL, NULL, '2021-07-15 14:32', 1, 'asdsadsadsa', '2021-07-15 20:30:53', '2021-07-15 20:30:53', 7, 3),
(71, 'sadsadas', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '', NULL, NULL, NULL, NULL, '', 1, '', '2021-07-15 21:13:52', '2021-07-15 21:13:52', 7, 3),
(72, 'sadsadas', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 15:14', NULL, NULL, NULL, NULL, '2021-07-15 15:20', 1, '', '2021-07-15 21:14:44', '2021-07-15 21:14:44', 7, 3),
(73, 'adsaadsadaaaAAAAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 15:21', NULL, NULL, NULL, NULL, '2021-07-15 15:50', 1, '', '2021-07-15 21:19:33', '2021-07-15 21:19:33', 7, 3),
(74, 'adsaadsadaaaAAAAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 15:21', NULL, NULL, NULL, NULL, '2021-07-15 15:50', 1, '', '2021-07-15 21:19:46', '2021-07-15 21:19:46', 7, 3),
(75, 'adsaadsadaaaAAAAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 15:21', NULL, NULL, NULL, NULL, '2021-07-15 15:50', 1, '', '2021-07-15 21:19:53', '2021-07-15 21:19:53', 7, 3),
(76, 'adsaadsadaaaAAAAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 15:22', NULL, NULL, NULL, NULL, '2021-07-15 15:49', 1, '', '2021-07-15 21:21:06', '2021-07-15 21:21:06', 7, 3),
(77, 'HOLAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:00', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 21:27:43', '2021-07-15 21:27:43', 7, 3),
(78, 'HOLAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:00', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 21:28:18', '2021-07-15 21:28:18', 7, 3),
(79, 'HOLAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:00', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 21:32:24', '2021-07-15 21:32:24', 7, 3),
(80, 'HOLAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:00', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 21:32:31', '2021-07-15 21:32:31', 7, 3),
(81, 'HOLAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:00', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 21:33:11', '2021-07-15 21:33:11', 7, 3),
(82, 'HOLAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:00', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 21:33:22', '2021-07-15 21:33:22', 7, 3),
(83, 'HOLAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:00', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 21:33:56', '2021-07-15 21:33:56', 7, 3),
(84, 'HOLAAAAAAAAAA', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:00', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 21:47:07', '2021-07-15 21:47:07', 7, 3),
(85, 'sadsaddsa', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:00', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 21:48:23', '2021-07-15 21:48:23', 7, 3),
(86, 'sadsaddsa', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:01', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 22:01:31', '2021-07-15 22:01:31', 7, 3),
(87, 'sadsaddsa', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:01', NULL, NULL, NULL, NULL, '2021-07-15 16:05', 1, '', '2021-07-15 22:01:37', '2021-07-15 22:01:37', 7, 3),
(88, 'BBBBBBBBBBBBBBBBBBBBBBB', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:17', NULL, NULL, NULL, NULL, '2021-07-15 16:21', 1, '', '2021-07-15 22:17:48', '2021-07-15 22:17:48', 7, 3),
(89, 'BBBBBBBBBBBBBBBBBBBBBBB', '../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:17', NULL, NULL, NULL, NULL, '2021-07-15 16:21', 1, '', '2021-07-15 22:17:53', '2021-07-15 22:17:53', 7, 3),
(90, 'BBBBBBBBBBBBBBBBBBBBBBB', 'multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-15 16:27', NULL, NULL, NULL, NULL, '2021-07-15 16:30', 1, '', '2021-07-15 22:25:38', '2021-07-20 21:06:18', 7, 3),
(91, 'asdsadd', '', 'txt', 'texto', '2021-07-30 17:00', NULL, NULL, NULL, NULL, '2021-07-31 18:00', 1, 'asdsadasdss', '2021-07-16 23:50:46', '2021-07-16 23:50:46', 7, 3),
(92, 'HOLAA', '', 'txt', 'texto', '2021-07-16 17:54', NULL, NULL, NULL, NULL, '2021-07-17 18:00', 1, 'asasdsadsa', '2021-07-16 23:54:27', '2021-07-16 23:54:27', 7, 3),
(93, 'PUBLICIDAD', '', 'txt', 'texto', '2021-07-16 17:57', NULL, NULL, NULL, NULL, '2021-07-17 17:59', 1, 'asasdsadsa', '2021-07-16 23:56:23', '2021-07-16 23:56:23', 7, 3),
(94, 'DSFDFDS', '', 'txt', 'texto', '2021-07-18 12:00', NULL, NULL, NULL, NULL, '2021-07-19 15:00', 0, 'asdsadasd', '2021-07-18 17:44:43', '2021-07-19 17:01:51', 7, 3),
(95, 'PUBLICIDAD HOY', '../../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-19 17:20', NULL, NULL, NULL, NULL, '2021-07-20 17:30', 1, '', '2021-07-19 23:16:05', '2021-07-19 23:16:05', 27, 1),
(96, 'adsadsa', '../../multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-20 18:00', NULL, NULL, NULL, NULL, '2021-07-21 19:00', 1, '', '2021-07-19 23:41:23', '2021-07-19 23:41:23', 7, 3),
(97, 'VIDEO FIN ANIO', '../../multimedia/video/f288526caa6eed81e1ac902d6a7b0ba4.mp4', 'mp4', 'video', '2021-07-22 11:21', NULL, NULL, NULL, NULL, '2021-07-23 12:00', 1, '', '2021-07-20 17:22:00', '2021-07-20 17:22:00', 29, 18),
(98, 'VIDEO FIN ANIO', '../../multimedia/video/f288526caa6eed81e1ac902d6a7b0ba4.mp4', 'mp4', 'video', '2021-07-24 11:21', NULL, NULL, NULL, NULL, '2021-07-26 12:00', 1, '', '2021-07-20 17:23:39', '2021-07-20 17:23:39', 29, 18),
(99, 'VIDEO DE FIN DE ANIO', '../../multimedia/video/f288526caa6eed81e1ac902d6a7b0ba4.mp4', 'mp4', 'video', '2021-07-27 11:30', NULL, NULL, NULL, NULL, '2021-07-27 15:00', 1, '', '2021-07-20 17:35:39', '2021-07-20 17:35:39', 19, 1),
(100, 'VIDEO NUEVO PUBLICIDAD', '../../multimedia/video/f288526caa6eed81e1ac902d6a7b0ba4.mp4', 'mp4', 'video', '2021-07-25 10:00', NULL, NULL, NULL, NULL, '2021-07-25 11:00', 1, '', '2021-07-20 17:37:57', '2021-07-20 17:37:57', 2, 1),
(101, 'VIDEO NUEVO PUBLICIDAD', '../../multimedia/video/2_1_f288526caa6eed81e1ac902d6a7b0ba4.mp4', 'mp4', 'video', '2021-08-10 10:00', NULL, NULL, NULL, NULL, '2021-08-11 15:00', 1, '', '2021-07-20 17:43:47', '2021-07-20 17:43:47', 2, 1),
(102, 'VIDEO NUEVO PUBLICIDAD', '../../multimedia/audio/2_1_523898c53edecf3fd27ad11a81bb432f.mp3', 'mpeg', 'audio', '', NULL, NULL, NULL, NULL, '', 1, '', '2021-07-20 18:10:45', '2021-07-20 18:10:45', 2, 1),
(103, 'VIDEO NUEVO PUBLICIDAD', '../../multimedia/audio/2_1_523898c53edecf3fd27ad11a81bb432f.mp3', 'mpeg', 'audio', '2021-08-11 16:00', NULL, NULL, NULL, NULL, '2021-08-12 17:00', 1, '', '2021-07-20 18:11:46', '2021-07-20 18:11:46', 2, 1),
(104, 'SSSSSSS', '', 'txt', 'texto', '2021-09-21 14:00', NULL, NULL, NULL, NULL, '2021-09-22 15:00', 1, 'hhhhhhhhh', '2021-07-20 19:10:22', '2021-07-20 19:10:22', 1, 1),
(105, 'SSSSSS', '', 'txt', 'texto', '2021-12-22 12:00', NULL, NULL, NULL, NULL, '2021-12-23 13:00', 1, 'asddssadsa', '2021-07-20 19:20:05', '2021-07-20 19:20:05', 19, 1),
(106, 'PUBLICIDAD DICIEMBRE', 'multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-12-10 14:00', NULL, NULL, NULL, NULL, '2021-12-10 15:00', 1, '', '2021-07-21 16:30:27', '2021-07-21 16:30:27', 7, 3),
(107, 'PUBLICIDAD DICIEMBRE', '/multimedia/imagen/0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-12-10 16:00', NULL, NULL, NULL, NULL, '2021-12-10 17:00', 1, '', '2021-07-21 16:57:03', '2021-07-21 16:57:03', 7, 3),
(108, 'MODIFICACION', 'adasdsdasd.jpg', 'jpg', 'imagen', '2021-07-26 12:42', NULL, NULL, NULL, NULL, '2021-07-26 12:43', 1, '', '2021-07-21 17:09:56', '2021-07-26 18:43:04', 8, 3),
(109, 'PUBLICIDAD JULIO', '0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-11-01 12:00', NULL, NULL, NULL, NULL, '2021-11-01 13:00', 1, '', '2021-07-23 19:33:41', '2021-07-23 19:33:41', 1, 2),
(110, 'PUBLICIDAD VEINTETRES JULIO', '0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-23 14:06', NULL, NULL, NULL, NULL, '2021-07-23 15:06', 1, '', '2021-07-23 20:06:20', '2021-07-23 20:06:20', 7, 2),
(111, 'VIDEO PRUEBA', 'f288526caa6eed81e1ac902d6a7b0ba4.mp4', 'mp4', 'video', '2021-07-23 22:00', NULL, NULL, NULL, NULL, '2021-07-23 23:00', 1, '', '2021-07-23 20:48:07', '2021-07-23 20:48:07', 7, 3),
(112, 'VIDEO PRUEBA', '7_3_f288526caa6eed81e1ac902d6a7b0ba4.mp4', 'mp4', 'video', '2021-07-23 21:00', NULL, NULL, NULL, NULL, '2021-07-23 21:59', 1, '', '2021-07-23 20:56:47', '2021-07-23 20:56:47', 7, 3),
(113, 'TEXTO', '3_24_0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-24 13:00', NULL, NULL, NULL, NULL, '2021-07-24 14:00', 1, 'asdsadasds', '2021-07-23 21:04:37', '2021-07-26 21:05:24', 3, 24),
(114, 'TEXTO', '3_24_0714ef51931afb4681a72fd02520acd1.jpg', 'jpeg', 'imagen', '2021-07-24 13:00', NULL, NULL, NULL, NULL, '2021-07-24 14:00', 1, '', '2021-07-26 18:08:38', '2021-07-26 18:08:38', 3, 24),
(115, 'NUEVA PUBLICIDA PRUEBA', '7_3_523898c53edecf3fd27ad11a81bb432f.mp3', 'mpeg', 'audio', '2021-07-26 15:16', NULL, NULL, NULL, NULL, '2021-07-26 16:16', 1, '', '2021-07-26 21:16:15', '2021-07-26 21:23:39', 2, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre_sucursal` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_sucursal` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre_sucursal`, `tipo_sucursal`, `estatus`) VALUES
(1, 'MazatlÃ¡n, Ejercito Mexicano.', 'matriz', 1),
(2, 'Los Pinos CDMX', 'Matriz', 1),
(3, 'Lomas de chapultepec', 'Normal', 1),
(4, 'Cuauhtemoc', 'Matriz', 0),
(5, 'Mazatlan, Ejercito Mexicano.', 'normal', 0),
(7, 'sadsaddsa', 'Matriz', 0),
(8, 'sadsdsad', 'Matriz', 0),
(10, 'sadsad', 'Matriz', 0),
(19, 'Mazatlan 1', 'matriz', 0),
(27, 'La china, MZT. SN', 'matriz', 1),
(29, 'Mazatlan I', 'Matriz', 0);

-- --------------------------------------------------------

--
-- Estructura para la vista `dispositivo_tabla`
--
DROP TABLE IF EXISTS `dispositivo_tabla`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dispositivo_tabla`  AS SELECT `dispositivo`.`nombre_dispositivo` AS `nombre_dispositivo`, `dispositivo`.`tipo_dispositivo` AS `tipo_dispositivo`, `dispositivo`.`device_agent` AS `device_agent` FROM `dispositivo` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id_dispositivo`),
  ADD KEY `fk_sucursal` (`fk_sucursal`);

--
-- Indices de la tabla `formatos_multimedia`
--
ALTER TABLE `formatos_multimedia`
  ADD PRIMARY KEY (`id_formato`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id_publicidad`),
  ADD KEY `fk_sucursal` (`fk_sucursal`),
  ADD KEY `fk_dispositivo` (`fk_dispositivo`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `id_dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `formatos_multimedia`
--
ALTER TABLE `formatos_multimedia`
  MODIFY `id_formato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id_publicidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `dispositivo_ibfk_1` FOREIGN KEY (`fk_sucursal`) REFERENCES `sucursal` (`id_sucursal`);

--
-- Filtros para la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD CONSTRAINT `publicidad_ibfk_1` FOREIGN KEY (`fk_sucursal`) REFERENCES `sucursal` (`id_sucursal`),
  ADD CONSTRAINT `publicidad_ibfk_2` FOREIGN KEY (`fk_dispositivo`) REFERENCES `dispositivo` (`id_dispositivo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
