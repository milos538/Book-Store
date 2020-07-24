-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: books
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kategorija`
--

DROP TABLE IF EXISTS `kategorija`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `kategorija` (
  `kategorija_id` int(3) NOT NULL,
  `imekat` varchar(245) NOT NULL,
  PRIMARY KEY (`kategorija_id`),
  UNIQUE KEY `imekat_UNIQUE` (`imekat`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorija`
--

LOCK TABLES `kategorija` WRITE;
/*!40000 ALTER TABLE `kategorija` DISABLE KEYS */;
INSERT INTO `kategorija` VALUES (1,'bestsellers'),(2,'comingsoon'),(3,'newreleases');
/*!40000 ALTER TABLE `kategorija` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knjiga`
--

DROP TABLE IF EXISTS `knjiga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `knjiga` (
  `knjiga_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `naziv` varchar(245) NOT NULL,
  `godina` int(4) unsigned DEFAULT NULL,
  `cena` double unsigned NOT NULL,
  `isbn` bigint(13) unsigned DEFAULT NULL,
  `opis` text NOT NULL,
  `slika` text,
  `kategorija_id` int(3) NOT NULL,
  PRIMARY KEY (`knjiga_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knjiga`
--

LOCK TABLES `knjiga` WRITE;
/*!40000 ALTER TABLE `knjiga` DISABLE KEYS */;
INSERT INTO `knjiga` VALUES (1,'This is Going to Hurt',2018,8.5,9781509858637,'Welcome to the life of a junior doctor: 97-hour weeks, life and death decisions, a constant tsunami of bodily fluids, and the hospital parking meter earns more than you.','1.jpg',3),(2,'The Power of Now',2001,8.94,9780340733509,'To make the journey into The Power of Now we will need to leave our analytical mind and its false created self, the ego, behind. Although the journey is challenging, Eckhart Tolle offers simple language and a question and answer format to show us how to silence our thoughts and create a liberated life. ','2.jpg',2),(3,'Educated ',2018,10.49,9780099511021,'Tara Westover and her family grew up preparing for the End of Days but, according to the government, she didn\'t exist. She hadn\'t been registered for a birth certificate. She had no school records because she\'d never set foot in a classroom, and no medical records because her father didn\'t believe in hospitals.','3.jpg',1),(4,'Becoming',2018,26.36,9780241334140,'In a life filled with meaning and accomplishment, Michelle Obama has emerged as one of the most iconic and compelling women of our era. As First Lady of the United States of America - the first African-American to serve in that role - she helped create the most welcoming and inclusive White House in history, while also establishing herself as a powerful advocate for women.','4.jpg',3),(5,'Man\'s Search',2019,5.45,9781846041242,'A prominent Viennese psychiatrist before the war, Viktor Frankl was uniquely able to observe the way that he and other inmates coped with the experience of being in Auschwitz. He noticed that it was the men who comforted others and who gave away their last piece of bread who survived the longest - and who offered proof that everything can be taken away from us except the ability to choose our attitude in any given set of circumstances. ','5.jpg',2),(6,'Sapiens',2016,13.9,9780099590088,'Earth is 4.5 billion years old. In just a fraction of that time, one species among countless others has conquered it: us. ','6.jpg',2),(7,'No Friend',2019,9.65,9781529028485,'In 2013, Kurdish journalist Behrouz Boochani sought asylum in Australia but was instead illegally imprisoned in the country\'s most notorious detention centre on Manus Island. He has been there ever since. This book is the result.','7.jpg',3),(8,'Lost Connections',2019,9.19,9781408878729,'Depression and anxiety are now at epidemic levels. Why? Across the world, scientists have uncovered evidence for nine different causes. Some are in our biology, but most are in the way we are living today.','8.jpg',3),(9,'Pinch of Nom',2019,25.59,9781529014068,'Sharing delicious home-style recipes with a hugely engaged online community, pinchofnom.com has helped millions of people to cook well and lose weight. The Pinch of Nom cookbook can help novice and experienced home-cooks enjoy exciting, flavourful and satisfying meals. Accessible to everyone by not including diet points, all of these recipes are compatible with the principles of the UK\'s most popular diet programmes.','9.jpg',3),(10,'The Tattooist of Auschwitz',2015,8.82,9781785763670,'In 1942, Lale Sokolov arrived in Auschwitz-Birkenau. He was given the job of tattooing the prisoners marked for survival - scratching numbers into his fellow victims\' arms in indelible ink to create what would become one of the most potent symbols of the Holocaust. ','10.jpg',2),(11,'Normal People',2003,15.88,9780571334650,'Connell and Marianne grow up in the same small town in the west of Ireland, but the similarities end there. In school, Connell is popular and well-liked, while Marianne is a loner. ','11.jpg',2),(12,'Ottolenghi SIMPLE',1998,36.67,9781785031168,'Yotam Ottolenghi\'s award-winning recipes are always a celebration: an unforgettable combination of abundance, taste and surprise. Ottolenghi SIMPLE is no different, with 130 brand-new dishes that contain all the inventive elements and flavour combinations that Ottolenghi is loved for, but with minimal hassle for maximum joy. ','12.jpg',2),(13,'Dare to Lead',2005,14.16,9781785042140,'Leadership is not about titles, status and power over people. Leaders are people who hold themselves accountable for recognising the potential in people and ideas, and developing that potential. This is a book for everyone who is ready to choose courage over comfort, make a difference and lead. ','13.jpg',2),(14,'Why We Sleep',2016,10.76,9780141983769,'Sleep is one of the most important aspects of our life, health and longevity and yet it is increasingly neglected in twenty-first-century society, with devastating consequences: every major disease in the developed world - Alzheimer\'s, cancer, obesity, diabetes - has very strong causal links to deficient sleep.','14.jpg',2),(15,'Bad Blood',1964,15.54,9781509868087,'In 2014, Theranos founder and CEO Elizabeth Holmes was widely seen as the female Steve Jobs: a brilliant Stanford dropout whose startup \"unicorn\" promised to revolutionize the medical industry with a machine that would make blood testing significantly faster and easier. Backed by investors such as Larry Ellison and Tim Draper, Theranos sold shares in a fundraising round that valued the company at more than $9 billion, putting Holmes\'s worth at an estimated $4.7 billion. There was just one problem: The technology didn\'t work. ','15.jpg',2),(16,'The Daily Stoic ',1998,11.49,9781781257654,'Long the secret weapon of history\'s great figures, from emperors to artists and activists to fighter pilots, the principles of Stoicism have shone brightly through the centuries as a philosophy for doers. Tested in the laboratory of human experience over the last two thousand years, this timeless knowledge is essential to navigating the complexities of modern life. ','16.jpg',2),(17,'How to Win',2014,7.21,9781439199190,'Since its initial publication eighty years ago, How to Win Friends & Influence People has sold over fifteen million copies worldwide. In his book, Carnegie explains that success comes from the ability to communicate effectively with others. ','17.jpg',1),(18,'A Gentleman in Moscow',2009,11.07,9780099558781,'On 21 June 1922, Count Alexander Rostov - recipient of the Order of Saint Andrew, member of the Jockey Club, Master of the Hunt - is escorted out of the Kremlin, across Red Square and through the elegant revolving doors of the Hotel Metropol. ','18.jpg',1),(19,'The Montessori Toddler',2018,16.68,9781523506897,'Announcing that rare parenting book that will not only help you become a more effective parent but actually change how you see your children. Written by Montessori educator Simone Davies, this book shows you how to bring the educational values of a Montessori classroom into your home-while turning the whole idea of the \"terrible twos\" on its head. ','19.jpg',3),(20,'12 Rules for Life',2015,11.82,9780141988511,'Drawing on his own work as a clinical psychologist and on lessons from humanity\'s oldest myths and stories, Peterson offers twelve profound and realistic principles to live by. After all, as he reminds us, we each have a vital role to play in the unfolding destiny of the world. ','20.jpg',1),(21,'The Barefoot Investor',2003,16.01,9780730324218,'This book will show you how to create an entire financial plan that is so simple you can sketch it on the back of a serviette ... and you\'ll be able to manage your money in 10 minutes a week. ','21.jpg',1),(22,'The Fast 800',2008,9.64,9781780723624,'Includes an exciting new evidence-based approach called Time Restricted Eating (TRE), which can be used in tandem with the Fast 800 to accelerate results. ','22.jpg',1),(23,'Gifts Of Imperfection',2018,12.7,9781592858491,'When our embarrassments and fears lie, we often listen to them anyway. They thwart our gratitude, acceptance, and compassion--our goodness.','23.jpg',3),(24,'Circe',2019,12.65,9781408890042,'CHOSEN AS A BOOK OF THE YEAR BY THE GUARDIAN, TELEGRAPH, SUNDAY TELEGRAPH, I PAPER, SUNDAY EXPRESS, IRISH TIMES, TIMES LITERARY SUPPLEMENT, AMAZON, AUDIBLE, BUZZFEED, REFINERY 29, WASHINGTON POST, BOSTON GLOBE, SEATTLE TIMES, TIME MAGAZINE, NEWSWEEK, PEOPLE, ENTERTAINMENT WEEKLY, KIRKUS, PUBLISHERS WEEKLY AND GOODREADS ','24.jpg',3),(25,'Start With Why ',2018,10.25,9780141978611,'Steve Jobs, the Wright brothers and Martin Luther King have one thing in common: they STARTED WITH WHY. ','25.jpg',3),(26,'The Body Keeps the Score',2015,12.014,9180141978611,'\'Van der Kolk draws on thirty years of experience to argue powerfully that trauma is one of the West\'s most urgent public health issues ... Packed with science and human stories\' New Scientist ','26.jpg',1),(27,'The Subtle Art ',2002,16.75,9780062457714,'There are only so many things we can give a f**k about so we need to figure out which ones really matter, Manson makes clear. While money is nice, caring about what you do with your life is better, because true wealth is about experience. A much-needed grab-you-by-the-shoulders-and-look-you-in-the-eye moment of real-talk, filled with entertaining stories and profane, ruthless humor, The Subtle Art of Not Giving a F**k is a refreshing slap for a generation to help them lead contented, grounded lives. ','27.jpg',1),(28,'Brief Answers',2004,15.03,9781473695986,'Throughout his extraordinary career, Stephen Hawking expanded our understanding of the universe and unravelled some of its greatest mysteries. But even as his theoretical work on black holes, imaginary time and multiple histories took his mind to the furthest reaches of space, Hawking always believed that science could also be used to fix the problems on our planet. ','28.jpg',1),(29,'Thinking, Fast and Slow',2000,12.9,9780141033570,'\'A lifetime\'s worth of wisdom\' Steven D. Levitt, co-author of Freakonomics ','29.jpg',1),(30,'BISH BASH BOSH',2018,12,9780008327057,'In BISH BASH BOSH! you\'ll discover a whole world of quick eats, weeknight suppers, showstopping feasts, and incredible sweet treats - all using the power of plants. From a hearty, classic lasagne to an indulgent mini banoffee meringue, and from quick quesadillas to an incredible curry house jalfrezi, these are simple, savvy recipes that you\'ll turn to time and again. ','30.jpg',3);
/*!40000 ALTER TABLE `knjiga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `knjiga_pisac`
--

DROP TABLE IF EXISTS `knjiga_pisac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `knjiga_pisac` (
  `knjiga_pisac_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `knjiga_id` int(11) unsigned NOT NULL,
  `pisac_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`knjiga_pisac_id`),
  KEY `fk_knjiga_pisac_knjiga_id_idx` (`knjiga_id`),
  KEY `fk_knjiga_pisac_pisac_id_idx` (`pisac_id`),
  CONSTRAINT `fk_knjiga_pisac_knjiga_id` FOREIGN KEY (`knjiga_id`) REFERENCES `knjiga` (`knjiga_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_knjiga_pisac_pisac_id` FOREIGN KEY (`pisac_id`) REFERENCES `pisac` (`pisac_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knjiga_pisac`
--

LOCK TABLES `knjiga_pisac` WRITE;
/*!40000 ALTER TABLE `knjiga_pisac` DISABLE KEYS */;
INSERT INTO `knjiga_pisac` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,5),(6,6,6),(7,7,7),(8,8,8),(9,9,9),(10,10,10),(11,11,11),(12,12,12),(13,13,13),(14,14,14),(15,15,15),(16,16,16),(17,17,17),(18,18,18),(19,19,19),(20,20,20),(21,21,21),(22,22,22),(23,23,23),(24,24,24),(25,25,25),(26,26,26),(27,27,27),(28,28,28),(29,29,29),(30,30,30);
/*!40000 ALTER TABLE `knjiga_pisac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pisac`
--

DROP TABLE IF EXISTS `pisac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pisac` (
  `pisac_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  PRIMARY KEY (`pisac_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1104 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pisac`
--

LOCK TABLES `pisac` WRITE;
/*!40000 ALTER TABLE `pisac` DISABLE KEYS */;
INSERT INTO `pisac` VALUES (3,'Sota','Christie'),(30,'Milos','Petrovic'),(1,'Ivan','Tellado'),(4,'Marko','Rowling'),(5,'Stefan','Oda'),(6,'John','Petrovic'),(7,'Wiliam','Steel'),(8,'Sorewt','Cena'),(29,'Valdi','Steel'),(10,'Gorasti','Cartland'),(11,'Gilbert','Goralrq'),(12,'Jackie','Vito'),(13,'Nora','Gosciny'),(14,'Akira','Pustinds'),(15,'Alexander','Konntz'),(16,'Paulo','Toriyama'),(17,'Louis','Coeho'),(18,'Rene','Souto'),(19,'Erle','Yong'),(20,'Edgar','Jin'),(21,'Jin','Akagawak'),(22,'Jiro','Ludlum'),(23,'Janet','Ivketi'),(24,'Micael','Cook'),(25,'Elendaor','Robins'),(26,'Cao','Kutiae'),(27,'Rex','Carorol'),(28,'Anne','Flaiming'),(9,'Frank','Fusto'),(2,'John','Ivkovic'),(1103,'Kate','Morton');
/*!40000 ALTER TABLE `pisac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (17,'test@test.com','$2y$10$BonvYd8Zajk50Ko7iq6JveKkn5gtXYvHPe4.EfKV8.mb4B9DGsfia','Test','Test','2019-05-10 05:31:15');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'books'
--

--
-- Dumping routines for database 'books'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-24 23:12:56
