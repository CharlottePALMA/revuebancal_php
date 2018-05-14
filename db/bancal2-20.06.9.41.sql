-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 20 Juin 2017 à 07:41
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bancal2`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `accroche` text NOT NULL,
  `image_avant` varchar(255) NOT NULL,
  `mots_cles` varchar(50) DEFAULT NULL,
  `etat` varchar(1) NOT NULL,
  `editeur_article` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `a_la_une` tinyint(1) DEFAULT NULL,
  `slider` tinyint(1) DEFAULT NULL,
  `image_slider` varchar(255) DEFAULT NULL,
  `publication` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `nom_categorie` varchar(155) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `created`, `updated`, `nom_categorie`) VALUES
(1, '2017-06-14 14:56:23', '2017-06-14 14:56:23', 'Littérature'),
(2, '2017-06-14 14:56:23', '2017-06-14 14:56:23', 'Cinéma'),
(3, '2017-06-15 13:26:56', '2017-06-15 13:26:56', 'Scène'),
(4, '2017-06-15 13:26:56', '2017-06-15 13:26:56', 'Arts Plastiques'),
(5, '2017-06-15 13:27:20', '2017-06-15 13:27:20', 'Photographie'),
(6, '2017-06-15 13:27:20', '2017-06-15 13:27:20', 'Musique');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `page` varchar(255) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `content`
--

INSERT INTO `content` (`id`, `created`, `updated`, `page`, `titre`, `content`, `image`) VALUES
(1, '2017-06-19 15:15:09', '2017-06-19 15:15:09', 'fghj', 'dfghj', 'dfghj', NULL),
(2, '2017-06-19 15:17:10', '2017-06-19 15:17:10', 'ghj', 'fghj', 'fghj', NULL),
(3, '2017-06-19 15:19:52', '2017-06-19 15:33:05', 'char', 'char', 'char', 'content-1497879185.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `lien` varchar(255) NOT NULL,
  `event_expiration` tinyint(1) DEFAULT NULL,
  `etat` tinyint(1) NOT NULL,
  `editeur_event` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `form_commande`
--

CREATE TABLE `form_commande` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `nom` varchar(155) NOT NULL,
  `prenom` varchar(155) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `nom_ouvrage` varchar(255) NOT NULL,
  `format` varchar(255) DEFAULT NULL,
  `nb_exemplaire` int(11) NOT NULL,
  `commentaires` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `form_commande`
--

INSERT INTO `form_commande` (`id`, `created`, `nom`, `prenom`, `email`, `adresse`, `code_postal`, `ville`, `pays`, `nom_ouvrage`, `format`, `nb_exemplaire`, `commentaires`) VALUES
(3, '2017-06-19 14:02:05', 'fghjk', 'vbhj', 'fgh', 'fgh', 5, 'fghjk', 'ghj', 'ghjk', NULL, 8, 'hjk'),
(4, '2017-06-19 14:13:57', 'tghjk', 'fghjk', 'fghjk', 'fghjk', 25487, 'ghjkl', 'fghj', 'gbjk', 'papier;epub;', 25, 'bn,;');

-- --------------------------------------------------------

--
-- Structure de la table `form_partenaire`
--

CREATE TABLE `form_partenaire` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `nom` varchar(155) NOT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  `commentaires` text,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `form_partenaire`
--

INSERT INTO `form_partenaire` (`id`, `created`, `nom`, `fonction`, `commentaires`, `email`) VALUES
(5, '2017-06-15 17:04:25', 'charles', 'litterature', '', 'charlotte@teching.com'),
(7, '2017-06-17 14:15:48', 'khhkhjk', 'litterature;musique;', '', 'ghfghfghfhg'),
(8, '2017-06-19 13:47:34', 'charlotte', '', '', 'c'),
(9, '2017-06-19 13:48:00', 'charlotte', 'litterature;musique;', 'c', 'c'),
(10, '2017-06-19 14:08:22', 'gtuio', '', '', 'hjklmù');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ouvrages`
--

