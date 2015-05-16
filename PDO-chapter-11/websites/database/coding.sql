-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2015 at 09:42 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `websites`
--

-- --------------------------------------------------------

--
-- Table structure for table `coding`
--

CREATE TABLE IF NOT EXISTS `coding` (
  `image_id` int(3) NOT NULL AUTO_INCREMENT,
  `filename` varchar(150) NOT NULL,
  `caption` text NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `coding`
--

INSERT INTO `coding` (`image_id`, `filename`, `caption`) VALUES
(1, 'html5.png', 'The structural language all websites are made up of. HTML5 is a core technology markup language of the Internet used for structuring and presenting content for the World Wide Web. As of October 2014 this is the final and complete fifth revision of the HTML standard of the World Wide Web Consortium (W3C).'),
(2, 'css3-logo.png', 'The beautifying language all websites are made up of. Cascading Style Sheets (CSS) is a style sheet language used for describing the look and formatting of a document written in a markup language. Most often used to change the style of web pages and user interfaces. Along with HTML and JavaScript, CSS is a cornerstone technology used by most websites to create visually engaging webpages, user interfaces for web applications, and user interfaces for many mobile applications.'),
(3, 'js.png', 'JavaScript, also known as ECMAScript (the untrademarked name used for the standard), is a dynamic programming language. It is most commonly used as part of web browsers, whose implementations allow client-side scripts to interact with the user, control the browser, communicate asynchronously, and alter the document content that is displayed. It is also used in server-side network programming with runtime environments such as Node.js, game development and the creation of desktop and mobile applications.'),
(4, 'PHP-logo.jpg', 'The language all websites use to add dara from a database. This server side language makes websites informative and adds extra information to a website.'),
(5, 'python.jpg', 'Its standard library is made up of many functions that come with Python when it is installed. On the Internet there are many other libraries available that make it possible for the Python language to do more things. These libraries make it a powerful language; it can do many different things.\r\n\r\nSome things that Python is often used for are:\r\n\r\nWeb development\r\nGame programming\r\nDesktop GUIs\r\nScientific programming\r\nNetwork programming.'),
(6, 'ruby_logo.png', 'Ruby is a dynamic, reflective, object-oriented, general-purpose programming language. It supports multiple programming paradigms, including functional, object-oriented, and imperative. It also has a dynamic type system and automatic memory management.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
