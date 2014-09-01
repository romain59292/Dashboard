create database indicateurs;
CREATE TABLE `indicateurs` (
  `id` int(11) NOT NULL auto_increment,
  `date` datetime NOT NULL,
  `who` varchar(255) collate utf8_swedish_ci NOT NULL,
  `type` varchar(255) collate utf8_swedish_ci NOT NULL,
  `key` varchar(255) collate utf8_swedish_ci NOT NULL,
  `value` varchar(255) collate utf8_swedish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10256 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE `migration_domino` (
  `id` int(11) NOT NULL auto_increment,
  `lot` varchar(255) collate utf8_swedish_ci NOT NULL,
  `percent` int(11) collate utf8_swedish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
