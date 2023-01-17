-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2022 a las 21:39:14
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'federendon@hotmail.com', '12345'),
(2, 'julian26@hotmail.com', '12345'),
(5, 'julian26@hotmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5f87bb9fb8c08', '5f87bb9fb92e8'),
('5f87bb9fbadb5', '5f87bb9fbb1e6'),
('5f87bb9fbc859', '5f87bb9fbd53b'),
('5f87bb9fbeb8d', '5f87bb9fbefe8'),
('5f87bb9fc0bb9', '5f87bb9fc10e8'),
('5f88b43712884', '5f88b43714dbe'),
('5f88b43761aa1', '5f88b437621f3'),
('6334994b59740', '6334994b5a0af'),
('6334994b5cf16', '6334994b5d8a4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('operador@cweb.com', '5f87b7b0e5928', 1, 5, 3, 2, '2020-10-15 04:25:31'),
('federendon26@hotmail.com', '5f88b3cd0a5d9', -1, 2, 1, 1, '2022-09-28 16:02:05'),
('feder32@hotmail.com', '63349932d393a', 0, 2, 0, 2, '2022-09-28 19:03:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5f87bb9fb8c08', 'si', '5f87bb9fb92e8'),
('5f87bb9fb8c08', 'no', '5f87bb9fb92f5'),
('5f87bb9fb8c08', 'son lenguajes similares que conservan ciertas diferencias en la ejecución', '5f87bb9fb92f6'),
('5f87bb9fb8c08', 'la opción a y la opción c son ciertas', '5f87bb9fb92f7'),
('5f87bb9fbadb5', 'Es un lenguaje de máquina', '5f87bb9fbb1e4'),
('5f87bb9fbadb5', 'Es un lenguaje interpretado', '5f87bb9fbb1e6'),
('5f87bb9fbadb5', 'Es un lenguaje orientado a objetos', '5f87bb9fbb1e7'),
('5f87bb9fbadb5', 'No es un lenguaje de último nivel', '5f87bb9fbb1e8'),
('5f87bb9fbc859', 'Verdadero', '5f87bb9fbd537'),
('5f87bb9fbc859', 'Falso', '5f87bb9fbd53b'),
('5f87bb9fbc859', 'Javascript tiene funciones que solo retornan valores', '5f87bb9fbd53c'),
('5f87bb9fbc859', 'Javascript es un lenguaje de programación orientada a objetos', '5f87bb9fbd53d'),
('5f87bb9fbeb8d', 'Los comentarios en javascript se habilitan con dos diagonales seguidas //', '5f87bb9fbefe5'),
('5f87bb9fbeb8d', 'Los comentarios se utilizan para poder darle claridad a los demás desarrolladores sobre el código', '5f87bb9fbefe7'),
('5f87bb9fbeb8d', 'La afirmación del planteamiento es totalmente falsa', '5f87bb9fbefe8'),
('5f87bb9fbeb8d', 'La afirmación del planteamiento es totalmente cierta', '5f87bb9fbefe9'),
('5f87bb9fc0bb9', 'La afirmación del planteamiento es totalmente cierta', '5f87bb9fc10e5'),
('5f87bb9fc0bb9', 'Javascript solo se utiliza para el usuario final', '5f87bb9fc10e8'),
('5f87bb9fc0bb9', 'Javascript se compila en un archivo ejecutable', '5f87bb9fc10e9'),
('5f87bb9fc0bb9', 'Javascript es un lenguaje muy similar a PHP y está orientado al servidor exclusivamente', '5f87bb9fc10ea'),
('5f88b43712884', 'p', '5f88b43714dba'),
('5f88b43712884', 'print', '5f88b43714dbe'),
('5f88b43712884', 'echo', '5f88b43714dbf'),
('5f88b43712884', 'console.log', '5f88b43714dc0'),
('5f88b43761aa1', '#', '5f88b437621f3'),
('5f88b43761aa1', '*', '5f88b437621f8'),
('5f88b43761aa1', '//', '5f88b437621fa'),
('5f88b43761aa1', '--', '5f88b437621fb'),
('6334994b59740', '1', '6334994b5a0af'),
('6334994b59740', '2', '6334994b5a0b3'),
('6334994b59740', '3', '6334994b5a0b4'),
('6334994b59740', '4', '6334994b5a0b5'),
('6334994b5cf16', '1', '6334994b5d89e'),
('6334994b5cf16', '2', '6334994b5d8a4'),
('6334994b5cf16', '3', '6334994b5d8a5'),
('6334994b5cf16', '4', '6334994b5d8a6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5f87b7b0e5928', '5f87bb9fb8c08', '¿Javascript y Java son lo mismo?', 4, 1),
('5f87b7b0e5928', '5f87bb9fbadb5', '¿Javascript es un lenguaje de alto nivel?', 4, 2),
('5f87b7b0e5928', '5f87bb9fbc859', 'Una función en Javascript no es un tramo de código diseñado para ejecutar una tarea específica', 4, 3),
('5f87b7b0e5928', '5f87bb9fbeb8d', 'Los comentarios en Javascript se utilizan para optimizar la ejecución de sus scripts', 4, 4),
('5f87b7b0e5928', '5f87bb9fc0bb9', 'Javascript es un lenguaje de programación que se puede utilizar desde el lado del servidor', 4, 5),
('5f88b3cd0a5d9', '5f88b43712884', 'Para mostrar texto en la consola usamos el comando', 4, 1),
('5f88b3cd0a5d9', '5f88b43761aa1', '¿Qué símbolo se utiliza para comentar una línea de código?', 4, 2),
('63349932d393a', '6334994b59740', 'javascript es', 4, 1),
('63349932d393a', '6334994b5cf16', 'que es java', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `intro` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `wrong`, `total`, `intro`, `date`) VALUES
('5f87b7b0e5928', 'Examen De Javascript', 1, 5, 'Examen de certificación de primer nivel de javascript', '2020-10-15 02:45:04'),
('5f88b3cd0a5d9', 'Python Básico', 1, 2, 'Examen básico de Python', '2020-10-15 21:24:50'),
('63349932d393a', 'Javascript', 0, 2, 'que es javas', '2022-09-28 18:57:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('operador@cweb.com', 1, '2020-10-15 04:25:31'),
('federendon26@hotmail.com', -2, '2022-09-28 16:02:05'),
('feder@gmail.com', 4, '2022-09-28 03:45:02'),
('jorge@hotmail.com', -3, '2022-09-28 13:12:59'),
('feder32@hotmail.com', -2, '2022-09-28 19:03:45'),
('federendon@hotmail.com', 0, '2022-09-28 19:23:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`name`, `gender`, `email`, `password`) VALUES
('Federico', 'Male', 'fede@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('Federico', 'M', 'feder32@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('Federico', 'M', 'feder@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('Federico', 'M', 'federendon26@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('Federico', 'M', 'hugorego@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759'),
('Jorge', 'M', 'jorge@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('Julian', 'M', 'julian300@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('Operador', 'M', 'operador@cweb.com', '4b67deeb9aba04a5b54632ad19934f26'),
('Feder', 'M', 'tumama@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
