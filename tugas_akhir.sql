-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Des 2018 pada 05.33
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
  `idbiaya` int(15) NOT NULL AUTO_INCREMENT,
  `jenis_biaya` varchar(25) NOT NULL,
  `jumlah` int(25) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`idbiaya`, `jenis_biaya`, `jumlah`, `status`) VALUES
(8, 'SERAGAM', 120000, '1'),
(9, 'PESERTA DIDIK BARU', 159000, '1'),
(12, 'SPP BULANAN', 985001, '2'),
(14, 'FASILITAS', 155000, '1'),
(15, 'RAUDOH (PAKET BACA TULIS)', 25000, '1'),
(16, 'MAJALAH BULANAN', 65500, '2'),
(19, 'PORSENI ', 190000, '1'),
(21, 'MANASIK HAJI', 150000, '1'),
(22, 'Udunan Kelas', 10000, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE IF NOT EXISTS `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  `Status` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`, `Status`) VALUES
('2018-12-11 04:20:43', '2018-12-11 04:20:33', '0032002F0033002000280049006E0073006900640065006E00740069006C002900200052004100470041004D002C00200020005000450053004500520054004100200044004900440049004B00200042004100520055002C002000200046004100530049004C0049005400410053002C002000200052004100550044004F00480020002800500041004B0045005400200042004100430041002000540055004C004900530029002C002000200050004F005200530045004E00490020002C00200020004D0041004E004100530049004B002000480041004A0049002C00200020005500640075006E0061', '+6285720768168', 'Default_No_Compression', '', '+62816124', -1, '2/3 (Insidentil) RAGAM,  PESERTA DIDIK BARU,  FASILITAS,  RAUDOH (PAKET BACA TULIS),  PORSENI ,  MANASIK HAJI,  Uduna', 1, '', 'false', 0),
('2018-12-11 04:20:43', '2018-12-11 04:20:35', '0033002F0033002000280049006E0073006900640065006E00740069006C00290020006E0020004B0065006C00610073002C00200068006100720061007000200075006E00740075006B002000730065006700650072006100200064006900620061007900610072006B0061006E002C00200074006500720069006D00610020006B0061007300690068', '+6285720768168', 'Default_No_Compression', '', '+62816124', -1, '3/3 (Insidentil) n Kelas, harap untuk segera dibayarkan, terima kasih', 2, '', 'false', 0),
('2018-12-11 04:20:43', '2018-12-11 04:20:44', '0031002F0033002000280049006E0073006900640065006E00740069006C00290020005900740068002E0020004B006500700061006400610020006F00720061006E00670020007400750061002000520069007A0071006F006E00200053006900640069006B0020004D00610075006C0061006E006100200061006E00640061002000740065007200640061007400610020006D0065006E0075006E006700670061006B002000700065006D006200610079006100720061006E002000280069006E0073006900640065006E00740069006C002900200062006500720075007000610020002000530045', '+6285720768168', 'Default_No_Compression', '', '+62816124', -1, '1/3 (Insidentil) Yth. Kepada orang tua Rizqon Sidik Maulana anda terdata menunggak pembayaran (insidentil) berupa  SE', 3, '', 'false', 0),
('2018-12-11 04:20:58', '2018-12-11 04:20:47', '0032002F00320020002800420075006C0061006E0061006E00290020004C0041004E0041004E002000420075006C0061006E00200044006500730065006D0062006500720020004D0041004A0041004C00410048002000420055004C0041004E0041004E002000420075006C0061006E00200044006500730065006D00620065007200200020002C0068006100720061007000200075006E00740075006B002000730065006700650072006100200064006900620061007900610072006B0061006E002C00200074006500720069006D00610020006B0061007300690068', '+6285720768168', 'Default_No_Compression', '', '+62816124', -1, '2/2 (Bulanan) LANAN Bulan Desember MAJALAH BULANAN Bulan Desember  ,harap untuk segera dibayarkan, terima kasih', 4, '', 'false', 0),
('2018-12-11 04:20:58', '2018-12-11 04:20:49', '0031002F00320020002800420075006C0061006E0061006E00290020005900740068002E0020004B006500700061006400610020006F00720061006E00670020007400750061002000520069007A0071006F006E00200053006900640069006B0020004D00610075006C0061006E006100200061006E00640061002000740065007200640061007400610020006D0065006E0075006E006700670061006B002000700065006D006200610079006100720061006E0020002800420075006C0061006E0061006E002900200062006500720075007000610020005300500050002000420055', '+6285720768168', 'Default_No_Compression', '', '+62816124', -1, '1/2 (Bulanan) Yth. Kepada orang tua Rizqon Sidik Maulana anda terdata menunggak pembayaran (Bulanan) berupa SPP BU', 5, '', 'false', 0),
('2018-12-11 04:27:07', '2018-12-11 04:27:08', '0032002F00320020002800420075006C0061006E0061006E00290020004C0041004E0041004E002000420075006C0061006E00200044006500730065006D0062006500720020004D0041004A0041004C00410048002000420055004C0041004E0041004E002000420075006C0061006E00200044006500730065006D00620065007200200020002C0068006100720061007000200075006E00740075006B002000730065006700650072006100200064006900620061007900610072006B0061006E002C00200074006500720069006D00610020006B0061007300690068', '+6285720768168', 'Default_No_Compression', '', '+62816124', -1, '2/2 (Bulanan) LANAN Bulan Desember MAJALAH BULANAN Bulan Desember  ,harap untuk segera dibayarkan, terima kasih', 6, '', 'false', 0),
('2018-12-11 04:29:23', '2018-12-11 04:29:24', '0031002F00320020002800420075006C0061006E0061006E00290020005900740068002E0020004B006500700061006400610020006F00720061006E00670020007400750061002000520069007A0071006F006E00200053006900640069006B0020004D00610075006C0061006E006100200061006E00640061002000740065007200640061007400610020006D0065006E0075006E006700670061006B002000700065006D006200610079006100720061006E0020002800420075006C0061006E0061006E002900200062006500720075007000610020005300500050002000420055', '+6285720768168', 'Default_No_Compression', '', '+62816124', -1, '1/2 (Bulanan) Yth. Kepada orang tua Rizqon Sidik Maulana anda terdata menunggak pembayaran (Bulanan) berupa SPP BU', 7, '', 'false', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SendingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  `Retries` int(3) DEFAULT '0',
  `Priority` int(11) DEFAULT '0',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`(250))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=53 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE IF NOT EXISTS `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TimeOut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `IMSI` varchar(35) NOT NULL,
  `NetCode` varchar(10) DEFAULT 'ERROR',
  `NetName` varchar(35) DEFAULT 'ERROR',
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `IMSI`, `NetCode`, `NetName`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('', '2018-12-11 04:31:34', '2018-12-11 04:23:33', '2018-12-11 04:31:44', 'yes', 'yes', '356743040689650', '510012047268309', '', '', 'Gammu 1.39.0, Windows Server 2007, MS VC 1900', 0, 0, 24, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE IF NOT EXISTS `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SendingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  `StatusCode` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(35) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kel` varchar(10) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133040305 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_lengkap`, `tgl_lahir`, `jenis_kel`, `kelas`, `alamat`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `no_telp`, `tahun_ajaran`) VALUES
(133040287, 'luthfi', '2018-11-07', 'L', 'TK B', 'Jl. Setiabudhi no 193 bandung', 'JONI', 'MRS', 'WIRAUSAHA', 'KARYAWAN SWASTA', '081312410612', '2017/2018'),
(133040304, 'Rizqon Sidik Maulana', '1996-01-02', 'L', 'TK B', 'Jl siliwangi gang koramil ataas rt 05 rw 04 desa nyangkowek kec cicuru', 'Sobarnas', 'Popon Patimah', 'Wirausaha', 'Karyawan Swasta', '085720768168', '2018/2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `nis` int(10) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `jenis_biaya` int(15) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `sudah_bayar` int(20) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `nis` (`nis`),
  KEY `jenis_biaya` (`jenis_biaya`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nis`, `nama_lengkap`, `jenis_biaya`, `tanggal_bayar`, `bulan`, `sudah_bayar`, `tahun_ajaran`) VALUES
(1, 133040287, '', 21, '2018-12-10', 'January', 150000, '2018/2019'),
(2, 133040287, '', 21, '2018-12-10', 'February', 50000, '2018/2019'),
(3, 133040287, '', 21, '2018-12-10', 'February', 100000, '2018/2019'),
(6, 133040287, '', 8, '2018-12-10', '', 20000, '2018/2019'),
(8, 133040287, '', 12, '2018-12-10', 'February', 50000, '2018/2019'),
(9, 133040287, '', 12, '2018-12-10', 'February', 935001, '2018/2019'),
(12, 133040287, '', 12, '2018-12-10', 'January', 50000, '2018/2019'),
(13, 133040287, '', 12, '2018-12-10', 'January', 50000, '2018/2019'),
(15, 133040287, '', 12, '2018-12-10', 'January', 85000, '2018/2019'),
(17, 133040287, '', 12, '2018-12-10', 'January', 1, '2018/2019'),
(19, 133040287, '', 21, '2018-12-10', 'December', 50000, '2018/2019'),
(20, 133040287, '', 9, '2018-12-10', '', 10000, '2018/2019'),
(21, 133040287, '', 8, '2018-12-10', '', 100000, '2018/2019'),
(23, 133040287, '', 15, '2018-12-10', '', 25000, '2018/2019'),
(24, 133040287, '', 19, '2018-12-10', '', 190000, '2018/2019'),
(25, 133040287, '', 22, '2018-12-10', '', 10000, '2018/2019'),
(26, 133040287, '', 12, '2018-12-10', 'January', 800000, '2018/2019'),
(27, 133040287, '', 21, '2018-12-10', 'December', 100000, '2018/2019'),
(28, 133040287, '', 9, '2018-12-10', '', 149000, '2018/2019'),
(29, 133040287, '', 14, '2018-12-10', '', 150000, '2018/2019'),
(30, 133040287, '', 14, '2018-12-10', '', 5000, '2018/2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hak_akses` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'walimurid', 'walimurid', 'walimurid'),
(3, '085759565457', '085759565457', 'walimurid'),
(4, '085720082610', '085720082610', 'walimurid'),
(5, '12345678', '12345678', 'walimurid');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`jenis_biaya`) REFERENCES `biaya` (`idbiaya`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
