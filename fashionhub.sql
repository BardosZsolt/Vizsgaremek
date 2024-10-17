-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Okt 03. 11:00
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
-- Adatbázis: `liftzone`
--

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
-- Tábla szerkezet ehhez a táblához `note`
--

CREATE TABLE `note` (
  `nid` int(11) NOT NULL,
  `ndate` datetime NOT NULL,
  `nip` varchar(48) COLLATE utf8_hungarian_ci NOT NULL,
  `nsession` varchar(8) COLLATE utf8_hungarian_ci NOT NULL,
  `nuid` int(11) NOT NULL,
  `nurl` varchar(250) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

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
  `ucomment` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`uid`, `uemail`, `unick`, `upw`, `ubirth`, `udate`, `uip`, `usession`, `ustatus`, `ucomment`) VALUES
(15, 'asd@gmail.com', 'asd', 'b23cf2d0fb74b0ffa0cf4c70e6e04926', '2024-10-11', '2024-10-02 12:47:05', '', '', '', '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`);

--
-- A tábla indexei `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`nid`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `note`
--
ALTER TABLE `note`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
