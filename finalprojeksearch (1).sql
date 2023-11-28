-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2023 pada 18.44
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalprojeksearch`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `password`, `foto`) VALUES
(4, 'Maulana', 'admin3', '$2y$10$bwSFIG0wVm/oVn5D9wbf0.V6lO1KXEgtbioCdRwZ4IDmPObetMCPG', 'foto-65572ca405fd0.jpg'),
(5, 'santo', 'satu', '$2y$10$T1EhgqmZTajAc8EoubQnnetBOQgkdgNZb6UnhnebqMbSTB.E4yZaC', 'foto-655a2a08d50a1.png'),
(6, 'werto', 'dua', '$2y$10$F7DeKeKAk8ebDBdiPbMN6uZGdZ1gnwfzFvZgZTcvTgX3Y/esmobkG', 'foto-655a3007934e4.jpg'),
(7, 'obing', 'empat', '$2y$10$u6OBeBf0vKJxVKW774dJCeuyRHrN1HIX9zwsyVjNbEMzanLMi.G52', 'foto-655a354c247d4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bayar`
--

CREATE TABLE `jenis_bayar` (
  `id` int(11) NOT NULL,
  `jenis` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`id`, `jenis`) VALUES
(1, 'Transfer'),
(2, 'Cash'),
(6, 'M-banking');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bayars`
--

CREATE TABLE `jenis_bayars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id` int(11) NOT NULL,
  `merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `merks`
--

CREATE TABLE `merks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merk` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_06_202929_create_merks_table', 1),
(6, '2023_11_06_203333_create_mobils_table', 1),
(7, '2023_11_06_224451_create_pemesans_table', 1),
(8, '2023_11_06_224939_create_jenis_bayars_table', 1),
(9, '2023_11_07_002626_create_perjalanans_table', 1),
(10, '2023_11_07_005706_create_pesanans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `plat` varchar(10) NOT NULL,
  `kursi` int(1) NOT NULL,
  `tahun` int(4) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `merk_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `nama`, `warna`, `plat`, `kursi`, `tahun`, `gambar`, `merk_id`) VALUES
(1, 'innovs', 'hitam', 'rr 5675 re', 4, 2021, 'mobil.jpg', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobils`
--

CREATE TABLE `mobils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `warna` varchar(25) NOT NULL,
  `plat` varchar(10) NOT NULL,
  `kursi` tinyint(3) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `merk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE `pemesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `ktp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`id`, `nama`, `alamat`, `jk`, `ktp`) VALUES
