SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greennusa1_tujuhsinar`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

--
-- Dumping data for table `barangs`
--
INSERT INTO `suppliers` (`id`, `nm_lengkap`, `alamat`, `no_telp`, `email`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 'Media World', 'Jl. Ir Sutami Kompleks Pergudangan', '082388680088', 'gias@gmail.com', 'suplier bahan baku spanduk,stiker dll', '2019-05-17 02:29:17', '2019-05-17 02:29:17'),
(5, 'Mapank Samarinda', 'Jl. D.I Panjaitan Kompleks Ruko Segiri II', '081347898982', 'adriansyah22@gmail.com', 'Supplier Spanduk,', '2019-05-17 02:37:19', '2019-05-17 02:37:19'),
(6, 'Vicentra Surabaya', 'Surabaya', '081232548368', 'fifik@gmail.com', 'suplier bahan spanduk, stiker a3', '2019-05-17 02:38:59', '2019-05-17 02:38:59'),
(7, 'Wujud Unggul Sby', 'Jl. Bendul Merisi Barat', '085730007313', 'wu@gmail.com', 'suplier bahan stiker ritrama dll', '2019-05-17 02:40:09', '2019-05-17 02:40:09'),
(8, 'Mulia Mandiri Supply', 'Jakarta', '08179883931', 'mms@gmail.com', 'supplier bahan orajet dan tinta epson', '2019-05-17 02:43:03', '2019-05-17 02:43:03'),
(9, 'Attaya Visindo', 'Jakarta TImur', '0818850601', 'attayavisindo@gmail.com', 'supplier bahan a3', '2019-05-17 02:48:57', '2019-05-17 02:48:57'),
(10, 'Cello Sukses Berdaya', 'Jakarta', '082174975329', 'cello@gmail.com', 'suplier bahan laminasi dan stiker china', '2019-05-17 02:50:57', '2019-05-17 02:50:57'),
(11, 'Printmate', 'Jl. Surbaya', '081332901811', 'printmate@gmail.com', 'supplier laminasi doff dan stiker 3m', '2019-05-17 02:53:35', '2019-05-17 02:53:35');

INSERT INTO `members` (`id`, `nm_tipe`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Gold', 'Gold untuk perusahaan', NULL, NULL),
(3, 'Bronze', 'Bronze untuk komunitas', NULL, NULL),
(4, 'Silver', 'Silver untuk umum', NULL, NULL);


INSERT INTO `pelanggans` (`id`, `member_id`, `nama`, `alamat`, `no_telp`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'Applegate', 'Jl. Lambung Mangkurat Gg.3 Blok B', '085245762133', 'donyahmd24@gmail.com', NULL, NULL, NULL),
(2, 2, 'Ventura', 'Jl. Lambung Mangkurat Gg.3', '085234322433', 'mahendrayusril@gmail.com', NULL, NULL, NULL);



INSERT INTO `barangs` (`id`, `supplier_id`, `barcode`, `produk_id`, `nm_barang`, `kategori`, `satuan`, `hrg_beli`, `min_stok`, `created_at`, `updated_at`) VALUES
(9, 5, 'FL001', '1', 'Spanduk 280 gr', 'test', 'lembar', 1568000.00, 264, '2019-05-17 05:08:01', '2019-05-17 07:06:18'),
(10, 7, 'FL002', '1', 'Korcin 440 gr', 'Spanduk', 'lembar', 2400000.00, 160, '2019-05-17 07:07:56', '2019-05-17 07:07:56'),
(11, 7, 'FL003', '1', 'Backlite 610 gr', 'Spanduk', 'lembar', 4000000.00, 160, '2019-05-17 07:09:29', '2019-05-17 07:09:29'),
(12, 4, 'FL004', '1', 'Cloth Banner', 'Umbul - umbul', 'lembar', 1440000.00, 126, '2019-05-17 07:11:12', '2019-05-17 07:11:12'),
(13, 7, 'stc001', '2', 'Stiker Ritrama', 'Stiker', 'lembar', 1312500.00, 53, '2019-05-17 07:13:27', '2019-05-17 07:13:27'),
(14, 11, 'stc002', '2', 'Stiker 3M', 'Stiker', 'lembar', 1207500.00, 53, '2019-05-17 07:14:27', '2019-05-17 07:14:27'),
(15, 10, 'stc003', '2', 'Stiker China Premium', 'Stiker', 'lembar', 1050000.00, 53, '2019-05-17 07:15:33', '2019-05-17 07:15:33'),
(16, 10, 'stc004', '2', 'Stiker China Biasa', 'Stiker', 'lembar', 892500.00, 3, '2019-05-17 07:16:45', '2019-05-17 07:16:45'),
(17, 10, 'stc005', '2', 'Stiker Graftac', 'Stiker', 'lembar', 1050000.00, 53, '2019-05-17 07:17:38', '2019-05-17 07:18:01'),
(18, 7, 'stc006', '2', 'Albatros', 'Kertas', 'lembar', 900000.00, 46, '2019-05-17 07:20:52', '2019-05-17 07:20:52'),
(19, 7, 'stc007', '2', 'Easy Banner', 'Kertas', 'lembar', 1000000.00, 46, '2019-05-17 07:21:42', '2019-05-17 07:21:42'),
(20, 7, 'stc008', '2', 'Trisolve', 'Kertas', 'lembar', 900000.00, 63, '2019-05-17 07:22:52', '2019-05-17 07:22:52'),
(21, 7, 'stc009', '2', 'Stiker Ritrama Matt', 'Stiker', 'lembar', 1000000.00, 53, '2019-05-17 07:30:22', '2019-05-17 07:30:22'),
(22, 7, 'stc010', '2', 'Stiker Blackout', 'Stiker', 'lembar', 2500000.00, 53, '2019-05-17 07:34:14', '2019-05-17 07:34:14'),
(23, 7, 'stc011', '2', 'Stiker One Way', 'Stiker', 'lembar', 1550000.00, 53, '2019-05-17 07:34:48', '2019-05-17 07:34:48'),
(24, 8, 'stc012', '2', 'Stiker Chrome', 'Stiker', 'lembar', 1500000.00, 63, '2019-05-17 07:36:11', '2019-05-17 07:36:11'),
(25, 5, 'stc013', '2', 'Photopaper Silky', 'Kertas', 'lembar', 50.00, 900000, '2019-05-17 07:46:31', '2019-05-17 07:46:31'),
(26, 9, 'stc014', '2', 'Backlite Film', 'Kertas', 'lembar', 3000000.00, 63, '2019-05-17 07:50:22', '2019-05-17 07:50:22'),
(27, 7, 'stc015', '2', 'Flesso', 'Kertas', 'lembar', 900000.00, 25, '2019-05-17 07:51:27', '2019-05-17 07:51:27'),
(28, 5, 'FL005', '1', 'Cover Sound', 'Spanduk', 'lembar', 900000.00, 50, '2019-05-17 07:58:42', '2019-05-17 07:58:42'),
(29, 6, 'KR001', '4', 'HVS 100 gr', 'Kertas', 'lembar', 2000.00, 1000, '2019-05-17 08:00:19', '2019-05-17 08:00:19'),
(30, 5, 'KR002', '4', 'AP 120 GR', 'Kertas', 'lembar', 2200.00, 1000, '2019-05-17 08:03:30', '2019-05-17 08:03:30'),
(31, 5, 'KR003', '4', 'AP 210 GR', 'Kertas', 'lembar', 2400.00, 4000, '2019-05-17 08:04:30', '2019-05-17 08:04:30'),
(32, 5, 'KR004', '4', 'AP 230 GR', 'Kertas', 'lembar', 2500.00, 5000, '2019-05-17 08:06:18', '2019-05-17 08:06:18'),
(33, 5, 'KR005', '4', 'AP 260 GR', 'Kertas', 'lembar', 2500.00, 5000, '2019-05-17 08:07:01', '2019-05-17 08:07:01'),
(34, 4, 'KR006', '4', 'Stiker Bontak', 'Kertas', 'lembar', 3500.00, 5000, '2019-05-17 08:07:47', '2019-05-17 08:07:47'),
(35, 5, 'KR007', '4', 'PVC', 'Kertas', 'lembar', 10000.00, 100, '2019-05-17 08:10:18', '2019-05-17 08:10:18'),
(36, 6, 'MC001', '3', 'Mug Polos', 'Gelas', 'biji', 15000.00, 200, '2019-05-17 08:11:22', '2019-05-17 08:11:22'),
(37, 5, 'MC002', '3', 'Mug Warna', 'Gelas', 'biji', 18000.00, 100, '2019-05-17 08:12:18', '2019-05-17 08:12:18'),
(39, 5, 'MC003', '3', 'Pin Uk 4.4', 'Gelas', 'biji', 2500.00, 1000, '2019-05-17 08:20:46', '2019-05-17 08:20:46'),
(40, 5, 'MC004', '3', 'Pin Uk 5.8', 'Gelas', 'biji', 3000.00, 1000, '2019-05-17 08:21:31', '2019-05-17 08:21:31'),
(41, 5, 'MC005', '3', 'Ganci Uk 4.4', 'Gelas', 'biji', 3000.00, 200, '2019-05-17 08:30:27', '2019-05-17 08:30:27'),
(42, 4, 'MC006', '3', 'Ganci Uk 5.8', 'Gelas', 'biji', 3500.00, 1000, '2019-05-17 08:32:32', '2019-05-17 08:32:32'),
(43, 5, 'MC007', '3', 'Stempel Small', 'Gelas', 'biji', 20000.00, 100, '2019-05-17 08:33:21', '2019-05-17 08:33:21'),
(44, 5, 'MC008', '3', 'Stempel Medium', 'Gelas', 'biji', 20000.00, 1000, '2019-05-17 08:34:03', '2019-05-17 08:34:03'),
(45, 5, 'MC009', '3', 'Stempel Large', 'Gelas', 'biji', 35000.00, 100, '2019-05-17 08:35:26', '2019-05-17 08:35:26'),
(46, 6, 'MC010', '3', 'Id card', 'Kertas', 'lembar', 5000.00, 100, '2019-05-17 08:36:59', '2019-05-17 08:36:59'),
(47, 6, 'ACC001', '5', 'Tiang Xbanner 160', 'aksesories', 'pcs', 30000.00, 200, '2019-05-17 08:38:31', '2019-05-17 08:38:31'),
(48, 5, 'ACC002', '5', 'Tiang Roll Banner 160', 'aksesories', 'pcs', 115000.00, 200, '2019-05-17 08:39:30', '2019-05-17 08:39:30'),
(49, 7, 'ACC003', '5', 'Tinta Stempel', 'aksesories', 'pcs', 10000.00, 50, '2019-05-17 08:40:06', '2019-05-17 08:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `editors`
--

--
-- Dumping data for table `editors`
--

INSERT INTO `editors` (`id`, `produk_id`, `member_id`, `nama_finishing`, `tambahan_harga`, `created_at`, `updated_at`) VALUES
(18, '1', 4, 'Tambah Mata Ayam', 500.00, '2019-05-17 08:55:55', '2019-05-18 04:47:27'),
(19, '1', 4, 'Lipat Keliling', 2500.00, '2019-05-17 08:57:21', '2019-05-17 08:57:21'),
(20, '1', 4, 'Mata Ayam', 0.00, '2019-05-18 04:47:43', '2019-05-18 04:47:43'),
(21, '1', 4, 'Lipat Keliling + Mata Ayam', 3000.00, '2019-05-18 04:48:15', '2019-05-18 04:48:15'),
(22, '2', 4, 'Cutting/Potong', 25000.00, '2019-05-18 06:55:40', '2019-05-18 06:57:09'),
(23, '2', 4, 'Print Aja', 0.00, '2019-05-18 06:56:31', '2019-05-18 06:56:31'),
(24, '4', 4, 'Cutting/Potong', 5000.00, '2019-05-18 07:31:43', '2019-05-18 07:31:43'),
(25, '4', 4, 'Non Finshing', 0.00, '2019-05-18 07:33:34', '2019-05-18 07:33:34'),
(26, '2', 4, 'Laminasi Glossy', 30000.00, '2019-05-19 04:59:38', '2019-05-19 05:13:51'),
(27, '2', 4, 'Laminasi Doff', 50000.00, '2019-05-19 04:59:56', '2019-05-19 04:59:56'),
(28, '2', 4, 'Laminasi Glossy + cut', 75000.00, '2019-05-19 05:02:20', '2019-05-19 05:02:20'),
(29, '2', 4, 'Laminasi Doff + cut', 75000.00, '2019-05-19 05:02:36', '2019-05-19 05:02:36'),
(30, '2', 4, 'Die Cut', 50000.00, '2019-05-19 05:02:54', '2019-05-19 05:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `hargas`
--

--
-- Dumping data for table `hargas`
--

INSERT INTO `hargas` (`id`, `member_id`, `produk_id`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, '1', 'tes', '2019-05-17 08:58:48', '2019-05-17 08:58:48', NULL),
(2, 4, '2', 'silver', '2019-05-18 03:42:57', '2019-05-18 03:42:57', NULL),
(3, 4, '3', 'gelas', '2019-05-18 03:54:18', '2019-05-18 03:54:18', NULL),
(4, 4, '4', 'tes', '2019-05-18 03:55:41', '2019-05-18 03:55:41', NULL),
(5, 4, '5', 'jasa cetak', '2019-05-18 04:23:54', '2019-05-18 04:23:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `harga_indoors`
--

-- Dumping data for table `harga_indoors`
--

INSERT INTO `harga_indoors` (`id`, `harga_id`, `barang_id`, `range_min`, `range_max`, `harga_pokok`, `harga_jual`, `disc`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 13, 1, 15, 50000.00, 125000.00, 0, 'silver', '2019-05-18 03:42:57', '2019-05-18 03:42:57', NULL),
(2, 2, 14, 1, 15, 50000.00, 130000.00, 0, 'silver', '2019-05-18 03:43:30', '2019-05-18 03:43:30', NULL),
(3, 2, 15, 1, 15, 40000.00, 125000.00, 0, 'silver', '2019-05-18 03:43:58', '2019-05-18 03:43:58', NULL),
(4, 2, 16, 1, 15, 40000.00, 115000.00, 0, 'silver', '2019-05-18 03:44:24', '2019-05-18 03:44:24', NULL),
(5, 2, 17, 1, 15, 50000.00, 135000.00, 0, 'silver', '2019-05-18 03:45:08', '2019-05-18 03:45:08', NULL),
(6, 2, 18, 1, 15, 50000.00, 125000.00, 0, 'silver', '2019-05-18 03:45:37', '2019-05-18 03:45:37', NULL),
(7, 2, 19, 1, 15, 50000.00, 135000.00, 0, 'silver', '2019-05-18 03:46:01', '2019-05-18 03:46:01', NULL),
(8, 2, 20, 1, 15, 50000.00, 125000.00, 0, 'silver', '2019-05-18 03:49:35', '2019-05-18 03:49:35', NULL),
(9, 2, 21, 1, 15, 50000.00, 135000.00, 0, 'silver', '2019-05-18 03:51:25', '2019-05-18 03:51:25', NULL),
(10, 2, 27, 1, 10, 50.00, 65.00, 0, 'bahan baju', '2019-05-19 14:12:09', '2019-05-19 14:12:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `harga_outdoors`
--

--
-- Dumping data for table `harga_outdoors`
--

INSERT INTO `harga_outdoors` (`id`, `harga_id`, `barang_id`, `range_min`, `range_max`, `harga_pokok`, `harga_jual`, `disc`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 9, 1, 10, 13000.00, 25000.00, 0, 'tes', '2019-05-17 08:58:49', '2019-05-17 08:59:27', '2019-05-17 08:59:27'),
(2, 1, 9, 1, 15, 13000.00, 25000.00, 0, 'tes', '2019-05-18 03:34:16', '2019-05-18 03:34:16', NULL),
(3, 1, 10, 1, 15, 30000.00, 70000.00, 0, 'tes', '2019-05-18 03:35:03', '2019-05-18 03:35:03', NULL),
(4, 1, 11, 1, 15, 50000.00, 100000.00, 0, 'tes', '2019-05-18 03:35:26', '2019-05-18 03:35:26', NULL),
(5, 1, 12, 1, 15, 20000.00, 65000.00, 0, 'tes', '2019-05-18 03:35:57', '2019-05-18 03:35:57', NULL),
(6, 1, 28, 1, 15, 50000.00, 135000.00, 0, 'tes', '2019-05-18 03:36:45', '2019-05-18 03:36:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kakis`
--

