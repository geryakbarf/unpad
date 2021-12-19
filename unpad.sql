-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 01:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unpad`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankkata`
--

CREATE TABLE `bankkata` (
  `kata` char(30) NOT NULL,
  `sentimen` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankkata`
--

INSERT INTO `bankkata` (`kata`, `sentimen`) VALUES
('anjink', 'negatif'),
('bajing', 'negatif'),
('souka', 'netral'),
('sugoi', 'positif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `keterangan`) VALUES
(1, 'pendidikan'),
(2, 'alumni'),
(3, 'mahasiswa'),
(4, 'penerimaan'),
(5, 'penelitian');

-- --------------------------------------------------------

--
-- Table structure for table `kontensosmed`
--

CREATE TABLE `kontensosmed` (
  `idKonten` int(11) NOT NULL,
  `namaAkun` varchar(50) NOT NULL,
  `namaPengguna` varchar(50) NOT NULL,
  `tanggalPosting` date NOT NULL,
  `isiKonten` text NOT NULL,
  `jumlahLike` int(11) NOT NULL,
  `sosialMedia` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontensosmed`
--

INSERT INTO `kontensosmed` (`idKonten`, `namaAkun`, `namaPengguna`, `tanggalPosting`, `isiKonten`, `jumlahLike`, `sosialMedia`) VALUES
(1469546100, 'calondrhsukses', 'bubbles²²', '2021-12-11', '@angga_fzn Pendidikan. Bisa lulus semua ujian tulis ataupun praktek, bisa lulus sebagai siswa berprestasi, bisa lulus dengan nilai memuaskan dan terbaik, bisa lolos seleksi ke perguruan tinggi, dan bisa liat senyum bapak ibu yang bangga liat aku dapet jurusan impian di UNPAD. Aamiin..', 6, 'Twitter'),
(1470363121, 'nafizabillqis', '????????Kang Yeyent???????? ????Indonesia?????????', '2021-12-13', '???????? *Santri Goes to Campus* ???????? \n\nSudah saatnya bagi sahabat kita, santri-santri baik alumni pesantren/ pelajar tingkat akhir Madrasah Aliyah ataupun santri/pelajar yg sekolah umum(SLTA/SMK) utk melanjutkan kuliah di UI , ITB, Unpad dan PTN Favorit lainnya\n@Alfanny1926 @FixJakarta https://t.co/cdUanFkuVc', 8, 'Twitter'),
(1470668631, 'unpad', 'Unpad', '2021-12-14', 'Ayo mahasiswa Unpad, isi Surat Keterangan Pendamping Ijazah (SKPI) \n\nTutorial pengisian https://t.co/t5sVgmicHy \n\nUntuk informasi selanjutnya, hubungi unit kerja pengelola kemahasiswaan fakultas atau https://t.co/1B3YJWIRgF\n\nDirektorat Kemahasiswaan dan Hubungan Alumni Unpad https://t.co/U8NaxiaRH0', 2, 'Twitter'),
(1470815288, 'fyalvs0n', 'Li♡⁎⁺˳✧', '2021-12-14', 'kurang jauh nih gue ambil ekstrak buat bahan penelitian skripsi ke unpad bulak balik????', 1, 'Twitter'),
(1471107369, 'imbangimedia', '#PKIInginMUIDibubarkan', '2021-12-15', 'Mahasiswa sebaiknya mulai berpikir untuk menduduki MK agar  mereka mengabulkan JR ini. Kalau tidak, #OligarkiLaknatullah bakal menghancurkan negeri kalian. Kalianlah harapan rakyat.  Cc @aliansibem_si @BEMUI_Official @bemkmipb @bemkm_ugm @bem_unpad @BEMUNJ_OFFICIAL @sbmitb https://t.co/W0MOKKo9qb https://t.co/mMidNS7NZH', 1, 'Twitter'),
(1471140453, 'Heydebu', 'Bukan angel', '2021-12-15', '@anak_unpad @billie9eulis @DraftAnakUnpad Setuju. Makannya saya mau banget masuk pendidikan fisika. Udah 4 kali milih jurusan ini, eh ditolak mulu.\nTaunya emang jodohnya di ungpad segala.', 0, 'Twitter'),
(1471336347, 'sigmame_', '✨', '2021-12-16', '@worksfess Aku pribadi lebih susah skripsian karena dos penguji jahat bgttttt Alhamdulillah aku kerja ditawarin sama alumni unpad jadi bisa dibilang ga sesusah paa skripsi.', 1, 'Twitter'),
(1471357751, 'anak_unpad', 'IG : anak.unpad', '2021-12-16', 'Kalau Bab IV doang yang tuntas, terus ntar Bab V nya mepet ngerjainnya. Apa kabar lampiran dll.\n\nTaunya dosen penguji baca Bab V nya dan teliti banget baca lampiran. \n\nLampiran tuh suka disepelein, hiks. Padahal lampiran tuh nunjukin keseriusan kalau kita beneran penelitian', 0, 'Twitter'),
(1471488740, 'rendeyyy', 'lil salmonella', '2021-12-16', 'potret mahasiswa unpad dan ui yang iri menfessnya ngga wibu seperti itb https://t.co/gTWal3cmTv', 2, 'Twitter'),
(1471645172, 'HelmiHelmimoze', 'helmi rachman', '2021-12-17', '@tempodotco Jk mengarang lebih prof sedikit. Pengangguran turun? Tetapi penerimaan negara defisit&amp; kriminal naik. Bisa sj Pph naik ttpi krn penghasilan naik dg jumlah pekerja tetap. ???????? \n@KemenkeuRI @KemnakerRI @bps_statistics @DitjenPajakRI @unpad @UnandOfficial @undip', 0, 'Twitter'),
(1471701390, 'bawaslukotabdg', 'Bawaslu Kota Bandung', '2021-12-17', '#SahabatBawaslu Koordinator Divisi Hukum Humas Data dan Informasi @bawaslukotabdg, Wawan Kurniawan, https://t.co/ig60HrZ1jG memberikan arahan kepada mahasiswa magang dari @ilpol_unpad yang berkaitan dengan tupoksi dan dinamika kerja pada divisi Hukum Humas Datin. https://t.co/tJnHtZhAIZ', 3, 'Twitter'),
(1472433504, 'bayubhar', 'Bharuna', '2021-12-19', 'Sekali2 kembali ke kampus, senang bisa ngajarin mahasiswa @unpad  tingkat TPB ttg mitigasi banjir ~ OKK RK064/ecotourism dibantu fasil dari @Palawa_Unpad https://t.co/XeGfJbV084', 4, 'Twitter');

-- --------------------------------------------------------

--
-- Table structure for table `sentimen`
--

CREATE TABLE `sentimen` (
  `idSentimen` int(11) NOT NULL,
  `idKonten` int(10) NOT NULL,
  `sentimenPositif` float NOT NULL,
  `sentimenNegatif` float NOT NULL,
  `sentimenNetral` float NOT NULL,
  `sentimen` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sentimen`
--

INSERT INTO `sentimen` (`idSentimen`, `idKonten`, `sentimenPositif`, `sentimenNegatif`, `sentimenNetral`, `sentimen`) VALUES
(1, 1469546100, 0.8, 0.1, 0.1, 'positif'),
(2, 1470815288, 0.333, 0.333, 0.333, 'positif'),
(3, 1471488740, 0.571, 0.286, 0.143, 'positif'),
(4, 1470363121, 0.5, 0.25, 0.25, 'positif'),
(5, 1471645172, 0.333, 0.333, 0.333, 'positif'),
(6, 1471140453, 0.25, 0.5, 0.25, 'negatif'),
(7, 1471357751, 0.25, 0.5, 0.25, 'negatif'),
(8, 1471107369, 0.143, 0.571, 0.286, 'negatif'),
(9, 1471336347, 0.286, 0.571, 0.143, 'negatif'),
(10, 1471701390, 0.25, 0.25, 0.5, 'netral'),
(11, 1470668631, 0.286, 0.143, 0.571, 'netral'),
(12, 1472433504, 0.5, 0.25, 0.25, 'positif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namaAdmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `namaAdmin`) VALUES
('admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 'Gery Ahmad Fauzi'),
('geryaf', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 'Gery Akbar Fauzi'),
('khrisna', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 'Khrisna'),
('okto', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 'Oktovian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankkata`
--
ALTER TABLE `bankkata`
  ADD PRIMARY KEY (`kata`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `kontensosmed`
--
ALTER TABLE `kontensosmed`
  ADD PRIMARY KEY (`idKonten`);

--
-- Indexes for table `sentimen`
--
ALTER TABLE `sentimen`
  ADD PRIMARY KEY (`idSentimen`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sentimen`
--
ALTER TABLE `sentimen`
  MODIFY `idSentimen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
