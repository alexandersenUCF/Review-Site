-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: sulley.cah.ucf.edu
-- Generation Time: Apr 21, 2017 at 09:34 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `al253828`
--

-- --------------------------------------------------------

--
-- Table structure for table `a6_comments`
--

CREATE TABLE `a6_comments` (
  `comment_id` int(100) NOT NULL,
  `comment_creation_date` datetime NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `review_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a6_comments`
--

INSERT INTO `a6_comments` (`comment_id`, `comment_creation_date`, `comment`, `review_id`, `user_id`) VALUES
(20, '2017-04-21 20:44:34', 'This was such a fun game! Why so low.', 1, 0),
(21, '2017-04-21 20:44:59', 'The cow milking game was my favorite.', 5, 0),
(22, '2017-04-21 20:45:19', 'Yeah this game sucked pretty bad.', 4, 0),
(23, '2017-04-21 20:45:52', 'It was so bad!', 1, 0),
(24, '2017-04-21 20:46:21', 'Loved it! Great party game.', 5, 1),
(25, '2017-04-21 20:46:35', 'The graphics were so good tho!', 4, 1),
(26, '2017-04-21 20:46:41', 'So scary!!!', 3, 1),
(27, '2017-04-21 20:46:59', 'I love mario.', 1, 1),
(28, '2017-04-21 20:47:13', 'Finally!', 2, 1),
(29, '2017-04-21 20:48:52', 'Making levels is so much fun.', 1, 2),
(30, '2017-04-21 20:49:17', 'Should have come bundled with the Switch.', 5, 2),
(31, '2017-04-21 20:49:58', 'I hate robots.', 4, 2),
(32, '2017-04-21 20:50:15', 'What even is this review...', 9, 2),
(33, '2017-04-21 20:51:07', 'So pretty!', 4, 3),
(34, '2017-04-21 20:52:34', 'Just Awful!', 1, 3),
(35, '2017-04-21 20:52:46', 'Bad...', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `a6_reviews`
--

CREATE TABLE `a6_reviews` (
  `review_id` int(100) NOT NULL,
  `review_creation_date` datetime NOT NULL,
  `game_name` varchar(100) NOT NULL,
  `game_review` varchar(5000) NOT NULL,
  `game_rating` int(11) NOT NULL,
  `game_image_url` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a6_reviews`
--

INSERT INTO `a6_reviews` (`review_id`, `review_creation_date`, `game_name`, `game_review`, `game_rating`, `game_image_url`, `user_id`) VALUES
(1, '2016-11-30 07:38:23', 'Super Mario Maker 3DS', 'Nintendo\'s Super Mario Maker has arrived on the Nintendo 3DS, offering a big dose of make-your-own-Mario-to-go. It\'s fun, but it isn\'t exactly the home run it could have been... because it\'s missing something important. Sharing.\r\n\r\nSuper Mario Maker debuted on the Wii U last year, offering tons of make-your-own smart lesson in the basics of game design. My son loves it to death. The 3DS version bottles that up in a mini portable version, but it doesn\'t cross-sync with the Wii U game. And it doesn\'t even allow you to upload your own levels.', 1, 'https://upload.wikimedia.org/wikipedia/en/d/da/Super_Mario_Maker_Artwork.jpg', 2),
(2, '2016-12-05 13:29:16', 'The Last Guardian', 'Back in 2001, development studio Team Ico released a self-titled game called Ico for the PlayStation 2 that won over critics and players alike with its endearing story and unique brand of puzzles. Ico was well received when it was released but its popularity continued to grow well beyond its debut, propelling it to cult status as years passed.\r\n\r\nFour years later, Ico was followed up by Shadow of the Colossus, a game that many believe is the PlayStation 2\'s absolute best. Shadow delivered something no one had ever really witnessed before, giving you an incredible sense of scale and triumph as you took down larger-than-life colossi one by one.', 4, 'https://upload.wikimedia.org/wikipedia/en/2/25/The_Last_Guardian_cover_art.jpg', 3),
(3, '2017-01-23 05:39:11', 'Resident Evil 7 Biohazard', 'Without a doubt, Resident Evil 7 is the best in the series since Resident Evil 4 debuted back in 2005. RE7 is not only profoundly in touch with its roots, it also stands confidently as its own independent work of interactive horror.\r\n\r\nWhat made Resident Evil 4 so damn good was its remarkable sense of balance and self-awareness. Every bullet mattered, every room was worth exploring. Resident Evil 7 carries that torch, urging the player to consider all the little things -- ammo conservation, for sure, and a little light inventory management. And like RE4, RE7 is at many times almost too frightening to stomach, filled with gruesome visuals and plenty of jump scares.', 5, 'https://upload.wikimedia.org/wikipedia/en/f/fd/Resident_Evil_7_cover_art.jpg', 2),
(4, '2017-02-20 13:23:37', 'Horizon Zero Dawn', 'After nearly 25 hours with Horizon Zero Dawn, I\'m still on the fence about whether or not I actually like this game. For all the moments of awe and amazing action it\'s able to create, Horizon is not without its fair share of frustrating wild-goose-chase quests, monotonous collecting and a number of questionable design choices.\r\n\r\nWhether or not you should play Horizon depends on your level of tolerance for that kind of imbalance. Horizon is brimming with potential and presents a lot of really great ideas, but the whole package isn\'t as compelling as the sum of its parts.\r\n\r\nHorizon Zero Dawn is a PS4 exclusive from developer Guerrilla Games, the studio known primarily for Killzone, a mostly well-regarded first-person-shooter series.', 2, 'http://sm.ign.com/ign_ap/cover/h/horizon-ze/horizon-zero-dawn_t78m.jpg', 3),
(5, '2017-03-03 08:27:49', '1-2-Switch', 'I tried 1-2 Switch at a Nintendo preview event, briefly milking a cow. (Yes, really.) But this time, we got the whole office involved. Playing the full game with co-workers I see every day, it was a different vibe. 1-2 Switch de-emphasizes staring at the screen at all. Most games involve sound effects, vibration feedback via the Joy-Con controllers\' \"HD Rumble,\" and lots of imagination.\r\n\r\nI want to applaud 1-2 Switch for encouraging social interaction, for being daring with its insistence on away-from-the-screen gaming in its little mini games. But a lot of 1-2 Switch feels too shallow to be anything more than a little amusement. And some of it feels like ideas the Wii already hammered in 10 years ago.', 4, 'https://upload.wikimedia.org/wikipedia/en/e/e3/OneTwoSwitch.jpg', 1),
(9, '2017-04-18 14:19:39', 'test', 'test', 3, 'https://s-media-cache-ak0.pinimg.com/originals/96/68/7e/96687e8efb69a1fd13d80ff4f25888a1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `a6_users`
--

CREATE TABLE `a6_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(11) NOT NULL,
  `last_name` varchar(11) NOT NULL,
  `access_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a6_users`
--

INSERT INTO `a6_users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `access_level`) VALUES
(0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Adam', 'Min', 0),
(1, 'review', '1c67665285fb6a7d761414e12578e574', 'Ray', 'View', 1),
(2, 'review1', 'fba69d30e85b06f1f97929acd857ede7', 'Ray-Jay', 'Viewman', 1),
(3, 'review2', '6caed6c4225a277d134a7c483b77d972', 'Raymond', 'Viewson', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a6_comments`
--
ALTER TABLE `a6_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `a6_reviews`
--
ALTER TABLE `a6_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `a6_users`
--
ALTER TABLE `a6_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a6_comments`
--
ALTER TABLE `a6_comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `a6_reviews`
--
ALTER TABLE `a6_reviews`
  MODIFY `review_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
