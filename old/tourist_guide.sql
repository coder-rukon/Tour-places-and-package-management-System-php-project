-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 07:14 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourist_guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(100) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `total_seat` int(11) DEFAULT NULL,
  `package_id` int(50) DEFAULT NULL,
  `payment_method` varchar(250) DEFAULT NULL,
  `payment_id` varchar(250) NOT NULL,
  `requested_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  `booking_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `total_seat`, `package_id`, `payment_method`, `payment_id`, `requested_date`, `status`, `booking_date`) VALUES
(3, 1, 6, 12, 'Ucash', '9689', '2020-09-30 01:26:19', 'pending', NULL),
(4, 1, 55, 12, 'Rocket', '2365145645646', '2020-09-30 01:28:03', 'pending', NULL),
(5, 1, 5, 12, 'Ucash', '5888', '2020-09-30 11:56:05', 'pending', NULL),
(6, 1, 2, 14, 'Rocket', '5645646', '2020-10-02 00:51:04', 'confirmed', NULL),
(7, 3, 6, 14, 'Ucash', '5685', '2020-10-02 02:18:21', 'confirmed', NULL),
(8, 2, 2, 14, 'Bkash', '59789', '2020-10-02 11:13:45', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `content`, `thumbnail`) VALUES
(3, ' Donec quam felis, ultricies nec,', '\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n', 'upload/2018/10/20/ab.jpg'),
(4, 'Maecenas nec odio et ante tincidunt tempus.', '', 'upload/2018/10/20/g1.jpg'),
(5, ' augue velit cursus nunc', '\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n', 'upload/2018/10/20/g3.jpg'),
(6, 'sdfs', 'sdfsf', 'upload/2018/11/01/5bdb53fc6bc4c_ab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gmap` mediumtext NOT NULL,
  `thumbnail` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `division` varchar(20) NOT NULL,
  `facility` text NOT NULL,
  `nearby_travel_place` text NOT NULL,
  `budget_min` varchar(20) DEFAULT '0',
  `budget_max` varchar(20) NOT NULL DEFAULT '0',
  `offer` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `address`, `gmap`, `thumbnail`, `description`, `phone`, `division`, `facility`, `nearby_travel_place`, `budget_min`, `budget_max`, `offer`) VALUES
(3, 'Hotel Name Update', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3713.0917070785163!2d91.948347!3d21.464918!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9f945bf30a3a78df!2sSohel+Telecom!5e0!3m2!1sen!2sbd!4v1540488725242\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'upload/2018/10/25/5bd1fe295b64c_g5.jpg', 'Hotel Descript', '01733435951', 'Mymensingh', '[{\"name\":\"Facility 1\",\"description\":\"Facility Details 1\"},{\"name\":\"Facility 2\",\"description\":\"Facility Details 2\"},{\"name\":\"Facility 3\",\"description\":\"Facility Details 3\"},{\"name\":\"Facility 4\",\"description\":\"Facility Details 4\"},{\"name\":\"New Facility\",\"description\":\"Facility Details  New\"}]', '[\"3\",\"2\"]', '', '', ''),
(4, 'Maecenas nec odio et ante tincidunt tempus.', 'address Here', 'dfs', 'upload/2018/10/25/5bd210ffaf3ed_ab.jpg', 'dsfdsf', '01652', 'Barishal', '[{\"name\":\"Facility 1\",\"description\":\"Facility Details 1\"},{\"name\":\"Facility 4\",\"description\":\"Facility Details 4\"}]', '[\"3\"]', '250', '5050', '20% Off');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `place_from` int(30) NOT NULL,
  `resort_to` int(30) NOT NULL,
  `days` varchar(5) NOT NULL,
  `type` varchar(10) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `total_seat` int(50) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `price` double NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `place_from`, `resort_to`, `days`, `type`, `details`, `image`, `total_seat`, `date`, `price`, `last_updated`) VALUES
