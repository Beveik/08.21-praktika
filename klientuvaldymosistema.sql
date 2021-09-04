-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 11:55 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klientuvaldymosistema`
--

-- --------------------------------------------------------

--
-- Table structure for table `imones`
--

CREATE TABLE `imones` (
  `ID` int(4) NOT NULL,
  `pavadinimas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `tipas_id` int(4) NOT NULL,
  `aprasymas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `imones`
--

INSERT INTO `imones` (`ID`, `pavadinimas`, `tipas_id`, `aprasymas`) VALUES
(4, 'JR Land', 1, 'Nekilnojamas turtas'),
(5, 'Dermofaktorius', 2, 'Manilla kosmetika'),
(6, 'AAAA Europe Distribution', 2, 'Gentle Day®'),
(7, 'Linoksa', 2, 'nerūdijančio plieno ir aliuminio prekyba'),
(8, 'Aštuoneto grupė', 1, 'Energetika, investicinė veikla, komunalinės paslaugos'),
(9, 'Auarta', 2, 'Vandentiekis, Nuotekos, Šildymas, Vėsinimas'),
(10, 'AUTOWIN.EU', 2, 'Automobilių dalys'),
(11, 'ECO SPRENDIMAI', 2, 'Elektros prekės'),
(12, 'Adveitas', 2, 'interneto svetainės, grafikos dizainas'),
(13, 'Lietuvos paštas', 3, 'pašto paslaugos'),
(14, 'Swedbank', 3, 'Banko paslaugos'),
(18, 'Misija sukurti', 1, 'dizaino darbai'),
(20, 'naujas', 1, 'aprašymas'),
(22, 'imo', 2, 'imo');

-- --------------------------------------------------------

--
-- Table structure for table `imones_tipas`
--

CREATE TABLE `imones_tipas` (
  `ID` int(4) NOT NULL,
  `pavadinimas` varchar(120) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `im_aprasymas` varchar(120) COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Dumping data for table `imones_tipas`
--

INSERT INTO `imones_tipas` (`ID`, `pavadinimas`, `im_aprasymas`) VALUES
(1, 'MB', 'Mažoji bendrija'),
(2, 'UAB', 'Uždaroji akcinė bendrovė'),
(3, 'AB', 'Akcinė bendrovė');

-- --------------------------------------------------------

--
-- Table structure for table `klientai`
--

CREATE TABLE `klientai` (
  `ID` int(4) NOT NULL,
  `vardas` varchar(120) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `pavarde` varchar(120) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `teises_id` int(4) NOT NULL,
  `aprasymas` varchar(1000) COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Dumping data for table `klientai`
--

INSERT INTO `klientai` (`ID`, `vardas`, `pavarde`, `teises_id`, `aprasymas`) VALUES
(2, 'Vardas2', 'Pavardė2', 3, 'Vardas2@pavarde2.lt'),
(15, 'pridetas', 'perPHP', 6, ''),
(4, 'Vardas4', 'Pavarde4', 2, ''),
(6, 'Vardas6', 'Pavarde6', 1, ''),
(7, 'PakeistasPHP', 'Pavarde10', 3, ''),
(8, 'Vardas9', 'Pavarde9', 2, ''),
(9, 'Vardas7', 'Pavrde7', 1, ''),
(10, 'Vardas6', 'Pavardė6', 3, ''),
(11, 'Vardenis', 'Pavardenis', 1, ''),
(12, 'pridetas', 'perPHP', 6, ''),
(13, 'pridetas', 'perPHP', 6, ''),
(14, 'pridetas', 'perPHP', 6, ''),
(16, 'test', 'test', 5, ''),
(17, 'test', 'test', 5, ''),
(848, 'Vardas22', 'test2', 2, 'naujas aprasymas'),
(822, 'naujas', 'klientas', 2, ''),
(823, 'naujas', 'klientas', 2, ''),
(846, 'kva', 'kva', 7, 'kva kva'),
(619, 'name1', 'surname1', 1, ''),
(620, 'name2', 'surname2', 9, ''),
(621, 'name3', 'surname3', 1, ''),
(622, 'name4', 'surname4', 1, ''),
(623, 'name5', 'surname5', 9, ''),
(624, 'name6', 'surname6', 1, ''),
(625, 'name7', 'surname7', 1, ''),
(626, 'name8', 'surname8', 1, ''),
(627, 'name9', 'surname9', 9, ''),
(628, 'name10', 'surname10', 9, ''),
(629, 'name11', 'surname11', 1, ''),
(630, 'name12', 'surname12', 9, ''),
(631, 'name13', 'surname13', 1, ''),
(632, 'name14', 'surname14', 9, ''),
(633, 'name15', 'surname15', 1, ''),
(634, 'name16', 'surname16', 9, ''),
(635, 'name17', 'surname17', 1, ''),
(636, 'name18', 'surname18', 1, ''),
(637, 'name19', 'surname19', 9, ''),
(638, 'name20', 'surname20', 1, ''),
(639, 'name21', 'surname21', 1, ''),
(640, 'name22', 'surname22', 1, ''),
(641, 'name23', 'surname23', 1, ''),
(642, 'name24', 'surname24', 1, ''),
(643, 'name25', 'surname25', 1, ''),
(644, 'name26', 'surname26', 1, ''),
(645, 'name27', 'surname27', 9, ''),
(646, 'name28', 'surname28', 1, ''),
(647, 'name29', 'surname29', 1, ''),
(648, 'name30', 'surname30', 1, ''),
(649, 'name31', 'surname31', 9, ''),
(650, 'name32', 'surname32', 1, ''),
(651, 'name33', 'surname33', 9, ''),
(652, 'name34', 'surname34', 1, ''),
(653, 'name35', 'surname35', 1, ''),
(654, 'name36', 'surname36', 1, ''),
(655, 'name37', 'surname37', 9, ''),
(656, 'name38', 'surname38', 9, ''),
(657, 'name39', 'surname39', 9, ''),
(658, 'name40', 'surname40', 9, ''),
(659, 'name41', 'surname41', 1, ''),
(660, 'name42', 'surname42', 9, ''),
(661, 'name43', 'surname43', 9, ''),
(662, 'name44', 'surname44', 1, ''),
(663, 'name45', 'surname45', 9, ''),
(664, 'name46', 'surname46', 9, ''),
(665, 'name47', 'surname47', 1, ''),
(666, 'name48', 'surname48', 1, ''),
(667, 'name49', 'surname49', 1, ''),
(668, 'name50', 'surname50', 1, ''),
(669, 'name51', 'surname51', 1, ''),
(670, 'name52', 'surname52', 1, ''),
(671, 'name53', 'surname53', 9, ''),
(672, 'name54', 'surname54', 1, ''),
(673, 'name55', 'surname55', 1, ''),
(674, 'name56', 'surname56', 1, ''),
(675, 'name57', 'surname57', 1, ''),
(676, 'name58', 'surname58', 9, ''),
(677, 'name59', 'surname59', 9, ''),
(678, 'name60', 'surname60', 1, ''),
(679, 'name61', 'surname61', 1, ''),
(680, 'name62', 'surname62', 9, ''),
(681, 'name63', 'surname63', 9, ''),
(682, 'name64', 'surname64', 1, ''),
(683, 'name65', 'surname65', 9, ''),
(684, 'name66', 'surname66', 1, ''),
(685, 'name67', 'surname67', 1, ''),
(686, 'name68', 'surname68', 1, ''),
(687, 'name69', 'surname69', 9, ''),
(688, 'name70', 'surname70', 9, ''),
(689, 'name71', 'surname71', 1, ''),
(690, 'name72', 'surname72', 9, ''),
(691, 'name73', 'surname73', 9, ''),
(692, 'name74', 'surname74', 1, ''),
(693, 'name75', 'surname75', 1, ''),
(694, 'name76', 'surname76', 1, ''),
(695, 'name77', 'surname77', 9, ''),
(696, 'name78', 'surname78', 9, ''),
(697, 'name79', 'surname79', 1, ''),
(698, 'name80', 'surname80', 1, ''),
(699, 'name81', 'surname81', 1, ''),
(700, 'name82', 'surname82', 1, ''),
(701, 'name83', 'surname83', 1, ''),
(702, 'name84', 'surname84', 1, ''),
(703, 'name85', 'surname85', 1, ''),
(704, 'name86', 'surname86', 9, ''),
(705, 'name87', 'surname87', 9, ''),
(706, 'name88', 'surname88', 9, ''),
(707, 'name89', 'surname89', 9, ''),
(708, 'name90', 'surname90', 9, ''),
(709, 'name91', 'surname91', 9, ''),
(710, 'name92', 'surname92', 9, ''),
(711, 'name93', 'surname93', 1, ''),
(712, 'name94', 'surname94', 1, ''),
(713, 'name95', 'surname95', 1, ''),
(714, 'name96', 'surname96', 1, ''),
(715, 'name97', 'surname97', 9, ''),
(716, 'name98', 'surname98', 1, ''),
(717, 'name99', 'surname99', 9, ''),
(718, 'name100', 'surname100', 1, ''),
(719, 'name101', 'surname101', 1, ''),
(720, 'name102', 'surname102', 9, ''),
(721, 'name103', 'surname103', 9, ''),
(722, 'name104', 'surname104', 1, ''),
(723, 'name105', 'surname105', 1, ''),
(724, 'name106', 'surname106', 9, ''),
(725, 'name107', 'surname107', 1, ''),
(726, 'name108', 'surname108', 9, ''),
(727, 'name109', 'surname109', 9, ''),
(728, 'name110', 'surname110', 9, ''),
(729, 'name111', 'surname111', 1, ''),
(730, 'name112', 'surname112', 1, ''),
(731, 'name113', 'surname113', 1, ''),
(732, 'name114', 'surname114', 1, ''),
(733, 'name115', 'surname115', 1, ''),
(734, 'name116', 'surname116', 9, ''),
(735, 'name117', 'surname117', 1, ''),
(736, 'name118', 'surname118', 1, ''),
(737, 'name119', 'surname119', 1, ''),
(738, 'name120', 'surname120', 1, ''),
(739, 'name121', 'surname121', 1, ''),
(740, 'name122', 'surname122', 9, ''),
(741, 'name123', 'surname123', 9, ''),
(742, 'name124', 'surname124', 9, ''),
(743, 'name125', 'surname125', 1, ''),
(744, 'name126', 'surname126', 1, ''),
(745, 'name127', 'surname127', 9, ''),
(746, 'name128', 'surname128', 1, ''),
(747, 'name129', 'surname129', 9, ''),
(748, 'name130', 'surname130', 1, ''),
(749, 'name131', 'surname131', 9, ''),
(750, 'name132', 'surname132', 9, ''),
(751, 'name133', 'surname133', 9, ''),
(752, 'name134', 'surname134', 1, ''),
(753, 'name135', 'surname135', 9, ''),
(754, 'name136', 'surname136', 1, ''),
(755, 'name137', 'surname137', 1, ''),
(756, 'name138', 'surname138', 1, ''),
(757, 'name139', 'surname139', 1, ''),
(758, 'name140', 'surname140', 9, ''),
(759, 'name141', 'surname141', 1, ''),
(760, 'name142', 'surname142', 1, ''),
(761, 'name143', 'surname143', 1, ''),
(762, 'name144', 'surname144', 9, ''),
(763, 'name145', 'surname145', 9, ''),
(764, 'name146', 'surname146', 1, ''),
(765, 'name147', 'surname147', 1, ''),
(766, 'name148', 'surname148', 1, ''),
(767, 'name149', 'surname149', 1, ''),
(768, 'name150', 'surname150', 9, ''),
(769, 'name151', 'surname151', 1, ''),
(770, 'name152', 'surname152', 9, ''),
(771, 'name153', 'surname153', 9, ''),
(772, 'name154', 'surname154', 1, ''),
(773, 'name155', 'surname155', 9, ''),
(774, 'name156', 'surname156', 9, ''),
(775, 'name157', 'surname157', 9, ''),
(776, 'name158', 'surname158', 1, ''),
(777, 'name159', 'surname159', 9, ''),
(778, 'name160', 'surname160', 1, ''),
(779, 'name161', 'surname161', 9, ''),
(780, 'name162', 'surname162', 1, ''),
(781, 'name163', 'surname163', 9, ''),
(782, 'name164', 'surname164', 1, ''),
(783, 'name165', 'surname165', 1, ''),
(784, 'name166', 'surname166', 1, ''),
(785, 'name167', 'surname167', 9, ''),
(786, 'name168', 'surname168', 1, ''),
(787, 'name169', 'surname169', 9, ''),
(788, 'name170', 'surname170', 1, ''),
(789, 'name171', 'surname171', 9, ''),
(790, 'name172', 'surname172', 1, ''),
(791, 'name173', 'surname173', 9, ''),
(792, 'name174', 'surname174', 1, ''),
(793, 'name175', 'surname175', 9, ''),
(794, 'name176', 'surname176', 1, ''),
(795, 'name177', 'surname177', 9, ''),
(796, 'name178', 'surname178', 9, ''),
(797, 'name179', 'surname179', 9, ''),
(798, 'name180', 'surname180', 1, ''),
(799, 'name181', 'surname181', 1, ''),
(800, 'name182', 'surname182', 1, ''),
(801, 'name183', 'surname183', 1, ''),
(802, 'name184', 'surname184', 1, ''),
(803, 'name185', 'surname185', 1, ''),
(804, 'name186', 'surname186', 9, ''),
(805, 'name187', 'surname187', 9, ''),
(806, 'name188', 'surname188', 9, ''),
(807, 'name189', 'surname189', 9, ''),
(808, 'name190', 'surname190', 1, ''),
(809, 'name191', 'surname191', 1, ''),
(810, 'name192', 'surname192', 1, ''),
(811, 'name193', 'surname193', 1, ''),
(812, 'name194', 'surname194', 9, ''),
(813, 'name195', 'surname195', 9, ''),
(814, 'name196', 'surname196', 9, ''),
(815, 'name197', 'surname197', 9, ''),
(816, 'name198', 'surname198', 9, ''),
(849, 'su', 'aprasymu', 3, 'test'),
(821, 'naujas', 'klientas', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `klientai_rikiavimas`
--

CREATE TABLE `klientai_rikiavimas` (
  `ID` int(4) DEFAULT NULL,
  `rikiavimo_pavadinimas` varchar(120) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `rikiavimo_stulpelis` varchar(120) COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Dumping data for table `klientai_rikiavimas`
--

INSERT INTO `klientai_rikiavimas` (`ID`, `rikiavimo_pavadinimas`, `rikiavimo_stulpelis`) VALUES
(15, 'ID', 'klientai.ID'),
(21, 'Kliento pavardė', 'klientai.pavarde'),
(17, 'Kliento teisės', 'klientai_teises.pavadinimas');

-- --------------------------------------------------------

--
-- Table structure for table `klientai_teises`
--

CREATE TABLE `klientai_teises` (
  `ID` int(4) NOT NULL,
  `reiksme` int(4) NOT NULL,
  `pavadinimas` text COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Dumping data for table `klientai_teises`
--

INSERT INTO `klientai_teises` (`ID`, `reiksme`, `pavadinimas`) VALUES
(1, 2, 'Neaktyvus klientas'),
(2, 3, 'Nemokus klientas'),
(3, 4, 'Užsienio (ne EU) klientas'),
(4, 5, 'Užsienio (EU) klientas'),
(5, 9, 'Naujas klientas'),
(6, 1, 'Ilgalaikis klientas'),
(7, 6, 'Buvęs klientas'),
(8, 7, 'Grįžęs klientas'),
(9, 8, 'Lojalus klientas');

-- --------------------------------------------------------

--
-- Table structure for table `klietnai_teises`
--

CREATE TABLE `klietnai_teises` (
  `reiksme` int(4) NOT NULL,
  `pavadinimas` text COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE `registracija` (
  `ID` int(4) NOT NULL,
  `isjungimas` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`ID`, `isjungimas`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uzsiregistrave_vartotojai`
