-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 17 fév. 2023 à 17:11
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
(12, 'Pour PHP et MySQL !', '2023-02-16 09:58:54', 1, 2, 3),
(13, 'Le PHP !', '2023-02-16 10:00:13', 1, 3, 1),
(14, 'je suis bien inscrit !!!', '2023-02-16 11:41:01', 1, 4, 1),
(16, 'Test Valide commentaire', '2023-02-16 16:12:23', 1, 2, 2),
(17, 'Test Ajouter un commentaire', '2023-02-16 16:25:51', 1, 1, 2),
(19, 'Test commentaire modifié', '2023-02-16 17:19:05', 1, 1, 2);

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
(4, 'good', 'Speed', 'good@exemple.com', 'Coucou, est ce que ça !!!', '2023-02-17 10:58:48'),
(5, 'User', 'user', 'user@exemple.com', 'Coucou', '2023-02-17 16:42:25');

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
(1, 'PHP ', 'PHP Hypertext Preprocessor, est un langage de scripts généraliste et Open Source, spécialement conçu pour le développement d\'applications web.', 'PHP est un langage de script côté serveur. Il est utilisé pour développer des sites web statiques ou dynamiques ou des applications web(blogs, réseaux sociaux, sites e-commerce…). PHP signifie Hypertext Pre-processor, qui signifiait auparavant Personal Home Pages.\r\nPHP est un script côté serveur qui est interprété sur le serveur tandis que JavaScript est un exemple de script côté client qui est interprété par le navigateur du client. PHP et JavaScript peuvent tous deux être intégrés dans des pages HTML.\r\nSes avantages:\r\n- PHP est un langage à code source ouvert et gratuit ;\r\n- La plupart des serveurs d’hébergement web prennent en charge PHP par défaut, \r\n contrairement à d’autres langages tels qu’ASP( Application Service Provider:  \r\n fournisseur d\'applications en ligne) qui nécessitent IIS(Internet Information \r\n Services). Cela fait de PHP un choix rentable ;\r\n- PHP est régulièrement mis à jour pour suivre les dernières tendances technologiques ;\r\n- Un autre avantage de PHP est qu’il s’agit d’un langage de script côté serveur ; \r\n cela signifie qu’il suffit de l’installer sur le serveur et que les ordinateurs \r\n clients qui demandent des ressources au serveur n’ont pas besoin d’avoir PHP \r\n installé, seul un navigateur web suffit ;\r\n- PHP a un support intégré pour travailler main dans la main avec MySQL ; cela ne \r\n signifie pas que vous ne pouvez pas utiliser PHP avec d’autres systèmes de gestion \r\n de bases de données ;\r\n- PHP est un système multi-plateforme ; cela signifie que vous pouvez déployer votre \r\n application sur un certain nombre de systèmes d’exploitation différents tels que \r\n Windows, Linux, Mac OS, etc.,\r\n', 'Welc', '2023-02-15 17:13:27', 1),
(2, 'MySQL', 'Est un système de gestion de bases de données relationnelles.', 'MySQL est un language de base de données qui permets d’entreposer, d’organiser, trier et structurer des données. Toutes ces opérations permettent, par exemple, de gérer un catalogue avec des milliers d’items et d’offrir la possibilité de les voir en ordre alphabétiques, de prix, de popularité, etc.\r\nIl y a des alternatives à ces deux langages mais ceux-ci sont les plus rapides et les plus populaires, tout en étant gratuits et open source. Ils sont le choix par défaut de la combinaison Unix/Linux/Apache.. mais ils sont aussi offerts sur Windows. On peut réaliser à peu près n’importe quel produit en ligne en combinant ces deux langages, la seule limite étant le temps, le budget et les connaissances du programmeur. performances élevées en lecture, ce qui signifie qu\'il est davantage orienté vers le service de données déjà en place que vers celui de mises à jour fréquentes et fortement sécurisées.\r\nC\'est un logiciel libre, open source, développé sous double licence selon qu\'il est distribué avec un produit libre ou avec un produit propriétaire. Dans ce dernier cas, la licence est payante, sinon c\'est la licence publique générale GNU (GPL) qui s\'applique. Un logiciel qui intègre du code MySQL ou intègre MySQL lors de son installation devra donc être libre ou acquérir une licence payante.\r\n', 'Welc', '2023-02-15 17:24:33', 1),
(3, 'PHP et MySQL ', 'PHP et MySQL sont très puissants et relativement simples d’utilisation.', 'On les utilise principalement dans un contexte web, notamment pour manipuler des données envoyées par l’utilisateur et rendre un site dynamique (PHP) et pour stocker des données (MySQL).', 'Welc', '2023-02-15 17:26:52', 1);

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
(3, 'User1', 'Pipo', 'Philippe', 'pipo@exemple.com', '$2y$10$nqIOo5Oy9IzYYNHalMtYLu8U5Gtav9DrcoT9L6wm82pvzBry7XBEi', '2023-02-13 10:10:57', NULL),
(4, 'User3', 'Dupont', 'Jean', 'dupont@exemple.com', '$2y$10$ovff1wpJ.Ikknmlhpzm6H.exBpaOuLz4Rr6pppEwEIIB5T5lhQ4VW', '2023-02-16 10:39:30', NULL),
(5, 'User4', 'Lemaire', 'Alice', 'lemaire@exemple.com', '$2y$10$ZW/aZaohEuHZZN.QDe252eD/fpp3kq.jbcugS4uZ5fjBBOUQQmiqK', '2023-02-16 10:43:12', NULL),
(6, 'user5', 'Henry', 'Pierre', 'henry@exemple.com', '$2y$10$4dIzpL0s5P/2wSkltT/DvO2vKUjALOMhSBAxy8ZGfIf4u5V4vuZQC', '2023-02-17 15:46:59', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
