-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 15 Juin 2014 à 01:37
-- Version du serveur: 5.5.29
-- Version de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `members`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `newpassword` varchar(50) NOT NULL,
  `repeatnewpassword` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `flickr` varchar(100) NOT NULL,
  `biography` text NOT NULL,
  `avatar` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `newpassword`, `repeatnewpassword`, `website`, `instagram`, `twitter`, `flickr`, `biography`, `avatar`) VALUES
(56, 'Steve', 'Jobs', 'steve@jobs.com', 'steve', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', 'www.apple.com', 'insta-apple', 'blackbird', '', 'Steven Paul Jobs was born on February 24, 1955 in San Francisco, California. His unwed biological parents, Joanne Schieble and Abdulfattah Jandali, put him up for adoption. Steve was adopted by Paul and Clara Jobs, a lower-middle-class couple, who moved to the suburban city of Mountain View a couple of years later.', '');
