-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 déc. 2021 à 21:54
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `melody.duna_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_articles` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_articles`, `titre`, `contenu`, `date`) VALUES
(1, 'article1', 'L\'extrait standard de Lorem Ipsum utilisé depuis le XVIè siècle est reproduit ci-dessous pour les curieux. Les sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" de Cicéron sont aussi reproduites dans leur version originale, accompagnée de la traduction anglaise de H. Rackham (1914).', '2021-11-22'),
(2, 'test2', 'Contrairement à une opinion répandue, le Lorem Ipsum n\'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique. Les premières lignes du Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", proviennent de la section 1.10.32.', '2021-11-22'),
(3, 'Article 3', 'Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d\'entre elles a été altérée par l\'addition d\'humour ou de mots aléatoires qui ne ressemblent pas une seconde à du texte standard. Si vous voulez utiliser un passage du Lorem Ipsum, vous devez être sûr qu\'il n\'y a rien d\'embarrassant caché dans le texte. Tous les générateurs de Lorem Ipsum sur Internet tendent à reproduire le même extrait sans fin, ce qui fait de lipsum.com le seul vrai générateur de Lorem Ipsum. Iil utilise un dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures de phrases, pour générer un Lorem Ipsum irréprochable. Le Lorem Ipsum ainsi obtenu ne contient aucune répétition, ni ne contient des mots farfelus, ou des touches d\'humour.', '2021-11-29'),
(5, 'test', 'Il en faut peu pour être heureux\r\nVraiment très peu pour être heureux', '2021-12-04'),
(6, 'Papie', 'manteau', '2021-12-07'),
(7, 'new', 'new', '2021-12-09'),
(8, 'test proprio', 'laaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2021-12-22'),
(9, 'dernier test', 'ppppppppppppppppppppppppppppppppppppppppppp', '2021-12-17'),
(10, 'Article def', 'L’article indéfini exprime le fait que le nom auquel il est associé dénomme une chose ou un être vivant inconnu(e) des participants à la communication, au sens qu’il n’en a pas encore été question au cours de celle-ci. Il indique également que ce qui est dénommé n’est pas individualisé par rapport à la classe dont il fait partie', '2021-12-20');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `articlesid` int(11) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `commentaire` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `articlesid`, `auteur`, `commentaire`, `date`) VALUES
(6, 3, 'melo2', 'test2', '2021-12-05'),
(18, 2, 'test', 'hey', '2021-12-05'),
(19, 2, 'test', 'hey', '2021-12-05'),
(20, 1, 'Lou', 'yoo', '2021-12-05'),
(21, 1, 'Lou', 'yoo', '2021-12-05'),
(22, 1, 'flav', 'sssssssss', '2021-12-04'),
(23, 1, 'Sun', 'trop trop bien', '2021-12-05'),
(24, 3, 'test4', 'jjj', '2021-12-04'),
(25, 3, 'test4', 'jjj', '2021-12-04'),
(26, 3, 'melo', 're', '2021-12-04'),
(27, 2, 'papie', 'yoo', '2021-12-07'),
(28, 6, 'melo', 'kkjf', '2021-12-03'),
(29, 7, 'luca', 'jjjj\r\n', '2021-12-09'),
(30, 8, 'melo', 'jjjjj', '2021-12-17'),
(31, 9, 'melo', 'dernier test', '2021-12-18'),
(32, 9, 'toto', ':)', '2021-12-18');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateurs` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateurs`, `login`, `password`, `token`) VALUES
(8, 'proprietaires', '$2y$10$0328xy6NI.O7Q/1gJ1uhFeRfIbiYUdeAHP2qhyODkjvIKGfpSo3Pi', 1),
(9, 'melo', '$2y$12$qOtgle0qjMJ4v4wg5UiWq.fdDL5WYwXPdm0R91ly3OCGOfJuoemvS', 127),
(10, 'luca', '$2y$12$B3U6pNMYczhSlIYyR8O25.K.xk7R20AGcDNbx5b/FwCCbJ/mQvbwK', 0),
(11, 'toto', '$2y$12$I2u5tpFa/WBGPJsvVJ1PS.uuCzTQzsYR0Xv9CRPE5WNUg3ag9egk.', 38),
(12, 'tata', '$2y$12$i.g1K.AE7GpRFQdy6xPtGeZC1IKWNucd5WXlpJrVhZgEczuXB74Q2', 0),
(13, 'flavien', '$2y$12$bXjzHWZndGcW8r18QQSnSO4XsUUm1NEJiT1F24PIQBQlbjE77u6.a', 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_articles`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articlesid` (`articlesid`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateurs`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`articlesid`) REFERENCES `articles` (`id_articles`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
