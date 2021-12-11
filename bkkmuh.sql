-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2021 pada 06.04
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkkmuh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `idAlumni` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `status` enum('Bekerja','Studi') NOT NULL,
  `nmInstansi` varchar(70) NOT NULL,
  `mulai` enum('Sebelum','Sesudah','Tidak') NOT NULL,
  `pekerjaan` enum('Utama','Sambilan','Wirausaha','Tidak') DEFAULT NULL,
  `waktu` date NOT NULL,
  `jnsPerusahaan` enum('BUMN','Nonprofil','Swasta','Wiraswasta','Kuliah') NOT NULL,
  `gaji` bigint(20) DEFAULT NULL,
  `thnLulus` year(4) NOT NULL,
  `tglDaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`idAlumni`, `nisn`, `status`, `nmInstansi`, `mulai`, `pekerjaan`, `waktu`, `jnsPerusahaan`, `gaji`, `thnLulus`, `tglDaftar`) VALUES
(1, '0000084643', 'Bekerja', 'PT. Astra Daihatsu ', 'Sesudah', 'Utama', '2019-12-01', 'Swasta', 4000000, 2018, '2021-12-06 11:12:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `idAnggota` int(11) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `noWa` varchar(15) NOT NULL,
  `tglDaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `idHasil` int(11) NOT NULL,
  `idLoker` int(3) NOT NULL,
  `file` varchar(70) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(2) NOT NULL COMMENT '1 u/ tangguhkan\r\n2 u/ publish\r\n3 u/ arsip',
  `tglInput` datetime NOT NULL,
  `usrInput` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`idHasil`, `idLoker`, `file`, `keterangan`, `status`, `tglInput`, `usrInput`) VALUES
(3, 6, 'Hasil_Yudha_Aris_2021-12-03.pdf', 'Cobaaa', 2, '2021-12-03 14:41:30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` int(11) NOT NULL,
  `idLoker` int(3) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tglSeleksi` date NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `tglInput` datetime NOT NULL,
  `usrInput` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`idJadwal`, `idLoker`, `tempat`, `tglSeleksi`, `waktu`, `keterangan`, `tglInput`, `usrInput`) VALUES
(1, 1, 'SMK Muhammadiyyah', '2021-12-15', '08:00 - Selesai', 'Bawa Peralatan Tulis menulis guna mengerjakan soal yang telah disediakan', '2021-12-01 17:19:19', 1),
(3, 1, 'afafa', '2021-12-24', 'gagaas', 'gagagas', '2021-12-02 06:01:40', 1),
(4, 3, 'nadkada', '2021-12-16', '08:00 - Selesai', 'jkauadaoada', '2021-12-02 15:24:11', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `idJurusan` int(11) NOT NULL,
  `nmJurusan` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`idJurusan`, `nmJurusan`, `keterangan`) VALUES
(1, 'Teknik Audio Video', 'Teknik Audio Video mengkhususkan pembahasan atau pembelajaran tentang hal-hal teknik elektronika yang berkait dengan suara (audio) dan gambar (video) yang diproses secara elektronik.'),
(2, 'Teknik Kendaraan Ringan', 'Teknik Kendaraan Ringan merupakan ilmu yang mempelajari tentang alat-alat transportasi darat yang menggunakan mesin, terutama mobil yang mulai berkembang sebagai cabang ilmu seiring dengan diciptakannya mesin mobil.'),
(3, 'Teknik Komputer dan Jaringan', 'Teknik Komputer dan Jaringan merupakan ilmu berbasis Teknologi Informasi dan Komunikasi terkait kemampuan algoritma, dan pemrograman komputer, perakitan komputer, perakitan jaringan komputer, dan pengoperasian perangkat lunak, dan internet.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `idLowongan` int(11) NOT NULL,
  `noLoker` varchar(20) NOT NULL,
  `perusahaan` varchar(40) NOT NULL,
  `nmLoker` varchar(30) NOT NULL,
  `jekel` enum('Pria','Wanita','Keduanya') NOT NULL,
  `file` varchar(70) NOT NULL,
  `keterangan` text NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `batas` date NOT NULL,
  `status` int(2) NOT NULL COMMENT '1 u/ tangguhkan\r\n2 u/ publish\r\n3 u/ arsip',
  `tglInput` datetime NOT NULL,
  `usrInput` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`idLowongan`, `noLoker`, `perusahaan`, `nmLoker`, `jekel`, `file`, `keterangan`, `sumber`, `batas`, `status`, `tglInput`, `usrInput`) VALUES
(1, 'LK/2021/01', 'PT. Atma Jayas', 'Infrastruktur Jaringan', 'Pria', 'PT. Atma Jayas', 'Silahkan Kirim Surat Lamaran Bagi yang berminats', 'Yudha Aris', '2021-12-16', 2, '2021-12-01 16:09:53', 1),
(3, 'LK/2021/0001', 'PT. Astra Honda Motor', 'Infrastruktur Jaringan', 'Pria', '', 'PT. Astra Honda Motor', 'PT. Astra Honda Motor', '2021-12-14', 2, '2021-12-02 09:18:08', 3),
(11, 'LK-2021-0001', 'Astra Honda Motor', 'qweqwqrq', 'Keduanya', 'Loker_LK-2021-0001_2021-12-09.pdf', 'afewr2r2', 'Astra Honda Motor', '2021-12-30', 2, '2021-12-09 07:30:30', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `idDaftar` int(11) NOT NULL,
  `idLoker` int(3) NOT NULL,
  `idAnggota` int(5) NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1 u/ proses\r\n2 u/ gagal administrasi\r\n3 u/ lolos administrasi\r\n4 u/ lulus\r\n5 u/ gagal lulus',
  `tglDaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`idDaftar`, `idLoker`, `idAnggota`, `berkas`, `status`, `tglDaftar`) VALUES
