-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Apr 2015 pada 10.10
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Admin 1', 'admin01', 'admin01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categori`
--

CREATE TABLE IF NOT EXISTS `categori` (
  `kd_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categori`
--

INSERT INTO `categori` (`kd_kategori`, `nama_kategori`) VALUES
('E01', 'TV'),
('E02', 'Kulkas'),
('E03', 'Mesin Cuci'),
('E04', 'Handphone'),
('E05', 'Radio'),
('E06', 'Home Theatre');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE IF NOT EXISTS `pembeli` (
`id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_user`, `nama`, `alamat`, `no_hp`, `email`, `username`, `password`) VALUES
(1, 'Abdul Aziz Priatna', 'Jl. Katapang Andir Kampung Juntihilir												', '081234567890', 'abdulazizpriatna@gmail.com', 'aziz', 'aziz'),
(2, 'Otong', 'Bandung', '081234567890', 'otong@gmail.com', 'otong', 'otong'),
(3, 'Budi', 'Bandung', '081291897917', 'example@email.com', 'budi', 'budi'),
(4, 'Isal', 'Bandung', '08976176291', 'example@email.com', 'isal', 'isal'),
(5, 'Udin', 'Bandung', '081291897917', 'example@email.com', 'udin', 'udin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `kd_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(300) NOT NULL,
  `image_produk` mediumblob,
  `tgl_input_produk` date NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `kd_kategori` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`kd_produk`, `nama_produk`, `image_produk`, `tgl_input_produk`, `harga_produk`, `stok_produk`, `kd_kategori`) VALUES
('E01-21032015-0001', 'Sony 32', 0x736f6e792d33322d6c65642d74762d686974616d2d6272617669612d6b646c2d333272333030622d363431372d3335313633332d312d7a6f6f6d2e6a7067, '2015-03-21', 2850000, 16, 'E01'),
('E01-21032015-0002', 'Sharp 32', 0x73686172702d33322d6171756f732d6c65642d74762d686974616d2d6d6f64656c2d6c632d33326c65313037692d303439362d3337303832382d312d7a6f6f6d2e6a7067, '2015-03-21', 2299000, 90, 'E01'),
('E01-21032015-0003', 'Toshiba 32', 0x746f73686962612d33322d6c65642d74762d68642d686974616d2d6d6f64656c2d333270323430302d363230332d3339343335312d312d7a6f6f6d2e6a7067, '2015-03-21', 2469000, 100, 'E01'),
('E01-21032015-0004', 'Samsung 32', 0x73616d73756e672d33322d6c65642d74762d756133326668343030332d686974616d2d353633302d3235343530342d312d7a6f6f6d2e6a7067, '2015-03-21', 2609000, 0, 'E01'),
('E02-21032015-0001', 'Sanyo Refrigerator - Kulkas 2 Pintu SRD235NSB - Silver', 0x73616e796f2d726566726967657261746f722d6b756c6b61732d322d70696e74752d7372643233356e73622d73696c7665722d333333362d3835363039332d312d7a6f6f6d2e6a7067, '2015-03-21', 2650000, -2, 'E02'),
('E02-21032015-0002', 'Samsung Kulkas 2 Pintu Top Freezer RT20FARWDSA - Silver', 0x73616d73756e672d6b756c6b61732d322d70696e74752d746f702d667265657a65722d72743230666172776473612d73696c7665722d383132332d3736343631342d312d7a6f6f6d2e6a7067, '2015-03-21', 3999000, 6, 'E02'),
('E02-21032015-0003', 'Sharp Lemari Es Dua Pintu - SJF231S - Silver', 0x73686172702d6c656d6172692d65732d6475612d70696e74752d736a66323331732d73696c7665722d373638382d3539333932312d312d7a6f6f6d2e6a7067, '2015-03-21', 3050000, 10, 'E02'),
('E03-21032015-0001', 'Samsung Washing Machine - Mesin Cuci Top Loading 8 Kg - Putih - Model WA80H4000', 0x73616d73756e672d77617368696e672d6d616368696e652d6d6573696e2d637563692d746f702d6c6f6164696e672d382d6b672d70757469682d6d6f64656c2d7761383068343030302d383931322d3231343932312d312d7a6f6f6d2e6a7067, '2015-03-21', 2799000, 0, 'E03'),
('E03-21032015-0002', 'Sharp EST65MW Mesin Cuci 2 Tabung - Putih', 0x73686172702d65737436356d772d6d6573696e2d637563692d322d746162756e672d70757469682d313737312d3737393834322d312d7a6f6f6d2e6a7067, '2015-03-21', 1295000, 6, 'E03'),
('E03-21032015-0003', 'Midea Mesin Cuci MFS75-S804 Front Load 7.5 Kg - Putih', 0x6d696465612d6d6573696e2d637563692d6d667337352d733830342d66726f6e742d6c6f61642d372d352d6b672d70757469682d393038382d3537393238342d312d7a6f6f6d2e6a7067, '2015-03-21', 2800000, 10, 'E03'),
('E03-21032015-0004', 'LG WDM1070D6 Mesin Cuci Front Loading 7 kg - Putih', 0x6c672d77646d3130373064362d6d6573696e2d637563692d66726f6e742d6c6f6164696e672d372d6b672d70757469682d323138352d3839313235382d312d7a6f6f6d2e6a7067, '2015-03-21', 4400000, 0, 'E03'),
('E03-21032015-0005', 'Sanyo Mesin Cuci 2 Tabung AQUA Series - SW870XT', 0x73616e796f2d6d6573696e2d637563692d322d746162756e672d617175612d7365726965732d737738373078742d333536392d3237393036342d312d7a6f6f6d2e6a7067, '2015-03-21', 1385500, 10, 'E03'),
('E04-21032015-0001', 'Sony Xperia Z3 Compact - 16 GB - Hitam', 0x736f6e792d7870657269612d7a332d636f6d706163742d31362d67622d686974616d2d343639372d3337383839332d312d7a6f6f6d2e6a7067, '2015-03-21', 6347500, 4, 'E04'),
('E04-21032015-0002', 'Lenovo S580 - 8GB - Hitam', 0x6c656e6f766f2d733538302d3867622d686974616d2d323533392d3639333335382d312d7a6f6f6d2e6a7067, '2015-03-21', 1699000, 10, 'E04'),
('E04-21032015-0003', 'Apple iPhone 6 - 16 GB - Silver', 0x6170706c652d6970686f6e652d362d31362d67622d73696c7665722d313239372d3835373030352d312d7a6f6f6d2e6a7067, '2015-03-21', 9464000, 10, 'E04'),
('E04-21032015-0004', 'Huawei Honor 3C - 8 GB - Dual SIM - Putih', 0x6875617765692d686f6e6f722d33632d382d67622d6475616c2d73696d2d70757469682d393134352d3830363231342d312d7a6f6f6d2e6a7067, '2015-03-21', 2099000, 9, 'E04'),
('E04-21032015-0005', 'Samsung Galaxy A3 A300H', 0x73616d73756e672d67616c6178792d61332d61333030682d313667622d70757469682d363239332d3039383431382d312d7a6f6f6d2e6a7067, '2015-03-21', 3210000, 0, 'E04'),
('E05-21032015-0001', 'Polytron Mini Hifi XL2900 - Hitam', 0x706f6c7974726f6e2d6d696e692d686966692d786c323930302d686974616d2d343435302d3233373338342d312d7a6f6f6d2e6a7067, '2015-03-21', 1299000, 0, 'E05'),
('E05-21032015-0002', 'Philips CD Radio Boombox - AZ-100N', 0x7068696c6970732d63642d726164696f2d626f6f6d626f782d617a2d3130306e2d70757469682d626972752d353337342d3330353532382d312d7a6f6f6d2e6a7067, '2015-03-21', 588000, 10, 'E05'),
('E05-21032015-0003', 'Philips AZ385 CD Soundmachine - Hitam', 0x7068696c6970732d617a3338352d63642d736f756e646d616368696e652d686974616d2d363637332d3735343731382d312d7a6f6f6d2e6a7067, '2015-03-21', 765000, 8, 'E05'),
('E05-21032015-0004', 'Lg - Boombox - DJ - CM 9730 - Hitam', 0x6c672d626f6f6d626f782d646a2d636d2d393733302d686974616d2d383637392d3733383033382d312d7a6f6f6d2e6a7067, '2015-03-21', 10000000, 10, 'E05'),
('E06-01042015-0001', 'Denon AV Receiver AVR-X3000 Hitam', 0x64656e6f6e2d61762d72656365697665722d6176722d78333030302d686974616d2d303038392d3932323138312d312d7a6f6f6d2e6a7067, '2015-04-01', 7490000, 98, 'E06'),
('E06-01042015-0002', 'LG DH6340p - Home Theater System Amplifier - Hitam', 0x6c672d646836333430702d686f6d652d746865617465722d73797374656d2d616d706c69666965722d686974616d2d373534362d3535303236382d312d7a6f6f6d2e6a7067, '2015-04-01', 2399000, 0, 'E06'),
('E06-01042015-0003', 'Orange TV Perangkat KU Band All Channel 3 Bulan - Hitam', 0x6f72616e67652d74762d706572616e676b61742d6b752d62616e642d616c6c2d6368616e6e656c2d332d62756c616e2d686974616d2d373935372d3532343535312d312d7a6f6f6d2e6a7067, '2015-04-01', 1250000, 13, 'E06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kd_produk` varchar(20) NOT NULL,
  `jumlah_yang_dibeli` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `id_user`, `kd_produk`, `jumlah_yang_dibeli`, `tgl_transaksi`, `total`) VALUES
