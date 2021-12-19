-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 05:03 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_harga`
--

CREATE TABLE `barang_harga` (
  `kode_barang` char(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(6) NOT NULL,
  `kode_cabang` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_master`
--

CREATE TABLE `barang_master` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `kode_cabang` char(3) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `alamat_cabang` varchar(255) DEFAULT NULL,
  `telepon` varbinary(13) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `historibayar`
--

CREATE TABLE `historibayar` (
  `nobukti` varchar(14) NOT NULL,
  `no_fak_penj` varchar(13) NOT NULL,
  `tglbayar` date NOT NULL,
  `jenistransaksi` varchar(6) DEFAULT NULL,
  `jenisbayar` varchar(10) NOT NULL,
  `status_bayar` varchar(10) DEFAULT NULL,
  `bayar` int(11) NOT NULL,
  `id_giro` int(11) DEFAULT NULL,
  `id_transfer` int(11) DEFAULT NULL,
  `girotocash` char(1) DEFAULT NULL,
  `id_karyawan` char(7) DEFAULT NULL,
  `id_admin` smallint(6) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(13) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `no_kk` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `pasar` varchar(50) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `kode_cabang` char(3) NOT NULL,
  `id_sales` char(7) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `limitpel` int(11) DEFAULT NULL,
  `jatuhtempo` int(11) DEFAULT NULL,
  `time_stamps` timestamp NULL DEFAULT current_timestamp(),
  `foto` varchar(20) DEFAULT NULL,
  `kepemilikan` varchar(20) DEFAULT NULL,
  `lama_berjualan` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_faktur` varchar(13) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `kode_pelanggan` varchar(13) NOT NULL,
  `jenistransaksi` varchar(6) NOT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `id_user` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `no_fak_penj` varchar(13) DEFAULT NULL,
  `kode_barang` varchar(8) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail_temp`
--

CREATE TABLE `penjualan_detail_temp` (
  `no_fak_penj` varchar(13) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` char(6) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL,
  `kode_cabang` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_harga`
--
ALTER TABLE `barang_harga`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `barang_master`
--
ALTER TABLE `barang_master`
  ADD PRIMARY KEY (`kode_barang`) USING BTREE;

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`kode_cabang`),
  ADD KEY `kode_cab_idx` (`kode_cabang`);

--
-- Indexes for table `historibayar`
--
ALTER TABLE `historibayar`
  ADD PRIMARY KEY (`nobukti`),
  ADD KEY `hb_id_giro` (`id_giro`),
  ADD KEY `hb_nofaktur` (`no_fak_penj`),
  ADD KEY `hb_idtransfer` (`id_transfer`),
  ADD KEY `hb_tglbayar_jenis` (`tglbayar`,`jenisbayar`),
  ADD KEY `hb_idkar` (`id_karyawan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`) USING BTREE,
  ADD KEY `pel_nama` (`nama_pelanggan`),
  ADD KEY `pel_idkar` (`id_sales`),
  ADD KEY `pel_kodecab` (`kode_cabang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_faktur`) USING BTREE,
  ADD KEY `kode_pelanggan` (`kode_pelanggan`),
  ADD KEY `tgltransaksi` (`tgltransaksi`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD KEY `detailpenj_nofaktur` (`no_fak_penj`),
  ADD KEY `detailpenj_kodebarang` (`kode_barang`);

--
-- Indexes for table `penjualan_detail_temp`
--
ALTER TABLE `penjualan_detail_temp`
  ADD KEY `detailpenj_nofaktur` (`no_fak_penj`),
  ADD KEY `detailpenj_kodebarang` (`kode_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
