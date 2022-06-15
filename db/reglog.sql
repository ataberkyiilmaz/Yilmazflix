-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for reglog
CREATE DATABASE IF NOT EXISTS `reglog` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `reglog`;

-- Dumping structure for table reglog.tb_comments
CREATE TABLE IF NOT EXISTS `tb_comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL,
  `comment` text NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `userid` (`uid`),
  CONSTRAINT `userid` FOREIGN KEY (`uid`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table reglog.tb_comments: ~9 rows (approximately)
/*!40000 ALTER TABLE `tb_comments` DISABLE KEYS */;
INSERT INTO `tb_comments` (`cid`, `uid`, `date`, `comment`, `movie_id`) VALUES
	(8, 27, '2022-06-14 10:17:42', 'harika', 238),
	(10, 36, '2022-06-14 21:04:08', 'A mindlessly entertaining film, The Fast and the Furious features fun action, sexy cars and women as well as having some cool characters. Don\'t go into this film expecting it to engage your brain though or any Fast and Furious film for that matter. Thank you Rob Cohen for starting this franchise!\r\n', 9799),
	(11, 38, '2022-06-14 21:22:12', 'Dominic Toretto (Vin Diesel) leads a group of friends and family to street race in the LA night. Brian O\'Conner (Paul Walker) is a cop working undercover to infiltrate his gang of suspected truck robberies. However he finds himself falling under Dominic\'s charisma and for Dominic\'s sister Mia (Jordana Brewster).\r\n\r\nThere is a lot of silly action, and unrealistic story lines. This is purely style winning over substance. The cars look cool and babes look hot. But it\'s the Vin Diesel presence and Paul Walker pretty boy looks that provide the heart of this movie. The boys have amazing chemistry and the gang feels like a real family. The story is almost unnecessary.', 9799),
	(12, 50, '2022-06-14 21:24:35', 'Brian O\'Conner (Paul Walker) wants to join the family of the head of California street racing (Vin Diesel)...but why?\r\n\r\nThe plot is comic book level; the dialogue is very VERY bad...but who really cares? This is a throwback of those dumb 1970s drive-in movies...it\'s for people who like loud, fast films filled with mindless action, attractive women, cars...and nothing else. I didn\'t like the film. It was too loud, too silly and way too long for a dumb action flick. What saves it is some truly incredible action sequences (the "hijacking" sequence towards the end was unbelievable), some very nice, innovative direction, a cast that manages to be good despite the script and a very good performance by Vin Diesel. This was supposed to be Walker\'s breakthrough film but Diesel steals it away. Also it looks kind of silly to have tall, lean, pretty boy Walker against tall, muscular, severe-looking Diesel.\r\n\r\nSee it for the action and Diesel. During the slow spots admire the cars or the women.', 9799),
	(13, 53, '2022-06-14 21:26:24', 'van van, van van is van, if the partial derivative y vanvan, is again van, at the given point van van, vanvan', 238),
	(14, 52, '2022-06-14 21:26:41', 'The Fast And The Furious is a great movie with a pretty good storyline and a cast that stay interested in their characters from start to finish,and some great car chasing scenes.This movie is the first Fast And Furious movie,and it is still going today,it is a very hit and miss film series,but the fifth is definitely the best one yet,and everyone has very high hopes for the sixth.Vin Diesel is the breakout character in this,he plays his character Dominic with great passion from start to finish,its hard to believe they did the second and third without him (with the exception of a brief appearance in Tokyo Drift).Fans of action movies and cars will get a great kick out of this movie.\r\n\r\nAn undercover cop gets involved with a gang of street racers in LA in order to bust a hijacking ring,but he soon becomes close friends with the racers.', 9799),
	(15, 52, '2022-06-14 21:29:03', 'This isn\'t just a beautifully crafted gangster film. Or an outstanding family portrait, for that matter. An amazing period piece. A character study. A lesson in filmmaking and an inspiration to generations of actors, directors, screenwriters and producers. For me, this is more: this is the definitive film. 10 stars out of 10.\r\n', 238),
	(16, 35, '2022-06-14 21:38:18', 'Up until today, I haven\'t bothered to review "The Godfather". After all, everyone pretty much knows it\'s one of the greatest films ever made. It\'s #2 on IMDb\'s Top 100. It won the Best Picture Oscar. And, there are nearly 1600 reviews on IMDb. So what\'s one more review?! Well, after completing 14,000 reviews (because I am nuts), I guess it\'s time I got around to reviewing a film I should have reviewed a long time ago. So, here goes....the film is perfect and only a dope wouldn\'t watch it. Unfortunately, IMDb requires me to say more to meet it\'s 10 line minimum for reviews. So, I\'ll point out that you do NOT need to like gangster films to enjoy this film. Yes, it\'s violent and nasty in spots--but it\'s also brilliantly written and produced from start to finish and deserves the accolades it\'s received.\r\n\r\nMy advice is that instead of just watching "The Godfather" and "The Godfather: Part II", see the combined version they created for television--with additional scenes that made it a very rich experience.', 238),
	(17, 27, '2022-06-15 00:41:48', 'This animation tells the story of the minions trying to look for an evil master in order to keep up their morale. They find a villain called Scarlet Overkill, and the minions are tasked with stealing the crown from the Queen.\r\n\r\nI saw the trailer and I thought the "Minions" was so cute. After watching the film, I thought it was even cuter than I expected! The plot is silly but fun. The minions are simple in design, and simple in their thoughts, but they manage to create the funniest situations. There are some jokes that made me laugh out loud, such as the usage of a teapot inside a police car. I also just realised that the minions are not talking unintelligible gibberish - it is actually a mix of languages, which I spotted Spanish, German, Mandarin and Bahasa. I enjoyed watching this animation, it is 90 minutes of brain-off entertainment.', 211672);
/*!40000 ALTER TABLE `tb_comments` ENABLE KEYS */;

-- Dumping structure for table reglog.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userGroup` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table reglog.tb_user: ~12 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`id`, `username`, `email`, `password`, `userGroup`) VALUES
	(26, 'warez771', 'abuzmutti@gmail.com', '123123', 'user'),
	(27, 'syntax', 'atayilmazgs@gmail.com', 'redhacker', 'admin'),
	(28, 'mahirtunc', 'mahir123@hotmail.com', 'mhr123', 'user'),
	(29, 'ckenan', 'kenanc@gmail.com', 'kenan123', 'user'),
	(33, 'elliotalderson', 'elliot.robot@tempmail.com', 'fsociety', 'user'),
	(35, 'atab', 'atak@mail.com', 'red', 'user'),
	(36, 'people', 'pop@mail.to', 'hamlin', 'user'),
	(37, 'berk', 'titleberk@gmail.com', 'hacking', 'user'),
	(38, 'klaratomane', 'klaraukraine@mail.ukr', 'lolala', 'user'),
	(50, 'nginx66', '123213@gmail.com', 'gfhjk', 'user'),
	(52, 'Mehmet12', 'mehmet@gmail.com', 'Quantum', 'user'),
	(53, 'canihearme', 'vanvanvanvan@isvan.com', '123', 'user');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
