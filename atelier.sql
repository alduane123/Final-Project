-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 05:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `image_url` varchar(255) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `category`, `price`, `stock_quantity`, `image_url`, `description`) VALUES
(3, 'Kiff Sheet Set', 'Bedsheets', '2650.00', 89, 'product_img/bedsheet1.jpg', 'Explore affordable comfort and style with our printed microfiber bed sheet sets. Designed for cozy relaxation, our sets feature vibrant prints and soft microfiber fabric.'),
(4, 'Family Home Alstaten Fitted Sheet Set', 'Bedsheets', '3299.00', 97, 'product_img/bedsheet2.jpg', 'A Modern Contemporary 4-piece set (1 fitted sheet, 1 flat sheet, 2 pillowcases) and 3-piece set (1 fitted sheet, 2 pillowcase) with 250 thread count in beige and blue stripes background with aztec pattern.'),
(5, 'Family Home Biel Fitted Sheet Set', 'Bedsheets', '3299.00', 90, 'product_img/bedsheet3.jpg', 'A Modern Contemporary 4-piece set (1 fitted sheet, 1 flat sheet, 2 pillowcases) and 3-piece set (1 fitted sheet, 2 pillowcase) with 250 thread count in black and white with geometric pattern.'),
(6, 'Family Home Jacquard Fitted Sheet Set', 'Bedsheets', '3799.00', 75, 'product_img/bedsheet4.jpg', 'A Classic 4-piece set (1 fitted sheet, 1 flat sheet, 2 pillowcases) and 3-piece set (1 fitted sheet, 2 pillowcase) with 510 thread count in plain white color with ticking stripes pattern.'),
(7, 'Family Home Jacquard Box Fitted Sheet Set', 'Bedsheets', '3799.00', 79, 'product_img/bedsheet5.jpg', 'A Modern Contemporary 4-piece set (1 fitted sheet, 1 flat sheet, 2 pillowcases) and 3-piece set (1 fitted sheet, 2 pillowcase) with 510 thread count in plain white color with box pattern.'),
(8, 'Family Home Hotel Living Fitted Sheet Set', 'Bedsheets', '2650.00', 80, 'product_img/bedsheet6.jpg', 'A Modern Contemporary minimalist 4-piece set (1 fitted sheet, 1 flat sheet, 2 pillowcases) and 3-piece set (1 fitted sheet, 2 pillowcase) with 220 thread count.'),
(9, 'Boutique Hotel Collection Fitted Sheet', 'Bedsheets', '2350.00', 98, 'product_img/bedsheet7.jpg', 'A Classic 4-piece set (1 fitted sheet, 1 flat sheet, 2 pillowcases) and 3-piece set (1 fitted sheet, 2 pillowcase) with 300 thread count in plain white color with stripes pattern.'),
(10, 'Boutique Supima Fitted Sheet Set', 'Bedsheets', '4650.00', 88, 'product_img/bedsheet8.jpg', 'A Classic 4-piece set (1 fitted sheet, 1 flat sheet, 2 pillowcases) and 3-piece set (1 fitted sheet, 2 pillowcases) made from Supima cotton with 500 thread count in plain white color.'),
(11, 'Carpetworld Temple Contour', 'Area Rugs & Carpets', '26950.00', 97, 'product_img/carpet1.jpg', 'The combination yields a high-end 3D-relief effect, complemented by a refined velvety sheen. Each pattern in the collection is thoughtfully crafted to showcase intricate contours and stunning outlines. The Contour Collection’s luxurious high-low pile boasts a distinct and sophisticated appearance achieved through the fusion of three different yarn types.'),
(12, 'Carpetworld Massa Marvel', 'Area Rugs & Carpets', '34650.00', 99, 'product_img/carpet2.jpg', 'Offering a rug for almost every kind of interior decor, these supple, smooth low-pile rugs are made with 100% microset polypropylene pile, ensuring they are easy to clean and non-shedding. The subtle sheen of the high-quality polypropylene yarn adds a lush touch to the rich neutral colors and the unsaturated gray and rusty hues that are smoothly blended into every Marvel rug.'),
(13, 'Carpetworld Foggia Charlotte', 'Area Rugs & Carpets', '31050.00', 80, 'product_img/carpet3.jpg', 'The woven fibers make these rugs both non-shedding and easy to maintain. Embossed polyester fiber and heat-set yarn instantly perk up any interior space with their dynamic abstract curves design. The Roggia carpet from Charlotte collection provides a stylish and contemporary look, adding a sophisticated touch to any room.'),
(14, 'Carpetworld Waretown Olivia', 'Area Rugs & Carpets', '3975.00', 72, 'product_img/carpet4.jpg', 'The woven fibers make this rug both non-shedding and easy to maintain. Embossed polyester fiber and heat-set yarn instantly perk up any interior space. The Waretown carpet boasts timeless designs that seamlessly integrate with various room styles.'),
(15, 'Carpetworld Menard Softness', 'Area Rugs & Carpets', '19250.00', 89, 'product_img/carpet5.jpg', 'This plush and flexible Menard rug is made from 100% heat-set polypropylene yarn, offering both ease of cleaning and resistance to shedding. The Softess collection showcases understated, sophisticated designs that bring a luxurious and stylish flair to your home.'),
(16, 'Carpetworld Belluno Softness', 'Area Rugs & Carpets', '26550.00', 93, 'product_img/carpet6.jpg', 'This smooth and supple Belluno rug is crafted from 100% polypropylene heat-set yarn, ensuring they are both easy to clean and non-shedding. The Softness collection features classic, muted designs that add a touch of luxury and a smart, chic twist to complement your interior space.');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
