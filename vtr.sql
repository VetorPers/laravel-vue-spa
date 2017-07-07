# Host: localhost  (Version: 5.7.18)
# Date: 2017-07-07 14:16:44
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "answer_follows"
#

DROP TABLE IF EXISTS `answer_follows`;
CREATE TABLE `answer_follows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `answer_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answer_follows_user_id_index` (`user_id`),
  KEY `answer_follows_answer_id_index` (`answer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "answer_follows"
#

/*!40000 ALTER TABLE `answer_follows` DISABLE KEYS */;
INSERT INTO `answer_follows` VALUES (3,2,4,'2017-07-03 17:31:53','2017-07-03 17:31:53');
/*!40000 ALTER TABLE `answer_follows` ENABLE KEYS */;

#
# Structure for table "answers"
#

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes_count` int(11) NOT NULL DEFAULT '0',
  `comments_count` int(11) NOT NULL DEFAULT '0',
  `is_hidden` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F',
  `close_comment` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_user_id_index` (`user_id`),
  KEY `answers_question_id_index` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "answers"
#

/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,1,1,'Sint voluptatem ut recusandae nemo. Deserunt officia rerum ex earum aut sit. Similique quaerat iusto aspernatur voluptatem illo.',0,0,'F','F','2017-05-24 15:25:56','2017-05-24 15:25:56'),(2,1,1,'Molestiae dignissimos cumque eius autem. Omnis autem eum ipsam quaerat ut quis quo. Aspernatur nam illo unde qui. Eveniet perspiciatis nesciunt cupiditate illum tempore aut.',0,0,'F','F','2017-05-24 15:25:56','2017-05-24 15:25:56'),(3,1,1,'Voluptatibus repellendus qui nemo exercitationem cumque odio consequuntur. Beatae repudiandae iure consequuntur temporibus laborum quam.',0,0,'F','F','2017-05-24 15:25:56','2017-05-24 15:25:56'),(4,2,7,'多看看api文档吧',1,0,'F','F','2017-06-09 14:44:45','2017-07-03 17:31:53'),(5,2,7,'你说你这个问题真的是',0,0,'F','F','2017-07-03 16:55:48','2017-07-03 16:55:48'),(6,2,7,'只是一个好问题真的好',0,0,'F','F','2017-07-05 17:23:12','2017-07-05 17:23:12'),(8,2,7,'只是一个好问题真的好',0,0,'F','F','2017-07-06 15:31:32','2017-07-06 15:31:32'),(9,2,7,'只是一个好问题真的好',0,0,'F','F','2017-07-06 15:31:45','2017-07-06 15:31:45'),(10,2,7,'只是一个好问题真的好',0,0,'F','F','2017-07-06 15:51:58','2017-07-06 15:51:58');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

#
# Structure for table "articles"
#

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `is_hidden` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "articles"
#

/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'aut','Ratione incidunt laborum non quo eveniet ducimus illo. Temporibus rerum laborum suscipit rerum praesentium officia. Iste facilis sit accusantium.',1,'F','2017-05-24 15:24:49','2017-05-24 15:24:49'),(2,'accusantium','Minus voluptatem reprehenderit repellat aspernatur quae. Quisquam ex quasi dolor et aut aspernatur omnis atque. Et illo blanditiis esse consequatur nobis quisquam et.',1,'F','2017-05-24 15:24:49','2017-05-24 15:24:49'),(3,'et','Dolorem quisquam tenetur eos. Consectetur inventore saepe et voluptas adipisci nam. Saepe et voluptas a.',1,'F','2017-05-24 15:24:49','2017-05-24 15:24:49'),(4,'fugit','Rerum et repellat animi pariatur et quia quas. Ab rerum omnis fugiat et laudantium. Consectetur eos rerum error voluptates.',1,'F','2017-05-24 15:24:49','2017-05-24 15:24:49'),(5,'voluptatem','Fugiat et quis et explicabo autem. Itaque sunt accusamus tenetur quisquam quos est. Veritatis deleniti sint libero optio numquam.',1,'F','2017-05-24 15:24:49','2017-05-24 15:24:49');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

