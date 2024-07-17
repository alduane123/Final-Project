-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 01:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atelier`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `category`, `price`, `stock_quantity`, `image_url`) VALUES
(1, 'Carpetworld Temple Contour', 'Area Rugs & Carpets', 26950.00, 100, 'https://ourhome.ph/cdn/shop/files/OURHOMECARPETWORLDCONTOUR160X230TEMPLE_1_1000x.jpg?v=1719221160'),
(2, 'Carpetworld Massa Marvel', 'Area Rugs & Carpets', 34650.00, 100, 'https://ourhome.ph/cdn/shop/files/OURHOMECARPETWORLDLOMETA160X230MARVEL28069_1_1000x.jpg?v=1719221165'),
(3, 'Carpetworld Foggia Charlotte', 'Area Rugs & Carpets', 31050.00, 100, 'https://ourhome.ph/cdn/shop/files/OURHOMECARPETWORLDFOGGIA160X230CYRUS0723_1_1000x.jpg?v=1719220556'),
(4, 'Carpetworld Waretown Olivia', 'Area Rugs & Carpets', 3975.00, 100, 'https://ourhome.ph/cdn/shop/files/OURHOMECARPETWORLDOLIVIA39234223_1_1000x.jpg?v=1719221172'),
(5, 'Carpetworld Menard Softness', 'Area Rugs & Carpets', 34650.00, 100, 'https://ourhome.ph/cdn/shop/files/OURHOMECARPETWORLDMENARDSOFTNESS6898160X230CM_1_1000x.jpg?v=1719220844'),
(6, 'Canadian T300 Tencel Fitted Sheet Set', 'Bedsheets', 2639.00, 100, 'https://ourhome.ph/cdn/shop/files/TENCELFOSSILGRAY_1500x.jpg?v=1688623085'),
(7, 'Family Home Jacquard Fitted Sheet Set', 'Bedsheets', 2639.00, 100, 'https://cdn.shopify.com/s/files/1/0290/6177/5439/products/FamilyHomeJacquardFittedSheetSet_38194097.jpg?v=1647239120&width=300'),
(8, 'Family Home Naturel Fitted Sheet Set', 'Bedsheets', 2639.00, 100, 'https://ourhome.ph/cdn/shop/products/FamilyHomeNaturelFittedSheetSet_38248402_1000x.jpg?v=1647240064'),
(9, 'Boutique Supima Fitted Sheet Set', 'Bedsheets', 2639.00, 100, 'https://ourhome.ph/cdn/shop/products/BoutiqueSupimaFittedSheetSet_39184899_1000x.jpg?v=1647241673'),
(10, 'Canadian T300 Egyptian Cotton Fitted Sheet Set', 'Bedsheets', 2639.00, 100, 'https://ourhome.ph/cdn/shop/files/CAIROBLUE_e5ff770a-ea7a-463d-b54e-6655bc39782b_2472x.jpg?v=1688008342'),
(11, 'Telas de Mercato Sky 1', 'Blackout Curtains', 1709.00, 100, 'https://ourhome.ph/cdn/shop/products/IMG_2022_01_27_9999_12_1000x.jpg?v=1648634042'),
(12, 'Telas De Mercato Sky Blackout Curtain', 'Blackout Curtains', 2519.00, 100, 'https://ourhome.ph/cdn/shop/products/39220935-_2_1000x.jpg?v=1648633291'),
(13, 'Eglo Pendant Lighting 39504', 'Ceiling Lighting', 11655.00, 100, 'https://ourhome.ph/cdn/shop/products/39208986-_2_1000x.jpg?v=1632893693'),
(14, 'Eglo Pendant Lighting 39508', 'Ceiling Lighting', 17055.00, 100, 'https://ourhome.ph/cdn/shop/products/39208985_1000x.jpg?v=1632893757'),
(15, 'Our Home Fenton Bedframe', 'Bedframes', 24950.00, 100, 'https://ourhome.ph/cdn/shop/products/FENTONBF36x75_10425670_1_7bf2ff99-0d74-4209-8aee-4d2d5ecdb623_1000x.jpg?v=1679982704'),
(16, 'Our Home Ashy Towel', 'Blankets', 399.00, 100, 'https://ourhome.ph/cdn/shop/files/OURHOME10426988ASHYMULTIPURPOSETOWELGRAY30X60_1_1000x.jpg?v=1716789235'),
(17, 'Our Home Fleece Blanket', 'Blankets', 999.00, 100, 'https://ourhome.ph/cdn/shop/files/FLANNEL1_6da2fe5b-e131-4fb3-965f-5edf78e826f5_1080x.jpg?v=1719275245');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` text DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `shipping_method` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `item_id`, `total_amount`, `name`, `order_date`, `address`, `payment_method`, `shipping_method`, `status`) VALUES
(1, 1, 0, 61600.00, 'qwe', '2024-07-12 21:37:10', '123qwe', 'Cash on delivery', 'Pickup', 'Pending'),
(2, 1, 0, 26950.00, 'asd', '2024-07-12 21:51:25', 'ad', 'E-wallet', 'Third Party Delivery', 'Pending'),
(3, 1, 0, 53900.00, 'fgh', '2024-07-12 22:12:43', 'fgh', 'Credit/Debit card', 'Pickup', 'Pending'),
(4, 1, 0, 26950.00, 'adsa', '2024-07-12 22:26:16', 'aqdw', 'E-wallet', 'Third Party Delivery', 'Pending'),
(5, 1, 0, 5158.00, 'qe', '2024-07-12 22:31:39', 'qwe', 'E-wallet', 'Third Party Delivery', 'Pending'),
(6, 1, 0, 63309.00, 'tyu', '2024-07-12 22:36:34', 'tyu', 'E-wallet', 'Third Party Delivery', 'Pending'),
(7, 1, 0, 26950.00, 'Test Five', '2024-07-12 22:37:16', 'adsqaw', 'Credit/Debit card', 'Third Party Delivery', 'Pending'),
(8, 1, 3, 31050.00, 'asd', '2024-07-12 23:00:11', 'asd', 'Cash on delivery', 'Standard Delivery', 'Pending'),
(9, 1, 8, 33689.00, 'asd', '2024-07-12 23:00:11', 'asd', 'Cash on delivery', 'Standard Delivery', 'Pending'),
(10, 1, 2, 34650.00, 'iop', '2024-07-12 23:00:40', 'iop', 'Cash on delivery', 'Standard Delivery', 'Pending'),
(11, 1, 3, 65700.00, 'iop', '2024-07-12 23:00:40', 'iop', 'Cash on delivery', 'Standard Delivery', 'Pending'),
(12, 2, 5, 34650.00, 'poi', '2024-07-12 23:03:24', 'poi', 'E-wallet', 'Standard Delivery', 'Pending'),
(13, 2, 7, 37289.00, 'poi', '2024-07-12 23:03:25', 'poi', 'E-wallet', 'Standard Delivery', 'Pending'),
(14, 2, 10, 39928.00, 'poi', '2024-07-12 23:03:25', 'poi', 'E-wallet', 'Standard Delivery', 'Pending'),
(15, 3, 7, 2639.00, 'user', '2024-07-12 23:08:21', 'asd', 'Cash on delivery', 'Standard Delivery', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, '123', '123'),
(2, 'qwe', 'qwe'),
(3, 'user', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
