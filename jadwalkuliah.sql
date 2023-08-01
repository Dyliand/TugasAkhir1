-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 05:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwalkuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(15) NOT NULL,
  `nama_dosen` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_dosen` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` int(16) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `code_color` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `status_dosen`, `no_telp`, `email`, `code_color`) VALUES
(123, 'Sudaryanto', 'tetap', 812899221, 'pakryan@gmail.com', '#9d8080'),
(1234, 'Salam', 'luar', 81722263, 'salam@gmail.com', '#a2c520');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(32) NOT NULL,
  `status` varchar(10) NOT NULL,
  `pendidikan_terakhir` varchar(10) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `code_color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `status`, `pendidikan_terakhir`, `no_telp`, `email`, `code_color`) VALUES
(1, 'Kuswan Effendy, SH SPd MM', 'tetap', 's1', '123', 'www@mail.com', '#f3a683'),
(2, 'H. Mahmud, BA', 'tetap', 's1', '124', 'www@mail.com', '#f7d794'),
(3, 'Drs. Subinarto', 'tetap', 's1', '125', 'www@mail.com', '#778beb'),
(4, 'Bayu Hermawan, S.E, SPd', 'tetap', 's1', '126', 'www@mail.com', '#e77f67'),
(5, 'Kuswandik SPd', 'tetap', 's1', '130', 'www@mail.com', '#cf6a87'),
(6, 'Jannatul Ma\'wa SS', 'tetap', 's1', '133', 'www@mail.com', '#f19066'),
(7, 'Dra. Ratna Widyawati', 'tetap', 's1', '135', 'www@mail.com', '#f5cd79'),
(8, 'Asri Bawani SPd', 'tetap', 's1', '140', 'www@mail.com', '#546de5'),
(9, 'Suwaji, SPd, MPd', 'tetap', 's1', '141', 'www@mail.com', '#e15f41'),
(10, 'Sutriasih, S.Pd, M.Pd', 'tetap', 's1', '143', 'www@mail.com', '#c44569'),
(11, 'Anna Nurul Kristiani, S.Pd', 'tetap', 's1', '144', 'www@mail.com', '#786fa6'),
(12, 'Ridwan S.Ag', 'tetap', 's1', '148', 'www@mail.com', '#f8a5c2'),
(13, 'Drs. Samiono', 'tetap', 's1', '149', 'www@mail.com', '#63cdda'),
(14, 'Zuyina Lutfah. SE SPd', 'tetap', 's1', '150', 'www@mail.com', '#ea8685'),
(15, 'Sri Riwayati,S.Pd', 'tetap', 's1', '157', 'www@mail.com', '#596275'),
(16, 'Amnah Matamim, SPd', 'tetap', 's1', '159', 'www@mail.com', '#574b90'),
(17, 'Kamalat Fika Lidinillah, S.Pd', 'tetap', 's1', '161', 'www@mail.com', '#f78fb3'),
(18, 'Nasikan, S.PdI', 'tetap', 's1', '166', 'www@mail.com', '#3dc1d3'),
(19, 'Sulistyowati, S.Pd', 'tetap', 's1', '167', 'www@mail.com', '#e66767'),
(20, 'Ludi Widiyawan', 'tetap', 's1', '168', 'www@mail.com', '#aaa69d'),
(21, 'Heti Putikasari, S.H, S.Pd', 'tetap', 's1', '169', 'www@mail.com', '#ffb142'),
(22, 'Nanda Tri Pramita, S.Pd.H', 'tetap', 's1', '172', 'www@mail.com', '#33d9b2'),
(23, 'Aisyah vidiana, S.Pd', 'tetap', 's1', '174', 'www@mail.com', '#ccae62'),
(24, 'Meita Dwiantari, S.Pd', 'tetap', 's1', '179', 'www@mail.com', '#218c74'),
(25, 'Sumiati, S.Pd', 'tetap', 's1', '184', 'www@mail.com', '#ffd32a');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(20) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `lama_sks` int(11) NOT NULL,
  `jam_mulai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `jumlah_sks`, `lama_sks`, `jam_mulai`) VALUES
