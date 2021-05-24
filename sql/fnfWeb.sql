-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 11:15 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ffp`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `bid` int(13) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(13) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryImage` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `archive` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `business_ID` int(13) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fnfbusiness`
--

INSERT INTO `fnfbusiness` (`business_ID`, `businessName`, `businessNameShort`, `firstName`, `lastName`, `contact`, `phone1`, `phone2`, `fax`, `email`, `billAddress1`, `billAddress2`, `Flat`, `billStreetNumber`, `billStreet`, `billStreetType`, `billSuburb`, `billCity`, `billState`, `billPostcode`, `BillNotes`, `deliveryTitle1`, `deliveryTitle2`, `deliveryStreetNo`, `deliveryStreetName`, `deliveryStreetType`, `deliverySuburb`, `deliveryCity`, `deliveryState`, `deliveryPostcode`, `deliveryNotes`, `Terms`, `Rep`, `Tax Code`, `Resale Num`, `Account No.`, `Credit Limit`) VALUES
(1, 'Advanced Catering', 'Advanced Catering', 'Cindy', 'Cindy', 'Cindy', '', '', '', '', 'Advanced Catering', 'Tafe Canteen', '', '', '', '', '', '', 'NSW', '', '', 'Advanced Catering', 'Tafe Canteen', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(2, 'Baba Ks', 'Baba Ks', 'Baba Ks', 'Baba Ks', 'Baba Ks', '', '', '', '', 'Baba Ks', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(3, 'Barnes St Takeaway', 'Barnes St Takeaway', 'Barnes St Takeaway', 'Barnes St Takeaway', 'Barnes St Takeaway', '', '', '', '', 'Barnes St Takeaway', 'Kath & Kim', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(4, 'Bendermeer Pub', 'Bendermeer Pub', 'Bendermeer Pub', 'Bendermeer Pub', 'Bendermeer Pub', '', '', '', 'michelle@jmgmaintenance.com.au', 'Bendermeer Pub', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(5, 'Black Barrel', 'Black Barrel', 'Black Barrel', 'Black Barrel', 'Black Barrel', '', '', '', '', 'Black Barrel', '', '', '', '', '', '', '', 'NSW', '', '', 'Black Barrel', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(6, 'Calrossy', 'Calrossy', 'Calrossy', 'Calrossy', 'Calrossy', '', '', '', 'finance@calrossy.nsw.edu.au', 'Calrossy Anglican School', '', '', '', '', '', '', '', 'NSW', '', '', 'Calrossy Anglican School', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(7, 'Caltex Werris Creek', 'Caltex Werris Creek', 'Caltex Werris Creek', 'Caltex Werris Creek', 'Caltex Werris Creek', '', '', '', '', 'Caltex Werris Creek', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(8, 'Cheeky Butcher', 'Cheeky Butcher', 'Cheeky', 'Butcher', 'Cheeky Butcher', '0428 019 901', '', '', 'kooliack@bigpond.com', 'Cheeky Butcher', '', '', '114', 'Manilla', 'Street', 'Manilla', '', 'NSW', '', '', '', '', '', '', '', 'Manilla', '', 'NSW', '', '', '', '', '', '', '', ''),
(9, 'COD', 'COD', 'COD', 'COD', 'COD', '', '', '', 'holistically.you@outlook.com', 'METRO', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(10, 'Connors by Coreys', 'Connors by Coreys', 'Connors by Coreys', 'Connors by Coreys', 'Connors by Coreys', '', '', '', 'info@coreyscatering.com.au', 'Connors by Corey', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(11, 'Coreys Catering 2020', 'Coreys Catering 2021', 'Corey\'s', 'Catering', 'Corey\'s Catering', '', '', '', 'info@coreyscatering.com.au', 'Coreys Catering', 'ALEK CANTEEN/COFFEE SHOP', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(12, 'Currabubula Pub', 'Currabubula Pub', 'Kathy', 'Smith', 'Currabubula Pub', '407928922', '', '', 'pubandcafe@currabubula.com.au', 'Currabubula Pub', 'Kathy Smith', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(13, 'Da Nanna\'s Fish n Chips', 'Da Nanna\'s Fish n Chips', 'Lorel', 'Lorel', 'Lorel', '', '', '', 'lozwernhard6@gmail.com', 'Da Nanna\'s Fish n Chips', '', '', '', 'Robert', 'Street', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(14, 'Doing it for our Farmers', 'Doing it for our Farmers', 'Sue-Ellen', 'Wilkin', 'Sue-Ellen Wilkin', '', '', '', 'tamworthcity.uca@gmail.com', 'Sue-Ellen Wilkin', 'Doing it for Our Farmers', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(15, 'Duri Fuel', 'Duri Fuel', 'Duri Fuel', 'Duri Fuel', 'Duri Fuel', '', '', '', '', 'Duri Fuel', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(16, 'Expresso Coffee and Kebabs', 'Expresso Coffee and Kebabs', 'Expresso Coffee and Kebabs', 'Expresso Coffee and Kebabs', 'Expresso Coffee and Kebabs', '', '', '', '', 'Expresso Coffee and Kebabs', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(17, 'Fonzies Cafe Quirindi', 'Fonzies Cafe Quirindi', 'Fonzies Cafe Quirindi', 'Fonzies Cafe Quirindi', 'Fonzies Cafe Quirindi', '', '', '', '', 'Fonzies Cafe Quirindi', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(18, 'Frans Fresh Food', 'Frans Fresh Food', 'Fran', 'Fran', 'Fran', '', '', '', '', 'Frans Fresh food', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(19, 'Goldmine Cafe', 'Goldmine Cafe', 'Goldmine Cafe', 'Goldmine Cafe', 'Goldmine Cafe', '', '', '', '', 'Goldmine Cafe', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(20, 'Grab n Gobble', 'Grab n Gobble', 'Grab n Gobble', 'Grab n Gobble', 'Grab n Gobble', '', '', '', '', 'Grab n Gobble', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(21, 'Hissy Fits Cafe', 'Hissy Fits Cafe', 'Hissy Fits Cafe', 'Hissy Fits Cafe', 'Jordan', '', '', '', 'hissyfitscafe@gmail.com', 'Hissy Fits Cafe', '', '', '', 'Peel', 'Street', '', '', 'NSW', '', '', 'Hissy Fits Cafe', '', '', 'Peel', 'Street', '', '', 'NSW', '2340', '', '30', '', '', '', '', ''),
(22, 'Home Delivery', 'Home Delivery', 'Home Delivery', 'Home Delivery', 'Home Delivery', '', '', '', 'joshandjoannemorris@bigpond.com', 'Paula Pauling', '', '', '55', ' Cockburn Valley', 'Road', 'Kootingal', '', 'NSW', '', '', '', '', '', '', '', 'Kootingal', '', 'NSW', '', '', '15', '', '', '', '', ''),
(23, 'Hopscotch Cafe Tamworth', 'Hopscotch Cafe', 'Hopscotch Cafe', 'Hopscotch Cafe', 'Hopscotch Cafe', '', '', '', '', 'Hopscotch Resturant & Bar', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(24, 'Hopscotch Tamworth NEW', 'Hopscotch Tamworth NEW', 'Jye', 'Segboer', 'Jye Segboer', '67668422', '', '', '', 'Hoppscotch', 'Jye Segboer', '', '', '', '', '', 'Tamworth', 'NSW', '2340', 'Corner of Kable ave & Hill Street', '', '', '', '', '', '', 'Tamworth', 'NSW', '', '', '', '', '', '', '', ''),
(25, 'Hospital Cafe', 'H.S Caterer', 'H.S Caterer', 'H.S Caterer', 'H.S Caterer', '403476222', '', '', '', 'H.S Caterer', '', '', '', '', '', '', '', 'NSW', '', '403476222', 'H.S Caterer', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(26, 'HS Styman', 'HS Styman', 'Russell & Isabell', 'Styman', 'Russell & Isabell Styman', '0407 293 181', '', '', '', 'Russell & Isabell Styman', '', '', '50', 'Denison', 'Street', 'West Tamworth', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', 'West Tamworth', 'Tamworth', 'NSW', '', '', '', '', '', '', '', ''),
(27, 'HSD Jenkins', 'HSD Jenkins', 'Scott', 'Jenkins', 'Scott Jenkins', '0488 442 005', '', '', '', 'Scott Jenkins', '', '', '9', 'Underwood', 'Street', 'Qurindi', '', 'NSW', '2340', '', '', '', '', '', '', 'Qurindi', '', 'NSW', '', '', '', '', '', '', '', ''),
(28, 'Hungry Possum Catering', 'Hungry Possum Catering', 'Hungry Possum Catering', 'Hungry Possum Catering', 'Hungry Possum Catering', '', '', '', 'admin@hungrypossum.com.au', 'Hungry Possum Catering', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(29, 'IBIS STYLES Tamworth', 'IBIS STYLES Tamworth', 'IBIS STYLES Tamworth', 'IBIS STYLES Tamworth', 'Luke', '', '', '', 'Cairns@sundarjeebros.com.au', 'IBIS STYLES Tamworth', '', '', '', '', '', '', '', 'NSW', '', '', 'IBIS STYLES Tamworth', '', '', '', '', '', '', 'NSW', '', '', '30', '', '', '', '', ''),
(30, 'IPAR', 'IPAR', 'Melissa', 'Butler', 'Melissa Butler', '', '', '', 'apaccounts@ipar.com.au', 'IPAR', 'Melissa Butler', '', '2/1 A', 'Bligh', 'Street', '', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', '', 'Tamworth', 'NSW', '', '', '15', '', '', '', '', ''),
(31, 'Ispa DD', 'Ispa DD', 'Ispa DD', 'Ispa DD', 'Ispa DD', '', '', '', '', 'Ispa DD Cpoint', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(32, 'ISPA Kebabs', 'ISPA Kebabs', 'ISPA Kebabs', 'ISPA Kebabs', 'ISPA Kebabs', '', '', '', '', 'ISPA Kebabs', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(33, 'Jade Phoenix Chinese Resturant', 'Jade Phoenix Chinese Resturant', 'Anna', 'Linton', 'Anna Linton', '', '', '', '', 'Jade Phoenix', 'Chinese Resturant', '', '', '', '', 'Kootingal', '', 'NSW', '', '', '', '', '', '', '', 'Kootingal', '', 'NSW', '', '', '', '', '', '', '', ''),
(34, 'JJ\'s Kebabs Rachel', 'JJ\'s Kebabs', 'Rachel', 'Rachel', 'Rachel', '', '', '', '', 'JJ\'s Kebabs', '', 'Shop 1B', '306', 'Goonoo Goonoo', 'Road', 'South Tamworth', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', 'South Tamworth', 'Tamworth', 'NSW', '', '', '', '', '', '', '', ''),
(35, 'JJs Pizza and Kebabs', 'JJs Pizza n Kebabs', 'JJs Pizza n Kebabs', 'JJs Pizza n Kebabs', 'JJs Pizza n Kebabs', '', '', '', 'jjkebabs@hotmail.com', 'JJs Pizza n Kebabs', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(36, 'Joe Maguires Pub', 'Joe Maguires Pub', 'Joe Maguires Pub', 'Joe Maguires Pub', 'Joe Maguires Pub', '', '', '', 'joemaguires@lightyear.cloud', 'Joe Maguires Pub', '', '', '146 - 148 ', 'Peel', 'Street', '', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', '', 'Tamworth', 'NSW', '', '', '15', '', '', '', '', ''),
(37, 'Joe Mcguires', 'Joe Mcguires', 'Joe Mcguires', 'Joe Mcguires', 'Joe Mcguires', '', '', '', '', 'Joe Mcguires', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(38, 'kay and Jim', 'kay and Jim', 'Kay & Jim', 'Kay & Jim', 'Kay & Jim', '', '', '', '', 'Kay & Jim', '', '', '', '', '', 'Kootingal', '', 'NSW', '', '', '', '', '', '', '', 'Kootingal', '', 'NSW', '', '', '', '', '', '', '', ''),
(39, 'Kelly Booby', 'Kelly Booby', 'Kelly', 'Booby', 'Kelly Booby', '', '', '', '', 'Kelly Booby', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(40, 'Kootingal Butchers', 'Kootingal Butchers', 'Mitch', 'Dines', 'Mitch Dines', '', '', '', '', 'Kootingal Butchers', 'Mitch Dines', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(41, 'Kootingal Hotel', 'Kootingal Hotel', 'Andrew', 'Yeo', 'Andrew Yeo', '', '', '', 'andrew@kootingalhotel.com.au', 'Kootingal Hotel', 'Andrew Yeo', '', '20', 'Gate', 'Street', 'Kootingal', '', 'NSW', '', 'home', '', '', '', '', '', 'Kootingal', '', 'NSW', '', '', '', '', '', '', '', ''),
(42, 'Lucky Wok', 'Lucky Wok', 'Lucky Wok', 'Lucky Wok', 'Lucky Wok', '', '', '', ' rainie520125@gmail.com', 'Lucky Wok', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(43, 'MBC T,s Canteen', 'MBC Canteen Account', 'MBC Canteen Account', 'MBC Canteen Account', 'Mary', '', '', '', 'mbccatering@gmail.com', 'MBC Canteen Account', '', '', '', '', '', '', '', 'NSW', '', '', 'MBC Canteen Account', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(44, 'McKay Nursing Home', 'McKay Nursing Home', 'McKay Nursing Home', 'McKay Nursing Home', 'McKay Nursing Home', '', '', '', '', 'McKay Nursing Home', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(45, 'McWilliams Meats', 'McWilliams Meats', 'McWilliams Meats', 'McWilliams Meats', 'McWilliams Meats', '', '', '', '', 'McWilliams Meats', '', '', '', '', '', 'Calala', '', 'NSW', '', '', '', '', '', '', '', 'Calala', '', 'NSW', '', '', '', '', '', '', '', ''),
(46, 'Megabites', 'Megabites', 'Megabites', 'Megabites', 'Megabites', '', '', '', '', 'Megabites', '', '', '', '', '', '', '', 'NSW', '', '', 'Megabites', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(47, 'My Thia', 'My Thia', 'My Thia', 'My Thia', 'My Thia', '', '', '', '', 'My Thai', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(48, 'Nemingha Tavern', 'Nemingha Tavern', 'Jeff', 'Hardcastle', 'Jeff Hardcastle', '', '', '', 'jeffryhardcastle22284@gmail.com', 'Nemingha Tavern', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '30', '', '', '', '', ''),
(49, 'Nicole Winner', 'Nicole Winner', 'Nicole', 'Winner', 'Nicole Winner', '', '', '', '', 'Nicole Winner', '', '', '75', 'White', 'Street', 'East Tamworth', '', 'NSW', '', '', '', '', '', '', '', 'East Tamworth', '', 'NSW', '', '', '', '', '', '', '', ''),
(50, 'Nourish Cafe 360 gym', 'Nourish Cafe 360 Gym', 'Nourish Cafe 360 Gym', 'Nourish Cafe 360 Gym', 'Nourish Cafe 360 Gym', '', '', '', '', 'Nourish Cafe 360 Gym', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(51, 'NTB', 'North Tam Bowling Club', 'North Tam Bowling Club', 'North Tam Bowling Club', 'North Tam Bowling Club', '', '', '', '', 'North Tam Bowling Club', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(52, 'Nundle Fuel & Cafe', 'Nundle Fuel & Cafe', 'Janelle', 'Janelle', 'Janelle', '67693030', '', '', 'janellebrown2340@outlook.com', 'Nundle Fuel & Cafe', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(53, 'Nundle Peel Inn', 'Nundle Peel Inn', 'Nundle Peel Inn', 'Nundle Peel Inn', 'Nundle Peel Inn', '', '', '', 'contact@peelinn.com.au', 'Nundle Peel Inn', '', '', '89', 'Jenkins', 'Street', 'Nundle', '', 'NSW', '', '', 'Nundle Peel Inn', '', '89', 'Jenkins', 'Street', 'Nundle', '', 'NSW', '', '', '30', '', '', '', '', ''),
(54, 'Nundle School Canteen', 'Nundle School Canteen', 'Danielle', 'Douglas', 'Danielle Douglas', '0417 466 400', '', '', '', 'Nundle School Canteen', 'Danielle Douglas', '', '', '', '', '', '', 'NSW', '', 'Call when at gate', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(55, 'Paddock To Plate Butchery', 'Paddock to Plate Butchery', 'Paddock to Plate Butchery', 'Paddock to Plate Butchery', 'Paddock to Plate Butchery', '', '', '', '', 'Paddock to Plate Butchery', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(56, 'Papa Luigis', 'Papa Luigis', 'Johanna', 'Johanna', 'Johanna', '0478 173 619', '', '', 'johannahemara@gmail.com', 'Papa Luigis', 'Johanna', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(57, 'Peach Blossom Chinese Resturant Quirindi', 'Peach Blossom', 'Peach Blossom', 'Peach Blossom', 'Peach Blossom', '', '', '', '', 'Peach Blossom', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(58, 'Penrose Meats', 'Penrose Meats', 'Penrose Meats', 'Penrose Meats', 'Penrose Meats', '', '', '', '', 'Penrose Meats', 'K-Mart Plaza', '', '', '', '', '', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', '', 'Tamworth', 'NSW', '', '', '15', '', '', '', '', ''),
(59, 'Pickles n Tea', 'Pickles n Tea', 'Pickles n Tea', 'Pickles n Tea', 'Pickles n Tea', '', '', '', '', 'Pickles n Tea', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(60, 'Pie Central', 'Pie Central', 'Karen', 'Karen', 'Karen', '', '', '', '', 'Pie Central', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(61, 'Plukas on Peel', 'Plukas on Peel', 'Plukas on Peel', 'Plukas on Peel', 'Plukas on Peel', '', '', '', '', 'Plukas', '', '', '', 'Peel', 'Street', '', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', '', 'Tamworth', 'NSW', '', '', '', '', '', '', '', ''),
(62, 'Presto Pizza', 'Presto Pizza', 'Paul', 'Paul', 'Paul', '67627277', '', '', '', 'Presto Pizza', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(63, 'Quality Hotel Powerhouse', 'Quality Hotel powerhouse', 'Quality Hotel powerhouse', 'Quality Hotel powerhouse', 'Quality Hotel powerhouse', '', '', '', 'accountspayable_powerhousehotels@evt.com', 'Quality Hotel powerhouse', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(64, 'Quiridi Bakery', 'Quirindi Bakery', 'Quirindi Bakery', 'Quirindi Bakery', 'Quirindi Bakery', '', '', '', '', 'Quirindi Bakery', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(65, 'Red Hill', 'Red Hill Hospitality', 'Red Hill Hospitality', 'Red Hill Hospitality', 'Red Hill Hospitality', '', '', '', '', 'Red Hill Hospitality', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(66, 'Red Rooster', 'Red Rooster', 'Tony', 'Bishop', 'Tony Bishop', '67664776', '', '', '', 'Red Rooster', 'Tony Bishop', '', '', 'PO Box 1942', '', '', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', '', 'Tamworth', 'NSW', '', '', '', '', '', '', '', ''),
(67, 'Retro Cafe', 'Retro Cafe', 'Retro Cafe', 'Retro Cafe', 'Retro Cafe', '', '', '', '', 'Retro Cafe & Store', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(68, 'Rex Motors', 'Rex Motors', 'Rex Motors', 'Rex Motors', 'Rex Motors', '', '', '', '', 'Duri Service Station', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(69, 'Scott Kelly', 'Scott Kelly', 'Scott', 'Kelly', 'Scott Kelly', '', '', '', '', 'Scott Kelly', '', '', '', '', '', 'Quirindi', '', 'NSW', '', '', '', '', '', '', '', 'Quirindi', '', 'NSW', '', '', '', '', '', '', '', ''),
(70, 'Scream IceCream', 'Scream Icecream', 'nic n Kate', 'nic n Kate', 'nic n Kate', '', '', '', '', 'Scream Icecream', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(71, 'Slade Transport', 'Slade Transport', 'Slade Transport', 'Slade Transport', 'Slade Transport', '', '', '', 'bookings@sladetransport.com.au', 'Slade Transport', '', '', '', '', '', '', '', 'NSW', '', '', 'Slade Transport', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(72, 'South Bowling Club', 'South Tam Bowling Club', 'Tim', 'Sayner', 'Tim Sayner', '', '', '', 'club@southbowlotamworth.com.au', 'South Tam Bowling Club', '', '', '11', 'Margaret', 'Street', '', 'Tamworth', 'NSW', '2340', '', 'South Tam Bowling Club', '', '11', 'Margaret', 'Street', '', 'Tamworth', 'NSW', '', '', '', '', '', '', '', ''),
(73, 'Southgate Inn Mitch', 'Southgate Inn', 'Southgate Inn', 'Southgate Inn', 'Southgate Inn', '', '', '', 'admin@thepub.com.au', 'Southgate Inn', '', '', '16a', 'Kent', 'Street', '', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', '', 'Tamworth', 'NSW', '', '', '', '', '', '', '', ''),
(74, 'Square Man Inn', 'Square Man Inn', 'Square Man Inn', 'Square Man Inn', 'Rob Breese', '', '', '', '', 'Square Man Inn', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(75, 'SSS Tamworth', 'SSS Tamworrth', 'SSS Tamworrth', 'SSS Tamworrth', 'SSS Tamworrth', '', '', '', 'jjb.99@bigpond.com', 'SSS Tamworth', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(76, 'Streater Family Butcher', 'Streater Family Butcher', 'Brett', 'Streater', 'Brett Streater', '0429 976 966', '', '', 'streaterbutchery@bigpond.com', 'Brett Streater', 'Streater Family Butcher', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(77, 'Sugar Plum', 'Sugar Plum', 'Sugar Plum', 'Sugar Plum', 'Sugar Plum', '', '', '', 'challengertrading2343@gmail.com', 'Sugar Plum', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(78, 'Summers Westdale', 'Summers Westdale', 'Nick', 'Summers', 'Nick Summers', '', '', '', '', 'Summers Westdale/Oxleyvale', '', '', '', '', '', '', '', 'NSW', '', '', 'Summers Westdale', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(79, 'Tamworth Hotel', 'Tamworth Hotel', 'Tamworth Hotel', 'Tamworth Hotel', 'Tamworth Hotel', '', '', '', 'thetamworth@lightyear.cloud', 'Tamworth Hotel', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(80, 'Tamworth Rotary Club', 'Tam Rotoray Club', 'Gordan ', 'Austin', 'Gordan Austin', '', '', '', '', 'Tam Rotoray Club', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(81, 'Tamworth TAFE nsw', 'Tafe, Futures\'', 'Donna', 'O,Malley', 'Donna O,Malley', '', '', '', 'donna.omalley3@tafensw.edu.au', 'Tafe, Futures\'', '', '', '', '', '', 'AN, nsw 2340', 'Tamworth', 'NSW', '2340', '7000006267', 'Tafe, Futures\'', 'Donna O, Malley', '', '', '', 'AN, nsw 2340', 'Tamworth', 'NSW', '', '', '15', '', '', '', '', ''),
(82, 'TC,s Takeaway Account', 'TC,s Takeaway', 'Peter', 'Peter', 'Peter', '', '', '', '', 'TC,s Takeaway', '', '', '', 'Goonoo Goonoo', 'Road', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(83, 'The Attunga Pub', 'The Attunga Pub', 'Tammy', 'Priddel', 'Tammy Priddel', '', '', '', 'attungahotel@gmail.com', 'Attunga Pub', 'Tammy Priddel', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(84, 'The Coffee Club', 'The Coffee Club Tamworth', 'The Coffee Club Tamworth', 'The Coffee Club Tamworth', 'The Coffee Club Tamworth', '', '', '', 'invoices.tcc@minordkl.com.au', 'The Coffee Club Tamworth', '', '', '', '', '', '', '', 'NSW', '', 'TCCAUS0132', '', '', '', '', '', '', '', 'NSW', '', '', '30', '', '', '', '', ''),
(85, 'The Heights', 'The Heights', 'The Heights', 'The Heights', 'The Heights', '', '', '', '', 'The Heights', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(86, 'The Press', 'The Press', 'The Press', 'The Press', 'The Press', '', '', '', '', 'The Press', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(87, 'The Tudor Hotel', 'Tudor', 'Tudor', 'Tudor', 'Tudor', '', '', '', 'barbara@tudorhoteltamworth.com.au', 'Tudor Hotel', '', '', '', 'Peel', 'Street', '', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', '', 'Tamworth', 'NSW', '', '', '', '', '', '', '', ''),
(88, 'The View', 'The View', 'The View', 'The View', 'The View', '', '', '', 'accounts@tamworthgolfclub.com.au', 'The View Restrant', 'Tamworth Golf Club', '', '', '', '', '', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(89, 'Tomatoe man Wally', 'Tomatoe Man Wally', 'Tomatoe Man Wally', 'Tomatoe Man Wally', 'Tomatoe Man Wally', '', '', '', '', 'Tomatoe Man Wally', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(90, 'Transwest Fuels Pty Ltd', 'Transwest Fuels', 'Transwest Fuels', 'Transwest Fuels', 'Transwest Fuels', '', '', '', '', 'Transwest Fuels', 'North Store', '', '', '', '', 'Kootingal', '', 'NSW', '', '', '', '', '', '', '', 'Kootingal', '', 'NSW', '', '', '', '', '', '', '', ''),
(91, 'Tuckerbox Northgate', 'Tuckerbox Northgate', 'amy', 'amy', 'amy', '', '', '', '', 'Tuckerbox Northgate', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(92, 'Tudor Hotel on Peel', 'Tudor Hotel on Peel', 'Tudor Hotel on Peel', 'Tudor Hotel on Peel', 'Tudor Hotel on Peel', '', '', '', 'tudorhotel@lightyear.cloud', 'Tudor Hotel on Peel', '', '', '', '', '', '', '', 'NSW', '', '', 'Tudor Hotel on Peel', '', '', '', '', '', '', 'NSW', '', '', '30', '', '', '', '', ''),
(93, 'Victoria Harbour Chinese', 'Victoria Harbour Chinese', 'Anna', 'Linton', 'Anna Linton', '0412 130 338', '', '', '', 'Victoria Harbour Chinese', 'Kootingal Bowling Club', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', ''),
(94, 'Werris Creek Bowling and Tennis Club', 'Werris Creek Bowling Club', 'Werris Creek Bowling Club', 'Werris Creek Bowling Club', 'Werris Creek Bowling Club', '', '', '', '', 'Werris Creek Bowling Club', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(95, 'Werris Creek Takeaway', 'Werris Creek Takeaway', 'John', 'John', 'John', '408940032', '', '', '', 'Werris Creek Takeaway', '', '', '', 'Single', 'Street', 'Werris Creek', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', 'Werris Creek', 'Tamworth', 'NSW', '', '', '', '', '', '', '', ''),
(96, 'WiiliamsBurg Tamworth', 'WilliamsBurg Tamworth', 'WilliamsBurg Tamworth', 'WilliamsBurg Tamworth', 'WilliamsBurg Tamworth', '', '', '', '', 'WilliamsBurg Tamworth', '', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(97, 'Woolomin Store', 'Woolomin Store', 'Kylie', 'Douglas', 'Kylie Douglas', '67642243', '', '', 'abelene@tpg.com.au', 'Kylie Douglas', 'Woolomin Store', '', '', '', '', '', '', 'NSW', '', '', '', '', '', '', '', '', '', 'NSW', '', '', '15', '', '', '', '', ''),
(98, 'Yum To Go Peel St', 'Yum To Go', 'Yum To Go', 'Yum To Go', 'Yum To Go', '', '', '', 's_kbard@bigpond.com', 'Yum To Go', '', '', '', 'Peel', 'Street', '', 'Tamworth', 'NSW', '2340', '', '', '', '', '', '', '', 'Tamworth', 'NSW', '', '', '15', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fnfcustomer`
--