#
# Structure for table "comments"
#

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_id` int(10) unsigned DEFAULT NULL,
  `is_hidden` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "comments"
#

/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'Aut voluptate impedit sint autem. Unde voluptate saepe et ipsum. Cum voluptas dolorum aspernatur dolor molestiae.',1,'F','2017-05-24 15:26:16','2017-05-24 15:26:16'),(2,1,'Sapiente quo distinctio fugit quia est sint officiis. Est fugit repudiandae et molestiae qui adipisci sequi temporibus. Eum nihil non est voluptas nihil culpa qui.',1,'F','2017-05-24 15:26:16','2017-05-24 15:26:16');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

#
# Structure for table "messages"
#

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` int(10) unsigned NOT NULL,
  `to_user_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_read` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F',
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "messages"
#

/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,2,1,'你好啊！','F',NULL,'2017-07-06 17:22:31','2017-07-06 17:22:31'),(2,2,1,'哈哈，我测试一下。','F',NULL,'2017-07-07 10:54:49','2017-07-07 10:54:49'),(3,2,1,'this is cccccc','F',NULL,'2017-07-07 11:20:03','2017-07-07 11:20:03'),(4,2,1,'再来一个测试','F',NULL,'2017-07-07 11:21:38','2017-07-07 11:21:38');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_05_22_082333_create_articles_table',1),(4,'2017_05_22_084100_create_questions_table',1),(5,'2017_05_22_093734_create_comments_table',1),(6,'2017_05_22_094005_create_answers_table',1),(7,'2017_05_27_171517_create_topics_table',2),(9,'2017_05_27_171929_create_question_topic_table',3),(10,'2017_06_09_152317_create_user_follows_table',4),(11,'2017_07_03_151151_create_question_follows_table',5),(12,'2017_07_03_170321_create_answer_follows_table',6),(13,'2017_07_05_171617_create_notifications_table',7),(14,'2017_07_06_165235_create_messages_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

#
# Structure for table "notifications"
#

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "notifications"
#

/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('6320e756-a2ba-4bb1-b06f-e04f4a9aa61f','App\\Notifications\\SendMessageNotification',2,'App\\User','{\"name\":\"Dee Pacocha\"}',NULL,'2017-07-07 10:54:49','2017-07-07 10:54:49'),('749e1553-7ca4-468a-8456-d9f31b5ec77e','App\\Notifications\\SendMessageNotification',1,'App\\User','{\"name\":\"Dee Pacocha\"}',NULL,'2017-07-07 11:21:38','2017-07-07 11:21:38'),('ed88e868-7759-41d0-b375-61a4a676e13b','App\\Notifications\\SendMessageNotification',2,'App\\User','{\"name\":\"Dee Pacocha\"}',NULL,'2017-07-07 11:20:03','2017-07-07 11:20:03');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

#
# Structure for table "question_follows"
#

