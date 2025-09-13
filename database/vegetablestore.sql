-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 03:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegetablestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `CategoryName` varchar(30) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Hidden` varchar(30) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `Description`, `Hidden`) VALUES
(1, 'Shirt', 'Áo', 'no'),
(2, 'Shoes', 'Giày', 'no'),
(3, 'Pants', 'Quần', 'no'),
(4, 'Hat', 'Nón', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Fullname` varchar(40) NOT NULL,
  `Address` text NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Status` varchar(30) NOT NULL DEFAULT 'Active',
  `Avatar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Username`, `Password`, `Email`, `Fullname`, `Address`, `Phone`, `Status`, `Avatar`) VALUES
(1, 'smith', '1', 'smith@gmail.com', 'John Smith', 'TPHCM', '0123456789', 'Active', ''),
(2, 'test1', '1', 'test1@gmail.com', 'Test 1', 'TPHCM', '0123456789', 'Active', ''),
(3, 'test2', '1', 'test2@gmail.com', 'Test 2', 'TPHCM', '0123456789', 'Lock', '');

-- --------------------------------------------------------

--
-- Table structure for table `goodsreceipt`
--

CREATE TABLE `goodsreceipt` (
  `GoodsReceiptID` int(10) NOT NULL,
  `StaffID` int(10) NOT NULL,
  `SupplierID` int(10) NOT NULL,
  `GoodsReceiptDate` date NOT NULL,
  `Total` double NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goodsreceipt`
--

INSERT INTO `goodsreceipt` (`GoodsReceiptID`, `StaffID`, `SupplierID`, `GoodsReceiptDate`, `Total`, `Note`) VALUES
(1, 1, 1, '2024-04-16', 6500000, 'High quality goods !\r\n'),
(2, 1, 4, '2024-04-16', 13000000, '');

-- --------------------------------------------------------

--
-- Table structure for table `goodsreceiptdetails`
--

