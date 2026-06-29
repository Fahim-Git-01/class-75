-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Oct 03, 2024 at 06:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', '', '2021-04-07 08:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(1, 1, 'Paneer Saag', 'Cottage cheese cooked with fresh ground spinach, onion, garlic and indian herbs.', '390.00', '606d72f3cb12f.jpg'),
(2, 1, 'Chicken Achari', 'Dahi, achar, tomatoes, mustard oil, fennel seeds', '250.00', '606d73302ece2.jpg'),
(3, 1, 'Murgh Tikka Biryani', 'Chicken Tikka Biryani Recipe is the famous Indian delicacy of Punjabi Cuisine. Boneless Chicken is marinated in spicy mix of Yogurt and Spices.', '470.00', '606d73771366a.jpg'),
(4, 1, 'Murgh Zafrani Kabab', 'Murgh Zafrani Kabab. A plateful of succulent pieces of meat, straight out of tandoor, is tough to resist.', '380.00', '606d73d2d37f4.jpg'),
(5, 2, 'Pink Spaghetti Gamberoni', 'Spaghetti pasta, grilled shrimps, parmesan cheese, with our homemade pink sauce,', '380.00', '606d7491a9d13.jpg'),
(6, 2, 'Cheesy Mashed Potato', 'Covered with mozzarella cheese.', '250.00', '606d74c416da5.jpg'),
(7, 2, 'Crispy Chicken Strips', 'Fried chicken strips, served with special honey mustard sauce.', '460.00', '606d74f6ecbbb.jpg'),
(8, 2, 'Lemon Grilled Chicken And Pasta', 'Marinated rosemary grilled chicken breast served with mashed potatoes and your choice of pasta.', '380.00', '606d752a209c3.jpg'),
(9, 3, 'Vegetable Fried Rice', 'Chinese rice wok with cabbage, beans, carrots, and spring onions.', '350.00', '606d7575798fb.jpg'),
(10, 3, 'Prawn Crackers', '12 pieces deep-fried prawn crackers', '120.00', '606d75a7e21ec.jpg'),
(11, 3, 'Spring Rolls', 'Lightly seasoned shredded cabbage, onion and carrots, wrapped in house made spring roll wrappers, deep fried to golden brown.', '470.00', '606d75ce105d0.jpg'),
(12, 3, 'Manchurian Chicken', 'Chicken pieces slow cooked with spring onions in our house made manchurian style sauce.', '500.00', '606d7600dc54c.jpg'),
(13, 4, ' Buffalo Wings', 'Fried chicken wings tossed in spicy Buffalo sauce served with crisp celery sticks and Blue cheese dip.', '450.00', '606d765f69a19.jpg'),
(14, 4, 'Mac N Cheese Bites', 'Served with our traditional spicy queso and marinara sauce.', '350.00', '606d768a1b2a1.jpg'),
(15, 4, 'Signature Potato Twisters', 'Spiral sliced potatoes, topped with our traditional spicy queso, Monterey Jack cheese, pico de gallo, sour cream and fresh cilantro.', '320.00', '606d76ad0c0cb.jpg'),
(16, 4, 'Meatballs Penne Pasta', 'Garlic-herb beef meatballs tossed in our house-made marinara sauce and penne pasta topped with fresh parsley.', '470.00', '606d76eedbb99.jpg'),
(17, 1, 'joys food', 'yammi', '250.00', '66ee426854ad2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(1, 1, 'Gazebo', 'gazebo@gmail.com', '4312533432', 'www.gazebo.com', '12pm', '12am', 'Mon-Sat', 'Borivali', '606d71a81ec5d.jpg', '2021-04-07 09:18:19'),
(2, 2, 'Eataly', 'eataly@gmail.com', '0557426406', 'www.eataly.com', '11am', '9pm', 'Mon-Sat', 'Goregaon', '606d720b5fc71.jpg', '2021-04-07 08:49:15'),
(3, 3, 'Mainland China', 'mainland@china.com', '4326538776', 'www.mainlandchina.com', '8am', '9pm', 'Mon-Fri', 'Malad', '606d72653306f.jpg', '2021-04-07 08:50:45'),
(4, 4, 'TGI Fridays', 'tgi@gmail.com', '2342353325', 'www.tgif.com', '9am', '9pm', 'Mon-Sat', 'Lower Parel', '606d72a49503a.jpg', '2021-04-07 08:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Indian', '2021-04-07 08:45:20'),
(2, 'Italian', '2021-04-07 08:45:23'),
(3, 'Chinese', '2021-04-07 08:45:25'),
(4, 'American', '2021-04-07 08:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'SAL', 'Salman', 'Ansari', 'salman@gmail.com', '1324325445', 'a32de55ffd7a9c4101a0c5c8788b38ed', 'Mira Road', 1, '2021-04-07 08:43:49'),
(2, 'PAR', 'Parth', 'Desai', 'parth@gmail.com', '4325345332', 'bc28715006af20d0e961afd053a984d9', 'Vasai', 1, '2021-04-07 08:44:35'),
(3, 'HIT', 'Hitesh', 'Gosavi', 'hitesh@gmail.com', '4325345332', '58b2318af54435138065ee13dd8bea16', 'Malad', 1, '2021-04-07 08:44:53'),
(4, 'TAN', 'Abdullah Al', 'Hossain', 'tanimh37@gmail.com', '+88 0911205779', '0192023a7bbd73250516f069df18b500', 'Dhokhingoan,Basabo,Sobujbag,Dhaka-1214', 1, '2024-09-21 03:22:38'),
(10, 'Md Abdullah Al Hossain', 'Md Abdullah', 'Al Hossain', 'tanimha39@gmsil.com', '+8802911205779', '12f3315cf1ba3c9164ecceea3bbf3a86', 'Chadpur the hillsha', 1, '2024-09-21 06:45:43'),
(11, 'tanim', 'Md ', 'sohel', 'doctor@gmail.com', '+8802911205778', '0192023a7bbd73250516f069df18b500', 'rtuyht', 1, '2024-09-21 07:11:46'),
(12, 'abdullah22', 'abdullah', 'saleh', 'abdullah22@gmail.com', '01738000000', 'c32766d77fd26b5dee8c0c25c8f7cb0b', 'Mozumdar road.', 1, '2024-09-22 03:32:01'),
(13, 'admin6@gmail.com', 'ewt', 'ewtest', 'admin6@gmail.com', '+8802911205778', 'c6b853d6a7cc7ec49172937f68f446c8', 'rtutyurj', 1, '2024-09-23 04:02:36'),
(14, 'tanimh33', 'Tanim', 'Hasan', 'tanimh33@gmail.com', '+88 01911205779', 'ead1b4684e442614384d1cf66107f382', 'Dhaka', 1, '2024-09-23 05:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(1, 8, 'Paneer Saag', 1, '390.00', NULL, '2024-09-21 05:01:27'),
(2, 8, 'Meatballs Penne Pasta', 1, '470.00', NULL, '2024-09-21 05:01:27'),
(3, 8, ' Buffalo Wings', 1, '450.00', NULL, '2024-09-21 05:01:27'),
(4, 8, 'Signature Potato Twisters', 1, '320.00', NULL, '2024-09-21 05:01:27'),
(5, 8, 'Paneer Saag', 1, '390.00', NULL, '2024-09-21 06:00:29'),
(6, 8, 'Murgh Zafrani Kabab', 1, '380.00', NULL, '2024-09-21 06:00:29'),
(7, 8, 'Signature Potato Twisters', 1, '320.00', NULL, '2024-09-21 06:08:28'),
(17, 14, 'Vegetable Fried Rice', 1, '350.00', NULL, '2024-09-23 05:38:56'),
(20, 12, 'Chicken Achari', 2, '250.00', NULL, '2024-10-01 04:07:06'),
(21, 12, 'Murgh Zafrani Kabab', 1, '380.00', NULL, '2024-10-01 04:07:06'),
(22, 12, 'Murgh Tikka Biryani', 1, '470.00', NULL, '2024-10-01 04:07:06'),
(23, 12, 'joys food', 1, '250.00', NULL, '2024-10-01 04:07:06'),
(24, 12, 'Spring Rolls', 1, '470.00', NULL, '2024-10-02 03:27:30'),
(25, 12, 'Manchurian Chicken', 1, '500.00', NULL, '2024-10-02 03:27:31'),
(26, 12, 'Prawn Crackers', 1, '120.00', NULL, '2024-10-02 04:03:08'),
(27, 12, 'Manchurian Chicken', 1, '500.00', NULL, '2024-10-02 04:03:08'),
(28, 12, 'Vegetable Fried Rice', 1, '350.00', NULL, '2024-10-02 05:58:37'),
(29, 12, 'Prawn Crackers', 1, '120.00', NULL, '2024-10-02 05:58:37'),
(30, 12, 'Pink Spaghetti Gamberoni', 1, '380.00', NULL, '2024-10-02 06:00:35'),
(31, 12, 'Cheesy Mashed Potato', 1, '250.00', NULL, '2024-10-02 06:00:35'),
(33, 12, 'Paneer Saag', 1, '390.00', NULL, '2024-10-02 06:08:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
