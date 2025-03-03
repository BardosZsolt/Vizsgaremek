-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 03. 13:23
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `fashionhub`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adresses`
--

CREATE TABLE `adresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `adress_line_1` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `adress_line_2` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `postal_code` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8_hungarian_ci NOT NULL,
  `consent` tinyint(1) NOT NULL,
  `reply` text COLLATE utf8_hungarian_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nick` varchar(64) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`id`, `message`, `consent`, `reply`, `created_at`, `nick`) VALUES
(7, 'halo', 1, 'szÃ©p napot', '2025-01-27 10:49:05', 'ubi'),
(8, 'tetszik az oldal', 1, 'Ã¶rÃ¼lÃ¶k hogy tetszik', '2025-02-12 12:09:01', 'zzz');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `login`
--

CREATE TABLE `login` (
  `lid` int(11) NOT NULL,
  `ldate` datetime NOT NULL,
  `lip` varchar(48) COLLATE utf8_hungarian_ci NOT NULL,
  `lsession` varchar(8) COLLATE utf8_hungarian_ci NOT NULL,
  `luid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `name` text COLLATE utf8_hungarian_ci NOT NULL,
  `email` text COLLATE utf8_hungarian_ci NOT NULL,
  `zipcode` int(11) NOT NULL,
  `city` text COLLATE utf8_hungarian_ci NOT NULL,
  `address` text COLLATE utf8_hungarian_ci NOT NULL,
  `payment_method` tinyint(1) NOT NULL,
  `status` char(1) COLLATE utf8_hungarian_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `order_date`, `name`, `email`, `zipcode`, `city`, `address`, `payment_method`, `status`, `updated_at`) VALUES
(0, 18, '663.00', '2025-02-13 15:55:16', '0', 'dog@gmail.com', 2316, 'TÃ¶kÃ¶l', 'nefelejcs utca 4', 0, '0', '2025-02-13 15:55:16'),
(0, 18, '663.00', '2025-02-13 15:55:16', '0', 'dog@gmail.com', 2316, 'TÃ¶kÃ¶l', 'nefelejcs utca 4', 0, '0', '2025-02-13 15:55:16'),
(0, 18, '663.00', '2025-02-13 15:55:54', '0', 'dog@gmail.com', 2316, 'TÃ¶kÃ¶l', 'nefelejcs utca 4', 0, '0', '2025-02-13 15:55:54'),
(0, 18, '663.00', '2025-02-13 15:55:54', '0', 'dog@gmail.com', 2316, 'TÃ¶kÃ¶l', 'nefelejcs utca 4', 0, '0', '2025-02-13 15:55:54'),
(0, 18, '663.00', '2025-02-13 15:57:09', '0', 'dog@gmail.com', 3233, 'KaposvÃ¡r', 'cigÃ¡nytÃ©r', 0, '0', '2025-02-13 15:57:09'),
(0, 18, '663.00', '2025-02-13 15:57:09', '0', 'dog@gmail.com', 3233, 'KaposvÃ¡r', 'cigÃ¡nytÃ©r', 0, '0', '2025-02-13 15:57:09'),
(0, 17, '663.00', '2025-02-17 12:29:55', '0', 'fikamatyi@gmail.com', 2316, 'BivalybasznÃ¡d', 'SzopÃ³ utca 8.', 0, '0', '2025-02-17 12:29:55'),
(0, 17, '663.00', '2025-02-17 12:29:55', '0', 'fikamatyi@gmail.com', 2316, 'BivalybasznÃ¡d', 'SzopÃ³ utca 8.', 0, '0', '2025-02-17 12:29:55'),
(0, 17, '663.00', '2025-02-17 12:30:35', '0', 'kora0321@gmail.com', 2316, 'TÃ¶kÃ¶l', 'Kossuth Lajos u. 78', 0, '0', '2025-02-17 12:30:35'),
(0, 17, '663.00', '2025-02-17 12:30:35', '0', 'kora0321@gmail.com', 2316, 'TÃ¶kÃ¶l', 'Kossuth Lajos u. 78', 0, '0', '2025-02-17 12:30:35'),
(0, 17, '663.00', '2025-02-17 12:52:58', '0', 'kora0321@gmail.com', 2316, 'TÃ¶kÃ¶l', 'Kossuth Lajos u. 78', 0, '0', '2025-02-17 12:52:58'),
(0, 17, '663.00', '2025-02-17 12:52:58', '0', 'kora0321@gmail.com', 2316, 'TÃ¶kÃ¶l', 'Kossuth Lajos u. 78', 0, '0', '2025-02-17 12:52:58'),
(0, 17, '663.00', '2025-02-17 12:56:47', '0', 'kora0321@gmail.com', 2316, 'TÃ¶kÃ¶l', 'Kossuth Lajos u. 78', 0, '0', '2025-02-17 12:56:47'),
(0, 17, '663.00', '2025-02-17 12:56:47', '0', 'kora0321@gmail.com', 2316, 'TÃ¶kÃ¶l', 'Kossuth Lajos u. 78', 0, '0', '2025-02-17 12:56:47');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_purchase` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` tinyint(1) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `pdescription` text COLLATE utf8_hungarian_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pstock` int(11) NOT NULL,
  `pimage_url` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `pcategory_id` int(11) NOT NULL,
  `pcreated_at` datetime NOT NULL,
  `pupdated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`pid`, `pname`, `pdescription`, `price`, `pstock`, `pimage_url`, `pcategory_id`, `pcreated_at`, `pupdated_at`) VALUES
