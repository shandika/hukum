-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 09 Apr 2019 pada 08.12
-- Versi Server: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.2.16-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `tbl_catatan`
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

--
-- Dumping data untuk tabel `tbl_catatan`
--

INSERT INTO `tbl_catatan` (`id`, `tgl_masuk`, `kode_voucher`, `nama`, `catatan_user`, `catatan_admin`, `catatan_staff`) VALUES
(6, '2019-04-05 03:18:45', 'E7e2dZ', NULL, 'Mengambil jumlah', NULL, NULL),
(8, '2019-04-08 04:46:10', 'E7e2dZ', 'YOLA IVONIE', NULL, 'Ambil', NULL),
(9, '2019-04-08 05:47:08', 'ILkNXx', NULL, ' Tes', NULL, NULL),
(10, '2019-04-08 05:48:03', 'ILkNXx', 'YOLA IVONIE', NULL, 'Kerjakan', NULL),
(11, '2019-04-08 06:05:46', 'ILkNXx', 'YOLA IVONIE', NULL, 'Oke', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_new_job`
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

--
-- Dumping data untuk tabel `tbl_new_job`
--

INSERT INTO `tbl_new_job` (`kode_voucher`, `email`, `unit_kerja`, `judul_dokumen`, `catatan`, `tanggal_buat`, `tanggal_selesai`, `status`, `tgl_mulai_kerja`, `tgl_selesai_kerja`, `catatan_admin`, `catatan_staff`, `nama_staff`, `status_job`, `status_pending`, `status_inbox_staff`, `status_pembaharuan_staff`) VALUES
('E7e2dZ', 'irc.kakax@yahoo.co.id', 'Pengembangan Bisnis dan Produksi', 'Count', 'Mengambil jumlah', '2019-04-05 03:18:45', '2019-04-08 10:18:45', '1', '2019-04-08 11:45:57', '2019-04-11 11:46:10', 'Ambil', NULL, 'YOLA IVONIE', '2', '0', '2', '1'),
('ILkNXx', 'contoh@gmail.com', 'Produksi', 'Contoh', ' Tes', '2019-04-08 05:47:08', '2019-04-11 12:47:08', '1', '2019-04-08 01:05:19', '2019-04-11 01:05:46', 'Oke', NULL, 'YOLA IVONIE', '2', '0', '2', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_unit_kerja`
--

CREATE TABLE `tbl_unit_kerja` (
  `id_uk` int(11) NOT NULL,
  `nama_unit_kerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_unit_kerja`
--

INSERT INTO `tbl_unit_kerja` (`id_uk`, `nama_unit_kerja`) VALUES
(7, 'Corporate Finance'),
(2, 'Human Capital Management & Quality'),
(4, 'Information Technology & Umum'),
(1, 'Pengembangan Bisnis dan Produksi'),
(5, 'Produksi'),
(6, 'Satuan Pengawasan Intern'),
(8, 'SBU Broadband'),
(10, 'SBU Defense & Digital Service'),
(9, 'SBU Smart Energy'),
(3, 'Sekretaris Perusahaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
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
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`nama_user`, `nipeg_user`, `divisi_user`, `bagian_user`, `foto_user`, `level`, `username`, `password`, `job_title`) VALUES
('YOLA IVONIE', '1233546', 'Human Capital Management & Quality', 'IT', 'yola.jpg', 'staff', 'yola', 'b51a7cdd2ee7d114227a1ec1ec31a98e6c7d9eb4', 'Web'),
('SHANDIKA EKA PUTRA', '16111125', 'Human Capital Management & Quality', 'IT', 'shandika.jpg', 'admin', 'admin', 'ac807a175c2a471eceafa5dacb6612e0a361def0', 'Web'),
('MOHAMAD ADITYA', 'PK201812001', 'Sekretaris Perusahaan', 'Hukum', 'umar.jpg', 'staff', 'aditya', '5d1852d43efe8f6e393448a3b4d1cd98a4cfd56f', 'null'),
('NADYA ARRIZKA HUTAMI', 'PK201812002', 'Sekretaris Perusahaan', 'Hukum', 'umar.jpg', 'staff', 'nadya', '05cfb17b1fdd9c04f1d259eacec250a63b211222', 'null'),
('EZRA LONTOH', 'PP200912001', 'Sekretaris Perusahaan', 'Hukum', 'umar.jpg', 'admin', 'ezra', '9fd00e132efa4424ee4d0c3efa584ea43b66f114', 'null'),
('PUTTY OCTAVIANY PURWADIPUTRI', 'PP201005001', 'Sekretaris Perusahaan', 'Hukum', 'umar.jpg', 'staff', 'putty', '4fee5a2bfb0edcb3d0f8d955bd6f1c8860b305ae', 'null'),
('RADEN SITI SARI DEWI', 'PP201202022', 'Sekretaris Perusahaan', 'Hukum', 'umar.jpg', 'staff', 'sari', 'bbde9ba3c334de9ac817aa0264edb8b9b1eabe72', 'null');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_unit_kerja`
--
ALTER TABLE `tbl_unit_kerja`
  MODIFY `id_uk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_catatan`
--
ALTER TABLE `tbl_catatan`
  ADD CONSTRAINT `tbl_catatan_ibfk_1` FOREIGN KEY (`kode_voucher`) REFERENCES `tbl_new_job` (`kode_voucher`),
  ADD CONSTRAINT `tbl_catatan_ibfk_2` FOREIGN KEY (`nama`) REFERENCES `tbl_user` (`nama_user`);

--
-- Ketidakleluasaan untuk tabel `tbl_new_job`
--
ALTER TABLE `tbl_new_job`
  ADD CONSTRAINT `tbl_new_job_ibfk_1` FOREIGN KEY (`unit_kerja`) REFERENCES `tbl_unit_kerja` (`nama_unit_kerja`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
