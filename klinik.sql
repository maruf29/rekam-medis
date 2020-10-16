-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2020 pada 08.34
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `no_telp`) VALUES
(3, 'Eko', 'admin', '083327033542');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id` int(11) NOT NULL,
  `nomer_identitas` varchar(255) NOT NULL,
  `id_rm` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bayar`
--

INSERT INTO `tb_bayar` (`id`, `nomer_identitas`, `id_rm`, `pembayaran`, `kembalian`) VALUES
(1, 'MDS2003012945', 2, 300000, 5000),
(2, 'MDS2003012945', 1, 250000, 15000),
(3, 'MDS2003012836', 3, 300000, 20000),
(4, 'MDS2003012836', 4, 250000, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `username`, `spesialis`, `no_telp`) VALUES
(12, 'Drg. Puji L Gunawan ', 'Dokter', 'SpBM ', '085225228454');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_pengobatan`
--

CREATE TABLE `tb_jenis_pengobatan` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_pengobatan`
--

INSERT INTO `tb_jenis_pengobatan` (`id_jenis`, `nama_jenis`, `harga`) VALUES
(6, 'Bau Mulut', 90000),
(7, 'Gigi Berlubang', 70000),
(8, 'Sariawan', 50000),
(9, 'Gigi Sensitif', 80000),
(11, 'Gigi Bergoyang', 60000),
(12, 'Dental Impression', 45000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `ket_obat` varchar(255) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`, `harga`) VALUES
(2, 'Erythromycin ', 'Obat Sakit Gigi (Alergi Antibiotik) ', 90000),
(5, 'Cilindamycin', 'sakit gigi akibat infeksi', 70000),
(6, 'Azithromycin', 'sakit gigi akibat bakteri', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nomer_identitas` varchar(255) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nomer_identitas`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(14, 'MDS2003012816', 'Alim', 'Laki-Laki', 'Jln Pekalongan Gang 7', '089327034644'),
(15, 'MDS2003012836', 'Yoga', 'Laki-Laki', 'Jln jakarata no56', '089345456789'),
(16, 'MDS2003012945', 'Ani', 'Perempuan', 'Jln Surabaya No 16', '085225228456'),
(18, 'MDS2003013829', 'Hild dwi Syifana', 'Perempuan', 'Jln Brigjend gang 8', '089327033644');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periksa`
--

CREATE TABLE `tb_periksa` (
  `id` int(11) NOT NULL,
  `nomer_identitas` varchar(255) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id` int(11) NOT NULL,
  `nomer_identitas` varchar(255) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `diagnosa` text NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id`, `nomer_identitas`, `id_dokter`, `diagnosa`, `tanggal_periksa`, `status`) VALUES
(1, 'MDS2003012945', 12, 'Gigi tidak rata', '2020-08-03', 'Pembayaran Selesai'),
(2, 'MDS2003012945', 12, '', '2020-08-03', 'Pembayaran Selesai'),
(3, 'MDS2003012836', 12, 'gigi tidak rata', '2020-08-03', 'Pembayaran Selesai'),
(4, 'MDS2003012836', 12, 'Gigi tidak rata', '2020-08-03', 'Pembayaran Selesai'),
(5, 'MDS2003013829', 12, 'Gigi Sensitif', '2020-08-03', 'Belum bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resetpass`
--

CREATE TABLE `tb_resetpass` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rm_jnspengobatan`
--

CREATE TABLE `tb_rm_jnspengobatan` (
  `id` int(11) NOT NULL,
  `nomer_identitas` varchar(255) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_rm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rm_jnspengobatan`
--

INSERT INTO `tb_rm_jnspengobatan` (`id`, `nomer_identitas`, `id_jenis`, `id_rm`) VALUES
(1, 'MDS2003012945', 7, 1),
(2, 'MDS2003012945', 12, 1),
(3, 'MDS2003012945', 7, 2),
(4, 'MDS2003012945', 11, 2),
(5, 'MDS2003012945', 12, 2),
(6, 'MDS2003012836', 6, 3),
(7, 'MDS2003012836', 7, 3),
(8, 'MDS2003012836', 9, 4),
(9, 'MDS2003012836', 12, 4),
(10, 'MDS2003013829', 9, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id` int(11) NOT NULL,
  `nomer_identitas` varchar(255) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_rm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rm_obat`
--

INSERT INTO `tb_rm_obat` (`id`, `nomer_identitas`, `id_obat`, `id_rm`) VALUES
(1, 'MDS2003012945', 5, 1),
(2, 'MDS2003012945', 6, 1),
(3, 'MDS2003012945', 5, 2),
(4, 'MDS2003012945', 6, 2),
(5, 'MDS2003012836', 5, 3),
(6, 'MDS2003012836', 6, 3),
(7, 'MDS2003012836', 5, 4),
(8, 'MDS2003012836', 6, 4),
(9, 'MDS2003013829', 5, 5),
(10, 'MDS2003013829', 6, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `username`, `level`, `password`) VALUES
(23, 'santrinusantara29@gmail.com', 'dokter', 'dokter', '$2y$10$iORDK11ngHov9cjOcTYxTey9MN8D0dQYxRC4e7ZjJgS/6f4MHoFIS'),
(24, 'zidanpulanda@gmail.com', 'admin', 'admin', '$2y$10$/aRBUZraUpDfuRvPJAnDwuKgJqNCxd38QhaApb.hlq9xKIL3d/GFq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_bayar_ibfk_1` (`nomer_identitas`),
  ADD KEY `tb_bayar_ibfk_2` (`id_rm`);

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tb_jenis_pengobatan`
--
ALTER TABLE `tb_jenis_pengobatan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `nomer_identitas` (`nomer_identitas`);

--
-- Indeks untuk tabel `tb_periksa`
--
ALTER TABLE `tb_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_periksa_ibfk_1` (`nomer_identitas`),
  ADD KEY `tb_periksa_ibfk_2` (`id_dokter`);

--
-- Indeks untuk tabel `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rekammedis_ibfk_1` (`nomer_identitas`),
  ADD KEY `tb_rekammedis_ibfk_2` (`id_dokter`);

--
-- Indeks untuk tabel `tb_resetpass`
--
ALTER TABLE `tb_resetpass`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_rm_jnspengobatan`
--
ALTER TABLE `tb_rm_jnspengobatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rm_jnspengobatan_ibfk_1` (`id_rm`),
  ADD KEY `tb_rm_jnspengobatan_ibfk_2` (`nomer_identitas`),
  ADD KEY `tb_rm_jnspengobatan_ibfk_3` (`id_jenis`);

--
-- Indeks untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rm_obat_ibfk_1` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `tb_rm_obat_ibfk_2` (`nomer_identitas`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_pengobatan`
--
ALTER TABLE `tb_jenis_pengobatan`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_periksa`
--
ALTER TABLE `tb_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_resetpass`
--
ALTER TABLE `tb_resetpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_rm_jnspengobatan`
--
ALTER TABLE `tb_rm_jnspengobatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD CONSTRAINT `tb_bayar_ibfk_1` FOREIGN KEY (`nomer_identitas`) REFERENCES `tb_pasien` (`nomer_identitas`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_bayar_ibfk_2` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_periksa`
--
ALTER TABLE `tb_periksa`
  ADD CONSTRAINT `tb_periksa_ibfk_1` FOREIGN KEY (`nomer_identitas`) REFERENCES `tb_pasien` (`nomer_identitas`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_periksa_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`nomer_identitas`) REFERENCES `tb_pasien` (`nomer_identitas`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rm_jnspengobatan`
--
ALTER TABLE `tb_rm_jnspengobatan`
  ADD CONSTRAINT `tb_rm_jnspengobatan_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_rm_jnspengobatan_ibfk_2` FOREIGN KEY (`nomer_identitas`) REFERENCES `tb_pasien` (`nomer_identitas`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_rm_jnspengobatan_ibfk_3` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis_pengobatan` (`id_jenis`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`nomer_identitas`) REFERENCES `tb_pasien` (`nomer_identitas`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_rm_obat_ibfk_3` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
