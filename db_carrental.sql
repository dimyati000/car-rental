-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2023 at 11:39 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `idInvoice` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggalPemesanan` datetime NOT NULL,
  `batasPembayaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`idInvoice`, `nama`, `alamat`, `noTelp`, `email`, `tanggalPemesanan`, `batasPembayaran`) VALUES
(2, 'asd', 'asd', '09394934', 'asdasd@gmail.com', '2022-06-12 07:52:02', '2022-06-13 07:52:02'),
(3, 'Ahmad', 'jalan luduk ombo nomer 12', '09873839472', 'ahmadc4hy4@gmail.com', '2022-06-12 08:26:14', '2022-06-13 08:26:14'),
(4, 'Agung Prasetyo', 'jalan hayam muruk nomer 123', '09847733', 'agung@mail.com', '2022-06-30 06:40:30', '2022-07-01 06:40:30'),
(5, 'Agung Prasetyo', 'jalan hayam muruk nomer 123', '09847733', 'agung@mail.com', '2022-07-01 07:01:46', '2022-07-02 07:01:46'),
(6, 'Agung Prasetyo', 'jalan hayam muruk nomer 123', '09847733', 'agung@mail.com', '2022-07-01 07:18:05', '2022-07-02 07:18:05'),
(7, 'Agung Prasetyo', 'jalan hayam muruk nomer 123', '09847733', 'agung@mail.com', '2022-07-01 07:19:04', '2022-07-02 07:19:04'),
(8, 'Agung Prasetyo ddd', 'jalan hayam muruk nomer 123', '09847733', 'agung@mail.com', '2022-07-03 15:56:00', '2022-07-04 15:56:00'),
(10, 'Dimyati Azhar', 'jalan hayam muruk nomer 123', '09847733', 'agung@mail.com', '2022-07-03 21:09:02', '2022-07-04 21:09:02'),
(11, 'Dimyati Azhar', 'jalan hayam muruk nomer 123', '09847733', 'agung@gmail.com', '2022-07-04 20:38:10', '2022-07-05 20:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasir`
--

CREATE TABLE `tb_kasir` (
  `id` int(11) NOT NULL,
  `namaPelanggan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `hidden` varchar(30) NOT NULL,
  `namaBarang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kasir`
--

INSERT INTO `tb_kasir` (`id`, `namaPelanggan`, `tanggal`, `keterangan`, `total`, `bayar`, `kembalian`, `hidden`, `namaBarang`) VALUES
(1, 'saya', '2022-06-09', 'keterangan ', 470, 500000, 30, '', ''),
(8, 'cek', '2022-07-04', 'cek', 100, 300000, 200, '', 'sarung'),
(10, 'agus', '2022-07-04', 'pelanggan baru', 204, 300000, 96, '', 'oli'),
(11, 'Agus Salim', '2022-07-04', 'Pelanggan Lama', 20, 50000, 30, '', 'Lampu Depan'),
(13, 'afusa', '2022-07-04', 'dek', 404, 2000222, 1, '', 'oke'),
(14, 'deeer', '2022-07-04', 'erqeqe', 24, 212122, 187, '', 'qweqe');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `idLaporan` int(11) NOT NULL,
  `namaPemesan` varchar(50) NOT NULL,
  `jenisLaporan` varchar(30) NOT NULL,
  `barangTerbeli` varchar(50) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggalPemesanan` date NOT NULL,
  `tanggalDibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`idLaporan`, `namaPemesan`, `jenisLaporan`, `barangTerbeli`, `totalHarga`, `keterangan`, `tanggalPemesanan`, `tanggalDibuat`) VALUES
(1, 'subagyo', 'Service Booking', 'barang 1', 450000, 'ini keterangan', '2022-06-08', '2022-06-12 00:29:49'),
(4, 'as', 'Service Booking', 'as', 0, 'as', '2022-06-24', '2022-06-19 11:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `idLayanan` int(11) NOT NULL,
  `jenisLayanan` varchar(20) NOT NULL,
  `jenisService` varchar(20) NOT NULL,
  `namaPelanggan` varchar(50) NOT NULL,
  `noWA` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `tipeKendaraan` varchar(50) NOT NULL,
  `kilometer` varchar(20) NOT NULL,
  `merkKendaraan` varchar(50) NOT NULL,
  `namaKendaraan` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `transmisi` varchar(50) NOT NULL,
  `jenisBensin` varchar(20) NOT NULL,
  `platNomor` varchar(20) NOT NULL,
  `jenisKendala` varchar(50) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `tanggalPemesanan` datetime NOT NULL,
  `jadwalBooking` date DEFAULT NULL,
  `verifikasi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_layanan`
--

INSERT INTO `tb_layanan` (`idLayanan`, `jenisLayanan`, `jenisService`, `namaPelanggan`, `noWA`, `alamat`, `provinsi`, `kota`, `kecamatan`, `desa`, `dusun`, `tipeKendaraan`, `kilometer`, `merkKendaraan`, `namaKendaraan`, `warna`, `transmisi`, `jenisBensin`, `platNomor`, `jenisKendala`, `totalHarga`, `tanggalPemesanan`, `jadwalBooking`, `verifikasi`) VALUES
(8, 'HomeService', '', 'Agung Prasetyo', '09847733', 'jalan hayam muruk nomer 123', '', 'Jember', 'Wuluhan', 'Ampel', 'Krajan', 'bebek', '1', 'yamaha', 'vega', 'Hijau', 'd', '2w', 'L 12982 KW', 'dad', 0, '2022-07-03 00:00:00', NULL, 'Sudah Terverifikasi'),
(12, 'ServiceDibengkel', '', 'Dimyati Azhar', '09847733', 'jalan hayam muruk nomer 123', '', '', '', '', '', 'bebek', '1KM', 'yamaha', 'vega', 'Putih', '', '', 'L 12982 KW', ' Ganti Oli', 0, '2022-07-03 00:00:00', '2022-07-03', 'Sudah Dilayani'),
(14, 'ServiceDibengkel', '', 'Dimyati Azhar', '09847733', 'jalan hayam muruk nomer 123', '', '', '', '', '', 'bebek', '1Km', 'yamaha', 'vega', 'Putih', 'manual', 'pertamax', 'L 12982 KW', 'Ban ganti', 0, '2022-07-04 00:00:00', '2022-07-04', 'Sudah Dilayani'),
(15, 'HomeService', '', 'Dimyati Azhar', '09847733', 'jalan hayam muruk nomer 123', '', 'Jember', 'Wuluhan', 'Ampel', 'Krajan', 'bebek', '1Km', 'yamaha', 'vega', 'Hijau', '', '', 'L 12982 KW', 'Ganti Oli', 0, '2022-07-04 00:00:00', NULL, 'Belum Terverifikasi'),
(16, 'ServiceDibengkel', '', 'Dimyati Azhar', '09847733', 'jalan hayam muruk nomer 123', '', '', '', '', '', 'bebek', '1Km', 'yamaha', 'vega', 'Putih', '', '', 'L 12982 KW', 'Ganti Aki ', 0, '2022-07-04 00:00:00', '2022-07-04', 'Sudah Dilayani');

-- --------------------------------------------------------

--
-- Table structure for table `tb_midtrans`
--

CREATE TABLE `tb_midtrans` (
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `transaction_time` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `va_number` varchar(50) NOT NULL,
  `pdf_url` varchar(255) NOT NULL,
  `status_code` varchar(5) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_midtrans`
--

INSERT INTO `tb_midtrans` (`nama`, `alamat`, `order_id`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`, `noTelp`, `email`) VALUES
('Agung Prasetyo', 'jalan hayam muruk nomer 123', '1302491688', 270000, 'bank_transfer', '2022-07-01 07:01:42', 'bca', '87933602073', 'https://app.sandbox.midtrans.com/snap/v1/transactions/cff723f6-ad78-4300-801e-5cf3d56fad74/pdf', '201', '09847733', 'agung@mail.com'),
('asd', 'asd', '186595092', 120000, 'bank_transfer', '2022-06-12 07:52:00', 'bca', '87933524039', 'https://app.sandbox.midtrans.com/snap/v1/transactions/bfa40037-3106-4162-8ae5-af6343b81cec/pdf', '201', '09394934', 'asdasd@gmail.com'),
('Agung Prasetyo', 'jalan hayam muruk nomer 123', '1894139759', 480000, 'bank_transfer', '2022-07-01 07:19:02', 'bca', '87933720747', 'https://app.sandbox.midtrans.com/snap/v1/transactions/77005d47-bfe9-4603-92fc-58022ee01a04/pdf', '201', '09847733', 'agung@mail.com'),
('Agung Prasetyo', 'jalan hayam muruk nomer 123', '305259713', 54000, 'bank_transfer', '2022-06-30 06:40:26', 'bca', '87933931832', 'https://app.sandbox.midtrans.com/snap/v1/transactions/bf6ad323-de9a-4b86-91cb-d0037755b579/pdf', '201', '09847733', 'agung@mail.com'),
('Agung Prasetyo', 'jalan hayam muruk nomer 123', '387264444', 216000, 'bank_transfer', '2022-07-01 07:18:03', 'bca', '87933635254', 'https://app.sandbox.midtrans.com/snap/v1/transactions/6ac2ff91-0158-4f58-94e4-206895c619e3/pdf', '201', '09847733', 'agung@mail.com'),
('Dimyati Azhar', 'jalan hayam muruk nomer 123', '42373422', 228000, 'bank_transfer', '2022-07-04 20:38:07', 'bca', '87933141423', 'https://app.sandbox.midtrans.com/snap/v1/transactions/a3ba36fe-720a-4d3f-be2b-cc34d41d4f67/pdf', '201', '09847733', 'agung@gmail.com'),
('Dimyati Azhar', 'jalan hayam muruk nomer 123', '585662114', 228000, 'bank_transfer', '2022-07-03 21:08:59', 'bca', '87933323830', 'https://app.sandbox.midtrans.com/snap/v1/transactions/9d0cbd5f-d325-474f-8525-91678abb4267/pdf', '201', '09847733', 'agung@mail.com'),
('Ahmad', 'jalan luduk ombo nomer 12', '77988668', 120000, 'bank_transfer', '2022-06-12 08:26:13', 'bca', '87933225864', 'https://app.sandbox.midtrans.com/snap/v1/transactions/4570d660-a690-4d7c-8563-d29a47a6acaf/pdf', '201', '09873839472', 'ahmadc4hy4@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_motor`
--

CREATE TABLE `tb_motor` (
  `id` int(11) NOT NULL,
  `merk_motor` varchar(100) NOT NULL,
  `type_motor` varchar(100) NOT NULL,
  `plat_nomor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `idPesanan` int(11) NOT NULL,
  `idInvoice` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `jumlah` tinyint(4) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`idPesanan`, `idInvoice`, `idBarang`, `namaBarang`, `jumlah`, `harga`) VALUES
(3, 2, 1, 'barang 1', 1, 120000),
(4, 3, 1, 'barang 1', 1, 120000),
(5, 4, 3, 'barang 2', 1, 54000),
(6, 5, 3, 'barang 2', 5, 54000),
(7, 6, 3, 'barang 2', 4, 54000),
(8, 7, 1, 'barang 1', 4, 120000),
(9, 8, 1, 'barang 1', 1, 120000),
(10, 10, 3, 'barang 2', 2, 54000),
(11, 10, 1, 'barang 1', 1, 120000),
(12, 11, 3, 'barang 2', 2, 54000),
(13, 11, 1, 'barang 1', 1, 120000);

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesananProduct` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_product SET stok = stok-NEW.jumlah
    WHERE idBarang = NEW.idBarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `idBarang` int(11) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `namaSuplier` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`idBarang`, `namaBarang`, `namaSuplier`, `kategori`, `harga`, `keterangan`, `stok`, `gambar`) VALUES
(1, 'barang 1', '', 'Benda Kecil', 120000, 'ini keterangan', 10, 'Sparepart_Dashboard.png'),
(3, 'barang 2', '', 'Body Motor', 54000, 'ini body', 16, 'profile_page.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tentang`
--

CREATE TABLE `tb_tentang` (
  `idTentang` int(11) NOT NULL,
  `menuTentang` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tentang`
--

INSERT INTO `tb_tentang` (`idTentang`, `menuTentang`, `deskripsi`) VALUES
(1, 'Berkah Abadi Motor', 'Melayani Service, Ganti Oli, Sparepart, dll');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(50) NOT NULL,
  `namaPerusahaan` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sosialMedia` varchar(100) NOT NULL,
  `roleId` tinyint(4) NOT NULL,
  `id_motor` int(11) NOT NULL,
  `nama_motor` varchar(100) NOT NULL,
  `merk_motor` varchar(100) NOT NULL,
  `type_motor` varchar(100) NOT NULL,
  `plat_nomor` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `dusun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`idUser`, `namaUser`, `namaPerusahaan`, `username`, `password`, `alamat`, `deskripsi`, `noTelp`, `email`, `sosialMedia`, `roleId`, `id_motor`, `nama_motor`, `merk_motor`, `type_motor`, `plat_nomor`, `provinsi`, `kecamatan`, `kota`, `desa`, `dusun`) VALUES
(1, 'Tiyas', '', 'user', 'asd', 'Gempol porong', '', '09847733', 'tiyas@gmail.com', '', 2, 0, 'Vario', 'Honda', 'Matic', 'L 12982 KW', '', 'Pasuruan', 'Pasuruan', 'Pasuruan', 'Pasuruan'),
(2, 'Dimyati Azhar', '', 'admin', 'asd', 'Semolowaru Utara I/14B', 'ini deskripsi', '085733410870', 'admin@gmail.com', 'tidak ada', 1, 0, '0', '0', '0', '0', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`idInvoice`);

--
-- Indexes for table `tb_kasir`
--
ALTER TABLE `tb_kasir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`idLaporan`);

--
-- Indexes for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`idLayanan`);

--
-- Indexes for table `tb_midtrans`
--
ALTER TABLE `tb_midtrans`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`idPesanan`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `tb_tentang`
--
ALTER TABLE `tb_tentang`
  ADD PRIMARY KEY (`idTentang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `idInvoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_kasir`
--
ALTER TABLE `tb_kasir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `idLaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `idLayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `idPesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tentang`
--
ALTER TABLE `tb_tentang`
  MODIFY `idTentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
