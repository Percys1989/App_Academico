/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 8.0.33 : Database - estudia4_31
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`estudia4_31` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `estudia4_31`;

/*Table structure for table `tbl_estudiantes` */

DROP TABLE IF EXISTS `tbl_estudiantes`;

CREATE TABLE `tbl_estudiantes` (
  `fld_id` varchar(20) DEFAULT NULL,
  `fld_nombre` varchar(30) DEFAULT NULL,
  `fld_apellido` varchar(30) DEFAULT NULL,
  `fld_fecnad` date DEFAULT NULL,
  `fld_direccion` varchar(60) DEFAULT NULL,
  `fld_ciures` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_telfijo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_celular` varchar(10) DEFAULT NULL,
  `fld_email` varchar(100) DEFAULT NULL,
  `fld_consecutivo` int NOT NULL AUTO_INCREMENT,
  KEY `fld_consecutivo` (`fld_consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_estudiantes` */

insert  into `tbl_estudiantes`(`fld_id`,`fld_nombre`,`fld_apellido`,`fld_fecnad`,`fld_direccion`,`fld_ciures`,`fld_telfijo`,`fld_celular`,`fld_email`,`fld_consecutivo`) values 
('1140816987','Bryan Jose','Percy','1989-03-25','Calle 61 No 27 102','Barranquilla','6053698521','3008940022','bryanpercyrico@gmail.com',1),
('22511820','viviana ','viñas','1982-03-26','call 61 27 -102','Barranquilla','6053698745','3014006699','videviro@gmail.com',3);

/*Table structure for table `tbl_materias` */

DROP TABLE IF EXISTS `tbl_materias`;

CREATE TABLE `tbl_materias` (
  `fld_codigo` varchar(10) DEFAULT NULL,
  `fld_nombre` varchar(30) DEFAULT NULL,
  `fld_programa` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_tipo_materia` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_consecutivo` int NOT NULL AUTO_INCREMENT,
  KEY `fld_consecutivo` (`fld_consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_materias` */

insert  into `tbl_materias`(`fld_codigo`,`fld_nombre`,`fld_programa`,`fld_tipo_materia`,`fld_consecutivo`) values 
('316','sistemas operativos','tecnico informatica','teorica',3),
('316','base de datos','sistemas','practica',4);

/*Table structure for table `tbl_notas` */

DROP TABLE IF EXISTS `tbl_notas`;

CREATE TABLE `tbl_notas` (
  `fld_codestu` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_nomest` varchar(30) DEFAULT NULL,
  `fld_apeest` varchar(30) DEFAULT NULL,
  `fld_materia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_tipomat` varchar(10) DEFAULT NULL,
  `fld_valor` double(5,2) DEFAULT NULL,
  `fld_consecutivo` int NOT NULL AUTO_INCREMENT,
  KEY `fld_consecutivo` (`fld_consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_notas` */

insert  into `tbl_notas`(`fld_codestu`,`fld_nomest`,`fld_apeest`,`fld_materia`,`fld_tipomat`,`fld_valor`,`fld_consecutivo`) values 
('321456','Bryan Jose','Percy Rico','Sistemas Operativos','Teoria',5.00,1),
('321455','antonio jose','perez moreno','Sistemas Operativos','Teoria',5.00,2);

/*Table structure for table `tbl_profesores` */

DROP TABLE IF EXISTS `tbl_profesores`;

CREATE TABLE `tbl_profesores` (
  `fld_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_apellido` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_direccion` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_celular` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_fecnac` date DEFAULT NULL,
  `fld_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_ciures` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_profesion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_experiencia` int DEFAULT NULL,
  `fld_genero` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fld_consecutivo` int NOT NULL AUTO_INCREMENT,
  KEY `fld_consecutivo` (`fld_consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

/*Data for the table `tbl_profesores` */

insert  into `tbl_profesores`(`fld_id`,`fld_nombre`,`fld_apellido`,`fld_direccion`,`fld_celular`,`fld_fecnac`,`fld_email`,`fld_ciures`,`fld_profesion`,`fld_experiencia`,`fld_genero`,`fld_consecutivo`) values 
('1140819798','bryan jose','Percy rico','Calle 61 No 46-60','3014003101','1989-01-25','bryanpercyrico@outlook.com','barranquilla','backend',7,'masculino',1);

/*Table structure for table `tbl_prog_academico` */

DROP TABLE IF EXISTS `tbl_prog_academico`;

CREATE TABLE `tbl_prog_academico` (
  `fld_cod` varchar(10) DEFAULT NULL,
  `fld_nombre` varchar(30) DEFAULT NULL,
  `fld_duracion` varchar(4) DEFAULT NULL,
  `fld_fecinicio` date DEFAULT NULL,
  `fld_modalidad` varchar(30) DEFAULT NULL,
  `fld_consecutivo` int NOT NULL AUTO_INCREMENT,
  KEY `fld_consecutivo` (`fld_consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_prog_academico` */

insert  into `tbl_prog_academico`(`fld_cod`,`fld_nombre`,`fld_duracion`,`fld_fecinicio`,`fld_modalidad`,`fld_consecutivo`) values 
('365','veterinaria','800','2023-02-01','presencial',1),
('361','cocina','600','2023-02-01','presencial',2),
('360','secretariado','600','2023-02-01','presencial',3);

/*Table structure for table `tbl_recursos_ped` */

DROP TABLE IF EXISTS `tbl_recursos_ped`;

CREATE TABLE `tbl_recursos_ped` (
  `fld_cod` varchar(10) DEFAULT NULL,
  `fld_nombre` varchar(30) DEFAULT NULL,
  `fld_tipo` varchar(20) DEFAULT NULL,
  `fld_consecutivo` int NOT NULL AUTO_INCREMENT,
  KEY `fld_consecutivo` (`fld_consecutivo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_recursos_ped` */

insert  into `tbl_recursos_ped`(`fld_cod`,`fld_nombre`,`fld_tipo`,`fld_consecutivo`) values 
('111','silla','madera',1),
('112','silla','plastica',2),
('113','mesa','madera',3);

/*Table structure for table `tbl_usuarios` */

DROP TABLE IF EXISTS `tbl_usuarios`;

CREATE TABLE `tbl_usuarios` (
  `fld_usuario` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fld_nombre` varchar(60) DEFAULT NULL,
  `fld_clave` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fld_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbl_usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
