-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 05:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raff`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `img`) VALUES
(5, '1.jpg'),
(6, 'dfd1.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `price` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `img`) VALUES
(1, 'فساتين تعديل', 'اجدد الفساتين', 'dres2.jpg'),
(2, 'ااااااا', 'aaa', '43s8snPT_400x400.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `collaborate_message`
--

CREATE TABLE `collaborate_message` (
  `id` int(11) NOT NULL,
  `small_business1_id` int(11) NOT NULL,
  `small_business2_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collaborate_message`
--

INSERT INTO `collaborate_message` (`id`, `small_business1_id`, `small_business2_id`, `content`, `date`) VALUES
(1, 1, 4, 'test message', '2022-05-18 14:08:27'),
(2, 4, 1, 'welcome', '2022-05-18 14:58:25'),
(3, 1, 4, 'السلام عليكم', '2022-05-18 14:58:28'),
(4, 1, 4, 'اختبار التعاون من 1 الى 4', '2022-05-25 02:35:14'),
(5, 1, 5, 'من 1 الى 5', '2022-05-25 02:35:39'),
(6, 1, 4, 'رد من 1 الى 4', '2022-05-25 02:35:52'),
(7, 1, 4, 'رد للاشعار', '2022-05-25 02:38:52'),
(8, 1, 4, 'اشعار 2', '2022-05-25 02:41:19'),
(9, 1, 4, 'اشعار اخير', '2022-05-25 02:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `created`, `customer_id`, `product_id`) VALUES
(2, 'test comment', '2022-04-08 22:00:00', 10, 1),
(3, 'test comment 2', '2022-04-08 22:00:00', 10, 1),
(4, 'test comment 3', '2022-04-08 22:00:00', 10, 1),
(5, 'تعليق جديد للتجربة', '2022-05-12 04:36:04', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `compliant`
--

CREATE TABLE `compliant` (
  `id` int(11) NOT NULL,
  `content` varchar(50) NOT NULL,
  `reply` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compliant`
--