(24, 'Fashionhub - Tee', 'Kényelmes', '450.00', 21, 'https://i.imgur.com/CxtJKEO.png', 1, '2025-03-03 00:00:00', '2025-03-03 00:00:00'),
(25, 'Fashionhub- Woman Tee', 'Tökéletes', '430.00', 231, 'https://i.imgur.com/H6x1EAa.png', 2, '2025-03-03 00:00:00', '2025-03-03 00:00:00'),
(26, 'Fashionhub - Tee', 'Tökéletes kényelmet nyújt a hétköznapokra!', '345.00', 32, 'https://i.imgur.com/jTSBVS3.png', 1, '2025-03-03 00:00:00', '2025-03-03 00:00:00'),
(27, 'Fashionhub - Tee', 'Tökéletes kényelmet nyújt a hétköznapokra!', '325.00', 20, 'https://i.imgur.com/l6ytNTJ.png', 1, '2025-03-03 00:00:00', '2025-03-03 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uemail` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `unick` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `upw` varchar(64) COLLATE utf8_hungarian_ci NOT NULL,
  `ubirth` date NOT NULL,
  `udate` datetime NOT NULL,
  `uip` varchar(48) COLLATE utf8_hungarian_ci NOT NULL,
  `usession` varchar(8) COLLATE utf8_hungarian_ci NOT NULL,
  `ustatus` varchar(5) COLLATE utf8_hungarian_ci NOT NULL,
  `ucomment` text COLLATE utf8_hungarian_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8_hungarian_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`uid`, `uemail`, `unick`, `upw`, `ubirth`, `udate`, `uip`, `usession`, `ustatus`, `ucomment`, `role`) VALUES
(15, 'asd@gmail.com', 'asd', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', '2024-10-11', '2024-10-02 12:47:05', '', '', '', '', 'admin'),
(16, 'ubi@gmail.com', 'ubi', 'fb9f6712075108573eef5ef4b0795191', '0000-00-00', '2025-01-27 11:48:49', '', '', '', '', 'user'),
(17, 'zzz@gmail.com', 'zzz', 'de88e3e4ab202d87754078cbb2df6063', '0000-00-00', '2025-02-12 13:08:05', '', '', '', '', 'user'),
(18, 'dog@gmail.com', 'dog', 'de88e3e4ab202d87754078cbb2df6063', '0000-00-00', '2025-02-13 14:01:09', '', '', '', '', 'user');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`);

--
-- A tábla indexei `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD KEY `pid` (`pid`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
