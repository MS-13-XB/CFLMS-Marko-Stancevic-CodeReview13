-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Aug 2020 um 16:55
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr13_marko_stancevic_bigevents`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `contact_email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone_number` int(11) NOT NULL,
  `address` varchar(178) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `description`, `image`, `capacity`, `contact_email`, `contact_phone_number`, `address`, `url`, `type`) VALUES
(1, '2020 World Gishiki & IOGKF 41th Anniversary celebration', '2020-08-30', 'GojuRyuKarateDo;GojuRyuKarateDo;GojuRyuKarateDo', 'https://www.iogkf.co.za/wp-content/uploads/2020/01/IMG_0681.jpg', 500, 'admin.office@iogkf.com', 2147483647, '5125 Unit 7 Harvester Road.\r\nBurlington, ON L7L 6A2\r\nCanada', 'https://iogkf.com/', 'sport'),
(2, 'Twin City Gasshuku', '2020-10-04', 'SeminarSeminarSeminar', 'http://www.iogkf-austria.at/MEDIA/2020_TwinCity_2020_TwinCity_-Screen%20Shot%20Poster--3.png', 52, 'SenseiBakkie@mail.com', 2147483647, 'Novohradska Street 3, Bratislava, Slowakei', 'URL', 'sport'),
(3, 'Rickson Gracie Seminar - Educational Series', '2020-09-09', 'JIU JITSU for LIFE\r\n- our future\r\n- our meaning\r\n- our philosophy Rickson Gracie, son of Helio Gracie, the co-founder of Brazilian Jiu Jitsu, was born on November 21st, 1959 in Rio de Janeiro, Brazil. As an 8th degree coral belt, Rickson fought for decade', 'https://www.graciemag.com/wp-content/uploads/2018/03/rickson-butterfly-1-1-gallerr-e1520949159944.jpg', 420, 'ricksongracie@mail.com', 2147483647, 'Ricardo Barros Jiu-Jitsu\r\n6730 Lone Tree WayBrentwood, CA, 94513United States', 'https://www.ricksongracie.com/', 'lifestyle'),
(6, 'Sekai Budosai', '2020-03-15', 'Morio Higaonna', 'https://travel67.files.wordpress.com/2014/09/645z6834se640.jpg?w=840', 510, 'iogkf@mail.com', 187546985, ' Naha, Okinawa im Kenritsu Budokan', 'no found', 'sport'),
(7, 'South African Black Belt Gasshuku with Sensei Bakkies', '2023-04-09', 'Bunkai & Kata and focus on the beginners mind !', 'https://live.staticflickr.com/5294/5479195885_d32f611234_z.jpg', 90, 'bakkie@mail.com', 1284757, 'Honbu Dojo, Stellenbosch, South Africa', 'no found', 'sport'),
(9, 'South Africa Instructors Gasshuku', '2023-01-31', 'We trained only (!) basic punching, basic front kick and loads of body moving (taisabaki). Then applying these techniques in partner trainings plus a good free fighting (irikumi) session.\r\nThen onto Gekisai Dai Ichi & Ni Kata plus Sanseiru Kata and some B', 'http://www.iogkf-austria.at/MEDIA/2020_SA%20Instructors2020_SA%20Instructors-149827_1447706038118_1906110_n--1-large.jpg?1580934215942', 50, 'bakkie@mail.com', 25847122, 'Honbu Dojo, Stellenbosch, South Africa', 'no found', 'sport'),
(10, 'Gui Valente Seminar', '2019-01-04', 'On January 4th, Professor Gui returned to the VB Study Group in Veesp, Netherlands  led by Eric van Looijen for the annual Valente Brothers Seminar. Professor Gui taught two specialization seminars, focusing on headlock defenses and the closed guard.', 'https://valentebrothers.com/wp-content/uploads/2020/04/guiinveesp.jpg', 300, 'valente@mail.com', 1245786, 'Firststreet 4, LA, USA', 'no found', 'lifestyle'),
(11, 'Test', '2016-01-01', 'TEST', 'test/test/test', 300, 'test@mail.com', 1234567, 'teststreet3', 'no found', 'nutrition');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
