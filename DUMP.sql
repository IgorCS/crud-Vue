/* matchmaking-handles*/

CREATE TABLE `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `membership` */

insert  into `membership`(`id`,`username`,`password`,`status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3',1),(2,'igor','dd97813dd40be87559aaefed642c3fbb',1),(3,'teste','698dc19d489c4e4db73e28a713eab07b',0);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `telefone` varchar(32) DEFAULT NULL,
  `celular` varchar(32) DEFAULT NULL,
  `idade` int(20) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`nome`,`email`,`telefone`,`celular`,`idade`) values (25,'save_4','save4_@mail.com','8632216851','995455299',22),(26,'save_5','save_5@mail.com','8632216851','86995455299',11);


