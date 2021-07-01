-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2020 pada 16.56
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id_jenis` int(11) NOT NULL,
  `kode_id` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jml_surat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_surat`
--

INSERT INTO `jenis_surat` (`id_jenis`, `kode_id`, `keterangan`, `jml_surat`) VALUES
(6, 'SU', 'Surat Undangan', 5),
(8, 'SI', 'Surat Izin', 1),
(9, 'SK', 'Surat Keputusan', 2),
(10, 'S.Per', 'Surat Perizinan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_sk` int(11) NOT NULL,
  `tgl_sk` date NOT NULL,
  `nomor_sk` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `file_surat` varchar(255) NOT NULL,
  `kode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_sk`, `tgl_sk`, `nomor_sk`, `tujuan`, `perihal`, `file_surat`, `kode_id`) VALUES
(1, '2020-07-30', '002/XAAC/29/3AS8/KL/2020', 'DFC Club', 'Undangan Mabim', '', 6),
(4, '2020-07-26', '004/XAAC/29/3AS8/KL/2020', 'Sabersih Club', 'Undangan Mabim', '', 6),
(5, '2020-07-30', '2018/09/A/SB/GERMAN/02', 'DFC Club 293', 'Undangan Mabim', '', 6);

--
-- Trigger `surat_keluar`
--
DELIMITER $$
CREATE TRIGGER `add_sk` AFTER INSERT ON `surat_keluar` FOR EACH ROW BEGIN
UPDATE jenis_surat SET jml_surat = jml_surat+1
    WHERE jenis_surat.id_jenis = NEW.kode_id;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `min_sk` AFTER DELETE ON `surat_keluar` FOR EACH ROW BEGIN
UPDATE jenis_surat SET jml_surat = jml_surat-1
    WHERE jenis_surat.id_jenis = OLD.kode_id;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_sm` int(11) NOT NULL,
  `nomor_sm` varchar(255) NOT NULL,
  `tgl_sm` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `file_surat` varchar(255) NOT NULL,
  `kode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_sm`, `nomor_sm`, `tgl_sm`, `pengirim`, `perihal`, `file_surat`, `kode_id`) VALUES
(1, '002/XAAC/29/3AS8/KL/2020', '2020-07-16', 'Mandra Club 290', 'Undangan Mabim', '', 6),
(2, '2029/32948/FA/AKreditasi', '2020-07-23', 'WaKemendikbud', 'Undangan BPW #2', 'upload/', 6),
(4, '004/XAAC/29/3AS8/KL/2020', '2020-07-26', 'KCH Club', 'Undangan Mabim', '', 6),
(10, '002/DAAC/29/3AS8/KL/2020', '2020-07-09', 'Mandra', 'Undangan BPW #2', 'upload/', 9),
(13, '209090/32948/FA/AKreditasi', '2020-07-28', 'Mandra', 'Undangan BPW #2', 'upload/', 8),
(14, 'A', '2020-07-28', 'franklin', 'ABCSDSGH', 'upload/', 6);

--
-- Trigger `surat_masuk`
--
DELIMITER $$
CREATE TRIGGER `add_sm` AFTER INSERT ON `surat_masuk` FOR EACH ROW BEGIN
UPDATE jenis_surat SET jml_surat = jml_surat+1
    WHERE jenis_surat.id_jenis = NEW.kode_id;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `min_sm` AFTER DELETE ON `surat_masuk` FOR EACH ROW BEGIN
UPDATE jenis_surat SET jml_surat = jml_surat-1
    WHERE jenis_surat.id_jenis = OLD.kode_id;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'jamlud', 'jamlud123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `kode_id` (`kode_id`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_sk`),
  ADD UNIQUE KEY `nomor_sk` (`nomor_sk`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_sm`),
  ADD UNIQUE KEY `nomor_sm` (`nomor_sm`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
