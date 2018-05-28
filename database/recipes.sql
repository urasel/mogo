/*
SQLyog Ultimate - MySQL GUI v8.21 
MySQL - 5.5.5-10.1.9-MariaDB : Database - wwwinfom_logicaldb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `recipes` */

DROP TABLE IF EXISTS `recipes`;

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `point_id` int(11) DEFAULT NULL,
  `place_type_id` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `short_note` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ingredients` text CHARACTER SET utf8,
  `instructions` text CHARACTER SET utf8,
  `recipe_notes` text CHARACTER SET utf8,
  `recipe_cuisine_id` int(10) DEFAULT NULL,
  `skill_level` enum('Beginner','Expert','Midlevel') CHARACTER SET utf8 DEFAULT NULL,
  `prep_time` varchar(200) CHARACTER SET utf8 DEFAULT '5 Minute',
  `cook_time` varchar(200) CHARACTER SET utf8 DEFAULT '15 Minute',
  `passive_time` varchar(200) CHARACTER SET utf8 DEFAULT '1 Hour',
  `user_id` int(10) DEFAULT NULL,
  `publish` tinyint(1) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `recipes` */

LOCK TABLES `recipes` WRITE;

insert  into `recipes`(`id`,`point_id`,`place_type_id`,`title`,`seo_name`,`short_note`,`ingredients`,`instructions`,`recipe_notes`,`recipe_cuisine_id`,`skill_level`,`prep_time`,`cook_time`,`passive_time`,`user_id`,`publish`,`approved`,`publish_date`) values (1,1211517,927,'আদা লেবুর শরবত','_','','<ul>\r\n	<li>আদার রস &nbsp; ১ চা চামচ</li>\r\n	<li>লেবুর রস&nbsp; ১ টেবিল চামচ</li>\r\n	<li>চিনি ২ টেবিল চামচ</li>\r\n	<li>ঠান্ডা পানি&nbsp; ১ গ্লাস</li>\r\n</ul>\r\n','<p>১। সব উপকরণ একসঙ্গে মিশিয়ে শরবত বানাতে হবে।</p>\r\n','',1,NULL,'','','',NULL,0,0,NULL),(2,NULL,927,'আচার মাংস',NULL,NULL,' আচারের উপকরনঃ 	\r\n	 জলপাই 	\r\n১ কেজি (একই আকারের হলে ভাল হয়)\r\n	 শুকনা মরিচ 	\r\n১২ টা মাঝারী সাইজের\r\n	 মৌরি 	\r\n১ টেবিল চামচ\r\n	 রসুন বাটা 	\r\n১ টেবিল চামচ\r\n	 হলুদের গুঁড়া 	\r\n১ টেবিল চামচ\r\n	 জিরা গুঁড়া 	\r\n১ চা চামচের একটু কম\r\n	 মিষ্টি জিরা 	\r\n২ চা চামচ\r\n	 সরিষার গুঁড়া/বাটা 	\r\n১ টেবিল চামচ\r\n	 লবন 	\r\n১ চা চামচ\r\n	 চিনি 	\r\n৩ কাপ\r\n	 সরিষার তেল 	\r\n৩ কাপ\r\n	 পাঁচফোড়ন 	\r\nআধা চা চামচ\r\n	 উপকরণঃ 	\r\n	 ১/২ কেজি জলপাইয়ের আচার 	\r\n	 গরুর মাংস ১ কেজি 	\r\n	 তেল ১/২ কাপ 	\r\n	 আদা বাটা ১ টেবিল চামচ 	\r\n	 পেয়াজ বাটা ১/৩ কাপ 	\r\n	 হলুদ গুড়া ২ চা চামচ 	\r\n	 মরিচ গুড়া ২ চা চামচ 	\r\n	 জিরা গুড়া ১ চা চামচ 	\r\n	 লবণ পরিমাণমতো ','২। একই আকারের বেছে নেয়া জলপাই গুলো ভাল করে ধুয়ে এবার ১ লিটার পরিমান পানিতে সিদ্ধ দিতে হবে।\r\n৩। ৮ মিনিট পরে নামিয়ে পানি ঝরিয়ে নিন।\r\n৪। কোন কিছুতে সিদ্ধ করা জলপাই গুলো ছড়িয়ে দিন, এতে জলপাইয়ের গায়ে লেগে থাকা পানি শুকিয়ে যাবে।\r\n৫। এরপর বটি দিয়ে ফালি করে কাটুন সেদ্ধ করা জলপাই গুলো।\r\n৬। পাতিলে তেল গরম করে এতে রসুন, সরিষা দিয়ে ৫ মিনিট কষাতে হবে। এবার কাটা জলপাই দিয়ে আস্তে আস্তে নাড়তে থাকুন।\r\n৭। ১০ মিনিট পরে হলুদের গুঁড়া ও মরিচের গুঁড়া দিয়ে নাড়ুন।\r\n৮। জিরা, পাঁচফোড়ন ও চিনি দিয়ে অল্প আঁচে নাড়ুন।\r\n৯। তেল খানিকটা উপরে উঠলে নামিয়ে নিন এবং একটি গামলায় (মেলামাইনের হলে ভাল হয়) ছড়িয়ে দিন।\r\n১০। এবার কড়া রোদে ৩ থেকে ৪ ঘন্টা শুকাতে দিন, রোদে পানি টেনে নিয়ে আচার চটচটে হলে বৈয়ামে ভরে রাখুন।\r\n১১। মাঝে মাঝে আচারের বৈয়াম রোদে দিতে পারেন আচার ভাল থাকবে।\r\n১২।\r\n১৩। মাংস ছোট টুকরা করুন।\r\n১৪। মাংসে তেল, লবণ সহ সব মশলা একসাথে মেশান।\r\n১৫। এবার সিদ্ধ হওয়ার জন্য পানি দিয়ে চুলায় দিন।\r\n১৬। ঢেকে অল্প আচে রান্না করুন।\r\n১৭। মাংস সিদ্ধ হওয়া পর্যন্ত কষান।\r\n১৮। পানি সম্পূর্ণ শুকিয়ে মাংস ভাজা ভাজা হলে সব আচার ঢেলে দিন।\r\n১৯। ফুটে উঠলে আচ কমিয়ে দমে রাখুন।\r\n২০। তৈরী আচার মাংস। ',NULL,NULL,NULL,'5 Minute','15 Minute','1 Hour',NULL,NULL,NULL,NULL),(3,NULL,927,'আচারি গোশত',NULL,NULL,'গরুর মাংস 	\r\nদেড় কেজি,\r\n	 রসুন ছেঁচা 	\r\n৪ টেবিল চামচ,\r\n	 শুকনো মরিচ টুকরো 	\r\n৫/৬টি,\r\n	 আদা বাটা 	\r\n১ টেবিল চামচ,\r\n	 সরিষা বাটা 	\r\n১ চা চামচ,\r\n	 পাঁচফোড়ন বাটা 	\r\nআধা চা চামচ,\r\n	 জিরা বাটা 	\r\n১ চা চামচ,\r\n	 মৌরি বাটা 	\r\nআধা চা চামচ,\r\n	 হলুদ 	\r\n১ টেবিল চামচ,\r\n	 তেজপাতা 	\r\n২টি,\r\n	 মরিচ 	\r\n১ টেবিল চামচ,\r\n	 এলাচ 	\r\n২টি,\r\n	 দারুচিনি 	\r\n২টি,\r\n	 সরিষার তেল 	\r\n১ কাপ,\r\n	 ভিনেগার 	\r\n১ চা চামচ,\r\n	 লবণ 	\r\nআন্দাজমতো,\r\n	 যেকোনো আচার তেলসহ 	\r\n১ টেবিল চামচ,\r\n	 পানি 	\r\nআন্দাজমতো।','১। আচার ছাড়া বাকি সব উপকরণ মাংসের সঙ্গে মেখে ১ ঘন্টা রেখে দিন।\r\n২। কড়াইতে সরিষার তেল গরম করে মাখা মাংসটা ঢেলে কষাতে থাকুন।\r\n৩। ১৫ মিনিট পর পানি দিয়ে সিদ্ধ করে নিন। অল্প আঁচে ঢেকে সিদ্ধ করুন।\r\n৪। পানি কমে গেলে আবার কষান।\r\n৫। কষাতে কষাতে তেল উপরে উঠে আসলে আচার দিয়ে নেড়েচেড়ে নামিয়ে নিন। ',NULL,NULL,NULL,'5 Minute','15 Minute','1 Hour',NULL,NULL,NULL,NULL),(4,NULL,927,'আচারি মাটন কাবাব',NULL,NULL,'খাসির মাংস 	\r\n১৫০ গ্রাম,\r\n	 টক দই 	\r\nদুই টেবিল চামচ,\r\n	 আদা,রসুন বাটা 	\r\nএক চা চামচ,\r\n	 গরম মসলা 	\r\nসিকি চা চামচ,\r\n	 জিরা 	\r\nসিকি চা চামচ,\r\n	 মরিচ গুঁড়ো 	\r\nআধা চা চামচ,\r\n	 সরিষার তেল 	\r\nদুই চা চামচ,\r\n	 কাঁচামরিচ কুচি 	\r\nদুই চা চামচ,\r\n	 লেবুর রস 	\r\nএক চা চামচ।','১। ওপরের উপকরণগুলো মাখিয়ে ২০ মিনিট রেখে দিতে হবে।\r\n২। মাখানো মাংসের টুকরো এবার গ্রিল বা ওভেনে অথবা ননস্টিক প্যানে অল্প আঁচে দুইপাশ ভালোভাবে সেদ্ধ না হওয়া পর্যন্ত ভেজে নিন।\r\n৩। হয়ে গেল আচারি মাটন কাবাব।',NULL,NULL,NULL,'5 Minute','15 Minute','1 Hour',NULL,NULL,NULL,NULL),(5,NULL,927,'আদা লেবুর শরবত',NULL,NULL,' আদার রস 	\r\n১ চা চামচ\r\n	 লেবুর রস 	\r\n১ টেবিল চামচ\r\n	 চিনি 	\r\n২ টেবিল চামচ\r\n	 ঠান্ডা পানি 	\r\n১ গ্লাস','১। সব উপকরণ একসঙ্গে মিশিয়ে শরবত বানাতে হবে।',NULL,NULL,NULL,'5 Minute','15 Minute','1 Hour',NULL,NULL,NULL,NULL),(6,NULL,927,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5 Minute','15 Minute','1 Hour',NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
