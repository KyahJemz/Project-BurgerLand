-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 01:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Database: `webdevfinalsdb`
--

-- --------------------------------------------------------

CREATE TABLE `tblaccounts` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

CREATE TABLE `tblitems` (
  `ItemId` int(11) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `ItemDescription` varchar(255) NOT NULL,
  `ItemCategory` varchar(50) NOT NULL,
  `ItemPrice` varchar(50) NOT NULL,
  `ItemImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tblitems` (`ItemId`, `ItemName`, `ItemDescription`, `ItemCategory`, `ItemPrice`, `ItemImage`) VALUES
(24, 'Classic Beef Burger', 'A timeless favorite made with 100% Angus beef patty, lettuce, tomato, and our special sauce.', 'Burgers', '150', 'ClassicBeefBurger\n.jpg'),
(25, 'Veggie Burger', 'A delicious and healthy choice with a plant-based patty, fresh veggies, and vegan mayo.', 'Burgers', '130', 'VeggieBurger\n.jpg'),
(26, 'Chicken Burger', 'Crispy and tender chicken fillet topped with lettuce and mayo.', 'Burgers', '140', 'ChickenBurger\n.jpg'),
(27, 'BBQ Bacon Burger', 'Juicy beef patty smothered in BBQ sauce, topped with crispy bacon and cheddar cheese.', 'Burgers', '170', 'BBQBaconBurger\n.jpg'),
(28, 'Mushroom Swiss Burger', 'Savor the flavor of sautéed mushrooms and Swiss cheese on our beef patty.', 'Burgers', '160', 'MushroomSwissBurger\n.jpg'),
(29, 'Crispy French Fries', 'Golden and crispy fries served with ketchup.', 'Sides', '60', 'CrispyFrenchFries\n.jpg'),
(30, 'Sweet Potato Fries', 'A sweet and savory side option that pairs perfectly with our burgers.', 'Sides', '70', 'SweetPotatoFries.jpg'),
(31, 'Onion Rings', 'Crispy and lightly battered onion rings with a side of dipping sauce.', 'Sides', '80', 'OnionRings\n.jpg'),
(32, 'Mozzarella Sticks', 'Irresistible mozzarella cheese sticks served with marinara sauce.', 'Sides', '90', 'MozzarellaSticks\n.jpg'),
(33, 'Coleslaw', 'A fresh and tangy coleslaw salad to complement your meal.', 'Sides', '50', 'Coleslaw.jpg'),
(34, 'Cola', 'Classic cola drink served with ice.', 'Drinks', '40', 'Cola.jpg'),
(35, 'Lemonade', 'Refreshing lemonade with a hint of sweetness.', 'Drinks', '50', 'Lemonade.jpg'),
(36, 'Iced Tea', 'Chilled iced tea, perfect for quenching your thirst.', 'Drinks', '45', 'IcedTea\n.jpg'),
(37, 'Milkshake', 'Creamy milkshakes available in vanilla, chocolate, and strawberry flavors.', 'Drinks', '80', 'Milkshake.jpg'),
(38, 'Bottled Water', 'Pure and refreshing bottled water.', 'Drinks', '20', 'BottledWater.jpg');

-- --------------------------------------------------------

CREATE TABLE `tbltransactions` (
  `TransactionId` int(11) NOT NULL,
  `TransactionAccount` int(11) NOT NULL,
  `TransactionAddress` text NOT NULL,
  `TransactionTell` varchar(20) NOT NULL,
  `TransactionName` varchar(255) NOT NULL,
  `TransactionItems` text NOT NULL,
  `TransactionAmount` varchar(10) NOT NULL,
  `TransactionTimestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `tblitems`
  ADD PRIMARY KEY (`ItemId`);

ALTER TABLE `tbltransactions`
  ADD PRIMARY KEY (`TransactionId`);

-- --------------------------------------------------------

ALTER TABLE `tblaccounts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `tblitems`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

ALTER TABLE `tbltransactions`
  MODIFY `TransactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

COMMIT;
