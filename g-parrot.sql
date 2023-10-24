-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 21 oct. 2023 à 11:02
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `g-parrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `parent_id`, `name`, `commentaire`, `note`, `is_active`) VALUES
(3, NULL, 'romain', 'un super garage au soins de ses clients', 8, 1),
(4, NULL, 'sylvain', 'garage hors de prix. je déconseille', 2, 0),
(5, NULL, 'jeanine', 'personnel tres chaleureux', 6, 1),
(6, NULL, 'henri', 'Prestation satisfaisante', 5, 1),
(11, NULL, 'romain', 'le site est fini ca y est', 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometre` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `marque`, `kilometre`, `annee`, `price`, `image`, `updated_at`) VALUES
(43, 'peugeot', 100000, 2019, 4300000, 'polo.jpg', NULL),
(55, 'wolkswagen', 30000, 2019, 1700000, 'polo.jpg', NULL),
(56, 'renault', 200000, 2010, 800000, 'senic.jpg', NULL),
(57, 'bmw', 100000, 2023, 2400000, 'images.jpg', NULL),
(58, 'renault', 100000, 2023, 4300000, 'c3.jpg', NULL),
(59, 'renault', 100000, 2023, 4300000, 'kangoo.jpg', NULL),
(60, 'citroen', 10000, 2023, 1200000, 'c3.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230920090212', '2023-09-20 09:02:55', 137),
('DoctrineMigrations\\Version20230920090635', '2023-09-20 09:06:40', 51),
('DoctrineMigrations\\Version20230922080504', '2023-09-22 08:05:16', 47),
('DoctrineMigrations\\Version20230922090423', '2023-09-22 09:04:50', 66),
('DoctrineMigrations\\Version20230928125321', '2023-09-28 12:54:16', 95),
('DoctrineMigrations\\Version20230929142928', '2023-09-29 14:29:35', 28),
('DoctrineMigrations\\Version20230929170347', '2023-09-29 17:03:57', 69),
('DoctrineMigrations\\Version20230930131906', '2023-09-30 13:19:15', 55),
('DoctrineMigrations\\Version20230930152123', '2023-09-30 15:21:32', 55),
('DoctrineMigrations\\Version20230930153059', '2023-09-30 15:31:04', 52),
('DoctrineMigrations\\Version20230930153259', '2023-09-30 15:33:02', 46),
('DoctrineMigrations\\Version20231003002009', '2023-10-03 00:20:13', 73),
('DoctrineMigrations\\Version20231003084853', '2023-10-03 08:48:58', 59),
('DoctrineMigrations\\Version20231018140711', '2023-10-18 14:07:31', 36);

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

CREATE TABLE `formulaire` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formulaire`
--

INSERT INTO `formulaire` (`id`, `email`, `name`, `surname`, `tel`, `message`) VALUES
(1, 'Ballesteros@hotmail.fr', 'romain', 'ballesteros', 686116016, 'ce garage commence à etre plutot pas mal'),
(2, 'romain.ballesteros@gmail.com', 'Romain', 'Ballesteros', 786542312, 'sur mobile c\'est bien aussi'),
(17, 'Ballesteros@hotmail.fr', 'romain', 'ballesteros', 456757, 'je viens de securiser le formulaire'),
(18, 'Ballesteros@hotmail.fr', 'romain', 'ballesteros', 4567576, 'Bonjour, je vous contacte au sujet de la voiture peugeot à 43,000.00 €'),
(19, 'Ballesteros@hotmail.fr', 'romain', 'ballesteros', 456757, 'je crois que j\'ai reussi'),
(20, 'Ballesteros@hotmail.fr', 'romain', 'ballesteros', 456757, 'Bonjour, je vous contacte au sujet de la voiture renault à 8,000.00 € j\'ai reussi'),
(21, 'Ballesteros@hotmail.fr', 'romain', 'ballesteros', 4567576, 'pense tu que ce site sera en ligne ?');

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

CREATE TABLE `horaires` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `heure_matin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_soir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `horaires`
--

INSERT INTO `horaires` (`id`, `parent_id`, `heure_matin`, `heure_soir`, `jour`) VALUES
(1, NULL, '8h à 12h', '13h à 18h', 'du mardi au vendredi'),
(2, NULL, '13h', '15h', 'le samedi');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`) VALUES
(1, 'des techniciens à votre ecoute'),
(2, 'carrosserie'),
(3, 'nos voitures'),
(4, 'peinture'),
(5, 'Réparation et entretien automobile             toutes marques'),
(6, 'Diagnostic électronique'),
(7, 'révision');

-- --------------------------------------------------------

--
-- Structure de la table `sous_services`
--

CREATE TABLE `sous_services` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sous_services`
--

