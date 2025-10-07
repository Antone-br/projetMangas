-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 oct. 2025 à 08:44
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ab_mangas`
--

-- --------------------------------------------------------

--
-- Structure de la table `dessinateur`
--

CREATE TABLE `dessinateur` (
  `id_dessinateur` int(11) NOT NULL,
  `nom_dessinateur` varchar(50) NOT NULL,
  `prenom_dessinateur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `dessinateur`
--

INSERT INTO `dessinateur` (`id_dessinateur`, `nom_dessinateur`, `prenom_dessinateur`) VALUES
(1, 'TITE', 'Kubo'),
(2, 'ONE', ''),
(3, 'TORIYAMA', 'Akira'),
(4, 'YUSUKE', 'Murata'),
(5, 'OBA', 'Tsugumi'),
(6, 'IWAAKI', 'Hitoshi '),
(7, 'OBATA', 'Takeshi '),
(8, 'TOGASHI', 'Yoshihiro'),
(9, 'MIYAMA', 'Fugin'),
(10, 'ESUNO', 'Sakae'),
(11, 'TONOGAI', 'Yoshiki'),
(12, 'SUZUKI', 'Nakaba'),
(13, 'WAKUI', 'KEN'),
(14, 'MIZUKI', 'Shion '),
(15, 'IZUMI', 'Mitsu'),
(16, 'TASHIRO', 'Tetsuya'),
(17, 'HORIKOSHI', 'Kohei'),
(18, 'NAGAI', 'Go');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `lib_genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `lib_genre`) VALUES
(1, 'Aventure'),
(2, 'Tranche-de-vie'),
(3, 'Action'),
(4, 'Science-fiction'),
(5, 'Suspense'),
(6, 'Policier'),
(7, 'Sport'),
(8, 'Psychologique');

-- --------------------------------------------------------

--
-- Structure de la table `manga`
--

CREATE TABLE `manga` (
  `id_manga` int(11) NOT NULL,
  `id_dessinateur` int(11) NOT NULL,
  `id_scenariste` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `couverture` varchar(50) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `manga`
--

INSERT INTO `manga` (`id_manga`, `id_dessinateur`, `id_scenariste`, `prix`, `titre`, `couverture`, `id_genre`) VALUES
(1, 1, 1, 12.50, 'Bleach', 'bleach.jpg', 1),
(2, 4, 2, 25.00, 'One Punch Man', 'One Punch Man.jpg', 1),
(3, 3, 3, 7.50, 'Dragon Ball Z', 'dbz.jpg', 1),
(4, 6, 6, 18.00, 'Parasyte', 'Parasyte.jpg', 4),
(5, 8, 8, 14.25, 'Hunter X Hunter', 'Hunter X Hunter.jpg', 1),
(6, 7, 5, 12.50, 'Death Note', 'Death-Note.jpg', 6),
(7, 18, 18, 45.00, 'Goldorak', 'Goldorak.jpg', 4),
(8, 4, 5, 50.00, 'Barakamon', 'Barakamon.jpg', 3),
(9, 3, 3, 45.00, 'Jojo\'s bizarre adventure - Saison 5 - Golden Wind 	', 'Jojo\'s bizarre adventure.jpg', 1),
(10, 3, 4, 15.00, 'college fou,fou,fou', 'CollegeFou.jpg', 2),
(11, 9, 9, 9.00, 'Overlord', 'Overlord.jpg', 3),
(12, 12, 12, 8.50, 'Sevend deadly sins', 'SevenDeadlySins.jpg', 1),
(13, 10, 10, 7.95, 'Mirai Nikki', 'MiraiNikki.jpg', 6),
(14, 11, 11, 7.65, 'Secret', 'Secret.jpg', 8),
(15, 11, 11, 8.00, 'Doubt', 'Doubt.jpg', 8),
(16, 11, 11, 7.40, 'Judge', 'judge.jpg', 8),
(17, 13, 13, 8.20, 'Tokyo Revengers', 'tokyoRevengers.jpg', 3),
(18, 14, 14, 7.30, 'Guilty Crown', 'guiltyCrown.jpg', 4),
(19, 15, 15, 8.30, 'Ano Hana', 'anoHana.jpg', 1),
(20, 16, 16, 8.30, 'Red Eyes Sword - Akame ga Kill !', 'AkameGaKill.jpg', 3),
(21, 17, 17, 8.30, 'My Hero Academia', 'MyHeroAcademia.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `scenariste`
--

CREATE TABLE `scenariste` (
  `id_scenariste` int(11) NOT NULL,
  `nom_scenariste` varchar(50) NOT NULL,
  `prenom_scenariste` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `scenariste`
--

INSERT INTO `scenariste` (`id_scenariste`, `nom_scenariste`, `prenom_scenariste`) VALUES
(1, 'TITE', 'Kubo'),
(2, 'ONE', ''),
(3, 'TORIYAMA', 'Akira'),
(4, 'YUSUKE', 'Murata'),
(5, 'OBA', 'Tsugumi'),
(6, 'IWAAKI', 'Hitoshi'),
(7, 'OBATA', 'Takeshi'),
(8, 'TOGASHI', 'Yoshihiro'),
(9, 'OSHIO', 'Satoshi '),
(10, 'ESUNO', 'Sakae'),
(11, 'TONOGAI', 'Yoshiki'),
(12, 'SUZUKI', 'Nakaba'),
(13, 'WAKUI', 'Ken'),
(14, 'MIYAGI', 'Yousuke'),
(15, 'OKADA', 'Mari'),
(16, 'TAKAHIRO', ''),
(17, 'HORIKOSHI', 'Kohei'),
(18, 'NAGAI', 'Go');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dessinateur`
--
ALTER TABLE `dessinateur`
  ADD PRIMARY KEY (`id_dessinateur`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id_manga`),
  ADD KEY `fk_manga_genre` (`id_genre`),
  ADD KEY `fk_manga_scenariste` (`id_scenariste`),
  ADD KEY `fk_manga_dessinateur` (`id_dessinateur`);

--
-- Index pour la table `scenariste`
--
ALTER TABLE `scenariste`
  ADD PRIMARY KEY (`id_scenariste`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dessinateur`
--
ALTER TABLE `dessinateur`
  MODIFY `id_dessinateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `manga`
--
ALTER TABLE `manga`
  MODIFY `id_manga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `scenariste`
--
ALTER TABLE `scenariste`
  MODIFY `id_scenariste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `fk_manga_dessinateur` FOREIGN KEY (`id_dessinateur`) REFERENCES `dessinateur` (`id_dessinateur`),
  ADD CONSTRAINT `fk_manga_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `fk_manga_scenariste` FOREIGN KEY (`id_scenariste`) REFERENCES `scenariste` (`id_scenariste`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
