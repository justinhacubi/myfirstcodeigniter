-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 09:56 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(999) NOT NULL,
  `p_price` double(10,2) NOT NULL,
  `p_type` varchar(9999) NOT NULL,
  `p_img` varchar(999) NOT NULL,
  `p_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_price`, `p_type`, `p_img`, `p_status`) VALUES
(1, 'Adobo Chicken', 70.00, 'Meals', 'adobo.jpg', 2),
(2, 'Chicken Burger', 60.00, 'Burgers', 'chicken_burger.jpg', 1),
(3, 'Buko Shake', 40.00, 'Drinks', 'bukoshake.jpg', 1),
(4, 'Kare kare', 75.00, 'Meals', 'karekare.jpg', 1),
(5, 'Menudo', 45.00, 'Meals', 'menudo.jpg', 1),
(6, 'Sweet and Sour Fish', 99.00, 'Meals', 'Sweet_and_Sour_Fish.jpg', 1),
(7, 'Bulalo', 150.00, 'Meals', 'bulalo.jpg', 1),
(8, 'Sinigang Na Baboy', 120.00, 'Meals', 'sinigangnababoy.jpg', 1),
(9, 'Sizzling Pork Sisig ', 70.00, 'Meals', 'sisig.jpg', 1),
(10, 'Chicken Inasal', 99.00, 'Meals', 'Chicken_Inasal.jpg', 1),
(11, 'Crispy Bagnet', 130.00, 'Meals', 'Bagnet.jpg', 1),
(12, 'T Bone Steak', 250.00, 'Meals', 'steak.jpg', 1),
(13, 'Cheese Burger', 80.00, 'Burgers', 'cheeseburger.jpg', 1),
(14, 'Double Patty Burger', 150.00, 'Burgers', 'Double_Patty.jpg', 1),
(15, 'Fudge Ice Cream', 40.00, 'Dessert', 'fudge_ice_cream.jpg', 1),
(16, 'Bacon Burger', 99.00, 'Burgers', 'bacon_burger.jpg', 1),
(17, 'Leche Flan', 30.00, 'Dessert', 'leche_flan.jpg', 1),
(18, 'Buko Pandan', 40.50, 'Dessert', 'buko_pandan.jpg', 1),
(19, 'Salad', 60.00, 'Dessert', 'salad.jpg', 1),
(20, 'Grape Juice', 45.00, 'Drinks', 'grapejuice.jpg', 1),
(21, 'Cucu juice', 35.00, 'Drinks', 'cujuice.jpg', 1),
(22, 'Pine Juice', 70.00, 'Drinks', 'pinejuice.jpg', 1),
(23, 'Sinanglaw', 80.00, 'Meals', 'sinanglaw.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `s_id` int(11) NOT NULL,
  `s_pid` int(11) NOT NULL,
  `s_qty` int(11) NOT NULL,
  `refno` int(11) NOT NULL,
  `s_date` varchar(999) NOT NULL,
  `s_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`s_id`, `s_pid`, `s_qty`, `refno`, `s_date`, `s_uid`) VALUES
(1, 2, 1, 1, '2018-08-14', 2),
(2, 15, 1, 1, '2018-08-14', 2),
(3, 3, 1, 1, '2018-08-14', 2),
(4, 1, 1, 2, '2018-08-14', 2),
(5, 3, 1, 2, '2018-08-14', 2),
(6, 12, 1, 3, '2018-08-14', 3),
(7, 3, 1, 3, '2018-08-14', 3),
(8, 15, 1, 3, '2018-08-14', 3),
(9, 7, 1, 4, '2018-08-15', 3),
(10, 2, 3, 4, '2018-08-15', 3),
(11, 15, 4, 4, '2018-08-15', 3),
(12, 3, 1, 4, '2018-08-15', 3),
(13, 23, 2, 5, '2018-08-14', 2),
(14, 2, 1, 5, '2018-08-14', 2),
(15, 17, 2, 5, '2018-08-14', 2),
(16, 3, 1, 5, '2018-08-14', 2),
(17, 22, 1, 5, '2018-08-14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(999) NOT NULL,
  `u_usern` varchar(999) NOT NULL,
  `u_pass` varchar(999) NOT NULL,
  `u_type` varchar(9999) NOT NULL,
  `u_img` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_usern`, `u_pass`, `u_type`, `u_img`) VALUES
(1, 'Justin Rollo', 'admin', '12345', 'a', ''),
(2, 'Roland Aviles', 'user', '12345', 'e', ''),
(3, 'fred', 'fred', '12345', 'e', 'default.png'),
(4, 'Carl', 'Carl', '123', 'e', 'coupletshirt.jpg'),
(5, 'Nikkie', 'nik', '123', 'e', 'diamond.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
