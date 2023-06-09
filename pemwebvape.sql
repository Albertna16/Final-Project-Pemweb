SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `pemwebvape` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pemwebvape`;

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `NAMA_ADMIN` varchar(255) DEFAULT NULL,
  `EMAIL_ADMIN` varchar(255) DEFAULT NULL,
  `USERNAME_ADMIN` varchar(255) DEFAULT NULL,
  `PASSWORD_ADMIN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `EMAIL_ADMIN`, `USERNAME_ADMIN`, `PASSWORD_ADMIN`) VALUES
(1, 'Juan', 'juanmata@gmail.com', 'juanmata', 'yagaga');

CREATE TABLE `product` (
  `ID_PRODUCT` int(11) NOT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `NAME_PRODUCT` varchar(255) DEFAULT NULL,
  `PRICE_PRODUCT` decimal(10,0) DEFAULT NULL,
  `KATEGORI_PRODUCT` varchar(255) DEFAULT NULL,
  `DESK_PRODUCT` varchar(512) DEFAULT NULL,
  `GAMBAR_PRODUCT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `product` (`ID_PRODUCT`, `ID_ADMIN`, `NAME_PRODUCT`, `PRICE_PRODUCT`, `KATEGORI_PRODUCT`, `DESK_PRODUCT`, `GAMBAR_PRODUCT`) VALUES
(1, NULL, 'tes1Update1', '90000', 'Atomizer','tes', '647eb3933946c.png'),
(2, NULL, 'tes2Update2', '20000', 'Mod','tes2', '647eb3a2db76d.jpeg'),
(3, NULL, 'tes3Update3', '90000', 'Baterai','tes3', '647eb3bd965d8.png');

CREATE TABLE `report` (
  `ID_REPORT` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `DESK_REPORT` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `report` (`ID_REPORT`, `ID_USER`, `DESK_REPORT`) VALUES
(1, 1, 'Sebagai seorang pengguna, saya ingin memberikan ulasan tentang website Vape yang saya temui. Website ini sangat informatif dan mudah digunakan bagi penggemar vaping seperti saya. Halaman utamanya memiliki tampilan yang menarik dengan navigasi yang jelas, memungkinkan saya untuk dengan mudah menemukan produk yang saya cari. Selain itu, terdapat juga informasi yang lengkap tentang berbagai jenis vape, aksesori, dan e-liquid yang tersedia'),
(2, 2, 'Sebagai seorang pengguna, saya ingin memberikan ulasan lain tentang website Vape yang saya telusuri. Website ini benar-benar menjadi sumber daya yang komprehensif bagi semua hal terkait vaping. Desainnya yang intuitif dan responsif membuat navigasi menjadi sangat mudah dan menyenangkan. Dari halaman produk hingga forum komunitas, semuanya tersedia di satu tempat yang terorganisir dengan baik. Selain itu, website ini juga menawarkan ulasan pengguna yang membantu saya dalam memilih produk yang tepat untuk kebutuhan saya. Fitur \"pembanding produk\" sangat berguna untuk membandingkan spesifikasi dan fitur dari berbagai merek dan model vape. Saya juga mengapresiasi adanya blog yang terus diperbarui dengan konten menarik tentang tren terbaru, keamanan, dan inovasi dalam dunia vaping. Secara keseluruhan, website Vape ini merupakan sumber informasi yang sangat berharga bagi pengguna seperti saya yang ingin menjelajahi dunia vaping dengan lebih baik.');

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `TANGGAL_TRANSAKSI` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `ID_USER`, `TANGGAL_TRANSAKSI`) VALUES
(1, 1, NOW());

CREATE TABLE `transaksi_item` (
  `ID` int(11) NOT NULL,
  `ID_TRANSAKSI` int(11) DEFAULT NULL,
  `ID_PRODUCT` int(11) DEFAULT NULL,
  `JUMLAH` decimal(10,0) DEFAULT NULL,
  `HARGA` decimal(8,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `transaksi_item` (`ID`, `ID_TRANSAKSI`, `ID_PRODUCT`, `JUMLAH`, `HARGA`) VALUES
(1, 1, 1, '3', (SELECT price_product FROM product WHERE id_product = 1)),
(2, 1, 2, '4', (SELECT price_product FROM product WHERE id_product = 2));

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

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `EMAIL_USER`, `USERNAME_USER`, `PASSWORD_USER`, `ADDRESS`, `NUMBER_PHONE`, `SALDO`) VALUES
(1, 'Lionel Messi', 'Messi10@gmail.com', 'lionelmessi', 'yayaya', 'Nganjuk', '0895366968783', '2500000'),
(2, 'Jordi Alba', 'alba17@gmail.com', 'jordialba', 'yeyeye', 'Banyuwangi', '0895366968782', '3400000');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_PRODUCT`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_ADMIN`);

ALTER TABLE `report`
  ADD PRIMARY KEY (`ID_REPORT`),
  ADD KEY `FK_RELATIONSHIP_8` (`ID_USER`);

ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_USER`);

ALTER TABLE `transaksi_item`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_TRANSAKSI`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_PRODUCT`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `product`
  MODIFY `ID_PRODUCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `report`
  MODIFY `ID_REPORT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `transaksi`
  MODIFY `ID_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `transaksi_item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `product`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

ALTER TABLE `report`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

ALTER TABLE `transaksi_item`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_TRANSAKSI`) REFERENCES `transaksi` (`ID_TRANSAKSI`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_PRODUCT`) REFERENCES `product` (`ID_PRODUCT`);
COMMIT;