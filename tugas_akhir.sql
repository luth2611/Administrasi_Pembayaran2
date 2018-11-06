-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Nov 2018 pada 08.44
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`idbiaya`, `jenis_biaya`, `jumlah`, `status`) VALUES
(7, 'MANASIK HAJI', 200000, '1'),
(8, 'SERAGAM', 120000, ''),
(9, 'PESERTA DIDIK BARU', 159000, '1'),
(12, 'SPP BULANAN', 985001, '2'),
(14, 'FASILITAS', 155000, '1'),
(15, 'RAUDOH (PAKET BACA TULIS)', 25000, '1'),
(18, 'MAJALAH BULANAN', 65500, '2'),
(19, 'PORSENI ', 190000, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(35) NOT NULL,
  `tmpt_lahir` date NOT NULL,
  `jenis_kel` varchar(10) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(30) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133040346 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_lengkap`, `tmpt_lahir`, `jenis_kel`, `kelas`, `alamat`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `no_telp`, `tahun_ajaran`) VALUES
(133040287, 'LUTHFI', '2018-11-07', '', 'X', 'BANDUNG', 'JONI', 'MRS', 'A', 'B', 813124106, '2017/2018'),
(133040288, 'AGUS', '2018-11-30', 'Laki-laki', 'X', 'JAKARTA', 'BANGJON', 'MBAJON', 'K', 'L', 93090319, '2017/2018'),
(133040345, 'SANDRA', '2018-11-02', 'Perempuan', 'C', 'YOGYAKARTA', 'UMAR', 'NINDA', 'A', 'B', 12345678, '2017/2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `no` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` int(8) NOT NULL,
  `no_tujuan` int(15) NOT NULL,
  `pesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `nis` int(10) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `jenis_biaya` int(15) NOT NULL,
  `jumlah` int(25) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `sisa_tagihan` int(25) NOT NULL,
  `sudah_bayar` int(20) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `nis` (`nis`),
  KEY `jenis_biaya` (`jenis_biaya`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nis`, `nama_lengkap`, `jenis_biaya`, `jumlah`, `tanggal_bayar`, `bulan`, `sisa_tagihan`, `sudah_bayar`, `keterangan`, `tahun_ajaran`) VALUES
(1, 133040287, '', 12, 0, '2018-11-06', '', 0, 100000, '', ''),
(2, 133040287, '', 12, 0, '2018-11-06', '', 0, 885001, '', ''),
(3, 133040287, '', 15, 0, '2018-11-06', '', 0, 24000, 'kurang 100', ''),
(4, 133040345, '', 19, 0, '2018-11-06', '', 0, 50000, '', '2017/2018'),
(5, 133040287, '', 15, 0, '2018-11-06', '', 0, 1000, '', ''),
(6, 133040287, '', 14, 0, '2018-11-06', '', 0, 140000, '', '2017/2018'),
(7, 133040287, '', 12, 0, '2018-11-06', 'September', 0, 985001, '', '2017/2018'),
(8, 133040288, '', 12, 0, '2018-11-06', 'Juni', 0, 50000, '', '2017/2018');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'walimurid', 'walimurid', 'walimurid');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`jenis_biaya`) REFERENCES `biaya` (`idbiaya`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
