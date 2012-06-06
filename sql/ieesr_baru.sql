-- phpMyAdmin SQL Dump
-- version 3.4.10.2deb1.oneiric~ppa.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2012 at 10:36 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ac_commitments`
--

INSERT INTO `ac_commitments` (`id`, `user_id`, `commitment_values`, `commitment_shift`, `commitment_created`, `commitment_status`) VALUES
(8, 1, '{"penerangan":{"item":[{"tipe":"LED","daya":"10","waktu":"3","total":"0"},{"tipe":"LED","daya":"15","waktu":"2","total":"0"}],"total":"53.46"},"dapur":{"item-2":"0","t-item-2":"0","t-item-3":"0","item-4":"0","t-item-4":"0","item-5":"0","t-item-5":"0","item-6":"","t-item-6":"0","item-7":"5","t-item-7":"3786.75","total_dapur":"3786.75"},"rumah_tangga":{"item-8":"","t-item-8":"","item-9":"","t-item-9":"","item-10":"","t-item-10":"","item-11":"fgdhtfgjgf","t-item-11":"","item-12":"3","t-item-12":"2004.75","item-13":"","t-item-13":"","total_rumah_tangga":"2004.75"},"pribadi":{"item-14":"","t-item-14":"","item-15":"","t-item-15":"","total_pribadi":"0"},"elektronik":{"item-16":"","t-item-16":"","item-17":"","t-item-17":"","item-18":"","t-item-18":"","item-19":"","t-item-19":"","item-20":"","t-item-20":"","item-21":"","t-item-21":"","total_elektronik":"0"},"komunikasi":{"item-22":"","t-item-22":"","item-23":"","t-item-23":"","item-24":"","t-item-24":"","total_komunikasi":"0"},"sampah":{"item-25":"","item-26":"","item-27":"","total_organik":"","total_kertas":"","total_plastik":"","total_sampah":""},"darat":{"tipe_pribadi":"","tipe_umum":"","jarak_tempuh":"","konsumsi":"","total_darat":""},"udara":{"tipe_pesawat":"Boeing 737-600","jumlah_penumpang":"","total_pesawat":""}}', '{"rumah":["tipelampu-0=LED&daya-0=10&waktu-0=3&total-lampu-0=26.73&total_lampu_all=0&total_lampu_asli=53.46","jam-7=5&total;-item-7=&total_dapur=3786.75&total_dapur_asli=3786.75","jam-11=0&total-item-11=0&jam-12=3&total-item-12=2004.75&total_rumah_tangga=2004.75&total_rumah_tangga_asli=2004.75","total_pribadi=0&total_pribadi_asli=0","total_elektronik=0&total_elektronik_asli=0","total_komunikasi=0&total_komunikasi_asli=0"],"sampah":"total_organik=&total;_kertas=&total;_plastik=&total;_sampah=&total;_organik_asli=&total;_kertas_asli=&total;_plastik_asli=&total;_sampah_asli=","darat":{"tipe_pribadi":"2","tipe_umum":"8","jarak_tempuh":"","konsumsi":"","total_darat":"","total_darat_asli":""},"udara":false}', '2012-06-06 22:04:35', '0');

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
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1338992012, 1, 'Admin', 12),
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
  `vehicle_capacity` int(4) NOT NULL,
  `fuel_economy` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_type` (`vehicle_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `master_vehicles`
--

INSERT INTO `master_vehicles` (`id`, `vehicle_name`, `vehicle_type`, `n2o_cold`, `n2o_hot`, `ch4_cold`, `ch4_hot`, `vehicle_capacity`, `fuel_economy`) VALUES
(1, 'Motor', 'pribadi', 2, 2, 200, 200, 1, 0.0769231),
(2, 'Bensin &lt; 1200cc', 'pribadi', 12, 3, 83, 3, 4, 0.0666667),
(3, 'Bensin 1500cc', 'pribadi', 15, 9, 7, 3, 5, 0.0666667),
(4, 'Bensin &gt; 2000cc', 'pribadi', 12, 3, 83, 3, 6, 0.1),
(5, 'Diesel &lt; 1200cc', 'pribadi', 15, 9, 7, 3, 4, 0.1),
(6, 'Diesel 1500cc', 'pribadi', 12, 3, 83, 3, 5, 0.111111),
(7, 'Diesel &gt; 2000cc', 'pribadi', 15, 9, 7, 3, 6, 0.111111),
(8, 'Bus Kota', 'umum', 30, 30, 175, 175, 57, 0.0473709),
(9, 'Mikrolet / Angkot', 'umum', 38, 22, 45, 26, 14, 0.0672948),
(10, 'Metromini', 'umum', 30, 30, 175, 175, 27, 0.0672948),
(11, 'Bus Way', 'umum', 30, 30, 175, 175, 35, 0.0473709),
(12, 'Ojek', 'umum', 2, 2, 200, 200, 2, 0.0769231);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
