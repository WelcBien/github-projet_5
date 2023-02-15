-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 13 fév. 2023 à 11:48
-- Version du serveur : 5.7.24
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_5`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` longtext,
  `comment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `valide` tinyint(4) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `comment_date`, `valide`, `users_id`, `posts_id`) VALUES
(3, 'Le MySQL, système de base de données', '2023-02-01 17:33:11', 1, 1, 2),
(5, 'Test user', '2023-02-07 11:14:58', 1, 1, 2),
(6, 'ça marche', '2023-02-13 10:41:59', 1, 1, 3),
(7, 'Demande de renseignement', '2023-02-13 11:01:47', 1, 1, 3),
(8, 'Merci pour le retour', '2023-02-13 11:06:23', 1, 2, 3),
(9, 'Précision sur PHP sur MySQL !', '2023-02-13 11:12:11', 1, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `lastname`, `firstname`, `email`, `msg`, `date`) VALUES
(1, 'Dupont', 'Fred', 'exemple@mail.com', 'Enfin, ça marche !!!', '2022-12-15 17:59:06'),
(2, 'Sévère', 'Très', 'severe@mail.com', 'Il est temps que ça finisse !!!', '2022-12-16 17:30:16'),
(3, 'PHP', 'Langage', 'php@mail.com', 'Back-end', '2022-12-19 16:49:13'),
(7, 'Admin', 'admin', 'admin@mail.com', 'Coucou', '2023-02-02 19:11:49');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(70) DEFAULT NULL,
  `chapo` text,
  `content` longtext,
  `author` varchar(100) NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `chapo`, `content`, `author`, `creation_date`, `users_id`) VALUES
(2, 'MySQL', 'Est un système de gestion de bases de données relationnelles.', 'MySQL est un language de base de données qui permets d’entreposer, d’organiser, trier et structurer des données. Toutes ces opérations permettent, par exemple, de gérer un catalogue avec des milliers d’items et d’offrir la possibilitié de les voir en ordre alphabétiques, de prix, de popularité, etc.\r\nIl y a des alternatives à ces deux langages mais ceux-ci sont les plus rapides et les plus populaires, tout en étant gratuits et open source. Ils sont le choix par défaut de la combinaison Unix/Linux/Apache.. mais ils sont aussi offerts sur Windows. On peut réaliser à peu près n’importe quel produit en ligne en combinant ces deux langages, la seule limite étant le temps, le budget et les connaissances du programmeur. performances élevées en lecture, ce qui signifie qu\'il est davantage orienté vers le service de données déjà en place que vers celui de mises à jour fréquentes et fortement sécurisées.\r\nC\'est un logiciel libre, open source, développé sous double licence selon qu\'il est distribué avec un produit libre ou avec un produit propriétaire. Dans ce dernier cas, la licence est payante, sinon c\'est la licence publique générale GNU (GPL) qui s\'applique. Un logiciel qui intègre du code MySQL ou intègre MySQL lors de son installation devra donc être libre ou acquérir une licence payante.', 'Welc', '2023-02-01 16:04:57', 1),
(3, 'PHP', 'Langage', 'Open', 'Welc', '2023-02-13 10:41:22', 1),
(4, 'PHP et MySQL', 'Open Source', 'Back-end', 'Welc', '2023-02-13 11:23:43', 1),
(5, 'HTML', 'Fondation', 'Navigateur', 'Welc', '2023-02-13 11:40:18', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `firstname`, `lastname`, `email`, `password`, `date`, `admin`) VALUES
(1, 'Admin', 'Blood', 'Sport', 'admin@mail.com', '$2y$10$Ac9037KK3Q5fZo/iKxCCseDAvCO8VGZHujKSBXCtTGoxNr9mkPLJm', '2023-01-10 16:29:32', 1),
(2, 'user', 'Dupont', 'Pierre', 'dupont.pierre@exmple.fr', '$2y$10$.MrtGYfHetdOW2oDk1eQyuDRvI7Zn/Zl2x7MHO.BOfAKcFXHktAAe', '2023-01-30 14:53:26', NULL),
(3, 'User1', 'Pipo', 'Philippe', 'pipo@exemple.com', '$2y$10$nqIOo5Oy9IzYYNHalMtYLu8U5Gtav9DrcoT9L6wm82pvzBry7XBEi', '2023-02-13 10:10:57', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_users_idx` (`users_id`),
  ADD KEY `fk_comments_posts1_idx` (`posts_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles_users1_idx` (`users_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_articles_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
