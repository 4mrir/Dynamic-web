-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 06:26 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `row_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `msg`) VALUES
(1, 'robi', 'robi@g.c', 'nai', 'jkhdfgivbniregv');

-- --------------------------------------------------------

--
-- Table structure for table `galary`
--

CREATE TABLE `galary` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galary`
--

INSERT INTO `galary` (`id`, `name`, `images`) VALUES
(5, 'Khan', 'gallery-15225190643227285042.jpg'),
(6, 'Akash', 'gallery-15225190768918705665.jpg'),
(8, 'Abcd', 'gallery-15225191003310073963.jpg'),
(9, 'News', 'gallery-15225191134307685224.jpg'),
(10, 'Gallery', 'gallery-15225191282304296817.jpg'),
(11, 'ljsfdscv', 'gallery-15225191485590806511.jpg'),
(13, 'Learn how to create a sliding overlay effect to an image, on hover.', 'gallery-1522523158894588033.jpg'),
(14, 'Nai', 'gallery-15225235618236816862.jpg'),
(15, 'lsdvkd snfdsb', 'gallery-1522523580472825053.jpg'),
(17, '', 'gallery-15225710817947673664.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  `images` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `description`, `type`, `status`, `images`, `created_at`) VALUES
(4, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos ipsam obcaecati ex tempora laudantium labore unde officiis iusto earum dicta, provident vitae dignissimos ipsa similique sint dolorem cumque modi nesciunt.', 'front_about', 1, 'about-15226431161910939182.jpg', '2018-03-28 00:48:11'),
(7, 'hasan', ' hasan is the most helpful person.\r\nhe his poor man but honest ...', 'front_about_review', 1, 'about-review-15225996507973057867.jpg', '2018-04-01 22:20:50'),
(8, 'rakib', 'rakib is the best student in our collage..\r\nalso a good friend ...', 'front_about_review', 1, 'about-review-15226010275302275342.jpg', '2018-04-01 22:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `type_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `type_name`, `type_value`) VALUES
(1, 'site_title', 'Robi'),
(2, 'site_name', 'Robi Portfolio '),
(3, 'site_address', 'Apnar basa kothay ?'),
(4, 'site_email', 'robi@gmail.com'),
(5, 'site_phone', '0179490****'),
(6, 'site_fc', 'copy korle dhora khaiben ....'),
(7, 'sm_fb', 'http://facebook.com/roton.me'),
(8, 'sm_google', 'http://md.roton01794@gmail.com'),
(9, 'sm_twitter', 'http://google.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `user_photo`, `status`, `role`, `created_at`) VALUES
(3, 'robi', 'r', 'gh@g.c', '531c154c293dfa54ca8eb77046c68c1aad5eb1f8', 'User-15225708673495872266.php', 0, 'admin', '2018-04-01 12:20:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galary`
--
ALTER TABLE `galary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_name` (`type_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `galary`
--
ALTER TABLE `galary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