INSERT INTO `compliant` (`id`, `content`, `reply`, `user_id`, `user_type`, `date`) VALUES
(1, 'test complaint', '', 10, 'customer', '2022-04-11 22:00:00'),
(2, 'new compliant', '', 1, 'small_business', '2022-04-12 22:00:00'),
(3, 'new compliant2', '', 3, 'small_business', '2022-04-12 22:00:00'),
(4, 'شكوى جديدة تجربة', NULL, 1, 'small_business', '2022-04-22 14:17:15'),
(5, 'شكوى من عميل', 'رد جديد', 16, 'customer', '2022-04-22 15:06:37'),
(6, 'شكوى شكوى', 'تيست', 10, 'customer', '2022-05-23 11:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `dob`, `address`, `city`) VALUES
(10, 'aaa', 'aaa', 'aaa@aaa.com', 'aaa', '0551098993', '2000-02-02', 'aaa', 'Medina');

-- --------------------------------------------------------

--
-- Table structure for table `custom_order`
--

CREATE TABLE `custom_order` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_order`
--

INSERT INTO `custom_order` (`id`, `description`, `date`, `price`, `category_id`, `img`, `customer_id`) VALUES
(1, 'aaa', '2022-05-07', 200, 1, '44.png', 16),
(2, 'طلب جديد', '2022-05-20', 5, 1, 'cupcake.jpg', 10),
(3, 'tttttttttt', '2022-05-27', 200, 1, '1.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `small_business_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_owner_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `customer_id`, `small_business_id`, `content`, `date`, `message_owner_id`) VALUES
(1, 10, 1, 'test message', '2022-05-12 07:46:33', 10),
(10, 10, 1, 'how are you', '2022-05-23 16:14:48', 10),
(4, 10, 1, 'وعليكم السلام', '2022-05-12 07:47:37', 10),
(9, 10, 1, 'مرحبا', '2022-05-23 16:14:22', 10),
(6, 10, 1, 'مرحباً بك', '2022-05-12 08:03:31', 1),
(8, 10, 1, 'welcome', '2022-05-12 11:12:24', 10),
(11, 10, 1, 'سشيشسي', '2022-05-23 16:14:58', 10),
(12, 10, 1, 'اهلا وسهلا', '2022-05-23 16:15:14', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `content` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `content`, `user_id`, `user_type`, `created`) VALUES
(1, 'اختبار الاشعارات', 10, 'customer', '2022-05-12 07:58:17'),
(2, 'لقد تم طلب احد المنتجات الخاصة بك', 1, 'small_business', '2022-05-18 14:00:44'),
(3, 'لقد جاءك تعاون من قبل اسرة ', 4, 'small_business', '2022-05-18 14:02:09'),
(4, 'لقد جاءك تعاون من قبل اسرة ', 4, 'small_business', '2022-05-18 14:04:03'),
(5, 'لقد جاءك تعاون من قبل اسرة ', 4, 'small_business', '2022-05-18 14:04:30'),
(6, 'لقد جاءك تعاون من قبل اسرة ', 4, 'small_business', '2022-05-18 14:05:18'),
(7, 'لقد جاءك تعاون من قبل اسرة ', 4, 'small_business', '2022-05-18 14:07:55'),
(8, 'لقد جاءك تعاون من قبل اسرة ', 4, 'small_business', '2022-05-18 14:08:21'),
(9, 'لقد جاءك تعاون من قبل اسرة ', 4, 'small_business', '2022-05-18 14:08:37'),
(10, 'لقد تم ارسال عرض على طلبك الخاص من قبل اسرة : ', 10, 'customer', '2022-05-18 14:12:04'),
(11, 'لقد تم تسجيل أسرة جديدة', 1, 'admin', '2022-05-18 14:15:36'),
(12, 'لقد جاءك تعاون من قبل اسرة ', 4, 'small_business', '2022-05-18 14:58:19'),
(13, 'لقد تم طلب احد المنتجات الخاصة بك', 1, 'small_business', '2022-05-23 14:45:26'),
(14, 'لقد جاءك تعاون من قبل اسرة ', 4, 'small_business', '2022-05-25 01:56:55'),
(15, 'لقد تم ارسال تعاون من قبل اسرة : ', 4, 'small_business', '2022-05-25 02:38:52'),
(16, 'لقد جاءك تعاون من قبل اسرة : ', 4, 'small_business', '2022-05-25 02:41:19'),
(17, 'لقد جاءك تعاون من قبل اسرة : fffa', 4, 'small_business', '2022-05-25 02:41:53'),
(18, 'لقد تم طلب احد المنتجات الخاصة بك', 1, 'small_business', '2022-05-25 02:57:00'),
(19, 'لقد تم طلب احد المنتجات الخاصة بك', 1, 'small_business', '2022-05-25 02:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `custom_order_id` int(11) NOT NULL,
  `small_business_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'قيد التنفيذ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `details`, `custom_order_id`, `small_business_id`, `status`) VALUES
(4, 'اختبار اشعار عرض الطلب الخاص', 2, 1, 'قيد التنفيذ'),
(3, 'عرض عرض', 2, 1, 'تم القبول');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `address` varchar(50) NOT NULL,
  `total_price` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `address`, `total_price`, `customer_id`) VALUES
(1, '2022-05-12 04:47:23', 'aaaa', 6, 10),
(2, '2022-05-18 14:00:44', 'hhhh', 36, 10),
(3, '2022-05-23 14:45:26', 'اختبار العنوان', 6, 10),
(4, '2022-05-25 02:57:00', 'اختبار العنوان', 2085, 10);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'قيد التنفيذ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `status`) VALUES
(3, 2, 3, 6, 6, 'قيد التنفيذ'),
(2, 1, 3, 1, 6, 'تم التوصيل'),
(4, 3, 3, 1, 6, 'قيد التنفيذ'),
(5, 4, 3, 10, 6, 'قيد التنفيذ'),
(6, 4, 4, 10, 200, 'قيد التنفيذ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `small_business_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `img`, `category_id`, `small_business_id`) VALUES
(4, 'qqq', 'qqq', 200, 'background.png', 1, 1),
(3, 'جديد', ' ووووووووووو', 6, 'the-soap.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `result`, `user_id`, `user_type`) VALUES
(6, 3, 10, 'customer'),
(7, 2, 1, 'small_business'),
(8, 5, 1, 'small_business'),
(9, 3, 1, 'small_business'),
(10, 5, 1, 'small_business');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `content`, `created`, `comment_id`) VALUES
(1, 'هذا رد على التعليق', '2022-04-22 15:08:15', 2),
(2, 'رد جديد', '2022-05-18 11:51:35', 5);

-- --------------------------------------------------------

--
-- Table structure for table `small_business`
--

CREATE TABLE `small_business` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `policy` varchar(255) DEFAULT NULL,
  `maroof` int(11) NOT NULL,
  `shipment` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `iban` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'غير مؤكد'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `small_business`
--

INSERT INTO `small_business` (`id`, `name`, `email`, `password`, `mobile`, `city`, `policy`, `maroof`, `shipment`, `category_id`, `iban`, `status`) VALUES
(1, 'fffa', 'fff@fff.com', 'fff', '0551234234', 'Medina', 'fff', 1234, 'fff', 1, 'SA1234567890', 'تم التأكيد'),
(4, 'qqq', 'qqq@qqq.com', 'qqq', '0559632311', 'Makkah', 'qqq', 5, 'qqq', 1, 'qqq', 'تم التأكيد'),
(5, 'saduksa', 'sss@sss.com', 'Aaqwer1234', '0551098993', 'Taif', 'saduksa', 10, 'saduksa', 1, 'SA12345675654512344543', 'تم التأكيد'),
(6, 'saduksa', 'sss@sss.com', 'Aaqwer1234', '0551098993', 'Taif', 'saduksa', 10, 'saduksa', 1, 'SA12345675654512344543', 'تم التأكيد');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collaborate_message`
--
ALTER TABLE `collaborate_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compliant`
--
ALTER TABLE `compliant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_order`
--
ALTER TABLE `custom_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `small_business`
--
ALTER TABLE `small_business`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collaborate_message`
--
ALTER TABLE `collaborate_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `compliant`
--
ALTER TABLE `compliant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `custom_order`
--
ALTER TABLE `custom_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `small_business`
--
ALTER TABLE `small_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
