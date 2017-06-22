CREATE TABLE `mod49_gym_buzon` (
  `id` int(11) NOT NULL auto_increment,
  `mensaje` text,
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `mod49_gym_cliente` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) default NULL,
  `nombre` varchar(255) default NULL,
  `cedula` varchar(255) default NULL,
  `telefono` varchar(100) default NULL,
  `celular` varchar(100) default NULL,
  `anos` varchar(20) default NULL,
  `fechaNacimiento` date default NULL,
  `foto` longblob,
  `pesoActual` varchar(100) default NULL,
  `estaturaActual` varchar(100) default NULL,
  `responsable` varchar(255) default '',
  `celResponsable` varchar(100) default NULL,
  `parentesco` varchar(100) default NULL,
  `activo` varchar(200) default NULL,
  `colorLista` varchar(50) default NULL,
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `mod49_gym_encuesta` (
  `id` int(11) NOT NULL auto_increment,
  `pregunta` varchar(255) default NULL,
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8

CREATE TABLE `mod49_gym_encuesta_res` (
  `id` int(11) NOT NULL auto_increment,
  `idCliente` int(11) default NULL,
  `pregunta` varchar(255) default NULL,
  `respuesta` varchar(100) default NULL,
  `respuesta_abierta` text,
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `mod49_gym_gastos` (
  `id` int(11) NOT NULL auto_increment,
  `motivo` text,
  `precio` decimal(10,0) default NULL,
  `fechaGasto` date default NULL,
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `mod49_gym_instructores` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) default NULL,
  `nombre` varchar(255) default NULL,
  `celular` varchar(100) default NULL,
  `foto` longblob,
  `clave` varchar(255) default NULL,
  `activo` enum('S','N') default 'N',
  `tipo` varchar(255) default NULL,
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `mod49_gym_promociones` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) default NULL,
  `precio` decimal(10,0) default NULL,
  `diasDuracion` int(11) default NULL,
  `activo` enum('S','N') default 'N',
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `mod49_gym_promociones_usuario` (
  `id` int(11) NOT NULL auto_increment,
  `idPromocion` int(11) default NULL,
  `idUsuario` int(11) default NULL,
  `fechaInicio` date default NULL,
  `fechaFin` date default NULL,
  `pago` decimal(10,0) default NULL,
  `activo` enum('S','N') default 'S',
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `mod49_gym_rutinas` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) default NULL,
  `queTrabaja` text,
  `repeticiones` int(11) default NULL,
  `cantidadPorRepeticion` int(11) default NULL,
  `activa` enum('S','N') default 'N',
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



CREATE TABLE `mod49_gym_rutinas_usuario` (
  `id` int(11) NOT NULL auto_increment,
  `idRutina` int(11) default NULL,
  `idUsuario` int(11) default NULL,
  `queTrabaja` varchar(255) default NULL,
  `repeticiones` int(11) default NULL,
  `cantidadPorRepeticion` int(11) default NULL,
  `diasQueTrabaja` varchar(255) default NULL,
  `fechaInicio` date default NULL,
  `fechaFin` date default NULL,
  `activa` enum('S','N') default 'N',
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `mod49_gym_usuario` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(255) default NULL,
  `clave` varchar(255) default NULL,
  `activo` enum('S','N') default 'N',
  `tipo` varchar(255) default NULL,
  `fecha` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;