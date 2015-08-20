CREATE TABLE `sikayetler` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`ilan_id` int(10) unsigned NOT NULL,
`mesaj` varchar(255) NOT NULL,
`tarih` datetime NOT NULL,
PRIMARY KEY (`id`),
KEY `fk_sikayetler_ilan_idx` (`ilan_id`),
CONSTRAINT `fk_sikayetler_ilan` FOREIGN KEY (`ilan_id`) REFERENCES `ilanlar` (`id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION
ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8

CREATE ALGORITHM=UNDEFINED DEFINER=`publicUsr`@`%` SQL SECURITY DEFINER VIEW `dortlerOto`.`sikayetler_datatable` AS 
SELECT 
  `t1`.`id` AS `id`,
  `t1`.`mesaj` AS `mesaj`,
  `t1`.`tarih` AS `tarih`,
  `t1`.`ilan_id` AS `ilan_id`,
  `t2`.`baslik` AS `baslik`
FROM `dortlerOto`.`sikayetler` `t1`
JOIN `dortlerOto`.`ilanlar` AS `t2` ON `t2`.`id` = `t1`.`ilan_id`;