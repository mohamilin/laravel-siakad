-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2019 at 04:29 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pelajaran`
--

CREATE TABLE `detail_pelajaran` (
  `id_detail_pelajaran` bigint(20) UNSIGNED NOT NULL,
  `id_pelajaran` bigint(20) UNSIGNED NOT NULL,
  `id_guru` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pelajaran`
--

INSERT INTO `detail_pelajaran` (`id_detail_pelajaran`, `id_pelajaran`, `id_guru`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1, 6, 3, 2, NULL, '2019-07-11 06:21:42'),
(2, 1, 2, 3, '2019-07-11 04:41:03', '2019-07-11 04:41:03'),
(4, 8, 5, 6, '2019-07-11 06:35:19', '2019-07-11 06:35:19'),
(5, 1, 1, 2, '2019-07-11 06:36:07', '2019-07-11 06:36:07'),
(11, 7, 6, 5, '2019-07-11 23:26:03', '2019-07-11 23:26:03'),
(12, 11, 7, 7, '2019-07-12 07:15:47', '2019-07-12 07:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_aktif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `alamat`, `no_telepon`, `status_aktif`, `password`, `created_at`, `updated_at`) VALUES
(1, '190808264', 'Mulyadi Saputro', 'Laki-Laki', 'Babadan', '812343228', 'Aktif', '$2y$10$TptG5xBHbwDNTJeQ0vEp0uGGQ6YThB6wrOTwaW7tSNdMiyrzTtFZy', NULL, NULL),
(2, '2147483647', 'Sri Mulyani', 'Perempuan', 'Surabaya', '2147483647', 'Aktif', '$2y$10$TptG5xBHbwDNTJeQ0vEp0uGGQ6YThB6wrOTwaW7tSNdMiyrzTtFZy', '2019-07-10 18:49:28', '2019-07-10 19:14:34'),
(3, '64123123123', 'Septu Aji Sudrajat', 'Laki-Laki', 'Yogyakarta', '081395473827', 'Aktif', '$2y$10$TptG5xBHbwDNTJeQ0vEp0uGGQ6YThB6wrOTwaW7tSNdMiyrzTtFZy', '2019-07-10 18:55:24', '2019-07-10 18:55:24'),
(5, '92839182398', 'Supriono', 'Laki-Laki', 'Washington DC', '0822371647477', 'Aktif', '$2y$10$TptG5xBHbwDNTJeQ0vEp0uGGQ6YThB6wrOTwaW7tSNdMiyrzTtFZy', '2019-07-11 06:24:32', '2019-07-11 06:24:32'),
(6, '8918239819238918', 'Marwati', 'Perempuan', '2851 Island Avenue', '3182743086', 'Aktif', '$2y$10$CKtfx1CJZfC8HI1UfJ..vuFZ29XuRdKXwRkg1SUvrdhDfcUIUuG3C', '2019-07-11 06:25:54', '2019-07-12 01:54:27'),
(7, '98765', 'Ikhwan', 'Laki-Laki', 'Magetan', '082737177723', 'Aktif', '$2y$10$9FrefErSbpBePvTUCnjdKunNlz2dWtWBWyUSufSlcG3mp7.t4Ea4i', '2019-07-12 06:31:32', '2019-07-12 06:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_aktif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tahun_ajar`, `kelas`, `jurusan`, `status_aktif`, `created_at`, `updated_at`) VALUES
(2, '2019/2020', 'X', 'Rekayasa Perangkat Lunak', 'Aktif', '2019-07-10 19:59:08', '2019-07-10 19:59:08'),
(3, '2019/2020', 'XII', 'Rekayasa Perangkat Lunak', 'Aktif', '2019-07-10 19:59:28', '2019-07-10 19:59:28'),
(5, '2019/2020', 'X', 'Teknik Otomasi Industri', 'Aktif', '2019-07-11 06:26:29', '2019-07-11 06:26:29'),
(6, '2019/2020', 'XI', 'Teknik Otomasi Industri', 'Aktif', '2019-07-11 06:26:52', '2019-07-11 06:26:52'),
(7, '2019/2020', 'XI', 'Rekayasa Perangkat Lunak', 'Aktif', '2019-07-11 06:28:18', '2019-07-11 06:28:18'),
(8, '2019/2020', 'XII', 'Teknik Otomasi Industri', 'Aktif', '2019-07-11 06:28:40', '2019-07-11 06:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` bigint(20) UNSIGNED NOT NULL,
  `semester` int(11) NOT NULL,
  `id_detail_pelajaran` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `nilai_tugas1` int(11) DEFAULT NULL,
  `nilai_tugas2` int(11) DEFAULT NULL,
  `nilai_uts` int(11) DEFAULT NULL,
  `nilai_uas` int(11) DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `semester`, `id_detail_pelajaran`, `id_siswa`, `nilai_tugas1`, `nilai_tugas2`, `nilai_uts`, `nilai_uas`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 4, 87, 98, 76, 89, 'Lulus', NULL, NULL),
(19, 2, 11, 3, NULL, NULL, NULL, NULL, '-', '2019-07-11 23:26:03', '2019-07-11 23:26:03'),
(20, 1, 11, 3, 86, 86, 77, 78, NULL, '2019-07-12 00:49:06', '2019-07-12 01:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` bigint(20) UNSIGNED NOT NULL,
  `nama_pelajaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `nama_pelajaran`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Pemrograman Berorientasi Objek', 'Pemrograman Berorientasi Objek', NULL, '2019-07-10 06:49:32'),
(6, 'Pemrograman Dasar', 'Pemrograman Dasar', '2019-07-10 06:49:46', '2019-07-10 06:49:46'),
(7, 'Elektronika Dasar', 'Elektronika Dasar', '2019-07-11 04:41:28', '2019-07-11 04:41:28'),
(8, 'Gambar Teknik Otomasi', 'Gambar Teknik', '2019-07-11 06:34:42', '2019-07-11 06:34:42'),
(11, 'Basis Data', 'Basis Data', '2019-07-12 07:15:28', '2019-07-12 07:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telepon`, `foto`, `id_kelas`, `status`, `password`, `created_at`, `updated_at`) VALUES
(2, '123456', 'Samodra', 'Laki-Laki', 'Islam', 'Ponorogo', '2000-12-08', 'Babadan', '082838174717', 'logo.png', 2, 'Aktif', '$2y$10$ZU1RsuxlOKNHe57ryxUWl.PqmAffaa6HgfJ8o.COPuNGkEY5DvCsC', NULL, '2019-07-11 03:30:36'),
(3, '123123', 'Mary Holloways', 'Perempuan', 'Katholik', 'Philadelphia', '2019-07-18', '2851 Island Avenue', '3182743086', 'default.jpg', 5, 'Aktif', '$2y$10$s.FkUdSdC7JPKX80N/Wi2.cCKNe822vNieyNUmY7ekBCcUMqS2G02', '2019-07-10 22:34:41', '2019-07-12 05:35:19'),
(4, '123123312', 'Scott McMillan', 'Laki-Laki', 'Buddha', 'Philadelphia', '2019-07-01', '2581 Island Avenue', '7656754353', 'logo.png', 6, 'Aktif', '$2y$10$6rwJmFgmN3TbnkzwXMqdmugSYS/TqFo8ft0KJl0o3efLhRAW.oLeu', '2019-07-10 22:40:14', '2019-07-10 22:40:14'),
(6, '129831092389', 'Richard Dwi Putra', 'Laki-Laki', 'Islam', 'Medan', '2002-07-18', 'Mangkujayan', '08123891238', 'default.jpg', 2, 'Aktif', '$2y$10$nfn2W6AFbagc0GcUCFJvmuBhwVkS626aE8VctSYylTsc1hCcq4hf6', '2019-07-11 06:29:43', '2019-07-11 06:29:43'),
(7, '9999', 'Jazmin Amaya', 'Perempuan', 'Islam', 'Tokyo', '2001-07-17', 'Babadan', '123123', 'default.jpg', 3, 'Aktif', '$2y$10$O3.uMSvIPTM5ApMbLE3vVuJpQsFKL1Ij44YoGXDEHoUXxwZmSt.Ea', '2019-07-12 07:13:52', '2019-07-12 07:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$0uGA3xyPGbd8eHBxxXnImeOqUSuq9Ga77naxH7RnwVFDrGugi02BS', '2019-07-11 18:44:54', '2019-07-11 18:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pelajaran`
--
ALTER TABLE `detail_pelajaran`
  ADD PRIMARY KEY (`id_detail_pelajaran`),
  ADD KEY `detail_pelajaran_id_pelajaran_foreign` (`id_pelajaran`),
  ADD KEY `detail_pelajaran_id_guru_foreign` (`id_guru`),
  ADD KEY `detail_pelajaran_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nilai_id_detail_pelajaran_foreign` (`id_detail_pelajaran`),
  ADD KEY `nilai_id_siswa_foreign` (`id_siswa`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `siswa_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pelajaran`
--
ALTER TABLE `detail_pelajaran`
  MODIFY `id_detail_pelajaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pelajaran`
--
ALTER TABLE `detail_pelajaran`
  ADD CONSTRAINT `detail_pelajaran_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `detail_pelajaran_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `detail_pelajaran_id_pelajaran_foreign` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id_pelajaran`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_id_detail_pelajaran_foreign` FOREIGN KEY (`id_detail_pelajaran`) REFERENCES `detail_pelajaran` (`id_detail_pelajaran`),
  ADD CONSTRAINT `nilai_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
