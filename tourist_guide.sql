-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 07:05 PM
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
  `booking_date` datetime DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `bank_tran_id` varchar(250) DEFAULT NULL,
  `val_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `total_seat`, `package_id`, `payment_method`, `payment_id`, `requested_date`, `status`, `booking_date`, `total`, `bank_tran_id`, `val_id`) VALUES
(22, 2, 1, 14, 'VISA-Dutch Bangla', 'SSLCZ_5f84870db8c8b', '2020-10-12 22:40:45', 'confirmed', NULL, '230', '2010122244181bYEQsNWmd35oAq', '20101222441802F3kCliJKM9EIa'),
(24, 2, 1, 20, 'NAGAD-Nagad', 'SSLCZ_5f848c4b77cfe', '2020-10-12 23:03:07', 'confirmed', NULL, '3000', '2010122305110QbBWbb2pOl3tOa', '2010122305110t62caGEUYVeMiS');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(30) NOT NULL,
  `name` text,
  `content` mediumtext,
  `thumbnail` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `content`, `thumbnail`) VALUES
(1, ' Donec quam felis, ultricies nec,', '\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n', 'upload/2018/10/20/ab.jpg'),
(2, 'Maecenas nec odio et ante tincidunt tempus.', '', 'upload/2018/10/20/g1.jpg'),
(3, ' augue velit cursus nunc', '\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n', 'upload/2018/10/20/g3.jpg'),
(4, 'sdfs', 'sdfsf', 'upload/2018/11/01/5bdb53fc6bc4c_ab.jpg'),
(8, 'Cox Bazar', 'dfsf', 'upload/2020/10/02/5f7749be83b04_coxs-bazar.jpg'),
(9, 'joynul abedin songraha sala', 'Silpa carja joynul abedin songroho sala ', 'upload/2020/10/02/5f774fd8b518e_joy.jpg'),
(10, 'Bangladesh Agricultural University', 'Bangladesh  agricultural university is situated in Mymensingh . it is the biggest university in Asia according to the area. ', 'upload/2020/10/02/5f77502a1dcb4_bau.jpg'),
(11, 'Mymensingh brammaputro river bank', 'near the Mymensingh circuit house, it is situated', 'upload/2020/10/02/5f77509c68c8d_crmym.jpg');

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
(4, 'Hotel Sukarna Int. Residential', 'Shaheb Bazar Road Somoby Super Market Rajshahi BD 6000, Shaheb Bazar Rd, Rajshahi', 'https://goo.gl/maps/Au2TEV6QU1HjPsnV7', 'upload/2020/10/02/5f77141f8a3b9_18271800htr1.JPG', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla u', '01711-811014', 'Rajshahi', '[{\"name\":\"24 Hour security.\",\"description\":\"Car parking.\"},{\"name\":\"Interconnecting rooms.\",\"description\":\"Facility Details 4\"}]', '[\"5\"]', '1000', '5000', '20% Off'),
(5, 'Meghpunji Cottage (à¦®à§‡à¦˜à¦ªà§à¦žà§à¦œà¦¿)', 'Sajek valley ', 'https://goo.gl/maps/QNcG9WEWJK7PvwjX6', 'upload/2020/10/02/5f7714e19eae1_gallary_2.jpg', '4 cottages named Tarasha, Purbasha, Rodela, and Meghla\r\n* Complete privacy in each cottage\r\n* Each cottage has a couple bed\r\n* Tiled washroom with high commode\r\n* Spacious open Baranda in each cottage\r\n* Unique Selfie Bridge and delightful night lighting\r\n', '01815-761065 (Sajek), 01911-72', 'Chattagram', '[{\"name\":\"1.\",\"description\":\"Guaranteed safety at all time\"},{\"name\":\"2.\",\"description\":\"24 hours water supply\"},{\"name\":\"3.\",\"description\":\"24 hours electricity with the all-time backup of solar, ips, and generator\"},{\"name\":\"4.\",\"description\":\"Swing set and beautiful garden\"}]', '[\"5\"]', '4000', '4500', '10%'),
(6, 'Warisan Residential Hotel', '88 Zodiac Palace, 7th Floor Shaheb Bazar, Rajshahi City 6100 Bangladesh', 'https://goo.gl/maps/H1AkkMEWKqyv1M667', 'upload/2020/10/02/5f771bdbc12f7_012020201200354115e2596633a6db.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla u', '01734746072', 'Rajshahi', '[]', '[]', '3000', '10000', '20%'),
(8, 'Hotel Nice International', 'West of P.N Girls High SchoolGanakpara, Rajshahi, Rajshahi, Bangladesh', 'https://goo.gl/maps/14onvi7HUvbMrAqE8', 'upload/2020/10/02/5f771cd9c0dc8_462677_130530162719482 nice.jpg', 'At Hotel Nice International, every effort is made to make guests feel comfortable. To do so, the hotel provides the best in services and amenities. 24-hour room service, facilities for disabled guests, Wi-Fi in public areas, valet parking, car park are just a few of the facilities that set Hotel Nice International apart from other hotels in the city.', '12345678', 'Rajshahi', '[{\"name\":\"Languages spoken\",\"description\":\"English\"},{\"name\":\"Fitness & recreation\",\"description\":\"Game room\"},{\"name\":\"Internet access\",\"description\":\"Wi-Fi in public areas\"}]', '[]', '1500', '6000', '15%'),
(13, 'Hotel amir', 'Mymensingh ganginapar', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.1673062427644!2d90.40787005075742!3d24.755452155476423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37564f00d617a9c5%3A0xc13982e5ff8297d7!2sHotel%20Amir%20International!5e0!3m2!1sen!2sbd!4v1601649533374!5m2!1sen!2sbd', 'upload/2020/10/02/5f773f7dcaec5_amir.jpg', 'This straightforward hotel on a bustling urban street walk from Mymensingh Railway Junction This straightforward hotel on a bustling urban street walk from Mymensingh Railway JunctionThis straightforward hotel on a bustling ', '01711167948', 'Mymensingh', '[{\"name\":\"breakfast\",\"description\":\"free breakfast\"},{\"name\":\"wifi\",\"description\":\"free wifi\"}]', '[]', '1000', '8000', ''),
(14, 'Grand Palace Hotel & Resort', 'G L Roy Road, 5400 Rangpur, Bangladesh', 'https://g.page/GrandPalaceRangpur?share', 'upload/2020/10/02/5f773fe3907c3_142241270.jpg', 'Grand Palace Hotel & Resort features a restaurant, fitness center, a bar and garden in Rangpur. Featuring family rooms, this property also provides guests with a terrace. ', '01734746072', 'Rangpur', '[{\"name\":\"Services\",\"description\":\"Room service\"},{\"name\":\"Food & Drink\",\"description\":\"Bar, Restaurant\"}]', '[\"10\"]', '2000', '10000', '20%'),
(18, 'Little Rangpur Inn', ' Kotwali Thana Road 2 Mulatole, 5400 Rangpur, Bangladesh', 'https://goo.gl/maps/CsBbwsKpL6erZUBq6', 'upload/2020/10/02/5f77442660960_booking-3385037-139360211-image.jpg', 'Little Rangpur Inn has a restaurant, free bikes, a fitness center and garden in Rangpur. Among the facilities at this property are room service and a concierge service', '+880 1710-058947', 'Rangpur', '[{\"name\":\"Outdoors\",\"description\":\"Outdoor fireplace, Picnic area\"},{\"name\":\"Safety & security\",\"description\":\"Fire extinguishers, Smoke alarms\"}]', '[]', '1500', '5000', '25%'),
(19, 'Mermaid Beach Resort ', 'coxs bazar', 'https://g.page/mermaid-beach-resort-586?share', 'upload/2020/10/02/5f774d034569c_221208140.jpg', 'We have two restaurants at the Resort. Our cafÃ© serves local and Italian food and the second restaurant offers world cuisine a diverse culinary offering to satisfy every palette.', '01841416468', 'Chattagram', '[{\"name\":\"1\",\"description\":\"Free wifi\"},{\"name\":\"2\",\"description\":\"Hot water kettle\"},{\"name\":\"3\",\"description\":\"Air conditioning\"},{\"name\":\"4\",\"description\":\"24hour housekeeping\"}]', '[]', '12000 ', '25000 ', '8%'),
(21, 'Mermaid Beach Resort ', 'coxs bazar', 'https://g.page/mermaid-beach-resort-586?share', '', 'We have two restaurants at the Resort. Our cafÃ© serves local and Italian food and the second restaurant offers world cuisine a diverse culinary offering to satisfy every palette.', '01841416468', 'Chattagram', '[{\"name\":\"1\",\"description\":\"Free wifi\"},{\"name\":\"2\",\"description\":\"Hot water kettle\"},{\"name\":\"3\",\"description\":\"Air conditioning\"},{\"name\":\"4\",\"description\":\"24hour housekeeping\"}]', '[]', '20000 ', '43000 ', '8%');

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
(14, 'UPcom', 10, 7, '1', 'single', 'dd', 'http://localhost/tourist_guide/upload/2018/11/01/5bdb53fc6bc4c_ab.jpg', 48, '2020-10-10', 230, '2020-10-02 00:50:30'),
(15, 'Couple Package', 10, 7, '2', 'single', 'dhaka to sajek', '1', 8, '2020-01-10', 20000, '2020-10-02 09:28:45'),
(16, 'Normal', 4, 10, '4', 'single', 'all in one', '', 40, '2020-10-10', 10000, '2020-10-02 11:05:26'),
(17, 'single package', 7, 7, '4', 'single', 'Everything in one', '', 40, '2020-02-11', 10000, '2020-10-02 11:06:58'),
(18, 'Sajek valley tour', 19, 12, '5', 'single', 'go to sajek valley ', 'http://digitalbd.net/project/tourist/upload/2020/10/02/5f77141f8a3b9_18271800htr1.JPG', 60, '2020-05-10', 5000, '2020-10-02 11:36:56'),
(19, 'Mermaid Package', 20, 1, '2', 'couple', 'All in one', '', 3, '2020-12-05', 100000, '2020-10-02 12:05:45'),
(20, 'fly north', 4, 15, '3', 'single', '', '', 40, '2020-11-03', 3000, '2020-10-02 12:32:08'),
(21, 'dhaka to cox bazar', 20, 15, '3', 'single', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, ', 'http://localhost/tourist_guide/upload/2020/10/02/5f77502a1dcb4_bau.jpg', 40, '2020-10-10', 5600, '2020-10-02 12:54:07');

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
(7, 'Mirpur 10', 'Dhaka'),
(8, 'Mirpur 11', 'Dhaka'),
(9, 'Mirpur 7', 'Dhaka'),
(11, 'Noakhali', 'Chattagram'),
(12, 'Cumilla', 'Chattagram'),
(13, 'Chattogram', 'Chattagram'),
(14, 'savar', 'Dhaka'),
(15, 'gajipur', 'Dhaka'),
(16, 'Narainganj', 'Dhaka'),
(17, 'Narsindi', 'Dhaka'),
(18, 'Madaripur', 'Dhaka'),
(19, 'Gaibandha', 'Rangpur'),
(20, 'Dhaka', 'Dhaka');

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
(2, 'Dimentum rhoncus', 'Islampur , Jamalpur, Dhaka, Bangladesh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3713.0917070785163!2d91.948347!3d21.464918!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9f945bf30a3a78df!2sSohel+Telecom!5e0!3m2!1sen!2sbd!4v1540119951933\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'upload/2018/10/21/5bcc5fd1a622e_Bazille-Nordstrom-Restaurant.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,\r\n\r\n', 'rukon@gmail.com', 'Rajshahi'),
(3, 'Kashbon Restaurant', 'Z1603, Sajek', 'https://goo.gl/maps/vhKhuH64CYFDCvDH7', 'upload/2020/10/02/5f771bcb257e1_20191114_141022-scaled.jpg', 'Kashbon Restaurant is the best Restaurant in Sajek. We are the only restaurant with a Rooftop view in Sajek. Its not only the best place food and relaxation but also the best place to get a view of Sajek. We have 5/5 star reviews and 6 star service.\r\n\r\nOur Restaurant has two Floors of Sitting Space and capable of servicing 70 person at a time.', '+8801648676555', 'Chattagram'),
(4, 'Hotel Star International', 'Aamchattar, Bypass Road, Nowdapara, Rajshahi City 6203 Bangladesh', 'https://goo.gl/maps/RQDF3hwz99mkWxtN7', 'upload/2020/10/02/5f771eadd4c7d_regular-tablw.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo', '+880 721-761263', 'Rajshahi'),
(5, 'FoodNKI', 'Ruilui Para, Sajek', 'https://goo.gl/maps/idMbGm3Q3v91rGVE8', 'upload/2020/10/02/5f771f6abd7be_Capture.JPG', 'FoodKI is one of the best restaurant in Sajek.', '01869-157666', 'Chattagram'),
(6, 'The Hideout Cafe', 'Newmarket Road Level-2, Sultanabad, Rajshahi City 6000 Bangladesh', 'https://g.page/thehideoutcafe?share', 'upload/2020/10/02/5f77238ac903d_the-hideout-cafe-and.jpg', 'A fast food restaurant with good quality food, good ambiance & good service.', '+880 1721-171816', 'Rajshahi'),
(7, 'Twist & Taste', 'Shaheb Bazar Rd. Jamal Super Market, 1st Floor., Rajshahi City 6100 Bangladesh', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14537.879973926578!2d88.6012246!3d24.3649484!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3c1211534f36dff!2sTwist%20%26%20Taste!5e0!3m2!1sen!2sbd!4v1601645764996!5m2!1sen!2sbd', 'upload/2020/10/02/5f7728b489162_download.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo', '+880 1710-058947', 'Rajshahi'),
(8, 'Cicily Thai Chinese Restaurant', 'Raja Rammohan Market, Rangpur 5400 Bangladesh', 'https://www.google.com/maps/search/Cicily+Thai+Chinese+Restaurant/@25.0835065,88.5658836,9z/data=!3m1!4b1', 'upload/2020/10/02/5f773bfc89132_download (1).jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. ', '+880 521-63076', 'Rangpur'),
(9, 'Mouban Resturent', 'Kachari Bazaar Road, Rangpur Bangladesh', '', 'upload/2020/10/02/5f774540434dd_arab-breakfast.jpg', '\r\nThis is an old famous restaurant in Rangpur city. ', '+880 1721-171816', 'Rangpur'),
(10, 'Mermaid Cafe', 'Mermaid Cafe, Near Dragon Mart, Kolatoli Road, Sugandha Beach Sea In point, Hotel Motel, Coxs Bazar 4700', 'https://g.page/mermaidcafe?share', 'upload/2020/10/02/5f774ed70af60_entrance-of-mermaid-cafe.jpg', 'CUISINES:\r\nSeafood, Asian\r\n\r\nSPECIAL DIETS:\r\nVegetarian Friendly\r\n\r\nMEALS:\r\nLunch, Dinner, Late Night', '01882455368', 'Chattagram');

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
(7, 'Sajek valley', 'upload/2020/10/02/5f7733d3d2344_1576957938_5.jpg', 'Sajek Valley - à¦¸à¦¾à¦œà§‡à¦• à¦­à§à¦¯à¦¾à¦²à¦¿ / à¦®à§‡à¦˜à§‡à¦° à¦‰à¦ªà¦¤à§à¦¯à¦•à¦¾à¦¯à¦¼ à¦œà§€à¦¬à¦¨ is an emerging tourist spot in Bangladesh situated among the hills of the Kasalong range of mountains in Sajek union, Baghaichhari Upazila in Rangamati District. The valley is 1,476 feet (450 m) above sea level. \r\n\r\nSajek valley is known for its natural environment and is surrounded by mountains, dense forest, and grassland hill tracks. Many small rivers flow through the mountains among which the Kachalong and the Machalong are notable. On the way to Sajek valley, one has to cross the Mayni range and the Mayni river. The road to Sajek has high peaks and falls\r\n\r\n\r\nSajek valley is known as the Queen of Hills & Roof of Rangamati.', '[{\"name\":\"Bamboo Biriyani\",\"price\":\"300/2perso\",\"details\":\"It is cooked in the ba\"}]', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1873778.0493693454!2d90.22119170975431!3d23.47046310444227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3752feb9eb8c7313%3A0xf1d07a0cc84f174c!2sSajek%20Valley!5e0!3m2!1sen!2sbd!4v1601645550389!5m2!1sen!2sbd', 'Barishal', '[]', '[]', '[]', '{\"spots\":[\"Ruilui para\",\"konglak pahar\"],\"journey\":{\"spot_konglakpahar_spot_ruiluipara\":{\"distance\":\"2.8km\",\"vehicle\":[\"chander gari/CNG\"],\"fare\":[\"500\"],\"time\":[\"39min\"]}}}'),
(8, 'Varendra Research Museum', 'upload/2020/10/02/5f77318e44dfc_Varendra-Research-Museum-2.jpg', 'Varendra Museum is a museum, research centre, and popular visitor attraction at the heart of Rajshahi and maintained by Rajshahi University in Bangladesh. It is considered the oldest museum in Bangladesh. It was the first museum to be established in East Bengal in 1910. The museum started out as the collection for Varendra Anushandan Samiti and got its current name in 1919. The Rajahs of Rajshahi and Natore, notably prince Sharat Kumar Ray, donated their personal collections to Varendra Museum. Varendra refers to an ancient Janapada roughly corresponding to modern northern Bangladesh', '[{\"name\":\"Shashlik \",\"price\":\"30\",\"details\":\"Nothing would be able to beat the appeal of Shashlik of NFC cart in Laxmipur that comes with real cube of chicken garnished with onion and carrot\"},{\"name\":\"Bot Porata\",\"price\":\"15\",\"details\":\"Bot Porota of Talaimari in the evening is one of the oldest street foods of Rajshahi city. \"}]', 'https://goo.gl/maps/cBXniJywHsXg8oxo8', 'Rajshahi', '[\"4\"]', '[\"6\"]', '[]', '{\"spots\":[],\"journey\":[]}'),
(10, 'Tajhat Palace, Rangpur.', 'upload/2020/10/02/5f773a93184ea_tajhat-palace.jpg', 'Tajhat Palace, Tajhat Rajbari, is a historic palace of Bangladesh, located in Tajhat, Rangpur. This palace now holds the Rangpur museum. Tajhat Palace is situated three km. south-east of the city of Rangpur, on the outskirts of town.', '[{\"name\":\"Biriyani\",\"price\":\"200\",\"details\":\"much tasty\"}]', 'https://goo.gl/maps/jK7LZhAYrDiK449h7', 'Rangpur', '[\"14\"]', '[\"8\"]', '[\"8\"]', '{\"spots\":[],\"journey\":[]}'),
(11, 'Vinnya Jagat, Rangpur.', 'upload/2020/10/02/5f774737cc22d_download (2).jpg', 'Vinno jogot is most famous and popular tourist spot of Rangpur district. It is biggest tourist spot and picnic spots of Rangpur. It is located in Uttar Khaleya, Gongipur, Paglapir, Upo Zillla-Rangpur Sadar in Rangpur district.', '[{\"name\":\"kacchi\",\"price\":\"180\",\"details\":\"amazing taste\"}]', '', 'Barishal', '[\"18\"]', '[\"9\"]', '[\"10\"]', '{\"spots\":[\"Funcity Amusement Park, Thakurgaon.\",\"Rangpur Zoo, Rangpur.\"],\"journey\":{\"spot_rangpurzoo,rangpur._spot_funcityamusementpark,thakurgaon.\":{\"distance\":\"15km\",\"vehicle\":[\"bus\"],\"fare\":[\"100\"],\"time\":[\"40min\"]}}}'),
(12, 'Jannatunnesa Shongita', 'upload/2020/10/02/5f774abe861a4_Jainul_Abedin_Museum.jpg', 'It is located at the northern end of Mymensingh city, surrounded by natural scenery on the banks of the Brahmaputra River and the memory of the great artist', '[{\"name\":\"cotpoti\",\"price\":\"200\",\"details\":\"1package\"}]', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.735120876759!2d90.39279845071721!3d24.770269384018498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37564ee46a43d3e5%3A0xb0cce5f49053ae6!2sShilpacharya%20Zainul%20Abedin%20Sangrahashala!5e0!3m2!1sen!2sbd!4v1601653301004!5m2!1sen!2sbd', 'Mymensingh', '[]', '[]', '[]', '{\"spots\":[\"bank of river\",\"cercit house\"],\"journey\":{\"spot_cercithouse_spot_bankofriver\":{\"distance\":\"2km\",\"vehicle\":[\"rikshaw\"],\"fare\":[\"50\"],\"time\":[\"20min\"]}}}'),
(13, 'Natore Rajbari', 'upload/2020/10/02/5f774fd7e218d_download (3).jpg', 'Natore Rajbari was a prominent royal palace in Natore, Bangladesh. It was the residence and seat of the Rajshahi Raj family of zamindars. The famous queen Rani Bhabani lived here and after the death of her husband, expanded both the estate and the palace.', '[{\"name\":\"kancha golla\",\"price\":\"400\",\"details\":\"delicious\"}]', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14531.6476526152!2d88.9926119!3d24.4191276!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7e67a544df04a973!2sNatore%20Rajbari!5e0!3m2!1sen!2sbd!4v1601669703173!5m2!1sen!2sbd', 'Rajshahi', '[\"8\"]', '[\"7\"]', '[]', '{\"spots\":[\"chalan beel\",\"uttara gonobhaban\"],\"journey\":{\"spot_uttaragonobhaban_spot_chalanbeel\":{\"distance\":\"10km\",\"vehicle\":[\"bus\"],\"fare\":[\"200\"],\"time\":[\"1hr\"]}}}'),
(14, 'St. Martin Island', 'upload/2020/10/02/5f77511d91287_4195504888_edb9cc9fb6_b.jpg', 'St. Martin Island is a small island in the northeastern part of the Bay of Bengal, about 9 km south of the tip of the Coxs Bazar-Teknaf peninsula, and forming the southernmost part of Bangladesh. There is a small adjoining island that is separated at high tide, called Chera Dwip', '[{\"name\":\"food\",\"price\":\"300/2person\",\"details\":\"habi jabi\"}]', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59753.03199432007!2d92.2919520831156!3d20.605835174500033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ae2363dee2d61b%3A0xfb3463713589d312!2sSt.%20Martin&#39;s%20Island!5e0!3m2!1sen!2sbd!4v1601656787580!5m2!1sen!2sbd', 'Chattagram', '[\"19\",\"5\"]', '[]', '[\"7\",\"1\"]', '{\"spots\":[\"chera dwip\",\"saint martin\"],\"journey\":{\"spot_saintmartin_spot_cheradwip\":{\"distance\":\"3.8km\",\"vehicle\":[\"walking\"],\"fare\":[\"0\"],\"time\":[\"46min\"]}}}'),
(15, 'puthia rajbari', 'upload/2020/10/02/5f7752721d9ac_Puthia-Rajbari.jpg', 'Puthia Rajbari is a palace in Puthia Upazila, in Bangladesh, built in 1895, for Rani Hemanta Kumari, it is an example of Indo-Saracenic Revival architecture. The palace is sited on the Rajshahi Nator highway 30 km from the east of the town and one km south from Rajshahi Nator highway', '[{\"name\":\"Seekh Burger\",\"price\":\"30\",\"details\":\"Seekh burger was born when east fell in love with the west. Especial spicy seekh kebab wrapped in smoked bread served with coriander sauce can fill your evening with more colours in Rajshahi. \"},{\"name\":\"chhanar polao\",\"price\":\"220\",\"details\":\"famous dish of rajshahi\"}]', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14538.231146303!2d88.8367165!3d24.3618922!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xec7d9a92ddfc1103!2sPuthia%20Rajbari!5e0!3m2!1sen!2sbd!4v1601656722160!5m2!1sen!2sbd', 'Barishal', '[\"6\"]', '[\"4\"]', '[\"13\"]', '{\"spots\":[\"padma garden\",\"Bagha mosque\"],\"journey\":{\"spot_baghamosque_spot_padmagarden\":{\"distance\":\"47km\",\"vehicle\":[\"bus\"],\"fare\":[\"300\"],\"time\":[\"1hr 20 min\"]}}}');

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
(2, 'Asad', 'asad@gmail.com', '202cb962ac59075b964b07152d234b70', '2018-10-20 23:45:12', '2018-10-20 07:45:12', 'admin'),
(4, 'Rebeka Mou', 'rebekamou.info100@gmail.com', 'ab93045192aad0729880f332858cd79e', '2020-10-02 06:00:29', '2020-10-02 06:00:29', 'admin'),
(5, 'Mithila Akter', 'mithilamithi03@gmail.com', '24cf6b88f3ebbe637bd60f0bf442f354', '2020-10-02 06:30:04', '2020-10-02 06:30:04', 'admin'),
(6, 'user', 'user@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-10-02 08:15:40', '2020-10-02 08:15:40', 'subscriber');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `travel_place`
--
ALTER TABLE `travel_place`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
