-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jan 2017 pada 23.38
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `basispengetahuan`
--

CREATE TABLE `basispengetahuan` (
  `namapenyakit` varchar(100) NOT NULL,
  `gejala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `basispengetahuan`
--

INSERT INTO `basispengetahuan` (`namapenyakit`, `gejala`) VALUES
('Eksim', 'Ruam merah gatal'),
('Eksim', 'Kulit menebal dan pecah-pecah'),
('Infeksi Jamur', 'Luka melepuh berisi cairan'),
('Psoriasis', 'Bercak putih bersisik'),
('Jerawat', 'Benjolan kecil berisi nanah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` varchar(10) NOT NULL,
  `gejala` varchar(1000) NOT NULL,
  `bagiankulit` varchar(50) NOT NULL,
  `jeniskulit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`idgejala`, `gejala`, `bagiankulit`, `jeniskulit`) VALUES
('G001', 'Ruam merah gatal', 'Tangan', 'Eksim'),
('G002', 'Luka melepuh berisi cairan', 'Kaki', 'Infeksi Jamur'),
('G003', 'Bercak putih bersisik', 'Wajah', 'Psoriasis'),
('G004', 'Kulit menebal dan pecah-pecah', 'Telapak Kaki', 'Eksim'),
('G005', 'Benjolan kecil berisi nanah', 'Punggung', 'Jerawat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `idpenyakit` varchar(20) NOT NULL,
  `namapenyakit` varchar(1000) NOT NULL,
  `bagiankulit` varchar(50) NOT NULL,
  `penanganan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`idpenyakit`, `namapenyakit`, `bagiankulit`, `penanganan`) VALUES
('P001', 'Eksim', 'Tangan', 'Gunakan pelembap, hindari pemicu alergi, konsultasi ke dokter jika parah.'),
('P002', 'Infeksi Jamur', 'Kaki', 'Jaga kebersihan kaki, gunakan salep antijamur, jaga kaki tetap kering.'),
('P003', 'Psoriasis', 'Wajah', 'Gunakan krim khusus psoriasis, hindari stres, konsultasi ke dokter.'),
('P004', 'Jerawat', 'Punggung', 'Jaga kebersihan kulit, gunakan sabun antibakteri, konsultasi ke dokter jika parah.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama`) VALUES
('U001', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`idpenyakit`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
