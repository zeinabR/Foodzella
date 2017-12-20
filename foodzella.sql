-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 10:16 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodzella`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PhoneNo` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ID`, `Name`, `PhoneNo`, `Email`, `Password`) VALUES
(1, 'Dodoo', 1149980567, 'dalia.mohamed@yahoo.co.uk', '1234567890'),
(2, 'Zeinab', 123456897, 'scsccerw@scaewd.com', '4234353123'),
(3, 'Sara Ahmed', 2135649959, 'dfvmkijwe@dcvnier.com', '2435346574'),
(4, 'Mary', 223534765, 'dscl;kl@dfwfc.com', '432547589');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `PhoneNo` int(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Street` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Name`, `PhoneNo`, `Email`, `Password`, `City`, `Street`) VALUES
(22, 'dalia', 1149980277, 'dalia.mohamed426@yahoo.com', '12345678', 'Giza', 'haram'),
(23, 'Daliaaaaaaaaaaaaaaaa', 1123456789, 'dsfsdvf@sdcfsae', '325465857g', 'cairo', 'haram'),
(24, 'Mary Nader', 1283468586, 'marynader@yahoo.com', '123456789', 'cairo', 'elmaasara'),
(25, 'Zeinab Rabie', 215555686, 'zeze@yahoo.com', '54646794', 'Giza', 'eldokki'),
(26, 'Daliaaaaaaaaaaaaaaaa', 2147483647, 'dalai.mohamed426@yahoo.co.uk', 'sxdqwsqdasdx', 'Giza', 'haram'),
(27, 'Zeinab Rabie', 12345678, 'Nadaamohammed28@yahoo.com', 'vfghdcjj,j', 'Giza', 'haram'),
(28, 'Daliaaaaaaaaaaaaaaaa', 1149980277, 'zaza@yahoo.com', '4576678090-', 'Giza', 'haram'),
(29, 'Zeinab ', 2147483647, 'asdcscas@csddc.com', 'zdfcxc de', 'Giza', 'haram'),
(30, 'Dalia', 2147483647, 'dodi_mohamed97@hotmail.com', 'cdawcqwdsasw', 'Giza', 'haram'),
(31, 'DalIA', 2147483647, 'ewofkmcds@yahoo.com', 'SCAWEFCSZV', 'Giza', 'haram'),
(32, 'Dalia', 2147483647, 'sdadew@scs.com', 'qwdscsderr', 'Giza', 'eldokki'),
(33, 'Dalia', 2147483647, 'daaaaa@ya.com', 'scdsfhejkfc ', 'Giza', 'HARAM'),
(34, 'Dalia', 546423157, 'nada@y.com', 'scqwscasx', 'Giza', 'eldokki'),
(35, 'Zeinab Rabie', 2147483647, 'zeee@y.com', 'sacwecas', 'Giza', 'sdcdsc s'),
(36, 'Mary Nader', 2147483647, 'fvsdv@y.com', 'sdvsew fewedf', 'cairo', 'eldokki'),
(37, 'Nada', 2147483647, 'Nadaamohammed28@ya.com', 'hb hkscvk', 'Giza', 'haram'),
(38, 'ahmed', 2147483647, 'ah@cs.com', 'sacxedwfwe', 'Giza', 'haram'),
(39, 'Dalia', 2147483647, 'dajiefr@sc.com', 'csdcfwefc', 'Giza', 'haram'),
(40, 'Zeinab ', 2147483647, 'zezeee@x.com', 'scdaec sc', 'Giza', 'elmaasara'),
(41, 'Daliaaaa', 2147483647, 'dali.mohamed426@yahoo.co.uk', 'scewcfasc', 'cairo', 'haram'),
(42, 'fady', 346573902, 'fady@d.com', 'csdcewfddvs', 'cairo', 'haram'),
(43, 'Ramzy', 2147483647, 'ramzy@s.com', 'wscdwefcef', 'Giza', 'eldokki'),
(44, 'Sara Ahmed', 1141788998, 'sara.a.cufe@gmail.com', '5465465416', 'giza', 'Faisel');

-- --------------------------------------------------------

--
-- Table structure for table `foodtips`
--

CREATE TABLE `foodtips` (
  `Admin_ID` int(11) NOT NULL,
  `Tip_ID` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodtips`
