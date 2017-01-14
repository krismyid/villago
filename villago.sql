-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `villago` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `villago`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `is_active`) VALUES
(1,	'Danila',	'd@ni.la',	'700c8b805a3e2a265b01c77614cd8b21',	0),
(3,	'Christian',	'krismyid@gmail.com',	'700c8b805a3e2a265b01c77614cd8b21',	0),
(4,	'Putri Anggra',	'putri@anggra.com',	'700c8b805a3e2a265b01c77614cd8b21',	0),
(5,	'eka',	'eka@gonrong.com',	'700c8b805a3e2a265b01c77614cd8b21',	0),
(6,	'icalajah',	'faisal.rahman@nusaraya.co.id',	'bccd4bf3585f95f8cec80aecb090f0b9',	0);

CREATE TABLE `villas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longtitude` double NOT NULL,
  `picture` varchar(128) NOT NULL DEFAULT 'iniloh.jpg',
  `address` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `villas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `villas` (`id`, `user_id`, `name`, `description`, `price`, `latitude`, `longtitude`, `picture`, `address`, `timestamp`) VALUES
(1,	3,	'Villa Mamang',	'Villa mamamg emang adem banget deh. asri. segaar',	800000,	-6.662514,	106.8839773,	'iniloh.jpg',	'Jl. Jend. Soedirman 21',	'2016-12-23 13:15:53'),
(4,	5,	'villa villi',	'dekat dengan pantai, dekat dengan cafe',	250000,	-8.670458199999999,	115.2126293,	'iniloh.jpg',	'Jl. Jend. Soedirman 21',	'2016-12-17 03:45:46'),
(5,	3,	'Villa Masa Gitu',	'villa yang seger, bebas. 08219319219.',	800000,	-6.2382699,	106.97557260000008,	'iniloh.jpg',	'Jalan Panda no. 32',	'2016-12-23 15:47:33');

-- 2017-01-13 23:37:31
