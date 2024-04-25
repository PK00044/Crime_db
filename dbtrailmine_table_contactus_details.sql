
-- --------------------------------------------------------

--
-- Table structure for table `contactus_details`
--
-- Creation: Mar 01, 2024 at 09:06 AM
-- Last update: Mar 19, 2024 at 05:00 AM
--

DROP TABLE IF EXISTS `contactus_details`;
CREATE TABLE IF NOT EXISTS `contactus_details` (
  `SNO` int(4) NOT NULL AUTO_INCREMENT,
  `FNAME` varchar(12) NOT NULL,
  `LNAME` varchar(12) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `MESSAGE` varchar(100) NOT NULL,
  PRIMARY KEY (`SNO`,`EMAIL`)
) ;

--
-- Truncate table before insert `contactus_details`
--

TRUNCATE TABLE `contactus_details`;
--
-- Dumping data for table `contactus_details`
--

INSERT INTO `contactus_details` (`SNO`, `FNAME`, `LNAME`, `EMAIL`, `MESSAGE`) VALUES
(1, 'Basavaraj', 'Kubsad', 'basavraj@gmail.com', 'complaint verification?'),
(2, 'Pratham', 'Kubsad', 'prathamkubsad@gmail.com', 'What is the status my case'),
(3, 'Sneha', 'Kubsad', 'sneha@gmail.com', 'Need Acknowledgement number'),
(4, 'Vaishali', 'Kubsad', 'vaishali@gmail.com', 'I have a case'),
(5, 'Aditya', 'Lalge', 'aditya@mmg', 'Updated record'),
(6, 'Pushpa', 'Nayak', 'pushpa@gmail.com', 'When my case will be solved????');
