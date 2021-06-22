-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2021 at 06:52 AM
-- Server version: 8.0.25
-- PHP Version: 7.4.20RC1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fnf`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `bid` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryImage` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `archive` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `categoryName`, `categoryImage`, `status`, `archive`) VALUES
(1, 'Fruit', 'fruit.png', '1', '0'),
(2, 'Vegetables', 'vegetable.png', '1', '0'),
(3, 'Herbs', 'herb.png', '1', '0'),
(4, 'Fungi', 'fungus.png', '1', '0'),
(19, 'Egg', 'egg.png', '1', '0'),
(20, 'test', 'test.png', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `first_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(1, 'Scot', 'Henderson', 'scot.henderson@outlook.com', '0413482763', '6 Yarmouth Parade', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fnfbusiness`
--

CREATE TABLE `fnfbusiness` (
  `business_ID` int NOT NULL,
  `businessName` varchar(40) DEFAULT NULL,
  `businessNameShort` varchar(30) DEFAULT NULL,
  `firstName` varchar(26) DEFAULT NULL,
  `lastName` varchar(26) DEFAULT NULL,
  `contact` varchar(26) DEFAULT NULL,
  `phone1` varchar(12) DEFAULT NULL,
  `phone2` varchar(10) DEFAULT NULL,
  `fax` varchar(10) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `billAddress1` varchar(26) DEFAULT NULL,
  `billAddress2` varchar(24) DEFAULT NULL,
  `Flat` varchar(7) DEFAULT NULL,
  `billStreetNumber` varchar(10) DEFAULT NULL,
  `billStreet` varchar(16) DEFAULT NULL,
  `billStreetType` varchar(6) DEFAULT NULL,
  `billSuburb` varchar(14) DEFAULT NULL,
  `billCity` varchar(8) DEFAULT NULL,
  `billState` varchar(3) DEFAULT NULL,
  `billPostcode` varchar(4) DEFAULT NULL,
  `BillNotes` varchar(33) DEFAULT NULL,
  `deliveryTitle1` varchar(24) DEFAULT NULL,
  `deliveryTitle2` varchar(15) DEFAULT NULL,
  `deliveryStreetNo` varchar(2) DEFAULT NULL,
  `deliveryStreetName` varchar(8) DEFAULT NULL,
  `deliveryStreetType` varchar(6) DEFAULT NULL,
  `deliverySuburb` varchar(14) DEFAULT NULL,
  `deliveryCity` varchar(8) DEFAULT NULL,
  `deliveryState` varchar(3) DEFAULT NULL,
  `deliveryPostcode` varchar(4) DEFAULT NULL,
  `deliveryNotes` varchar(10) DEFAULT NULL,
  `Terms` varchar(2) DEFAULT NULL,
  `Rep` varchar(10) DEFAULT NULL,
  `Tax Code` varchar(10) DEFAULT NULL,
  `Resale Num` varchar(10) DEFAULT NULL,
  `Account No.` varchar(10) DEFAULT NULL,
  `Credit Limit` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



--
-- Table structure for table `fnfcustomer`
--

CREATE TABLE `fnfcustomer` (
  `customer_ID` int NOT NULL,
  `firstName` varchar(16) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `contact` varchar(24) DEFAULT NULL,
  `phone1` varchar(13) DEFAULT NULL,
  `phone2` varchar(12) DEFAULT NULL,
  `fax` varchar(10) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `billAddress1` varchar(28) DEFAULT NULL,
  `billAddress2` varchar(37) DEFAULT NULL,
  `billFlat` varchar(10) DEFAULT NULL,
  `billStreetNumber` varchar(4) DEFAULT NULL,
  `billStreet` varchar(24) DEFAULT NULL,
  `billStreetType` varchar(7) DEFAULT NULL,
  `billSuburb` varchar(14) DEFAULT NULL,
  `billCity` varchar(9) DEFAULT NULL,
  `billState` varchar(5) DEFAULT NULL,
  `billPostcode` varchar(4) DEFAULT NULL,
  `billNotes` varchar(64) DEFAULT NULL,
  `deliveryTitle1` varchar(10) DEFAULT NULL,
  `deliveryTitle2` varchar(10) DEFAULT NULL,
  `deliveryFlat` varchar(10) DEFAULT NULL,
  `DeliveryStreetNo` varchar(10) DEFAULT NULL,
  `DeliveryStreetName` varchar(10) DEFAULT NULL,
  `DeliveryStreetType` varchar(10) DEFAULT NULL,
  `deliverySuburb` varchar(10) DEFAULT NULL,
  `DeliveryCity` varchar(10) DEFAULT NULL,
  `deliveryState` varchar(10) DEFAULT NULL,
  `deliveryPostcode` varchar(10) DEFAULT NULL,
  `deliveryNotes` varchar(10) DEFAULT NULL,
  `Terms` varchar(6) DEFAULT NULL,
  `Rep` varchar(10) DEFAULT NULL,
  `Tax Code` varchar(10) DEFAULT NULL,
  `Resale Num` varchar(10) DEFAULT NULL,
  `Account No.` varchar(10) DEFAULT NULL,
  `Credit Limit` varchar(10) DEFAULT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` enum('Pending','Delivery','Completed','Cancelled') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `ptid` int NOT NULL,
  `quantity` int NOT NULL,
  `price` float(8,2) NOT NULL,
  `uomid` int NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `item_number` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `currency_code` varchar(55) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_response` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productBlurb` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `archive` enum('1','0') NOT NULL DEFAULT '0',
  `cid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `productName`, `productBlurb`, `status`, `archive`, `cid`) VALUES
(1, 'Apple', 'this is a blurb', '1', '0', 1),
(2, 'Banana', 'this is a blurb', '1', '0', 1),
(3, 'Potatoe', 'this is a blurb', '1', '0', 2),
(4, 'Parsley', 'this is a blurb', '1', '0', 3),
(5, 'Pumpkin', 'this is a blurb', '1', '0', 2),
(6, 'Mushroom', 'this is a blurb', '1', '0', 4),
(18, 'Cherry', 'this is a blurb', '1', '0', 1),
(19, 'Chives', 'this is a blurb', '1', '0', 3),
(20, 'Watermelon', 'this is a blurb', '1', '0', 1),
(22, 'Orange', 'Australian', '1', '0', 1),
(23, 'Peaches', 'this is a blurb', '1', '0', 1),
(24, 'Lemon', 'this is a blurb', '1', '0', 1),
(25, 'Pear', 'this is a blurb', '1', '0', 1),
(26, 'Limes', 'this is a blurb', '1', '0', 1),
(27, 'Pineapple Large', 'this is a blurb', '1', '0', 1),
(28, 'Strawberry', 'this is a blurb', '1', '0', 1),
(29, 'Melon', 'this is a blurb', '1', '0', 1),
(32, 'kiwifruit', 'this is a blurb', '1', '0', 1),
(33, 'Celery', 'this is a blurb', '1', '0', 2),
(34, 'Cucumber', 'this is a blurb', '1', '0', 2),
(35, 'Blueberries', 'this is a blurb', '1', '0', 1),
(36, 'Mandarin', 'this is a blurb', '1', '0', 1),
(37, 'Mango', 'this is a blurb', '1', '0', 1),
(38, 'Tomatoe', 'this is a blurb', '1', '0', 1),
(39, 'Avocado', 'this is a blurb', '1', '0', 1),
(40, 'Lychees', 'this is a blurb', '1', '0', 1),
(41, 'Nectarine', 'this is a blurb', '1', '0', 1),
(42, 'Dragonfruit', 'this is a blurb', '1', '0', 1),
(43, 'Berry', 'this is a blurb', '1', '0', 1),
(44, 'Raspberry', 'this is a blurb', '1', '0', 1),
(45, 'Passionfruit', 'this is a blurb', '1', '0', 1),
(46, 'Beetroot', 'this is a blurb', '1', '0', 1),
(47, 'Carrot', 'this is a blurb', '1', '0', 2),
(48, 'Eggs', 'this is a blurb', '1', '0', 19),
(49, 'Test', 'this is a blurb', '1', '0', 20);

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `ptid` int NOT NULL,
  `ptName` varchar(255) NOT NULL,
  `ptImage` varchar(255) NOT NULL,
  `kilo` float(8,2) NOT NULL DEFAULT '0.00',
  `box` float(8,2) NOT NULL DEFAULT '0.00',
  `punnet` float(8,2) NOT NULL DEFAULT '0.00',
  `bunch` float(8,2) NOT NULL DEFAULT '0.00',
  `single` float(8,2) NOT NULL DEFAULT '0.00',
  `ptBlurb` longtext NOT NULL,
  `ptReceipe` longtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `archive` enum('1','0') NOT NULL DEFAULT '0',
  `pid` int NOT NULL,
  `cid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`ptid`, `ptName`, `ptImage`, `kilo`, `box`, `punnet`, `bunch`, `single`, `ptBlurb`, `ptReceipe`, `status`, `archive`, `pid`, `cid`) VALUES
(1, 'Pink Lady', 'apple.png', 7.50, 32.00, 0.00, 0.00, 0.50, 'This is a Blurb to test the length of the text that will be displayed and then we will know if it will not work if it is too long', '', '1', '0', 1, 1),
(2, 'Cavendish', 'banana.png', 2.00, 32.00, 0.00, 0.00, 0.36, 'also avallable in ', '', '1', '0', 2, 1),
(3, 'Granny Smiths', 'greenApple.png', 5.50, 32.00, 0.00, 0.00, 0.50, 'This is a blurb test', '', '1', '0', 1, 1),
(4, 'Royal Gala', 'apple.png', 6.90, 32.00, 0.00, 0.00, 0.50, 'This is a blurb test', '', '1', '0', 1, 1),
(5, 'Large Washed', 'potatoe.png', 2.50, 0.00, 0.00, 0.00, 0.00, 'This is a blurb', '', '1', '0', 3, 2),
(6, 'Desire', 'potatoe.png', 2.50, 0.00, 0.00, 0.00, 0.00, 'This is a blurb', '', '1', '0', 3, 2),
(7, 'Flat Leaved', 'parsley.png', 2.00, 2.00, 2.00, 2.00, 2.00, 'Tall parsley with a robust and bold flavor and aroma. It is more flavored than the other variant called the curly-leaved parsley. It is often cooked with other vegetables and consumed rather than just being used as a garnish. The various examples of this parsley are Gigante Catalongo, Italian Dark Green, Titan and giant of Italy.', '', '1', '0', 4, 3),
(8, 'Curly Leaved', 'parsley.png', 2.00, 2.00, 2.00, 2.00, 2.00, 'This is the simplest parsley to grow on your own. It is commonly available. It is used as a garnish in various Mughlai delicacies. Its thick and dark green leaves are curled in appearance. It finds its major culinary use in garnishing. Few examples of its subtypes are forest green, decorator and the thick green varieties.', '', '1', '0', 4, 3),
(9, 'Hamburg', 'parsley.png', 2.00, 2.00, 2.00, 2.00, 2.00, 'The Hamburg parsley has parsnip-like thick roots which are used as flavoring agents in soups and curries.  They look similar to ferns and thus, are also used as ornamentals in gardens. It is also called the German Parsley. The roots of this parsley can grow as deep as about 8 to 10 inches. It is only available in certain special and ethnic markets.', '', '1', '0', 4, 3),
(10, 'Italian', 'parsley.png', 2.00, 2.00, 2.00, 2.00, 2.00, 'This parsley has leaves which are flat. Its oil content is high. This parsley has a mild flavor of freshness to it. It is often used as a garnish in many delicacies just to add a hint of freshness to them.', '', '1', '0', 4, 3),
(11, 'Common', 'parsley.png', 2.00, 2.00, 2.00, 2.00, 2.00, 'Common parsley is just another name given to the curly parsley due to its abundant presence in the common local markets and grocery stores. Common parsley is just a way to indicate its easy availability.', '', '1', '0', 4, 3),
(14, 'Japanese', 'pumpkin.png', 2.00, 0.00, 0.00, 0.00, 0.00, 'This is a blurb', '', '1', '0', 5, 2),
(15, 'Brushed Sebago', 'potatoe.png', 2.00, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 3, 2),
(16, 'Champignon', 'champignon.png', 20.00, 80.00, 0.00, 0.00, 0.00, 'Button', '', '1', '0', 6, 4),
(17, 'Field', 'champignon.png', 40.00, 80.00, 0.00, 0.00, 0.00, 'Field', '', '1', '0', 6, 4),
(21, 'Black Boy', 'cherry.png', 32.00, 70.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '0', '0', 18, 1),
(23, 'Valencia', 'orange.png', 3.50, 32.00, 0.00, 0.00, 0.50, 'this is a blurb', '', '1', '0', 22, 1),
(24, 'Rockmelon', 'rockmelon.png', 0.00, 32.00, 0.00, 0.00, 2.00, 'this is a blurb', '', '1', '0', 29, 1),
(25, 'Prime', 'watermelon.png', 0.90, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 20, 1),
(26, 'Lemon', 'lemon.png', 2.00, 32.00, 0.00, 0.00, 2.00, 'this is a blurb', '', '1', '0', 24, 1),
(27, 'Anjou', 'anjou.png', 3.90, 32.00, 0.00, 0.00, 0.50, 'this is a blurb', '', '1', '0', 25, 1),
(28, 'Pineapple', 'pineapple.png', 0.00, 32.00, 0.00, 0.00, 3.90, 'this is a blurb', '', '1', '0', 27, 1),
(29, 'Long Conic', 'strawberry.png', 14.00, 0.00, 3.50, 0.00, 0.00, 'this is a blurb', '', '1', '0', 28, 1),
(30, 'Diamante', 'strawberry.png', 0.00, 0.00, 2.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 28, 1),
(32, '', '', 2.00, 2.00, 2.00, 2.00, 2.00, '', '', '1', '0', 0, 0),
(33, '', '', 2.00, 2.00, 2.00, 2.00, 2.00, '', '', '1', '0', 0, 0),
(34, '', '', 2.00, 2.00, 2.00, 2.00, 2.00, '', '', '1', '0', 0, 0),
(35, '', '', 2.00, 2.00, 2.00, 2.00, 2.00, '', '', '1', '0', 0, 0),
(36, 'Fuzzy', 'fuzzy.png', 0.00, 0.00, 0.00, 0.00, 0.70, 'Furry Coat', '', '1', '0', 32, 1),
(37, 'Dulce', 'celery.png', 16.33, 0.00, 0.00, 0.00, 0.00, 'dulce.png', '', '1', '0', 33, 2),
(38, 'Lebanese', 'lebanese.png', 0.00, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', 'Lebanese Pie', '1', '0', 34, 2),
(39, 'Blueray', 'blueberry.png', 20.00, 0.00, 2.50, 0.00, 0.00, 'this is a blurb', '', '1', '0', 35, 1),
(40, 'Seedless', 'mandarin.png', 14.14, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 36, 1),
(41, 'Calypso', '', 0.00, 70.00, 0.00, 0.00, 4.00, 'this is a blurb', '', '1', '0', 37, 1),
(42, 'Truss', 'trussTomatoe.png', 11.00, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 38, 1),
(43, 'Honeydew', 'honeydew.png', 0.00, 0.00, 0.00, 0.00, 2.00, 'this is a blurb', '', '1', '0', 29, 1),
(44, 'Hass', 'avocado.png', 0.00, 38.00, 0.00, 0.00, 1.90, 'this is a blurb', '', '1', '0', 39, 1),
(45, 'Maritius', 'lychees.png', 12.88, 0.00, 0.00, 0.00, 0.30, 'this is a blurb', '', '1', '0', 40, 1),
(46, 'Honey Gold', '', 0.00, 70.00, 0.00, 0.00, 4.00, 'this is a blurb', '', '1', '0', 37, 1),
(47, 'R2-E2', '', 0.00, 0.00, 0.00, 0.00, 4.00, 'this is a blurb', '', '1', '0', 37, 1),
(48, 'Dragonfruit', 'dragonfruit.png', 0.00, 0.00, 0.00, 0.00, 3.50, 'this is a blurb', '', '1', '0', 42, 1),
(49, 'Raspberry', '', 0.00, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', 'Raspberry pie', '1', '0', 43, 1),
(50, 'Tulameen ', 'tulameen.png', 44.00, 0.00, 12.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 44, 1),
(51, 'Purple', '', 0.00, 0.00, 0.00, 0.00, 1.20, 'this is a blurb', '', '1', '0', 45, 1),
(52, 'Yellow', '', 0.00, 0.00, 0.00, 0.00, 1.20, 'this is a blurb', '', '1', '0', 45, 1),
(53, 'Polar Light', '', 2.90, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 41, 1),
(54, 'Panama', '', 0.00, 0.00, 0.00, 0.00, 1.90, 'this is a blurb', '', '1', '0', 45, 1),
(55, 'Blackboy ', '', 3.90, 0.00, 0.00, 0.00, 0.58, 'blackboy.png', '', '1', '0', 23, 1),
(56, 'Vulgaris', '', 3.50, 34.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 46, 1),
(57, 'Pezzetto', '', 0.00, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', 'Tomatoe Pie', '1', '0', 38, 1),
(58, 'Delight', '', 0.00, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', 'Tomatoe Pie', '1', '0', 38, 1),
(59, 'Imperator ', 'imperator.png', 0.00, 0.00, 0.00, 3.50, 0.00, 'this is a blurb', '', '1', '0', 47, 2),
(60, 'Sweet', 'sweetPotato.png', 2.50, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 3, 2),
(61, 'Baby Chat', '', 2.00, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 3, 2),
(62, 'Gold Sweet ', '', 2.00, 0.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 3, 2),
(63, 'Tray of 30', '', 0.00, 0.00, 0.00, 0.00, 8.00, 'this is a blurb', '', '1', '0', 48, 19),
(64, 'Box of 180', '', 0.00, 42.00, 0.00, 0.00, 0.00, 'this is a blurb', '', '1', '0', 48, 19);

-- --------------------------------------------------------

--
-- Table structure for table `product_cost_price`
--

CREATE TABLE `product_cost_price` (
  `pcid` int NOT NULL,
  `ptid` int NOT NULL,
  `uomid` tinyint(1) NOT NULL,
  `cost_price` float(5,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `product_cost_price`
--

INSERT INTO `product_cost_price` (`pcid`, `ptid`, `uomid`, `cost_price`) VALUES
(1, 1, 1, 7.500),
(2, 1, 2, 32.000),
(3, 1, 5, 0.500),
(4, 2, 1, 2.000),
(5, 2, 2, 32.000),
(6, 2, 5, 0.360),
(7, 3, 1, 5.500),
(8, 3, 2, 32.000),
(9, 3, 5, 0.500),
(10, 4, 1, 6.900),
(11, 4, 2, 32.000),
(12, 4, 5, 0.500),
(13, 5, 1, 2.500),
(14, 6, 1, 2.500),
(15, 7, 1, 2.000),
(16, 7, 2, 2.000),
(17, 7, 1, 3.000),
(18, 7, 4, 2.000),
(19, 7, 5, 2.000),
(20, 8, 1, 2.000),
(21, 8, 2, 2.000),
(22, 8, 1, 3.000),
(23, 8, 4, 2.000),
(24, 8, 5, 2.000),
(25, 9, 1, 2.000),
(26, 9, 2, 2.000),
(27, 9, 1, 3.000),
(28, 9, 4, 2.000),
(29, 9, 5, 2.000),
(30, 10, 1, 2.000),
(31, 10, 2, 2.000),
(32, 10, 1, 3.000),
(33, 10, 4, 2.000),
(34, 10, 5, 2.000),
(35, 11, 1, 2.000),
(36, 11, 2, 2.000),
(37, 11, 1, 3.000),
(38, 11, 4, 2.000),
(39, 11, 5, 2.000),
(40, 14, 1, 2.000),
(41, 15, 1, 2.000),
(42, 16, 1, 20.000),
(43, 16, 2, 80.000),
(44, 17, 1, 40.000),
(45, 17, 2, 80.000),
(46, 21, 1, 32.000),
(47, 21, 2, 70.000),
(48, 23, 1, 3.500),
(49, 23, 2, 32.000),
(50, 23, 5, 0.500),
(51, 24, 2, 32.000),
(52, 24, 5, 2.000),
(53, 25, 1, 0.900),
(54, 26, 1, 2.000),
(55, 26, 2, 32.000),
(56, 26, 5, 2.000),
(57, 27, 1, 3.900),
(58, 27, 2, 32.000),
(59, 27, 5, 0.500),
(60, 28, 2, 32.000),
(61, 28, 5, 3.900),
(62, 29, 1, 14.000),
(63, 29, 1, 3.000),
(64, 30, 1, 3.000),
(65, 32, 1, 2.000),
(66, 32, 2, 2.000),
(67, 32, 1, 3.000),
(68, 32, 4, 2.000),
(69, 32, 5, 2.000),
(70, 33, 1, 2.000),
(71, 33, 2, 2.000),
(72, 33, 1, 3.000),
(73, 33, 4, 2.000),
(74, 33, 5, 2.000),
(75, 34, 1, 2.000),
(76, 34, 2, 2.000),
(77, 34, 1, 3.000),
(78, 34, 4, 2.000),
(79, 34, 5, 2.000),
(80, 35, 1, 2.000),
(81, 35, 2, 2.000),
(82, 35, 1, 3.000),
(83, 35, 4, 2.000),
(84, 35, 5, 2.000),
(85, 36, 5, 0.700),
(86, 37, 1, 16.330),
(87, 39, 1, 20.000),
(88, 39, 1, 3.000),
(89, 40, 1, 14.140),
(90, 41, 2, 70.000),
(91, 41, 5, 4.000),
(92, 42, 1, 11.000),
(93, 43, 5, 2.000),
(94, 44, 2, 38.000),
(95, 44, 5, 1.900),
(96, 45, 1, 12.880),
(97, 45, 5, 0.300),
(98, 46, 2, 70.000),
(99, 46, 5, 4.000),
(100, 47, 5, 4.000),
(101, 48, 5, 3.500),
(102, 50, 1, 44.000),
(103, 50, 1, 3.000),
(104, 51, 5, 1.200),
(105, 52, 5, 1.200),
(106, 53, 1, 2.900),
(107, 54, 5, 1.900),
(108, 55, 1, 3.900),
(109, 55, 5, 0.580),
(110, 56, 1, 3.500),
(111, 56, 2, 34.000),
(112, 59, 4, 3.500),
(113, 60, 1, 2.500),
(114, 61, 1, 2.000),
(115, 62, 1, 2.000),
(116, 63, 5, 8.000),
(117, 64, 2, 42.000);

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `sid` int NOT NULL,
  `specialTitle` varchar(255) NOT NULL,
  `specialBlurb` varchar(255) NOT NULL,
  `specialImage` varchar(255) NOT NULL,
  `ptid` int NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`sid`, `specialTitle`, `specialBlurb`, `specialImage`, `ptid`, `active`) VALUES
(1, 'Pink ladies', 'this is a blurb', 'apple.png', 1, '1'),
(2, 'Banana', 'this is a blurb', 'banana.png', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sid` int NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `supplierPhone` int NOT NULL,
  `supplierAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sid`, `supplierName`, `supplierPhone`, `supplierAddress`) VALUES
(1, 'Tamworth farm 1', 12345678, '1 trip lane');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `uomid` tinyint(1) NOT NULL,
  `uomName` varchar(255) NOT NULL,
  `uomShort` varchar(255) NOT NULL,
  `uomLong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`uomid`, `uomName`, `uomShort`, `uomLong`) VALUES
(1, 'Kilogram', 'kg', 'kilo'),
(2, 'Box', 'Box', 'Box'),
(3, 'Punnet', 'Punnet', 'Punnet'),
(4, 'Bunch', 'Bunch', 'Bunch'),
(5, 'Single', 'Single', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `access` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fName`, `lName`, `email`, `username`, `password`, `comment`, `access`) VALUES
(1, '', '', 'scot.henderson@outlook.com', 'scot', '1234', '', 1),
(2, '', '', 'slim@fastnfreshproduce.com.au', '', '1234', '', 0),
(3, '', '', 'kate@fastnfreshproduce.com.au', '', '1234', '', 0),
(4, '', '', 'admin@fastnfreshproduce.com.au', '', 'admin', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int NOT NULL,
  `oauth_provider` enum('facebook','google','twitter','') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `oauth_uid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `active` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnfbusiness`
--
ALTER TABLE `fnfbusiness`
  ADD PRIMARY KEY (`business_ID`);

--
-- Indexes for table `fnfcustomer`
--
ALTER TABLE `fnfcustomer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`ptid`);

--
-- Indexes for table `product_cost_price`
--
ALTER TABLE `product_cost_price`
  ADD PRIMARY KEY (`pcid`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`uomid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `bid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product_cost_price`
--
ALTER TABLE `product_cost_price`
  MODIFY `pcid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `special`
--
ALTER TABLE `special`
  MODIFY `sid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `uomid` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
