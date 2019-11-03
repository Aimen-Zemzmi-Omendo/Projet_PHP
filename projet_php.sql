-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 03 nov. 2019 à 22:49
-- Version du serveur :  5.7.23
-- Version de PHP :  7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `name`) VALUES
(1, 'Informatique'),
(2, 'Vetement'),
(5, 'Produit Menager'),
(7, 'AUTRES');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `comment` text,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPost` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `post_id`) VALUES
(8, 'tes', 'test', 14),
(9, 'test', 'test', 18),
(10, 'sss', 'ss', 14);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_posting` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategory` (`idCategory`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `img_posting`, `title`, `author`, `content`, `idCategory`, `idUser`) VALUES
(14, 'img/118703a2be00f92ce5a67e70fbae7e73.jpg', 'Article 2', 'admin', '<p><span style=\"color: #222222; font-family: sans-serif;\">Un&nbsp;</span><strong style=\"color: #222222; font-family: sans-serif;\">texte</strong><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;est une s&eacute;rie orale ou &eacute;crite de mots per&ccedil;us comme constituant un ensemble coh&eacute;rent, porteur de sens et utilisant les structures propres &agrave; une&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Langue\" href=\"https://fr.wikipedia.org/wiki/Langue\">langue</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;(conjugaisons, construction et association des phrases&hellip;)</span><span id=\"cite_ref-1\" class=\"reference\" style=\"line-height: 1; vertical-align: text-top; position: relative; font-size: 0.8em; top: -5px; padding-left: 1px; unicode-bidi: isolate; white-space: nowrap; color: #222222; font-family: sans-serif;\"><a style=\"text-decoration-line: none; color: #0b0080; background: none;\" href=\"https://fr.wikipedia.org/wiki/Texte#cite_note-1\">1</a></span><span style=\"color: #222222; font-family: sans-serif;\">. Un texte n\'a pas de longueur d&eacute;termin&eacute;e sauf dans le cas de&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Po&egrave;me\" href=\"https://fr.wikipedia.org/wiki/Po%C3%A8me\">po&egrave;mes</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;&agrave; forme fixe comme le&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Sonnet\" href=\"https://fr.wikipedia.org/wiki/Sonnet\">sonnet</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;ou le&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Ha&iuml;ku\" href=\"https://fr.wikipedia.org/wiki/Ha%C3%AFku\">ha&iuml;ku</a><span style=\"color: #222222; font-family: sans-serif;\">.</span></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -218px; top: -12.4px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 2, NULL),
(15, 'img/Loupe-0G1.gif', 'Article 1', 'admin', '<p><span style=\"color: #222222; font-family: sans-serif;\">Un&nbsp;</span><strong style=\"color: #222222; font-family: sans-serif;\">texte</strong><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;est une s&eacute;rie orale ou &eacute;crite de mots per&ccedil;us comme constituant un ensemble coh&eacute;rent, porteur de sens et utilisant les structures propres &agrave; une&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Langue\" href=\"https://fr.wikipedia.org/wiki/Langue\">langue</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;(conjugaisons, construction et association des phrases&hellip;)</span><span id=\"cite_ref-1\" class=\"reference\" style=\"line-height: 1; vertical-align: text-top; position: relative; font-size: 0.8em; top: -5px; padding-left: 1px; unicode-bidi: isolate; white-space: nowrap; color: #222222; font-family: sans-serif;\"><a style=\"text-decoration-line: none; color: #0b0080; background: none;\" href=\"https://fr.wikipedia.org/wiki/Texte#cite_note-1\">1</a></span><span style=\"color: #222222; font-family: sans-serif;\">. Un texte n\'a pas de longueur d&eacute;termin&eacute;e sauf dans le cas de&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Po&egrave;me\" href=\"https://fr.wikipedia.org/wiki/Po%C3%A8me\">po&egrave;mes</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;&agrave; forme fixe comme le&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Sonnet\" href=\"https://fr.wikipedia.org/wiki/Sonnet\">sonnet</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;ou le&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Ha&iuml;ku\" href=\"https://fr.wikipedia.org/wiki/Ha%C3%AFku\">ha&iuml;ku</a><span style=\"color: #222222; font-family: sans-serif;\">.</span></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -218px; top: -12.4px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 1, NULL),
(16, 'img/photo-1562863551.jpg', 'Article 3', 'admin', '<p><span style=\"color: #222222; font-family: sans-serif;\">Un&nbsp;</span><strong style=\"color: #222222; font-family: sans-serif;\">texte</strong><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;est une s&eacute;rie orale ou &eacute;crite de mots per&ccedil;us comme constituant un ensemble coh&eacute;rent, porteur de sens et utilisant les structures propres &agrave; une&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Langue\" href=\"https://fr.wikipedia.org/wiki/Langue\">langue</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;(conjugaisons, construction et association des phrases&hellip;)</span><span id=\"cite_ref-1\" class=\"reference\" style=\"line-height: 1; vertical-align: text-top; position: relative; font-size: 0.8em; top: -5px; padding-left: 1px; unicode-bidi: isolate; white-space: nowrap; color: #222222; font-family: sans-serif;\"><a style=\"text-decoration-line: none; color: #0b0080; background: none;\" href=\"https://fr.wikipedia.org/wiki/Texte#cite_note-1\">1</a></span><span style=\"color: #222222; font-family: sans-serif;\">. Un texte n\'a pas de longueur d&eacute;termin&eacute;e sauf dans le cas de&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Po&egrave;me\" href=\"https://fr.wikipedia.org/wiki/Po%C3%A8me\">po&egrave;mes</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;&agrave; forme fixe comme le&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Sonnet\" href=\"https://fr.wikipedia.org/wiki/Sonnet\">sonnet</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;ou le&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Ha&iuml;ku\" href=\"https://fr.wikipedia.org/wiki/Ha%C3%AFku\">ha&iuml;ku</a><span style=\"color: #222222; font-family: sans-serif;\">.</span></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -200px; top: -12.4px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 5, NULL),
(17, 'img/Narutos_selfie_344_3543114b.jpg', 'Article 4', 'admin', '<p><span style=\"color: #222222; font-family: sans-serif;\">Un&nbsp;</span><strong style=\"color: #222222; font-family: sans-serif;\">texte</strong><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;est une s&eacute;rie orale ou &eacute;crite de mots per&ccedil;us comme constituant un ensemble coh&eacute;rent, porteur de sens et utilisant les structures propres &agrave; une&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Langue\" href=\"https://fr.wikipedia.org/wiki/Langue\">langue</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;(conjugaisons, construction et association des phrases&hellip;)</span><span id=\"cite_ref-1\" class=\"reference\" style=\"line-height: 1; vertical-align: text-top; position: relative; font-size: 0.8em; top: -5px; padding-left: 1px; unicode-bidi: isolate; white-space: nowrap; color: #222222; font-family: sans-serif;\"><a style=\"text-decoration-line: none; color: #0b0080; background: none;\" href=\"https://fr.wikipedia.org/wiki/Texte#cite_note-1\">1</a></span><span style=\"color: #222222; font-family: sans-serif;\">. Un texte n\'a pas de longueur d&eacute;termin&eacute;e sauf dans le cas de&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Po&egrave;me\" href=\"https://fr.wikipedia.org/wiki/Po%C3%A8me\">po&egrave;mes</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;&agrave; forme fixe comme le&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Sonnet\" href=\"https://fr.wikipedia.org/wiki/Sonnet\">sonnet</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;ou le&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Ha&iuml;ku\" href=\"https://fr.wikipedia.org/wiki/Ha%C3%AFku\">ha&iuml;ku</a><span style=\"color: #222222; font-family: sans-serif;\">.</span></p>', 7, NULL),
(18, 'img/ninja-simple-512.png', 'test', 'admin', '<p>test</p>', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mail`) VALUES
(6, 'admin', '$2y$10$aPA318/0gg12j5Pe6Wd2GeGOICzSKhmuxdHtuVArmRBkzq4qFIEAy', 'admin@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id_cat`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
