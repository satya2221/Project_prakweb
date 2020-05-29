-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2019 pada 12.45
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

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
-- Struktur dari tabel `input_mobil`
--

CREATE TABLE `input_mobil` (
  `admin_id` char(4) NOT NULL,
  `no_plat` varchar(9) NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `input_mobil`
--

INSERT INTO `input_mobil` (`admin_id`, `no_plat`, `tanggal_input`) VALUES
('1101', 'AB1980ZW', '2019-11-08'),
('1101', 'AB1111XS', '2019-11-09'),
('1101', 'AB2018PO', '2019-11-10'),
('1101', 'AB2019CD', '2019-11-01'),
('1101', 'AB2018AZ', '2019-11-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
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
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`plat`, `jenis`, `brand`, `merk`, `harga`, `gambar`, `status`) VALUES
('AB1111XS', 'Motor Manual', 'Yamaha', 'Jupiter', 30000, '', 'Sewa'),
('AB1980ZW', 'Mobil Matic', 'Toyota', 'Avanza', 150000, '', 'Sedia'),
('AB2018AZ', 'Mobil Bak Terbuka', 'Suzuki', 'Carry', 35000, '', 'Sewa'),
('AB2018PO', 'Mobil Manual', 'Honda', 'BRV', 145000, '', 'Sedia'),
('AB2019CD', 'Motor Matic', 'Honda', 'Beat', 50000, '', 'Sewa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `bid` int(11) NOT NULL,
  `biaya` int(11) DEFAULT NULL,
  `sid` int(11) NOT NULL,
  `kid` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`bid`, `biaya`, `sid`, `kid`) VALUES
(1, 450000, 6, '1101'),
(3, NULL, 7, '1101'),
(7, 450000, 10, '1101'),
(8, 0, 8, '1101');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
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
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`sid`, `tgl_sewa`, `lama_sewa`, `tgl_hrs_kembali`, `tgl_kembali`, `progres`, `plat`, `penyewa`) VALUES
(6, '2019-11-15', 2, '2019-11-17', '2019-11-18', 'Selesai', 'AB1980ZW', 'rcanalisa@yahoo.com'),
(7, '2019-11-18', 2, '2019-11-20', '0000-00-00', 'Sewa', 'AB2019CD', 'satyag@gmail.com'),
(8, '2019-11-21', 1, '2019-11-22', '0000-00-00', 'Sewa', 'AB2018AZ', 'rcanalisa@yahoo.com'),
(10, '2019-11-12', 2, '2019-11-14', '2019-11-15', 'Selesai', 'AB1980ZW', 'satyag@gmail.com'),
(11, '2019-11-15', 2, '2019-11-17', '0000-00-00', 'Booking', 'AB1111XS', 'akmal@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `kid` char(4) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`kid`, `email`) VALUES
('1101', 'riefka.canalisa@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `foto` text NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`email`, `password`, `nama`, `alamat`, `no_telp`, `foto`, `role`) VALUES
('akmal@gmail.com', '2222', 'Akmal', 'Saren no 84', '081299888777', '', 'user'),
('rcanalisa@yahoo.com', '1111', 'Rifka', 'Saren no.84', '081288565637', '1573055669_person_2.jpg', 'user'),
('riefka.canalisa@gmail.com', '6238', 'Rifka Canalisa R', 'Saren', '081288565636', '1573055265_m_2.jpg', 'admin'),
('satyag@gmail.com', '1111', 'Satya Ghifari A', 'Semarang', '081299888666', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `input_mobil`
--
ALTER TABLE `input_mobil`
  ADD KEY `fk_plat` (`no_plat`),
  ADD KEY `fk_admin_id` (`admin_id`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`plat`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `fk_sewa` (`sid`),
  ADD KEY `fk_kid` (`kid`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `fkpenyewa` (`penyewa`),
  ADD KEY `fkplat` (`plat`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`kid`),
  ADD KEY `fk_email` (`email`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `input_mobil`
--
ALTER TABLE `input_mobil`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `staff` (`kid`),
  ADD CONSTRAINT `fk_plat` FOREIGN KEY (`no_plat`) REFERENCES `kendaraan` (`plat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_kid` FOREIGN KEY (`kid`) REFERENCES `staff` (`kid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sewa` FOREIGN KEY (`sid`) REFERENCES `sewa` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `fkpenyewa` FOREIGN KEY (`penyewa`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkplat` FOREIGN KEY (`plat`) REFERENCES `kendaraan` (`plat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
