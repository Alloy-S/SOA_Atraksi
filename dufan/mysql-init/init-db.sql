-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221113.0eded7bb43
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 09:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atraksi_soa`
--

-- --------------------------------------------------------

--
-- Table structure for table `atraksis`
--

CREATE TABLE `atraksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_penting` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlight` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lowest_price` double NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atraksis`
--

INSERT INTO `atraksis` (`id`, `title`, `slug`, `deskripsi`, `info_penting`, `highlight`, `alamat`, `provinsi`, `provinsi_name`, `kota`, `kota_name`, `negara`, `gps_location`, `lowest_price`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Dufan', 'Dufan', 'Dufan', '<ul>\n                                <li>Tidak termasuk tiket masuk Pintu Gerbang Utama Ancol. Beli tiket Pintu Gerbang Utama Ancol di sini untuk pengalaman liburan yang tak terlupakan.</li>\n                                <li>Pengunjung dilarang membawa makanan dan minuman ke dalam area Dufan.</li>\n                                <li>Loket Dufan dan Pintu Gerbang Dunia Fantasi ditutup 1 jam lebih awal dari jam operasional yang berlaku.</li>\n                            </ul>', '<ul>\n                                <li>Dufan adalah wahana yang menghadirkan tempat bermain asyik yang terbagi menjadi empat kategori, yakni Children Rides, Family Ride, Water Ride, dan Thrill Ride.</li>\n                                <li>Bawa anak-anakmu ke wahana Dufan khusus anak, seperti Ontang-Anting yang riuh dan Istana Boneka yang penuh pesona.</li>\n                                <li>Sekaranglah waktunya untuk membuat kenangan berharga bersama keluarga dan teman-teman. Cek harga tiket Dufan 2024 di bawah, pilih tiketnya, dan nikmati petualangan yang seru!</li>\n                                <li>Cocok untuk: Keluarga Asyik, Bersama Pasangan, dan Geng Asyik.</li>\n                            </ul>', 'Jl. Lodan Timur No.7, Ancol, Kec. Pademangan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14430', '2', 'Dufan', '2', 'Dufan', 'Indonesia', '-7.338611, 112.737592', 100000, 1, '2024-06-11 08:22:53', '2024-06-11 08:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `jml_terjual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `etickets`
--

CREATE TABLE `etickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_at` date NOT NULL,
  `check_in` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etickets`
--

INSERT INTO `etickets` (`id`, `booking_code`, `ticket_code`, `paket_id`, `jenis`, `valid_at`, `check_in`, `created_at`, `updated_at`) VALUES
(1, 'JAAHD34', 'YVT58Y', 1, 'Regular', '2024-06-12', NULL, '2024-06-12 06:39:02', NULL),
(2, 'JAAHD34', '4GSON2', 1, 'Regular', '2024-06-12', NULL, '2024-06-12 06:39:02', NULL),
(3, 'JAAHD34', 'FYI8RH', 1, 'Regular', '2024-06-16', '2024-06-16 13:47:56', '2024-06-16 06:47:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jam_bukas`
--

CREATE TABLE `jam_bukas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `atraksi_id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_open` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jam_bukas`
--

INSERT INTO `jam_bukas` (`id`, `atraksi_id`, `hari`, `waktu`, `is_open`, `created_at`, `updated_at`) VALUES
(1, 1, 'Senin', '09:00 - 17:00', 1, '2024-06-11 08:22:53', '2024-06-11 08:22:53'),
(2, 1, 'Selasa', '09:00 - 17:00', 1, '2024-06-11 08:22:53', '2024-06-11 08:22:53'),
(3, 1, 'Rabu', '09:00 - 17:00', 1, '2024-06-11 08:22:53', '2024-06-11 08:22:53'),
(4, 1, 'Kamis', '09:00 - 17:00', 1, '2024-06-11 08:22:53', '2024-06-11 08:22:53'),
(5, 1, 'Jumat', '09:00 - 17:00', 1, '2024-06-11 08:22:53', '2024-06-11 08:22:53'),
(6, 1, 'Sabtu', '09:00 - 17:00', 1, '2024-06-11 08:22:53', '2024-06-11 08:22:53'),
(7, 1, 'Minggu', '09:00 - 17:00', 1, '2024-06-11 08:22:53', '2024-06-11 08:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `pakets`
--

CREATE TABLE `pakets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `atraksi_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara_penukaran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat_dan_ketentuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `kuota` int(11) NOT NULL,
  `is_refundable` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pakets`
--

INSERT INTO `pakets` (`id`, `atraksi_id`, `type_id`, `title`, `deskripsi`, `fasilitas`, `cara_penukaran`, `syarat_dan_ketentuan`, `harga`, `kuota`, `is_refundable`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Full Day - Regular', 'asdfgadfgdfg', 'asdfgadfgdfg', 'asdfgadfgdfg', 'asdfgadfgdfg', 100000, 100, 1, '2024-06-11 08:22:53', '2024-06-11 08:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `atraksi_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeholder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tgl_tutups`
--

CREATE TABLE `tgl_tutups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `atraksi_id` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tgl_tutups`
--

INSERT INTO `tgl_tutups` (`id`, `atraksi_id`, `tgl`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-06-13', '2024-06-12 15:10:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2024-06-11 08:22:53', '2024-06-11 08:22:53', 'Regular'),
(2, '2024-06-11 08:22:53', '2024-06-11 08:22:53', 'Fast Track');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atraksis`
--
ALTER TABLE `atraksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `atraksis_slug_unique` (`slug`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etickets`
--
ALTER TABLE `etickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `etickets_ticket_code_unique` (`ticket_code`);

--
-- Indexes for table `jam_bukas`
--
ALTER TABLE `jam_bukas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakets`
--
ALTER TABLE `pakets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pakets_atraksi_id_foreign` (`atraksi_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_atraksi_id_foreign` (`atraksi_id`);

--
-- Indexes for table `tgl_tutups`
--
ALTER TABLE `tgl_tutups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atraksis`
--
ALTER TABLE `atraksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `etickets`
--
ALTER TABLE `etickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jam_bukas`
--
ALTER TABLE `jam_bukas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pakets`
--
ALTER TABLE `pakets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tgl_tutups`
--
ALTER TABLE `tgl_tutups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pakets`
--
ALTER TABLE `pakets`
  ADD CONSTRAINT `pakets_atraksi_id_foreign` FOREIGN KEY (`atraksi_id`) REFERENCES `atraksis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_atraksi_id_foreign` FOREIGN KEY (`atraksi_id`) REFERENCES `atraksis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
