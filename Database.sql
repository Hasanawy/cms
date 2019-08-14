-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql312.epizy.com
-- Generation Time: Aug 14, 2019 at 04:55 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_24321692_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`) VALUES
(2, 'JAVASCRIPT'),
(3, 'PHP'),
(16, 'BOOTSTRAP'),
(18, 'AJAX'),
(19, 'HTML'),
(25, 'CSS');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(25) NOT NULL,
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(69, 229, 'Mohamed Hassan', 'mohamedhasen227@gmail.com', 'i think this is very useful post \r\nthank you very much', 'approve', '2019-08-13'),
(70, 229, 'ADMIN', 'ADMIN@ADMIN.COM', 'i think this is very useful post thank you very much', 'approve', '2019-08-13'),
(71, 230, 'ADMIN', 'mohamedhasen227@gmail.com', 'i think this is very useful post thank you very much', 'approve', '2019-08-13'),
(72, 230, 'hassan', 'memo@gmail.com', 'i think this is very useful post thank you very much', 'approve', '2019-08-13'),
(73, 231, 'ADMIN', 'ADMIN@ADMIN.COM', 'i think this is very useful post thank you very much', 'approve', '2019-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(3) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(229, 2, 'READY TO TRY JavaScript?', 'admin', '2019-08-13', 'Artboard-2-Copy-3.png', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'javascript , java , learn , programming , code ', 2, 'approve', 12),
(230, 2, 'Entrance To JavaScript?', 'admin', '2019-08-13', '54.png', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'javascript , java , learn , programming , code ', 3, 'approve', 5),
(231, 3, 'Entrance To PHP?', 'admin', '2019-08-13', 'php-illustration.png', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'php , web , learn , programming , code ', 2, 'approve', 3),
(232, 3, 'READY TO TRY php?', 'admin', '2019-08-13', 'f0a1c8f8b7fc436ffe115091bbeb83f8.png', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'php , web , learn , programming , code ', 1, 'approve', 3),
(233, 16, 'READY TO TRY BOOTSTRAP?', 'admin', '2019-08-13', '28979-33-org.png', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'bootstrap , web , learn , programming , code ', 1, 'approve', 1),
(234, 16, 'Entrance To BOOTSTRAP?', 'admin', '2019-08-13', 'Bootstrap4.jpeg', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'bootstrap , web , learn , programming , code ', 1, 'approve', 0),
(235, 18, 'Entrance To AJAX?', 'admin', '2019-08-13', 'advanceJS40.png', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'ajax  , web , learn , programming , code ', 1, 'approve', 0),
(236, 18, 'READY TO TRY AJAX?', 'admin', '2019-08-13', 'ajax.jpg', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'ajax , web , learn , programming , code ', 1, 'approve', 0),
(237, 19, 'READY TO TRY HTML?', 'admin', '2019-08-13', '2897.png', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'html , web , learn , programming , code ', 1, 'approve', 0),
(238, 19, 'Entrance To HTML?', 'admin', '2019-08-13', '1_28-1lYrYTQoLhi87mllgBw.png', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'html , web , learn , programming , code ', 1, 'approve', 0),
(239, 25, 'Entrance To CSS?', 'admin', '2019-08-13', '81368_2296_5.jpg', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'html , css , web , learn , programming , code ', 1, 'approve', 0),
(240, 25, 'READY TO TRY CSS?', 'admin', '2019-08-13', '1561458_7f3b.jpg', 'JavaScript is the programming language of HTML and the Web.\r\n\r\nJavaScript is easy to learn.\r\n\r\nThis tutorial will teach you JavaScript from basic to advanced.\r\nJavaScript is one of the 3 languages all web developers must learn:\r\n\r\n   1. HTML to define the content of web pages\r\n\r\n   2. CSS to specify the layout of web pages\r\n\r\n   3. JavaScript to program the behavior of web pages\r\n\r\nWeb pages are not the only place where JavaScript is used. Many desktop and server programs use JavaScript. Node.js is the best known. Some databases, like MongoDB and CouchDB, also use JavaScript as their programming language.', 'html , css , web , learn , programming , code ', 1, 'approve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  `user_status` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`, `user_status`) VALUES
(23, 'admin', '$1$0UmnNN8d$LjWwkHt18cePR4N00iSLP.', 'mohamed', 'hassan', 'admin@admin.com', '18920675_758166181009939_9077353536442785040_n.jpg', 'admin', '$2y$10$iusesomecrazystring22', 'approve'),
(41, 'geo', '$2y$12$1XaBA.RGioj9AYKljMCX/Oznz4ejHrmDLZ3mw/Nu5ZuQa0dHgCFTW', 'geo', 'nabil', 'geo@geo.com', '54433562_1176201219206431_4781709149312385024_o.jpg', 'user', '$2y$10$iusesomecrazystrings22', 'approve'),
(42, 'hassan', '$2y$12$357pICZs/zeyV8lclEcbhOuYBBF.NsnBH2iGqkEDjbet13EEheAdi', 'mohamed', 'hassan', 'mohamedhase@gmail.com', '54525248_1180535222106364_6276214926298054656_o.jpg', 'admin', '$2y$10$iusesomecrazystrings22', 'approve'),
(43, 'memo', '$2y$12$IFOtVT.ZXXV2CWomC3cpf.5OphcCkqkSH48Q9DKhRn8pP2JPr5YRq', 'muhammed', 'essam', 'mimo@gmail.com', '23559778_837726869720536_7742313192004351649_n.jpg', 'user', '$2y$10$iusesomecrazystrings22', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE IF NOT EXISTS `users_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '8sitj0vm398od1v66g32v1ac31', 1565670381),
(2, '46739ovk0niir8v7qmvnjs4vbk', 1565643438),
(3, '78mtegp9q5mcuhva9ojc50c581', 1565643659),
(4, '8osv05t2ris395080bfcl1odfe', 1565644325),
(5, '891otshsv678m9nkdj3pu4h3ei', 1565656528),
(6, 'dder2168rth1s4dvf77dj115me', 1565663923),
(7, 'ij4c5pds8vl3gm400g8mom1bn1', 1565664584);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
