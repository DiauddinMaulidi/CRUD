-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2024 pada 04.03
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `NIM` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `prodi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mhs`
--

INSERT INTO `tb_mhs` (`id`, `gambar`, `NIM`, `nama_mahasiswa`, `prodi`) VALUES
(33, '65b07bfbb9c2c-doctor.png', '220602090', 'Maria Azzahra', 'Fisika'),
(34, '65afe5779153c-user2.png', '220602010', 'Sinta', 'STATISTIKA'),
(49, '65b07cb99cfe6-ganjar.jpg', '220602019', 'Ganjar', 'MANAJEMEN SISTEM'),
(50, '65b07cf33deae-officer.png', '220602090', 'Megawati ANAK soekarno', 'Marketing'),
(52, '65b07d84ef581-policeman.png', '23909010', 'Gibran', 'SEJARAH DAN BAHASA INDONESIA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
