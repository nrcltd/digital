-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2013 at 11:21 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `digitalproducts_db`
--
CREATE DATABASE IF NOT EXISTS `digitalproducts_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `digitalproducts_db`;

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
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'administrators', '2013-12-25 17:16:24', '2013-12-25 17:16:24'),
(2, 'users', '2013-12-25 17:16:45', '2013-12-25 17:16:45');

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
-- Table structure for table `instant_payment_notifications`
--

CREATE TABLE IF NOT EXISTS `instant_payment_notifications` (
  `id` char(36) NOT NULL,
  `notify_version` varchar(64) DEFAULT NULL COMMENT 'IPN Version Number',
  `verify_sign` varchar(127) DEFAULT NULL COMMENT 'Encrypted string used to verify the authenticityof the tansaction',
  `test_ipn` int(11) DEFAULT NULL,
  `address_city` varchar(40) DEFAULT NULL COMMENT 'City of customers address',
  `address_country` varchar(64) DEFAULT NULL COMMENT 'Country of customers address',
  `address_country_code` varchar(2) DEFAULT NULL COMMENT 'Two character ISO 3166 country code',
  `address_name` varchar(128) DEFAULT NULL COMMENT 'Name used with address (included when customer provides a Gift address)',
  `address_state` varchar(40) DEFAULT NULL COMMENT 'State of customer address',
  `address_status` varchar(20) DEFAULT NULL COMMENT 'confirmed/unconfirmed',
  `address_street` varchar(200) DEFAULT NULL COMMENT 'Customer''s street address',
  `address_zip` varchar(20) DEFAULT NULL COMMENT 'Zip code of customer''s address',
  `first_name` varchar(64) DEFAULT NULL COMMENT 'Customer''s first name',
  `last_name` varchar(64) DEFAULT NULL COMMENT 'Customer''s last name',
  `payer_business_name` varchar(127) DEFAULT NULL COMMENT 'Customer''s company name, if customer represents a business',
  `payer_email` varchar(127) DEFAULT NULL COMMENT 'Customer''s primary email address. Use this email to provide any credits',
  `payer_id` varchar(13) DEFAULT NULL COMMENT 'Unique customer ID.',
  `payer_status` varchar(20) DEFAULT NULL COMMENT 'verified/unverified',
  `contact_phone` varchar(20) DEFAULT NULL COMMENT 'Customer''s telephone number.',
  `residence_country` varchar(2) DEFAULT NULL COMMENT 'Two-Character ISO 3166 country code',
  `business` varchar(127) DEFAULT NULL COMMENT 'Email address or account ID of the payment recipient (that is, the merchant). Equivalent to the values of receiver_email (If payment is sent to primary account) and business set in the Website Payment HTML.',
  `item_name` varchar(127) DEFAULT NULL COMMENT 'Item name as passed by you, the merchant. Or, if not passed by you, as entered by your customer. If this is a shopping cart transaction, Paypal will append the number of the item (e.g., item_name_1,item_name_2, and so forth).',
  `item_number` varchar(127) DEFAULT NULL COMMENT 'Pass-through variable for you to track purchases. It will get passed back to you at the completion of the payment. If omitted, no variable will be passed back to you.',
  `quantity` varchar(127) DEFAULT NULL COMMENT 'Quantity as entered by your customer or as passed by you, the merchant. If this is a shopping cart transaction, PayPal appends the number of the item (e.g., quantity1,quantity2).',
  `receiver_email` varchar(127) DEFAULT NULL COMMENT 'Primary email address of the payment recipient (that is, the merchant). If the payment is sent to a non-primary email address on your PayPal account, the receiver_email is still your primary email.',
  `receiver_id` varchar(13) DEFAULT NULL COMMENT 'Unique account ID of the payment recipient (i.e., the merchant). This is the same as the recipients referral ID.',
  `custom` varchar(255) DEFAULT NULL COMMENT 'Custom value as passed by you, the merchant. These are pass-through variables that are never presented to your customer.',
  `invoice` varchar(127) DEFAULT NULL COMMENT 'Pass through variable you can use to identify your invoice number for this purchase. If omitted, no variable is passed back.',
  `memo` varchar(255) DEFAULT NULL COMMENT 'Memo as entered by your customer in PayPal Website Payments note field.',
  `option_name1` varchar(64) DEFAULT NULL COMMENT 'Option name 1 as requested by you',
  `option_name2` varchar(64) DEFAULT NULL COMMENT 'Option 2 name as requested by you',
  `option_selection1` varchar(200) DEFAULT NULL COMMENT 'Option 1 choice as entered by your customer',
  `option_selection2` varchar(200) DEFAULT NULL COMMENT 'Option 2 choice as entered by your customer',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `auth_id` varchar(19) DEFAULT NULL COMMENT 'Authorization identification number',
  `auth_exp` varchar(28) DEFAULT NULL COMMENT 'Authorization expiration date and time, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `auth_amount` int(11) DEFAULT NULL COMMENT 'Authorization amount',
  `auth_status` varchar(20) DEFAULT NULL COMMENT 'Status of authorization',
  `num_cart_items` int(11) DEFAULT NULL COMMENT 'If this is a PayPal shopping cart transaction, number of items in the cart',
  `parent_txn_id` varchar(19) DEFAULT NULL COMMENT 'In the case of a refund, reversal, or cancelled reversal, this variable contains the txn_id of the original transaction, while txn_id contains a new ID for the new transaction.',
  `payment_date` varchar(28) DEFAULT NULL COMMENT 'Time/date stamp generated by PayPal, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `payment_status` varchar(20) DEFAULT NULL COMMENT 'Payment status of the payment',
  `payment_type` varchar(10) DEFAULT NULL COMMENT 'echeck/instant',
  `pending_reason` varchar(20) DEFAULT NULL COMMENT 'This variable is only set if payment_status=pending',
  `reason_code` varchar(20) DEFAULT NULL COMMENT 'This variable is only set if payment_status=reversed',
  `remaining_settle` int(11) DEFAULT NULL COMMENT 'Remaining amount that can be captured with Authorization and Capture',
  `shipping_method` varchar(64) DEFAULT NULL COMMENT 'The name of a shipping method from the shipping calculations section of the merchants account profile. The buyer selected the named shipping method for this transaction',
  `shipping` decimal(10,2) DEFAULT NULL COMMENT 'Shipping charges associated with this transaction. Format unsigned, no currency symbol, two decimal places',
  `transaction_entity` varchar(20) DEFAULT NULL COMMENT 'Authorization and capture transaction entity',
  `txn_id` varchar(19) DEFAULT '' COMMENT 'A unique transaction ID generated by PayPal',
  `txn_type` varchar(20) DEFAULT NULL COMMENT 'cart/express_checkout/send-money/virtual-terminal/web-accept',
  `exchange_rate` decimal(10,2) DEFAULT NULL COMMENT 'Exchange rate used if a currency conversion occured',
  `mc_currency` varchar(3) DEFAULT NULL COMMENT 'Three character country code. For payment IPN notifications, this is the currency of the payment, for non-payment subscription IPN notifications, this is the currency of the subscription.',
  `mc_fee` decimal(10,2) DEFAULT NULL COMMENT 'Transaction fee associated with the payment, mc_gross minus mc_fee equals the amount deposited into the receiver_email account. Equivalent to payment_fee for USD payments. If this amount is negative, it signifies a refund or reversal, and either ofthose p',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `payment_fee` decimal(10,2) DEFAULT NULL COMMENT 'USD transaction fee associated with the payment',
  `payment_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full USD amount of the customers payment transaction, before payment_fee is subtracted',
  `settle_amount` decimal(10,2) DEFAULT NULL COMMENT 'Amount that is deposited into the account''s primary balance after a currency conversion',
  `settle_currency` varchar(3) DEFAULT NULL COMMENT 'Currency of settle amount. Three digit currency code',
  `auction_buyer_id` varchar(64) DEFAULT NULL COMMENT 'The customer''s auction ID.',
  `auction_closing_date` varchar(28) DEFAULT NULL COMMENT 'The auction''s close date. In the format: HH:MM:SS DD Mmm YY, YYYY PSD',
  `auction_multi_item` int(11) DEFAULT NULL COMMENT 'The number of items purchased in multi-item auction payments',
  `for_auction` varchar(10) DEFAULT NULL COMMENT 'This is an auction payment - payments made using Pay for eBay Items or Smart Logos - as well as send money/money request payments with the type eBay items or Auction Goods(non-eBay)',
  `subscr_date` varchar(28) DEFAULT NULL COMMENT 'Start date or cancellation date depending on whether txn_type is subcr_signup or subscr_cancel',
  `subscr_effective` varchar(28) DEFAULT NULL COMMENT 'Date when a subscription modification becomes effective',
  `period1` varchar(10) DEFAULT NULL COMMENT '(Optional) Trial subscription interval in days, weeks, months, years (example a 4 day interval is 4 D',
  `period2` varchar(10) DEFAULT NULL COMMENT '(Optional) Trial period',
  `period3` varchar(10) DEFAULT NULL COMMENT 'Regular subscription interval in days, weeks, months, years',
  `amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 1 for USD',
  `amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 2 for USD',
  `amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription  period 1 for USD',
  `mc_amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 1 regardless of currency',
  `mc_amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 2 regardless of currency',
  `mc_amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription period regardless of currency',
  `recurring` varchar(1) DEFAULT NULL COMMENT 'Indicates whether rate recurs (1 is yes, blank is no)',
  `reattempt` varchar(1) DEFAULT NULL COMMENT 'Indicates whether reattempts should occur on payment failure (1 is yes, blank is no)',
  `retry_at` varchar(28) DEFAULT NULL COMMENT 'Date PayPal will retry a failed subscription payment',
  `recur_times` int(11) DEFAULT NULL COMMENT 'The number of payment installations that will occur at the regular rate',
  `username` varchar(64) DEFAULT NULL COMMENT '(Optional) Username generated by PayPal and given to subscriber to access the subscription',
  `password` varchar(24) DEFAULT NULL COMMENT '(Optional) Password generated by PayPal and given to subscriber to access the subscription (Encrypted)',
  `subscr_id` varchar(19) DEFAULT NULL COMMENT 'ID generated by PayPal for the subscriber',
  `case_id` varchar(28) DEFAULT NULL COMMENT 'Case identification number',
  `case_type` varchar(28) DEFAULT NULL COMMENT 'complaint/chargeback',
  `case_creation_date` varchar(28) DEFAULT NULL COMMENT 'Date/Time the case was registered',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `customer_email` varchar(200) COLLATE utf8_bin NOT NULL,
  `purchased_date` datetime NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `orderstatus` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `coupon_code` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=47 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `purchased_date`, `product_id`, `orderstatus`, `coupon_code`) VALUES
