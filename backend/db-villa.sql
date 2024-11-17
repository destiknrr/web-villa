-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 11:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-villa`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_villa`
--

CREATE TABLE `fasilitas_villa` (
  `id` int(11) NOT NULL,
  `villa_id` int(11) DEFAULT NULL,
  `nama_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas_villa`
--

INSERT INTO `fasilitas_villa` (`id`, `villa_id`, `nama_fasilitas`) VALUES
(1, 1, 'Kamar Tidur AC'),
(2, 1, 'Kamar Mandi Air Panas'),
(3, 1, 'Ruang Tamu'),
(4, 1, 'Dapur Lengkap'),
(5, 1, 'Area Parkir Luas'),
(6, 1, 'Taman'),
(7, 1, 'WiFi'),
(8, 2, 'Kamar Tidur AC'),
(9, 2, 'Kamar Mandi Modern'),
(10, 2, 'Ruang Keluarga'),
(11, 2, 'Dapur Set'),
(12, 2, 'Garasi'),
(13, 2, 'Teras'),
(14, 2, 'BBQ Area');

-- --------------------------------------------------------

--
-- Table structure for table `foto_villa`
--

CREATE TABLE `foto_villa` (
  `id` int(11) NOT NULL,
  `villa_id` int(11) DEFAULT NULL,
  `path_foto` varchar(255) NOT NULL,
  `urutan_foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto_villa`
--

INSERT INTO `foto_villa` (`id`, `villa_id`, `path_foto`, `urutan_foto`) VALUES
(1, 1, 'assets/gambar/villa-kayu-1.jpeg', 1),
(2, 1, 'assets/gambar/villa-kayu-2.jpeg', 2),
(3, 1, 'assets/gambar/villa-kayu-3.jpeg', 3),
(4, 2, 'assets/gambar/villa-bata-1.jpeg', 1),
(5, 2, 'assets/gambar/villa-bata-2.jpeg', 2),
(6, 2, 'assets/gambar/villa-bata-3.jpeg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `villa`
--

CREATE TABLE `villa` (
  `id` int(11) NOT NULL,
  `nama_villa` varchar(100) NOT NULL,
  `kapasitas_maksimal` int(11) NOT NULL,
  `harga_permalam` decimal(10,2) NOT NULL,
  `jumlah_kamar_tidur` int(11) NOT NULL,
  `jumlah_kamar_mandi` int(11) NOT NULL,
  `foto_utama` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `diperbarui_pada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `villa`
--

INSERT INTO `villa` (`id`, `nama_villa`, `kapasitas_maksimal`, `harga_permalam`, `jumlah_kamar_tidur`, `jumlah_kamar_mandi`, `foto_utama`, `deskripsi`, `dibuat_pada`, `diperbarui_pada`) VALUES
(1, 'VILLA KAYU HUJUNG', 30, 2000000.00, 4, 3, 'assets/gambar/villa-kayu.jpeg', 'Villa nyaman dengan pemandangan danau yang indah', '2024-11-16 03:56:18', '2024-11-16 03:56:18'),
(2, 'VILLA BATA DUKUH', 20, 1800000.00, 4, 3, 'assets/gambar/villa-bata.jpeg', 'Villa modern dengan suasana asri pegunungan', '2024-11-16 03:56:18', '2024-11-16 12:01:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_villa`
--
ALTER TABLE `fasilitas_villa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fasilitas_villa_ibfk_1` (`villa_id`);

--
-- Indexes for table `foto_villa`
--
ALTER TABLE `foto_villa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_villa_ibfk_1` (`villa_id`);

--
-- Indexes for table `villa`
--
ALTER TABLE `villa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_villa`
--
ALTER TABLE `fasilitas_villa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `foto_villa`
--
ALTER TABLE `foto_villa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `villa`
--
ALTER TABLE `villa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_villa`
--
ALTER TABLE `fasilitas_villa`
  ADD CONSTRAINT `fasilitas_villa_ibfk_1` FOREIGN KEY (`villa_id`) REFERENCES `villa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto_villa`
--
ALTER TABLE `foto_villa`
  ADD CONSTRAINT `foto_villa_ibfk_1` FOREIGN KEY (`villa_id`) REFERENCES `villa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
