-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2024 at 04:31 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csci210_kylle`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `ID` int DEFAULT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `customerEmail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `customerPassword` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`ID`, `customerName`, `customerEmail`, `customerPassword`) VALUES
(NULL, 'Andee Oligmiller', 'andeeoli@email.com', '123'),
(NULL, 'John Doe', 'Jdoe@gmail.com', '234'),
(NULL, 'Kevin Ritter', 'kevin@email.com', '123'),
(NULL, 'Kelly Waldie', 'kwaldie@gmail.com', '234'),
(NULL, 'Kylle Waldie', 'wldkylle@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `customerEmail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `customerPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customerAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customerCity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customerState` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customerZipcode` int DEFAULT NULL,
  `customerPhonenumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `customerName`, `customerEmail`, `customerPassword`, `customerAddress`, `customerCity`, `customerState`, `customerZipcode`, `customerPhonenumber`) VALUES
(1, 'Kylle Waldie', 'wldkylle@gmail.com', '234', '664 S DAKOTA ST', 'BUTTE', 'MT', 59701, '4065651665'),
(50, 'Kevin Ritter', 'kevin@email.com', '123', '', '', '', 0, ''),
(51, 'Andee Oligmiller', 'andeeoli@email.com', '123', '', '', '', 0, ''),
(53, 'John Doe', 'Jdoe@gmail.com', '234', '123 Address Rd.', 'Butte', 'Mt', 59701, '1234567890'),
(55, 'James Denny', 'Jdenny@gmail.com', NULL, '123 Address Rd.', 'Butte', 'Mt', 59701, '1234567890'),
(69, 'Oren Schwarz', 'oren@gmail.com', '234', '664 S DAKOTA ST', 'BUTTE', 'MT', 59701, '4065651665'),
(70, 'Kelly Waldie', 'kwaldie@gmail.com', '234', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `productDescription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `productPrice` decimal(19,2) NOT NULL,
  `productAmount` int DEFAULT NULL,
  `productImage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productDescription`, `productPrice`, `productAmount`, `productImage`) VALUES
