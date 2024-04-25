
-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--
-- Creation: Mar 11, 2024 at 07:06 PM
--

DROP TABLE IF EXISTS `password_reset`;
CREATE TABLE IF NOT EXISTS `password_reset` (
  `email` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL
) ;

--
-- Truncate table before insert `password_reset`
--

TRUNCATE TABLE `password_reset`;
--
-- Dumping data for table `password_reset`
--

INSERT DELAYED IGNORE INTO `password_reset` (`email`, `verification_code`) VALUES
('prathamkubsad@gmail.com', '8WT1GD'),
('prathamkubsad@gmail.com', '5O4DP6'),
('prathamkubsad@gmail.com', 'I9XTHL'),
('prathamkubsad@gmail.com', 'CI81X9'),
('prathamkubsad@gmail.com', 'BAL7VZ'),
('prathamkubsad@gmail.com', 'PXZ4DG'),
('prathamkubsad@gmail.com', '6TKRAN'),
('prathamkubsad@gmail.com', 'MRO2KN'),
('prathamkubsad@gmail.com', 'C3DQFH'),
('prathamkubsad@gmail.com', 'U1HXK8'),
('prathamkubsad@gmail.com', 'X19L03'),
('themaniacs45@gmail.com', '4BTPC0');