(12, 'Test Update', 9, 5, '10', 'single', 'sdfdsf', 'http://localhost/tourist_guide/upload/2018/11/01/5bdb53fc6bc4c_ab.jpg', 95, '2020-09-26', 320, '2020-09-26 19:50:22'),
(13, 'UPcom', 4, 0, '1', 'single', 'dd', 'http://localhost/tourist_guide/upload/2018/11/01/5bdb53fc6bc4c_ab.jpg', 48, '2020-10-31', 230, '2020-10-02 00:50:04'),
(14, 'UPcom', 9, 5, '1', 'single', 'dd', 'http://localhost/tourist_guide/upload/2018/11/01/5bdb53fc6bc4c_ab.jpg', 48, '2020-10-10', 230, '2020-10-02 00:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `division` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`, `division`) VALUES
(4, 'Mirpur 1', 'Dhaka'),
(5, 'Mirpur 2', 'Dhaka'),
(6, 'Mirpur 3', 'Dhaka'),
(7, 'Mirpur 10', 'Dhaka'),
(8, 'Mirpur 11', 'Dhaka'),
(9, 'Mirpur 7', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gmap` mediumtext NOT NULL,
  `thumbnail` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `division` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `address`, `gmap`, `thumbnail`, `description`, `phone`, `division`) VALUES
(2, 'Dimentum rhoncus', 'Islampur , Jamalpur, Dhaka, Bangladesh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3713.0917070785163!2d91.948347!3d21.464918!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9f945bf30a3a78df!2sSohel+Telecom!5e0!3m2!1sen!2sbd!4v1540119951933\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'upload/2018/10/21/5bcc5fd1a622e_Bazille-Nordstrom-Restaurant.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n\r\n', 'rukon@gmail.com', 'Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `travel_place`
--

CREATE TABLE `travel_place` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `thumbnail` varchar(250) NOT NULL,
  `details` text NOT NULL,
  `populer_foods` mediumtext NOT NULL,
  `gmap` mediumtext NOT NULL,
  `division` varchar(50) NOT NULL,
  `nearby_hotel` text NOT NULL,
  `nearby_restaurants` text NOT NULL,
  `nearby_tour_place` text NOT NULL,
  `tourist_spot` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_place`
--

INSERT INTO `travel_place` (`id`, `name`, `thumbnail`, `details`, `populer_foods`, `gmap`, `division`, `nearby_hotel`, `nearby_restaurants`, `nearby_tour_place`, `tourist_spot`) VALUES
(1, 'Cox-Bazar', 'upload/2018/10/31/5bda329b8d1ef_g2.jpg', 'dfdsf', '[{\"name\":\"Food 1\",\"price\":\"125\",\"details\":\"Detais food 1\"},{\"name\":\"Food 2\",\"price\":\"150\",\"details\":\"Detais food 2\"},{\"name\":\"Food 3\",\"price\":\"580\",\"details\":\"Detais food 3\"}]', 'Map location ', 'Mymensingh', '[]', '[\"2\"]', '[]', '{\"spots\":[],\"journey\":[]}'),
(2, 'Cox-Bazar', 'upload/2018/10/25/5bd1d85993cf6_g3.jpg', 'dfdsf', '[{\"name\":\"Food 1\",\"price\":\"125\",\"details\":\"Detais food 1\"},{\"name\":\"Food 2\",\"price\":\"150\",\"details\":\"Detais food 2\"},{\"name\":\"Food 3\",\"price\":\"580\",\"details\":\"Detais food 3\"}]', 'Map location ', 'Mymensingh', '[\"Barishal\",\"Chattagram\",\"Dhaka\"]', '[\"2\"]', '[]', ''),
(3, 'Maecenas nec odio et ante tincidunt tempus.', 'upload/2018/10/25/5bd1d9e907d5f_ab.jpg', 'Data dsd dsfd sfdsf sdfdsf sdfdsfsd sdfdsf sdf', '[{\"name\":\"Food 1\",\"price\":\"125\",\"details\":\"Detais food 1\"},{\"name\":\"Food 2\",\"price\":\"125\",\"details\":\"Detais food 2\"},{\"name\":\"Food 3\",\"price\":\"580\",\"details\":\"Detais food 3\"}]', 'Map location', 'Mymensingh', '[]', '[\"2\"]', '[\"5\"]', '{\"spots\":[],\"journey\":[]}'),
(4, 'Maecenas nec odio et ante tincidunt tempus.', 'upload/2018/10/31/5bda31c84fe2f_g3.jpg', 'dfsdf Last Updated', '[{\"name\":\"dfs\",\"price\":\"dfs\",\"details\":\"dsfds\"},{\"name\":\"D\",\"price\":\"df\",\"details\":\"ad\"}]', 'Map location', 'Mymensingh', '[\"4\",\"3\"]', '[\"2\"]', '[\"4\",\"3\",\"2\",\"1\"]', '{\"spots\":[\"Another\",\"Test data\",\"T2\",\"T1\"],\"journey\":{\"spot_t1_spot_testdata\":{\"distance\":\"52 K\",\"vehicle\":[\"Valu name\",\"Value 2\",\"New One Value\"],\"fare\":[\"56\",\"20\",\"20\"],\"time\":[\"50m\",\"70m\",\"76m\"]},\"spot_t1_spot_t2\":{\"distance\":\"58 K\",\"vehicle\":[\"Bike\",\"addf\"],\"fare\":[\"25Tk\",\"54\"],\"time\":[\"5min\",\"788m\"]}}}'),
(5, 'Tour Place', 'upload/2018/11/01/5bdb537e595fb_g4.jpg', 'Details', '[{\"name\":\"Food 1\",\"price\":\"252\",\"details\":\"Details\"}]', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59415.18303695419!2d91.96788250874124!3d21.450894507322232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adc7ea2ab928c3%3A0x3b539e0a68970810!2sCox&#39;s+Bazar!5e0!3m2!1sen!2sbd!4v1541100279533\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Rajshahi', '[\"4\",\"3\"]', '[\"2\"]', '[\"4\",\"3\",\"2\",\"1\"]', '{\"spots\":[\"Place 2\",\"Place 1\"],\"journey\":{\"spot_place1_spot_place2\":{\"distance\":\"25K\",\"vehicle\":[\"Cycle \",\"Byke\"],\"fare\":[\"15\",\"65\"],\"time\":[\"25m\",\"8min\"]}}}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(33) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_activity` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_date`, `last_activity`, `user_role`) VALUES
(1, 'Md Rukon Shekh', 'rukon.info@gmail.com', '202cb962ac59075b964b07152d234b70', '2018-10-20 16:36:03', '2018-10-20 12:36:03', 'admin'),
(2, 'Asad Update', 'asad@gmail.com', '202cb962ac59075b964b07152d234b70', '2018-10-20 23:45:12', '2018-10-20 07:45:12', 'subscriber'),
(3, 'asad', 'asad2@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-10-02 02:17:54', '2020-10-01 10:17:54', 'subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_place`
--
ALTER TABLE `travel_place`
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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `travel_place`
--
ALTER TABLE `travel_place`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
