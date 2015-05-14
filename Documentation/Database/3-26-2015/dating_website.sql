-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2015 at 06:02 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dating_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatconversation`
--

CREATE TABLE IF NOT EXISTS `chatconversation` (
`id` bigint(20) NOT NULL,
  `chatmessage` varchar(150) NOT NULL DEFAULT '0',
  `cfrom` bigint(20) NOT NULL DEFAULT '0',
  `chatpriid` bigint(20) NOT NULL DEFAULT '0',
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chatprivilage`
--

CREATE TABLE IF NOT EXISTS `chatprivilage` (
`id` bigint(20) NOT NULL,
  `chatfrom` bigint(20) DEFAULT '0',
  `chatto` bigint(20) DEFAULT '0',
  `status` bigint(20) DEFAULT '0',
  `datecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatprivilage`
--

INSERT INTO `chatprivilage` (`id`, `chatfrom`, `chatto`, `status`, `datecreated`) VALUES
(11, 37, 1, 1, '2015-03-11 02:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `fb_info`
--

CREATE TABLE IF NOT EXISTS `fb_info` (
`id` int(20) NOT NULL,
  `user_id` int(50) NOT NULL,
  `fb_id` bigint(20) NOT NULL,
  `fb_link` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fb_info`
--

INSERT INTO `fb_info` (`id`, `user_id`, `fb_id`, `fb_link`) VALUES
(12, 55, 819119231458584, 'https://www.facebook.com/app_scoped_user_id/819119231458584/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `salt` varchar(150) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `role` varchar(40) NOT NULL,
  `profile_image` varchar(250) NOT NULL,
  `online_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `salt`, `fname`, `lname`, `birthday`, `sex`, `role`, `profile_image`, `online_status`) VALUES
(38, 'sample@sample.com', '$2a$07$rsajT9A5Dk5D9A1hFTpBheK3F773dTcI.ruwMkj6GiJBZ54Zq3UVG', '$2a$07$rsajT9A5Dk5D9A1hFTpBhew$', 'Cary Epaphras', 'Bondoc', '0000-00-00', 'male', 'user', 'cary.png', 0),
(39, 'admin@sample.com', '$2a$07$rsajT9A5Dk5D9A1hFgaUGeTfjoLuZS5sgUR/1ugHMBnq.y.ehGgOe', '$2a$07$rsajT9A5Dk5D9A1hFgaUGoe$', 'Sample fname', 'Sample lname', '1992-09-12', 'male', 'admin', 'cary.png', 0),
(55, '', 'facebook', '', 'Aamie', 'Sigfried', '0000-00-00', 'male', '', 'https://graph.facebook.com/819119231458584/picture?type=large', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE IF NOT EXISTS `users_info` (
`id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `work` varchar(50) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `status` enum('Single','Married','Widowed','Separated','Divorced') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `user_id`, `work`, `zip_code`, `street`, `city`, `country`, `status`) VALUES
(29, 39, 'work', '1234', '', '', 'plhilippines', 'Single'),
(40, 55, '', '', '', '', '', 'Single');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatconversation`
--
ALTER TABLE `chatconversation`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_chatconversation_chatprivilage` (`chatpriid`);

--
-- Indexes for table `chatprivilage`
--
ALTER TABLE `chatprivilage`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fb_info`
--
ALTER TABLE `fb_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatconversation`
--
ALTER TABLE `chatconversation`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chatprivilage`
--
ALTER TABLE `chatprivilage`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fb_info`
--
ALTER TABLE `fb_info`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chatconversation`
--
ALTER TABLE `chatconversation`
ADD CONSTRAINT `FK_chatconversation_chatprivilage` FOREIGN KEY (`chatpriid`) REFERENCES `chatprivilage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
