
-- --------------------------------------------------------

--
-- Table structure for table `status`
--
-- Creation: Mar 12, 2024 at 05:14 AM
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `complaint_id` int(11) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  PRIMARY KEY (`STATUS`,`complaint_id`)
) ;

--
-- Truncate table before insert `status`
--

TRUNCATE TABLE `status`;