CREATE TABLE `fnfcustomer` (
  `customer_ID` int(13) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fnfcustomer`
--

INSERT INTO `fnfcustomer` (`customer_ID`, `firstName`, `lastName`, `contact`, `phone1`, `phone2`, `fax`, `email`, `billAddress1`, `billAddress2`, `billFlat`, `billStreetNumber`, `billStreet`, `billStreetType`, `billSuburb`, `billCity`, `billState`, `billPostcode`, `billNotes`, `deliveryTitle1`, `deliveryTitle2`, `deliveryFlat`, `DeliveryStreetNo`, `DeliveryStreetName`, `DeliveryStreetType`, `deliverySuburb`, `DeliveryCity`, `deliveryState`, `deliveryPostcode`, `deliveryNotes`, `Terms`, `Rep`, `Tax Code`, `Resale Num`, `Account No.`, `Credit Limit`, `active`) VALUES
(1, 'Shell', 'Abra', 'Shell Abra', '', '', '', '', 'Shell Abra', '', '', '27', '27 Minnamurra Cres', 'Cresent', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(2, 'Lesley', 'Andrews', 'Lesley Andrews', '0457 133 039', '', '', '', 'Lesley Andrews', '', '', '134', '134 Caroline Street', 'Street', 'Bendermeer', '', 'N.S.W', '2355', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(3, 'Trudie', 'Arnold', 'Trudie Arnold', '0429 939 735', '', '', '', 'Trudie Arnold', '', '', '55', '55 Gordon Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(4, 'Janene', 'Avery', 'Janene Avery', '', '', '', '', 'Janene Avery', '', '2', '8', 'Veness', 'Street', 'Manilla', '', 'N.S.W', '2346', 'Crn Veness & Chapman blue', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(5, 'Kylie', 'Bailey', 'Bailey Kylie', '0434 869 598', '', '', '', 'Kylie Bailey', '', '', '18', '18 Flemming Cres', 'Cresent', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(6, 'Angela', 'Baker', 'Angela Baker', '0408 445 646', '', '', 'angebake@hotmail.com', 'Angela Baker', '', '', '22', '22 Goodwin Road', 'Road', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(7, 'Valinda', 'Baker', 'Valinda Baker', '0473 477 649', '', '', '', 'Valinda Baker', '', '', '4', '4 Mytelen Street', 'Street', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(8, 'Elysia', 'Baker', 'Elysia Baker', '02 6785 0237', '', '', '', 'Manilla Bakery', 'Elysia Baker', '', '176', '176 Manilla Street', 'Street', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(9, 'Rachael', 'Baldo', 'Rachael Baldo', '0427 316 401', '', '', '', 'Rachael Baldo', '', '', '3', '3 Maitland Street', 'Street', 'Currabubular', '', 'N.S.W', '2342', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(10, 'Kim', 'Bargwanna', 'Kim Bargwanna', '', '', '', '', 'Kim Bargwanna', '', '', '', '', '', '', '', 'N.S.W', '', 'PICK UP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(11, 'Beth', 'Barrett', 'Beth Barrett', '', '', '', 'bethbarrett@bigpond.com', 'Beth Barrett', '', '', '20', '20 Holland Street', 'Street', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(12, 'Natasha', 'Bartlet', 'Natasha Bartlet', '', '', '', '', 'Natasha Bartlet', '', '', '11', '11 Faringdon Street', 'Street', 'Moore Creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(13, 'Susi', 'Bell', 'Susi Bell', '0457 045 467', '', '', 'susibell8899@icloud.com', 'Susi Bell', '', '', '', 'Nundle Fuel & Cafe', '', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(14, 'Danielle', 'Bennett', 'Danielle Bennett', '431075727', '', '', 'bubbles0080@gmail.com', 'Danielle Bennett', '', '', '44', '44 Harrier Pd', 'Parade', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 30', '', '', '', '', '', '1'),
(15, 'Lynne', 'Bentley', 'Lynne Bentley', '', '', '', '', 'Lynne Bentley', '', '', '19', 'Warral', 'Street', 'Duri', '', 'N.S.W', '2344', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(16, 'Trish', 'Betts', 'Trish Betts', '0408 901 167', '', '', 'trishbetts.6@gmail.com', 'Trish Betts', '', '', '74', '74 Braefarm road', 'Road', 'Moonbi', '', 'N.S.W', '2353', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(17, 'Kerrie', 'Betts', 'Kerrie Betts', '0401 145 281', '', '', 'akat55@outlook.com', 'Kerrie Betts', '', '', '9', '9 Gill Street', 'Street', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(18, 'Kate', 'Bilbao', 'Kate Bilbao', '0498 988 828', '', '', 'katebilbao@outlook.com', 'Kate Bilbao', '', '', '143', '143 Deeks Rd', 'Road', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(19, 'Diana', 'Booth', 'Diana Booth', '', '', '', '', 'Diana Booth', '', '', '', '', '', '', '', 'N.S.W', '', 'Pick Up', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(20, 'Nick', 'Bradford', 'Nick Bradford', '0409 239 665', '', '', '', 'Nick Bradford', 'Woollen Mill', '', '', '', '', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(21, 'Crystelle', 'Bratley', 'Crystelle Bratley', '414541390', '', '', '', 'Crystelle Bratley', '', '', '23', '23 North Ave', 'Avenue', 'Quirindi', '', 'N.S.W', '2343', '(Chook Scraps Please)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(22, 'Elsie', 'Breznik', 'Elsie Breznik', '0400 345 181', '67671570', '', '', 'Elsie Breznik', '', '', '285', '285 Stirling Road', 'Road', 'Moore Creek', '', 'N.S.W', '2340', '(Upper Moore Ck)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(23, 'Sharon', 'Brooke', 'Sharon Brooke', '0402 631 194', '', '', 'shazzab17@gmail.com', 'Sharon Brooke', '', '', '21', '21 Barrington Drive', 'Drive', 'Moore Creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(24, 'Gail', 'Brooks', 'Gail Brooks', '0417 463 357', '', '', '', 'Gail Brooks', '', '', '99', '99 Susan Street', 'Street', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(25, 'Kara', 'Brown', 'Kara Brown', '', '', '', 'd.wbrown@bigpond.net.au', 'Kara Brown', '', '', '160', '160 Urangera Drive', 'Drive', 'Daruka', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(26, 'Karlee', 'Burgess', 'Karlee Burgess', '0488 930 588', '', '', 'karlee.burgess.kb@gmail.com', 'Karlee Burgess', '', '', '4', '4 Gill Street', 'Street', 'Nundle', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(27, 'Teree', 'Burr', 'Teree Burr', '0409 616 046', '', '', '', 'Teree Burr', '', '', '15', '15 Taylors Road', 'Road', 'Nundle', '', 'N.S.W', '2340', 'Woollen Mill before 1pm', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(28, 'Wade & Holly', 'Burt', 'Wade & Holly Burt', '0427 110 917', '', '', '', 'Wade & Holly Burt', '', '', '25', '25 Regans Road', 'Road', 'Kingswood', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(29, 'Kayla', 'Butcher', 'Kayla Butcher', '', '', '', '', 'Kayla Butcher (Graham)', 'Valley View', '', '518', '518 Rangari Road', 'Road', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(30, 'Kristy', 'Butler', 'Kristy Butler', '', '', '', '13kristy@live.com.au', 'Kristy Butler', '', '', '32', '32 Wagonia Drive', 'Drive', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(31, 'Julie', 'Cameron', 'Julie Cameron', '0427 665 880', '', '', 'julia.cameron1011@gmail.com', 'Julia Cameron', 'Golden Downs', '', '148', '148 Callaghans Lane', 'Lane', 'Quirind', '', 'N.S.W', '2343', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(32, 'Mia', 'Campbell', 'Mia Campbell', '', '', '', '', 'Mia Campbell', '', '', '7', '7 Lorikeet drive', 'Drive', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(33, 'Eve', 'Campese', 'Eve Campese', ' 0475 874 872', '', '', 'evecampese@outlook.com', 'Nundle Sport & Rec', 'Eve Campese', '', '', '', '', 'Nundle', '', 'N.S.W', '2340', 'Leave order on front table', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(34, 'Susan', 'Cartwright', 'Susan Cartwright', '0428 610 955', '', '', 'mcrae.1@bigpond.com', 'Susan Cartwright', '', '', '1', '1 Galah Drive', 'Drive', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(35, 'Wendy', 'Cavanagh', 'Wendy Cavanagh', '67622930', '', '', 'wendycav1964@hotmail.com', 'Wendy Cavanagh', '', '', '23', '23 McGregor Street', 'Street', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(36, 'Kymberly', 'Clark', 'Kymberly Clark', '', '', '', '', 'Kymberly Clark', '', '', '2', '2 Johns Ave', 'Avenue', 'Quirindi', '', 'N.S.W', '2343', 'Pick up', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(37, 'Sharon', 'Coia', 'Sharon Coia', '', '', '', '', 'Sharon Coia', '', '', '8', '8 Marshall Place', 'Place', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(38, 'Mariah', 'Colby', 'Mariah Colby', '467236514', '', '', 'mariahcolby0811@outlook.com', 'Mariah Colby', '', '', '11a', '11a Favell Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', 'Call when out the front', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(39, 'Christine', 'Cook', 'Christine Cook', '0417 274 302', '', '', '', 'Christine Cook', '', '', '40', '40 Milburn Road', 'Road', 'Oxleyvale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(40, 'Tracey', 'Cope', 'Tracey Cope', '432043883', '', '', '', 'Tracey Cope', '', '', '28', '28 Henry Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(41, 'Jo', 'Coutts', 'Jo Coutts', '408270316', '', '', 'joannacoutts@yahoo.com', 'Jo Coutts', '', '', '5', '5 Terole Ave', 'Avenue', 'North Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(42, 'Cathy', 'Crandell', 'Crandell Cathy', '', '', '', '', 'Cathy Crandell', '', '', '417', '417 Browns Lane', 'Lane', 'Hallsville', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(43, 'Amy', 'Croucher', 'Amy Croucher', '', '', '', 'amylou.croucher@icloud.com', 'Amy Croucher', '', '', '15', '15 Henry Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(44, 'Jane', 'Daly', 'Jane Daly', '0409 614 801', '67644327', '', 'daly_jane@yahoo.com', 'Jane Daly', '', '', '', '', '', '', '', 'N.S.W', '', 'Leave at Kooty Butchers', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(45, 'Michaela', 'Daves', 'Michaela Daves', '', '', '', 'mdaves@hotmail.com', 'Michaela Daves', '', '', '28', '28 Caroll Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(46, 'Wendy', 'Davey', 'Wendy Davey', '0429 022 415', '', '', 'nandowra1@bigpond.com', 'Wendy Davey', '', '', '7', '7 Sandy Road', 'Road', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(47, 'Lyn & Peter', 'Davis', 'Lyn & Peter Davis', '', '', '', '', 'Lyn & Peter Davis', '', '', '39', '39 Denman Ave', 'Avenue', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(48, 'James & Kate', 'Davis', 'James & Kate Davis', '', '', '', '', 'James & Kate Davis', '', '', '1', '1 Eveleigh Road', 'Road', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(49, 'Bec', 'Davis', 'Bec Davis', '', '', '', 'rebecca_davis86@hotmail.com', 'Bec Davis', '', '', '15', '15 Thomas St', 'Street', 'Moonbi', '', 'N.S.W', '2353', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(50, 'Day', 'Day', 'Day', '', '', '', '', 'Linda Day', '', '', '29', '29 Rosella Ave', 'Avenue', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(51, 'Steve', 'Dent', 'Steve Dent', '67852091', '', '', '', 'Steve Dent', '', '', '47', '47 Stoddart Street', 'Street', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(52, 'Anne', 'Doak', 'Anne Doak', '0429 696 693', '', '', '', 'Anne Doak', '', '', '151', '151 Carolinne Street', 'Street', 'Bendermeer', '', 'N.S.W', '2355', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(53, 'Di', 'Dobson', 'Di Dobson', '418747878', '', '', '', 'Di Dobson', '', '', '2', 'Banks', 'Street', 'Westdale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(54, 'Mal & Shar', 'Donald', 'Mal & Shar Donald', '0427 529 526', '', '', 'sharandmal8@gmail.com', 'Mal & Shar Donald', '', '', '91', '91 Woodside Chase', 'Chase', 'Kootingal', '', 'N.S.W', '2352', '(Back kooty rd turn on to Brooklyn Park R', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(55, 'Glenda', 'Douglas', 'Glenda Douglas', '0428 298 524', '', '', '', 'Glenda Douglas', '', '2', '45', 'The Grange', '', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(56, 'Danialle', 'Douglas', 'Danialle Douglas', '417466400', '', '', 'danielnofar@hotmail.com', 'Danialle Douglas', 'Nundle Schhool', '', '', '', '', '', '', 'N.S.W', '', 'Call will meet at gate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(57, 'Jacinta', 'Dumas', 'Jacinta Dumas', '0431 329 764', '', '', 'jacinta.dumas79@gmail.com', 'Jacinta Dumas', '', '', '110', '110 Edward Street', 'Street', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(58, 'Robyn', 'Edwards', 'Robyn Edwards', '0417 954 968', '', '', '', 'Robyn Evans', '', '', '18', '18 Darling Street', 'Street', 'North Tamworth', 'Tamworth', 'N.S.W', '2340', 'Psarakis Accounting', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(59, 'Reya', 'Erich', 'Reya Erich', '', '', '', '', 'Reya Erich', '', '', '136', '136 Hillvue Road', 'Road', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(60, 'Linda', 'Essex', 'Linda Essex', '', '', '', 'lindanic67@yahoo.com.au', 'Linda Essex', 'Coles Express Service Station', '', '', 'Goonoo Goonoo', 'Road', '', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(61, 'Helen', 'Etherington', 'Helen Etherington', '0400 681 811', '', '', 'helenjetherington@gmail.com', 'Helen Etherington', '', '', '19', '19 Ashford Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', 'Please leave at Front Door', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(62, 'Allison', 'Faulkner', 'Allison Faulkner', '0427 120 406', '', '', '', 'Allison Faulkner', 'Tufrey\'s Concrete', '', '15', '15 - 17 East West Place', 'Place', 'Taminda', 'Tamworth', 'N.S.W', '2340', '(off dampier St)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(63, 'Kacy', 'Faulkner', 'Kacy Faulkner', '0412 574 717', '', '', '', 'Kacy Faulkner', '', '', '63', '63 Morilla Street', 'Street', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(64, 'Katrina', 'Fermor', 'Katrina Fermor', '0448 683 264', '', '', '', 'Katrina Fermor', '', '', '34', '34 Wahroonga Drive', 'Drive', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(65, 'Andrew', 'Filewood', 'Andrew Filewood', '0457 473 274', '', '', 'andrew@flowwater.com.au', 'Andrew Filewood', '', '', '59', '59 Bagenmar Rd', 'Road', 'Tintinhull', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(66, 'Karly', 'Fittler', 'Karly Fittler', '0411 360 487', '', '', '', 'Karly Fittler', '', '', '1', '1 Edna Close', 'Close', 'Kingswood', '', 'N.S.W', '2340', 'If not home, leave on back table', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(67, 'Michelle', 'Fleming', 'Michelle Fleming', '', '', '', 'mfleming172@gmail.com', 'Michelle Fleming', '', '', '172', '172 Sandy Road', 'Road', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(68, 'Shelly', 'Fletcher', 'Shelly Fletcher', '0429 014 306', '', '', 'shellyfletcher@bigpond.com', 'Shelly Fletcher', '', '', '4', '4 Grevillea Cres', 'Cresent', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(69, 'David', 'Fletcher', 'David Fletcher', '', '', '', 'fletcherswindowtinting@yahoo.com.au', 'David Fletcher', '', '', '100', '100 Hill Street', 'Street', 'Quirindi', '', 'N.S.W', '2343', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(70, 'Marika', 'Forsstrom', 'Marika Forsstrom', '0407 102 835', '', '', 'reekthefreak@hotmail.com', 'Marika Forsstrom', '', '', '5', '5 Hill Street', 'Street', 'Quirindi', '', 'N.S.W', '2343', 'CHOOK SCRAPS PLEASE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(71, 'Stepehen', 'Gadd', 'Stepehen Gadd', '', '', '', 'stephen.gadd@det.nsw.edu.au', 'Stepehen Gadd', '', '', '95', '95 Jenkin Street', 'Street', 'Nundle', '', 'N.S.W', '2340', 'School Residence', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(72, 'Megan', 'Galvin', 'Megan Galvin', '0428 192 187', '', '', 'yarrabee5@gmail.com', 'Megan Galvin', 'Yarrabee', '', '516', '516 Moonbi Gap Rd', 'Road', 'Moore Creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(73, 'Talia', 'Geddes', 'Talia Geddes', '', '', '', 'geddes66@bigpond.com', 'Talia Geddes', '', '', '11', '11 Sequoia Drive', 'Drive', 'Moore Creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(74, 'Anne-Maree', 'Gerathy', 'Anne-Maree Gerathy', '0402 424 984', '', '', 'ree968@tpg.com.au', 'Anne-Maree Gerathy', '', '', '7', '7 Upper Street', 'Street', 'North Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(75, 'Donna', 'Gill', 'Donna Gill', '0400 270 014', '', '', 'donpete@live.com.au', 'Donna Gill', '', '', '13', '13 Mack Street', 'Street', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(76, 'Roxanne', 'Gillies', 'Roxanne Gillies', '0402 731 145', '267687882', '', 'acutabovehair@hotmail.com', 'Roxanne Gillies', '', '', '45', '45 Gap Road', 'Road', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(77, 'Linda', 'Gillies', 'Linda Gillies', '', '', '', 'acutabovehair@hotmail.com', 'Linda Gillies', '', '', '45', '45 Gap Road', 'Road', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(78, 'Krystal', 'Gorton', 'Krystal Gorton', '', '', '', '', 'Krystal Gorton', '', '', '11', '11 Heugh Street', 'Street', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(79, 'Vicki', 'Gow', 'Vicki Gow', '', '', '', '', 'Vicki Gow', '', '', '50', '50 Henry Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(80, 'Katie', 'Greening', 'Katie Greening', '', '', '', 'katieleaj@hotmail.com', 'Katie Greening', '', '', '939', '939 Manilla Road', 'Road', 'Hallsville', '', 'N.S.W', '2340', '3rd Driveway on left past oxley anchor', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(81, 'Ray & Leanne', 'Griffin', 'Ray & Leanne Griffin', '0418 971 796', '0418 260 167', '', '', 'Ray & Leanne Griffin', '', '', '143', '143 Jalna Road', 'Road', 'Bendermeer', '', 'N.S.W', '2355', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(82, 'Amanda', 'Griffith', 'Amanda Griffith', '0409 945 190', '', '', '', 'Amanda Griffith', 'Hospital', '', '', '', '', '', '', 'N.S.W', '', 'Equipment Services', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(83, 'Chantae', 'Griffiths', 'Chantae Griffiths', '0490 926 494', '', '', 'chantaegriff@gmail.com', 'Chantae Griffiths', '', '', '15', '15 Nelson Cres', 'Cresent', 'Moore Creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(84, 'Rachel', 'Hall', 'Rachel Hall', '0409 812 838', '', '', 'rachel.hall@y7mail.com', 'Rachel Hall', '', '', '13', '13 Blake Street', 'Street', 'Nundle', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(85, 'Deborah', 'Hall', 'Deb Hall', '407192717', '', '', '', 'Deb & Rick Hall', 'Reward Hospitality', '', '', '', '', 'Taminda', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(86, 'Monique', 'Harrington', 'Monique Harrington', '403548690', '', '', 'monharry77@gmail.com', 'Monique Harrington', '', '', '70', '70 Mount Cobla Rd', 'Road', 'Currabubular', '', 'N.S.W', '2342', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(87, 'Tash', 'Harvey', 'Tash Harvey', '0421 454 667', '', '', 'nharvey88@y7mail.com', 'Tash Harvey', '', '', '4251', '4251 Nundle Road', 'Road', 'Nundle', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(88, 'Kayla', 'Hausfeld', 'Kayla Hausfeld', '', '', '', '', 'Kayla Hausfeld', '', '', '24', '24 Single Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', 'Please place in Fridge  on verandah', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(89, 'Belinda', 'Hayman', 'Belinda Hayman', '', '', '', 'belindahayman@outlook.com', 'Belinda Hayman', '', '', '20', '20 Cobb & Co Cir', 'Circuit', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(90, 'Indi-anna', 'Haynes', 'Indi-anna Haynes', '', '', '', '', 'Indi-anna Haynes', '', '', '1854', '1854 New England Highway', 'Highway', 'Moonbi', '', 'N.S.W', '2353', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(91, 'Amanda', 'Hayward', 'Amanda Hayward', '', '', '', '', 'Amanda Hayward', 'Tregantle  (0488 933 318)', '', '619', '619 borah Creek rd', 'Road', 'Quirindi', '', 'N.S.W', '2343', 'Large White Letter Box. Go updriveway, main house on right Leave', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(92, 'HD Foster', 'HD Foster', 'HD Foster', '', '', '', '', 'HD Foster', '', '', '12', 'Charles', 'Street', 'Beendemere', '', 'N.S.W', '2355', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(93, 'Chelsea', 'Hoang', 'Chelsea Hoang', '403565387', '', '', '', 'Chelsea Hoang', '', '5', '104', 'Denison', 'Street', '', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(94, 'Kris', 'Hope', 'Kris Hope', '', '', '', '', 'Kris Hope', 'Country Mile Signs', '', '6', '6 Duke Street', 'Street', 'Quirindi', '', 'N.S.W', '2343', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(95, 'Dee', 'Humbles', 'Dee Humbles', '', '', '', 'benanddeehumbles@gmail.com', 'Dee Humbles', 'Nundle Fuel & Cafe', '', '', '', '', 'Nundle', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(96, 'Gemma', 'Hunt', 'Gemma Hunt', '', '', '', 'andrewandgemma@hotmail.com', 'Gemma Hunt', '', '', '709', '709 Duri-Dungowan Rd', 'Road', 'Timbumburi', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(97, 'Joely', 'Hutton', 'Joely Hutton', '0417 128 744', '', '', '', 'Joely Hutton', '', '', '', '', '', '', '', 'N.S.W', '', 'Pick UP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(98, 'Jannett', 'Jamieson', 'Jannett Jamieson', '67644295', '', '', 'jamieson@activeco.com.au', 'Jannett Jamieson', 'Tamworth Tennis Club', '', '', 'Napier', 'Street', '', '', 'N.S.W', '', 'Before 12', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(99, 'Tatum', 'Johns', 'Tatum Johns', '0427 681 089', '', '', '', 'Tatum Johns', '', '', '11', '11 Galah Drive', 'Drive', 'Calala', ' Tamworth', 'N.S.W', '2340', 'Please pack in Esky', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(100, 'Alysha', 'Johnson', 'Alysha Johnson', '0432 661 337', '', '', '', 'Alysha Johnson', '', '', '22', '22 Willow Park Drive', 'Drive', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(101, 'Kim', 'Johnson', 'Kim Johnson', '0413 405 280', '', '', '', 'Kim Johnson', 'Unit 29 Moonbi RFBI', '', '52', '52 Churchill Drive', 'Drive', '', '', 'N.S.W', '', 'Retirement Village', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(102, 'Kim', 'Jones', 'Kim Jones', '0427 571 154', '', '', '', 'Kim Jones', '', '', '11', 'Daintree', 'Circuit', 'Moore Creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(103, 'Joanne', 'Jones', 'Joanne Jones', '0427 060 598', '', '', 'joandlad@bigpond.com', 'Joanne Jones', '', '', '1882', '1882 New England HWY', 'Highway', 'Moonbi', '', 'N.S.W', '2353', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(104, 'Rochelle', 'Jones', 'Rochelle Jones', '', '', '', '', 'Rochelle Jones', 'Kootingal Butchers', '', '', '', '', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(105, 'Kayla', 'Kayla', 'Kayla', '', '', '', '', 'Kayla', '', '', '518', '518 Rangari Rd', 'Road', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(106, 'Amy', 'Kelly', 'Amy Kelly', '', '', '', '', 'Amy Kelly', '', '', '19', '19 Myrene ave', 'Avenue', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(107, 'Jayne', 'Kelly', 'Jayne Kelly', '0467 001 850', '', '', 'jaynekelly92@gmail.com', 'Jayne Kelly', '', '', '49', '49 Manilla Street', 'Street', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(108, 'Kylie & James', 'Kiddle', 'Kylie & James Kiddle', '0447 924 439', '', '', '', 'Kylie & James Kiddle', '', '', '24', '24 Warral Street', 'Street', 'Duri', '', 'N.S.W', '2344', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(109, 'John', 'Klease', 'John Klease', '417439071', '', '', 'johnandbel@bigpond.com', 'John Klease', '', '', '5', '5 Goderich Court', 'Court', 'Kingswood', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(110, 'Nikki', 'Kneller', 'Nikki Kneller', '', '', '', 'nikki.kneller@gmail.com', 'Nikki Kneller', '', '', '331', '331 Oxley Lane', 'Lane', 'Westdale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(111, 'Kristy', 'Kristy', 'Kristy', '', '', '', '', 'Kristy', '', '', '32', '32 Wagonia Drive', 'Drive', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(112, 'Mary', 'Kumfor', 'Mary Kumfor', '', '', '', '', 'Mary Kumfor', '', '', '8', '8 Lawson Place', 'Place', 'Westdale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(113, 'Lachie', 'Lachie', 'Lachie', '', '', '', '', 'Lachie', 'Powerhouse', '', '', '', '', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(114, 'Candice', 'Lamb', 'Candice Lamb', '0402 700 039', '', '', '', 'Candice Lamb', '', '', '15', '15 Rodeo Drive', 'Drive', '', '', 'N.S.W', '', 'Street past the sports Dome', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(115, 'Sharyn', 'Landel', 'Sharyn Landel', '0415 260 463', '', '', 'SHARYNLANDEL@GMAIL.COM', 'Sharyn Landel', '', '', '6', '6 Cobley Ave', 'Avenue', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(116, 'Phillipa', 'Leys', 'Phillipa Leys', '434534226', '', '', 'gleys@bigpond.com', 'Phillipa', 'Woolomin Shop', '', '', '', '', '', '', 'N.S.W', '', 'Text when delived', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(117, 'Anna', 'Linton', 'Anna Linton', '0412 130 338', '', '', '', 'Anna Linton', '', '', '129', '129 Braefarm Road', 'Road', 'Moonbi', '', 'N.S.W', '2353', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(118, 'Di & Bob', 'Locke', 'Di & Bob Locke', '0418 667 736', '', '', '', 'Di & Bob Locke', '', '', '1', '1 Shrewsbury Ave', 'Avenue', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(119, 'Ashlee', 'Long', 'Ashlee Long', '0408 968 759', '', '', '', 'Ashlee Long', '', '', '62', '62 Manilla Street', 'Street', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(120, 'Sherilyn', 'Lowe', 'Sherilyn Lowe', '', '', '', 'cher@nomuula.com.au', 'Sherilyn Lowe', 'Penard', '', '1948', '1948 New England Hiway', 'Highway', 'Moonbi', '', 'N.S.W', '2353', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(121, 'Megan', 'Macabe', 'Megan Macabe', '', '', '', 'macabe28@live.com', 'Megan Macabe', '', '', '120b', '120b Carthage Street', 'Street', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(122, 'Jill', 'Macfarlane', 'Jill Macfarlane', '', '', '', 'jill.macfarlane@det.nsw.edu.au', 'Jill Macfarlane', '', '', '50', '50 Harrier Pde', 'Parade', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(123, 'Toscha', 'Malcom', 'Toscha Malcom', '0429 030 676', '', '', '', 'Toscha Malcom', '', 'Willowdene', '1391', 'Lower Somerton', 'Road', 'Somerton', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(124, 'Jess', 'Manuel', 'Jess Manuel', '', '', '', 'jessmanuel83@gmail.com', 'Jess Manuel', 'Nemingha Pub', '', '', '', '', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(125, 'Hayley', 'McAdam', 'Hayley McAdam', '', '', '', 'haylemcadam@activ8.net.au', 'Hayley McAdam', '', '', '101', '101 George Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(126, 'Angela', 'McCarthy', 'Angela McCarthy', '0409 361 223', '', '', '', 'Angela McCarthy', 'St Mary\'s Preschool', '7', '9', 'North', 'Street', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(127, 'Mellisa', 'McCulloch', 'Mellisa McCulloch', '0418 117 052', '', '', '', 'Mellisa McCulloch', '', '', '', '40 Graham Street', 'Street', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(128, 'Pauline', 'McCulloch', 'Pauline McCulloch', '0427 687 625', '', '', 'paulinemcculloch@bigpond.com', 'Pauline McCulloch', '', '', '1', '1 Henry Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(129, 'Tara ', 'McCulloch', 'Tara McCulloch', '0400 201 783', '', '', '', '109 Carthage Street Tamworth', '', '', '', '', '', '', '', 'N.S.W', '', 'Phone: 0400 201 783', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(130, 'Barbara', 'Mcdonald', 'Barbara Mcdonald', '0477 010 339', '', '', '', 'Barbara Mcdonald', '41 Kurrajong Road, Mornington Heights', '', '41', 'Kurrajong', 'Road', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(131, 'Lyn', 'McGuckin', 'McGuckin McGuckin', '0409 535 555', '', '', '', 'Lyn McGuckin', '', '', '8A', '8A Angela Street', 'Street', '', 'Tamworth', 'N.S.W', '2340', '(past Oasis)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(132, 'Amanda', 'McIntyre', 'Amanda McIntyre', '', '', '', '', 'Amanda McIntyre', '', '', '1', '1 kingfisher drive', 'Drive', 'Moore creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(133, 'Tameeka', 'McLaren', 'Tameeka McLaren', '0432 175 663', '', '', 'meekus_345@msn.com', 'Tameeka McLaren', '', '', '25', '25 Henry Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(134, 'Lindee', 'McNaughton', 'Lindee McNaughton', '', '', '', '', 'Lindee McNaughton', '', '', '', '', '', '', '', 'N.S.W', '', 'Pick Up', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(135, 'Terri-anne', 'Mcrae', 'Terri-anne Mcrae', '', '', '', '', 'Terri-anne Mcrae', '', '', '', '', '', '', '', 'N.S.W', '', 'Coming From Uralla Meet at pub', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(136, 'Dena-Rose', 'Miller', 'Dena-Rose Miller', '', '', '', '', 'Dena-Rose Miller', '', '', '30', '30 Railway St', 'Street', 'Nemingha', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(137, 'Lisa', 'Mills', 'Lisa Mills', '0473 193 112', '', '', '', 'Lisa Mills', '', '', '7a', '7a Rodney Street', 'Street', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(138, 'Jess', 'Montgomery', 'Jess Montgomery', '0402 239 496', '', '', 'fnforders1@gmail.com', 'Jess Montgomery', '', '', '5', '5 Hunt Street', 'Street', 'North Tamworth', 'Tamworth', 'N.S.W', '2340', 'Leave at Door', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(139, 'Kerstin', 'Moore', 'Kerstin Moore', '67693664', '', '', '', 'Kerstin Moore', 'Winchfield', '', '4251', '4251 Nundle Road', 'Road', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(140, 'Erin', 'Moore', 'Erin Moore', '0429 166 719', '', '', '', 'Erin Moore', 'Canah', '', '', '', '', 'Werris Creek', '', 'N.S.W', '2341', 'Meet at Golf Club', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(141, 'Sonya', 'Moran', 'Sonya Moran', '', '', '', 'sonyascharzenberger@me.com', 'Sonya Moran', '', '', '30', '30 Alexandra Street', 'Street', 'Oxleyvale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(142, 'Tim', 'Morris', 'Tim Morris', '', '', '', '', 'Tim Morris', '', '', '7', '7 Honeyeater Pl', 'Parade', 'Moore Creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(143, 'Josh & Jo-Anne', 'Morris', 'Josh & Jo-Anne Morris', '0408 434 877', '', '', 'joshandjoannemorris@bigpond.com', 'Josh & Jo-Anne Morris', '', '', '2283', '2283 Werris Creek Rd', 'Road', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(144, 'Leanne', 'Morton', 'Leanne Morton', '0418 971 796', '', '', '', 'Leanne Morton', '', '', '143', '143 Jalna Road', 'Road', 'Bendermeer', '', 'N.S.W', '2355', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(145, 'Rachel', 'Motley', 'Rachel Motley', '0429 453 578', '', '', 'rachel.i.m@hotmail.com', 'Rachel Schofield', 'Post Office', '', '', '', '', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(146, 'Laura', 'Moy', 'Laura mOY', '', '', '', 'lkmhermosa@yahoo.com', 'Laura Moy', '', '', '93', '93 Jenkins Street', 'Street', 'Nundle', '', 'N.S.W', '2340', 'next to school', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(147, 'Ashleigh', 'Mulligan', 'Ashleigh Mulligan', '0411 804 640 ', '', '', 'ash-maree@hotmail.com', 'Ashleigh Mulligan', '\'The Ranch\'', '', '252', '252 Gunnembene', 'Lane', 'Carroll', '', 'N.S.W', '2340', 'Leave on Fridge on back veranda', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(148, 'Ellen & Bill', 'Murdoch', 'Ellen & Bill Murdoch', '0439 183 070', '', '', 'mocksock@tpg.com.au', 'Ellen & Bill Murdoch', '', '', '5', '5 Chaffey Street', 'Street', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(149, 'Natalie', 'Murphy', 'Natalie Murphy', '0421 068 809', '', '', '', 'Natalie Murphy', '', '', '17', '17 Peregrine Av', 'Avenue', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(150, 'Nicola', 'Murphy', 'Nicola Murphy', '', '', '', '', 'Nicola Murphy', '', '', '8', '8 Griffin Ave', 'Avenue', 'North Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(151, 'Natalie', 'Nash', 'Natalie Nash', '0437 000 985', '', '', 'ankiee@msn.com', 'Natalie Nash', '', '', '113', '113A Denison St', 'Street', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(152, 'Amanda', 'Nicholas', 'Amanda Nicholas', '0403 555 395', '', '', '', 'Amanda Nicholas', '', '', '74', '74 Johnson Street', 'Street', 'North Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(153, 'Alexandra', 'Norman', 'Alexandra Norman', '0447 814 260', '', '', '', 'Alexandra Norman', 'Redbank', '', '80', '80 Redbank Road', 'Road', 'Carroll', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(154, 'Tanya', 'Northey', 'Tanya Northey', '', '', '', '', 'Tanya Northey', '', '', '11', '11 Porter Street', 'Street', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(155, 'Paige', 'Northey', 'Paige Northey', '0429 591 992', '', '', '', 'Paige Northey', '', '', '2B', '2B Grant Street', 'Street', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(156, 'Lisa', 'Northey', 'Lisa Northey', '0419 203 079', '', '', 'lanorthey@gmail.com', 'Lisa Northey', '', '', '31', '31 Johnston Street', 'Street', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(157, 'Tash', 'O\'Brien', 'Tash O\'Brien', '', '', '', 'tashy6604@gmail.com', 'Tash O\'Brien', '', '', '8', '8 Verdelho Drive', 'Drive', 'North Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(158, 'Wendy', 'O\'Brien', 'Wendy O\'Brien', '0428 605 672', '', '', '', 'Wendy O\'Brien', '', '', '95', '95 Fishers Lane', 'Lane', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(159, 'Crystal', 'Oleary', 'Crystal Oleary', '', '', '', '', 'Crystal Oleary', '', '', '37', '37 Holland Street', 'Street', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(160, 'Joeline', 'O\'Neill', 'Joeline O\'Neil', '0413 053 360', '', '', '', 'Joeline O\'Neil', '', '', '6', '6 Varley Avenue', 'Avenue', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(161, 'Tracy', 'O\'Quigley', 'Tracy O\'Quigley', '0419 399 857', '428856513', '', 'tracyq74@bigpond.com', 'Tracy O\'Quigley', '', '', '110', '110 Arthur Street', 'Street', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(162, 'Titania', 'Page', 'Titania Page', '', '', '', '', 'Titania Page', '', '', '2232', '2232 New England Hwy', 'Highway', 'Moonbi', '', 'N.S.W', '2353', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(163, 'Bek', 'Parker', 'Bek Parker', '', '', '', '', 'Bek Parker', '', '2', '9', '2/9 Baker Close', 'Close', 'Calala', ' Tamworth', 'N.S.W', '2340', 'ORDER 2', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(164, 'Maryann', 'Parsons', 'Maryann Parsons', '', '', '', '', 'Maryann Parsons', '', '', '101', '101 Edward Street', 'Street', '', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(165, 'Nicole', 'Parsons', 'Nicole Parsons', '', '', '', '', 'Nicole Parsons', '', '', '75', '75 White Street', 'Street', '', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(166, 'Mike', 'Parton', 'Mike Parton', '0412 495 449', '', '', '', 'Mike Parton', '', '', '37', '37 Chelmsford Street', 'Street', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(167, 'Mark & Paula', 'Pauling', 'Mark & Paula Pauling', '0434 426 796', '', '', '', 'Mark & Paula Pauling', '', '', '55', '55 Cockburn Valley Rd', 'Road', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(168, 'Abbey', 'Pawsey', 'Abbey Pawsey', '', '', '', 'abbeypawsey91@gmail.com', 'Abbey Pawsey', '', '', '75', '75 Edward Street', 'Street', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(169, 'Samantha', 'Pengilly', 'Samantha Pengilly', '', '', '', 'mspengilly712@gmail.com', 'Samantha Pengilly', '', '', '121', '121 Hunter Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(170, 'Lyn', 'Pengilly', 'Lyn Pengilly', '0428 424 400', '', '', 'mspengilly712@gmail.com', 'Lyn Pengilly', '', '', '95', '95 Beulah Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', 'call when on way to gunnedah', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(171, 'Amanda', 'Perkins', 'Amanda Perkins', '0402 149 412', '', '', '', 'Amanda Perkins', '', '', '11', '11 Gill Street', 'Street', 'Kootingal', '', 'N.S.W', '2352', 'Bottom of cul de sac', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(172, 'Abbey', 'Perry', 'Abbey Perry', '0429 162 264', '', '', '', 'Abbey Perry', '', '', '114', '114 Arthur Street', 'Street', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(173, 'Jess', 'Peter', 'Jess Peter', '0400 764 550', '', '', 'jespet92@gmail.com', 'Jess Peter', '', '', '8', '8 Grant Street', 'Street', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(174, 'Jim & Jeanette', 'Phillpott', 'Jim & Jeanette Phillpott', '490969236', '', '', '', 'Jim & Jeanette Phillpott', '', '', '160', '160 Queen Street', 'Street', 'Barraba', '', 'N.S.W', '2347', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(175, 'Jessica', 'Pincham', 'Jessica Pincham', '0409 809 334', '', '', 'sooty2011@live.com.au', 'Jessica Pincham', '', '', '18', '18 Susanne Street', 'Street', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(176, 'Joanne', 'Piper', 'Joanne Piper', '0414 265 827', '', '', 'dandj.piper@gmail.com', 'Joanne Piper', '', '', '11', '11 Thomson Place', 'Place', 'Gunnedah', '', 'N.S.W', '2380', 'Leave on Verandah', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(177, 'Jess', 'Pittman', 'Jess Pittman', '0403 261 913', '0428 586 944', '', '', 'Jess Pittman', 'Glendower', '', '314', '314 Pendene Rd', 'Road', 'Loombrah', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(178, 'Annemarie', 'Pokarier', 'Annemarie Pokarier', '0402 846 462', '', '', '', 'Annemarie Pokarier', '', '', '50', '50 Flinders Street', 'Street', 'Westdale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(179, 'Georgie', 'Pollard', 'Georgie Pollard', '0411 082 118', '', '', '', 'Georgie Pollard', '', '', '77', '77 Bagenmar Rd', 'Road', 'Tintinhull', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(180, 'Daniel', 'Porter', 'Daniel Porter', '', '', '', '', 'Daniel Porter', '', '', '1', '1 Mulwala Close', 'Close', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(181, 'Ken', 'Porter', 'Ken Porter', '', '', '', '', 'Ken Porter', '', '', '1', '1 Mulwala Close', 'Close', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(182, 'Stepahanie', 'Porter', 'Stepahanie Porter', '0423 278 005', '', '', '', 'Stepahanie Porter', '', '', '16', '16 The Terrace', 'Terrace', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(183, 'Christie', 'Powell', 'Christie Powell', '', '', '', 'christierule@gmail.com', 'Christie Powell', '', '', '4454', '4454 Oxley Hiway', 'Highway', 'Bendermeer', '', 'N.S.W', '2355', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(184, 'Alisha', 'Preston', 'Alisha PReston', '0403 258 547', '', '', '', 'Alisha Preston', 'Woodley Motor Group', '', '', '', '', '', '', 'N.S.W', '', 'Mazda Reception', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(185, 'Helen', 'Pritchett', 'Helen Pritchett', '0419 253 644', '', '', '', 'Helen Pritchett', '', '', '53', '53 Fitzroy Street', 'Street', 'Quirindi', '', 'N.S.W', '2343', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(186, 'Ellena', 'Rack', 'Ellena Rack', '', '', '', '', 'Ellena Rack', '', '2', '10a', 'Gidley', 'Street', '', '', 'N.S.W', '', 'Middle Unit - Blue Chair', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(187, 'Esther', 'Rae', 'Esther Rae', '0448 077 100', '', '', 'estherrae06@gmail.com', 'Esther Rae', 'Tandarra', '', '1161', '1161 Barraba Road', 'Road', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(188, 'Kylie', 'Raines', 'Kylie Raines', '', '', '', '', 'Kylie Raines', '', '', '3', '3 South Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(189, 'Kellz Belz', 'Rankin', 'Kellz Belz Rankin', '', '', '', '', 'Kellz Belz Rankin', '', '', '8A', '8A Pine Street', 'Street', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(190, 'Andrea', 'Rayfield', 'Andrea Rayfield', '0448 497 352', '', '', '', 'Andrea Rayfield', '', '', '186', '186 Little Bloomfield St', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(191, 'Margaret', 'Reid', 'Margaret Reid', '02 667665267', '', '', '', 'Margaret Reid', '', '', '26', '26 Rawson Ave', 'Avenue', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(192, 'Mel', 'Reid', 'Mel Reid', '0429 609656', '', '', 'mreid1@arm.catholic.edu.au', 'Mel Reid', '', '', '161', '161  Eloura Road', 'Road', 'Tintinhull', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(193, 'Alyce', 'Reily', 'Alyce Reily', '0431 576 520', '', '', 'alyce.rilly@gmail.com', 'Alyce Reily', '', '', '57', '57 Hall Street', 'Street', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(194, 'Kris', 'Reverr', 'Kris Reverr', '', '', '', '', 'Kris Reverr', '', '', '34', '34 Gill Street', 'Street', 'Moonbi', '', 'N.S.W', '2353', 'Opposite The Caravan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(195, 'Elizabeth', 'Richards', 'Elizabeth Richards', '', '', '', 'elizabethrichards778@gmail.com', 'Elizabeth Richards', '', '', '13', '13 Downton Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1');
INSERT INTO `fnfcustomer` (`customer_ID`, `firstName`, `lastName`, `contact`, `phone1`, `phone2`, `fax`, `email`, `billAddress1`, `billAddress2`, `billFlat`, `billStreetNumber`, `billStreet`, `billStreetType`, `billSuburb`, `billCity`, `billState`, `billPostcode`, `billNotes`, `deliveryTitle1`, `deliveryTitle2`, `deliveryFlat`, `DeliveryStreetNo`, `DeliveryStreetName`, `DeliveryStreetType`, `deliverySuburb`, `DeliveryCity`, `deliveryState`, `deliveryPostcode`, `deliveryNotes`, `Terms`, `Rep`, `Tax Code`, `Resale Num`, `Account No.`, `Credit Limit`, `active`) VALUES
(196, 'David', 'Richards', 'David Richards', '', '', '', 'david_richards81@bigpond.com', 'David Richards', '', '', '', '', '', 'Duri', '', 'N.S.W', '2344', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(197, 'Kylie', 'Riley', 'Kylie Riley', '', '', '', '', 'Kylie Riley', '', '', '22', '22 Glencoe Street', 'Street', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(198, 'Gabriela', 'Riveros', 'Gabriela Riveros', '0467 216 723', '', '', '', 'Gabriela Riveros', '', '', '20', '20 Little Beulah Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(199, 'Aileen', 'Roberts', 'Aileen Roberts', '', '', '', '', 'Aileen Roberts', '', '', '23', '23 Johns Drive', 'Drive', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(200, 'Taylah', 'Roberts', 'Taylah Roberts', '', '', '', '', 'Taylah Roberts', '', '', '72', '72 Ormans Lane', 'Lane', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(201, 'Tanya', 'Roberts', 'Tanya Roberts', '', '', '', '', 'Tanya Roberts', '', '', '11', '11 Porter Street', 'Street', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', 'of armidale rd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(202, 'Jo', 'Roberts', 'Jo Roberts', '0429 217 857', '', '', '', 'Roberts Mechanical', 'Jo Roberts', '', '3', 'Denison', 'Street', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(203, 'Alicia', 'Roberts', 'Alicia Roberts', '', '', '', 'aliciaannroberts@gmail.com', 'Alicia Roberts', '', '', '', '', '', '', '', 'N.S.W', '', 'Top State', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(204, 'Toni', 'Roberts-Northey', 'Toni Roberts-Northey', '0448 286 909', '', '', '', 'Toni Roberts-Northey', 'Services Club', '', '', '', '', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(205, 'Julie', 'Rodda', 'Julie Rodda', '', '', '', '', 'Julie Rodda', '', '', '33', '33 Kathleen Street', 'Street', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(206, 'Amber', 'Rodi', 'Amber Haley', '0403 498 411', '', '', '', 'Amber Rodi', '', '', '25', '25 Kurrajong Rd', 'Road', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(207, 'Ann', 'Rogers', 'Ann Rogers', '0419 673 282', '', '', 'annrogers2340@gmail.com', 'Ann Rogers', '', '', '119', '119 Hillvue Road', 'Road', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(208, 'Belinda', 'Rohriach', 'Belinda Rohriach', '0437 001 687', '', '', 'linnev73@bigpond.com', 'Belinda Rohrlach', '', '', '4', '4 Burdekin Place', 'Place', 'Westdale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(209, 'Tiffany', 'Rowe', 'Tiffany Rowe', '0401 925 922', '', '', 'tiffany.rowe1970@gmail.com', 'Tiffany Rowe', '', '', '11a', '11a Panorama Road', 'Road', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(210, 'Kathy', 'Rowe', 'Kathy Rowe', '0412 384 174', '', '', '', 'Kathy Rowe', '', '', '4', '4 Bligh Street', 'Street', '', '', 'N.S.W', '', 'NDIA office Suite 2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(211, 'Vicki', 'Roworth', 'Vicki Roworth', '0418 848 275', '', '', '', 'Vicki Roworth', '', '', '3', '3 Doonba Street', 'Street', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(212, 'Rebecca', 'Ruhmann', 'Rebecca Ruhmann', '409130706', '', '', 'ruhmann131@bigpond.com', 'Rebecca Ruhmann', '', '', '8', '8 Euroa Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(213, 'Christie', 'Rule', 'Christie Bendermeer', '0429 237 352', '', '', 'christierule@gmail.com', 'Christie Rule', '', '', '14', '14 Havannah St', 'Street', 'Bendemeer', '', 'N.S.W', '2355', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(214, 'Kerrie', 'Rule', 'Kerrie Rule', '0427 431 786', '', '', '', 'Kerrie Rule', '', '', '14', '14 Havannah st', 'Street', 'Bendermeer', '', 'N.S.W', '2355', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(215, 'Jo', 'Rust', 'Jo Rust', '0427 544631', '', '', '', 'Jo Rust', '', '', '24', '24 Warburton Drive', 'Drive', 'Westdale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(216, 'Olivia', 'Ryder', 'Olivia Ryder', '0418 284 706', '', '', 'olivia.morgan@bigpond.com', 'Olivia Ryder', 'Country Mile Signs', '', '6', '6 Duke Street', 'Street', 'Quirindi', '', 'N.S.W', '2343', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(217, 'Rowena', 'Salmon', 'Rowena Salmon', '0421 7666 531', '', '', '', 'Rowena Salmon', '', '', '424', '424 Conadilly Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(218, 'Stefanie', 'Salter', 'Stefanie Salter', '0421 358 717', '', '', '', 'Stefanie Salter', '', '', '32', '32 Garden Street', 'Street', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(219, 'Kerry', 'Sands', 'Kerry Sands', '0428 331 195', '', '', '', 'Kerry Sands', '', '', '17', '17 Carlyon Ave', 'Avenue', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(220, 'Bee', 'Saunders', 'Bee Saunders', '', '', '', '', 'Bee Saunders', '', '', '21', '21 Pine Street', 'Street', 'Kootingal', '', 'N.S.W', '2352', 'PICK UP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(221, 'Helena', 'Saunders', 'Helena Saunders', '67471668', '429044194', '', 'zsazsadog73@gmail.com', 'Helena Saunders', 'Truck Stop', '', '', '', '', 'Willow Tree', '', 'N.S.W', '2339', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(222, 'Sonya', 'Scharzenberger', 'Sonya Scharzenberger', '', '', '', '', 'Sonya Scharzenberger', '', '', '30', '30 Alexandra Street', 'Street', 'Oxleyvale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(223, 'Kaity', 'Scott', 'Kaity Scott', '', '', '', 'kaity0306@icloud.com', 'Kaity Scott', '', '', '36', '36 Yarmouth Pd', 'Parade', 'Oxleyvale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(224, 'Carl', 'Searle', 'Lauren & Carl Bailey', '', '', '', 'lmbailey1987@gmail.com', 'Carl Searle', '', '', '15', '15 Stewart Ave', 'Avenue', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', 'Hannafords Coaches', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(225, 'Elaine', 'Searle', 'Elaine Searle', '0413 375 023', '', '', '', 'Elaine Searle', '', '', '3', '3 Pages Lane', 'Lane', 'Kingswood', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(226, 'Kerrieann', 'Shanley', 'Kerrieann Shanley', '0411 843 525', '', '', '', 'Kerrieann Shanley', '', '', '48', '48 Sussex Street', 'Street', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(227, 'Kerry', 'Sharpe', 'Kerry Sharpe', '', '', '', '', 'Kerry Sharpe', '', '', '22', '22 Glen Alpha Close', 'Close', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(228, 'Jamie-Lee', 'Shaw', 'Jamie-Lee Shaw', '0427 689 521', '', '', '', 'Jamie-Lee Shaw', '', '', '21', '21 Shiraz Road', 'Road', '', '', 'N.S.W', '', 'Windmill Hill', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(229, 'Carrie', 'Sheard', 'Carrie Sheard', '0418 143 383', '', '', 'alancarriesheard@gmail.com', 'Carrie Sheard', '', '', '1170', '1170 Upper Moore Ck Road', 'Road', 'Moore Creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(230, 'Vicki', 'Shepherd', 'Vicki Shepherd', '0437 119 734', '', '', '', 'Vicki Shepherd', '', '', '', '', '', 'Nundle', '', 'N.S.W', '2340', 'Call when at woolimin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(231, 'Aimee', 'Sherf', 'Aimee Sherf', '0400 618 475', '', '', '', 'Aimee Sherf', '', '', '3', '3 Linden Place', 'Place', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(232, 'Jade', 'Sherwood', 'Jade Sherwood', '', '', '', '', 'Jade Sherwood', '', '', '', '', '', '', '', 'N.S.W', '', 'Next Door', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(233, 'Wendy', 'Simm', 'Wendy Simm', '', '', '', '', 'Wendy Simm', '', '', '', '8 Brushtail Drive', 'Drive', '', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(234, 'Steph', 'Simmoms', 'Steph Simmoms', '0439 429 914', '', '', 'stephsimmons5@gmail.com', 'Steph Simmoms', '', '', '79', '79 Warrah Drive', 'Drive', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(235, 'Amie', 'Simpson', 'Amie Simpson', '', '', '', 'events@tamworthjockeyclub.com.au', 'Amie Simpson', 'Jockey Club', '', '', '', '', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(236, 'Melissa', 'Simpson', 'Melissa Simpson', '', '', '', 'melissa.simpson@stgeorge.com.au', 'Melissa Simpson', '', '', '', '', '', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(237, 'Skye', 'Single', 'Skye Single', '0417 444 661', '', '', 'skyesingle@live.com.au', 'Skye Single', '', '', '60', '60 Yarrol Road', 'Road', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(238, 'Hana', 'Skilton', 'Hana Skilton', '', '', '', '', 'Hana Skilton', '', '', '121', '121 Piper Street', 'Street', 'North Tamworth', 'Tamworth', 'N.S.W', '2340', 'Late as Possible', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(239, 'Kevina', 'Sleiman', 'Kevina Sleiman', '', '', '', 'kevina.sleiman@hotmail.com', 'Kevina Sleiman', '', '', '6', '6 Peak Drive', 'Drive', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(240, 'Kelly & Gavin', 'Smith', 'Kelly & Gavin Smith', '0406 273 699', '0435 379 390', '', '', 'Kelly & Gavin Smith', '', '', '450', '450 Heiligmans Lane', 'Lane', 'Warral', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(241, 'Kel', 'Smith', 'Kel Smith', '0407 785 408', '', '', '', 'Kel Smith', '', '', '33', '33 Lindsay Road', 'Road', 'Westdale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(242, 'Karen', 'Smith', 'Karen Smith', ' 0402 900 384', '', '', 'kneyle@yahoo.com', 'Karen Smith', '', '', '57', '57 Sandy Rd', 'Road', 'Kootingal', '', 'N.S.W', '2352', 'First House on the left off the hwy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(243, 'Simone', 'Smith', 'Simone Smith', '', '', '', '', 'Simone Smith', '', '', '11', '11 Grant Street', 'Street', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(244, 'Kelly', 'Smith', 'Kelly Smith', '', '', '', '', 'Kelly Smith', '', '', '26', '26 Brolga Way', 'Way', 'Oxleyvale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(245, 'Codie', 'Sollars', 'Codie Sollars', '0411 772 582', '', '', '', 'Codie Sollars', '', '', '23', '23 Graham St', 'Street', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(246, 'Jess', 'Sowter', 'Jess Sowter', '', '', '', '', 'Jess Sowter', '', '', '157', '157 Caroline Street', 'Street', 'Bendemeer', '', 'N.S.W', '2355', 'Police Station', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(247, 'Fran', 'Squire', 'Fran Squire', '', '', '', 'fransquire@gmail.com', 'Fran Squire', '', '', '11', '111 Stafford Street', 'Street', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(248, 'Mags', 'Staley', 'Mags Staley', '', '', '', 'mstaley@questapartments.com.au', 'Mags Staley', 'Quest Appartments', '', '337', '337 Armidale Rd', 'Road', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(249, 'Megan', 'Stead', 'Megan Stead', '0437 651 906', '', '', 'meganstead79@gmail.com', 'Megan Stead', '', '', '15', '15 Stewart Ave', 'Avenue', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', 'Order 2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(250, 'Penny', 'Stewart', 'Pennu Stewart', '', '', '', '', 'Penny Stewart', '', '', '81', '81 Lincoln Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(251, 'Leeanne', 'Stubs', 'Leeanne Stubs', '0408 668 049', '', '', '', 'Leeanne Stubs', '', '', '10', '10 Merrinee Place', 'Place', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(252, 'Carol', 'Stuckings', 'Carol Stuckings', '0435 353 793', '', '', '', 'Carol Stuckings', '', '', '33', '33 Ridge Street', 'Street', 'Attunga', '', 'N.S.W', '2345', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(253, 'Alicia', 'Studdert', 'Alicia Studdert', '0407 973 327', '', '', '', 'Alicia Studdert', '', '', '10', '10 Favell Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(254, 'Russel & Isabell', 'Styman', 'Russel & Isabell Styman', '0407 293 181', '', '', 'rnistyman@westnet.com.au', 'Russel & Isabell Styman', '', '', '50', '50 Denison Street', 'Street', '', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(255, 'Rylka', 'Summerfield', 'Rylka Summerfield', '0408 631 253', '', '', '', 'Rylka Summerfield', '', '', '47', '47 Stoddart Street', 'Street', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(256, 'Georgie', 'Sumpter', 'Georgie Sumpter', '0487 448251', '', '', '', 'Georgie Sumpter', '', '', '36', '36 Edward Street', 'Street', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', 'after2pm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(257, 'Cassie', 'Sutherland', 'Cassie Sutherland', '0400 962 043', '', '', '', 'Cassie Sutherland', '', '', '1085', '1085 Wallabadah Road', 'Road', 'Quirindi', '', 'N.S.W', '2343', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(258, 'Raegan', 'Sutherland', 'Raegan Sutherland', '', '', '', 'raegan.sutherland@det.nsw.edu.au', 'Raegan Sutherland', '', '', '86', '86 Gill Street', 'Street', 'Nundle', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(259, 'Shirley & Shane', 'Sutton', 'Shirley & Shane Sutton', '', '', '', '', 'Shirley & Shane Sutton', '', '', '146', '146 Dewhurst Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(260, 'Jenny', 'Swain', 'jenny Swain', '0447 613 661', '', '', 'jennifer.m.swain@det.nsw.edu.au', 'Jenny Swain', '', '', '1411', '1411 Manilla Road', 'Road', 'Hallsville', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(261, 'Kerry', 'Swain', 'Kerry Swain', '', '', '', 'cottageonthehill@icloud.com', 'Kerry Swain', '', '', '52', '52 Gill St', 'Street', 'Nundle', '', 'N.S.W', '2340', 'Leave on back table', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(262, 'Jodi', 'Swain', 'Jodi Swan', '413816555', '', '', 'cottageonthehill@icloud.com', 'Jodi Swain', 'Post Office', '', '', '', '', 'Nundle', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(263, 'Aimee', 'Swan', 'Aimee Swan', '', '', '', 'akswan85@gmail.com', 'Aimee Swan', '', '', '22', '22 Kingham Street', 'Street', 'North Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(264, 'Charles', 'Swan', 'Charissa Swan', '488203884', '', '', '', 'Charissa Swan', '', '', '44', 'Attunga ', 'Street', 'Attunga', '', 'N.S.W', '2345', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(265, 'Rebecca', 'Taggart', 'Rebecca Ta', '0427 434 156', '', '', 'taggart4@bigpond.com', 'Rebecca Taggart', '', '', '112', '112 Ormans Lane', 'Lane', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(266, 'Angie', 'Tan', 'Angie Tan', '0477 867 443', '', '', '', 'Angie Tan', '', '', '77', '77 Punyarra Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(267, 'Penny', 'Taylor', 'Penny Taylor', '0427 719 366', '', '', '', 'Penny Taylor', '', '', '41', '41 Eagle Ave', 'Avenue', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(268, 'Jessica', 'Taylor', 'Jessica Taylor', '', '', '', '', 'Jessica Taylor', '', '', '3', '3 Flour Mill Road', 'Road', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(269, 'Tanya', 'Taylor', 'Tanya Taylor', '', '', '', '', 'Tanya Taylor', '', '', '11', '11 Porter Street', 'Street', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(270, 'Eric & Anne', 'Taylor', 'Eric & Anne Taylor', '428821966', '0428 881 830', '', '', 'Eric & Anne Taylor', '', '', '28', '28 Wallamoul Street', 'Street', 'Oxleyvale', 'Tamworth', 'N.S.W', '2340', 'After 3pm', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(271, 'Natalie', 'Taylor', 'Natalie Taylor', '', '', '', 'natalie-stevens@hotmail.com', 'Natalie Taylor', '', '', '27', '27 Banks Street', 'Street', 'Westdale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(272, 'Kathy', 'Thomas', 'Kathy Thomas', '0411 414 782', '', '', 'Kathy.Thomas@anz.com', 'Kathy Thomas', '', '', '1', '1 Poolya Ave', 'Avenue', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '       Leave on Veranda, ANZ Bank', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(273, 'Jean', 'Thomas', 'Jean Thomas', '422170578', '', '', '', 'Jean Thomas', '', '9', '11', 'Nundle Road', 'Road', '', '', 'N.S.W', '', 'Woolomin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(274, 'Lisa', 'Thomas', 'Lisa Thomas', '', '', '', '', 'Lisa Thomas', '', '', '21', '21 Railway Street', 'Street', 'Nemingha', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(275, 'Karlie', 'Thompson', 'Karlie Thompson', '', '', '', 'karlz_9@hotmail.com', 'Karlie Thompson', '', '', '1', '1 John Stuart Close', 'Close', 'Westdale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(276, 'Donna', 'Tickle', 'Donna Tickle', '', '', '', '', 'Donna Tickle', 'Woolomin Shop', '', '', '', '', '', '', 'N.S.W', '', 'Woolomin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(277, 'Jo', 'Tighe', 'Jo Tighe', '', '', '', 'jtighe3@hotmail.com', 'Jo Tighe', '', '', '15', '15 Noobillia Ave', 'Avenue', 'Hillvue', 'Tamworth', 'N.S.W', '2340', 'If no one home please leave around the back on the table', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(278, 'Jade', 'Tregaskes', 'Jade Tregaskes', '', '', '', '', 'Jade Tregaskes', '', '', '79', '79 Church Ave', 'Avenue', 'Quirindi', '', 'N.S.W', '2343', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(279, 'Sally', 'Turner', 'Sally Turner', '0448 609 904', '', '', 'salandjt@bigpond.com', 'Sally Turner', '', '', '24', '24 Upper Street', 'Street', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(280, 'Adam', 'Urquhart', 'Adam Urquhart', '434413106', '', '', '', 'Adam Urquhart', '', '', '6a', '6a Iris Close', 'Court', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(281, 'Ellen', 'Valler', 'Ellen Valler', '0458 158 999', '', '', '', 'Ellen Valler', '', '', '10', 'White', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(282, 'Kristie', 'Vanderwerf', 'Kristie Vaerfnder', '0439 425 631', '', '', 'thevandyz@icloud.com', 'Kristie Vaerfnder', '', '', '17', '17 Jodie Court', 'Court', 'Moore Creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(283, 'Bianca', 'Vernon', 'Bianca Vernon', '0432 809 924', '', '', 'bianca.martin6@gmail.com', 'Bianca Vernon', '', '', '53', '53 Amaroo Road', 'Road', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(284, 'Michelle', 'Volk', 'Michelle Volk', '438450186', '', '', '', 'Michelle Volk', '', '', '94', '94 Verdelho Drive', 'Drive', '', '', 'N.S.W', '', 'Windmill Hill Off Browns Lane', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(285, 'Julie', 'Wainwright', 'Julie Wainwright', '0458 281 166', '', '', '', 'Julie Wainwright', '', '', '100', '100 Fitzroy Street', 'Street', '', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(286, 'Samantha', 'Walker', 'Samantha Walker', '0405 287 040', '', '', '', 'Samantha Walker', '', '', '24', '24 Baird Cres', 'Cresent', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(287, 'Sarah', 'Wallace', 'Sarah Wallace', '', '', '', 'sarz.55@hotmail.com', 'Sarah Wallace', '', '', '7', '7 Ayrshire Cres', 'Cresent', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(288, 'Jazmine', 'Ware', 'Jazmine Ware', '', '', '', '', 'Jazmine Ware', '', '', '4', '4 Lancaster Ave', 'Avenue', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(289, 'Taylor', 'Ware', 'Taylor Ware', '448817538', '', '', '', 'Taylor Ware', '', '', '39', '39 Railway ave', 'Avenue', 'Duri', '', 'N.S.W', '2344', 'Left at Front Door', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(290, 'Mandy', 'Ware', 'Mandy Ware', '', '', '', 'wungum@bigpond.com', 'Mandy Ware', '', '', '39', '39 Railway Ave', 'Avenue', 'Duri', '', 'N.S.W', '2344', 'Leave on front verenda', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(291, 'Katrina', 'Wark', 'Katrina Wark', '', '', '', '', 'Katrina Wark', '', '', '13a', '13a Barber Street', 'Street', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(292, 'Kym', 'Watkins', 'Kym Watkins', '0427 056 474', '', '', '', 'Kym Watkins', '', '', '10', '10 Yarmouth Pd', 'Parade', 'Oxleyvale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(293, 'Amanda', 'Watson', 'Amanda Watson', '0429 952 109', '', '', '', 'Amanda Watson', '', '', '9', '9 Bemboka Court', 'Court', 'Moore Creek', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(294, 'Allie', 'White', 'Allie White', '', '', '', '', 'Allie White', '', '', '149', '149 Caroline Street', 'Street', 'Bendemeer', '', 'N.S.W', '2355', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(295, 'Sue Ellen', 'Wilkin', 'Sue Ellen Wilkin', '', '', '', '', 'Sue Ellen Wilkin', '', '', '44', '44 Lemon Gums Drive', 'Drive', 'Oxleyvale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(296, 'Jodie', 'Wilkinson', 'Jodie Wilkinson', '0439 803 965', '', '', 'jodie.wilk3965@gmail.com', 'Jodie Wilkinson', '', '', '275', '275 Daruka Road', 'Road', 'Daruka', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(297, 'Heylee', 'Williams', 'Heylee Williams', '0421 162 088', '', '', '', 'Heylee Williams', '', '', '19', '19 Reginald Drive', 'Drive', 'Kootingal', '', 'N.S.W', '2352', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(298, 'Janette', 'Williams', 'Janette Williams', '418268952', '67652011', '', '', 'Janette Williams', '', '', '33', '33 Renindi Road', 'Road', 'Nemingha', '', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(299, 'Teres', 'Williams', 'Teres Williams', '0418 415 354', '', '', '', 'Teres Williams', '', '', '12', '12 Dally St', 'Street', 'Quirindi', '', 'N.S.W', '2343', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(300, 'Wendy', 'Willis', 'Wendy Willis', '0458 609 974', '0458 609 974', '', 'mw.willis5@bigpond.com', 'Wendy Willis', '', '', '3', '3 Warramunga Av', 'Avenue', 'East Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(301, 'Sue & Leo', 'Winsor', 'Sue & Leo Winsor', '0403 486 144', '', '', '', 'Sue & Leo Winsor', '', '', '9', '9 Marcia Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(302, 'Lexy', 'Woods', 'Lexy Woods', '', '', '', 'lexyj2423@outlook.com', 'Lexy Woods', '', '', '96', '96 Church Street', 'Street', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(303, 'Amber', 'Woods', 'Amber Woods', '0488 501 219', '', '', '', 'Amber Woods', '', '', '11', '11 Wattle Street', 'Street', 'Gunnedah', '', 'N.S.W', '2380', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(304, 'Barbara', 'Woods', 'Barbara Woods', '0417 687 057', '', '', '', 'Barbara Woods', '', '', '141', '141 Dewhurst Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(305, 'Robyn', 'Woods', 'Robyn Woods', '', '', '', '', 'Robyn Woods', '', '', '16', '16 Mclachlan Street', 'Street', 'Werris Creek', '', 'N.S.W', '2341', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(306, 'Kylie', 'Wright', 'Kylie Wright', '', '', '', '', 'Kylie Wright', '', '', '93', '93 Wilburtree Street', 'Street', 'South Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(307, 'Renee', 'Wrigley', 'Renee Wrigley', '423051311', '', '', 'wrignee@hotmail.com', 'Renee Wrigley', '', '', '117', '117 Calala Lane', 'Lane', 'Calala', ' Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(308, 'N', 'Wynwood', 'N Wynwood', '0409 226 430', '', '', '', 'N Wynwood', '', '', '161', '161 New Winton Road', 'Road', 'Westdale', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(309, 'Sue', 'Yates', 'Sue Yates', '0427 786 463', '', '', '', 'Sue Yates', '', '', '6', '6 Wimbourne Road', 'Road', 'Manilla', '', 'N.S.W', '2346', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(310, 'Kylie', 'Young', 'Kylie Young', '', '', '', 'kylieyoung80@gmail.com', 'Kylie Young', '', '', '65', '65 Hillvue Road', 'Road', 'Hillvue', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', 'Net 15', '', '', '', '', '', '1'),
(311, 'Wendy', 'Young', 'Wendy Young', '', '', '', '', 'Wendy Young', '', '', '', 'Jean', 'Street', '', '', 'N.S.W', '', 'Zandie deliver', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(312, 'Amanda', 'Young', 'Amanda Young', '', '', '', '', 'Amanda Young', '', '', '', 'Kent', 'Street', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(313, 'Rachel', 'Young', 'Rachel Young', '', '', '', '', 'Jockey Club', 'Rachel Young', '', '', '', '', '', '', 'N.S.W', '', 'PICK UP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(314, 'Yulia', 'Yulia', 'Yulia', '429067522', '', '', '', 'Yulia', '', '', '6', 'Falcon', 'Drive', 'Calala', ' Tamworth', 'N.S.W', '2340', 'Lampada Estate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(315, '', '', '', '', '', '', '', 'Lacey Wilson', '', '', '56', '56 Suttons Rd', 'Road', 'Quirindi', '', 'N.S.W', '2343', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(316, '', '', '', '', '', '', '', 'Jenny Simpson', '', '', '45', '45 Ridge St', 'Street', 'West Tamworth', 'Tamworth', 'N.S.W', '2340', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(317, '', '', '', '', '', '', '', 'Job link Plus', '', '', '240', 'George', 'Street', 'Quirindi', '', 'N.S.W', '2343', 'Job link Plus', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(318, 'Nicko', '', '', '', '', '', '', 'Nicko', '', '', '', '', '', '', '', 'N.S.W', '', 'Next Door', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1'),
(319, 'Ward', '', '', '', '', '', '', 'WARD', '', '', '', '', '', '', '', 'N.S.W', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `status` enum('Pending','Delivery','Completed','Cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `ptid` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` float(8,2) NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `item_number` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `currency_code` varchar(55) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_response` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(13) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productBlurb` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `archive` enum('1','0') NOT NULL DEFAULT '0',
  `cid` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ptid` int(13) NOT NULL,
  `ptName` varchar(255) NOT NULL,
  `ptImage` varchar(255) NOT NULL,
  `kilo` float(8,2) NOT NULL DEFAULT 0.00,
  `box` float(8,2) NOT NULL DEFAULT 0.00,
  `punnet` float(8,2) NOT NULL DEFAULT 0.00,
  `bunch` float(8,2) NOT NULL DEFAULT 0.00,
  `single` float(8,2) NOT NULL DEFAULT 0.00,
  `ptBlurb` longtext NOT NULL,
  `ptReceipe` longtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `archive` enum('1','0') NOT NULL DEFAULT '0',
  `pid` int(13) NOT NULL,
  `cid` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `sid` int(13) NOT NULL,
  `specialTitle` varchar(255) NOT NULL,
  `specialBlurb` varchar(255) NOT NULL,
  `specialImage` varchar(255) NOT NULL,
  `ptid` int(13) NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `sid` int(13) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `supplierPhone` int(13) NOT NULL,
  `supplierAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `uomid` tinyint(4) NOT NULL,
  `uomName` varchar(255) NOT NULL,
  `uomShort` varchar(255) NOT NULL,
  `uomLong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `uid` int(11) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fName`, `lName`, `email`, `password`, `comment`) VALUES
