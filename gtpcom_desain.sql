-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 07:24 PM
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
-- Database: `gtpcom_desain`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(5) NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Normal_Cake'),
(2, 'Wedding_Cake'),
(3, 'Birthday_Cake'),
(4, 'test'),
(5, 'test'),
(6, 'tetsing'),
(7, 'try');

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id_color_product` int(20) NOT NULL,
  `item_color` varchar(50) NOT NULL,
  `color_hexa` varchar(6) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `id_product` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id_color_product`, `item_color`, `color_hexa`, `cost`, `title`, `id_product`) VALUES
(3, 'cake5in-blue', 'ADD8E6', '40000', 'Blue', 1),
(5, 'cake5in-white', 'fff', '40000', 'White', 1),
(6, 'circle10in-white', 'fff', '45000', 'White', 2),
(7, 'circle10in-black', '666666', '45000', 'Gray', 2),
(8, 'circle10in-green', 'bfff80', '45000', 'Green', 2),
(9, 'circle10in-darkpink', 'e75481', '45000', 'Dark Pink', 2),
(10, 'circle10in-blue', 'ADD8E6', '45000', 'Blue', 2),
(11, 'square-white', 'fff', '80000', 'White', 3),
(12, 'square-black', '666666', '80000', 'Black', 3),
(13, 'square-blue', 'ADD8E6', '80000', 'Blue', 3),
(14, 'square-red', 'e75481', '80000', 'Red', 3),
(15, 'square-brown', 'e1b487', '80000', 'Brown', 3),
(16, 'cake2layer-white', 'ffff', '1500', 'White', 4),
(17, 'cake2layer-blue', 'ADD8E6', '1500', 'Light Blue', 4),
(18, 'cake2layer-purple', 'CBC3E3', '1500', 'Purple', 4),
(19, 'cake2layer-darkpink', 'e75481', '1500', 'Dark Pink', 4),
(20, 'cake2layer-yellow', 'ffff00', '1500', 'Yellow', 4),
(21, 'cake2layer-black', '666666', '1500', 'Black', 4),
(22, 'circle10in-pink', 'ffc0cb', '1500', 'Pink', 2),
(23, 'square-purple', 'CBC3E3', '1500', 'Purple', 3),
(24, 'square-yellow', 'ffff00', '150', 'Yellow', 3);

-- --------------------------------------------------------

--
-- Table structure for table `font`
--

CREATE TABLE `font` (
  `id_font` int(20) NOT NULL,
  `name_font` varchar(50) NOT NULL,
  `name_style` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `font`
--

INSERT INTO `font` (`id_font`, `name_font`, `name_style`) VALUES
(1, 'Arial', 'Arial'),
(2, 'Friday Night', 'friday_night_lightsregular'),
(3, 'Verdana', 'Verdana');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(20) NOT NULL,
  `folder` varchar(50) NOT NULL,
  `name_gambar` varchar(255) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `id_image_category` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `folder`, `name_gambar`, `cost`, `id_image_category`) VALUES
(1, 'Icing', 'wpcream.png', '15000', 1),
(6, 'Fruits', 'strawberry.png', '11500', 2),
(7, 'Fruits', 'berries.png', '11000', 2),
(10, 'Decoration', 'icing.png', '50', 3),
(11, 'Decoration', 'mallows.png', '1500', 3);

-- --------------------------------------------------------

--
-- Table structure for table `image_category`
--

CREATE TABLE `image_category` (
  `id_image_category` int(20) NOT NULL,
  `name_image_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `image_category`
--

INSERT INTO `image_category` (`id_image_category`, `name_image_category`) VALUES
(1, 'Icing'),
(2, 'Fruits'),
(3, 'Decoration');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id_item_category` int(10) NOT NULL,
  `name_item_category` varchar(50) NOT NULL,
  `id_category` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id_item_category`, `name_item_category`, `id_category`) VALUES
(1, 'Circle', 1),
(2, 'Square', 1),
(3, 'Circle', 2);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `people_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mid_name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `first_name`, `last_name`, `mid_name`, `address`, `contact`, `comment`) VALUES
(1, 'Joken', 'Villanuevas', 'Entierro', 'Kabankalan City', '9289324734', 'Programming iss fun!'),
(2, 'Charlotte', 'Embang', 'Etabag', 'Guanzon Street', '23124123', 'just another comment!');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(20) NOT NULL,
  `item_model` varchar(50) NOT NULL,
  `item_info` text NOT NULL,
  `item_color` varchar(50) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `id_item_category` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `item_model`, `item_info`, `item_color`, `cost`, `id_item_category`) VALUES
(1, 'Circle5inches', 'Sizes:S-3XL <br/> Colors Available:15 Min <br/> Qty:1 <br/> Price Guide:$$ (out of $$$) <br/>\n                    Detail: <li>10 oz. All colors are a poly/cotton blend</li>\n                    <li>Comfortable low-pill fleece fabric</li>\n                    <li>Spandex-ribbed cuffs and waistband for comfort</li>', 'cake5in-white', '40000', 1),
(2, 'Circle10inches', '', 'circle10in-white', '45000', 1),
(3, 'Square10X5', '', 'square-white', '80000', 2),
(4, 'Cake2Layer', '2 Layer Wedding Cake', 'cake2layer-white', '1500', 3),
(15, 'test', 'sdfas', 'sfda', '545', 1),
(16, 'test', 'sdfas', 'sfda', '545', 1),
(17, 'test', 'sdfa', 'sdf', '454', 1),
(18, 'asdf', 'skdf', 'kjbsf', '21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id_color_product`);

--
-- Indexes for table `font`
--
ALTER TABLE `font`
  ADD PRIMARY KEY (`id_font`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `image_category`
--
ALTER TABLE `image_category`
  ADD PRIMARY KEY (`id_image_category`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id_item_category`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id_color_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `font`
--
ALTER TABLE `font`
  MODIFY `id_font` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `image_category`
--
ALTER TABLE `image_category`
  MODIFY `id_image_category` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id_item_category` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `people_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
