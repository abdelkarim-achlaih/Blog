-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql101.epizy.com
-- Generation Time: Oct 28, 2023 at 07:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28720591_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `content` text NOT NULL,
  `pending` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `bg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `category`, `creation_date`, `content`, `pending`, `views`, `bg`) VALUES
(3, 'Personal development', 1, 2, '2021-09-06 14:09:58', 'Personal development consists of activities that develop a person\'s capabilities and potential, build human capital, facilitate employability, and enhance quality of life and the realization of dreams and aspirations.[1][better source needed] Personal development may take place over the course of an individual\'s entire lifespan and is not limited to one stage of a person\'s life. It can include official and informal actions for developing others in roles such as teacher, guide, counselor, manager, coach, or mentor, and it is not restricted to self-help. When personal development takes place in the context of institutions, it refers to the methods, programs, tools, techniques, and assessment systems offered to support positive adult development at the individual level in organizations.', 1, 64, '14154580564.jpg'),
(4, 'Running', 1, 3, '2021-09-15 07:10:21', 'Running is a method of terrestrial locomotion allowing humans and other animals to move rapidly on foot. Running is a type of gait characterized by an aerial phase in which all feet are above the ground (though there are exceptions).[1] This is in contrast to walking, where one foot is always in contact with the ground, the legs are kept mostly straight and the center of gravity vaults over the stance leg or legs in an inverted pendulum fashion.[2] A feature of a running body from the viewpoint of spring-mass mechanics is that changes in kinetic and potential energy within a stride occur simultaneously, with energy storage accomplished by springy tendons and passive muscle elasticity.[3] The term running can refer to any of a variety of speeds ranging from jogging to sprinting.\r\n\r\nRunning in humans is associated with improved health and life expectancy.[4]\r\n\r\nIt is assumed that the ancestors of humankind developed the ability to run for long distances about 2.6 million years ago, probably in order to hunt animals.[5] Competitive running grew out of religious festivals in various areas. Records of competitive racing date back to the Tailteann Games in Ireland between 632 BCE and 1171 BCE,[6][7][8] while the first recorded Olympic Games took place in 776 BCE. Running has been described as the world\'s most accessible sport.', 1, 65, '32955803720.jpg'),
(5, 'Robotic arm', 1, 1, '2021-09-02 19:20:44', 'A robotic arm is a type of mechanical arm, usually programmable, with similar functions to a human arm; the arm may be the sum total of the mechanism or may be part of a more complex robot. The links of such a manipulator are connected by joints allowing either rotational motion (such as in an articulated robot) or translational (linear) displacement.[1][2] The links of the manipulator can be considered to form a kinematic chain. The terminus of the kinematic chain of the manipulator is called the end effector and it is analogous to the human hand. However, the term \"robotic hand\" as a synonym of the robotic arm is often proscribed.', 0, 60, '15595336086.png'),
(13, 'today', 1, 3, '2021-09-28 16:11:16', 'Its had resolving otherwise she contented therefore. Afford relied warmth out sir hearts sister use garden. Men day warmth formed admire former simple. Humanity declared vicinity continue supplied no an. He hastened am no property exercise of. Dissimilar comparison no terminated devonshire no literature on. Say most yet head room such just easy.\r\n\r\nPerformed suspicion in certainty so frankness by attention pretended. Newspaper or in tolerably education enjoyment. Extremity excellent certainty discourse sincerity no he so resembled. Joy house worse arise total boy but. Elderly up chicken do at feeling is. Like seen drew no make fond at on rent. Behaviour extremely her explained situation yet september gentleman are who. Is thought or pointed hearing he.', 0, 2018, '33185897439.png'),
(14, 'Template-Two', 1, 4, '2021-09-28 22:44:52', 'Brother set had private his letters observe outward resolve. Shutters ye marriage to throwing we as. Effect in if agreed he wished wanted admire expect. Or shortly visitor is comfort placing to cheered do. Few hills tears are weeks saw. Partiality insensible celebrated is in. Am offended as wandered thoughts greatest an friendly. Evening covered in he exposed fertile to. Horses seeing at played plenty nature to expect we. Young say led stood hills own thing get.\r\n\r\nKnowledge nay estimable questions repulsive daughters boy. Solicitude gay way unaffected expression for. His mistress ladyship required off horrible disposed rejoiced. Unpleasing pianoforte unreserved as oh he unpleasant no inquietude insipidity. Advantages can discretion possession add favourable cultivated admiration far. Why rather assure how esteem end hunted nearer and before. By an truth after heard going early given he. Charmed to it excited females whether at examine. Him abilities suffering may are yet dependent.', 0, 18, '95376251764.jpg'),
(15, 'e-learning website', 1, 6, '2021-09-28 23:11:09', 'Updated Apartments simplicity or understood do it we. Song such eyes had and off. Removed winding ask explain delight out few behaved lasting. Letters old hastily ham sending not sex chamber because present. Oh is indeed twenty entire figure. Occasional diminution announcing new now literature terminated. Really regard excuse off ten pulled. Lady am room head so lady four or eyes an. He do of consulted sometimes concluded mr. An household behaviour if pretended.', 0, 26, '95091751982.jpg'),
(20, 'Template-Two', 1, 5, '2021-09-30 17:28:09', 'Sing long her way size. Waited end mutual missed myself the little sister one. So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect. Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an. If their woman could do wound on. You folly taste hoped their above are and but.\r\n\r\nCultivated who resolution connection motionless did occasional. Journey promise if it colonel. Can all mirth abode nor hills added. Them men does for body pure. Far end not horses remain sister. Mr parish is to he answer roused piqued afford sussex. It abode words began enjoy years no do ï»¿no. Tried spoil as heart visit blush or. Boy possible blessing sensible set but margaret interest. Off tears are day blind smile alone had.', 0, 8, '84605744491.jpg'),
(21, 'helllo from the other side', 1, 1, '2021-10-07 16:16:27', 'Indulgence announcing uncommonly met she continuing two unpleasing terminated. Now busy say down the shed eyes roof paid her. Of shameless collected suspicion existence in. Share walls stuff think but the arise guest. Course suffer to do he sussex it window advice. Yet matter enable misery end extent common men should. Her indulgence but assistance favourable cultivated everything collecting.\r\n\r\nCarriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted.', 0, 12, '79653705933.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'nature'),
(6, 'school'),
(2, 'self-development'),
(3, 'sport'),
(1, 'technology'),
(5, 'work');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `content` text NOT NULL,
  `blog` int(11) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `content`, `blog`, `creation_date`) VALUES
(1, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(2, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(3, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(4, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(5, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(6, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(7, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(8, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(9, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(10, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(11, 1, 'It\'s engaging not just beastly!', 5, '2021-09-15 14:54:00'),
(12, 1, 'It\'s engaging not just beastly!', 4, '2021-09-15 14:54:00'),
(13, 1, 'It\'s engaging not just beastly!', 3, '2021-09-15 14:54:00'),
(31, 1, 'heloo hhhhhhhhhh', 5, '2021-09-17 06:24:01'),
(32, 1, 'hi 45545', 5, '2021-09-17 06:24:52'),
(33, 1, 'oumai', 5, '2021-09-17 06:25:59'),
(44, 1, '', 5, '2021-09-28 20:24:55'),
(45, 1, '', 5, '2021-09-28 20:27:50'),
(49, 1, 'hello', 14, '2021-10-09 09:41:28'),
(50, 1, 'hello again', 4, '2021-10-09 10:35:56'),
(51, 6, 'bla bla bla ', 3, '2021-10-09 08:13:55'),
(52, 1, 'Hello', 15, '2021-10-09 17:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sign_in_date` datetime NOT NULL,
  `gender` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `category`, `type`, `sign_in_date`, `gender`, `avatar`) VALUES
(1, 'abdelkarim', 'achlaih', 'abdelkarimAch', 'abdelkarima46@gmail.com', 'ae720b6915affc71df9ef27a0dcaf108d7931203', 2, 'admin', '2021-09-06 13:47:35', 1, '79943726266.png'),
(6, 'ABDERRAHIM', 'TARMOUM', 'abderrahim.tarmoum@gmail.com', 'abderrahim.tarmoum@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 3, 'user', '2021-10-09 08:09:36', 1, '78814489745.jpg'),
(7, 'walid', 'fettan', 'walidrReal', 'walid@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 3, 'user', '2021-10-09 09:18:32', 1, '25660902418.jpg'),
(8, 'reda', 'reda', 'reda123', 'reda@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 3, 'user', '2021-10-28 08:08:45', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_users` (`author`),
  ADD KEY `blogs_categories` (`category`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blogs` (`blog`),
  ADD KEY `comments_users` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_categories` (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
