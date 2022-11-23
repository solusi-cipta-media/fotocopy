-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 08:34 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1039137_fotocopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(256) NOT NULL,
  `nomor_induk` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `clock_in` datetime NOT NULL,
  `clock_out` datetime NOT NULL,
  `status_clock` varchar(50) NOT NULL,
  `latitude_in` varchar(256) NOT NULL,
  `longitude_in` varchar(256) NOT NULL,
  `latitude_out` varchar(256) NOT NULL,
  `longitude_out` varchar(256) NOT NULL,
  `image_in` text,
  `image_out` text,
  `terlambat` time NOT NULL,
  `pulang_cepat` time NOT NULL,
  `working_hours` time NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nama_karyawan`, `nomor_induk`, `tanggal`, `clock_in`, `clock_out`, `status_clock`, `latitude_in`, `longitude_in`, `latitude_out`, `longitude_out`, `image_in`, `image_out`, `terlambat`, `pulang_cepat`, `working_hours`, `date_created`) VALUES
(1, 'AGUS', '0001', '2022-11-04', '2022-11-04 12:43:51', '2022-11-04 12:43:52', '', '123', '345', '123', '456', NULL, NULL, '12:44:03', '12:44:03', '12:44:03', '2022-11-04 05:44:17'),
(12, 'RIZAL', '00002', '2022-11-15', '2022-11-15 11:02:56', '2022-11-15 11:28:05', '0', '-7.8249984', '112.7088128', '-7.8249984', '112.7088128', '8068e115fcde07080b413b1d36dbc1f4.png', '6d616244b7331aa6bd149578e3454bcd.png', '03:02:56', '05:31:55', '00:25:09', '2022-11-15 04:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_ketidakhadiran`
--

CREATE TABLE `absensi_ketidakhadiran` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(256) NOT NULL,
  `nomor_induk` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `cuti_id` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `bukti` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_ketidakhadiran`
--

INSERT INTO `absensi_ketidakhadiran` (`id`, `nama_karyawan`, `nomor_induk`, `tanggal`, `tipe`, `cuti_id`, `status`, `bukti`, `date_created`) VALUES
(1, 'AGUS', '00001', '2022-11-04', 'CUTI', NULL, 'WAITING', 'asa.jpg', '2022-11-04 05:47:58'),
(13, 'RIZAL', '00002', '2022-11-16', 'CUTI', 3, 'REJECTED', 'acfd93888a5e0eb80786c1ed1dff36be.jpg', '2022-11-15 03:15:46'),
(14, 'RIZAL', '00002', '2022-11-17', 'IZIN', NULL, 'REJECTED', 'a84988e5bdc29b2dfd323c54b88a1ca5.jpg', '2022-11-15 03:27:19'),
(15, 'RIZAL', '00002', '2022-11-19', 'SAKIT', NULL, 'APPROVED', 'ea176454fc0eea95e910a9227a203d60.jpg', '2022-11-15 03:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_periode`
--

CREATE TABLE `absensi_periode` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `masuk` time NOT NULL,
  `pulang` time NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_periode`
--

INSERT INTO `absensi_periode` (`id`, `tanggal`, `status`, `masuk`, `pulang`, `date_created`) VALUES
(1, '2022-11-04', 'AKTIF', '08:00:00', '17:00:00', '2022-11-04 05:49:31'),
(2, '2022-11-05', 'LIBUR', '08:00:00', '17:00:00', '2022-11-04 05:49:31'),
(3, '2022-11-06', 'LIBUR', '08:00:00', '17:00:00', '2022-11-04 05:49:31'),
(4, '2022-11-07', 'AKTIF', '08:00:00', '17:00:00', '2022-11-04 05:49:31'),
(5, '2022-11-08', 'AKTIF', '08:00:00', '17:00:00', '2022-11-04 05:49:31'),
(6, '2022-11-09', 'AKTIF', '08:00:00', '17:00:00', '2022-11-04 05:49:31'),
(7, '2022-11-10', 'AKTIF', '08:00:00', '17:00:00', '2022-11-04 05:49:31'),
(8, '2022-11-11', 'AKTIF', '08:00:00', '17:00:00', '2022-11-04 05:49:31'),
(9, '2022-11-12', 'LIBUR', '08:00:00', '17:00:00', '2022-11-04 05:49:31'),
(10, '2022-11-13', 'LIBUR', '08:00:00', '17:00:00', '2022-11-04 05:49:31'),
(12, '2022-11-14', 'AKTIF', '08:00:00', '17:00:00', '2022-11-05 00:17:07'),
(16, '2022-11-15', 'AKTIF', '08:00:00', '17:00:00', '2022-11-15 03:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `catatan_meter`
--

CREATE TABLE `catatan_meter` (
  `id` int(11) NOT NULL,
  `customer` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `kolektor` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `tgl_instal` date NOT NULL,
  `model` varchar(50) NOT NULL,
  `lokasi` varchar(256) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `nomor_kontrak` varchar(100) NOT NULL,
  `awal` date NOT NULL,
  `akhir` date NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan_meter`