--

INSERT INTO `foodtips` (`Admin_ID`, `Tip_ID`, `Text`, `Date`) VALUES
(3, 1, 'Don\'t drink Sugar Calories', '2017-12-21'),
(1, 2, 'Don\'t fear coffe', '2017-12-23'),
(4, 3, 'Eat fatty fish', '2017-12-24'),
(2, 4, 'Eat Nuts :)', '2017-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Rest_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_ID`, `Name`, `Price`, `Rest_ID`) VALUES
(18, 'caramel', 20, 4),
(19, 'Vanilla', 50, 4),
(20, 'chunky', 40, 4),
(24, 'fries', 17, 24),
(25, 'shawerma', 25, 24),
(26, 'mix chicken', 40, 24),
(27, 'fatta', 50, 24),
(28, 'Star Donut', 15, 4),
(29, 'Smiley Donut', 15, 4),
(30, 'Chocolate Donut', 20, 4),
(31, 'Brownies', 20, 4),
(32, 'White Donut', 15, 4),
(33, 'Biscuit', 150, 6),
(34, 'Betifore', 130, 6),
(35, 'IceCream', 12, 6),
(36, 'CheeseCake', 140, 6),
(37, 'Chocolate Cake', 200, 6),
(38, 'White Cake', 190, 6),
(39, 'Coconut Biscuit', 120, 6),
(45, 'pizza', 30, 26),
(46, 'sandwicth', 80, 26),
(47, 'soup', 75, 26),
(52, 'mix chicken', 200, 13),
(53, 'Pizza Syami', 100, 13),
(54, 'Mashroom Pizza', 150, 13),
(55, 'dcwe', 43, 30),
(57, 'Cofee', 12, 32),
(58, 'hot chocolate', 20, 32),
(59, 'Cheese pizza', 150, 13),
(60, 'Pasta', 50, 13),
(70, 'Rizo Meal', 21, 29),
(71, 'chicken fillet', 33, 29),
(72, 'Rizo Meal', 21, 29),
(73, 'chicken Zinger', 33, 29),
(75, 'toasted twister', 21, 29),
(77, 'Mix 2Meal', 36, 15),
(78, 'cheddar cheese fries', 18, 15),
(79, 'strawberry Milkshake', 16, 15),
(80, 'apple pie', 12, 15),
(82, 'beefBurger sandwich', 11, 15),
(83, 'cheeseBurger sandwich', 14, 15),
(84, 'capuccino', 26, 32),
(85, 'Americano', 24, 32),
(86, 'caramel latte', 30, 32),
(87, 'cafelatte', 27, 32),
(88, 'cheese croissant', 19, 32),
(89, 'mix chicken', 250, 14),
(90, 'Pizza Syami', 105, 14),
(91, 'Mashroom Pizza', 153, 14),
(92, 'Cheese pizza', 160, 14),
(93, 'Pasta', 60, 14),
(94, 'Strawberry cheese cake', 150, 5),
(95, 'chocolate cheese cake', 200, 5),
(96, 'Caramel cheese cake', 200, 5),
(97, 'Redvilved cheese cake', 190, 5),
(98, 'BlueBerry cheese cake', 200, 5),
(99, 'Shawerma sandwich', 30, 11),
(100, 'Fatta', 60, 11),
(101, 'Shawerma sandwich', 30, 11),
(102, 'Fatta', 60, 11);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PhoneNo` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`ID`, `Name`, `PhoneNo`, `Email`, `Password`, `City`, `Street`) VALUES
(8, 'Zeinab', 2147483647, 'ewofkmcds@yahoo.com', 'mknjkhjfgtdcfx', 'Giza', 'haram'),
(9, 'Dalia', 1053460312, 'dalia@gmail.com', '12345678', 'giza', 'maadi'),
(10, 'Mary Nader', 215479682, 'mary@gmail.com', '45623e31568', 'cairo', 'haram'),
(11, 'Sara ', 1149923435, 'dalia@as.com', '12345678', 'Giza', 'haram'),
(12, 'Ahmed', 235436578, 'ahmed@yahoo.com', 'secdergzasdc', 'cairo', 'faisl'),
(13, 'Hady', 324358754, 'hady@yahoo.com', 'csddce343', 'giza', 'maadi'),
(14, 'Mohamed', 112549348, 'mohamed@gmail.com', '3443rdfc', 'cairo', 'faisl'),
(15, 'Kareem', 15879374, 'kareem@gmail.com', 'efeiy472', 'giza', 'dokki'),
(16, 'Rania', 12487387, 'ranya@gmail.com', '232xdsc', 'cairo', 'haram'),
(17, 'Nada', 23890342, 'Nada@gmail.com', '324sdcx', 'Giza', 'haram'),
(18, 'Omar', 11245837, 'Omar@yahoo.com', '34545sdc', 'giza', 'Dokki'),
(19, 'Hanin', 114682579, 'hanin@gmail.com', '324sxdq', 'Giza', 'Dokki'),
(20, 'Yassmin', 15483798, 'yassmin@yahoo.com', 'xsdq21', 'cairo', '15 Mayo'),
(25, 'sdcsefwe', 344355463, 'xdfdfzf@ujk', 'xcfzdfzs', 'Giza', 'HARAM'),
(26, 'nader', 976475375, 'nader@n.com', '123456789', 'cairo', 'eldokki'),
(27, 'Zeinab Rabie', 1123456789, 'zeze@m.com', '123456789', 'Giza', 'haram'),
(28, 'Zeinab Rabie', 1123456789, 'dxzdrea@y.com', 'ascwqfweac', 'Giza', 'haram'),
(30, 'Mary Nader', 12358978, 'marynader@gmail.com', '123456789', 'Helwan', 'el4arkawy'),
(32, 'Dalia', 2147483647, 'sdcwe@csd.com', 'csdfewcewa', 'Giza', 'haram'),
(33, 'e;rlrmkv', 32534626, 'sdcds@cder.com', 'dcwefwecdf', 'Giza', 'haram'),
(36, 'Nada', 1149980277, 'csddsf@scs.com', 'dcsewdfcsf', 'Giza', 'haram');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Message_ID` int(11) NOT NULL,
  `Text` text,
  `Order_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_ID`, `Text`, `Order_ID`) VALUES
