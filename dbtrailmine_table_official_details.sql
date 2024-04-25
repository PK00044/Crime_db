
-- --------------------------------------------------------

--
-- Table structure for table `official_details`
--
-- Creation: Mar 12, 2024 at 06:38 AM
-- Last update: Mar 19, 2024 at 05:01 AM
--

DROP TABLE IF EXISTS `official_details`;
CREATE TABLE IF NOT EXISTS `official_details` (
  `Name` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ;

--
-- Truncate table before insert `official_details`
--

TRUNCATE TABLE `official_details`;
--
-- Dumping data for table `official_details`
--

INSERT DELAYED IGNORE INTO `official_details` (`Name`, `ID`, `email`, `password`) VALUES
('PK', 0, 'pk@gmail.com', '$2y$10$tSFcyzLzDMwq/g7rctZIvOYYK7Gx0NstvM8e1pNTHGxCqDSAGF3xS'),
('Pratham B Kubsad', 1, 'prathamkubsad@gmail.com', '$2y$10$uROaGgPRzw/VD9ZYsIZwtu.Ts3BbRdMpyaVIzoMSti2QRsIKTUPGC'),
('pratham', 2, 'p@gmail.com', '$2y$10$v6G7Ro55AexZY13t8lgIGuSwVnHSK9s4or0zCHJ.nmxr6mmbg36/.'),
('Pratham B Kubsad', 3, 'prathamkubsad@gmail.com', '$2y$10$0psjPSjB7eBIvuDJueeHcOWMV563K3hTY7JIA49jA3WdkJHvJ7ixi'),
('pushpa N', 7, 'nayakpushpa311@gmail.com', '$2y$10$EGnx52INpOoA6PRMac0qLOhDRBvcrYGNVNYxLrtuToKyXFBhWn5Li'),
('PK', 8, 'pk2@gmail.com', '$2y$10$pewX87SYKIy75AloBni28.lArKkGTmsjblUZ2EM5de73T03MlL.Y2'),
('pk', 9, 'pk@gmail.com', '$2y$10$vkKIs4VHED7dwvLKxWegQuZANwVNSZt0.sdePqtGmGwG83x2jIfKu'),
('avc', 10, 'avc@gmail.com', '$2y$10$GYDPzzSlsa5yt2ydWmC97.4TS84MGOtQYKcCCCX6IXKOmnNwkJZ5O'),
('nandita', 123, 'nanditam2029@gmail.com', '$2y$10$iuTSjDpUkfL1guSTtxsCFODCB7VHW8x6zM3KS3v8Kmyg1Lyl4lbp.'),
('Pratham B Kubsad', 145, 'pratham@gmail.com', '$2y$10$LRqXisOuy.GTnRvkESD.fOs7WYMs7xZ2kkGpr9N10qRAd62SGtg6O');
