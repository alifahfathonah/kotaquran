-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2021 pada 03.22
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutabaah_rmd`
--

CREATE TABLE `mutabaah_rmd` (
  `mtb_id` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `upa_id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tgl_rmd` int(11) NOT NULL,
  `tilawah` int(11) NOT NULL,
  `yasin` int(11) NOT NULL,
  `dukhon` int(11) NOT NULL,
  `waqiah` int(11) NOT NULL,
  `mulk` int(11) NOT NULL,
  `kahfi` int(11) NOT NULL,
  `ali_imron` int(11) NOT NULL,
  `dzikir_pagi` int(11) NOT NULL,
  `dzikir_petang` int(11) NOT NULL,
  `hafal_ayat` int(11) NOT NULL,
  `istighfar` int(11) NOT NULL,
  `shalawat` int(11) NOT NULL,
  `tahlil` int(11) NOT NULL,
  `doa_harian` int(11) NOT NULL,
  `doa_sikon` int(11) NOT NULL,
  `doa_partai` int(11) NOT NULL,
  `doa_bangsa` int(11) NOT NULL,
  `doa_soliditas` int(11) NOT NULL,
  `berjamaah` int(11) NOT NULL,
  `tarawih` int(11) NOT NULL,
  `shalat_tasbih` int(11) NOT NULL,
  `shalat_istikhoroh` int(11) NOT NULL,
  `shalat_hajat` int(11) NOT NULL,
  `evaluasi_diri` int(11) NOT NULL,
  `itikaf` int(11) NOT NULL,
  `ziarah_qubur` int(11) NOT NULL,
  `haid_nifas` int(11) NOT NULL DEFAULT '0',
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mutabaah_rmd`
--
ALTER TABLE `mutabaah_rmd`
  ADD PRIMARY KEY (`mtb_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mutabaah_rmd`
--
ALTER TABLE `mutabaah_rmd`
  MODIFY `mtb_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
