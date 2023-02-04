-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 07:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight_booking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines_list`
--

CREATE TABLE `airlines_list` (
  `id` int(30) NOT NULL,
  `airlines` text NOT NULL,
  `logo_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airlines_list`
--

INSERT INTO `airlines_list` (`id`, `airlines`, `logo_path`) VALUES
(1, 'شركه بدر للطيران', '1671203400_1600999200_Philippine-Airlines-Logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `airport_list`
--

CREATE TABLE `airport_list` (
  `id` int(30) NOT NULL,
  `airport` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airport_list`
--

INSERT INTO `airport_list` (`id`, `airport`, `location`) VALUES
(7, 'دبي', 'الامارات'),
(8, 'الرياض', 'السعوديه');

-- --------------------------------------------------------

--
-- Table structure for table `booked_flight`
--

CREATE TABLE `booked_flight` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(13) NOT NULL,
  `desination_city` text NOT NULL,
  `departure_time` text NOT NULL,
  `return_time` text DEFAULT NULL,
  `type` text NOT NULL,
  `weight` varchar(10) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_flight`
--

INSERT INTO `booked_flight` (`id`, `name`, `phone`, `desination_city`, `departure_time`, `return_time`, `type`, `weight`, `u_id`) VALUES
(20, 'ahmed', '12345', 'الرياض', '2023-01-14', '', 'ذهاب', '22', 11);

-- --------------------------------------------------------

--
-- Table structure for table `charge`
--

CREATE TABLE `charge` (
  `id` int(11) NOT NULL,
  `number` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `things` text NOT NULL,
  `place` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `charge`
--

INSERT INTO `charge` (`id`, `number`, `weight`, `things`, `place`, `type`, `name`, `phone`, `u_id`) VALUES
(4, '2', '120', 'ddmmcxmcxmc', 'sudan', 'أمتعه شخصيه', 'ahmed', '12346', 11);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `comname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`id`, `type`, `comname`, `address`, `name`, `phone`, `u_id`) VALUES
(3, 'تأمين طريق', 'وكاله الأسكله للسفر والسياحه', 'sudan', 'ahmed', '12345', 11);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `phone`, `address`, `email`, `password`) VALUES
(11, 'ahmed', '1234567', 'port sudan', 'ahmed@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'وكاله الأسكله للسفر والسياحه', 'alaskila@gmail.com', '+249963842381', '1600998360_travel-cover.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;text-align: left; color: rgb(32, 33, 34); font-family: Arial; font-size: 16px;&quot;&gt;هي جهة تساعد الناس على تنظيم الرحلات&amp;nbsp;&lt;/span&gt;&lt;a href=&quot;https://ar.wikipedia.org/wiki/%D8%B9%D8%B7%D9%84%D8%A9&quot; title=&quot;عطلة&quot; style=&quot;background: none rgb(255, 255, 255); text-align: left; text-decoration-line: none; color: rgb(6, 69, 173); font-family: Arial; font-size: 16px;&quot;&gt;والعطل&lt;/a&gt;&lt;span style=&quot;text-align: left; color: rgb(32, 33, 34); font-family: Arial; font-size: 16px;&quot;&gt;&amp;nbsp;عن طريق عمل تدابير استعدادهم&amp;nbsp;&lt;/span&gt;&lt;a href=&quot;https://ar.wikipedia.org/wiki/%D8%B3%D9%81%D8%B1&quot; title=&quot;سفر&quot; style=&quot;background: none rgb(255, 255, 255); text-align: left; text-decoration-line: none; color: rgb(6, 69, 173); font-family: Arial; font-size: 16px;&quot;&gt;للسفر&lt;/a&gt;&amp;nbsp;&lt;span style=&quot;text-align: left; color: rgb(32, 33, 34); font-family: Arial; font-size: 16px;&quot;&gt;فهي تحجز لهم غرفا في&amp;nbsp;&lt;/span&gt;&lt;a href=&quot;https://ar.wikipedia.org/wiki/%D9%81%D9%86%D8%AF%D9%82&quot; title=&quot;فندق&quot; style=&quot;background: none rgb(255, 255, 255); text-align: left; text-decoration-line: none; color: rgb(6, 69, 173); font-family: Arial; font-size: 16px;&quot;&gt;الفنادق&lt;/a&gt;&lt;span style=&quot;text-align: left; color: rgb(32, 33, 34); font-family: Arial; font-size: 16px;&quot;&gt;، ومقاعد في وسائل النقل، كما تنظم لهم رحلات سياحية. وتعين لهم مرشدين يساعدونهم في الحصول على&amp;nbsp;&lt;/span&gt;&lt;a href=&quot;https://ar.wikipedia.org/wiki/%D8%AC%D9%88%D8%A7%D8%B2_%D8%B3%D9%81%D8%B1&quot; title=&quot;جواز سفر&quot; style=&quot;background: none rgb(255, 255, 255); text-align: left; text-decoration-line: none; color: rgb(6, 69, 173); font-family: Arial; font-size: 16px;&quot;&gt;جوازات السفر&lt;/a&gt;&lt;span style=&quot;text-align: left; color: rgb(32, 33, 34); font-family: Arial; font-size: 16px;&quot;&gt;&amp;nbsp;والتأشيرات التي يحتاج إليها المسافرون إلى البلاد الأخرى، وتنظم الرحلات السياحية للأفراد والجماعات.&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `doctor_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = doctor,3=patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `doctor_id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, 0, 'Administrator', '', '', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines_list`
--
ALTER TABLE `airlines_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport_list`
--
ALTER TABLE `airport_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_flight`
--
ALTER TABLE `booked_flight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `charge`
--
ALTER TABLE `charge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `airlines_list`
--
ALTER TABLE `airlines_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airport_list`
--
ALTER TABLE `airport_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booked_flight`
--
ALTER TABLE `booked_flight`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `charge`
--
ALTER TABLE `charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_flight`
--
ALTER TABLE `booked_flight`
  ADD CONSTRAINT `booked_flight_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `login` (`id`);

--
-- Constraints for table `charge`
--
ALTER TABLE `charge`
  ADD CONSTRAINT `charge_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `login` (`id`);

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `insurance_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