--

CREATE TABLE `uzsiregistrave_vartotojai` (
  `ID` int(4) NOT NULL,
  `slapyvardis` text COLLATE utf8_lithuanian_ci NOT NULL,
  `vardas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `pavarde` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `slaptazodis` text COLLATE utf8_lithuanian_ci NOT NULL,
  `teises_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `uzsiregistrave_vartotojai`
--

INSERT INTO `uzsiregistrave_vartotojai` (`ID`, `slapyvardis`, `vardas`, `pavarde`, `slaptazodis`, `teises_id`) VALUES
(1, 'admin', 'vardas1', 'pavarde1', 'admin', 1),
(2, 'vartotojas', 'name2', 'surname2', 'vartotojas', 2),
(5, 'name1', 'name5', 'surname5', 'name1', 3),
(6, 'name2', 'name6', 'surname6', 'name2', 4),
(7, 'name3', 'name7', 'surname7', 'name3', 2),
(8, 'name4', 'name8', 'surname8', 'name4', 2),
(9, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(10, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(11, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(12, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(13, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(14, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(15, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(16, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(17, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(18, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(19, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(20, 'zyzius', 'Miglė', 'Šlepikaitė-Žižė', 'labas', 1),
(21, 'zyzius', 'Miglė', 'ssss', 'labas', 1),
(22, 'zyzius', 'Miglė', 'ssss', 'labas', 1),
(23, 'mamaAM', 'MAM', 'MA', 'LABAS', 1),
(24, 'mamaAM', 'MAM', 'MA', 'LABAS', 1),
(25, 'mamaAM', 'MAM', 'MA', 'LABAS', 1),
(26, 'mamaAM', 'MAM', 'MA', 'LABAS', 1),
(27, 'mamaAM', 'MAM', 'MA', 'LABAS', 1),
(28, 'mamaAM', 'MAM', 'MA', 'LABAS', 1),
(29, 'gg', 'gg', 'gg', 'gggr', 1),
(30, 'er', 'er', 'er', 'erer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vartotojai`
--

CREATE TABLE `vartotojai` (
  `ID` int(4) NOT NULL,
  `vardas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `pavarde` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `slapyvardis` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `slaptazodis` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `teises_id` int(4) NOT NULL,
  `registracijos_data` datetime NOT NULL,
  `paskutinis_prisijungimas` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `vartotojai`
--

INSERT INTO `vartotojai` (`ID`, `vardas`, `pavarde`, `slapyvardis`, `slaptazodis`, `teises_id`, `registracijos_data`, `paskutinis_prisijungimas`) VALUES
(4, 'vardas144', 'pavarde144', 'vardasvardas', 'vardas', 1, '2021-08-23 00:00:00', '2021-09-04 11:40:59'),
(5, 'vardas15', 'pavarde15', 'vardenis', 'vardenis', 3, '2021-08-28 00:00:00', '2021-08-28 00:00:00'),
(6, 'vardas16', 'pavarde16', 'vardukas', 'vardukas', 1, '2021-05-05 00:00:00', '2021-09-04 14:16:11'),
(8, 'labas', 'krabas', 'as', 'tu', 4, '2021-08-28 00:00:00', '2021-09-04 11:29:54'),
(9, 'tu1', 'tu2', 'tu', 'tutu', 2, '2021-08-28 00:00:00', '2021-09-05 00:45:02'),
(11, 'rusejo', 'keturi', 'keturi', 'keturi', 4, '2021-09-04 11:38:10', '2021-09-04 11:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `vartotojai_rikiavimas`
--

CREATE TABLE `vartotojai_rikiavimas` (
  `ID` int(4) NOT NULL,
  `rikiavimo_pavadinimas` varchar(120) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `rikiavimo_stulpelis` varchar(120) COLLATE utf8mb4_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Dumping data for table `vartotojai_rikiavimas`
--

INSERT INTO `vartotojai_rikiavimas` (`ID`, `rikiavimo_pavadinimas`, `rikiavimo_stulpelis`) VALUES
(15, 'ID', 'klientai.ID'),
(17, 'Kliento teisės', 'klientai_teises.pavadinimas'),
(21, 'Kliento pavardė', 'klientai.pavarde');

-- --------------------------------------------------------

--
-- Table structure for table `vartotojai_teises`
--

CREATE TABLE `vartotojai_teises` (
  `ID` int(4) NOT NULL,
  `pavadinimas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `aprasymas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `vartotojai_teises`
--

INSERT INTO `vartotojai_teises` (`ID`, `pavadinimas`, `aprasymas`) VALUES
(1, 'admin', 'administratorius'),
(2, 'vadyb', 'vadybininkas'),
(3, 'inspekt', 'inspektorius'),
(4, 's_admin', 'sistemos administratorius'),
(5, 'vart', 'vartotojas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imones`
--
ALTER TABLE `imones`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `imones_tipas`
--
ALTER TABLE `imones_tipas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `klientai`
--
ALTER TABLE `klientai`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `klientai_teises`
--
ALTER TABLE `klientai_teises`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uzsiregistrave_vartotojai`
--
ALTER TABLE `uzsiregistrave_vartotojai`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vartotojai`
--
ALTER TABLE `vartotojai`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vartotojai_rikiavimas`
--
ALTER TABLE `vartotojai_rikiavimas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vartotojai_teises`
--
ALTER TABLE `vartotojai_teises`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imones`
--
ALTER TABLE `imones`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `imones_tipas`
--
ALTER TABLE `imones_tipas`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `klientai`
--
ALTER TABLE `klientai`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=850;

--
-- AUTO_INCREMENT for table `klientai_teises`
--
ALTER TABLE `klientai_teises`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uzsiregistrave_vartotojai`
--
ALTER TABLE `uzsiregistrave_vartotojai`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vartotojai`
--
ALTER TABLE `vartotojai`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vartotojai_rikiavimas`
--
ALTER TABLE `vartotojai_rikiavimas`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vartotojai_teises`
--
ALTER TABLE `vartotojai_teises`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
