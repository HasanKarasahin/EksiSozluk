-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 May 2017, 13:38:25
-- Sunucu sürümü: 5.7.14
-- PHP Sürümü: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eksisozlukdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `altmenu`
--

CREATE TABLE `altmenu` (
  `id` int(11) NOT NULL,
  `menu` varchar(225) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `altmenu`
--

INSERT INTO `altmenu` (`id`, `menu`) VALUES
(1, 'iletişim'),
(2, 'kullanım koşulları'),
(3, 'gizlilik politikamız'),
(4, 'sss'),
(5, 'istatistikler'),
(6, 'sub-etha'),
(7, 'twitter'),
(8, 'facebook');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `badi`
--

CREATE TABLE `badi` (
  `takipeden` int(11) NOT NULL,
  `takipedilen` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `badi`
--

INSERT INTO `badi` (`takipeden`, `takipedilen`) VALUES
(17, 16),
(17, 19),
(19, 17),
(17, 18),
(18, 17),
(19, 18),
(18, 19);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basliklartbl`
--

CREATE TABLE `basliklartbl` (
  `BaslikId` int(11) NOT NULL,
  `BaslikAdi` varchar(225) COLLATE utf16_turkish_ci NOT NULL,
  `KatagoriId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `basliklartbl`
--

INSERT INTO `basliklartbl` (`BaslikId`, `BaslikAdi`, `KatagoriId`) VALUES
(1, 'Aykut Kocaman Fenerde', 1),
(2, 'beymen\'de indirimle 675 tl\'ye düşen anahtarlık', 2),
(3, '2017 sonunda pkk\'nın tamamen bitecek olması', 3),
(6, 'Van Persie Gol Orucunu Bozdu', 1),
(7, 'Rte ne istiyor', 3),
(8, 'İlk yerli otomotiv satişi', 4),
(10, 'Aşik Oluyorum', 2),
(11, 'Nerde Eski bayramlar', 2),
(12, 'Futbolum katillleri', 1),
(13, 'Evet mi Hayir mi', 3),
(14, 'Porche', 4),
(24, 'arabalar', 4),
(25, 'lan', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `denemetbl`
--

CREATE TABLE `denemetbl` (
  `asdasd1` int(11) NOT NULL,
  `asdasd2` int(11) NOT NULL,
  `asdasdasd` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `denemetbl`
--

INSERT INTO `denemetbl` (`asdasd1`, `asdasd2`, `asdasdasd`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `katagoritbl`
--

CREATE TABLE `katagoritbl` (
  `KatagoriId` int(11) NOT NULL,
  `KatagoriAdi` varchar(225) COLLATE utf16_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `katagoritbl`
--

INSERT INTO `katagoritbl` (`KatagoriId`, `KatagoriAdi`) VALUES
(1, 'spor'),
(2, 'ilişkiler'),
(3, 'siyaset'),
(4, 'otomotiv');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `MesajId` int(11) NOT NULL,
  `AliciId` int(11) NOT NULL,
  `GondericiId` int(11) NOT NULL,
  `MesajGun` int(11) NOT NULL,
  `MesajAy` int(11) NOT NULL,
  `MesajYil` int(11) NOT NULL,
  `Mesaj` varchar(225) COLLATE utf16_turkish_ci NOT NULL,
  `zaman` time NOT NULL,
  `gorulme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`MesajId`, `AliciId`, `GondericiId`, `MesajGun`, `MesajAy`, `MesajYil`, `Mesaj`, `zaman`, `gorulme`) VALUES
(2, 14, 17, 7, 4, 2017, 'Nasilsin inşallah', '21:05:00', 0),
(3, 14, 17, 7, 4, 2017, 'Cevap versene kardes', '21:08:10', 0),
(4, 17, 14, 7, 4, 2017, 'Burdayim burdayim', '21:18:00', 0),
(5, 14, 17, 7, 4, 2017, 'Ne yaptin', '22:25:17', 0),
(6, 14, 17, 7, 4, 2017, 'Ne yaptin', '22:25:17', 0),
(7, 14, 17, 7, 4, 2017, 'Ne yaptin', '22:25:17', 0),
(10, 14, 17, 7, 4, 2017, 'Laaan', '22:25:17', 0),
(11, 14, 17, 7, 4, 2017, 'Laaan', '22:25:17', 0),
(12, 14, 17, 7, 4, 2017, 'Reis Naber', '22:25:17', 0),
(13, 14, 17, 7, 4, 2017, 'Nasil gidiyor', '22:25:17', 0),
(14, 14, 17, 7, 4, 2017, 'hahahaa', '22:25:17', 0),
(15, 14, 17, 7, 4, 2017, 'Hasasdasdads', '22:25:17', 0),
(16, 14, 17, 7, 4, 2017, 'Hasan', '22:25:17', 0),
(17, 14, 17, 7, 4, 2017, 'Naber', '22:25:17', 0),
(18, 14, 17, 7, 4, 2017, 'sfdsfsdf', '22:25:17', 0),
(19, 14, 17, 7, 4, 2017, 'lan ibne nerdesin', '22:25:17', 0),
(20, 14, 17, 7, 4, 2017, 'ffdgdfg', '22:25:17', 0),
(21, 16, 17, 7, 4, 2017, 'Nerdesin panpa', '22:25:17', 0),
(22, 16, 17, 7, 4, 2017, 'Nasil Gidiyor', '22:25:17', 0),
(23, 15, 17, 7, 4, 2017, 'Reis nerdesin', '22:25:17', 0),
(24, 14, 17, 7, 4, 2017, 'laaan\r\n', '22:25:17', 0),
(25, 14, 17, 7, 4, 2017, 'meraba', '22:25:17', 0),
(26, 16, 17, 7, 4, 2017, 'sdfsdfsdf', '22:25:17', 0),
(27, 15, 17, 7, 4, 2017, 'lklk', '22:25:17', 0),
(28, 15, 17, 7, 4, 2017, 'jkljkl', '22:25:17', 0),
(29, 19, 17, 7, 4, 2017, 'Hİ GUYS', '22:25:17', 0),
(30, 18, 17, 7, 4, 2017, 'faruk kanka', '22:25:17', 0),
(31, 18, 17, 7, 4, 2017, 'nasilsin', '22:25:17', 0),
(32, 18, 17, 7, 4, 2017, 'naberr', '22:25:17', 0),
(33, 17, 19, 7, 4, 2017, 'lan', '22:25:17', 0),
(34, 17, 19, 7, 4, 2017, 'kankaa', '22:25:17', 0),
(35, 17, 19, 7, 4, 2017, 'naber', '22:25:17', 0),
(36, 19, 17, 7, 4, 2017, 'efendim', '22:25:17', 0),
(37, 17, 19, 7, 4, 2017, 'nasilsin', '22:25:17', 0),
(38, 19, 17, 7, 4, 2017, 'yess', '22:25:17', 0),
(39, 19, 17, 7, 4, 2017, 'deneme123', '22:25:17', 0),
(40, 17, 19, 7, 4, 2017, 'lan', '22:25:17', 0),
(41, 19, 17, 7, 4, 2017, 'nasilsin lan', '22:25:17', 0),
(42, 18, 17, 7, 4, 2017, 'kanka', '22:25:17', 0),
(43, 17, 18, 7, 4, 2017, 'hahahaaa', '22:25:17', 0),
(44, 17, 19, 7, 4, 2017, 'zaaaaaaa', '22:25:17', 0),
(45, 18, 19, 7, 4, 2017, 'merhaba kardes', '22:25:17', 0),
(46, 19, 18, 7, 4, 2017, 'merhabana merhaba kardes', '22:25:17', 0),
(47, 18, 19, 7, 4, 2017, 'nasiilsin', '22:25:17', 0),
(48, 19, 18, 7, 4, 2017, 'naptin', '22:25:17', 0),
(49, 16, 18, 7, 4, 2017, 'baksana sen bir', '22:25:17', 0),
(50, 16, 17, 7, 4, 2017, 'lan', '22:25:17', 0),
(51, 16, 17, 7, 4, 2017, 'Deneme1', '22:25:17', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ustmenu`
--

CREATE TABLE `ustmenu` (
  `id` int(11) NOT NULL,
  `menu` varchar(225) COLLATE utf8mb4_turkish_ci NOT NULL,
  `oturum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ustmenu`
--

INSERT INTO `ustmenu` (`id`, `menu`, `oturum`) VALUES
(9, 'bugün', 1),
(10, 'gündem', 0),
(11, 'tarihte bugün', 0),
(12, 'badi', 1),
(13, 'Şükela!', 1),
(14, 'Çok Kötü', 1),
(15, 'çaylaklar', 1),
(16, 'spor', 0),
(17, 'ilişkiler', 0),
(18, 'siyaset', 0),
(19, 'otomotiv', 0),
(21, 'video', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyelertbl`
--

CREATE TABLE `uyelertbl` (
  `id` int(11) NOT NULL,
  `nick` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `gun` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `ay` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `yil` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(11) NOT NULL,
  `ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyelertbl`
--

INSERT INTO `uyelertbl` (`id`, `nick`, `sifre`, `email`, `gun`, `ay`, `yil`, `yetki`, `ban`) VALUES
(16, 'the irlandali', '4585185', 'mars@outlook.com', '28', '02', '1976', 0, 1),
(17, 'Necati', '4585185', 'necati@hotmail.com', '10', 'ocak', '1996', 2, 0),
(19, 'Eren', '4585185', 'asdasd@hotmail.com', '12', '12', '1212', 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumbegeni`
--

CREATE TABLE `yorumbegeni` (
  `BaslikId` int(11) NOT NULL,
  `YorumId` int(11) NOT NULL,
  `YazarId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `yorumbegeni`
--

INSERT INTO `yorumbegeni` (`BaslikId`, `YorumId`, `YazarId`) VALUES
(2, 28, 17),
(2, 29, 17),
(2, 31, 17),
(2, 32, 17),
(2, 38, 17),
(2, 46, 17),
(8, 34, 19),
(13, 11, 19);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumdislike`
--

CREATE TABLE `yorumdislike` (
  `BaslikId` int(11) NOT NULL,
  `YorumId` int(11) NOT NULL,
  `YazarId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `yorumdislike`
--

INSERT INTO `yorumdislike` (`BaslikId`, `YorumId`, `YazarId`) VALUES
(8, 40, 17),
(13, 91, 17),
(13, 37, 17),
(13, 82, 17),
(13, 90, 17),
(13, 92, 17),
(13, 93, 17);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlartbl`
--

CREATE TABLE `yorumlartbl` (
  `YorumId` int(11) NOT NULL,
  `Yorum` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `YorumTarih` year(4) NOT NULL,
  `YorumAy` int(11) NOT NULL,
  `YorumGun` int(11) NOT NULL,
  `YorumSaati` time NOT NULL,
  `YazarId` int(11) NOT NULL,
  `BaslikId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlartbl`
--

INSERT INTO `yorumlartbl` (`YorumId`, `Yorum`, `YorumTarih`, `YorumAy`, `YorumGun`, `YorumSaati`, `YazarId`, `BaslikId`) VALUES
(8, 'Seviyorsan git konuş kanka', 2016, 8, 12, '18:27:14', 16, 10),
(11, 'asdasdasd', 2017, 9, 15, '20:05:21', 16, 13),
(12, 'asdasdasd', 2017, 3, 17, '08:25:25', 16, 14),
(22, 'robin kral', 2017, 4, 4, '00:03:11', 17, 6),
(24, 'cabuk burayi terket', 2017, 4, 4, '00:09:06', 17, 12),
(26, 'aaaaaaaaaa', 2017, 4, 4, '00:15:23', 17, 11),
(27, 'Merhaba', 2017, 4, 4, '00:25:51', 17, 1),
(28, 'Beymen', 2017, 4, 4, '00:26:31', 17, 2),
(31, 'indirim', 2017, 4, 5, '23:43:46', 17, 2),
(32, 'guzel', 2017, 4, 5, '23:45:29', 17, 2),
(34, 'Hasan', 2017, 4, 5, '23:52:55', 17, 8),
(35, 'fener', 2017, 4, 5, '23:54:09', 17, 6),
(36, 'asdasd', 2017, 4, 5, '23:56:17', 17, 10),
(37, 'hasan', 2017, 4, 5, '23:56:27', 17, 13),
(38, 'merhaba', 2017, 4, 6, '00:02:51', 17, 2),
(39, 'hasan', 2017, 4, 6, '00:06:44', 17, 6),
(40, 'DENEME123', 2017, 4, 6, '00:07:19', 17, 8),
(43, 'krall', 2017, 4, 6, '00:10:54', 17, 10),
(46, 'asdasdasd', 2017, 4, 6, '03:39:13', 17, 2),
(50, 'helallalala', 2017, 4, 6, '03:41:20', 17, 8),
(51, 'klklkl', 2017, 4, 10, '00:35:22', 17, 10),
(55, 'sdfsdfsdf', 2017, 4, 21, '09:58:55', 17, 3),
(56, 'selam', 2017, 4, 21, '10:18:57', 17, 3),
(57, 'ghgh', 2017, 4, 21, '10:34:43', 17, 3),
(58, 'yorum1', 2017, 5, 5, '01:03:32', 17, 6),
(59, 'yorum2', 2017, 5, 5, '01:03:40', 17, 6),
(60, 'yorum3', 2017, 5, 5, '01:03:44', 17, 6),
(61, 'yorum4', 2017, 5, 5, '01:03:48', 17, 6),
(62, 'yorum5', 2017, 5, 5, '01:03:52', 17, 6),
(63, 'yorum6', 2017, 5, 5, '01:03:55', 17, 6),
(66, 'yorum9', 2017, 5, 5, '01:04:10', 17, 6),
(67, 'yorum10', 2017, 5, 5, '01:04:15', 17, 6),
(68, 'yorum11', 2017, 5, 5, '01:04:21', 17, 6),
(69, 'yorum12', 2017, 5, 5, '01:04:25', 17, 6),
(70, 'yorum13', 2017, 5, 5, '01:04:31', 17, 6),
(71, 'yorum14', 2017, 5, 5, '01:04:35', 17, 6),
(72, 'yorum15', 2017, 5, 5, '01:04:40', 17, 6),
(73, 'yorum20', 2017, 5, 5, '01:04:45', 17, 6),
(75, 'yorum22', 2017, 5, 5, '01:04:54', 17, 6),
(76, 'yorum23', 2017, 5, 5, '01:04:59', 17, 6),
(78, 'yorum25', 2017, 5, 5, '01:05:09', 17, 6),
(80, 'dfdf', 2017, 5, 9, '02:36:12', 17, 3),
(81, 'eren burada', 2017, 5, 10, '14:27:54', 19, 6),
(82, 'deneme', 2017, 5, 10, '14:28:36', 19, 13),
(83, 'ÇKJNÇM.ÖÇ', 2017, 5, 10, '15:15:32', 19, 6),
(84, 'SDDFSDF', 2017, 5, 10, '15:16:37', 19, 7),
(85, 'denem1', 2017, 5, 10, '15:39:28', 17, 3),
(86, 'adasd', 2017, 5, 11, '01:49:25', 19, 7),
(89, 'merhaba', 2017, 5, 12, '02:04:42', 17, 2),
(90, 'Hasan', 2017, 5, 13, '15:37:42', 17, 13),
(91, 'deneme1', 2017, 5, 13, '15:59:06', 17, 13),
(92, 'deneme2', 2017, 5, 13, '16:02:18', 17, 13),
(93, 'deneme1', 2017, 5, 13, '16:02:24', 17, 13),
(94, 'deneme3', 2017, 5, 13, '16:02:41', 17, 13),
(95, 'deneme4', 2017, 5, 13, '16:02:49', 17, 13),
(96, 'deneme5', 2017, 5, 13, '16:06:08', 17, 13),
(97, 'ccok sey ıstıyor', 2017, 5, 13, '16:10:54', 17, 7),
(98, 'alalala', 2017, 5, 13, '16:11:02', 17, 7),
(99, 'asdasd', 2017, 5, 13, '16:11:05', 17, 7),
(100, 'adsasda', 2017, 5, 13, '16:11:11', 17, 7),
(101, 'asdasdasd', 2017, 5, 13, '16:11:16', 17, 7),
(102, 'asdasdasd', 2017, 5, 13, '16:11:21', 17, 7),
(103, 'oley', 2017, 5, 13, '16:13:39', 17, 1),
(104, 'oley1', 2017, 5, 13, '16:13:45', 17, 1),
(105, 'oley2', 2017, 5, 13, '16:13:50', 17, 1),
(106, 'oley3', 2017, 5, 13, '16:13:55', 17, 1),
(107, 'oley4', 2017, 5, 13, '16:14:01', 17, 1),
(108, 'oley5', 2017, 5, 13, '16:14:06', 17, 1),
(109, 'bir', 2017, 5, 13, '20:56:55', 17, 14),
(110, 'iki', 2017, 5, 13, '20:57:00', 17, 14),
(111, 'uc', 2017, 5, 13, '20:57:04', 17, 14),
(112, 'dort', 2017, 5, 13, '20:57:09', 17, 14),
(113, 'uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum', 2017, 5, 14, '01:41:29', 19, 14),
(114, 'derbeder', 2017, 5, 14, '15:23:50', 19, 10),
(115, 'biladerrr', 2017, 5, 14, '15:24:02', 19, 10),
(116, 'nerdeler burdalar', 2017, 5, 14, '15:24:11', 19, 10),
(117, 'zibam', 2017, 5, 14, '15:24:17', 19, 10),
(118, 'wwerder bremen', 2017, 5, 14, '15:24:25', 19, 10),
(119, 'trbzonspor', 2017, 5, 14, '15:24:32', 19, 10),
(120, 'deneme', 2017, 5, 17, '03:28:02', 17, 13),
(121, 'deneme', 2017, 5, 17, '03:28:17', 17, 13),
(122, 'deneme', 2017, 5, 17, '03:28:30', 17, 13),
(123, 'hasan karasahin', 2017, 5, 17, '15:14:44', 17, 13),
(124, 'verder bremen', 2017, 5, 17, '15:15:00', 17, 10),
(125, 'yes', 2017, 5, 17, '15:15:22', 17, 10),
(126, 'hahshahdhshdasdasd', 2017, 5, 17, '15:15:27', 17, 10),
(127, 'adasdasdasdasd', 2017, 5, 17, '15:15:30', 17, 10),
(128, 'zabam', 2017, 5, 17, '15:15:34', 17, 10),
(129, 'celal atalar', 2017, 5, 17, '15:15:40', 17, 10),
(130, 'kın', 2017, 5, 17, '15:15:45', 17, 10),
(131, 'g', 2017, 5, 17, '15:15:49', 17, 10),
(132, 'asdadasdasdasd', 2017, 5, 17, '15:15:54', 17, 10),
(135, 'arabadeneme', 2017, 5, 17, '16:15:06', 17, 24),
(136, 'asdasd', 2017, 5, 17, '16:22:44', 17, 25);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `altmenu`
--
ALTER TABLE `altmenu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `basliklartbl`
--
ALTER TABLE `basliklartbl`
  ADD PRIMARY KEY (`BaslikId`);

--
-- Tablo için indeksler `katagoritbl`
--
ALTER TABLE `katagoritbl`
  ADD PRIMARY KEY (`KatagoriId`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`MesajId`);

--
-- Tablo için indeksler `ustmenu`
--
ALTER TABLE `ustmenu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyelertbl`
--
ALTER TABLE `uyelertbl`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlartbl`
--
ALTER TABLE `yorumlartbl`
  ADD PRIMARY KEY (`YorumId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `altmenu`
--
ALTER TABLE `altmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `basliklartbl`
--
ALTER TABLE `basliklartbl`
  MODIFY `BaslikId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Tablo için AUTO_INCREMENT değeri `katagoritbl`
--
ALTER TABLE `katagoritbl`
  MODIFY `KatagoriId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `MesajId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Tablo için AUTO_INCREMENT değeri `ustmenu`
--
ALTER TABLE `ustmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Tablo için AUTO_INCREMENT değeri `uyelertbl`
--
ALTER TABLE `uyelertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Tablo için AUTO_INCREMENT değeri `yorumlartbl`
--
ALTER TABLE `yorumlartbl`
  MODIFY `YorumId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
