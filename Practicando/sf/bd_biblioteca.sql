CREATE DATABASE IF NOT EXISTS `biblioteca`;
USE `biblioteca`;

CREATE TABLE `libros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `anio` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `libros` (`id`, `titulo`, `autor`, `editorial`, `anio`, `imagen`) VALUES
(1, 'Arquitectura de Computadoras', 'M. Morris Mano', 'Prentice Hall', 2007, 'arquitecturacomputadoras.jpg'),
(2, 'Big Data', 'Viktor Mayer-Schönberger', 'Turner', 2013, 'bigdata.jpg'),
(3, 'Curso de Android', 'Varios Autores', 'Anaya Multimedia', 2018, 'CursoAndroid.jpg'),
(4, 'Introducción a la Informática', 'George Beekman', 'Pearson', 2010, 'introduccioinformatica.jpg'),
(5, 'Scrum y XP desde las trincheras', 'Henrik Kniberg', 'lulu.com', 2007, 'ScrumIngenieriaSoftware.jpg');

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nivel`) VALUES
(1, 'admin', 'admin', 'administrador'),
(2, 'user', 'user', 'usuario');
