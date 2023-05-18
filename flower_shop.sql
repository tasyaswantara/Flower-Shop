-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2023 pada 12.07
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota_kabupaten` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `kodepos` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id`, `id_user`, `provinsi`, `kota_kabupaten`, `kelurahan`, `kecamatan`, `alamat_lengkap`, `kodepos`) VALUES
(22, 2, 'Jawa Timur', 'Malang', 'Madyopuro', 'Kedung Kandang', 'BTU UJ 29/23', '65138'),
(23, 2, 'Jawa Timur', 'Malang', 'Madyopuro', 'Kedung Kandang', 'BTU UJ 29/23', '65138'),
(24, 2, 'Jawa Tengah', 'Malang', 'Madyopuro', 'Kedung Kandang', 'BTU UJ 29/23', '65138'),
(25, 2, 'Jawa Tengah', 'Malang', 'Madyopuroooo', 'Kedung Kandang', 'BTU UJ 29/23', '65138'),
(26, 2, 'Jawa Barat', 'Malang', 'Madyopuroooo', 'Kedung Kandang', 'BTU UJ 29/23', '65138'),
(27, 2, 'Jawa Barat', 'Malang', 'Madyopuroooo', 'Kedung Kandang', 'BTU UJ 29/23', '65138'),
(28, 2, 'Jawa Tengah', 'Malang', 'Madyopuroooo', 'Kedung Kandang', 'BTU UJ 29/23', '65138'),
(29, 2, 'Jawa Tengah', 'Malang', 'Madyopuroooo', 'Kedung Kandang', 'BTU UJ 29/23', '4764747'),
(30, 2, 'Jawa Timur', 'Malang', 'Madyopuro', 'Kedung Kandang', 'BTU UJ 29/23', '65156'),
(31, 2, 'Jawa Timur', 'Malang', 'Madyopuro', 'Kedung Kandang', 'BTU UJ 29/23', '65156'),
(32, 2, 'Jawa Timur', 'Malang', 'Madyopuroooo', 'Kedung Kandang', 'BTU UJ 29/23', '65138'),
(33, 4, 'Jawa Tengah', 'Semarang', 'Tegalsari', 'Candisari', 'Jalan Candisari no 54', '50614'),
(34, 4, 'Jawa Timur', 'Malang', 'Madyopuro', 'Kedung Kandang', 'BTU UJ 29/23', '65138'),
(35, 5, 'Jawa Barat', 'Bandung', 'Bandung sari', 'Bandung', 'Dekat masjid', '65158'),
(36, 2, 'Jawa Timur', 'Malang', 'Madyopuro', 'Kedung Kandang', 'BTU UJ 29/23', '65138');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_pesanan`
--

CREATE TABLE `item_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `item_pesanan`
--

INSERT INTO `item_pesanan` (`id`, `id_pesanan`, `id_produk`, `harga`, `jumlah`) VALUES
(11, 53, 1, 100000, 1),
(12, 53, 2, 200000, 2),
(13, 54, 1, 100000, 2),
(14, 55, 2, 200000, 3),
(15, 56, 1, 100000, 2),
(16, 57, 1, 100000, 5),
(17, 58, 1, 100000, 1),
(18, 58, 2, 220000, 5),
(19, 59, 3, 250000, 3),
(20, 60, 1, 100000, 6),
(21, 60, 2, 220000, 12),
(22, 60, 3, 250000, 3),
(23, 61, 1, 120000, 10),
(24, 61, 2, 220000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `provinsi` varchar(225) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `provinsi`, `tarif`) VALUES
(1, 'Jawa Timur', 15000),
(2, 'Jawa Tengah', 25000),
(3, 'Jawa Barat', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `id_alamat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `total_harga`, `tanggal_pesanan`, `id_alamat`) VALUES
(53, 2, 515000, '2023-02-09', 22),
(54, 2, 225000, '2023-02-09', 29),
(55, 2, 615000, '2023-02-09', 30),
(56, 2, 215000, '2023-02-10', 31),
(57, 2, 515000, '2023-02-10', 32),
(58, 4, 1225000, '2023-02-10', 33),
(59, 4, 765000, '2023-02-10', 34),
(60, 5, 4020000, '2023-02-10', 35),
(61, 2, 1875000, '2023-02-10', 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(1, 'Anemone Flower', 120000, 100, 'anemone.jpg', 'Anemon adalah genus tanaman berbunga dalam keluarga buttercup Ranunculaceae. Tumbuhan dari genus ini biasa disebut windflowers. Mereka berasal dari daerah beriklim sedang dan subtropis di semua benua kecuali Australia, Selandia Baru, dan Antartika.', 90),
(2, 'Red Rose', 220000, 100, 'mawar.jpg', 'Mawar atau ros adalah tumbuhan perdu, pohonnya berduri, bunganya berbau wangi dan berwarna indah, terdiri atas daun bunga yang bersusun; meliputi ratusan jenis, tumbuh tegak atau memanjat, batangnya berduri, bunganya beraneka warna, seperti merah, putih, merah jambu, merah tua, dan berbau harum.', 97),
(3, 'White Lily', 250000, 100, 'lily.jpg', 'Madonna lily atau white lily, adalah tanaman dalam keluarga lily sejati. Ini berasal dari Balkan dan Timur Tengah, dan dinaturalisasi di bagian lain Eropa, termasuk Prancis, Italia, dan Ukraina, dan di Afrika Utara, Kepulauan Canary, Meksiko, dan wilayah lainnya. ', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Natasya', 'tasya', '123', 'admin'),
(2, 'Verensilia', 'veren', '123', 'user'),
(3, 'Ambar Swantara', 'ambar', '12345', 'admin'),
(4, 'Dwi Purba Swantara', 'purba', '123', 'user'),
(5, 'Verensilia Apristi', 'verenn', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_key` (`id_user`);

--
-- Indeks untuk tabel `item_pesanan`
--
ALTER TABLE `item_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_pesanan_id_pesanan_key` (`id_pesanan`),
  ADD KEY `item_pesanan_id_produk_key` (`id_produk`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id_alamat_key` (`id_alamat`),
  ADD KEY `pesanan_id_user_key` (`id_user`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `item_pesanan`
--
ALTER TABLE `item_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `item_pesanan`
--
ALTER TABLE `item_pesanan`
  ADD CONSTRAINT `item_pesanan_id_pesanan_key` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `item_pesanan_id_produk_key` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
