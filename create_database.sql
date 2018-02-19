CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `isSent` tinyint(1) NOT NULL,
  `number` varchar(15) NOT NULL DEFAULT '',
  `message` varchar(160) NOT NULL DEFAULT '',
  `sender_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;