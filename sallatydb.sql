-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 01:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sallatydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Name`, `Email`, `Password`) VALUES
(1, '123', '123', '123'),
(2, 'David Williams', 'david@example.com', 'password'),
(3, 'Emily Brown', 'emily@example.com', 'password'),
(4, 'James Smith', 'james@example.com', 'password'),
(5, 'Sophia Johnson', 'sophia@example.com', 'password'),
(6, 'Olivia Williams', 'olivia@example.com', 'password'),
(7, 'Ava Brown', 'ava@example.com', 'password'),
(8, 'Isabella Smith', 'isabella@example.com', 'password'),
(9, 'Mia Johnson', 'mia@example.com', 'password'),
(10, 'Abigail Williams', 'abigail@example.com', 'password'),
(11, 'Emily Brown', 'emily@example.com', 'password'),
(12, 'Charlotte Smith', 'charlotte@example.com', 'password'),
(13, 'Harper Johnson', 'harper@example.com', 'password'),
(14, 'Amelia Williams', 'amelia@example.com', 'password'),
(15, 'Evelyn Brown', 'evelyn@example.com', 'password'),
(16, 'Elizabeth Smith', 'elizabeth@example.com', 'password'),
(17, 'Sofia Johnson', 'sofia@example.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `Name`) VALUES
(1, 'BISCUITS, CRACKERS & CAKES'),
(2, 'ELECTRONICS & APPLIANCES'),
(3, 'MEAT & POULTRY'),
(4, 'MILK & LABAN'),
(5, 'RICE, PASTA & PULSES'),
(6, 'WATER');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `age`, `email`, `phone`, `address`, `created_at`) VALUES
(1, 'Ally', 20, 'ally@gmail.com', '+96654754512', 'Dammam 2A Street', '2023-01-29 13:29:48'),
(2, 'Alex', 35, 'alex@gmail.com', '+96654154511', 'Dammam 2b street', '2023-01-29 13:31:16'),
(3, 'Mshari', 22, 'mshari@gmail.com', '+96654754577', 'Dammam 2A Street', '2023-01-29 13:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `Total_Price` double NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `order_date`, `Total_Price`, `customer_id`) VALUES
(1, '2023-01-29', 132.25, 3),
(2, '2023-01-29', 915.4, 3),
(3, '2023-01-29', 74.75, 2),
(4, '2023-02-08', 396.75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Quantity` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `Order_id`, `Product_id`, `Quantity`) VALUES
(1, 1, 1, 3),
(2, 1, 6, 2),
(3, 1, 4, 1),
(4, 2, 3, 1),
(5, 2, 2, 1),
(6, 2, 7, 2),
(7, 3, 4, 1),
(8, 3, 2, 1),
(9, 4, 4, 1),
(10, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` double NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Category_name` varchar(255) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Name`, `Price`, `Description`, `Image`, `Category_name`, `Quantity`) VALUES
(1, 'Tanmiah Fresh Chicken Thighs 450g', 10, 'Fresh Chicken Thighs are one of the juiciest parts of our corn-fed birds, consisting of darker meat for a more mouth-watering taste. Available in 450g', 'images/meat.png', 'MEAT & POULTRY', 4),
(2, 'Oreo Classic 38g× 16', 20, 'The delectable taste of Oreo Cookies is sure to entice your taste buds in its magic spell. These cookies are made from high-quality materials to deliver a top-grade product. The well-balanced taste of these Oreo original cookies makes people with all kind', 'images/Oreo.jpg', 'BISCUITS, CRACKERS & CAKES', 5),
(3, 'Philips coffee maker, HD7432/2', 300, 'Enjoy the taste and aroma of freshly brewed coffee with this Philips coffee maker. Its compact design is perfect for brewing 2 up to 7 cups. Thanks to the aroma twister, enjoy an optimal taste in each cup of coffee.', 'images/PHILIPS COFFEE.jpg', 'ELECTRONICS & APPLIANCES', 6),
(4, 'Al Walimah Style Indian Basmati Rice Longgrain 5kg', 45, 'Buy Al walimah style Indian sella basmati rice long grain 5 Kg online now on Carrefour Saudi Arabia. Shop from a large selection of Food Cupboard in Riyadh, Jeddah, KSA and enjoy Carrefours great prices, guaranteed quality, secure payment, fast delivery a', 'images/Rice.png', 'RICE, PASTA & PULSES', 2),
(5, 'Saudia Long Life Full Fat Milk 1L × 12 Pieces', 61, 'Product Form: Liquid, Type: Milk, Calcium: Yes, Fat: Full Fat\r\nExpirable: Yes, Long Life Dairy, shelf validity 6 months.\r\nThis dairy product is rich with calcium.\r\nCalcium is needed for your kinds and their healthy growth.\r\nIt comes in di', 'images/Saudi Milk.jpg', 'MILK & LABAN', 3),
(6, 'Nova Water 550ml ×24', 20, 'Nova Mineral Water and healthy water is mobilized from natural groundwater wells\r\nIt is purified at several stages of the filtration process and characterized by its natural stability\r\nThis unique flask is simply more water-packed\r\nHigh quality refreshing', 'images/Nova.jpg', 'WATER', 9),
(7, 'Nikai NAF788A Air Fryer 3L', 238, 'Air Fryer from Nikai makes cooking a delight. It provides a healthy twist on preparing fried food that is as good to your taste buds as it is to your body.', 'images/Fryer.jpg', 'ELECTRONICS & APPLIANCES', 12),
(8, 'Alyoum Premium Fresh Chicken Chilled 1kg', 19, 'Healthier without any fatty skin, Alyoum Chilled Chicken is your ideal pick to rule the party scene! Make an exotic, delectable dish with a curry or grill it for family meals and enjoy. Effortless to cook, this is sure to impress your guests too!', 'images/Chicken.jpg', 'MEAT & POULTRY', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Order_id` (`Order_id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `Category_name` (`Category_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`Order_id`) REFERENCES `orders` (`Order_id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_name`) REFERENCES `category` (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

