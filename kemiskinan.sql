-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2026 pada 07.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemiskinan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bansos`
--

CREATE TABLE `bansos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rw` varchar(255) NOT NULL,
  `pkh` int(11) NOT NULL,
  `bpnt` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bansos`
--

INSERT INTO `bansos` (`id`, `rw`, `pkh`, `bpnt`, `total`, `created_at`, `updated_at`) VALUES
(3, 'RW 3', 30, 20, 50, '2026-05-15 20:05:05', '2026-05-15 20:05:05'),
(4, 'RW 1', 50, 40, 90, '2026-05-15 20:07:35', '2026-05-15 20:21:03'),
(5, 'RW 2', 60, 10, 70, '2026-05-15 20:13:53', '2026-05-15 20:13:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `long_lat` text NOT NULL,
  `jumlah` text NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `kategori`, `nama_fasilitas`, `long_lat`, `jumlah`, `lokasi`, `created_at`, `updated_at`) VALUES
(28, 'Sekolah', 'SDN 01 BATTANG BARAT', '-2.957914,120.082413', '30', 'RW 1', '2026-05-12 18:01:47', '2026-05-12 18:01:47'),
(29, 'Rumah Ibadah', 'MASJID', '-2.955685,120.077608', '30', 'RW 2', '2026-05-12 18:17:39', '2026-05-13 03:54:20'),
(30, 'Posyandu', 'Posyandu', '-2.959285,120.084366', '12', 'RW 3', '2026-05-13 03:34:35', '2026-05-13 03:54:32'),
(31, 'Balai', 'BALAI', '-2.978397,120.088247', '12', 'RW 2', '2026-05-13 04:08:29', '2026-05-13 04:09:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompoktani`
--

CREATE TABLE `kelompoktani` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rw` varchar(255) NOT NULL,
  `nama_kelompok` varchar(255) NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `komoditas` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelompoktani`
--

INSERT INTO `kelompoktani` (`id`, `rw`, `nama_kelompok`, `ketua`, `komoditas`, `status`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 'RW 3', 'MELATI', 'Asdar', 'Cengkeh', 'Aktif', 30, '2026-05-15 23:17:56', '2026-05-16 00:26:25'),
(3, 'RW 3', 'MATAHARI', 'Asdar', 'Cengkeh', 'Aktif', 12, '2026-05-15 23:18:23', '2026-05-15 23:18:23'),
(4, 'RW 1', 'PADI', 'Asdar', 'Cengkeh', 'Tidak Aktif', 12, '2026-05-15 23:18:54', '2026-05-15 23:18:54'),
(5, 'RW 3', 'NILAM', 'Asdar', 'Cengkeh', 'Aktif', 30, '2026-05-15 23:19:20', '2026-05-15 23:19:20'),
(6, 'RW 1', 'ANGGREK', 'Asdar', 'Cengkeh', 'Aktif', 12, '2026-05-15 23:19:50', '2026-05-15 23:19:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kemiskinan`
--

CREATE TABLE `kemiskinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL,
  `desil` varchar(255) NOT NULL,
  `jumlah_keluarga` int(11) NOT NULL,
  `jumlah_jiwa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kemiskinan`
--

INSERT INTO `kemiskinan` (`id`, `nama_kecamatan`, `desil`, `jumlah_keluarga`, `jumlah_jiwa`, `created_at`, `updated_at`) VALUES
(1, 'Wara', '1', 306, 1165, '2026-05-18 16:55:50', '2026-05-18 18:21:52'),
(2, 'Wara', '2', 362, 1325, '2026-05-18 16:56:28', '2026-05-18 16:56:28'),
(3, 'Wara', '3', 472, 1469, '2026-05-18 16:58:06', '2026-05-18 16:58:06'),
(4, 'Wara', '4', 425, 1313, '2026-05-18 16:58:28', '2026-05-18 16:58:28'),
(5, 'Wara', '5', 410, 1194, '2026-05-18 16:58:49', '2026-05-18 16:58:49'),
(6, 'Wara', '6-10', 1453, 4260, '2026-05-18 17:11:09', '2026-05-18 17:11:09'),
(7, 'Wara Timur', '2', 4555, 666, '2026-05-18 17:20:31', '2026-05-18 17:20:31'),
(8, 'Wara Timur', '1', 333, 555, '2026-05-18 17:20:46', '2026-05-18 17:20:46'),
(9, 'Wara Barat', '1', 447, 666, '2026-05-18 17:21:09', '2026-05-18 17:21:09'),
(10, 'Wara Utara', '1', 777, 999, '2026-05-18 17:21:54', '2026-05-18 17:21:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2026_05_15_140358_potensi', 1),
(3, '2026_05_16_013147_bansos', 2),
(4, '2026_05_16_053044_kelompoktani', 3),
(5, '2026_05_16_084408_penduduk', 4),
(6, '2026_05_18_153929_kemiskinan', 5),
(7, '2026_05_19_030215_create_penerimas_table', 6),
(8, '2026_05_19_124910_add_tahun_to_penerimas_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduks`
--

CREATE TABLE `penduduks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `jumlah_kk` int(11) NOT NULL,
  `laki_laki` int(11) NOT NULL,
  `perempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penduduks`
--

INSERT INTO `penduduks` (`id`, `jumlah_penduduk`, `jumlah_kk`, `laki_laki`, `perempuan`, `created_at`, `updated_at`) VALUES
(2, 1000, 12, 450, 550, '2026-05-16 02:05:14', '2026-05-16 02:07:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimas`
--

CREATE TABLE `penerimas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `jumlah_pkh` int(11) NOT NULL,
  `jumlah_bpnt` int(11) NOT NULL,
  `jumlah_keluarga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penerimas`
--

INSERT INTO `penerimas` (`id`, `tahun`, `kecamatan`, `kelurahan`, `jumlah_pkh`, `jumlah_bpnt`, `jumlah_keluarga`, `created_at`, `updated_at`) VALUES
(3, '2025', 'Wara', 'Battang Barat', 186, 152, 300, '2026-05-18 21:55:18', '2026-05-19 05:55:17'),
(4, '2025', 'Wara', 'Battang', 150, 160, 200, '2026-05-19 00:56:25', '2026-05-19 05:55:23'),
(5, '2025', 'Wara', 'Lebang', 130, 160, 200, '2026-05-19 05:00:19', '2026-05-19 05:55:30'),
(6, '2025', 'Wara', 'Padang Lambe', 256, 156, 300, '2026-05-19 05:01:17', '2026-05-19 05:55:37'),
(7, '2021', 'Mungkajang', 'Battang Barat', 123, 100, 200, '2026-05-19 06:10:05', '2026-05-19 06:10:05'),
(8, '2025', 'Wara Timur', 'Battang Barat', 190, 180, 200, '2026-05-19 07:44:57', '2026-05-19 07:44:57'),
(9, '2025', 'Bara', 'Battang', 90, 80, 250, '2026-05-19 07:45:24', '2026-05-19 07:45:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `potensis`
--

CREATE TABLE `potensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `lat_long` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `potensis`
--

INSERT INTO `potensis` (`id`, `nama`, `kategori`, `lokasi`, `lat_long`, `created_at`, `updated_at`) VALUES
(2, 'Sungai', 'Wisata', 'RW 2', '-2.961190,120.061100', '2026-05-15 18:07:00', '2026-05-15 18:20:42'),
(3, 'Lesehan Lela', 'UMKM', 'RW 1', '-2.963421,120.088917', '2026-05-15 18:08:20', '2026-05-15 18:08:20'),
(4, 'Lesehan asri', 'UMKM', 'RW 2', '-2.959307,120.074924', '2026-05-16 02:37:03', '2026-05-16 02:37:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$12$qlyNrodvxP7XvOfqFkqb4OZKF8htBq5F8uFztmgqmhaYxWHUb9Dmi', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bansos`
--
ALTER TABLE `bansos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelompoktani`
--
ALTER TABLE `kelompoktani`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kemiskinan`
--
ALTER TABLE `kemiskinan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerimas`
--
ALTER TABLE `penerimas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `potensis`
--
ALTER TABLE `potensis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bansos`
--
ALTER TABLE `bansos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `kelompoktani`
--
ALTER TABLE `kelompoktani`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kemiskinan`
--
ALTER TABLE `kemiskinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penerimas`
--
ALTER TABLE `penerimas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `potensis`
--
ALTER TABLE `potensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
