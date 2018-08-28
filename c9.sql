-- Adminer 4.4.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `conductores`;
CREATE TABLE `conductores` (
  `id_conductor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cuil` bigint(20) NOT NULL,
  `nro_licencia` bigint(20) NOT NULL,
  `nombre_titular` varchar(50) NOT NULL,
  `apellido_titular` varchar(50) NOT NULL,
  `dni_titular` bigint(20) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_conductor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `conductores` (`id_conductor`, `nombre`, `apellido`, `cuil`, `nro_licencia`, `nombre_titular`, `apellido_titular`, `dni_titular`, `estado`) VALUES
(1,	'Juan',	'Perez',	201234568789,	35123456,	'Juan',	'Perez',	35123456,	'activo'),
(2,	'Matias',	'Fernandez',	51864616,	1234865,	'Juan ',	'Fernandez',	12345687,	'suspendido'),
(3,	'Sebastian',	'Lopez',	3254853181,	40352838,	'Sebastian',	'Lopez',	5485318,	'inactivo'),
(4,	'Jorge',	'Perez',	25408794263,	38746876,	'',	'',	0,	'');

DROP TABLE IF EXISTS `conductor_vehiculo`;
CREATE TABLE `conductor_vehiculo` (
  `id_conductor_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_conductor` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  PRIMARY KEY (`id_conductor_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `conductor_vehiculo` (`id_conductor_vehiculo`, `id_conductor`, `id_vehiculo`) VALUES
(1,	1,	1),
(2,	2,	2),
(3,	3,	3),
(5,	4,	4),
(6,	4,	5);

DROP TABLE IF EXISTS `direcciones`;
CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(50) NOT NULL,
  `altura` int(11) NOT NULL,
  `departamento` varchar(5) DEFAULT NULL,
  `piso` tinyint(3) unsigned DEFAULT NULL,
  `cod_postal` int(10) unsigned DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `long` float DEFAULT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `direcciones` (`id_direccion`, `calle`, `altura`, `departamento`, `piso`, `cod_postal`, `lat`, `long`) VALUES
(1,	'Guanahani',	5645,	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	'Mateoti',	830,	NULL,	NULL,	NULL,	NULL,	NULL),
(3,	'Avellaneda',	1500,	NULL,	NULL,	NULL,	NULL,	NULL),
(4,	'Cordoba',	800,	NULL,	NULL,	NULL,	NULL,	NULL),
(5,	'Independencia',	520,	NULL,	NULL,	NULL,	NULL,	NULL),
(6,	'Independencia',	100,	NULL,	NULL,	NULL,	NULL,	NULL),
(7,	'Salta',	100,	NULL,	NULL,	NULL,	NULL,	NULL),
(8,	'Hernandarias',	5645,	NULL,	NULL,	NULL,	NULL,	NULL),
(9,	'Guemes',	2300,	NULL,	NULL,	NULL,	NULL,	NULL),
(10,	'Cordoba',	2300,	NULL,	NULL,	NULL,	NULL,	NULL),
(11,	'Matteoti',	5442,	NULL,	NULL,	NULL,	NULL,	NULL),
(12,	'Santa Fe',	234,	NULL,	NULL,	NULL,	NULL,	NULL),
(13,	'Juan B Justo',	5600,	NULL,	NULL,	NULL,	NULL,	NULL),
(14,	'Independencia',	1234,	NULL,	NULL,	NULL,	NULL,	NULL),
(15,	'Cordoba',	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(16,	'Cordoba',	1233,	NULL,	NULL,	NULL,	NULL,	NULL),
(17,	'Cordoba',	123,	NULL,	NULL,	NULL,	NULL,	NULL),
(18,	'Hernandarias',	1236,	NULL,	NULL,	NULL,	NULL,	NULL),
(19,	'Salta',	123,	NULL,	NULL,	NULL,	NULL,	NULL),
(20,	'Falucho',	2540,	NULL,	NULL,	NULL,	NULL,	NULL),
(21,	'Avellaneda',	3347,	NULL,	NULL,	NULL,	NULL,	NULL),
(22,	'Independencia',	200,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `direcciones_favoritas`;
CREATE TABLE `direcciones_favoritas` (
  `id_dir_fav` int(11) NOT NULL AUTO_INCREMENT,
  `id_direccion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_dir_fav`),
  KEY `id_direccion` (`id_direccion`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `direcciones_favoritas` (`id_dir_fav`, `id_direccion`, `id_usuario`) VALUES
(50,	5,	4),
(51,	6,	4),
(61,	21,	4);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL,
  `razon_social` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `celular` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `obs` int(11) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `creacion_cuenta` datetime NOT NULL,
  `ultimo_inicio` datetime NOT NULL,
  `id_direccion` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id_usuario`, `tipo`, `razon_social`, `nombres`, `apellido`, `email`, `telefono`, `celular`, `estado`, `fecha_registro`, `fecha_nacimiento`, `obs`, `contrasena`, `creacion_cuenta`, `ultimo_inicio`, `id_direccion`) VALUES
(4,	'cliente',	NULL,	'sebastian',	'canonaco',	'sebastiancanonaco@gmail.com',	'2235186203',	0,	0,	'0000-00-00 00:00:00',	'0000-00-00',	0,	'd3dce6c6e6a6ead5a9c6d568c42373ee',	'0000-00-00 00:00:00',	'2018-08-24 19:46:48',	0),
(7,	'empresa',	'PASO CARS',	NULL,	NULL,	'pasocars@gmail.com',	'2234619100',	0,	0,	'0000-00-00 00:00:00',	'0000-00-00',	0,	'ee54a005236bd42e368ded51960828ea',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	0),
(34,	'cliente',	NULL,	'Vanina',	'Perez',	'vaniperez144@gmail.com',	'112 802-686',	0,	0,	'0000-00-00 00:00:00',	'0000-00-00',	0,	'43a172fd367298c68e55c7987dc813d3',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	0),
(36,	'cliente',	NULL,	'Nicolas',	'',	'nicolas@gmail.com',	'223 123-4567',	0,	0,	'0000-00-00 00:00:00',	'0000-00-00',	0,	'd3dce6c6e6a6ead5a9c6d568c42373ee',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	0),
(37,	'cliente',	NULL,	'Matias',	'',	'matias@gmail.com',	'223 987-6543',	0,	0,	'0000-00-00 00:00:00',	'0000-00-00',	0,	'123456',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	0),
(38,	'cliente',	NULL,	'Sebastian Nicolas',	'Canonaco',	'sebastiancanonaco@hotmail.com',	'223 518-0325',	0,	0,	'2018-08-24 16:03:09',	'0000-00-00',	0,	'd3dce6c6e6a6ead5a9c6d568c42373ee',	'0000-00-00 00:00:00',	'2018-08-24 16:12:18',	0),
(39,	'cliente',	NULL,	'Sebastian',	'Canonaco',	'sebastiancanonaco@outlook.com',	'223 518-8888',	0,	0,	'2018-08-24 17:29:39',	'0000-00-00',	0,	'ff5e66b76340c5636aa40e7c6a46628f',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	0),
(40,	'cliente',	NULL,	'Sebastian',	'Canonaco',	'sebastiancanonaco@outlook.coms',	'223 111-1111',	0,	0,	'2018-08-24 17:31:07',	'0000-00-00',	0,	'ff5e66b76340c5636aa40e7c6a46628f',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	0),
(41,	'cliente',	NULL,	'SebastiÃ¡n',	'Canonaco',	'sebas@gmail.com',	'223 555-55',	0,	0,	'2018-08-24 19:01:39',	'0000-00-00',	0,	'd3dce6c6e6a6ead5a9c6d568c42373ee',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	0);

DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `patente` varchar(10) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` smallint(6) NOT NULL,
  `color` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `vehiculos` (`id_vehiculo`, `patente`, `marca`, `modelo`, `color`, `estado`) VALUES
(1,	'AB123CD',	'FIAT SIENA',	2010,	'VERDE OSCURO',	'habilitado'),
(2,	'MNO 123',	'CHEVROLET CORSA',	2010,	'GRIS',	''),
(3,	'AAC 256 ',	'VOLKSWAGEN POLO',	2016,	'NEGRO',	''),
(4,	'MMD 210',	'FIAT SIENA',	2014,	'ROJO',	''),
(5,	'NPS 025',	'CHEVROLET CORSA',	2015,	'NEGRO',	'');

DROP TABLE IF EXISTS `viajes`;
CREATE TABLE `viajes` (
  `id_viaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_conductor` int(11) DEFAULT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `id_origen` int(11) DEFAULT NULL,
  `id_destino` int(11) DEFAULT NULL,
  `precio_final` float DEFAULT NULL,
  `valoracion` smallint(5) unsigned DEFAULT NULL,
  `hora_pedido` datetime DEFAULT NULL,
  `hora_arribo` datetime DEFAULT NULL,
  `hora_llegada` datetime DEFAULT NULL,
  `cant_pasajeros` smallint(5) unsigned DEFAULT NULL,
  `descripcion` text,
  `estado` tinyint(3) unsigned DEFAULT NULL,
  `telefono` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_viaje`),
  KEY `id_origen` (`id_origen`),
  KEY `id_destino` (`id_destino`),
  KEY `id_conductor` (`id_conductor`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_vehiculo` (`id_vehiculo`),
  CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `viajes_ibfk_4` FOREIGN KEY (`id_conductor`) REFERENCES `conductores` (`id_conductor`),
  CONSTRAINT `viajes_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `viajes_ibfk_6` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `viajes` (`id_viaje`, `id_usuario`, `id_conductor`, `id_vehiculo`, `id_origen`, `id_destino`, `precio_final`, `valoracion`, `hora_pedido`, `hora_arribo`, `hora_llegada`, `cant_pasajeros`, `descripcion`, `estado`, `telefono`) VALUES
(25,	4,	NULL,	NULL,	22,	1,	NULL,	NULL,	'2018-08-24 10:38:45',	NULL,	NULL,	2,	NULL,	4,	'223 518-6203'),
(28,	4,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	'2018-08-24 11:02:30',	NULL,	NULL,	2,	NULL,	4,	'223 518-6203'),
(30,	4,	NULL,	NULL,	10,	NULL,	NULL,	NULL,	'2018-08-24 11:04:14',	NULL,	NULL,	3,	NULL,	4,	'223 518-6203');

-- 2018-08-28 01:29:57
