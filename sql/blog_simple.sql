-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 02 avr. 2022 à 12:44
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_simple`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `ID` int(10) UNSIGNED NOT NULL,
  `logname` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`ID`, `logname`, `password`) VALUES
(48, 'UTBM', 'bc1f55f482a2df2bede07c661806c4eb'),
(49, 'Poisson', '2c7fa5b4147150b7dfdb1ff83dbfab3e'),
(50, 'Boubou', 'be352ac0e6b130e2c1f7f909930bdc57');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `ID_post` int(10) UNSIGNED NOT NULL,
  `date_lastedit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `content` varchar(10000) COLLATE utf8_bin NOT NULL,
  `owner_login` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`ID_post`, `date_lastedit`, `title`, `content`, `owner_login`) VALUES
(49, '2022-04-02 12:26:52', 'Premier post', 'Le blog des années 1990 est ok !!', 48),
(51, '2022-04-02 12:32:57', 'What time is it ?', 'L\'heure n\'est plus en mode US', 48),
(52, '2022-04-02 12:31:48', 'Jean-Michel Blanquer, lauréat du Prix d’Alembert 2022 de la SMF', 'La Société Mathématique de France salue l’audace de la réforme du lycée qui propose de s’affranchir des sciences afin de positionner la France comme l’acteur principal des développements technologiques futurs. Cette réforme est d’autant plus remarquable qu’elle a été élaborée en quelques mois à peine sans l’aide de la communauté scientifique. C’est le signe de la pensée visionnaire de ses initiateurs. Il s’agit d’une révolution de la pensée à de nombreux égards.', 49),
(53, '2022-04-02 12:32:27', 'Un peu de retard', 'Bon j\'ai un jour de retard pour la blague, mais c\'est drôle !!', 49),
(54, '2022-04-02 12:39:39', 'Mon livre d\'or', 'Voici toutes mes mimique de langage !! Du meilleur prof de physique.', 50),
(55, '2022-04-02 12:36:43', 'Euh', 'Non la réponse ce n\'est pas 2,7', 50),
(56, '2022-04-02 12:37:34', 'C\'est une madeleine de Proust toute chaude', 'En parlant d\'un exercice commun.', 50),
(57, '2022-04-02 12:38:12', 'Import Template', 'Quand un étudiant à du mal à faire un exercice de physique.', 50),
(58, '2022-04-02 12:38:33', 'Non coco !!', 'Quand un élève se trompe.', 50),
(59, '2022-04-02 12:39:24', 'Je sens que vous êtes tendu, un petit DS ça détend bien', 'Pour nous rappeler que tous les vendredis c\'est ds de cours à 13h.', 50),
(60, '2022-04-02 12:40:28', 'Monsieuuuuuur !', 'A ce fameux Thomas', 50),
(61, '2022-04-02 12:41:08', 'C\'est leur de ma pause syndicale !!!', 'Quand il devait envoyer un taupin au tableau.', 50),
(62, '2022-04-02 12:42:14', 'Oh regardez !! Y\'a Monsieur Farcet', 'Pour nous expliquer le théorème de Gauss et les axes de symétrie. \r\nEt M. Farcet était notre principal.', 50);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_post`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `ID_post` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
