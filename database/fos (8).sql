-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 05:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_ip` varchar(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(7, 'Snacks'),
(8, 'Tiffen'),
(9, 'Launch'),
(10, 'Juice');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) DEFAULT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `emp_salary` varchar(100) NOT NULL,
  `emp_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_number`, `email`, `emp_salary`, `emp_role`) VALUES
(1, 'marumitha', '9897121210', 'marumitha67@gmail.com', '38000', 'Manager'),
(2, 'prabhakaran', '6383786437', 'viperprabhakaran@gmail.com', '20000', 'supplier'),
(3, 'mani', '7898951210', 'mani@gmail.com', '18000', 'supplier'),
(4, 'dewin', '9097651210', 'dewin@gmail.com', '14000', 'assistant supplier'),
(5, 'siva', '9801012130', 'siva@gmail.com', '18000', 'assistant supplier'),
(6, 'priya', '9897121298', 'priya@gmail.com', '18000', 'assistant supplier'),
(7, 'dharshini', '6383781098', 'dharshini@gmail.com', '20000', 'supplier'),
(8, 'janani', '7865121210', 'jananij2020@gmail.com', '20000', 'supplier');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `train` varchar(1000) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `mobile`, `email`, `status`, `train`, `price`) VALUES
(143, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 1, 'vaigai express', 550),
(144, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 1, 'vaigai express', 100),
(145, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 1, 'vaigai express', 300),
(146, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 1, 'vaigai express', 80),
(147, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 1, 'vaigai express', 312),
(148, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 1, 'vaigai express', 300),
(149, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 1, 'vaigai express', 100),
(150, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 1, 'vaigai express', 300),
(151, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 1, 'vaigai express', 350),
(152, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 0, 'vaigai express', 350),
(153, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 0, 'vaigai express', 300),
(154, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 0, 'vaigai express', 220),
(155, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 0, 'vaigai express', 300),
(156, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 0, 'vaigai express', 350),
(157, 'prabha pk', '11,sedan kinatru street thiruthangal\r\n', '6383786437', 'viperprabhakaran@gmail.com', 0, 'vaigai express', 200);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, 1, 3, 1),
(2, 1, 5, 1),
(3, 1, 3, 1),
(4, 1, 6, 3),
(5, 2, 1, 2),
(6, 3, 6, 2),
(7, 3, 7, 1),
(8, 4, 1, 1),
(9, 4, 4, 1),
(10, 5, 6, 2),
(11, 5, 1, 2),
(12, 6, 1, 10),
(13, 7, 6, 4),
(14, 8, 3, 1),
(15, 9, 4, 3),
(16, 10, 3, 1),
(17, 11, 1, 1),
(18, 12, 4, 6),
(19, 13, 5, 1),
(20, 14, 1, 1),
(21, 25, 3, 3),
(22, 27, 5, 1),
(23, 28, 3, 6),
(24, 29, 3, 4),
(25, 29, 1, 1),
(26, 30, 1, 1),
(27, 35, 3, 1),
(28, 37, 6, 1),
(29, 38, 5, 6),
(30, 38, 11, 3),
(31, 39, 16, 1),
(32, 40, 14, 2),
(33, 41, 13, 1),
(34, 42, 10, 3),
(35, 45, 19, 2),
(36, 65, 12, 1),
(37, 66, 14, 3),
(38, 67, 17, 1),
(39, 68, 16, 1),
(40, 69, 9, 3),
(41, 70, 4, 1),
(42, 71, 19, 1),
(43, 72, 13, 1),
(44, 74, 9, 1),
(45, 74, 9, 1),
(46, 75, 3, 1),
(47, 76, 20, 1),
(48, 79, 16, 11),
(49, 79, 20, 1),
(50, 80, 17, 1),
(51, 80, 15, 1),
(52, 86, 1, 1),
(53, 87, 20, 1),
(54, 88, 14, 1),
(55, 90, 20, 1),
(56, 110, 12, 1),
(57, 111, 19, 9),
(58, 112, 15, 4),
(59, 112, 15, 11),
(60, 113, 18, 10),
(61, 114, 8, 1),
(62, 115, 14, 1),
(63, 116, 13, 0),
(64, 116, 3, 0),
(65, 116, 16, 0),
(66, 116, 18, 1),
(67, 117, 19, 1),
(68, 118, 11, 1),
(69, 119, 3, 3),
(70, 120, 10, 1),
(71, 120, 20, 1),
(72, 121, 20, 1),
(73, 124, 19, 1),
(74, 126, 14, 4),
(75, 127, 16, 1),
(76, 128, 12, 1),
(77, 129, 3, 1),
(78, 130, 17, 1),
(79, 132, 13, 1),
(80, 133, 15, 1),
(81, 134, 11, 1),
(82, 135, 10, 1),
(83, 136, 9, 1),
(84, 138, 16, 1),
(85, 140, 16, 1),
(86, 141, 9, 1),
(87, 142, 14, 3),
(88, 142, 4, 1),
(89, 142, 19, 1),
(90, 143, 11, 1),
(91, 143, 8, 1),
(92, 144, 16, 1),
(93, 145, 15, 1),
(94, 145, 16, 1),
(95, 146, 13, 1),
(96, 147, 17, 1),
(97, 147, 3, 1),
(98, 148, 9, 1),
(99, 149, 10, 1),
(100, 150, 8, 1),
(101, 150, 16, 1),
(102, 151, 11, 1),
(103, 152, 11, 1),
(104, 153, 17, 1),
(105, 154, 16, 1),
(106, 154, 20, 3),
(107, 155, 17, 1),
(108, 156, 11, 1),
(109, 157, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= unavailable, 2 Available',
  `quantity` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `name`, `description`, `price`, `img_path`, `status`, `quantity`) VALUES
(1, 10, 'coca cola', 'In Can', 10, '1600652160_diet_coke.jpg', 0, '11'),
(3, 10, 'Lemon Iced Tea', 'Sample', 12, '1600652520_lemon iced tea.jpg', 0, '11'),
(4, 4, 'Chicken', 'Sample only', 150, '1600652880_chicken.jpg', 1, '20'),
(8, 10, 'Fry Chicken', 'chicken', 200, '1708580220_chilly chicken.jpg', 0, '11'),
(9, 10, 'Prawn Chilly Fry', 'FRy', 300, '1708580220_prawn chilli fry.jpg', 0, '12'),
(10, 10, 'Rasagulla', 'sweet', 100, '1708580280_rasakulla.jpg', 0, '11'),
(11, 10, 'Parota with Mutton Curry', 'parota', 350, '1708580280_parota with mutton curry.jpg', 0, '6'),
(12, 10, 'Mini Idly With Sambar', 'super', 50, '1708580340_mini idly .jpg', 0, '6'),
(13, 10, 'Dosa', 'special dosa', 80, '1708580400_dosa.jpg', 0, '6'),
(14, 10, 'Bread', 'bread', 120, '1708580700_bread.jpg', 0, '7'),
(15, 10, 'Burger', 'burger', 200, '1708580700_burger.jpg', 0, '11'),
(16, 10, ' Ghee Roast Dosa ', ' Ghee Roast Dosa ·', 100, '1708580760_Ghee Roast Dosa ·.jpg', 0, '21'),
(17, 10, 'Chicken Leg Pieces', 'chicken', 300, '1708580760_leg.jpg', 0, '8'),
(18, 7, 'Potato', 'potato', 200, '1708580820_potato.jpg', 0, '20'),
(19, 10, 'pani puri', 'pani puri', 20, '1708580880_puri.jpg', 0, '11'),
(20, 10, 'vadai', 'vadai', 40, '1708580880_vadai.jpg', 0, '12');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Railway Food Ordering  system', 'marumitha67@gmail.com', '+639079373999', '1600654680_photo-1504674900247-0877df9cc836.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;NICE!&lt;/b&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;/p&gt;&lt;h2 style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `train_id` int(11) NOT NULL,
  `train_name` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date DEFAULT NULL,
  `train_number` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_id`, `train_name`, `source`, `destination`, `time`, `date`, `train_number`) VALUES
