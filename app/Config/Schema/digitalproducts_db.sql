-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2013 at 07:00 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `digitalproducts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_quantity` int(11) NOT NULL,
  `coupon_amount` decimal(10,0) NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `coupon_code` varchar(20) COLLATE utf8_bin NOT NULL,
  `coupon_created_date` datetime NOT NULL,
  `coupon_used` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `customer_email` varchar(200) COLLATE utf8_bin NOT NULL,
  `customer_purchased_date` datetime NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'administrators', '2012-07-05 17:16:24', '2012-07-05 17:16:24'),
(2, 'managers', '2012-07-05 17:16:34', '2012-07-05 17:16:34'),
(3, 'users', '2012-07-05 17:16:45', '2012-07-05 17:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `image_height` int(11) NOT NULL,
  `image_width` int(11) NOT NULL,
  `image_url` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(50) NOT NULL DEFAULT '',
  `option_value` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=627 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_name`, `option_value`) VALUES
(612, 'seller_name', 'Truong Ba Phuong'),
(613, 'seller_description', 'Get hands-on with my ideas. Pencil takes care of the lines so you can use your finger to smooth rough edges                                  blend color directly on the page. Good jobs guys!.Testing'),
(614, 'seller_facebook_id', 'facebook id'),
(615, 'seller_twitter_id', 'twitter id'),
(616, 'seller_photo', 'photo id link from table dig_images'),
(617, 'seller_paypal_account', 'paypal account'),
(618, 'seller_password', 'password'),
(619, 'seller_email', 'seller email'),
(620, 'smtp_host', 'smtp host'),
(621, 'smtp_port', 'smtp port'),
(622, 'smtp_password', 'smtp password'),
(623, 'use_php_email', 'check box use php email: yer or no'),
(624, 'frontend_theme', '1'),
(625, 'currency_code', '$'),
(626, 'domain_name', 'localhost');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` longtext COLLATE utf8_bin NOT NULL,
  `product_description` longtext COLLATE utf8_bin NOT NULL,
  `product_price` float NOT NULL,
  `product_image_id` bigint(20) unsigned DEFAULT NULL,
  `product_link` text COLLATE utf8_bin,
  `product_paused` tinyint(1) NOT NULL DEFAULT '0',
  `product_file_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_image_id`, `product_link`, `product_paused`, `product_file_id`) VALUES
(1, 'The Chart of 300 Hand Tools Test Name', '<p>his meticulously organized chart places 300 hand tools into five categories: tools that measure, stabilize, mark, divide and manipulate. 24" x 36"</p>\r\n<p>Pencil is made to make you happy, and we back that up with our return policies. If you''re not pleased, just contact us within 30 days and we will get you a refund or replacement. While we hope it doesn''t come to that, we''ll make it as painless as possible with free return shipping. In addition to the <a href="#">"30-day Satisfaction Guarantee,"</a> Pencil is covered by a limited warranty for a full year.</p>\r\nTest', 45.8, 5, 'test', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_files`
--

CREATE TABLE IF NOT EXISTS `product_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_file_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `product_file_description` varchar(100) COLLATE utf8_bin NOT NULL,
  `product_file_source` varchar(200) COLLATE utf8_bin NOT NULL,
  `product_file_extension` varchar(10) COLLATE utf8_bin NOT NULL,
  `product_file_size` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchased_products`
--

CREATE TABLE IF NOT EXISTS `purchased_products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `download_ipaddress` varchar(100) COLLATE utf8_bin NOT NULL,
  `download_token` varchar(100) COLLATE utf8_bin NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `coupon_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `theme_description` text COLLATE utf8_bin NOT NULL,
  `theme_code` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme_name`, `theme_description`, `theme_code`) VALUES
(1, 'Spring', 'This is theme for Spring', 'spring'),
(2, 'Autumn', 'This is theme for Autumn', 'autumn'),
(3, 'Summer', 'This is theme for Summer', 'summer'),
(4, 'Winter', 'This is theme for Winter', 'winter');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `token_code` varchar(100) COLLATE utf8_bin NOT NULL,
  `token_created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
