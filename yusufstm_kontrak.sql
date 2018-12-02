-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Des 2018 pada 01.28
-- Versi server: 10.0.37-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yusufstm_kontrak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `jatuh_tempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_denda`
--

INSERT INTO `tbl_denda` (`id`, `denda`, `jatuh_tempo`) VALUES
(1, 4000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id_file` int(11) NOT NULL,
  `kontrak_id` int(11) NOT NULL,
  `nm_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_file`
--

INSERT INTO `tbl_file` (`id_file`, `kontrak_id`, `nm_file`, `created_at`) VALUES
(24, 7, 'Sampul.doc', '2018-07-13 15:59:29'),
(26, 159, 'surat_permohonan_kontrak.docx', '2018-09-10 08:31:16'),
(28, 149, 'surat_permohonan_bazar_atrium1.docx', '2018-10-17 14:10:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis`, `nm_jenis`) VALUES
(3, 'Kontrak Tahunan'),
(4, 'Kontrak Bulanan'),
(6, 'Kontrak Mingguan'),
(7, 'Kontrak Harian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kontrak`
--

CREATE TABLE `tbl_kontrak` (
  `id_kontrak` int(11) NOT NULL,
  `nm_kontrak` varchar(40) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `nm_toko` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_berakhir` date NOT NULL,
  `cp` varchar(15) NOT NULL,
  `jml_dana` double NOT NULL,
  `dp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_kontrak`
--

INSERT INTO `tbl_kontrak` (`id_kontrak`, `nm_kontrak`, `jenis_id`, `nm_toko`, `tgl_masuk`, `tgl_berakhir`, `cp`, `jml_dana`, `dp`) VALUES
(7, 'kontrak kios', 4, 'Alba', '2009-07-03', '0000-00-00', '(0411) 424250', 176000000, 0),
(8, 'Kontrak mall', 3, 'Matahari', '2006-12-03', '0000-00-00', '(0411) 424185', 24600000000, 0),
(9, 'kontrak counter', 3, 'Batik', '2008-04-13', '0000-00-00', '(0411) 4820464', 176000000, 0),
(10, 'kontrak counter', 3, 'Lotte Mart', '2006-10-17', '0000-00-00', '(0411) 423449', 24000000000, 0),
(11, 'Kontrak kios', 3, 'Mie Udang', '2009-11-01', '0000-00-00', '(0411) 423570', 196000000, 0),
(12, 'kontrak kios', 4, 'Mama Hotplate', '2011-00-00', '0000-00-00', '(0411) 4672701', 200000000, 0),
(13, 'kontrak kios', 3, 'Seiko', '2012-12-10', '0000-00-00', '(0411) 4242250', 210000000, 0),
(14, 'kontrak kios', 3, '101', '2013-09-14', '0000-00-00', '(0411) 4820403', 178000000, 0),
(15, 'kontrak kios', 3, 'Advance', '2012-05-12', '0000-00-00', '(0411) 855441', 180000000, 0),
(16, 'kontrak kios', 3, 'Century', '2010-06-19', '0000-00-00', '(0411) 424218', 91000000, 0),
(17, 'kontrak kios', 3, 'Giordano', '2011-12-22', '0000-00-00', '(0411) 424245', 200000000, 0),
(18, 'kontrak kios', 3, 'Shouline', '2012-02-22', '0000-00-00', '-', 200000000, 0),
(19, 'kontrak petak', 3, 'ATM center Mandiri', '2007-04-12', '0000-00-00', '-', 91000000, 0),
(20, 'kontrak petak', 3, 'Optik Melawai', '2012-11-10', '0000-00-00', '(0411) 423611', 230000000, 0),
(21, 'kontrak kios', 3, 'Hot kitchen', '2007-10-26', '0000-00-00', '-', 187000000, 0),
(22, 'kontrak kios', 3, 'Excelso', '2009-07-23', '0000-00-00', '(0411) 423460', 188000000, 0),
(23, 'kontrak kios', 3, 'The coffee Bean & Tea', '2008-06-11', '0000-00-00', '(0411) 4820487', 176000000, 0),
(24, 'kontrak petak', 3, 'Atm BNI', '2009-03-16', '0000-00-00', '(021) 57899999', 190000000, 0),
(25, 'kontrak kios', 3, 'Roppan', '2009-07-18', '0000-00-00', '(0411) 4820468', 200000000, 0),
(26, 'kontrak counter', 3, 'watch club', '2011-07-22', '0000-00-00', '(0411) 424238', 208000000, 0),
(27, 'kontrak counter', 3, 'New Balance', '2007-05-22', '0000-00-00', '(0411) 4820511', 266800000, 0),
(28, 'Kontrak mall', 3, 'Carrefour', '2007-11-10', '0000-00-00', '082228255115', 21900000000, 0),
(29, 'kontrak counter', 3, 'Bellagio', '2008-01-11', '0000-00-00', '(0411) 423590', 209000000, 0),
(30, 'kontrak counter', 3, 'Hush Puppies', '2006-07-10', '0000-00-00', '(0411) 4820 477', 213000000, 0),
(31, 'kontrak counter', 3, 'Perfect Healt', '2008-06-08', '0000-00-00', '(0411) 423554', 191000000, 0),
(32, 'kontrak petak', 3, 'Etude House', '2008-06-15', '0000-00-00', '(0411) 4820485', 180000000, 0),
(33, 'kontrak kios', 3, 'Donini', '2011-09-19', '0000-00-00', '(0411) 4661983', 200000000, 0),
(34, 'kontrak counter', 3, 'Marugame', '2013-08-16', '0000-00-00', '08113248867', 267000000, 0),
(35, 'kontrak counter', 3, 'Udon', '2013-12-10', '0000-00-00', '08113248867', 210000000, 0),
(36, 'kontrak counter', 3, 'Andrew', '0000-00-00', '0000-00-00', '(0411) 4662050', 302000000, 0),
(37, 'kontrak counter', 3, 'Bumbu Desa', '2009-02-13', '0000-00-00', '(0411) 834511', 197000000, 0),
(38, 'kontrak counter', 4, 'Roti’o', '2007-11-02', '0000-00-00', '08135557101', 278000000, 0),
(39, 'kontrak counter', 3, 'Solaria', '2006-11-24', '0000-00-00', '(0411) 4661961', 312000000, 0),
(40, 'kontrak kios', 3, 'Morie Chare', '2009-01-22', '0000-00-00', '085396841768', 258000000, 0),
(41, 'kontrak kios', 3, 'Innovation Store', '2008-11-17', '0000-00-00', '(0411) 423788', 276000000, 0),
(42, 'kontrak counter', 3, 'Osim', '2008-08-17', '0000-00-00', '(0411) 4820483', 750000000, 0),
(43, 'kontrak counter', 3, 'Global', '2009-12-15', '0000-00-00', '(021) 29035108', 215000000, 0),
(44, 'kontrak kios', 3, 'LG', '2007-12-09', '0000-00-00', '(0411) 4820380', 245000000, 0),
(45, 'kontrak counter', 3, 'ATM center BCA', '2010-06-08', '0000-00-00', '-', 87000000, 0),
(46, 'kontrak kios', 3, 'Key Collection', '2010-07-12', '0000-00-00', '(0411) 4820379', 210000000, 0),
(47, 'kontrak kios', 3, 'Sox gelery', '2008-09-12', '0000-00-00', '(0411) 423458', 220500000, 0),
(48, 'kontrak kios', 3, 'C & F Perfumery', '2011-06-11', '0000-00-00', '(0411) 423608', 285200000, 0),
(49, 'kontrak kios', 3, 'Body Shop', '2007-08-18', '0000-00-00', '(0411) 423589', 318000000, 0),
(50, 'kontrak counter', 3, 'Gosh', '2009-12-20', '0000-00-00', '(0411) 423589', 194000000, 0),
(51, 'kontrak counter', 3, 'Wakai', '2010-09-22', '0000-00-00', '(0411) 4820473', 315600000, 0),
(52, 'kontrak counter', 3, 'Aw', '2010-04-10', '0000-00-00', '(0411) 424226', 332800000, 0),
(53, 'kontrak counter', 3, 'D’crepes', '2006-06-02', '0000-00-00', '087740357772', 311000000, 0),
(54, 'kontrak counter', 3, 'Nike', '2008-05-11', '0000-00-00', '(0411) 4820394', 221000000, 0),
(55, 'kontrak counter', 3, 'Evb', '2007-06-20', '0000-00-00', '(0411) 424225', 218000000, 0),
(56, 'kontrak counter', 3, 'Samsung', '2010-12-19', '0000-00-00', '(04511) 4820384', 318000000, 0),
(57, 'kontrak counter', 3, 'Erafone', '2007-02-10', '0000-00-00', '(0411) 4820396', 300000000, 0),
(58, 'kontrak counter', 3, 'Quickly', '2007-01-12', '0000-00-00', '(04511) 807521', 318000000, 0),
(59, 'kontrak kios', 3, 'Guardian', '2007-04-01', '0000-00-00', '(0411) 4820356', 316000000, 0),
(60, 'kontrak counter', 3, 'Hypermart', '2007-01-10', '0000-00-00', '(0411) 4662021', 23000000000, 0),
(61, 'kontrak kios', 3, 'Warung Pojok', '2009-11-09', '0000-00-00', '0811 424 241', 276000000, 0),
(62, 'kontrak kios', 3, 'Mcdonald’s', '2008-04-04', '0000-00-00', '(0411) 831623', 343000000, 0),
(63, 'kontrak kios', 3, 'Jf & Cafe', '2008-09-09', '0000-00-00', '-', 319000000, 0),
(64, 'kontrak counter', 3, 'RM Sedap', '2008-09-08', '0000-00-00', '085 10008 52614', 214000000, 0),
(65, 'kontrak counter', 3, 'Breadtalk', '2008-09-13', '0000-00-00', '(0411) 424175', 312000000, 0),
(66, 'kontrak kios', 3, 'Dunkin’donuts', '2007-09-01', '0000-00-00', '(0411) 424161', 329000000, 0),
(67, 'kontrak kios', 3, 'Pizza Hut', '2012-04-16', '0000-00-00', '(0411) 4820507', 365000000, 0),
(68, 'kontrak kios', 3, 'J.Co Donuts & Coffe', '2007-01-06', '0000-00-00', '(0411) 4821368', 241000000, 0),
(69, 'kontrak kios', 3, 'Minimal', '2009-02-14', '0000-00-00', '(0411) 3655230', 272000000, 0),
(70, 'kontrak counter', 3, 'Kfc', '2006-01-09', '0000-00-00', '(0411) 335115', 398000000, 0),
(71, 'kontrak counter', 3, 'Texas Chicken', '2007-09-08', '0000-00-00', '(0411) 834345', 376000000, 0),
(72, 'kontrak counter', 4, 'Charles & Keitz', '2009-07-07', '0000-00-00', '0812-4462-329', 147000000, 0),
(73, 'kontrak kios', 3, 'M2', '2008-09-05', '0000-00-00', '(0411) 4667531', 300000000, 0),
(74, 'kontrak counter', 3, 'Elizabeth', '2010-04-14', '0000-00-00', '(0411) 834456', 289000000, 0),
(75, 'kontrak counter', 3, 'Logo', '2010-02-10', '0000-00-00', '0818-0833-9797', 276000000, 0),
(76, 'kontrak kios', 4, 'Bling', '2010-02-04', '0000-00-00', '(0411) 8117210', 271800000, 0),
(78, 'kontrak counter', 3, 'The Title Things  The Needs', '2014-09-01', '0000-00-00', '(0411) 423561', 297000000, 0),
(79, 'kontrak counter', 3, 'Expand', '2007-08-04', '0000-00-00', '(0411) 422164', 289600000, 0),
(82, 'kontrak kios', 3, 'Moc', '2007-07-06', '0000-00-00', '(0411) 424210', 235000000, 0),
(83, 'kontrak kios', 3, 'Mens Top', '2010-06-01', '0000-00-00', '(0411) 42313084', 327000000, 0),
(84, 'kontrak counter', 3, 'Les Fammes', '2012-03-07', '0000-00-00', '(0411) 8117155', 328000000, 0),
(85, 'kontrak counter', 3, 'Point Break', '2010-03-12', '0000-00-00', '0852-4202-7000', 318000000, 0),
(86, 'kontrak counter', 3, 'World', '2007-09-05', '0000-00-00', '(0411) 424210', 298000000, 0),
(87, 'kontrak kios', 3, 'Manzone', '2009-02-06', '0000-00-00', '(0411) 4820370', 271600000, 0),
(88, 'kontrak counter', 3, 'Salth Papper', '2007-02-12', '0000-00-00', '-', 279000000, 0),
(89, 'kontrak counter', 3, 'My Size', '2007-08-15', '0000-00-00', '(0411) 4820377', 246000000, 0),
(90, 'kontrak counter', 3, 'Poshboy', '2009-07-11', '0000-00-00', '(0411) 424240', 234000000, 0),
(91, 'kontrak kios', 3, 'Harapan Baru Galery', '2008-08-13', '0000-00-00', '0813-5478-8979', 300000000, 0),
(92, 'Kontrak mall', 3, 'ACE', '2006-12-19', '0000-00-00', '(0411) 4662082', 30780000000, 0),
(93, 'kontrak counter', 3, 'Lee', '2007-09-12', '0000-00-00', '(0411) 4820388', 432000000, 0),
(94, 'kontrak counter', 3, 'Levi’s', '2006-05-17', '0000-00-00', '(0411) 4820374', 413000000, 0),
(95, 'kontrak counter', 3, 'Factor', '2007-09-18', '0000-00-00', '(0411) 833888', 224000000, 0),
(96, 'kontrak counter', 3, 'Suki & Cuisine', '2007-08-17', '0000-00-00', '(0411) 4820383', 276000000, 0),
(97, 'kontrak counter', 3, 'Izzue', '2008-08-02', '0000-00-00', '(0411) 423591', 316000000, 0),
(98, 'kontrak counter', 3, 'Boomboogi', '2007-12-17', '0000-00-00', '(0411) 4661976', 312000000, 0),
(99, 'kontrak counter', 3, 'Snopy Baby', '2008-05-13', '0000-00-00', '(0411)  482114', 323500000, 0),
(100, 'kontrak kios', 3, 'Polo T-Shirt', '2013-09-12', '0000-00-00', '(0411)  745334', 231000000, 0),
(101, 'kontrak kios', 3, 'Ada', '2008-07-11', '0000-00-00', '-', 243000000, 0),
(102, 'kontrak counter', 3, 'Damn', '2007-09-16', '0000-00-00', '(0411) 466199', 258000000, 0),
(103, 'kontrak counter', 3, 'Sportation', '2007-09-02', '0000-00-00', '(0411) 344244', 365000000, 0),
(104, 'kontrak petak', 3, 'ATM center BRI', '2008-09-11', '0000-00-00', '(0411)  534457', 92000000, 0),
(105, 'kontrak counter', 3, 'Lasona', '2015-09-10', '0000-00-00', '(0411) 424229', 267000000, 0),
(106, 'kontrak counter', 4, 'Gaudi', '2008-05-19', '0000-00-00', '(0411) 423557', 143000000, 0),
(107, 'kontrak counter', 3, 'X8', '2009-02-02', '0000-00-00', '(0411) 423585', 300000000, 0),
(108, 'kontrak kios', 4, 'Optik Internasional', '2008-02-09', '0000-00-00', '(0411)  4820375', 92000000, 0),
(109, 'kontrak kios', 3, 'Mee Gallery', '2010-11-17', '0000-00-00', '(0411) 4820462', 276000000, 0),
(110, 'kontrak counter', 3, 'Welcome', '2008-08-19', '0000-00-00', '(0411) 423787', 277000000, 0),
(111, 'kontrak kios', 4, 'Lazio', '2007-09-13', '0000-00-00', '(0411)  424250', 120000000, 0),
(112, 'kontrak kios', 4, 'Pailess', '2011-08-11', '0000-00-00', '081290005775', 166000000, 0),
(114, 'kontrak counter', 3, 'Polygon', '2007-02-16', '0000-00-00', '(0411) 431198', 230000000, 0),
(115, 'kontrak counter', 3, 'Dwidaya tour', '2011-02-18', '0000-00-00', '(0411) 4820538', 259000000, 0),
(116, 'kontrak counter', 3, 'Bintang Express', '2010-02-11', '0000-00-00', '0811-4616-023', 256000000, 0),
(117, 'kontrak kios', 3, 'My Secret Garden', '2011-02-19', '0000-00-00', '(0411) 424239', 217700000, 0),
(118, 'Kontrak mall', 3, 'Informa', '2007-05-12', '0000-00-00', '(0411) 4662090', 31600000000, 0),
(119, 'kontrak counter', 3, 'Chielo', '2008-09-16', '0000-00-00', '(0411) 5142311', 211000000, 0),
(120, 'kontrak kios', 4, 'Princess', '2007-02-20', '0000-00-00', '(0411) 7858894', 167000000, 0),
(121, 'kontrak counter', 4, 'Stroberi', '2008-09-17', '0000-00-00', '(0411)  4662047', 200000000, 0),
(122, 'kontrak counter', 3, 'DG', '2007-03-14', '0000-00-00', '(0411) 4820487', 255700000, 0),
(124, 'kontrak counter', 3, 'Little', '2011-09-11', '0000-00-00', '(0411) 4820504', 312400000, 0),
(125, 'kontrak counter', 3, 'Gramedia', '2007-01-02', '0000-00-00', '(0411) 423601', 1876000000, 0),
(126, 'kontrak petak', 3, 'Ice Skating', '2006-08-19', '0000-00-00', '-', 295000000, 0),
(127, 'kontrak counter', 3, 'Timezone', '2008-02-01', '0000-00-00', '(0411) 423770', 314000000, 0),
(128, 'Kontrak mall', 3, 'Ramayana', '2007-02-18', '0000-00-00', '0811 2249 654', 28000000000, 0),
(129, 'kontrak counter', 3, 'Bruce Lee Fitness', '2011-02-16', '0000-00-00', '(0411) 424252', 301000000, 0),
(130, 'kontrak counter', 3, 'Scool & Training', '2009-09-04', '0000-00-00', '(0411) 424185', 188500000, 0),
(131, 'kontrak kios', 3, 'Headquarter', '2008-08-09', '0000-00-00', '+62218404080', 330000000, 0),
(132, 'kontrak counter', 3, 'Jhonny Andrean Scool & Training', '2007-07-09', '0000-00-00', '(0411) 423455', 320000000, 0),
(133, 'kontrak kios', 3, 'Best Beauty & Style', '2007-08-11', '0000-00-00', '(0411) 5718827', 197000000, 0),
(134, 'kontrak kios', 3, 'Kopi Team', '2012-07-15', '0000-00-00', '(0411) 8111747', 176000000, 0),
(135, 'kontrak petak', 4, 'Aibo', '2007-08-12', '0000-00-00', '+62 811-4617-98', 187000000, 0),
(136, 'kontrak kios', 4, 'Tong Tji Tea House', '2011-04-04', '0000-00-00', '0821-8721-5071', 200000000, 0),
(137, 'kontrak kios', 4, 'Kios Pelangi', '2008-12-11', '0000-00-00', '081 1-461-159', 217000000, 0),
(138, 'kontrak petak', 4, 'Soto Inang', '2009-02-07', '0000-00-00', '0813-9227-2729', 243000000, 0),
(139, 'kontrak counter', 3, 'XXI', '2008-03-12', '0000-00-00', '(0411)  424158', 850000000, 0),
(140, 'kontrak kios', 3, 'Nav', '2008-07-12', '0000-00-00', '(0411) 4661972', 241000000, 0),
(141, 'kontrak kios', 3, 'Borobudur', '2008-08-16', '0000-00-00', '-', 212000000, 0),
(142, 'kontrak kios', 3, 'Nano', '2008-11-06', '0000-00-00', '0851-0001-0356', 216000000, 0),
(143, 'kontrak kios', 3, 'Dcost', '2010-01-17', '0000-00-00', '(0411 ) 4662011', 213000000, 0),
(144, 'kontrak counter', 3, 'Jysk', '2018-05-17', '0000-00-00', '(0411)  4467218', 208000000, 0),
(145, 'kontrak kios', 3, 'oke shop', '2009-08-12', '0000-00-00', '(021) 29035108', 267000000, 0),
(146, 'kontrak kios', 4, 'Bakso Lapangan Tembak', '2009-09-17', '0000-00-00', '(0411) 4662130', 244000000, 0),
(147, 'kontrak counter', 3, 'Batik Keris', '2008-12-02', '0000-00-00', '(0411) 4820464', 316000000, 0),
(148, 'kontrak kios', 3, 'Disc Tarra', '2010-03-16', '0000-00-00', '(0411) 423569', 310000000, 0),
(149, 'kontrak petak', 3, 'ATM center Danamon', '2008-02-14', '0000-00-00', '-', 87000000, 0),
(150, 'kontrak counter', 3, 'Vans', '2008-02-12', '0000-00-00', '(0411) 4820453', 310000000, 0),
(151, 'kontrak counter', 3, 'Aibo', '2008-02-16', '0000-00-00', '(0411) 424213', 194000000, 0),
(152, 'kontrak counter', 3, '3second', '2007-03-18', '0000-00-00', '(0411) 4662109', 262000000, 0),
(153, 'kontrak counter', 3, 'Fila', '2007-01-04', '0000-00-00', '(0411) 4662040', 210000000, 0),
(154, 'kontrak counter', 3, 'Everbest', '2007-07-24', '0000-00-00', '(0411) 424178', 235000000, 0),
(155, 'kontrak counter', 3, 'Planet Surf', '2007-11-20', '0000-00-00', '(0411)  534457', 320000000, 0),
(156, 'kontrak kios', 3, 'Oppo', '2015-08-04', '0000-00-00', '(0411) 424232', 231000000, 0),
(157, 'kontrak counter', 3, 'Bata', '2007-07-04', '0000-00-00', '(0411) 424251', 277000000, 0),
(158, 'kontrak counter', 3, 'Naughty', '2007-04-11', '0000-00-00', '(0411) 4662090', 200000000, 0),
(159, 'kontrak counter', 3, 'Lee Cooper', '2007-05-19', '2018-12-05', '(0411) 879863', 210000000, 122);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `tersedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `tersedia`) VALUES
(1, 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `username`, `password`, `nama`, `level`) VALUES
(1, 'yusuf', 'dd2eb170076a5dec97cdbbbbff9a4405', 'administrator', 'admin'),
(2, 'admin', '32e29d391e325d3dae9c8e7f17f5cff0', 'administrator', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `fk.kontrak` (`kontrak_id`);

--
-- Indeks untuk tabel `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  ADD PRIMARY KEY (`id_kontrak`),
  ADD KEY `fk.jenis` (`jenis_id`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD CONSTRAINT `fk.kontrak` FOREIGN KEY (`kontrak_id`) REFERENCES `tbl_kontrak` (`id_kontrak`);

--
-- Ketidakleluasaan untuk tabel `tbl_kontrak`
--
ALTER TABLE `tbl_kontrak`
  ADD CONSTRAINT `fk.jenis` FOREIGN KEY (`jenis_id`) REFERENCES `tbl_jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
