-- =============================================
-- CTEC 227 - Login & Registration Database Setup
-- Run this FIRST to create the database
-- =============================================

CREATE DATABASE IF NOT EXISTS `ctec`;
USE `ctec`;

-- =============================================
-- Table structure for `user`
-- =============================================

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`user_id`, `email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
