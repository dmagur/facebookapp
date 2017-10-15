-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `picture` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_uindex` (`id`),
  UNIQUE KEY `user_token_uindex` (`accessToken`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
