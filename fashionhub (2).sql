-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Jan 27. 14:27
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
(7, 'halo', 1, 'szÃ©p napot', '2025-01-27 10:49:05', 'ubi');

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
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

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
(5, 'tibi csoki', 'tejes', '1000.00', 2, 'https://evedd.hu/img/74418/4823077639890/4823077639890.webp', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'gay chan tiger', 'oversized', '331.00', 21, 'https://m.media-amazon.com/images/I/81l+hL-FAOL._AC_SL1500_.jpg', 1, '2025-01-27 00:00:00', '2025-01-27 00:00:00'),
(11, 'big shaq tee', 'dagadtaknak', '211.00', 12, 'https://img4.dhresource.com/webp/m/0x0/f3/albu/jc/o/01/70ed5aa7-1541-4e19-862a-f3c301cc908a.jpg', 1, '2025-01-27 00:00:00', '2025-01-27 00:00:00'),
(13, 'hairy nigga', 'szoros test', '123.00', 123, 'https://i.ebayimg.com/images/g/MhIAAOSwewhghoaL/s-l400.jpg', 1, '2025-01-27 00:00:00', '2025-01-27 00:00:00'),
(14, 'asshole suck tee', 'te problemad ocsipok', '246.00', 321, 'https://s.turbifycdn.com/aah/yhst-95178242420387/your-problem-is-obvious-t-shirt-funny-tee-17.jpg', 1, '2025-01-27 00:00:00', '2025-01-27 00:00:00'),
(15, 'ikea szatyor', 'szatyor', '111.00', 12, 'https://i.redd.it/fhsv9hq276j21.jpg', 1, '2025-01-27 00:00:00', '2025-01-27 00:00:00'),
(16, 'borat seggbevago', 'kicsit bevag a lukadba', '321.00', 213, 'https://mankini.com/cdn/shop/products/BoratSuspenderMankiniThong-boratthong-15.jpg?v=1650634493&width=1946', 1, '2025-01-27 00:00:00', '2025-01-27 00:00:00'),
(18, 'snigga khalifa', 'ki vagy ha ehes vagy', '626.00', 123, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBQZIxzgXRruhYSnimNG8qdIgxPO-G8Gv-wQ&s', 2, '2025-01-27 00:00:00', '2025-01-27 00:00:00'),
(19, 'oreo szenvics', 'kremes', '313.00', 232, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC1nCoG0evAALFy9IDje4TIcDoA0josHtthg&s', 2, '2025-01-27 00:00:00', '2025-01-27 00:00:00'),
(20, 'i love csoki', 'szeretem a csokit', '313.00', 251, 'https://www.xtees.com/uploads/products/images/primary/chocolate-printed-kids-t-shirt_1682428855.jpg', 2, '2025-01-27 00:00:00', '2025-01-27 00:00:00'),
(21, 'borat seggbevago szivarvany', 'ha meleg vagy nem vag be', '312.00', 231, 'https://www.temashop.se/media/catalog/product/cache/cat_resized/1200/0/p/r/pride_mankini_maskeraddrakter_regnbaagsdrakter.jpg', 1, '2025-01-27 00:00:00', '2025-01-27 00:00:00'),
(22, 'latex suit', 'kulonleges alkalmakra', '914.00', 231, 'https://www.slickitup.com/cdn/shop/products/GothamSuitsideSIU_1600x.jpg?v=1600392870', 1, '2025-01-27 00:00:00', '2025-01-27 00:00:00');

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
(16, 'ubi@gmail.com', 'ubi', 'fb9f6712075108573eef5ef4b0795191', '0000-00-00', '2025-01-27 11:48:49', '', '', '', '', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
