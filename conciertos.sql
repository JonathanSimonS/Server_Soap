-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-02-2022 a las 18:35:03
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concierto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conciertos`
--

CREATE TABLE `conciertos` (
  `id` varchar(36) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `fechayhora` varchar(300) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conciertos`
--

INSERT INTO `conciertos` (`id`, `titulo`, `fechayhora`, `ciudad`, `imagen`) VALUES
('4c7382ca-c77b-4b0e-85ca-a8f550d53f8e', 'Hora Zulú', '04/03/2022 22:22', 'Granada', 'http://www.avispamusic.com/wp-content/uploads/2016/09/hora-zulu.png'),
('79b2c14e-9019-42d8-8da1-b022e6a9d68a', 'Soziedad Alcoholika', '22/06/2022 20:00', 'Almería', 'https://i.pinimg.com/originals/c8/87/65/c8876588c5af85d3c6ae96000c06d975.jpg'),
('7fa9bdbd-d442-45e7-9662-22175416766b', 'Rage Against The Machine', '17/06/2022 17:00', 'Sevilla', 'https://seeklogo.com/images/R/Rage_Against_The_Machine-logo-A2C6A95730-seeklogo.com.png'),
('8ba32770-022c-467c-99fe-ada960be8da0', 'Azucar Moreno', '23/09/2022 15:00', 'Murcia', 'https://m.media-amazon.com/images/I/71I29e+DoTL._SL1050_.jpg'),
('8bf3400e-49a2-42a4-ac36-50ae698257d7', 'El fari', '25/03/2022 22:00', 'Almería', 'https://i.ytimg.com/vi/TtuSrljYOr4/hqdefault.jpg'),
('9ecc22c2-4d75-47e8-88ac-c5433efd56cd', 'La Polla Record', '07/08/2022 22:00', 'Fines', 'https://images.fanart.tv/fanart/polla-records-la-5eb67b35bab78.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conciertos`
--
ALTER TABLE `conciertos`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
