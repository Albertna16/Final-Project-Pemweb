-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2023 pada 05.22
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

create database pemwebvape;
use pemwebvape;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemwebvape`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `NAMA_ADMIN` varchar(255) DEFAULT NULL,
  `EMAIL_ADMIN` varchar(255) DEFAULT NULL,
  `USERNAME_ADMIN` varchar(255) DEFAULT NULL,
  `PASSWORD_ADMIN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into admin (id_admin, nama_admin, email_admin, username_admin, password_admin) values (1, 'Albert', 'albertna16@gmail.com', 'alberttnaa', 'yagaga');
-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `ID_PRODUCT` int(11) NOT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `NAME_PRODUCT` varchar(255) DEFAULT NULL,
  `PRICE_PRODUCT` decimal(10,0) DEFAULT NULL,
  `DESK_PRODUCT` varchar(512) DEFAULT NULL,
  `GAMBAR_PRODUCT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `TANGGAL_TRANSAKSI` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

insert into transaksi (id_transaksi, id_user, tanggal_transaksi) values (1, 1, NOW());

--
-- Struktur dari tabel `transaksi_item`
--

CREATE TABLE `transaksi_item` (
  `ID` int(11) NOT NULL,
  `ID_TRANSAKSI` int(11) DEFAULT NULL,
  `ID_PRODUCT` int(11) DEFAULT NULL,
  `JUMLAH` decimal(10,0) DEFAULT NULL,
  `HARGA` decimal(8,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

INSERT INTO transaksi_item (id, id_transaksi, id_product, jumlah, harga)
VALUES (1, 1, 1, 3, (SELECT price_product FROM product WHERE id_product = 1));

INSERT INTO transaksi_item (id, id_transaksi, id_product, jumlah, harga)
VALUES (2, 1, 2, 4, (SELECT price_product FROM product WHERE id_product = 2));

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NAMA_USER` varchar(255) DEFAULT NULL,
  `EMAIL_USER` varchar(255) DEFAULT NULL,
  `USERNAME_USER` varchar(255) DEFAULT NULL,
  `PASSWORD_USER` varchar(255) DEFAULT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL,
  `NUMBER_PHONE` varchar(255) DEFAULT NULL,
  `SALDO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into user (id_user, nama_user, email_user, username_user, password_user, address, number_phone, saldo) values (1, 'Albert', 'albertna16@gmail.com', 'alberttnaa', 'yayaya', 'Mojokerto', '0895366968783', '250000');
insert into user (id_user, nama_user, email_user, username_user, password_user, address, number_phone, saldo) values (2, 'Putri', 'putrina16@gmail.com', 'putrinaac', 'yeyeye', 'Blora', '0895366968782', '340000');

DROP TABLE REPORT;

CREATE TABLE `report` (
  `ID_REPORT` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `DESK_REPORT` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `report`
  ADD PRIMARY KEY (`ID_REPORT`);

ALTER TABLE `report`
  MODIFY `ID_REPORT` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `report`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

insert into report (id_report, id_user, desk_report) values (1, 1, 'Sebagai seorang pengguna, saya ingin memberikan ulasan tentang website Vape yang saya temui. Website ini sangat informatif dan mudah digunakan bagi penggemar vaping seperti saya. Halaman utamanya memiliki tampilan yang menarik dengan navigasi yang jelas, memungkinkan saya untuk dengan mudah menemukan produk yang saya cari. Selain itu, terdapat juga informasi yang lengkap tentang berbagai jenis vape, aksesori, dan e-liquid yang tersedia');
insert into report (id_report, id_user, desk_report) values (2, 2, 'Sebagai seorang pengguna, saya ingin memberikan ulasan lain tentang website Vape yang saya telusuri. Website ini benar-benar menjadi sumber daya yang komprehensif bagi semua hal terkait vaping. Desainnya yang intuitif dan responsif membuat navigasi menjadi sangat mudah dan menyenangkan. Dari halaman produk hingga forum komunitas, semuanya tersedia di satu tempat yang terorganisir dengan baik. Selain itu, website ini juga menawarkan ulasan pengguna yang membantu saya dalam memilih produk yang tepat untuk kebutuhan saya. Fitur "pembanding produk" sangat berguna untuk membandingkan spesifikasi dan fitur dari berbagai merek dan model vape. Saya juga mengapresiasi adanya blog yang terus diperbarui dengan konten menarik tentang tren terbaru, keamanan, dan inovasi dalam dunia vaping. Secara keseluruhan, website Vape ini merupakan sumber informasi yang sangat berharga bagi pengguna seperti saya yang ingin menjelajahi dunia vaping dengan lebih baik.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_PRODUCT`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_ADMIN`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_USER`);

--
-- Indeks untuk tabel `transaksi_item`
--
ALTER TABLE `transaksi_item`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_TRANSAKSI`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_PRODUCT`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `ID_PRODUCT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_item`
--
ALTER TABLE `transaksi_item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Ketidakleluasaan untuk tabel `transaksi_item`
--
ALTER TABLE `transaksi_item`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_TRANSAKSI`) REFERENCES `transaksi` (`ID_TRANSAKSI`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_PRODUCT`) REFERENCES `product` (`ID_PRODUCT`);
COMMIT;


SELECT transaksi_item.ID, user.NAMA_USER, product.NAME_PRODUCT, transaksi_item.JUMLAH, transaksi_item.HARGA, transaksi.tanggal_transaksi
          FROM transaksi_item
          INNER JOIN transaksi ON transaksi_item.id_transaksi = transaksi.id_transaksi
          INNER JOIN user ON transaksi.id_user = user.id_user
          INNER JOIN product ON transaksi_item.id_product = product.id_product;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;