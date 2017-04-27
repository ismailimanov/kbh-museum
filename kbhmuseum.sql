-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2017 at 05:06 PM
-- Server version: 10.0.29-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imanovdk_museum`
--

-- --------------------------------------------------------

--
-- Table structure for table `brugere`
--

CREATE TABLE `brugere` (
  `id` int(11) NOT NULL,
  `fuldeNavn` varchar(255) NOT NULL,
  `brugernavn` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `beskrivelse` text NOT NULL,
  `profilBillede` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brugere`
--

INSERT INTO `brugere` (`id`, `fuldeNavn`, `brugernavn`, `email`, `kode`, `beskrivelse`, `profilBillede`) VALUES
(1, 'Ismail Imanov', 'Ismail', 'ismail@imanov.dk', '12', 'test', 'ismail.png'),

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `bruger` varchar(255) NOT NULL,
  `billede` varchar(255) NOT NULL,
  `beskrivelse` varchar(255) NOT NULL,
  `lokation` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `bruger`, `billede`, `beskrivelse`, `lokation`, `title`) VALUES
(1, 'Anders Jensen', 'kbh.jpg', 'Der kendes en del stenalderbopladser, bl.a. submarine bopladser fra Kongemose-kultur ved Frihavnen og ud for Amagers kyst.\n\nKøpmannæhafn eller blot Hafn synes at være opstået som en lille sæsonhandelsplads i forbindelse med det store sildefiskeri.', 'København', 'København'),
(2, 'Ismail Imanov', 'bella.jpg', 'Bellahøj, bydel på bakkedrag i København mellem Brønshøj og Vanløse.\n\nUnder den svenske belejring af København 1658-60 lagde Karl 10. Gustav sin hovedlejr, Karlstad, på Bellahøj. I 1791 opførte grosserer Moses Mariboe (1760-1830) her et landsted.', 'Bellahøj', 'Bellahøj'),
(3, 'Josephine Jacobsen', 'herlev.jpg', 'Herlev Kommune, forstadskommune nordvest for København; kommunen er uberørt af strukturreformens kommunesammenlægninger 2007.\n\nByrådet i Herlev Kommune består af 19 medlemmer (2014). Thomas Gyldal Petersen (f. 1.8.1975) fra Socialdemokraterne.', '2730 Herlev', 'Herlev Hospital'),
(4, 'Mohammed Ahmed', 'ting.jpg', 'Tingbjerg er et boligområde beliggende i Tingbjerg Sogn i København. Det ligger i en grøn lomme, omgivet af Vestvolden og Utterslev Mose i den nordvestlige udkant af Københavns Kommune, knap 10 km. fra Rådhuspladsen. Postnummeret er 2700 Brønshøj.', 'Tingbjerg', 'Tingbjerg'),
(5, 'Mads Egeskov', 'oster.jpg', 'Østerbro er en administrativ bydel i København med 76.402 indbyggere (2016). Bydelens areal er 8,74 km2 og befolkningstætheden på 8.116 indbyggere pr. km2. Dog indgår f.x. Fælledparken og Nordhavn i arealet.', 'Østerbro', 'Østerbro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brugere`
--
ALTER TABLE `brugere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brugere`
--
ALTER TABLE `brugere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
