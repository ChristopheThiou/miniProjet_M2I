-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 14 juin 2023 à 09:03
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mini_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

DROP TABLE articles if EXISTS;

INSERT INTO `articles` (`id`, `title`, `author`, `content`, `img`, `id_categorie`) VALUES
(1, 'Les patates sautées', 'Christophe', 'Éplucher les patates et les faires revenir a la poelle', 'https://cdn.pixabay.com/photo/2018/07/19/13/51/potato-3548557_1280.jpg', 1),
(2, 'le boeuf bourginon', 'Phillipe', 'Faire mijoter le boeud dans une marmitte avec du vin rouge', 'https://media.istockphoto.com/id/1199343924/fr/photo/boeuf-bourguignon.jpg?s=2048x2048&w=is&k=20&c=jXpsIvCainnRDRKq1mcDoEoPVtDnUZahfhL2HsqhkQc=', 1),
(3, 'Les merguez', 'Sina', 'Faire grillé les merguez au barbecu', 'https://cdn.pixabay.com/photo/2017/09/24/22/13/barbecue-2783457_1280.jpg', 2),
(4, 'Couscous', 'Momo', 'Faire la semoule les légumes et la viande', 'https://cdn.pixabay.com/photo/2016/07/08/10/16/couscous-1503943_1280.jpg', 2),
(5, 'Sushi', 'Xiaoyu', 'Trancher de fine tranche de poisson et les déposer sur un pavé de riz vinaigré', 'https://cdn.pixabay.com/photo/2021/01/01/15/31/sushi-balls-5878892_1280.jpg', 3),
(6, 'Bo bun', 'Christophe', 'Mettre les vermicelles avec les nems et les légumes dans un bol', 'https://cdn.pixabay.com/photo/2016/05/09/10/26/rice-1381146_1280.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE categories if EXISTS;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categorie`) VALUES
(1, 'Française'),
(2, 'Tunisienne'),
(3, 'Asiatique');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE comments if EXISTS;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `id_article`) VALUES
(1, 'c\'est bon', 1),
(2, 'c nu l', 2),
(3, 'heuuuuu', 3),
(4, 'oui', 4),
(5, 'non', 5),
(6, 'xD', 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
