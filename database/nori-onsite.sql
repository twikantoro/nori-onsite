-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2020 pada 04.34
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nori-onsite`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `grup_antrian` varchar(1) NOT NULL,
  `urutan` int(11) NOT NULL,
  `loket` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_dilayani` timestamp NULL DEFAULT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `grup_antrian`, `urutan`, `loket`, `tanggal`, `waktu_masuk`, `waktu_dilayani`, `status`) VALUES
(1, 'A', 1, 1, '2020-02-02', '0000-00-00 00:00:00', '2020-02-02 15:25:06', '1'),
(3, 'A', 2, 1, '2020-02-02', '0000-00-00 00:00:00', '2020-02-02 15:29:50', '1'),
(4, 'B', 1, 1, '2020-02-02', '0000-00-00 00:00:00', '2020-02-02 15:29:53', '1'),
(5, 'B', 2, 1, '2020-02-02', '2020-02-02 15:08:20', '2020-02-02 15:30:26', '1'),
(6, 'A', 2, 4, '2020-02-02', '2020-02-02 15:08:35', '2020-02-02 15:30:51', '1'),
(7, 'A', 3, 4, '2020-02-02', '2020-02-02 15:08:35', '2020-02-02 15:30:54', '1'),
(8, 'B', 3, 4, '2020-02-02', '2020-02-02 15:08:35', '2020-02-02 15:48:29', '1'),
(9, 'A', 3, 3, '2020-02-02', '2020-02-02 15:08:36', '2020-02-02 15:48:34', '1'),
(10, 'B', 4, 2, '2020-02-02', '2020-02-02 15:08:36', NULL, '0'),
(11, 'A', 4, 1, '2020-02-02', '2020-02-02 15:08:36', NULL, '0'),
(16, 'A', 1, 4, '2020-02-03', '2020-02-03 02:02:54', '2020-02-03 02:04:19', '1'),
(17, 'B', 1, 0, '2020-02-03', '2020-02-03 02:02:55', NULL, ''),
(18, 'A', 2, 0, '2020-02-03', '2020-02-03 03:09:45', NULL, ''),
(19, 'A', 3, 0, '2020-02-03', '2020-02-03 03:11:25', NULL, ''),
(43, 'A', 1, 1, '2020-02-04', '2020-02-04 13:24:51', '2020-02-04 13:24:52', '1'),
(44, 'B', 1, 2, '2020-02-04', '2020-02-04 13:24:52', '2020-02-04 13:24:52', '1'),
(45, 'A', 2, 3, '2020-02-04', '2020-02-04 13:24:52', '2020-02-04 13:24:53', '1'),
(46, 'B', 2, 4, '2020-02-04', '2020-02-04 13:24:52', '2020-02-04 13:24:53', '1'),
(47, 'B', 2, 4, '2020-02-04', '2020-02-04 13:25:20', '2020-02-04 13:25:21', '1'),
(48, 'B', 3, 4, '2020-02-04', '2020-02-04 13:25:35', '2020-02-04 13:25:36', '1'),
(49, 'A', 1, 4, '2020-02-09', '2020-02-09 15:21:34', '2020-02-09 15:21:49', '1'),
(50, 'A', 2, 1, '2020-02-09', '2020-02-09 15:21:36', '2020-02-09 15:22:07', '1'),
(51, 'B', 1, 0, '2020-02-09', '2020-02-09 15:22:34', NULL, ''),
(52, 'A', 1, 1, '2020-02-12', '2020-02-12 12:21:50', '2020-02-12 12:21:50', '1'),
(53, 'B', 1, 2, '2020-02-12', '2020-02-12 12:52:09', '2020-02-12 12:52:10', '1'),
(54, 'A', 2, 3, '2020-02-12', '2020-02-12 12:52:32', '2020-02-12 12:52:33', '1'),
(55, 'B', 2, 4, '2020-02-12', '2020-02-12 12:52:51', '2020-02-12 12:52:52', '1'),
(85, 'A', 1, 2, '2020-02-20', '2020-02-20 12:24:08', '2020-02-20 13:23:45', '1'),
(86, 'A', 2, 3, '2020-02-20', '2020-02-20 12:27:25', '2020-02-20 13:23:50', '1'),
(87, 'B', 1, 6, '2020-02-20', '2020-02-20 13:23:53', '2020-02-20 14:13:52', '1'),
(88, 'B', 2, 5, '2020-02-20', '2020-02-20 13:29:02', '2020-02-20 14:14:06', '1'),
(89, 'B', 3, 0, '2020-02-20', '2020-02-20 14:13:51', NULL, ''),
(90, 'A', 3, 0, '2020-02-20', '2020-02-20 14:14:05', NULL, ''),
(91, 'A', 1, 6, '2020-02-24', '2020-02-24 13:36:00', '2020-02-24 13:36:02', '1'),
(92, 'B', 1, 1, '2020-03-09', '2020-03-09 00:57:04', '2020-03-09 00:57:04', '1'),
(93, 'A', 1, 2, '2020-03-09', '2020-03-09 00:57:57', '2020-03-09 00:57:57', '1'),
(94, 'A', 2, 3, '2020-03-09', '2020-03-09 00:58:18', '2020-03-09 00:58:20', '1'),
(95, 'B', 2, 4, '2020-03-09', '2020-03-09 00:58:26', '2020-03-09 00:58:28', '1'),
(96, 'B', 3, 5, '2020-03-09', '2020-03-09 00:58:45', '2020-03-09 00:58:47', '1'),
(97, 'B', 4, 6, '2020-03-09', '2020-03-09 00:59:06', '2020-03-09 00:59:08', '1'),
(98, 'A', 1, 1, '2020-06-22', '2020-06-22 02:30:35', '2020-06-22 02:30:35', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup_antrian`
--

CREATE TABLE `grup_antrian` (
  `codename` varchar(1) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `grup_antrian`
--

INSERT INTO `grup_antrian` (`codename`, `keterangan`) VALUES
('A', ''),
('B', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `loket1_status` tinyint(1) DEFAULT NULL,
  `loket2_status` tinyint(1) DEFAULT NULL,
  `loket3_status` tinyint(1) DEFAULT NULL,
  `loket4_status` tinyint(1) DEFAULT NULL,
  `loket5_status` tinyint(4) NOT NULL,
  `loket6_status` tinyint(4) NOT NULL,
  `config_json` text DEFAULT NULL,
  `running_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `loket1_status`, `loket2_status`, `loket3_status`, `loket4_status`, `loket5_status`, `loket6_status`, `config_json`, `running_text`) VALUES
