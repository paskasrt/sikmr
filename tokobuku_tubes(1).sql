-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2015 at 09:09 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tokobuku_tubes`
--
CREATE DATABASE IF NOT EXISTS `tokobuku_tubes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tokobuku_tubes`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `idbarang` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `idkategori` int(20) NOT NULL,
  `sinopsis` varchar(1000) NOT NULL,
  `file_gambar` varchar(100) NOT NULL,
  `tampil` varchar(300) NOT NULL,
  `harga` int(255) NOT NULL,
  `berat` int(255) NOT NULL,
  `stok` int(255) NOT NULL,
  `tgl_insert` date NOT NULL,
  `tgl_update` date NOT NULL,
  PRIMARY KEY (`idbarang`),
  KEY `idkategori` (`idkategori`),
  KEY `idkategori_2` (`idkategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `nama`, `idkategori`, `sinopsis`, `file_gambar`, `tampil`, `harga`, `berat`, `stok`, `tgl_insert`, `tgl_update`) VALUES
(1, 'Face Love', 100, 'Riyanti begitu menggebu-gebu saat janjian kopi darat dengan Robin, gebetannya di Facebook. Walaupun belum tahu sosok Robin sebenarnya, Riyanti yakin sekali mereka pasangan yang cocok. Tetapi, karena suatu kesalahpahaman yang rumit, ia malah tersasar di rumah Juan, duda beranak satu yang dingin dan arogan, serta dipaksa bekerja sebagai pengasuh.\r\n\r\nRobin yang ingin menebus kesalahannya berusaha keras menemui Riyanti, meski kerap dihalangi Juan. Setelah berkencan beberapa kali, Robin semakin mantap ingin menikahi Riyanti. Robin bahkan sudah menyiapkan rumah mungil untuk mereka.\r\n\r\nBayangan indahnya pernikahan dan lepas dari tekanan orangtua, jelas membuat Riyanti tergoda. Siapa sangka, dari Facebook jadi Facelove! Namun, ketika Juan mengungkapkan perasaan cintanya, Riyanti merasa dunianya jungkir-balik.', 'facelove.jpg', '', 55000, 5, 10, '2014-12-18', '2014-12-18'),
(2, 'Moon Heart', 101, 'Luna adalah gadis yatim piatu yang berjuang meneruskan usaha katering ibunya agar ia dan adiknya dapat melanjutkan kuliah. Pada malam pesta keluarga konglomerat, ia menemukan cincin bergraver inisial “R.H” di dasar panci sup kepunyaan kateringnya. Karena tak ada orang yang mengaku sebagai pemilik cincin, Luna memutuskan untuk menyimpan cincin tersebut.\r\n\r\nKeanehan malam itu tidak berhenti di peristiwa itu saja. Bisnis Luna diterpa masalah besar saat Obbie, putra keluarga konglomerat itu, menderita alergi karena makanan kateringnya. Ia terancam digugat dan reputasi bisnis mereka akan hancur.\r\n\r\nLuna berusaha keras memperbaiki keadaan, tapi kejadian demi kejadian membuatnya terjebak dalam labirin yang membingungkan. Apalagi, Obbie yang tampan pelan-pelan mencuri hatinya. Padahal Obbie sudah punya calon istri seorang selebriti terkenal. Walau tahu Obbie mungkin cuma mempermainkan perasaannya, tapi Luna tidak bisa berhenti berharap Obbie juga menyukainya.', 'moonheart.jpg', '', 50000, 5, 6, '2014-12-18', '2014-12-18'),
(3, 'painting of pains', 101, 'Nadia nyaris gila ketika ibunya melarang hubungannya dengan Ray, dengan alasan bahwa pria yang amat dicintainya itu ternyata kakak tirinya! Ia tak menyangka bahwa selama ini ia dicekoki kebohongan demi kebohongan oleh sang ibu.\r\n\r\nMeski berat, Nadia berusaha mengendalikan diri agar tak terjebak dalam cinta terlarang. Membendung perasaannya kuat-kuat.\r\n\r\nTapi bagaimana caranya menghapus perasaan yang begitu dalam?\r\n\r\nMampukah Nadia berdamai dengan segala kepahitan dalam hidupnya dan menemukan cinta yang menggantikan segala hal manis yang direnggut darinya?', 'paintingofpains.jpg', '', 53000, 5, 8, '2014-12-18', '2014-12-18'),
(4, 'somewhere in paris', 100, 'Dunia Cecilia Rodin jungkir-balik ketika ia mengalami kecelakaan di kota Paris. Selain merenggut sahabatnya, peristiwa itu juga membuat Cecilia kehilangan sebagian memori di otaknya.\r\n\r\nDengan gamang ia mencoba melanjutkan hidup di Marseille, berusaha mengingat kenangan menyakitkan yang muncul satu per satu, termasuk ingatan tentang Ethel Black, sosok yang diingat Cecilia harus ditemuinya di Kilometer Nol, Paris, tepat sebelum kecelakaan itu. Sosok yang diyakininya sebagai cinta pertamanya.\r\n\r\nNamun, dr. Fernand-Joseph Carlotti yang teramat setia merawat, mendukung, kemudian mencintainya, membuat Cecilia terombang-ambing. Terlebih saat ia menemukan kotak musik di loteng rumahnya di Bandung yang menyimpan petunjuk dari serangkaian misteri. Dan ketika kotak Pandora menguakkan kebenaran, siapakah yang layak Cecilia cintai?', 'somewherinparis.jpg', '', 63000, 5, 3, '2014-12-18', '2014-12-18'),
(5, 'yozakura', 101, 'Sakura season this year will be the most beautiful. Do you know why? Because probably it’s my last time seeing them…\r\n\r\nNila dan Akane, dua perempuan dari budaya dan bahasa berbeda. Semesta menjadikan mereka sahabat, dan jarak serta status sepertinya malah mendekatkan mereka. Namun sahabat terdekat sekalipun kadang masih menyimpan rahasia...\r\n\r\nKetika Akane divonis mengidap kanker, hidup dua sahabat itu pun berubah. Bagaimanapun, entah Akane akan menjadi seorang penyintas atau kalah dalam pertarungan melawan penyakitnya, mereka berdua bertekad: apa pun tak boleh merusak persahabatan mereka. Tidak juga rahasia.\r\n\r\nNamun seperti ungkapan mono no aware, segala sesuatu di dunia ini hanya sementara, Akane dan Nila harus berusaha menggapai bahagia... selagi bisa.', 'yozakura.jpg', '', 70000, 5, 3, '2014-12-18', '2014-12-18'),
(6, 'Bulan Terbelah di Langit Amerika', 101, 'Semua orang berbondong-bondong membenturkan mereka. Mengakibatkan banyak korban berjatuhan; saling curiga, saling tuding, dan menyudutkan banyak pihak.\r\n\r\nIni adalah kisah perjalanan spiritual di balik malapetaka yang mengguncang kemanusiaan. Kisah yang diminta rembulan kepada Tuhan. Kisah yang disaksikan bulan dan dia menginginkan Tuhan membelah dirinya sekali lagi sebagai keajaiban.\r\n\r\nNamun, bulan punya pendirian. Ini untuk terakhir kalinya. Selanjutnya, jika dia bersujud kepada Tuhan agar dibelah lagi, itu bukan untuk keajaiban, melainkan agar dirinya berhenti menyaksikan pertikaian antarmanusia di dunia.', 'Bulan Terbelah di Langit Amerika.jpg', '', 75000, 5, 10, '2014-12-24', '2014-12-24'),
(7, 'Flambe', 100, 'Ini adalah kisah tentang perempuan dalam merayakan pahit-manis hidup dan cinta yang selalu berkobar-kobar seperti api dalam hidangan ala Flambé.\r\n\r\nLangit adalah single mom dengan seorang anak perempuan. Setelah bercerai, ia menjalin hubungan dengan Frey lalu bersama-sama mereka membuka Kafe Kuali. Namun, kenyamanan hidup ternyata membuat Langit berpaling pada perempuan lain. Akankah hubungannya dengan Frey yang sudah terjalin selama delapan tahun bubar begitu saja?', 'Flambe.jpg', '', 60000, 5, 10, '2014-12-24', '2014-12-24'),
(8, 'Summer in Seoul', 101, 'Awalnya Jung Tae-Woo tidak curiga kenapa Sandy langsung menerima tawarannya. Sementara Sandy hanya bisa berharap ia tidak akan menyesali keputusannya terlibat dengan Jung Tae-Woo. Hari-hari musim panas sebagai "kekasih" Jung Tae-Woo dimulai. Perubahan rasa itu pun ada. Namun keduanya tidak menyadari kebenaran kisah empat tahun lalu sedang mengejar mereka.', 'Summer in Seoul.jpg', '', 56000, 3, 19, '2014-12-24', '2014-12-24'),
(9, 'Spring in London', 101, 'Astaga, ia---Danny Jo---adalah orang yang baik. Sungguh! Ia selalu bersikap ramah, sopan, dan menyenangkan. Lalu kenapa Naomi Ishida menjauhinya seperti wabah penyakit? Bagaimana mereka bisa bekerja sama dalam pembuatan video musik ini kalau gadis itu tidak mengacuhkannya setiap saat? Kesalahan apa yang sudah dia lakukan?\r\n\r\nBagaimanapun juga Danny bukan orang yang gampang menyerah. Ia akan mencoba mendekati Naomi untuk mencari tahu alasan gadis itu memusuhinya.', 'Spring in London.jpg', '', 47000, 3, 17, '2014-12-24', '2014-12-24'),
(10, 'Winter in Tokyo', 101, 'Tetangga baruku, Nishimura Kazuto, datang ke Tokyo untuk mencari suasana baru. Itulah katanya, tapi menurutku alasannya lebih dari itu. Dia orang yang baik, menyenangkan, dan bisa diandalkan. Perlahan-lahan—mungkin sejak Malam Natal itu—aku mulai memandangnya dengan cara yang berbeda. Dan sejak itu pula rasanya sulit membayangkan hidup tanpa dia.\r\n— Keiko tentang Kazuto', 'Winter in Tokyo.jpg', '', 60000, 2, 15, '2014-12-24', '2014-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `idpenjualan` int(20) NOT NULL,
  `idbarang` int(20) NOT NULL,
  `qty` int(255) NOT NULL,
  `harga_perqty` int(255) NOT NULL,
  KEY `idpenjualan` (`idpenjualan`),
  KEY `idbarang` (`idbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`idpenjualan`, `idbarang`, `qty`, `harga_perqty`) VALUES
(1, 2, 2, 100000),
(1, 3, 1, 53000),
(2, 2, 1, 50000),
(2, 3, 1, 53000),
(3, 1, 1, 55000),
(3, 3, 5, 265000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `idkategori` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(300) NOT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama`) VALUES
(100, 'Teenlit'),
(101, 'Metropop'),
(102, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `konfirm_pembayaran`
--

CREATE TABLE IF NOT EXISTS `konfirm_pembayaran` (
  `idpenjualan` int(20) NOT NULL,
  `nama_bank` varchar(40) NOT NULL,
  `no_rekening` int(100) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `total_bayar` int(255) NOT NULL,
  `tgl_bayar` date NOT NULL,
  PRIMARY KEY (`idpenjualan`),
  KEY `idpenjualan` (`idpenjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirm_pembayaran`
--

INSERT INTO `konfirm_pembayaran` (`idpenjualan`, `nama_bank`, `no_rekening`, `nama`, `total_bayar`, `tgl_bayar`) VALUES
(1, 'BRI', 162176371, 'Hanna Theresia P', 153000, '2015-01-14'),
(2, 'BRI', 162176371, 'Hanna Theresia P', 103000, '2015-01-14'),
(3, 'BRI', 162176371, 'Hanna Theresia P', 103000, '2015-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `idkota` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `idprovinsi` int(20) NOT NULL,
  PRIMARY KEY (`idkota`),
  KEY `idkota` (`idkota`),
  KEY `idprovinsi` (`idprovinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=207 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`idkota`, `nama`, `idprovinsi`) VALUES
(200, 'Semarang', 301),
(201, 'Surabaya', 302),
(202, 'Bandung', 300),
(203, 'Jakarta', 303),
(204, 'Purwokerto', 301),
(205, 'Solo', 301),
(206, 'Yogyakarta', 304);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `idpelanggan` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(300) NOT NULL,
  `password` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `idkota` int(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  PRIMARY KEY (`idpelanggan`),
  KEY `idkota` (`idkota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=603 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `nama`, `password`, `jenis_kelamin`, `alamat`, `idkota`, `email`, `no_tlp`) VALUES
(600, 'Hanna Theresia', 'hannathere', 'perempuan', 'banjarsari 15 Semarang', 200, 'hannathere@gmail.com', '0812345678'),
(601, 'Qoriah F', 'qoriahf', 'perempuan', 'banjarsari 16 Semarang', 200, 'qoriahf@gmail.com', '082147483647'),
(602, 'Rikcat', 'rikcatalay', 'pria', 'kolong jembatan', 200, 'rikcatalay@gmail.com', '089911199911');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `idpenjualan` int(20) NOT NULL AUTO_INCREMENT,
  `idpelanggan` int(20) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total_harga` int(255) NOT NULL,
  `total_item` int(255) NOT NULL,
  `total_berat` int(255) NOT NULL,
  `nama_kirim` varchar(30) NOT NULL,
  `alamat kirim` varchar(300) NOT NULL,
  `idkota_kirim` int(20) NOT NULL,
  `status_penjualan` varchar(20) NOT NULL,
  `kode_unik` varchar(20) NOT NULL,
  PRIMARY KEY (`idpenjualan`),
  KEY `idpenjualan` (`idpenjualan`),
  KEY `idpelanggan` (`idpelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idpenjualan`, `idpelanggan`, `tgl_penjualan`, `total_harga`, `total_item`, `total_berat`, `nama_kirim`, `alamat kirim`, `idkota_kirim`, `status_penjualan`, `kode_unik`) VALUES
(1, 600, '2015-01-14', 153000, 3, 0, 'Cut Fauziah Nur', 'Sirajudin 15', 0, 'Paid', 'RPT67'),
(2, 600, '2015-01-14', 103000, 2, 0, 'Rikcat K', 'Sirajudin 16', 0, 'Paid', 'QSA0I'),
(3, 600, '2015-01-14', 320000, 6, 0, 'Qoriah', 'Sirajudin 17', 0, 'Paid', '39QIK');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `idprovinsi` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`idprovinsi`),
  KEY `idprovinsi` (`idprovinsi`),
  KEY `idprovinsi_2` (`idprovinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=305 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`idprovinsi`, `nama`) VALUES
(300, 'jabar'),
(301, 'jateng'),
(302, 'jatim'),
(303, 'DKI'),
(304, 'DIY');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`idprovinsi`) REFERENCES `provinsi` (`idprovinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`idkota`) REFERENCES `kota` (`idkota`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