CREATE TABLE `ouvrages` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_ouvrage` date DEFAULT NULL,
  `auteur` varchar(155) NOT NULL,
  `accroche` text NOT NULL,
  `contenu` text NOT NULL,
  `prix_broche` varchar(155) DEFAULT NULL,
  `prix_epub` varchar(155) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `couverture` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `slider` tinyint(1) DEFAULT NULL,
  `image_slider` varchar(255) DEFAULT NULL,
  `editeur_ouvrage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ouvrages`
--

INSERT INTO `ouvrages` (`id`, `created`, `updated`, `titre`, `date_ouvrage`, `auteur`, `accroche`, `contenu`, `prix_broche`, `prix_epub`, `lien`, `couverture`, `etat`, `slider`, `image_slider`, `editeur_ouvrage`) VALUES
(6, '2017-06-19 19:20:03', '2017-06-19 19:20:03', 'test', '2017-05-06', 'tes', 't', 't', '6', '3', 'aze', 'ouvrage-1497892803.jpg', 2, 2, NULL, 'palma'),
(7, '2017-06-19 21:28:02', '2017-06-19 22:44:45', 'Charlotte', '2017-06-15', ',n,bvn,', 'fhgfhg', 'hjfhgdfghfgh', '1', '2', 'hjghjghjgjh', 'ouvrage-1497905085.jpg', 1, 1, 'slider-1497905085.jpg', 'palma');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `name` varchar(155) NOT NULL,
  `accroche` text NOT NULL,
  `contenus_bio` text,
  `contenus_actu` text,
  `contenus_projet` text,
  `lien_facebook` varchar(255) DEFAULT NULL,
  `lien_twitter` varchar(255) DEFAULT NULL,
  `lien_instagram` varchar(255) DEFAULT NULL,
  `lien_youtube` varchar(255) DEFAULT NULL,
  `lien_soundcloud` varchar(255) DEFAULT NULL,
  `lien_email` varchar(255) DEFAULT NULL,
  `metier` varchar(50) DEFAULT NULL,
  `image_avant` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `slider` tinyint(1) DEFAULT NULL,
  `image_slider` varchar(255) DEFAULT NULL,
  `editeur_partenaire` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `created`, `updated`, `name`, `accroche`, `contenus_bio`, `contenus_actu`, `contenus_projet`, `lien_facebook`, `lien_twitter`, `lien_instagram`, `lien_youtube`, `lien_soundcloud`, `lien_email`, `metier`, `image_avant`, `etat`, `slider`, `image_slider`, `editeur_partenaire`) VALUES
(7, '2017-06-19 14:37:56', '2017-06-19 14:37:56', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'tes', 'teste', 'test', 'test', 'partenaire-1497875876.jpg', 2, 1, 'slider-1497875876.jpg', 'palma');

-- --------------------------------------------------------

--
-- Structure de la table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `network` varchar(150) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(155) NOT NULL,
  `prenom` varchar(155) NOT NULL,
  `password` varchar(128) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `created`, `updated`, `email`, `nom`, `prenom`, `password`, `photo`, `description`) VALUES
(1, '2017-06-14 13:19:53', '2017-06-14 13:19:53', 'charlotte.palma@teching.com', 'palma', 'charlotte', '7178f308a79d1ee758520665ed55ec3e7c13672de1659b799333f9fc6e4c2377ae7d49dd1009493ff9a0a78229a88939a236a545e7f041699750df31b9080d57', NULL, '0');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `form_commande`
--
ALTER TABLE `form_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `form_partenaire`
--
ALTER TABLE `form_partenaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `form_commande`
--
ALTER TABLE `form_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `form_partenaire`
--
ALTER TABLE `form_partenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `ouvrages`
--
ALTER TABLE `ouvrages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
