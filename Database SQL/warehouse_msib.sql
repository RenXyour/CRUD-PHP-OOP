-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 04:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse_msib`
--

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` enum('aktif','tidak_aktif') DEFAULT 'aktif',
  `opening_hour` time DEFAULT NULL,
  `closing_hour` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id`, `name`, `location`, `capacity`, `status`, `opening_hour`, `closing_hour`) VALUES
(4, 'Gudang Garam', 'Lubuk Pakam', 100, 'tidak_aktif', '07:00:00', '20:00:00'),
(6, 'Gudang Sepatu', 'Pekanbaru', 5000, 'tidak_aktif', '09:00:00', '19:00:00'),
(7, 'Gudang Baju', 'Riau', 200, 'tidak_aktif', '07:00:00', '19:00:00'),
(8, 'Gudang Indomie', 'Jakarta', 10000, 'aktif', '08:00:00', '23:00:00'),
(10, 'Gudang Aksesoris', 'Jakarta', 10000, 'aktif', '07:00:00', '18:07:00'),
(11, 'Gudang Laptop', 'Bandung', 500000, 'aktif', '10:00:00', '20:00:00'),
(12, 'Gudang Mainan', 'Padang', 20000, 'aktif', '09:00:00', '21:00:00'),
(14, 'Gudang Mobil', 'Medan', 35000, 'aktif', '08:00:00', '19:00:00'),
(16, 'Gudang Makanan', 'Banndung', 3400, 'aktif', '02:00:00', '20:00:00'),
(17, 'PT. Nabati Persero', 'Jakarta', 34500, 'tidak_aktif', '08:00:00', '21:15:00'),
(18, 'PT. Djarum Indonesia', 'Bali', 4300, 'aktif', '00:00:00', '12:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
