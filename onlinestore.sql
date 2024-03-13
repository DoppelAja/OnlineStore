-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2024 pada 22.43
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Doppel', '$2y$10$btcnXqXTOo4MPFjLKy/0LOSixCelvrIpwwVZZ9TwgKSyIB0ZdlOfy'),
(2, 'Adley128', '$2y$10$cMqd6TOJsc7Dr6vZDrUTMOAWryWzl.fW4dsUlgSTyMZzNJzgnMvLO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ID` int(11) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Harga` double NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ID`, `Kategori`, `Nama`, `Harga`, `Foto`, `Stok`) VALUES
(1, 'Baju Pria', 'Long Sleeves Shirt Redbiz', 215000, 'longsleeves.jpeg', 10),
(3, 'Baju Pria', 'No Sleeves T-Shirt', 85000, '65e410def17e9.jpeg', 10),
(23, 'Baju Pria', 'Formal Shirt OfficeMan', 330000, '65e410693e176.jpeg', 50),
(25, 'Baju Wanita', 'Linen Shirt Classy Woman', 450000, '65e461300db92.jpeg', 100),
(29, 'Background', 'Pweb', 100000, '65eb344106237.jpg', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'adley28', '$2y$10$UkpnURTx/Wx4pbqOriq72.RaB5bDy38q2r3ig8xCdxD1OYIeLwdie'),
(2, 'doppel', '$2y$10$4ua6ZWIHC9hOAw02FGZ.b.DiFQpQHJ4kAijsw7EepoaBVZyqpC1Ri'),
(3, 'juki', '$2y$10$Bz7t9r/RawC133brRKs7Oekndv4.rpNqVa7x/iTOMd4/RLTtmDtc2'),
(4, 'upi', '$2y$10$DDB7ipU9zgZNEf7KZAix2u/Su2tvqngUrfSQZDVuREeK5goDiC55m');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
