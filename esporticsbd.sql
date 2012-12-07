/*
SQLyog Trial v10.41 
MySQL - 5.5.27 : Database - esporticsbd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`esporticsbd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `esporticsbd`;

/*Table structure for table `amigo` */

DROP TABLE IF EXISTS `amigo`;

CREATE TABLE `amigo` (
  `id_propio` int(11) NOT NULL,
  `id_amigo` int(11) NOT NULL,
  `seguimiento_amigo` varchar(1) NOT NULL,
  PRIMARY KEY (`id_propio`,`id_amigo`),
  KEY `amigo_ibfk_2` (`id_amigo`),
  CONSTRAINT `amigo_ibfk_1` FOREIGN KEY (`id_propio`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `amigo_ibfk_2` FOREIGN KEY (`id_amigo`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `amigo` */

insert  into `amigo`(`id_propio`,`id_amigo`,`seguimiento_amigo`) values (1,2,''),(2,1,'');

/*Table structure for table `circuito` */

DROP TABLE IF EXISTS `circuito`;

CREATE TABLE `circuito` (
  `id_circuito` int(11) NOT NULL,
  `nombre_circuito` varchar(20) NOT NULL,
  `rankin_circuito` varchar(500) DEFAULT NULL,
  `id_patrocinador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_circuito`),
  UNIQUE KEY `id_torneo` (`id_patrocinador`),
  KEY `id_circuito` (`id_circuito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `circuito` */

insert  into `circuito`(`id_circuito`,`nombre_circuito`,`rankin_circuito`,`id_patrocinador`) values (1,'Circuito prueba','0',0);

/*Table structure for table `convocatoria` */

DROP TABLE IF EXISTS `convocatoria`;

CREATE TABLE `convocatoria` (
  `id_usuario_entrenador` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_entrenador`,`id_evento`,`id_usuario`),
  KEY `id_evento` (`id_evento`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `convocatoria_ibfk_1` FOREIGN KEY (`id_usuario_entrenador`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `convocatoria_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`),
  CONSTRAINT `convocatoria_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `convocatoria` */

/*Table structure for table `deporte` */

DROP TABLE IF EXISTS `deporte`;

CREATE TABLE `deporte` (
  `id_deporte` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_deporte` varchar(20) NOT NULL,
  PRIMARY KEY (`id_deporte`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `deporte` */

insert  into `deporte`(`id_deporte`,`nombre_deporte`) values (1,'Padel'),(2,'Tenis'),(3,'Futbol'),(4,'Baloncesto'),(5,'Balonmano'),(6,'Voleibol');

/*Table structure for table `deportes_practicados` */

DROP TABLE IF EXISTS `deportes_practicados`;

CREATE TABLE `deportes_practicados` (
  `id_usuario` int(11) NOT NULL,
  `id_deporte` int(11) NOT NULL,
  `nivel_deporte_practicado` varchar(20) DEFAULT NULL,
  `categoria_deporte_practicado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`id_deporte`),
  KEY `id_deporte` (`id_deporte`),
  CONSTRAINT `deportes_practicados_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `deportes_practicados_ibfk_2` FOREIGN KEY (`id_deporte`) REFERENCES `deporte` (`id_deporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `deportes_practicados` */

/*Table structure for table `entrenador` */

DROP TABLE IF EXISTS `entrenador`;

CREATE TABLE `entrenador` (
  `id_entrenador` int(11) NOT NULL,
  `id_jugador` int(11) NOT NULL,
  PRIMARY KEY (`id_entrenador`,`id_jugador`),
  KEY `entrenador_ibfk_1` (`id_jugador`),
  CONSTRAINT `entrenador_ibfk_1` FOREIGN KEY (`id_jugador`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `entrenador_ibfk_2` FOREIGN KEY (`id_entrenador`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `entrenador` */

/*Table structure for table `equipo` */

DROP TABLE IF EXISTS `equipo`;

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombre_equipo` varchar(20) NOT NULL,
  `id_jugadores` int(11) DEFAULT NULL,
  `id_creador` int(11) NOT NULL,
  `categoria_equipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `equipo_ibfk_1` (`id_jugadores`),
  CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_jugadores`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `equipo` */

/*Table structure for table `estadisticas` */

DROP TABLE IF EXISTS `estadisticas`;

CREATE TABLE `estadisticas` (
  `id_partida` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_deporte` int(11) NOT NULL,
  `estadistica1` varchar(30) DEFAULT NULL,
  `estadistica2` varchar(30) DEFAULT NULL,
  `estadistica3` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_partida`,`id_usuario`,`id_deporte`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_deporte` (`id_deporte`),
  CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`id_partida`) REFERENCES `partida` (`id_partida`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `estadisticas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `estadisticas_ibfk_3` FOREIGN KEY (`id_deporte`) REFERENCES `deporte` (`id_deporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `estadisticas` */

/*Table structure for table `evento` */

DROP TABLE IF EXISTS `evento`;

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `id_circuito` int(11) DEFAULT NULL,
  `id_torneo` int(11) DEFAULT NULL,
  `id_partida` int(11) DEFAULT NULL,
  `fecha_evento` datetime NOT NULL,
  `descripcion_evento` varchar(20) NOT NULL,
  PRIMARY KEY (`id_evento`),
  UNIQUE KEY `id_formato` (`id_circuito`),
  KEY `id_circuito` (`id_circuito`),
  KEY `id_torneo` (`id_torneo`),
  KEY `id_partida` (`id_partida`),
  CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_circuito`) REFERENCES `circuito` (`id_circuito`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evento_ibfk_3` FOREIGN KEY (`id_partida`) REFERENCES `partida` (`id_partida`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evento_ibfk_4` FOREIGN KEY (`id_torneo`) REFERENCES `torneo` (`id_torneo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `evento` */

/*Table structure for table `formato_torneo` */

DROP TABLE IF EXISTS `formato_torneo`;

CREATE TABLE `formato_torneo` (
  `id_formato` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_formato` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `patron_formato` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_formato`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `formato_torneo` */

insert  into `formato_torneo`(`id_formato`,`nombre_formato`,`patron_formato`) values (1,'Liga',NULL),(2,'Eliminatorio',NULL),(3,'Liga+Eliminatorio',NULL);

/*Table structure for table `inscripcion` */

DROP TABLE IF EXISTS `inscripcion`;

CREATE TABLE `inscripcion` (
  `id_torneo` int(11) NOT NULL,
  `id_jugador` int(11) NOT NULL,
  `estado_inscripcion` varchar(10) NOT NULL,
  `comentario_inscripcion` varchar(128) DEFAULT NULL,
  `pref_horario_inicio` time DEFAULT NULL,
  `pref_horario_fin` time DEFAULT NULL,
  PRIMARY KEY (`id_torneo`,`id_jugador`),
  KEY `inscripcion_ibfk_2` (`id_jugador`),
  CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`id_torneo`) REFERENCES `torneo` (`id_torneo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`id_jugador`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inscripcion` */

/*Table structure for table `mensaje` */

DROP TABLE IF EXISTS `mensaje`;

CREATE TABLE `mensaje` (
  `id_emisor` int(11) NOT NULL,
  `id_receptor` int(11) NOT NULL,
  `tipo_mensaje` varchar(10) NOT NULL,
  `texto_mensaje` varchar(128) NOT NULL,
  `fecha_mensaje` datetime NOT NULL,
  PRIMARY KEY (`id_emisor`,`id_receptor`),
  KEY `id_receptor` (`id_receptor`),
  CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`id_emisor`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`id_receptor`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mensaje` */

/*Table structure for table `organizador_circuito` */

DROP TABLE IF EXISTS `organizador_circuito`;

CREATE TABLE `organizador_circuito` (
  `id_usuario` int(11) NOT NULL,
  `id_circuito` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_circuito`),
  KEY `id_circuito` (`id_circuito`),
  CONSTRAINT `organizador_circuito_ibfk_1` FOREIGN KEY (`id_circuito`) REFERENCES `circuito` (`id_circuito`),
  CONSTRAINT `organizador_circuito_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `organizador_circuito` */

/*Table structure for table `organizador_torneo` */

DROP TABLE IF EXISTS `organizador_torneo`;

CREATE TABLE `organizador_torneo` (
  `id_usuario` int(11) NOT NULL,
  `id_torneo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_torneo`),
  KEY `id_torneo` (`id_torneo`),
  CONSTRAINT `organizador_torneo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `organizador_torneo_ibfk_2` FOREIGN KEY (`id_torneo`) REFERENCES `torneo` (`id_torneo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `organizador_torneo` */

/*Table structure for table `partida` */

DROP TABLE IF EXISTS `partida`;

CREATE TABLE `partida` (
  `id_partida` int(11) NOT NULL AUTO_INCREMENT,
  `id_jugador1` int(11) DEFAULT NULL,
  `id_jugador2` int(11) DEFAULT NULL,
  `fecha_partida` datetime DEFAULT NULL,
  `resultado_partida` varchar(20) DEFAULT NULL,
  `estadisticas_partida` varchar(20) DEFAULT NULL,
  `id_ganador` int(11) DEFAULT NULL,
  `id_equipo1` int(11) DEFAULT NULL,
  `id_equipo2` int(11) DEFAULT NULL,
  `id_torneo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_partida`),
  UNIQUE KEY `id_jugadores` (`id_jugador2`,`id_ganador`),
  KEY `id_torneo` (`id_torneo`),
  KEY `id_equipo1` (`id_equipo1`),
  KEY `id_equipo2` (`id_equipo2`),
  KEY `id_jugador1` (`id_jugador1`),
  CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`id_torneo`) REFERENCES `torneo` (`id_torneo`),
  CONSTRAINT `partida_ibfk_2` FOREIGN KEY (`id_equipo1`) REFERENCES `equipo` (`id_equipo`),
  CONSTRAINT `partida_ibfk_3` FOREIGN KEY (`id_equipo2`) REFERENCES `equipo` (`id_equipo`),
  CONSTRAINT `partida_ibfk_4` FOREIGN KEY (`id_jugador1`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `partida_ibfk_5` FOREIGN KEY (`id_jugador2`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `partida` */

/*Table structure for table `patrocinador` */

DROP TABLE IF EXISTS `patrocinador`;

CREATE TABLE `patrocinador` (
  `id_patrocinador` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `nombre_patrocinador` varchar(20) NOT NULL,
  `src_patrocinador` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_patrocinador`),
  UNIQUE KEY `id_evento` (`id_evento`),
  CONSTRAINT `patrocinador_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `patrocinador` */

/*Table structure for table `torneo` */

DROP TABLE IF EXISTS `torneo`;

CREATE TABLE `torneo` (
  `id_torneo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_torneo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `id_circuito` int(11) DEFAULT NULL,
  `ciudad_torneo` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `provincia_torneo` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `direccion_torneo` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `categoria_torneo` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `sexo_torneo` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `nivel_torneo` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `visibilidad_torneo` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `capacidad_torneo` int(11) NOT NULL,
  `edicion_torneo` int(11) DEFAULT NULL,
  `id_patrocinador` int(11) DEFAULT NULL,
  `id_organizador` int(11) NOT NULL,
  `resultado_torneo` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `clasificacion_torneo` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `id_deporte` int(11) NOT NULL,
  `fechahora_torneo` datetime DEFAULT NULL,
  `tipo_torneo` varchar(10) CHARACTER SET latin1 NOT NULL,
  `id_formato` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_torneo`),
  KEY `id_patrocinador` (`id_patrocinador`),
  KEY `id_organizador` (`id_organizador`),
  KEY `id_deporte` (`id_deporte`),
  KEY `id_circuito` (`id_circuito`),
  KEY `id_formato` (`id_formato`),
  CONSTRAINT `torneo_ibfk_3` FOREIGN KEY (`id_organizador`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `torneo_ibfk_5` FOREIGN KEY (`id_deporte`) REFERENCES `deporte` (`id_deporte`),
  CONSTRAINT `torneo_ibfk_6` FOREIGN KEY (`id_circuito`) REFERENCES `circuito` (`id_circuito`),
  CONSTRAINT `torneo_ibfk_7` FOREIGN KEY (`id_patrocinador`) REFERENCES `patrocinador` (`id_patrocinador`),
  CONSTRAINT `torneo_ibfk_8` FOREIGN KEY (`id_formato`) REFERENCES `formato_torneo` (`id_formato`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `torneo` */

insert  into `torneo`(`id_torneo`,`nombre_torneo`,`id_circuito`,`ciudad_torneo`,`provincia_torneo`,`direccion_torneo`,`categoria_torneo`,`sexo_torneo`,`nivel_torneo`,`visibilidad_torneo`,`capacidad_torneo`,`edicion_torneo`,`id_patrocinador`,`id_organizador`,`resultado_torneo`,`clasificacion_torneo`,`id_deporte`,`fechahora_torneo`,`tipo_torneo`,`id_formato`) values (3,'asdasda',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,NULL,NULL,1,NULL,NULL,1,NULL,'asdasd',NULL),(5,'Prueba2',NULL,'asdasd',NULL,NULL,NULL,NULL,NULL,NULL,12,NULL,NULL,1,NULL,NULL,1,NULL,'Tipos',3),(6,'Prueba2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,NULL,NULL,1,NULL,NULL,1,NULL,'Tipo12',NULL),(7,'Torneo',NULL,'Valencia','asda','asdasd','asdasd',NULL,NULL,NULL,12,NULL,NULL,1,NULL,NULL,1,'2012-12-07 12:00:00','Liga+Elimi',NULL);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(30) DEFAULT NULL,
  `email_usuario` varchar(30) NOT NULL,
  `password_usuario` varchar(20) NOT NULL,
  `edad_usuario` int(11) DEFAULT NULL,
  `sexo_usuario` varchar(10) DEFAULT NULL,
  `id_deporte` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  `nivel_usuario` int(11) DEFAULT NULL,
  `activacion` varchar(32) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_usuario` (`email_usuario`),
  KEY `id_deporte` (`id_deporte`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_deporte`) REFERENCES `deporte` (`id_deporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`nombre_usuario`,`email_usuario`,`password_usuario`,`edad_usuario`,`sexo_usuario`,`id_deporte`,`id_evento`,`tipo_usuario`,`nivel_usuario`,`activacion`) values (1,'Javi','javi@asd.com','asd',1,'H',NULL,NULL,'admin',0,'0'),(2,'Jesus','jesus@asd.com','asd',1,'M',NULL,NULL,NULL,NULL,'0'),(3,NULL,'prueba@prueba.com','4a9fd7b2c559137f164d',NULL,NULL,NULL,NULL,NULL,NULL,'0'),(4,NULL,'prueba1@prueba1.com','7815696ecbf1c96e6894',NULL,NULL,NULL,NULL,NULL,NULL,'0'),(16,NULL,'dj_inhox@hotmail.com','7815696ecbf1c96e6894',NULL,NULL,NULL,NULL,NULL,NULL,'0'),(17,NULL,'besori@gmail.com','7815696ecbf1c96e6894',NULL,NULL,NULL,NULL,NULL,NULL,'0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
