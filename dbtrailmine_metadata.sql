
--
-- Constraints for dumped tables
--

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `ForeignKey` FOREIGN KEY (`STATUS`) REFERENCES `status` (`STATUS`);
