-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 03:43 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banhammer`
--

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_key`, `site_key`, `pass`, `fail`, `streak`, `total`, `created`) VALUES
(46, 6, 1, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(47, 6, 2, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(48, 6, 3, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(49, 6, 4, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(50, 6, 5, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(51, 6, 6, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(52, 6, 7, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(53, 6, 8, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(54, 6, 9, 0, 0, 0, 0, '2017-02-22 00:29:16');

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `slug`, `sort`, `created`) VALUES
(1, 'none', 1, '2017-02-09 05:59:55'),
(2, 'edit', 3, '2017-02-09 05:59:55'),
(3, 'delete', 5, '2017-02-09 05:59:55'),
(4, 'temp_ban', 9, '2017-02-09 05:59:55'),
(5, 'perm_ban', 10, '2017-02-09 05:59:55'),
(8, 'warning', 2, '2017-02-16 10:24:22');

--
-- Dumping data for table `enforcement`
--

INSERT INTO `enforcement` (`id`, `site_key`, `offence_key`, `created`) VALUES
(1, 1, 1, '2017-02-09 06:53:35'),
(2, 1, 2, '2017-02-09 06:53:35'),
(3, 1, 11, '2017-02-09 06:53:35'),
(4, 1, 5, '2017-02-12 10:15:06'),
(5, 1, 4, '2017-02-12 10:15:06');

--
-- Dumping data for table `offence`
--

INSERT INTO `offence` (`id`, `slug`, `sort`, `created`) VALUES
(1, 'none', 0, '2017-02-09 06:00:59'),
(2, 'spam', 1, '2017-02-09 06:00:59'),
(3, 'off_topic', 1, '2017-02-09 06:00:59'),
(4, 'rude', 1, '2017-02-09 06:00:59'),
(5, 'low_quality', 1, '2017-02-09 06:00:59'),
(6, 'opinion_based', 1, '2017-02-09 06:00:59'),
(7, 'controversial', 1, '2017-02-09 06:00:59'),
(8, 'copyright_violation', 1, '2017-02-09 06:00:59'),
(9, 'fake_news', 1, '2017-02-09 06:00:59'),
(10, 'pornographic', 1, '2017-02-09 06:00:59'),
(11, 'political', 10, '2017-02-09 06:00:59');

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `ip`, `content`, `image`, `offence_key`, `real_report`, `site_key`, `account_key`, `confidence`, `severity_sum`, `review_tally`, `last_reviewed`, `created`) VALUES
(235, 'Anonymous', '::1', 'lol', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:39:40', '2017-02-22 00:39:40'),
(236, 'Anonymous', '::1', 'Would you ever consider eating a girls poop, if she was qt enough with a great ass?\r\nThinking about asking my gf', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:39:43', '2017-02-22 00:39:43'),
(237, 'Anonymous', '::1', 'so men are taking testostorone to become body builders and shit = man taking male hormones\r\n\r\nwhat happens when women take female hormones. Not just stuff like the pill. But massive amounts of estrogens. Do they become incredibly hot (i guess not, otherwise people would do it). I''m mean I''m pretty sure that it makes your boobs larger. Why not use it for breast enlargement ? \r\nDo you just get fat and more emotionally unstable?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:40:17', '2017-02-22 00:40:17'),
(238, 'Anonymous', '::1', 'Go to a Gay club, live it up for a bit then annihilate', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:41:02', '2017-02-22 00:41:02'),
(239, 'Anonymous', '::1', 'Yeah better fat shame someone who is already actively working towards bettering themselves, you''re so smart man, you should write a book', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:41:36', '2017-02-22 00:41:36'),
(240, 'Anonymous', '::1', 'NO', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:43:50', '2017-02-22 00:43:50'),
(241, 'Anonymous', '::1', 'FUCK YOU', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:43:56', '2017-02-22 00:43:56'),
(242, 'Anonymous', '::1', 'xWarpDarkmatter on twitch raid this fucker. Would post link but won''t let me', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:44:18', '2017-02-22 00:44:18'),
(243, 'Anonymous', '::1', 'Can women be funny?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:44:26', '2017-02-22 00:44:26'),
(244, 'Anonymous', '::1', 'Hi, just wanted to say you guys don''t really need a wall.', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:44:59', '2017-02-22 00:44:59'),
(245, 'Anonymous', '::1', 'How can i get the highest possible off 2 grams of decent weed?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:45:36', '2017-02-22 00:45:36'),
(246, 'Anonymous', '::1', 'how do i stop getting depressed about how fucked up this world is? im always thinking of the struggles people have to endure in a life they didnt ask to have. ive always been a sensitive little cunt since i was a kid. i would always cry when someone got the shit beat out of em on wwe wrestling and when animals would get torn apart on animal planet lol. i just think about other peoples problems and feeling too much. can anyone relate? >inb4 stop being a pussy normie fag\r\nalso feels thread i guess', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:45:58', '2017-02-22 00:45:58'),
(247, 'Anonymous', '::1', 'Guys I found satan.', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:46:08', '2017-02-22 00:46:08'),
(248, 'Anonymous', '::1', 'The fuck you looking at?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:46:15', '2017-02-22 00:46:15'),
(249, 'Anonymous', '::1', 'yeah those piss drinking Jamisons girls', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:46:24', '2017-02-22 00:46:24'),
(250, 'Anonymous', '::1', 'what would you do?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:47:15', '2017-02-22 00:47:15'),
(251, 'Anonymous', '::1', 'A girl wants to have sex with me. Cant do it at our homes for privacy reasons. What''s a good spot?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:47:23', '2017-02-22 00:47:23'),
(252, 'Anonymous', '::1', 'They get health complications. Increased risk of cancers etc You really shoudn''t fuck with your hormonal levels.\r\n\r\nEven those who do only do it for a short time.\r\n\r\nIt''s testosterone/estrogen isn''t some POWERELIXIR BUFF OF STUD/HOTTIENESS\r\n\r\nIt can fuck with your body and mind. Take those people who roid like regularly for long period, they can get roidrage and extreme cystic acne, erectile dysfunctions, shrinked testicles etc.', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:48:45', '2017-02-22 00:48:45'),
(253, 'Anonymous', '::1', 'I recommend a turkey baster to make sure you flush all your jizz out of both holes. If you have long fingers you might be able to reach the junction where the two holes joint, otherwise I had to use a drum stick and shove a paper towel in there, muzzle loader style. Otherwise it''s way too moist for my comfort (especially without a turkey baster; hard rinsing wasn''t enough without it, I could still feel some slippery mixture of thinned lube and cum with my fingers at the junction).\r\nOtherwise enjoy. I often go for second rounds in the shower when I bring it to clean it because feeling it wet all over turns me on again.', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:53:26', '2017-02-22 00:53:26'),
(254, 'Anonymous', '::1', 'What do you think about North Korea?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:54:01', '2017-02-22 00:54:01'),
(255, 'Anonymous', '::1', 'Chubby hairy guys and BO.\r\nIdk why armpit stank gets me so wet', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:54:16', '2017-02-22 00:54:16'),
(256, 'Anonymous', '::1', 'The only people I ever saw do this was the retards in elementary school.', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:57:05', '2017-02-22 00:57:05'),
(257, 'Anonymous', '::1', 'L\r\nE\r\nL\r\nE\r\nL E L \r\nL E L \r\nE\r\nL E L \r\nE\r\nL E L \r\nL\r\nE\r\nL\r\nE\r\nL E L', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 19:57:13', '2017-02-22 00:57:13'),
(258, 'Anonymous', '::1', 'Grabbed your ass or put his hand down your pants?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 20:08:16', '2017-02-22 01:08:16'),
(259, 'Anonymous', '::1', 'Around 5 times too, broken her wide open at the 2nd time. Its been just two days tho.\r\nThe best time was like the 4th one? Usually it kicks in right when I am near the orgasm and it is a straight up "get ahold of pencil with your teeth and try to endure the weird bad feeling" right untill I am close to cum, the time when it doesnt matter much anymore.\r\nIn terms of lube I use like six drops ending up having everything in it, even the fucking floor, just so it would be comfy enough...\r\nFuck, maybe I am just oversensitive?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 20:10:55', '2017-02-22 01:10:55'),
(260, 'Anonymous', '::1', 'As for cleaning the onahole, it''s super easy since the hole is shallow; it''s disassembling her that''s a pain. I don''t want any of my cum to get inside her leg joints, and I cum buckets when I do it with her, so I have to be extra careful (sometimes my cum literally shoots out the sides like in my hentai animes; and since the onahole creates its own suction, you can hear an audible spurt when it bursts out the side; shit turns me on so much). I clean the doll parts with a paper towel and some alcohol. Fully rinsing doll parts create risk for mold since it''s virtually impossible to dry the insides of the legs hence I avoid getting my cum or the lube to overflow in there.\r\nJust keep her canal aimed upwards as you disassemble her legs.\r\n\r\nIn conclusion there''s a bit of a learning curve to making love with your doll, but as fellow dollfags, it''s worth it given how much we love them. The invention of dollhos is god''s work.\r\n\r\nON THE OTHER HAND there are 65cm china dolls (WM dolls/Sanhui/etc.) that you can just replace the stock [hideous] heads with volks DD heads (don''t know what kind of modifications needed though). You get a full skeleton (albeit wired) and full TPE body, so way more freedom and durability (you can be rougher, easier to pose for different positions, and you can cum on their bodies), though it''s $550 and durability of wire skeleton is questionable. Also since it''s 5cm taller it does look a bit bigger compared to a DD body. Clothes still fit though.\r\n\r\nAlso a lot of jp also use other onaholes; they just surgically mod them to work like dollhos (cut hole underneath canal for leg axle, spine mod to hold arm axles, cut out breasts of torso to accommodate the entire onahole).\r\n\r\nGo to xham for vids (tenanmon has the most OHD videos) or the SOF bukkake board dot net ("bukkake" spelled in hiragana + 板); they have a dollho board. Can also pick up info there just watching vids of fellow dollfuckers (no homo', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 20:11:23', '2017-02-22 01:11:23'),
(261, 'Anonymous', '::1', ':(', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 20:11:37', '2017-02-22 01:11:37'),
(262, 'Anonymous', '::1', 'Hypothetically, let''s say I wanted to start a Fascist Party in my country. But I can''t call it Fascist, because then it would get banned. What should I call the party? My plan is to have mild Nationalist policies at first, then gradually go hardcore as the Party gains power. Hypothetically though, of course :^)', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 20:14:28', '2017-02-22 01:14:28'),
(263, 'Anonymous', '::1', 'Suddenly, and without warning, act like they don''t exist. Just stop acknowledging them, no matter what they do.', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 20:17:44', '2017-02-22 01:17:44'),
(264, 'Anonymous', '::1', 'This will sound like nuttery, but I''ve found the sure way to instantly get rid of a headache is to cut a lemon in quarters, then bite into one of the quarters, and chew up the pulp.\r\nDon''t know why, but the shock of the sudden taste seems to give your brain something new to focus on, and the headache evaporates.', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 20:20:04', '2017-02-22 01:20:04'),
(265, 'Anonymous', '::1', 'https://www.youtube.com/watch?v=wBqM2ytqHY4', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 21:15:09', '2017-02-22 02:15:09'),
(266, 'Anonymous', '::1', 'Why are you so scared? Are you frightened that some guy will suck your pecker than your frigid, potato-faced girlfriend? Frightened that you might like it?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 21:15:57', '2017-02-22 02:15:57'),
(267, 'Anonymous', '::1', '>go to obscure wikipedia article that no one looks at\r\n>edit in bullshit facts and information\r\n\r\nHow are you a menace to society?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 21:16:52', '2017-02-22 02:16:52'),
(268, 'Anonymous', '::1', 'http://replygif.net/i/1196.gif', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 21:19:54', '2017-02-22 02:19:54'),
(269, 'Anonymous', '::1', 'THE DREAMS OF THOSE WE''VE LEFT BEHIND\r\n\r\nTHE HOPES OF THOSE WHO''VE YET TO FOLLOW\r\n\r\nTHOSE TWO SETS OF DREAMS WEAVE TOGETHER INTO A DOUBLE HELIX\r\n\r\nDRILLING A PATH TOWARDS TOMORROW\r\n\r\nTHAT''S\r\nTENGEN TOPPA\r\nTHAT''S\r\nGURREN LAGANN\r\n\r\nMINE IS THE DRILL\r\nTHAT CREATES THE HEAVENS!!!', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 21:20:08', '2017-02-22 02:20:08'),
(270, 'Anonymous', '::1', 'Tell us about your high school crush', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 21:20:31', '2017-02-22 02:20:31'),
(271, 'Anonymous', '::1', 'I was in a university lunch break and I told my friends I had feelings for a weeb girl in my class.\r\nThey made fun of me and they fucking went up to the girl and started talking about how I am a bad person and all that shit (most of it was made up). \r\n\r\nSo why do they do this shit? They already have girlfriends and they knew why I liked her. To top it all of I saw open up 4chan once. \r\n\r\nSorry for bad grammar I am still pissed about this.', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 21:22:11', '2017-02-22 02:22:11'),
(272, 'Anonymous', '::1', 'Is fapping without porn okay?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 21:24:03', '2017-02-22 02:24:03'),
(273, 'Anonymous', '::1', 'How do i cope with my only online friend blocking me?', '', 1, 0, 1, 0, 1, 0, 0, '2017-02-21 21:24:24', '2017-02-22 02:24:24');

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `slug`, `name`, `active`, `accuracy_minimum`, `anonymous_flag`, `sort`, `created`) VALUES
(1, 'blank', 'bLanK', 1, 0, 1, 0, '2017-02-09 05:44:49'),
(2, 'b', '/b/', 0, 0, 0, 0, '2017-02-09 05:44:49'),
(3, 'facepage', 'Facepage', 0, 0, 0, 0, '2017-02-09 05:45:20'),
(4, 'rumblr', 'Rumblr', 0, 0, 0, 0, '2017-02-09 05:45:20'),
(5, 'bitter', 'Bitter', 0, 0, 0, 0, '2017-02-09 05:45:54'),
(6, 'slackovertime', 'SlackOvertime', 0, 0, 0, 0, '2017-02-09 05:45:54'),
(7, 'wetube', 'WeTube', 0, 0, 0, 0, '2017-02-09 05:46:18'),
(8, 'Amason', 'Amason', 0, 0, 0, 0, '2017-02-09 05:46:18'),
(9, 'asksaidit', '/r/asksaidit', 0, 0, 0, 0, '2017-02-09 07:33:46');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `ab_test`, `image`, `ip`, `email`, `facebook_id`, `last_login`, `password`, `created`) VALUES
(6, 'goose', 'hide_subheader', '', '::1', 'placeholder@gmail.com', '0', '2017-02-21 19:29:16', '$2y$10$Z/bQOQV4wVrcyUD8ZKIf.evZvy4Y.q5LPfAtZEC.Erc5paLYW114G', '2017-02-22 00:29:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
