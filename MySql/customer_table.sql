-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 07:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `prd_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`prd_id`, `user_id`) VALUES
(2, 21),
(3, 21);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `ph_num` varchar(10) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `first_name`, `last_name`, `ph_num`, `pass`, `email`, `address`) VALUES
(1, 'temp', '1', '9373183839', '1234', 'temp1@gmail.com', 'Of course its temporary :D\r\n'),
(19, 'Nithin', 'V', '9482916983', 'nithin', 'nithin.v053@gmail.com', 'Lord of darkness :D'),
(20, 'Rakshath', 'J', '9632024472', 'rakshath', 'rakshath@gmail.com', 'Lives somewhere on the brim i dont know where '),
(21, 'Rahid', 'Khan', '9632024472', 'rahid', 'rahidkhan@gmail.com', 'I hope he is not lost somewhere :)\r\n'),
(22, 'Some', 'One', '9999129821', 'someone', 'someone@gmail.com', 'Lives somewhere in the world');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `prd_id` int(20) NOT NULL,
  `prd_name` varchar(30) NOT NULL,
  `prd_desc` varchar(500) NOT NULL,
  `prd_price` float NOT NULL,
  `prd_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`prd_id`, `prd_name`, `prd_desc`, `prd_price`, `prd_photo`) VALUES
(1, 'Mouse', 'Just a mouse', 80, 'Assets\\db_images\\g203-hero.jfif'),
(2, 'Keyboard', 'Just a keyboard', 70, 'Assets\\db_images\\keyboard.jpg'),
(3, 'Motherboard', 'Its just a motherboard', 20, 'Assets\\db_images\\asus-rog-strix-x570-e-gaming-wifi-ii-cropped.jpg'),
(4, 'RTX 3060ti', 'GIGABYTE Nvidia GeForce RTX™ 3060 Gaming OC 12GB GDDR6 Graphics Card', 700, 'Assets\\db_images\\3060ti.jpg'),
(5, 'RX 6700 XT', '192-bit 12GB GDDR6 DP/HDMI Dual Torx 4.0 Fans FreeSync DirectX 12 VR Ready RGB Graphics Card', 600, 'Assets\\db_images\\rx6700.jpg'),
(6, 'Ryzen 5 3600 ', 'Desktop Processor 6 Cores up to 4.2 GHz 35MB Cache AM4 Socket (100-000000031)', 200, 'Assets/db_images/Ryzen53600.jpg\r\n'),
(7, 'Ryzen 9 3900XT', 'Desktop Processor 12 cores 24 Threads 70MB Cache 3.8GHz Upto 4.7GHz AM4 Socket 400 & 500 Series Chipset (100-100000277WOF)', 850, 'Assets/db_images/Ryzen93900.jpg'),
(8, ' Corsair CV550', ' CV Series, 80 Plus Bronze Certified, 550 Watt Non-Modular Power Supply - Black', 100, 'Assets/db_images/cv550_.jpg'),
(9, 'Cooler Master MWE 450', 'MWE 450 Bronze V2 230v, 80 Plus Bronze Certified, Non-Modular Power Supply (Black)', 150, 'Assets/db_images/MWE450.jpg'),
(10, 'Corsair BX500 SSD', '240GB 3D NAND SATA 6.35 cm (2.5-inch) SSD (CT240BX500SSD1)', 40, 'Assets/db_images/BX500.jpg'),
(11, 'WD SN570 NVMe SSD', 'SN570 NVMe 500GB SSD, Upto 3,500 MB/s Read, with Free 1 Month Adobe Creative Cloud Subscription (WDS500G3B0C)', 80, 'Assets/db_images/SN570.jpg'),
(12, 'Corsair LPX 8GB RAM', '(1x8GB) DDR4 3200MHZ C16 Desktop RAM (Black)', 40, 'Assets/db_images/LPX8GB.jpg'),
(13, 'Crucial Ballistix 8GB RAM', 'Crucial Ballistix 3200 MHz DDR4 DRAM Desktop Gaming Memory 8GB CL16 BL8G32C16U4B (Black)\r\n', 30, 'Assets/db_images/CL16.jpg'),
(14, 'Storite 5-Pack SATA', 'Storite 5-Pack SATA 3 6.0 Gbps Data Cable with Locking Latch for HDD & SSD - (Black, 45 cm)', 10, 'Assets/db_images/storitesata.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`prd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `prd_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
