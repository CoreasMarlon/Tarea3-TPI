-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 10:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poblacion`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `idDepartamento` int(11) NOT NULL,
  `departamento` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`idDepartamento`, `departamento`) VALUES
(1, 'San Salvador'),
(2, 'San Miguel'),
(3, 'Santa Ana'),
(4, 'Usulután'),
(5, 'Morazán'),
(6, 'La Unión'),
(7, 'La Libertad'),
(8, 'Cabañas'),
(9, 'San Vicente'),
(10, 'Chalatenango'),
(11, 'La Paz'),
(12, 'Sonsonate'),
(13, 'Ahuachapán'),
(14, 'Cuscatlán');

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE `municipios` (
  `idMunicipio` int(11) NOT NULL,
  `municipio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `municipios`
--

INSERT INTO `municipios` (`idMunicipio`, `municipio`, `idDepartamento`) VALUES
(1, 'San Salvador', 1),
(2, 'Aguilares', 1),
(3, 'Apopa', 1),
(4, 'Ayutuxtepeque', 1),
(5, 'Cuscatancingo', 1),
(6, 'San Martin', 1),
(7, 'Cuscatancingo', 1),
(8, 'San Martin', 1),
(9, 'Mejicanos', 1),
(10, 'Soyapango', 1),
(11, 'San Miguel', 2),
(12, 'Carolina', 2),
(13, 'Chinameca', 2),
(14, 'Chirilagua', 2),
(15, 'Ciudad Barrios', 2),
(16, 'Comacarán', 2),
(17, 'Moncagua', 2),
(18, 'El tránsito', 2),
(19, 'Quelepa', 2),
(20, 'San Jorge', 2),
(21, 'El Congo', 3),
(22, 'Chalchuapa', 3),
(23, 'Candelaria de la Frontera', 3),
(24, 'Coatepeque', 3),
(25, 'Metapán', 3),
(26, 'Texistepeque', 3),
(27, 'Santa Ana', 3),
(28, 'Masahuat', 3),
(29, 'El Porvenir', 3),
(30, 'San Antonio Pajonal', 3),
(31, 'Alegría', 4),
(32, 'Berlín', 4),
(33, 'California', 4),
(34, 'Concepción Batres', 4),
(35, 'El Triunfo', 4),
(36, 'Ereguayquín', 4),
(37, 'Estanzuelas', 4),
(38, 'Jiquilisco', 4),
(39, 'Jucuapa', 4),
(40, 'Usulután', 4),
(41, 'Arambala', 5),
(42, 'Perquín', 5),
(43, 'Osicala', 5),
(44, 'Lolotiquillo', 5),
(45, 'Jocoro', 5),
(46, 'Jocoaitique', 5),
(47, 'El Divisadero', 5),
(48, 'El Rosario', 5),
(49, 'Cacaopera', 5),
(50, 'San Francisco Gotera', 5),
(51, 'Anamorós', 6),
(52, 'Bolívar', 6),
(53, 'Concepción de Oriente', 6),
(54, 'Conchagua', 6),
(55, 'El Carmen', 6),
(56, 'El Sauce', 6),
(57, 'Intipucá', 6),
(58, 'La Unión', 6),
(59, 'Lislique', 6),
(60, 'Pasaquina', 6),
(61, 'Antiguo Cuscatlán', 7),
(62, 'Quezaltepeque', 7),
(63, 'Ciudad Arce', 7),
(64, 'Colón', 7),
(65, 'Comasagua', 7),
(66, 'Huizúcar', 7),
(67, 'Jayaque', 7),
(68, 'Zaragoza', 7),
(69, 'La Libertad', 7),
(70, 'Santa Tecla', 7),
(71, 'Victoria', 8),
(72, 'Tejutepeque', 8),
(73, 'Sensuntepeque', 8),
(74, 'San Isidro', 8),
(75, 'Jutiapa', 8),
(76, 'Ilobasco', 8),
(77, 'Cinquera', 8),
(78, 'Dolores', 8),
(79, 'Guacotecti', 8),
(80, 'Verapaz', 9),
(81, 'Tecoluca', 9),
(82, 'Tepetitán', 9),
(83, 'Santo Domingo', 9),
(84, 'Santa Clara', 9),
(85, 'San Vicente', 9),
(86, 'San Sebastián', 9),
(87, 'San Ildefonso', 9),
(88, 'San Lorenzo', 9),
(89, 'Apastepeque', 9),
(90, 'Tejutla', 10),
(91, 'Santa Rita', 10),
(92, 'San Rafael', 10),
(93, 'Chalatenango', 10),
(94, 'San Ignacio', 10),
(95, 'San Francisco Lempa', 10),
(96, 'Nueva Trinidad', 10),
(97, 'Nueva Concepción', 10),
(98, 'Comalapa', 10),
(99, 'El Carrizal', 10),
(100, 'Zacatecoluca', 11),
(101, 'Santiago Nonualco', 11),
(102, 'Santa María Ostuma', 11),
(103, 'San Luis Talpa', 11),
(104, 'San Juan Tepezontes', 11),
(105, 'San Antonio Masahuat', 11),
(106, 'Olocuilta', 11),
(107, 'Jerusalén', 11),
(108, 'El Rosario', 11),
(109, 'Mercedes la Ceiba', 11),
(110, 'Sonzacate', 12),
(111, 'Sonsonate', 12),
(112, 'San Julián', 12),
(113, 'Nahuizalco', 12),
(114, 'San Antonio del Monte', 12),
(115, 'Armenia', 12),
(116, 'Salcoatitán', 12),
(117, 'Juayúa', 12),
(118, 'Izalco', 12),
(119, 'Acajutla', 12),
(120, 'Ahuachapán', 13),
(121, 'Turín', 13),
(122, 'Tacuba', 13),
(123, 'San Pedro Puxtla', 13),
(124, 'San Lorenzo', 13),
(125, 'Guaymango', 13),
(126, 'Concepción de Ataco', 13),
(127, 'Jujutla', 13),
(128, 'Apaneca', 13),
(129, 'Atiquizaya', 13),
(130, 'Tenancingo', 14),
(131, 'Suchitoto', 14),
(132, 'Santa Cruz Michapa', 14),
(133, 'San Ramón', 14),
(134, 'San Rafael Cedros', 14),
(135, 'San Pedro Perulapán', 14),
(136, 'San Cristóbal', 14),
(137, 'Cojutepeque', 14),
(138, 'Candelaria', 14),
(139, 'El Carmen', 14);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `nombreUsuario` text COLLATE utf8_spanish_ci NOT NULL,
  `rol` enum('Administrador','Moderador','Invitado') COLLATE utf8_spanish_ci NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `idMunicipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `nombreUsuario`, `rol`, `idDepartamento`, `idMunicipio`) VALUES
(10, 'Jose', 'Guzmán ', 'joseG', 'Moderador', 1, 32),
(11, 'Jose', 'Martinez', 'joseM', 'Moderador', 2, 11),
(12, 'Oscar', 'Lemus', 'oscarL', 'Invitado', 4, 39),
(13, 'Ivan', 'Romero', 'ivanR', 'Moderador', 4, 32),
(14, 'Marlon ', 'Coreas', 'marlonC', 'Administrador', 4, 37),
(15, 'Angel', 'Ruiz ', 'angelRuiz', 'Moderador', 2, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indexes for table `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`idMunicipio`),
  ADD KEY `departamento-municipio` (`idDepartamento`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `usuario-departamento` (`idDepartamento`),
  ADD KEY `usuario-municipio` (`idMunicipio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `municipios`
--
ALTER TABLE `municipios`
  MODIFY `idMunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `departamento-municipio` FOREIGN KEY (`idDepartamento`) REFERENCES `departamentos` (`idDepartamento`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario-departamento` FOREIGN KEY (`idDepartamento`) REFERENCES `departamentos` (`idDepartamento`),
  ADD CONSTRAINT `usuario-municipio` FOREIGN KEY (`idMunicipio`) REFERENCES `municipios` (`idMunicipio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
