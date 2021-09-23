-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 11:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vkqube`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE `cart_products` (
  `cartId` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL,
  `cartquantity` int(10) NOT NULL,
  `cartcolor` varchar(255) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`cartId`, `productID`, `cartquantity`, `cartcolor`) VALUES
('CRT001', 'PRD005', 1, 'black'),
('CRT001', 'PRD005', 4, 'red'),
('CRT001', 'PRD016', 1, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `cart_user`
--

CREATE TABLE `cart_user` (
  `cartId` varchar(20) NOT NULL,
  `userID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_user`
--

INSERT INTO `cart_user` (`cartId`, `userID`) VALUES
('CRT002', 'CMR006'),
('CRT001', 'SOW002');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderId` varchar(20) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `customerID` varchar(20) NOT NULL,
  `paymentId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--



-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `orderId` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL,
  `ordquantity` int(10) NOT NULL,
  `ordcolor` varchar(255) NOT NULL DEFAULT 'None',
  `ordstatus` varchar(30) NOT NULL DEFAULT 'Processing',
  `customerview` varchar(30) NOT NULL DEFAULT 'Show'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--



-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `paymentId` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--



-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `categoryid` varchar(20) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`categoryid`, `categoryName`) VALUES
('CAT002', 'Electronics'),
('CAT007', 'grocery'),
('CAT005', 'Home Products'),
('CAT006', 'kids fashion'),
('CAT004', 'Men\'s Fashion'),
('CAT001', 'Mobile Phone'),
('CAT003', 'Women\'s Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `productid` varchar(20) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`productid`, `color`) VALUES
('PRD001', 'blue'),
('PRD001', 'gold'),
('PRD001', 'red'),
('PRD001', 'white'),
('PRD002', 'black'),
('PRD002', 'white'),
('PRD003', 'black'),
('PRD003', 'rgb'),
('PRD004', 'black'),
('PRD004', 'white'),
('PRD005', 'black'),
('PRD005', 'gold'),
('PRD005', 'red'),
('PRD005', 'white'),
('PRD006', 'blue'),
('PRD006', 'grey'),
('PRD007', 'blue'),
('PRD007', 'red'),
('PRD008', 'blue'),
('PRD008', 'pink'),
('PRD008', 'red'),
('PRD009', 'black'),
('PRD009', 'blue'),
('PRD010', 'silver'),
('PRD010', 'white'),
('PRD011', 'black'),
('PRD011', 'white'),
('PRD012', 'black'),
('PRD012', 'red'),
('PRD012', 'silver'),
('PRD013', 'black'),
('PRD013', 'blue'),
('PRD013', 'red'),
('PRD013', 'white'),
('PRD014', 'black'),
('PRD014', 'blue'),
('PRD014', 'white'),
('PRD015', 'black'),
('PRD015', 'white'),
('PRD016', 'black'),
('PRD016', 'silver'),
('PRD017', 'black'),
('PRD017', 'blue'),
('PRD017', 'red'),
('PRD018', 'black'),
('PRD018', 'blue'),
('PRD018', 'red'),
('PRD019', 'blue'),
('PRD019', 'red'),
('PRD019', 'white'),
('PRD020', 'ash'),
('PRD020', 'black'),
('PRD020', 'blue'),
('PRD020', 'Red'),
('PRD021', 'black'),
('PRD021', 'blue'),
('PRD021', 'red'),
('PRD021', 'yellow'),
('PRD022', 'black'),
('PRD023', 'black'),
('PRD023', 'red'),
('PRD023', 'white'),
('PRD024', 'Black'),
('PRD024', 'DarkBlack'),
('PRD024', 'red'),
('PRD025', 'black'),
('PRD025', 'green'),
('PRD025', 'red'),
('PRD026', 'black'),
('PRD026', 'green'),
('PRD026', 'red'),
('PRD027', 'ash'),
('PRD027', 'black'),
('PRD027', 'blue'),
('PRD027', 'green'),
('PRD027', 'red'),
('PRD028', 'blue'),
('PRD029', 'blue'),
('PRD029', 'green'),
('PRD030', 'blue'),
('PRD030', 'green'),
('PRD031', 'black'),
('PRD031', 'blue'),
('PRD031', 'red'),
('PRD032', 'black'),
('PRD032', 'blue'),
('PRD032', 'green'),
('PRD032', 'red'),
('PRD032', 'white'),
('PRD033', 'black'),
('PRD033', 'silever'),
('PRD034', 'blue'),
('PRD034', 'red'),
('PRD035', 'black'),
('PRD035', 'blue'),
('PRD036', 'blue'),
('PRD036', 'red'),
('PRD038', 'white'),
('PRD038', 'yellow'),
('PRD039', 'black'),
('PRD039', 'dark'),
('PRD039', 'white'),
('PRD040', 'blue'),
('PRD040', 'vlack'),
('PRD040', 'white'),
('PRD040', 'yellow'),
('PRD041', 'black'),
('PRD041', 'dark'),
('PRD041', 'white'),
('PRD042', 'black'),
('PRD042', 'white'),
('PRD043', 'blue'),
('PRD043', 'Dark Blue'),
('PRD044', 'black'),
('PRD044', 'dark'),
('PRD044', 'white'),
('PRD045', 'ash'),
('PRD045', 'black'),
('PRD045', 'blue'),
('PRD046', 'black'),
('PRD046', 'white'),
('PRD047', 'black'),
('PRD047', 'white'),
('PRD048', 'black'),
('PRD048', 'white'),
('PRD049', 'black'),
('PRD049', 'red'),
('PRD069', 'black'),
('PRD069', 'dark'),
('PRD069', 'white'),
('PRD070', 'black'),
('PRD070', 'blue'),
('PRD070', 'white'),
('PRD071', 'black'),
('PRD071', 'white'),
('PRD072', 'black'),
('PRD072', 'blue'),
('PRD072', 'white'),
('PRD073', 'blue'),
('PRD073', 'pink'),
('PRD073', 'white'),
('PRD074', 'pink'),
('PRD074', 'white'),
('PRD075', 'black'),
('PRD075', 'blue'),
('PRD076', 'black'),
('PRD076', 'blue'),
('PRD077', 'blue'),
('PRD077', 'pink'),
('PRD078', 'blaxk'),
('PRD078', 'orange'),
('PRD078', 'white'),
('PRD079', 'blue'),
('PRD079', 'pink'),
('PRD079', 'white');
-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `productid` varchar(20) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` decimal(20,2) NOT NULL,
  `productQty` int(11) NOT NULL,
  `productCat` varchar(20) NOT NULL,
  `productDescription` varchar(1000) NOT NULL,
  `productImage1Loc` varchar(255) DEFAULT '../images/Products/noimage.jpg',
  `productImage2Loc` varchar(255) DEFAULT '../images/Products/noimage.jpg',
  `productImage3Loc` varchar(255) DEFAULT '../images/Products/noimage.jpg',
  `productImage4Loc` varchar(255) DEFAULT '../images/Products/noimage.jpg',
  `availability` varchar(20) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`productid`, `productName`, `productPrice`, `productQty`, `productCat`, `productDescription`, `productImage1Loc`, `productImage2Loc`, `productImage3Loc`, `productImage4Loc`, `availability`) VALUES
