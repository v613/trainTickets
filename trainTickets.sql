-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2016 at 12:48 
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainTickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `paswd` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `last_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `paswd`, `login`, `last_date`) VALUES
(1, 'petros-naghibatorXXXL', 'petru', '2016-06-02 13:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `name` varchar(20) NOT NULL,
  `distance` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`name`, `distance`) VALUES
('Anenii Noi', 35),
('Balti', 135),
('Basarabeasca', 95),
('Bender', 60),
('Briceni', 239),
('Cahul', 168),
('Calarasi', 53),
('Cantemir', 121),
('Causeni', 70),
('Chisinau', 0),
('Cimislia', 68),
('Comrat', 99),
('Donduseni', 215),
('Drochia', 190),
('Falesti', 138),
('Floresti', 125),
('Glodeni', 167),
('Ocnita', 242),
('Rezina', 99),
('Ribnita', 105),
('Soldanesti', 108),
('Straseni', 27),
('Taraclia', 69),
('Tiraspol', 70),
('Ugheni', 110);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `description` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `text`, `date`) VALUES
(1, 'Ziua Copiilor', 'Cu prilejul Zilei ocrotirii copilului, in data de 1 iunie, CFM va oferi bilete de calatorie gratuite pentru fiecare parinte insotit de copilul sau cu virsta de pina la 7 ani.', 'An de an, ï¿½n prima zi de var? este celebrat? Ziua Interna?ional? a Copilului. ï¿½.S. ï¿½Calea Ferat? din Moldovaï¿½ continu? s? promoveze valorile unei societ??i formate din familii ï¿½mplinite, s?n?toase ?i fericite. Copiii din ?ara noastr? au tot mai mult? nevoie de sprijin, afec?iune ?i aten?ia p?rin?ilor.\r\n\r\nCu prilejul Zilei ocrotirii copilului, ï¿½n data de 1 iunie, CFM va oferi bilete de c?l?torie gratuite pentru fiecare p?rinte ï¿½nso?it de copilul s?u cu vï¿½rsta de pï¿½n? la 7 ani.\r\n\r\nDecizia luat? de Directorul General al ï¿½.S. Calea Ferat? din Moldova, Iurii Topala, vine s? sus?in? participarea tinerei genera?ii ï¿½n cadrul  evenimentelor  cultural-artistice dedicate Zilei ocrotirii copilului, precum ?i s? ofere micu?ilor posibilitatea de a cunoa?te o nou? experien?? - c?l?toria cu trenul.\r\n\r\nPe lï¿½ng? aceasta, miercuri, sediul Direc?iei CFM se va transform? ï¿½ntr-o galerie cu operele de art? ale copiilor ai c?ror p?rin?i sunt angaja?i ï¿½n cadrul ï¿½.S. ï¿½Calea Ferat? din Moldovaï¿½.', '2016-06-02 13:42:59'),
(2, 'Topala si Executivul RO', 'Directorul General al ï¿½.S. ï¿½Calea Ferat? din Moldovaï¿½, Iurii Topala, prezent la gara, a transmis un mesaj de multumire Executivului din Romania pentru suportul considerabil pe care ï¿½l acord?', '1300 de tone de p?cur?, puse la dispozi?ie de Guvernul Romï¿½niei, au fost transportate pe liniile de cale ferat? a celor dou? ??ri. Gara Feroviar? din Chi?in?u a fost punctul de destina?ie a garniturii care a adus, ast?zi, cele 24 de cisterne. Mai mul?i oficiali din Moldova, printre care Vicepremierul Gheorghe Brega, al?turi de Ambasadorul Romï¿½niei la Chi?in?u, Marius Lazurc?, au ï¿½ntï¿½mpinat locomotiva.\r\n\r\nDirectorul General al ï¿½.S. ï¿½Calea Ferat? din Moldovaï¿½, Iurii Topala, prezent la gar?, a transmis un mesaj de mul?umire Executivului din Romï¿½nia pentru suportul considerabil pe care ï¿½l acord? Republicii Moldova.\r\n\r\nPotrivit oficialilor, p?cura va fi p?strat? ï¿½n depozitele Termoelectrica SA ?i va fi folosit? pentru ï¿½nc?lzirea ora?ului Chi?in?u ï¿½n sezonul rece. Aceasta va servi ?i ca subven?ii la ï¿½nc?lzire pentru 40 de mii de locuitori social vulnerabili din municipiul Chi?in?u.', '2016-06-02 13:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `client` varchar(50) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `price` int(4) NOT NULL,
  `place` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client`, `sch_id`, `price`, `place`) VALUES
(1, 'Focsa Petru', 1, 150, 2),
(2, 'Ceban Dumitru', 1, 175, 19),
(7, 'Ion Tronciu', 3, 175, 32),
(9, 'Chiriliuc Silvia', 3, 175, 18),
(11, 'Ceban Dumitru', 1, 300, 20);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `id_train` int(2) NOT NULL,
  `start` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `start_time` varchar(20) NOT NULL,
  `destination_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `id_train`, `start`, `destination`, `start_time`, `destination_time`) VALUES
(1, 6, 'Chisinau', 'Bender', '05/25/2016 7:00 PM', '05/25/2016 8:30 PM'),
(3, 3, 'Cahul', 'Causeni', '05/30/2016 2:15 PM', '05/30/2016 4:15 PM'),
(4, 1, 'Anenii Noi', 'Basarabeasca', '05/29/2016 10:26 PM', '05/30/2016 10:26 PM');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(2) NOT NULL,
  `type` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `place` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `type`, `name`, `place`) VALUES
(1, 'pasager', 'KRMI-P', 300),
(2, 'pasager', 'LSAKFJ-P', 600),
(3, 'pasager', 'ASD-P', 350),
(4, 'marfa', 'FS48', 0),
(5, 'marfa', 'FS52', 0),
(6, 'pasager', 'KJK-P', 400);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type`) VALUES
('marfa'),
('pasager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
