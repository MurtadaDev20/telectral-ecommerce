-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 01:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telectral`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'Telectral3', 'telectral@gmail.com', '$2y$10$iznU95eCbMgoGeDitIOLNOlirUcGsf0Ps7z2OQLfzBdrfRVJKpWoe');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cart_name` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  `cart_qty` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `sum_price` varchar(250) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `status`) VALUES
(15, 'طابعات ورقية', 1),
(19, 'طابعات حبر', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `first_name`, `last_name`, `email`, `text`) VALUES
(1, 'murtada', 'Luqman', 'Murtadait@gmail.com', 'welcom my php');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `full_name`, `email`, `password`, `address`, `phone_number`) VALUES
(6, 'محمد حسين', '1212141477mnmn@gmail.com', '1212', 'بابل', '07725933735'),
(7, 'مرتضى لقمان عبد', 'murtada@gmail.com', '1212', 'basra', '07725933735'),
(8, 'علي ياسين', 'Ali@gmail.com', '1212', 'الناصرية ', '0772594047455'),
(9, 'murtada', 'murtadait20@gmail.com', '1212', 'baghadad', '9878976');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `categories_name` varchar(100) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `price` varchar(250) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `postDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `product_name`, `categories_name`, `qty`, `price`, `img`, `description`, `status`, `type`, `postDate`) VALUES
(8, 'طابعة ميكانيكة', '15', '5', '300000 ', 'pro3.png', 'طابعةطابعة\r\n\r\nطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\n\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطاب', 1, 1, '2022-09-13 21:50:08'),
(13, 'printer', '15', '6', '300000 ', 'pro2.png', 'طابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة', 1, 1, '2022-09-15 15:18:46'),
(15, 'printer', '15', '6', '300000 ', 'pro3.png', '<p><b>طابعة</b></p><p><br></p>', 1, 1, '2022-09-15 15:18:46'),
(16, 'printer', '15', '6', '300000 ', 'pro3.png', '<p><b>طابعة</b></p><p><br></p>', 1, 0, '2022-09-15 15:18:46'),
(17, 'printer', '15', '6', '300000 ', 'pro3.png', '<p><b>طابعة</b></p><p><br></p>', 1, 0, '2022-09-15 15:18:46'),
(18, 'طابعة ميكانيكة', '15', '5', '300000 ', 'pro3.png', 'طابعةطابعة\r\n\r\nطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\n\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطاب', 1, 0, '2022-09-13 21:50:08'),
(19, 'printer', '15', '6', '300000 ', 'pro2.png', 'طابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة', 1, 0, '2022-09-15 15:18:46'),
(20, 'printer', '15', '6', '300000 ', 'pro3.png', '<p><b>طابعة</b></p><p><br></p>', 1, 0, '2022-09-15 15:18:46'),
(21, 'printer', '15', '6', '300000 ', 'pro3.png', '<p><b>طابعة</b></p><p><br></p>', 1, 1, '2022-09-15 15:18:46'),
(22, 'printer', '15', '6', '300000 ', 'pro3.png', '<p><b>طابعة</b></p><p><br></p>', 1, 1, '2022-09-15 15:18:46'),
(23, 'طابعة ميكانيكة', '15', '5', '300000 ', 'pro3.png', 'طابعةطابعة\r\n\r\nطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\n\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطاب', 1, 1, '2022-09-13 21:50:08'),
(24, 'printer', '15', '6', '300000 ', 'pro2.png', 'طابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة\r\nطابعةطابعةطابعةطابعةطابعةطابعةطابعةطابعة', 1, 1, '2022-09-15 15:18:46'),
(25, 'printer', '15', '6', '300000 ', 'pro3.png', '<p><b>طابعة</b></p><p><br></p>', 1, 0, '2022-09-15 15:18:46'),
(26, 'printer', '15', '6', '300000 ', 'pro3.png', '<p><b>طابعة</b></p><p><br></p>', 1, 0, '2022-09-15 15:18:46'),
(27, 'printer', '15', '6', '300000 ', 'pro3.png', '<p><b>طابعة</b></p><p><br></p>', 1, 1, '2022-09-15 15:18:46'),
(28, 'hp', '15', '1', '100', 'cmd.JPG', 'cghg', 1, 0, '2022-10-30 23:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `products_discount`
--

CREATE TABLE `products_discount` (
  `p_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `categories_name` varchar(100) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `price` varchar(250) NOT NULL,
  `price_d` varchar(250) NOT NULL,
  `descount` varchar(200) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `postDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_discount`
