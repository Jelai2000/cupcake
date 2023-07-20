-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 04:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cupcake`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(18, 14, 1, 1, '2023-07-15 03:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(15, 'Wedding Cake', 'wedding-cake', 'For wedding celebrations', 0, 0, '1689815902.png', 'Wedding Cake', 'Wedding Cake', 'Wedding Cake ', '2023-07-08 09:39:58'),
(17, 'Birthday Cake', 'Birthday-cake', 'Birthday Cake', 0, 1, '1689389371.png', 'Birthday Cake', 'Birthday Cake', 'Birthday Cake ', '2023-07-15 02:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `zipcode` int(255) NOT NULL,
  `shippingFee` int(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `img_receipt` varchar(255) NOT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deliveryDate` date DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `img_custom` varchar(255) DEFAULT NULL,
  `refund_status` tinyint(4) NOT NULL DEFAULT 0,
  `img_refundReceipt` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `zipcode`, `shippingFee`, `total_price`, `payment_mode`, `img_receipt`, `payment_status`, `status`, `deliveryDate`, `comments`, `img_custom`, `refund_status`, `img_refundReceipt`, `created_at`) VALUES
(1, 'cupcake90903972761617', 7, 'Claire Feliciano', 'claireclaritaclairedereign@gmail.com', '+63972761617', 'gd', 2306, 100, 0, 'BDO', '1689747699.png', 0, 1, '2023-07-27', NULL, '1689747699.png', 0, NULL, '2023-07-19 06:21:39'),
(2, 'cupcake686363) 967 276 1617', 7, 'Claire Feliciano', 'pytclaire21@gmail.com', '(+63) 967 276 1617', 'Camiling Tarlac', 2306, 100, 1198, 'Gcash', '1689754651.', 0, 2, '2023-07-22', NULL, NULL, 0, NULL, '2023-07-19 08:17:31'),
(3, 'cupcake211263 96727616 17', 7, 'Victor Tibayan', 'tibayanvictor@gmail.com', '+ 63 96727616 17', 'North Caloocan', 5684, 100, 799, 'BPI', '1689754964.', 0, 0, '2023-07-21', NULL, NULL, 0, NULL, '2023-07-19 08:22:44'),
(4, 'cupcake529763) 967 276 1617', 7, 'Sofia Mora', 'sofiamora@gmail.com', '(+63) 967 276 1617', 'South Caloocan', 2306, 100, 0, 'BDO', '1689755292.jpg', 0, 0, '2023-07-28', NULL, '1689755292.png', 0, NULL, '2023-07-19 08:28:12'),
(5, 'cupcake78853972761617', 7, 'Claire Feliciano', 'pytclaire21@gmail.com', '+63972761617', 'Camiling Tarlac', 2306, 100, 798, 'BDO', '1689755452.png', 1, 1, '2023-07-22', NULL, NULL, 0, NULL, '2023-07-19 08:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(17, 14, 23, 1, 499, '2023-07-18 23:33:08'),
(18, 15, 24, 1, 399, '2023-07-18 23:34:48'),
(19, 16, 1, 1, 499, '2023-07-19 02:42:12'),
(20, 17, 27, 2, 499, '2023-07-19 02:44:49'),
(21, 18, 27, 3, 499, '2023-07-19 02:50:23'),
(22, 19, 25, 1, 599, '2023-07-19 02:59:05'),
(23, 2, 28, 1, 399, '2023-07-19 08:17:31'),
(24, 2, 26, 1, 799, '2023-07-19 08:17:31'),
(25, 3, 26, 1, 799, '2023-07-19 08:22:44'),
(26, 5, 28, 2, 399, '2023-07-19 08:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` int(199) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `discount`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(1, 17, 'Chocolate Cake', 'chocolate-cake', 'These cakes are a true delight for anyone with a sweet tooth and a passion for rich, decadent flavors.', 'Made with the finest quality chocolate, these cakes offer a velvety texture and a deep, intense chocolate taste that is sure to satisfy cravings.', 500, 499, '1689690606.png', 0, 0, 0, 1, 'Chocalate Cake', 'Chocolate Cake', 'Chocolate Cake', '2023-06-06 02:55:28'),
(23, 17, 'Baby Boy Cake', 'baby-boy-cake', 'A baby boy blue birthday cake is a delightful confection crafted specifically for celebrating a little boys special day', 'Adorned with shades of blue it exudes a charming and whimsical aura', 500, 499, '1689689828.png', 0, 0, 0, 0, 'Baby Boy Cake', 'Baby Boy Cake', 'Baby Boy Cake', '2023-07-18 14:17:08'),
(24, 17, 'Floral Pandan Cake', 'floral-pandan-cake', ' Matcha cake is a delectable dessert made with vibrant green matcha powder, resulting in a rich and earthy flavor. ', ' It has a moist and tender texture, often paired with light and creamy frosting, making it a delightful treat for matcha lovers. ', 500, 399, '1689690856.png', 0, 0, 0, 0, 'Floral Pandan Cake', 'Floral Pandan Cake', 'Floral Pandan Cake', '2023-07-18 14:34:16'),
(25, 15, 'Wedding Anniversary Cake', 'wedding-anniversary-cake', ' A Wedding Anniversary Cake is a symbol of love and celebration crafted to commemorate the special milestone of a couples enduring commitment', ' Often adorned with elegant decorations such as intricate designs and personalized toppers this cake is a sweet testament to the enduring bond between two hearts', 700, 599, '1689691169.png', 0, 0, 0, 0, 'Wedding Anniversary Cake', 'Wedding Anniversary Cake', 'Wedding Anniversary Cake', '2023-07-18 14:39:29'),
(26, 15, 'Golden Delight Cake', 'golden-delight-cake', 'The Golden Delight Cake is a mesmerizing confection that radiates elegance and luxury', 'Perfect for special occasions or as a centerpiece at celebrations the Golden Delight Cake promises a truly unforgettable and golden experience for the palate', 800, 799, '1689691584.png', -1, 0, 0, 0, 'Golden Delight Cake', 'Golden Delight Cake', 'Golden Delight Cake', '2023-07-18 14:46:24'),
(27, 15, 'Wedding Cake', 'wedding-cake', ' The wedding cake is the crowning centerpiece of a joyous celebration and embodies the love and union between two souls ', ' The wedding cake stands as a sweet testament to the cherished memories and promises made on this momentous day making it an unforgettable highlight of the celebration ', 500, 499, '1689691697.png', -4, 0, 0, 1, 'Wedding Cake', 'Wedding Cake', 'Wedding Cake', '2023-07-18 14:48:17'),
(28, 15, 'Number Cake', 'number-cake', ' The number 9-shaped cake is a delightful confection that adds a touch of fun and significance to any celebration ', ' From the first slice to the last each bite is a sweet reminder of the special moment being celebrated and creating lasting memories that will be treasured for years to come ', 400, 399, '1689691809.png', -2, 0, 0, 1, 'Number Cake', 'Number Cake', 'Number Cake', '2023-07-18 14:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `requester` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `request` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requester`, `email`, `request`, `message`, `date`, `status`) VALUES
(10, 'Claire Feliciano', 'pytclaire21@gmail.com', 'CHANGE COLOR OF LOGO', 'Make it the color brighter and colorful. Thank You', '2023-07-19 20:10:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `image`, `firstname`, `lastname`, `username`, `email`, `password`, `status`, `date`) VALUES
(1, 'Aaron Kim.jpg', 'Aaron', 'Kim', 'aaronKim', 'aaron@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'active', '2023-06-05'),
(4, 'Christine Reyes.jpg', 'Christine', 'Reyes', 'christineReyes', 'christine@gmail.com', '19b58543c85b97c5498edfd89c11c3aa8cb5fe51', 'inactive', '2023-06-05'),
(6, 'Charles Darwin.jpg', 'Charles', 'Darwin', 'charlesDarwin', 'charles@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'active', '2023-06-05'),
(8, 'Analyn Santos.jpg', 'Analyn', 'Santos', 'analynSantos', 'analyn@gmail.com', '9878e362285eb314cfdbaa8ee8c300c285856810', 'active', '2023-06-05'),
(9, 'Claire Tampipi.jpg', 'Claire', 'Tampipi', 'claireTampipi', 'claire@gmail.com', 'f1b699cc9af3eeb98e5de244ca7802ae38e77bae', 'active', '2023-06-05'),
(10, 'Jane Park.jpg', 'Jane', 'Park', 'janePark', 'jane@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'active', '2023-06-05'),
(11, 'Joseph Lim.jpg', 'Joseph', 'Lim', 'josephLim', 'joseph@gmail.com', 'c4bfeb721012d1b5338b2aa107c52277a7af45c6', 'pending', '2023-06-05'),
(12, 'Juan Delacruz.jpg', 'Juan', 'Delacruz', 'juanDelacruz', 'juan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'inactive', '2023-06-05'),
(13, 'Mike Enriquez.jpg', 'Mike', 'Enriquez', 'mikeEnriquez', 'mike@gmail.com', 'c4bfeb721012d1b5338b2aa107c52277a7af45c6', 'active', '2023-06-05'),
(14, 'Feliciano__Claire_B__toga__1pc_8r_no_border__2_-removebg.png', 'Claire', 'Feliciano', 'felicianoClaire', 'pytclaire21@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'active', '2023-06-05'),
(15, 'Feliciano__Claire_B__toga__1pc_8r_no_border__2_-removebg.png', 'Claire', 'Feliciano', 'pytclaireeeee', 'pytclaire221@gmail.com', '6bc77e271bad18c344d81ab58548132b828c34ef', 'active', '2023-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 0,
  `verify` varchar(255) NOT NULL,
  `verify_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=n, 1=yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `phone`, `password`, `role_id`, `verify`, `verify_status`, `created_at`, `id`) VALUES
('Claire', 'marcasbautista@gmail.com', '(+63) 967 276 1617', 'Faithful@#42519', 0, '34318d9eb7a8d2b0ef33963274e4b63b', 0, '2023-07-01 02:45:19', 3),
('pytclaire21', 'pytclaire21@gmail.com', '(+63) 967 276 1617', '1234Claire#', 0, '89660d686b3f8860c3d7fed8464dc175', 1, '2023-07-15 01:31:21', 5),
('shumi', 'exom241@gmail.com', '09302580281', 'Zxcvbnm00)', 0, 'dd43d9730d2b852463653c5440eade2f', 1, '2023-07-18 14:21:53', 6),
('felicianoClaire', 'claireclaritaclairedereign@gmail.com', '+ 63 96727616 17', '6bc77e271bad18c344d81ab58548132b828c34ef', 0, '52a4836f49526443209253a2a085180b', 1, '2023-07-19 16:16:09', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
