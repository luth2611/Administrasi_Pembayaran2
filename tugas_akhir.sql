-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Okt 2018 pada 07.46
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`idbiaya`, `jenis_biaya`, `jumlah`) VALUES
(6, 'BANGUNAN', 150000),
(7, 'MANASIK HAJI', 190000),
(8, 'SERAGAM', 100000),
(9, 'PESERTA BARU', 150000),
(12, 'SPP BULANAN', 985001),
(14, 'FASILITAS ', 150000),
(15, 'RAUDOH', 25000),
(16, 'MAJALAH', 20000);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133040888 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_lengkap`, `tmpt_lahir`, `jenis_kel`, `kelas`, `alamat`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `no_telp`, `tahun_ajaran`) VALUES
(133040112, 'SALSABILA', '2018-10-02', 'Perempuan', 'E', 'MEDAN', 'R', 'T', 'R', 'W', 99282828, '2017/2018'),
(133040254, 'PUTRI', '2018-10-03', 'Perempuan', 'C', 'SURABAYA', 'U', 'I', 'N', 'M', 2147483647, '2017/2018'),
(133040289, 'SISKA', '2018-10-07', 'Perempuan', 'B', 'JAKARTA', 'Q', 'W', 'H', 'J', 2147483647, '2017/2018'),
(133040567, 'NINDI', '2018-10-06', 'Perempuan', 'F', 'SURABAYA', 'B', 'N', 'M', 'K', 87272727, '2017/2018'),
(133040887, 'DINDA', '2018-10-31', 'Perempuan', 'D', 'MALANG', 'X', 'C', 'T', 'R', 2147483647, '2017/2018');

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
  `jenis_biaya` int(15) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `sudah_bayar` int(20) NOT NULL,
  `sisa_tagihan` int(20) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nis`, `jenis_biaya`, `tanggal_bayar`, `bulan`, `jumlah`, `sudah_bayar`, `sisa_tagihan`, `keterangan`, `tahun_ajaran`) VALUES
(1, 133040254, 3, '2018-10-03', '', 50000, 25000, 25000, '', '');

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
