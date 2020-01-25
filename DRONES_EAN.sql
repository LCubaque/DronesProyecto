-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-04-2017 a las 13:04:58
-- Versión del servidor: 5.6.33-cll-lve
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `DRONES_EAN`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `D_CAMPOS`
--

CREATE TABLE IF NOT EXISTS `D_CAMPOS` (
  `nIdCampo` int(11) NOT NULL AUTO_INCREMENT,
  `cNomTabla` varchar(50) NOT NULL COMMENT 'Campo para identificar de que tabla viene',
  `cNomCampo` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Campo identificador para el nombre del campo',
  `cTipoDato` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'Identificador del dato',
  `nLongitud` int(4) NOT NULL COMMENT 'Longitud del campo',
  `cDesGeneral` varchar(100) CHARACTER SET latin1 NOT NULL COMMENT 'Descripción del campo',
  PRIMARY KEY (`nIdCampo`),
  KEY `FK_cNomTablaCampos_cNomTablaTablas` (`cNomTabla`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla Diccionario para almacenamiento de estructura de la base de datos' AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `D_CAMPOS`
--

INSERT INTO `D_CAMPOS` (`nIdCampo`, `cNomTabla`, `cNomCampo`, `cTipoDato`, `nLongitud`, `cDesGeneral`) VALUES
(1, 'D_CAMPOS', 'cNomTabla', 'c', 50, 'Nombre de la tabla'),
(2, 'D_CAMPOS', 'cTipoDato', 'c', 50, 'Tipo de dato'),
(3, 'D_CAMPOS', 'cNomcampo', 'c', 50, 'Nombre del campo'),
(4, 'D_CAMPOS', 'nLongitud', 'n', 2, 'Longitud del campo'),
(5, 'D_CAMPOS', 'cDesGeeneral', 'c', 100, 'Descripción del campo'),
(6, 'D_TABLAS', 'nIdTabla', 'n', 2, 'Identificador de la tabla'),
(7, 'D_TABLAS', 'cNomTabla', 'c', 50, 'Nombre de la tabla'),
(8, 'D_TABLAS', 'cTipoTabla', 'c', 100, 'Descripción general de la tabla'),
(9, 'D_INDICES', 'cNomTabla', 'c', 50, 'Nombre de la tabla correspondiente'),
(10, 'D_INDICES', 'cCamposLlave', 'c', 20, 'Campos llave de la tabla'),
(11, 'D_INDICES', 'cLlaveBd', 'c', 50, 'Llave de la BD Tabla'),
(12, 'D_INDICES', 'cTipoIndice', 'c', 50, 'Tipo de indice'),
(13, 'M_TIPOSPERFILES', 'nIdTipoPerfil', 'c', 2, 'Identificador tipo perfil'),
(14, 'M_TIPOSPERFILES', 'cDesPerfil', 'c', 100, 'Descripción del perfil '),
(15, 'M_TIPOSCARGOS', 'nIdTipoCargo', 'c', 2, 'Identificador del cargo'),
(16, 'M_TIPOSCARGOS', 'cDesCargo', 'c', 100, 'Descripción del tipo de cargo'),
(17, 'M_TIPOSCARGOS', 'nPrioridad', 'n', 2, 'Prioridad del cargo'),
(18, 'M_TERCEROS', 'cTipIdTercero', 'c', 10, 'Tipo de identificación de la persona'),
(19, 'M_TERCEROS', 'cNumIdTercero', 'c', 20, 'Numero de identificación de la persona'),
(20, 'M_TERCEROS', 'cNombre1', 'c', 20, 'Nombre 1 de la persona'),
(21, 'M_TERCEROS', 'cNombre2', 'c', 20, 'Nombre 2 de la persona'),
(22, 'M_TERCEROS', 'cApellido1', 'c', 20, 'Apellido 1 de  la persona'),
(23, 'M_TERCEROS', 'cApellido2', 'c', 20, 'Apellido 2 de la persona'),
(24, 'M_TERCEROS', 'nTienePerfil', 'n', 2, 'Tiene o no perfil'),
(25, 'M_TERCEROS', 'nIdTipoCargo', 'n', 2, 'Tipo de cargo'),
(26, 'M_TERCEROS', 'nIdTipoCargo', 'n', 2, 'Tipo de cargo'),
(27, 'M_TERCEROS', 'cUsuario', 'c', 20, 'Usuario para el sistema'),
(28, 'M_TERCEROS', 'cContrasena', 'c', 20, 'Contrasena para el usuario'),
(29, 'T_RESERVAS_ENCAB', 'nIdReserva', 'n', 2, 'Identificador de la reserva'),
(30, 'T_RESERVAS_ENCAB', 'dFechaInicio', 'd', 10, 'Fecha Inicio de la reserva'),
(31, 'T_RESERVAS_ENCAB', 'nHora', 'n', 10, 'Hora de la reserva'),
(32, 'T_RESERVAS_ENCAB', 'cTipIdVisitado', 'c', 3, 'Tipo de identificación del visitado'),
(33, 'T_RESERVAS_ENCAB', 'cNumIdVisitado', 'c', 10, 'Numero de identificación del visitado'),
(34, 'T_RESERVAS_DETALLE', 'nIdReserva', 'n', 2, 'Identificador de la reserva'),
(35, 'T_RESERVAS_DETALLE', 'cNomVisitante', 'c', 50, 'Nombre del visitante'),
(36, 'T_RESERVAS_DETALLE', 'nIdDron', 'n', 2, 'Dron asignado'),
(37, 'M_DRONES', 'nIdDron', 'n', 2, 'Identificador del dron'),
(38, 'M_DRONES', 'cDesDron', 'c', 100, 'Descripción del dron'),
(39, 'M_DRONES', 'cEstado', 'c', 10, 'Estado del Dron'),
(40, 'T_RESERVAS_ENCAB', 'cColor', 'c', 7, 'Color para la reserva'),
(41, 'T_RESERVAS_ENCAB', 'dFechaFin', 'd', 12, 'Fecha Final de la reserva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `D_INDICES`
--

CREATE TABLE IF NOT EXISTS `D_INDICES` (
  `nIdIndice` int(2) NOT NULL AUTO_INCREMENT,
  `cNomTabla` int(50) NOT NULL COMMENT 'Identificador origen a la tabla',
  `cCamposLlave` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Campos llave a la tabla FK o PK',
  `cLlaveBD` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Nombre de la llave en la BD',
  `cTipoIndice` varchar(11) CHARACTER SET latin1 NOT NULL COMMENT 'identificar si es PK O FK',
  PRIMARY KEY (`nIdIndice`),
  KEY `FK_cNomTablaIndice_cNomTablaTablas` (`cNomTabla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `D_TABLAS`
--

CREATE TABLE IF NOT EXISTS `D_TABLAS` (
  `nIdTabla` int(2) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `cNomTabla` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Nombre de la Tabla',
  `cTipoTabla` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Tipos de la tabla',
  `cDesGeneral` varchar(100) CHARACTER SET latin1 NOT NULL COMMENT 'Descripción general de la tabla',
  PRIMARY KEY (`nIdTabla`),
  KEY `cNomTabla` (`cNomTabla`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `D_TABLAS`
--

INSERT INTO `D_TABLAS` (`nIdTabla`, `cNomTabla`, `cTipoTabla`, `cDesGeneral`) VALUES
(1, 'D_TABLAS', 'D', 'TABLA DICCIONARIO PARA ALMACENAMIENTO DE LAS TABLAS DEL SISTEMA'),
(2, 'D_CAMPOS', 'D', 'TABLA DICCIONARIO PARA EL ALMACENAMIENTO DE CAMPOS EN EL SISTEMA'),
(3, 'D_INDICES', 'D', 'TABLA DICCIONARIO PARA EL ALMACENAMIENTO DE INDICES DE LA BD'),
(4, 'M_TIPOSPERFILES', 'M', 'TABLA MAESTRA PARA EL FUNCIONAMIENTO DEL SISTEMA'),
(5, 'M_TIPOSCARGOS', 'M', 'TABLA MAESTRA PARA EL FUNCIONAMIENTO DEL SISTEMA'),
(6, 'M_TERCERO', 'M', 'TABLA MAESTRA PARA EL FUNCIONAMIENTO DEL SISTEMA'),
(7, 'M_DRONES', 'M', 'TABLA MAESTRA PARA EL FUNCIONAMIENTO DEL SISTEMA'),
(8, 'T_RESERVAS_ENCAB', 'T', 'TABLA TRANSACCIONAL ENCAB DE LAS RESERVAS'),
(9, 'T_RESERVAS_DETALLE', 'T', 'TABLA TRANSACCIONAL DETALLE DE LAS RESERVAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `M_DRONES`
--

CREATE TABLE IF NOT EXISTS `M_DRONES` (
  `nIdDron` int(2) NOT NULL,
  `cDesDron` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cEstado` varchar(25) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`nIdDron`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `M_DRONES`
--

INSERT INTO `M_DRONES` (`nIdDron`, `cDesDron`, `cEstado`) VALUES
(1, 'Dron 1', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `M_TERCEROS`
--

CREATE TABLE IF NOT EXISTS `M_TERCEROS` (
  `cNumIdTercero` varchar(20) CHARACTER SET latin1 NOT NULL,
  `cNombre1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `cNombre2` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `cApellido1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `cApellido2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nTienePerfil` int(2) NOT NULL,
  `nIdTipoCargo` int(2) DEFAULT NULL,
  `nIdTipoPerfil` int(2) DEFAULT NULL,
  `cUsuario` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `cContrasena` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`cNumIdTercero`),
  KEY `nIdTipoCargo` (`nIdTipoCargo`),
  KEY `nIdTipoPerfil` (`nIdTipoPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `M_TERCEROS`
--

INSERT INTO `M_TERCEROS` (`cNumIdTercero`, `cNombre1`, `cNombre2`, `cApellido1`, `cApellido2`, `nTienePerfil`, `nIdTipoCargo`, `nIdTipoPerfil`, `cUsuario`, `cContrasena`) VALUES
('12345678910', 'Ruben', 'Darío', 'Gomez', 'Saldaña', 0, 1, NULL, NULL, NULL),
('21345678910', 'Luz', 'Marina', 'Sánchez', 'Ayala', 0, 2, NULL, NULL, NULL),
('31245678910', 'Alix', 'Erika', 'Rojas', 'Hernández', 0, 3, NULL, NULL, NULL),
('482', 'Sahara', NULL, 'Pedraza', 'Nuñez', 1, NULL, 4, 'spedraza', 'spedraza'),
('54321', 'Martín', 'Elías', 'Díaz', 'Acosta', 1, NULL, 1, 'Admin', 'Pass'),
('581', 'Leonardo', NULL, 'Rodríguez', 'Urrego', 1, NULL, 2, 'lrodriguez', 'lrodriguez'),
('613', 'Juan', NULL, 'Solano', 'Lozano', 1, NULL, 3, 'jsolano', 'jsolano'),
('937', 'Luis', 'Armando', 'Cobo', 'Campo', 1, NULL, 2, 'lcobo', 'lcobo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `M_TIPOSCARGOS`
--

CREATE TABLE IF NOT EXISTS `M_TIPOSCARGOS` (
  `nIdTipoCargo` int(2) NOT NULL,
  `cDesCargo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nPrioridad` int(3) NOT NULL,
  PRIMARY KEY (`nIdTipoCargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `M_TIPOSCARGOS`
--

INSERT INTO `M_TIPOSCARGOS` (`nIdTipoCargo`, `cDesCargo`, `nPrioridad`) VALUES
(1, 'Rector', 1),
(2, 'Decano', 2),
(3, 'Profesor', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `M_TIPOSPERFILES`
--

CREATE TABLE IF NOT EXISTS `M_TIPOSPERFILES` (
  `nIdTipoPerfil` int(2) NOT NULL,
  `cDesPerfil` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`nIdTipoPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `M_TIPOSPERFILES`
--

INSERT INTO `M_TIPOSPERFILES` (`nIdTipoPerfil`, `cDesPerfil`) VALUES
(1, 'Administrador'),
(2, 'Agendador'),
(3, 'Recepcion'),
(4, 'Practicante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `T_RESERVAS_ENCAB`
--

CREATE TABLE IF NOT EXISTS `T_RESERVAS_ENCAB` (
  `nIdReserva` int(2) NOT NULL AUTO_INCREMENT,
  `cNomVisitante` varchar(40) NOT NULL,
  `dFechaInicio` datetime NOT NULL,
  `dFechaFin` datetime NOT NULL,
  `cColor` varchar(7) CHARACTER SET latin1 NOT NULL,
  `cNumIdVisitado` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nIdDron` int(2) NOT NULL,
  `nTipoEstado` int(1) NOT NULL,
  `cEmpresa` varchar(80) DEFAULT NULL,
  `cLugarEncuentro` varchar(80) NOT NULL,
  `nIdTercero` int(2) NOT NULL,
  `nCancelado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nIdReserva`),
  KEY `cNumIdVisitado` (`cNumIdVisitado`),
  KEY `nIdDron` (`nIdDron`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `T_RESERVAS_ENCAB`
--

INSERT INTO `T_RESERVAS_ENCAB` (`nIdReserva`, `cNomVisitante`, `dFechaInicio`, `dFechaFin`, `cColor`, `cNumIdVisitado`, `nIdDron`, `nTipoEstado`, `cEmpresa`, `cLugarEncuentro`, `nIdTercero`, `nCancelado`) VALUES
(1, 'Lucas Cubaque', '2017-04-04 08:30:00', '2017-04-04 08:50:00', '#FF0000', '12345678910', 1, 0, 'Empresa', 'Oma', 581, 0),
(2, 'Nicolás Forero', '2017-04-05 12:00:00', '2017-04-05 12:20:00', '#0071c5', '31245678910', 1, 1, 'Empresa', 'Rectoría', 937, 0),
(19, 'Pablo Mármol', '2017-04-05 09:00:00', '2017-04-05 09:20:00', '#FF0000', '12345678910', 1, 0, '', 'Medio universitario', 581, 1),
(20, 'Andrea Vargas', '2017-04-20 10:10:00', '2017-04-20 10:30:00', '#0071c5', '12345678910', 1, 1, '', 'Facultad de Humanidades', 581, 0),
(21, 'Carlos Bernal', '2017-04-17 17:00:00', '2017-04-17 17:20:00', '#FF0000', '31245678910', 1, 0, '', 'Cafetería 6to piso', 581, 0),
(22, 'Juan Muñoz', '2017-04-26 11:00:00', '2017-04-26 11:20:00', '#FF0000', '12345678910', 1, 1, '', 'Auditorio Fundadores', 937, 0),
(23, 'César Zavala', '2017-04-10 13:00:00', '2017-04-10 13:20:00', '#0071c5', '31245678910', 1, 0, '', 'Parqueadero', 937, 0),
(26, 'Prueba Prueba', '2017-04-17 17:21:00', '2017-04-17 17:41:00', '#FF0000', '31245678910', 1, 0, 'Prueba', 'Prueba', 581, 1),
(27, 'Carlos Bernal', '2017-04-12 00:00:00', '2017-04-12 00:20:00', '#FF0000', '31245678910', 1, 1, 'Accenture', 'Vicerrectoría', 581, 0),
(28, 'Jhonny Sé', '2017-04-19 09:00:00', '2017-04-19 09:20:00', '#0071c5', '12345678910', 1, 0, 'EAN', 'Oma', 581, 0),
(29, 'Bill Gates', '2017-04-08 11:30:00', '2017-04-08 11:50:00', '#0071c5', '12345678910', 1, 1, 'Microsoft', 'Medio universitario', 937, 0),
(30, 'María Rodríguez', '2017-04-25 08:00:00', '2017-04-25 08:20:00', '#FF0000', '31245678910', 1, 0, 'Ministerio de TIC', 'Auditorio Fundadores', 581, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `M_TERCEROS`
--
ALTER TABLE `M_TERCEROS`
  ADD CONSTRAINT `FK_M_TERCEROS_MTIPOSCARGOS` FOREIGN KEY (`nIdTipoCargo`) REFERENCES `M_TIPOSCARGOS` (`nIdTipoCargo`),
  ADD CONSTRAINT `FK_M_TERCEROS_M_TIPOSPERFILES` FOREIGN KEY (`nIdTipoPerfil`) REFERENCES `M_TIPOSPERFILES` (`nIdTipoPerfil`);

--
-- Filtros para la tabla `T_RESERVAS_ENCAB`
--
ALTER TABLE `T_RESERVAS_ENCAB`
  ADD CONSTRAINT `FK_T_RESERVAS_ENCAB_M_DRONES` FOREIGN KEY (`nIdDron`) REFERENCES `M_DRONES` (`nIdDron`),
  ADD CONSTRAINT `FK_T_RESERVAS_ENCAB_M_TERCEROS_CNUM` FOREIGN KEY (`cNumIdVisitado`) REFERENCES `M_TERCEROS` (`cNumIdTercero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