(2, 11, 2, 'Daftar_qweqwqrq_Ananda_Rusdiana_2021-12-09.pdf', 3, '2021-12-09 14:29:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idPerusahaan` int(11) NOT NULL,
  `nmPerusahaan` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `stsPerusahaan` enum('BUMN','Swasta','CV','Lainnya') NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `tglKerjasama` date NOT NULL,
  `tglDaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`idPerusahaan`, `nmPerusahaan`, `email`, `stsPerusahaan`, `noTelp`, `tglKerjasama`, `tglDaftar`) VALUES
(1, 'Astra Honda Motor', 'ahmindonesia@gmail.com', 'Swasta', '08980695197', '2005-12-03', '2021-12-03 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `idSiswa` int(11) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jekel` enum('Pria','Wanita') NOT NULL,
  `tempatLhr` varchar(25) NOT NULL,
  `tglLhr` date NOT NULL,
  `nmOrtu` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `jurusan` int(3) NOT NULL,
  `tahunMasuk` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`idSiswa`, `nisn`, `nama`, `email`, `jekel`, `tempatLhr`, `tglLhr`, `nmOrtu`, `alamat`, `noTelp`, `jurusan`, `tahunMasuk`) VALUES
(1, '0000084643', 'Khoirul Qodar', '', 'Pria', 'DEMAK', '2000-01-01', 'ROMDHONI', ' RT 2/1 Kec. Wonosalam', '085600765888', 1, 2019),
(2, '0001234567', 'Ananda Rusdiana', '', 'Pria', 'Kudus', '2000-01-01', 'Firman', 'Kesambi RT 1 RW 4', '089806965197', 1, 2017),
(3, '0001458968', 'Maulana Sofyan', 'syahbanafebrian31@gmail.con', 'Pria', 'KUDUS', '2000-08-21', 'JASIMIN', 'GOLANTEPUS RT 3/3 Kec. Mejobo', '085726538976', 1, 2018),
(4, '0001459396', 'MOH MISBAKHUL NOOR ROHMAT', '', 'Pria', 'KUDUS', '2000-11-19', 'KAREP', 'SUMBER RT 3/15 Kec. Jekulo', '083862951122', 1, 2017),
(5, '0001459866', 'ABDUL GHOFUR', '', 'Pria', 'KUDUS', '2000-04-28', 'KASIMIN', 'PAPRINGAN RT 1/2 Kec. Kaliwungu', '085727565914', 1, 2018),
(6, '0001679169', 'SASTIKA NIRMALA', '', 'Wanita', 'KUDUS', '2000-07-26', 'PASMIN', 'MASIN RT 2/11 Kec. Dawe', '085773526951', 1, 2017),
(7, '0001852545', 'MUHAMMAD SYAIFUL HIDAYAT', '', 'Pria', 'KUDUS', '2000-06-18', 'JAMILIN', 'HADIWARNO 4/3 Kec. Mejobo', '089513002701', 1, 2017),
(8, '0001854085', 'Aula Sholichah', '', 'Wanita', 'KUDUS', '2000-03-28', 'MUKSHON', 'KESAMBI RT 1/8 Kec. Mejobo', '083843074414', 1, 2018),
(9, '0001958387', 'MUHAMMAD FATHUL ARIS', '', 'Pria', 'KUDUS', '2000-01-12', 'SURAJI', 'JEKULO PULUTAN RT 2/5 Kec. Jekulo', '082220923155', 1, 2017),
(10, '0001958389', 'MUHAMMAD ROISUL BASOR', '', 'Pria', 'KUDUS', '2000-08-03', 'SUWIKNYO', 'JEKULO 1/5 Kec. Jekulo', '089457865745', 1, 2017),
(11, '0001958409', 'LUTFILAH FAJAR LARASATI', '', 'Wanita', 'KUDUS', '2000-08-13', 'AHMADI', 'PULE RT 7/5 Kec. Mayong', '085725080773', 1, 2017),
(12, '0001958659', 'ADE FENNA SURYANNA', '', 'Pria', 'KUDUS', '2000-03-07', 'SUHARTO', 'PURWOSARI RT 7/3 Kec. Kaliwungu', '087746571442', 1, 2017),
(13, '0001958662', 'Dina Widya Ningsih', '', 'Wanita', 'KUDUS', '2000-11-05', 'SUKIMIN', 'GONDOHARUM RT 7/2 Kec. Jekulo', '085726396447', 1, 2018),
(14, '0001958689', 'Ahmad Aliffuddin Kamal', '', 'Pria', 'KUDUS', '2000-04-06', 'SHOLIKHAN', 'RENDENG RT 2/8 Kec. Kudus', '08562770701', 1, 2018),
(15, '0001958908', 'PRAMUDIYANTO', '', 'Pria', 'KUDUS', '2000-02-21', 'SUWARDI', 'KLALING JEPLOSO 4/4 Kec. Jekulo', '085712382452', 1, 2017),
(16, '0001959269', 'MUHAMMAD FAHMI LUTFI', '', 'Pria', 'KUDUS', '2000-08-18', 'JUMAIN', 'NGEMBAL REJO 4/5 Kec. Bae', '082325168270', 1, 2017),
(17, '0001959332', 'MUHAMMAD SETYA MAHENDRA', '', 'Pria', 'KUDUS', '2000-08-31', 'MOHAMMAD MUNICHAB', 'TANJUNGREJO 2/7 Kec. Jekulo', '081326996063', 1, 2017),
(18, '0002576898', 'MOHAMMAD LUTFIYANTO', '', 'Pria', 'KUDUS', '2000-05-01', 'SUBIYANTO', 'HONGGOSOCO RT 4/12 Kec. Dawe', '082136952953', 1, 2017),
(19, '0002857183', 'MUHAMMAD RIZAL MAULANA', '', 'Pria', 'KUDUS', '2000-06-15', 'NGATMONO', 'KARANG BENER RT 1/2 Kec. Bae', '085747329921', 1, 2017),
(20, '0003612796', 'ADITYA DANIK PRATAMA', '', 'Pria', 'KUDUS', '2000-08-06', 'MUHAMMAD NURUL HUDA', 'PRAMBATAN KIDUL RT 4/5 Kec. Kaliwungu', '085761864478', 1, 2017),
(21, '0005400507', 'MUHAMMAD SHIDQIL WAFA', '', 'Pria', 'KUDUS', '2000-07-27', 'NUR ALI', 'JEKULO 3/7 Kec. Jekulo', '08562732253', 1, 2017),
(22, '0005849038', 'Muhammad Fikri Andriyanto', '', 'Pria', 'KUDUS', '2000-12-01', 'MARTONO', 'TANJUNGREJO RT 1/10 Kec. Jekulo', '085712982146', 1, 2018),
(23, '0005903594', 'MUHAMMAD ANDREAN', '', 'Pria', 'KUDUS', '2000-08-19', 'ROHMAN', 'HONGGOSOCO RT 4/2 Kec. Jekulo', '085290632594', 1, 2017),
(24, '0006662766', 'NURUL HIDAYAT', '', 'Pria', 'KUDUS', '2000-08-21', 'SUNARTO', 'TENGGELES RT 1/2 Kec. Mejobo', '085326778517', 1, 2017),
(25, '0007560024', 'NAILUL MUNA', '', 'Pria', 'KUDUS', '2000-11-13', 'SUDARTO', 'KLALING KAUMAN RT 4/2 Kec. Jekulo', '087665557822', 1, 2017),
(26, '0008671681', 'Puput Lestari', '', 'Wanita', 'KUDUS', '2000-12-04', 'KUSEN', 'NGEMBAL KULON RT 7/4 Kec. Jati', '08543016532', 1, 2018),
(27, '0009641041', 'Muhammad Alfun Niam', '', 'Pria', 'KUDUS', '2000-01-12', 'RIYANTO', 'KLALING RT 8/4 Kec. Jekulo', '085729520861', 1, 2018),
(28, '0010177048', 'FINA ULFA MAULANA', '', 'Wanita', 'KUDUS', '2000-11-21', 'NOOR ROHMAD', 'SADANG,RT 06/04 Kec. Jekulo', '08980496907', 1, 2017),
(29, '0010643301', 'Faathimatuzzahro', '', 'Wanita', 'KUDUS', '2001-10-02', 'Suwardi', 'Kandangmas, Dawe, Kudus RT 3/14 Kec. Dawe', '08971506779', 1, 2019),
(30, '0010863634', 'Ahmad Ferdiyanto', '', 'Pria', 'KUDUS', '2001-11-02', 'AHMAD FAOZI', 'PEDAWANG RT 1/1 Kec. Bae', '082137750250', 1, 2019),
(31, '0011289943', 'Dani Fahmi Ego', '', 'Pria', 'KUDUS', '2001-05-06', 'NASIKIN', 'JEKULO KARANG RT 5/7 Kec. Jekulo', '08258525555', 2, 2019),
(32, '0011736483', 'Muhammad Ghufron Afif', '', 'Pria', 'KUDUS', '2001-12-16', 'HARTOYO', 'TERGO RT 5/3 Kec. Dawe', '085640839105', 2, 2018),
(33, '0012345678', 'Yudha Ali', 'yudhaali@gmail.com', 'Pria', 'Kudus', '1970-01-01', 'Lovan', 'Ds. Panjunan Kulon', '08980693521', 2, 2017),
(34, '0012350856', 'Dina Pungkasari', '', 'Wanita', 'KUDUS', '2001-08-17', 'SUPAAT', 'KESAMBI RT 3/4 Kec. Mejobo', '085786943967', 2, 2018),
(35, '0012353459', 'Dwi Rahmawati', '', 'Wanita', 'KUDUS', '2001-06-23', 'SURADI', 'TEMULUS RT 5/1 Kec. Mejobo', '081542792561', 2, 2018),
(36, '0012880042', 'Bagas Pandu Pramudya', '', 'Pria', 'KUDUS', '2001-11-13', 'BENI PARWOTO', 'TERBAN RT 3/9 Kec. Jekulo', '087731010888', 2, 2018),
(37, '0013617092', 'Beni Andriyanto', '', 'Pria', 'KUDUS', '2001-07-23', 'ADRI SANTO', 'DORANG RT 6/1 Kec. Nalumsari', '085741652838', 2, 2018),
(38, '0013632631', 'Yusuf Setyawan', '', 'Pria', 'KUDUS', '2001-12-07', 'BUDI SUTRISNO', 'PlOSO RT 9/4 Kec. Jati', '085225819087', 2, 2018),
(39, '0013632760', 'Muhammad Khoirul Anwar', '', 'Pria', 'KUDUS', '2001-07-18', 'CHAERONI', 'HADIPILO RT 6/5 Kec. Jekulo', '085385130901', 2, 2018),
(40, '0013632928', 'Indra Rahmad Hidayat', '', 'Pria', 'KUDUS', '2001-10-21', 'JOKO MULYONO', 'HADIPOLO RT 4/2 Kec. Kaliwungu', '085876475576', 2, 2018),
(41, '0013634293', 'Taufiq Irawan', '', 'Pria', 'KUDUS', '2001-07-05', 'ISKANDAR', 'TERBAN RT 1/3 Kec. Kaliwungu', '085875733671', 2, 2018),
(42, '0013634348', 'Maulina Solikhah', '', 'Wanita', 'KUDUS', '2001-06-04', 'RIBUT SUHARTO', 'TERBAN RT 2/7 Kec. Jekulo', '085869094983', 2, 2018),
(43, '0013659570', 'Muhammad Alfin Mubarok', '', 'Pria', 'KUDUS', '2001-03-18', 'ABDUL MALIK', 'BACIN RT 1/4 Kec. Bae', '085713946596', 2, 2018),
(44, '0013659584', 'Miftahul Ahdan', '', 'Pria', 'KUDUS', '2000-11-20', 'SUHADJI', 'KAUMAN RT 2/9 Kec. Jekulo', '085866984849', 2, 2019),
(45, '0013670376', 'Wahyu Andi Filian', '', 'Pria', 'KUDUS', '2001-09-18', 'SUKARI', 'TANJUNGREJO RT 5/3 Kec. Kudus', '085722017192', 2, 2018),
(46, '0013747461', 'Aga Joya Wijaya', '', 'Pria', 'KUDUS', '2002-12-11', 'AMIN SUPARJO', 'GONDANGMANIS RT 5/5 Kec. Bae', '089523641376', 2, 2019),
(47, '0013807950', 'Moh Choirul Umam', '', 'Pria', 'KUDUS', '2001-05-21', 'HERY KUSMIANTO', 'TERGO RT 2/3 Kec. Dawe', '085726777934', 2, 2018),
(48, '0013822017', 'TAUFIKUR ROHMAN', '', 'Pria', 'KUDUS', '2001-10-07', 'SAMIONO', 'REJOSARI 5/5 Kec. Dawe', '085201218786', 2, 2017),
(49, '0014002320', 'Mohammad Sakti Fajar', '', 'Pria', 'KUDUS', '2001-08-20', 'SUTARJO', 'TERBAN RT 4/5 Kec. Jekulo', '085215108636', 2, 2018),
(50, '0015399607', 'Amrul Khafidin', '', 'Pria', 'KUDUS', '2001-01-27', 'ABDUL CHOLID', 'NGEMBAL KULON RT 3/5 Kec. Jati', '085727981200', 2, 2019),
(51, '0015849153', 'Didik Purnomo', '', 'Pria', 'PATI', '2001-04-08', 'BUDIYONO', 'PLADEN RT 1/2 Kec. Jekulo', '085113381726', 2, 2018),
(52, '0016300501', 'Mochamad Musviqi', '', 'Pria', 'KUDUS', '2001-02-15', 'SUHARTO', 'KLALING RT 4/2 Kec. Kudus', '089508919355', 2, 2018),
(53, '0016734403', 'Ahmad Juhari', '', 'Pria', 'KUDUS', '2001-01-05', 'SUPARYO', 'SIDOREKSO RT 1/2 Kec. Kaliwungu', '081325957844', 2, 2018),
(54, '0016784885', 'Deni Wahyudi', '', 'Pria', 'KUDUS', '2001-11-15', 'ANWAR SUDIYANTO', 'DESA JOJO RT 3/3 Kec. Mejobo', '085325484637', 2, 2019),
(55, '0018388169', 'Arjun Najah Almafzul', '', 'Pria', 'KUDUS', '2001-08-09', 'MAHTUHIN', 'JELAK KESAMBI RT 5/9 Kec. Mejobo', '083869962902', 2, 2018),
(56, '0018885735', 'Muhamad Abdul Azis', '', 'Pria', 'KUDUS', '2001-09-20', 'ABDULLAH', 'SIDOMULYO RT 3/2 Kec. Jekulo', '08522622831', 2, 2018),
(57, '0019131208', 'Muhammad Dodi Setiawan', '', 'Pria', 'JEPARA', '2001-11-08', 'MONDORI', 'PULE RT 5/2 Kec. Mayong', '085641380291', 2, 2018),
(58, '0019792532', 'Novi Fitriani', '', 'Wanita', 'KUDUS', '2001-06-19', 'KASMONO', 'GONDANGMANIS RT 5/11 Kec. Bae', '082190730146', 2, 2019),
(59, '0020297359', 'Maria Sehli', '', 'Wanita', 'KUDUS', '2002-03-03', 'SLAMET SUPRIYATIN', 'HADIPOLO RT 6/2 Kec. Jekulo', '085853071852', 2, 2018),
(60, '0022335889', 'Bayu Firmansyah', '', 'Pria', 'KUDUS', '2002-03-01', 'SUTIYONO', 'PLOSO RT 2/4 Kec. Jatiwangi', '085866189399', 2, 2019),
(61, '0022413677', 'Vera Widia Sari', '', 'Wanita', 'KUDUS', '2002-11-22', 'AGUS SRIYANTO', 'TANJUNGREJO RT 7/6 Kec. Jekulo', '085741273388', 3, 2019),
(62, '0023882955', 'Zahrotul Fuadah', '', 'Wanita', 'KUDUS', '2002-02-27', 'ACHMAD BAEDHOWI', 'TENGGELES RT 5/1 Kec. Mejobo', '082328107506', 3, 2019),
(63, '0025105736', 'Muhammad Syafiq', '', 'Pria', 'KUDUS', '2002-03-04', 'HERI YADI', 'TANJUNGREJO RT 4/10 Kec. Jekulo', '085641586084', 3, 2019),
(64, '0026002595', 'Agus Riyanto', '', 'Pria', 'KUDUS', '2002-08-14', 'JAMARI', 'MEGAWON RT 1/1 Kec. Jati', '085291354698', 3, 2019),
(65, '0026542351', 'Sugiono', '', 'Pria', 'KUDUS', '2002-10-12', 'RASIPAN', 'JATI RT 2/4 Kec. Jati', '085226315383', 3, 2019),
(66, '0026647769', 'Nurul Qomariyah', '', 'Wanita', 'KUDUS', '2002-08-25', 'EKO PRI SISWANTO', 'DAWE RT 5/3 Kec. Dawe', '085875348520', 3, 2018),
(67, '0027823626', 'Ahmad Nor Lestiyono', '', 'Pria', 'KUDUS', '2002-04-25', 'NUR FUAD', 'Jekulo Kidul RT 3/4 Kec. Jekulo', '082118325367', 3, 2019),
(68, '0028050982', 'Andre Renal Indra Setiyawan', '', 'Pria', 'KUDUS', '2002-06-27', 'SISWANTO', 'PLADEN RT 3/4 Kec. Jekulo', '08597541112', 3, 2019),
(69, '0028072504', 'Muhammad Akbar Fajari', '', 'Pria', 'KUDUS', '2002-02-19', 'ABDUL ROHMAT MARKUAT', 'NGEMBALREJO RT 5/4 Kec. Bae', '082136866445', 3, 2019),
(70, '0028205845', 'Abdul Malik', '', 'Pria', 'KUDUS', '2002-04-25', 'SUGIMAN', 'JEKULO KIDUL RT 3/3 Kec. Jekulo', '085814243016', 3, 2019),
(71, '0028779308', 'Tahta Maulana', '', 'Pria', 'KUDUS', '2002-07-08', 'HERU KISWANTO', 'KLALING RT.2 RW.1 JEKULO KUDUS', '088695166624', 3, 2019),
(72, '0028793716', 'Agus Supriyanto', '', 'Pria', 'KUDUS', '2002-08-14', 'SUKIMIN', 'PAPRINGAN RT 2/1 Kec. Kaliwungu', '085712982146', 3, 2019),
(73, '0028795161', 'Muhammad Fatkhur Rohman', '', 'Pria', 'KUDUS', '2002-09-11', 'MOH KANDAM', 'HADIWARNO RT 1/1 Kec. Mejobo', '081284123448', 3, 2019),
(74, '0028795244', 'Yusril Iksya Hidayat', '', 'Pria', 'KUDUS', '2002-09-03', 'MUSLIKHAN', 'TENGGELES RT 2/1 Kec. Mejobo', '085200373804', 3, 2019),
(75, '0028797632', 'Sindi Yuliana', '', 'Wanita', 'KUDUS', '2002-07-07', 'ALEX SUKARDI', 'JOJO RT 1/4 Kec. Mejobo', '087292765631', 3, 2019),
(76, '0028815439', 'Galih Saputra', '', 'Pria', 'JEPARA', '2002-02-14', 'Priyadi', 'NALUMSARI RT 4/1 Kec. Nalumsari', '08971506779', 3, 2019),
(77, '0028815440', 'Ibnu Essa Charisma', '', 'Pria', 'KUDUS', '2002-03-21', 'KUNDORI', 'TANJUNG RT 2/2 Kec. Jati', '081568275076', 3, 2019),
(78, '0028833324', 'Mochammad Machfudz Reza Taufiqurrohman', '', 'Pria', 'KUDUS', '2002-12-11', 'BUKHORI', 'KARANGBENER RT 2/5 Kec. Bae', '085229726515', 3, 2019),
(79, '0028965982', 'Adi Sukardi', '', 'Pria', 'KUDUS', '2002-09-14', 'AHMADI', 'GARUNG LOR RT 1/7 Kec. Kaliwungu', '085385130901', 3, 2019),
(80, '0029753446', 'Sugeng Priyanto', '', 'Pria', 'KUDUS', '2002-01-18', 'SUPARDI', 'TERBAN RT 1/3 Kec. Jekulo', '081345766867', 3, 2019),
(81, '0029822193', 'Ganang Dwi Prasetyo', '', 'Pria', 'KUDUS', '2002-10-07', 'MASRUKIN', 'HADIWARNO RT 4/1 Kec. Mejobo', '081325957844', 3, 2019),
(82, '0029887954', 'Abdul Hamid', '', 'Pria', 'KUDUS', '2002-02-02', 'LEGIMAN', 'TANJUNGREJO RT 1/4 Kec. Jekulo', '08996906443', 3, 2019),
(83, '0033716552', 'Mita Murniawati', '', 'Wanita', 'KUDUS', '2003-04-25', 'SUTIYONO', ' RT 3/7 Kec. Jekulo', '085243449144', 3, 2019),
(84, '0033851396', 'Lisda Putri Rohmawati', '', 'Wanita', 'DEMAK', '2003-05-05', 'ABDUL MUCHED', ' RT 2/3 Kec. Dempet', '089806987187', 3, 2019),
(85, '0034642514', 'Ahmad Ardiannugroho', '', 'Pria', 'KUDUS', '2003-07-15', 'ALI HIDAYAT', 'DERSALAM RT 6/1 Kec. Bae', '081325707695', 3, 2019),
(86, '0036536719', 'Candra Wisnu Prasojo', '', 'Pria', 'KUDUS', '2003-04-27', 'Ngatono', 'Temulus RT 7/1 Kec. Mejobo', '089630309951', 3, 2019),
(87, '0038265370', 'Irkham Maulana', '', 'Pria', 'KUDUS', '2003-07-29', 'SUNTORO', 'KESAMBI RT 3/9 Kec. Mejobo', '085725470839', 3, 2019),
(88, '0039090461', 'Putri Yuliana', '', 'Wanita', 'KUDUS', '2003-07-21', 'SASMITO', 'JOJO RT 2/1 Kec. Mejobo', '085701694653', 3, 2019),
(89, '0039715621', 'Muhammad Andriyansah', '', 'Pria', 'KUDUS', '2003-03-25', 'SOLIKUN', 'TENGGELES RT 3/2 Kec. Mejobo', '081225676027', 3, 2019),
(90, '12345', 'Riani Ananta Putri', '', 'Wanita', 'Kudus', '1999-09-25', 'Cahyo', 'Dsahjah', '089876567888', 3, 2018),
(91, '201653054', 'Mochammad Febrian Syahbana', 'syahbanafebrian41@gmail.com', 'Pria', 'Kudus', '1999-08-13', 'Isom', 'Desa Golantepus Rt 01/04 Mejobo Kudus', '08980695197', 3, 2017),
(92, '201653055', 'Yudha Aris Kristanto', '', 'Pria', 'Balikpapan', '1998-08-28', 'Sumarlan Odi', 'Desa Ploso Depan Politekik Kudus, Jati Kudus', '089876567888', 3, 2018),
(93, '201653056', 'Febrian', '', 'Pria', 'Kudus', '1999-02-10', 'Isom', 'Desa Golantepus RT 1 RW 04 ', '089806789009', 3, 2018),
(94, '201653059', 'Nisa Cahya', '', 'Wanita', 'Kudus', '2000-08-14', 'Cahyo', 'Desa Undaan', '08980695197', 3, 2018),
(95, '20178053', 'Febrian', '', 'Pria', 'Kudus', '1998-11-20', 'Yudha', 'Desa Golantepus         ', '08980695197', 3, 2019),
(96, '282930', 'Riani Ananta Putri', '', 'Wanita', 'Kudus', '1999-02-10', 'Rony', 'Kudus', '085226224831', 3, 2019),
(97, '9991370995', 'MUHAMAD CHOIRUL ANAM', '', 'Pria', 'KUDUS', '1999-12-07', 'SUKIS', 'KESAMBI RT 2/11 Kec. Mejobo', '085328341987', 3, 2017),
(98, '9991857495', 'BAYU ANJASWORO', '', 'Pria', 'PATI', '1999-07-09', 'RIO SUSANTO', 'PURWOSARI RT 4/2 Kec. Kaliwungu', '081228711079', 3, 2017),
(99, '9992138314', 'SEPTA DWI SUCIPTO', '', 'Pria', 'KUDUS', '1999-09-25', 'SUCIPTO', 'BULUNG KULON 6/8 Kec. Jekulo', '082328375895', 3, 2017),
(100, '9992639175', 'SAFII ANAM', '', 'Pria', 'KUDUS', '1999-11-01', 'NGADIMAN', 'BADONG TENGGELES 2/1 Kec. Mejobo', '089693808186', 3, 2017),
(101, '9992791613', 'WAHYU NOOR ANI', '', 'Wanita', 'KUDUS', '1999-11-29', 'ISMANTO', 'KALIPUTU 8/6 Kec. Kudus', '085875392628', 1, 2017),
(102, '9992791614', 'WAHYU NOOR ANA', '', 'Wanita', 'KUDUS', '1999-11-29', 'ISMANTO', 'KALIPUTU 8/6 Kec. Kudus', '085875889176', 1, 2017),
(103, '9992791631', 'KHOIRUL HUDA', '', 'Pria', 'KUDUS', '1999-12-21', 'MUSLICH', 'JEKULO KARANG RT 5/7 Kec. Jekulo', '089508020592', 1, 2017),
(104, '9993051664', 'MUHAMMAD ABDUL WAHID', '', 'Pria', 'KUDUS', '2000-07-05', 'YAHYA', 'HADIPOLO RT 8/4 Kec. Jekulo', '08963808379', 2, 2017),
(105, '9993677023', 'RAHMAT TOLAH', '', 'Pria', 'KENDAL', '1999-08-27', 'SURATMIN', 'PIJI RT 2/2 Kec. Dawe', '081901857708', 2, 2017),
(106, '9993678404', 'SAUFI ALIFIYANTO', '', 'Pria', 'KUDUS', '1999-08-15', 'SUGIMAN', 'KANDANGGMS 4/14 Kec. Dawe', '085327392527', 2, 2017),
(107, '9994623242', 'SAEFUDIN', '', 'Pria', 'KUDUS', '1999-09-30', 'JUPRI', 'BADONG TENGGELES 2/1 Kec. Mejobo', '083843027574', 3, 2017),
(108, '9995282100', 'MOHAMMAD RIKO ADE KURNIAWAN', '', 'Pria', 'KUDUS', '1999-04-24', 'A. SULKAN', 'HADIPOLO RT 5/2 Kec. Jekulo', '08999295009', 3, 2017),
(109, '9997287332', 'ALAIKA ROBET MAHFUDIN', '', 'Pria', 'KUDUS', '1999-09-08', 'KUSDIYONO', 'KARANG BENER RT 6/8 Kec. Bae', '0885645322', 3, 2017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `idLevel` int(2) NOT NULL COMMENT '1 u/ admin\r\n2 u/ anggota\r\n3 u/ ketua\r\n4 u/ perusahaan',
  `idDaftar` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `tglDaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `nama`, `username`, `password`, `idLevel`, `idDaftar`, `status`, `tglDaftar`) VALUES
(1, 'Yudha Aris', 'yudha', 'yudha', 1, 0, 1, '2021-11-23 15:28:35'),
(2, 'CV. Putra Jaya', 'CBA01', 'putra', 4, 0, 1, '2021-11-23 21:32:29'),
(3, 'PT. Astra Honda Motor', 'P001', 'ahm', 4, 0, 1, '2021-11-23 21:32:29'),
(4, 'PT. Astra Daihatsu', 'P002', 'adm', 4, 0, 1, '2021-11-23 21:32:29'),
(5, 'PT. Pura Barutama', 'PB01', 'pura', 4, 0, 1, '2021-11-23 21:32:29'),
(6, 'CV. Tosan Mash', 'TSN57', 'tosan12', 4, 0, 1, '2021-11-23 21:32:29'),
(7, 'SMK NU 4', 'YSN04', 'ada', 4, 0, 1, '2021-11-23 21:32:29'),
(8, 'Ananda Rusdiana', 'ananda', 'ananda', 2, 2, 1, '2021-11-30 14:52:46'),
(9, 'Khoirul Qodar', 'qodar123', 'qodar123', 2, 1, 1, '2021-11-30 14:57:47'),
(11, 'Astra Honda Motor', 'ahmindo', 'ahmindo', 4, 1, 1, '2021-12-03 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usrgrup`
--

CREATE TABLE `usrgrup` (
  `idGroup` int(11) NOT NULL,
  `nmGroup` varchar(30) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `usrgrup`
--

INSERT INTO `usrgrup` (`idGroup`, `nmGroup`, `ket`) VALUES
(1, 'admin', 'Admin atau staff BKK'),
(2, 'anggota', 'Anggota BKK yang berasal dari siswa atau alumni sendiri'),
(3, 'ketua', 'Ketua BKK'),
(4, 'perusahaan', 'Perusahaan yang telah terdaftar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`idAlumni`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`idAnggota`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`idHasil`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idJurusan`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`idLowongan`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`idDaftar`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idPerusahaan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idSiswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indeks untuk tabel `usrgrup`
--
ALTER TABLE `usrgrup`
  ADD PRIMARY KEY (`idGroup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `idAlumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `idAnggota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `idHasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idJadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `idJurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `idLowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `idDaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idPerusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idSiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `usrgrup`
--
ALTER TABLE `usrgrup`
  MODIFY `idGroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
