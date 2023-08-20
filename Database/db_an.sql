-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2023 pada 15.25
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_an`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_antrian`
--

CREATE TABLE `tbl_antrian` (
  `id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `no_antrian` smallint(6) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_antrian`
--

INSERT INTO `tbl_antrian` (`id`, `tanggal`, `no_antrian`, `status`, `updated_date`) VALUES
(1, '2023-08-16', 1, '1', '2023-08-16 11:14:14'),
(2, '2023-08-16', 2, '1', '2023-08-16 12:04:54'),
(3, '2023-08-16', 3, '1', '2023-08-16 12:07:07'),
(4, '2023-08-16', 4, '1', '2023-08-16 10:52:38'),
(5, '2023-08-16', 5, '1', '2023-08-16 12:31:24'),
(6, '2023-08-16', 6, '1', '2023-08-16 12:31:21'),
(7, '2023-08-16', 7, '0', NULL),
(8, '2023-08-16', 8, '0', NULL),
(9, '2023-08-16', 9, '0', NULL),
(10, '2023-08-16', 10, '0', NULL),
(11, '2023-08-16', 11, '0', NULL),
(12, '2023-08-16', 12, '0', NULL),
(13, '2023-08-16', 13, '0', NULL),
(14, '2023-08-16', 14, '0', NULL),
(15, '2023-08-16', 15, '0', NULL),
(16, '2023-08-18', 1, '1', '2023-08-18 14:21:05'),
(17, '2023-08-18', 2, '1', '2023-08-18 14:21:35'),
(18, '2023-08-18', 3, '1', '2023-08-18 14:24:03'),
(19, '2023-08-18', 4, '1', '2023-08-18 14:24:13'),
(20, '2023-08-18', 5, '1', '2023-08-18 14:45:34'),
(21, '2023-08-18', 6, '1', '2023-08-18 14:46:32'),
(22, '2023-08-20', 1, '0', NULL),
(23, '2023-08-20', 2, '0', NULL),
(24, '2023-08-20', 3, '0', NULL),
(25, '2023-08-20', 4, '0', NULL),
(26, '2023-08-20', 5, '0', NULL),
(27, '2023-08-20', 6, '0', NULL),
(28, '2023-08-20', 7, '0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Bambang', 'Bams123', '525263', 'admin'),
(2, 'Rahadi', 'Rah123', '12345', 'guest');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
