-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2024 pada 08.54
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `order_id` varchar(255) NOT NULL,
  `user_id` int(9) NOT NULL,
  `total_harga` double NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `total_harga`, `status`) VALUES
('220240606042035', 2, 239000, 'selesai'),
('220240615182339', 2, 538000, 'menunggu'),
('720240606091849', 7, 957000, 'selesai'),
('720240615154531', 7, 239000, 'selesai'),
('720240616050440', 7, 239000, 'menunggu'),
('720240616050949', 7, 239000, 'menunggu'),
('720240616054742', 7, 867000, 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_item`
--

CREATE TABLE `order_item` (
  `order_id` varchar(255) NOT NULL,
  `product_id` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_item`
--

INSERT INTO `order_item` (`order_id`, `product_id`, `name`, `quantity`, `total_price`, `date`) VALUES
('220240606042035', 20, 'Studentic Totebag - Cream', 1, 239000, '2024-06-06'),
('720240606091849', 19, 'Studentic Bag - Navy', 1, 299000, '2024-06-06'),
('720240606091849', 21, 'Studentic Shoes - Black', 2, 658000, '2024-06-06'),
('720240615154531', 20, 'Studentic Totebag - Cream', 1, 239000, '2024-06-15'),
('220240615182339', 19, 'Studentic Bag - Navy', 1, 299000, '2024-06-15'),
('220240615182339', 20, 'Studentic Totebag - Cream', 1, 239000, '2024-06-15'),
('720240616050440', 20, 'Studentic Totebag - Cream', 1, 239000, '2024-06-16'),
('720240616050949', 20, 'Studentic Totebag - Cream', 1, 239000, '2024-06-16'),
('720240616054742', 19, 'Studentic Bag - Navy', 1, 299000, '2024-06-16'),
('720240616054742', 20, 'Studentic Totebag - Cream', 1, 239000, '2024-06-16'),
('720240616054742', 21, 'Studentic Shoes - Black', 1, 329000, '2024-06-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `name`, `image`, `price`, `quantity`, `product_description`) VALUES
(19, 'Studentic Bag - Navy', './img/tas_navy.png', 299000, 57, 'Tas terbaru kami dirancang khusus untuk pelajar yang aktif dan stylish. Dengan banyak ruang dan kompartemen, semua kebutuhan sekolahmu bisa tersimpan rapi. Yuk, tampil keren ke sekolah dengan tas baru ini!'),
(20, 'Studentic Totebag - Cream', './img/totebag_cream.png', 239000, 19, 'Siap menemanimu dari kelas pagi hingga kegiatan ekstrakurikuler, tas ini punya semua yang kamu butuhkan! Tangguh, nyaman, dan penuh gaya. Jadikan hari-harimu di sekolah lebih praktis dan menyenangkan.'),
(21, 'Studentic Shoes - Black', 'https://s2.bukalapak.com/uploads/content_attachments/22117/original/52476638_589995378140172_1499992991502174409_n.jpg', 329000, 9, 'Nyaman dan stylish, sepatu yang cocok untuk setiap pelajar berprestasi. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(9) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `address`, `jenis`) VALUES
(2, 'admin', 123, 'Jl. Sawo No. 09 Karangsari RT 01 RW 31 Kal. Wedomartani, Kapanewon Ngemplak Kab. Sleman. D.I. Yogyakarta', 'admin'),
(7, 'faiz', 123, 'MENDAK,  RT 002 RW 001 KELURAHAN PONJONG KECAMATAN KABUPATEN GUNUNGKIDUL PROVINSI DAERAH ISTIMEWA YOGYAKARTA', 'customer'),
(9, 'iman', 123, 'Jl. Sawo No. 09 Karangsari RT 01 RW 31 Kal. Wedomartani, Kapanewon Ngemplak Kab. Sleman. D.I. Yogyak', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_id_user` (`user_id`);

--
-- Indeks untuk tabel `order_item`
--
ALTER TABLE `order_item`
  ADD KEY `fk_product_id_order` (`product_id`),
  ADD KEY `fk_order_id` (`order_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_id_order` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
