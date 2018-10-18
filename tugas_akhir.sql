-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Mar 2018 pada 05.15
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
  `namabiaya` varchar(20) NOT NULL,
  `jumlah` varchar(25) NOT NULL,
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_siswa`
--

CREATE TABLE IF NOT EXISTS `kontak_siswa` (
  `idsiswa` int(10) NOT NULL AUTO_INCREMENT,
  `namasiswa` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  PRIMARY KEY (`idsiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_fasilitas`
--

CREATE TABLE IF NOT EXISTS `pembayaran_fasilitas` (
  `idbiaya` int(10) NOT NULL AUTO_INCREMENT,
  `namabiaya` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `sisa` double NOT NULL,
  `bayar` int(11) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_majalah`
--

CREATE TABLE IF NOT EXISTS `pembayaran_majalah` (
  `idbiaya` int(10) NOT NULL AUTO_INCREMENT,
  `namabiaya` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `sisa` double NOT NULL,
  `bayar` int(11) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_manasik`
--

CREATE TABLE IF NOT EXISTS `pembayaran_manasik` (
  `idbiaya` int(10) NOT NULL AUTO_INCREMENT,
  `namabiaya` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `sisa` double NOT NULL,
  `bayar` int(25) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_peserta_baru`
--

CREATE TABLE IF NOT EXISTS `pembayaran_peserta_baru` (
  `idbiaya` int(10) NOT NULL AUTO_INCREMENT,
  `namabiaya` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `sisa` double NOT NULL,
  `bayar` int(25) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_porseni`
--

CREATE TABLE IF NOT EXISTS `pembayaran_porseni` (
  `idbiaya` int(10) NOT NULL AUTO_INCREMENT,
  `namabiaya` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `sisa` double NOT NULL,
  `bayar` int(25) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_raudoh`
--

CREATE TABLE IF NOT EXISTS `pembayaran_raudoh` (
  `idbiaya` int(10) NOT NULL AUTO_INCREMENT,
  `namabiaya` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `sisa` double NOT NULL,
  `bayar` int(25) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_seragam`
--

CREATE TABLE IF NOT EXISTS `pembayaran_seragam` (
  `idbiaya` int(10) NOT NULL AUTO_INCREMENT,
  `namabiaya` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `sisa` double NOT NULL,
  `bayar` int(25) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_spp`
--

CREATE TABLE IF NOT EXISTS `pembayaran_spp` (
  `idbiaya` int(10) NOT NULL AUTO_INCREMENT,
  `namabiaya` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `sisa` double NOT NULL,
  `bayar` int(25) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`idbiaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(11) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tahunajaran` varchar(20) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`, `alamat`, `tahunajaran`) VALUES
(1, 'AA', 'X1', '', ''),
(2, 'BB', 'X2', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
