-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: db_infokom
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` enum('Download','Jurnal','Renja','Sakip') COLLATE utf8_unicode_ci DEFAULT 'Download',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloads`
--

LOCK TABLES `downloads` WRITE;
/*!40000 ALTER TABLE `downloads` DISABLE KEYS */;
INSERT INTO `downloads` VALUES (12,'Download','JURNAL PEMBUATAN SMART CITY','Jurnal  ini di buat untuk sebagai referensi tunggal sebagai pembanding dan pedoman pelaksanaan smart city','YiNQzwRZ35Nrj3cW0BlB5QW13myhl9WUwUpn2Pn6pa3bnMi1XrrnDQ547MOV.docx','2019-01-09 03:24:42','2019-01-09 04:22:59'),(17,'Jurnal','JURNAL PEMBUATAN SMART CITY','Jurnal  ini di buat untuk sebagai referensi tunggal sebagai pembanding dan pedoman pelaksanaan smart city','FUAJh0qo3FHg9XlZVmkbTvAgCWyPRXxA7xcriavN2WlIe4uQjBG7pM1SDNNu.docx','2019-01-09 04:25:04','2019-01-09 04:25:04'),(18,'Download','Perubahan Rencana Strategis Dinas Komunikasi Dan Informatika Kabupaten Jember Tahun 2016-2021','Perubahan Renstra Dinas Komunikasi dan Informatika Kabupaten Jember Tahun 2016-2021 disusun dengan maksud sebagai penjabaran secara operasional visi, misi dan program Bupati Jember periode tahun 2016-2021','sm1bjeHLByy740TcIDaiJr0yA4v7vfKL53iCU8QpfyhBL1dRdqi9URA2j9Lt.pdf','2019-05-31 01:08:07','2019-07-04 03:02:46'),(19,'Download','Laporan kinerja Dinas Komunikasi dan Informatika Kabupaten Jember','Menyampaikan capaian kinerja Dinas Komunikasi dan Informatika Kabupaten Jember dalam satu tahun anggaran yang dikaitkan dengan proses pencapaian indikator sasaran yang telah ditetapkan','Q0sX70VzkiAvQDtY847CkXKFzwqrId3LltKflxRMIudDoo7cZZdVzG50H1ZY.pdf','2019-05-31 01:15:37','2019-05-31 01:16:16'),(20,'Download','Persiapan Pelaksanaan Pemilihan Kepala Desa Serentak Tahun 2019','Sosialisasi dan Pembekalan Persiapan Pelaksanaan Pemilihan Kepala Desa Serentak kepada BPD dan Panitia Pemilihan Tingkat Desa oleh Tim Kabupaten','AbkNO18rvgqKpk78pnj6Di44IhrhkeFWqyuRvB46KL8KJSqL3ZvB0Ikc1W1y.pdf','2019-06-18 04:51:57','2019-06-18 04:51:57'),(24,'Download','Laporan Akuntabilitas Kinerja Instansi Pemerintahan','LAKIP Dinas Komunikasi Dan Informatika Kabupaten Jember Tahun 2019','YWThazEyBIqOo3jXOIdL7ut3r68wqCHJKrlUo0rVwJ6tbEIN3ESmXCAWzKmO.pdf','2019-07-04 02:56:30','2019-07-04 03:19:13'),(25,'Renja','Rencana Kinerja Diskominfo Tahun 2019','RKT Tahun 2019','zKBWIavgjqdcM8YiVHhm9VlMEM8LEDeAU19q6jgzu7oHhyjxWZBtihXsBBGW.pdf','2019-07-04 03:05:58','2019-07-04 03:05:58'),(26,'Sakip','Sakip 2019','Sakip','rAFeajgjt3tplwaBoLG0LjXyHb3BJiXgOXczOk07e1whhb9H6OHi8k4BxHRg.pdf','2019-07-04 03:12:38','2019-07-04 03:12:38'),(27,'Download','Master Plan Smart City Kabupaten Jember','Master Plan Smart City Kabupaten Jember','q6kvX2kGyf6p3hqSTUdse4T6tfT3LCBKDCeLfutAtibeg9ClwkDjB8f26Fzx.pdf','2019-12-19 06:49:32','2019-12-19 06:49:32');
/*!40000 ALTER TABLE `downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feeds`
--

DROP TABLE IF EXISTS `feeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feeds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `date` date DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kata_kunci` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `penanggungjawab` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feeds`
--

LOCK TABLES `feeds` WRITE;
/*!40000 ALTER TABLE `feeds` DISABLE KEYS */;
INSERT INTO `feeds` VALUES (99,17,'2021-04-22','Berita','14-pesawat-tni-au-akan-beraktraksi-di-langit-jember','Diskominfo Jember -  Bulan Juni dinilai penti...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','14 Pesawat TNI AU akan Beraktraksi di Langit Jember.','<p>\n	Diskominfo Jember -&nbsp; Bulan Juni dinilai penting dalam sejarah bangsa Indonesia. Pada setiap 1 Juni, bangsa Indonesia memperingati hari lahirnya Pancasila sebagai dasar sekaligus pedoman berbangsa.</p>\n<p>\n	&nbsp;</p>\n<p>\n	Dalam rangka memperingati Hari Lahir Pancasila pada 1 Juni 2021, Tim dari Puspotdirga TNI AU melakukan audiensi dengan Pemkab Jember terkait rencana dilaksanakannya Kegiatan Garuda Terbang.</p>\n<p>\n	&nbsp;</p>\n<p>\n	Kegiatan tersebut adalah salah satu bentuk pembinaan kedirgantaraan melalui kegiatan olahraga dirgantara (ordiga) untuk kepentingan pertahanan negara (Hanneg), serta dalam rangka memperingati Hari Lahir Pancasila Tahun 2021.</p>\n<p>\n	&nbsp;</p>\n<p>\n	Wakil Bupati Jember MB. Firjaun Barlaman, di dampingi oleh&nbsp; Puspotdirga TNI AU Direktur bidang Minat Dirgantara Irwanto, serta tamu undangan lainya turut hadir dalam Rapat Audiensi pelaksanaan Kegiatan Garuda Terbang pada hari Sabtu, 22 Mei 2021 di Kantor Bupati Jember.&nbsp;</p>\n<p>\n	&nbsp;</p>\n<p>\n	Kegiatan tersebut akan diagendakan mulai tanggal 28 Mei - 2 Juni 2021, yang akan di mulai dari rute Jakarta, Lanud Adi Sucipto Jogjakarta, Lanud Abdulrachman Saleh Kabupaten Malang,&nbsp; Bandara Notohadinegoro Kabupaten Jember dan Kabupaten Banyuwangi.</p>\n<p>\n	&nbsp;</p>\n<p>\n	Di Bandara Notohadinegoro Jember,&nbsp; sebanyak 14 Pesawat TNI AU akan beratraksi melakukan static show dan bakti sosial&nbsp; pada 29 Mei 2021 mendatang.</p>\n<p>\n	&nbsp;</p>\n<p>\n	&quot;Kegiatan ini dalam rangka memperingati hari lahir pancasila dan untuk menghidupkan kembali olahraga kedirgantaraan, serta rencana akan di buka pendidikan penerbangan untuk saling mendukung dan mempercepat promosi potensi Kabupaten Jember, terang Direktur Bidang Minat Dirgantara Puspotdirga TNI AU, Irwanto usai melakukan audiensi di Gedung Pemkab Jember.&nbsp;</p>\n<p>\n	&nbsp;</p>\n<p>\n	Selain menghibur masyarakat Jember dan memberikan wawasan tentang kedirgantaraan kepada warga sipil, lanjut Irwanto, kegiatan Garuda Terbang ini juga sebagai sarana silaturahmi bagi para olahragawan kedirgantaraan.</p>\n<p>\n	&nbsp;</p>\n<p>\n	Wakil Bupati Jember,&nbsp; MB.Firjaun Barlaman atau akrab disapa Gus Firjaun menyampaikan, Pemkab Jember siap untuk mendukung terlaksananya kegiatan ini.</p>\n<p>\n	&nbsp;</p>\n<p>\n	&quot;Kami siap mendukung acara ini karena ini dapat mempromosikan potensi Jember juga,&quot; kata Gus Firjaun.</p>\n<p>\n	&nbsp;</p>\n<p>\n	Dia berharap kerjasama ini berjalan terus ke depannya.</p>\n','158b9-60965412d27ea.jpeg',15,NULL,NULL,'2021-05-22 13:15:17','2021-05-31 00:32:42',NULL),(100,17,'2021-05-23','Berita','14-air-force-aircraft-will-attract-in-jember-sky','Diskominfo Jember - June is considered as importan...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','14 Air Force aircraft will attract in Jember Sky.','<p>Diskominfo Jember - June is considered as important month in the history of Indonesian nation.&nbsp; Every 1st June, Indonesian nation commemorates the birth of Pancasila as the basis and&nbsp; national guidelines.<br></p><p><br></p><p>Puspotdirga TNI AU\'s team conducts an audience with jember government regarding the plan implementation of Eagle Flying (Garuda Terbang) Activities.</p><p><br></p><p>Deputy Regent of Jember MB. Firjaun Barlaman is accompanied by Puspotdirga TNI AU Director of Aerospace Interest Irwanto, and other invited guests also attend the Hearing Meeting on the implementation of Garuda Terbang activities on Saturday, May 22, 2021 at Jember Regent\'s Office.&nbsp;</p><p><br></p><p>The activity is scheduled from May 28 to June 2, 2021, which will start from jakarta route, Lanud Adi Sucipto Jogjakarta, Lanud Abdulrachman Saleh Malang Regency, Notohadinegoro Airport Jember Regency and Banyuwangi Regency.</p><p><br></p><p>A total of 14 Air Force aircraft will be attract to conduct static shows and social services on May 29, 2021.</p><p><br></p><p>\"This activity is in commemoration of the anniversary of pancasila and to revive aerospace sports, as well as plans to open aviation education to support each other and accelerate the promotion of the potential of Jember Regency, explained director of aerospace interests Puspotdirga TNI AU, Irwanto after conducting an audience at Jember Government Building.&nbsp;</p><p><br></p><p>In addition to entertaine the Jember society and to provide insight on aerospace to civilians, irwanto continued, Garuda Terbang\'s activities are also a means of friendship for aerospace sportsmen.</p><p><br></p><p>\"We are ready to support this event because it can promote the potential of Jember as well,\" said Gus Firjaun.</p>','158b9-60965412d27ea.jpeg',28,NULL,NULL,'2021-05-23 02:02:39','2021-05-29 09:51:15',NULL),(101,17,'2021-05-23','Berita','regent-and-forkopimda-visit-extended-family-of-habib-sholeh-tanggul','Diskominfo Jember - After performing Friday prayer...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Regent and Forkopimda Visit Extended Family of Habib Sholeh Tanggul','<p>Diskominfo Jember - After performing Friday prayers at&nbsp; Great darul Mutaqqin\'s Mosque, Regent Hendy Siswanto, Deputy Regent of Jember MB Firjaun Barlaman and Forkopimda continue their visit to silaturahim.&nbsp;<br></p><p><br></p><p>After enjoying lunch, the Regent and his entourage is gone&nbsp; directly to residence of Ummi Hubabah Khodijah Bin Sholeh Al Hamid habib Sholeh bin Muhsin Al Hamid\'s extended family in Tanggul\'s district on Friday, May 21, 2021</p><p><br></p><p>The Regent conveys his visit\'s purposes. One of the purposes&nbsp; is related to 45th Grand Haul that will be held on Sunday, May 23, 2021.</p><p><br></p><p>As arrival, Hubabah Khotijah and all guests offer a&nbsp; pray together for the safety, blessings and get protection of Jember city from&nbsp; Covid-19 virus disaster.&nbsp;</p><p><br></p><p>On that occasion, the Regent said about the condition of covid-19 in Jember Regency, \"Hopefully Jember Regency is safe and peaceful to be a safe zone of green zone\", said the Regent during the meeting.&nbsp;</p><p><br></p><p>From the residence of Ummi Hubabah, the Regent and his entourage is directly gone to the residence of Habib Muhdhor Bin Muhammad Bin Sholeh Al Hamid, together with Dandim 0824 / Jember Lt. Col. Inf. Laode M Nurdin and Jember Police Chief AKBP Arif Rachman Arifin.&nbsp;</p><p><br></p><p>After that, the group directly go&nbsp; the hall of the chairman of&nbsp; haul committee precisely in area of Sumber Baru Subdistrict in The Hall of Alhabib Muhdhor.&nbsp;</p><p><br></p><p>I am very grateful and happy for the presence of&nbsp; Regent with his entourage, hopefully his presence brings barokah to all of us and hopefully the event haul wali Qutb Al arif Billah Habib Sholeh bin Muhsin Al-Hamid can run smoothly and in accordance with health protocols\" said Habib Hadi As-Shery.</p>','158b9-60965412d27ea.jpeg',8,NULL,NULL,'2021-05-23 02:06:13','2021-05-29 09:51:15',NULL),(102,17,'2021-05-24','Berita','staf-ahli-bupati-minta-opd-mendukung-penyusunan-rpjmd-dengan-semangat-kebersamaan','Diskominfo Jember – Staf Ahli Bupati Bidang Pemban...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Staf Ahli Bupati Minta OPD Mendukung Penyusunan RPJMD dengan Semangat Kebersamaan','<p><br></p><p><br></p><p><br></p><p>Diskominfo Jember – Staf Ahli Bupati Bidang Pembangunan, Perekonomian, dan Keuangan, Edy Budi Susilo saat apel di depan Kantor Bupati Jember, Senin, 24 Mei 2021, meminta seluruh Organisasi Perangkat Daerah (OPD) agar mendukung percepatan penyusunan rancangan Rencana Pembangunan Jangka Menengah Daerah (RPJMD) setelah disahkannya APBD 2021.</p><p><br></p><p>“Saya berharap setiap OPD betul-betul memedomani terkait dengan aturan main pengelolaan APBD 2021 termasuk kaitan pengadaan barang dan jasa”, terang Edy.</p><p><br></p><p>Edy juga menyampaikan walaupun sebelumnya OPD memiliki pengalaman dalam pelaksanaan APBD, namun karena ada beberapa peraturan baru maka harus ada penyesuaian.</p><p><br></p><p>“Ini perlu kecermatan dan juga kehati-hatian tetapi juga perlu keberanian dan semangat kebersamaan untuk mengeksekusi seluruh dokumen yang sudah kita buat dalam APBD kita,” tambahnya.</p><p><br></p><p>Apel itu diikuti PNS dan Non PNS di lingkungan kantor Pemkab Jember. Baik Sekretariat, Bappekab, BPKAD, Inspektorat, Satpol PP, BKPSDM, Dispora, PTSP, Disnaker, Dishub dan Diskominfo.</p><p><br></p><p>Hadir pula para Staf Ahli Bupati Jember, Asisten, Inspektur, Kepala Satpol-PP, Sekretaris DPRD, Direktur RSD dr Soebandi, RSD Kalisat dan RSD Balung.</p><p><br></p><p>Selain itu Edy mengingatkan bahwa saat ini pemerintah daerah sedang menyusun Rencana Pembangunan Jangka Menengah Daerah (RPJMD).</p><p><br></p><p>“Saat ini kita sama-sama tahu bahwa Bappeda (baca: Badan Perencanaan Pembangunan Daerah) betul-betul bekerja keras menyiapkan penyusunan itu semua”, tambahnya.&nbsp;</p><p><br></p><p>Oleh karena itu, Edy mendorong semua OPD memberikan dukungan data dan informasi yang dibutuhkan oleh Bappeda.&nbsp;</p><p><br></p><p><br></p><p>Edy menegaskan bahwa dokumen RPJMD menjadi payung besar dalam melaksanakan dokumen-dokumen selanjutnya. Seperti halnya Rencana Strategis (Renstra), Rencana Kerja (Renja), dan dokumen lainnya.</p><p><br></p><p><br></p><p>“Dengan melaksanakan semua secara baik dan benar sama halnya kita juga mendukung visi dan misi Bupati dan Wakil Bupati Jember” tutupnya.</p>','158b9-60965412d27ea.jpeg',16,NULL,NULL,'2021-05-24 05:20:36','2021-05-29 09:51:15',NULL),(103,17,'2021-05-26','Berita','bupati-hendy-apresiasi-tim-juara-linkrafin-jember-pemenang-lomba-karya-anak-komunitas','Diskominfo Jember – Bupati Jember, Hendy Siswanto,...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Bupati Hendy Apresiasi Tim Juara LINKRAFIN Jember, Pemenang Lomba Karya Anak Komunitas.','<p>Diskominfo Jember – Bupati Jember, Hendy Siswanto, menyambut dan mengapresiasi kemenangan yang diraih Linkrafin Jember Nusantara, yang berhasil meraih juara pertama dan juara terfavorit pada Lomba Karya Musik Anak Komunitas oleh Kemenparekraf.<br></p><p>Sambutan disampaikan Bupati saat menerima kedatangan Tim Linkrafin diteras Pendopo Wahyawibawagraha, Rabu, 26 Mei 2021 pukul 07.00 WIB.&nbsp;</p><p>“Tim Linkrafin sungguh membanggakan kami, terlebih masyarakat Jember,“ Ujar Bupati Hendy.</p><p>Bupati menegaskan di Era Pemerintahannya yang hampir genap 3 bulan, Tim Lingkrafin adalah tim pertama&nbsp; yang memberikan motivasi dan semangat baru.</p><p>Lebih lanjut, Bupati berpesan kepada Tim Lingkrafin untuk tidak lengah dan harus ditingkatkan segala jenis potensi yang ada.</p><p>Oleh karena itu, Pemkab Jember berkomitmen untuk tetap selalu mensupport Linkrafin dan Budaya kreatif seni lainnya di kabupaten Jember untuk mengembangkan kreatifitasnya.</p><p>“Mari bersama-sama bangkit! Kita tunjukan Jember, tidak hanya bangkit di perekonomian saja, tapi seni budaya akan menjadi salah satu elemen pendokrak ekonomi di wilayah Jember ini. Wes Wayahe Jember Bangkit!” pungkas Bupati.</p>','158b9-60965412d27ea.jpeg',7,NULL,NULL,'2021-05-26 03:56:15','2021-05-29 09:51:15',NULL),(104,17,'2021-05-26','Berita','regent-hendy-appreciates-linkrafin-jember-champion-team-winner-of-community-children-s-work-competition','Diskominfo Jember – The Regent of Jember, Hendy Si...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Regent Hendy Appreciates LINKRAFIN Jember Champion Team, Winner of Community Children\'s Work Competition.','<p>Diskominfo Jember – The Regent of Jember, Hendy Siswanto, welcome and appreciate the victory&nbsp; who are achieved by Linkrafin Jember Nusantara. They won the first place and favorite champion in the Community Children\'s Music Competition by Ministry of Tourism and Creative Economy (Parekraf)<br></p><p>The speech is delivered by Regent upon receiving the arrival of&nbsp; Linkrafin Team at Pendopo Wahyawibawagraha, Wednesday, May 26, 2021 at 07.00 WIB.&nbsp;</p><p>\"Linkrafin team is really proud of us, especially Jember society,\" said Regent Hendy.</p><p>The Regent asserts that in the era of his reign which is almost even 3 months, Lingkrafin Team is the first team to provide new motivation and spirit.</p><p>Furthermore, Regent advises Lingkrafin Team not to be distracted and should improve all kinds of potentials.</p><p>\"This pride does not necessarily make friends careless, this is the first step to be more competitive,\" Said Regent</p><p>Therefore, Jember Regency is committed to always support Linkrafin and other creative arts culture in Jember regency to develop their creativity.</p><p>\"Let\'s rise up together! We show Jember, Jember is not only grow in&nbsp; economy sector , but cultural art will be one of the elements of economic growth in this jember region.&nbsp; it\'s the time Jember to rise up!!\" concluded the Regent</p>','158b9-60965412d27ea.jpeg',5,NULL,NULL,'2021-05-26 04:30:41','2021-05-29 09:51:15',NULL),(105,17,'2021-05-26','Berita','bupati-hendy-siswanto-ajak-masyarakat-untuk-penggunaan-kb-mkjp','Diskominfo Jember - Bupati Hendy Siswanto melaunch...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Bupati Hendy Siswanto Ajak Masyarakat untuk Penggunaan KB MKJP.','<p>Diskominfo Jember - Bupati Hendy Siswanto melaunching pelayanan KB Metode Kontrasepsi Jangka Panjang (KB - MKJP),  di Klinik Harapan Sehat Kecamatan Mayang Kabupaten Jember, Rabu 26 Mei 2021.<br></p><p>Hadir pula Kepala Perwakilan Badan Kependudukan dan Keluarga Berencana Nasional (BKKBN) Provinsi Jatim, Drs.Sukaryo Teguh Santoso, M.Pd, Ketua TP PKK Kab. Jember Kasih Fajarini, Organisasi Perangkat Daerah (OPD), Camat dan Perangkat serta Koordinator Penyuluh KB.</p><p>Sementara dalam arahannya, Bupati Jember menyampaikan,  terkait pentingnya menggunakan KB demi menekan pertumbuhan penduduk, karena angka pertumbuhan penduduk terbesar adalah Jawa Timur. </p><p>\"Mengajak  kepada masyarakat untuk memasang alat kontrasepsi dan memanfaatkan pelayanan KB MKJP di Fasilitas Kesehatan (Faskes) Keluarga Berencana (KB) terdekat sesuai dengan kebutuhan masing-masing,\"Kata Bupati.</p><p>Menurut Drs.Sukaryo Teguh Santoso, M.Pd. Pelayanan KB MKJP sangat efektif untuk mengatur jumlah dan jarak kelahiran, sehingga dapat meningkatkan kesehatan ibu dan anak serta mencegah kehamilan yang tidak diinginkan.</p><p>Saat acara berlangsung sebanyak 133 orang di Klinik Harapan Sehat Mayang mengikuti program ini. </p><p>Bupati menyampaikan terkait support pelaksanaan KB MKJP berupa alat secara gratis dan mengirimkan 58 orang penyuluh untuk Kabupaten Jember. </p><p>Bupati menambahkan, atas nama Pemerintah Kabupaten Jember menaruh harapan dan perhatian terhadap pengendalian penduduk. </p><p>Hal ini sekaligus untuk mendukung kualitas terhadap Sumber Daya Manusia (SDM) baik dari skala balita, remaja, tumbuh kembang dan kependidikan.</p>','158b9-60965412d27ea.jpeg',5,NULL,NULL,'2021-05-26 07:31:47','2021-05-29 09:51:15',NULL),(106,17,'2021-05-26','Berita','regent-hendy-siswanto-invites-public-to-use-kb-mkjp','Diskominfo Jember - Regent Hendy Siswanto has laun...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Regent Hendy Siswanto Invites Public to Use KB MKJP.','<p><br></p><p>Diskominfo Jember - Regent Hendy Siswanto has launched Long Term Contraceptive Method Kb (KB - MKJP) service, at Harapan Sehat Clinic in Mayang District, Jember Regency, Wednesday, May 26, 2021.</p><p>It also present the Head of National Population and Family Planning Agency (BKKBN) of East Java Province, Drs.Sukaryo Teguh Santoso, M.Pd, Chairman of TP PKK Jember, Kasih Fajarini, Regional Device Organization (OPD), Sub-District and Device and Kb Extension Coordinator.</p><p>Meanwhile, in his direction,&nbsp; Regent of Jember said, related to the importance of using KB to suppress population growth, because the largest population growth rate is East Java.&nbsp;</p><p>\"Invite the public to use contraceptives and apply KB MKJP services in the nearest Family Planning (KB) Health Facility (FASKES) according to their needs,\" said the Regent.</p><p>According to Drs.Sukaryo Teguh Santoso, M.Pd. MKJP Birth Control Service is very effective to regulate the number and distance of births. Therefore, it can improve maternal, child health and prevent unwanted pregnancies.</p><p>During the event, 133 people at Harapan Sehat Mayang Clinic are participated in this program.&nbsp;</p><p>Regent has conveyed the support for the implementation of KB MKJP in the form of free tools and has sent 58 extension workers to Jember Regency.&nbsp;</p><p>The Regent added, on behalf of the Jember Regency Government, it is hoped and concerned with population control.&nbsp;</p><p>It is to support the quality of human resources (HR) both from the scale of toddlers, adolescents, growth and education.</p>','158b9-60965412d27ea.jpeg',14,NULL,NULL,'2021-05-26 09:09:25','2021-05-29 09:51:15',NULL),(107,17,'2021-05-27','Berita','bupati-jember-hendy-siswanto-meresmikan-pembekalan-dewan-hakim-mtq-tingkat-kabupaten-jember','Diskominfo Jember - Bupati Jember Hendy Siswanto d...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Bupati Jember Hendy Siswanto meresmikan Pembekalan Dewan Hakim MTQ Tingkat Kabupaten Jember','<p>Diskominfo Jember - Bupati Jember Hendy Siswanto dan Wakil Bupati Jember MB Firjaun Barlaman meresmikan pembekalan Dewan Hakim MTQ Tingkat Kabupaten Jember di Pendopo Wahyawibawagraha,Kamis, 27 Mei 2021.<br></p><p>Pembekalan tersebut dilaksanakan dalam rangka memberikan pengetahuan kepada dewan hakim/juri yang nantinya akan merencanakan terselenggarakannya acara MTQ Se-Kabupaten Jember yang akan diadakan pada bulan Juni 2021 mendatang.</p><p>Dr.H.Syafi\'i, M.Si. selaku Asisten I Pemerintah dan Kesra dalam laporannya menjelaskan, Dasar dari penyelenggaraan pembekalan ini berdasarkan Surat Kepala Dinas tanggal 11 Mei 2021 dengan Nomor :&nbsp; 00/392/I.23/2021 Tentang Rencana Pembekalan Dewan Hakim MTQ Tingkat Kabupaten Jember.</p><p>Diharapkan \"Kepada Dewan Hakim memiliki bekal professional dan lebih memahami dalam hal teknologi serta Informasi,” tambahnya.</p><p>Kemudian dalam laporannya menjelaskan&nbsp; &nbsp;tujuan dari kegiatan ini adalah menyeleksi putra dan putri terbaik untuk diikut sertakan dalam seleksi Provinsi dan Nasional.&nbsp;</p><p>Sebanyak 43 orang&nbsp; yang menyandang status dewan hakim/juri menerima materi dari dewan hakim LPTQ Provinsi Jawa Timur yaitu KH.Abdul Hamid Abdulah bidang Tilawah dan Tartil, Dr. KH.Muda di Ma\'arif, Lc, M.HI bidang Qiro\'at Mujawwad dan Murottal, dan KH. Bharmawi bidang MSQ, MFQ, dan MHQ.&nbsp;</p><p>Kepada Wartawan Bupati menjelaskan, Kabupaten Jember memiliki potensi dan memiliki pondok pesantren yang banyak, dan ribuan santri di Jember menjadikan citra bakal potensi religion yang kuat dan anak-anak pondok pesantren yang mengikuti lomba MTQ ini harapannya dapat&nbsp; mengikuti ke tingkat provinsi, Nasional atau bahkan Internasional.&nbsp;</p><p>“MTQ bukan hanya melihat nilai anak-anak kita membuat suara dan membaca yang bagus, tetapi lebih untuk meningkatkan akhlak dan iman”, pungkasnya.&nbsp;</p><p>Bupati menambahkan bahwa, kegiatan MTQ Provinsi dan Nasional ini diharapkan dapat diselenggarakan di Kabupaten Jember.</p>','158b9-60965412d27ea.jpeg',4,NULL,NULL,'2021-05-27 09:58:22','2021-05-29 09:51:15',NULL),(108,17,'2021-05-27','Berita','presiden-jokowi-minta-tingkatkan-sinergi-dan-kolaborasi-dalam-rakornas-pengawasan-intern-pemerintah-2021','Diskominfo Jember - Melalui Rapat Koordinasi Nasio...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Presiden Jokowi Minta Tingkatkan Sinergi dan Kolaborasi dalam Rakornas Pengawasan Intern Pemerintah 2021','<p>Diskominfo Jember - Melalui Rapat Koordinasi Nasional (Rakornas) Pengawasan Intern Pemerintah 2021, Presiden Jokowi beri beberapa arahan kepada seluruh peserta.<br></p><p>Dalam sambutannya Presiden Jokowi menyampaikan bahwa peran utama pengawasan adalah menjamin tercapainya tujuan.</p><p>\"Yang dimaksud dengan tercapainya tujuan ialah tujuan pemerintah, tujuan program, dan tujuan belanja anggaran yang dilakukan secara akuntabel, efektif, dan efisien,\" ucap Presiden Jokowi.</p><p>Rakornas tersebut dihadiri oleh Menkopolhukam, Menkeu, Mensesneg, Menko Perekonomian, Badan Pengawasan Keuangan dan Pembangunan (BPKP), Badan Pemeriksaan Keuangan (BPK), Komisi Pemberantasan Korupsi (KPK), TNI, Polri, Kejagung, Walikota dan Bupati.</p><p>Bupati Jember Hendy Siswanto bersama Inspektorat, BPBD, Dinsos, Diskop UKM, BPKAD, Disperindag, Bappeda, DPU BMSDA mengikuti telekonferensi itu di Ruang Lobby Bupati Jember.</p><p>Dalam pidatonya Presiden Jokowi juga menyampaikan mengenai kondisi ekonomi negara bahwa dalam kuartal-1 2021 masih minus 0,74%. Namun ke depan pada kuartal-2 menargetkan melompat ke plus 7%.</p><p>“Oleh sebab itu, tahun 2021 adalah tahun percepatan pemulihan ekonomi nasional. Dalam rangka mencapai target dan tujuan tersebut, pemerintah menyiapkan hampir 700 triliun yang harus realisasikan cepat dan tepat sasaran,” tegasnya.</p><p>Presiden Jokowi meminta 3 hal agar dilaksanakan secara cepat dan tepat oleh BPKP dan Aparat Pengawas Intern Pemerintah (APIP). Pertama, percepatan belanja pemerintah terus dikawal dan ditingkatkan. Kedua, kualitas perencanaan terus selalu ditingkatkan. Ketiga, perihal akurasi yang perlu diperbaiki.</p><p>“Saya memohon kerja samanya kepada APIP dan BPKP untuk melakukan pengawasan secara profesional. Tolong perkuat sinergi, kolaborasi, dan check and balances agar bangsa ini bisa bangkit dari pandemi,” tutupnya.</p>','158b9-60965412d27ea.jpeg',5,NULL,NULL,'2021-05-27 10:01:06','2021-05-29 09:51:15',NULL),(111,17,'2021-05-27','Berita','presiden-jokowi-minta-tingkatkan-sinergi-dan-kolaborasi-dal1am-rakornas-pengawasan-intern-pemerintah-2021','Diskominfo Jember - Melalui Rapat Koordinasi Nasio...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Presiden Jokowi Minta Tingkatkan Sinergi dan Kolaborasi dalam Rakornas Pengawasan Intern Pemerintah 2021','<p>Diskominfo Jember - Melalui Rapat Koordinasi Nasional (Rakornas) Pengawasan Intern Pemerintah 2021, Presiden Jokowi beri beberapa arahan kepada seluruh peserta.<br></p><p>Dalam sambutannya Presiden Jokowi menyampaikan bahwa peran utama pengawasan adalah menjamin tercapainya tujuan.</p><p>\"Yang dimaksud dengan tercapainya tujuan ialah tujuan pemerintah, tujuan program, dan tujuan belanja anggaran yang dilakukan secara akuntabel, efektif, dan efisien,\" ucap Presiden Jokowi.</p><p>Rakornas tersebut dihadiri oleh Menkopolhukam, Menkeu, Mensesneg, Menko Perekonomian, Badan Pengawasan Keuangan dan Pembangunan (BPKP), Badan Pemeriksaan Keuangan (BPK), Komisi Pemberantasan Korupsi (KPK), TNI, Polri, Kejagung, Walikota dan Bupati.</p><p>Bupati Jember Hendy Siswanto bersama Inspektorat, BPBD, Dinsos, Diskop UKM, BPKAD, Disperindag, Bappeda, DPU BMSDA mengikuti telekonferensi itu di Ruang Lobby Bupati Jember.</p><p>Dalam pidatonya Presiden Jokowi juga menyampaikan mengenai kondisi ekonomi negara bahwa dalam kuartal-1 2021 masih minus 0,74%. Namun ke depan pada kuartal-2 menargetkan melompat ke plus 7%.</p><p>“Oleh sebab itu, tahun 2021 adalah tahun percepatan pemulihan ekonomi nasional. Dalam rangka mencapai target dan tujuan tersebut, pemerintah menyiapkan hampir 700 triliun yang harus realisasikan cepat dan tepat sasaran,” tegasnya.</p><p>Presiden Jokowi meminta 3 hal agar dilaksanakan secara cepat dan tepat oleh BPKP dan Aparat Pengawas Intern Pemerintah (APIP). Pertama, percepatan belanja pemerintah terus dikawal dan ditingkatkan. Kedua, kualitas perencanaan terus selalu ditingkatkan. Ketiga, perihal akurasi yang perlu diperbaiki.</p><p>“Saya memohon kerja samanya kepada APIP dan BPKP untuk melakukan pengawasan secara profesional. Tolong perkuat sinergi, kolaborasi, dan check and balances agar bangsa ini bisa bangkit dari pandemi,” tutupnya.</p>','158b9-60965412d27ea.jpeg',5,NULL,NULL,'2021-05-27 10:01:06','2021-05-29 09:51:15',NULL),(112,17,'2021-05-27','Berita','presiden-jokowi-minta-tingkatkan-sinergi-dan-kolaborasi-dal1am2-rakornas-pengawasan-intern-pemerintah-2021','Diskominfo Jember - Melalui Rapat Koordinasi Nasio...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Presiden Jokowi Minta Tingkatkan Sinergi dan Kolaborasi dalam Rakornas Pengawasan Intern Pemerintah 2021','<p>Diskominfo Jember - Melalui Rapat Koordinasi Nasional (Rakornas) Pengawasan Intern Pemerintah 2021, Presiden Jokowi beri beberapa arahan kepada seluruh peserta.<br></p><p>Dalam sambutannya Presiden Jokowi menyampaikan bahwa peran utama pengawasan adalah menjamin tercapainya tujuan.</p><p>\"Yang dimaksud dengan tercapainya tujuan ialah tujuan pemerintah, tujuan program, dan tujuan belanja anggaran yang dilakukan secara akuntabel, efektif, dan efisien,\" ucap Presiden Jokowi.</p><p>Rakornas tersebut dihadiri oleh Menkopolhukam, Menkeu, Mensesneg, Menko Perekonomian, Badan Pengawasan Keuangan dan Pembangunan (BPKP), Badan Pemeriksaan Keuangan (BPK), Komisi Pemberantasan Korupsi (KPK), TNI, Polri, Kejagung, Walikota dan Bupati.</p><p>Bupati Jember Hendy Siswanto bersama Inspektorat, BPBD, Dinsos, Diskop UKM, BPKAD, Disperindag, Bappeda, DPU BMSDA mengikuti telekonferensi itu di Ruang Lobby Bupati Jember.</p><p>Dalam pidatonya Presiden Jokowi juga menyampaikan mengenai kondisi ekonomi negara bahwa dalam kuartal-1 2021 masih minus 0,74%. Namun ke depan pada kuartal-2 menargetkan melompat ke plus 7%.</p><p>“Oleh sebab itu, tahun 2021 adalah tahun percepatan pemulihan ekonomi nasional. Dalam rangka mencapai target dan tujuan tersebut, pemerintah menyiapkan hampir 700 triliun yang harus realisasikan cepat dan tepat sasaran,” tegasnya.</p><p>Presiden Jokowi meminta 3 hal agar dilaksanakan secara cepat dan tepat oleh BPKP dan Aparat Pengawas Intern Pemerintah (APIP). Pertama, percepatan belanja pemerintah terus dikawal dan ditingkatkan. Kedua, kualitas perencanaan terus selalu ditingkatkan. Ketiga, perihal akurasi yang perlu diperbaiki.</p><p>“Saya memohon kerja samanya kepada APIP dan BPKP untuk melakukan pengawasan secara profesional. Tolong perkuat sinergi, kolaborasi, dan check and balances agar bangsa ini bisa bangkit dari pandemi,” tutupnya.</p>','158b9-60965412d27ea.jpeg',5,NULL,NULL,'2021-05-27 10:01:06','2021-05-29 09:51:15',NULL),(114,17,'2021-05-27','Berita','2','Diskominfo Jember - Melalui Rapat Koordinasi Nasio...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Presiden Jokowi Minta Tingkatkan Sinergi dan Kolaborasi dalam Rakornas Pengawasan Intern Pemerintah 2021','<p>Diskominfo Jember - Melalui Rapat Koordinasi Nasional (Rakornas) Pengawasan Intern Pemerintah 2021, Presiden Jokowi beri beberapa arahan kepada seluruh peserta.<br></p><p>Dalam sambutannya Presiden Jokowi menyampaikan bahwa peran utama pengawasan adalah menjamin tercapainya tujuan.</p><p>\"Yang dimaksud dengan tercapainya tujuan ialah tujuan pemerintah, tujuan program, dan tujuan belanja anggaran yang dilakukan secara akuntabel, efektif, dan efisien,\" ucap Presiden Jokowi.</p><p>Rakornas tersebut dihadiri oleh Menkopolhukam, Menkeu, Mensesneg, Menko Perekonomian, Badan Pengawasan Keuangan dan Pembangunan (BPKP), Badan Pemeriksaan Keuangan (BPK), Komisi Pemberantasan Korupsi (KPK), TNI, Polri, Kejagung, Walikota dan Bupati.</p><p>Bupati Jember Hendy Siswanto bersama Inspektorat, BPBD, Dinsos, Diskop UKM, BPKAD, Disperindag, Bappeda, DPU BMSDA mengikuti telekonferensi itu di Ruang Lobby Bupati Jember.</p><p>Dalam pidatonya Presiden Jokowi juga menyampaikan mengenai kondisi ekonomi negara bahwa dalam kuartal-1 2021 masih minus 0,74%. Namun ke depan pada kuartal-2 menargetkan melompat ke plus 7%.</p><p>“Oleh sebab itu, tahun 2021 adalah tahun percepatan pemulihan ekonomi nasional. Dalam rangka mencapai target dan tujuan tersebut, pemerintah menyiapkan hampir 700 triliun yang harus realisasikan cepat dan tepat sasaran,” tegasnya.</p><p>Presiden Jokowi meminta 3 hal agar dilaksanakan secara cepat dan tepat oleh BPKP dan Aparat Pengawas Intern Pemerintah (APIP). Pertama, percepatan belanja pemerintah terus dikawal dan ditingkatkan. Kedua, kualitas perencanaan terus selalu ditingkatkan. Ketiga, perihal akurasi yang perlu diperbaiki.</p><p>“Saya memohon kerja samanya kepada APIP dan BPKP untuk melakukan pengawasan secara profesional. Tolong perkuat sinergi, kolaborasi, dan check and balances agar bangsa ini bisa bangkit dari pandemi,” tutupnya.</p>','158b9-60965412d27ea.jpeg',5,NULL,NULL,'2021-05-27 10:01:06','2021-05-29 09:51:15',NULL),(115,17,'2021-05-27','Berita','asdasd','Diskominfo Jember - Melalui Rapat Koordinasi Nasio...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Presiden Jokowi Minta Tingkatkan Sinergi dan Kolaborasi dalam Rakornas Pengawasan Intern Pemerintah 2021','<p>Diskominfo Jember - Melalui Rapat Koordinasi Nasional (Rakornas) Pengawasan Intern Pemerintah 2021, Presiden Jokowi beri beberapa arahan kepada seluruh peserta.<br></p><p>Dalam sambutannya Presiden Jokowi menyampaikan bahwa peran utama pengawasan adalah menjamin tercapainya tujuan.</p><p>\"Yang dimaksud dengan tercapainya tujuan ialah tujuan pemerintah, tujuan program, dan tujuan belanja anggaran yang dilakukan secara akuntabel, efektif, dan efisien,\" ucap Presiden Jokowi.</p><p>Rakornas tersebut dihadiri oleh Menkopolhukam, Menkeu, Mensesneg, Menko Perekonomian, Badan Pengawasan Keuangan dan Pembangunan (BPKP), Badan Pemeriksaan Keuangan (BPK), Komisi Pemberantasan Korupsi (KPK), TNI, Polri, Kejagung, Walikota dan Bupati.</p><p>Bupati Jember Hendy Siswanto bersama Inspektorat, BPBD, Dinsos, Diskop UKM, BPKAD, Disperindag, Bappeda, DPU BMSDA mengikuti telekonferensi itu di Ruang Lobby Bupati Jember.</p><p>Dalam pidatonya Presiden Jokowi juga menyampaikan mengenai kondisi ekonomi negara bahwa dalam kuartal-1 2021 masih minus 0,74%. Namun ke depan pada kuartal-2 menargetkan melompat ke plus 7%.</p><p>“Oleh sebab itu, tahun 2021 adalah tahun percepatan pemulihan ekonomi nasional. Dalam rangka mencapai target dan tujuan tersebut, pemerintah menyiapkan hampir 700 triliun yang harus realisasikan cepat dan tepat sasaran,” tegasnya.</p><p>Presiden Jokowi meminta 3 hal agar dilaksanakan secara cepat dan tepat oleh BPKP dan Aparat Pengawas Intern Pemerintah (APIP). Pertama, percepatan belanja pemerintah terus dikawal dan ditingkatkan. Kedua, kualitas perencanaan terus selalu ditingkatkan. Ketiga, perihal akurasi yang perlu diperbaiki.</p><p>“Saya memohon kerja samanya kepada APIP dan BPKP untuk melakukan pengawasan secara profesional. Tolong perkuat sinergi, kolaborasi, dan check and balances agar bangsa ini bisa bangkit dari pandemi,” tutupnya.</p>','158b9-60965412d27ea.jpeg',5,NULL,NULL,'2021-05-27 10:01:06','2021-05-29 09:51:15',NULL),(116,17,'2021-05-27','Berita','presiden-jokowi-minta-tingkatkan-sinergi-dan-kolaborasi-dal1am2-rakorn3as-pengawasan-intern-pemerintah-2021','Diskominfo Jember - Melalui Rapat Koordinasi Nasio...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Presiden Jokowi Minta Tingkatkan Sinergi dan Kolaborasi dalam Rakornas Pengawasan Intern Pemerintah 2021','<p>Diskominfo Jember - Melalui Rapat Koordinasi Nasional (Rakornas) Pengawasan Intern Pemerintah 2021, Presiden Jokowi beri beberapa arahan kepada seluruh peserta.<br></p><p>Dalam sambutannya Presiden Jokowi menyampaikan bahwa peran utama pengawasan adalah menjamin tercapainya tujuan.</p><p>\"Yang dimaksud dengan tercapainya tujuan ialah tujuan pemerintah, tujuan program, dan tujuan belanja anggaran yang dilakukan secara akuntabel, efektif, dan efisien,\" ucap Presiden Jokowi.</p><p>Rakornas tersebut dihadiri oleh Menkopolhukam, Menkeu, Mensesneg, Menko Perekonomian, Badan Pengawasan Keuangan dan Pembangunan (BPKP), Badan Pemeriksaan Keuangan (BPK), Komisi Pemberantasan Korupsi (KPK), TNI, Polri, Kejagung, Walikota dan Bupati.</p><p>Bupati Jember Hendy Siswanto bersama Inspektorat, BPBD, Dinsos, Diskop UKM, BPKAD, Disperindag, Bappeda, DPU BMSDA mengikuti telekonferensi itu di Ruang Lobby Bupati Jember.</p><p>Dalam pidatonya Presiden Jokowi juga menyampaikan mengenai kondisi ekonomi negara bahwa dalam kuartal-1 2021 masih minus 0,74%. Namun ke depan pada kuartal-2 menargetkan melompat ke plus 7%.</p><p>“Oleh sebab itu, tahun 2021 adalah tahun percepatan pemulihan ekonomi nasional. Dalam rangka mencapai target dan tujuan tersebut, pemerintah menyiapkan hampir 700 triliun yang harus realisasikan cepat dan tepat sasaran,” tegasnya.</p><p>Presiden Jokowi meminta 3 hal agar dilaksanakan secara cepat dan tepat oleh BPKP dan Aparat Pengawas Intern Pemerintah (APIP). Pertama, percepatan belanja pemerintah terus dikawal dan ditingkatkan. Kedua, kualitas perencanaan terus selalu ditingkatkan. Ketiga, perihal akurasi yang perlu diperbaiki.</p><p>“Saya memohon kerja samanya kepada APIP dan BPKP untuk melakukan pengawasan secara profesional. Tolong perkuat sinergi, kolaborasi, dan check and balances agar bangsa ini bisa bangkit dari pandemi,” tutupnya.</p>','158b9-60965412d27ea.jpeg',5,NULL,NULL,'2021-05-27 10:01:06','2021-05-29 09:51:15',NULL),(118,17,'2021-05-27','Berita','presiden-jokowi-minta-tingkatkan-sinergi-dan-kolaborasi-dal1am2-rakorn3as-pengawasan-intern-pemerintah-20215','Diskominfo Jember - Melalui Rapat Koordinasi Nasio...','bupati jember, h hendy, gus firjaun, Ir. H. Hendy Siswanto, kabupaten jember, kab jember','Presiden Jokowi Minta Tingkatkan Sinergi dan Kolaborasi dalam Rakornas Pengawasan Intern Pemerintah 2021','<p>Diskominfo Jember - Melalui Rapat Koordinasi Nasional (Rakornas) Pengawasan Intern Pemerintah 2021, Presiden Jokowi beri beberapa arahan kepada seluruh peserta.<br></p><p>Dalam sambutannya Presiden Jokowi menyampaikan bahwa peran utama pengawasan adalah menjamin tercapainya tujuan.</p><p>\"Yang dimaksud dengan tercapainya tujuan ialah tujuan pemerintah, tujuan program, dan tujuan belanja anggaran yang dilakukan secara akuntabel, efektif, dan efisien,\" ucap Presiden Jokowi.</p><p>Rakornas tersebut dihadiri oleh Menkopolhukam, Menkeu, Mensesneg, Menko Perekonomian, Badan Pengawasan Keuangan dan Pembangunan (BPKP), Badan Pemeriksaan Keuangan (BPK), Komisi Pemberantasan Korupsi (KPK), TNI, Polri, Kejagung, Walikota dan Bupati.</p><p>Bupati Jember Hendy Siswanto bersama Inspektorat, BPBD, Dinsos, Diskop UKM, BPKAD, Disperindag, Bappeda, DPU BMSDA mengikuti telekonferensi itu di Ruang Lobby Bupati Jember.</p><p>Dalam pidatonya Presiden Jokowi juga menyampaikan mengenai kondisi ekonomi negara bahwa dalam kuartal-1 2021 masih minus 0,74%. Namun ke depan pada kuartal-2 menargetkan melompat ke plus 7%.</p><p>“Oleh sebab itu, tahun 2021 adalah tahun percepatan pemulihan ekonomi nasional. Dalam rangka mencapai target dan tujuan tersebut, pemerintah menyiapkan hampir 700 triliun yang harus realisasikan cepat dan tepat sasaran,” tegasnya.</p><p>Presiden Jokowi meminta 3 hal agar dilaksanakan secara cepat dan tepat oleh BPKP dan Aparat Pengawas Intern Pemerintah (APIP). Pertama, percepatan belanja pemerintah terus dikawal dan ditingkatkan. Kedua, kualitas perencanaan terus selalu ditingkatkan. Ketiga, perihal akurasi yang perlu diperbaiki.</p><p>“Saya memohon kerja samanya kepada APIP dan BPKP untuk melakukan pengawasan secara profesional. Tolong perkuat sinergi, kolaborasi, dan check and balances agar bangsa ini bisa bangkit dari pandemi,” tutupnya.</p>','158b9-60965412d27ea.jpeg',5,NULL,NULL,'2021-05-27 10:01:06','2021-05-29 09:51:15',NULL);
/*!40000 ALTER TABLE `feeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Gallery',
  `caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (2,'Gallery','slogan 3B','imLI8AyTVHII0vHcv8vqJD0WGfcDqvDRvHIp4sLKVeUyIowxjNm4ojJ9jkdd.jpeg','2018-11-29 11:42:49','2018-12-20 05:02:30'),(3,'Gallery','100 SMART CITY','QDuxJ3i6W5WPWvEBTnoNnQJYRIujovnQFpgBnJlnT4OGdrNXHiF6FuQ36L5b.jpeg','2018-11-29 11:43:39','2018-12-20 05:00:07');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `halaman`
--

DROP TABLE IF EXISTS `halaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `halaman` (
  `id_halaman` int(11) NOT NULL,
  `kategori` enum('Personil Diskominfo','Sejarah Dinas','Struktur Organisasi','Tupoksi','Visi Misi') NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `halaman`
--

LOCK TABLES `halaman` WRITE;
/*!40000 ALTER TABLE `halaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `halaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `header`
--

DROP TABLE IF EXISTS `header`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `header` (
  `id_header` int(11) NOT NULL AUTO_INCREMENT,
  `header_name` varchar(50) DEFAULT NULL,
  `content` text,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header`
--

LOCK TABLES `header` WRITE;
/*!40000 ALTER TABLE `header` DISABLE KEYS */;
INSERT INTO `header` VALUES (1,'tab_title',NULL,'7367e-logo_1.ico','Logo di tab browser atas',NULL),(2,'logo_header_atas','<p>\n	DINAS KOMUNIKASI DAN INFORMATIKA</p>\n<p>\n	KABUPATEN JEMBER</p>\n','bdd76-logo-kominfo.png','logo header diatas navbar',NULL),(3,'logo_header_sticky',NULL,'c59a6-logo-singgle.png',NULL,NULL);
/*!40000 ALTER TABLE `header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kinerja`
--

DROP TABLE IF EXISTS `kinerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kinerja` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kinerja`
--

LOCK TABLES `kinerja` WRITE;
/*!40000 ALTER TABLE `kinerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `kinerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `counter` text COLLATE utf8_unicode_ci,
  `featured` text COLLATE utf8_unicode_ci,
  `pages` longtext COLLATE utf8_unicode_ci,
  `social_media` text COLLATE utf8_unicode_ci,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'Cr8NUeZKk57jbhrJjLExIkTr0qocIvTJ6QScFza5hJ1bH9cjnqVea99kpyNT.jpeg','Dinas Komunikasi dan Informatika','Kominfo Connecting The City','DISKOMINFO Kabupaten Jember menuju pada JEMBER SATU DATA dan JEMBER SMART CITY','[\"2551214\",\"3293.34\",\"0\",\"144\"]','[\"{\\\"url\\\":\\\"http:\\\\\\/\\\\\\/absensi.jemberkab.go.id\\\\\\/auth\\\\\\/login\\\",\\\"image\\\":\\\"kkbl1ypt86ApYofvAQfe8z2MC5VCDGI6lOlibgv6ZkfgMeAHa9zLmMOUELbM.jpeg\\\"}\",\"{\\\"url\\\":\\\"https:\\\\\\/\\\\\\/web.kominfo.go.id\\\\\\/\\\",\\\"image\\\":\\\"kHHjSRYDnljNgsofhSjeYSYhFX5D1G6hfL1WlvQ9Ow0Ddp8SzRFGGSfy1s1x.jpeg\\\"}\",\"{\\\"url\\\":\\\"http:\\\\\\/\\\\\\/surat.jemberkab.go.id\\\\\\/login\\\",\\\"image\\\":\\\"bG2UySACva4LxkQmFqQEBsvjbJ0aANj68fZ0aLQSgJqG8WUEUtduutsHUds1.png\\\"}\",\"{\\\"url\\\":\\\"http:\\\\\\/\\\\\\/surat.jemberkab.go.id\\\\\\/\\\",\\\"image\\\":\\\"PB2mVRplDMAMAEyUkmJKILKej726pLgz1z2yQEB9tMVz0TdwZPp0XWTdCT59.jpeg\\\"}\",\"{\\\"url\\\":\\\"https:\\\\\\/\\\\\\/www.facebook.com\\\\\\/Dinas-Komunikasi-Informatika-Kabupaten-Jember-1911954692385233\\\\\\/\\\",\\\"image\\\":\\\"RlHpR7orOedlqmeMCYtQfOItzw8QskKwf8PeceFixeRvjO9s1KZgPR8ZFlWn.png\\\"}\",\"{\\\"url\\\":\\\"https:\\\\\\/\\\\\\/instagram.com\\\\\\/kominfojember?igshid=9qaq6s11xwfv\\\",\\\"image\\\":\\\"Ad8WCvFKVj4vWichXQcYv4reD1IV0Yi8R9iOCAuOuiBNkgJP0QN7GICRA4S3.png\\\"}\"]','{\"selayang\":\"47fiqWKE9mlodFxZlnh381WjTaK8fsWz4JwkroC9h9YD6RRC6FOeFDQQlZiI.txt\",\"visi\":\"zqa4RoCaXmnDoHjh5c7UI55kEw6atxKhCg2hyOZAq7oxnJB44djTI7DjmIuZ.txt\",\"struktur\":\"QV58peI3p4An2gGzHi0RgQRMY1F9qjpn1akF25IthLBLGbjiwAVSVXBWGdeX.txt\",\"layanan\":\"CdyIwuQ1a5ziP237IWGxvA5HCHuyeFJKVZ5hISW0OwEJdkTBuiAMC0ANJGtd.txt\",\"alamat\":\"5cDuZ2xpypcOH9ZUJGMSVJBzrFcOzGlMx2s1zLcpfNx3FjWKTQistREmaOUN.txt\",\"kontak\":\"ygGaLQi3GSicW3t3HUMkoAkaQXI4aq75IfTDCaH6JCR8MtT4pax3RUo5LwIO.txt\",\"ppid\":\"bjvenRcjVWwd5ubw4iU5q97dV3WkTF2eraXDp95xOsq0TVpmUgAzCuh3UqPm.txt\"}','[\"https:\\/\\/www.facebook.com\\/ppidkabjember\\/?modal=admin_todo_tour\",\"tes\",\"tes\",\"tes\"]','2018-11-29 09:32:25','2021-05-13 11:39:56'),(2,NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (3,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','-','b3217-jember-kota-pandhalungan-slider-2.jpg',NULL,'2021-03-25 07:18:25','2021-03-25 07:22:50'),(4,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','-','4633f-slider-gerbrak-masker-2.jpg',NULL,'2021-03-25 07:27:04','2021-03-25 07:27:04'),(5,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','-','77b09-slider-germas-coron.jpg',NULL,'2021-03-25 07:29:10','2021-03-25 07:29:10'),(6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','-','16ed9-slider-website-2020-09.jpg',NULL,'2021-03-25 07:31:49','2021-03-25 07:31:49'),(9,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','Ucapkan Selamat Hari Raya Idul Fitri','903cf-whatsapp-image-2021-05-15-at-08.03.17.jpeg',NULL,'2021-05-13 13:22:42','2021-05-17 01:05:49'),(10,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','Plt. Kadis Kominfo','156bf-whatsapp-image-2021-05-26-at-10.28.44.jpeg',NULL,'2021-05-17 00:44:34','2021-05-17 01:04:42');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `url`
--

DROP TABLE IF EXISTS `url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `url` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url`
--

LOCK TABLES `url` WRITE;
/*!40000 ALTER TABLE `url` DISABLE KEYS */;
INSERT INTO `url` VALUES (1,'','');
/*!40000 ALTER TABLE `url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_levels`
--

DROP TABLE IF EXISTS `user_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_levels`
--

LOCK TABLES `user_levels` WRITE;
/*!40000 ALTER TABLE `user_levels` DISABLE KEYS */;
INSERT INTO `user_levels` VALUES (1,'Administrator','2018-11-29 04:33:40','2018-11-29 04:33:40'),(2,'editing','2019-01-09 03:38:14','2019-01-09 03:38:14');
/*!40000 ALTER TABLE `user_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_level_id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `users_user_level_id_foreign` (`user_level_id`) USING BTREE,
  CONSTRAINT `users_user_level_id_foreign` FOREIGN KEY (`user_level_id`) REFERENCES `user_levels` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (16,1,'admin@admin.com','administrator','21232f297a57a5a743894a0e4a801fc3',NULL,NULL),(17,2,'editor@editor.com','nama editor content','5aee9dbd2a188839105073571bee1b1f',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor`
--

LOCK TABLES `visitor` WRITE;
/*!40000 ALTER TABLE `visitor` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-02 10:34:17
