-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2025 pada 15.34
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
-- Database: `kora_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `pesan`, `tanggal`) VALUES
(1, 'Admin', 'salmandwikiseptiyan@gmail.com', '', '2025-05-05 20:28:51'),
(2, 'Admin', 'test@gmail.com', '', '2025-05-06 20:42:22'),
(3, 'Admin', 'test@gmail.com', '', '2025-05-06 20:51:46'),
(4, 'Admin', 'test@gmail.com', 'testtttttt mau pesen', '2025-05-06 20:54:03'),
(5, 'Salman_Dev', 'salmandwikiseptiyan@gmail.com', 'Test admin dashbord', '2025-05-08 21:31:59'),
(6, 'Salman_Dev', 'salmandwikiseptiyan@gmail.com', 'test ga jadi ngerapiin', '2025-05-08 22:33:35'),
(7, 'Salman_Dev', 'salmandwikis@gmail.com', 'Test finallll DL mepet alhamdulilah selesai', '2025-05-13 18:33:26'),
(8, 'Salman_Dev', 'salmandwikiseptiyan@gmail.com', 'Test finallll DL mepet alhamdulilah selesai', '2025-05-14 10:57:55'),
(9, 'Rakha', 'asdf@asdf', 'Fix error yang ngk guna + responsif buat hp', '2025-06-03 20:39:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `stok` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `gambar`, `deskripsi`, `created_at`, `stok`, `jenis`) VALUES
(3, 'Kopi Tarik Susu', 12000, 'kts.jpg', 'KTS', '2025-05-12 15:30:47', 10, 'Minuman'),
(4, 'Mix Platter', 15000, 'mix.jpg', 'Mix Max', '2025-05-13 16:05:48', 12, 'Makanan'),
(6, 'Milo Pejabat', 12000, 'milopejabat.jpg', 'Milo Spek Pejabat Harga Merakyat', '2025-05-14 16:03:33', 15, 'Minuman'),
(7, 'Roti Bakar', 10000, 'roti.jpg', 'Roti Bakar tapi di goreng', '2025-05-14 16:21:08', 11, 'Makanan'),
(8, 'anomali versi makan', 99999, 'WhatsApp Image 2024-11-20 at 07.52.19_24b2caea.jpg', 'test sort ', '2025-05-14 16:30:17', 1, 'Makanan'),
(9, 'anomali versi minum', 99999, 'WhatsApp Image 2024-09-22 at 19.40.54_73e82aeb.jpg', 'test sort ', '2025-05-14 16:31:35', 1, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `frisName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `no_telpon` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_picture` varchar(300) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `frisName`, `lastName`, `no_telpon`, `email`, `password`, `profile_picture`, `role`) VALUES
(1, 'admin', 'admin1', '0', 'salmandwikiseptiyan@gmail.com', '0192023a7bbd73250516f069df18b500', 'uploads/profile_1.jpg', 'admin'),
(10, 'Salman', 'user', '085800658548', 'salmandwikis@gmail.com', '202cb962ac59075b964b07152d234b70', 'uploads/profile_10.jpg', 'user'),
(11, 'Ren', 'Dyzt', '088803954887', 'raihanadityap01@gmail.com', 'df94a9007bdcdca20b15db850a80e572', 'uploads/profile_11.jpg', 'user'),
(12, 'pw =', 'asdf', '123456789098765432', 'asdf@asdf', '912ec803b2ce49e4a541068d495ab570', 'uploads/profile_12.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
