-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `agenda` (`id`, `photo`) VALUES
(5,	'20db093ab926d030b16d9c2aedc6f094.png');

DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `banners` (`id`, `title`, `text`, `photo`) VALUES
(1,	'Belajar tidak akan pernah membuat lelah',	'\"Pendidikan adalah bekal terbaik untuk perjalanan hidup.\" ',	'1ced87b27cee74e53502fb0abe0de2f6.jpeg'),
(2,	'Menuntut Ilmu Sedalam Mungkin',	'\"Investasi dalam pengetahuan selalu membayar bunga terbaik.\"',	'2e143da884ea37e01ca33c41e6751235.jpeg'),
(3,	'Terus Maju',	'\"Kegagalan hanyalah kesempatan untuk memulai lagi. Kali ini lebih cerdas.\"',	'05ac50d1d73333931d6c211e5806af79.jpeg');

DROP TABLE IF EXISTS `bg_majors`;
CREATE TABLE `bg_majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bg_majors` (`id`, `photo`) VALUES
(1,	'b812b356ea9cf1f14a32b66fe536e0a7.jpg');

DROP TABLE IF EXISTS `facilities`;
CREATE TABLE `facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `facilities` (`id`, `name`, `photo`) VALUES
(3,	'Lab Komputer',	'lab-komputer-20200430114840.jpg'),
(4,	'Perpustakaan',	'perpustakaan-20200430114943.jpg'),
(5,	'Kantin',	'kantin-20200430115218.jpeg'),
(6,	'Lapangan',	'lapangan-20200430115417.jpeg'),
(7,	'Lab Pemasaran',	'lab-pemasaran-20200430115719.jpg'),
(8,	'Lab Admistrasi Perkantoran',	'lab-admistrasi-perkantoran-20200430115528.jpeg'),
(9,	'Musholla',	'musholla-20200430120051.jpg'),
(10,	'Ruang Kelas',	'ruang-kelas-20200430120101.jpg');

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1,	'admin',	'Administrator'),
(2,	'members',	'General User');

DROP TABLE IF EXISTS `identity`;
CREATE TABLE `identity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `identity` (`id`, `meta_title`, `meta_description`, `meta_keyword`, `photo`) VALUES
(1,	'',	'Himbauan untuk siswa dan siswi SMK ASY-SYUHADA ROESLY  untuk tetap fokus untuk belajar dengan baik, amanah, serta berakhlak mulia.',	'SMK ASY-SYUHADA ROESLY',	'18efe02e7fcc5c6a4ee8c619e501a7d9.png');

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `majors`;
CREATE TABLE `majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menus` (`id`, `user_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1,	2,	'Pengaturan Web',	'',	'fas fa-fw fa-cog',	'Y'),
(2,	2,	'Agenda',	'jadwal',	'fas fa-fw fa-users',	'Y'),
(3,	2,	'Manajemen Media',	'',	'fas fa-fw fa-school',	'Y'),
(4,	2,	'Struktur Organisasi',	'struktur',	'fas fa-fw fa-sitemap',	'Y'),
(5,	1,	'Manajemen User',	'user',	'fas fa-fw fa-user',	'Y'),
(6,	2,	'Profile',	'',	'fas fa-fw fa-home',	'Y');

DROP TABLE IF EXISTS `opening`;
CREATE TABLE `opening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `opening` (`id`, `content`, `photo`) VALUES
(1,	'Era globalisasi dengan segala implikasinya menjadi salah satu pemicu cepatnya perubahan yang terjadi pada berbagai aspek kehidupan masyarakat, dan bila tidak ada upaya sungguh-sungguh untuk mengantisipasinya maka hal tersebut akan menjadi maslah yang sangat serius. Dalam hal ini dunia pendidikan mempunyai tanggung jawab yang besar, terutama dalam menyiapkan sumber daya manusia yang tangguh sehingga mampu hidup selaras didalam perubahan itu sendiri. Pendidikan merupakan investasi jangka panjang yang hasilnya tidak dapat dilihat dan dirasakan secara instan, sehingga sekolah sebagai ujung tombak dilapangan harus memiliki arah pengembangan jangka panjang dengan tahapan pencapaiannya yang jelas dan tetap mengakomodir tuntutan permasalahan faktual kekinian yang ada di masyarakat.',	'e528107af4c68648a6d10cd2cafba74d.jpg');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `posts` (`id`, `title`, `seo_title`, `content`, `photo`, `is_active`, `date`) VALUES
(1,	'Peserta Ujikom',	'peserta-ujikom',	'<p>Kegiatan dan pelatihan siswa dan siswi peserta ujikom, dilaksanakan dengan kesenangan serta antusian siswa dan siswi SMK ASY-SYUHADA ROESLY.<br></p>',	'-20200430120422.jpeg',	'Y',	'2020-04-30'),
(2,	'Kegiatan Outdoor',	'kegiatan-outdoor',	'<p>Kegiatan outdoor yang sangat menyenangkan dan semangat yang membara.<br></p>',	'-20200430120805.jpeg',	'Y',	'2020-04-30'),
(3,	'Perayaan Hari Batik Nasional',	'perayaan-hari-batik-nasional',	'<p>Hari raya batik nasional dilakukan dengan membatik pada kain yang dilakukan oleh seluruh aspek di sekolah.<br></p>',	'-20200430121231.jpg',	'Y',	'2020-04-30'),
(4,	'Doa Bersama ',	'doa-bersama',	'<p>Doa bersama sebelum dilaksanakannya Ujian Nasional, agar diberikan kemudahan .<br></p>',	'-20200430121342.jpg',	'Y',	'2020-04-30'),
(5,	'Kegiatan dengan Polisi',	'kegiatan-dengan-polisi',	'<p>Mengajarkan tentang etika berkendara saat di jalan raya.<br></p>',	'kegiatan-dengan-polisi-20200430121645.jpg',	'Y',	'2020-04-30'),
(6,	'Mentoring dengan Profesional',	'mentoring-dengan-profesional',	'Mentoring yang dilakukan oleh Bapak Bapak Profesional.<br>',	'mentoring-dengan-profesional-20200430121728.jpg',	'Y',	'2020-04-30'),
(7,	'Pentas Seni Tahunan',	'pentas-seni-tahunan',	'<p>Pentas seni yang dilakukan setiap tahun ini merupakan sebuah tradisi.<br></p>',	'pentas-seni-tahunan-20200430121831.jpg',	'Y',	'2020-04-30'),
(8,	'Dzikir Bareng',	'dzikir-bareng',	'<p>Dzikir bareng agar dapet pahala dan terhindar dari panasnya api neraka.<br></p>',	'dzikir-bareng-20200430121951.jpg',	'Y',	'2020-04-30');

DROP TABLE IF EXISTS `structure`;
CREATE TABLE `structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `structure` (`id`, `photo`) VALUES
(1,	'0a9a0c2cabfd87f0b94e4c30a00242b6.png');

DROP TABLE IF EXISTS `submenus`;
CREATE TABLE `submenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `sub_url` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `submenus_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `submenus` (`id`, `menu_id`, `sub_title`, `sub_url`, `is_active`) VALUES
(1,	1,	'Identitas Web',	'identitas',	'Y'),
(2,	1,	'Sambutan',	'sambutan',	'Y'),
(3,	3,	'Banner',	'banner',	'Y'),
(4,	3,	'Fasilitas',	'fasilitas',	'Y'),
(5,	3,	'Berita',	'berita',	'Y'),
(6,	3,	'Background Jurusan',	'background',	'Y');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1,	'127.0.0.1',	'administrator',	'$2y$12$63pqg8Mtq8ABN3c59RD2.OLMNLSV2hEij7bo1n59XNQFoM/xSz.iS',	'admin@mail.com',	NULL,	'',	NULL,	NULL,	NULL,	NULL,	NULL,	1268889823,	1609475933,	1,	'Tegar',	'Pratama',	NULL,	'');

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(36,	1,	1),
(37,	1,	2);

-- 2021-01-01 04:39:58
