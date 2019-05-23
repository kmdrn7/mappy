-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2019 at 12:54 AM
-- Server version: 10.1.29-MariaDB-6ubuntu2
-- PHP Version: 7.2.18-1+ubuntu18.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mappy`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1558633428),
('m130524_201442_init', 1558633430),
('m190124_110200_add_verification_token_column_to_user_table', 1558633431);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Andika Ahmad Ramadhan', 'andika@mappy.com', 'password', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bangunan`
--

CREATE TABLE `tbl_bangunan` (
  `id_bangunan` int(10) UNSIGNED NOT NULL,
  `bangunan` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bangunan`
--

INSERT INTO `tbl_bangunan` (`id_bangunan`, `bangunan`, `deskripsi`, `gambar`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asdasdasdasd', 'asdsad', 324, 234, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'sada', 'sada', 'asd', 123123, 1231, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'PENS', 'aslkdjasldjasd', 'pens-1558631969.png', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar_ruangan`
--

CREATE TABLE `tbl_gambar_ruangan` (
  `id_gambar_ruangan` int(10) UNSIGNED NOT NULL,
  `id_ruangan` int(10) UNSIGNED NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gambar_ruangan`
--

INSERT INTO `tbl_gambar_ruangan` (`id_gambar_ruangan`, `id_ruangan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdasd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, '1558633857.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(10) UNSIGNED NOT NULL,
  `id_bangunan` int(10) UNSIGNED NOT NULL,
  `ruangan` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `id_bangunan`, `ruangan`, `deskripsi`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(1, 3, 'Ruangan', 'asdkjaslkjdsdf', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'andika', '7ssh2QiLOG9e-DSbeMNcWEmFOpu3pUex', '$2y$13$/fIV8692R0oBXjDD/98Xjuy6eYdwetESIvjHSV7lNfabi/rSjV28e', NULL, 'andika@mappy.com', 10, 1558633903, 1558633903, 'ckifEAvBHm2WNP5FEczDSQ3SLotUnE1w_1558633903');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_bangunan`
--
ALTER TABLE `tbl_bangunan`
  ADD PRIMARY KEY (`id_bangunan`);

--
-- Indexes for table `tbl_gambar_ruangan`
--
ALTER TABLE `tbl_gambar_ruangan`
  ADD PRIMARY KEY (`id_gambar_ruangan`),
  ADD KEY `fk_tbl_gambar_ruangan_tbl_ruangan_id_ruangan_idx` (`id_ruangan`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `fk_tbl_ruangan_tbl_bangunan_id_bangunan_idx` (`id_bangunan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_bangunan`
--
ALTER TABLE `tbl_bangunan`
  MODIFY `id_bangunan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_gambar_ruangan`
--
ALTER TABLE `tbl_gambar_ruangan`
  MODIFY `id_gambar_ruangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_gambar_ruangan`
--
ALTER TABLE `tbl_gambar_ruangan`
  ADD CONSTRAINT `fk_tbl_gambar_ruangan_tbl_ruangan_id_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_ruangan` (`id_ruangan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD CONSTRAINT `fk_tbl_ruangan_tbl_bangunan_id_bangunan` FOREIGN KEY (`id_bangunan`) REFERENCES `tbl_bangunan` (`id_bangunan`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
