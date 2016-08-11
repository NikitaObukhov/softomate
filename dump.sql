-- MySQL dump 10.13  Distrib 5.5.50, for linux2.6 (x86_64)
--
-- Host: localhost    Database: softomate
-- ------------------------------------------------------
-- Server version	5.5.50

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `code` varchar(45) NOT NULL,
  `merchant_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  KEY `fk_coupon_merchant` (`merchant_id`),
  CONSTRAINT `fk_coupon_merchant` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2244 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (2144,'Coupon #0','f33d',235),(2145,'Coupon #1','b95c',235),(2146,'Coupon #2','91a9',237),(2147,'Coupon #3','63e9',234),(2148,'Coupon #4','e701',235),(2150,'Coupon #6','1eaf',233),(2151,'Coupon #7','9272',237),(2154,'Coupon #10','b8b1',237),(2155,'Coupon #11','e12f',236),(2156,'Coupon #12','6cef',237),(2157,'Coupon #13','a807',237),(2158,'Coupon #14','e3cc',235),(2160,'Coupon #16','3ee9',233),(2161,'Coupon #17','de8d',238),(2162,'Coupon #18','0cfb',237),(2165,'Coupon #21','7576',232),(2166,'Coupon #22','2cb9',238),(2167,'Coupon #23','98d4',234),(2168,'Coupon #24','22ec',233),(2169,'Coupon #25','4cf2',234),(2170,'Coupon #26','83e1',234),(2171,'Coupon #27','10da',233),(2172,'Coupon #28','5dea',232),(2173,'Coupon #29','4214',233),(2174,'Coupon #30','100d',235),(2175,'Coupon #31','ab0a',232),(2176,'Coupon #32','2aeb',233),(2177,'Coupon #33','69f3',235),(2178,'Coupon #34','8108',232),(2180,'Coupon #36','9620',237),(2182,'Coupon #38','e1cf',237),(2183,'Coupon #39','97eb',232),(2184,'Coupon #40','3e4b',234),(2185,'Coupon #41','f18e',238),(2187,'Coupon #43','f845',232),(2188,'Coupon #44','9b20',238),(2190,'Coupon #46','97c4',236),(2191,'Coupon #47','c140',238),(2192,'Coupon #48','fb47',234),(2194,'Coupon #50','e16a',238),(2195,'Coupon #51','7259',232),(2196,'Coupon #52','a120',237),(2197,'Coupon #53','7968',236),(2198,'Coupon #54','a1b0',235),(2199,'Coupon #55','c88a',234),(2200,'Coupon #56','ae97',237),(2201,'Coupon #57','612e',235),(2202,'Coupon #58','c208',233),(2203,'Coupon #59','6e3b',232),(2204,'Coupon #60','a6e9',235),(2205,'Coupon #61','6442',236),(2206,'Coupon #62','3cb0',232),(2208,'Coupon #64','f164',232),(2211,'Coupon #67','85b7',238),(2212,'Coupon #68','ac3e',235),(2213,'Coupon #69','6bbf',236),(2214,'Coupon #70','e324',233),(2215,'Coupon #71','ecb4',237),(2216,'Coupon #72','e225',233),(2219,'Coupon #75','623c',237),(2222,'Coupon #78','ebde',233),(2223,'Coupon #79','23b6',235),(2224,'Coupon #80','8db7',237),(2225,'Coupon #81','023a',232),(2227,'Coupon #83','dfaf',235),(2230,'Coupon #86','4fa6',232),(2231,'Coupon #87','e7b6',237),(2232,'Coupon #88','fd9e',238),(2233,'Coupon #89','4b4b',235),(2236,'Coupon #92','0227',232),(2239,'Coupon #95','e95b',235),(2240,'Coupon #96','b9fe',234),(2241,'Coupon #97','7e29',235),(2242,'Coupon #98','3a54',233),(2243,'Coupon #99','01b5',238);
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merchants`
--

