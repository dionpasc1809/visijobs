-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2014 at 08:39 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `visijobs_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_fake_employer`
--

CREATE TABLE IF NOT EXISTS `ms_fake_employer` (
  `id_fake_employer` varchar(10) NOT NULL,
  `nama_perusahaan` varchar(60) NOT NULL,
  `email_perusahaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `industri` varchar(60) NOT NULL,
  PRIMARY KEY (`id_fake_employer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_fake_employer`
--

INSERT INTO `ms_fake_employer` (`id_fake_employer`, `nama_perusahaan`, `email_perusahaan`, `alamat`, `industri`) VALUES
('FE00000001', 'PT. Beneran', 'beneran@email.com', 'Jl. Di Jakarta Ada Jalan no. 0', 'Mainan'),
('FE00000002', 'PT. Gak Bohong', 'gakbohong@email.com', 'Jl. Di Surabaya Ada Jalan no. 0', 'Mainan'),
('FE00000003', 'PT. Percaya Deh', 'percayadeh@email.com', 'Jl. Di Madura Ada Jalan no. 0', 'Mainan'),
('FE00000004', 'PT. Pharos Indonesia', 'www.karirpharos.com', 'Jakarta', 'Kesehatan / Farmasi'),
('FE00000005', 'PT Cipta Diamond Property', '', 'PT Cipta Diamond Property \nGedung Tranka Lt. 4 \nJl. Raya Ps Minggu No.17 \nJakarta Selatan \n12510', 'Pengembangan Properti');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
