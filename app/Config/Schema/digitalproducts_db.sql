-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2013 at 02:41 AM
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
-- Table structure for table `digi_coupons`
--

CREATE TABLE IF NOT EXISTS `digi_coupons` (
  `coupon_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_quantity` int(11) NOT NULL,
  `coupon_amount` decimal(10,0) NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `coupon_code` varchar(20) COLLATE utf8_bin NOT NULL,
  `coupon_created_date` datetime NOT NULL,
  `coupon_used` int(11) NOT NULL,
  PRIMARY KEY (`coupon_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `digi_customers`
--

CREATE TABLE IF NOT EXISTS `digi_customers` (
  `customer_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `customer_email` varchar(200) COLLATE utf8_bin NOT NULL,
  `customer_purchased_date` datetime NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `digi_images`
--

CREATE TABLE IF NOT EXISTS `digi_images` (
  `image_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `image_height` int(11) NOT NULL,
  `image_width` int(11) NOT NULL,
  `image_url` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `digi_options`
--

CREATE TABLE IF NOT EXISTS `digi_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=627 ;

--
-- Dumping data for table `digi_options`
--

INSERT INTO `digi_options` (`option_id`, `option_name`, `option_value`) VALUES
(612, 'seller_name', 'Truong Ba Phuong'),
(613, 'seller_description', 'Description'),
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
(624, 'frontend_theme', 'frontend theme code'),
(625, 'currency_code', '$'),
(626, 'domain_name', 'localhost');

-- --------------------------------------------------------

--
-- Table structure for table `digi_products`
--

CREATE TABLE IF NOT EXISTS `digi_products` (
  `product_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` longtext COLLATE utf8_bin NOT NULL,
  `product_description` longtext COLLATE utf8_bin NOT NULL,
  `product_price` float NOT NULL,
  `product_image_id` bigint(20) unsigned NOT NULL,
  `product_link` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_image_id` (`product_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `digi_products_purchased`
--

CREATE TABLE IF NOT EXISTS `digi_products_purchased` (
  `product_purchased_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `download_ipaddress` varchar(100) COLLATE utf8_bin NOT NULL,
  `download_token` varchar(100) COLLATE utf8_bin NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `coupon_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`product_purchased_id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`),
  KEY `coupon_id` (`coupon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `digi_themes`
--

CREATE TABLE IF NOT EXISTS `digi_themes` (
  `theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `theme_description` text COLLATE utf8_bin NOT NULL,
  `theme_code` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `digi_tokens`
--

CREATE TABLE IF NOT EXISTS `digi_tokens` (
  `token_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `token_code` varchar(100) COLLATE utf8_bin NOT NULL,
  `token_created_date` datetime NOT NULL,
  PRIMARY KEY (`token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `digi_coupons`
--
ALTER TABLE `digi_coupons`
  ADD CONSTRAINT `digi_coupons_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `digi_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `digi_customers`
--
ALTER TABLE `digi_customers`
  ADD CONSTRAINT `digi_customers_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `digi_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `digi_products`
--
ALTER TABLE `digi_products`
  ADD CONSTRAINT `digi_products_ibfk_1` FOREIGN KEY (`product_image_id`) REFERENCES `digi_images` (`image_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `digi_products_purchased`
--
ALTER TABLE `digi_products_purchased`
  ADD CONSTRAINT `digi_products_purchased_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `digi_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `digi_products_purchased_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `digi_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `digi_products_purchased_ibfk_3` FOREIGN KEY (`coupon_id`) REFERENCES `digi_coupons` (`coupon_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
