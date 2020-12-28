-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 04:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainusers`
--

-- --------------------------------------------------------

--
-- Table structure for table `theproducts`
--

CREATE TABLE `theproducts` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(21,3) NOT NULL,
  `quantity` decimal(21,3) NOT NULL,
  `unit_price` decimal(21,3) NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quality` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theproducts`
--

INSERT INTO `theproducts` (`id`, `category`, `item`, `price`, `quantity`, `unit_price`, `unit`, `quality`, `description`, `place`, `seller`, `image`, `datetime`) VALUES
(1, 'phone', 'wiko', '0.000', '0.000', '0.000', '', '', '', 'Ruaka', 'Climax', '', '2020-11-13 14:14:17'),
(2, 'phone', 'wiko', '20000.000', '2.000', '10000.000', 'phone', '3', '2015 Wiko Robby', 'Ruaka', 'Climax Electronics', '', '2020-11-13 14:42:42'),
(3, 'good', '', '0.000', '0.000', '0.000', '', '0', '', '', '', '', '2020-11-13 14:55:41'),
(4, 'Furniture', '4X6 Bed', '10000.000', '1.000', '10000.000', 'bed', '2', 'Wooden Bed', 'Ruaka', 'Local Carpenters', '', '2020-11-13 15:46:03'),
(5, 'Packaging Bags', '#15', '150.000', '50.000', '3.000', 'Bag', '3', 'Non woven smallest bags', 'Ruaka', 'Joel', '', '2020-11-13 19:28:26'),
(6, 'Cars', 'Probox', '400000.000', '1.000', '400000.000', 'car', '3', 'KXA 000A', 'Ngorika', '0712345678', '', '2020-11-13 22:12:08'),
(7, 'Food', 'Bread', '50.000', '400.000', '0.000', 'grams', '0', 'Mkate wa kawaida', 'General', 'Local Shop', '', '2020-11-13 22:20:11'),
(8, 'Food', 'Birthday cake', '500.000', '300.000', '1.000', 'gram', '2', 'Chocolate Cake', 'Imagined', 'Imagined', '', '2020-11-13 22:32:19'),
(9, 'Food', 'Cake', '250.000', '0.000', '500.000', 'kg', '2', 'Strawberry Cake', 'Imagined', 'Imagined', '', '2020-11-13 22:41:09'),
(10, 'Food', 'Milk', '50.000', '0.000', '100.000', 'litre', '2', 'Farmer\\\'s cow milk - unprocessed', 'Nyandarua', 'Local Farmers', '', '2020-11-13 22:46:09'),
(11, 'Food', 'Bananas', '20.000', '3.000', '6.000', 'banana', '2', 'Bananas to eat', 'Ruiru', 'Local Market', '', '2020-11-13 23:53:57'),
(12, 'Food', 'Onions', '20.000', '3.000', '6.000', 'onion', '2', 'Check', 'Imagined', 'Imagined', '', '2020-11-14 00:17:04'),
(13, 'Food', 'Irish Potatoes', '20.500', '3.000', '6.833', 'potato', '2', 'Kinang\\\'op potatoes', 'Eastleigh', 'Local Market', '', '2020-11-14 00:34:14'),
(14, 'Construction', 'Blue Triangle Cement', '600.000', '50.000', '12.000', 'kg', '8', 'Strong and Durable', 'Nakuru', 'Mache Hardware', '', '2020-11-14 15:17:39'),
(15, 'Technical', 'Lyons LED Bulbs', '1000.000', '30.000', '33.333', 'bulb', 'Not Sure', 'Lyons LED Bulbs', 'Nakuru', 'General Wholesaler', '', '2020-11-14 15:20:25'),
(16, 'Furniture', 'L-Shape 5 Seater Sofa', '65000.000', '1.000', '65000.000', 'set', '2', 'Very Comfortable with 7 throw pillows.', 'Eastleigh', 'Ally Baba', '', '2020-11-14 21:08:43'),
(17, 'House Decor', 'Carpet', '4000.000', '1.000', '4000.000', 'carpet', 'Very Good', 'Woolen durable nice carpet, size unknown', 'Ngorika', 'Margaret Shish', '', '2020-11-14 21:16:48'),
(18, 'Food', 'Chocolate Sweets', '65.000', '80.000', '0.813', 'sweet', 'Excellent', 'Oh, so mouth watering, you will want more.', 'Lanet', 'Joel Wholesaler', '', '2020-11-14 21:19:04'),
(19, 'Kitchenware', 'Spoons', '20.000', '1.000', '20.000', 'spoon', 'Very Good', 'Stainless steel, smooth and comfortable.', 'Two Rivers KE', 'Carrefour', '', '2020-11-14 21:22:21'),
(20, 'Books', 'Holy Bible', '800.000', '1.000', '800.000', 'Bible', 'Excellent', 'New Living Translation', 'Nairobi', 'Life Church International', '', '2020-11-14 21:24:13'),
(21, 'Food', 'Mangoes', '50.000', '3.000', '16.667', 'mango', 'Very Good', 'Maembe dodo kubwa kubwa', 'Joyland', 'Local Market', '', '2020-11-14 21:26:54'),
(22, 'Electronics', 'Shuer Headphone', '350.000', '1.000', '350.000', 'headphone', 'Standard', 'Nice Stereo Headphones', 'Nairobi CBD', 'Recommended Retail Price', '', '2020-11-14 21:35:58'),
(23, 'Fashion', 'Nike Shoes', '3500.000', '1.000', '3500.000', 'shoe', 'Excellent', 'Beautiful shoes', 'Nairobi', 'Imagined', '', '2020-11-16 15:30:08'),
(24, 'Fashion', 'Nike Shoes', '3500.000', '1.000', '3500.000', 'shoe', 'Excellent', 'Beautiful shoes', 'Nairobi', 'Imagined', '', '2020-11-16 15:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `theusers`
--

CREATE TABLE `theusers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `hashedpassword` text COLLATE utf8_unicode_ci NOT NULL,
  `profpic` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'profileimages/user.png',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theusers`
--

INSERT INTO `theusers` (`id`, `username`, `email`, `phone`, `hashedpassword`, `profpic`, `date`) VALUES
(7, 'Queen', 'precious@joel.heart', 127, '$2y$10$PByVAxedsRcwaIQVAPSvwuJc5GVI4W5Aa5Q4F8KULf73zhB4VCl1y', 'profileimages/user.png', '2020-12-28 13:46:57'),
(11, 'Joel', 'njoroge.joel2@gmail.com', 729515373, '$2y$10$P56LHBSP7ighLfuDGniIue0q0KaC7Ieajy78qEmC08GkSIroMR1rq', 'profileimages/11.jpg', '2020-12-28 13:46:57'),
(12, 'Joel', 'man@man.com', 729515273, '$2y$10$afY2jUrBJ3772lXI8FJoguicgPXOEBZAXAWRY3Xp/ezp6BdhMst6.', 'profileimages/12.jpg', '2020-12-28 13:46:57'),
(13, 'Njoroge', 'joel@precious.heart', 729515273, '$2y$10$.7xBetAgCUAxGc/l82AB9OnftzHbfy/Ze9k1Cq5Liva/HKxMaZKwS', 'profileimages/user.png', '2020-12-28 13:46:57'),
(14, 'King', 'joel@heart.precious', 729515373, '$2y$10$iXMQB8UikBDcoiavV7RCdO0r/QVWCR.PI/UFT13PjcMCse4/iDvEa', 'profileimages/user.png', '2020-12-28 13:46:57'),
(15, 'Precious', 'precious@heart.joel', 712673367, '$2y$10$0W0UA4MRM.PfUzfK1PwogOUplqFuHzWW/zmNRMkjCpNODdWPm/8Ra', 'profileimages/user.png', '2020-12-28 13:46:57'),
(16, 'guy', 'me@pv.ke', 729515373, '$2y$10$t0v4vFZdDWNAh65qAbIPqu8sTWTzXYevIPO8oFKbFpMtiL5z8toy6', 'profileimages/user.png', '2020-12-28 13:46:57'),
(17, 'ab', 'ab@ab.com', 729515273, '$2y$10$R8AAjH7yCKaLiPiB38p5ouTKUAveM1GXR1g/hx8We0UJpt2IMbwNy', 'profileimages/user.png', '2020-12-28 13:46:57'),
(18, 'Joel', 'bizvickventurez@gmail.com', 729515373, '$2y$10$AO8ZewflITEnr6JthkDdgOQjS/pb2yAFUmE1eaU52O4.DOdS5q3k.', 'profileimages/user.png', '2020-12-28 13:46:57'),
(19, 'Waweru', 'waweru@joel.com', 729515273, '$2y$10$un8JO9q7clRIG387NmsjZeKE8esxXZxJE0NTqw9uJg9cRWj4pRy3K', 'profileimages/user.png', '2020-12-28 13:46:57'),
(20, 'Rahab', 'njeri.rahab@yahoo.com', 707368984, '$2y$10$6zbyio8VAxYimJo0QfX8K.uI0lFYY/rXY5pet3wAPYzgfg4H2H6Py', 'profileimages/user.png', '2020-12-28 13:46:57'),
(21, 'Customer', 'customer@superworkmates.com', 700000000, '$2y$10$oQsn9JtSNMvY4WmZGH6q7.kZc2XKsoJv5bho1KkZzMoz3k0RFQfYm', 'profileimages/user.png', '2020-12-28 13:46:57'),
(22, 'JESUS', 'jesus@godslove.heaven', 729515373, '$2y$10$kptegpghXgn3Dc0usTEUJOpTzAg.jaAV4oitMTIE3aVvdxjF9YLVi', 'profileimages/user.png', '2020-12-28 13:46:57'),
(23, 'Bizvick', 'bizvick@bizvick.com', 729515373, '$2y$10$VYrssyOaeFUxbemOO7sqwuVb.ZJEhVTb1Hvlg.g7Jz6Y/y.h7Xak6', 'profileimages/user.png', '2020-12-28 13:46:57'),
(24, 'Joel', 'njorogewaweru@now.now', 729515273, '$2y$10$4I/YS5eTVBApA.e5CC79G.hBJKwp.4wEZTCdC/qyflMMtiatJ9Gvy', 'profileimages/user.png', '2020-12-28 13:46:57'),
(25, 'Joel', 'mimi@leo.com', 729515273, '$2y$10$6zGjsekftAgW6W70iLIkF.u0deJLY3mlqrecK/I.LAQ3yxQZdrV8a', 'profileimages/user.png', '2020-12-28 13:46:57'),
(26, 'Mkubwa', 'mkubwa@mkubwa.com', 729515273, '$2y$10$XdVktUYaqk.qvpqnrG3f0uGOuGlHKZB3Hfav2s8c4grpJ4gU41HKO', 'profileimages/user.png', '2020-12-28 13:46:57'),
(27, 'Joel', 'joel@njoroge.waweru', 729515273, '$2y$10$lMJgcQCWAU6ny.yQZvoQ/.hC.ok4gE3NtLgrmF9N5lH6.6XZc/UXe', 'profileimages/user.png', '2020-12-28 13:46:57'),
(28, 'kk', 'kk@gmail.com', 729515273, '$2y$10$hKJ8s3OxVHZnwfH5sEXaQeSJYJ.A.cSd3ZWFylWLec7aeGwrbinDS', 'profileimages/user.png', '2020-12-28 13:46:57'),
(29, 'Back', 'back@code.job', 729515273, '$2y$10$oVNfLX.czw5RcVfcFx1TlOLd8oOdz74JdXwlEuir3FuPZT9R4dfzq', 'profileimages/user.png', '2020-12-28 13:46:57'),
(30, 'Toto', 'toto@preciousjoel.heart', 712673367, '$2y$10$n/BN0Kp8okPiyRVJhhuSzOMLtufkBXHmZnXzfULTwY339K0hVCIOe', 'profileimages/30.jpg', '2020-12-28 13:46:57'),
(31, 'Joel.Njoroge', 'njoroge@superworkmates.com', 729515273, '$2y$10$3nt/PQR.sMzLAmRCNeSzC.QIFIaszhojKDG52SeGOIBR1CcRjsGVG', 'profileimages/user.png', '2020-12-28 13:46:57'),
(32, 'Love-Love', 'love@honeypie.love', 729673367, '$2y$10$u98EcPxaQ8myzsxhzZeg8OVTosg8cHAi8lYlEsISPcJkyD9reA4k.', 'profileimages/user.png', '2020-12-28 13:46:57'),
(33, 'Joel Njoroge', 'joel@njorge.waweru', 707010101, '$2y$10$tt73p8K3UXgmRQXksMVx0uuxnSK7ksABlGa2z7t.oN2xkxLWyKQ1C', 'profileimages/user.png', '2020-12-28 13:46:57'),
(34, 'Joel', 'njoroge.joel2@mail.com', 729515371, '$2y$10$eX.fgi0NqZ3bH0fEIw9OgemR4PTLM/vrMeGe/Xuyu1YrK5t/bx/Nu', 'profileimages/user.png', '2020-12-28 13:46:57'),
(35, 'user1', 'user1@users.superworkmates', 1234567890, '$2y$10$O1.OA.N7Jk6ll2TAO.MXTuD/K1TSDCFvka9CuhIMJF31QpMXp0L26', 'profileimages/user.png', '2020-12-28 13:46:57'),
(36, 'Kamau', 'kamau@wakasu.transport', 1, '$2y$10$SvMhYVpqD8o/.ArF4umOkOHr5AL2ihyfdmbV7WDlKLJe6VBcvna36', 'profileimages/user.png', '2020-12-28 13:46:57'),
(37, 'ab', 'ab@ab.ab', 3, '$2y$10$/Tsoaye3xbvqLszUuyPTROVw2htX202xOPChwlGU6aWnj76BVG1i2', 'profileimages/user.png', '2020-12-28 13:46:57'),
(38, 'ta', 'ta@ta.ta', 4, '$2y$10$hjwCWIWQzntqkaMSxchc6OKlgqXAhoU.GJCEiq/GxgBfuZs0vxWqO', 'profileimages/user.png', '2020-12-28 13:46:57'),
(39, 'Song', 'sing@sing.song', 12, '$2y$10$JyyqgV2iQz.kolwFAJURp.ehWBlYLRffUP32oa0ZazxMmV648Tt2W', 'profileimages/user.png', '2020-12-28 13:46:57'),
(40, 'Joel', 'njoroge.joel2@gmail.co', 712675267, '$2y$10$OBxmfPCbiI1M.zt3Pfytb.HLVg3HEJuY7afXOFjwRTP4mkEHqmbX6', 'profileimages/user.png', '2020-12-28 13:46:57'),
(41, 'J.me', 'j@me.me', 729675267, '$2y$10$hNPx24t0aiJAwRjdK5okUeMNuzWlCcZLJIsDX1NzX6DqRU.S8aEy.', 'profileimages/user.png', '2020-12-28 13:46:57'),
(42, 'joel1', 'j@j.j', 0, '$2y$10$JB8nDd9CpiTOXZbcgUHj1OHZACUJ/iYc6qE28tqkcZTevdFNqB4RW', 'profileimages/user.png', '2020-12-28 13:46:57'),
(43, 'Joe', 'joe@superworkmates.com', 729515200, '$2y$10$idaJSe0IDKhy0jySQxEzsehySa1PXVWjcHBaRZs8d3ArozHNYJK46', 'profileimages/user.png', '2020-12-28 13:46:57'),
(44, 'joseh', 'joseh@superworkmates.com', 758826552, '$2y$10$0I2NyVpqrxeyy5FgbfdzKuBhmX6cV2/Gt/l0/39L8yQlSq776ISK6', 'profileimages/user.png', '2020-12-28 13:56:50'),
(45, 'Leo', 'leo@leo.leo', 798765432, '$2y$10$Kl0cTK5xAvZWDC54ifQmiuRT3cMIlpogQZC0MJDchm6zwwbJlgklK', 'profileimages/45.png', '2020-12-28 14:04:28'),
(46, 'Simon', 'simon@climax.com', 710435520, '$2y$10$5e50EUrevQoFqAw5EbV7hemoUYxSAdYFg1wWUGYl65yiKFkyFGlT6', 'profileimages/46.jpg', '2020-12-28 14:09:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `theproducts`
--
ALTER TABLE `theproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theusers`
--
ALTER TABLE `theusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `theproducts`
--
ALTER TABLE `theproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `theusers`
--
ALTER TABLE `theusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