(3, 'Muhammad', 'jl seribu da', 'L', 'storage/pemesan/01HF9SJ6G0SAQ65N6EWFN3KNYP.jpg'),
(4, 'malik', 'test', 'L', 'storage/pemesan/01HF9SNWS4E5Z1A3VDEMY9G4PJ.jpg'),
(5, 'Kaisar', 'jl muara angke no 45', 'L', 'storage/pemesan/01HF9XH2JE2E23RC8J2Z43KF3E.jpg'),
(9, 'Selmaet', 'jl tangerang 45', 'L', 'storage/pemesan/01HFSDG8KNXCMH001JHFA3GKA5.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesans`
--

CREATE TABLE `pemesans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemesans`
--

INSERT INTO `pemesans` (`id`, `nama`, `alamat`, `jenis_kelamin`, `ktp`, `created_at`, `updated_at`) VALUES
(2, 'Mukhlis', 'Jl tangsel no 42', 'L', 'storage/pemesan/01HF787M90Y488W1M7CR945Z1J.jpg', '2023-11-14 08:47:07', '2023-11-14 08:47:07'),
(3, 'Maulana', 'jl muara angke', 'L', 'storage/pemesan/01HF8N5Q211GV3YQ27VEPQGTJ3.jpg', '2023-11-14 21:52:30', '2023-11-14 21:52:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perjalanan`
--

CREATE TABLE `perjalanan` (
  `id` int(11) NOT NULL,
  `asal` varchar(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `jarak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perjalanan`
--

INSERT INTO `perjalanan` (`id`, `asal`, `tujuan`, `jarak`) VALUES
(2, 'pondok bahar', 'semarang', 100),
(5, 'pemalang', 'semarang', 300),
(7, 'Surabaya', 'magelang', 400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perjalanans`
--

CREATE TABLE `perjalanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asal` varchar(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `jarak` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perjalanans`
--

INSERT INTO `perjalanans` (`id`, `asal`, `tujuan`, `jarak`, `created_at`, `updated_at`) VALUES
(2, 'Mojokerto', 'semarang', 500.00, '2023-11-14 06:17:38', '2023-11-14 06:17:38');

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
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `pemesan_id` int(11) DEFAULT NULL,
  `jenis_bayar_id` int(11) DEFAULT NULL,
  `mobil_id` int(11) DEFAULT NULL,
  `perjalanan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `harga`, `tgl_pinjam`, `tgl_kembali`, `pemesan_id`, `jenis_bayar_id`, `mobil_id`, `perjalanan_id`) VALUES
(12, 400000, '2023-11-19', '2023-11-21', 5, 1, 18, 2),
(15, 8000, '2023-11-16', '2023-11-24', 3, 1, 18, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_merk`
--

CREATE TABLE `tbl_merk` (
  `id` int(11) NOT NULL,
  `merk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_merk`
--

INSERT INTO `tbl_merk` (`id`, `merk`) VALUES
(13, 'Suzukiert'),
(14, 'Daihatsu'),
(18, 'Ford'),
(19, 'chevrolet'),
(20, 'Ferrari'),
(21, 'Toyota'),
(25, 'Aventador');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `no_polisi` varchar(10) DEFAULT NULL,
  `jumlah_kursi` int(1) DEFAULT NULL,
  `tahun_beli` int(4) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_merk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id`, `nama`, `warna`, `no_polisi`, `jumlah_kursi`, `tahun_beli`, `gambar`, `id_merk`) VALUES
(18, 'Ford 23', 'Hitam', 'RR 2313 WE', 4, 2021, 'foto-18.jpg', 14),
(19, 'Lamborgini', 'abu abu', 'R 9387 TR', 4, 2021, 'foto-19.jpg', 19),
(20, 'Civic', 'putih', 'RR 2034 QW', 4, 2021, 'foto-20.jpg', 14),
(23, 'Xenia', 'Hitam', 'RR 2034 RT', 4, 2021, 'foto-23.jpg', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_bayars`
--
ALTER TABLE `jenis_bayars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merks`
--
ALTER TABLE `merks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mobils_merk_id_foreign` (`merk_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesans`
--
ALTER TABLE `pemesans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perjalanan`
--
ALTER TABLE `perjalanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perjalanans`
--
ALTER TABLE `perjalanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pesanan_pemesan` (`pemesan_id`),
  ADD KEY `fk_pesanan_perjalanan` (`perjalanan_id`),
  ADD KEY `fk_pesanan_jenis_bayar` (`jenis_bayar_id`),
  ADD KEY `fk_pesanan_tbl_mobil` (`mobil_id`);

--
-- Indeks untuk tabel `tbl_merk`
--
ALTER TABLE `tbl_merk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_mobil_ibfk_2` (`id_merk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis_bayars`
--
ALTER TABLE `jenis_bayars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `merks`
--
ALTER TABLE `merks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mobils`
--
ALTER TABLE `mobils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pemesans`
--
ALTER TABLE `pemesans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `perjalanan`
--
ALTER TABLE `perjalanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `perjalanans`
--
ALTER TABLE `perjalanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_merk`
--
ALTER TABLE `tbl_merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mobils`
--
ALTER TABLE `mobils`
  ADD CONSTRAINT `mobils_merk_id_foreign` FOREIGN KEY (`merk_id`) REFERENCES `merks` (`id`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan_jenis_bayar` FOREIGN KEY (`jenis_bayar_id`) REFERENCES `jenis_bayar` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pesanan_pemesan` FOREIGN KEY (`pemesan_id`) REFERENCES `pemesan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pesanan_perjalanan` FOREIGN KEY (`perjalanan_id`) REFERENCES `perjalanan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pesanan_tbl_mobil` FOREIGN KEY (`mobil_id`) REFERENCES `tbl_mobil` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD CONSTRAINT `tbl_mobil_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `tbl_merk` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
