
-- --------------------------------------------------------

--
-- Table structure for table `signup_details`
--
-- Creation: Mar 11, 2024 at 08:05 AM
-- Last update: Mar 19, 2024 at 04:52 AM
--

DROP TABLE IF EXISTS `signup_details`;
CREATE TABLE IF NOT EXISTS `signup_details` (
  `SNO` int(4) NOT NULL AUTO_INCREMENT,
  `FNAME` varchar(12) NOT NULL,
  `LNAME` varchar(12) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  PRIMARY KEY (`SNO`,`EMAIL`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ;

--
-- Truncate table before insert `signup_details`
--

TRUNCATE TABLE `signup_details`;
--
-- Dumping data for table `signup_details`
--

INSERT DELAYED IGNORE INTO `signup_details` (`SNO`, `FNAME`, `LNAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 'Pratham', 'Kubsad', 'prathamkubsad@gmail.com', '$2y$10$NrTLr.5od2rw.yoDuwVseeEyZwAkc.RhzO6eMfRi6SaC1F3YHlfl.'),
(2, 'Programming', 'Language', 'vdjkvd@mmg', '$2y$10$VsRL4/p6vCZw2E9zJqMoM.f4aKYzy36oI8x8uoaKW6dvConAnMLTS'),
(3, 'Basavaraj', 'Kubsad', 'basavrajkubsad@gmail.com', '$2y$10$BqdN2TjKy..GXz684BWMf.RhmAqvatop0utVdwBbn/w1YvItOeXni'),
(4, 'Pratham', 'Kubsad', 'themaniacs45@gmail.com', '$2y$10$T2efh9gPRXOhRrM8uQiu9OVyW5Cya6Ry0MRgGKbYeWYowIO6X3JLi'),
(5, 'Pratham', 'Kubsad', 'adityalalge99@gmail.com', '$2y$10$On9kOdcW9gPZlU37LFmBeOWC7Mggg0yr19WraSWQd1OKZEvNtpwFK'),
(6, 'sneha', 'kubsad', 'info@yourdomain.com', '$2y$10$RoK7fTUv70PKSL00.SHWYeXQoivr0bE71qyPPo7DampEn7I/2jCSe'),
(7, 'pushpa', 'N', 'pushpa@gmail.com', '$2y$10$RR64wG8.IJWI65/BJdK1bOXWHo2RCKIpUcmZIebDNVoC8WCS3KQcW'),
(8, 'Pratham', 'Kubsad', 'p@gmail.com', '$2y$10$6t37uXN4WcVR1.kSY622.OsbBJ4tJXniRCrE3f9RScFRkKLfzf6bW'),
(9, 'Pratham', 'Kubsad', 'pratham@gmail.com', '$2y$10$yn1X/WOnQxmVCXMuCJiUq.mgJDpOr4./xvO.fFkkxZpsQW9k/7xkm'),
(10, 'P', 'K', 'pk@gmail.com', '$2y$10$TYUb5DX07B4yoaxX8IrHwO0s3dTntZsk4uDCF9AhR.RuRFsKZlUx2'),
(11, 'abc', 'def', 'abc@gmail.com', '$2y$10$wTkXeAh.FyHIwlwuFBCH7.LxsnSBILYsTjJ8PPNa09mP6Ljbs7wXy'),
(12, 'Programming', 'Language', 'j@j.com', '$2y$10$Lu01eC79haidq8e30sBBf.jnYUpZLNhnAn3AGJLBNedHKzE.8G7zq'),
(13, 'pushpa', 'N', 'nayakpushpa311@gmail.com', '$2y$10$GroBtWfZF4s0vS84XmKVEeATJYTi0bKGo5RzamLIIO0ew4uKJf/Nu');