('T0001-20150401', 1, 'E06-01042015-0001', 2, '2015-04-01', 14980000),
('T0002-20150401', 4, 'E01-21032015-0002', 2, '2015-04-01', 4598000),
('T0003-20150401', 4, 'E01-21032015-0002', 2, '2015-04-01', 4598000),
('T0004-20150401', 1, 'E01-21032015-0001', 2, '2015-04-01', 5700000),
('T0005-20150401', 1, 'E01-21032015-0002', 2, '2015-04-01', 4598000),
('T0006-20150401', 1, 'E04-21032015-0001', 1, '2015-04-01', 6347500),
('T0007-20150402', 1, 'E06-01042015-0003', 2, '2015-04-02', 2500000),
('T0008-20150402', 1, 'E06-01042015-0003', 5, '2015-04-02', 6250000),
('T0009-20150402', 1, 'E04-21032015-0005', 10, '2015-04-02', 32100000),
('T0010-20150402', 5, 'E05-21032015-0003', 2, '2015-04-02', 1530000),
('T0011-20150402', 1, 'E06-01042015-0002', 20, '2015-04-02', 47980000);

--
-- Trigger `transaksi`
--
DELIMITER //
CREATE TRIGGER `pengurangan_transaksi` AFTER INSERT ON `transaksi`
 FOR EACH ROW begin
update product set stok_produk=stok_produk-new.jumlah_yang_dibeli
where kd_produk = new.kd_produk;
END
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `categori`
--
ALTER TABLE `categori`
 ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`kd_produk`), ADD KEY `kd_kategori` (`kd_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`kode_transaksi`), ADD KEY `kd_produk` (`kd_produk`), ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `categori` (`kd_kategori`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kd_produk`) REFERENCES `product` (`kd_produk`),
ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `pembeli` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