INSERT INTO `sous_services` (`id`, `parent_id`, `name`, `texte`) VALUES
(1, NULL, 'carrosserie', 'Chez v.parrot nous vous proposons de restaurer l’état de votre voiture ce qui peut impliquer le\r\n                remplacement de pièces\r\n                de carrosserie en cas de dommages importants, le débosselage afin d’enlever les impacts ou encore le\r\n                redressage de la\r\n                carrosserie pour restaurer une zone déformée. Jouant à la fois un rôle de sécurité, car elle protège\r\n                votre véhicule, la\r\n                carrosserie est aussi esthétique.\r\n                Cependant, elle n’est pas épargnée des chocs, rayures et taches. Nous disposons de tous les appareils\r\n                adaptés dans nos\r\n                ateliers pour donner un coup de neuf. Notre équipe connaît donc toutes les techniques pour restaurer et\r\n                embellir votre\r\n                véhicule.\r\n                Pour le prix, tout dépend évidemment de l’opération réalisée et de l’endroit où se fait la réparation.\r\n                garage parrot vous accompagne tout au long de la prestation avec transparence et vous explique étape par\r\n                étape ce qui sera\r\n                fait sur votre voiture.'),
(2, NULL, 'des techniciens à votre écoute', 'Tout le monde le sait, lorsque l’on cherche une voiture, les bonnes affaires se trouvent sur le\r\n                    marché de\r\n                    l’occasion.\r\n                    Chez Select Auto, nous vous proposons le meilleur des voitures d’occasion dans le 77 pour effectuer\r\n                    un\r\n                    investissement\r\n                    qui vaut vraiment le coup. Si vous en avez assez des petites annonces de vente de voiture dans le 77\r\n                    et\r\n                    surtout des\r\n                    arnaques qui pullulent sur le marché de l’occasion, faites confiance à un prestataire comme Select\r\n                    Auto\r\n                    qui opères un\r\n                    garage d’occasion dans le 77. Concessionnaire auto en Seine-et-Marne, nous vous proposons des\r\n                    véhicules\r\n                    qui ont été\r\n                    contrôlés par une équipe experte soucieuse de vous offrir une prestation de qualité.\r\n                    Pas de mauvaise surprise aussi sur ce qui est du prix des voitures d’occasion en Seine-et-Marne: ce\r\n                    dernier est fixé en\r\n                    fonction de la côte argus et des spécificités du véhicule. Les meilleures marques du marché sont\r\n                    disponibles : de\r\n                    Renault à Peugeot, de Volkswagen à Toyota en passant par Citroën ou Fiat et bien d’autres.'),
(3, NULL, 'peinture', 'Pour la peinture de sa voiture, vaut mieux confier la prestation à un professionnel comme v.parrot.\r\n                Pour redonner un coup de neuf à sa voiture, un coup de peinture peut être la solution. En effet, un\r\n                véhicule vieillit\r\n                avec le temps et plusieurs solutions de peinture existent.\r\n                Select Auto dispose d’un atelier et des équipements nécessaires pour remettre le véhicule à neuf. Nous\r\n                vous proposons la\r\n                peinture complète qui a pour but de repeindre entièrement la voiture ou la peinture d’une partie de la\r\n                carrosserie (une\r\n                porte, une aile, un capot…).\r\n                Le coût de cette opération varie en fonction de la taille de la voiture, de la finition, mais aussi du\r\n                type de peinture\r\n                choisie. Select Auto travaille avec de la peinture brillante, mate, satinée ou opaque pour un résultat\r\n                impeccable.'),
(4, NULL, 'reparation', 'Peu importe la marque ou le modèle de votre véhicule, Select auto est en mesure de vous proposer\r\n                d’excellentes\r\n                prestations d’entretien, de révision et de réparation de voiture.\r\n                Nous faisons pour vous une révision complète du véhicule, des essuie-glaces aux phares en passant par la\r\n                plaquette des\r\n                freins, mais aussi des interventions plus lourdes comme la réparation de l’embrayage, la courroie de\r\n                distribution ou les\r\n                amortisseurs entre autres.\r\n                Nous effectuons ensuite toutes les réparations mécaniques qui concernent le fonctionnement du moteur et\r\n                de toutes les\r\n                autres parties du véhicule. Select Auto sait que les réparations automobiles peuvent donner lieu à des\r\n                devis exagérés,\r\n                c’est pourquoi l’enseigne met un point d’honneur à proposer une prestation sur-mesure en fonction de vos\r\n                besoins\r\n                uniquement.\r\n                La transparence est de rigueur, lors des interventions sur votre véhicule en vous expliquant bien au\r\n                préalable quel est\r\n                le travail à effectuer. S’il arrive que l’intervention soit plus conséquente que prévu, nous ne\r\n                manquerons pas de vous\r\n                prévenir et de procéder aux nouvelles prestations avec votre accord.\r\n                Notre atelier est composé de différents experts tous spécialisés dans une discipline que ce soit la\r\n                carrosserie ou la\r\n                mécanique. Ainsi, vous bénéficiez d’une expertise optimale pour des réparations pérennes.\r\n                Quel que soit votre besoin, un spécialiste est là pour vous conseiller au mieux !'),
(5, NULL, 'diagnostic electronique', 'Aujourd’hui, il est très difficile de déceler tout seul une panne électronique sur son véhicule. À cause\r\n                de l’évolution\r\n                considérable des voitures, la mécanique tend à laisser de plus en plus sa place à l’électronique et à la\r\n                technologie, ne\r\n                vous inquiétez pas votre garage de réparations automobiles de toutes marques a les compétences requises.\r\n                Pour contrôler\r\n                ces véhicules modernes, les mécaniciens aussi ont dû se former pour détecter rapidement les\r\n                dysfonctionnements.\r\n                Pour cela, v.Parrot s’est doté d’un appareil de diagnostic électronique qui permet d’obtenir un\r\n                diagnostic global de la\r\n                voiture. C’est ainsi que nous pouvons effectuer les réparations et le changement de la pièce concernée.\r\n                Ce contrôle est\r\n                effectué généralement lors de la révision.\r\n                L’appareil de diagnostic a la capacité de détecter la moindre anomalie du système même lorsqu’un voyant\r\n                est allumé sur\r\n                votre tableau de bord.\r\n                Un contrôle nécessaire pour la bonne conduite de votre véhicule.\r\n                N’hésitez pas à prendre rendez-vous avec v.parrot pour le diagnostic électronique de votre voiture !'),
(6, NULL, 'revision', 'La révision de votre véhicule est indispensable !\r\n                Il s’agit d’un passage obligé pour assurer la longévité de sa voiture. Et surtout, la révision permet\r\n                d’anticiper les\r\n                éventuels problèmes à venir. Selon le modèle, le kilométrage ou l’ancienneté de votre véhicule, la\r\n                révision est à\r\n                effectuer tous les 15 000, 20 000 ou 30 000 kms.\r\n                La révision de votre véhicule intègre un certain nombre d’éléments comme la vidange et le changement du\r\n                filtre à huile,\r\n                la mise à niveau de l’ensemble des liquides (refroidissement, lave-vitres, freins, direction assistée).\r\n                Mais aussi\r\n                l’ensemble des éléments de sécurité tels que les feux, pneumatiques, systèmes de direction,\r\n                amortisseurs, balais\r\n                d’essuie-glaces, etc.\r\n                Attention ne confondez pas révision et le contrôle technique qui est une obligation légale. Lors de la\r\n                révision, nous\r\n                vérifions l’usure des différents organes de votre véhicule et vous proposons ensuite différents forfaits\r\n                d’entretien qui\r\n                comprennent plusieurs points de contrôle.\r\n                Nous avons aussi pour habitude de vous proposer de remplacer certaines pièces usées, ce qui donnera lieu\r\n                dans ce cas à\r\n                un devis supplémentaire, tout ceci avec votre accord uniquement.\r\n                Lors de la révision de votre véhicule, nous respectons les préconisations constructrices et toute\r\n                anomalie vous sera\r\n                signalée.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `services_id` int(11) DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `services_id`, `email`, `roles`, `password`) VALUES
(1, NULL, 'v.parrot@mail.fr', '[\"ROLE_ADMIN\"]', '$2y$13$UlcB72jCKRCZetymlcv75e/qH4sFWZa9poKkYtFwy28nxjvEh8v36'),
(4, NULL, 'Ballesteros@hotmail.fr', '[]', '$2y$13$UbtXAxL5sKxpBgxiT1PbQuxsOVnBMCo33WlhhQqrkBoK879SOhXPm');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8F91ABF0727ACA70` (`parent_id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `formulaire`
--
ALTER TABLE `formulaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `horaires`
--
ALTER TABLE `horaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_39B7118F727ACA70` (`parent_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sous_services`
--
ALTER TABLE `sous_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7B7CD53C727ACA70` (`parent_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  ADD KEY `IDX_1483A5E9AEF5A6C1` (`services_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `formulaire`
--
ALTER TABLE `formulaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `horaires`
--
ALTER TABLE `horaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sous_services`
--
ALTER TABLE `sous_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `FK_8F91ABF0727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `horaires`
--
ALTER TABLE `horaires`
  ADD CONSTRAINT `FK_39B7118F727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `sous_services`
--
ALTER TABLE `sous_services`
  ADD CONSTRAINT `FK_7B7CD53C727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `services` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E9AEF5A6C1` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
