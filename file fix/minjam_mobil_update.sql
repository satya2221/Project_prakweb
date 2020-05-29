-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 09:57 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minjam_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `input_mobil`
--

CREATE TABLE `input_mobil` (
  `admin_id` char(4) NOT NULL,
  `no_plat` varchar(9) NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `input_mobil`
--

INSERT INTO `input_mobil` (`admin_id`, `no_plat`, `tanggal_input`) VALUES
('1101', 'AB1980ZW', '2019-11-08'),
('1101', 'AB2018PO', '2019-11-10'),
('1101', 'AB2019CD', '2019-11-01'),
('1101', 'AB2018AZ', '2019-11-01'),
('1101', 'AB9201HJ', '2019-11-20'),
('1101', 'AB0111YU', '2019-11-20'),
('1101', 'H2934BAG', '2019-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `plat` varchar(9) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`plat`, `jenis`, `brand`, `merk`, `harga`, `gambar`, `status`) VALUES
('AB0111YU', 'Motor Manual', 'Yamaha', 'Force', 20000, 'https://1.bp.blogspot.com/-Avq4G47xFJI/Xdo1iNA87KI/AAAAAAAAB7A/PJu3KLFj78EQagpnYVr0t9Iv33nEaVG4QCLcBGAsYHQ/s1600/Harga-Yamaha-Force-Red%2B%25281%2529.jpg', 'Sedia'),
('AB1980ZW', 'Mobil Matic', 'Toyota', 'Avanza', 120000, 'https://1.bp.blogspot.com/-ZAx2CwUJ_hE/Xdo2EdUJUuI/AAAAAAAAB7I/GMdLXWojvHgnFq_GAKB5sVzl7l_RXaHGACLcBGAsYHQ/s1600/exterior_2L_1%2B%25281%2529.jpg', 'Sedia'),
('AB2018AZ', 'Mobil Bak Terbuka', 'Suzuki', 'Carry', 75000, 'https://1.bp.blogspot.com/--BTKARmSrZ0/Xdo3AgMjroI/AAAAAAAAB7Y/SwfJJEy50A8-z75z8po9IBxkFC2m7R41gCLcBGAsYHQ/s1600/Suzuki_Carry%2B%25281%2529.png', 'Sedia'),
('AB2018PO', 'Mobil Manual', 'Honda', 'BRV', 145000, 'https://1.bp.blogspot.com/-g69s0oKVJDU/Xdo4DVHRacI/AAAAAAAAB7o/qYe8RI2zfxYpFdE4QRSQQ55pGHylCjKngCLcBGAsYHQ/s1600/Honda_BR-V.png', 'Sedia'),
('AB2019CD', 'Motor Matic', 'Honda', 'Beat', 30000, 'https://1.bp.blogspot.com/-5JF8nBuZBjY/Xdo44y7jRHI/AAAAAAAAB74/JOttrAGPwrg0POZsQ3uy6sxYl6aTloG8gCLcBGAsYHQ/s1600/Honda_All_New_Beat_L_4%2B1%2529.png', 'Sedia'),
('AB9201HJ', 'Mini Bus', 'Toyota', 'HiAce', 200000, 'https://1.bp.blogspot.com/-bpQf9kajQpg/Xdo5X5dTmlI/AAAAAAAAB8E/OBNPqjm_m1YIuEfip3gNEXImWhutXasigCLcBGAsYHQ/s1600/sewa-hiace-jogja-5%2B%25281%2529.png', 'Sedia'),
('H2934BAG', 'Motor Kopling', 'Yamaha', 'Vixion', 40000, 'https://1.bp.blogspot.com/-ng9jPB9XFjA/Xdo6muzPImI/AAAAAAAAB8Q/OITMf7q3wPctTAQCWu4q1f0DPObbSiDjgCLcBGAsYHQ/s1600/hqdefault%2B%25281%2529.jpg', 'Sewa');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `bid` int(11) NOT NULL,
  `biaya` int(11) DEFAULT NULL,
  `sid` int(11) NOT NULL,
  `kid` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`bid`, `biaya`, `sid`, `kid`) VALUES
(1, 450000, 6, '1101'),
(3, 100000, 7, '1101'),
(7, 450000, 10, '1101'),
(8, 70000, 8, '1101'),
(10, 40000, 25, '1101'),
(11, 0, 26, '1101');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `sid` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `tgl_hrs_kembali` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `progres` varchar(15) NOT NULL,
  `plat` varchar(9) NOT NULL,
  `penyewa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`sid`, `tgl_sewa`, `lama_sewa`, `tgl_hrs_kembali`, `tgl_kembali`, `progres`, `plat`, `penyewa`) VALUES
(6, '2019-11-15', 2, '2019-11-17', '2019-11-18', 'Selesai', 'AB1980ZW', 'rcanalisa@yahoo.com'),
(7, '2019-11-18', 2, '2019-11-20', '2019-11-20', 'Selesai', 'AB2019CD', 'satyag@gmail.com'),
(8, '2019-11-21', 1, '2019-11-22', '2019-11-23', 'Selesai', 'AB2018AZ', 'rcanalisa@yahoo.com'),
(10, '2019-11-12', 2, '2019-11-14', '2019-11-15', 'Selesai', 'AB1980ZW', 'satyag@gmail.com'),
(25, '2019-11-23', 3, '2019-11-26', '2019-11-24', 'Selesai', 'H2934BAG', 'satyag@gmail.com'),
(26, '2019-11-24', 3, '2019-11-27', '0000-00-00', 'Sewa', 'H2934BAG', 'raditycool@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `kid` char(4) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`kid`, `email`) VALUES
('1101', 'riefka.canalisa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `nama`, `alamat`, `no_telp`, `role`) VALUES
('adiprtama88@gmail.com', 'asdf', 'Adiprtama', 'ngulon', '1123', 'user'),
('akmal@gmail.com', '2222', 'Akmal', 'Saren no 84', '081299888777', 'user'),
('raditycool@gmail.com', 'satyaradit', 'Raditya Maulana A', 'Srondol Bumi Indah Blok Y-7, Sumurboto, Banyumanik, Semarang, Jawa Tengah', '081382337878', 'user'),
('rcanalisa@yahoo.com', '1111', 'Rifka', 'Saren no.84', '081288565637', 'user'),
('riefka.canalisa@gmail.com', '6238', 'Rifka C. R.', 'Saren no. 84 CT', '081288565637', 'admin'),
('satyag@gmail.com', '1111', 'Satya Ghifari A', 'Semarang', '081299888666', 'user'),
('satyaghifari12@gmail.com', 'qwerty', 'Satya GGWP', 'Srondol Wetan Ngulon Progo', '087832441011', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `input_mobil`
--
ALTER TABLE `input_mobil`
  ADD KEY `fk_plat` (`no_plat`),
  ADD KEY `fk_admin_id` (`admin_id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`plat`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `fk_sewa` (`sid`),
  ADD KEY `fk_kid` (`kid`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `fkpenyewa` (`penyewa`),
  ADD KEY `fkplat` (`plat`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`kid`),
  ADD KEY `fk_email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `input_mobil`
--
ALTER TABLE `input_mobil`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `staff` (`kid`),
  ADD CONSTRAINT `fk_plat` FOREIGN KEY (`no_plat`) REFERENCES `kendaraan` (`plat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_kid` FOREIGN KEY (`kid`) REFERENCES `staff` (`kid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sewa` FOREIGN KEY (`sid`) REFERENCES `sewa` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `fkpenyewa` FOREIGN KEY (`penyewa`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkplat` FOREIGN KEY (`plat`) REFERENCES `kendaraan` (`plat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
