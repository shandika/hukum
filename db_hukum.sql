-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 04:25 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hukum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catatan`
--

CREATE TABLE `tbl_catatan` (
  `id` int(11) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kode_voucher` varchar(10) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `catatan_user` text,
  `catatan_admin` text,
  `catatan_staff` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_job`
--

CREATE TABLE `tbl_new_job` (
  `kode_voucher` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `unit_kerja` varchar(40) NOT NULL,
  `judul_dokumen` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `tanggal_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_selesai` datetime NOT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `tgl_mulai_kerja` datetime DEFAULT NULL,
  `tgl_selesai_kerja` datetime DEFAULT NULL,
  `catatan_admin` text,
  `catatan_staff` text,
  `nama_staff` varchar(40) DEFAULT NULL,
  `status_job` enum('0','1','2','3') DEFAULT '0',
  `status_pending` enum('0','1') NOT NULL DEFAULT '0',
  `status_inbox_staff` enum('0','1','2') NOT NULL DEFAULT '0',
  `status_pembaharuan_staff` enum('0','1','2') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit_kerja`
--

CREATE TABLE `tbl_unit_kerja` (
  `id_uk` int(11) NOT NULL,
  `nama_unit_kerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit_kerja`
--

INSERT INTO `tbl_unit_kerja` (`id_uk`, `nama_unit_kerja`) VALUES
(7, 'Corporate Finance'),
(2, 'Human Capital Management & Quality'),
(4, 'Information Technology & Umum'),
(1, 'Pengembangan Bisnis dan Produksi'),
(5, 'Produksi'),
(6, 'Satuan Pengawasaan Intern'),
(8, 'SBU Broadband'),
(10, 'SBU Defense & Digital Service'),
(9, 'SBU Smart Energy'),
(3, 'Sekretaris Perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nama_user` varchar(70) NOT NULL,
  `nipeg_user` varchar(50) NOT NULL,
  `divisi_user` varchar(50) NOT NULL,
  `bagian_user` varchar(50) NOT NULL,
  `foto_user` varchar(100) DEFAULT NULL,
  `level` enum('admin','staff','') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `job_title` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nama_user`, `nipeg_user`, `divisi_user`, `bagian_user`, `foto_user`, `level`, `username`, `password`, `job_title`) VALUES
('Yola', '1233546', 'HCMQ', 'IT', 'yola.jpg', 'staff', 'yola', 'b51a7cdd2ee7d114227a1ec1ec31a98e6c7d9eb4', 'Web'),
('SHANDIKA EKA PUTRA', '16111125', '', 'IT', 'shandika.jpg', 'admin', 'admin', '5fafba96a0848016294b620581e62442a818b6de', 'Web'),
('MOHAMAD ADITYA', 'PK.201812001', 'Sekretaris Perusahaan', 'Hukum', 'umar.jpg', 'staff', 'aditya', '5d1852d43efe8f6e393448a3b4d1cd98a4cfd56f', 'null'),
('NADYA ARRIZKA HUTAMI', 'PK.201812002', 'Sekretaris Perusahaan', 'Hukum', 'umar.jpg', 'staff', 'nadya', '05cfb17b1fdd9c04f1d259eacec250a63b211222', 'null'),
('PUTTY OCTAVIANY PURWADIPUTRI', 'PP.201005001', 'Sekretaris Perusahaan', 'Hukum', 'umar.jpg', 'staff', 'putty', '4fee5a2bfb0edcb3d0f8d955bd6f1c8860b305ae', 'null'),
('RADEN SITI SARI DEWI', 'PP.201202022', 'Sekretaris Perusahaan', 'Hukum', 'umar.jpg', 'staff', 'sari', 'bbde9ba3c334de9ac817aa0264edb8b9b1eabe72', 'null'),
('EZRA LONTOH', 'PP200912001', 'Sekretaris Perusahaan', 'Hukum', 'umar.jpg', 'admin', 'ezra', '9fd00e132efa4424ee4d0c3efa584ea43b66f114', 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_catatan`
--
ALTER TABLE `tbl_catatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kode_voucher` (`kode_voucher`);

--
-- Indexes for table `tbl_new_job`
--
ALTER TABLE `tbl_new_job`
  ADD PRIMARY KEY (`kode_voucher`),
  ADD KEY `unit_kerja` (`unit_kerja`);

--
-- Indexes for table `tbl_unit_kerja`
--
ALTER TABLE `tbl_unit_kerja`
  ADD PRIMARY KEY (`id_uk`),
  ADD KEY `nama_unit_kerja` (`nama_unit_kerja`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`nipeg_user`),
  ADD KEY `nama_user` (`nama_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_catatan`
--
ALTER TABLE `tbl_catatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_unit_kerja`
--
ALTER TABLE `tbl_unit_kerja`
  MODIFY `id_uk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_catatan`
--
ALTER TABLE `tbl_catatan`
  ADD CONSTRAINT `tbl_catatan_ibfk_1` FOREIGN KEY (`kode_voucher`) REFERENCES `tbl_new_job` (`kode_voucher`),
  ADD CONSTRAINT `tbl_catatan_ibfk_2` FOREIGN KEY (`nama`) REFERENCES `tbl_user` (`nama_user`);

--
-- Constraints for table `tbl_new_job`
--
ALTER TABLE `tbl_new_job`
  ADD CONSTRAINT `tbl_new_job_ibfk_1` FOREIGN KEY (`unit_kerja`) REFERENCES `tbl_unit_kerja` (`nama_unit_kerja`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
