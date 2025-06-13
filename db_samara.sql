-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 05:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_samara`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(5) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nomor_hp` varchar(13) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `nomor_hp`, `alamat`, `password`) VALUES
('adm01', 'Amirullah', 'amirullah@gmail.com', '089604232229', 'Puentet', '123'),
('adm02', 'Al Faiz Akbar', 'all@gmail.com', '081264295094', 'panggoi', '123');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_publish` datetime DEFAULT current_timestamp(),
  `deskripsi_singkat` varchar(255) DEFAULT NULL,
  `status` enum('draft','publish') DEFAULT 'draft',
  `id_admin` varchar(5) DEFAULT NULL,
  `id_tipe` varchar(6) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` varchar(5) NOT NULL,
  `nama_kegiatan` varchar(50) DEFAULT NULL,
  `deskripsi_kegiatan` text DEFAULT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `ketua_pelaksana` varchar(30) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `deskripsi_kegiatan`, `tanggal_kegiatan`, `thumbnail`, `ketua_pelaksana`, `tempat`) VALUES
('kg001', 'Workshop Pengelolaan Sampah', 'Pelajari cara efektif mengelola sampah rumah tangga dan mengurangi limbah plastik. Dalam workshop ini, peserta akan diberikan pelatihan praktis mengenai pengelolaan sampah organik dan anorganik, termasuk bagaimana memilah, mendaur ulang, dan mengurangi sampah plastik. Selain itu, acara ini juga akan menghadirkan pembicara dari komunitas lingkungan setempat.\r\nKegiatan ini bertujuan untuk meningkatkan kesadaran masyarakat tentang pentingnya menjaga kebersihan lingkungan dan menciptakan lingkungan yang sehat. Peserta diharapkan dapat menerapkan pengetahuan yang didapatkan dalam kehidupan sehari-hari.', '2025-07-15', 'img/ekowisata.jpg', 'Al Faiz Akbar Thaib', 'Lapangan iraq'),
('kg002', 'Penanaman Pohon Massal', 'Bergabunglah dalam aksi penanaman pohon massal yang bertujuan untuk menghijaukan kembali kawasan yang mengalami kerusakan lingkungan akibat urbanisasi dan penebangan liar. Kegiatan ini mengajak masyarakat, pelajar, dan komunitas lingkungan untuk bersama-sama menanam ratusan bibit pohon di area yang telah ditentukan oleh panitia.\r\n\r\nSelain kegiatan penanaman, acara ini juga akan diisi dengan edukasi tentang pentingnya pohon dalam menjaga ekosistem, mencegah banjir, serta memperbaiki kualitas udara. Setiap peserta akan diberikan bibit pohon, perlengkapan menanam, dan sertifikat sebagai bentuk apresiasi atas kontribusi mereka dalam pelestarian lingkungan.\r\n\r\nDengan semangat gotong royong dan kepedulian terhadap alam, kegiatan ini diharapkan mampu menumbuhkan kesadaran kolektif untuk menjaga kelestarian bumi demi generasi mendatang.', '2025-08-01', 'img/ekowisata.jpg', 'Amirullah', 'Matang kuli'),
('kg003', 'Kampanye Kurangi Plastik', 'Kampanye Kurangi Plastik merupakan gerakan sosial untuk meningkatkan kesadaran masyarakat akan dampak buruk penggunaan plastik sekali pakai terhadap lingkungan. Kegiatan ini mengajak warga kota untuk mulai menerapkan gaya hidup ramah lingkungan dengan mengurangi penggunaan kantong plastik, botol sekali pakai, dan sedotan plastik.\r\n\r\nDalam kampanye ini, peserta akan mendapatkan informasi mendalam mengenai alternatif produk ramah lingkungan, seperti tas kain, botol minum stainless, dan wadah makanan reusable. Berbagai aktivitas menarik seperti pembagian tote bag gratis, workshop daur ulang plastik, serta sesi berbagi pengalaman dari komunitas zero waste juga akan diselenggarakan.\r\n\r\nDengan diadakannya kampanye ini, diharapkan terjadi perubahan perilaku konsumsi masyarakat menuju pola yang lebih berkelanjutan, serta memperkuat kolaborasi antar komunitas untuk mewujudkan lingkungan yang lebih bersih dan sehat.', '2025-08-20', 'img/ekowisata.jpg', 'Farid Haiqal', 'Pantai ujongblang');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_artikel`
--

CREATE TABLE `tipe_artikel` (
  `id_tipe` varchar(6) NOT NULL,
  `nama_tipe` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tipe_artikel`
--
ALTER TABLE `tipe_artikel`
  ADD PRIMARY KEY (`id_tipe`),
  ADD UNIQUE KEY `nama_tipe` (`nama_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_artikel` (`id_tipe`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