--

INSERT INTO `catatan_meter` (`id`, `customer`, `alamat`, `kolektor`, `status`, `tgl_instal`, `model`, `lokasi`, `telp`, `fax`, `nomor_kontrak`, `awal`, `akhir`, `date_created`) VALUES
(2, 'PT. ALFAMART', 'Jl. Pramuka NO. 48 Malang', '', 'RENTAL', '2022-11-03', 'DC286', 'Jl. Pramuka NO. 48 Malang', '021-889970', '', '087654321', '2022-09-01', '2023-12-01', '2022-11-03 05:34:26'),
(5, 'PT. INDOMART', 'Jl. Pramuka No. 48 Malang', '', 'BELI', '2022-11-04', 'DC 286', 'Jl. Pramuka No. 48 Malang', '087654321', '', 'NO134', '2022-11-01', '2023-08-05', '2022-11-04 01:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `crm`
--

CREATE TABLE `crm` (
  `id` int(11) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `pic_customer` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `uraian` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crm`
--

INSERT INTO `crm` (`id`, `customer`, `pic_customer`, `no_hp`, `status`, `uraian`, `date_created`) VALUES
(1, 'agus', 'agus', '098098098', 'OPEN', 'balalalal', '2022-11-16 00:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `klasifikasi` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `hp_contact` varchar(50) NOT NULL,
  `no_contact_kantor` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `kode`, `nama`, `alamat`, `klasifikasi`, `contact_person`, `hp_contact`, `no_contact_kantor`, `longitude`, `latitude`, `date_created`) VALUES
(4, 'KLN-100001', 'PT. ABC', 'Jl. Pramuka No.48 Malang', 'RENTAL', 'AGUS SALIM', '08565656566', '0341-909099', '112.6684897', '-7.9611249', '2022-11-23 06:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `customerdetail`
--

CREATE TABLE `customerdetail` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_mesin` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `tanggal_servis` date NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `id_kerjaluar` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerdetail`
--

INSERT INTO `customerdetail` (`id`, `kode`, `nama`, `nomor_mesin`, `model`, `uraian`, `tanggal_servis`, `teknisi`, `id_kerjaluar`, `date_created`) VALUES
(5, 'KLN-100001', 'PT. ABC', '1', 'DC678', 'Memasang mesin baru', '2022-11-23', 'RIDWAN', 19, '2022-11-23 07:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `jenis_cuti` varchar(50) NOT NULL,
  `waktu` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `jenis_cuti`, `waktu`, `date_created`) VALUES
(1, 'CUTI TAHUNAN', 12, '2022-10-24 15:25:36'),
(2, 'CUTI KHUSUS', 90, '2022-10-24 15:25:36'),
(3, 'CUTI HARI', 1, '2022-11-15 02:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE `daily_report` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `nomor_induk` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `aktivitas` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_report`
--

INSERT INTO `daily_report` (`id`, `nama_karyawan`, `nomor_induk`, `tanggal`, `aktivitas`, `date_created`) VALUES
(1, 'agus', '897897897', '2022-11-16', 'jhgjkgjkgh', '2022-11-16 00:35:32'),
(2, 'rizal', '897897897', '2022-11-17', 'jhgjkgjkgh', '2022-11-16 00:35:32'),
(3, 'rizal', '897897897', '2022-11-17', 'jhgjkgjkgh', '2022-11-16 00:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `detailmesin`
--

CREATE TABLE `detailmesin` (
  `id` int(11) NOT NULL,
  `nomor_mesin` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `tgl_aktivitas` date NOT NULL,
  `aktivitas` varchar(20) NOT NULL,
  `id_overhaul` int(11) NOT NULL DEFAULT '0',
  `id_kerjaluar` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailmesin`
--

INSERT INTO `detailmesin` (`id`, `nomor_mesin`, `model`, `serial_number`, `asal`, `supplier`, `tgl_aktivitas`, `aktivitas`, `id_overhaul`, `id_kerjaluar`, `date_created`) VALUES
(8, '1', 'DC678', '12345', 'IMPORT', 'PT. SUPPLIER BEKAS', '2022-11-23', 'OVERHAUL', 20, 0, '2022-11-23 06:54:04'),
(9, '2', 'DC678', '12345', 'IMPORT', 'PT. SUPPLIER BEKAS', '2022-11-23', 'INSTAL', 0, 20, '2022-11-23 07:06:43'),
(10, '1', 'DC678', '12345', 'IMPORT', 'PT. SUPPLIER BEKAS', '2022-11-23', 'INSTAL', 0, 19, '2022-11-23 07:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `userid` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `handphone` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `role_id` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `userid`, `password`, `email`, `alamat`, `no_ktp`, `handphone`, `jenis_kelamin`, `photo`, `is_active`, `role_id`, `reg_date`) VALUES
(4, '00001', 'AGUS', 'agus', '$2y$10$hvdKGvfKpNoFAH/ejoeGxukDu9.SwAzYhTU5Z/FZDD7eVtyyuWZSW', 'agus@gmail.com', 'Jl. Subali IV Blok 13C No.5 Mangliawan Pakis Malang', '35730428109400033', '0812529387474', 'LAKI-LAKI', 'default.jpg', 1, 1, '2022-04-27 04:54:22'),
(5, '00002', 'RIZAL', 'rizal', '$2y$10$nvBgMSprlCz1xo1YXcTYQON/YfdgJ5XtkLGmyAdMSdpLtoQ3drw2e', 'rizal@gmail.com', 'Jl. Bandulan VIII B / 426 C RT.003 RW.001 Bandulan, Sukun, Malang - Jawa Timur', '3573042810940003', '081252938747', 'LAKI-LAKI', 'default.jpg', 1, 2, '2022-04-27 04:54:22'),
(6, '123', 'BUDI', 'budi', '$2y$10$x3QgLRMCTbUIYa2Lr1U3beYqtFxxxx8UDWin.ohE40GN/x3KJBbN.', 'agus@gmail.com', 'malang', '123', '12121', 'LAKI-LAKI', 'default.jpg', 1, 3, '2022-10-25 06:09:25'),
(7, '123', 'RIDWAN', 'ridwan', '$2y$10$uVB7L6OUfDwKoMF/bUE9NOHmvRPUgH/SIBYsscGzbz9zpqDwy0rUm', 'agus@gmail.com', 'malang', '123', '12121', 'LAKI-LAKI', 'default.jpg', 1, 4, '2022-10-25 06:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `kerjaluar`
--

CREATE TABLE `kerjaluar` (
  `id` int(11) NOT NULL,
  `kode_customer` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `handphone` varchar(50) NOT NULL,
  `klasifikasi` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tgl_kerja` date NOT NULL,
  `lokasi` text NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `teknisi` varchar(256) NOT NULL,
  `nomor_mesin` varchar(256) NOT NULL,
  `serial_number` varchar(256) NOT NULL,
  `model` varchar(256) NOT NULL,
  `tegangan` varchar(10) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `meter` varchar(256) NOT NULL,
  `uraian_tugas` text NOT NULL,
  `uraian` text NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerjaluar`
--

INSERT INTO `kerjaluar` (`id`, `kode_customer`, `customer`, `contact_person`, `handphone`, `klasifikasi`, `jenis`, `tgl_kerja`, `lokasi`, `latitude`, `longitude`, `id_karyawan`, `teknisi`, `nomor_mesin`, `serial_number`, `model`, `tegangan`, `asal`, `supplier`, `meter`, `uraian_tugas`, `uraian`, `time_in`, `time_out`, `status`, `date_created`) VALUES
(19, 'KLN-100001', 'PT. ABC', '', '', '', 'INSTAL', '2022-11-23', 'Jl. Pramuka No.48 Malang', '-7.9611249', '112.6684897', '7', 'RIDWAN', '1', '12345', 'DC678', '220V', 'IMPORT', 'PT. SUPPLIER BEKAS', '', '', 'Memasang mesin baru', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'SELESAI', '2022-11-23 06:54:51'),
(20, 'KLN-100001', 'PT. ABC', '', '', '', 'INSTAL', '2022-11-23', 'Jl. Pramuka No.48 Malang', '-7.9611249', '112.6684897', '7', 'RIDWAN', '2', '12345', 'DC678', '220V', 'IMPORT', 'PT. SUPPLIER BEKAS', 'C1000', 'DESKRIPSI TUGAS', 'Ganti mesin baru', '2022-11-23 14:05:20', '2022-11-23 14:05:23', 'SELESAI', '2022-11-23 07:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `id` int(11) NOT NULL,
  `nomor_kontrak` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `awal_kontrak` date NOT NULL,
  `akhir_kontrak` date NOT NULL,
  `reminder` date NOT NULL,
  `status_reminder` int(11) NOT NULL DEFAULT '0',
  `dokumen` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`id`, `nomor_kontrak`, `customer`, `awal_kontrak`, `akhir_kontrak`, `reminder`, `status_reminder`, `dokumen`, `date_created`) VALUES
(9, '01/KONTRAK-2022', 'PT. ALFAMART', '2022-05-30', '2022-11-19', '2022-11-03', 1, 'contoh.pdf', '2022-11-03 05:01:00'),
(10, '02/KONTRAK-2022', 'PT. ABC', '2022-06-01', '2022-12-09', '2022-11-03', 1, 'contoh1.pdf', '2022-11-03 05:01:35'),
(12, '03/KONTRAK-2022', 'PT. ALFAMART', '2022-11-01', '2022-11-30', '2022-11-05', 1, 'contoh3.pdf', '2022-11-05 01:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_kontrak`
--

CREATE TABLE `notifikasi_kontrak` (
  `id` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `dokumen` varchar(50) NOT NULL,
  `status_read` int(10) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi_kontrak`
--

INSERT INTO `notifikasi_kontrak` (`id`, `customer`, `pesan`, `dokumen`, `status_read`, `date_created`) VALUES
(15, 'PT. INDOMART', 'Kontrak dengan PT. INDOMART akan segera berakhir pada 10-Dec-2022!', 'contoh2.pdf', 1, '2022-11-03 05:02:08'),
(16, 'PT. ABC', 'Kontrak dengan PT. ABC akan segera berakhir pada 09-Dec-2022!', 'contoh1.pdf', 1, '2022-11-03 05:02:08'),
(17, 'PT. ALFAMART', 'Kontrak dengan PT. ALFAMART akan segera berakhir pada 19-Nov-2022!', 'contoh.pdf', 1, '2022-11-03 05:02:08'),
(18, 'PT. ALFAMART', 'Kontrak dengan PT. ALFAMART akan segera berakhir pada 30-Nov-2022!', 'contoh3.pdf', 1, '2022-11-05 01:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `overhaul`
--

CREATE TABLE `overhaul` (
  `id` int(11) NOT NULL,
  `nomor_mesin` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `meter` varchar(50) NOT NULL,
  `tegangan` varchar(50) NOT NULL,
  `teknisi` varchar(100) NOT NULL,
  `id_karyawan` int(11) NOT NULL DEFAULT '0',
  `approval_pengajuan` int(11) NOT NULL DEFAULT '0',
  `approval_selesai` int(11) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `start_oh` datetime NOT NULL,
  `finish_oh` datetime NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overhaul`
--

INSERT INTO `overhaul` (`id`, `nomor_mesin`, `model`, `serial_number`, `asal`, `supplier`, `meter`, `tegangan`, `teknisi`, `id_karyawan`, `approval_pengajuan`, `approval_selesai`, `status`, `uraian`, `tgl_masuk`, `start_oh`, `finish_oh`, `date_created`) VALUES
(20, '1', 'DC678', '12345', 'IMPORT', 'PT. SUPPLIER BEKAS', '100', '220V', 'AGUS', 4, 1, 1, 'RENTAL', 'Ketika dibeli ada sedikit problem di area tutup tooner nya', '2022-11-23', '2022-11-23 13:51:16', '2022-11-23 13:54:04', '2022-11-23 06:50:36'),
(21, '2', 'DC678', '12345', 'IMPORT', 'PT. SUPPLIER BEKAS', '100', '220V', 'AGUS', 4, 1, 1, 'RENTAL', 'Ketika dibeli ada sedikit problem di area tutup tooner nya', '2022-11-23', '2022-11-23 13:51:16', '2022-11-23 13:54:04', '2022-11-23 06:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `overhaul_record`
--

CREATE TABLE `overhaul_record` (
  `id` int(11) NOT NULL,
  `id_overhaul` int(11) NOT NULL,
  `nomor_mesin` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `caver_body_awal` varchar(50) NOT NULL,
  `caver_body_akhir` varchar(50) NOT NULL,
  `caver_body_ganti` varchar(50) DEFAULT NULL,
  `dadf_awal` varchar(50) NOT NULL,
  `dadf_akhir` varchar(50) NOT NULL,
  `dadf_ganti` varchar(50) DEFAULT NULL,
  `kaca_platen_awal` varchar(50) NOT NULL,
  `kaca_platen_akhir` varchar(50) NOT NULL,
  `kaca_platen_ganti` varchar(50) DEFAULT NULL,
  `tombol_panel_awal` varchar(50) NOT NULL,
  `tombol_planel_akhir` varchar(50) NOT NULL,
  `tombol_planel_ganti` varchar(50) DEFAULT NULL,
  `paper_supply_awal` varchar(50) NOT NULL,
  `paper_supply_akhir` varchar(50) NOT NULL,
  `paper_supply_ganti` varchar(50) DEFAULT NULL,
  `drum_catridge_awal` varchar(50) NOT NULL,
  `drum_catridge_akhir` varchar(50) NOT NULL,
  `drum_catridge_ganti` varchar(50) DEFAULT NULL,
  `toner_catridge_awal` varchar(50) NOT NULL,
  `toner_catridge_akhir` varchar(50) NOT NULL,
  `toner_catridge_ganti` varchar(50) DEFAULT NULL,
  `drum_opc_awal` varchar(50) NOT NULL,
  `drum_opc_akhir` varchar(50) NOT NULL,
  `drum_opc_ganti` varchar(50) DEFAULT NULL,
  `chip_drum_awal` varchar(50) NOT NULL,
  `chip_drum_akhir` varchar(50) NOT NULL,
  `chip_drum_ganti` varchar(50) DEFAULT NULL,
  `chip_toner_awal` varchar(50) NOT NULL,
  `chip_toner_akhir` varchar(50) NOT NULL,
  `chip_toner_ganti` varchar(50) DEFAULT NULL,
  `pemanas_awal` varchar(50) NOT NULL,
  `pemanas_akhir` varchar(50) NOT NULL,
  `pemanas_ganti` varchar(50) DEFAULT NULL,
  `print_awal` varchar(50) NOT NULL,
  `print_akhir` varchar(50) NOT NULL,
  `print_ganti` varchar(50) DEFAULT NULL,
  `fax_awal` varchar(50) NOT NULL,
  `fax_akhir` varchar(50) NOT NULL,
  `fax_ganti` varchar(50) DEFAULT NULL,
  `scan_awal` varchar(50) NOT NULL,
  `scan_akhir` varchar(50) NOT NULL,
  `scan_ganti` varchar(50) DEFAULT NULL,
  `oct_awal` varchar(50) NOT NULL,
  `oct_akhir` varchar(50) NOT NULL,
  `oct_ganti` varchar(50) DEFAULT NULL,
  `bypass_tray_awal` varchar(50) NOT NULL,
  `bypass_tray_akhir` varchar(50) NOT NULL,
  `bypass_tray_ganti` varchar(50) DEFAULT NULL,
  `caver_ae_awal` varchar(50) NOT NULL,
  `caver_ae_akhir` varchar(50) NOT NULL,
  `caver_ae_ganti` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overhaul_record`
--

INSERT INTO `overhaul_record` (`id`, `id_overhaul`, `nomor_mesin`, `serial_number`, `caver_body_awal`, `caver_body_akhir`, `caver_body_ganti`, `dadf_awal`, `dadf_akhir`, `dadf_ganti`, `kaca_platen_awal`, `kaca_platen_akhir`, `kaca_platen_ganti`, `tombol_panel_awal`, `tombol_planel_akhir`, `tombol_planel_ganti`, `paper_supply_awal`, `paper_supply_akhir`, `paper_supply_ganti`, `drum_catridge_awal`, `drum_catridge_akhir`, `drum_catridge_ganti`, `toner_catridge_awal`, `toner_catridge_akhir`, `toner_catridge_ganti`, `drum_opc_awal`, `drum_opc_akhir`, `drum_opc_ganti`, `chip_drum_awal`, `chip_drum_akhir`, `chip_drum_ganti`, `chip_toner_awal`, `chip_toner_akhir`, `chip_toner_ganti`, `pemanas_awal`, `pemanas_akhir`, `pemanas_ganti`, `print_awal`, `print_akhir`, `print_ganti`, `fax_awal`, `fax_akhir`, `fax_ganti`, `scan_awal`, `scan_akhir`, `scan_ganti`, `oct_awal`, `oct_akhir`, `oct_ganti`, `bypass_tray_awal`, `bypass_tray_akhir`, `bypass_tray_ganti`, `caver_ae_awal`, `caver_ae_akhir`, `caver_ae_ganti`, `date_created`) VALUES
(11, 20, '1', '12345', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'tray-2', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', 'Rusak', 'Ganti', 'baru', '2022-11-23 06:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `overhaul_record2`
--

CREATE TABLE `overhaul_record2` (
  `id` int(11) NOT NULL,
  `id_overhaul` int(11) NOT NULL,
  `nomor_mesin` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `komponen_check` varchar(256) DEFAULT NULL,
  `check_awal` varchar(50) DEFAULT NULL,
  `finishing` varchar(50) DEFAULT NULL,
  `penggantian_barang` varchar(256) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overhaul_record2`
--

INSERT INTO `overhaul_record2` (`id`, `id_overhaul`, `nomor_mesin`, `serial_number`, `komponen_check`, `check_awal`, `finishing`, `penggantian_barang`, `date_created`) VALUES
(9, 20, '1', '12345', 'Tutup Tooner', 'Rusak', 'Ganti', 'part #456 ganti baru', '2022-11-23 06:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'supervisor'),
(3, 'teknisi'),
(4, 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absensi_ketidakhadiran`
--
ALTER TABLE `absensi_ketidakhadiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuti_id` (`cuti_id`);

--
-- Indexes for table `absensi_periode`
--
ALTER TABLE `absensi_periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catatan_meter`
--
ALTER TABLE `catatan_meter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm`
--
ALTER TABLE `crm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerdetail`
--
ALTER TABLE `customerdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailmesin`
--
ALTER TABLE `detailmesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `kerjaluar`
--
ALTER TABLE `kerjaluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi_kontrak`
--
ALTER TABLE `notifikasi_kontrak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overhaul`
--
ALTER TABLE `overhaul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overhaul_record`
--
ALTER TABLE `overhaul_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overhaul_record2`
--
ALTER TABLE `overhaul_record2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `absensi_ketidakhadiran`
--
ALTER TABLE `absensi_ketidakhadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `absensi_periode`
--
ALTER TABLE `absensi_periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `catatan_meter`
--
ALTER TABLE `catatan_meter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `crm`
--
ALTER TABLE `crm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerdetail`
--
ALTER TABLE `customerdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daily_report`
--
ALTER TABLE `daily_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detailmesin`
--
ALTER TABLE `detailmesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kerjaluar`
--
ALTER TABLE `kerjaluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifikasi_kontrak`
--
ALTER TABLE `notifikasi_kontrak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `overhaul`
--
ALTER TABLE `overhaul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `overhaul_record`
--
ALTER TABLE `overhaul_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `overhaul_record2`
--
ALTER TABLE `overhaul_record2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