--

INSERT INTO `products_discount` (`p_id`, `product_name`, `categories_name`, `qty`, `price`, `price_d`, `descount`, `img`, `description`, `status`, `postDate`) VALUES
(2, 'printer', '19', '6', '40000', '20000', '50%', 'pro1.png', '<p>printer</p>', 1, '2022-09-15 16:05:08'),
(3, 'طابعة ليزرية', '15', '12', '30000', '20000', '40%', 'pro1.png', '<h1><b>طابعة ليزرية&nbsp;طابعة ليزرية</b></h1><p>طابعة ليزريةطابعة ليزريةطابعة ليزريةطابعة ليزريةطابعة ليزريةطابعة ليزريةطابعة ليزرية</p><p>طابعة ليزريةطابعة ليزريةطابعة ليزريةطابعة لي<span style=\"background-color: rgb(255, 255, 0);\">زريةطابع</span>ة ليزر', 1, '2022-09-15 16:32:28'),
(4, 'طابعة طابوقية', '15', '6', '900000', '450000', '50%', 'pro2.png', '<p><b>طابعة طابوقية</b></p><p>طابعة طابوقية<br>طابعة طابوقيةطابعة طابوقيةطابعة طابوقيةطابعة طابوقيةطابعة طابوقيةطابعة طابوقيةطابعة طابوقيةطابعة طابوقيةطابعة طابوقية</p><p>طابعة طابوقيةطابعة طابوقيةطابعة طابوقيةطابعة طابوقيةطابعة طابوقيةطابعة طابوقيةطابعة ', 1, '2022-09-15 16:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `sales_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `products_name` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`sales_id`, `full_name`, `email`, `address`, `phone_number`, `products_name`, `qty`, `price`, `date`) VALUES
(111, '7', 'murtada@gmail.com', 'basra', '07725933735', '', 0, 0, '2023-02-11 18:23:35'),
(112, '6', '1212141477mnmn@gmail.com', 'بابل', '07725933735', '', 0, 0, '2023-02-11 18:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoice`
--

CREATE TABLE `sales_invoice` (
  `sales_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `products_name` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_invoice`
--

INSERT INTO `sales_invoice` (`sales_id`, `full_name`, `email`, `address`, `phone_number`, `products_name`, `qty`, `price`, `date`) VALUES
(126, '7', 'murtada@gmail.com', 'basra', '07725933735', 'طابعة ميكانيكة', 1, 300000, '2023-02-11 18:23:35'),
(127, '7', 'murtada@gmail.com', 'basra', '07725933735', 'طابعة ليزرية', 1, 20000, '2023-02-11 18:23:35'),
(128, '7', 'murtada@gmail.com', 'basra', '07725933735', 'printer', 3, 60000, '2023-02-11 18:23:35'),
(129, '6', '1212141477mnmn@gmail.com', 'بابل', '07725933735', 'طابعة ميكانيكة', 1, 300000, '2023-02-11 18:31:03'),
(130, '6', '1212141477mnmn@gmail.com', 'بابل', '07725933735', 'printer', 1, 300000, '2023-02-11 18:31:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `products_discount`
--
ALTER TABLE `products_discount`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_invoice`
--
ALTER TABLE `sales_invoice`
  ADD PRIMARY KEY (`sales_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products_discount`
--
ALTER TABLE `products_discount`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `sales_invoice`
--
ALTER TABLE `sales_invoice`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
