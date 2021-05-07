-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Oca 2021, 13:11:06
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `warehouse`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `authorized`
--

CREATE TABLE `authorized` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `authorized`
--

INSERT INTO `authorized` (`id`, `supplier_id`, `name`, `tel`, `mail`, `isActive`) VALUES
(3, 5, 'ilhan', '424135131351531', 'sfadfdafas@hotmail.com', 1),
(4, 7, 'emre bey', '05368900207', 'fsdasdfafdasafds@sadfdfasfdsa.com', 1),
(5, 4, 'mustafa emre ilhann', '53531531531', 'sfadsdfafadsads@sdfdsafasd.com', 1),
(6, 4, 'fdsafsd', '05368900207', 'ahmetkavakci@hotmail.com', 0),
(8, 9, 'mustafa', '05368900207', 'sfadsdfafadsads@sdfdsafasd.co', 1),
(9, 4, 'dsafdfsa', '15315315135', 'dasfsadffdsa@hotmail.com', 1),
(10, 5, 'mustafa', '12312312312', 'dsaffsdfdasfds@sadfasdfasdf.com', 1),
(11, 16, 'halkbank yetkili', '63515315315', 'sadfdsasfda@hotmail.com', 1),
(14, 14, 'test4', '53153153153', 'mustafaemreilhan@hotmail.com', 1),
(18, 2, 'sadfdsafdas', '05368900207', 'safakkekci@hotmail.com', 1),
(22, 16, 'mustafa', '05368900207', 'safakkekci@hotmail.com', 1),
(23, 16, 'emrah atalay', '53443232432', 'emrah.atalay@btibilisim.com', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basket`
--

CREATE TABLE `basket` (
  `basket_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `basket_date` varchar(2555) COLLATE utf8_turkish_ci NOT NULL,
  `basket_quentity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `basket`
--

INSERT INTO `basket` (`basket_id`, `user_id`, `product_id`, `basket_date`, `basket_quentity`) VALUES
(28, '2', '180', '22.11.2020 22:23:10', 2),
(41, '1', '180', '09.12.2020 12:10:12', 1),
(42, '1', '181', '18.12.2020 15:18:43', 1),
(43, '1', '181', '17.01.2021 23:02:38', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` char(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `parent_id`, `title`, `description`, `isActive`) VALUES
(1, 0, 'Elektronikc', 'Elek', 1),
(2, 1, 'Bilgisayarab', 'Bil', 0),
(3, 2, 'Notebook', 'Note', 1),
(4, 2, 'Masaüstü', 'Desk', 1),
(5, 0, 'Spor', 'Sp', 1),
(6, 5, 'TakımSpor', 'Tks', 1),
(7, 5, 'Bireysel', 'Bs', 0),
(8, 6, 'Futbol', 'Fut', 1),
(9, 6, 'Basketbol', 'Bas', 1),
(10, 8, 'Bayan Futboll', 'Bayfut', 1),
(11, 8, 'Erkek Futbol', 'Erkfut', 0),
(163, 2, 'UltraBook', 'Ult', 0),
(164, 8, 'Ampute Futbol', 'Amtute', 1),
(241, 6, 'Hentbol', '', 0),
(242, 1, 'yeni', '', 0),
(243, 248, 'sadfdsf', '', 0),
(244, 163, 'yeni', '', 0),
(245, 163, 'yeni', '', 0),
(246, 163, 'yeni', '', 0),
(247, 163, 'yeni-güncellendi', '', 0),
(248, 244, 'aa', '', 0),
(249, 0, 'yeni', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `date` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Yeni',
  `IP` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adminmessage` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `message`, `date`, `email`, `user`, `status`, `IP`, `adminmessage`) VALUES
(1, 'rıza sarraf', '23123123123', 'dsfdasfads', '19.11.2020', 'rizasarraf@hotmail.com', '', '', '', ''),
(5, 'sadfdsaffd', '11111111111', 'asfdsdfadsffsdafsadfasd', '19.11.2020', 'mustafaemreilhan1903@gmail.com', '', '', '', ''),
(7, 'sadffsda', '23123123123', 'dfdasfdsa', '19.11.2020', 'sdfafsda@hotmail.co', '', '', '', ''),
(8, 'mustafa emre', '5368900207', 'selam yakısıklı ', '19.11.2020', 'mustafaemreilhan1903@gmail.com', '', '', '', ''),
(9, 'ahmet', '55555555115', 'sadfasdfsadfsdafsadsfda', '19.11.2020', 'tampinar@hotmail.com', '', '', '', ''),
(10, 'a', '11111111111', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbb', '19.11.2020', 'mustafaemreilhan1903@gmail.com', '', '', '', ''),
(11, 'asdffdsa', '11111111111', 'sadasdfsdfdsadf', '19.11.2020', 'mustafaemreilhan1903@gmail.com', '', '', '', ''),
(12, 'Emre Koptaget', '11111111111', ' afsdafsdfsafdsa', '19.11.2020', 'emrekoptaget@btibilisim.com', '', '', '', ''),
(13, 'fghgA', '11111111111', 'asfdsdfadsffsdafsadfasdsafddfsaafsd', '19.11.2020', 'aaa@hotmail.com', '', '', '', ''),
(14, 'mustafa', '11111111111', 'sdafsdaffdsafasd', '19.11.2020', 'dsfasad@hotmail.com', '', '', '', ''),
(15, 'ahmet zafer', '55555555555', 'asdmksdçamndfas', '19.11.2020', 'mustafaemreilhan1903@gmail.com', '', '', '', ''),
(16, 'mehmet sevinc ', '05368900207', 'kolay gelsin beni arar mısınız\r\n', '19.11.2020', 'mehmetsevinc@hotmail.com', '', '', '', ''),
(17, 'mustafa', '12312312312', 'merhaaba', '19.11.2020', 'sadffsdadf@hotmail.com', '', 'okundu', '', '               seşamö\r\n    '),
(18, 'emir ferhat', '11111111111', 'merhaba site cok guzel olmus ellerinize saglık ', '19.11.2020', 'emirferhat@hotmail.com', '', 'okundu', '', ''),
(21, 'erdem mete', '56453453453', 'merhaba kral nasılsın', '19.11.2020', 'erdemmete@hotmail.com', '', 'tamamlandi', '', ' tamamlandı\r\n    '),
(22, 'fdsasfd', '53689002077', 'dsfafdsafasdfads', '19.11.2020', 'mustafaemreilhan1903@gmail.com', 'mustafa emre ilhan', 'okundu', '78.165.64.178', ''),
(23, 'testt', '35531515315', 'merhaba anasayfada sorun var yardımcı olur musunuz ', '19.11.2020', 'sdafdfsfda@dasfdsa.com', 'mustafa emre ilhan', 'okundu', '::1', ''),
(24, 'mustafa', '31231232132', 'dasdfsfasdfsad', NULL, 'fadsdfsadfs@hotmail.com', 'mustafa emre ilhan', 'okundu', '::1', 'asdfafdas'),
(25, 'dfsafsd', '12321321312', 'dsaffdfsdadsfafds', '2020-11-19', 'fdafdsfsda@hotmail.com', 'mustafa emre ilhan', 'okundu', '::1', 'işleme alındı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deneme`
--

CREATE TABLE `deneme` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `deneme`
--

INSERT INTO `deneme` (`id`, `parent_id`, `name`, `description`, `status`) VALUES
(1, 0, 'Elektornik', 'Elek', 1),
(2, 1, 'Bilgisayar', 'Elek', 1),
(3, 2, 'Notebook', 'Elek', 1),
(4, 2, 'Masaüstü', 'Desk', 1),
(5, 0, 'Spor', 'Sp', 1),
(6, 5, 'Takım Spor', 'Ts', 1),
(7, 5, 'Bireysel', 'Bs', 1),
(8, 6, 'Futbol', 'Fut', 1),
(9, 6, 'Basketbol', 'Bask', 1),
(10, 8, 'Bayan Futbol', 'BayFt', 1),
(11, 8, 'Erkek Futbol', 'ErkFt', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `newscast`
--

CREATE TABLE `newscast` (
  `newcastid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `date` date NOT NULL,
  `keyword` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `img_id` varchar(2555) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `newscast`
--

INSERT INTO `newscast` (`newcastid`, `product_id`, `title`, `description`, `date`, `keyword`, `img_id`, `isActive`) VALUES
(1, 70, 'İlk Haber', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisici', '2020-11-14', 'ilk,haber,deneme,test', 'image11.jpg', 1),
(33, 70, 'ekmek', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisici', '2020-11-14', 'ilk,haber', 'image12.jpg', 0),
(34, 70, 'deneme', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisici', '2020-11-14', 'ilk,', 'image13.jpg', 1),
(35, 70, 'sogan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisici', '2020-11-14', 'deneme,test', 'image14.jpg', 1),
(37, 70, 'mert', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisici', '2020-11-14', 'deneme,test', 'image11.jpg', 1),
(38, 38, 'İlk Haber', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisici', '2020-11-14', 'ilk,haber,deneme,test', 'profil.jpg', 1),
(39, 70, 'ahmet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisici', '2020-11-14', 'ilk,haber,deneme,test', 'image11.jpg', 1),
(40, 70, 'ayse', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisici', '2020-11-14', 'ilk,haber,deneme,test', 'image11.jpg', 1),
(42, 70, 'hayriye', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisici', '2020-11-14', 'ilk', 'image11.jpg', 1),
(63, 51, 'afdsdfsa', 'adfsfdafds', '2020-11-21', 'fasfdsasdf', 'profil.jpg', 0),
(64, 51, 'fadsdfasfdas', 'sdadfsaf', '2020-11-21', 'sfadsfdaasfd', 'unnamed.jpg', 0),
(65, 91, 'adsffdasfd', 'asdffasafsdfd', '2020-11-21', 'fdasfdasf', 'Screenshot_6.png', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `invoice` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `total_price` float(10,2) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `order`
--

INSERT INTO `order` (`id`, `invoice`, `detail`, `total_price`, `date`, `supplier_id`) VALUES
(81, '111111111111113', 'testt', 300.00, '2020-11-23 00:00:00', 5),
(82, '123213123213131', 'testabc', 14000.00, '2020-11-23 00:00:00', NULL),
(83, '213132132132132', 'sadfsadfasdfads', 100000000.00, '0000-00-00 00:00:00', NULL),
(84, '213132132132132', 'fsaddfasf', 121.00, '23.11.2020 20:38:21', NULL),
(85, '131231231321321', 'afsdfsddffasd', 143.00, '23.11.2020 22:43:07', NULL),
(86, '123123123123123', 'dsafsad', 2829.00, '23.11.2020 22:43:44', NULL),
(87, '123213213123123', 'woncher', 961.00, '23.11.2020 22:56:14', 16);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orderproduct`
--

CREATE TABLE `orderproduct` (
  `opid` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `op_userid` int(11) NOT NULL,
  `op_productid` int(11) NOT NULL,
  `op_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `op_price` float NOT NULL,
  `op_quantity` int(11) NOT NULL,
  `op_amount` float NOT NULL,
  `op_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `orderproduct`
--

INSERT INTO `orderproduct` (`opid`, `order_id`, `op_userid`, `op_productid`, `op_name`, `op_price`, `op_quantity`, `op_amount`, `op_date`) VALUES
(21, 41, 1, 183, 'abcccc', 10.1, 1, 10.1, '2020-11-22 18:17:34'),
(22, 41, 1, 181, 'testt', 354, 1, 354, '2020-11-22 18:17:34'),
(23, 41, 1, 180, 'muhasebe', 118, 1, 118, '2020-11-22 18:17:34'),
(24, 42, 1, 180, 'muhasebe', 118, 3, 354, '2020-11-22 18:20:23'),
(25, 43, 1, 180, 'muhasebe', 118, 3, 354, '2020-11-22 18:24:19'),
(26, 44, 1, 180, 'muhasebe', 118, 3, 354, '2020-11-22 18:31:34'),
(27, 46, 1, 183, 'abcccc', 10.1, 1, 10.1, '2020-11-22 18:32:06'),
(28, 47, 1, 182, 'asdfdfsa', 250.16, 1, 250.16, '2020-11-22 18:34:07'),
(29, 51, 2, 182, 'asdfdfsa', 250.16, 20, 5003.2, '2020-11-22 19:49:05'),
(30, 52, 2, 183, 'abcccc', 10.1, 1, 10.1, '2020-11-22 19:50:52'),
(31, 53, 2, 183, 'abcccc', 10.1, 1, 10.1, '2020-11-22 19:51:24'),
(32, 54, 1, 181, 'testt', 354, 1, 354, '2020-11-23 10:39:24'),
(33, 54, 1, 181, 'testt', 354, 15, 5310, '2020-11-23 10:39:24'),
(34, 55, 1, 181, 'testt', 354, 1, 354, '2020-11-23 12:23:52'),
(35, 56, 1, 181, 'testt', 354, 2, 708, '2020-11-23 19:07:34'),
(36, 57, 1, 181, 'testt', 354, 1, 354, '2020-11-23 19:17:42'),
(37, 58, 1, 181, 'testt', 354, 10, 3540, '2020-11-23 20:24:50'),
(38, 59, 1, 181, 'testt', 354, 1, 354, '2020-12-09 08:55:28'),
(39, 60, 1, 180, 'muhasebe', 118, 5, 590, '2020-12-09 08:59:18'),
(40, 61, 1, 180, 'muhasebe', 118, 2, 236, '2020-12-09 09:01:07'),
(41, 62, 1, 180, 'muhasebe', 118, 3, 354, '2020-12-09 09:03:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `polines`
--

CREATE TABLE `polines` (
  `id` int(11) NOT NULL,
  `poId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `polines`
--

INSERT INTO `polines` (`id`, `poId`, `productId`, `price`, `quantity`) VALUES
(1, 2, 180, '100.00', '10.00'),
(2, 2, 181, '250.00', '20.00'),
(3, 2, 180, '1.00', '30.00'),
(4, 3, 181, '313.00', '112.00'),
(5, 3, 180, '12.00', '232.00'),
(6, 4, 180, '22.00', '2.00'),
(7, 4, 181, '33.00', '3.00'),
(8, 5, 181, '999.99', '999.99'),
(9, 5, 180, '999.99', '313.00'),
(10, 6, 180, '500.00', '10.00'),
(11, 7, 180, '500.00', '90.00'),
(12, 8, 180, '313.00', '123.00'),
(13, 9, 180, '100.00', '12.00'),
(14, 10, 181, '999.99', '999.99'),
(15, 11, 180, '100.00', '100.00'),
(16, 11, 181, '200.00', '200.00'),
(17, 12, 180, '750.00', '750.00'),
(18, 12, 181, '750.00', '750.00'),
(19, 13, 180, '999.99', '999.99'),
(20, 14, 180, '1000.00', '1000.00'),
(21, 15, 180, '1000.00', '1000.00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `titlee` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `detail` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `list_price` float(10,2) DEFAULT NULL,
  `sale_price` float(10,2) DEFAULT NULL,
  `kdv` float NOT NULL,
  `total_list` float(10,2) NOT NULL,
  `total_sale` float(10,2) NOT NULL,
  `img_id` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`productid`, `code`, `titlee`, `detail`, `quantity`, `list_price`, `sale_price`, `kdv`, `total_list`, `total_sale`, `img_id`, `isActive`, `supplier_id`, `category_id`) VALUES
(180, '123453', 'muhasebe', 'testt', 100, 100.00, 200.00, 0.18, 118.00, 236.00, 'unnamed.jpg', 1, 16, 3),
(181, 'testtt', 'testt', 'testt', 200, 300.00, 400.00, 0.18, 354.00, 472.00, 'TEST.jpg', 1, 5, 5),
(182, 'asdffdsfsda', 'asdfdfsa', 'dfsafadsfds', 233, 212.00, 313.00, 0.18, 250.16, 369.34, 'profil.jpg', 0, 5, 4),
(183, 'afsddfsa', 'abcccc', 'afsdsdfaafd', 20, 10.00, 200.00, 0.01, 10.10, 202.00, 'profil.jpg', 0, 4, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `invoice` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `detail` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `total_price` float(10,2) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `purchase`
--

INSERT INTO `purchase` (`id`, `invoice`, `detail`, `total_price`, `date`, `supplier_id`) VALUES
(2, '213132132132132', 'twrasfsd', 6030.00, '2020-11-23 00:00:00', 7),
(3, '213132132132132', 'asfsdfdsfads', 37840.00, '2020-11-23 00:00:00', 7),
(4, '213132132132132', 'deneme', 143.00, '2020-11-23 00:00:00', 7),
(5, '213132132132132', 'asfdsadf', 40533264.00, '2020-11-23 00:00:00', 7),
(6, '213132132132132', 'sadffadsfdsafdsa', 5000.00, '2020-11-23 00:00:00', 7),
(7, '213132132132132', 'dfafdsaafsd', 45000.00, '2020-11-23 00:00:00', 7),
(8, 'sdafsadfsdafsdf', 'sdafsadfdsdas', 38499.00, '23.11.2020 22:59:14', 16),
(9, '213132132132132', 'test yeni', 1200.00, '24.11.2020 09:58:47', 5),
(10, '213131231231232', 'testt', 38450376.00, '24.11.2020 10:02:05', 5),
(11, '211312312312tes', 'e finansa alış faturası', 50000.00, '25.11.2020 09:52:36', 4),
(12, '213132132132132', '12312', 1125000.00, '25.11.2020 09:55:37', 5),
(13, '123123123123123', 'dfadfsadfs', 1000000.00, '25.11.2020 09:56:52', 4),
(14, '123123123123123', '1231231231232', 1000000.00, '25.11.2020 09:59:10', 4),
(15, '213132132132132', 'saddsfadfs', 1000000.00, '25.11.2020 10:00:12', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `receivedorder`
--

CREATE TABLE `receivedorder` (
  `orderid` int(11) NOT NULL,
  `orderuserid` int(11) NOT NULL,
  `ordername` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `orderadress` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `orderphone` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `total_amount` float NOT NULL,
  `ordercity` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Yeni',
  `orderdate` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT current_timestamp(),
  `orderip` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `cargo_number` int(11) NOT NULL,
  `cardno` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `receivedorder`
--

INSERT INTO `receivedorder` (`orderid`, `orderuserid`, `ordername`, `orderadress`, `orderphone`, `total_amount`, `ordercity`, `status`, `orderdate`, `orderip`, `cargo`, `cargo_number`, `cardno`) VALUES
(41, 1, 'mustafa emre ilhan', 'Mahmutbey mahallesi, Taşocağı cad. No:24,\r\n34217 - Bağcılar', '5368900205', 482.1, 'İstanbul', 'Kargoda', '22.11.2020 19:17:34', '::1', 'Aras', 31231231, '0'),
(42, 1, 'mustafa emre ilhan', 'izzettin çalışlar cad. albay ibrahim karaoglanoglu sok. adatepe kardesler apt', '5368900205', 354, 'İstanbul', 'Yeni', '22.11.2020 19:20:23', '::1', 'Mng', 0, '0'),
(43, 1, 'mustafa emre ilhan', 'cennet mahallesi hürriyet caddesi cami sokak no 15 daires 8 Küçükçekmece', '5368900205', 354, 'İstanbul', 'Yeni', '22.11.2020 19:24:19', '::1', '', 0, '0'),
(44, 1, 'mustafa emre ilhan', '19 mayis mh. 19 mayis cd. 19 mayis apt.', '5368900205', 354, 'İstanbul', 'Yeni', '22.11.2020 19:31:34', '::1', '', 0, '0'),
(46, 1, 'mustafa emre ilhan', 'Rüzgarlıbahçe Mahallesi Yavuz Sultan Selim Caddesi Aras Plaza', '5368900205', 10.1, 'İstanbul', 'Yeni', '22.11.2020 19:32:06', '::1', '', 0, '0'),
(47, 1, 'mustafa emre ilhan', 'Taşocağı cad. No:24, 34217 - Bağcılar', '5368900205', 250.16, 'İstanbul', 'Yeni', '22.11.2020 19:34:07', '::1', '', 0, '0'),
(51, 2, 'test test', 'mahalle', 'tel', 5003.2, 'şehir', 'Tamamlandı', '22.11.2020 20:49:05', '::1', '', 0, '0'),
(52, 2, 'test test', 'Taşocağı cad. No:24, 34217 - Bağcılar', '', 10.1, '', 'Yeni', '22.11.2020 20:50:52', '::1', '', 0, '0'),
(53, 2, 'test test', '', '', 10.1, '', 'Yeni', '22.11.2020 20:51:24', '::1', '', 0, '0'),
(54, 1, 'mustafa emre ilhan', 'cennet mahallesi hürriyet caddesi cami sokak no 15 daires 8 Küçükçekmece', '5368900205', 5664, 'İstanbul', 'Yeni', '23.11.2020 11:39:24', '::1', '', 0, '0'),
(55, 1, 'mustafa emre ilhan', 'cennet mahallesi hürriyet caddesi cami sokak no 15 daires 8 Küçükçekmece', '5368900205', 354, 'İstanbul', 'Yeni', '23.11.2020 13:23:52', '::1', '', 0, '0'),
(56, 1, 'mustafa emre ilhan', 'cennet mahallesi hürriyet caddesi cami sokak no 15 daires 8 Küçükçekmece', '5368900205', 708, 'İstanbul', 'Yeni', '23.11.2020 20:07:34', '::1', '', 0, '0'),
(57, 1, 'mustafa emre ilhan', 'cennet mahallesi hürriyet caddesi cami sokak no 15 daires 8 Küçükçekmece', '5368900205', 354, 'İstanbul', 'Yeni', '23.11.2020 20:17:42', '::1', '', 0, '0'),
(58, 1, 'mustafa emre ilhan', 'cennet mahallesi hürriyet caddesi cami sokak no 15 daires 8 Küçükçekmece', '5368900205', 3540, 'İstanbul', 'Yeni', '23.11.2020 23:24:50', '::1', '', 0, '0'),
(59, 1, 'mustafa emre ilhan', 'cennet mahallesi hürriyet caddesi cami sokak no 15 daires 8 Küçükçekmece', '1111111111', 354, 'İstanbul', 'Yeni', '09.12.2020 11:55:28', '::1', '', 0, '0'),
(60, 1, 'isim soyisim', 'adress', 'telno11111', 590, 'sehir', 'Yeni', '09.12.2020 11:59:18', '::1', '', 0, '2147483647'),
(61, 1, 'ethem', 'dsfadsaf', '3213123123', 236, 'fsadsfdasdfasfd', 'Yeni', '09.12.2020 12:01:07', '::1', '', 0, '2147483647'),
(62, 1, 'mustafa emre ilhan', 'cennet mahallesi hürriyet caddesi cami sokak no 15 daires 8 Küçükçekmece', '5368900205', 354, 'İstanbul', 'Yeni', '09.12.2020 12:03:00', '::1', '', 0, '9999999999999987');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `salid` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `price` float(5,2) NOT NULL,
  `quantity` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sales`
--

INSERT INTO `sales` (`id`, `salid`, `productId`, `price`, `quantity`) VALUES
(2, 81, 180, 10.00, 10.00),
(3, 81, 181, 10.00, 20.00),
(4, 82, 180, 100.00, 10.00),
(5, 82, 181, 200.00, 20.00),
(6, 82, 181, 300.00, 30.00),
(7, 83, 181, 999.99, 999.99),
(8, 84, 180, 11.00, 11.00),
(9, 85, 181, 13.00, 11.00),
(10, 86, 181, 23.00, 123.00),
(11, 87, 180, 31.00, 31.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `supplier`
--

CREATE TABLE `supplier` (
  `supplierid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `adress` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `supplier`
--

INSERT INTO `supplier` (`supplierid`, `title`, `adress`, `phone`, `email`, `isActive`) VALUES
(2, 'testtest', 'aaaaa', '12312312321', 'asdfsadf@asdfdsfa', 0),
(4, 'E Finans', 'Büyükdere Cad QNB Finansbank Kristal Kule No: 215 4.Levent, 34394 Şişli/İstanbul', '08502220035', 'destek@qnbfinansbank.com', 1),
(5, 'İşnet', 'Tuzla/İstanbul', '08502244444', 'destek@isnet.com', 1),
(7, 'Nebim', 'aaaaa', '12312312312', 'sfadfdsa@hotmail.com', 0),
(9, 'iPhone', 'asdffdsafasd', '11111111111', 'mustafaemreilhan1903@gmail.com', 0),
(14, 'albarakabank', 'sadsadfdsfasd', '11111111111', 'mustafaemreilhan1903@gmail.com', 0),
(16, 'Halkbank', 'sadffsdasfda@safdsfdadfsFASD', '31513515313', 'mustafaemreilhan1903@gmail.comm', 1),
(18, 'önder', 'önder mahallesi atatürk caddesi daire 7 no 10', '54545345345', 'dasfasdfaf@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `img_id` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` int(1) NOT NULL,
  `registerdate` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `authority` varchar(25) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `user`, `email`, `password`, `img_id`, `adress`, `phone`, `city`, `isActive`, `registerdate`, `authority`) VALUES
(1, 'mustafa emre ilhan', 'mustafaemreilhan1903@gmail.com', '123456', 'profil.jpg', 'cennet mahallesi hürriyet caddesi cami sokak no 15 daires 8 Küçükçekmece', '5368900205', 'İstanbul', 1, '31-10-2020', 'admin'),
(2, 'test test', 'test@hotmail.com', '123456', 'default.jpg', '', '', '', 1, '19-11-2020', 'kullanici');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `authorized`
--
ALTER TABLE `authorized`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `deneme`
--
ALTER TABLE `deneme`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `newscast`
--
ALTER TABLE `newscast`
  ADD PRIMARY KEY (`newcastid`);

--
-- Tablo için indeksler `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`opid`);

--
-- Tablo için indeksler `polines`
--
ALTER TABLE `polines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderConnection` (`poId`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Tablo için indeksler `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `receivedorder`
--
ALTER TABLE `receivedorder`
  ADD PRIMARY KEY (`orderid`);

--
-- Tablo için indeksler `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesConnection` (`salid`) USING BTREE;

--
-- Tablo için indeksler `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierid`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `authorized`
--
ALTER TABLE `authorized`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `deneme`
--
ALTER TABLE `deneme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `newscast`
--
ALTER TABLE `newscast`
  MODIFY `newcastid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Tablo için AUTO_INCREMENT değeri `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Tablo için AUTO_INCREMENT değeri `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `opid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `polines`
--
ALTER TABLE `polines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- Tablo için AUTO_INCREMENT değeri `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `receivedorder`
--
ALTER TABLE `receivedorder`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Tablo için AUTO_INCREMENT değeri `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `polines`
--
ALTER TABLE `polines`
  ADD CONSTRAINT `orderConnection` FOREIGN KEY (`poId`) REFERENCES `purchase` (`id`);

--
-- Tablo kısıtlamaları `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`salid`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
