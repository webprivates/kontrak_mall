-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2018 at 06:18 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `works_kontrak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id_file` int(11) NOT NULL,
  `kontrak_id` int(11) NOT NULL,
  `nm_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`id_file`, `kontrak_id`, `nm_file`, `created_at`) VALUES
(24, 7, 'Sampul.doc', '2018-07-13 15:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis`, `nm_jenis`) VALUES
(3, 'entahggg'),
(4, 'apa aja');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontrak`
--

CREATE TABLE `tbl_kontrak` (
  `id_kontrak` int(11) NOT NULL,
  `nm_kontrak` varchar(40) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `nm_toko` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `cp` varchar(15) NOT NULL,
  `jml_dana` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kontrak`
--

INSERT INTO `tbl_kontrak` (`id_kontrak`, `nm_kontrak`, `jenis_id`, `nm_toko`, `tgl_masuk`, `cp`, `jml_dana`) VALUES
(6, 'Jual', 3, 'matahari', '2018-07-07', '16422', 1500000),
(7, 'yes', 4, 'plaza', '2018-07-04', '16422', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `username`, `password`, `nama`, `level`) VALUES
(1, 'akbar', '4f033a0a2bf2fe0b68800a3079545cd1', 'akbar abustang', 'admin'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `fk.kontrak` (`kontrak_id`);

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  ADD PRIMARY KEY (`id_kontrak`),
  ADD KEY `fk.jenis` (`jenis_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD CONSTRAINT `fk.kontrak` FOREIGN KEY (`kontrak_id`) REFERENCES `tbl_kontrak` (`id_kontrak`);

--
-- Constraints for table `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  ADD CONSTRAINT `fk.jenis` FOREIGN KEY (`jenis_id`) REFERENCES `tbl_jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;