(1, 1, 1, 1, 1, 0, 0, '{\"loket1_layani\":\"1\",\"loket2_layani\":\"2\",\"loket3_layani\":\"3\",\"loket4_layani\":\"4\",\"loket5_layani\":\"5\",\"loket6_layani\":\"6\",\"tambah_A\":\"a\",\"tambah_B\":\"b\"}', 'Diberitahukan kepada masyarakat bahwa hari ini adalah hari yang kau tunggu. Bertambah satu tahun usiamu bahagialah kamu. Yang kuberi bukan jam dan cincin bukan seikat bunga atau puisi juga kalung hati. Semoga tuhan melindungi kamu. Semoga tercapai semua angan dan cita-citamu.\r\n        ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jenis` text NOT NULL,
  `durasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `tata_letak` varchar(16) NOT NULL DEFAULT 'klasik',
  `background` text NOT NULL,
  `running_text` text NOT NULL,
  `running_text_warna` text NOT NULL,
  `running_text_background` text NOT NULL,
  `playlist` text NOT NULL,
  `loket_text_warna` text NOT NULL,
  `loket_border_warna` text NOT NULL,
  `loket_kotak_warna` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `tata_letak`, `background`, `running_text`, `running_text_warna`, `running_text_background`, `playlist`, `loket_text_warna`, `loket_border_warna`, `loket_kotak_warna`) VALUES
(1, '6', 'bgantrian.jpg', 'Kantor Perwakilan Bank Indonesia Solo Kantor Perwakilan Bank Indonesia Solo', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `role` varchar(16) NOT NULL DEFAULT 'kasir',
  `aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`, `aktif`) VALUES
(1, 'poi', 'f082f5ba2cadab8af40de038ab7a040d', '', 'kasir', 1),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'admin', 1),
(3, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'mang kasir', 'admin', 0),
(4, 'kasir2', 'c7911af3adbd12a035b289556d96470a', 'kasir dua', 'kasir', 1),
(5, 'toro', 'd140ee599d8f12b049de069abed2adad', 'Wikantoro', 'kasir', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `grup_antrian` (`grup_antrian`);

--
-- Indeks untuk tabel `grup_antrian`
--
ALTER TABLE `grup_antrian`
  ADD PRIMARY KEY (`codename`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`grup_antrian`) REFERENCES `grup_antrian` (`codename`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