(2, 'Senin', 12, 40, '06:30:00'),
(3, 'Selasa', 12, 45, '06:30:00'),
(4, 'Rabu', 12, 45, '06:30:00'),
(5, 'Kamis', 12, 45, '06:30:00'),
(7, 'Sabtu', 12, 35, '06:30:00'),
(8, 'Jum`at', 9, 35, '06:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_khusus`
--

CREATE TABLE `jadwal_khusus` (
  `id_jadwal_khusus` int(11) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `keterangan` varchar(32) NOT NULL,
  `sesi` varchar(2) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_khusus`
--

INSERT INTO `jadwal_khusus` (`id_jadwal_khusus`, `kelas`, `keterangan`, `sesi`, `hari`, `durasi`) VALUES
(1, 'X', 'upacara', '0', 'Senin', 60),
(2, 'XI', 'upacara', '0', 'Senin', 60),
(3, 'XII', 'upacara', '0', 'Senin', 60),
(4, 'X', 'istirahat 1', '5', 'Senin', 30),
(5, 'XI', 'istirahat 1', '5', 'Senin', 30),
(6, 'XII', 'istirahat 1', '5', 'Senin', 30),
(7, 'X', 'istirahat 1', '5', 'Selasa', 30),
(8, 'XI', 'istirahat 1', '5', 'Selasa', 30),
(9, 'XII', 'istirahat 1', '5', 'Selasa', 30),
(10, 'X', 'istirahat 1', '5', 'Rabu', 30),
(11, 'XI', 'istirahat 1', '5', 'Rabu', 30),
(12, 'XII', 'istirahat 1', '5', 'Rabu', 30),
(13, 'X', 'istirahat 1', '5', 'Kamis', 30),
(14, 'XI', 'istirahat 1', '5', 'Kamis', 30),
(15, 'XII', 'istirahat 1', '5', 'Kamis', 30),
(16, 'X', 'istirahat 1', '5', 'Sabtu', 30),
(17, 'XI', 'istirahat 1', '5', 'Sabtu', 30),
(18, 'XII', 'istirahat 1', '5', 'Sabtu', 30),
(19, 'X', 'istirahat 1', '5', 'Jum`at', 20),
(20, 'XI', 'istirahat 1', '5', 'Jum`at', 20),
(21, 'XII', 'istirahat 1', '5', 'Jum`at', 20),
(22, 'X', 'istirahat 2', '9', 'Senin', 15),
(23, 'XI', 'istirahat 2', '9', 'Senin', 15),
(24, 'XII', 'istirahat 2', '9', 'Senin', 15),
(25, 'X', 'istirahat 2', '9', 'Selasa', 15),
(26, 'XI', 'istirahat 2', '9', 'Selasa', 15),
(27, 'XII', 'istirahat 2', '9', 'Selasa', 15),
(28, 'X', 'istirahat 2', '9', 'Rabu', 15),
(29, 'XI', 'istirahat 2', '9', 'Rabu', 15),
(30, 'XII', 'istirahat 2', '9', 'Rabu', 15),
(31, 'X', 'istirahat 2', '9', 'Kamis', 15),
(32, 'XI', 'istirahat 2', '9', 'Kamis', 15),
(33, 'XII', 'istirahat 2', '9', 'Kamis', 15),
(34, 'X', 'istirahat 2', '9', 'Sabtu', 15),
(35, 'XI', 'istirahat 2', '9', 'Sabtu', 15),
(36, 'XII', 'istirahat 2', '9', 'Sabtu', 15),
(37, 'X', 'extrakulikuler', '8', 'Jum`at', 120),
(38, 'XI', 'extrakulikuler', '8', 'Jum`at', 120),
(39, 'XII', 'extrakulikuler', '8', 'Jum`at', 120),
(40, 'X', 'extrakulikuler', '10', 'Sabtu', 35),
(41, 'X', 'extrakulikuler', '11', 'Sabtu', 35),
(42, 'XII', '-', '10', 'Sabtu', 25),
(43, 'XII', '-', '11', 'Sabtu', 25),
(44, 'X', 'Sholat Dhuha', '0', 'Selasa', 30),
(45, 'XI', 'Sholat Dhuha', '0', 'Selasa', 30),
(46, 'XII', 'Sholat Dhuha', '0', 'Selasa', 30),
(47, 'X', 'Sholat Dhuha', '0', 'Rabu', 30),
(48, 'XI', 'Sholat Dhuha', '0', 'Rabu', 30),
(49, 'XII', 'Sholat Dhuha', '0', 'Rabu', 30),
(50, 'X', 'Sholat Dhuha', '0', 'Kamis', 30),
(51, 'XI', 'Sholat Dhuha', '0', 'Kamis', 30),
(52, 'XII', 'Sholat Dhuha', '0', 'Kamis', 30),
(53, 'X', 'Sholat Dhuha', '0', 'Jum`at', 30),
(54, 'XI', 'Sholat Dhuha', '0', 'Jum`at', 30),
(55, 'XII', 'Sholat Dhuha', '0', 'Jum`at', 30),
(56, 'X', 'Sholat Dhuha', '0', 'Sabtu', 30),
(57, 'XI', 'Sholat Dhuha', '0', 'Sabtu', 30),
(58, 'XII', 'Sholat Dhuha', '0', 'Sabtu', 30);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(20) NOT NULL,
  `nama_jurusan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('TF', 'Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(16) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `id_jurusan` varchar(5) NOT NULL,
  `nama_kelas` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_jurusan`, `nama_kelas`) VALUES
('XaknA', 'X', 'akn', 'A'),
('XIaknA', 'XI', 'akn', 'A'),
('XIIaknA', 'XII', 'akn', 'A'),
('XIIaknB', 'XII', 'akn', 'B'),
('XIIkntrA', 'XII', 'kntr', 'A'),
('XIkntrA', 'XI', 'kntr', 'A'),
('XkntrA', 'X', 'kntr', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `kelompok_mapel` varchar(1) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `beban_jam` int(11) NOT NULL,
  `id_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`, `kelompok_mapel`, `kelas`, `beban_jam`, `id_jurusan`) VALUES
(1, 'A', 'Pendidikan Agama dan Budi Pekerti', 'A', 'X', 3, 'kntr'),
(2, 'B', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', 'X', 2, 'kntr'),
(3, 'C', 'Bahasa Indonesia', 'A', 'X', 4, 'kntr'),
(4, 'D', 'Matematika', 'A', 'X', 4, 'kntr'),
(5, 'H', 'Sejarah Indonesia', 'A', 'X', 3, 'kntr'),
(6, 'F', 'Bahasa Inggris dan Bahasa Asing Lainnya*)', 'A', 'X', 3, 'kntr'),
(7, 'G', 'Seni Budaya', 'B', 'X', 3, 'kntr'),
(8, 'I', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'B', 'X', 2, 'kntr'),
(9, 'S', 'Simulasi dan Komunikasi Digital', 'C', 'X', 3, 'kntr'),
(10, 'J', 'Ekonomi Bisnis', 'C', 'X', 2, 'kntr'),
(11, 'AF', 'Administrasi Umum', 'C', 'X', 2, 'kntr'),
(12, 'T', 'IPA', 'C', 'X', 2, 'kntr'),
(13, 'AI', 'Teknologi Perkantoran', 'C', 'X', 4, 'kntr'),
(14, 'AG', 'Korespondensi', 'C', 'X', 5, 'kntr'),
(15, 'AH', 'Kearsipan', 'C', 'X', 4, 'kntr'),
(16, 'A', 'Pendidikan Agama dan Budi Pekerti', 'A', 'XI', 3, 'kntr'),
(17, 'B', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', 'XI', 2, 'kntr'),
(18, 'C', 'Bahasa Indonesia', 'A', 'XI', 3, 'kntr'),
(19, 'D', 'Matematika', 'A', 'XI', 4, 'kntr'),
(20, 'F', 'Bahasa Inggris dan Bahasa Asing Lainnya*)', 'A', 'XI', 3, 'kntr'),
(21, 'I', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'B', 'XI', 2, 'kntr'),
(22, 'AM', 'Otomatisasi Tata Kelola Kepegawaian', 'C', 'XI', 6, 'kntr'),
(23, 'AN', 'Otomatisasi Tata Kelola Keuangan', 'C', 'XI', 6, 'kntr'),
(24, 'AO', 'Otomatisasi Tata Kelola Sarana dan Prasarana', 'C', 'XI', 6, 'kntr'),
(25, 'AP', 'Otomatisasi Tata Kelola Humas dan Keprotokolan', 'C', 'XI', 6, 'kntr'),
(26, 'Y', 'Produk Kreatif dan Kewirausahaan', 'C', 'XI', 7, 'kntr'),
(27, 'A', 'Pendidikan Agama dan Budi Pekerti', 'A', 'XII', 3, 'kntr'),
(28, 'B', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', 'XII', 2, 'kntr'),
(29, 'C', 'Bahasa Indonesia', 'A', 'XII', 2, 'kntr'),
(30, 'D', 'Matematika', 'A', 'XII', 4, 'kntr'),
(31, 'F', 'Bahasa Inggris dan Bahasa Asing Lainnya*)', 'A', 'XII', 4, 'kntr'),
(32, 'AM', 'Otomatisasi Tata Kelola Kepegawaian', 'C', 'XII', 7, 'kntr'),
(33, 'AN', 'Otomatisasi Tata Kelola Keuangan', 'C', 'XII', 6, 'kntr'),
(34, 'AO', 'Otomatisasi Tata Kelola Sarana dan Prasarana', 'C', 'XII', 6, 'kntr'),
(35, 'AP', 'Otomatisasi Tata Kelola Humas dan Keprotokolan', 'C', 'XII', 6, 'kntr'),
(36, 'Y', 'Produk Kreatif dan Kewirausahaan', 'C', 'XII', 8, 'kntr'),
(37, 'A', 'Pendidikan Agama dan Budi Pekerti', 'A', 'X', 3, 'akn'),
(38, 'B', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', 'X', 2, 'akn'),
(39, 'C', 'Bahasa Indonesia', 'A', 'X', 4, 'akn'),
(40, 'D', 'Matematika', 'A', 'X', 4, 'akn'),
(41, 'H', 'Sejarah Indonesia', 'A', 'X', 3, 'akn'),
(42, 'F', 'Bahasa Inggris dan Bahasa Asing Lainnya*)', 'A', 'X', 3, 'akn'),
(43, 'G', 'Seni Budaya', 'B', 'X', 3, 'akn'),
(44, 'I', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'B', 'X', 2, 'akn'),
(45, 'S', 'Simulasi dan Komunikasi Digital', 'C', 'X', 3, 'akn'),
(46, 'J', 'Ekonomi Bisnis', 'C', 'X', 2, 'akn'),
(47, 'AF', 'Administrasi Umum', 'C', 'X', 2, 'akn'),
(48, 'T', 'IPA', 'C', 'X', 2, 'akn'),
(49, 'AE', 'Etika Profesi', 'C', 'X', 2, 'akn'),
(50, 'AD', 'Aplikasi Pengolah Angka/Spreadsheet', 'C', 'X', 3, 'akn'),
(51, 'N', 'Akuntansi Dasar', 'C', 'X', 5, 'akn'),
(52, 'AA', 'Perbankan Dasar', 'C', 'X', 3, 'akn'),
(53, 'A', 'Pendidikan Agama dan Budi Pekerti', 'A', 'XI', 3, 'akn'),
(54, 'B', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', 'XI', 2, 'akn'),
(55, 'C', 'Bahasa Indonesia', 'A', 'XI', 3, 'akn'),
(56, 'D', 'Matematika', 'A', 'XI', 4, 'akn'),
(57, 'F', 'Bahasa Inggris dan Bahasa Asing Lainnya*)', 'A', 'XI', 3, 'akn'),
(58, 'I', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'B', 'XI', 2, 'akn'),
(59, 'AK', 'Praktikum Akuntansi Perusahaan Jasa, Dagang dan Manufaktur', 'C', 'XI', 6, 'akn'),
(60, 'AL', 'Praktikum Akuntansi Lembaga/Instansi Pemerintah', 'C', 'XI', 4, 'akn'),
(61, 'W', 'Akuntansi Keuangan', 'C', 'XI', 6, 'akn'),
(62, 'AC', 'Komputer Akuntansi', 'C', 'XI', 5, 'akn'),
(63, 'U', 'Administrasi Pajak', 'C', 'XI', 3, 'akn'),
(64, 'Y', 'Produk Kreatif dan Kewirausahaan', 'C', 'XI', 7, 'akn'),
(65, 'A', 'Pendidikan Agama dan Budi Pekerti', 'A', 'XII', 3, 'akn'),
(66, 'B', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', 'XII', 2, 'akn'),
(67, 'C', 'Bahasa Indonesia', 'A', 'XII', 2, 'akn'),
(68, 'D', 'Matematika', 'A', 'XII', 4, 'akn'),
(69, 'F', 'Bahasa Inggris dan Bahasa Asing Lainnya*)', 'A', 'XII', 4, 'akn'),
(70, 'AK', 'Praktikum Akuntansi Perusahaan Jasa, Dagang dan Manufaktur', 'C', 'XII', 7, 'akn'),
(71, 'AL', 'Praktikum Akuntansi Lembaga/Instansi Pemerintah', 'C', 'XII', 4, 'akn'),
(72, 'W', 'Akuntansi Keuangan', 'C', 'XII', 6, 'akn'),
(73, 'AC', 'Komputer Akuntansi', 'C', 'XII', 5, 'akn'),
(74, 'U', 'Administrasi Pajak', 'C', 'XII', 3, 'akn'),
(75, 'Y', 'Produk Kreatif dan Kewirausahaan', 'C', 'XII', 8, 'akn'),
(76, 'Z', 'Bimbingan Konseling', 'C', 'X', 1, 'kntr'),
(77, 'Z', 'Bimbingan Konseling', 'C', 'XI', 1, 'kntr'),
(78, 'Z', 'Bimbingan Konseling', 'C', 'XII', 1, 'kntr'),
(79, 'Z', 'Bimbingan Konseling', 'C', 'X', 1, 'akn'),
(80, 'Z', 'Bimbingan Konseling', 'C', 'XI', 1, 'akn'),
(81, 'Z', 'Bimbingan Konseling', 'C', 'XII', 1, 'akn'),
(82, 'AJ', 'Bahasa Jawa', 'C', 'X', 2, 'kntr'),
(83, 'AJ', 'Bahasa Jawa', 'C', 'XI', 2, 'kntr'),
(84, 'AJ', 'Bahasa Jawa', 'C', 'X', 2, 'akn'),
(85, 'AJ', 'Bahasa Jawa', 'C', 'XI', 2, 'akn');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_matkul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `semester_matkul` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sks` int(11) NOT NULL,
  `id_jurusan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `semester_matkul`, `sks`, `id_jurusan`) VALUES
(3, 'ANIM', 'Animasi Komputer', '1', 2, 'TF'),
(4, 'JAR', 'Jaringan Komputer', '3', 3, 'TF'),
(5, 'LOG', 'Logika Informatika', '3', 3, 'TF');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_penjadwalan` int(11) NOT NULL,
  `id_ruangan` varchar(32) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_matkul` int(11) DEFAULT NULL,
  `hari` varchar(6) NOT NULL,
  `sesi` int(11) NOT NULL,
  `kode_jadwal` varchar(16) NOT NULL,
  `keterangan` varchar(64) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_penjadwalan`, `id_ruangan`, `id_dosen`, `id_matkul`, `hari`, `sesi`, `kode_jadwal`, `keterangan`, `jam_mulai`, `jam_selesai`) VALUES
(2485, 'HLM', NULL, NULL, 'Senin', 0, '-', 'kosong', '06:30:00', '07:10:00'),
(2486, 'HLM', NULL, NULL, 'Senin', 1, '-', 'kosong', '07:10:00', '07:50:00'),
(2487, 'HLM', NULL, NULL, 'Senin', 2, '-', 'kosong', '07:50:00', '08:30:00'),
(2488, 'HLM', NULL, NULL, 'Senin', 3, '-', 'kosong', '08:30:00', '09:10:00'),
(2489, 'HLM', NULL, NULL, 'Senin', 4, '-', 'kosong', '09:10:00', '09:50:00'),
(2490, 'HLM', NULL, NULL, 'Senin', 5, '-', 'kosong', '09:50:00', '10:30:00'),
(2491, 'HLM', NULL, NULL, 'Senin', 6, '-', 'kosong', '10:30:00', '11:10:00'),
(2492, 'HLM', NULL, NULL, 'Senin', 7, '-', 'kosong', '11:10:00', '11:50:00'),
(2493, 'HLM', NULL, NULL, 'Senin', 8, '-', 'kosong', '11:50:00', '12:30:00'),
(2494, 'HLM', NULL, NULL, 'Senin', 9, '-', 'kosong', '12:30:00', '13:10:00'),
(2495, 'HLM', NULL, NULL, 'Senin', 10, '-', 'kosong', '13:10:00', '13:50:00'),
(2496, 'HLM', NULL, NULL, 'Senin', 11, '-', 'kosong', '13:50:00', '14:30:00'),
(2497, 'HLM', NULL, NULL, 'Selasa', 0, '-', 'kosong', '06:30:00', '07:15:00'),
(2498, 'HLM', NULL, NULL, 'Selasa', 1, '-', 'kosong', '07:15:00', '08:00:00'),
(2499, 'HLM', NULL, NULL, 'Selasa', 2, '-', 'kosong', '08:00:00', '08:45:00'),
(2500, 'HLM', NULL, NULL, 'Selasa', 3, '-', 'kosong', '08:45:00', '09:30:00'),
(2501, 'HLM', NULL, NULL, 'Selasa', 4, '-', 'kosong', '09:30:00', '10:15:00'),
(2502, 'HLM', NULL, NULL, 'Selasa', 5, '-', 'kosong', '10:15:00', '11:00:00'),
(2503, 'HLM', NULL, NULL, 'Selasa', 6, '-', 'kosong', '11:00:00', '11:45:00'),
(2504, 'HLM', NULL, NULL, 'Selasa', 7, '-', 'kosong', '11:45:00', '12:30:00'),
(2505, 'HLM', NULL, NULL, 'Selasa', 8, '-', 'kosong', '12:30:00', '13:15:00'),
(2506, 'HLM', NULL, NULL, 'Selasa', 9, '-', 'kosong', '13:15:00', '14:00:00'),
(2507, 'HLM', NULL, NULL, 'Selasa', 10, '-', 'kosong', '14:00:00', '14:45:00'),
(2508, 'HLM', NULL, NULL, 'Selasa', 11, '-', 'kosong', '14:45:00', '15:30:00'),
(2509, 'HLM', NULL, NULL, 'Rabu', 0, '-', 'kosong', '06:30:00', '07:15:00'),
(2510, 'HLM', NULL, NULL, 'Rabu', 1, '-', 'kosong', '07:15:00', '08:00:00'),
(2511, 'HLM', NULL, NULL, 'Rabu', 2, '-', 'kosong', '08:00:00', '08:45:00'),
(2512, 'HLM', NULL, NULL, 'Rabu', 3, '-', 'kosong', '08:45:00', '09:30:00'),
(2513, 'HLM', NULL, NULL, 'Rabu', 4, '-', 'kosong', '09:30:00', '10:15:00'),
(2514, 'HLM', NULL, NULL, 'Rabu', 5, '-', 'kosong', '10:15:00', '11:00:00'),
(2515, 'HLM', NULL, NULL, 'Rabu', 6, '-', 'kosong', '11:00:00', '11:45:00'),
(2516, 'HLM', NULL, NULL, 'Rabu', 7, '-', 'kosong', '11:45:00', '12:30:00'),
(2517, 'HLM', NULL, NULL, 'Rabu', 8, '-', 'kosong', '12:30:00', '13:15:00'),
(2518, 'HLM', NULL, NULL, 'Rabu', 9, '-', 'kosong', '13:15:00', '14:00:00'),
(2519, 'HLM', NULL, NULL, 'Rabu', 10, '-', 'kosong', '14:00:00', '14:45:00'),
(2520, 'HLM', NULL, NULL, 'Rabu', 11, '-', 'kosong', '14:45:00', '15:30:00'),
(2521, 'HLM', NULL, NULL, 'Kamis', 0, '-', 'kosong', '06:30:00', '07:15:00'),
(2522, 'HLM', NULL, NULL, 'Kamis', 1, '-', 'kosong', '07:15:00', '08:00:00'),
(2523, 'HLM', NULL, NULL, 'Kamis', 2, '-', 'kosong', '08:00:00', '08:45:00'),
(2524, 'HLM', NULL, NULL, 'Kamis', 3, '-', 'kosong', '08:45:00', '09:30:00'),
(2525, 'HLM', NULL, NULL, 'Kamis', 4, '-', 'kosong', '09:30:00', '10:15:00'),
(2526, 'HLM', NULL, NULL, 'Kamis', 5, '-', 'kosong', '10:15:00', '11:00:00'),
(2527, 'HLM', NULL, NULL, 'Kamis', 6, '-', 'kosong', '11:00:00', '11:45:00'),
(2528, 'HLM', NULL, NULL, 'Kamis', 7, '-', 'kosong', '11:45:00', '12:30:00'),
(2529, 'HLM', NULL, NULL, 'Kamis', 8, '-', 'kosong', '12:30:00', '13:15:00'),
(2530, 'HLM', NULL, NULL, 'Kamis', 9, '-', 'kosong', '13:15:00', '14:00:00'),
(2531, 'HLM', NULL, NULL, 'Kamis', 10, '-', 'kosong', '14:00:00', '14:45:00'),
(2532, 'HLM', NULL, NULL, 'Kamis', 11, '-', 'kosong', '14:45:00', '15:30:00'),
(2533, 'HLM', NULL, NULL, 'Sabtu', 0, '-', 'kosong', '06:30:00', '07:05:00'),
(2534, 'HLM', NULL, NULL, 'Sabtu', 1, '-', 'kosong', '07:05:00', '07:40:00'),
(2535, 'HLM', NULL, NULL, 'Sabtu', 2, '-', 'kosong', '07:40:00', '08:15:00'),
(2536, 'HLM', NULL, NULL, 'Sabtu', 3, '-', 'kosong', '08:15:00', '08:50:00'),
(2537, 'HLM', NULL, NULL, 'Sabtu', 4, '-', 'kosong', '08:50:00', '09:25:00'),
(2538, 'HLM', NULL, NULL, 'Sabtu', 5, '-', 'kosong', '09:25:00', '10:00:00'),
(2539, 'HLM', NULL, NULL, 'Sabtu', 6, '-', 'kosong', '10:00:00', '10:35:00'),
(2540, 'HLM', NULL, NULL, 'Sabtu', 7, '-', 'kosong', '10:35:00', '11:10:00'),
(2541, 'HLM', NULL, NULL, 'Sabtu', 8, '-', 'kosong', '11:10:00', '11:45:00'),
(2542, 'HLM', NULL, NULL, 'Sabtu', 9, '-', 'kosong', '11:45:00', '12:20:00'),
(2543, 'HLM', NULL, NULL, 'Sabtu', 10, '-', 'kosong', '12:20:00', '12:55:00'),
(2544, 'HLM', NULL, NULL, 'Sabtu', 11, '-', 'kosong', '12:55:00', '13:30:00'),
(2545, 'HLM', NULL, NULL, 'Jum`at', 0, '-', 'kosong', '06:30:00', '07:05:00'),
(2546, 'HLM', NULL, NULL, 'Jum`at', 1, '-', 'kosong', '07:05:00', '07:40:00'),
(2547, 'HLM', NULL, NULL, 'Jum`at', 2, '-', 'kosong', '07:40:00', '08:15:00'),
(2548, 'HLM', NULL, NULL, 'Jum`at', 3, '-', 'kosong', '08:15:00', '08:50:00'),
(2549, 'HLM', NULL, NULL, 'Jum`at', 4, '-', 'kosong', '08:50:00', '09:25:00'),
(2550, 'HLM', NULL, NULL, 'Jum`at', 5, '-', 'kosong', '09:25:00', '10:00:00'),
(2551, 'HLM', NULL, NULL, 'Jum`at', 6, '-', 'kosong', '10:00:00', '10:35:00'),
(2552, 'HLM', NULL, NULL, 'Jum`at', 7, '-', 'kosong', '10:35:00', '11:10:00'),
(2553, 'HLM', NULL, NULL, 'Jum`at', 8, '-', 'kosong', '11:10:00', '11:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `request_jadwal`
--

CREATE TABLE `request_jadwal` (
  `id_request` int(10) NOT NULL,
  `id_dosen` varchar(10) NOT NULL,
  `hari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_jadwal`
--

INSERT INTO `request_jadwal` (`id_request`, `id_dosen`, `hari`) VALUES
(10, '5', 'Senin,Selasa,Rabu'),
(11, '4', 'Senin,Selasa,Kamis,Sabtu'),
(12, '8', 'Senin,Kamis,Jum`at'),
(13, '9', 'Rabu,Kamis'),
(14, '19', 'Senin,Selasa,Rabu,Kamis,Jum`at'),
(15, '22', 'Jum`at,Sabtu'),
(16, '10', 'Sabtu'),
(17, '11', 'Senin,Kamis,Sabtu'),
(18, '14', 'Senin,Rabu,Kamis'),
(19, '20', 'Jum`at,Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `req_jadwal`
--

CREATE TABLE `req_jadwal` (
  `id_request` int(10) NOT NULL,
  `id_dosen` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hari` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_jurusan` varchar(5) NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL,
  `ruanganXmatkul` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `id_jurusan`, `nama_ruangan`, `ruanganXmatkul`) VALUES
('HLM1', 'TF', 'Halim 1', ''),
('HLM2', 'TF', 'Halim 2', ''),
('HLM3', 'TF', 'Halim 3', ''),
('HLM4', 'TF', 'Halim 4', ''),
('HLM5', 'TF', 'Halim 5', '');

-- --------------------------------------------------------

--
-- Table structure for table `rumusan`
--

CREATE TABLE `rumusan` (
  `id_rumusan` int(11) NOT NULL,
  `id_dosen` int(5) NOT NULL,
  `hari_request` varchar(255) NOT NULL,
  `ruangan` mediumtext NOT NULL,
  `total` int(11) NOT NULL,
  `beban_kerja` int(11) NOT NULL,
  `hasil_rumusan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rumusan`
--

INSERT INTO `rumusan` (`id_rumusan`, `id_dosen`, `hari_request`, `ruangan`, `total`, `beban_kerja`, `hasil_rumusan`) VALUES
(184, 123, 'Senin,Selasa,Rabu,Kamis,Jum`at,Sabtu', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sks`
--

CREATE TABLE `sks` (
  `id_sks` int(20) NOT NULL,
  `hari` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `lama_sks` int(11) NOT NULL,
  `jam_mulai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sks`
--

INSERT INTO `sks` (`id_sks`, `hari`, `jumlah_sks`, `lama_sks`, `jam_mulai`) VALUES
(6, 'Senin', 9, 50, '08:00:00'),
(7, 'Selasa', 9, 50, '08:00:00'),
(8, 'Rabu', 9, 50, '08:00:00'),
(9, 'Kamis', 9, 50, '08:00:00'),
(10, 'Jum`at', 9, 50, '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_dosen`
--

CREATE TABLE `tugas_dosen` (
  `id_tugas` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_dosen` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_matkul` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_matkul` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_ruangan` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sisa_sks` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `sks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tugas_dosen`
--

INSERT INTO `tugas_dosen` (`id_tugas`, `id_dosen`, `id_matkul`, `kode_matkul`, `id_ruangan`, `sisa_sks`, `status`, `sks`) VALUES
('1', '1234', '3', 'ANIM', 'HLM1', 2, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_guru`
--

CREATE TABLE `tugas_guru` (
  `id_tugas` varchar(16) NOT NULL,
  `id_guru` varchar(16) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `kode_mapel` varchar(8) NOT NULL,
  `id_kelas` varchar(16) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `sisa_jam` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `beban_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tugas_guru`
--

INSERT INTO `tugas_guru` (`id_tugas`, `id_guru`, `id_mapel`, `kode_mapel`, `id_kelas`, `tahun_ajaran`, `sisa_jam`, `status`, `beban_jam`) VALUES
('10-74-XIIaknA', '10', '74', 'U', 'XIIaknA', '', 0, '1', 3),
('11-22-XIkntrA', '11', '22', 'AM', 'XIkntrA', '', 0, '1', 6),
('11-41-XaknA', '11', '41', 'H', 'XaknA', '', 0, '1', 3),
('11-43-XaknA', '11', '43', 'G', 'XaknA', '', 0, '1', 3),
('11-5-XkntrA', '11', '5', 'H', 'XkntrA', '', 0, '1', 3),
('11-7-XkntrA', '11', '7', 'G', 'XkntrA', '', 0, '1', 3),
('12-16-XIkntrA', '12', '16', 'A', 'XIkntrA', '', 0, '1', 3),
('12-53-XIaknA', '12', '53', 'A', 'XIaknA', '', 3, '0', 3),
('13-2-XkntrA', '13', '2', 'B', 'XkntrA', '', 0, '1', 2),
('13-38-XaknA', '13', '38', 'B', 'XaknA', '', 0, '1', 2),
('14-11-XkntrA', '14', '11', 'AF', 'XkntrA', '', 0, '1', 2),
('14-13-XkntrA', '14', '13', 'AI', 'XkntrA', '', 4, '0', 4),
('14-35-XIIkntrA', '14', '35', 'AP', 'XIIkntrA', '', 0, '1', 6),
('14-47-XaknA', '14', '47', 'AF', 'XaknA', '', 0, '1', 2),
('14-49-XaknA', '14', '49', 'AE', 'XaknA', '', 0, '1', 2),
('14-52-XaknA', '14', '52', 'AA', 'XaknA', '', 0, '1', 3),
('14-63-XIaknA', '14', '63', 'U', 'XIaknA', '', 0, '1', 3),
('14-74-XIIaknB', '14', '74', 'U', 'XIIaknB', '', 0, '1', 3),
('15-26-XIkntrA', '15', '26', 'Y', 'XIkntrA', '', 0, '1', 7),
('15-64-XIaknA', '15', '64', 'Y', 'XIaknA', '', 0, '1', 7),
('16-30-XIIkntrA', '16', '30', 'D', 'XIIkntrA', '', 0, '1', 4),
('16-68-XIIaknA', '16', '68', 'D', 'XIIaknA', '', 0, '1', 4),
('16-68-XIIaknB', '16', '68', 'D', 'XIIaknB', '', 0, '1', 4),
('17-59-XIaknA', '17', '59', 'AK', 'XIaknA', '', 0, '1', 6),
('17-60-XIaknA', '17', '60', 'AL', 'XIaknA', '', 0, '1', 4),
('17-61-XIaknA', '17', '61', 'W', 'XIaknA', '', 0, '1', 6),
('17-71-XIIaknA', '17', '71', 'AL', 'XIIaknA', '', 4, '0', 4),
('17-71-XIIaknB', '17', '71', 'AL', 'XIIaknB', '', 0, '1', 4),
('17-73-XIIaknB', '17', '73', 'AC', 'XIIaknB', '', 0, '1', 5),
('18-1-XkntrA', '18', '1', 'A', 'XkntrA', '', 3, '0', 3),
('18-37-XaknA', '18', '37', 'A', 'XaknA', '', 3, '0', 3),
('19-76-XkntrA', '19', '76', 'Z', 'XkntrA', '', 0, '1', 1),
('19-77-XIkntrA', '19', '77', 'Z', 'XIkntrA', '', 0, '1', 1),
('19-78-XIIkntrA', '19', '78', 'Z', 'XIIkntrA', '', 0, '1', 1),
('19-79-XaknA', '19', '79', 'Z', 'XaknA', '', 0, '1', 1),
('19-80-XIaknA', '19', '80', 'Z', 'XIaknA', '', 0, '1', 1),
('19-81-XIIaknA', '19', '81', 'Z', 'XIIaknA', '', 0, '1', 1),
('19-81-XIIaknB', '19', '81', 'Z', 'XIIaknB', '', 0, '1', 1),
('2-27-XIIkntrA', '2', '27', 'A', 'XIIkntrA', '', 0, '1', 3),
('2-65-XIIaknA', '2', '65', 'A', 'XIIaknA', '', 0, '1', 3),
('2-65-XIIaknB', '2', '65', 'A', 'XIIaknB', '', 0, '1', 3),
('20-45-XaknA', '20', '45', 'S', 'XaknA', '', 0, '1', 3),
('20-9-XkntrA', '20', '9', 'S', 'XkntrA', '', 0, '1', 3),
('21-17-XIkntrA', '21', '17', 'B', 'XIkntrA', '', 0, '1', 2),
('21-28-XIIkntrA', '21', '28', 'B', 'XIIkntrA', '', 0, '1', 2),
('21-54-XIaknA', '21', '54', 'B', 'XIaknA', '', 0, '1', 2),
('21-66-XIIaknA', '21', '66', 'B', 'XIIaknA', '', 0, '1', 2),
('21-66-XIIaknB', '21', '66', 'B', 'XIIaknB', '', 0, '1', 2),
('22-36-XIIkntrA', '22', '36', 'Y', 'XIIkntrA', '', 0, '1', 8),
('23-50-XaknA', '23', '50', 'AD', 'XaknA', '', 0, '1', 3),
('23-51-XaknA', '23', '51', 'N', 'XaknA', '', 0, '1', 5),
('23-62-XIaknA', '23', '62', 'AC', 'XIaknA', '', 0, '1', 5),
('23-75-XIIaknA', '23', '75', 'Y', 'XIIaknA', '', 0, '1', 8),
('23-75-XIIaknB', '23', '75', 'Y', 'XIIaknB', '', 2, '0', 8),
('24-23-XIkntrA', '24', '23', 'AN', 'XIkntrA', '', 0, '1', 6),
('24-24-XIkntrA', '24', '24', 'AO', 'XIkntrA', '', 0, '1', 6),
('24-32-XIIkntrA', '24', '32', 'AM', 'XIIkntrA', '', 0, '1', 7),
('24-33-XIIkntrA', '24', '33', 'AN', 'XIIkntrA', '', 3, '0', 6),
('24-34-XIIkntrA', '24', '34', 'AO', 'XIIkntrA', '', 2, '0', 6),
('25-82-XkntrA', '25', '82', 'AJ', 'XkntrA', '', 0, '1', 2),
('25-83-XIkntrA', '25', '83', 'AJ', 'XIkntrA', '', 2, '0', 2),
('25-84-XaknA', '25', '84', 'AJ', 'XaknA', '', 0, '1', 2),
('25-85-XIaknA', '25', '85', 'AJ', 'XIaknA', '', 0, '1', 2),
('4-70-XIIaknA', '4', '70', 'AK', 'XIIaknA', '', 0, '1', 7),
('4-70-XIIaknB', '4', '70', 'AK', 'XIIaknB', '', 0, '1', 7),
('4-72-XIIaknA', '4', '72', 'W', 'XIIaknA', '', 0, '1', 6),
('4-72-XIIaknB', '4', '72', 'W', 'XIIaknB', '', 3, '0', 6),
('4-73-XIIaknA', '4', '73', 'AC', 'XIIaknA', '', 0, '1', 5),
('5-18-XIkntrA', '5', '18', 'C', 'XIkntrA', '', 1, '0', 3),
('5-29-XIIkntrA', '5', '29', 'C', 'XIIkntrA', '', 0, '1', 2),
('5-3-XkntrA', '5', '3', 'C', 'XkntrA', '', 0, '1', 4),
('5-39-XaknA', '5', '39', 'C', 'XaknA', '', 0, '1', 4),
('5-55-XIaknA', '5', '55', 'C', 'XIaknA', '', 0, '1', 3),
('5-67-XIIaknA', '5', '67', 'C', 'XIIaknA', '', 0, '1', 2),
('5-67-XIIaknB', '5', '67', 'C', 'XIIaknB', '', 0, '1', 2),
('6-20-XIkntrA', '6', '20', 'F', 'XIkntrA', '', 0, '1', 3),
('6-31-XIIkntrA', '6', '31', 'F', 'XIIkntrA', '', 0, '1', 4),
('6-42-XaknA', '6', '42', 'F', 'XaknA', '', 0, '1', 3),
('6-57-XIaknA', '6', '57', 'F', 'XIaknA', '', 0, '1', 3),
('6-6-XkntrA', '6', '6', 'F', 'XkntrA', '', 0, '1', 3),
('6-69-XIIaknA', '6', '69', 'F', 'XIIaknA', '', 0, '1', 4),
('6-69-XIIaknB', '6', '69', 'F', 'XIIaknB', '', 0, '1', 4),
('7-10-XkntrA', '7', '10', 'J', 'XkntrA', '', 0, '1', 2),
('7-14-XkntrA', '7', '14', 'AG', 'XkntrA', '', 0, '1', 5),
('7-15-XkntrA', '7', '15', 'AH', 'XkntrA', '', 0, '1', 4),
('7-25-XIkntrA', '7', '25', 'AP', 'XIkntrA', '', 2, '0', 6),
('7-46-XaknA', '7', '46', 'J', 'XaknA', '', 0, '1', 2),
('8-12-XkntrA', '8', '12', 'T', 'XkntrA', '', 0, '1', 2),
('8-19-XIkntrA', '8', '19', 'D', 'XIkntrA', '', 1, '0', 4),
('8-4-XkntrA', '8', '4', 'D', 'XkntrA', '', 0, '1', 4),
('8-40-XaknA', '8', '40', 'D', 'XaknA', '', 0, '1', 4),
('8-48-XaknA', '8', '48', 'T', 'XaknA', '', 0, '1', 2),
('8-56-XIaknA', '8', '56', 'D', 'XIaknA', '', 0, '1', 4),
('9-21-XIkntrA', '9', '21', 'I', 'XIkntrA', '', 0, '1', 2),
('9-44-XaknA', '9', '44', 'I', 'XaknA', '', 0, '1', 2),
('9-58-XIaknA', '9', '58', 'I', 'XIaknA', '', 0, '1', 2),
('9-8-XkntrA', '9', '8', 'I', 'XkntrA', '', 0, '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `level`) VALUES
(1, 'alfiandy123malib@gmail.com', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jadwal_khusus`
--
ALTER TABLE `jadwal_khusus`
  ADD PRIMARY KEY (`id_jadwal_khusus`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_penjadwalan`);

--
-- Indexes for table `request_jadwal`
--
ALTER TABLE `request_jadwal`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_guru` (`id_dosen`);

--
-- Indexes for table `req_jadwal`
--
ALTER TABLE `req_jadwal`
  ADD PRIMARY KEY (`id_request`),
  ADD UNIQUE KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `rumusan`
--
ALTER TABLE `rumusan`
  ADD PRIMARY KEY (`id_rumusan`);

--
-- Indexes for table `sks`
--
ALTER TABLE `sks`
  ADD PRIMARY KEY (`id_sks`);

--
-- Indexes for table `tugas_dosen`
--
ALTER TABLE `tugas_dosen`
  ADD PRIMARY KEY (`id_tugas`),
  ADD UNIQUE KEY `id_dosen` (`id_dosen`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`),
  ADD UNIQUE KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `tugas_guru`
--
ALTER TABLE `tugas_guru`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`kode_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal_khusus`
--
ALTER TABLE `jadwal_khusus`
  MODIFY `id_jadwal_khusus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_penjadwalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2554;

--
-- AUTO_INCREMENT for table `request_jadwal`
--
ALTER TABLE `request_jadwal`
  MODIFY `id_request` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `req_jadwal`
--
ALTER TABLE `req_jadwal`
  MODIFY `id_request` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `rumusan`
--
ALTER TABLE `rumusan`
  MODIFY `id_rumusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `sks`
--
ALTER TABLE `sks`
  MODIFY `id_sks` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
