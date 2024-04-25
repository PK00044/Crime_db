
-- --------------------------------------------------------

--
-- Table structure for table `records`
--
-- Creation: Mar 17, 2024 at 07:08 AM
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `ack_no` varchar(64) DEFAULT NULL,
  `complaint_id` int(11) NOT NULL,
  `Crim_name` varchar(50) NOT NULL,
  `Wit_name` varchar(50) NOT NULL,
  `Wit_phno` bigint(20) NOT NULL,
  `Crim_age` int(100) NOT NULL,
  `crime` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `pin` int(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `Wit_email` varchar(50) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  PRIMARY KEY (`complaint_id`,`Crim_name`,`Wit_name`,`Wit_phno`,`crime`,`city`,`Address`,`pin`,`state`,`date`,`Wit_email`,`desc`),
  UNIQUE KEY `ack_no` (`ack_no`),
  KEY `ForeignKey` (`STATUS`)
) ;

--
-- Truncate table before insert `records`
--

TRUNCATE TABLE `records`;