-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 04:46 AM
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
('ADM01', 'Amirullah', 'amirullah@gmail.com', '089604232229', 'Puentet', '123'),
('ADM02', 'Al Faiz Akbar', 'all@gmail.com', '081264295094', 'panggoi', '123'),
('ADM03', 'Farid Haiqal', 'fardi@gmail.com', '081234567877', 'Jomblang', '123');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

  CREATE TABLE `artikel` (
    `id_artikel` varchar(5) NOT NULL,
    `judul` varchar(255) NOT NULL,
    `isi` text NOT NULL,
    `tanggal_publish` datetime DEFAULT current_timestamp(),
    `deskripsi_singkat` varchar(255) DEFAULT NULL,
    `status` enum('draft','publish') DEFAULT 'draft',
    `id_admin` varchar(5) DEFAULT NULL,
    `id_tipe` varchar(6) DEFAULT NULL,
    `gambar` varchar(50) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `tanggal_publish`, `deskripsi_singkat`, `status`, `id_admin`, `id_tipe`, `gambar`) VALUES
('A0001', 'Keindahan Gunung Hijau di Aceh', 'Gunung Hijau di Aceh adalah salah satu destinasi wisata alam yang mempesona dengan keindahan panorama pegunungan yang hijau dan udara yang sejuk. Potensi ekowisatanya sangat besar dan terus dikembangkan oleh pemerintah daerah.\n\nGunung Hijau terkenal dengan pemandangannya yang menakjubkan. Dari puncaknya, wisatawan dapat menyaksikan hamparan hutan tropis yang asri, dihiasi dengan kabut tipis yang membuat suasana terasa magis, terutama saat matahari terbit. Jalur pendakian Gunung Hijau cukup menantang, tetapi masih cocok untuk pendaki pemula yang ingin menikmati keindahan alam.\n\nSelain keindahan alamnya, Gunung Hijau juga menjadi habitat bagi berbagai flora dan fauna khas Aceh, termasuk beberapa tanaman endemik yang jarang ditemukan di daerah lain. Potensi ini menjadi daya tarik bagi para peneliti dan pencinta alam untuk mengeksplorasi kekayaan hayati yang ada.\n\nUntuk mendukung pariwisata berkelanjutan, pemerintah daerah telah membangun jalur pendakian yang aman, menyediakan tempat peristirahatan bagi para pendaki, serta mempromosikan konsep ekowisata yang bertanggung jawab. Para pengunjung diajak untuk selalu menjaga kebersihan, tidak merusak tanaman, serta menghormati adat dan budaya lokal yang masih kuat di kawasan ini.\n\nGunung Hijau juga menjadi tempat favorit bagi para fotografer alam untuk mengabadikan panorama menakjubkan, terutama saat sunrise atau sunset. Banyak pengunjung yang memanfaatkan momen ini untuk berkemah dan menikmati suasana malam di tengah hutan yang masih alami.\n\nBagi masyarakat lokal, Gunung Hijau memiliki nilai spiritual yang penting. Banyak cerita legenda yang berkembang di kalangan masyarakat setempat, yang menambah nilai budaya dan sejarah kawasan ini. Oleh karena itu, para wisatawan diharapkan untuk selalu menghormati kearifan lokal dan menjaga ketertiban selama berada di kawasan Gunung Hijau.\n\nDengan potensi wisata dan kekayaan alam yang dimilikinya, Gunung Hijau di Aceh berpeluang besar untuk menjadi salah satu destinasi wisata unggulan di Indonesia. Namun, hal ini perlu dibarengi dengan kesadaran kolektif untuk menjaga kelestarian alam agar keindahan Gunung Hijau tetap dapat dinikmati oleh generasi mendatang.', '2025-06-11 00:00:00', 'Gunung Hijau di Aceh, destinasi alam mempesona dengan panorama hijau dan udara sejuk.', '', 'ADM01', 'TP0001', 'img/gunung.png'),
('A0002', 'Menjaga Kebersihan Pantai Kita', 'Pantai adalah salah satu aset alam yang sangat berharga. Selain sebagai tempat wisata, pantai juga memiliki peran penting dalam ekosistem laut. Sayangnya, banyak pantai yang tercemar oleh sampah, terutama plastik, yang berdampak buruk pada biota laut dan lingkungan sekitar.\r\n\r\nMenjaga kebersihan pantai bukan hanya tanggung jawab pemerintah, tapi juga kita sebagai masyarakat. Salah satu langkah yang bisa kita lakukan adalah tidak membuang sampah sembarangan saat berkunjung ke pantai. Bawalah kembali sampah ke tempat asal jika tidak tersedia tempat sampah di lokasi.\r\n\r\nSelain itu, kita juga bisa mengikuti kegiatan bersih-bersih pantai yang sering diadakan oleh komunitas lingkungan. Ini tidak hanya membantu menjaga kebersihan, tapi juga meningkatkan kesadaran bersama akan pentingnya menjaga alam.\r\n\r\nPenting juga untuk mengurangi penggunaan plastik sekali pakai. Gunakan botol minum, tas belanja, dan wadah makanan yang dapat digunakan berulang kali. Dengan mengurangi plastik, kita sudah berkontribusi besar dalam menjaga laut dari pencemaran.\r\n\r\nDengan langkah-langkah sederhana namun konsisten, kita bisa membuat perubahan besar. Mari kita jaga kebersihan pantai agar keindahannya tetap lestari untuk dinikmati generasi mendatang.', '2025-06-12 00:00:00', 'Langkah-langkah sederhana untuk menjaga kebersihan pantai dan mengurangi sampah plastik di laut.', 'publish', 'ADM01', 'TP0002', 'img/pantai.jpg'),
('A0003', 'Pelestarian Hutan Tropis Sumatra', 'Hutan tropis Sumatra merupakan salah satu kawasan hutan yang paling penting di dunia karena menyimpan keanekaragaman hayati yang sangat tinggi. Hutan ini menjadi habitat bagi spesies langka seperti harimau sumatra, gajah sumatra, dan orangutan. Selain itu, hutan tropis ini juga berperan sebagai penyerap karbon alami dan pengatur iklim regional. Sayangnya, deforestasi dan konversi lahan menjadi perkebunan telah menyebabkan degradasi ekosistem secara masif. Pelestarian hutan tropis Sumatra harus dilakukan secara komprehensif melalui program reboisasi, perlindungan hukum, edukasi masyarakat lokal, dan dukungan dari lembaga konservasi global. Keterlibatan aktif masyarakat menjadi kunci sukses pelestarian, karena mereka yang tinggal di sekitar hutan memiliki peran strategis dalam menjaga kelestariannya. Hutan tropis ini bukan hanya milik Sumatra, tapi juga aset dunia yang harus dijaga bersama demi masa depan bumi.', '2025-06-12 00:00:00', 'Hutan tropis Sumatra tidak hanya menjadi rumah bagi flora dan fauna langka, tetapi juga memainkan peran penting dalam menyeimbangkan ekosistem bumi. Artikel ini menjelaskan secara mendalam ancaman yang dihadapi hutan ini, serta berbagai strategi pelestari', 'publish', 'ADM02', 'TP0001', 'img/hutan.jpg'),
('A0004', 'Ekowisata Laut yang Ramah Lingkungan', 'Ekowisata laut adalah bentuk pariwisata yang bertanggung jawab dan berkelanjutan, di mana wisatawan tidak hanya menikmati keindahan laut, tetapi juga ikut berperan aktif dalam pelestarian lingkungan. Kawasan seperti taman laut dan terumbu karang kini menjadi destinasi wisata yang menekankan pentingnya menjaga ekosistem bawah laut. Aktivitas seperti snorkeling dan diving bisa menjadi sarana edukasi jika dilakukan dengan benar, tanpa menyentuh karang atau memberi makan ikan. Pemerintah dan pelaku industri pariwisata harus bekerja sama menyusun regulasi dan membatasi jumlah wisatawan di kawasan sensitif. Masyarakat lokal pun perlu diberdayakan sebagai pengelola kawasan agar ekonomi tetap berjalan sambil menjaga lingkungan. Ekowisata laut terbukti mampu menjadi solusi win-win: melestarikan lingkungan sekaligus meningkatkan kesejahteraan penduduk pesisir.', '2025-06-12 00:00:00', 'Ekowisata laut bukan sekadar perjalanan ke pantai dan laut, tetapi gerakan yang menyatukan pelestarian alam dengan pemberdayaan masyarakat. Artikel ini mengulas bagaimana wisata berkelanjutan dapat dilakukan tanpa merusak terumbu karang dan ekosistem laut', 'publish', 'ADM02', 'TP0003', 'img/ekowisata.jpg'),
('A0005', 'Pertanian Organik untuk Masa Depan', 'Pertanian organik menjadi solusi penting dalam menghadapi tantangan krisis lingkungan dan pangan. Dibandingkan dengan pertanian konvensional, metode organik tidak menggunakan pupuk dan pestisida kimia sintetis, melainkan mengandalkan bahan alami seperti kompos dan pestisida nabati. Cara ini tidak hanya menjaga kesuburan tanah, tetapi juga memelihara kesehatan ekosistem pertanian secara keseluruhan. Selain itu, produk organik cenderung lebih aman dan sehat untuk dikonsumsi karena bebas dari residu kimia. Para petani organik juga diajak untuk melakukan rotasi tanaman, diversifikasi tanaman, dan penggunaan benih lokal. Pertanian organik juga membuka peluang ekonomi baru dengan harga jual yang lebih tinggi dan pasar ekspor yang luas. Namun, tantangan tetap ada, seperti biaya awal yang tinggi dan keterbatasan pengetahuan. Maka dari itu, diperlukan dukungan kebijakan dan pelatihan bagi petani agar bisa beralih secara bertahap ke pertanian berkelanjutan.', '2025-06-12 00:00:00', 'Pertanian organik menjadi harapan baru dalam menciptakan sistem pangan yang sehat dan ramah lingkungan. Artikel ini mengulas manfaatnya secara mendalam, baik dari sisi ekologi, kesehatan, hingga peluang ekonomi bagi petani dan konsumen.', 'publish', 'ADM02', 'TP0001', 'img/organik.jpg'),
('A0006', 'Mengurangi Sampah Plastik di Sungai', 'Sampah plastik telah menjadi masalah serius yang mencemari sungai-sungai di Indonesia. Plastik yang dibuang sembarangan tidak hanya merusak pemandangan, tetapi juga mengganggu aliran sungai dan menyebabkan banjir. Yang lebih parah, mikroplastik yang terbentuk dari degradasi sampah ini dapat masuk ke dalam rantai makanan manusia melalui air dan ikan yang tercemar. Untuk mengatasi masalah ini, berbagai upaya dilakukan mulai dari edukasi masyarakat, program bank sampah, hingga kampanye pelarangan plastik sekali pakai. Pemerintah daerah juga mulai memasang jaring penyaring sampah di muara sungai dan membentuk satuan tugas kebersihan sungai. Masyarakat diharapkan untuk lebih bijak dalam menggunakan plastik dan aktif memilah sampah dari rumah. Gerakan kecil dari setiap individu akan menghasilkan perubahan besar untuk sungai yang lebih bersih dan sehat.', '2025-06-12 00:00:00', 'Sungai adalah sumber kehidupan, namun kini terancam oleh pencemaran plastik. Artikel ini membahas dampak buruk sampah plastik di sungai serta solusi nyata yang bisa dilakukan masyarakat dan pemerintah secara bersama-sama.', 'publish', 'ADM02', 'TP0001', 'img/plastik.jpg'),
('A0007', 'Perlindungan Satwa Langka di Indonesia', 'Indonesia dikenal sebagai negara megabiodiversitas yang memiliki berbagai jenis satwa langka, seperti harimau sumatra, badak jawa, orangutan, anoa, dan burung cenderawasih. Sayangnya, populasi satwa-satwa tersebut terus menurun akibat perburuan liar, perdagangan ilegal, dan rusaknya habitat alami mereka. Untuk melindungi satwa langka ini, pemerintah bersama lembaga konservasi telah mendirikan taman nasional, suaka margasatwa, dan pusat rehabilitasi. Pendidikan konservasi juga mulai diperkenalkan sejak usia dini untuk membentuk kesadaran generasi muda akan pentingnya menjaga keberagaman hayati. Selain itu, teknologi seperti kamera jebak dan pelacak GPS digunakan untuk memantau pergerakan satwa dan mengurangi konflik dengan manusia. Perlindungan satwa tidak hanya tentang menyelamatkan hewan dari kepunahan, tapi juga menjaga keseimbangan alam yang menjadi penyangga hidup manusia.', '2025-06-12 00:00:00', 'Satwa langka Indonesia terancam punah jika tidak segera dilindungi. Artikel ini membahas penyebab kepunahan, langkah-langkah konservasi yang dilakukan, serta peran masyarakat dalam menyelamatkan kekayaan fauna Nusantara.', 'publish', 'ADM02', 'TP0004', 'img/hewanlangka.jpg');

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
('KG001', 'Workshop Pengelolaan Sampah', 'Pelajari cara efektif mengelola sampah rumah tangga dan mengurangi limbah plastik. Dalam workshop ini, peserta akan diberikan pelatihan praktis mengenai pengelolaan sampah organik dan anorganik, termasuk bagaimana memilah, mendaur ulang, dan mengurangi sampah plastik. Selain itu, acara ini juga akan menghadirkan pembicara dari komunitas lingkungan setempat.\r\nKegiatan ini bertujuan untuk meningkatkan kesadaran masyarakat tentang pentingnya menjaga kebersihan lingkungan dan menciptakan lingkungan yang sehat. Peserta diharapkan dapat menerapkan pengetahuan yang didapatkan dalam kehidupan sehari-hari.', '2025-07-15', 'img/ekowisata.jpg', 'Al Faiz Akbar Thaib', 'Lapangan iraq'),
('KG002', 'Penanaman Pohon Massal', 'Bergabunglah dalam aksi penanaman pohon massal yang bertujuan untuk menghijaukan kembali kawasan yang mengalami kerusakan lingkungan akibat urbanisasi dan penebangan liar. Kegiatan ini mengajak masyarakat, pelajar, dan komunitas lingkungan untuk bersama-sama menanam ratusan bibit pohon di area yang telah ditentukan oleh panitia.\r\n\r\nSelain kegiatan penanaman, acara ini juga akan diisi dengan edukasi tentang pentingnya pohon dalam menjaga ekosistem, mencegah banjir, serta memperbaiki kualitas udara. Setiap peserta akan diberikan bibit pohon, perlengkapan menanam, dan sertifikat sebagai bentuk apresiasi atas kontribusi mereka dalam pelestarian lingkungan.\r\n\r\nDengan semangat gotong royong dan kepedulian terhadap alam, kegiatan ini diharapkan mampu menumbuhkan kesadaran kolektif untuk menjaga kelestarian bumi demi generasi mendatang.', '2025-08-01', 'img/ekowisata.jpg', 'Amirullah', 'Matang kuli'),
('KG003', 'Kampanye Kurangi Plastik', 'Kampanye Kurangi Plastik merupakan gerakan sosial untuk meningkatkan kesadaran masyarakat akan dampak buruk penggunaan plastik sekali pakai terhadap lingkungan. Kegiatan ini mengajak warga kota untuk mulai menerapkan gaya hidup ramah lingkungan dengan mengurangi penggunaan kantong plastik, botol sekali pakai, dan sedotan plastik.\r\n\r\nDalam kampanye ini, peserta akan mendapatkan informasi mendalam mengenai alternatif produk ramah lingkungan, seperti tas kain, botol minum stainless, dan wadah makanan reusable. Berbagai aktivitas menarik seperti pembagian tote bag gratis, workshop daur ulang plastik, serta sesi berbagi pengalaman dari komunitas zero waste juga akan diselenggarakan.\r\n\r\nDengan diadakannya kampanye ini, diharapkan terjadi perubahan perilaku konsumsi masyarakat menuju pola yang lebih berkelanjutan, serta memperkuat kolaborasi antar komunitas untuk mewujudkan lingkungan yang lebih bersih dan sehat.', '2025-08-20', 'img/ekowisata.jpg', 'Farid Haiqal', 'Pantai ujongblang');

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
-- Dumping data for table `tipe_artikel`
--

INSERT INTO `tipe_artikel` (`id_tipe`, `nama_tipe`, `deskripsi`) VALUES
('TP0001', 'Alam', 'Artikel yang membahas tentang keindahan dan fenomena alam'),
('TP0002', 'Lingkungan', 'Artikel yang berkaitan dengan isu lingkungan dan pelestarian'),
('TP0003', 'Ekowisata', 'Artikel tentang pariwisata ramah lingkungan'),
('TP0004', 'Hewan Langka', 'Artikel mengenai hewan langka dan upaya konservasinya');

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
