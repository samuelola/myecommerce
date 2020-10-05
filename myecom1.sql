-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2020 at 02:52 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myecom1`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_product_id` int(11) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_product_id`) VALUES
(1, 'Sammy Electronics', 39),
(2, 'KV', 37),
(3, 'HW', 34),
(4, 'HW', 36),
(5, 'HW', 38);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'bags'),
(2, 'shoes'),
(3, 'watches'),
(4, 'home accessories'),
(5, 'electrical appliances'),
(14, 'belts');

-- --------------------------------------------------------

--
-- Table structure for table `countdown_time`
--

DROP TABLE IF EXISTS `countdown_time`;
CREATE TABLE IF NOT EXISTS `countdown_time` (
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countdown_time`
--

INSERT INTO `countdown_time` (`time`) VALUES
('12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_transaction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`, `order_date`) VALUES
(1, '7,500', 'h4lv9697x4', 'success', 'NGN', '2020-05-15 20:37:31'),
(2, '301,000', 'ztc6lqwcly', 'success', 'NGN', '2020-05-15 20:41:13'),
(3, '303,500', 'tem3c33gmn', 'success', 'NGN', '2020-05-15 20:43:49'),
(4, '5,000', '1m82tzkyfi', 'success', 'NGN', '2020-05-15 20:44:49'),
(5, '5,500', '05jigjqfxs', 'success', 'NGN', '2020-05-15 20:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_brand_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_brand_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`, `featured`) VALUES
(1, 'Brown leather Bag', 1, 3, 2000, 4, 'This is a brown leather bag with a difference.This is a brown leather bag with a difference.This is a brown leather bag with a difference.This is a brown leather bag with a difference.This is a brown leather bag with a difference.This is a brown leather bag with a difference.This is a brown leather bag with a difference.This is a brown leather bag with a difference.This is a brown leather bag with a difference.This is a brown leather bag with a difference.', 'This is a brown leather bag with a difference.', 'product06.jpg', 'featured'),
(2, 'Silver Fridge', 5, 1, 95000, 2, 'This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.This is a good fridge of standard quality.', 'This is a good fridge of standard quality.', 'fridge.jpg', 'notfeatured'),
(3, 'Brown leather Belt', 14, 2, 1500, 4, 'This is brown leather belt good for use.This is brown leather belt good for use.This is brown leather belt good for use.This is brown leather belt good for use.This is brown leather belt good for use.This is brown leather belt good for use.This is brown leather belt good for use.This is brown leather belt good for use.This is brown leather belt good for use.This is brown leather belt good for use.', 'This is brown leather belt good for use.', 'product08.jpg', 'featured');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating_value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating_value`) VALUES
(1, 5),
(2, 4),
(3, 3),
(4, 2),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_title`, `product_price`, `product_quantity`, `subtotal`) VALUES
(1, 1, 48, 'product1', 24.99, 3, 74.97),
(2, 2, 48, 'product2', 249.99, 1, 249.99),
(3, 1, 49, 'product1', 24.99, 1, 24.99),
(4, 2, 49, 'product2', 249.99, 1, 249.99),
(5, 28, 50, 'wrist watch', 150, 1, 150),
(6, 26, 50, 'brown leather bag', 150.56, 1, 150.56);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_review` text NOT NULL,
  `customer_rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `customer_name`, `customer_email`, `customer_review`, `customer_rating`, `created_at`) VALUES
(11, 3, 'samuel oladele', 'oladelesamuel48@gmail.com', 'This is what i have programmed and its finished for this project.', 1, '2020-05-17 20:20:13'),
(10, 3, 'test2', 'test2@gmail.com', 'This is a wonderful belt', 5, '2020-05-17 19:59:16'),
(8, 2, 'james thomason', 'thomason@gmail.com', 'The product is good', 1, '2020-05-17 18:30:50'),
(9, 2, 'test', 'test@gmail.com', 'ffhfhfhfh', 1, '2020-05-17 19:13:26'),
(7, 2, 'samuel oladele', 'oladelesamuel48@gmail.com', 'I love the fridge', 3, '2020-05-17 18:29:33'),
(12, 3, 'test1', 'test1@gmail.com', 'This is a test.This is a test.This is a test.This is a test.This is a test.This is a test.This is a test.This is a test.', 4, '2020-05-17 20:21:32'),
(13, 1, 'samuel oladele', 'oladelesamuel48@gmail.com', 'This is a wonderful bag, if you try it you would love it.', 5, '2020-05-18 07:57:22'),
(14, 1, 'samuel oladele', 'oladelesamuel48@gmail.com', 'second review', 3, '2020-05-18 08:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_roles` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `user_roles`) VALUES
(1, 1, 'admin'),
(2, 3, 'subscriber'),
(5, 7, 'subscriber'),
(6, 9, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_title` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_title`, `slide_image`) VALUES
(1, 'slide1', 'banner44.jpg'),
(2, 'slide 2', 'store11.jpg'),
(3, 'slide 3', 'banner2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `token`, `firstname`, `lastname`, `images`, `address`, `city`, `country`, `zipcode`, `tel`) VALUES
(1, 'sammy', 'samuel@gmail.com', '$2y$12$rVju0DpuscMe3AXslDWRoOFjWrxLZ5Haama2dMRH6vPrxLPJ2WHoS', NULL, 'samuel', 'oladele', 'images', 'no 16 adepeju street bariga lagos', 'lagos', 'nigeria', '23401', '08067932796'),
(8, 'test4', 'test4@gmail.com', '$2y$12$KrxEqfjr.HYzWTFEVYut9.3JwMRB9ogb2VsxacdfHIkGClC542LU6', NULL, 'test4', 'test4', 'images', 'no 16 adepeju street bariga lagos', 'test1', 'test1', '23401', '1111111111111'),
(3, 'test2', 'test2@gmail.com', '$2y$12$sFjf1DkancUcLEiKaZtb3ufalriDlogo73IW0mZ5phXkgCGky6LpO', NULL, 'test2', 'test2', 'images', 'test2', 'test2', 'test2', '23401', '1111111111111'),
(7, 'test1', 'test1@gmail.com', '$2y$12$QMPCo6gtZNJsOdRfn4n8nORfZjttMLHs4chZxjgUws9aNTLce8wM2', NULL, 'test1', 'test1', 'images', 'no 16 adepeju street bariga lagos', 'test1', 'test1', '23401', '1111111111111'),
(5, 'fagbamila ', 'fagbamila366@gmail.com', '$2y$12$s/JFeF9t8cwx2uLKFstPbeqEwyURurBApHLcFe9R29Ujg2pXL.F9i', NULL, 'mathew', 'oluwamayowa', 'images', '42,shogbamu street bariga ', 'lagos', 'nigeria', '23401', '07063752361'),
(9, 'sammy1', 'oladelesamuel48@gmail.com', '$2y$12$OVwA1nEbbd.TZeXqwvE.puwnhOdBHk1Ivkh1PgReeKCA/1fmyYqNS', '', 'samuel', 'oladele', 'images', 'No 1 king\'s Rd , London,Uk', 'London', 'United Kingdom', '12345', '123456789');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