--

INSERT INTO `kakis` (`id`, `produk_id`, `member_id`, `nama_kaki`, `tambahan_harga`, `created_at`, `updated_at`) VALUES
(12, '1', 2, 'Xbanner 160 x 60', 100000.00, '2019-05-17 08:40:54', '2019-05-17 08:40:54'),
(13, '2', 3, 'Xbanner 160 x 60', 100000.00, '2019-05-17 08:41:05', '2019-05-17 08:41:05'),
(14, '1', 4, 'Roll Banner 160 x 60', 125000.00, '2019-05-17 08:41:36', '2019-05-17 08:41:36'),
(15, '2', 2, 'Roll Banner 160 x 60', 125000.00, '2019-05-17 08:41:50', '2019-05-17 08:41:50'),
(16, '1', 4, 'Roll Banner 200 x 80', 175000.00, '2019-05-17 08:42:17', '2019-05-17 08:42:17'),
(17, '2', 3, 'Roll Banner 200 x 80', 175000.00, '2019-05-17 08:42:29', '2019-05-17 08:42:29'),
(18, '1', 4, 'Tanpa kaki', 0.00, '2019-05-18 04:48:40', '2019-05-20 08:19:21'),
(19, '2', 4, 'Tanpa kaki', 0.00, '2019-05-18 04:49:17', '2019-05-18 04:49:17');

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;