(1, '', '', 'scot.henderson@outlook.com', '1234', ''),
(2, '', '', 'slim@fastnfreshproduce.com.au', '1234', ''),
(3, '', '', 'kate@fastnfreshproduce.com.au', '1234', ''),
(3, '', '', 'admin@fastnfreshproduce.com.au', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `oauth_provider` enum('facebook','google','twitter','') COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `password`, `email`, `phone`, `gender`, `picture`, `link`, `created`, `modified`, `active`) VALUES
(1, '', '', 'Scot', 'Henderson', '', 'scot.henderson@outlook.com', '0413482763', NULL, '', '', '2021-01-20 18:27:45', '0000-00-00 00:00:00', '1'),
(2, '', '', '', '', '1234', 'kate.hawkins@hotmail.com', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(3, '', '', '', '', '1234', 'slim@hotmail.com', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(4, '', '', '', '', '', '', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(5, '', '', '', '', '1234', 'karen.hopkins@sa.gov.au', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(6, '', '', '', '', '1234', 'kate.hawkins@hotmail.com', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(7, '', '', '', '', '1234', 'anw@lkfdj.com', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(8, '', '', '', '', '', '', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(9, '', '', '', '', '', '', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(10, '', '', '', '', '1234', 'anw@lkfdj.com', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(11, '', '', '', '', '', '', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(12, '', '', '', '', '', '', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(13, '', '', '', '', '', '', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(14, '', '', '', '', '1234', 'anw@lkfdj.com', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(15, '', '', '', '', '1234', 'scot.henderson@outlook.com', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(16, '', '', '', '', '1234', 'anyone@anywhere.com', '', NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

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
  MODIFY `bid` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fnfbusiness`
--
ALTER TABLE `fnfbusiness`
  MODIFY `business_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `fnfcustomer`
--
ALTER TABLE `fnfcustomer`
  MODIFY `customer_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `ptid` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `special`
--
ALTER TABLE `special`
  MODIFY `sid` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sid` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `uomid` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
