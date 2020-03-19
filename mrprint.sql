-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2020 pada 04.38
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrprint`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `wallet` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id_customer`, `id_user`, `wallet`) VALUES
(2, 2, 0),
(3, 6, 120000),
(5, 11, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_kabupaten`
--

CREATE TABLE `list_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_kabupaten`
--

INSERT INTO `list_kabupaten` (`id_kabupaten`, `id_provinsi`, `nama_kabupaten`) VALUES
(1, 1, 'Kabupaten Aceh Barat'),
(2, 1, 'Kabupaten Aceh Barat Daya'),
(3, 1, 'Kabupaten Aceh Besar'),
(4, 1, 'Kabupaten Aceh Jaya'),
(5, 1, 'Kabupaten Aceh Selatan'),
(6, 1, 'Kabupaten Aceh Singkil'),
(7, 1, 'Kabupaten Aceh Tamiang'),
(8, 1, 'Kabupaten Aceh Tengah'),
(9, 1, 'Kabupaten Aceh Tenggara'),
(10, 1, 'Kabupaten Aceh Timur'),
(11, 1, 'Kabupaten Aceh Utara'),
(12, 1, 'Kabupaten Bener Meriah'),
(13, 1, 'Kabupaten Bireuen'),
(14, 1, 'Kabupaten Gayo Lues'),
(15, 1, 'Kabupaten Nagan Raya'),
(16, 1, 'Kabupaten Pidie'),
(17, 1, 'Kabupaten Pidie Jaya'),
(18, 1, 'Kabupaten Simeulue'),
(19, 1, 'Kota Langsa'),
(20, 1, 'Kota Lhokseumawe'),
(21, 1, 'Kota Sabang'),
(22, 1, 'Kota Subulussalam'),
(23, 2, 'Kabupaten Badung'),
(24, 2, 'Kabupaten Bangil'),
(25, 2, 'Kabupaten Buleleng'),
(26, 2, 'Kabupaten Gianyar'),
(27, 2, 'Kabupaten Jembrana'),
(28, 2, 'Kabupaten Karangasem'),
(29, 2, 'Kabupaten Klungkung'),
(30, 2, 'Kabupaten Tabanan'),
(31, 2, 'Kota Denpasar'),
(32, 3, 'Kabupaten Lebak'),
(33, 3, 'Kabupaten Pandeglang'),
(34, 3, 'Kabupaten Serang'),
(35, 3, 'Kabupaten Tangerang'),
(36, 3, 'Kota Cilegon'),
(37, 3, 'Kota Serang'),
(38, 3, 'Kota Tangerang'),
(39, 3, 'Kota Tangerang Selatan'),
(40, 4, 'Kabupaten Bengkulu Selatan'),
(41, 4, 'Kabupaten Bengkulu Tengah'),
(42, 4, 'Kabupaten Bengkulu Utara'),
(43, 4, 'Kabupaten Kaur'),
(44, 4, 'Kabupaten Kapahiang'),
(45, 4, 'Kabupaten Lebong'),
(46, 4, 'Kabupaten Mukomuko'),
(47, 4, 'Kabupaten Rejang Lebong'),
(48, 4, 'Kabupaten Seluma'),
(49, 4, 'Kota Bengkulu'),
(50, 5, 'Kabupaten Bantul'),
(51, 5, 'Kabupaten Gunung Kidul'),
(52, 5, 'Kabupaten Kulon Progo'),
(53, 5, 'Kabupaten Sleman'),
(54, 5, 'Kota Yogyakarta'),
(55, 6, 'Kabupaten Pulau Seribu'),
(56, 6, 'Kota Jakarta Barat'),
(57, 6, 'Kota Jakarta Pusat'),
(58, 6, 'Kota Jakarta Selatan'),
(59, 6, 'Kota Jakarta Timur'),
(60, 6, 'Kota Jakarta Utara'),
(61, 7, 'Kabupaten Boalemo'),
(62, 7, 'Kabupaten Bone Bolango'),
(63, 7, 'Kabupaten Gorontalo'),
(64, 7, 'Kabupaten Gorontalo Utara'),
(65, 7, 'Kabupaten Pahuwato'),
(66, 7, 'Kota Gorontalo'),
(67, 8, 'Kabupaten Batanghari'),
(68, 8, 'Kabupaten Bungo'),
(69, 8, 'Kabupaten Kerinci'),
(70, 8, 'Kabupaten Merangin'),
(71, 8, 'Kabupaten Muaro Jambi'),
(72, 8, 'Kabupaten Sarolangun'),
(73, 8, 'Kabupaten Tanjung Jabung Barat'),
(74, 8, 'Kabupaten Tanjung Jabung Timur'),
(75, 8, 'Kabupaten Tebo'),
(76, 8, 'Kota Jambi'),
(77, 8, 'Kota Sungai Penuh'),
(78, 9, 'Kabupaten Bandung'),
(79, 9, 'Kabupaten Bandung Barat'),
(80, 9, 'Kabupaten Bekasi'),
(81, 9, 'Kabupaten Bogor'),
(82, 9, 'Kabupaten Ciamis'),
(83, 9, 'Kabupaten Cianjur'),
(84, 9, 'Kabupaten Cirebon'),
(85, 9, 'Kabupaten Garut'),
(86, 9, 'Kabupaten Indramayu'),
(87, 9, 'Kabupaten Karawang'),
(88, 9, 'Kabupaten Kuningan'),
(89, 9, 'Kabupaten Majalengka'),
(90, 9, 'Kabupaten Pangandaran'),
(91, 9, 'Kabupaten Purwakarta'),
(92, 9, 'Kabupaten Subang'),
(93, 9, 'Kabupaten Sukabumi'),
(94, 9, 'Kabupaten Sumedang'),
(95, 9, 'Kabupaten Tasikmalaya'),
(96, 9, 'Kota Bandung'),
(97, 9, 'Kota Banjar'),
(98, 9, 'Kota Bekasi'),
(99, 9, 'Kota Bogor'),
(100, 9, 'Kota Cimahi'),
(101, 9, 'Kota Cirebon'),
(102, 9, 'Kota Depok'),
(103, 9, 'Kota Tasikmalaya'),
(104, 10, 'Kabupaten Banjarnegara'),
(105, 10, 'Kabupaten Banyumas'),
(106, 10, 'Kabupaten Batang'),
(107, 10, 'Kabupaten Blora'),
(108, 10, 'Kabupaten Boyolali'),
(109, 10, 'Kabupaten Brebes'),
(110, 10, 'Kabupaten Cilacap'),
(111, 10, 'Kabupaten Demak'),
(112, 10, 'Kabupaten Grobogan'),
(113, 10, 'Kabupaten Jepara'),
(114, 10, 'Kabupaten Karanganyar'),
(115, 10, 'Kabupaten Kebumen'),
(116, 10, 'Kabupaten Kendal'),
(117, 10, 'Kabupaten Klaten'),
(118, 10, 'Kabupaten Kudus'),
(119, 10, 'Kabupaten Magelang'),
(120, 10, 'Kabupaten Pati'),
(121, 10, 'Kabupaten Pekalongan'),
(122, 10, 'Kabupaten Pemalang'),
(123, 10, 'Kabupaten Purbalingga'),
(124, 10, 'Kabupaten Purworejo'),
(125, 10, 'Kabupaten Rembang'),
(126, 10, 'Kabupaten Semarang'),
(127, 10, 'Kabupaten Sragen'),
(128, 10, 'Kabupaten Sukoharjo'),
(129, 10, 'Kabupaten Tegal'),
(130, 10, 'Kabupaten Temanggung'),
(131, 10, 'Kabupaten Wonogiri'),
(132, 10, 'Kabupaten Wonosobo'),
(133, 10, 'Kota Magelang'),
(134, 10, 'Kota Pekalongan'),
(135, 10, 'Kota Salatiga'),
(136, 10, 'Kota Semarang'),
(137, 10, 'Kota Surakarta'),
(138, 10, 'Kota Tegal'),
(139, 11, 'Kabupaten Bangkalan'),
(140, 11, 'Kabupaten Banyuwangi'),
(141, 11, 'Kabupaten Blitar'),
(142, 11, 'Kabupaten Bojonegoro'),
(143, 11, 'Kabupaten Bondowoso'),
(144, 11, 'Kabupaten Gresik'),
(145, 11, 'Kabupaten Jember'),
(146, 11, 'Kabupaten Jombang'),
(147, 11, 'Kabupaten Kediri'),
(148, 11, 'Kabupaten Lamongan'),
(149, 11, 'Kabupaten Lumajang'),
(150, 11, 'Kabupaten Madiun'),
(151, 11, 'Kabupaten Magetan'),
(152, 11, 'Kabupaten Malang'),
(153, 11, 'Kabupaten Mojokerto'),
(154, 11, 'Kabupaten Nganjuk'),
(155, 11, 'Kabupaten Ngawi'),
(156, 11, 'Kabupaten Pacitan'),
(157, 11, 'Kabupaten Pamekasan'),
(158, 11, 'Kabupaten Pasuruan'),
(159, 11, 'Kabupaten Ponorogo'),
(160, 11, 'Kabupaten Probolinggo'),
(161, 11, 'Kabupaten Sampang'),
(162, 11, 'Kabupaten Sidoarjo'),
(163, 11, 'Kabupaten Situbondo'),
(164, 11, 'Kabupaten Sumenep'),
(165, 11, 'Kabupaten Trenggalek'),
(166, 11, 'Kabupaten Tuban'),
(167, 11, 'Kabupaten Tulungagung'),
(168, 11, 'Kota Batu'),
(169, 11, 'Kota Blitar'),
(170, 11, 'Kota Kediri'),
(171, 11, 'Kota Madiun'),
(172, 11, 'Kota Malang'),
(173, 11, 'Kota Mojokerto'),
(174, 11, 'Kota Pasuruan'),
(175, 11, 'Kota Probolinggo'),
(176, 11, 'Kota Surabaya'),
(177, 12, 'Kabupaten Bengkayang'),
(178, 12, 'Kabupaten Kapuas Hulu'),
(179, 12, 'Kabupaten Kayong Utara'),
(180, 12, 'Kabupaten Ketapang'),
(181, 12, 'Kabupaten Kubu Raya'),
(182, 12, 'Kabupaten Landak'),
(183, 12, 'Kabupaten Melawi'),
(184, 12, 'Kabupaten Pontianak'),
(185, 12, 'Kabupaten Sambas'),
(186, 12, 'Kabupaten Sanggau'),
(187, 12, 'Kabupaten Sekadau'),
(188, 12, 'Kabupaten Sintang'),
(189, 12, 'Kota Pontianak'),
(190, 12, 'Kota Singkawang'),
(191, 13, 'Kabupaten Balangan'),
(192, 13, 'Kabupaten Banjar'),
(193, 13, 'Kabupaten Barito Kuala'),
(194, 13, 'Kabupaten Hulu Sungai Selatan'),
(195, 13, 'Kabupaten Hulu Sungai Tengah'),
(196, 13, 'Kabupaten Hulu Sungai Utara'),
(197, 13, 'Kabupaten Kotabaru'),
(198, 13, 'Kabupaten Tabalong'),
(199, 13, 'Kabupaten Tanah Bumbu'),
(200, 13, 'Kabupaten Tanah Laut'),
(201, 13, 'Kabupaten Tapin'),
(202, 13, 'Kota Banjarbaru'),
(203, 13, 'Kota Banjarmasin'),
(204, 14, 'Kabupaten Barito Selatan'),
(205, 14, 'Kabupaten Barito Timur'),
(206, 14, 'Kabupaten Barito Utara'),
(207, 14, 'Kabupaten Gunung Mas'),
(208, 14, 'Kabupaten Kapuas'),
(209, 14, 'Kabupaten Katingan'),
(210, 14, 'Kabupaten Kotawaringin Barat'),
(211, 14, 'Kabupaten Kotawaringin Timur'),
(212, 14, 'Kabupaten Lamandau'),
(213, 14, 'Kabupaten Murung Raya'),
(214, 14, 'Kabupaten Pulang Pisau'),
(215, 14, 'Kabupaten Sukamara'),
(216, 14, 'Kabupaten Seruyan'),
(217, 14, 'Kota Palangkaraya'),
(218, 15, 'Kabupaten Berau'),
(219, 15, 'Kabupaten Kutai Barat'),
(220, 15, 'Kabupaten Kutai aertanegara'),
(221, 15, 'Kabupaten Kutai Timur'),
(222, 15, 'Kabupaten Paser'),
(223, 15, 'Kabupaten Penajam Paser Utara'),
(224, 15, 'Kabupaten Mahakam Ulu'),
(225, 15, 'Kota Balikpapan'),
(226, 15, 'Kota Bontang'),
(227, 15, 'Kota Samarinda'),
(228, 16, 'Kabupaten Bulungan'),
(229, 16, 'Kabupaten Malinau'),
(230, 16, 'Kabupaten Nunukan'),
(231, 16, 'Kabupaten Tana Tidung'),
(232, 16, 'Kota Tarakan'),
(233, 17, 'Kabupaten Bangka'),
(234, 17, 'Kabupaten Bangka Barat'),
(235, 17, 'Kabupaten Bangka Selatan'),
(236, 17, 'Kabupaten Bangka Tengah'),
(237, 17, 'Kabupaten Belitung'),
(238, 17, 'Kabupaten Belitung Timur'),
(239, 17, 'Kota Pangkalpinang'),
(240, 18, 'Kabupaten Bintan'),
(241, 18, 'Kabupaten Karimun'),
(242, 18, 'Kabupaten Kepulauan Anambas'),
(243, 18, 'Kabupaten Lingga'),
(244, 18, 'Kabupaten Natuna'),
(245, 18, 'Kota Batam'),
(246, 18, 'Kota Tanjung Pinang'),
(247, 19, 'Kabupaten Lampung Barat'),
(248, 19, 'Kabupaten Lampung Selatan'),
(249, 19, 'Kabupaten Lampung Tengah'),
(250, 19, 'Kabupaten Lampung Timur'),
(251, 19, 'Kabupaten Lampung Utara'),
(252, 19, 'Kabupaten Mesuji'),
(253, 19, 'Kabupaten Pesawaran'),
(254, 19, 'Kabupaten Pringsewu'),
(255, 19, 'Kabupaten Tanggamus'),
(256, 19, 'Kabupaten Tulang Bawang'),
(257, 19, 'Kabupaten Tulang Bawang Barat'),
(258, 19, 'Kabupaten Way Kanan'),
(259, 19, 'Kabupaten Pesisir Barat'),
(260, 19, 'Kota Bandar Lampung'),
(261, 19, 'Kota Kotabumi'),
(262, 19, 'Kota Liwa'),
(263, 19, 'Kota Metro'),
(264, 20, 'Kabupaten Buru'),
(265, 20, 'Kabupaten Buru Selatan'),
(266, 20, 'Kabupaten Kepulauan Aru'),
(267, 20, 'Kabupaten Maluku Barat Daya'),
(268, 20, 'Kabupaten Maluku Tengah'),
(269, 20, 'Kabupaten Tenggara'),
(270, 20, 'Kabupaten Tenggara Barat'),
(271, 20, 'Kabupaten Seram Bagian Barat'),
(272, 20, 'Kabupaten Seram Bagian Timur'),
(273, 20, 'Kota Ambon'),
(274, 20, 'Kota Tual'),
(275, 21, 'Kabupaten Halmahera Barat'),
(276, 21, 'Kabupaten Halmahera Tengah'),
(277, 21, 'Kabupaten Halmahera Utara'),
(278, 21, 'Kabupaten Halmahera Selatan'),
(279, 21, 'Kabupaten Halmahera Timur'),
(280, 21, 'Kabupaten Kepulauan Sula'),
(281, 21, 'Kabupaten Pulau Morotai'),
(282, 21, 'Kabupaten Pulau Taliabu'),
(283, 21, 'Kota Ternate'),
(284, 21, 'Kota Tidore Kepualauan'),
(285, 22, 'Kabupaten Bima'),
(286, 22, 'Kabupaten Dompu'),
(287, 22, 'Kabupaten Lombok Barat'),
(288, 22, 'Kabupaten Lombok Tengah'),
(289, 22, 'Kabupaten Lombok Timur'),
(290, 22, 'Kabupaten Lombok Utara'),
(291, 22, 'Kabupaten Sumbawa'),
(292, 22, 'Kabupaten Sumbawa Barat'),
(293, 22, 'Kota Bima'),
(294, 22, 'Kota Mataram'),
(295, 23, 'Kabupaten Alor'),
(296, 23, 'Kabupaten Belu'),
(297, 23, 'Kabupaten Ende'),
(298, 23, 'Kabupaten Flores Timur'),
(299, 23, 'Kabupaten Kupang'),
(300, 23, 'Kabupaten Lembata'),
(301, 23, 'Kabupaten Manggarai'),
(302, 23, 'Kabupaten Manggarai Barat'),
(303, 23, 'Kabupaten Manggarai Timur'),
(304, 23, 'Kabupaten Ngada'),
(305, 23, 'Kabupaten Nagekeo'),
(306, 23, 'Kabupaten Rote Ndao'),
(307, 23, 'Kabupaten Sabu Raijua'),
(308, 23, 'Kabupaten Sikka'),
(309, 23, 'Kabupaten Sumba Barat'),
(310, 23, 'Kabupaten Sumba Barat Daya'),
(311, 23, 'Kabupaten Sumba Tengah'),
(312, 23, 'Kabupaten Sumba Timur'),
(313, 23, 'Kabupaten Timor Tengah Selatan'),
(314, 23, 'Kabupaten Timor Tengah Utara'),
(315, 23, 'Kota Kupang'),
(316, 24, 'Kabupaten Asmat'),
(317, 24, 'Kabupaten Biak Numfor'),
(318, 24, 'Kabupaten Boven Digoel'),
(319, 24, 'Kabupaten Deiyai'),
(320, 24, 'Kabupaten Dogiyai'),
(321, 24, 'Kabupaten Intan Jaya'),
(322, 24, 'Kabupaten Jayapura'),
(323, 24, 'Kabupaten Jayawijaya'),
(324, 24, 'Kabupaten Keerom'),
(325, 24, 'Kabupaten Kepulauan Yapen'),
(326, 24, 'Kabupaten Lanny Jaya'),
(327, 24, 'Kabupaten Mamberamo Raya'),
(328, 24, 'Kabupaten Mamberamo Tengah'),
(329, 24, 'Kabupaten Mappi'),
(330, 24, 'Kabupaten Merauke'),
(331, 24, 'Kabupaten Mimika'),
(332, 24, 'Kabupaten Nabire'),
(333, 24, 'Kabupaten Nduga'),
(334, 24, 'Kabupaten Paniai'),
(335, 24, 'Kabupaten Pegunungan Bintang'),
(336, 24, 'Kabupaten Puncak'),
(337, 24, 'Kabupaten Puncak Jaya'),
(338, 24, 'Kabupaten Sarmi'),
(339, 24, 'Kabupaten Supiori'),
(340, 24, 'Kabupaten Tolikara'),
(341, 24, 'Kabupaten Waropen'),
(342, 24, 'Kabupaten Yahukimo'),
(343, 24, 'Kabupaten Yalimo'),
(344, 24, 'Kota Jayapura'),
(345, 25, 'Kabupaten Fakfak'),
(346, 25, 'Kabupaten Kaimana'),
(347, 25, 'Kabupaten Manokwari'),
(348, 25, 'Kabupaten Manokwari Selatan'),
(349, 25, 'Kabupaten Maybrat'),
(350, 25, 'Kabupaten Pegunungan Arfak'),
(351, 25, 'Kabupaten Raja Ampat'),
(352, 25, 'Kabupaten Sorong'),
(353, 25, 'Kabupaten Sorong Selatan'),
(354, 25, 'Kabupaten Tambrauw'),
(355, 25, 'Kabupaten  Teluk Bintuni'),
(356, 25, 'Kabupaten Teluk Wondama'),
(357, 25, 'Kota Sorong'),
(358, 26, 'Kabupaten Bengkalis'),
(359, 26, 'Kabupaten Indragiri Hilir'),
(360, 26, 'Kabupaten Indragiri Hulu'),
(361, 26, 'Kabupaten Kampar'),
(362, 26, 'Kabupaten Kuantan Singingi'),
(363, 26, 'Kabupaten Pelalawan'),
(364, 26, 'Kabupaten Rokan Hilir'),
(365, 26, 'Kabupaten Rokan Hulu'),
(366, 26, 'Kabupaten Siak'),
(367, 26, 'Kabupaten Kepulauan Meranti'),
(368, 26, 'Kota Dumai'),
(369, 26, 'Kota Pekanbaru'),
(370, 27, 'Kabupaten Majene'),
(371, 27, 'Kabupaten Mamasa'),
(372, 27, 'Kabupaten Mamuju'),
(373, 27, 'Kabupaten Mamuju Utara'),
(374, 27, 'Kabupaten Polewali Mandar'),
(375, 27, 'Kabupaten Mamuju Tengah'),
(376, 28, 'Kabupaten Bantaeng'),
(377, 28, 'Kabupaten Barru'),
(378, 28, 'Kabupaten Bone Watampone'),
(379, 28, 'Kabupaten Bulukumba'),
(380, 28, 'Kabupaten Enrekang'),
(381, 28, 'Kabupaten Gowa'),
(382, 28, 'Kabupaten Jeneponto'),
(383, 28, 'Kabupaten Kepulauan Selayar'),
(384, 28, 'Kabupaten Luwu'),
(385, 28, 'Kabupaten Luwu Timur'),
(386, 28, 'Kabupaten Luwu Utara'),
(387, 28, 'Kabupaten Maros'),
(388, 28, 'Kabupaten Pangkajene dan Kepulauan'),
(389, 28, 'Kabupaten Pinrang'),
(390, 28, 'Kabupaten Sidenreng Rappang'),
(391, 28, 'Kabupaten Sinjai'),
(392, 28, 'Kabupaten Soppeng'),
(393, 28, 'Kabupaten Takalar'),
(394, 28, 'Kabupaten Tana Toraja'),
(395, 28, 'Kabupaten Toraja Utara'),
(396, 28, 'Kabupaten Wajo'),
(397, 28, 'Kota Makassar'),
(398, 28, 'Kota Palopo'),
(399, 28, 'Kota Parepare'),
(400, 29, 'Kabupaten Banggai'),
(401, 29, 'Kabupaten Banggai Kepulauan'),
(402, 29, 'Kabupaten Banggai Laut'),
(403, 29, 'Kabupaten Buol'),
(404, 29, 'Kabupaten Morowali'),
(405, 29, 'Kabupaten Parigi Moutong'),
(406, 29, 'Kabupaten Poso'),
(407, 29, 'Kabupaten Sigi'),
(408, 29, 'Kabupaten Tojo Una-Una'),
(409, 29, 'Kabupaten Tolitoli'),
(410, 29, 'Kota Palu'),
(411, 30, 'Kabupaten Bombana'),
(412, 30, 'Kabupaten Buton'),
(413, 30, 'Kabupaten Buton Utara'),
(414, 30, 'Kabupaten Kolaka'),
(415, 30, 'Kabupaten Kolaka Timur'),
(416, 30, 'Kabupaten Kolaka Utara'),
(417, 30, 'Kabupaten Konawe'),
(418, 30, 'Kabupaten Konawe Selatan'),
(419, 30, 'Kabupaten Konawe Utara'),
(420, 30, 'Kabupaten Konawe Kepulauan'),
(421, 30, 'Kabupaten Muna'),
(422, 30, 'Kabupaten Wakatobi'),
(423, 30, 'Kota Bau-Bau'),
(424, 30, 'Kota Kendari'),
(425, 31, 'Kabupaten Bolaang Mongondow'),
(426, 31, 'Kabupaten Bolaang Mongondow Selatan'),
(427, 31, 'Kabupaten Bolaang Mongondow Timur'),
(428, 31, 'Kabupaten Bolaang Mongondow Utara'),
(429, 31, 'Kabupaten Kepulauan Sangihe'),
(430, 31, 'Kabupaten Kepulauan Siau Tagulandang Biaro'),
(431, 31, 'Kabupaten Kepulauan Talaud'),
(432, 31, 'Kabupaten Minahasa'),
(433, 31, 'Kabupaten Minahasa Selatan'),
(434, 31, 'Kabupaten Minahasa Tenggara'),
(435, 31, 'Kabupaten Minahasa Utara'),
(436, 31, 'Kota Bitung'),
(437, 31, 'Kota Kotamobagu'),
(438, 31, 'Kota Manado'),
(439, 31, 'Kota Tomohon'),
(440, 32, 'Kabupaten Agam'),
(441, 32, 'Kabupaten Dharmsraya'),
(442, 32, 'Kabupaten Kepulauan Mentawai'),
(443, 32, 'Kabupaten Lima Puluh Kota'),
(444, 32, 'Kabupaten Padang Pariaman'),
(445, 32, 'Kabupaten Pasaman'),
(446, 32, 'Kabupaten Pasaman barat'),
(447, 32, 'Kabupaten Pesisir Selatan'),
(448, 32, 'Kabupaten Sijunjung'),
(449, 32, 'Kabupaten Solok'),
(450, 32, 'Kabupaten Solok Selatan'),
(451, 32, 'Kabupaten Tanah Datar'),
(452, 32, 'Kota Bukittinggi'),
(453, 32, 'Kota Padang'),
(454, 32, 'Kota Padangpanjang'),
(455, 32, 'Kota Pariaman'),
(456, 32, 'Kota Payakumbuh'),
(457, 32, 'Kota Sawahlunto'),
(458, 32, 'Kota Solok'),
(459, 33, 'Kabupaten Banyuasin'),
(460, 33, 'Kabupaten Empat Lawang'),
(461, 33, 'Kabupaten Lahat'),
(462, 33, 'Kabupaten Muara Enim'),
(463, 33, 'Kabupaten Musi Banyuasin'),
(464, 33, 'Kabupaten Musi Rawas'),
(465, 33, 'Kabupaten Ogan Ilir'),
(466, 33, 'Kabupaten Ogan Komering Ilir'),
(467, 33, 'Kabupaten Ogan Komering Ulu'),
(468, 33, 'Kabupaten Ogan Komering Ulu Selatan'),
(469, 33, 'Kabupaten Penukal Abab Lematang Ilir'),
(470, 33, 'Kabupaten Ogan Komering Ulu Timur'),
(471, 33, 'Kota Lubuklinggau'),
(472, 33, 'Kota Pagar Alam'),
(473, 33, 'Kota Palembang'),
(474, 33, 'Kota Prabumulih'),
(475, 34, 'Kabupaten Asahan'),
(476, 34, 'Kabupaten Batubara'),
(477, 34, 'Kabupaten Dairi'),
(478, 34, 'Kabupaten Deli Serdang'),
(479, 34, 'Kabupaten Humbang Hasundutan'),
(480, 34, 'Kabupaten Karo Kabanjahe'),
(481, 34, 'Kabupaten Labuhanbatu'),
(482, 34, 'Kabupaten Labuhanbaru Selatan'),
(483, 34, 'Kabupaten Labuhanbatu Utara'),
(484, 34, 'Kabupaten Langkat'),
(485, 34, 'Kabupaten Mandailing Natal'),
(486, 34, 'Kabupaten Nias'),
(487, 34, 'Kabupaten Nias Barat'),
(488, 34, 'Kabupaten Nias Selatan'),
(489, 34, 'Kabupaten Nias Utara'),
(490, 34, 'Kabupaten Padang Lawas'),
(491, 34, 'Kabupaten Padang Lawas Utara'),
(492, 34, 'Kabupaten Pakpak Bharat'),
(493, 34, 'Kabupaten Samosir'),
(494, 34, 'Kabupaten Serdang Bedagai'),
(495, 34, 'Kabupaten Simalungun'),
(496, 34, 'Kabupaten Tapanuli Selatan'),
(497, 34, 'Kabupaten Tapanuli Tengah'),
(498, 34, 'Kabupaten Tapanuli Utara'),
(499, 34, 'Kabupaten Toba Samosir'),
(500, 34, 'Kota Binjai'),
(501, 34, 'Kota Gunungsitoli'),
(502, 34, 'Kota Medan'),
(503, 34, 'Kota Padangsidempuan'),
(504, 34, 'Kota Pemantang Siantar'),
(505, 34, 'Kota Sibolga'),
(506, 34, 'Kota Tanjung Balai'),
(507, 34, 'Kota Tebing Tinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_provinsi`
--

CREATE TABLE `list_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_provinsi`
--

INSERT INTO `list_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Aceh'),
(2, 'Bali'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'D.I Yogyakarta'),
(6, 'D.K.I Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Bangka Belitung'),
(18, 'Kepulauan Riau'),
(19, 'Lampung'),
(20, 'Maluku'),
(21, 'Maluku Utara'),
(22, 'Nusa Tenggara Barat'),
(23, 'Nusa Tenggara Timur'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_report`
--

CREATE TABLE `log_report` (
  `id_log` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_report`
--

INSERT INTO `log_report` (`id_log`, `id_transaction`, `keterangan`) VALUES
(1, 3, 'File corrupt atau mengandung virus'),
(2, 3, 'Jumlah halaman tidak sesuai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_payment`
--

CREATE TABLE `master_payment` (
  `id_payment` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `bukti_bayar` varchar(250) DEFAULT NULL,
  `status_pembayaran` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_payment`
--

INSERT INTO `master_payment` (`id_payment`, `id_transaction`, `jumlah_bayar`, `bukti_bayar`, `status_pembayaran`) VALUES
(3, 3, 5000, 'Bayar dengan dompet', 2),
(4, 4, 5000, 'PRJ-2020031812072032.png', 2),
(5, 6, 10000, 'TOP-202003182232033.png', 2),
(6, 7, 20000, 'TOP-202003182257313.png', 2),
(7, 8, 100000, 'TOP-202003182310023.png', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_transactions`
--

CREATE TABLE `master_transactions` (
  `id_transaction` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `nama_file` varchar(100) DEFAULT NULL,
  `jumlah_halaman` int(11) DEFAULT NULL,
  `tgl_pengambilan` date DEFAULT NULL,
  `jam_pengambilan` time DEFAULT NULL,
  `komentar` varchar(250) DEFAULT NULL,
  `id_customer` int(11) NOT NULL,
  `id_partners` int(11) DEFAULT NULL,
  `status_printing` int(1) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_transactions`
--

INSERT INTO `master_transactions` (`id_transaction`, `invoice`, `nama_file`, `jumlah_halaman`, `tgl_pengambilan`, `jam_pengambilan`, `komentar`, `id_customer`, `id_partners`, `status_printing`, `type`, `date_created`) VALUES
(3, 'PRJ-2020031812054832', '2020031812054832.docx', 12, '2020-03-20', '12:00:00', 'Tidak usah dijilid', 3, 2, 1, 'printing', '2020-03-18 12:05:48'),
(4, 'PRJ-2020031812072032', '2020031812072032.docx', 10, '2020-03-20', '10:30:00', 'Tidak usah dijilid', 3, 2, 1, 'printing', '2020-03-18 12:07:20'),
(6, 'TOP-202003182232033', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 'top-up', '2020-03-18 22:32:03'),
(7, 'TOP-202003182257313', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 'top-up', '2020-03-18 22:57:31'),
(8, 'TOP-202003182310023', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 'top-up', '2020-03-18 23:10:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partners`
--

CREATE TABLE `partners` (
  `id_partners` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `kabupaten` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `link_g_map` varchar(256) NOT NULL,
  `telphone` varchar(20) NOT NULL,
  `description` varchar(256) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status_shop` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `partners`
--

INSERT INTO `partners` (`id_partners`, `id_user`, `shop_name`, `price`, `provinsi`, `kabupaten`, `address`, `link_g_map`, `telphone`, `description`, `image`, `status_shop`) VALUES
(1, 5, 'Bersama Printing', 300, 5, 51, 'Jalan bahagia 6 no 24 RT 003/02 Kreo Selatan larangan', 'http://google.com', '0896-6200-6624', 'Kami siap membantu anda setiap saat', 'dummy-profile-image-png-2.png', 1),
(2, 7, 'Printing Maju', 500, 6, 56, 'Jalan bahagia 6 no 24 RT 003/02 Kreo Selatan larangan', 'http://google.com', '0896-6200-6624', 'Kami siap membantu anda', 'default.jpg', 1),
(3, 8, 'Hakuna Printing', 500, 5, 51, 'Jalan bahagia 6 no 24 RT 003/02 Kreo Selatan larangan', 'http://google.com', '0896-6200-6624', 'Kami siap membantu anda', 'default.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status_access` enum('owner','partner','customer') NOT NULL,
  `status_account` int(1) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `full_name`, `email`, `username`, `password`, `status_access`, `status_account`, `date_created`) VALUES
(2, 'Sigit Prasetyo Noprianto', 'owner@gmail.com', 'noprisigit', '$2y$10$UVFKYUtlOzaOvBPcCDgCx.Tjfe2BnwPLkYv2tzWawC2SzTD37x3Uy', 'owner', 1, '2020-03-17 15:28:15'),
(5, 'Mella Imelda S', 'mella@gmail.com', 'mellaimelda', '$2y$10$ApPpRoBY8vHMhz17e8lLC.EPUf.QVF6LD1U2rRVt3q/9g0lY9Be76', 'partner', 1, '2020-03-18 11:56:57'),
(6, 'Muhammad Dhika Azizi', 'dhika@gmail.com', 'mdhikas', '$2y$10$As1oClYq6xM9nOLBuChP2.CEh52cEbp2rPk/DMIUYGIR0vUqTXpYq', 'customer', 1, '2020-03-17 23:00:01'),
(7, 'Antony Ginting', 'antony@gmail.com', 'antony', '$2y$10$K7iWqNfqKw9.kRQxs.gOv..OSIWafImKwuyDSA8BWsS8lnVKNMeuW', 'partner', 1, '2020-03-18 12:02:36'),
(8, 'Hakuna Matata', 'hakuna@gmail.com', 'hakuna', '$2y$10$UG5FRG3wOgvJm39cb3Hvp.nXu2MIFxeuvCTN34uSjbOm370jBd9.2', 'partner', 1, '2020-03-18 21:29:52'),
(11, 'Sandhika', 'noprisigit@gmail.com', 'sandhika', '$2y$10$WveRxJiXs9ZsG.aUKKKE.etrZOCG0EkQrGB4myITGYSS0mYxIWPWu', 'customer', 1, '2020-03-19 09:18:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_token`
--

CREATE TABLE `users_token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_token`
--

INSERT INTO `users_token` (`id`, `email`, `token`) VALUES
(4, 'noprisigit@gmail.com', 'RSMCuHjd7oViwlwln7gn976vGgvQ9ospytjSa9+hGYw='),
(5, 'noprisigit@gmail.com', 'ggcvp5UVtKCVpA8wknSP5V7G3vpkGhOszwQIwx5LfQY=');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `customer_user` (`id_user`);

--
-- Indeks untuk tabel `list_kabupaten`
--
ALTER TABLE `list_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `kabupaten_provinsi` (`id_provinsi`);

--
-- Indeks untuk tabel `list_provinsi`
--
ALTER TABLE `list_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `log_report`
--
ALTER TABLE `log_report`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `master_payment`
--
ALTER TABLE `master_payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `payment_transaction` (`id_transaction`);

--
-- Indeks untuk tabel `master_transactions`
--
ALTER TABLE `master_transactions`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `transaction_customer` (`id_customer`);

--
-- Indeks untuk tabel `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id_partners`),
  ADD KEY `partner_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `list_kabupaten`
--
ALTER TABLE `list_kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT untuk tabel `list_provinsi`
--
ALTER TABLE `list_provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `log_report`
--
ALTER TABLE `log_report`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `master_payment`
--
ALTER TABLE `master_payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `master_transactions`
--
ALTER TABLE `master_transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `partners`
--
ALTER TABLE `partners`
  MODIFY `id_partners` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users_token`
--
ALTER TABLE `users_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customer_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `list_kabupaten`
--
ALTER TABLE `list_kabupaten`
  ADD CONSTRAINT `kabupaten_provinsi` FOREIGN KEY (`id_provinsi`) REFERENCES `list_provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_payment`
--
ALTER TABLE `master_payment`
  ADD CONSTRAINT `payment_transaction` FOREIGN KEY (`id_transaction`) REFERENCES `master_transactions` (`id_transaction`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_transactions`
--
ALTER TABLE `master_transactions`
  ADD CONSTRAINT `transaction_customer` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partner_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
