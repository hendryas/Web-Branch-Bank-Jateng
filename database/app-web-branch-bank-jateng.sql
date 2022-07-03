-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2022 pada 06.52
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app-web-branch-bank-jateng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cif_nasabah`
--

CREATE TABLE `data_cif_nasabah` (
  `id` int(11) NOT NULL,
  `nama_kantor_bank_jateng` varchar(256) NOT NULL,
  `nama_nasabah` varchar(256) NOT NULL,
  `alamat_nasabah` varchar(256) NOT NULL,
  `tanda_pengenal_nasabah` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `cif` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_cif_nasabah`
--

INSERT INTO `data_cif_nasabah` (`id`, `nama_kantor_bank_jateng`, `nama_nasabah`, `alamat_nasabah`, `tanda_pengenal_nasabah`, `date_created`, `cif`) VALUES
(1, 'Kantor Bank jateng Pemalang', 'Alvin R', 'Pemalang', 'ktp-sim', '2022-06-30 10:42:21', 'VB43JU2'),
(2, 'Kantor Bank Jateng Batang', 'Hendry Agus S', 'Batang', 'ktp-sim', '2022-06-30 10:54:00', 'QVE7FU2'),
(3, 'Kantor Bank Grobogan', 'Fakhri', 'Purwodadi', 'ktp-sim', '2022-07-02 06:53:54', 'EDMTVW4'),
(5, 'purwodari', 'samsudin', 'alamars@gmail.com', 'ktp-sim', '2022-07-03 10:20:01', 'G4T5PK6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rekening_nasabah`
--

CREATE TABLE `data_rekening_nasabah` (
  `id` int(11) NOT NULL,
  `cif` varchar(256) NOT NULL,
  `no_rekening` varchar(256) NOT NULL,
  `nama_nasabah` varchar(256) NOT NULL,
  `nama_kantor_bank_jateng` varchar(256) NOT NULL,
  `status_rekening` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_rekening_nasabah`
--

INSERT INTO `data_rekening_nasabah` (`id`, `cif`, `no_rekening`, `nama_nasabah`, `nama_kantor_bank_jateng`, `status_rekening`, `date_created`) VALUES
(2, 'QVE7FU2', '5090-11-000002-12-1', 'Hendry Agus S', 'Kantor Bank Jateng Batang', 1, '2022-07-02 10:04:02'),
(4, 'G4T5PK6', '5090-11-000005-12-1', 'samsudin', 'purwodari', 1, '2022-07-03 10:22:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_level_1`
--

CREATE TABLE `menu_level_1` (
  `id` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `icon` longtext NOT NULL,
  `status_sub` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_level_1`
--

INSERT INTO `menu_level_1` (`id`, `url`, `title`, `icon`, `status_sub`, `date_created`) VALUES
(9, 'dashboard_admin', 'Dashboard', 'fal fa-fw fa-tachometer', 0, '2022-07-02 19:49:04'),
(10, 'dashboard_csr', 'Dashboard', 'fal fa-fw fa-tachometer', 0, '2022-07-02 19:48:58'),
(11, 'dashboard_super_admin', 'Dashboard', 'fal fa-fw fa-tachometer', 0, '2022-07-02 19:49:26'),
(12, 'akun', 'Master Akun', 'fal fa-fw fa-users', 1, '2022-07-02 19:50:02'),
(13, 'cif', 'Master CIF', 'fal fa-fw fa-briefcase', 1, '2022-07-02 19:51:01'),
(14, 'menu', 'Master Menu', 'fal fa-fw fa-cubes', 1, '2022-07-02 19:51:54'),
(15, 'rekening', 'Master Rekening', 'fal fa-fw fa-credit-card', 1, '2022-07-02 19:52:34'),
(16, 'role', 'Master Role', 'ti-briefcase', 1, '2022-07-02 19:53:14'),
(18, 'accrekening', 'ACC Rekening', 'fal fa-fw fa-credit-card', 0, '2022-07-03 10:36:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_level_2`
--

CREATE TABLE `menu_level_2` (
  `id` int(11) NOT NULL,
  `id_menu_level_1` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `is_active` int(11) NOT NULL,
  `status_sub` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_level_2`
--

INSERT INTO `menu_level_2` (`id`, `id_menu_level_1`, `url`, `title`, `is_active`, `status_sub`, `date_created`) VALUES
(5, 12, 'akun', 'Buat Akun', 1, 1, '2022-07-02 19:55:44'),
(6, 13, 'cif', 'Generate CIF', 1, 1, '2022-07-02 19:57:08'),
(7, 14, 'menu', 'Menu Level 1', 1, 1, '2022-07-02 19:58:13'),
(8, 14, 'menulevel2', 'Menu Level 2', 1, 1, '2022-07-02 19:58:36'),
(9, 15, 'rekening', 'Generate Rekening', 1, 1, '2022-07-02 19:59:07'),
(11, 16, 'role', 'Generate Role', 1, 1, '2022-07-03 10:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama_role`, `date_created`) VALUES
(1, 'Super Admin', '2022-06-28 11:38:02'),
(2, 'Admin', '2022-06-28 11:38:09'),
(3, 'CSR', '2022-06-28 11:38:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'Operator A', 'operatora123', 'hendryas321@gmail.com', '$2y$10$6ak8oy21bwzUWifywGYVOOEfrNk44kca5NEeOXP2scrcn0bRhrdNC', 3, 1, '2022-06-25 07:22:41'),
(7, 'Admin', 'admin123', 'hendryas321@gmail.com', '$2y$10$dEjXciO7cea5NEHgUCZQPO5qozyGWYIns2wrEZYbrd8oz1gAIlTyy', 2, 1, '2022-06-28 14:43:58'),
(8, 'Operator BC', 'operatorb123', 'hendryas321@gmail.com', '$2y$10$B8IPgqgP.YvT0j7uPTnmhum2ZW5MeFo2MNrG5qhgCpjIHYXkSAmmy', 3, 1, '2022-06-30 16:44:34'),
(12, 'Super Admin', 'superadmin123', 'superadmin123@gmail.com', '$2y$10$5bvEUHFLmz.FDqRp489Hrevhfndnozglz38Ha2Zt.l4qmtMK6drb.', 1, 1, '2022-07-03 10:34:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_menu_level_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `id_menu_level_1`) VALUES
(25, 2, 9),
(26, 2, 12),
(27, 2, 13),
(28, 2, 14),
(29, 2, 15),
(31, 3, 15),
(32, 3, 13),
(33, 3, 10),
(35, 1, 11),
(36, 1, 12),
(37, 1, 13),
(38, 1, 14),
(43, 2, 18),
(45, 1, 16),
(46, 1, 15),
(47, 1, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_cif_nasabah`
--
ALTER TABLE `data_cif_nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_rekening_nasabah`
--
ALTER TABLE `data_rekening_nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_level_1`
--
ALTER TABLE `menu_level_1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_level_2`
--
ALTER TABLE `menu_level_2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_cif_nasabah`
--
ALTER TABLE `data_cif_nasabah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_rekening_nasabah`
--
ALTER TABLE `data_rekening_nasabah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `menu_level_1`
--
ALTER TABLE `menu_level_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `menu_level_2`
--
ALTER TABLE `menu_level_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
