-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 01, 2014 at 08:58 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mideuml`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_content`
--

CREATE TABLE `blog_content` (
  `blog_post_id` int(10) NOT NULL AUTO_INCREMENT,
  `blog_post_title` varchar(100) NOT NULL,
  `blog_post_content` varchar(300) NOT NULL,
  `blog_post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `blog_post_writer` varchar(100) NOT NULL,
  `blog_id_member` int(10) unsigned NOT NULL,
  `members_user_id` int(10) unsigned NOT NULL,
  `writer_school` varchar(100) NOT NULL,
  PRIMARY KEY (`blog_post_id`,`members_user_id`),
  KEY `fk_blog_content_members` (`members_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `blog_content`
--

INSERT INTO `blog_content` (`blog_post_id`, `blog_post_title`, `blog_post_content`, `blog_post_time`, `blog_post_writer`, `blog_id_member`, `members_user_id`, `writer_school`) VALUES
(4, 'title', '', '2014-02-14 19:23:13', '', 0, 1, ''),
(5, 'blog_title', '', '2014-02-14 19:25:24', '', 0, 1, ''),
(7, 'a;lskdfj', '', '2014-02-14 19:31:21', '', 0, 3, ''),
(8, 'asdf', '', '2014-02-14 19:38:30', '', 0, 2, ''),
(19, 'Title', 'Test', '2014-02-15 01:22:50', '', 0, 3, ''),
(20, 'Blog Title', 'Blog Post', '2014-02-15 01:24:25', '', 0, 1, ''),
(21, 'Blog Title WOW', 'WOW', '2014-02-15 01:39:10', '', 0, 1, ''),
(22, 'Blog Title WOW', 'WOW', '2014-02-15 01:39:31', '', 0, 1, ''),
(23, 'Fuck', 'the world', '2014-02-15 01:40:14', 'mason', 0, 1, ''),
(24, 'Hello', 'This is a test for my blog post.', '2014-02-16 08:08:09', 'Sollip', 0, 5, ''),
(25, 'Hello again', 'This is a test for blog post two.', '2014-02-16 08:08:34', '', 0, 5, ''),
(26, 'Hello deadline', 'OHMYGOD', '2014-02-16 18:20:19', 'alumni_firstname', 0, 6, ''),
(27, '', '', '2014-02-16 18:24:08', 'alumni_firstname', 0, 6, ''),
(28, 'what', 'the fffffff', '2014-02-16 18:24:23', '', 0, 6, ''),
(30, 'Sunday test 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pretium tristique leo non luctus. Suspendisse venenatis velit sit amet mauris tincidunt aliquet. Suspendisse placerat, arcu vitae tristique porttitor, purus mi congue dolor, a dignissim tortor libero sed neque. Nam id quam eu lectus', '2014-02-16 18:30:04', 'alumni_firstname', 0, 6, ''),
(31, 'This is to test blog filter', 'I want to filter blog posts by school.', '2014-02-17 00:15:10', 'mason', 0, 1, ''),
(32, 'This is to test blog filter again', 'I want to filter blog post by school.', '2014-02-17 00:17:45', '', 0, 1, ''),
(33, 'Can I test this now?', 'I really want to filter blog posts by school man.', '2014-02-17 00:19:29', '', 0, 1, ''),
(34, 'Comeon', 'this', '2014-02-17 00:20:21', '', 0, 1, ''),
(35, 'This is to test blog filter again again and again', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae ipsum metus. Cras ultrices dapibus quam eu auctor. Morbi accumsan odio et magna hendrerit, in commodo velit elementum. Phasellus a arcu quis magna convallis congue eget at nisl. Pellentesque volutpat auctor consectetur. Donec laoree', '2014-02-17 00:23:30', '', 0, 1, 'Richmond High School'),
(36, 'Let me really test this', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae ipsum metus. Cras ultrices dapibus quam eu auctor. Morbi accumsan odio et magna hendrerit, in commodo velit elementum. Phasellus a arcu quis magna convallis congue eget at nisl. Pellentesque volutpat auctor consectetur. Donec laoree', '2014-02-17 00:27:07', 'alumni_firstname', 0, 6, 'Byrncreek'),
(37, 'Testing blogging post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel enim a libero gravida sagittis non vel odio. Mauris sollicitudin ultrices facilisis. Pellentesque aliquam turpis vitae faucibus ultricies. Donec fringilla leo et felis venenatis eleifend. Mauris rutrum euismod enim, sed molestie nunc ve', '2014-02-17 23:16:19', 'alumnifirstname', 0, 9, 'Bowness'),
(38, 'Hello', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel enim a libero gravida sagittis non vel odio. Mauris sollicitudin ultrices facilisis. Pellentesque aliquam turpis vitae faucibus ultricies. Donec fringilla leo et felis venenatis eleifend. Mauris rutrum euismod enim, sed molestie nunc ve', '2014-02-17 23:16:36', '', 0, 9, 'Bowness'),
(39, 'Hi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel enim a libero gravida sagittis non vel odio. Mauris sollicitudin ultrices facilisis. Pellentesque aliquam turpis vitae faucibus ultricies. Donec fringilla leo et felis venenatis eleifend. Mauris rutrum euismod enim, sed molestie nunc ve', '2014-02-17 23:16:47', '', 0, 9, 'Bowness'),
(40, 'hi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel enim a libero gravida sagittis non vel odio. Mauris sollicitudin ultrices facilisis. Pellentesque aliquam turpis vitae faucibus ultricies. Donec fringilla leo et felis venenatis eleifend. Mauris rutrum euismod enim, sed molestie nunc ve', '2014-02-17 23:17:08', '', 0, 9, 'Bowness'),
(41, 'Hello', 'Yeah I have been working on..', '2014-03-14 08:02:44', 'mason', 0, 1, 'Richmond High School'),
(42, 'Hello', 'Another test to post blog.', '2014-03-17 18:21:50', 'mason', 0, 1, 'Richmond High School'),
(43, 'Which New Facebook Homepage Increases Ad Conversions The Most? ', 'After reading Sabina Idlerâ€™s article on using Gestalt Laws to improve UX, I was excited to apply the framework to Facebookâ€™s latest homepage redesigns to understand how advertisers may be impacted.\r\n\r\nThe Framework: Gestalt Laws\r\nWhy Use a Framework? Frameworks help speed up analysis through men', '2014-03-17 21:16:51', 'Aaron ', 0, 36, 'Argyle secondary school'),
(44, 'Hello', 'Blogging Test.\r\nCan you hear me?\r\n', '2014-03-19 18:56:48', 'Aaron ', 0, 36, 'Argyle secondary school'),
(45, '', '', '2014-03-23 03:29:37', 'Kate', 0, 38, 'Richmond High School'),
(46, 'Hello World', 'Why is pulling blog post not working?', '2014-03-27 20:44:20', 'Katie', 0, 39, 'Chemainus Secondary School'),
(49, 'Blog Title', 'Cursos das maiores universidades do planeta, de graÃ§a, a um clique de distÃ¢ncia. Parece um milagre grÃ¡tis (muito melhor que um almoÃ§o grÃ¡tis). Mas atrÃ¡s dessa aparente caridade toda, existem empresas que precisam faturar. Ã‰ o caso, pelo menos, de dois grandes MOOCâ€™s: Coursera e Udacity. MOO', '2014-03-28 18:18:20', 'Bambi', 0, 37, 'Bowness'),
(50, 'Moving.', 'A restless girl from Brooklynâ€™s response to the Common Appâ€™s prompt: â€œDescribe a place or environment where you are perfectly content. What do you do or experience there, and why is it meaningful to you?â€', '2014-03-28 18:22:17', '', 0, 37, 'Bowness'),
(51, 'Moving.', 'A restless girl from Brooklynâ€™s response to the Common Appâ€™s prompt: â€œDescribe a place or environment where you are perfectly content. What do you do or experience there, and why is it meaningful to you?â€', '2014-03-28 18:22:37', '', 0, 37, 'Bowness'),
(52, 'Moving.', 'A restless girl from Brooklynâ€™s response to the Common Appâ€™s prompt: â€œDescribe a place or environment where you are perfectly content. What do you do or experience there, and why is it meaningful to you?â€', '2014-03-28 18:24:17', '', 0, 37, 'Bowness'),
(53, 'Moving.', 'A restless girl from Brooklynâ€™s response to the Common Appâ€™s prompt: â€œDescribe a place or environment where you are perfectly content. What do you do or experience there, and why is it meaningful to you?â€', '2014-03-28 18:24:59', '', 0, 37, 'Bowness'),
(54, 'Moving.', 'A restless girl from Brooklynâ€™s response to the Common Appâ€™s prompt: â€œDescribe a place or environment where you are perfectly content. What do you do or experience there, and why is it meaningful to you?â€', '2014-03-28 18:26:47', '', 0, 37, 'Bowness'),
(55, 'Moving.', 'A restless girl from Brooklynâ€™s response to the Common Appâ€™s prompt: â€œDescribe a place or environment where you are perfectly content. What do you do or experience there, and why is it meaningful to you?â€', '2014-03-28 18:29:31', '', 0, 37, 'Bowness'),
(56, 'Moving.', 'A restless girl from Brooklynâ€™s response to the Common Appâ€™s prompt: â€œDescribe a place or environment where you are perfectly content. What do you do or experience there, and why is it meaningful to you?â€', '2014-03-28 18:30:12', '', 0, 37, 'Bowness'),
(57, 'Challenging Beliefs', 'The biggest belief I have challenged was that of religious belief. When I was fourteen I decided to leave my synagogue. It wasnâ€™t like one day I just decided out of blue that I was going to leave. It was much more gradual. As I matured I slowly found myself becoming less and less comfortable in my', '2014-03-28 18:33:37', 'Bambi', 0, 37, 'Bowness'),
(58, 'Challenging Beliefs', 'The biggest belief I have challenged was that of religious belief. When I was fourteen I decided to leave my synagogue. It wasnâ€™t like one day I just decided out of blue that I was going to leave. It was much more gradual. As I matured I slowly found myself becoming less and less comfortable in my', '2014-03-28 18:37:06', 'Bambi', 0, 37, 'Bowness'),
(59, 'My Husband and I are Consciously Uncoupling, Too', 'My husband and I, much like Gwyneth and Chris, are consciously uncoupling.\r\n\r\nWeâ€™ve been together since 1999. Married since 2005. We had a daughter in 2010. Almost half of my life has been spent with him. Weâ€™ve grown up together. He was my first boyfriend. He is my best friend, the father of my ', '2014-03-28 18:38:32', 'Bambi', 0, 37, 'Bowness'),
(60, 'My Husband and I are Consciously Uncoupling, Too', 'My husband and I, much like Gwyneth and Chris, are consciously uncoupling.\r\n\r\nWeâ€™ve been together since 1999. Married since 2005. We had a daughter in 2010. Almost half of my life has been spent with him. Weâ€™ve grown up together. He was my first boyfriend. He is my best friend, the father of my ', '2014-03-28 18:40:18', 'Bambi', 0, 37, 'Bowness'),
(61, 'My Husband and I are Consciously Uncoupling, Too', 'My husband and I, much like Gwyneth and Chris, are consciously uncoupling.\r\n\r\nWeâ€™ve been together since 1999. Married since 2005. We had a daughter in 2010. Almost half of my life has been spent with him. Weâ€™ve grown up together. He was my first boyfriend. He is my best friend, the father of my ', '2014-03-28 18:40:37', 'Bambi', 0, 37, 'Bowness'),
(62, 'My Husband and I are Consciously Uncoupling, Too', 'My husband and I, much like Gwyneth and Chris, are consciously uncoupling.\r\n\r\nWeâ€™ve been together since 1999. Married since 2005. We had a daughter in 2010. Almost half of my life has been spent with him. Weâ€™ve grown up together. He was my first boyfriend. He is my best friend, the father of my ', '2014-03-28 18:41:28', 'Bambi', 0, 37, 'Bowness'),
(63, 'Throwback Thursday: Have we found our last fundamental particle?', 'â€œThe particle and the planet are subject to the same laws and what is learned of one will be known of the other.â€ -James Smithson\r\nThe entirety of the known Universeâ€Šâ€”â€Šfrom the smallest constituents of the atoms to the largest superclusters of galaxiesâ€Šâ€”â€Šhave more in common than you ', '2014-03-28 19:01:21', 'Aaron3', 0, 36, 'Argyle3 secondary school'),
(64, 'Throwback Thursday: Have we found our last fundamental particle?', 'â€œThe particle and the planet are subject to the same laws and what is learned of one will be known of the other.â€ -James Smithson\r\nThe entirety of the known Universeâ€Šâ€”â€Šfrom the smallest constituents of the atoms to the largest superclusters of galaxiesâ€Šâ€”â€Šhave more in common than you ', '2014-03-28 19:02:13', 'Aaron3', 0, 36, 'Argyle3 secondary school'),
(65, 'Throwback Thursday: Have we found our last fundamental particle?', 'â€œThe particle and the planet are subject to the same laws and what is learned of one will be known of the other.â€ -James Smithson\r\nThe entirety of the known Universeâ€Šâ€”â€Šfrom the smallest constituents of the atoms to the largest superclusters of galaxiesâ€Šâ€”â€Šhave more in common than you ', '2014-03-28 19:02:27', 'Aaron3', 0, 36, 'Argyle3 secondary school'),
(66, 'echo "<br>email sent successfully<br>";', 'echo "<br>email sent successfully<br>";', '2014-03-28 19:03:05', 'Bambi', 0, 37, 'Bowness'),
(67, 'echo "<br>email sent successfully<br>";', 'echo "<br>email sent successfully<br>";', '2014-03-28 19:03:45', 'Bambi', 0, 37, 'Bowness'),
(68, 'echo "<br>email sent successfully<br>";', 'echo "<br>email sent successfully<br>";', '2014-03-28 19:03:47', 'Bambi', 0, 37, 'Bowness'),
(69, 'echo "<br>email sent successfully<br>";', 'echo "<br>email sent successfully<br>";', '2014-03-28 19:03:48', 'Bambi', 0, 37, 'Bowness'),
(70, 'echo "<br>email sent successfully<br>";', 'echo "<br>email sent successfully<br>";', '2014-03-28 19:03:49', 'Bambi', 0, 37, 'Bowness'),
(71, 'echo "<br>email sent successfully<br>";', 'echo "<br>email sent successfully<br>";', '2014-03-28 19:05:32', 'Bambi', 0, 37, 'Bowness'),
(72, 'echo "<br>email sent successfully<br>";', 'echo "<br>email sent successfully<br>";', '2014-03-28 19:06:30', 'Bambi', 0, 37, 'Bowness'),
(73, 'echo "<br>email sent successfully<br>";', 'echo "<br>email sent successfully<br>";', '2014-03-28 19:07:08', 'Bambi', 0, 37, 'Bowness'),
(74, 'Blog Test for Email', 'This is the blog post for testing email.', '2014-03-28 20:36:46', 'Aaron3', 0, 36, 'Argyle3 secondary school'),
(75, 'Blog Test for Email', 'This is the blog post for testing email.', '2014-03-28 20:39:00', 'Aaron3', 0, 36, 'Argyle3 secondary school'),
(76, 'Blog Test for Email', 'This is the blog post for testing email.', '2014-03-28 20:39:57', 'Aaron3', 0, 36, 'Argyle3 secondary school'),
(77, 'Blog Test for Email', 'This is the blog post for testing email.', '2014-03-28 20:40:27', 'Aaron3', 0, 36, 'Argyle3 secondary school'),
(78, 'Blog Test for Email', 'This is the blog post for testing email.', '2014-03-28 20:42:11', 'Aaron3', 0, 36, 'Argyle3 secondary school'),
(79, 'Blog Test for Email', 'This is the blog post for testing email.', '2014-03-28 20:42:28', 'Aaron3', 0, 36, 'Argyle3 secondary school'),
(80, 'Emailing Test Again', 'Hello', '2014-03-28 20:43:12', 'Bambi', 0, 37, 'Bowness'),
(81, 'Emailing Test Again', 'Hello', '2014-03-28 20:44:50', 'Bambi', 0, 37, 'Bowness'),
(82, 'Email Test 2', 'Testing email again.', '2014-03-28 20:51:26', 'Bambi', 0, 37, 'Bowness'),
(83, 'Email Test 2', 'Testing email again.', '2014-03-28 20:53:35', 'Bambi', 0, 37, 'Bowness'),
(84, 'Email Test 2', 'Testing email again.', '2014-03-28 20:53:45', 'Bambi', 0, 37, 'Bowness'),
(85, 'AHHH EMAIL COMEON', 'My story.', '2014-03-28 20:58:10', 'Bambi', 0, 37, 'Bowness'),
(86, 'Hello', 'Email Test', '2014-03-30 00:33:35', 'Katie', 0, 39, 'Chemainus Secondary School'),
(87, 'Hello', 'Hi How are you email?', '2014-03-30 20:49:52', 'Katie', 0, 39, 'Chemainus Secondary School'),
(88, 'Hello', 'Hi How are you email?', '2014-03-30 20:50:51', 'Katie', 0, 39, 'Chemainus Secondary School'),
(89, 'Hello', 'Hi How are you email?', '2014-03-30 20:50:57', 'Katie', 0, 39, 'Chemainus Secondary School'),
(90, 'Hello', 'Hi How are you email?', '2014-03-30 20:50:58', 'Katie', 0, 39, 'Chemainus Secondary School'),
(92, 'Hello', 'Testing Email\r\n', '2014-03-30 20:51:32', 'Aaron3', 0, 36, 'Argyle3 secondary school'),
(93, 'Te', '', '2014-03-30 20:53:50', 'Bambi', 0, 37, 'Bowness');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `pass_word` varchar(60) NOT NULL,
  `email` varchar(320) NOT NULL,
  `high_school` varchar(100) NOT NULL,
  `graduation_year` year(4) NOT NULL,
  `description` text,
  `website` varchar(100) NOT NULL,
  `flickr_id` varchar(30) NOT NULL,
  `twitter_id` varchar(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `graduation_year` (`graduation_year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `first_name`, `last_name`, `user_name`, `pass_word`, `email`, `high_school`, `graduation_year`, `description`, `website`, `flickr_id`, `twitter_id`, `name`, `size`, `type`, `file_path`) VALUES
(1, 'mason', 'lee', 'maizur', 'dlaledma', 'maizur@gmail.com', 'Richmond High School', 2008, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(2, 'mason', 'lee', 'maizur', 'dlaledma', 'maizur@gmail.com', 'Richmond High School', 2008, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(3, 'mason', 'lee', 'maizur', 'dlaledma', 'maizur@gmail.com', 'Richmond High School', 2008, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(4, 'mason', 'lee', 'maizur', 'dlaledma', 'maizur@gmail.com', 'Richmond High School', 2008, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(5, 'Sollip', 'Lim', 'solliplimedited', 'dlaledma', 'sollip.lim@gmail.com', 'Bowness', 2006, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(6, 'alumni_firstname', 'alumni_lastname', 'alumni_username', 'dlaledma', 'test@gmail.com', 'Byrncreek', 2004, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(7, 'memberfirstname', 'memberlastname', 'memberusername', 'dlaledma', 'memberemail@gmail.com', 'Byrncreek', 2004, 'No', 'google.com', '', '', '', 0, '', ''),
(8, 'memberfirstname2', 'memberlastname2', 'memberusername2', 'dllaedma', 'memberemail@gmail.com', 'Bowness', 2012, '', '', '', '', '', 0, '', ''),
(9, 'alumnifirstname', 'alumnilastname', 'alumniusername', '$1$O8T0Kkao$MW//.Vwy0nGjwHbmXH2KW1', 'mason.mideumlee@gmail.com', 'Bowness', 2004, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(10, 'Mideum', 'Lee', 'maizur', '$1$SuRI0Qrc$k3MZt0Cdvluc2Xr7p2Lim1', 'mason.mideumlee@gmail.com', 'Handsworth', 2004, 'no', 'masonlee.me', '', '', '', 0, '', ''),
(11, 'mason', 'lee', 'maizur', '$1$IuZGnjdc$NjrWYt7yHFT84P/J1sz/f1', 'mason.mideumlee@gmail.com', 'Handsworth', 2004, 'no', 'masonlee.me', '', '', '', 0, '', ''),
(12, 'mason', 'lee', 'maizur', '$1$QO2QAXsi$KH5W4ckPekRQgyrGNIoVD0', 'mason.mideumlee@gmail.com', 'Handsworth', 2005, 'no', 'masonlee.me', '', '', '', 0, '', ''),
(13, 'Masontest', 'Leetest', 'maizur', '$1$n0.NWGm4$nozlDobVlFBc/cxQfnQ0I1', 'mason.mideumlee@gmail.com', 'Handsworth', 2005, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(14, 'imagefirstname', 'imagelastname', 'imageusername', '$1$bEM59gkn$ksOIUt3E8EiRaNlNnQknZ1', 'mason.mideumlee@gmail.com', 'Handsworth', 2003, 'no', 'masonlee.me', '', '', '', 0, '', ''),
(15, 'flickerfirstname', 'flickrlastname', 'flickrusername', '$1$Q4c02UiR$YbllBehqdApYVEXfR07JT.', 'flickrtest@gmail.com', 'Argyle secondary school', 2009, 'Passionate about creativity and the creative spirit. Think creatively. Create continuously.', 'www.google.com', 'dovetaildw', 'twitter', '', 0, '', ''),
(16, 'flickerfirstname2', 'flickrlastname2', 'flickrusername2', '$1$lhpHjEaE$rShqoam3LIC0serBr.qsf1', 'flickrtest2@gmail.com', 'Argyle secondary school', 2004, 'Every following project, I worked on website', 'www.flickr.com', 'Dave Schumaker', 'globeandmail', '', 0, '', ''),
(17, 'flickerfirstname3', 'flickrlastname3', 'flickrusername3', '$1$BHTuGVjZ$gng1iyTjmdn2kS8fHdcax1', 'flickrtest3@gmail.com', 'Argyle secondary school', 2004, 'I am professional', 'www.facebook.com', 'masonleetest', 'dr_carmster', '', 0, '', ''),
(18, 'memberusernametest', 'memeberslastname', 'membersfirstname', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Belmont Secondary School', 2003, 'I am a UX Designer living and working in Vancouver, BC.', 'www.dribbble.com', 'guramrit_s', 'Dodgers', '', 0, '', ''),
(19, 'omgfirstname', 'omglastname', 'omgusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Chemainus Secondary School', 2009, 'I am an experience designer', 'stephanietaniguchi.com', 'J Trav', 'elonmusk', '', 0, '', ''),
(20, 'omgfirstname2', 'omglastname2', 'omgusername2', '401b09eab3c013d4ca54922bb802bec8fd5318192b0a75f201d8b3727429', 'mason.mideumlee@gmail.com', 'Chemainus Secondary School', 2013, 'No', 'www.twitter.com', '', '', '', 0, '', ''),
(21, 'omgfirstname3', 'omglastname3', 'omgusername2', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Chemainus Secondary School', 2001, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(22, 'omgfirstname4', 'omglastname4', 'omgusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Chemainus Secondary School', 2003, 'no', 'masonlee.me', '', '', '', 0, '', ''),
(23, 'omgfirstname5', 'omglastname5', 'omgusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Chemainus Secondary School', 2003, 'no', '', '', '', '', 0, '', ''),
(24, 'omgfirstname', 'ofjw', 'omgusername', 'cb7137d7af26eaec0465a066b7ad2a474ecfa72c1054fa2e11081be593c4', 'mason.mideumlee@gmail.com', 'Chemainus Secondary School', 2013, 'No', '', '', '', '', 0, '', ''),
(25, 'omgfirstname', 'omglastname', 'omgusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Montegomery', 2004, 'no', '', '', '', '', 0, '', ''),
(26, 'omgfirstname', 'omglastname', 'omgusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Burnaby North', 2009, 'no', '', '', '', '', 0, '', ''),
(27, 'omgfirstname', 'Lee', 'flickrusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Burnaby North', 2003, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(28, 'Nathan', 'Fox', 'omgusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'maizur@gmail.com', 'Richmond High School', 2003, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(29, 'omgfirstname5', 'omglastname5', 'omgusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Burnaby North', 2003, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(30, 'Sollip', 'Lim', 'omgusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Burnaby North', 2003, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(31, 'Mysoulfirstname', 'Mysouldlastname', 'omgusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Argyle secondary school', 2004, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(32, 'FirstName', 'LastName', 'omgusername', '3967badb39cc6d4b25272e857e763d336b84981c62ef4edea2452a2aa5cf', 'mason.mideumlee@gmail.com', 'Bowness', 2003, 'No', 'masonlee.me', '', '', '', 0, '', ''),
(33, 'Tae', 'Lim', 'sollip.lim', 'cb7137d7af26eaec0465a066b7ad2a474ecfa72c1054fa2e11081be593c4', 'mason.mideumlee@gmail.com', 'Burnaby North', 2009, 'No', 'www.dribbble.com', '', '', '', 0, '', ''),
(34, 'Dongho', 'Lee', 'dongho', 'b262b14625442e49ac6c14ac7ebdcd1e', 'mason.mideumlee@gmail.com', 'Argyle secondary school', 2003, 'I am a UX Designer living and working in Vancouver, BC.', 'masonlee.me', '', '', '', 0, '', ''),
(35, 'Eva', 'Li', 'evali', 'bbdadeb6d3aae1af092469f7d1221123', 'evali@evali.com', 'Handsworth', 2005, 'I am a graphic designer and entrepreneur', 'evali.com', '', '', '', 0, '', ''),
(36, 'Aaron3', 'La Lau3', 'aaronlauedited2', 'b262b14625442e49ac6c14ac7ebdcd1e', 'alalu3@sfu.ca', 'Argyle3 secondary school', 2013, 'I worked at Google?', 'alalu.ca3', 'stevoarnold', 'cnnbrk', '', 0, '', ''),
(37, 'Bambi', 'Ra', 'bambi.ra', 'b262b14625442e49ac6c14ac7ebdcd1e', 'mason.mideumlee@gmail.com', 'Bowness', 2004, 'No', 'www.naver.com', 'alentours & ailleurs', '', '', 0, '', ''),
(38, 'Kate', 'Taniguchi', 'kate', 'b262b14625442e49ac6c14ac7ebdcd1e', 'kate@sfu.ca', 'Richmond High School', 2005, '', '', '', '', '', 0, '', ''),
(39, 'Katie', 'Cha', 'katiecha', 'b262b14625442e49ac6c14ac7ebdcd1e', 'mason.mideumlee@gmail.com', 'Chemainus Secondary School', 2003, 'I am a UX Designer living and working in Vancouver, BC.', 'masonlee.me', '', 'abduzeedo', '', 0, '', ''),
(40, 'Danny', 'Song', 'dannysong', 'b262b14625442e49ac6c14ac7ebdcd1e', 'danisong@sfu.ca', 'Chemainus Secondary School', 2008, 'I have worked for Facebook', 'danisong.com', '', '', '', 0, '', ''),
(41, 'Daniel', 'Ra', 'danielra', 'b262b14625442e49ac6c14ac7ebdcd1e', 'danielra@gmail.com', 'Argyle secondary school', 2003, 'I will work for facebook', 'dnielra.com', '', '', '', 0, '', ''),
(42, 'Shalom', 'Song', 'hellowsong', 'b262b14625442e49ac6c14ac7ebdcd1e', 'danisong@sfu.ca', 'Chemainus Secondary School', 2008, 'I have worked for Facebook', 'danisong.com', '', '', '', 0, '', ''),
(43, 'Shalom', 'shallow', 'hisong', 'b262b14625442e49ac6c14ac7ebdcd1e', 'hisong@sfu.ca', 'Handsworth', 2003, 'Nope', 'hisong.com', '', '', '', 0, '', ''),
(44, 'mina', 'Yu', 'minayou', 'b262b14625442e49ac6c14ac7ebdcd1e', 'minayou@email.com', 'Dankook', 2003, 'I am a mother', 'minayou.com', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visitor_firstname` varchar(30) NOT NULL,
  `visitor_lastname` varchar(30) NOT NULL,
  `visitor_username` varchar(30) NOT NULL,
  `visitor_password` varchar(60) NOT NULL,
  `visitor_email` varchar(320) NOT NULL,
  `visitor_highschool` varchar(100) NOT NULL,
  `visitor_graduationyear` year(4) NOT NULL,
  `visitor_description` text,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_id`, `visitor_firstname`, `visitor_lastname`, `visitor_username`, `visitor_password`, `visitor_email`, `visitor_highschool`, `visitor_graduationyear`, `visitor_description`) VALUES
(30, '', '', '', 'dlaledma', 'mason.mideumlee@gmail.com', '', 0000, ''),
(31, 'Will', 'Wong', 'willwongtwoedited', 'dlaledma', 'will@gmail.com', 'Handsworth', 0000, 'No'),
(32, 'Jason', 'Kid', 'jasonedited', '$1$dJmeEHVQ$Ro46JtJfqwcpqFpH4X1Vd0', 'mason.mideumlee@gmail.com', 'Richmond High School', 2004, 'No'),
(33, 'maon', 'laskdj', 'maizur', 'dlaledma', 'mason.mideumlee@gmail.com', 'Handsworth', 2004, 'no'),
(34, 'testfirstname', 'testlastname', 'dlaledma', 'dlaledma', 'mason.mideumlee@gmail.com', 'Handsworth', 2005, 'asdf'),
(35, 'firstnameman', 'againlastname', 'srecko', 'dlaledma', 'mason.mideumlee@gmail.com', 'Handsworth', 2005, 'No'),
(36, 'Mason', 'Lee', 'myusername', 'dlaledma', 'mason.mideumlee@gmail.com', 'Richmond High School', 2004, 'NONONO'),
(37, 'firstnamechangetest', 'lastnamechangetest', 'usernamechangetest', 'dlaledma', 'mason.mideumlee@gmail.com', 'highschoolchangetest', 1999, 'descriptionchangetest'),
(38, 'Laurie', 'Caldi', 'maizur89', 'dlaledma', 'mason.mideumlee@gmail.com', 'Handsworth', 2020, 'I am an experience designer'),
(39, 'visitorfirstname5', 'visitorlastname5', 'mason.lee', 'dlaledma', 'mason.mideumlee@gmail.com', 'Burnaby North', 2009, ''),
(40, 'Gary2', 'Lam2', 'garylam2', 'b262b14625442e49ac6c14ac7ebdcd1e', 'garylam2@sfu.ca', 'Burnaby2 North', 2008, 'I am too describing'),
(41, 'Cathy', 'Chu', 'cathychu', 'b262b14625442e49ac6c14ac7ebdcd1e', 'mason.mideumlee@gmail.com', 'Bowness', 2003, 'No'),
(42, 'sophie', 'Jeon', 'sophie', 'b262b14625442e49ac6c14ac7ebdcd1e', 'sophie@gmail.com', 'Dankook', 2008, 'No'),
(43, 'siya', 'Ta', 'siyata', 'b262b14625442e49ac6c14ac7ebdcd1e', 'siya@ta.com', 'Surrey Secondary School', 2004, 'No'),
(44, 'siya', 'Ta', 'siat', 'b262b14625442e49ac6c14ac7ebdcd1e', 'mason.mideumlee@gmail.com', 'Surrey Secondary School', 2003, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_to_member`
--

CREATE TABLE `visitor_to_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visitors_visitor_id` int(10) unsigned NOT NULL,
  `members_user_id` int(10) unsigned NOT NULL,
  `time_follow` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_visitor_to_member_visitors1` (`visitors_visitor_id`),
  KEY `fk_visitor_to_member_members1` (`members_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=298 ;

--
-- Dumping data for table `visitor_to_member`
--

INSERT INTO `visitor_to_member` (`id`, `visitors_visitor_id`, `members_user_id`, `time_follow`) VALUES
(167, 31, 6, '2014-02-17 21:55:30'),
(168, 31, 1, '2014-02-17 21:55:30'),
(179, 37, 12, '2014-03-01 05:49:16'),
(181, 31, 8, '2014-03-03 18:49:38'),
(182, 31, 9, '2014-03-04 00:15:02'),
(183, 31, 8, '2014-03-04 00:15:02'),
(185, 35, 5, '2014-03-04 00:16:15'),
(186, 37, 14, '2014-03-07 09:09:30'),
(187, 37, 1, '2014-03-07 09:09:30'),
(188, 37, 7, '2014-03-07 09:09:30'),
(190, 37, 14, '2014-03-07 09:09:50'),
(191, 37, 1, '2014-03-07 09:09:50'),
(192, 37, 7, '2014-03-07 09:09:50'),
(194, 37, 6, '2014-03-07 09:10:00'),
(195, 37, 15, '2014-03-07 09:10:00'),
(196, 37, 7, '2014-03-07 09:10:00'),
(197, 37, 16, '2014-03-07 09:11:27'),
(198, 37, 14, '2014-03-07 09:11:27'),
(199, 37, 11, '2014-03-07 09:11:27'),
(200, 37, 8, '2014-03-07 09:11:27'),
(202, 37, 7, '2014-03-07 09:13:15'),
(215, 37, 15, '2014-03-07 09:16:04'),
(216, 37, 14, '2014-03-07 09:16:04'),
(218, 37, 7, '2014-03-07 09:16:04'),
(219, 37, 8, '2014-03-07 09:16:04'),
(222, 37, 15, '2014-03-07 09:17:02'),
(223, 37, 14, '2014-03-07 09:17:02'),
(225, 37, 7, '2014-03-07 09:17:02'),
(226, 37, 8, '2014-03-07 09:17:02'),
(229, 37, 15, '2014-03-07 09:17:17'),
(230, 37, 14, '2014-03-07 09:17:17'),
(232, 37, 7, '2014-03-07 09:17:17'),
(233, 37, 8, '2014-03-07 09:17:17'),
(236, 37, 15, '2014-03-07 09:17:38'),
(237, 37, 14, '2014-03-07 09:17:38'),
(239, 37, 7, '2014-03-07 09:17:38'),
(240, 37, 8, '2014-03-07 09:17:38'),
(243, 37, 17, '2014-03-07 09:17:54'),
(244, 37, 12, '2014-03-07 09:18:08'),
(246, 37, 7, '2014-03-07 09:18:23'),
(248, 37, 6, '2014-03-07 09:27:58'),
(249, 37, 14, '2014-03-07 09:27:58'),
(251, 37, 9, '2014-03-07 09:28:38'),
(253, 37, 12, '2014-03-07 09:34:09'),
(255, 37, 17, '2014-03-07 09:38:47'),
(256, 37, 14, '2014-03-07 09:38:47'),
(257, 37, 15, '2014-03-07 09:53:47'),
(260, 31, 15, '2014-03-07 09:58:26'),
(261, 31, 1, '2014-03-07 09:58:26'),
(262, 31, 5, '2014-03-07 09:58:26'),
(264, 33, 2, '2014-03-12 18:11:53'),
(265, 33, 5, '2014-03-12 18:11:53'),
(266, 38, 17, '2014-03-14 07:46:26'),
(267, 38, 14, '2014-03-14 07:46:26'),
(268, 36, 17, '2014-03-14 17:54:34'),
(269, 36, 5, '2014-03-14 17:54:34'),
(270, 38, 11, '2014-03-15 04:30:54'),
(271, 38, 5, '2014-03-15 04:30:54'),
(272, 38, 30, '2014-03-15 04:30:54'),
(273, 38, 9, '2014-03-15 04:45:05'),
(274, 38, 6, '2014-03-15 04:45:05'),
(275, 38, 32, '2014-03-15 04:45:05'),
(276, 38, 7, '2014-03-15 05:16:17'),
(277, 38, 7, '2014-03-15 05:17:23'),
(278, 38, 8, '2014-03-15 05:17:23'),
(279, 38, 18, '2014-03-15 05:17:23'),
(280, 38, 10, '2014-03-15 05:17:23'),
(281, 38, 9, '2014-03-15 16:23:50'),
(282, 38, 17, '2014-03-15 16:23:55'),
(283, 38, 6, '2014-03-15 16:55:33'),
(284, 38, 33, '2014-03-15 20:18:40'),
(285, 38, 6, '2014-03-15 20:19:09'),
(286, 39, 6, '2014-03-17 05:27:10'),
(287, 39, 30, '2014-03-17 05:27:26'),
(288, 38, 9, '2014-03-17 19:18:13'),
(290, 42, 16, '2014-03-27 21:05:15'),
(291, 42, 9, '2014-03-27 22:01:39'),
(292, 42, 13, '2014-03-27 22:24:58'),
(294, 40, 6, '2014-03-28 06:25:16'),
(295, 40, 37, '2014-03-28 18:31:37'),
(297, 40, 9, '2014-03-30 19:15:53');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_content`
--
ALTER TABLE `blog_content`
  ADD CONSTRAINT `fk_blog_content_members` FOREIGN KEY (`members_user_id`) REFERENCES `members` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visitor_to_member`
--
ALTER TABLE `visitor_to_member`
  ADD CONSTRAINT `fk_visitor_to_member_members1` FOREIGN KEY (`members_user_id`) REFERENCES `members` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visitor_to_member_visitors1` FOREIGN KEY (`visitors_visitor_id`) REFERENCES `visitors` (`visitor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