('PRD001', 'Note20 Ultra', '260000.00', 25, 'CAT001', 'Released 2020, August 21 \r\n208g, 8.1mm thickness\r\nAndroid 10, One UI 2.5\r\n128GB/256GB/512GB storage, microSDXC', '../images/Products/PRD001/img1.jpg', '../images/Products/PRD001/img2.jpg', '../images/Products/PRD001/img3.jpg', '../images/Products/PRD001/img4.jpg', 'Available'),
('PRD002', 'Galaxy S7 Edge', '55000.00', 50, 'CAT001', 'Released 2020, August 21 \r\n208g, 8.1mm thickness\r\nAndroid 10, One UI 2.5\r\n128GB/256GB/512GB storage, microSDXC', '../images/Products/PRD002/img1.jpg', '../images/Products/PRD002/img2.jpg', '../images/Products/PRD002/img3.jpg', '../images/Products/PRD002/img4.jpg', 'Available'),
('PRD003', 'Keyboard', '1200.00', 15, 'CAT002', 'Released 2020, August 21\r\n208g, 8.1mm thickness \r\nAndroid 10, One UI 2.5 128GB/256GB/512GB storage, microSDXC', '../images/Products/PRD003/img1.jpg', '../images/Products/PRD003/img2.jpg', '../images/Products/PRD003/img3.jpg', '../images/Products/PRD003/img4.jpg', 'Available'),
('PRD004', 'Screen protector', '700.00', 45, 'CAT001', 'Released 2020, August 21\r\n208g, 8.1mm thickness\r\nAndroid 10, One UI 2.5\r\n128GB/256GB/512GB storage,\r\nmicroSDXC', '../images/Products/PRD004/img1.jpg', '../images/Products/PRD004/img2.jpg', '../images/Products/PRD004/img3.jpg', '../images/Products/PRD004/img4.jpg', 'Available'),
('PRD005', 'iPhone XS Max', '250000.00', 56, 'CAT001', 'Released 2020, August 21\r\n208g, 8.1mm thickness\r\nAndroid 10, One UI 2.5\r\n128GB/256GB/512GB storage,\r\nmicroSDXC', '../images/Products/PRD005/img1.jpg', '../images/Products/PRD005/img2.jpg', '../images/Products/PRD005/img3.jpg', '../images/Products/PRD005/img4.jpg', 'Available'),
('PRD006', 'Mouse', '1500.00', 15, 'CAT002', 'Released 2020, August 21\r\n208g, 8.1mm thickness\r\nAndroid 10, One UI 2.5\r\n128GB/256GB/512GB storage,\r\nmicroSDXC', '../images/Products/PRD006/img1.jpg', '../images/Products/PRD006/img2.jpg', '../images/Products/PRD006/img3.jpg', '../images/Products/PRD006/img4.jpg', 'Available'),
('PRD007', 'LG Wing 5G', '92138.00', 20, 'CAT001', 'Released 2020, August 21\r\n208g, 8.1mm thickness\r\nAndroid 10, One UI 2.5\r\n128GB/256GB/512GB storage,\r\nmicroSDXC', '../images/Products/PRD007/img1.jpg', '../images/Products/PRD007/img2.jpg', '../images/Products/PRD007/img3.jpg', '../images/Products/PRD007/img4.jpg', 'Available'),
('PRD008', 'Galaxy S20', '125000.00', 42, 'CAT001', 'Released 2020, August 21\r\n208g, 8.1mm thickness\r\nAndroid 10, One UI 2.5\r\n128GB/256GB/512GB storage,\r\nmicroSDXC', '../images/Products/PRD008/img1.jpg', '../images/Products/PRD008/img2.jpg', '../images/Products/PRD008/img3.jpg', '../images/Products/PRD008/img4.jpg', 'Available'),
('PRD009', 'Samsung phone', '80000.00', 21, 'CAT001', '208g, 8.1mm thickness\r\nAndroid 10, One UI 2.5\r\n128GB/256GB/512GB storage,\r\nmicroSDXC', '../images/Products/PRD009/img1.jpg', '../images/Products/PRD009/img2.jpg', '../images/Products/PRD009/img3.jpg', '../images/Products/PRD009/img4.jpg', 'Available'),
('PRD010', 'Samsung 253 L 1 Star Frost Free Double Door Refrigerator', '50000.00', 5, 'CAT002', 'Samsung 253 L 1 Star Frost Free Double Door Refrigerator.Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD010/img1.jpg', '../images/Products/PRD010/img2.jpg', '../images/Products/PRD010/img3.jpg', '../images/Products/PRD010/img4.jpg', 'Available'),
('PRD011', 'Lenovo ThinkPad', '200000.00', 15, 'CAT002', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD011/img1.jpg', '../images/Products/PRD011/img2.jpg', '../images/Products/PRD011/img3.jpg', '../images/Products/PRD011/img4.jpg', 'Available'),
('PRD012', ' HP Envy x360 Convertible Touchscreen ', '100000.00', 40, 'CAT002', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD012/img1.jpg', '../images/Products/PRD012/img2.jpg', '../images/Products/PRD012/img3.jpg', '../images/Products/PRD012/img4.jpg', 'Available'),
('PRD013', 'washing machine', '30000.00', 10, 'CAT002', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD013/img1.jpg', '../images/Products/PRD013/img2.jpg', '../images/Products/PRD013/img3.jpg', '../images/Products/PRD013/img4.jpg', 'Available'),
('PRD014', 'Hair Dryer', '10000.00', 3, 'CAT002', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD014/img1.jpg', '../images/Products/PRD014/img2.jpg', '../images/Products/PRD014/img3.jpg', '../images/Products/PRD014/img4.jpg', 'Available'),
('PRD015', 'mixer', '5000.00', 50, 'CAT002', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD015/img1.jpg', '../images/Products/PRD015/img2.jpg', '../images/Products/PRD015/img3.jpg', '../images/Products/PRD015/img4.jpg', 'Available'),
('PRD016', 'Rice cookers', '5000.00', 25, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD016/img1.jpg', '../images/Products/PRD016/img2.jpg', '../images/Products/PRD016/img3.jpg', '../images/Products/PRD016/img4.jpg', 'Available'),
('PRD017', 'men tshirt', '1200.00', 5, 'CAT004', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD017/img1.jpg', '../images/Products/PRD017/img2.jpg', '../images/Products/PRD017/img3.jpg', '../images/Products/PRD017/img4.jpg', 'Available'),
('PRD018', 'Cotton Casual Classic fit Full Sleeves Shirt for Men', '1000.00', 5, 'CAT004', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD018/img1.jpg', '../images/Products/PRD018/img2.jpg', '../images/Products/PRD018/img3.jpg', '../images/Products/PRD018/img4.jpg', 'Available'),
('PRD019', 'Regular Fit Multi Color TShirt', '1000.00', 30, 'CAT004', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD019/img1.jpg', '../images/Products/PRD019/img2.jpg', '../images/Products/PRD019/img3.jpg', '../images/Products/PRD019/img4.jpg', 'Available'),
('PRD020', 'Boys Jackets', '1500.00', 30, 'CAT004', 'Please bear in mind that the photo may be slightly different from the actual item in terms of color due to lighting conditions or the display used to view', '../images/Products/PRD020/img1.jpg', '../images/Products/PRD020/img2.jpg', '../images/Products/PRD020/img3.jpg', '../images/Products/PRD020/img4.jpg', 'Available'),
('PRD021', 'Skater Maxi Dress blue green', '1200.00', 6, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD021/img1.jpg', '../images/Products/PRD021/img2.jpg', '../images/Products/PRD021/img3.jpg', '../images/Products/PRD021/img4.jpg', 'Available'),
('PRD022', 'Rayon Shirtdress Casual Dress', '2000.00', 5, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD022/img1.jpg', '../images/Products/PRD022/img2.jpg', '../images/Products/PRD022/img3.jpg', '../images/Products/PRD022/img4.jpg', 'Available'),
('PRD023', 'Cotton Regular Kurta', '2000.00', 5, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD023/img1.jpg', '../images/Products/PRD023/img2.jpg', '../images/Products/PRD023/img3.jpg', '../images/Products/PRD023/img4.jpg', 'Available'),
('PRD024', 'full Frock ladies', '1500.00', 50, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of color due to lighting conditions or the display used to view', '../images/Products/PRD024/img1.jpg', '../images/Products/PRD024/img2.jpg', '../images/Products/PRD024/img3.jpg', '../images/Products/PRD024/img4.jpg', 'Available'),
('PRD025', 'Polka Dot Shirt  Sleeve Dress', '500.00', 2, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD025/img1.jpg', '../images/Products/PRD025/img2.jpg', '../images/Products/PRD025/img3.jpg', '../images/Products/PRD025/img4.jpg', 'Available'),
('PRD026', 'top and jeans black and white', '1500.00', 22, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD026/img1.jpg', '../images/Products/noimage.jpg', '../images/Products/noimage.jpg', '../images/Products/noimage.jpg', 'Available'),
('PRD027', 'Men Jackets', '500.00', 50, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD027/img1.jpg', '../images/Products/PRD027/img2.jpg', '../images/Products/PRD027/img3.jpg', '../images/Products/PRD027/img4.jpg', 'Available'),
('PRD028', 'Navy Blue Dress', '500.00', 55, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD028/img1.jpg', '../images/Products/PRD028/img2.jpg', '../images/Products/PRD028/img3.jpg', '../images/Products/PRD028/img4.jpg', 'Available'),
('PRD029', 'Womens Green Printed Fit and Flare Border Woven Dress', '500.00', 5, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD029/img1.jpg', '../images/Products/PRD029/img2.jpg', '../images/Products/PRD029/img3.jpg', '../images/Products/PRD029/img4.jpg', 'Available'),
('PRD030', 'KLOOK Women Maxi Dress ', '1200.00', 25, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD030/img1.jpg', '../images/Products/PRD030/img2.jpg', '../images/Products/PRD030/img3.jpg', '../images/Products/PRD030/img4.jpg', 'Available'),
('PRD031', 'Red Womens Maxi Dress', '1000.00', 5, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD031/img1.jpg', '../images/Products/PRD031/img2.jpg', '../images/Products/PRD031/img3.jpg', '../images/Products/PRD031/img4.jpg', 'Available'),
('PRD032', 'Womens Cotton  Crepe Anarkali Kurta', '1200.00', 5, 'CAT003', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD032/img1.jpg', '../images/Products/PRD032/img2.jpg', '../images/Products/PRD032/img3.jpg', '../images/Products/PRD032/img4.jpg', 'Available'),
('PRD033', 'Stainless Steel Mixing Bowls', '5000.00', 5, 'CAT005', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD033/img1.jpg', '../images/Products/PRD033/img2.jpg', '../images/Products/PRD033/img3.jpg', '../images/Products/PRD033/img4.jpg', 'Available'),
('PRD034', 'Garage Storage Systems Broom Organizer', '4500.00', 2, 'CAT005', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD034/img1.jpg', '../images/Products/PRD034/img2.jpg', '../images/Products/PRD034/img3.jpg', '../images/Products/PRD034/img4.jpg', 'Available'),
('PRD035', 'BedStory Twin XL Mattress', '2000.00', 50, 'CAT005', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD035/img1.jpg', '../images/Products/PRD035/img2.jpg', '../images/Products/PRD035/img3.jpg', '../images/Products/PRD035/img4.jpg', 'Available'),
('PRD036', 'Set of 4 Dining Chairs 2 Tulip Office Chair', '15000.00', 5, 'CAT005', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD036/img1.jpg', '../images/Products/PRD036/img2.jpg', '../images/Products/PRD036/img3.jpg', '../images/Products/PRD036/img4.jpg', 'Available'),
('PRD037', 'Mattress Foundation', '5000.00', 40, 'CAT005', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD037/img1.jpg', '../images/Products/PRD037/img2.jpg', '../images/Products/PRD037/img3.jpg', '../images/Products/PRD037/img4.jpg', 'Available'),
('PRD038', 'Deep Pocket Cotton Blend Sheet Set', '20000.00', 35, 'CAT005', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD038/img1.jpg', '../images/Products/PRD038/img2.jpg', '../images/Products/PRD038/img3.jpg', '../images/Products/PRD038/img4.jpg', 'Available'),
('PRD039', 'Capacity Black Resin Folding Chair with Black Vinyl Padded Seat', '5000.00', 60, 'CAT005', ' Introduce sophistication with exquisite nailhead trim and tufted detail. Regent is the perfect choice for hosting elegant dinners.', '../images/Products/PRD039/img1.jpg', '../images/Products/PRD039/img2.jpg', '../images/Products/PRD039/img3.jpg', '../images/Products/PRD039/img4.jpg', 'Available'),
('PRD040', 'Dining Side Chair', '7000.00', 7, 'CAT005', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD040/img1.jpg', '../images/Products/PRD040/img2.jpg', '../images/Products/PRD040/img3.jpg', '../images/Products/PRD040/img4.jpg', 'Available'),
('PRD041', ' Computer Desk Home ', '5000.00', 70, 'CAT005', 'Assembly Small Computer Desk Home Office Desk Foldable Table ', '../images/Products/PRD041/img1.jpg', '../images/Products/PRD041/img2.jpg', '../images/Products/PRD041/img3.jpg', '../images/Products/PRD041/img4.jpg', 'Available'),
('PRD042', 'Furniture Tower Unit for Bedroom', '5000.00', 55, 'CAT005', 'Furniture Storage Tower Unit for Bedroom', '../images/Products/PRD042/img1.jpg', '../images/Products/PRD042/img2.jpg', '../images/Products/PRD042/img3.jpg', '../images/Products/PRD042/img4.jpg', 'Available'),
('PRD043', 'Conversation Sofa Set Tea Table', '50000.00', 25, 'CAT005', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD043/img1.jpg', '../images/Products/PRD043/img2.jpg', '../images/Products/PRD043/img3.jpg', '../images/Products/PRD043/img4.jpg', 'Available'),
('PRD044', 'Socket Cap Bolt and Barrel Nut', '2000.00', 50, 'CAT005', 'Socket Cap Bolt and Barrel Nut,Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD044/img1.jpg', '../images/Products/PRD044/img2.jpg', '../images/Products/PRD044/img3.jpg', '../images/Products/PRD044/img4.jpg', 'Available'),
('PRD045', 'ULTCOVER Waterproof Patio Lounge Chair Cover', '5000.00', 55, 'CAT005', 'ULTCOVER Waterproof Patio Lounge Chair Cover,Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD045/img1.jpg', '../images/Products/PRD045/img2.jpg', '../images/Products/PRD045/img3.jpg', '../images/Products/PRD045/img4.jpg', 'Available'),
('PRD046', 'one easy chair', '2000.00', 56, 'CAT005', 'Resin Wicker Loveseat with Outdoor Cushions', '../images/Products/PRD046/img1.jpg', '../images/Products/PRD046/img2.jpg', '../images/Products/PRD046/img3.jpg', '../images/Products/PRD046/img4.jpg', 'Available'),
('PRD047', 'Sectional Furniture Sets sofa', '2500.00', 42, 'CAT005', 'Sectional Furniture Sets sofa', '../images/Products/PRD047/img1.jpg', '../images/Products/PRD047/img2.jpg', '../images/Products/PRD047/img3.jpg', '../images/Products/PRD047/img4.jpg', 'Available'),
('PRD048', 'Outdoor Furniture and Hot Tub Side Table', '5000.00', 56, 'CAT005', 'Outdoor Patio Furniture and Hot Tub Side Table', '../images/Products/PRD048/img1.jpg', '../images/Products/PRD048/img2.jpg', '../images/Products/PRD048/img3.jpg', '../images/Products/PRD048/img4.jpg', 'Available'),
('PRD049', 'Natureland Organics Soybean ', '200.00', 5, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD049/img1.jpg', '../images/Products/PRD049/img2.jpg', '../images/Products/PRD049/img3.jpg', '../images/Products/PRD049/img4.jpg', 'Available'),
('PRD050', 'Oreo Chocolate Flavoured Biscuits', '150.00', 10, 'CAT007', 'Oreo Chocolate Flavoured Biscuits,Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD050/img1.jpg', '../images/Products/PRD050/img2.jpg', '../images/Products/PRD050/img3.jpg', '../images/Products/PRD050/img4.jpg', 'Available'),
('PRD051', 'Urban Platter Vegan', '50.00', 5, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD051/img1.jpg', '../images/Products/PRD051/img2.jpg', '../images/Products/PRD051/img3.jpg', '../images/Products/PRD051/img4.jpg', 'Available'),
('PRD052', 'lays', '50.00', 50, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD052/img1.jpg', '../images/Products/PRD052/img2.jpg', '../images/Products/PRD052/img3.jpg', '../images/Products/PRD052/img4.jpg', 'Available'),
('PRD053', 'Tata Salt Lite', '50.00', 12, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view.', '../images/Products/PRD053/img1.jpg', '../images/Products/PRD053/img2.jpg', '../images/Products/PRD053/img3.jpg', '../images/Products/PRD053/img4.jpg', 'Available'),
('PRD054', ' Amazon Brand Vedaka SOYA Chunks', '20.00', 5, 'CAT007', 'Amazon Brand - Vedaka SOYA Chunks', '../images/Products/PRD054/img1.jpg', '../images/Products/PRD054/img2.jpg', '../images/Products/PRD054/img3.jpg', '../images/Products/PRD054/img4.jpg', 'Available'),
('PRD055', 'Manna SOYA Chunks', '55.00', 51, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD055/img1.jpg', '../images/Products/PRD055/img2.jpg', '../images/Products/PRD055/img3.jpg', '../images/Products/PRD055/img4.jpg', 'Available'),
('PRD056', 'mixture', '100.00', 5, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD056/img1.jpg', '../images/Products/PRD056/img2.jpg', '../images/Products/PRD056/img3.jpg', '../images/Products/PRD056/img4.jpg', 'Available'),
('PRD057', 'Ronak Raunak Soya Chunks', '200.00', 10, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD057/img1.jpg', '../images/Products/PRD057/img2.jpg', '../images/Products/PRD057/img3.jpg', '../images/Products/PRD057/img4.jpg', 'Available'),
('PRD058', 'Soyabean Premium Quality', '50.00', 5, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD058/img1.jpg', '../images/Products/PRD058/img2.jpg', '../images/Products/PRD058/img3.jpg', '../images/Products/PRD058/img4.jpg', 'Available'),
('PRD059', 'Lay Cheetos Puffs Pouch', '200.00', 5, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD059/img1.jpg', '../images/Products/PRD059/img2.jpg', '../images/Products/PRD059/img3.jpg', '../images/Products/PRD059/img4.jpg', 'Available'),
('PRD060', 'Tata Sampann Turmeric Powder Masala', '210.00', 5, 'CAT007', 'Tata Sampann Turmeric Powder Masala.Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD060/img1.jpg', '../images/Products/PRD060/img2.jpg', '../images/Products/PRD060/img3.jpg', '../images/Products/PRD060/img4.jpg', 'Available'),
('PRD061', 'rice', '500.00', 5, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD061/img1.jpg', '../images/Products/PRD061/img2.jpg', '../images/Products/PRD061/img3.jpg', '../images/Products/PRD061/img4.jpg', 'Available'),
('PRD062', 'Mantra Organic Wheat Daliya', '55.00', 56, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD062/img1.jpg', '../images/Products/PRD062/img2.jpg', '../images/Products/PRD062/img3.jpg', '../images/Products/PRD062/img4.jpg', 'Available'),
('PRD063', ' Tata Tea Agni', '55.00', 5, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD063/img1.jpg', '../images/Products/PRD063/img2.jpg', '../images/Products/PRD063/img3.jpg', '../images/Products/PRD063/img4.jpg', 'Available'),
('PRD064', ' Madhur Pure Sugar Bag', '50.00', 25, 'CAT007', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD064/img1.jpg', '../images/Products/PRD064/img2.jpg', '../images/Products/PRD064/img3.jpg', '../images/Products/PRD064/img4.jpg', 'Available'),
('PRD065', 'Conditioner baby', '2000.00', 55, 'CAT007', 'Conditioner with Shea  for baby', '../images/Products/PRD065/img1.jpg', '../images/Products/PRD065/img2.jpg', '../images/Products/PRD065/img3.jpg', '../images/Products/PRD065/img4.jpg', 'Available'),
('PRD066', 'Wacky Kids Hair Wax', '200.00', 55, 'CAT006', 'Wacky Kids Hair Wax', '../images/Products/PRD066/img1.jpg', '../images/Products/PRD066/img2.jpg', '../images/Products/PRD066/img3.jpg', '../images/Products/PRD066/img4.jpg', 'Available'),
('PRD067', 'baby girl dress', '1500.00', 53, 'CAT006', 'baby girl dress Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD067/img1.jpg', '../images/Products/PRD067/img2.jpg', '../images/Products/PRD067/img3.jpg', '../images/Products/PRD067/img4.jpg', 'Available'),
('PRD068', 'little kid chair', '2500.00', 6, 'CAT006', 'little kid chair for all', '../images/Products/PRD068/img1.jpg', '../images/Products/PRD068/img2.jpg', '../images/Products/PRD068/img3.jpg', '../images/Products/PRD068/img4.jpg', 'Available'),
('PRD069', ' KidKraft Farmhouse Table and Chair Set', '5000.00', 61, 'CAT006', 'KidKraft Farmhouse Table and Chair Set', '../images/Products/PRD069/img1.jpg', '../images/Products/PRD069/img2.jpg', '../images/Products/PRD069/img3.jpg', '../images/Products/PRD069/img4.jpg', 'Available'),
('PRD070', 'Kids Desk and Chair Set', '2000.00', 15, 'CAT006', 'Kids Desk and Chair Set', '../images/Products/PRD070/img1.jpg', '../images/Products/PRD070/img2.jpg', '../images/Products/PRD070/img3.jpg', '../images/Products/PRD070/img4.jpg', 'Available'),
('PRD071', 'Flash Furniture Green Plastic Stackable School Chair ', '2000.00', 56, 'CAT006', 'Flash Furniture Green Plastic Stackable School Chair Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD071/img1.jpg', '../images/Products/PRD071/img2.jpg', '../images/Products/PRD071/img3.jpg', '../images/Products/PRD071/img4.jpg', 'Available'),
('PRD072', 'kids building toys', '2000.00', 55, 'CAT006', 'Education Science Experiment Kits', '../images/Products/PRD072/img1.jpg', '../images/Products/PRD072/img2.jpg', '../images/Products/PRD072/img3.jpg', '../images/Products/PRD072/img4.jpg', 'Available'),
('PRD073', 'kids bag', '1200.00', 6, 'CAT006', 'Education Science Experiment Kits', '../images/Products/PRD073/img1.jpg', '../images/Products/PRD073/img2.jpg', '../images/Products/PRD073/img3.jpg', '../images/Products/PRD073/img4.jpg', 'Available'),
('PRD074', 'Kids Tablets', '15000.00', 56, 'CAT006', 'Please bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD074/img1.jpg', '../images/Products/PRD074/img2.jpg', '../images/Products/PRD074/img3.jpg', '../images/Products/PRD074/img4.jpg', 'Available'),
('PRD075', 'Kids Construction Fort Building Kit', '1200.00', 56, 'CAT006', 'Kids Construction Fort Building Kit', '../images/Products/PRD075/img1.jpg', '../images/Products/PRD075/img2.jpg', '../images/Products/PRD075/img3.jpg', '../images/Products/PRD075/img4.jpg', 'Available'),
('PRD076', 'Chair Bands for Kids with Fidgety Feet', '1000.00', 12, 'CAT006', 'Chair Bands for Kids with Fidgety Feet,chair', '../images/Products/PRD076/img1.jpg', '../images/Products/PRD076/img2.jpg', '../images/Products/PRD076/img3.jpg', '../images/Products/PRD076/img4.jpg', 'Available'),
('PRD077', 'Kids Headphones Stereo', '2000.00', 50, 'CAT006', 'Kids Headphones, StereoPlease bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD077/img1.jpg', '../images/Products/PRD077/img2.jpg', '../images/Products/PRD077/img3.jpg', '../images/Products/PRD077/img4.jpg', 'Available'),
('PRD078', 'Feetmat Boys Hiking Shoes Waterproof Kids Sneaker shoes', '1020.00', 59, 'CAT006', 'Feetmat Boys Hiking Shoes Waterproof Kids Sneaker', '../images/Products/PRD078/img1.jpg', '../images/Products/PRD078/img2.jpg', '../images/Products/PRD078/img3.jpg', '../images/Products/PRD078/img4.jpg', 'Available'),
('PRD079', ' VTech KidiZoom Smartwatch DX2 Pink', '200.00', 56, 'CAT006', 'VTech KidiZoom Smartwatch DX2, Pink', '../images/Products/PRD079/img1.jpg', '../images/Products/PRD079/img2.jpg', '../images/Products/PRD079/img3.jpg', '../images/Products/PRD079/img4.jpg', 'Available'),
('PRD080', 'Walkie Talkies for Kids', '1000.00', 26, 'CAT006', 'Walkie Talkies for Kids\r\nPlease bear in mind that the photo may be slightly different from the actual item in terms of colour due to lighting conditions or the display used to view', '../images/Products/PRD080/img1.jpg', '../images/Products/PRD080/img2.jpg', '../images/Products/PRD080/img3.jpg', '../images/Products/PRD080/img4.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `product_keywords`
--

CREATE TABLE `product_keywords` (
  `productid` varchar(20) NOT NULL,
  `keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_keywords`
--

INSERT INTO `product_keywords` (`productid`, `keywords`) VALUES
('PRD001', 'Note'),
('PRD001', 'Note20'),
('PRD001', 'Note20 Ultra'),
('PRD001', 'Phone'),
('PRD001', 'Samsung'),
('PRD001', 'Samsung Note20'),
('PRD002', 'Phone'),
('PRD002', 'Samsung'),
('PRD003', 'Keyboard'),
('PRD004', 'protector'),
('PRD004', 'Screen protector'),
('PRD005', 'iPhone'),
('PRD005', 'iPhone XS'),
('PRD005', 'iPhone XS Max'),
('PRD005', 'Phone'),
('PRD005', 'XS Max'),
('PRD006', 'Mouse'),
('PRD007', '5G'),
('PRD007', 'LG'),
('PRD007', 'LG Wing 5G'),
('PRD007', 'Phone'),
('PRD007', 'Wing 5G'),
('PRD008', 'Phone'),
('PRD008', 'S20'),
('PRD008', 'Samsung'),
('PRD008', 'Samsung S20'),
('PRD009', 'Phone'),
('PRD009', 'Samsung'),
('PRD010', 'fridge'),
('PRD010', 'fridges'),
('PRD010', 'samsung'),
('PRD011', 'laps'),
('PRD011', 'laptops'),
('PRD011', 'Lenovo'),
('PRD011', 'ThinkPad'),
('PRD012', 'HP Envy x360 Convertible Touchscreen'),
('PRD012', 'laps'),
('PRD012', 'laptops'),
('PRD013', 'washing machine'),
('PRD014', 'dryer'),
('PRD014', 'Hair Dryer'),
('PRD015', 'mixer'),
('PRD015', 'mixy'),
('PRD016', 'rice'),
('PRD017', 'blueshirt'),
('PRD017', 'shirt.tshirt'),
('PRD018', 'boys'),
('PRD018', 'Cotton Casual Classic fit Full Sleeves Shirt for Men'),
('PRD018', 'Denim shirt'),
('PRD018', 'men'),
('PRD018', 'shirt'),
('PRD019', 'Blue shirt'),
('PRD019', 'Regular Fit Multi Color T-Shirt'),
('PRD019', 'shirts'),
('PRD019', 'White  shirt'),
('PRD019', 'White and Blue shirt'),
('PRD020', 'jackets'),
('PRD020', 'jeans'),
('PRD020', 'men'),
('PRD020', 'mendress'),
('PRD021', 'lady'),
('PRD021', 'ladydress'),
('PRD021', 'yellow'),
('PRD021', 'Yellow dress'),
('PRD022', 'ladies'),
('PRD022', 'ladies black frock'),
('PRD022', 'ladies frock'),
('PRD022', 'Rayon Shirtdress Casual Dress'),
('PRD023', 'Cotton Regular Kurta'),
('PRD023', 'jeans'),
('PRD023', 'lady jeans'),
('PRD024', 'blackdress'),
('PRD024', 'blackdressfrock'),
('PRD024', 'dress'),
('PRD024', 'frock'),
('PRD024', 'full Frock ladies'),
('PRD025', 'dress'),
('PRD025', 'frock'),
('PRD025', 'green dress'),
('PRD025', 'ladydress'),
('PRD026', 'frock'),
('PRD026', 'lady'),
('PRD026', 'lady dress'),
('PRD026', 'top and jeans green and white'),
('PRD027', 'boy'),
('PRD027', 'men'),
('PRD027', 'Men Jackets'),
('PRD027', 'men shirts'),
('PRD028', 'blue'),
('PRD028', 'Navy Blue Dress Blue Dress'),
('PRD030', 'dress'),
('PRD030', 'woman'),
('PRD030', 'Women Maxi Dress'),
('PRD031', 'dress'),
('PRD031', 'frock'),
('PRD031', 'ladies'),
('PRD031', 'maxi dress'),
('PRD032', 'dress'),
('PRD032', 'ladies'),
('PRD032', 'Womens Cotton & Crepe Anarkali Kurta'),
('PRD033', 'Bowls'),
('PRD033', 'Mixing Bowls'),
('PRD033', 'Stainless Steel'),
('PRD033', 'Stainless Steel Mixing Bowls'),
('PRD034', 'Garage Storage Systems Broom Organizer'),
('PRD035', 'bed'),
('PRD035', 'matress'),
('PRD035', 'sleep tools'),
('PRD036', 'chairsvSet of 4 Dining Chairs 2 Tulip Office Chair'),
('PRD037', 'bed'),
('PRD037', 'mattress'),
('PRD037', 'Mattress Foundation'),
('PRD038', 'bed'),
('PRD038', 'bedsheet'),
('PRD038', 'Deep Pocket Cotton Blend Sheet Set'),
('PRD039', 'Capacity Black Resin Folding Chair'),
('PRD039', 'chair.wooden chair'),
('PRD039', 'darkchair'),
('PRD039', 'with Black Vinyl Padded Seat'),
('PRD040', 'chair'),
('PRD040', 'Dining Side Chair'),
('PRD040', 'table'),
('PRD041', 'Assembly Small Computer Desk'),
('PRD041', 'desk'),
('PRD041', 'Foldable Table'),
('PRD041', 'Home Office Desk'),
('PRD041', 'table'),
('PRD042', 'Furniture'),
('PRD042', 'Furniture Storage Tower Unit for Bedroom'),
('PRD042', 'table'),
('PRD043', 'chair'),
('PRD043', 'Conversation Sofa Set Tea Table'),
('PRD043', 'sofa'),
('PRD043', 'table'),
('PRD044', 'bolt'),
('PRD044', 'nut'),
('PRD044', 'Socket Cap Bolt and Barrel Nut'),
('PRD044', 'steal'),
('PRD045', 'cover'),
('PRD045', 'sofa'),
('PRD045', 'table'),
('PRD045', 'ULTCOVER Waterproof Patio Lounge Chair Cover'),
('PRD046', 'chair'),
('PRD046', 'easychair'),
('PRD047', 'Sectional Furniture Sets sofa'),
('PRD047', 'sofa'),
('PRD048', 'chairs'),
('PRD048', 'Outdoor Patio Furniture and Hot Tub Side Table'),
('PRD048', 'table'),
('PRD049', 'bean'),
('PRD049', 'Natureland Organics Soybean'),
('PRD049', 'soya'),
('PRD050', 'oreo'),
('PRD050', 'Oreo Chocolate Flavoured Biscuits'),
('PRD051', 'welch'),
('PRD052', 'frys'),
('PRD052', 'lays'),
('PRD053', 'salt'),
('PRD053', 'Tata Salt Lite'),
('PRD054', 'Amazon Brand - Vedaka SOYA Chunks'),
('PRD054', 'soya'),
('PRD055', 'Manna SOYA Chunks'),
('PRD056', 'mixture'),
('PRD057', 'Ronak Raunak Soya Chunks'),
('PRD058', 'soya'),
('PRD058', 'Soyabean  Premium Quality'),
('PRD059', 'Lay Cheetos Puffs Pouch'),
('PRD060', 'Tata Sampann Turmeric Powder Masala.tata.powder'),
('PRD061', 'rice'),
('PRD061', 'ricepacket'),
('PRD062', 'dalia'),
('PRD062', 'Mantra Organic Wheat Daliya'),
('PRD063', 'Tata Tea Agni'),
('PRD063', 'tea'),
('PRD063', 'tea powder'),
('PRD064', 'Madhur Pure Sugar Bag'),
('PRD064', 'sugar'),
('PRD065', 'baby'),
('PRD065', 'conditioner'),
('PRD065', 'Conditioner with Shea'),
('PRD065', 'kid'),
('PRD066', 'hair'),
('PRD066', 'Wacky Kids Hair Wax'),
('PRD067', 'baby'),
('PRD067', 'baby dress'),
('PRD067', 'dress'),
('PRD068', 'chair'),
('PRD068', 'kidchair'),
('PRD068', 'table'),
('PRD069', 'chair'),
('PRD069', 'kid'),
('PRD069', 'KidKraft Farmhouse Table and Chair Set'),
('PRD069', 'table'),
('PRD070', 'chair'),
('PRD070', 'chair set'),
('PRD070', 'kid'),
('PRD070', 'Kids Desk and Chair Set'),
('PRD070', 'table'),
('PRD071', 'chair'),
('PRD071', 'Flash Furniture Green Plastic Stackable School Chair'),
('PRD071', 'kid'),
('PRD072', 'kids'),
('PRD072', 'kids building toys'),
('PRD072', 'toys'),
('PRD073', 'bag'),
('PRD073', 'bags'),
('PRD073', 'kids'),
('PRD073', 'kids bags'),
('PRD074', 'kids'),
('PRD074', 'Kids Tablets'),
('PRD076', 'Chair Bands'),
('PRD076', 'Chair Bands for Kids with Fidgety Feet'),
('PRD076', 'Kids'),
('PRD076', 'with Fidgety Feet'),
('PRD077', 'Headphones'),
('PRD077', 'kid'),
('PRD077', 'Kids'),
('PRD077', 'Kids Headphones Stereo'),
('PRD077', 'Stereo'),
('PRD077', 'StereoKids Headphones'),
('PRD078', 'boots'),
('PRD078', 'Feetmat'),
('PRD078', 'kids'),
('PRD078', 'shoes Boys Hiking Shoes'),
('PRD078', 'Waterproof Kids Sneaker'),
('PRD079', 'kid'),
('PRD079', 'toys'),
('PRD079', 'watch'),
('PRD080', 'kid'),
('PRD080', 'phone'),
('PRD080', 'Walkie Talkies for Kids');

-- --------------------------------------------------------

--
-- Table structure for table `shop_details`
--

CREATE TABLE `shop_details` (
  `shopid` varchar(20) NOT NULL,
  `shopName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_details`
--

INSERT INTO `shop_details` (`shopid`, `shopName`) VALUES
('SHP001', 'DressMart'),
('SHP002', 'Tech World'),
('SHP003', 'HomeNeeds'),
('SHP004', 'GroceryWorld'),
('SHP005', 'kidZone');

-- --------------------------------------------------------

--
-- Table structure for table `shop_ownership`
--

CREATE TABLE `shop_ownership` (
  `shopid` varchar(20) NOT NULL,
  `ownerid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_ownership`
--

INSERT INTO `shop_ownership` (`shopid`, `ownerid`) VALUES
('SHP001', 'SOW001'),
('SHP002', 'SOW002'),
('SHP003', 'SOW003'),
('SHP004', 'SOW004'),
('SHP005', 'SOW005');

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
--

CREATE TABLE `shop_products` (
  `shopid` varchar(20) NOT NULL,
  `productID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_products`
--

INSERT INTO `shop_products` (`shopid`, `productID`) VALUES
('SHP001', 'PRD017'),
('SHP001', 'PRD018'),
('SHP001', 'PRD019'),
('SHP001', 'PRD020'),
('SHP001', 'PRD021'),
('SHP001', 'PRD022'),
('SHP001', 'PRD023'),
('SHP001', 'PRD024'),
('SHP001', 'PRD025'),
('SHP001', 'PRD026'),
('SHP001', 'PRD027'),
('SHP001', 'PRD028'),
('SHP001', 'PRD029'),
('SHP001', 'PRD030'),
('SHP001', 'PRD031'),
('SHP001', 'PRD032'),
('SHP002', 'PRD001'),
('SHP002', 'PRD002'),
('SHP002', 'PRD003'),
('SHP002', 'PRD004'),
('SHP002', 'PRD005'),
('SHP002', 'PRD006'),
('SHP002', 'PRD007'),
('SHP002', 'PRD008'),
('SHP002', 'PRD009'),
('SHP002', 'PRD010'),
('SHP002', 'PRD011'),
('SHP002', 'PRD012'),
('SHP002', 'PRD013'),
('SHP002', 'PRD014'),
('SHP002', 'PRD015'),
('SHP002', 'PRD016'),
('SHP003', 'PRD033'),
('SHP003', 'PRD034'),
('SHP003', 'PRD035'),
('SHP003', 'PRD036'),
('SHP003', 'PRD037'),
('SHP003', 'PRD038'),
('SHP003', 'PRD039'),
('SHP003', 'PRD040'),
('SHP003', 'PRD041'),
('SHP003', 'PRD042'),
('SHP003', 'PRD043'),
('SHP003', 'PRD044'),
('SHP003', 'PRD045'),
('SHP003', 'PRD046'),
('SHP003', 'PRD047'),
('SHP003', 'PRD048'),
('SHP004', 'PRD049'),
('SHP004', 'PRD050'),
('SHP004', 'PRD051'),
('SHP004', 'PRD052'),
('SHP004', 'PRD053'),
('SHP004', 'PRD054'),
('SHP004', 'PRD055'),
('SHP004', 'PRD056'),
('SHP004', 'PRD057'),
('SHP004', 'PRD058'),
('SHP004', 'PRD059'),
('SHP004', 'PRD060'),
('SHP004', 'PRD061'),
('SHP004', 'PRD062'),
('SHP004', 'PRD063'),
('SHP004', 'PRD064'),
('SHP005', 'PRD065'),
('SHP005', 'PRD066'),
('SHP005', 'PRD067'),
('SHP005', 'PRD068'),
('SHP005', 'PRD069'),
('SHP005', 'PRD070'),
('SHP005', 'PRD071'),
('SHP005', 'PRD072'),
('SHP005', 'PRD073'),
('SHP005', 'PRD074'),
('SHP005', 'PRD075'),
('SHP005', 'PRD076'),
('SHP005', 'PRD077'),
('SHP005', 'PRD078'),
('SHP005', 'PRD079'),
('SHP005', 'PRD080');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `userId` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`userId`, `email`, `password`) VALUES
('CMR007', 'fafagah@gmail.com', '12345'),
('CMR002', 'henrykpape@gmail.com', 'HenryK@charlie'),
('CMR003', 'jackkirby@gmail.com', 'JackK@charlie'),
('SOW003', 'jk@gmail.com', 'jk@charlie'),
('CMR012', 'jkk@gmail.com', 'jkk@12'),
('CMR005', 'joerusso@gmail.com', 'JoeR@charlie'),
('SOW004', 'john@gmail.com', 'john@charlie'),
('CMR010', 'kobigan98@gmail.com', 'kobi@charlie'),
('CMR008', 'kobigan@gmail.com', '123456'),
('CMR009', 'kobigank@gmail.com', '123456'),
('CMR006', 'kumaransathiyavarathan@gmail.com', 'kumaran14'),
('SOW001', 'Michael@gmail.com', 'Michael@charlie'),
('SOW002', 'Robert@gmail.com', 'Robert@charlie'),
('CMR011', 'sathiyavarathan@gmail.com', 'abcdef'),
('SOW005', 'will@gmail.com', 'will@charlie'),
('CMR001', 'william@gmail.com', 'William@charlie');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `userId` varchar(20) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `profImgLoc` varchar(255) NOT NULL DEFAULT '../images/userprofpics/no_avatar.jpg',
  `mob_no` varchar(20) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`userId`, `userName`, `profImgLoc`, `mob_no`, `address`) VALUES
('CMR001', 'William Turner', '../images/userprofpics/CMR001.jpg', '0771234667', '177A Bleecker Street, Manhattan.'),
('CMR002', 'Henry K Pape', '../images/userprofpics/CMR002.jpg', '0212222254', '2058  Cambridge Court,Russellville'),
('CMR003', 'Jack Kirby', '../images/userprofpics/CMR003.jpg', '1452365899', '711  Long Street,Brooksville'),
('CMR004', 'Joe Russo', '../images/userprofpics/no_avatar.jpg', '5698569885', 'no address'),
('CMR005', 'Joe Russo', '../images/userprofpics/no_avatar.jpg', NULL, NULL),
('CMR006', 'Kumaran', '../images/userprofpics/no_avatar.jpg', '0751231564', 'kopay'),
('CMR007', 'addada', '../images/userprofpics/no_avatar.jpg', NULL, NULL),
('CMR008', 'kobigan', '../images/userprofpics/no_avatar.jpg', NULL, NULL),
('CMR009', 'kobigan15', '../images/userprofpics/no_avatar.jpg', NULL, NULL),
('CMR010', 'kobigan.k', '../images/userprofpics/no_avatar.jpg', NULL, NULL),
('CMR011', 'sathi', '../images/userprofpics/no_avatar.jpg', NULL, NULL),
('CMR012', 'jkk', '../images/userprofpics/no_avatar.jpg', NULL, NULL),
('SOW001', 'Michael B Jordan', '../images/userprofpics/SOW001.jpg', '0772563654', '177A Bleecker Street, Greenwich Village, Manhattan'),
('SOW002', 'Robert Downey, Jr.', '../images/userprofpics/SOW002.jpg', '0772563985', 'Malibu Point 10880, 90265,Malibu, California.'),
('SOW003', 'JK', '../images/userprofpics/SOW003.jpg', '0122545885', 'abc street.'),
('SOW004', 'john', '../images/userprofpics/SOW004.jpg', '0752255663', ''),
('SOW005', 'will smith', '../images/userprofpics/no_avatar.jpg', '0245553665', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_products`
--

CREATE TABLE `wishlist_products` (
  `wishlistid` varchar(20) NOT NULL,
  `productid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist_products`
--

INSERT INTO `wishlist_products` (`wishlistid`, `productid`) VALUES
('WSH002', 'PRD005'),
('WSH002', 'PRD009'),
('WSH002', 'PRD011');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_user`
--

CREATE TABLE `wishlist_user` (
  `wishlistid` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist_user`
--

INSERT INTO `wishlist_user` (`wishlistid`, `userid`) VALUES
('WSH001', 'CMR006'),
('WSH002', 'SOW001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`cartId`,`productID`,`cartcolor`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `cart_user`
--
ALTER TABLE `cart_user`
  ADD PRIMARY KEY (`cartId`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `paymentId` (`paymentId`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`orderId`,`productID`,`ordcolor`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`categoryid`),
  ADD UNIQUE KEY `categoryName` (`categoryName`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`productid`,`color`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `productCat` (`productCat`);

--
-- Indexes for table `product_keywords`
--
ALTER TABLE `product_keywords`
  ADD PRIMARY KEY (`productid`,`keywords`);

--
-- Indexes for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD PRIMARY KEY (`shopid`);

--
-- Indexes for table `shop_ownership`
--
ALTER TABLE `shop_ownership`
  ADD PRIMARY KEY (`ownerid`),
  ADD KEY `shopid` (`shopid`);

--
-- Indexes for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`shopid`,`productID`),
  ADD UNIQUE KEY `productID` (`productID`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `wishlist_products`
--
ALTER TABLE `wishlist_products`
  ADD PRIMARY KEY (`wishlistid`,`productid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `wishlist_user`
--
ALTER TABLE `wishlist_user`
  ADD PRIMARY KEY (`wishlistid`),
  ADD UNIQUE KEY `wishlistid` (`wishlistid`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD CONSTRAINT `cart_products_ibfk_1` FOREIGN KEY (`cartId`) REFERENCES `cart_user` (`cartId`),
  ADD CONSTRAINT `cart_products_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product_details` (`productid`);

--
-- Constraints for table `cart_user`
--
ALTER TABLE `cart_user`
  ADD CONSTRAINT `cart_user_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_details` (`userId`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `user_details` (`userId`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`paymentId`) REFERENCES `payment_details` (`paymentId`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order_details` (`orderId`),
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product_details` (`productid`);

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product_details` (`productid`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`productCat`) REFERENCES `product_category` (`categoryid`);

--
-- Constraints for table `product_keywords`
--
ALTER TABLE `product_keywords`
  ADD CONSTRAINT `product_keywords_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product_details` (`productid`);

--
-- Constraints for table `shop_ownership`
--
ALTER TABLE `shop_ownership`
  ADD CONSTRAINT `shop_ownership_ibfk_1` FOREIGN KEY (`shopid`) REFERENCES `shop_details` (`shopid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_ownership_ibfk_2` FOREIGN KEY (`ownerid`) REFERENCES `user_details` (`userId`);

--
-- Constraints for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD CONSTRAINT `shop_products_ibfk_1` FOREIGN KEY (`shopid`) REFERENCES `shop_details` (`shopid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_products_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product_details` (`productid`) ON UPDATE CASCADE;

--
-- Constraints for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD CONSTRAINT `user_credentials_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_details` (`userId`);

--
-- Constraints for table `wishlist_products`
--
ALTER TABLE `wishlist_products`
  ADD CONSTRAINT `wishlist_products_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product_details` (`productid`),
  ADD CONSTRAINT `wishlist_products_ibfk_2` FOREIGN KEY (`wishlistid`) REFERENCES `wishlist_user` (`wishlistid`);

--
-- Constraints for table `wishlist_user`
--
ALTER TABLE `wishlist_user`
  ADD CONSTRAINT `wishlist_user_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user_details` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
