-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2017 at 12:30 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giwepp_pf`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `id_cuenta` int(11) NOT NULL,
  `id_dueño` int(11) NOT NULL,
  `c_correo` char(35) NOT NULL,
  `c_usuario` char(35) NOT NULL,
  `c_password` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `id_dueño`, `c_correo`, `c_usuario`, `c_password`) VALUES
(1000, 1000, 'Rooneytodd@hotmail.com', 'rooney', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(1001, 1001, 'richard@hotmail.com', 'ricardo','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(1002, 1002, 'chaba_herrera@hotmail.com', 'chaba', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(1003, 1003, 'lupita_tovar@hotmail.com', 'lupita','40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `u_nombre` char(26) NOT NULL,
  `u_ape_pat` char(22) NOT NULL,
  `u_ape_mat` char(22) NOT NULL,
  `u_fecha_nac` date NOT NULL,
  `u_activo` tinyint(4) NOT NULL,
  `u_fecha_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`id_persona`, `u_nombre`, `u_ape_pat`, `u_ape_mat`, `u_fecha_nac`, `u_activo`, `u_fecha_reg`) VALUES
(1000, 'Luis Fernando', 'Ramirez', 'Borboa', '0000-00-00', 1, '2017-01-12 23:02:43'),
(1001, 'Ricardo', 'Flores', 'Rodriguez', '0000-00-00', 1, '2017-01-12 23:03:20'),
(1002, 'Salvador', 'Herrera', 'Velasquez', '0000-00-00', 1, '2017-01-12 23:03:20'),
(1003, 'Lupita Guadalupe', 'Tovar', 'Oñate', '0000-00-00', 1, '2017-01-12 23:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `ro_nombre` char(26) NOT NULL,
  `ro_descripcion` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `telefonos`
--

CREATE TABLE `telefonos` (
  `id_telefono` int(11) NOT NULL,
  `id_dueño_tel` int(11) NOT NULL,
  `numero_tel` char(14) NOT NULL,
  `tipo_tel` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD KEY `id_dueño` (`id_dueño`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indexes for table `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id_telefono`),
  ADD KEY `id_dueño_tel` (`id_dueño_tel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;
--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id_telefono` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`id_dueño`) REFERENCES `personas` (`id_persona`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Constraints for table `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `telefonos_ibfk_1` FOREIGN KEY (`id_dueño_tel`) REFERENCES `personas` (`id_persona`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;