(44, 'aa', 'aaaaaaa@a.aa', '2013-12-20 17:13:21', 1, 'Pending', 'deddada'),
(45, 'aaa', 'aaaaaaa@a.aaa', '2013-12-20 17:14:30', 1, 'Pending', 'aaaaaa'),
(46, 'aaa', 'aaaaaaa@a.aa', '2013-12-25 03:19:47', 1, 'Pending', 'deddada');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_items`
--

CREATE TABLE IF NOT EXISTS `paypal_items` (
  `id` varchar(36) NOT NULL,
  `instant_payment_notification_id` varchar(36) NOT NULL,
  `item_name` varchar(127) DEFAULT NULL,
  `item_number` varchar(127) DEFAULT NULL,
  `quantity` varchar(127) DEFAULT NULL,
  `mc_gross` float(10,2) DEFAULT NULL,
  `mc_shipping` float(10,2) DEFAULT NULL,
  `mc_handling` float(10,2) DEFAULT NULL,
  `tax` float(10,2) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `order_id` bigint(20) unsigned NOT NULL,
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
  `order_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token_code`, `token_created_date`, `order_id`) VALUES
(32, '52b46ca116ee09c3ff0f8bfa488e6e2a9b70e38c3639731372eb362d77754d45', '2013-12-20 17:13:21', 44),
(33, '52b46ce646e47c2837e28ce02718b4007786898d410686441a66846368cd69ba', '2013-12-20 17:14:30', 45),
(34, '52ba40c3acce20d8564b8dc49089fcafbec206a71c2a342e6c76cf212f51f2e6', '2013-12-25 03:19:47', 46);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `middle_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `group_id` int(4) DEFAULT '4',
  `is_active` tinyint(1) DEFAULT '1',
  `created_date` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `middle_name`, `last_name`, `group_id`, `is_active`, `created_date`, `timestamp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'truong.ba.phuong@gmail.com', 'Admin', '', '', 1, 1, '2013-12-25 00:00:00', '2013-12-24 15:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