(1, 'Cotton T-Shirt', 'This t-shirt is made of soft, breathable cotton fabric, ensuring comfort throughout the day. Its classic crewneck design provides a timeless look suitable for various occasions. With its relaxed fit and durable construction, this t-shirt is perfect for both casual outings and outdoor adventures. Whether worn alone or layered under a jacket, it effortlessly combines style and functionality, making it a wardrobe essential for any season.', 15.99, 15, 'photos/t-shirt.jpg'),
(3, 'Plush Memory Foam Slippers', 'Constructed with ultra-soft faux fur lining, these slippers provide a cozy and warm embrace with every step. The plush memory foam insole contours to the shape of your feet, offering customized support and cushioning for ultimate comfort.\r\n\r\nDesigned for both indoor and outdoor wear, these slippers feature a durable rubber sole with anti-skid traction, ensuring stability and safety on any surface. Whether you\'re lounging around the house or stepping out to grab the mail, these slippers have you covered.', 35.00, 15, 'photos\\slippers-image.jpg'),
(4, 'Banana', 'Pick up a perfect option for a quick breakfast or on-the-go snacking with this Banana. A good source of potassium, the banana is great for adding to oatmeal, cereal, ice cream and more. Plus, you can also blend it with yogurt and other favorite fruits to whip up a delicious smoothie.', 0.25, 15, 'photos/banana.jpg'),
(5, 'Orange', 'The orange, a radiant globe of sunshine captured in fruit form, is nature\'s sweet symphony. Its peel, a vibrant tapestry of sunset hues, conceals the treasures within—a succulent pulp bursting with tangy nectar. As you gently graze its dimpled surface, a fragrant mist of citrus essence dances upon the air, teasing the senses with promises of refreshment and vitality.', 5.00, 11, 'photos/orange.jpg'),
(6, 'Play Day 8\" Green Water Squirter', 'Get ready for the ultimate water fight with the Play Day Water Blaster. This water blaster is the perfect defense in your next water fight. Fill it with water from the back and have fun soaking your friends and family. It’s perfect for a day at the park, beach, or a cookout to get kids outside and playing. Buy multiple Blasters and hand them out at your summer cookout or birthday party so everyone can participate in the fun. Soak your friends in water with the Play Day Water Blaster.', 1.24, 12, 'photos/squirtgun.jpg'),
(7, 'Cotton Socks', 'These socks are crafted from a blend of premium cotton and stretchy spandex materials, ensuring a comfortable and snug fit. Designed to reach just above the ankle, they offer ample coverage while allowing for breathability. The ribbed cuff ensures that the socks stay in place throughout the day, preventing any slipping or bunching. Whether paired with dress shoes for the office or sneakers for a weekend stroll, these socks combine comfort, style, and functionality effortlessly.', 14.00, 15, 'photos/socks.jpg'),
(8, 'Giant Inflatable Flamingo Ride', '[ Giant Flamingo Pool Float ] Suitable for accommodating 1~2 adults or 2 kids, no more than 441 lbs. Measures 76.7inches（L） x 35.4 inches （W） x 41.3 inches（H）. Cute flamingo design with flamingo stuff.', 27.95, 5, 'photos/giant-pink-flamingo-pool-float.jpg'),
(9, 'Dunkin\' Original Blend Ground Coffee', 'this is the coffee that started it all. Dunkin’ Original Blend Coffee is the rich, smooth, medium roast that made the brand famous. The ground coffee in this convenient resealable bag is made from 100% premium Arabica beans, roasted and blended to deliver that same deliciously drinkable coffee taste that could only be Dunkin’. ', 7.56, 5, 'photos/dnkn_orig_ground.png'),
(10, 'Stylish Hat', 'Looking For That Perfect Accessory To Complete Your Halloween Ensemble? Look No Further! Our Exotic Tribe Tie Dye Style Print Halloween Hat Is A Showstopper. Whether You\'Re A Woman, Kid, Girl Or Boy, This Hat Adds An Extra Dose Of Fun To Your Costume Parties. Its Attractive Exotic Tribe Tie Dye Style Print And Classic Pointed Top Design Make You The Center Of Attention. Available In Comfortable Sizes, It Ensures Everyone Can Join In The Festivities. This Durable And Lightweight Hat Is Designed To Be Both Fun And Functional With A Foldable Feature For Easy Storage And Transport. Step Into The Halloween Spirit With Our Exotic Tribe Tie Dye Style Print Halloween Hat, And Make This Festive Season One To Remember!', 12.99, 12, 'photos/tie-dye-witch-hat.jpg'),
(11, 'Srhythm NiceComfort 95 Headphones', 'Srhythm NiceComfort 95 Hybrid Noise Cancelling Headphones,Wireless Bluetooth Headset with Transparency Mode,HD Sound', 96.99, 5, 'photos/headphones.jpg'),
(12, 'Sony WH-CH520 Wireless Headphones', 'Sony WH-CH520 Wireless Headphones Bluetooth On-Ear Headset with Microphone, Blue', 59.99, 5, 'photos/headphones-2.jpg'),
(13, 'Razer Basilisk V3 Ergonomic Wired Gaming Mouse', 'Create, control, and champion your playstyle with the new Razer Basilisk V3—the quintessential ergonomic gaming mouse for customized performance. Equipped with 10+1 programmable buttons, a dual-mode tilt scroll wheel, a 26K DPI optical sensor, and a heavy dose of Razer Chroma RGB, it\'s time to light up the competition your way.', 44.99, 5, 'photos/Razer-Basilisk.jpg'),
(14, 'Logitech Pro Wireless Gaming Mouse for PC', 'Designed over two years with direct input from many professional esports players, PRO Wireless gaming mouse is built to the exacting standards of some of the world’s top esports professionals. PRO Wireless gaming mouse is built for extreme performance and includes the latest and most advanced technologies available. Featuring LIGHTSPEED technology, PRO Wireless overcomes the limitations of latency, connectivity and power to provide rock-solid and super-fast 1 ms report rate connection. PRO Wireless gaming mouse is also equipped with the latest version of the HERO sensor, our next generation optical sensor that is the highest performing and efficient gaming sensor.', 47.99, 5, 'photos/Logitech-mouse.jpg'),
(15, 'Dobell Boys Black Classic Top Hat', 'For centuries, the top hat has been a mark of distinction and class, synonymous with the races and weddings. Our boys black classic top hat is crafted from 100% wool, trimmed with grosgrain along the brim, and finished with a wool felt band. Each hat is fully lined and features a leather inner headband for maximum comfort.', 49.95, 4, 'photos/Dobell-boys-top-hat.jpg'),
(16, 'Nike Flex Experience Run 12', 'Stay steady and keep progressing toward your running goals in the Flex Experience 12. Minimal with full range of motion from heel to toe, it’s made to move with every stride, pace, and kick when you find your groove.', 44.97, 10, 'photos/flex-experience-run-12-mens-road-running-shoes-lqThC9.png'),
(17, 'KOORUI 27 inch Curved Computer Monitor', 'KOORUI 27 inch Curved Computer Monitor Full HD 1080P 75Hz Gaming Monitor 1800R LED Monitor HDMI VGA, Tilt Adjustment, Eye Care, Black 27N5C', 104.97, 5, 'photos/monitor-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `productID` int NOT NULL,
  `customerID` int NOT NULL,
  `customerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerEmail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerCity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerState` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerZipcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerPhoneNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`productID`, `customerID`, `customerName`, `customerEmail`, `customerAddress`, `customerCity`, `customerState`, `customerZipcode`, `customerPhoneNumber`) VALUES
(100, 1, 'Kylle Waldie', 'wldkylle@gmail.com', '818 Caledonia st.', 'Butte', 'MT', '59701', '4065651665');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`customerEmail`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`customerName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authentication`
--
ALTER TABLE `authentication`
  ADD CONSTRAINT `authentication_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
