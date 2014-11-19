# ************************************************************
# SQL para generar base de datos del proyecto Gina's Coffee
# Version 1.0
#
# Creado por: Axel Cureño Basurto
# http://axelcureno.com
#
# 
# Tabla: ginascoffee
# Creado el: 2014-11-19 03:05:03
# ************************************************************

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL DEFAULT '',
  `apellidos` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `password` varchar(500) NOT NULL DEFAULT '',
  `universidad` varchar(100) DEFAULT '',
  `validado` tinyint(1) NOT NULL DEFAULT '0',
  `sexo` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `colonia` varchar(200) DEFAULT NULL,
  `codigopostal` int(11) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;