DROP TABLE IF EXISTS `merchants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `merchants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merchants`
--

LOCK TABLES `merchants` WRITE;
/*!40000 ALTER TABLE `merchants` DISABLE KEYS */;
INSERT INTO `merchants` VALUES (232,'Merchant #1',NULL),(233,'Merchant #2',NULL),(234,'Merchant #3',NULL),(235,'Merchant #4',NULL),(236,'Merchant #5',NULL),(237,'Merchant #6',NULL),(238,'Merchant #7',NULL);
/*!40000 ALTER TABLE `merchants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_coupons`
--

DROP TABLE IF EXISTS `user_coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_coupons` (
  `user_id` int(10) unsigned NOT NULL,
  `coupon_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`coupon_id`),
  KEY `fk_user_coupons_user` (`user_id`),
  KEY `fk_user_coupons_coupon` (`coupon_id`),
  CONSTRAINT `fk_user_coupons_coupon` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_coupons_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_coupons`
--

LOCK TABLES `user_coupons` WRITE;
/*!40000 ALTER TABLE `user_coupons` DISABLE KEYS */;
INSERT INTO `user_coupons` VALUES (292,2165),(292,2169),(292,2202),(293,2182),(293,2197),(293,2219),(293,2236),(294,2150),(294,2157),(294,2187),(295,2170),(297,2150),(297,2173),(297,2225),(299,2156),(299,2202),(299,2206),(300,2211),(301,2165),(301,2170),(302,2173),(302,2199),(303,2148),(303,2167),(303,2180),(303,2194),(304,2172),(304,2213),(305,2171),(305,2223),(306,2172),(306,2184),(306,2242),(307,2213),(307,2243),(308,2198),(308,2204),(308,2219),(309,2154),(309,2162),(309,2172),(309,2199),(310,2146),(310,2171),(311,2148),(311,2198),(312,2154),(312,2161),(312,2197),(314,2151),(314,2168),(314,2213),(316,2161),(316,2190),(316,2213),(316,2214),(317,2212),(319,2183),(319,2240),(320,2213),(321,2150),(321,2175),(322,2146),(322,2170),(322,2230),(323,2154),(323,2176),(323,2185),(323,2198),(324,2214),(325,2176),(325,2222),(325,2225),(326,2162),(326,2204),(326,2233),(328,2150),(328,2222),(329,2169),(329,2174),(329,2205),(329,2216),(330,2200),(330,2227),(330,2240),(331,2158),(331,2206),(332,2214),(332,2224),(333,2188),(333,2223),(333,2225),(334,2165),(334,2175),(334,2214),(335,2158),(335,2167),(335,2170),(335,2203),(335,2212),(336,2223),(336,2236),(337,2158),(337,2197),(337,2199);
/*!40000 ALTER TABLE `user_coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `token` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `mail_UNIQUE` (`mail`),
  UNIQUE KEY `token_UNIQUE` (`token`),
  KEY `name_pass` (`name`,`pass`)
) ENGINE=InnoDB AUTO_INCREMENT=352 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (291,'user__1','123','user__1@foo.bar','2016-08-10 17:41:35','68088t6zcvk8c08sgggkk4oc880gss4s8s84goos4so880kckk'),(292,'user__2','123','user__2@foo.bar','2016-08-10 17:41:35','2s8n4bwkt1wkos4cow0o4kocg0co4kcs8sss4sw8sss804gkcs'),(293,'user__3','123','user__3@foo.bar','2016-08-10 17:41:35','266unc6hn1j4sw8gkgogc8gc48s08wscsock8k8s4w4kk4g8o'),(294,'user__4','123','user__4@foo.bar','2016-08-10 17:41:35','2gukqgjt5wg0s00goscgso4ww4cwc8ckwowswokk8k0k4kc4g0'),(295,'user__5','123','user__5@foo.bar','2016-08-10 17:41:35','2rno9cllowo4wco8o0wwosccgos8g8sc840kk4kk0gk0ogscoo'),(296,'user__6','123','user__6@foo.bar','2016-08-10 17:41:35','4m5wgxoouykgosck0w4gk0gos8scc0cc04g8k08gkkgwg4kw8c'),(297,'user__7','123','user__7@foo.bar','2016-08-10 17:41:35','1ewggv6ithxc0gwscscs00kwcw8048skco8kwg4k8soso4so0c'),(298,'user__8','123','user__8@foo.bar','2016-08-10 17:41:35','73kbnd710isk0oow8so0k8ks0kocck0o4o0scg48gks0g8kks'),(299,'user__9','123','user__9@foo.bar','2016-08-10 17:41:35','2vqxv9mb0mwwkks4owc088ccoo88ws8gkskskwsw8cw4o0gwso'),(300,'user__10','123','user__10@foo.bar','2016-08-10 17:41:35','rww7t3x0po0soogks0swo8804cc8c88ks400wc8gkkw84k8o0'),(301,'user__11','123','user__11@foo.bar','2016-08-10 17:41:35','2rk9eerwj48408s4k4g448owg44wg08w448gsssoswscsggcg8'),(302,'user__12','123','user__12@foo.bar','2016-08-10 17:41:35','2tzlaorvew6cc08cgo4wk0kc0ckokgwcgkssko8kks8k00408w'),(303,'user__13','123','user__13@foo.bar','2016-08-10 17:41:35','1wqaqrgcxelcgc8ok80oww80wcos004ckw0sc4gg48sggogs0o'),(304,'user__14','123','user__14@foo.bar','2016-08-10 17:41:35','3gis3vmuu4w0w4ccog4wscc4skwc8osokgsgkowk0kg8ck00ow'),(305,'user__15','123','user__15@foo.bar','2016-08-10 17:41:35','3qlzja7npr0g0sg4cs8kssc84w08cgokscwwgck0swog0c8ogk'),(306,'user__16','123','user__16@foo.bar','2016-08-10 17:41:35','smqwt8k1htcs0wgskwcs000sw0c8404swkw4ksoo00kkswowk'),(307,'user__17','123','user__17@foo.bar','2016-08-10 17:41:35','em88p8nl3bwwowcw8kk44okwcswcw4oo0swksww8084oskc0s'),(308,'user__18','123','user__18@foo.bar','2016-08-10 17:41:35','1jghfkh0julcoo4sw0ccg4k40cogkg0sk8k0okws48804s8ogk'),(309,'user__19','123','user__19@foo.bar','2016-08-10 17:41:35','5mevjf03f8o4skwooso4ggg84gc884w4gs8o0sk4o8080ks4w8'),(310,'user__20','123','user__20@foo.bar','2016-08-10 17:41:35','1syi7pp1od7o44g4ks0gw8kskssw0o8o8g84wgcswcokog0og0'),(311,'user__21','123','user__21@foo.bar','2016-08-10 17:41:35','19ynkknk9shwcogsogs4k04ogws0cko8cgscsgs8scoossowwk'),(312,'user__22','123','user__22@foo.bar','2016-08-10 17:41:35','1qrof4nqcxmsgwww80wsc0c8w8sswkoss4gkws4gckc8googg0'),(313,'user__23','123','user__23@foo.bar','2016-08-10 17:41:35','2qzwbhxo0xgkc0kw4wc8gw844400s0w8o4w8g0wgg0os8kgs88'),(314,'user__24','123','user__24@foo.bar','2016-08-10 17:41:35','374myho7pyecc4wog8ocowgowcogw4g8ccoko004o8oscocg4s'),(315,'user__25','123','user__25@foo.bar','2016-08-10 17:41:35','1lkmqnc0nlwksgscswc0s4wskg8osk488kwk440ssogwss4os'),(316,'user__26','123','user__26@foo.bar','2016-08-10 17:41:35','61nz44n18u800sc4kw84wsw0kcgok08gowg04ckk4gccwco8ws'),(317,'user__27','123','user__27@foo.bar','2016-08-10 17:41:35','3pdogc52o5k40skk4o40844ow4s0ksww0s0kggs8ws8o8g488g'),(318,'user__28','123','user__28@foo.bar','2016-08-10 17:41:35','4hwerukntwg0scc44ow0swgk0os4w844ookw4848sks004oc4k'),(319,'user__29','123','user__29@foo.bar','2016-08-10 17:41:35','47nfqu2fwc8wkwg0ggwck4wgs8k0kcsccwwkog0ck4g0kgwoks'),(320,'user__30','123','user__30@foo.bar','2016-08-10 17:41:35','1gyd6d4q5pk0o0gw0ss4cscwkc0sco80ogssscogwg40cgocsk'),(321,'user__31','123','user__31@foo.bar','2016-08-10 17:41:35','5kq1b9m2l30gskso8os0woo4s8840cw4ww04sccgww8w4s8k0w'),(322,'user__32','123','user__32@foo.bar','2016-08-10 17:41:35','402f5up2hpiccocs488gc0o84owgswk04o4ocogsss0ck4gcws'),(323,'user__33','123','user__33@foo.bar','2016-08-10 17:41:35','36ax1sfws5a84w8s8g4ss88s0cogggsw4wocwkcos4sskwo000'),(324,'user__34','123','user__34@foo.bar','2016-08-10 17:41:35','4tvypnpetmecs4ww0gkwso4kss044cowo0ko40480wgkgooks8'),(325,'user__35','123','user__35@foo.bar','2016-08-10 17:41:35','5xbhwpo8aj4s8ckk88cs0g00844k4ws88o0kgogsk8c4coc4o4'),(326,'user__36','123','user__36@foo.bar','2016-08-10 17:41:35','384yly5bgps08gg8gc00kc8sc4k04c440gcoc88k488woswo88'),(327,'user__37','123','user__37@foo.bar','2016-08-10 17:41:35','4ovs83trspwkk8ssc4w0ocsswswgws8k80kkkcg4wsscsw8ccg'),(328,'user__38','123','user__38@foo.bar','2016-08-10 17:41:35','70lyaveoikwsokgww4ckss8s88w4wgkggkcoowk4ow0sco808'),(329,'user__39','123','user__39@foo.bar','2016-08-10 17:41:35','64shj5whipwks80sowo4koo00cgk408skgwgs40sgsgsw4g0wc'),(330,'user__40','123','user__40@foo.bar','2016-08-10 17:41:35','3r0wfntuo5q8k4cwk4scskk84oc8kks04wk4kockw0c048c8oc'),(331,'user__41','123','user__41@foo.bar','2016-08-10 17:41:35','2xemsg2fzjc480gsosg84g4gk4kcowsowksoscww4ksskgkosw'),(332,'user__42','123','user__42@foo.bar','2016-08-10 17:41:35','3hvwp2mly2ckc8gk0sgwc4wgk84ww4occ8ksocss4kkwks8s0o'),(333,'user__43','123','user__43@foo.bar','2016-08-10 17:41:35','3o9q0z0ibmg4woc4k4cwk0888cggs84wk0swococgwgcc0kcws'),(334,'user__44','123','user__44@foo.bar','2016-08-10 17:41:35','512hj6nv6gowk48s8kg8cc0cc40sw408c4w4gssw400kc88cg'),(335,'user__45','123','user__45@foo.bar','2016-08-10 17:41:35','15ao92fmvnuo884wg8soo8wow4o8c84wwgo4o0kgwooo04wog8'),(336,'user__46','123','user__46@foo.bar','2016-08-10 17:41:35','45gvnykmbx0k4gok8okgswkkg8ssg4ws48w8cow4sww8kgok80'),(337,'user__47','123','user__47@foo.bar','2016-08-10 17:41:35','3f4eqejh8pc0cow48ss0so80kc0c0k08k4wgk0occgckw4kgwg'),(339,'user__49','123','user__49@foo.bar','2016-08-10 17:41:35','5d52pis72gcowsc0ccs0kwckow80s04cw488c8wcos48k0kks4'),(340,'foo','123','baz@bar.com','2016-08-10 19:46:19','47gcf8nejbac48ow0gk00k8go4oo0wsck88s0k8wksookc4sc8'),(349,'foo1','123','baz1@bar.com','2016-08-10 20:19:07','5vhd2f2nr3kswoo84k4cw8ws8ww8cs4ws08kc4co0wo8ogo08o'),(351,'foo12','132','baz12@bar.com','2016-08-11 16:26:17','44eskamdfj8k0cw0cwck4osw4kkwso0wocoosc8cw40os400c8');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-11  9:09:23
