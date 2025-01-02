-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2025 at 02:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RMS_Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Brands`
--

CREATE TABLE `Brands` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(255) NOT NULL,
  `ImageFile` varchar(255) DEFAULT NULL,
  `CountryName` varchar(50) DEFAULT NULL,
  `CreatedBy` varchar(255) NOT NULL DEFAULT 'admin',
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Brands`
--

INSERT INTO `Brands` (`BrandID`, `BrandName`, `ImageFile`, `CountryName`, `CreatedBy`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'Apple', 'apple.png', 'United States', 'admin', 'Inactive', '2025-01-01 08:53:23', '2025-01-02 05:01:07'),
(2, 'Samsung', 'samsung.png', 'South Korea', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(3, 'Sony', 'sony.png', 'Japan', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(4, 'Huawei', 'huawei.png', 'China', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(5, 'Xiaomi', 'xiaomi.png', 'China', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(6, 'Oppo', 'oppo.png', 'China', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(7, 'Vivo', 'vivo.png', 'China', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(8, 'Dell', 'dell.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(9, 'HP', 'hp.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(10, 'Lenovo', 'lenovo.png', 'China', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(11, 'Nike', 'nike.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(12, 'Adidas', 'adidas.png', 'Germany', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(13, 'H&M', 'hm.png', 'Sweden', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(14, 'Zara', 'zara.png', 'Spain', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(15, 'Uniqlo', 'uniqlo.png', 'Japan', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(16, 'Levi\'s', 'levis.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(17, 'Gucci', 'gucci.png', 'Italy', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(18, 'Chanel', 'chanel.png', 'France', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(19, 'Puma', 'puma.png', 'Germany', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(20, 'Burberry', 'burberry.png', 'United Kingdom', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(21, 'Coca-Cola', 'coca_cola.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(22, 'Pepsi', 'pepsi.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(23, 'Nestle', 'nestle.png', 'Switzerland', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(24, 'Starbucks', 'starbucks.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(25, 'McDonald\'s', 'mcdonalds.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(26, 'Burger King', 'burger_king.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(27, 'KFC', 'kfc.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(28, 'Domino\'s Pizza', 'dominos_pizza.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(29, 'Red Bull', 'red_bull.png', 'Austria', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(30, 'Heineken', 'heineken.png', 'Netherlands', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(31, 'Toyota', 'toyota.png', 'Japan', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(32, 'Ford', 'ford.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(33, 'Honda', 'honda.png', 'Japan', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(34, 'Hyundai', 'hyundai.png', 'South Korea', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(35, 'BMW', 'bmw.png', 'Germany', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(36, 'Mercedes-Benz', 'mercedes.png', 'Germany', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(37, 'Tesla', 'tesla.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(38, 'Volkswagen', 'volkswagen.png', 'Germany', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(39, 'Nissan', 'nissan.png', 'Japan', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(40, 'Suzuki', 'suzuki.png', 'Japan', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(41, 'Pfizer', 'pfizer.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(42, 'Johnson & Johnson', 'jnj.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(43, 'Sanofi', 'sanofi.png', 'France', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(44, 'Bayer', 'bayer.png', 'Germany', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(45, 'Novartis', 'novartis.png', 'Switzerland', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(46, 'GSK', 'gsk.png', 'United Kingdom', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(47, 'AbbVie', 'abbvie.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(48, 'AstraZeneca', 'astrazeneca.png', 'United Kingdom', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(49, 'Moderna', 'moderna.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(50, 'Merck', 'merck.png', 'Germany', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(51, 'Amazon', 'amazon.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(52, 'Walmart', 'walmart.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(53, 'Target', 'target.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(54, 'eBay', 'ebay.png', 'United States', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(55, 'Alibaba', 'alibaba.png', 'China', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(56, 'Flipkart', 'flipkart.png', 'India', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(57, 'Rakuten', 'rakuten.png', 'Japan', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(58, 'Carrefour', 'carrefour.png', 'France', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(59, 'Tesco', 'tesco.png', 'United Kingdom', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(60, 'IKEA', 'ikea.png', 'Sweden', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(61, 'MPT', 'mpt.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(62, 'Ooredoo Myanmar', 'ooredoo.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(63, 'Atom Myanmar', 'telenor.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-02 06:36:05'),
(64, 'Myanmar Beer', 'myanmar_beer.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(65, 'ABC Stout', 'abc_stout.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(66, 'Shwe Taung Noodle', 'shwe_taung_noodle.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(67, 'Mahar Tea', 'mahar_tea.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(68, 'Lotus Myanmar', 'lotus_myanmar.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(69, 'Yangon Fashion', 'yangon_fashion.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(70, 'Khine Phone Electronics', 'khine_phone.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:53:23', '2025-01-01 19:22:03'),
(71, 'MyTel', 'mytel.png', 'Myanmar', 'admin', 'Active', '2025-01-01 08:56:03', '2025-01-01 19:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `CategoryCode` varchar(50) NOT NULL,
  `ImageFile` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `Status` enum('Active','Inactive') DEFAULT 'Active',
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`CategoryID`, `CategoryName`, `CategoryCode`, `ImageFile`, `Description`, `CreatedBy`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'Electronics', 'ELEC001', 'electronics.png', 'All electronic devices', 'admin', 'Active', '2025-01-01 07:40:51', '2025-01-01 18:40:30'),
(2, 'Appliances', 'ELEC002', 'appliances.png', 'Home and kitchen appliances', 'admin', 'Active', '2025-01-01 07:40:51', '2025-01-01 18:40:30'),
(3, 'Clothing', 'CLOT001', 'clothing.png', 'Apparel and accessories', 'admin', 'Active', '2025-01-01 07:40:51', '2025-01-01 18:40:30'),
(4, 'Shoes', 'CLOT002', 'shoes.png', 'Footwear for all ages', 'admin', 'Active', '2025-01-01 07:40:51', '2025-01-01 18:40:30'),
(5, 'Home & Kitchen', 'HOME001', 'home_kitchen.png', 'Home appliances and kitchenware', 'admin', 'Active', '2025-01-01 07:40:51', '2025-01-01 18:40:30'),
(6, 'Sports', 'SPORT001', 'sports.png', 'Sports equipment and apparel', 'admin', 'Active', '2025-01-01 07:40:51', '2025-01-01 18:40:30'),
(7, 'Baby Products', 'KIDS002', 'baby_products.png', 'Essentials for babies and toddlers', 'admin', 'Active', '2025-01-01 07:40:51', '2025-01-01 18:40:30'),
(8, 'Office Supplies', 'OFFICE001', 'office_supplies.png', 'Stationery and office products', 'admin', 'Active', '2025-01-01 07:40:51', '2025-01-01 18:40:30'),
(9, 'Computers & Accessories', 'OFFICE002', 'computers_accessories.png', 'Desktops, laptops, and peripherals', 'admin', 'Active', '2025-01-01 07:40:51', '2025-01-01 18:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `CategoryBrand`
--

CREATE TABLE `CategoryBrand` (
  `ID` int(11) NOT NULL,
  `BrandID` int(11) NOT NULL,
  `CategoryCode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CategoryBrand`
--

INSERT INTO `CategoryBrand` (`ID`, `BrandID`, `CategoryCode`) VALUES
(1, 1, 'ELEC001'),
(2, 2, 'ELEC001'),
(3, 3, 'ELEC001'),
(4, 4, 'ELEC001'),
(5, 5, 'ELEC001'),
(6, 6, 'ELEC001'),
(7, 7, 'ELEC001'),
(8, 8, 'ELEC002'),
(9, 9, 'ELEC002'),
(10, 10, 'OFFICE002'),
(14, 11, 'CLOT001'),
(11, 11, 'ELEC001'),
(15, 12, 'CLOT001'),
(12, 12, 'ELEC001'),
(16, 13, 'CLOT001'),
(13, 13, 'ELEC001'),
(17, 14, 'CLOT001'),
(18, 15, 'CLOT001'),
(19, 16, 'CLOT001'),
(20, 17, 'CLOT001'),
(21, 18, 'CLOT001'),
(22, 19, 'CLOT001'),
(23, 20, 'CLOT002'),
(24, 21, 'CLOT002'),
(25, 22, 'CLOT002'),
(26, 22, 'HOME001'),
(27, 23, 'HOME001'),
(28, 24, 'HOME001'),
(29, 25, 'HOME001'),
(30, 26, 'HOME001'),
(31, 27, 'HOME001'),
(32, 28, 'HOME001'),
(33, 29, 'HOME001'),
(34, 30, 'HOME001'),
(35, 31, 'HOME001'),
(36, 32, 'HOME001'),
(37, 32, 'SPORT001'),
(38, 33, 'SPORT001'),
(39, 34, 'SPORT001'),
(40, 35, 'SPORT001'),
(41, 36, 'SPORT001'),
(42, 37, 'SPORT001'),
(43, 38, 'SPORT001'),
(44, 39, 'SPORT001'),
(45, 40, 'SPORT001'),
(46, 41, 'SPORT001'),
(47, 42, 'SPORT001'),
(48, 43, 'SPORT001'),
(50, 44, 'HOME001'),
(49, 44, 'SPORT001'),
(51, 45, 'HOME001'),
(52, 46, 'HOME001'),
(53, 47, 'HOME001'),
(54, 48, 'HOME001'),
(55, 49, 'HOME001'),
(56, 50, 'HOME001'),
(57, 51, 'HOME001'),
(60, 51, 'OFFICE002'),
(58, 52, 'HOME001'),
(61, 52, 'OFFICE002'),
(59, 53, 'HOME001'),
(62, 53, 'OFFICE002'),
(63, 54, 'OFFICE002'),
(64, 55, 'OFFICE002'),
(65, 56, 'OFFICE002'),
(66, 57, 'OFFICE002'),
(67, 58, 'OFFICE002'),
(68, 59, 'OFFICE002'),
(69, 60, 'OFFICE002'),
(70, 61, 'OFFICE002'),
(71, 62, 'OFFICE002'),
(72, 63, 'OFFICE002'),
(73, 64, 'HOME001'),
(74, 65, 'HOME001'),
(75, 66, 'HOME001'),
(76, 67, 'HOME001'),
(77, 68, 'CLOT001'),
(78, 69, 'CLOT001'),
(79, 70, 'ELEC001'),
(80, 71, 'ELEC001');

-- --------------------------------------------------------

--
-- Table structure for table `CategoryBrandSubcategory`
--

CREATE TABLE `CategoryBrandSubcategory` (
  `ID` int(11) NOT NULL,
  `BrandID` int(11) NOT NULL,
  `CategoryCode` varchar(50) NOT NULL,
  `SubcategoryCode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CategoryBrandSubcategory`
--

INSERT INTO `CategoryBrandSubcategory` (`ID`, `BrandID`, `CategoryCode`, `SubcategoryCode`) VALUES
(1, 1, 'ELEC001', 'ELEC_SUB001'),
(2, 1, 'ELEC001', 'ELEC_SUB002'),
(3, 1, 'ELEC001', 'ELEC_SUB003'),
(4, 2, 'ELEC001', 'ELEC_SUB001'),
(5, 2, 'ELEC001', 'ELEC_SUB002'),
(6, 2, 'ELEC001', 'ELEC_SUB004'),
(7, 3, 'ELEC001', 'ELEC_SUB003'),
(8, 3, 'ELEC001', 'ELEC_SUB004'),
(9, 4, 'ELEC001', 'ELEC_SUB005'),
(10, 5, 'ELEC001', 'ELEC_SUB005'),
(11, 6, 'ELEC001', 'ELEC_SUB006'),
(12, 7, 'ELEC001', 'ELEC_SUB007'),
(13, 8, 'ELEC002', 'ELEC_SUB011'),
(66, 9, 'ELEC001', 'ELEC_SUB001'),
(67, 9, 'ELEC001', 'ELEC_SUB002'),
(14, 9, 'ELEC002', 'ELEC_SUB012'),
(68, 10, 'ELEC001', 'ELEC_SUB003'),
(15, 10, 'ELEC002', 'ELEC_SUB013'),
(16, 11, 'CLOT001', 'CLOT_SUB001'),
(69, 11, 'ELEC001', 'ELEC_SUB004'),
(17, 12, 'CLOT001', 'CLOT_SUB002'),
(70, 12, 'ELEC001', 'ELEC_SUB005'),
(18, 13, 'CLOT001', 'CLOT_SUB003'),
(71, 13, 'ELEC001', 'ELEC_SUB006'),
(19, 14, 'CLOT001', 'CLOT_SUB004'),
(72, 14, 'ELEC001', 'ELEC_SUB007'),
(20, 15, 'CLOT001', 'CLOT_SUB005'),
(73, 15, 'ELEC001', 'ELEC_SUB008'),
(21, 16, 'CLOT001', 'CLOT_SUB006'),
(74, 16, 'ELEC001', 'ELEC_SUB009'),
(22, 17, 'CLOT001', 'CLOT_SUB007'),
(75, 17, 'ELEC001', 'ELEC_SUB010'),
(23, 18, 'CLOT001', 'CLOT_SUB008'),
(76, 18, 'ELEC001', 'ELEC_SUB011'),
(24, 19, 'CLOT002', 'CLOT_SUB009'),
(77, 19, 'ELEC001', 'ELEC_SUB012'),
(25, 20, 'CLOT002', 'CLOT_SUB010'),
(78, 20, 'ELEC001', 'ELEC_SUB013'),
(79, 21, 'ELEC001', 'ELEC_SUB014'),
(26, 21, 'SPORT001', 'SPORT_SUB001'),
(80, 22, 'ELEC002', 'ELEC_SUB015'),
(27, 22, 'SPORT001', 'SPORT_SUB002'),
(81, 23, 'ELEC002', 'ELEC_SUB016'),
(28, 23, 'SPORT001', 'SPORT_SUB003'),
(82, 24, 'ELEC002', 'ELEC_SUB017'),
(29, 24, 'SPORT001', 'SPORT_SUB004'),
(83, 25, 'ELEC002', 'ELEC_SUB018'),
(30, 25, 'SPORT001', 'SPORT_SUB005'),
(84, 26, 'ELEC002', 'ELEC_SUB019'),
(31, 26, 'SPORT001', 'SPORT_SUB006'),
(85, 27, 'ELEC002', 'ELEC_SUB020'),
(32, 27, 'SPORT001', 'SPORT_SUB007'),
(86, 28, 'CLOT001', 'CLOT_SUB001'),
(33, 28, 'SPORT001', 'SPORT_SUB008'),
(87, 29, 'CLOT001', 'CLOT_SUB002'),
(34, 29, 'SPORT001', 'SPORT_SUB009'),
(88, 30, 'CLOT001', 'CLOT_SUB003'),
(35, 30, 'SPORT001', 'SPORT_SUB010'),
(89, 31, 'CLOT001', 'CLOT_SUB004'),
(36, 31, 'KIDS002', 'KIDS_SUB011'),
(90, 32, 'CLOT001', 'CLOT_SUB005'),
(37, 32, 'KIDS002', 'KIDS_SUB012'),
(91, 33, 'CLOT001', 'CLOT_SUB006'),
(38, 33, 'KIDS002', 'KIDS_SUB013'),
(92, 34, 'CLOT001', 'CLOT_SUB007'),
(39, 34, 'KIDS002', 'KIDS_SUB014'),
(93, 35, 'CLOT001', 'CLOT_SUB008'),
(40, 35, 'KIDS002', 'KIDS_SUB015'),
(94, 36, 'CLOT001', 'CLOT_SUB009'),
(41, 36, 'KIDS002', 'KIDS_SUB016'),
(95, 37, 'CLOT002', 'CLOT_SUB010'),
(42, 37, 'KIDS002', 'KIDS_SUB017'),
(96, 38, 'CLOT002', 'CLOT_SUB011'),
(43, 38, 'KIDS002', 'KIDS_SUB018'),
(97, 39, 'CLOT002', 'CLOT_SUB012'),
(44, 39, 'KIDS002', 'KIDS_SUB019'),
(98, 40, 'CLOT002', 'CLOT_SUB013'),
(45, 40, 'KIDS002', 'KIDS_SUB020'),
(99, 41, 'CLOT002', 'CLOT_SUB014'),
(46, 41, 'OFFICE001', 'OFFICE_SUB011'),
(100, 42, 'CLOT002', 'CLOT_SUB015'),
(47, 42, 'OFFICE001', 'OFFICE_SUB012'),
(101, 43, 'CLOT002', 'CLOT_SUB016'),
(48, 43, 'OFFICE001', 'OFFICE_SUB013'),
(102, 44, 'CLOT002', 'CLOT_SUB017'),
(49, 44, 'OFFICE001', 'OFFICE_SUB014'),
(103, 45, 'CLOT002', 'CLOT_SUB018'),
(50, 45, 'OFFICE001', 'OFFICE_SUB015'),
(104, 46, 'CLOT002', 'CLOT_SUB019'),
(51, 46, 'OFFICE001', 'OFFICE_SUB016'),
(105, 47, 'KIDS002', 'KIDS_SUB011'),
(52, 47, 'OFFICE001', 'OFFICE_SUB017'),
(106, 48, 'KIDS002', 'KIDS_SUB012'),
(53, 48, 'OFFICE001', 'OFFICE_SUB018'),
(107, 49, 'KIDS002', 'KIDS_SUB013'),
(54, 49, 'OFFICE001', 'OFFICE_SUB019'),
(108, 50, 'KIDS002', 'KIDS_SUB014'),
(55, 50, 'OFFICE001', 'OFFICE_SUB020'),
(109, 51, 'KIDS002', 'KIDS_SUB015'),
(56, 51, 'OFFICE002', 'OFFICE_SUB021'),
(110, 52, 'KIDS002', 'KIDS_SUB016'),
(57, 52, 'OFFICE002', 'OFFICE_SUB022'),
(111, 53, 'KIDS002', 'KIDS_SUB017'),
(58, 53, 'OFFICE002', 'OFFICE_SUB023'),
(112, 54, 'KIDS002', 'KIDS_SUB018'),
(59, 54, 'OFFICE002', 'OFFICE_SUB024'),
(113, 55, 'KIDS002', 'KIDS_SUB019'),
(60, 55, 'OFFICE002', 'OFFICE_SUB025'),
(114, 56, 'KIDS002', 'KIDS_SUB020'),
(61, 56, 'OFFICE002', 'OFFICE_SUB026'),
(115, 57, 'OFFICE001', 'OFFICE_SUB011'),
(62, 57, 'OFFICE002', 'OFFICE_SUB027'),
(116, 58, 'OFFICE001', 'OFFICE_SUB012'),
(63, 58, 'OFFICE002', 'OFFICE_SUB028'),
(117, 59, 'OFFICE001', 'OFFICE_SUB013'),
(64, 59, 'OFFICE002', 'OFFICE_SUB029'),
(118, 60, 'OFFICE001', 'OFFICE_SUB014'),
(65, 60, 'OFFICE002', 'OFFICE_SUB030'),
(119, 61, 'OFFICE001', 'OFFICE_SUB015'),
(120, 62, 'OFFICE001', 'OFFICE_SUB016'),
(121, 63, 'OFFICE001', 'OFFICE_SUB017'),
(122, 64, 'OFFICE001', 'OFFICE_SUB018'),
(123, 65, 'OFFICE001', 'OFFICE_SUB019'),
(124, 66, 'OFFICE001', 'OFFICE_SUB020'),
(125, 67, 'OFFICE002', 'OFFICE_SUB021'),
(126, 68, 'OFFICE002', 'OFFICE_SUB022'),
(127, 69, 'OFFICE002', 'OFFICE_SUB023'),
(128, 70, 'OFFICE002', 'OFFICE_SUB024'),
(129, 71, 'OFFICE002', 'OFFICE_SUB025');

-- --------------------------------------------------------

--
-- Table structure for table `District`
--

CREATE TABLE `District` (
  `DistrictID` int(11) NOT NULL,
  `DistrictCode` varchar(255) NOT NULL,
  `DistrictName` varchar(255) NOT NULL,
  `StateRegionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `District`
--

INSERT INTO `District` (`DistrictID`, `DistrictCode`, `DistrictName`, `StateRegionID`) VALUES
(1, 'MMR001D003', 'Bhamo', 1),
(2, 'MMR001D002', 'Mohnyin', 1),
(3, 'MMR001D001', 'Myitkyina', 1),
(4, 'MMR001D004', 'Puta-O', 1),
(5, 'MMR002D002', 'Bawlake', 2),
(6, 'MMR002D001', 'Loikaw', 2),
(7, 'MMR003D001', 'Hpa-An', 3),
(8, 'MMR003D004', 'Hpapun', 3),
(9, 'MMR003D003', 'Kawkareik', 3),
(10, 'MMR003D002', 'Myawaddy', 3),
(11, 'MMR004D001', 'Falam', 4),
(12, 'MMR004D003', 'Hakha', 4),
(13, 'MMR004D004', 'Matupi', 4),
(14, 'MMR004D002', 'Mindat', 4),
(15, 'MMR005D008', 'Hkamti', 5),
(16, 'MMR005D005', 'Kale', 5),
(17, 'MMR005D010', 'Kanbalu', 5),
(18, 'MMR005D004', 'Katha', 5),
(19, 'MMR005D011', 'Kawlin', 5),
(20, 'MMR005D007', 'Mawlaik', 5),
(21, 'MMR005D003', 'Monywa', 5),
(22, 'MMR005S001', 'Naga Self-Administered Zone', 5),
(23, 'MMR005D001', 'Sagaing', 5),
(24, 'MMR005D002', 'Shwebo', 5),
(25, 'MMR005D006', 'Tamu', 5),
(26, 'MMR005D009', 'Yinmarbin', 5),
(27, 'MMR006D001', 'Dawei', 6),
(28, 'MMR006D003', 'Kawthoung', 6),
(29, 'MMR006D002', 'Myeik', 6),
(30, 'MMR007D001', 'Bago', 7),
(31, 'MMR007D002', 'Taungoo', 7),
(32, 'MMR008D001', 'Pyay', 8),
(33, 'MMR008D002', 'Thayarwady', 8),
(34, 'MMR009D005', 'Gangaw', 9),
(35, 'MMR009D001', 'Magway', 9),
(36, 'MMR009D002', 'Minbu', 9),
(37, 'MMR009D004', 'Pakokku', 9),
(38, 'MMR009D003', 'Thayet', 9),
(39, 'MMR010D003', 'Kyaukse', 10),
(40, 'MMR010D001', 'Mandalay', 10),
(41, 'MMR010D007', 'Meiktila', 10),
(42, 'MMR010D004', 'Myingyan', 10),
(43, 'MMR010D005', 'Nyaung-U', 10),
(44, 'MMR010D002', 'Pyinoolwin', 10),
(45, 'MMR010D006', 'Yamethin', 10),
(46, 'MMR011D001', 'Mawlamyine', 11),
(47, 'MMR011D002', 'Thaton', 11),
(48, 'MMR012D003', 'Kyaukpyu', 12),
(49, 'MMR012D002', 'Maungdaw', 12),
(50, 'MMR012D005', 'Mrauk-U', 12),
(51, 'MMR012D001', 'Sittwe', 12),
(52, 'MMR012D004', 'Thandwe', 12),
(53, 'MMR013D002', 'Yangon (East)', 13),
(54, 'MMR013D001', 'Yangon (North)', 13),
(55, 'MMR013D003', 'Yangon (South)', 13),
(56, 'MMR013D004', 'Yangon (West)', 13),
(57, 'MMR014S001', 'Danu Self-Administered Zone', 14),
(58, 'MMR014D003', 'Langkho', 14),
(59, 'MMR014D002', 'Loilen', 14),
(60, 'MMR014S002', 'Pa-O Self-Administered Zone', 14),
(61, 'MMR014D001', 'Taunggyi', 14),
(62, 'MMR015D006', 'Hopang', 15),
(63, 'MMR015S002', 'Kokang Self-Administered Zone', 15),
(64, 'MMR015D003', 'Kyaukme', 15),
(65, 'MMR015D001', 'Lashio', 15),
(66, 'MMR015D221', 'Laukkaing (Kokang SAZ)', 15),
(67, 'MMR015D007', 'Matman', 15),
(68, 'MMR015D331', 'Mong Maw (Wa SAD)', 15),
(69, 'MMR015D008', 'Mongmit', 15),
(70, 'MMR015D002', 'Muse', 15),
(71, 'MMR015S001', 'Pa Laung Self-Administered Zone', 15),
(72, 'MMR015S501', 'Wa Self-Administered Division', 15),
(73, 'MMR015D332', 'Wein Kawng (Wein Kao) (Wa SAD)', 15),
(74, 'MMR016D001', 'Kengtung', 16),
(75, 'MMR016D333', 'Mong Pawk (Wa SAD)', 16),
(76, 'MMR016D002', 'Monghsat', 16),
(77, 'MMR016D003', 'Tachileik', 16),
(78, 'MMR017D002', 'Hinthada', 17),
(79, 'MMR017D004', 'Labutta', 17),
(80, 'MMR017D005', 'Maubin', 17),
(81, 'MMR017D003', 'Myaungmya', 17),
(82, 'MMR017D001', 'Pathein', 17),
(83, 'MMR017D006', 'Pyapon', 17),
(84, 'MMR018D002', 'Det Khi Na', 18),
(85, 'MMR018D001', 'Oke Ta Ra', 18);

-- --------------------------------------------------------

--
-- Table structure for table `MeasurementUnits`
--

CREATE TABLE `MeasurementUnits` (
  `UnitID` int(11) NOT NULL,
  `ShortWord` varchar(10) NOT NULL,
  `FullWord` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MeasurementUnits`
--

INSERT INTO `MeasurementUnits` (`UnitID`, `ShortWord`, `FullWord`) VALUES
(1, 'pc', 'Piece'),
(2, 'pkt', 'Packet'),
(3, 'bx', 'Box'),
(4, 'btl', 'Bottle'),
(5, 'cn', 'Can'),
(6, 'dz', 'Dozen'),
(7, 'kg', 'Kilogram'),
(8, 'g', 'Gram'),
(9, 'mg', 'Milligram'),
(10, 't', 'Ton'),
(11, 'ltr', 'Liter'),
(12, 'ml', 'Milliliter'),
(13, 'gl', 'Gallon'),
(14, 'crt', 'Carton'),
(15, 'rl', 'Roll'),
(16, 'cf', 'Cubic Foot'),
(17, 'cy', 'Cubic Yard'),
(18, 'cbm', 'Cubic Meter'),
(19, 'sqm', 'Square Meter'),
(20, 'm', 'Meter'),
(21, 'cm', 'Centimeter'),
(22, 'mm', 'Millimeter'),
(23, 'ft', 'Foot'),
(24, 'yd', 'Yard'),
(25, 'in', 'Inch'),
(26, 'lb', 'Pound'),
(27, 'oz', 'Ounce'),
(28, 'ct', 'Carat'),
(29, 'bl', 'Bale'),
(30, 'sht', 'Sheet'),
(31, 'bar', 'Bar'),
(32, 'dr', 'Dram'),
(33, 'qt', 'Quart'),
(34, 'pt', 'Pint'),
(35, 'pyi', 'Pyi'),
(36, 'seik', 'Seik'),
(37, 'viss', 'Viss'),
(38, 'tin', 'Tin'),
(39, 'bsk', 'Basket'),
(40, 'tk', 'Tical'),
(41, 'sck', 'Sack'),
(42, 'le', 'Le'),
(43, 'kyattha', 'Kyattha'),
(44, 'yway', 'Yway'),
(45, 'mu', 'Mu'),
(46, 'pe', 'Pe'),
(47, 'hkan', 'Hkan'),
(48, 'twa', 'Twa'),
(49, 'mat', 'Mat'),
(50, 'sin', 'Sin');

-- --------------------------------------------------------

--
-- Table structure for table `NewCountries`
--

CREATE TABLE `NewCountries` (
  `CountryID` int(11) NOT NULL,
  `CountryName` varchar(255) NOT NULL,
  `Iso_Code` varchar(6) DEFAULT NULL,
  `Flag_Image` varchar(255) DEFAULT NULL,
  `Isd_Code` varchar(10) DEFAULT NULL,
  `Time_Zone` varchar(25) DEFAULT NULL,
  `Status` enum('Active','Inactive') NOT NULL
) ;

--
-- Dumping data for table `NewCountries`
--

INSERT INTO `NewCountries` (`CountryID`, `CountryName`, `Iso_Code`, `Flag_Image`, `Isd_Code`, `Time_Zone`, `Status`) VALUES
(1, 'Andorra', 'AD', 'ad.svg', '376', 'UTC+1', 'Inactive'),
(2, 'United Arab Emirates', 'AE', 'ae.svg', '971', 'UTC+4', 'Inactive'),
(3, 'Afghanistan', 'AF', 'af.svg', '93', 'UTC+4:30', 'Inactive'),
(4, 'Antigua and Barbuda', 'AG', 'ag.svg', '1268', 'UTC-4', 'Inactive'),
(5, 'Anguilla', 'AI', 'ai.svg', '1264', 'UTC-4', 'Inactive'),
(6, 'Albania', 'AL', 'al.svg', '355', 'UTC+1', 'Inactive'),
(7, 'Armenia', 'AM', 'am.svg', '374', 'UTC+4', 'Inactive'),
(8, 'Angola', 'AO', 'ao.svg', '244', 'UTC+1', 'Inactive'),
(9, 'Antarctica', 'AQ', 'aq.svg', '672', 'UTC-3 to UTC+12', 'Inactive'),
(10, 'Argentina', 'AR', 'ar.svg', '54', 'UTC-3', 'Inactive'),
(11, 'American Samoa', 'AS', 'as.svg', '1684', 'UTC-11', 'Inactive'),
(12, 'Austria', 'AT', 'at.svg', '43', 'UTC+1', 'Inactive'),
(13, 'Australia', 'AU', 'au.svg', '61', 'UTC+8 to UTC+11', 'Inactive'),
(14, 'Aruba', 'AW', 'aw.svg', '297', 'UTC-4', 'Inactive'),
(15, 'Åland Islands', 'AX', 'ax.svg', '358', 'UTC+2', 'Inactive'),
(16, 'Azerbaijan', 'AZ', 'az.svg', '994', 'UTC+4', 'Inactive'),
(17, 'Bosnia and Herzegovina', 'BA', 'ba.svg', '387', 'UTC+1', 'Inactive'),
(18, 'Barbados', 'BB', 'bb.svg', '1246', 'UTC-4', 'Inactive'),
(19, 'Bangladesh', 'BD', 'bd.svg', '880', 'UTC+6', 'Inactive'),
(20, 'Belgium', 'BE', 'be.svg', '32', 'UTC+1', 'Inactive'),
(21, 'Burkina Faso', 'BF', 'bf.svg', '226', 'UTC+0', 'Inactive'),
(22, 'Bulgaria', 'BG', 'bg.svg', '359', 'UTC+2', 'Inactive'),
(23, 'Bahrain', 'BH', 'bh.svg', '973', 'UTC+3', 'Inactive'),
(24, 'Burundi', 'BI', 'bi.svg', '257', 'UTC+2', 'Inactive'),
(25, 'Benin', 'BJ', 'bj.svg', '229', 'UTC+1', 'Inactive'),
(26, 'Saint Barthélemy', 'BL', 'bl.svg', '590', 'UTC-4', 'Inactive'),
(27, 'Bermuda', 'BM', 'bm.svg', '1441', 'UTC-4', 'Inactive'),
(28, 'Brunei Darussalam', 'BN', 'bn.svg', '673', 'UTC+8', 'Inactive'),
(29, 'Bolivia', 'BO', 'bo.svg', '591', 'UTC-4', 'Inactive'),
(30, 'Caribbean Netherlands', 'BQ', 'bq.svg', '599', 'UTC-4', 'Inactive'),
(31, 'Brazil', 'BR', 'br.svg', '55', 'UTC-3', 'Inactive'),
(32, 'Bahamas', 'BS', 'bs.svg', '1242', 'UTC-5', 'Inactive'),
(33, 'Bhutan', 'BT', 'bt.svg', '975', 'UTC+6', 'Inactive'),
(34, 'Bouvet Island', 'BV', 'bv.svg', '47', 'UTC+1', 'Inactive'),
(35, 'Botswana', 'BW', 'bw.svg', '267', 'UTC+2', 'Inactive'),
(36, 'Belarus', 'BY', 'by.svg', '375', 'UTC+3', 'Inactive'),
(37, 'Belize', 'BZ', 'bz.svg', '501', 'UTC-6', 'Inactive'),
(38, 'Canada', 'CA', 'ca.svg', '1', 'UTC-3.5 to UTC-8', 'Inactive'),
(39, 'Cocos (Keeling) Islands', 'CC', 'cc.svg', '61', 'UTC+6:30', 'Inactive'),
(40, 'Congo, Democratic Republic of the', 'CD', 'cd.svg', '243', 'UTC+1 to UTC+2', 'Inactive'),
(41, 'Central African Republic', 'CF', 'cf.svg', '236', 'UTC+1', 'Inactive'),
(42, 'Republic of the Congo', 'CG', 'cg.svg', '242', 'UTC+1', 'Inactive'),
(43, 'Switzerland', 'CH', 'ch.svg', '41', 'UTC+1', 'Inactive'),
(44, 'Côte d\'Ivoire', 'CI', 'ci.svg', '225', 'UTC+0', 'Inactive'),
(45, 'Cook Islands', 'CK', 'ck.svg', '682', 'UTC-10', 'Inactive'),
(46, 'Chile', 'CL', 'cl.svg', '56', 'UTC-4', 'Inactive'),
(47, 'Cameroon', 'CM', 'cm.svg', '237', 'UTC+1', 'Inactive'),
(48, 'China', 'CN', 'cn.svg', '86', 'UTC+8', 'Inactive'),
(49, 'Colombia', 'CO', 'co.svg', '57', 'UTC-5', 'Inactive'),
(50, 'Costa Rica', 'CR', 'cr.svg', '506', 'UTC-6', 'Inactive'),
(51, 'Cuba', 'CU', 'cu.svg', '53', 'UTC-5', 'Inactive'),
(52, 'Cape Verde', 'CV', 'cv.svg', '238', 'UTC-1', 'Inactive'),
(53, 'Curaçao', 'CW', 'cw.svg', '599', 'UTC-4', 'Inactive'),
(54, 'Christmas Island', 'CX', 'cx.svg', '61', 'UTC+7', 'Inactive'),
(55, 'Cyprus', 'CY', 'cy.svg', '357', 'UTC+2', 'Inactive'),
(56, 'Czech Republic', 'CZ', 'cz.svg', '420', 'UTC+1', 'Inactive'),
(57, 'Germany', 'DE', 'de.svg', '49', 'UTC+1', 'Inactive'),
(58, 'Djibouti', 'DJ', 'dj.svg', '253', 'UTC+3', 'Inactive'),
(59, 'Denmark', 'DK', 'dk.svg', '45', 'UTC+1', 'Inactive'),
(60, 'Dominica', 'DM', 'dm.svg', '1767', 'UTC-4', 'Inactive'),
(61, 'Dominican Republic', 'DO', 'do.svg', '1809', 'UTC-4', 'Inactive'),
(62, 'Algeria', 'DZ', 'dz.svg', '213', 'UTC+1', 'Inactive'),
(63, 'Ecuador', 'EC', 'ec.svg', '593', 'UTC-5', 'Inactive'),
(64, 'Estonia', 'EE', 'ee.svg', '372', 'UTC+2', 'Inactive'),
(65, 'Egypt', 'EG', 'eg.svg', '20', 'UTC+2', 'Inactive'),
(66, 'Western Sahara', 'EH', 'eh.svg', '212', 'UTC+0', 'Inactive'),
(67, 'Eritrea', 'ER', 'er.svg', '291', 'UTC+3', 'Inactive'),
(68, 'Spain', 'ES', 'es.svg', '34', 'UTC+1', 'Inactive'),
(69, 'Ethiopia', 'ET', 'et.svg', '251', 'UTC+3', 'Inactive'),
(70, 'Europe', 'EU', 'eu.svg', 'None', 'UTC+1 to UTC+2', 'Inactive'),
(71, 'Finland', 'FI', 'fi.svg', '358', 'UTC+2', 'Inactive'),
(72, 'Fiji', 'FJ', 'fj.svg', '679', 'UTC+12', 'Inactive'),
(73, 'Falkland Islands (Malvinas)', 'FK', 'fk.svg', '500', 'UTC-3', 'Inactive'),
(74, 'Micronesia', 'FM', 'fm.svg', '691', 'UTC+11', 'Inactive'),
(75, 'Faroe Islands', 'FO', 'fo.svg', '298', 'UTC+0', 'Inactive'),
(76, 'France', 'FR', 'fr.svg', '33', 'UTC+1', 'Inactive'),
(77, 'Gabon', 'GA', 'ga.svg', '241', 'UTC+1', 'Inactive'),
(78, 'England', 'GB-ENG', 'gb-eng.svg', '44', 'UTC+0', 'Inactive'),
(79, 'Northern Ireland', 'GB-NIR', 'gb-nir.svg', '44', 'UTC+0', 'Inactive'),
(80, 'Scotland', 'GB-SCT', 'gb-sct.svg', '44', 'UTC+0', 'Inactive'),
(81, 'Wales', 'GB-WLS', 'gb-wls.svg', '44', 'UTC+0', 'Inactive'),
(82, 'United Kingdom', 'GB', 'gb.svg', '44', 'UTC+0', 'Inactive'),
(83, 'Grenada', 'GD', 'gd.svg', '1473', 'UTC-4', 'Inactive'),
(84, 'Georgia', 'GE', 'ge.svg', '995', 'UTC+4', 'Inactive'),
(85, 'French Guiana', 'GF', 'gf.svg', '594', 'UTC-3', 'Inactive'),
(86, 'Guernsey', 'GG', 'gg.svg', '44', 'UTC+0', 'Inactive'),
(87, 'Ghana', 'GH', 'gh.svg', '233', 'UTC+0', 'Inactive'),
(88, 'Gibraltar', 'GI', 'gi.svg', '350', 'UTC+1', 'Inactive'),
(89, 'Greenland', 'GL', 'gl.svg', '299', 'UTC-3', 'Inactive'),
(90, 'Gambia', 'GM', 'gm.svg', '220', 'UTC+0', 'Inactive'),
(91, 'Guinea', 'GN', 'gn.svg', '224', 'UTC+0', 'Inactive'),
(92, 'Guadeloupe', 'GP', 'gp.svg', '590', 'UTC-4', 'Inactive'),
(93, 'Equatorial Guinea', 'GQ', 'gq.svg', '240', 'UTC+1', 'Inactive'),
(94, 'Greece', 'GR', 'gr.svg', '30', 'UTC+2', 'Inactive'),
(95, 'South Georgia and the South Sandwich Islands', 'GS', 'gs.svg', '500', 'UTC-2', 'Inactive'),
(96, 'Guatemala', 'GT', 'gt.svg', '502', 'UTC-6', 'Inactive'),
(97, 'Guam', 'GU', 'gu.svg', '1671', 'UTC+10', 'Inactive'),
(98, 'Guinea-Bissau', 'GW', 'gw.svg', '245', 'UTC+0', 'Inactive'),
(99, 'Guyana', 'GY', 'gy.svg', '592', 'UTC-4', 'Inactive'),
(100, 'Hong Kong', 'HK', 'hk.svg', '852', 'UTC+8', 'Inactive'),
(101, 'Heard Island and McDonald Islands', 'HM', 'hm.svg', 'None', 'UTC+5', 'Inactive'),
(102, 'Honduras', 'HN', 'hn.svg', '504', 'UTC-6', 'Inactive'),
(103, 'Croatia', 'HR', 'hr.svg', '385', 'UTC+1', 'Inactive'),
(104, 'Haiti', 'HT', 'ht.svg', '509', 'UTC-5', 'Inactive'),
(105, 'Hungary', 'HU', 'hu.svg', '36', 'UTC+1', 'Inactive'),
(106, 'Indonesia', 'ID', 'id.svg', '62', 'UTC+7 to UTC+9', 'Inactive'),
(107, 'Ireland', 'IE', 'ie.svg', '353', 'UTC+0', 'Inactive'),
(108, 'Israel', 'IL', 'il.svg', '972', 'UTC+2', 'Inactive'),
(109, 'Isle of Man', 'IM', 'im.svg', '44', 'UTC+0', 'Inactive'),
(110, 'India', 'IN', 'in.svg', '91', 'UTC+5:30', 'Inactive'),
(111, 'British Indian Ocean Territory', 'IO', 'io.svg', '246', 'UTC+6', 'Inactive'),
(112, 'Iraq', 'IQ', 'iq.svg', '964', 'UTC+3', 'Inactive'),
(113, 'Iran', 'IR', 'ir.svg', '98', 'UTC+3:30', 'Inactive'),
(114, 'Iceland', 'IS', 'is.svg', '354', 'UTC+0', 'Inactive'),
(115, 'Italy', 'IT', 'it.svg', '39', 'UTC+1', 'Inactive'),
(116, 'Jersey', 'JE', 'je.svg', '44', 'UTC+0', 'Inactive'),
(117, 'Jamaica', 'JM', 'jm.svg', '1876', 'UTC-5', 'Inactive'),
(118, 'Jordan', 'JO', 'jo.svg', '962', 'UTC+2', 'Inactive'),
(119, 'Japan', 'JP', 'jp.svg', '81', 'UTC+9', 'Inactive'),
(120, 'Kenya', 'KE', 'ke.svg', '254', 'UTC+3', 'Inactive'),
(121, 'Kyrgyzstan', 'KG', 'kg.svg', '996', 'UTC+6', 'Inactive'),
(122, 'Cambodia', 'KH', 'kh.svg', '855', 'UTC+7', 'Inactive'),
(123, 'Kiribati', 'KI', 'ki.svg', '686', 'UTC+12', 'Inactive'),
(124, 'Comoros', 'KM', 'km.svg', '269', 'UTC+3', 'Inactive'),
(125, 'Saint Kitts and Nevis', 'KN', 'kn.svg', '1869', 'UTC-4', 'Inactive'),
(126, 'North Korea', 'KP', 'kp.svg', '850', 'UTC+9', 'Inactive'),
(127, 'South Korea', 'KR', 'kr.svg', '82', 'UTC+9', 'Inactive'),
(128, 'Kuwait', 'KW', 'kw.svg', '965', 'UTC+3', 'Inactive'),
(129, 'Cayman Islands', 'KY', 'ky.svg', '1345', 'UTC-5', 'Inactive'),
(130, 'Kazakhstan', 'KZ', 'kz.svg', '7', 'UTC+5 to UTC+6', 'Inactive'),
(131, 'Laos', 'LA', 'la.svg', '856', 'UTC+7', 'Inactive'),
(132, 'Lebanon', 'LB', 'lb.svg', '961', 'UTC+2', 'Inactive'),
(133, 'Saint Lucia', 'LC', 'lc.svg', '1758', 'UTC-4', 'Inactive'),
(134, 'Liechtenstein', 'LI', 'li.svg', '423', 'UTC+1', 'Inactive'),
(135, 'Sri Lanka', 'LK', 'lk.svg', '94', 'UTC+5:30', 'Inactive'),
(136, 'Liberia', 'LR', 'lr.svg', '231', 'UTC+0', 'Inactive'),
(137, 'Lesotho', 'LS', 'ls.svg', '266', 'UTC+2', 'Inactive'),
(138, 'Lithuania', 'LT', 'lt.svg', '370', 'UTC+2', 'Inactive'),
(139, 'Luxembourg', 'LU', 'lu.svg', '352', 'UTC+1', 'Inactive'),
(140, 'Latvia', 'LV', 'lv.svg', '371', 'UTC+2', 'Inactive'),
(141, 'Libya', 'LY', 'ly.svg', '218', 'UTC+2', 'Inactive'),
(142, 'Morocco', 'MA', 'ma.svg', '212', 'UTC+1', 'Inactive'),
(143, 'Monaco', 'MC', 'mc.svg', '377', 'UTC+1', 'Inactive'),
(144, 'Moldova', 'MD', 'md.svg', '373', 'UTC+2', 'Inactive'),
(145, 'Montenegro', 'ME', 'me.svg', '382', 'UTC+1', 'Inactive'),
(146, 'Saint Martin', 'MF', 'mf.svg', '590', 'UTC-4', 'Inactive'),
(147, 'Madagascar', 'MG', 'mg.svg', '261', 'UTC+3', 'Inactive'),
(148, 'Marshall Islands', 'MH', 'mh.svg', '692', 'UTC+12', 'Inactive'),
(149, 'North Macedonia', 'MK', 'mk.svg', '389', 'UTC+1', 'Inactive'),
(150, 'Mali', 'ML', 'ml.svg', '223', 'UTC+0', 'Inactive'),
(151, 'Myanmar', 'MM', 'mm.svg', '95', 'UTC+6:30', 'Active'),
(152, 'Mongolia', 'MN', 'mn.svg', '976', 'UTC+8', 'Inactive'),
(153, 'Macao', 'MO', 'mo.svg', '853', 'UTC+8', 'Inactive'),
(154, 'Northern Mariana Islands', 'MP', 'mp.svg', '1670', 'UTC+10', 'Inactive'),
(155, 'Martinique', 'MQ', 'mq.svg', '596', 'UTC-4', 'Inactive'),
(156, 'Mauritania', 'MR', 'mr.svg', '222', 'UTC+0', 'Inactive'),
(157, 'Montserrat', 'MS', 'ms.svg', '1664', 'UTC-4', 'Inactive'),
(158, 'Malta', 'MT', 'mt.svg', '356', 'UTC+1', 'Inactive'),
(159, 'Mauritius', 'MU', 'mu.svg', '230', 'UTC+4', 'Inactive'),
(160, 'Maldives', 'MV', 'mv.svg', '960', 'UTC+5', 'Inactive'),
(161, 'Malawi', 'MW', 'mw.svg', '265', 'UTC+2', 'Inactive'),
(162, 'Mexico', 'MX', 'mx.svg', '52', 'UTC-6 to UTC-8', 'Inactive'),
(163, 'Malaysia', 'MY', 'my.svg', '60', 'UTC+8', 'Inactive'),
(164, 'Mozambique', 'MZ', 'mz.svg', '258', 'UTC+2', 'Inactive'),
(165, 'Namibia', 'NA', 'na.svg', '264', 'UTC+2', 'Inactive'),
(166, 'New Caledonia', 'NC', 'nc.svg', '687', 'UTC+11', 'Inactive'),
(167, 'Niger', 'NE', 'ne.svg', '227', 'UTC+1', 'Inactive'),
(168, 'Norfolk Island', 'NF', 'nf.svg', '672', 'UTC+11', 'Inactive'),
(169, 'Nigeria', 'NG', 'ng.svg', '234', 'UTC+1', 'Inactive'),
(170, 'Nicaragua', 'NI', 'ni.svg', '505', 'UTC-6', 'Inactive'),
(171, 'Netherlands', 'NL', 'nl.svg', '31', 'UTC+1', 'Inactive'),
(172, 'Norway', 'NO', 'no.svg', '47', 'UTC+1', 'Inactive'),
(173, 'Nepal', 'NP', 'np.svg', '977', 'UTC+5:45', 'Inactive'),
(174, 'Nauru', 'NR', 'nr.svg', '674', 'UTC+12', 'Inactive'),
(175, 'Niue', 'NU', 'nu.svg', '683', 'UTC-11', 'Inactive'),
(176, 'New Zealand', 'NZ', 'nz.svg', '64', 'UTC+12', 'Inactive'),
(177, 'Oman', 'OM', 'om.svg', '968', 'UTC+4', 'Inactive'),
(178, 'Panama', 'PA', 'pa.svg', '507', 'UTC-5', 'Inactive'),
(179, 'Peru', 'PE', 'pe.svg', '51', 'UTC-5', 'Inactive'),
(180, 'French Polynesia', 'PF', 'pf.svg', '689', 'UTC-10', 'Inactive'),
(181, 'Papua New Guinea', 'PG', 'pg.svg', '675', 'UTC+10', 'Inactive'),
(182, 'Philippines', 'PH', 'ph.svg', '63', 'UTC+8', 'Inactive'),
(183, 'Pakistan', 'PK', 'pk.svg', '92', 'UTC+5', 'Inactive'),
(184, 'Poland', 'PL', 'pl.svg', '48', 'UTC+1', 'Inactive'),
(185, 'Saint Pierre and Miquelon', 'PM', 'pm.svg', '508', 'UTC-3', 'Inactive'),
(186, 'Pitcairn', 'PN', 'pn.svg', '870', 'UTC-8', 'Inactive'),
(187, 'Puerto Rico', 'PR', 'pr.svg', '1', 'UTC-4', 'Inactive'),
(188, 'Palestine', 'PS', 'ps.svg', '970', 'UTC+2', 'Inactive'),
(189, 'Portugal', 'PT', 'pt.svg', '351', 'UTC+0', 'Inactive'),
(190, 'Palau', 'PW', 'pw.svg', '680', 'UTC+9', 'Inactive'),
(191, 'Paraguay', 'PY', 'py.svg', '595', 'UTC-4', 'Inactive'),
(192, 'Qatar', 'QA', 'qa.svg', '974', 'UTC+3', 'Inactive'),
(193, 'Réunion', 'RE', 're.svg', '262', 'UTC+4', 'Inactive'),
(194, 'Romania', 'RO', 'ro.svg', '40', 'UTC+2', 'Inactive'),
(195, 'Serbia', 'RS', 'rs.svg', '381', 'UTC+1', 'Inactive'),
(196, 'Russian Federation', 'RU', 'ru.svg', '7', 'UTC+3', 'Inactive'),
(197, 'Rwanda', 'RW', 'rw.svg', '250', 'UTC+2', 'Inactive'),
(198, 'Saudi Arabia', 'SA', 'sa.svg', '966', 'UTC+3', 'Inactive'),
(199, 'Solomon Islands', 'SB', 'sb.svg', '677', 'UTC+11', 'Inactive'),
(200, 'Seychelles', 'SC', 'sc.svg', '248', 'UTC+4', 'Inactive'),
(201, 'Sudan', 'SD', 'sd.svg', '249', 'UTC+2', 'Inactive'),
(202, 'Sweden', 'SE', 'se.svg', '46', 'UTC+1', 'Inactive'),
(203, 'Singapore', 'SG', 'sg.svg', '65', 'UTC+8', 'Inactive'),
(204, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 'sh.svg', '290', 'UTC+0', 'Inactive'),
(205, 'Slovenia', 'SI', 'si.svg', '386', 'UTC+1', 'Inactive'),
(206, 'Svalbard and Jan Mayen Islands', 'SJ', 'sj.svg', '47', 'UTC+1', 'Inactive'),
(207, 'Slovakia', 'SK', 'sk.svg', '421', 'UTC+1', 'Inactive'),
(208, 'Sierra Leone', 'SL', 'sl.svg', '232', 'UTC+0', 'Inactive'),
(209, 'San Marino', 'SM', 'sm.svg', '378', 'UTC+1', 'Inactive'),
(210, 'Senegal', 'SN', 'sn.svg', '221', 'UTC+0', 'Inactive'),
(211, 'Somalia', 'SO', 'so.svg', '252', 'UTC+3', 'Inactive'),
(212, 'Suriname', 'SR', 'sr.svg', '597', 'UTC-3', 'Inactive'),
(213, 'South Sudan', 'SS', 'ss.svg', '211', 'UTC+2', 'Inactive'),
(214, 'Sao Tome and Principe', 'ST', 'st.svg', '239', 'UTC+0', 'Inactive'),
(215, 'El Salvador', 'SV', 'sv.svg', '503', 'UTC-6', 'Inactive'),
(216, 'Sint Maarten (Dutch part)', 'SX', 'sx.svg', '1721', 'UTC-4', 'Inactive'),
(217, 'Syrian Arab Republic', 'SY', 'sy.svg', '963', 'UTC+2', 'Inactive'),
(218, 'Swaziland', 'SZ', 'sz.svg', '268', 'UTC+2', 'Inactive'),
(219, 'Turks and Caicos Islands', 'TC', 'tc.svg', '1649', 'UTC-5', 'Inactive'),
(220, 'Chad', 'TD', 'td.svg', '235', 'UTC+1', 'Inactive'),
(221, 'French Southern Territories', 'TF', 'tf.svg', '262', 'UTC+5', 'Inactive'),
(222, 'Togo', 'TG', 'tg.svg', '228', 'UTC+0', 'Inactive'),
(223, 'Thailand', 'TH', 'th.svg', '66', 'UTC+7', 'Inactive'),
(224, 'Tajikistan', 'TJ', 'tj.svg', '992', 'UTC+5', 'Inactive'),
(225, 'Tokelau', 'TK', 'tk.svg', '690', 'UTC-10', 'Inactive'),
(226, 'Timor-Leste', 'TL', 'tl.svg', '670', 'UTC+9', 'Inactive'),
(227, 'Turkmenistan', 'TM', 'tm.svg', '993', 'UTC+5', 'Inactive'),
(228, 'Tunisia', 'TN', 'tn.svg', '216', 'UTC+1', 'Inactive'),
(229, 'Tonga', 'TO', 'to.svg', '676', 'UTC+13', 'Inactive'),
(230, 'Turkey', 'TR', 'tr.svg', '90', 'UTC+3', 'Inactive'),
(231, 'Trinidad and Tobago', 'TT', 'tt.svg', '1868', 'UTC-4', 'Inactive'),
(232, 'Tuvalu', 'TV', 'tv.svg', '688', 'UTC+12', 'Inactive'),
(233, 'Taiwan', 'TW', 'tw.svg', '886', 'UTC+8', 'Inactive'),
(234, 'Tanzania', 'TZ', 'tz.svg', '255', 'UTC+3', 'Inactive'),
(235, 'Ukraine', 'UA', 'ua.svg', '380', 'UTC+2', 'Inactive'),
(236, 'Uganda', 'UG', 'ug.svg', '256', 'UTC+3', 'Inactive'),
(237, 'US Minor Outlying Islands', 'UM', 'um.svg', '1', 'UTC-10', 'Inactive'),
(238, 'United States', 'US', 'us.svg', '1', 'UTC-5 to UTC-10', 'Inactive'),
(239, 'Uruguay', 'UY', 'uy.svg', '598', 'UTC-3', 'Inactive'),
(240, 'Uzbekistan', 'UZ', 'uz.svg', '998', 'UTC+5', 'Inactive'),
(241, 'Holy See', 'VA', 'va.svg', '39', 'UTC+1', 'Inactive'),
(242, 'Saint Vincent and the Grenadines', 'VC', 'vc.svg', '1784', 'UTC-4', 'Inactive'),
(243, 'Venezuela', 'VE', 've.svg', '58', 'UTC-4', 'Inactive'),
(244, 'Virgin Islands, British', 'VG', 'vg.svg', '1284', 'UTC-4', 'Inactive'),
(245, 'Virgin Islands, U.S.', 'VI', 'vi.svg', '1340', 'UTC-4', 'Inactive'),
(246, 'Vietnam', 'VN', 'vn.svg', '84', 'UTC+7', 'Inactive'),
(247, 'Vanuatu', 'VU', 'vu.svg', '678', 'UTC+11', 'Inactive'),
(248, 'Wallis and Futuna Islands', 'WF', 'wf.svg', '681', 'UTC+12', 'Inactive'),
(249, 'Samoa', 'WS', 'ws.svg', '685', 'UTC+13', 'Inactive'),
(250, 'Kosovo', 'XK', 'xk.svg', '383', 'UTC+1', 'Inactive'),
(251, 'Yemen', 'YE', 'ye.svg', '967', 'UTC+3', 'Inactive'),
(252, 'Mayotte', 'YT', 'yt.svg', '269', 'UTC+3', 'Inactive'),
(253, 'South Africa', 'ZA', 'za.svg', '27', 'UTC+2', 'Inactive'),
(254, 'Zambia', 'ZM', 'zm.svg', '260', 'UTC+2', 'Inactive'),
(255, 'Zimbabwe', 'ZW', 'zw.svg', '263', 'UTC+2', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ImageFile` varchar(255) DEFAULT NULL,
  `SKU` varchar(100) NOT NULL,
  `Barcode` varchar(255) DEFAULT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `BrandName` varchar(255) NOT NULL,
  `SubcategoryName` varchar(255) NOT NULL,
  `Unit` varchar(10) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL,
  `Status` enum('Active','Inactive') DEFAULT 'Active',
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ProductID`, `ProductName`, `ImageFile`, `SKU`, `Barcode`, `CategoryName`, `BrandName`, `SubcategoryName`, `Unit`, `Price`, `Quantity`, `CreatedBy`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'Apple iPhone 14 Pro', 'iphone_14_pro.png', 'IPHN14PRO001', 'IPHN14PRO001', 'Electronics', 'Apple', 'Smartphones', 'pc', 1499000.00, 50, 'admin', 'Inactive', '2025-01-02 05:13:18', '2025-01-02 12:42:03'),
(2, 'Samsung Galaxy Z Fold 4', 'galaxy_z_fold_4.png', 'SGZF4001', 'SGZF4001', 'Electronics', 'Samsung', 'Smartphones', 'pc', 2999000.00, 30, 'admin', 'Inactive', '2025-01-02 05:13:18', '2025-01-02 12:42:03'),
(3, 'Sony WH-1000XM5 Headphones', 'sony_wh1000xm5.png', 'WH1000XM5001', 'WH1000XM5001', 'Electronics', 'Sony', 'Audio Devices', 'pc', 399000.00, 100, 'admin', 'Inactive', '2025-01-02 05:13:18', '2025-01-02 12:42:03'),
(4, 'Dell Inspiron 14 Laptop', 'dell_inspiron_14.png', 'INS14SKU001', 'INS14SKU001', 'Electronics', 'Dell', 'Laptops', 'pc', 1099000.00, 25, 'admin', 'Inactive', '2025-01-02 05:13:18', '2025-01-02 12:42:03'),
(5, 'Huawei Watch GT 3', 'huawei_watch_gt3.png', 'HWGT3001', 'HWGT3001', 'Electronics', 'Huawei', 'Wearable Devices', 'pc', 199000.00, 70, 'admin', 'Inactive', '2025-01-02 05:13:18', '2025-01-02 12:42:03'),
(6, 'LG 65-inch OLED TV', 'lg_oled_tv.png', 'LGOLED65SKU001', 'LGOLED65SKU001', 'Appliances', 'Oppo', 'Refrigerators', 'pc', 3499000.00, 15, 'admin', 'Inactive', '2025-01-02 05:13:27', '2025-01-02 12:42:03'),
(7, 'Panasonic Split AC 1.5 Ton', 'panasonic_split_ac.png', 'PNSPLITAC001', 'PNSPLITAC001', 'Appliances', 'Sony', 'Air Conditioners', 'pc', 1599000.00, 20, 'admin', 'Inactive', '2025-01-02 05:13:27', '2025-01-02 12:42:03'),
(8, 'Samsung Microwave Oven', 'samsung_microwave.png', 'SMMICRO001', 'SMMICRO001', 'Appliances', 'Samsung', 'Microwaves', 'pc', 699000.00, 25, 'admin', 'Inactive', '2025-01-02 05:13:27', '2025-01-02 12:42:03'),
(9, 'Dyson Vacuum Cleaner V15', 'dyson_vacuum_v15.png', 'DYV15SKU001', 'DYV15SKU001', 'Appliances', 'Xiaomi', 'Vacuum Cleaners', 'pc', 2499000.00, 12, 'admin', 'Inactive', '2025-01-02 05:13:27', '2025-01-02 12:42:03'),
(10, 'Sony Soundbar HT-G700', 'sony_soundbar_htg700.png', 'SNHTG700SKU001', 'SNHTG700SKU001', 'Appliances', 'Sony', 'Audio Devices', 'pc', 599000.00, 40, 'admin', 'Inactive', '2025-01-02 05:13:27', '2025-01-02 12:42:03'),
(11, 'Levi’s 501 Original Jeans', 'levis_501_jeans.png', 'LV501SKU001', 'LV501SKU001', 'Clothing', 'Levi\'s', 'Men’s Jeans', 'pc', 119000.00, 50, 'admin', 'Inactive', '2025-01-02 05:13:34', '2025-01-02 12:42:03'),
(12, 'Nike Air Max 270', 'nike_air_max_270.png', 'NAM270SKU001', 'NAM270SKU001', 'Shoes', 'Nike', 'Men’s T-Shirts', 'pc', 219000.00, 60, 'admin', 'Inactive', '2025-01-02 05:13:34', '2025-01-02 12:42:03'),
(13, 'Zara Men’s Formal Shirt', 'zara_formal_shirt.png', 'ZRFS01SKU001', 'ZRFS01SKU001', 'Clothing', 'Zara', 'Kids’ Tops', 'pc', 89000.00, 80, 'admin', 'Inactive', '2025-01-02 05:13:34', '2025-01-02 12:42:03'),
(14, 'H&M Women’s Jacket', 'hm_womens_jacket.png', 'HMWJKT01SKU001', 'HMWJKT01SKU001', 'Clothing', 'H&M', 'Women’s Dresses', 'pc', 139000.00, 40, 'admin', 'Inactive', '2025-01-02 05:13:34', '2025-01-02 12:42:03'),
(15, 'Adidas Sports Hoodie', 'adidas_sports_hoodie.png', 'ADSHT01SKU001', 'ADSHT01SKU001', 'Clothing', 'Adidas', 'Running Shoes', 'pc', 99000.00, 100, 'admin', 'Inactive', '2025-01-02 05:13:34', '2025-01-02 12:42:03'),
(16, 'Yonex Badminton Racket', 'yonex_badminton_racket.png', 'YBXRTSKU001', 'YBXRTSKU001', 'Sports', 'Puma', 'Tennis Gear', 'pc', 179000.00, 40, 'admin', 'Inactive', '2025-01-02 05:13:53', '2025-01-02 12:42:03'),
(17, 'Adidas Predator Football Shoes', 'adidas_predator_shoes.png', 'ADPRS01SKU001', 'ADPRS01SKU001', 'Sports', 'Adidas', 'Running Shoes', 'pc', 199000.00, 50, 'admin', 'Inactive', '2025-01-02 05:13:53', '2025-01-02 12:42:03'),
(18, 'Nike Basketball', 'nike_basketball.png', 'NIKBASKT01SKU001', 'NIKBASKT01SKU001', 'Sports', 'Nike', 'Basketball Equipment', 'pc', 59000.00, 70, 'admin', 'Inactive', '2025-01-02 05:13:53', '2025-01-02 12:42:03'),
(19, 'Puma Training Gloves', 'puma_training_gloves.png', 'PUMAGLV01SKU001', 'PUMAGLV01SKU001', 'Sports', 'Puma', 'Running Shoes', 'pc', 39000.00, 100, 'admin', 'Inactive', '2025-01-02 05:13:53', '2025-01-02 12:42:03'),
(20, 'Spalding Basketball Hoop', 'spalding_basketball_hoop.png', 'SPBASKTHOOP01SKU001', 'SPBASKTHOOP01SKU001', 'Sports', 'H&M', 'Basketball Equipment', 'pc', 299900.00, 20, 'admin', 'Inactive', '2025-01-02 05:13:53', '2025-01-02 12:42:03'),
(21, 'Huggies Dry Pants Diapers', 'huggies_diapers.png', 'HUGDPS001', 'HUGDPS001', 'Baby Products', 'Zara', 'Diapers', 'pkt', 129000.00, 70, 'admin', 'Inactive', '2025-01-02 05:14:02', '2025-01-02 12:42:03'),
(22, 'Chicco Baby Stroller', 'chicco_baby_stroller.png', 'CHSTLR001', 'CHSTLR001', 'Baby Products', 'Puma', 'Strollers', 'pc', 199900.00, 25, 'admin', 'Inactive', '2025-01-02 05:14:02', '2025-01-02 12:42:03'),
(23, 'Johnson’s Baby Powder', 'johnson_baby_powder.png', 'JNBPWD001', 'JNBPWD001', 'Baby Products', 'Uniqlo', 'Baby Wipes', 'pc', 19000.00, 100, 'admin', 'Inactive', '2025-01-02 05:14:02', '2025-01-02 12:42:03'),
(24, 'Pampers Baby Wipes', 'pampers_baby_wipes.png', 'PAMBWIP001', 'PAMBWIP001', 'Baby Products', 'Zara', 'Baby Wipes', 'pc', 49000.00, 80, 'admin', 'Inactive', '2025-01-02 05:14:02', '2025-01-02 12:42:03'),
(25, 'Philips Avent Feeding Bottle', 'philips_feeding_bottle.png', 'PHFBOT001', 'PHFBOT001', 'Baby Products', 'Adidas', 'Feeding Bottles', 'pc', 29900.00, 60, 'admin', 'Inactive', '2025-01-02 05:14:02', '2025-01-02 12:42:03'),
(26, 'Logitech MX Master 3 Mouse', 'logitech_mx_master_3.png', 'LOGIMX301', 'LOGIMX301', 'Office Supplies', 'Puma', 'Keyboards', 'pc', 29900.00, 80, 'admin', 'Inactive', '2025-01-02 05:14:10', '2025-01-02 12:42:03'),
(27, 'HP OfficeJet Pro Printer', 'hp_officejet_pro.png', 'HPOJPRO01', 'HPOJPRO01', 'Office Supplies', 'HP', 'Printers', 'pc', 599900.00, 15, 'admin', 'Inactive', '2025-01-02 05:14:10', '2025-01-02 12:42:03'),
(28, 'Dell 24-inch Monitor', 'dell_monitor_24inch.png', 'DELLMON24SKU001', 'DELLMON24SKU001', 'Office Supplies', 'Dell', 'Webcams', 'pc', 799900.00, 20, 'admin', 'Inactive', '2025-01-02 05:14:10', '2025-01-02 12:42:03'),
(29, 'Canon Office Projector', 'canon_projector.png', 'CANONPROJ001', 'CANONPROJ001', 'Office Supplies', 'Chanel', 'Presentation Tools', 'pc', 109900.00, 12, 'admin', 'Inactive', '2025-01-02 05:14:10', '2025-01-02 12:42:03'),
(30, 'Brother All-in-One Scanner', 'brother_scanner.png', 'BROSCN001', 'BROSCN001', 'Office Supplies', 'Uniqlo', 'Desk Accessories', 'pc', 129900.00, 10, 'admin', 'Inactive', '2025-01-02 05:14:10', '2025-01-02 12:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `StateRegion`
--

CREATE TABLE `StateRegion` (
  `StateRegionID` int(11) NOT NULL,
  `StateRegionCode` varchar(20) NOT NULL,
  `StateRegionName` varchar(255) NOT NULL,
  `CountryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `StateRegion`
--

INSERT INTO `StateRegion` (`StateRegionID`, `StateRegionCode`, `StateRegionName`, `CountryID`) VALUES
(1, 'MMR001', 'Kachin', 151),
(2, 'MMR002', 'Kayah', 151),
(3, 'MMR003', 'Kayin', 151),
(4, 'MMR004', 'Chin', 151),
(5, 'MMR005', 'Sagaing', 151),
(6, 'MMR006', 'Tanintharyi', 151),
(7, 'MMR007', 'Bago (East)', 151),
(8, 'MMR008', 'Bago (West)', 151),
(9, 'MMR009', 'Magway', 151),
(10, 'MMR010', 'Mandalay', 151),
(11, 'MMR011', 'Mon', 151),
(12, 'MMR012', 'Rakhine', 151),
(13, 'MMR013', 'Yangon', 151),
(14, 'MMR014', 'Shan (South)', 151),
(15, 'MMR015', 'Shan (North)', 151),
(16, 'MMR016', 'Shan (East)', 151),
(17, 'MMR017', 'Ayeyarwady', 151),
(18, 'MMR018', 'Nay Pyi Taw', 151),
(19, 'MMR111', 'Bago', 151),
(20, 'MMR222', 'Shan', 151);

-- --------------------------------------------------------

--
-- Table structure for table `Subcategory`
--

CREATE TABLE `Subcategory` (
  `SubcategoryID` int(11) NOT NULL,
  `SubcategoryName` varchar(255) NOT NULL,
  `SubcategoryCode` varchar(50) NOT NULL,
  `CategoryCode` varchar(50) NOT NULL,
  `ImageFile` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `CreatedBy` varchar(255) NOT NULL,
  `Status` enum('Active','Inactive') DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Subcategory`
--

INSERT INTO `Subcategory` (`SubcategoryID`, `SubcategoryName`, `SubcategoryCode`, `CategoryCode`, `ImageFile`, `Description`, `CreatedBy`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'Laptops', 'ELEC_SUB001', 'ELEC001', 'laptops.png', 'Portable computers', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 13:36:48'),
(2, 'Smartphones', 'ELEC_SUB002', 'ELEC001', 'smartphones.png', 'Mobile phones and devices', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:17:28'),
(3, 'Tablets', 'ELEC_SUB003', 'ELEC001', 'tablets.png', 'Portable tablets', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(4, 'Cameras', 'ELEC_SUB004', 'ELEC001', 'cameras.png', 'Digital and DSLR cameras', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(5, 'Audio Devices', 'ELEC_SUB005', 'ELEC001', 'audio_devices.png', 'Headphones, speakers, and more', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(6, 'Gaming Consoles', 'ELEC_SUB006', 'ELEC001', 'gaming_consoles.png', 'PlayStation, Xbox, and others', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(7, 'Wearable Devices', 'ELEC_SUB007', 'ELEC001', 'wearable_devices.png', 'Smartwatches and fitness bands', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(8, 'Drones', 'ELEC_SUB008', 'ELEC001', 'drones.png', 'Camera and recreational drones', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(9, 'Projectors', 'ELEC_SUB009', 'ELEC001', 'projectors.png', 'Home and office projectors', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(10, 'Computer Accessories', 'ELEC_SUB010', 'ELEC001', 'computer_accessories.png', 'Keyboards, mice, and more', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(11, 'Refrigerators', 'ELEC_SUB011', 'ELEC002', 'refrigerators.png', 'Home and kitchen refrigerators', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(12, 'Washing Machines', 'ELEC_SUB012', 'ELEC002', 'washing_machines.png', 'Automatic and semi-automatic washing machines', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(13, 'Microwaves', 'ELEC_SUB013', 'ELEC002', 'microwaves.png', 'Microwave ovens and accessories', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(14, 'Air Conditioners', 'ELEC_SUB014', 'ELEC002', 'air_conditioners.png', 'Cooling and heating systems', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(15, 'Water Purifiers', 'ELEC_SUB015', 'ELEC002', 'water_purifiers.png', 'Water filtration systems', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(16, 'Vacuum Cleaners', 'ELEC_SUB016', 'ELEC002', 'vacuum_cleaners.png', 'Cleaning equipment', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(17, 'Kitchen Chimneys', 'ELEC_SUB017', 'ELEC002', 'kitchen_chimneys.png', 'Smoke and odor removal systems', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(18, 'Dishwashers', 'ELEC_SUB018', 'ELEC002', 'dishwashers.png', 'Automatic dishwashing systems', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(19, 'Food Processors', 'ELEC_SUB019', 'ELEC002', 'food_processors.png', 'Blenders and food preparation tools', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(20, 'Heaters', 'ELEC_SUB020', 'ELEC002', 'heaters.png', 'Room and water heaters', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(21, 'Men’s T-Shirts', 'CLOT_SUB001', 'CLOT001', 'mens_tshirts.png', 'T-shirts for men', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(22, 'Men’s Jeans', 'CLOT_SUB002', 'CLOT001', 'mens_jeans.png', 'Denim for men', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(23, 'Men’s Jackets', 'CLOT_SUB003', 'CLOT001', 'mens_jackets.png', 'Jackets and coats for men', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(24, 'Women’s Dresses', 'CLOT_SUB004', 'CLOT001', 'womens_dresses.png', 'Dresses for women', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(25, 'Women’s Skirts', 'CLOT_SUB005', 'CLOT001', 'womens_skirts.png', 'Skirts for women', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(26, 'Kids’ Tops', 'CLOT_SUB006', 'CLOT001', 'kids_tops.png', 'Tops for kids', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(27, 'Kids’ Pants', 'CLOT_SUB007', 'CLOT001', 'kids_pants.png', 'Pants and trousers for kids', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(28, 'Formal Wear', 'CLOT_SUB008', 'CLOT001', 'formal_wear.png', 'Suits, blazers, and ties', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(29, 'Casual Wear', 'CLOT_SUB009', 'CLOT001', 'casual_wear.png', 'Everyday clothing for all ages', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(30, 'Activewear', 'CLOT_SUB010', 'CLOT001', 'activewear.png', 'Sports and gym clothing', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(31, 'Men’s Shoes', 'CLOT_SUB011', 'CLOT002', 'mens_shoes.png', 'Shoes for men', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(32, 'Women’s Shoes', 'CLOT_SUB012', 'CLOT002', 'womens_shoes.png', 'Shoes for women', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(33, 'Kids’ Shoes', 'CLOT_SUB013', 'CLOT002', 'kids_shoes.png', 'Shoes for kids', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(34, 'Sneakers', 'CLOT_SUB014', 'CLOT002', 'sneakers.png', 'Sports and casual sneakers', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(35, 'Boots', 'CLOT_SUB015', 'CLOT002', 'boots.png', 'All-season boots', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(36, 'Sandals', 'CLOT_SUB016', 'CLOT002', 'sandals.png', 'Comfortable sandals', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(37, 'Slippers', 'CLOT_SUB017', 'CLOT002', 'slippers.png', 'Indoor slippers', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(38, 'Heels', 'CLOT_SUB018', 'CLOT002', 'heels.png', 'High heels and stilettos', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(39, 'Loafers', 'CLOT_SUB019', 'CLOT002', 'loafers.png', 'Stylish loafers', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(40, 'Formal Shoes', 'CLOT_SUB020', 'CLOT002', 'formal_shoes.png', 'Formal footwear', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(41, 'Cookware', 'HOME_SUB001', 'HOME001', 'cookware.png', 'Pots, pans, and utensils', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(42, 'Tableware', 'HOME_SUB002', 'HOME001', 'tableware.png', 'Plates, bowls, and glasses', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(43, 'Storage Solutions', 'HOME_SUB003', 'HOME001', 'storage_solutions.png', 'Cabinets, racks, and containers', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(44, 'Lighting', 'HOME_SUB004', 'HOME001', 'lighting.png', 'LEDs, lamps, and chandeliers', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(45, 'Cleaning Supplies', 'HOME_SUB005', 'HOME001', 'cleaning_supplies.png', 'Brooms, mops, and detergents', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(46, 'Bedding', 'HOME_SUB006', 'HOME001', 'bedding.png', 'Bedsheets, pillows, and duvets', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(47, 'Curtains', 'HOME_SUB007', 'HOME001', 'curtains.png', 'Window coverings', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(48, 'Furniture Covers', 'HOME_SUB008', 'HOME001', 'furniture_covers.png', 'Sofa and chair covers', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(49, 'Air Fresheners', 'HOME_SUB009', 'HOME001', 'air_fresheners.png', 'Room and car fresheners', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(50, 'Wall Art', 'HOME_SUB010', 'HOME001', 'wall_art.png', 'Paintings and posters', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(51, 'Cricket Gear', 'SPORT_SUB001', 'SPORT001', 'cricket_gear.png', 'Bats, balls, and protective gear', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(52, 'Football Equipment', 'SPORT_SUB002', 'SPORT001', 'football_equipment.png', 'Football kits and balls', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(53, 'Basketball Equipment', 'SPORT_SUB003', 'SPORT001', 'basketball_equipment.png', 'Basketballs and hoops', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(54, 'Tennis Gear', 'SPORT_SUB004', 'SPORT001', 'tennis_gear.png', 'Rackets, balls, and nets', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(55, 'Running Shoes', 'SPORT_SUB005', 'SPORT001', 'running_shoes.png', 'Shoes for runners', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(56, 'Yoga Mats', 'SPORT_SUB006', 'SPORT001', 'yoga_mats.png', 'Mats and yoga accessories', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(57, 'Gym Equipment', 'SPORT_SUB007', 'SPORT001', 'gym_equipment.png', 'Weights, treadmills, and more', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(58, 'Swimming Gear', 'SPORT_SUB008', 'SPORT001', 'swimming_gear.png', 'Swimsuits, caps, and goggles', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(59, 'Hiking Gear', 'SPORT_SUB009', 'SPORT001', 'hiking_gear.png', 'Backpacks, boots, and tools', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(60, 'Cycling Equipment', 'SPORT_SUB010', 'SPORT001', 'cycling_equipment.png', 'Bicycles and accessories', 'admin', 'Active', '2025-01-01 08:11:11', '2025-01-01 11:13:43'),
(61, 'Diapers', 'KIDS_SUB011', 'KIDS002', 'diapers.png', 'Disposable and cloth diapers', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(62, 'Baby Wipes', 'KIDS_SUB012', 'KIDS002', 'baby_wipes.png', 'Gentle cleansing wipes', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(63, 'Baby Clothing', 'KIDS_SUB013', 'KIDS002', 'baby_clothing.png', 'Rompers, onesies, and more', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(64, 'Feeding Bottles', 'KIDS_SUB014', 'KIDS002', 'feeding_bottles.png', 'Bottles and sippy cups', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(65, 'Baby Food', 'KIDS_SUB015', 'KIDS002', 'baby_food.png', 'Formula and purees', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(66, 'Baby Toys', 'KIDS_SUB016', 'KIDS002', 'baby_toys.png', 'Rattles and teething toys', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(67, 'Strollers', 'KIDS_SUB017', 'KIDS002', 'strollers.png', 'Prams and strollers', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(68, 'Car Seats', 'KIDS_SUB018', 'KIDS002', 'car_seats.png', 'Safety seats for babies', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(69, 'Baby Monitors', 'KIDS_SUB019', 'KIDS002', 'baby_monitors.png', 'Audio and video monitors', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(70, 'Baby Bathing', 'KIDS_SUB020', 'KIDS002', 'baby_bathing.png', 'Tubs, towels, and soaps', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(71, 'Pens & Writing Tools', 'OFFICE_SUB011', 'OFFICE001', 'pens_writing_tools.png', 'Pens, markers, and pencils', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(72, 'Notebooks & Diaries', 'OFFICE_SUB012', 'OFFICE001', 'notebooks_diaries.png', 'Journals and notebooks', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(73, 'Stationery', 'OFFICE_SUB013', 'OFFICE001', 'stationery.png', 'Staplers, glue, and scissors', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(74, 'Paper Supplies', 'OFFICE_SUB014', 'OFFICE001', 'paper_supplies.png', 'A4 sheets, envelopes, and more', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(75, 'File Storage', 'OFFICE_SUB015', 'OFFICE001', 'file_storage.png', 'Folders, files, and organizers', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(76, 'Office Furniture', 'OFFICE_SUB016', 'OFFICE001', 'office_furniture.png', 'Desks, chairs, and shelves', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(77, 'Printers', 'OFFICE_SUB017', 'OFFICE001', 'printers.png', 'Laser and inkjet printers', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(78, 'Presentation Tools', 'OFFICE_SUB018', 'OFFICE001', 'presentation_tools.png', 'Projectors and whiteboards', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(79, 'Desk Accessories', 'OFFICE_SUB019', 'OFFICE001', 'desk_accessories.png', 'Organizers, pen stands, and more', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(80, 'Calendars & Planners', 'OFFICE_SUB020', 'OFFICE001', 'calendars_planners.png', 'Planning tools for office', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(81, 'Desktops', 'OFFICE_SUB021', 'OFFICE002', 'desktops.png', 'Personal and business desktops', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(82, 'Laptops', 'OFFICE_SUB022', 'OFFICE002', 'laptops_office.png', 'Laptops for work and gaming', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(83, 'Keyboards', 'OFFICE_SUB023', 'OFFICE002', 'keyboards_office.png', 'Mechanical and wireless keyboards', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(84, 'Mice', 'OFFICE_SUB024', 'OFFICE002', 'mice.png', 'Wired and wireless mice', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(85, 'Monitors', 'OFFICE_SUB025', 'OFFICE002', 'monitors.png', 'Full HD and 4K monitors', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(86, 'Printers', 'OFFICE_SUB026', 'OFFICE002', 'printers_office.png', 'Laser and inkjet printers', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(87, 'External Drives', 'OFFICE_SUB027', 'OFFICE002', 'external_drives.png', 'Hard drives and SSDs', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(88, 'Webcams', 'OFFICE_SUB028', 'OFFICE002', 'webcams.png', 'HD webcams for meetings', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(89, 'Docking Stations', 'OFFICE_SUB029', 'OFFICE002', 'docking_stations.png', 'Docking solutions for laptops', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43'),
(90, 'Computer Accessories', 'OFFICE_SUB030', 'OFFICE002', 'computer_accessories_office.png', 'Cables, stands, and more', 'admin', 'Active', '2025-01-01 08:28:42', '2025-01-01 11:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `Township`
--

CREATE TABLE `Township` (
  `TownshipID` int(11) NOT NULL,
  `TownshipCode` varchar(255) NOT NULL,
  `TownshipName` varchar(255) NOT NULL,
  `StateRegionCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Brands`
--
ALTER TABLE `Brands`
  ADD PRIMARY KEY (`BrandID`),
  ADD UNIQUE KEY `BrandName` (`BrandName`),
  ADD UNIQUE KEY `unique_brand_country` (`BrandName`,`CountryName`),
  ADD KEY `FK_CountryName` (`CountryName`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `CategoryName` (`CategoryName`),
  ADD UNIQUE KEY `CategoryCode` (`CategoryCode`);

--
-- Indexes for table `CategoryBrand`
--
ALTER TABLE `CategoryBrand`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BrandID` (`BrandID`,`CategoryCode`),
  ADD KEY `CategoryCode` (`CategoryCode`);

--
-- Indexes for table `CategoryBrandSubcategory`
--
ALTER TABLE `CategoryBrandSubcategory`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `unique_brand_category_subcategory` (`BrandID`,`CategoryCode`,`SubcategoryCode`),
  ADD KEY `CategoryCode` (`CategoryCode`),
  ADD KEY `SubcategoryCode` (`SubcategoryCode`);

--
-- Indexes for table `District`
--
ALTER TABLE `District`
  ADD PRIMARY KEY (`DistrictID`),
  ADD KEY `StateRegionID` (`StateRegionID`);

--
-- Indexes for table `MeasurementUnits`
--
ALTER TABLE `MeasurementUnits`
  ADD PRIMARY KEY (`UnitID`),
  ADD UNIQUE KEY `ShortWord` (`ShortWord`),
  ADD UNIQUE KEY `FullWord` (`FullWord`);

--
-- Indexes for table `NewCountries`
--
ALTER TABLE `NewCountries`
  ADD PRIMARY KEY (`CountryID`),
  ADD UNIQUE KEY `CountryName` (`CountryName`),
  ADD UNIQUE KEY `UC_CountryName` (`CountryName`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductID`),
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD KEY `MeasurementUnits-ShortWord` (`Unit`) USING BTREE,
  ADD KEY `fk_products_brand` (`BrandName`),
  ADD KEY `fk_products_category` (`CategoryName`),
  ADD KEY `fk_products_subcategory` (`SubcategoryName`);

--
-- Indexes for table `StateRegion`
--
ALTER TABLE `StateRegion`
  ADD PRIMARY KEY (`StateRegionID`),
  ADD UNIQUE KEY `StateRegionCode` (`StateRegionCode`),
  ADD KEY `CountryID` (`CountryID`);

--
-- Indexes for table `Subcategory`
--
ALTER TABLE `Subcategory`
  ADD PRIMARY KEY (`SubcategoryID`),
  ADD UNIQUE KEY `SubcategoryCode` (`SubcategoryCode`),
  ADD UNIQUE KEY `unique_subcategory` (`SubcategoryName`,`CategoryCode`),
  ADD KEY `FK_CategoryCode` (`CategoryCode`);

--
-- Indexes for table `Township`
--
ALTER TABLE `Township`
  ADD PRIMARY KEY (`TownshipID`),
  ADD KEY `StateRegionCode` (`StateRegionCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Brands`
--
ALTER TABLE `Brands`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `CategoryBrand`
--
ALTER TABLE `CategoryBrand`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `CategoryBrandSubcategory`
--
ALTER TABLE `CategoryBrandSubcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `District`
--
ALTER TABLE `District`
  MODIFY `DistrictID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `MeasurementUnits`
--
ALTER TABLE `MeasurementUnits`
  MODIFY `UnitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `NewCountries`
--
ALTER TABLE `NewCountries`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `StateRegion`
--
ALTER TABLE `StateRegion`
  MODIFY `StateRegionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Subcategory`
--
ALTER TABLE `Subcategory`
  MODIFY `SubcategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `Township`
--
ALTER TABLE `Township`
  MODIFY `TownshipID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Brands`
--
ALTER TABLE `Brands`
  ADD CONSTRAINT `FK_CountryName` FOREIGN KEY (`CountryName`) REFERENCES `NewCountries` (`CountryName`) ON DELETE SET NULL;

--
-- Constraints for table `CategoryBrand`
--
ALTER TABLE `CategoryBrand`
  ADD CONSTRAINT `categorybrand_ibfk_1` FOREIGN KEY (`BrandID`) REFERENCES `Brands` (`BrandID`) ON DELETE CASCADE,
  ADD CONSTRAINT `categorybrand_ibfk_2` FOREIGN KEY (`CategoryCode`) REFERENCES `Category` (`CategoryCode`) ON DELETE CASCADE;

--
-- Constraints for table `CategoryBrandSubcategory`
--
ALTER TABLE `CategoryBrandSubcategory`
  ADD CONSTRAINT `categorybrandsubcategory_ibfk_1` FOREIGN KEY (`BrandID`) REFERENCES `Brands` (`BrandID`) ON DELETE CASCADE,
  ADD CONSTRAINT `categorybrandsubcategory_ibfk_2` FOREIGN KEY (`CategoryCode`) REFERENCES `Category` (`CategoryCode`) ON DELETE CASCADE,
  ADD CONSTRAINT `categorybrandsubcategory_ibfk_3` FOREIGN KEY (`SubcategoryCode`) REFERENCES `Subcategory` (`SubcategoryCode`) ON DELETE CASCADE;

--
-- Constraints for table `District`
--
ALTER TABLE `District`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`StateRegionID`) REFERENCES `StateRegion` (`StateRegionID`);

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `fk_products_brand` FOREIGN KEY (`BrandName`) REFERENCES `Brands` (`BrandName`),
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`CategoryName`) REFERENCES `Category` (`CategoryName`),
  ADD CONSTRAINT `fk_products_subcategory` FOREIGN KEY (`SubcategoryName`) REFERENCES `Subcategory` (`SubcategoryName`),
  ADD CONSTRAINT `fk_products_unit` FOREIGN KEY (`Unit`) REFERENCES `MeasurementUnits` (`ShortWord`);

--
-- Constraints for table `StateRegion`
--
ALTER TABLE `StateRegion`
  ADD CONSTRAINT `stateregion_ibfk_1` FOREIGN KEY (`CountryID`) REFERENCES `NewCountries` (`CountryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Subcategory`
--
ALTER TABLE `Subcategory`
  ADD CONSTRAINT `FK_CategoryCode` FOREIGN KEY (`CategoryCode`) REFERENCES `Category` (`CategoryCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Township`
--
ALTER TABLE `Township`
  ADD CONSTRAINT `township_ibfk_1` FOREIGN KEY (`StateRegionCode`) REFERENCES `StateRegion` (`StateRegionCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
