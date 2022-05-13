-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE `user` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `password` VARCHAR(80) NOT NULL,
  `xp` INT NOT NULL,
  `level` INT NOT NULL
);

 CREATE TABLE `bombed` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `lat` DECIMAL(7,5) NOT NULL,
  `lon` DECIMAL(7,6) NOT NULL,
  `date` DATE NOT NULL,
  `user_id` INT
  );

ALTER TABLE bombed
ADD FOREIGN KEY (user_id) REFERENCES user(id);

INSERT INTO `user` (`name`, `password`, `xp`, `level`) VALUES ('Johnny', 'userp', 0, 1);