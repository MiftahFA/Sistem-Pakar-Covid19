-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 08:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Miftah', 'admin', '73acd9a5972130b75066c82595a1fae3');

-- --------------------------------------------------------

--
-- Table structure for table `basispengetahuan`
--

CREATE TABLE `basispengetahuan` (
  `id_basispengetahuan` int(3) NOT NULL,
  `id_penyakit` varchar(3) NOT NULL,
  `id_gejala` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basispengetahuan`
--

INSERT INTO `basispengetahuan` (`id_basispengetahuan`, `id_penyakit`, `id_gejala`) VALUES
(22, 'K01', 'G05'),
(21, 'K01', 'G04'),
(20, 'K01', 'G03'),
(19, 'K01', 'G02'),
(18, 'K01', 'G01'),
(23, 'K01', 'G06'),
(24, 'K01', 'G07'),
(25, 'K01', 'G08'),
(26, 'K01', 'G09'),
(27, 'K01', 'G10'),
(28, 'K01', 'G11'),
(29, 'K01', 'G12'),
(30, 'K01', 'G14'),
(31, 'K02', 'G01'),
(32, 'K02', 'G02'),
(33, 'K02', 'G03'),
(34, 'K02', 'G04'),
(35, 'K02', 'G05'),
(36, 'K02', 'G06'),
(37, 'K02', 'G07'),
(38, 'K02', 'G08'),
(39, 'K02', 'G09'),
(40, 'K02', 'G11'),
(41, 'K02', 'G13'),
(42, 'K02', 'G14'),
(43, 'K02', 'G15'),
(44, 'K02', 'G16'),
(45, 'K02', 'G17'),
(46, 'K03', 'G01'),
(47, 'K03', 'G02'),
(48, 'K03', 'G03'),
(49, 'K03', 'G04'),
(50, 'K03', 'G05'),
(51, 'K03', 'G06'),
(52, 'K03', 'G07'),
(53, 'K03', 'G08'),
(54, 'K03', 'G09'),
(55, 'K03', 'G13'),
(61, 'K03', 'G22'),
(57, 'K03', 'G18'),
(58, 'K03', 'G19'),
(59, 'K03', 'G20'),
(60, 'K03', 'G21');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(3) NOT NULL,
  `gejala` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `gejala`) VALUES
('G02', 'Demam'),
('G01', 'Batuk, biasanya batuk kering'),
('G03', 'Pilek dan hidung tersumbat'),
('G04', 'Hilangnya indra penciuman (anosmia)'),
('G05', 'Hilangnya indra perasa/pengecapan (ageusia)'),
('G06', 'Sakit Tenggorokan'),
('G07', 'Mengalami kelelahan'),
('G08', 'Sakit kepala'),
('G09', 'Nyeri otot dan nyeri tulang'),
('G10', 'Frekuensi napas 12 – 20 kali per menit'),
('G11', 'Merasa mual/muntah dan sakit perut'),
('G12', 'Saturasi oksigen lebih atau sama dengan 95%'),
('G13', 'Kesulitan atau tidak bisa makan dan minum'),
('G14', 'Letih dan lemas'),
('G15', 'Frekuensi napas 20 – 30 kali per menit'),
('G16', 'Mengalami dehidrasi'),
('G17', 'Saturasi oksigen lebih atau sama dengan 93% dan kurang dari 95%'),
('G18', 'Mengalami tanda-tanda gagal pernapasan'),
('G19', 'Saturasi oksigen tidak meningkat diatas 93% meskipun memakai alat bantu pernapasan paling sederhana (nasal canul)'),
('G20', 'Mulai hilangnya kesadaran'),
('G21', 'Frekuensi napas lebih dari 30 kali per menit'),
('G22', 'Saturasi oksigen kurang dari 93%');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(3) NOT NULL,
  `id_riwayat` varchar(255) NOT NULL,
  `id_penyakit` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(3) NOT NULL,
  `kriteria_penyakit` varchar(255) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `saran` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kriteria_penyakit`, `detail`, `saran`) VALUES
('K01', 'Covid-19 Ringan', 'Pasien dengan infeksi saluran napas oleh virus dengan gejala tidak spesifik seperti demam, lemah, batuk, nyeri otot, sakit tenggorokan, hidung tersumbat, sakit kepala. Meskipun jarang, pasien dapat dengan keluhan diare, mual atau muntah.', 'Pasien dapat melakukan isolasi mandiri selama 10 hari di rumah ditambah 3 hari bebas gangguan pernapasan dan demam atau pasien dapat pergi ke rumah sakit dengan menghubungi dokter umum terlebih dahulu untuk melakukan konsultasi lebih lanjut atau dengan Telemedicine yaitu konsultasi dengan dokter secara online.'),
('K02', 'Covid-19 Sedang', 'Pasien remaja/dewasa dengan pneumonia tetapi tidak menunjukan sebagai pneumonia berat. Pada Anak-anak dengan pneumonia tidak berat dengan keluhan batuk atau sulit bernapas disertai napas cepat.\r\n', 'Pasien harus segera dibawa ke rumah sakit rujukan atau rumah sakit darurat Covid-19 untuk mendapatkan perawatan lebih lanjut.'),
('K03', 'Covid-19 Berat', 'Pasien remaja/dewasa dengan demam atau gejala ISPA, ditambah satu dari: frekuensi napas > 30 kali per menit, distress pernapasan berat, atau saturasi oksigen <93% pada udara kamar. Pada anak dengan batuk atau kesulitan bernapas, ditambah tanda pneumonia berat.', 'Pasien harus segera dilarikan ke rumah sakit rujukan Covid-19 dan dirawat di ruang ICU (Intensive Care Unit) atau HCU (High Care Unit).');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` varchar(255) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `umur` int(3) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  ADD PRIMARY KEY (`id_basispengetahuan`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_riwayat` (`id_riwayat`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  MODIFY `id_basispengetahuan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