(2, 'Nada requests an order of Chicken', 29);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_ID` int(11) NOT NULL,
  `Rest_ID` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_ID`, `Rest_ID`, `Cust_ID`, `Type`) VALUES
(18, 4, 36, 'Table Reservation'),
(19, 4, 36, 'Delivery'),
(20, 4, 36, 'Delivery'),
(21, 4, 36, 'Delivery'),
(22, 4, 36, 'Delivery'),
(23, 4, 36, 'Delivery'),
(24, 4, 36, 'Delivery'),
(25, 4, 36, 'Table Reservation'),
(26, 4, 36, 'Table Reservation'),
(27, 4, 36, 'Table Reservation'),
(28, 4, 36, 'Table Reservation'),
(29, 11, 36, 'Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `Item_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`Item_ID`, `Order_ID`, `Amount`) VALUES
(18, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `Name` varchar(50) NOT NULL,
  `Recipe_ID` int(11) NOT NULL,
  `Admin_ID` int(11) NOT NULL,
  `Image` blob NOT NULL,
  `No_of_Views` int(11) DEFAULT '0',
  `Category` varchar(50) NOT NULL,
  `Cook` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Category` varchar(50) NOT NULL DEFAULT '',
  `Name` varchar(50) NOT NULL,
  `Rest_ID` int(11) NOT NULL,
  `Contact_No` int(11) NOT NULL,
  `RCity` varchar(20) NOT NULL,
  `RStreet` varchar(50) NOT NULL,
  `No_of_Items` int(11) NOT NULL,
  `Mgr_ID` int(11) NOT NULL,
  `WorkHr` varchar(20) NOT NULL DEFAULT '12',
  `Services` varchar(50) NOT NULL,
  `No_available_Tables` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Category`, `Name`, `Rest_ID`, `Contact_No`, `RCity`, `RStreet`, `No_of_Items`, `Mgr_ID`, `WorkHr`, `Services`, `No_available_Tables`) VALUES
('Dessert', 'DunkinDonutes', 4, 2147483647, 'cairo', 'dokki', 5, 8, '24', 'Both', 3),
('Dessert', 'Cheese Factory', 5, 234546457, 'cairo', 'Mohndseen', 5, 10, '15', 'Both', 5),
('Dessert', 'El Aabd', 6, 234345457, 'cairo', 'Dokki', 12, 11, '24', 'Delivery', 0),
('Dessert', 'Waffilcious', 7, 893274645, 'cairo', 'Dokki', 5, 12, '12', 'Both', 4),
('Dessert', 'Lapoir', 8, 234365768, 'cairo', 'haram', 12, 9, '12', 'Delivery', 0),
('Eastern Food', 'Sobhy kaber', 11, 13845633, 'Nasr', 'shobra', 5, 13, '40', 'Both', 30),
('Eastern Food', 'Om Hassan', 12, 23465722, 'Cairo', 'Mohandseen', 20, 14, '24', 'Both', 20),
('Pizza', 'Pizza Hut', 13, 97634573, 'Giza', 'Haram', 10, 15, '12', 'Both', 5),
('Pizza', 'Papa Johns', 14, 23487543, 'cairo', 'Mohandseen', 13, 16, '12', 'Both', 6),
('Fast Food', 'Macdonald', 15, 786344134, 'cairo , Alex', 'Mohndseen', 15, 17, '24', 'Both', 20),
('Fast Food', 'Willy\'s Kitchen', 16, 63429023, 'Cairo', 'Dokki', 20, 18, '12', 'Both', 10),
('Syrian', 'Abo Ammar', 17, 249706345, 'Giza', 'Mohandseen', 20, 19, '12', 'Both', 8),
('Syrian', 'Abo Yossef', 20, 2147483647, 'cairo', 'dokki', 2, 25, '12', 'Both', 5),
('Dessert', 'Lapoir', 22, 2147483647, 'cairo', 'haram', 3, 27, '12', 'Delivery', 0),
('Syrian', 'Abo Ammar', 24, 2147483647, 'cssc', 'dokki', 3, 28, '12', 'Both', 5),
('Eastern Food', 'Al Haseera', 26, 14587956, 'cairo', 'elmaady', 3, 30, '8', 'Both', 7),
('Fast Food', 'KFC', 29, 2147483647, 'cairo', 'dokki', 2, 32, '12', 'Table ', 2),
('Fast Food', 'Hardees', 30, 2147483647, 'cairo', 'dokki', 2, 33, '12', 'Both', 4),
('Cafe', 'Costa', 32, 435346453, 'cairo', 'Mohandseen', 2, 36, '12', 'Both', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email & Pass` (`Email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Pass & Email` (`Email`);

--
-- Indexes for table `foodtips`
--
ALTER TABLE `foodtips`
  ADD PRIMARY KEY (`Tip_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_ID`),
  ADD KEY `Rest_ID` (`Rest_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Message_ID`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Cust_ID` (`Cust_ID`),
  ADD KEY `order_fk_Rest` (`Rest_ID`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`Item_ID`,`Order_ID`),
  ADD UNIQUE KEY `order` (`Order_ID`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`Recipe_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Rest_ID`),
  ADD KEY `Mgr_ID` (`Mgr_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `foodtips`
--
ALTER TABLE `foodtips`
  MODIFY `Tip_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Message_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `Recipe_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Rest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodtips`
--
ALTER TABLE `foodtips`
  ADD CONSTRAINT `foodtip_fk_Admin` FOREIGN KEY (`Admin_ID`) REFERENCES `administrator` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_item_Rest` FOREIGN KEY (`Rest_ID`) REFERENCES `restaurant` (`Rest_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_mesg_order` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_fk_Cust` FOREIGN KEY (`Cust_ID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_fk_Rest` FOREIGN KEY (`Rest_ID`) REFERENCES `restaurant` (`Rest_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD CONSTRAINT `FK_Order` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_item` FOREIGN KEY (`Item_ID`) REFERENCES `item` (`Item_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `Rest_fk_admin` FOREIGN KEY (`Admin_ID`) REFERENCES `administrator` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `Rest_fk_mgr` FOREIGN KEY (`Mgr_ID`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
