-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 05:24 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `isActive`, `updated_at`, `created_at`) VALUES
(1, 'Áo thun', 1, '2018-06-27 10:06:23', '0000-00-00 00:00:00'),
(2, 'Hoodie', 1, '2018-06-27 10:06:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `cityName` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `cityName`, `isActive`, `updated_at`, `created_at`) VALUES
(1, 'Hồ Chí Minh', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(2, 'Hà Nội', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(3, 'Hải Phòng', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(4, 'Đà Nẵng', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(5, 'Bình Thuận', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(6, 'Bà Rịa - Vũng Tàu', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(7, 'Long An', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(8, 'Tiền Giang', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(9, 'Ninh Thuận', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(10, 'Daklak', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(11, 'Quảng Ngãi', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(12, 'Thanh Hóa', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(13, 'Bình Định', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00'),
(14, 'Quảng Nam', 1, '2018-06-27 10:07:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skuCode` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `skuCode`, `updated_at`, `created_at`) VALUES
(5, 'pd1_sku1_1.jpg', 'pd1_sku1', '2018-06-27 10:54:48', '2018-06-27 10:54:48'),
(6, 'pd1_sku2_1.jpg', 'pd1_sku2', '2018-06-27 10:54:48', '2018-06-27 10:54:48'),
(7, 'pd1_sku1_2.jpg', 'pd1_sku1', '2018-06-27 10:54:48', '2018-06-27 10:54:48'),
(9, 'pd1_sku2_2.jpg', 'pd1_sku2', '2018-06-25 08:24:46', '2018-06-25 08:24:46'),
(10, 'pd1_sku3_1.jpg', 'pd1_sku3', '2018-06-27 10:54:48', '2018-06-27 10:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `optionName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `optionName`, `isActive`, `updated_at`, `created_at`) VALUES
(1, 'Màu sắc', 1, '2018-06-27 10:08:44', '0000-00-00 00:00:00'),
(2, 'Size', 1, '2018-06-27 10:08:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `option_values`
--

CREATE TABLE `option_values` (
  `id` int(11) NOT NULL,
  `optionID` int(11) DEFAULT NULL,
  `valueName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `option_values`
--

INSERT INTO `option_values` (`id`, `optionID`, `valueName`, `isActive`, `updated_at`, `created_at`) VALUES
(1, 1, 'red', 1, '2018-06-27 10:09:30', '0000-00-00 00:00:00'),
(2, 1, 'blue', 1, '2018-06-27 10:09:30', '0000-00-00 00:00:00'),
(3, 1, 'green', 1, '2018-06-27 10:09:30', '0000-00-00 00:00:00'),
(4, 1, 'black', 1, '2018-06-27 10:09:30', '0000-00-00 00:00:00'),
(5, 1, 'white', 1, '2018-06-27 10:09:30', '0000-00-00 00:00:00'),
(6, 2, 'S', 1, '2018-06-27 10:09:30', '0000-00-00 00:00:00'),
(7, 2, 'M', 1, '2018-06-27 10:09:30', '0000-00-00 00:00:00'),
(8, 2, 'L', 1, '2018-06-27 10:09:30', '0000-00-00 00:00:00'),
(9, 2, 'XL', 1, '2018-06-27 10:09:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `skus` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `type`, `isActive`, `updated_at`, `created_at`) VALUES
(1, 'cash', 1, '2018-06-27 10:11:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`id`, `productID`, `price`, `startdate`, `enddate`, `updated_at`, `created_at`) VALUES
(1, 1, 150000, '2018-06-10 00:00:00', '2018-06-27 17:47:50', '2018-06-27 10:47:50', '0000-00-00 00:00:00'),
(2, 2, 220000, '2018-06-10 00:00:00', NULL, '2018-06-27 10:12:09', '0000-00-00 00:00:00'),
(3, 1, 100000, '2018-06-27 17:47:50', NULL, '2018-06-27 10:47:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `productDescript` text COLLATE utf8_unicode_ci,
  `categoryID` int(11) DEFAULT NULL,
  `defaultImage` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productDescript`, `categoryID`, `defaultImage`, `price`, `active`, `updated_at`, `created_at`) VALUES
(1, 'Cute Bulldog T-shirt', 'Áo thun dành cho mấy đứa mê chó Bulldog!\r\n', 1, 'product_1.jpg', 100000, 1, '2018-06-27 10:50:49', '0000-00-00 00:00:00'),
(2, 'Cute Bulldog Hoodie', 'Áo Hoodie dành cho mấy chế mê Bulldog!\r\n', 2, 'product_2.jpg', 220000, 1, '2018-06-27 10:50:58', '0000-00-00 00:00:00');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `tg_price` BEFORE UPDATE ON `products` FOR EACH ROW begin
   declare v_price int(11);
   select price into @v_price  from products where id = new.id;
   if (new.price <> @v_price)
   then
   	begin
   		update pricelist set enddate=CURRENT_TIME() WHERE productID=NEW.id;
        insert into pricelist(productID,price, startdate) values (New.id,NEW.price,CURRENT_TIME());
     end;
   end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_price_insert` AFTER INSERT ON `products` FOR EACH ROW begin
   declare v_price int(11);
   select price into @v_price  from products where id = new.id;
        insert into pricelist(productID,price, startdate) values (New.id,NEW.price,CURRENT_TIME());
   
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `id` int(11) NOT NULL,
  `customer` int(11) DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `shipper` int(11) DEFAULT NULL,
  `orderedDate` datetime DEFAULT NULL,
  `shippedDate` datetime DEFAULT NULL,
  `orderPhone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orderCity` int(11) DEFAULT NULL,
  `orderAddress1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orderAddress2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orderCountry` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `id` int(11) NOT NULL,
  `companyName` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`id`, `companyName`, `phone`, `isActive`, `updated_at`, `created_at`) VALUES
(1, 'bưu điện', '11111', 1, '2018-06-27 10:20:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `skus`
--

CREATE TABLE `skus` (
  `productID` int(11) DEFAULT NULL,
  `skuCode` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `inStock` int(11) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skus`
--

INSERT INTO `skus` (`productID`, `skuCode`, `inStock`, `active`, `updated_at`, `created_at`) VALUES
(1, 'pd1_sku1', 3, 1, '2018-06-25 07:49:31', '2018-06-25 07:49:31'),
(1, 'pd1_sku2', 3, 1, '2018-06-25 07:51:33', '2018-06-25 07:51:33'),
(1, 'pd1_sku3', 4, 1, '2018-06-25 08:29:56', '2018-06-25 08:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `stt_order`
--

CREATE TABLE `stt_order` (
  `id` int(11) NOT NULL,
  `sttName` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stt_order`
--

INSERT INTO `stt_order` (`id`, `sttName`, `updated_at`, `created_at`) VALUES
(1, 'draft', '2018-06-27 10:28:28', '0000-00-00 00:00:00'),
(2, 'shipping', '2018-06-27 10:28:28', '0000-00-00 00:00:00'),
(3, 'paid', '2018-06-27 10:28:28', '0000-00-00 00:00:00'),
(4, 'canceled', '2018-06-27 10:28:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateRegister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verified` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cityID` int(11) NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `isAdmin`, `password`, `firstName`, `lastName`, `dateRegister`, `verified`, `phone`, `address`, `address2`, `cityID`, `country`, `isActive`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin@admin.com', 1, '$2y$12$FRJTI1NHWmeFB3.2QUNzYOOjOtOHaWbZoEGHPxkU2yMx5JTOCgaz2', 'Quốc', 'Anh', '2018-06-27 10:57:39', 1, '0123456789', '345 Phạm Văn Đồng', 'p5 Quận Bình Thạnh', 1, 'VN', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `skuCode` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `optionID` int(11) NOT NULL,
  `valueID` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`skuCode`, `optionID`, `valueID`, `updated_at`, `created_at`) VALUES
('pd1_sku1', 1, 2, '2018-06-25 07:49:31', '2018-06-25 07:49:31'),
('pd1_sku1', 2, 6, '2018-06-25 07:49:31', '2018-06-25 07:49:31'),
('pd1_sku2', 1, 3, '2018-06-25 07:51:33', '2018-06-25 07:51:33'),
('pd1_sku2', 2, 7, '2018-06-25 07:51:33', '2018-06-25 07:51:33'),
('pd1_sku3', 1, 3, '2018-06-25 08:29:56', '2018-06-25 08:29:56'),
('pd1_sku3', 2, 8, '2018-06-25 08:29:56', '2018-06-25 08:29:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cityName` (`cityName`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skuCode` (`skuCode`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_values`
--
ALTER TABLE `option_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `optionID` (`optionID`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_skus` (`skus`),
  ADD KEY `fk_orderID` (`orderID`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_price` (`productID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stt` (`stt`),
  ADD KEY `fk_payment` (`payment`),
  ADD KEY `fk_shipper` (`shipper`),
  ADD KEY `fk_user` (`customer`),
  ADD KEY `fk_city` (`orderCity`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skus`
--
ALTER TABLE `skus`
  ADD PRIMARY KEY (`skuCode`),
  ADD KEY `fk_product_skus` (`productID`);

--
-- Indexes for table `stt_order`
--
ALTER TABLE `stt_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cityID` (`cityID`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`skuCode`,`optionID`),
  ADD KEY `valueID` (`valueID`),
  ADD KEY `optionID` (`optionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `option_values`
--
ALTER TABLE `option_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_order`
--
ALTER TABLE `sale_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stt_order`
--
ALTER TABLE `stt_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`skuCode`) REFERENCES `skus` (`skuCode`);

--
-- Constraints for table `option_values`
--
ALTER TABLE `option_values`
  ADD CONSTRAINT `option_values_ibfk_1` FOREIGN KEY (`optionID`) REFERENCES `options` (`id`);

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `fk_orderID` FOREIGN KEY (`orderID`) REFERENCES `sale_order` (`id`),
  ADD CONSTRAINT `fk_skus` FOREIGN KEY (`skus`) REFERENCES `skus` (`skuCode`);

--
-- Constraints for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD CONSTRAINT `fk_product_price` FOREIGN KEY (`productID`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`);

--
-- Constraints for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD CONSTRAINT `fk_city` FOREIGN KEY (`orderCity`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `fk_payment` FOREIGN KEY (`payment`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `fk_shipper` FOREIGN KEY (`shipper`) REFERENCES `shipper` (`id`),
  ADD CONSTRAINT `fk_stt` FOREIGN KEY (`stt`) REFERENCES `stt_order` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`customer`) REFERENCES `users` (`id`);

--
-- Constraints for table `skus`
--
ALTER TABLE `skus`
  ADD CONSTRAINT `fk_product_skus` FOREIGN KEY (`productID`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_cityID` FOREIGN KEY (`cityID`) REFERENCES `city` (`id`);

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_ibfk_1` FOREIGN KEY (`valueID`) REFERENCES `option_values` (`id`),
  ADD CONSTRAINT `variants_ibfk_2` FOREIGN KEY (`skuCode`) REFERENCES `skus` (`skuCode`),
  ADD CONSTRAINT `variants_ibfk_3` FOREIGN KEY (`optionID`) REFERENCES `options` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