CREATE TABLE `goodsreceiptdetails` (
  `GoodsReceiptID` int(11) NOT NULL,
  `VegetableID` int(10) NOT NULL,
  `Unit` varchar(30) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goodsreceiptdetails`
--

INSERT INTO `goodsreceiptdetails` (`GoodsReceiptID`, `VegetableID`, `Unit`, `Quantity`, `Price`, `Subtotal`) VALUES
(1, 1, 'piece', 200000, 1000000, 200000000),
(1, 2, 'piece', 300000, 1500000, 450000000),
(2, 4, 'piece', 400000, 2000000, 800000000),
(2, 3, 'piece', 200000, 2500000, 500000000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `OrderDate` varchar(50) NOT NULL,
  `ShipDate` date DEFAULT NULL,
  `ShipPlace` text NOT NULL,
  `Payments` varchar(50) NOT NULL,
  `Total` double NOT NULL,
  `Note` text NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Unprocessed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `CustomerID`, `OrderDate`, `ShipDate`, `ShipPlace`, `Payments`, `Total`, `Note`, `Status`) VALUES
(1, 2, '2024-4-10 13:47:47', '2024-04-20', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 900000, 'Fastest possible delivery !', 'Shipped'),
(2, 2, '2024-4-10 14:20:35', '2024-04-20', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 700000, 'Please pack carefully !', 'Shipped'),
(3, 2, '2024-4-10 14:24:04', '2024-04-20', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 900000, '', 'Confirmed'),
(4, 3, '2024-4-10 14:25:28', '2024-04-20', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 850000, '', 'Unprocessed'),
(5, 3, '2024-4-10 14:29:03', '2024-04-20', '273 An Dương Vương, Quận 5, TP.HCM', 'Credit Card/Debit Card', 110000, 'So sorry! i just want to try the feature', 'Cancelled'),
(6, 2, '2024-4-10 21:04:18', '2024-04-20', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 1100000, '', 'Unprocessed'),
(7, 2, '2024-4-14 08:28:06', '2024-04-20', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 650000, '', 'Cancelled'),
(8, 2, '2024-4-14 09:05:31', '2024-04-21', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 400000, '', 'Cancelled'),
(9, 2, '2024-4-14 09:32:03', '2024-04-21', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 600000, '', 'Cancelled'),
(10, 2, '2024-4-14 09:33:21', '2024-04-21', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 300000, '', 'Shipped'),
(11, 2, '2024-4-14 09:34:45', '2024-04-21', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 200000, '', 'Unprocessed'),
(12, 2, '2024-4-14 09:34:58', '2024-04-21', '273 An Dương Vương, Quận 5, TP.HCM', 'Cash', 200000, '', 'Unprocessed');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `VegetableID` int(10) NOT NULL,
  `Quantity` tinyint(4) NOT NULL,
  `Unit` varchar(30) NOT NULL,
  `Price` float NOT NULL,
  `Subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderID`, `VegetableID`, `Quantity`, `Unit`, `Price`, `Subtotal`) VALUES
(1, 7, 3, 'piece', 200000, 600000),
(1, 6, 3, 'piece', 100000, 300000),
(2, 1, 1, 'piece', 200000, 200000),
(2, 2, 2, 'piece', 250000, 500000),
(3, 3, 2, 'piece', 350000, 700000),
(3, 5, 1, 'piece', 200000, 200000),
(4, 3, 1, 'piece', 350000, 350000),
(4, 5, 1, 'piece', 200000, 200000),
(4, 6, 3, 'piece', 100000, 300000),
(5, 7, 1, 'piece', 200000, 200000),
(5, 4, 3, 'piece', 300000, 900000),
(6, 7, 5, 'piece', 200000, 1000000),
(6, 6, 1, 'piece', 100000, 100000),
(7, 1, 2, 'piece', 200000, 400000),
(7, 2, 1, 'piece', 250000, 250000),
(8, 1, 2, 'piece', 200000, 400000),
(9, 7, 1, 'piece', 200000, 200000),
(9, 1, 2, 'piece', 200000, 400000),
(10, 7, 1, 'piece', 200000, 200000),
(10, 6, 1, 'piece', 100000, 100000),
(11, 1, 1, 'piece', 200000, 200000),
(12, 1, 1, 'piece', 200000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `StaffName` varchar(50) NOT NULL,
  `Avatar` varchar(50) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Status` varchar(30) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Username`, `Password`, `StaffName`, `Avatar`, `Email`, `Phone`, `Address`, `Role`, `Status`) VALUES
(1, 'iceman', '1', 'Người Đá', '', 'iceman@gmail.com', '0123456789', 'TPHCM', 'Admin', 'Active'),
(2, 'tuanhao', '1', 'Tuấn Hào', '', 'tuanhao@gmail.com', '0123456789', 'TPHCM', 'Member', 'Active'),
(3, 'tranhieu', '1', 'Trần Hiếu', '', 'tranhieu@gmail.com', '0123456789', 'TPHCM', 'Member', 'Lock'),
(4, 'hoangkhanh', '1', 'Hoàng Khánh', '', 'hoangkhanh@gmail.com', '0123456789', 'TPHCM', 'Member', 'Lock'),
(5, 'vanvinh', '1', 'Văn Vinh', '', 'vanvinh@gmail.com', '0123456789', 'TPHCM', 'Member', 'Lock');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `SupplierName`, `Email`, `Phone`, `Address`) VALUES
(1, 'Xưởng Quần', 'quan@gmail.com', '0123456789', 'Thủ Đức'),
(2, 'Xưởng Nón', 'non@gmail.com', '123123', 'Hà Nội'),
(3, 'Xưởng Giày', 'giay@gmail.com', '123123123', 'Nhà Bè'),
(4, 'Xưởng Áo', 'ao@gmail.com', '0123812938', 'Nha Trang');

-- --------------------------------------------------------

--
-- Table structure for table `vegetable`
--

CREATE TABLE `vegetable` (
  `VegetableID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `VegetableName` varchar(30) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Discount` float NOT NULL DEFAULT 0,
  `Status` varchar(30) NOT NULL DEFAULT 'Stocking',
  `Hidden` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vegetable`
--

INSERT INTO `vegetable` (`VegetableID`, `CategoryID`, `VegetableName`, `Unit`, `Amount`, `Image`, `Price`, `Discount`, `Status`, `Hidden`) VALUES
(1, 3, 'Pants 0', 'piece', 11, 'images/1.jpg', 200000, 0, 'Stocking', 'no'),
(2, 3, 'Pants 3', 'piece', 75, 'images/2.jpg', 250000, 0, 'Stocking', 'no'),
(3, 3, 'Pants 2', 'piece', 70, 'images/3.jpg', 350000, 0, 'Stocking', 'no'),
(4, 3, 'Pants 1', 'piece', 73, 'images/4.jpg', 300000, 0, 'Stocking', 'no'),
(5, 1, 'Shirt 4', 'piece', 71, 'images/5.jpg', 200000, 0, 'Stocking', 'no'),
(6, 1, 'Shirt 3', 'piece', 58, 'images/6.jpg', 100000, 0, 'Stocking', 'no'),
(7, 1, 'Shirt 2', 'piece', 21, 'images/7.jpg', 200000, 0, 'Stocking', 'no'),
(8, 1, 'Shirt 1', 'piece', 77, 'images/8.jpg', 100000, 0, 'Stocking', 'no'),
(9, 2, 'Shoes 4', 'piece', 78, 'images/9.jpg', 100000, 0, 'Stocking', 'no'),
(10, 2, 'Shoes 3', 'piece', 71, 'images/10.jpg', 200000, 0, 'Stocking', 'no'),
(11, 2, 'Shoes 2', 'piece', 58, 'images/11.jpg', 100000, 0, 'Stocking', 'no'),
(12, 2, 'Shoes 1', 'piece', 21, 'images/12.jpg', 200000, 0, 'Stocking', 'no'),
(13, 4, 'Hat 4', 'piece', 77, 'images/13.jpg', 100000, 0, 'Stocking', 'no'),
(14, 4, 'Hat 3', 'piece', 78, 'images/15.jpg', 100000, 0, 'Stocking', 'no'),
(15, 4, 'Hat 2', 'piece', 21, 'images/15.jpg', 200000, 0, 'Stocking', 'no'),
(16, 4, 'Hat 1', 'piece', 77, 'images/16.jpg', 100000, 0, 'Stocking', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `goodsreceipt`
--
ALTER TABLE `goodsreceipt`
  ADD PRIMARY KEY (`GoodsReceiptID`),
  ADD KEY `StaffID` (`StaffID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `goodsreceiptdetails`
--
ALTER TABLE `goodsreceiptdetails`
  ADD KEY `receiptdetail_ibfk_1` (`GoodsReceiptID`),
  ADD KEY `VegetableID` (`VegetableID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `VegetableID` (`VegetableID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `vegetable`
--
ALTER TABLE `vegetable`
  ADD PRIMARY KEY (`VegetableID`),
  ADD KEY `CatagoryID` (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `goodsreceipt`
--
ALTER TABLE `goodsreceipt`
  MODIFY `GoodsReceiptID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vegetable`
--
ALTER TABLE `vegetable`
  MODIFY `VegetableID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `goodsreceipt`
--
ALTER TABLE `goodsreceipt`
  ADD CONSTRAINT `goodsreceipt_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`),
  ADD CONSTRAINT `goodsreceipt_ibfk_2` FOREIGN KEY (`SupplierID`) REFERENCES `supplier` (`SupplierID`);

--
-- Constraints for table `goodsreceiptdetails`
--
ALTER TABLE `goodsreceiptdetails`
  ADD CONSTRAINT `goodsreceiptdetails_ibfk_1` FOREIGN KEY (`GoodsReceiptID`) REFERENCES `goodsreceipt` (`GoodsReceiptID`),
  ADD CONSTRAINT `goodsreceiptdetails_ibfk_2` FOREIGN KEY (`VegetableID`) REFERENCES `vegetable` (`VegetableID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`VegetableID`) REFERENCES `vegetable` (`VegetableID`);

--
-- Constraints for table `vegetable`
--
ALTER TABLE `vegetable`
  ADD CONSTRAINT `vegetable_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
