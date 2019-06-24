-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jun 2019 pada 03.16
-- Versi server: 5.7.24
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tujuhsinar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrians`
--

CREATE TABLE `antrians` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `antrians`
--

INSERT INTO `antrians` (`id`, `nomor`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2019-06-24 02:04:29', '2019-06-24 02:04:29'),
(2, 2, 0, '2019-06-24 02:43:44', '2019-06-24 02:43:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `barcode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hrg_beli` double(11,2) NOT NULL,
  `min_stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `supplier_id`, `barcode`, `produk_id`, `nm_barang`, `kategori`, `satuan`, `hrg_beli`, `min_stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 11, 'FL001', '1', 'Spanduk 280 gr', 'test', 'lembar', 1568000.00, 264, '2019-05-16 13:08:01', '2019-06-19 02:49:17', NULL),
(10, 7, 'FL002', '1', 'Korcin 440 gr', 'Spanduk', 'lembar', 2400000.00, 160, '2019-05-16 15:07:56', '2019-05-16 15:07:56', NULL),
(11, 7, 'FL003', '1', 'Backlite 610 gr', 'Spanduk', 'lembar', 4000000.00, 160, '2019-05-16 15:09:29', '2019-05-16 15:09:29', NULL),
(12, 4, 'FL004', '1', 'Cloth Banner', 'Umbul - umbul', 'lembar', 1440000.00, 126, '2019-05-16 15:11:12', '2019-05-16 15:11:12', NULL),
(13, 7, 'stc001', '2', 'Stiker Ritrama', 'Stiker', 'lembar', 1312500.00, 53, '2019-05-16 15:13:27', '2019-05-16 15:13:27', NULL),
(14, 11, 'stc002', '2', 'Stiker 3M', 'Stiker', 'lembar', 1207500.00, 53, '2019-05-16 15:14:27', '2019-05-16 15:14:27', NULL),
(15, 10, 'stc003', '2', 'Stiker China Premium', 'Stiker', 'lembar', 1050000.00, 53, '2019-05-16 15:15:33', '2019-05-16 15:15:33', NULL),
(16, 10, 'stc004', '2', 'Stiker China Biasa', 'Stiker', 'lembar', 892500.00, 3, '2019-05-16 15:16:45', '2019-05-16 15:16:45', NULL),
(17, 10, 'stc005', '2', 'Stiker Graftac', 'Stiker', 'lembar', 1050000.00, 53, '2019-05-16 15:17:38', '2019-05-16 15:18:01', NULL),
(18, 7, 'stc006', '2', 'Albatros', 'Kertas', 'lembar', 900000.00, 46, '2019-05-16 15:20:52', '2019-05-16 15:20:52', NULL),
(19, 7, 'stc007', '2', 'Easy Banner', 'Kertas', 'lembar', 1000000.00, 46, '2019-05-16 15:21:42', '2019-05-16 15:21:42', NULL),
(20, 7, 'stc008', '2', 'Trisolve', 'Kertas', 'lembar', 900000.00, 63, '2019-05-16 15:22:52', '2019-05-16 15:22:52', NULL),
(21, 7, 'stc009', '2', 'Stiker Ritrama Matt', 'Stiker', 'lembar', 1000000.00, 53, '2019-05-16 15:30:22', '2019-05-16 15:30:22', NULL),
(22, 7, 'stc010', '2', 'Stiker Blackout', 'Stiker', 'lembar', 2500000.00, 53, '2019-05-16 15:34:14', '2019-05-16 15:34:14', NULL),
(23, 7, 'stc011', '2', 'Stiker One Way', 'Stiker', 'lembar', 1550000.00, 53, '2019-05-16 15:34:48', '2019-05-16 15:34:48', NULL),
(24, 8, 'stc012', '2', 'Stiker Chrome', 'Stiker', 'lembar', 1500000.00, 63, '2019-05-16 15:36:11', '2019-05-16 15:36:11', NULL),
(25, 5, 'stc013', '2', 'Photopaper Silky', 'Kertas', 'lembar', 50.00, 900000, '2019-05-16 15:46:31', '2019-05-16 15:46:31', NULL),
(26, 9, 'stc014', '2', 'Backlite Film', 'Kertas', 'lembar', 3000000.00, 63, '2019-05-16 15:50:22', '2019-05-16 15:50:22', NULL),
(27, 7, 'stc015', '2', 'Flesso', 'Kertas', 'lembar', 900000.00, 25, '2019-05-16 15:51:27', '2019-05-16 15:51:27', NULL),
(28, 5, 'FL005', '1', 'Cover Sound', 'Spanduk', 'lembar', 900000.00, 50, '2019-05-16 15:58:42', '2019-05-16 15:58:42', NULL),
(29, 6, 'KR001', '4', 'HVS 100 gr', 'Kertas', 'lembar', 2000.00, 1000, '2019-05-16 16:00:19', '2019-05-16 16:00:19', NULL),
(30, 5, 'KR002', '4', 'AP 120 GR', 'Kertas', 'lembar', 2200.00, 1000, '2019-05-16 16:03:30', '2019-05-16 16:03:30', NULL),
(31, 5, 'KR003', '4', 'AP 210 GR', 'Kertas', 'lembar', 2400.00, 4000, '2019-05-16 16:04:30', '2019-05-16 16:04:30', NULL),
(32, 5, 'KR004', '4', 'AP 230 GR', 'Kertas', 'lembar', 2500.00, 5000, '2019-05-16 16:06:18', '2019-05-16 16:06:18', NULL),
(33, 5, 'KR005', '4', 'AP 260 GR', 'Kertas', 'lembar', 2500.00, 5000, '2019-05-16 16:07:01', '2019-05-16 16:07:01', NULL),
(34, 4, 'KR006', '4', 'Stiker Bontak', 'Kertas', 'lembar', 3500.00, 5000, '2019-05-16 16:07:47', '2019-05-16 16:07:47', NULL),
(35, 5, 'KR007', '4', 'PVC', 'Kertas', 'lembar', 10000.00, 100, '2019-05-16 16:10:18', '2019-05-16 16:10:18', NULL),
(36, 6, 'MC001', '3', 'Mug Polos', 'Gelas', 'biji', 15000.00, 200, '2019-05-16 16:11:22', '2019-05-16 16:11:22', NULL),
(37, 5, 'MC002', '3', 'Mug Warna', 'Gelas', 'biji', 18000.00, 100, '2019-05-16 16:12:18', '2019-05-16 16:12:18', NULL),
(39, 5, 'MC003', '3', 'Pin Uk 4.4', 'Gelas', 'biji', 2500.00, 1000, '2019-05-16 16:20:46', '2019-05-16 16:20:46', NULL),
(40, 5, 'MC004', '3', 'Pin Uk 5.8', 'Gelas', 'biji', 3000.00, 1000, '2019-05-16 16:21:31', '2019-05-16 16:21:31', NULL),
(41, 5, 'MC005', '3', 'Ganci Uk 4.4', 'Gelas', 'biji', 3000.00, 200, '2019-05-16 16:30:27', '2019-05-16 16:30:27', NULL),
(42, 4, 'MC006', '3', 'Ganci Uk 5.8', 'Gelas', 'biji', 3500.00, 1000, '2019-05-16 16:32:32', '2019-05-16 16:32:32', NULL),
(43, 5, 'MC007', '3', 'Stempel Small', 'Gelas', 'biji', 20000.00, 100, '2019-05-16 16:33:21', '2019-05-16 16:33:21', NULL),
(44, 5, 'MC008', '3', 'Stempel Medium', 'Gelas', 'biji', 20000.00, 1000, '2019-05-16 16:34:03', '2019-05-16 16:34:03', NULL),
(45, 5, 'MC009', '3', 'Stempel Large', 'Gelas', 'biji', 35000.00, 100, '2019-05-16 16:35:26', '2019-05-16 16:35:26', NULL),
(46, 6, 'MC010', '3', 'Id card', 'Kertas', 'lembar', 5000.00, 100, '2019-05-16 16:36:59', '2019-05-16 16:36:59', NULL),
(47, 6, 'ACC001', '5', 'Tiang Xbanner 160', 'aksesories', 'pcs', 30000.00, 200, '2019-05-16 16:38:31', '2019-05-16 16:38:31', NULL),
(48, 5, 'ACC002', '5', 'Tiang Roll Banner 160', 'aksesories', 'pcs', 115000.00, 200, '2019-05-16 16:39:30', '2019-05-16 16:39:30', NULL),
(49, 7, 'ACC003', '5', 'Tinta Stempel', 'aksesories', 'pcs', 10000.00, 50, '2019-05-16 16:40:06', '2019-05-16 16:40:06', NULL),
(50, 10, '1234567880', '5', 'Barang Test', 'Test', 'Pcs', 1000.00, 10, '2019-06-19 02:05:14', '2019-06-19 02:05:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `editors`
--

CREATE TABLE `editors` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `member_id` int(10) UNSIGNED NOT NULL,
  `nama_finishing` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tambahan_harga` double(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `editors`
--

INSERT INTO `editors` (`id`, `produk_id`, `type`, `member_id`, `nama_finishing`, `tambahan_harga`, `created_at`, `updated_at`) VALUES
(18, '1', '3', 4, 'Tambah Mata Ayam', 500.00, '2019-05-16 16:55:55', '2019-05-29 14:54:49'),
(19, '1', '1', 4, 'Lipat Keliling', 2500.00, '2019-05-16 16:57:21', '2019-05-16 16:57:21'),
(20, '1', '1', 4, 'Mata Ayam', 0.00, '2019-05-17 12:47:43', '2019-05-17 12:47:43'),
(21, '1', '1', 4, 'Lipat Keliling + Mata Ayam', 3000.00, '2019-05-17 12:48:15', '2019-05-17 12:48:15'),
(22, '2', '1', 4, 'Cutting/Potong', 25000.00, '2019-05-17 14:55:40', '2019-05-17 14:57:09'),
(23, '2', '1', 4, 'Print Aja', 0.00, '2019-05-17 14:56:31', '2019-05-17 14:56:31'),
(24, '4', '1', 4, 'Cutting/Potong', 5000.00, '2019-05-17 15:31:43', '2019-05-17 15:31:43'),
(25, '4', '1', 4, 'Non Finshing', 0.00, '2019-05-17 15:33:34', '2019-05-17 15:33:34'),
(26, '2', '1', 4, 'Laminasi Glossy', 30000.00, '2019-05-18 12:59:38', '2019-05-18 13:13:51'),
(27, '2', '1', 4, 'Laminasi Doff', 50000.00, '2019-05-18 12:59:56', '2019-05-18 12:59:56'),
(28, '2', '1', 4, 'Laminasi Glossy + cut', 75000.00, '2019-05-18 13:02:20', '2019-05-18 13:02:20'),
(29, '2', '1', 4, 'Laminasi Doff + cut', 75000.00, '2019-05-18 13:02:36', '2019-05-18 13:02:36'),
(30, '2', '1', 4, 'Die Cut', 50000.00, '2019-05-18 13:02:54', '2019-05-18 13:02:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hargas`
--

CREATE TABLE `hargas` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `produk_id` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hargas`
--

INSERT INTO `hargas` (`id`, `member_id`, `produk_id`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, '1', 'tes', '2019-05-16 16:58:48', '2019-05-16 16:58:48', NULL),
(2, 4, '2', 'silver', '2019-05-17 11:42:57', '2019-05-17 11:42:57', NULL),
(3, 4, '3', 'gelas', '2019-05-17 11:54:18', '2019-05-17 11:54:18', NULL),
(4, 4, '4', 'tes', '2019-05-17 11:55:41', '2019-05-17 11:55:41', NULL),
(5, 4, '5', 'jasa cetak', '2019-05-17 12:23:54', '2019-05-17 12:23:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_costums`
--

CREATE TABLE `harga_costums` (
  `id` int(10) UNSIGNED NOT NULL,
  `harga_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `harga_pokok` double(11,2) NOT NULL,
  `harga_jual` double(11,2) NOT NULL,
  `disc` int(11) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `harga_costums`
--

INSERT INTO `harga_costums` (`id`, `harga_id`, `barang_id`, `harga_pokok`, `harga_jual`, `disc`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 47, 6000.00, 7000.00, 0, 'jasa cetak', '2019-06-18 08:44:57', '2019-06-18 08:44:57', NULL),
(2, 5, 49, 6000.00, 7000.00, 0, 'dsads', '2019-06-18 08:48:40', '2019-06-18 08:48:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_indoors`
--

CREATE TABLE `harga_indoors` (
  `id` int(10) UNSIGNED NOT NULL,
  `harga_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `tipe_print` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `range_min` int(11) NOT NULL,
  `range_max` int(11) NOT NULL,
  `harga_pokok` double(11,2) NOT NULL,
  `harga_jual` double(11,2) NOT NULL,
  `disc` int(11) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `harga_indoors`
--

INSERT INTO `harga_indoors` (`id`, `harga_id`, `barang_id`, `tipe_print`, `range_min`, `range_max`, `harga_pokok`, `harga_jual`, `disc`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 13, '1', 1, 15, 50000.00, 125000.00, 0, 'silver', '2019-05-17 11:42:57', '2019-05-17 11:42:57', NULL),
(2, 2, 14, '1', 1, 15, 50000.00, 130000.00, 0, 'silver', '2019-05-17 11:43:30', '2019-05-17 11:43:30', NULL),
(3, 2, 15, '1', 1, 15, 40000.00, 125000.00, 0, 'silver', '2019-05-17 11:43:58', '2019-05-17 11:43:58', NULL),
(4, 2, 16, '1', 1, 15, 40000.00, 115000.00, 0, 'silver', '2019-05-17 11:44:24', '2019-05-17 11:44:24', NULL),
(5, 2, 17, '1', 1, 15, 50000.00, 135000.00, 0, 'silver', '2019-05-17 11:45:08', '2019-05-17 11:45:08', NULL),
(6, 2, 18, '1', 1, 15, 50000.00, 125000.00, 0, 'silver', '2019-05-17 11:45:37', '2019-05-17 11:45:37', NULL),
(7, 2, 19, '1', 1, 15, 50000.00, 135000.00, 0, 'silver', '2019-05-17 11:46:01', '2019-05-17 11:46:01', NULL),
(8, 2, 20, '1', 1, 15, 50000.00, 125000.00, 0, 'silver', '2019-05-17 11:49:35', '2019-05-17 11:49:35', NULL),
(9, 2, 21, '1', 1, 15, 50000.00, 135000.00, 0, 'silver', '2019-05-17 11:51:25', '2019-05-17 11:51:25', NULL),
(10, 2, 27, '1', 1, 10, 50.00, 65.00, 0, 'bahan baju', '2019-05-18 22:12:09', '2019-05-18 22:12:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_merchants`
--

CREATE TABLE `harga_merchants` (
  `id` int(10) UNSIGNED NOT NULL,
  `harga_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `range_min` int(11) NOT NULL,
  `range_max` int(11) NOT NULL,
  `harga_pokok` double(11,2) NOT NULL,
  `harga_jual` double(11,2) NOT NULL,
  `disc` int(11) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_outdoors`
--

CREATE TABLE `harga_outdoors` (
  `id` int(10) UNSIGNED NOT NULL,
  `harga_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `range_min` int(11) NOT NULL,
  `range_max` int(11) NOT NULL,
  `harga_pokok` double(11,2) NOT NULL,
  `harga_jual` double(11,2) NOT NULL,
  `disc` int(11) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `harga_outdoors`
--

INSERT INTO `harga_outdoors` (`id`, `harga_id`, `barang_id`, `range_min`, `range_max`, `harga_pokok`, `harga_jual`, `disc`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 9, 1, 10, 13000.00, 25000.00, 0, 'tes', '2019-05-16 16:58:49', '2019-05-16 16:59:27', '2019-05-16 16:59:27'),
(2, 1, 9, 1, 15, 13000.00, 25000.00, 0, 'tes', '2019-05-17 11:34:16', '2019-05-17 11:34:16', NULL),
(3, 1, 10, 1, 15, 30000.00, 70000.00, 0, 'tes', '2019-05-17 11:35:03', '2019-05-17 11:35:03', NULL),
(4, 1, 11, 1, 15, 50000.00, 100000.00, 0, 'tes', '2019-05-17 11:35:26', '2019-05-17 11:35:26', NULL),
(5, 1, 12, 1, 15, 20000.00, 65000.00, 0, 'tes', '2019-05-17 11:35:57', '2019-05-17 11:35:57', NULL),
(6, 1, 28, 1, 15, 50000.00, 135000.00, 0, 'tes', '2019-05-17 11:36:45', '2019-05-17 11:36:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_prints`
--

CREATE TABLE `harga_prints` (
  `id` int(10) UNSIGNED NOT NULL,
  `harga_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `tipe_print` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `range_min` int(11) NOT NULL,
  `range_max` int(11) NOT NULL,
  `harga_pokok` double(11,2) NOT NULL,
  `harga_jual` double(11,2) NOT NULL,
  `disc` int(11) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kakis`
--

CREATE TABLE `kakis` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `nama_kaki` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tambahan_harga` double(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kakis`
--

INSERT INTO `kakis` (`id`, `produk_id`, `member_id`, `nama_kaki`, `tambahan_harga`, `created_at`, `updated_at`) VALUES
(12, '1', 2, 'Xbanner 160 x 60', 100000.00, '2019-05-16 16:40:54', '2019-05-16 16:40:54'),
(13, '2', 3, 'Xbanner 160 x 60', 100000.00, '2019-05-16 16:41:05', '2019-05-16 16:41:05'),
(14, '1', 4, 'Roll Banner 160 x 60', 125000.00, '2019-05-16 16:41:36', '2019-05-16 16:41:36'),
(15, '2', 2, 'Roll Banner 160 x 60', 125000.00, '2019-05-16 16:41:50', '2019-05-16 16:41:50'),
(16, '1', 4, 'Roll Banner 200 x 80', 175000.00, '2019-05-16 16:42:17', '2019-05-16 16:42:17'),
(17, '2', 3, 'Roll Banner 200 x 80', 175000.00, '2019-05-16 16:42:29', '2019-05-16 16:42:29'),
(18, '1', 4, 'Tanpa kaki', 0.00, '2019-05-17 12:48:40', '2019-05-19 16:19:21'),
(19, '2', 4, 'Tanpa kaki', 0.00, '2019-05-17 12:49:17', '2019-05-17 12:49:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `nm_tipe` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `nm_tipe`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Gold', 'Gold untuk perusahaan', NULL, NULL, NULL),
(3, 'Bronze', 'Bronze untuk komunitas', NULL, NULL, NULL),
(4, 'Silver', 'Silver untuk umum', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_kerjas`
--

CREATE TABLE `order_kerjas` (
  `id` int(10) UNSIGNED NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `pelanggan_id` int(10) UNSIGNED NOT NULL,
  `status_payment` enum('belum bayar','tunai','transfer','invoice','down payment','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum bayar',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `diskon` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_kerjas`
--

INSERT INTO `order_kerjas` (`id`, `order`, `tanggal`, `pelanggan_id`, `status_payment`, `keterangan`, `diskon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '00001', '2019-06-21 20:59:45', 1, 'tunai', 'Tunai<br />Total bayar : 2,300,000<br />Diskon : 0<br />Total Akhir : 2,277,500<br />Kembalian : 22,500', '0', '2019-06-21 12:59:45', '2019-06-21 13:00:20', NULL),
(2, '00002', '2019-06-21 21:25:23', 1, 'tunai', 'Tunai<br />Total bayar : 1,200,000<br />Diskon : 0<br />Total Akhir : 1,185,000<br />Kembalian : 15,000', '0', '2019-06-21 13:25:23', '2019-06-24 02:09:42', NULL),
(3, '00003', '2019-06-24 10:24:44', 1, 'cancel', NULL, '0', '2019-06-24 02:24:44', '2019-06-24 02:34:27', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_kerja_subs`
--

CREATE TABLE `order_kerja_subs` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_kerja_id` int(10) UNSIGNED NOT NULL,
  `deadline` datetime NOT NULL,
  `barang_id` int(10) UNSIGNED DEFAULT NULL,
  `produk_id` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_produksi` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `harga` double(11,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `diskon` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan_sub` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_kerja_subs`
--

INSERT INTO `order_kerja_subs` (`id`, `order_kerja_id`, `deadline`, `barang_id`, `produk_id`, `status_produksi`, `harga`, `total`, `diskon`, `qty`, `keterangan_sub`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2019-06-21 20:59:45', 10, '1', '1', 700000.00, 2277500.00, 0, 3, 'Nama File: design.png<br />Ukuran: 5.00x1.50<br />Finishing: Lipat Keliling (Meter : ), Rp 2,500 - <br />Kaki: Roll Banner 200 x 80, Rp 175,000', '2019-06-21 12:59:45', '2019-06-21 12:59:45', NULL),
(2, 2, '2019-06-21 21:25:23', 12, '1', '1', 130000.00, 385000.00, 0, 2, 'Nama File: banner.jpg<br />Ukuran: 2.00x0.50<br />Finishing: Mata Ayam (Meter : ), Rp 0 - <br />Kaki: Roll Banner 160 x 60, Rp 125,000', '2019-06-21 13:25:23', '2019-06-21 13:25:23', NULL),
(3, 2, '2019-06-21 21:28:21', 9, '1', '1', 400000.00, 800000.00, 0, 2, 'Nama File: test<br />Ukuran: 4.00x4.00<br />Finishing: Mata Ayam (Meter : ), Rp 0 - <br />Kaki: Tanpa kaki, Rp 0', '2019-06-21 13:28:21', '2019-06-21 13:28:21', NULL),
(4, 3, '2019-06-24 10:24:44', 9, '1', '1', 50000.00, 175000.00, 0, 1, 'Nama File: design.png<br />Ukuran: 2.00x1.00<br />Finishing: Mata Ayam (Meter : ), Rp 0 - <br />Kaki: Roll Banner 160 x 60, Rp 125,000', '2019-06-24 02:24:44', '2019-06-24 02:24:44', NULL),
(5, 3, '2019-06-24 10:32:41', 9, '1', '1', 18750.00, 37500.00, 0, 2, 'Nama File: test<br />Ukuran: 1.50x0.50<br />Finishing: Mata Ayam (Meter : ), Rp 0 - <br />Kaki: Tanpa kaki, Rp 0', '2019-06-24 02:32:41', '2019-06-24 02:32:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `member_id`, `nama`, `alamat`, `no_telp`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'Applegate', 'Jl. Lambung Mangkurat Gg.3 Blok B', '085245762133', 'donyahmd24@gmail.com', NULL, NULL, NULL),
(2, 2, 'Ventura', 'Jl. Lambung Mangkurat Gg.3', '085234322433', 'mahendrayusril@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelians`
--

CREATE TABLE `pembelians` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `tipe_pembayaran` enum('Tunai','Kredit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksis`
--

CREATE TABLE `produksis` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barangs`
--

CREATE TABLE `stok_barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `stok_barang_pembelian_id` int(10) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `qty_keluar` int(11) NOT NULL,
  `keperluan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang_pembelians`
--

CREATE TABLE `stok_barang_pembelians` (
  `id` int(10) UNSIGNED NOT NULL,
  `pembelian_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nm_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `nm_lengkap`, `alamat`, `no_telp`, `email`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Media World', 'Jl. Ir Sutami Kompleks Pergudangan', '082388680088', 'gias@gmail.com', 'suplier bahan baku spanduk,stiker dll', '2019-05-16 10:29:17', '2019-05-16 10:29:17', NULL),
(5, 'Mapank Samarinda', 'Jl. D.I Panjaitan Kompleks Ruko Segiri II', '081347898982', 'adriansyah22@gmail.com', 'Supplier Spanduk,', '2019-05-16 10:37:19', '2019-05-16 10:37:19', NULL),
(6, 'Vicentra Surabaya', 'Surabaya', '081232548368', 'fifik@gmail.com', 'suplier bahan spanduk, stiker a3', '2019-05-16 10:38:59', '2019-05-16 10:38:59', NULL),
(7, 'Wujud Unggul Sby', 'Jl. Bendul Merisi Barat', '085730007313', 'wu@gmail.com', 'suplier bahan stiker ritrama dll', '2019-05-16 10:40:09', '2019-05-16 10:40:09', NULL),
(8, 'Mulia Mandiri Supply', 'Jakarta', '08179883931', 'mms@gmail.com', 'supplier bahan orajet dan tinta epson', '2019-05-16 10:43:03', '2019-05-16 10:43:03', NULL),
(9, 'Attaya Visindo', 'Jakarta TImur', '0818850601', 'attayavisindo@gmail.com', 'supplier bahan a3', '2019-05-16 10:48:57', '2019-05-16 10:48:57', NULL),
(10, 'Cello Sukses Berdaya', 'Jakarta', '082174975329', 'cello@gmail.com', 'suplier bahan laminasi dan stiker china', '2019-05-16 10:50:57', '2019-05-16 10:50:57', NULL),
(11, 'Printmate', 'Jl. Surbaya', '081332901811', 'printmate@gmail.com', 'supplier laminasi doff dan stiker 3m', '2019-05-16 10:53:35', '2019-05-16 10:53:35', NULL),
(12, 'testa', 'test', 'test', 'test@mail.co', 'test', '2019-05-27 06:18:10', '2019-05-27 06:18:43', '2019-05-27 06:18:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_belis`
--

CREATE TABLE `tmp_belis` (
  `id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_bahans`
--

CREATE TABLE `ukuran_bahans` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_ukuran_bahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `range_min` double(4,2) NOT NULL,
  `range_max` double(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ukuran_bahans`
--

INSERT INTO `ukuran_bahans` (`id`, `produk_id`, `nm_ukuran_bahan`, `range_min`, `range_max`, `created_at`, `updated_at`) VALUES
(1, '1', 'Uk 1 m', 0.01, 1.00, NULL, '2019-05-30 04:47:21'),
(2, '1', 'Uk 1.05 m', 1.01, 1.05, NULL, NULL),
(3, '1', 'Uk 1.5 m', 1.06, 1.50, NULL, '2019-05-31 03:27:05'),
(4, '1', 'Uk 1.55 m', 1.51, 1.55, NULL, NULL),
(5, '1', 'Uk 2 m', 1.56, 2.00, NULL, '2019-05-31 03:27:54'),
(6, '1', 'Uk 2.05 m', 2.01, 2.05, NULL, NULL),
(7, '1', 'Uk 2.10 m', 2.06, 2.10, NULL, '2019-05-30 04:49:33'),
(8, '1', 'Uk 2.15 m', 2.11, 2.15, NULL, NULL),
(9, '1', 'Uk 2.50 m', 2.16, 2.50, NULL, '2019-05-30 04:50:04'),
(10, '1', 'Uk 2.55 m', 2.51, 2.55, NULL, NULL),
(11, '1', 'Uk 3 m', 2.56, 3.00, NULL, '2019-05-31 06:22:11'),
(12, '1', 'Uk 3.05 m', 3.01, 3.05, NULL, NULL),
(13, '1', 'Uk 3.10 m', 3.06, 3.10, NULL, '2019-05-30 04:52:58'),
(14, '1', 'Uk 3.15 m', 3.11, 3.15, NULL, NULL),
(15, '1', 'Uk 1.2 m', 1.06, 1.20, '2019-05-30 04:54:32', '2019-05-30 04:55:47'),
(16, '1', 'Uk 1.26 m', 1.21, 1.26, '2019-05-30 04:55:23', '2019-05-30 04:55:56'),
(17, '1', 'Uk 1.80', 1.51, 1.80, '2019-05-30 04:56:24', '2019-05-30 04:56:24'),
(18, '1', 'Uk 3 Langsung', 2.16, 3.01, '2019-05-30 05:01:07', '2019-05-31 08:33:02'),
(19, '1', 'Uk 2 m langsung', 1.06, 2.00, '2019-05-31 05:15:21', '2019-05-31 05:15:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_bahan_details`
--

CREATE TABLE `ukuran_bahan_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `ukuran_bahan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ukuran_bahan_details`
--

INSERT INTO `ukuran_bahan_details` (`id`, `barang_id`, `ukuran_bahan_id`, `created_at`, `updated_at`) VALUES
(114, 9, 1, '2019-05-30 04:47:21', '2019-05-30 04:47:21'),
(115, 10, 1, '2019-05-30 04:47:21', '2019-05-30 04:47:21'),
(116, 11, 1, '2019-05-30 04:47:21', '2019-05-30 04:47:21'),
(117, 12, 1, '2019-05-30 04:47:21', '2019-05-30 04:47:21'),
(121, 9, 2, '2019-05-30 04:47:43', '2019-05-30 04:47:43'),
(122, 10, 2, '2019-05-30 04:47:43', '2019-05-30 04:47:43'),
(123, 11, 2, '2019-05-30 04:47:43', '2019-05-30 04:47:43'),
(124, 12, 2, '2019-05-30 04:47:43', '2019-05-30 04:47:43'),
(134, 9, 6, '2019-05-30 04:49:22', '2019-05-30 04:49:22'),
(135, 10, 6, '2019-05-30 04:49:22', '2019-05-30 04:49:22'),
(136, 11, 6, '2019-05-30 04:49:22', '2019-05-30 04:49:22'),
(137, 9, 7, '2019-05-30 04:49:34', '2019-05-30 04:49:34'),
(138, 10, 7, '2019-05-30 04:49:34', '2019-05-30 04:49:34'),
(139, 11, 7, '2019-05-30 04:49:34', '2019-05-30 04:49:34'),
(140, 9, 8, '2019-05-30 04:49:46', '2019-05-30 04:49:46'),
(141, 10, 8, '2019-05-30 04:49:46', '2019-05-30 04:49:46'),
(142, 11, 8, '2019-05-30 04:49:46', '2019-05-30 04:49:46'),
(143, 9, 9, '2019-05-30 04:50:04', '2019-05-30 04:50:04'),
(144, 9, 10, '2019-05-30 04:50:14', '2019-05-30 04:50:14'),
(155, 9, 12, '2019-05-30 04:52:45', '2019-05-30 04:52:45'),
(156, 10, 12, '2019-05-30 04:52:45', '2019-05-30 04:52:45'),
(157, 11, 12, '2019-05-30 04:52:45', '2019-05-30 04:52:45'),
(158, 28, 12, '2019-05-30 04:52:45', '2019-05-30 04:52:45'),
(159, 9, 13, '2019-05-30 04:52:58', '2019-05-30 04:52:58'),
(160, 10, 13, '2019-05-30 04:52:58', '2019-05-30 04:52:58'),
(161, 11, 13, '2019-05-30 04:52:58', '2019-05-30 04:52:58'),
(162, 28, 13, '2019-05-30 04:52:58', '2019-05-30 04:52:58'),
(163, 9, 14, '2019-05-30 04:53:16', '2019-05-30 04:53:16'),
(164, 10, 14, '2019-05-30 04:53:16', '2019-05-30 04:53:16'),
(165, 11, 14, '2019-05-30 04:53:16', '2019-05-30 04:53:16'),
(166, 28, 14, '2019-05-30 04:53:16', '2019-05-30 04:53:16'),
(169, 12, 15, '2019-05-30 04:55:47', '2019-05-30 04:55:47'),
(170, 12, 16, '2019-05-30 04:55:56', '2019-05-30 04:55:56'),
(171, 12, 17, '2019-05-30 04:56:24', '2019-05-30 04:56:24'),
(180, 9, 3, '2019-05-31 03:27:06', '2019-05-31 03:27:06'),
(181, 12, 3, '2019-05-31 03:27:06', '2019-05-31 03:27:06'),
(182, 9, 4, '2019-05-31 03:27:25', '2019-05-31 03:27:25'),
(183, 12, 4, '2019-05-31 03:27:25', '2019-05-31 03:27:25'),
(184, 9, 5, '2019-05-31 03:27:55', '2019-05-31 03:27:55'),
(185, 11, 5, '2019-05-31 03:27:55', '2019-05-31 03:27:55'),
(186, 10, 19, '2019-05-31 05:15:21', '2019-05-31 05:15:21'),
(187, 11, 19, '2019-05-31 05:15:21', '2019-05-31 05:15:21'),
(188, 9, 11, '2019-05-31 06:22:11', '2019-05-31 06:22:11'),
(189, 11, 11, '2019-05-31 06:22:11', '2019-05-31 06:22:11'),
(190, 28, 11, '2019-05-31 06:22:11', '2019-05-31 06:22:11'),
(191, 10, 18, '2019-05-31 08:33:02', '2019-05-31 08:33:02'),
(192, 11, 18, '2019-05-31 08:33:03', '2019-05-31 08:33:03'),
(193, 28, 18, '2019-05-31 08:33:03', '2019-05-31 08:33:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `no_telp`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Lambung Mangkurat', '0836367333', 'admin', '$2y$10$8SZTOXjZjIIwqDB4L/Q.kOiERrheHctF809U2AP/4Cd0mk6ySc1iy', 1, '7RS8cV1QYRCLERSIFO2wacukVAyImxxJvm43Ww1kGXyHqeaFUiVY8XRfaC8M', NULL, NULL, NULL),
(2, 'Petugas order', 'Lambung Mangkurat', '0836367333', 'order', '$2y$10$okm4mU.TO9ZSl.tP7rLdSeT8ajJPkHc0iHTTgQgZAulzcLJl8Y60O', 2, 'KkUHGcw9tfqUrtF4wLThXY5jIbOysIHz9BMO5y61JRZrOjL7xvFNYleBttxV', NULL, NULL, NULL),
(3, 'Kasir', 'Lambung Mangkurat', '0836367333', 'kasir', '$2y$10$gHsThtq78NiZBm8PS6p.euDzinAt9ivTk.F3LoQO4SReZRLlwRnWa', 3, 'nbh5sHA9mwK4vY5GCuy0Rb6zjeIOGeCMcK7WD32sUPmA8QhIqhNUXQjrYJXT', NULL, NULL, NULL),
(4, 'Owner', 'Lambung Mangkurat', '0836367333', 'owner', '$2y$10$fO8RRbf5sxUElbMUDNZJ0evQ45q2CMjk8Q5IJdT/13qB600bH/c.a', 5, 'eMdIWvb83IALoiK6FSDrm7j9CEKPhD1mVxvKTzum9AkdnyKaKpxDWT2U21EV', NULL, NULL, NULL),
(5, 'Outdoor', 'Lambung Mangkurat', '0836367333', 'outdoor', '$2y$10$ADX.2A1Z.rtJT/Pcyvbk5eHkkZaEjdcFn07D2p8iazDZgVLp9FO0i', 6, NULL, NULL, '2019-05-14 03:28:53', NULL),
(6, 'Indoor', 'Lambung Mangkurat', '0836367333', 'indoor', '$2y$10$hYA0NxvX/B3QZnjB2xB4fOkBjG1r4HtPe64hwCKYmUeMd2vrtLvJu', 7, NULL, NULL, '2019-05-14 03:29:11', NULL),
(7, 'Merchant', 'Lambung Mangkurat', '0836367333', 'merchandise', '$2y$10$g.VgxRufjNSmyy/M8QudcehDe1OU0ZGBEz2aN7h8RWiFpasBtcOpi', 8, NULL, NULL, '2019-05-14 03:29:40', NULL),
(8, 'Print a3', 'Lambung Mangkurat', '0836367333', 'printa3', '$2y$10$M8eAW.jjMjsgLpRLNso.feHLUqOO9BokhnEMCva/kmvUF4lMva/IC', 9, 'pzo9MwPHZlz2Hfvu3wuvNfXYpJ5fbmmTPKufDJfFt8MVk2s8B1XJT9GARNCi', NULL, '2019-05-14 03:29:51', NULL),
(9, 'Custom', 'Lambung Mangkurat', '0836367333', 'custom', '$2y$10$6imCWsFssc4kSiUU37hi4.1I73YalQJiOFTqbixRp.7hmJjtgGqti', 10, NULL, NULL, '2019-05-14 03:30:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrians`
--
ALTER TABLE `antrians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_supplier_id_index` (`supplier_id`);

--
-- Indeks untuk tabel `editors`
--
ALTER TABLE `editors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `editors_member_id_index` (`member_id`);

--
-- Indeks untuk tabel `hargas`
--
ALTER TABLE `hargas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hargas_member_id_index` (`member_id`);

--
-- Indeks untuk tabel `harga_costums`
--
ALTER TABLE `harga_costums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `harga_costums_harga_id_index` (`harga_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `harga_indoors`
--
ALTER TABLE `harga_indoors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `harga_indoors_harga_id_index` (`harga_id`),
  ADD KEY `harga_indoors_barang_id_index` (`barang_id`);

--
-- Indeks untuk tabel `harga_merchants`
--
ALTER TABLE `harga_merchants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `harga_merchants_harga_id_index` (`harga_id`),
  ADD KEY `harga_merchants_barang_id_index` (`barang_id`);

--
-- Indeks untuk tabel `harga_outdoors`
--
ALTER TABLE `harga_outdoors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `harga_outdoors_harga_id_index` (`harga_id`),
  ADD KEY `harga_outdoors_barang_id_index` (`barang_id`);

--
-- Indeks untuk tabel `harga_prints`
--
ALTER TABLE `harga_prints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `harga_prints_harga_id_index` (`harga_id`),
  ADD KEY `harga_prints_barang_id_index` (`barang_id`);

--
-- Indeks untuk tabel `kakis`
--
ALTER TABLE `kakis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kakis_member_id_index` (`member_id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_kerjas`
--
ALTER TABLE `order_kerjas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_kerjas_pelanggan_id_index` (`pelanggan_id`);

--
-- Indeks untuk tabel `order_kerja_subs`
--
ALTER TABLE `order_kerja_subs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_kerja_subs_order_kerja_id_index` (`order_kerja_id`),
  ADD KEY `order_kerja_subs_barang_id_index` (`barang_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggans_member_id_index` (`member_id`);

--
-- Indeks untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelians_supplier_id_index` (`supplier_id`),
  ADD KEY `pembelians_barang_id_index` (`barang_id`);

--
-- Indeks untuk tabel `produksis`
--
ALTER TABLE `produksis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stok_barangs`
--
ALTER TABLE `stok_barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stok_barangs_stok_barang_pembelian_id_index` (`stok_barang_pembelian_id`);

--
-- Indeks untuk tabel `stok_barang_pembelians`
--
ALTER TABLE `stok_barang_pembelians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stok_barang_pembelians_pembelian_id_index` (`pembelian_id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tmp_belis`
--
ALTER TABLE `tmp_belis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tmp_belis_barang_id_index` (`barang_id`);

--
-- Indeks untuk tabel `ukuran_bahans`
--
ALTER TABLE `ukuran_bahans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ukuran_bahan_details`
--
ALTER TABLE `ukuran_bahan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ukuran_bahan_details_barang_id_index` (`barang_id`),
  ADD KEY `ukuran_bahan_details_ukuran_bahan_id_index` (`ukuran_bahan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrians`
--
ALTER TABLE `antrians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `editors`
--
ALTER TABLE `editors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `hargas`
--
ALTER TABLE `hargas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `harga_costums`
--
ALTER TABLE `harga_costums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `harga_indoors`
--
ALTER TABLE `harga_indoors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `harga_merchants`
--
ALTER TABLE `harga_merchants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `harga_outdoors`
--
ALTER TABLE `harga_outdoors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `harga_prints`
--
ALTER TABLE `harga_prints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kakis`
--
ALTER TABLE `kakis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_kerjas`
--
ALTER TABLE `order_kerjas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_kerja_subs`
--
ALTER TABLE `order_kerja_subs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produksis`
--
ALTER TABLE `produksis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stok_barangs`
--
ALTER TABLE `stok_barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stok_barang_pembelians`
--
ALTER TABLE `stok_barang_pembelians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tmp_belis`
--
ALTER TABLE `tmp_belis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ukuran_bahans`
--
ALTER TABLE `ukuran_bahans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `ukuran_bahan_details`
--
ALTER TABLE `ukuran_bahan_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `editors`
--
ALTER TABLE `editors`
  ADD CONSTRAINT `editors_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hargas`
--
ALTER TABLE `hargas`
  ADD CONSTRAINT `hargas_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `harga_costums`
--
ALTER TABLE `harga_costums`
  ADD CONSTRAINT `harga_costums_harga_id_foreign` FOREIGN KEY (`harga_id`) REFERENCES `hargas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `harga_indoors`
--
ALTER TABLE `harga_indoors`
  ADD CONSTRAINT `harga_indoors_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `harga_indoors_harga_id_foreign` FOREIGN KEY (`harga_id`) REFERENCES `hargas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `harga_merchants`
--
ALTER TABLE `harga_merchants`
  ADD CONSTRAINT `harga_merchants_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `harga_merchants_harga_id_foreign` FOREIGN KEY (`harga_id`) REFERENCES `hargas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `harga_outdoors`
--
ALTER TABLE `harga_outdoors`
  ADD CONSTRAINT `harga_outdoors_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `harga_outdoors_harga_id_foreign` FOREIGN KEY (`harga_id`) REFERENCES `hargas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `harga_prints`
--
ALTER TABLE `harga_prints`
  ADD CONSTRAINT `harga_prints_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `harga_prints_harga_id_foreign` FOREIGN KEY (`harga_id`) REFERENCES `hargas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kakis`
--
ALTER TABLE `kakis`
  ADD CONSTRAINT `kakis_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_kerjas`
--
ALTER TABLE `order_kerjas`
  ADD CONSTRAINT `order_kerjas_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_kerja_subs`
--
ALTER TABLE `order_kerja_subs`
  ADD CONSTRAINT `order_kerja_subs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_kerja_subs_order_kerja_id_foreign` FOREIGN KEY (`order_kerja_id`) REFERENCES `order_kerjas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD CONSTRAINT `pelanggans_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD CONSTRAINT `pembelians_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelians_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stok_barangs`
--
ALTER TABLE `stok_barangs`
  ADD CONSTRAINT `stok_barangs_stok_barang_pembelian_id_foreign` FOREIGN KEY (`stok_barang_pembelian_id`) REFERENCES `stok_barang_pembelians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stok_barang_pembelians`
--
ALTER TABLE `stok_barang_pembelians`
  ADD CONSTRAINT `stok_barang_pembelians_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmp_belis`
--
ALTER TABLE `tmp_belis`
  ADD CONSTRAINT `tmp_belis_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ukuran_bahan_details`
--
ALTER TABLE `ukuran_bahan_details`
  ADD CONSTRAINT `detail_ukuran_bahans_ukuran_bahan_id_foreign` FOREIGN KEY (`ukuran_bahan_id`) REFERENCES `ukuran_bahans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ukuran_bahan_details_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
