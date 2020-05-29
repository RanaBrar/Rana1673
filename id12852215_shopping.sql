-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2020 at 05:22 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12852215_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `name`, `pass`, `role`) VALUES
(2, 'rana', '202cb962ac59075b964b07152d234b70', 1),
(4, 'jaspal', '202cb962ac59075b964b07152d234b70', 0),
(5, 'balkar', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cate`
--

CREATE TABLE `cate` (
  `cid` int(11) NOT NULL,
  `cate` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cate`
--

INSERT INTO `cate` (`cid`, `cate`) VALUES
(1, 'mobile'),
(2, 'laptop'),
(3, 'Clothes'),
(4, 'Shoes'),
(5, 'Led'),
(6, 'Camera');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_state` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_country` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_pincode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_email`, `cus_phone`, `cus_pass`, `cus_city`, `cus_address`, `cus_state`, `cus_country`, `cus_pincode`) VALUES
(1, 'Rana', 'rana33994@gmail.com', '7814803099', '0d7363894acdee742caf7fe4e97c4d49', 'Moga', 'Chand Purana', 'Punjab', 'India', 142038);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `cus_email`, `amount`, `pid`, `qty`, `date`) VALUES
(1, 'ORDS9702168', 'rana33994@gmail.com', '250.00', 8, 1, '2020-04-30'),
(2, 'ORDS67920153', 'rana167326@gmail.com', '5000.00', 3, 1, '2020-04-30'),
(3, 'ORDS59907140', 'rana167326@gmail.com', '500.00', 8, 2, '2020-04-30'),
(4, 'ORDS12670880', 'rana33994@gmail.com', '450.00', 8, 1, '2020-05-01'),
(5, 'ORDS18363507', 'rana33994@gmail.com', '11000.00', 4, 1, '2020-05-02'),
(6, 'ORDS98501468', 'rana33994@gmail.com', '7000.00', 11, 1, '2020-05-02'),
(7, 'ORDS8126311', 'rana33994@gmail.com', '35499.00', 2, 1, '2020-05-04'),
(8, 'ORDS5490237', 'rana33994@gmail.com', '900.00', 8, 2, '2020-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `shopping`
--

CREATE TABLE `shopping` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `rating` float NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate` int(11) NOT NULL,
  `totqty` int(11) NOT NULL,
  `remqty` int(11) NOT NULL,
  `buyqty` int(11) DEFAULT 0,
  `disc` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping`
--

INSERT INTO `shopping` (`id`, `name`, `price`, `discount`, `rating`, `img`, `cate`, `totqty`, `remqty`, `buyqty`, `disc`) VALUES
(1, 'Mi Mix Alpha', 200000, 250000, 6, '460051402', 1, 150, 150, 0, 'GSM / CDMA / HSPA / LTE / 5G 154.4 x 72.3 x 10.4 mm (6.08 x 2.85 x 0.41 in) Android 10.0; MIUI 11 Chipset Qualcomm SM8150 Snapdragon 855+ (7 nm) CPU Octa-core (1x2.96 GHz Kryo 485 & 3x2.42 GHz Kryo 485 & 4x1.8 GHz Kryo 485) GPU Adreno 640 (700 MHz) Internal 512GB 12GB RAM'),
(2, 'SamsungHP 15 Core i3 8th Gen', 35499, 39499, 5.5, '6.jpg', 2, 6, 5, 1, '(8 GB/1 TB HDD/Windows 10 Home) 15-da0414tu Thin and Light Laptop (15.6 inch, Smoke Grey, 1.77 kg)'),
(3, 'Iphone 11 pro', 124000, 128000, 9, '494684935', 1, 9, 9, 0, '5.8-inch Super Retina XDR OLED display Water and dust resistant (4 meters for up to 30 minutes, IP68) Triple-camera system with 12MP Ultra Wide, Wide, and Telephoto cameras; Night mode, Portrait mode, and 4K video up to 60fps 12MP TrueDepth front camera with Portrait mode, 4K video, and Slo-Mo Face ID for secure authentication and Apple Pay A13 Bionic chip with third-generation Neural Engine Fast charge with 18W adapter included'),
(4, 'Redmi note 7 pro', 11000, 12000, 10, '337230202', 1, 16, 15, 1, 'Redmi Note 7 Pro 4GB / 64GB Moonlight White 48MP - f1.79, 1.6micrometer (4-in-1), 5MP - f2.2, 1.12mirometer, Primary 6P Lens, Secondary 3P Lens, PDAF, AI Dual Camera Qualcomm Snapdragon 675,Octa Core, Android Pie 9.0, 6GB RAM 128GB Internal Expandable UP to 256 GB , Processor 2 x Gold 2.0 GHz + 6 x Silver 1.7 GHz, eMMC v5.1, Body - 2.5D Glass Back, USB Type-C, IR Blaster, Charger - 5V/2A, Super Low Light Mode, Quick Charge 4.0, Dual VoLTE, Two Days Battery, Aura Design, Gradient Reflective Glass Back, EIS for Video Recording, Studio Lighting Rear Fingerprint Scanner, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope, Sony IMX586 Sensor Contrast Ratio - 1500:1, NTSC Ratio - 81.41%, 2.5D Glass (In-front), Corning Gorilla Glass 5 (Front Glass), Dot Notch Dis Handset, SIM Ejector Tool, Soft Case, Manual, Adapter, Cable'),
(5, 'Samsung Galaxy M31', 9000, 11000, 4.3, '602641765', 1, 8, 8, 0, '64MP + 8MP + 5MP + 5MP rear camera | 32MP front facing camera 16.21 centimeters (6.4-inch) FHD+ capacitive touchscreen with 2340 x 1080 pixels resolution, 404 ppi pixel density and 16M color support Memory, Storage & SIM: 6GB RAM | 128GB storage expandable up to 512GB | Dual SIM with dual standby (4G+4G) Android v10.0 operating system with 2.3GHz + 1.7GHz Exynos 9611 Octa core processor 6000mAH lithium-ion battery 1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase Box also includes: Travel Adapter, USB Cable, Ejection Pin, User Manual Fast face unlock and fingerprint sensor | Dual SIM (nano+nano) with dual standby and dual VoLTE , Dedicated Sim slot;Widevine L1 certification for HD streaming'),
(6, 'HP 14q APU Dual Core A9', 19990, 20990, 5, '7.jpg', 2, 7, 7, 0, '(4 GB/256 GB SSD/Windows 10 Home) 14q-cy0006AU Thin and Light Laptop (14 inch, Jet Black, 1.47 kg)'),
(8, 'Gucci Kids Web Print T-Shirt', 450, 600, 5.1, '739715817', 3, 42, 39, 3, 'Crew neck Gucci KidsÂ® short sleeve tee with graphic at the chest. Straight hemline. 100% cotton. Machine wash cold, air dry. Imported. Measurements: Length: 19 in'),
(9, 'Gucci Kids Cotton Jersey', 900, 1000, 8, '934032633', 3, 9, 9, 0, 'Elevate their casual look with the short-sleeve GucciÂ® Kids Cotton Jersey w/ Gucci Print T-Shirt. The graphic tee is complete with a crew neckline, a retro-inspired Gucci and tiger graphic across the front, and a straight hem. 100% cotton. Hand wash cold, tumble dry low. Made in Italy. Measurements: Length: 23 in Chest Measurement: 17 in Sleeve Length: 11 1â„2 in'),
(10, 'Apple iPhone 7 Plus', 36999, 40999, 6.1, '774614295', 1, 4, 4, 0, '32 GB ROM | 13.97 cm (5.5 inch) Retina HD Display 12MP + 12MP | 7MP Front Camera Apple A10 Fusion 64-bit processor and Embedded M10 Motion Co-processor iOS 13 Compatible'),
(11, 'Nike Mens Shoes', 7000, 7100, 9.9, '473695775', 4, 4, 3, 1, 'Gender Type : Unisex, Age Type : Adult Middle Sole : Phylon & Polyurethane. Providing lockdown support & preventing cases of ankle twisting Toe Protection: Ergonomic fit & reinforcement. Resists damage and greater toe protection. Lateral Side : Synthetic overlays. Added support without compromising flexibility In-Box Contents: 1 Pair of Shoes'),
(12, 'Adidas Running Shoes', 3249, 3399, 5.5, '174061365', 4, 4, 4, 0, 'Puaro Ms Running Shoes For Men (Navy)'),
(13, 'OnePlus 7T Pro', 53990, 54990, 7, '197921490', 1, 12, 12, 0, '8 GB RAM | 256 GB ROM | 16.94 cm (6.67 inch) Quad HD+ Display 48MP +8MP+16MP | 16MP Dual Front Camera 4085 mAh Battery QualcommÂ® Snapdragonâ„¢ 855 Plus (Octa-core, 7nm, up to 2.96 GHz) , with Qualcomm AI Engine Processor'),
(17, 'Mi (32 inches) 4A Pro', 13000, 14999, 12, '650463449', 5, 8, 8, 0, 'Resolution: HD Ready Android TV (1366x768) | Refresh Rate: 60 hertz Connectivity: 3 HDMI ports to connect set top box, Blu Ray players, gaming console | 2 USB ports to connect hard drives and other USB devices Sound: 20 Watts Output | Dolby+ DTS-HD Smart TV features : Wi-Fi | PatchWall | Netflix | Prime Video | Hotstar and more | Android TV 9.0 |Google Assistant |Data Saver Display : LED Panel | HD Ready Warranty Information: 1 year warranty on product and 1 year extra on Panel Installation/Wall mounting/demo will be arranged by Amazon Home Services or Xiaomi service partner. For more information, please call Mi support on 1800-103-6286 Easy returns: This product is eligible for replacement within 10 days of delivery in case of any product defects, damage or features not matching the description provided'),
(16, 'Nike Revolution 5', 2769, 3000, 7, '519962337', 4, 7, 7, 0, 'This is a genuine product of Nike India Private Limited. The product comes with a standard brand warranty of 180 days.'),
(18, 'Nikon D3500 DSLR', 26000, 30000, 5, '554713623', 6, 7, 7, 0, 'This DSLR Camera Bundle comes complete with USA compatible accessories and a 1-Year Limited Seller Warranty\r\nNikon D3500 DSLR Camera (Import Model) - 24.2MP DX-Format CMOS Sensor - EXPEED 4 Image Processor - No Optical Low-Pass Filter - Native ISO 100-25600; 5 fps Shooting\r\nNikon AF-P DX NIKKOR 18-55mm f/3.5-5.6G VR Lens - F-Mount Lens/DX Format - 27-82.5mm (35mm Equivalent) - Aperture Range: f/3.5 to f/38 - Two Aspherical Elements\r\n2 x SanDisk 32GB SDHC Memory Cards + Deluxe Camera Case + Flash Light + Commander 3pc Filter Kit + Commander 4pc Macro Close-Up Kit + Lens Cap Keeper + AC/DC Car & Home Charger + Commander High Speed USB Card Reader + 50\" Camera Tripod\r\n0.43x Auxiliary Wideangle Lens - it conveniently mounts to the front of your fixed or zoom lens, and allows you to capture a wider field of view, 2.2x Auxiliary Telephoto Lens - brings you twice as close to the action. Perfect for long-distance photo situations such as sporting events');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cate`
--
ALTER TABLE `cate`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shopping`
--
ALTER TABLE `shopping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
