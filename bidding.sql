-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 10:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'umer', 'ef0bb4a511fac60c2924940f03ddf9ad');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bid_amount` decimal(10,2) DEFAULT NULL,
  `bid_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `car_id`, `user_id`, `bid_amount`, `bid_datetime`) VALUES
(1, 1, 1, 15000.00, '2024-06-10 08:30:00'),
(2, 1, 2, 16000.00, '2024-06-10 08:35:00'),
(3, 2, 3, 18000.00, '2024-06-10 09:00:00'),
(4, 2, 4, 19000.00, '2024-06-10 09:05:00'),
(5, 3, 5, 22000.00, '2024-06-10 09:30:00'),
(6, 3, 6, 24000.00, '2024-06-10 09:35:00'),
(7, 4, 7, 27000.00, '2024-06-10 10:00:00'),
(8, 4, 8, 28000.00, '2024-06-10 10:05:00'),
(9, 5, 9, 31000.00, '2024-06-10 10:30:00'),
(10, 5, 10, 32000.00, '2024-06-10 10:35:00'),
(11, 6, 1, 34000.00, '2024-06-10 11:00:00'),
(12, 6, 2, 35000.00, '2024-06-10 11:05:00'),
(13, 7, 3, 37000.00, '2024-06-10 11:30:00'),
(14, 7, 4, 38000.00, '2024-06-10 11:35:00'),
(15, 8, 5, 40000.00, '2024-06-10 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cardetails`
--

CREATE TABLE `cardetails` (
  `id` int(11) NOT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `caryear` varchar(10) DEFAULT NULL,
  `doors` int(11) DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `mileage` varchar(50) DEFAULT NULL,
  `engine_cc` int(11) DEFAULT NULL,
  `fuel_type` varchar(50) DEFAULT NULL,
  `carcondition` varchar(50) DEFAULT NULL,
  `key_features` text DEFAULT NULL,
  `repair_status` varchar(10) DEFAULT NULL,
  `steering` varchar(10) DEFAULT NULL,
  `seating_capacity` int(11) DEFAULT NULL,
  `fuel_type_secondary` varchar(50) DEFAULT NULL,
  `num_of_cylinders` int(11) DEFAULT NULL,
  `transmission` varchar(50) DEFAULT NULL,
  `wheels` int(11) DEFAULT NULL,
  `exterior_images` text DEFAULT NULL,
  `interior_images` text DEFAULT NULL,
  `video_clip` text DEFAULT NULL,
  `colors_images` text DEFAULT NULL,
  `starting_bid` decimal(10,3) DEFAULT NULL,
  `auction_end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cardetails`
--

INSERT INTO `cardetails` (`id`, `owner`, `make`, `model`, `caryear`, `doors`, `colors`, `mileage`, `engine_cc`, `fuel_type`, `carcondition`, `key_features`, `repair_status`, `steering`, `seating_capacity`, `fuel_type_secondary`, `num_of_cylinders`, `transmission`, `wheels`, `exterior_images`, `interior_images`, `video_clip`, `colors_images`, `starting_bid`, `auction_end_datetime`) VALUES
(1, 'John Doe', 'Lamborghini', 'Aventador', NULL, 4, 'Sky Blue', '25100', 0, 'Petrol', NULL, NULL, NULL, 'Right', 8, NULL, 3, 'Manual', 8, 'exterior1.jpg, exterior2.jpg', 'interior1.jpg, interior2.jpg', 'video.mp4', 'blue.jpg, black.jpg', 23323.000, '2024-06-30 00:00:00'),
(2, 'Jane Smith', 'Ferrari', '458 Italia', '2022', 2, 'Red', '18000', 4497, 'Petrol', 'Used', 'Sporty design, Powerful engine', 'Yes', 'Left', 2, 'Gasoline', 8, 'Automatic', 4, 'exterior3.jpg, exterior4.jpg', 'interior3.jpg, interior4.jpg', 'video2.mp4', 'red.jpg', 20000.000, '2024-07-15 12:00:00'),
(3, 'John Doe', 'Mercedes-Benz', 'C-Class', '2023', 4, 'Silver', '2500', 2000, 'Petrol', 'new', 'Keyless entry, Leather seats', 'Good', 'Right', 5, 'CNG', 6, 'Automatic', 4, 'url_to_exterior_image1,url_to_exterior_image2', 'url_to_interior_image1,url_to_interior_image2', 'url_to_video_clip', 'url_to_color_image1,url_to_color_image2', 7500.000, '2024-06-10 18:00:00'),
(4, 'Jane Smith', 'BMW', '5 Series', '2023', 4, 'Black', '3000', 2501, 'Petrol', 'used', 'Sunroof, Navigation system', 'Fair', 'Left', 5, 'Diesel', 4, 'Automatic', 4, 'url_to_exterior_image1,url_to_exterior_image2', 'url_to_interior_image1,url_to_interior_image2', 'url_to_video_clip', 'url_to_color_image1,url_to_color_image2', 9800.000, '2024-06-12 18:00:00'),
(5, 'David Johnson', 'Audi', 'A6', '2023', 4, 'White', '2800', 2201, 'Petrol', 'new', 'Backup camera, Parking sensors', 'Excellent', 'Left', 5, 'Electric', 6, 'Automatic', 4, 'url_to_exterior_image1,url_to_exterior_image2', 'url_to_interior_image1,url_to_interior_image2', 'url_to_video_clip', 'url_to_color_image1,url_to_color_image2', 8500.000, '2024-06-14 18:00:00'),
(6, 'Michael Brown', 'Toyota', 'Camry', '2023', 4, 'Red', '2000', 1800, 'Petrol', 'used', 'Bluetooth, Alloy wheels', 'Fair', 'Right', 5, 'Hybrid', 4, 'Automatic', 4, 'url_to_exterior_image1,url_to_exterior_image2', 'url_to_interior_image1,url_to_interior_image2', 'url_to_video_clip', 'url_to_color_image1,url_to_color_image2', 6200.000, '2024-06-16 18:00:00'),
(7, 'Sarah Davis', 'Honda', 'Accord', '2023', 4, 'Blue', '1800', 1750, 'Petrol', 'used', 'Lane departure warning, Apple CarPlay', 'Good', 'Left', 5, 'CNG', 4, 'Automatic', 4, 'url_to_exterior_image1,url_to_exterior_image2', 'url_to_interior_image1,url_to_interior_image2', 'url_to_video_clip', 'url_to_color_image1,url_to_color_image2', 5800.000, '2024-06-18 18:00:00'),
(8, 'Chris Wilson', 'Ford', 'Mustang', '2023', 2, 'Yellow', '1500', 3500, 'Petrol', 'new', 'Rear-wheel drive, Performance brakes', 'Excellent', 'Left', 2, 'Petrol', 8, 'Manual', 4, 'url_to_exterior_image1,url_to_exterior_image2', 'url_to_interior_image1,url_to_interior_image2', 'url_to_video_clip', 'url_to_color_image1,url_to_color_image2', 8500.000, '2024-06-20 18:00:00'),
(9, 'Emily Johnson', 'Chevrolet', 'Camaro', '2023', 2, 'Orange', '1800', 3600, 'Petrol', 'new', 'Convertible roof, Performance suspension', 'Good', 'Right', 2, 'Petrol', 8, 'Manual', 4, 'url_to_exterior_image1,url_to_exterior_image2', 'url_to_interior_image1,url_to_interior_image2', 'url_to_video_clip', 'url_to_color_image1,url_to_color_image2', 8800.000, '2024-06-22 18:00:00'),
(10, 'Alex Martinez', 'Nissan', 'Altima', '2023', 4, 'Green', '2000', 1900, 'Petrol', 'used', 'Remote start, Blind spot warning', 'Fair', 'Left', 5, 'Diesel', 4, 'Automatic', 4, 'url_to_exterior_image1,url_to_exterior_image2', 'url_to_interior_image1,url_to_interior_image2', 'url_to_video_clip', 'url_to_color_image1,url_to_color_image2', 5400.000, '2024-06-24 18:00:00'),
(11, 'Taylor Thomas', 'Tesla', 'Model S', '2023', 4, 'Silver', '1500', 0, 'Electric', 'new', 'Autopilot, Full self-driving capability', 'Excellent', 'Right', 5, 'Electric', 0, 'Automatic', 4, 'url_to_exterior_image1,url_to_exterior_image2', 'url_to_interior_image1,url_to_interior_image2', 'url_to_video_clip', 'url_to_color_image1,url_to_color_image2', 12000.000, '2024-06-26 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `min_bid` int(11) NOT NULL,
  `time_limit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'John Doe', 'john@example.com', 'password1'),
(2, 'Jane Smith', 'jane@example.com', 'password2'),
(3, 'Michael Johnson', 'michael@example.com', 'password3'),
(4, 'Emily Brown', 'emily@example.com', 'password4'),
(5, 'David Lee', 'david@example.com', 'password5'),
(6, 'Sarah Wilson', 'sarah@example.com', 'password6'),
(7, 'Christopher Taylor', 'christopher@example.com', 'password7'),
(8, 'Jessica Martinez', 'jessica@example.com', 'password8'),
(9, 'Daniel Garcia', 'daniel@example.com', 'password9'),
(10, 'Amanda Rodriguez', 'amanda@example.com', 'password10');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cardetails`
--
ALTER TABLE `cardetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cardetails`
--
ALTER TABLE `cardetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cardetails` (`id`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
