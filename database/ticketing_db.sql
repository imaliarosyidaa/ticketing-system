-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 09:29 PM
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
-- Database: `ticketing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Petugas'),
(3, 'Pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `kode_pemesanan` varchar(255) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tempat_pemesanan` varchar(255) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_kursi` varchar(10) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `jam_cekin` time NOT NULL,
  `jam_berangkat` time NOT NULL,
  `total_bayar` decimal(10,2) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_pemesanan`, `tanggal_pemesanan`, `tempat_pemesanan`, `id_pelanggan`, `kode_kursi`, `id_rute`, `tujuan`, `tanggal_berangkat`, `jam_cekin`, `jam_berangkat`, `total_bayar`, `id_petugas`) VALUES
(1, 'PM001', '2023-09-25', 'Jakarta', 1, 'A1', 101, 'Surabaya', '2023-10-10', '00:00:00', '00:00:00', 250.00, 101),
(2, 'PM002', '2023-09-26', 'Bandung', 2, 'B3', 102, 'Yogyakarta', '2023-10-15', '00:00:00', '00:00:00', 180.50, 102),
(3, 'PM003', '2023-09-27', 'Surabaya', 3, 'C2', 103, 'Malang', '2023-10-20', '00:00:00', '00:00:00', 300.75, 103);

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_penumpang` varchar(255) NOT NULL,
  `alamat_penumpang` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`id_penumpang`, `username`, `password`, `nama_penumpang`, `alamat_penumpang`, `tanggal_lahir`, `jenis_kelamin`, `telefone`) VALUES
(1, 'ima', 'ima', 'John Doe', 'Alamat 1', '1990-01-15', 'Laki-Laki', '1234567890'),
(2, 'user2', 'password2', 'Jane Smith', 'Alamat 2', '1985-05-20', 'Perempuan', '9876543210'),
(3, 'user3', 'password3', 'Robert Johnson', 'Alamat 3', '1995-11-10', 'Laki-Laki', '5555555555'),
(4, 'ima', 'ima', 'lia', '', '2023-09-27', 'Perempuan', '082334907089');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`) VALUES
(1, 'ima', 'ima', 'ima', 1),
(2, 'petugas1', 'password2', 'Petugas 1', 2),
(3, 'petugas2', 'password3', 'Petugas 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `rute_awal` varchar(255) NOT NULL,
  `rute_akhir` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `id_transportasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `tujuan`, `rute_awal`, `rute_akhir`, `harga`, `id_transportasi`) VALUES
(101, 'Surabaya', 'Bandung', 'Surabaya', 350.00, 1),
(102, 'Yogyakarta', 'Jakarta', 'Yogyakarta', 280.50, 2),
(103, 'Malang', 'Surabaya', 'Malang', 400.75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `id_type_transportasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`id_transportasi`, `kode`, `jumlah_kursi`, `keterangan`, `id_type_transportasi`) VALUES
(1, 'TR001', 50, 'Bus dengan fasilitas AC', 1),
(2, 'TR002', 30, 'Kereta eksekutif', 2),
(3, 'TR003', 100, 'Pesawat komersial', 3);

-- --------------------------------------------------------

--
-- Table structure for table `type_transportasi`
--

CREATE TABLE `type_transportasi` (
  `id_type_transportasi` int(11) NOT NULL,
  `nama_type` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_transportasi`
--

INSERT INTO `type_transportasi` (`id_type_transportasi`, `nama_type`, `keterangan`) VALUES
(1, 'Bus', 'Jenis transportasi darat dengan kursi berjajar.'),
(2, 'Kereta', 'Jenis transportasi darat dengan rel dan kereta.'),
(3, 'Pesawat', 'Jenis transportasi udara dengan mesin dan sayap.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_transportasi`);

--
-- Indexes for table `type_transportasi`
--
ALTER TABLE `type_transportasi`
  ADD PRIMARY KEY (`id_type_transportasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
