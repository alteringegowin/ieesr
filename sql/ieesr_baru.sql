-- phpMyAdmin SQL Dump
-- version 3.4.10.2deb1.oneiric~ppa.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2012 at 11:53 AM
-- Server version: 5.1.58
-- PHP Version: 5.3.6-13ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ieesr_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_commitments`
--

CREATE TABLE IF NOT EXISTS `ac_commitments` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(8) unsigned NOT NULL,
  `commitment_values` text COLLATE utf8_unicode_ci NOT NULL,
  `commitment_shift` text COLLATE utf8_unicode_ci NOT NULL,
  `commitment_created` datetime NOT NULL,
  `commitment_status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=belum selesai 1=sudah selesai',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ac_commitments`
--

INSERT INTO `ac_commitments` (`id`, `user_id`, `commitment_values`, `commitment_shift`, `commitment_created`, `commitment_status`) VALUES
(7, 1, '{"penerangan":{"item":[{"tipe":"LED","daya":"20","waktu":"8","total":"0"},{"tipe":"LED","daya":"40","waktu":"8","total":"0"}],"total":"427.68"},"dapur":{"item-2":"1","t-item-2":"27799.2","item-3":"1","t-item-3":"3207.6","item-4":"1","t-item-4":"3635.28","item-5":"1","t-item-5":"4169.88","item-6":"2","t-item-6":"891","item-7":"2","t-item-7":"1514.7","total_dapur":"41217.659999999996"},"rumah_tangga":{"item-8":"2","t-item-8":"623.7","item-9":"2","t-item-9":"7128","item-10":"2","t-item-10":"891","item-11":"2","t-item-11":"89.1","item-12":"2","t-item-12":"1336.5","item-13":"2","t-item-13":"2138.4","total_rumah_tangga":"12206.7"},"pribadi":{"item-14":"2","t-item-14":"1782","item-15":"2","t-item-15":"89.1","total_pribadi":"1871.1"},"elektronik":{"item-16":"2","t-item-16":"44.55","item-17":"2","t-item-17":"57.024","item-18":"2","t-item-18":"329.67","item-19":"2","t-item-19":"106.92","item-20":"2","t-item-20":"178.2","item-21":"2","t-item-21":"222.75","total_elektronik":"939.114"},"komunikasi":{"item-22":"2","t-item-22":"53.46","item-23":"2","t-item-23":"445.5","item-24":"2","t-item-24":"80.19","total_komunikasi":"579.15"},"sampah":{"item-25":"2","item-26":"2","item-27":"2","total_organik":"0.7494000000000001","total_kertas":"453.6","total_plastik":"151.104","total_sampah":"605.4534"},"darat":{"tipe":"pribadi","pribaditipe":"jarak","tipe_pribadi":"2","tipe_umum":"","jarak_tempuh":"200","konsumsi":"","total_darat":"173.7789"},"udara":{"tipe_pesawat":"Boeing 737-600","jumlah_penumpang":"","total_pesawat":""}}', '{"rumah":["tipelampu-0=LED&daya-0=10&waktu-0=8&total-lampu-0=71.28&tipelampu-1=Neon+-+CFL&daya-1=10&waktu-1=3&total-lampu-1=26.73&total_lampu_all=0&total_lampu_asli=427.68","jam-2=1&jam-5=1&jam-6=1&jam-7=1&total_dapur=2534.895&total_dapur_asli=41217.659999999996","jam-8=1&jam-9=1&jam-10=1&jam-11=1&jam-12=1&jam-13=1&total_rumah_tangga=0&total_rumah_tangga_asli=12206.7","jam-14=1&jam-15=1&total_pribadi=935.55&total_pribadi_asli=1871.1","jam-16=1&jam-17=1&jam-18=1&jam-19=1&jam-20=1&jam-21=1&total_elektronik=469.557&total_elektronik_asli=939.114","jam-22=2&jam-23=2&jam-24=2&total_komunikasi=579.15&total_komunikasi_asli=579.15"],"sampah":"item-25=2&item-26=2&item-27=1&total_organik=0.7494000000000001&total_kertas=453.6&total_plastik=841.4604&total_sampah=1295.8098&total_organik_asli=0.7494000000000001&total_kertas_asli=453.6&total_plastik_asli=151.104&total_sampah_asli=605.4534","darat":{"tipe":"pribadi","pribaditipe":"jarak","tipe_pribadi":"2","tipe_umum":"8","jarak_tempuh":"200","konsumsi":"","total_darat":"173.7789","total_darat_asli":"173.7789"},"udara":{"tipe_pesawat":"3","jumlah_penumpang":"","total_pesawat":"","total_pesawat_asli":""}}', '2012-06-06 04:50:15', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ac_commitment_items`
--

CREATE TABLE IF NOT EXISTS `ac_commitment_items` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(4) unsigned NOT NULL,
  `commitment_id` int(8) unsigned NOT NULL,
  `commitment_value` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'json untuk value',
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `commitment_id` (`commitment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ac_emisi`
--

CREATE TABLE IF NOT EXISTS `ac_emisi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `param` text NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ac_group_items`
--

CREATE TABLE IF NOT EXISTS `ac_group_items` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ac_group_items`
--

INSERT INTO `ac_group_items` (`id`, `group_name`) VALUES
(1, 'penerangan'),
(2, 'peralatan dapur'),
(3, 'peralatan rumah tangga'),
(4, 'peralatan pribadi'),
(5, 'hiburan'),
(6, 'informasi dan komunikasi'),
(7, 'sampah'),
(8, 'transportasi darat'),
(9, 'transportasi non darat');

-- --------------------------------------------------------

--
-- Table structure for table `ac_items`
--

CREATE TABLE IF NOT EXISTS `ac_items` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `group_item_id` int(4) unsigned NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_daya` int(4) NOT NULL,
  `item_hour` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `group_item_id` (`group_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `ac_items`
--

INSERT INTO `ac_items` (`id`, `group_item_id`, `item_name`, `item_daya`, `item_hour`) VALUES
(1, 1, 'lampu', 0, 0),
(2, 2, 'Pemakaian kulkas', 0, 24),
(3, 2, 'Pemakaian kulkas 300 - 500 lt', 0, 24),
(4, 2, 'Pemakaian kulkas < 500 lt', 0, 24),
(5, 2, 'Freezer (Pendingin daging/es krim)', 0, 24),
(6, 2, 'Rice Cooker', 0, 0),
(7, 2, 'Microwave Oven', 0, 0),
(8, 3, 'Mesin Cuci', 350, 0),
(9, 3, 'Mesin Pengering', 4000, 0),
(10, 3, 'Setrika', 500, 0),
(11, 3, 'Kipas Angin', 50, 0),
(12, 3, 'AC (1 PK)', 750, 0),
(13, 3, 'Vacuum Cleaner', 1200, 0),
(14, 4, 'Hair Dryer', 1000, 0),
(15, 4, 'Electronic Razer / Pisau Cukur Elektronik', 50, 0),
(16, 5, 'DVD Player', 25, 0),
(17, 5, 'Playstation PS2', 32, 0),
(18, 5, 'Xbox 360', 185, 0),
(19, 5, 'Tape Radio', 60, 0),
(20, 5, 'TV (CRT 21")', 100, 0),
(21, 5, 'TV (LCD 32")', 125, 0),
(22, 6, 'Charger Handphone', 30, 0),
(23, 6, 'PC Desktop+Monitor', 250, 0),
(24, 6, 'Laptop', 45, 0),
(25, 7, 'Sampah Organik', 0, 0),
(26, 7, 'Sampah Kertas', 0, 0),
(27, 7, 'Sampah Plastik', 0, 0),
(28, 8, 'tipe kendaraan', 0, 0),
(29, 8, 'jenis kendaraan', 0, 0),
(30, 8, 'jarak tempuh', 0, 0),
(31, 8, 'biaya bahan bakar mingguan', 0, 0),
(32, 9, 'tipe penerbangan', 0, 0),
(33, 9, 'tipe pesawat', 0, 0),
(34, 9, 'jumlah transit', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_login_attempts`
--

CREATE TABLE IF NOT EXISTS `auth_login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users`
--

CREATE TABLE IF NOT EXISTS `auth_users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `propinsi_id` int(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `propinsi_id` (`propinsi_id`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `auth_users`
--

INSERT INTO `auth_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `fullname`, `propinsi_id`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1338928886, 1, 'Admin', 12),
(2, '\0\0', 'xa', 'bdb4d360f41da62ac9e7e858e5778b7291315499', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 1336927466, 1336930204, 1, 'Tester #1', 17),
(3, '\0\0', 'Erwin Handoko', 'cc560b12bc929ba2fe6c6aff3ee19b96baa9be97', NULL, 'erwin@think.web.id', NULL, NULL, NULL, NULL, 1338957994, 1338958006, 1, 'Erwin Handoko', 12);

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_groups`
--

CREATE TABLE IF NOT EXISTS `auth_users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `auth_users_groups`
--

INSERT INTO `auth_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `master_pesawat`
--

CREATE TABLE IF NOT EXISTS `master_pesawat` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_pesawat` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `co2` float NOT NULL,
  `ch4` float NOT NULL,
  `n2o` float NOT NULL,
  `lto` float NOT NULL,
  `emision_fact` float NOT NULL,
  `passanger` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `master_pesawat`
--

INSERT INTO `master_pesawat` (`id`, `jenis_pesawat`, `co2`, `ch4`, `n2o`, `lto`, `emision_fact`, `passanger`) VALUES
(1, 'Boeing 737-600', 2280, 0.1, 0.1, 720, 70000, 108),
(2, 'Boeing 737-700', 2460, 0.09, 0.1, 780, 70000, 128),
(3, 'Boeing 737-800', 2780, 0.07, 0.1, 880, 70000, 160),
(4, 'Boeing 737-900', 2780, 0.07, 0.1, 880, 70001, 177);

-- --------------------------------------------------------

--
-- Table structure for table `master_propinsi`
--

CREATE TABLE IF NOT EXISTS `master_propinsi` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `propinsi_name` varchar(255) NOT NULL,
  `propinsi_koefisien` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `master_propinsi`
--

INSERT INTO `master_propinsi` (`id`, `propinsi_name`, `propinsi_koefisien`) VALUES
(1, 'Nanggroe Aceh Darussalam', '0.743'),
(2, 'Sumatera Utara', '0.743'),
(3, 'Sumatera Barat', '0.743'),
(4, 'Riau', '0.743'),
(5, 'Kepulauan Riau', '0.743'),
(6, 'Jambi', '0.743'),
(7, 'Sumatera Selatan', '0.743'),
(8, 'Bengkulu', '0.743'),
(9, 'Lampung', '0.743'),
(10, 'Kep. Bangka Belitung', '0.743'),
(11, 'Banten', '0.891'),
(12, 'DKI Jakarta', '0.891'),
(13, 'Jawa Barat', '0.891'),
(14, 'Jawa Tengah', '0.891'),
(15, 'D.I. Yogyakarta', '0.891'),
(16, 'Jawa Timur', '0.891'),
(17, 'Bali', '0.891'),
(18, 'Nusa Tenggara Barat', '0.891'),
(19, 'Nusa Tenggara Timur', '0.891'),
(20, 'Kalimantan Barat', '0.775'),
(21, 'Kalimantan Tengah', '1.273'),
(22, 'Kalimantan Selatan', '1.273'),
(23, 'Kalimantan Timur', '0.72'),
(24, 'Gorontalo', '0.72'),
(25, 'Sulawesi Utara', '0.161'),
(26, 'Sulawesi Tengah', '0.161'),
(27, 'Sulawesi Selatan', '0.269'),
(28, 'Sulawesi Tenggara', '0.269'),
(29, 'Sulawesi Barat', '0.269'),
(30, 'Maluku', '0.891'),
(31, 'Maluku Utara', '0.891'),
(32, 'Papua Barat', '0.891'),
(33, 'Papua', '0.891');

-- --------------------------------------------------------

--
-- Table structure for table `master_vehicles`
--

CREATE TABLE IF NOT EXISTS `master_vehicles` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `vehicle_type` enum('pribadi','umum') COLLATE utf8_unicode_ci NOT NULL,
  `n2o_cold` float NOT NULL,
  `n2o_hot` float NOT NULL,
  `ch4_cold` float NOT NULL,
  `ch4_hot` float NOT NULL,
  `fuel_economy` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_type` (`vehicle_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `master_vehicles`
--

INSERT INTO `master_vehicles` (`id`, `vehicle_name`, `vehicle_type`, `n2o_cold`, `n2o_hot`, `ch4_cold`, `ch4_hot`, `fuel_economy`) VALUES
(1, 'Motor', 'pribadi', 2, 2, 200, 200, 0.0769231),
(2, 'Bensin &lt; 1200cc', 'pribadi', 12, 3, 83, 3, 0.0666667),
(3, 'Bensin 1500cc', 'pribadi', 15, 9, 7, 3, 0.0666667),
(4, 'Bensin &gt; 2000cc', 'pribadi', 12, 3, 83, 3, 0.1),
(5, 'Diesel &lt; 1200cc', 'pribadi', 15, 9, 7, 3, 0.1),
(6, 'Diesel 1500cc', 'pribadi', 12, 3, 83, 3, 0.111111),
(7, 'Diesel &gt; 2000cc', 'pribadi', 15, 9, 7, 3, 0.111111),
(8, 'Bus Kota', 'umum', 30, 30, 175, 175, 0.0473709),
(9, 'Mikrolet / Angkot', 'umum', 38, 22, 45, 26, 0.0672948),
(10, 'Metromini', 'umum', 30, 30, 175, 175, 0.0672948),
(11, 'Bus Way', 'umum', 30, 30, 175, 175, 0.0473709),
(12, 'Ojek', 'umum', 2, 2, 200, 200, 0.0769231);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
