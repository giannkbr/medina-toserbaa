#
# TABLE STRUCTURE FOR: absen
#

DROP TABLE IF EXISTS `absen`;

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `image`) VALUES (4, 'admin', 'admin123', '$2y$10$0Txe4v9P/m9tGrlG6QiXoeTzsIIKf/4e79k7reWxaeV5Ph85nuvD.', 'default.png');
INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `image`) VALUES (6, 'asfasdf', 'tester', '$2y$10$ItgWexh/JThhVh9MZOXTeOsIj5U4LtSrcpJX.KTCk7TY8AbXUOkpm', 'default.png');
INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `image`) VALUES (7, 'asfasf', 'testinggg', '$2y$10$8fRxc6Tgl9w4LzTuzR0/.eQ7RycjdLDz6b4WY0m./gki4z/C9ZdFG', 'default.png');


#
# TABLE STRUCTURE FOR: jabatan
#

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(40) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (5, 'asfsafa');


#
# TABLE STRUCTURE FOR: karyawan
#

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `karyawan` (`id`, `nama`, `username`, `jabatan`, `password`, `image`, `is_active`) VALUES (1, 'Norman Ardian', 'norman', 0, '$2y$10$o7y6y2FWa4ikjw2OxrNwU.7UMWm.6hsg3Hj8odCA4aEQJ71iER88C', 'default.jpg', 1);
INSERT INTO `karyawan` (`id`, `nama`, `username`, `jabatan`, `password`, `image`, `is_active`) VALUES (2, 'anuanu', 'anuanu', 0, '$2y$10$EuzQeGN00dhfkfZAx3GUVuFgmMd4hEuqM2Wemz/wZ3bg.n7vRsbl6', 'default.jpg', 1);