(1, 'Pothigai Express', 'sivakasi', 'chennai', '05:55:00', '2024-04-23', '12661'),
(2, 'nellai express', 'chennai', 'nellai', '21:55:00', '2024-03-29', '12632'),
(3, 'pearl express', 'Chennai', 'Tuticorin', '23:56:00', '2024-03-30', '12693'),
(4, 'Pandiyan Express', 'Chennai', 'madurai', '23:10:00', '2024-05-24', '12637'),
(5, 'Anantapuri Express', 'Chennai', 'Trivandrum', '13:38:35', '2024-03-27', '16723'),
(6, 'Vaigai express', 'Chennai', 'Madurai', '14:41:01', '2024-03-28', '12635'),
(7, 'NagarKovil Express', 'Chennai', 'Nagarkovil', '16:57:00', '2023-03-28', '12631');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', 'admin123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `train` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`, `train`) VALUES
(8, 'prabha', 'pk', 'viperprabhakaran@gmail.com', 'b459c409a6cf920ef633f3fadbc21329', '6383786437', '11,sedan kinatru street thiruthangal\r\n', 'vaigai express'),
(9, 'priya', 's', 'priya@gmail.com', '48467d2cc726e8847fbc51f5b0bdc1d1', '9894193212', 'north street', ''),
(10, 'prabha', 's', 'karanprabha22668@gmail.com', 'b459c409a6cf920ef633f3fadbc21329', '6383786437', '11,sedan kinatru street thiruthangal', 'madurai express');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`train_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `train_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
