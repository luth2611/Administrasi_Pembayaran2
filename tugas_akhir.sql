-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Okt 2018 pada 09.37
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
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`idbiaya`, `jenis_biaya`, `jumlah`) VALUES
(3, '(PAKET BACA TULIS)', 20000),
(4, 'MAJALAH ANAK', 155000),
(5, 'PORSENI', 110000),
(6, 'BANGUNAN', 150000),
(7, 'MANASIK HAJI', 190000),
(8, 'SERAGAM', 100000),
(9, 'PESERTA BARU', 150000),
(11, 'STUDI TOUR', 250000),
(12, 'SPP SEKOLAH', 985001);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(11) NOT NULL,
  `tmpt_lahir` date NOT NULL,
  `jenis_kel` varchar(10) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nama_ayah` varchar(20) NOT NULL,
  `nama_ibu` varchar(20) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13312313 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_lengkap`, `tmpt_lahir`, `jenis_kel`, `kelas`, `alamat`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `no_telp`, `tahun_ajaran`) VALUES
(13312312, 'LUTHFI ', '0000-00-00', 'Laki-laki', '', 'TESSSSSSSSSSSSSSSSSSSSSSSSSSSS', 'a', 'b', 'C', 'D', 2323232, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `nis` int(10) NOT NULL,
  `jenis_biaya` int(15) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah` int(20) NOT NULL,
  `sudah_bayar` int(20) NOT NULL,
  `sisa_tagihan` int(20) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin'),
('admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
