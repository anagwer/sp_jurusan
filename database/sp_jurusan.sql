-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2025 at 04:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_jurusan`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_deteksi`
--

CREATE TABLE `hasil_deteksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tingkat_kecocokan` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_deteksi`
--

INSERT INTO `hasil_deteksi` (`id`, `nama`, `jurusan`, `deskripsi`, `tingkat_kecocokan`, `tanggal`) VALUES
(1, 'test', 'Desain Komunikasi Visual (DKV)', 'Desain Komunikasi Visual (DKV)', 33, '2025-07-21 21:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `deskripsi`) VALUES
(1, 'Teknik Informatika', 'Teknik Informatika'),
(3, 'Kedokteran', 'Kedokteran'),
(4, 'Hukum', 'Hukum'),
(5, 'Psikologi', 'Psikologi'),
(6, 'Teknik Sipil', 'Teknik Sipil'),
(7, 'Ekonomi', 'Ekonomi'),
(8, 'Sastra Inggris', 'Sastra Inggris'),
(9, 'Desain Komunikasi Visual (DKV)', 'Desain Komunikasi Visual (DKV)');

-- --------------------------------------------------------

--
-- Table structure for table `minat_bakat`
--

CREATE TABLE `minat_bakat` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minat_bakat`
--

INSERT INTO `minat_bakat` (`id`, `kode`, `deskripsi`) VALUES
(1, 'G1 ', 'Suka logika dan pemrograman'),
(2, 'G2 ', 'Tertarik dengan anatomi tubuh manusia'),
(3, 'G3', 'Senang membaca dan menganalisis hukum'),
(4, 'G4', 'Suka memahami perilaku manusia'),
(5, 'G5', 'Suka menggambar dan desain'),
(6, 'G6', 'Minat terhadap ekonomi\r\ndan keuangan'),
(7, 'G7', 'Tertarik pada pembangunan\r\ndan struktur bangunan\r\n'),
(8, 'G8', 'Suka menulis dan membaca\r\nsastra asing\r\n'),
(9, 'G9', 'Suka matematika'),
(10, 'G10', 'Senang kerja di\r\nlaboratorium atau\r\neksperimen medis'),
(11, 'G11', 'Punya rasa empati tinggi'),
(12, 'G12', 'Punya ketelitian tinggi'),
(13, 'G13', 'Tertarik dengan komputer\r\ndan teknologi'),
(14, 'G14', 'Aktif berdebat dan berpikir\r\nkritis'),
(15, 'G15', 'Tertarik pada seni visual\r\ndan ilustrasi'),
(16, 'G16', 'Senang membaca berita\r\nekonomi'),
(17, 'G17 ', 'Suka mengatur dan\r\nmenganalisis data'),
(18, 'G18', 'Punya kemampuan\r\nkomunikasi yang baik'),
(19, 'G19', 'Suka desain antarmuka\r\npengguna (UI/UX)'),
(20, 'G20', 'Senang kerja tim dan\r\nleadership'),
(21, 'G21', 'Tertarik pada budaya dan\r\nbahasa asing');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `kode_rule` varchar(10) DEFAULT NULL,
  `gejala` text DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `kode_rule`, `gejala`, `id_jurusan`) VALUES
(1, 'R1', 'G1, G9, G12, G13, G17', 1),
(2, 'R2', 'G2, G10, G11, G12, G20 ', 3),
(4, 'R3', 'G3, G14, G18, G20 ', 4),
(5, 'R4', 'G4, G11, G18, G20', 5),
(6, 'R5', 'G7, G9, G12', 6),
(7, 'R6', 'G6, G9, G16, G17', 7),
(8, 'R7', 'G8, G18, G21', 8),
(9, 'R8', 'G5, G15, G19', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_deteksi`
--
ALTER TABLE `hasil_deteksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minat_bakat`
--
ALTER TABLE `minat_bakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_deteksi`
--
ALTER TABLE `hasil_deteksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `minat_bakat`
--
ALTER TABLE `minat_bakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