DROP TABLE IF EXISTS `question_follows`;
CREATE TABLE `question_follows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_follows_question_id_index` (`question_id`),
  KEY `question_follows_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "question_follows"
#

/*!40000 ALTER TABLE `question_follows` DISABLE KEYS */;
INSERT INTO `question_follows` VALUES (4,7,2,'2017-07-03 17:06:17','2017-07-03 17:06:17');
/*!40000 ALTER TABLE `question_follows` ENABLE KEYS */;

#
# Structure for table "question_topic"
#

DROP TABLE IF EXISTS `question_topic`;
CREATE TABLE `question_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `topic_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_topic_question_id_index` (`question_id`),
  KEY `question_topic_topic_id_index` (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "question_topic"
#

/*!40000 ALTER TABLE `question_topic` DISABLE KEYS */;
INSERT INTO `question_topic` VALUES (1,7,1,'2017-06-06 17:41:54','2017-06-06 17:41:54'),(2,7,4,'2017-06-06 17:41:54','2017-06-06 17:41:54');
/*!40000 ALTER TABLE `question_topic` ENABLE KEYS */;

#
# Structure for table "questions"
#

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `answers_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `comments_count` int(11) NOT NULL DEFAULT '0',
  `followers_count` int(11) NOT NULL DEFAULT '1',
  `close_comment` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F',
  `is_hidden` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "questions"
#

/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'dolores','Facere molestiae accusantium repellat dolorem facere.im.Harum at fuga officiis eaque sequi sit ducimus vitae.',1,'0',0,1,'F','F','2017-05-24 15:25:36','2017-05-24 15:25:36'),(2,'iure','Ipsam sint sint quia quas porro quia voluptas. Quis velit facere hic nostrum non eos non. A sint aut sed illum eaque est. Ut laudantium ut mollitia quaerat enim accusantium quia. Animi aut suscipit facere ea nostrum. Magni accusantium ut optio rerum natus fugit sed. Quo velit est aut ducimus et veritatis. Odit esse incidunt eligendi voluptate sequi nulla architecto. Possimus placeat unde pariatur blanditiis eum voluptates. Dolor dolorem quis saepe quaerat. Quo id quo voluptates maxime optio. Vel molestiae in commodi et odio. Id est aspernatur nihil vel vel. Mollitia nulla ea placeat deleniti et aut asperiores. Dolor nesciunt atque quo suscipit. Est dicta ullam qui facere aut sit. Accusantium maxime consectetur eaque. Consequuntur dolorem nobis sed illo aliquid. Omnis cumque repudiandae voluptatem aut atque voluptatem et saepe. Consequatur error fugiat qui deleniti voluptate. Eveniet et laboriosam alias quas. Id perspiciatis ut velit et doloribus. Voluptas enim similique accusantium perspiciatis repudiandae et sed. Molestias dignissimos adipisci ut et repellat iste provident. Molestias non animi provident non tempore. Aut quia qui autem doloremque voluptates reiciendis laborum. Odit culpa amet officia et commodi. Temporibus repudiandae vel quisquam ipsum. Quia voluptas eligendi qui temporibus exercitationem. Omnis neque molestiae quis consequatur dolorem amet qui. Aut natus qui voluptatum minima consequatur. Quam commodi magni officiis possimus. Magnam cupiditate distinctio dolorem. Quo consequuntur et qui velit assumenda. Hic quia quos minus similique ullam fugit. Nisi nam dolores consectetur sunt. Laudantium animi voluptates debitis perspiciatis earum dolor eius eum. Qui porro ipsa enim sed magnam voluptatum dolorem. Sapiente earum in non architecto dolore perferendis. Adipisci perferendis sint beatae laboriosam ullam est ad. Ut odio est dolores non repellat fuga cum. Accusamus voluptatibus ad est enim non perspiciatis. Quod omnis cupiditate quia quia. Ut architecto quis eveniet aut. Sed temporibus numquam eveniet natus qui explicabo. Deserunt aut aut dicta sint sed. Exercitationem nihil suscipit aut atque voluptates ab quam. Animi dolor voluptatem occaecati distinctio odio et. Delectus soluta tenetur autem magnam laudantium. Dolor voluptatibus provident sit reprehenderit libero. Tempore ut in rerum atque autem. Minus numquam fugiat accusantium ut. Ipsa aut iste laborum non. Fugit nisi nulla unde quam est odio. Eius vel eos velit. Et repudiandae aliquid corporis saepe. Impedit voluptas eos saepe maxime quia sed tenetur voluptatem. Provident enim repellendus assumenda blanditiis nisi praesentium sint inventore. Est delectus odit et earum qui excepturi expedita a. Qui illo nihil consectetur rerum dolor ipsam. Dolorem sunt nisi alias nobis nisi. Illum commodi magni saepe magnam quia dolorem reprehenderit. Facere voluptatem repellat error illum iste. Et beatae ea qui similique. Ut iusto non natus eum. Molestiae facere id consectetur necessitatibus est nam accusamus. Doloremque deleniti et numquam ipsa.',1,'0',0,1,'F','F','2017-05-24 15:25:36','2017-05-24 15:25:36'),(3,'aut','Voluptas repellendus ex ea velit aspernatur enim. Mollitia est dolor placeat rerum esse voluptate qui. Rerum dolores pariatur quia recusandae quos cumque. Vel dolor eligendi sequi. Ipsum sunt explicabo necessitatibus qui soluta est est ad. Sint explicabo qui et optio inventore. Eaque sint officia ipsam voluptates voluptas fugit suscipit vero. Possimus aut consequatur aperiam consequatur qui eos excepturi. Animi molestias beatae at rem sunt iusto quo accusamus. Repudiandae sit numquam voluptas velit nihil omnis eum. Dolores et voluptatem ducimus quod. Officia atque aut laudantium repudiandae eos eum neque. Modi provident id voluptatem possimus incidunt voluptate quidem. Sunt fugit cupiditate sequi aut dolorem velit perferendis. Molestias et voluptatum qui voluptatem explicabo. Eum amet corrupti minima mollitia quae consectetur repudiandae. Fugiat atque molestiae harum beatae commodi nemo. Sed vitae excepturi eveniet omnis sed. Reprehenderit necessitatibus sint non sit accusantium. Ut omnis corporis itaque rerum exercitationem quam. Id distinctio mollitia dolores qui quidem distinctio beatae. Non rerum incidunt odit animi provident. Quaerat dolor eius eaque et facilis quibusdam libero. Sit quam debitis error sint est consequatur esse. Illum inventore molestiae quo exercitationem ratione. Veritatis quos totam culpa minus ut expedita. Occaecati enim voluptatem voluptas quo dolorem velit sapiente. Suscipit illo numquam tempora unde nam debitis. Tenetur saepe aut eius ab. Dicta veniam dignissimos odio quae ipsa. Non et assumenda cumque maxime aliquid debitis officia. Minima sunt sint dolores. Delectus porro est dolor tempora quos. Quia et libero ducimus suscipit. Impedit numquam ut necessitatibus totam qui cumque. Numquam molestias error suscipit labore enim necessitatibus dolores. Facilis molestiae dolore eos expedita laudantium. Labore et ut neque necessitatibus. Aut voluptatibus perferendis eum animi. Porro vero ad magni sit quo officiis ut. Maiores hic inventore rerum. Nisi dignissimos vel quo sit architecto. Et ut hic rerum fugit sit dolorem odio. Voluptates quo qui consequatur saepe dicta quo. Quia officia voluptatem perferendis esse error. Voluptas id nemo libero quam asperiores rerum. Fugiat recusandae nulla temporibus soluta libero voluptas fuga ad. Commodi dolorem reprehenderit est non dolore quidem. Et repellendus rerum doloremque. Magnam sunt suscipit quas odio necessitatibus repudiandae. Pariatur et ea reprehenderit reiciendis. Praesentium consequuntur ut animi. Alias reprehenderit quam non sequi maiores. Quia quis animi ipsum ut sint harum ipsam. Quisquam error quam illum nesciunt vero. Odit eligendi tenetur sunt et nostrum. Numquam et rerum quo. Voluptatem quidem debitis esse qui praesentium et et. Laboriosam aperiam placeat quaerat. Occaecati odit exercitationem vel rerum velit. Tenetur vel sint reprehenderit et cupiditate quia. Nostrum sequi deleniti quo quis. Vitae non molestias et itaque exercitationem iure commodi veniam. Deleniti mollitia eum dolorum eos blanditiis.',1,'0',0,1,'F','F','2017-05-24 15:25:36','2017-05-24 15:25:36'),(4,'quod','Amet ab velit perferendis beatae eligendi. Earum assumenda qui architecto in sed. Laudantium inventore officiis voluptatum ad rerum enim natus. Sed et quia et eum. Qui at odio et dolor vitae et sit. Quia fugiat amet unde sed magni eum sint. Ratione omnis quo itaque iste modi in sed. Labore rem libero sint nihil harum sed. Ullam quis ea at. Natus et hic voluptatem amet aut. Delectus voluptatem rerum sed cumque. Est aut officia omnis amet repudiandae sint et repudiandae. In quisquam quia beatae placeat vero rem. Atque quo harum at est ad ea omnis ut. Sint officiis pariatur et consectetur quasi eligendi maiores inventore. Beatae aut quas consequatur quod. Nihil eveniet sed est ea atque ipsum. Odit est incidunt earum. Et optio eos aspernatur vel molestias nesciunt. Autem quis velit quod ut labore sunt. Voluptas aut error quae omnis. Quibusdam quos ea a quasi ut numquam quam aut. Nihil consequatur qui pariatur assumenda tempore quam ut. Doloremque et et dolorem quas ducimus impedit. Dolorum est temporibus ut tenetur delectus quasi voluptatibus debitis. Esse quam distinctio vel ea. Sint eius quia nobis qui facilis ex et. Exercitationem rerum hic nam soluta. Illo illo aliquid delectus doloremque illo. Nemo error nemo nulla. Totam dolores ad quod officia.',1,'0',0,1,'F','F','2017-05-24 15:25:36','2017-05-24 15:25:36'),(5,'corrupti','Dolores molestiae aliquid illum reiciendis cumque. Temporibus excepturi soluta est in. Similique autem consequatur maiores quos corrupti sit repellat. Quia quisquam fuga mollitia praesentium perspiciatis quod voluptatem. Porro dolorum et aut quo possimus. Tenetur porro unde pariatur consequatur possimus non. Minima aliquid itaque consequatur. Expedita praesentium nobis ullam beatae iusto cumque. Voluptas nesciunt vitae soluta ipsam et. Voluptatem ipsam nihil sint odio nesciunt soluta. Facilis aspernatur blanditiis nihil. Quasi nostrum assumenda voluptatem delectus quasi porro. Et et numquam quia eum adipisci ut id. Magnam nulla cumque cupiditate velit corrupti architecto. Sed repellendus possimus nihil rem tempora nobis ea quo. Sunt ea et veritatis nostrum asperiores. Neque omnis velit harum quod. Soluta illo dolore amet sed atque. Non in aliquid sit. Inventore neque saepe at voluptatum illum. Et voluptates et eligendi. Enim sed molestiae excepturi molestias architecto distinctio sint. Temporibus quia dolore facere est delectus quia. Rerum quas eveniet fugit cupiditate nisi possimus asperiores. Ut et incidunt rerum minus odio laboriosam sint facere. Laborum est doloremque quia molestiae. Impedit aut libero corporis et. Et tenetur reiciendis eos voluptates corrupti animi quibusdam. Quis debitis sint impedit voluptatem sed accusamus corrupti. Aliquam ut a ad tempore. Aperiam non provident et laudantium est. Debitis sint sunt voluptates eveniet quam quia magnam. Aut numquam ut magnam et. Repellendus beatae fuga eum non hic. Quas dignissimos accusamus iusto nemo distinctio. Sed laborum reiciendis similique ut ducimus. Quis vel ea quaerat sapiente tenetur hic blanditiis. Atque similique unde rerum labore dignissimos nostrum. Assumenda accusantium in delectus et voluptatum. Quae impedit sapiente qui autem consequatur dolor eos. Quia porro sed est officiis mollitia. Ut minima maxime corporis ullam eaque quas voluptates. Officiis ut fugit laudantium atque necessitatibus molestias soluta. Minus sed totam voluptatem voluptatem. Aliquam cum doloremque molestiae sed. Quia veritatis modi eos nostrum qui. Qui culpa saepe reiciendis rem nisi debitis. A et accusamus possimus fuga suscipit. Et non officia dignissimos sequi. Illo dolorem atque non facere. Cupiditate itaque unde nemo. Et molestiae quia occaecati accusantium quasi voluptatem magni beatae. Totam sit possimus dolorem et eos.',1,'0',0,1,'F','F','2017-05-24 15:25:36','2017-05-24 15:25:36'),(7,'laravel做spa','<p>laravel结合vue做单页面应用？</p>',1,'7',0,2,'F','F','2017-06-06 17:41:54','2017-07-06 15:51:58');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

#
# Structure for table "topics"
#

DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `questions_count` int(11) NOT NULL DEFAULT '1',
  `followers_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "topics"
#

/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'laravel','php',4,0,NULL,'2017-06-06 17:41:54'),(4,'vue',NULL,1,0,'2017-06-06 17:41:54','2017-06-06 17:41:54');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;

