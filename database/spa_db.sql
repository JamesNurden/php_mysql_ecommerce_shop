-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 10:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
('4unG3Yb3bxaC3pwXXSrS', 'aiyman adeed', 'aiyman@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Mz1rxZBOuHkb5h4RjoaJ.jpg'),
('sKu0Xf5fgSzezClXmqQy', 'anam', 'anam@gmail.com', 'f7065414948b7a471604f1501faddeaef69b30d4', 'YydLlQR5hdqYCY1uhgX5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `price` int(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'in process',
  `payment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `name`, `number`, `email`, `service_id`, `employee_id`, `date`, `time`, `price`, `status`, `payment_status`) VALUES
('JmL9NQcZsM335jJJymWk', '2mQsO873m6KYTKNCXupd', 'john doe', 889900778, 'johndoe@gmail.com', 'kckGNfPq3VUxw2da1SYv', 'LSLSe6rZUGSHzf2iTxnc', '2024-06-13', '12:00 AM - 1:00 AM', 400, 'canceled', 'credit card'),
('V7jd0bj6cxfFnOS2VpBq', '2mQsO873m6KYTKNCXupd', 'john doe', 88990088, 'johndoe@gmail.com', 'kckGNfPq3VUxw2da1SYv', 'Hc2ONpIYF7lkhhbjC8dy', '2024-06-22', '5:00 PM - 6:00 PM', 400, 'in process', 'credit card'),
('tbr2nse2oSmbN03KGKT5', '2mQsO873m6KYTKNCXupd', 'john doe', 2147483647, 'johndoe@gmail.com', 'gFKBAaUqsMTjvY3QmVg4', 'AYFTvgKCMUnEtsUsWQYH', '2024-06-26', '1:30 PM - 2:30 PM', 200, 'in process', 'credit card');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` int(10) NOT NULL,
  `profile_desc` text NOT NULL,
  `profile` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `profession`, `email`, `number`, `profile_desc`, `profile`, `status`) VALUES
('LSLSe6rZUGSHzf2iTxnc', 'sara smith', 'massage specialist', 'sarasmith@gmail.com', 2147483647, 'As co-founder of the first all-woman physician plastic surgery practice in Atlanta, Dr. Diane Z. Alexander is a nationally recognized leader in cosmetic surgery, non-invasive facial rejuvenation and anti-aging. As much an artist as a surgeon, she sees Artisan Beauté as the natural fulfillment of her journey for the women she serves.As co-founder of the first all-woman physician plastic surgery practice in Atlanta, Dr. Diane Z. Alexander is a nationally recognized leader in cosmetic surgery, non-invasive facial rejuvenation and anti-aging. As much an artist as a surgeon, she sees Artisan Beauté as the natural fulfillment of her journey for the women she serves.', 'employee0.jpg', 'active'),
('Hc2ONpIYF7lkhhbjC8dy', 'neil parker', 'barber', 'neilparke@gmail.com', 2147483647, 'As co-founder of the first all-woman physician plastic surgery practice in Atlanta, Dr. Diane Z. Alexander is a nationally recognized leader in cosmetic surgery, non-invasive facial rejuvenation and anti-aging. As much an artist as a surgeon, she sees Artisan Beauté as the natural fulfillment of her journey for the women she serves.As co-founder of the first all-woman physician plastic surgery practice in Atlanta, Dr. Diane Z. Alexander is a nationally recognized leader in cosmetic surgery, non-invasive facial rejuvenation and anti-aging. As much an artist as a surgeon, she sees Artisan Beauté as the natural fulfillment of her journey for the women she serves.As co-founder of the first all-woman physician plastic surgery practice in Atlanta, Dr. Diane Z. Alexander is a nationally recognized leader in cosmetic surgery, non-invasive facial rejuvenation and anti-aging. As much an artist as a surgeon, she sees Artisan Beauté as the natural fulfillment of her journey for the women she serves.', 'IIQzVcQFXHkBmskSzwuP.webp', 'active'),
('z8jAV4gcxpComoYyr5sZ', 'sana ansari', 'master&#39;s of cosmetology', 'sanaansari@gmail.com', 2147483647, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lf9MbNNJUNk6hJ1h4L80.jpg', 'active'),
('AYFTvgKCMUnEtsUsWQYH', 'sara smith', 'massage specialist', 'sarasmith@gmail.com', 99008899, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'ldPMFOEiJ2JnyoyvXlJP.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `subject`, `message`) VALUES
('ltacpt3P8Nb3taXzLwVg', '2mQsO873m6KYTKNCXupd', 'john', 'johndoe@gmail.com', 'how book an appontment', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'),
('IxSjlAYzWCdGFVuAKzsz', '2mQsO873m6KYTKNCXupd', 'john', 'johndoe@gmail.com', 'how book an appointment', 'how book an appointment');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `service_detail` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `image`, `service_detail`, `category`, `status`) VALUES
('gFKBAaUqsMTjvY3QmVg4', 'aroma therapy', 200, 'service.avif', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'massages', 'active'),
('kckGNfPq3VUxw2da1SYv', 'Foot relexation', 400, 'service-img-02.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'body treatment', 'active'),
('qyT67nnRsvByK1FTvaB8', 'couple massage', 600, 'Spa Programs for Couple.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'for couple', 'active'),
('jVuROJSplJd4EzuOEYjP', 'de-stress massage', 500, 'service-img-05.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'massages', 'active'),
('DPLNSX5QeGfDFYIZENzq', 'deep tissue massage', 400, 'Deep Tissue Massage.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'body treatment', 'active'),
('gaIJ9dvcBPXS73kbqsTw', 'facial massage', 89, 'hOw0zANu60r9CCtCDdaX.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'massages', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
('PtLUoRc1sSusvAR3oZW6', 'shalu', 'shalu@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '9KLGLt6qO8P8ZdKgmeks.jpg'),
('U19IY50Q1hMlT2law9s2', 'john', 'john@gmail.com', 'a51dda7c7ff50b61eaea0444371f4a6a9301e501', '0T2Oz7E85Sn491mMddNB.jpg'),
('G0xqQK2i3tfAyW6bl4YD', 'raj', 'raj786@gmail.com', '3055effa054a24f84cf42cea946db4cdf445cb76', 'QzMuQrnoYJm9YHyZz1HS.jpg'),
('2mQsO873m6KYTKNCXupd', 'mahi', 'mahinazir@gmail.com', '2630efc1492144f699ad471546ef20a2bd159aa6', 'OkxLjp2jReezg22zMPUu.webp');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