#
# Structure for table "user_follows"
#

DROP TABLE IF EXISTS `user_follows`;
CREATE TABLE `user_follows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `follower_id` int(10) unsigned NOT NULL,
  `followed_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_follows_follower_id_index` (`follower_id`),
  KEY `user_follows_followed_id_index` (`followed_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "user_follows"
#

/*!40000 ALTER TABLE `user_follows` DISABLE KEYS */;
INSERT INTO `user_follows` VALUES (38,2,1,'2017-07-03 16:21:21','2017-07-03 16:21:21');
/*!40000 ALTER TABLE `user_follows` ENABLE KEYS */;

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` smallint(6) NOT NULL DEFAULT '0',
  `questions_count` int(11) NOT NULL DEFAULT '0',
  `answers_count` int(11) NOT NULL DEFAULT '0',
  `comments_count` int(11) NOT NULL DEFAULT '0',
  `favorites_count` int(11) NOT NULL DEFAULT '0',
  `likes_count` int(11) NOT NULL DEFAULT '0',
  `followers_count` int(11) NOT NULL DEFAULT '0',
  `followings_count` int(11) NOT NULL DEFAULT '0',
  `settings` json DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_api_token_uindex` (`api_token`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jada Bogan III','img/user1.jpg','506969463@qq.com','$2y$10$XIkTPebkRHsTbjXoWLebjOh88HGleI8FmMCwCSSm1AdVyD5emsEpu',0,0,0,0,0,0,1,0,NULL,'9OgQGDOoZtD5kypYjHRfJEWqyErsKjTGL3UGrX8F8w873BObIuu2e9cnhUxq','2017-05-24 15:21:15','2017-07-03 16:21:21','TwJ9nyPJUzVJFftRzvtsiqI1t2x7tO4dwteP1SkAkMlMhezSOs7jEL3dIclC'),(2,'Dee Pacocha','img/user2.jpg','brendan20@example.org','$2y$10$XIkTPebkRHsTbjXoWLebjOh88HGleI8FmMCwCSSm1AdVyD5emsEpu',0,2,7,0,0,0,0,1,NULL,'8oxSO0z5tUNBCXgPhPt4GhfhpDQYxCthneUQ2esMYfy1ZAgKX3mi9Lw45Mjy','2017-05-24 15:21:15','2017-07-06 15:51:58','E6cBaaiJTUYjXgjp1J5DbyASOf6XmIC9Sh2uHMrYi7qxjLJwf3WMPCZWhTa7'),(3,'Berta Smitham','img/user3.jpg','jessica.howell@example.org','$2y$10$XIkTPebkRHsTbjXoWLebjOh88HGleI8FmMCwCSSm1AdVyD5emsEpu',0,0,0,0,0,0,0,0,NULL,'','2017-05-24 15:21:15','2017-05-24 15:21:15','XCHppz7WeRlTtX7LG4vR9FdVOG0dmPmVu4v85Jww6uhQuk2SQ6R3JYnacaYY');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
