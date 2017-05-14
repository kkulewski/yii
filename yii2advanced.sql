-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Maj 2017, 22:20
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jezyk`
--

CREATE TABLE `jezyk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nazwa` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `jezyk`
--

INSERT INTO `jezyk` (`id`, `nazwa`) VALUES
(1, 'polski'),
(2, 'angielski'),
(3, 'niemiecki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nazwa` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `obrazek` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id`, `nazwa`, `opis`, `obrazek`) VALUES
(1, 'zwierzęta', 'różne zwierzęta', ''),
(2, 'rośliny', 'różne rośliny', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1493939397),
('m130524_201442_init', 1493939402),
('m140506_102106_rbac_init', 1494186819);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podkategoria`
--

CREATE TABLE `podkategoria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  `nazwa` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `obrazek` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `podkategoria`
--

INSERT INTO `podkategoria` (`id`, `kategoria_id`, `nazwa`, `opis`, `obrazek`) VALUES
(1, 1, 'zwierzęta domowe', 'słówka zwierzęta domowe', ''),
(2, 2, 'rośliny polskie', 'rośliny występujące w Polsce', ''),
(3, 1, 'zwierzęta hodowlane', 'zwierzęta hodowlane słowka', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `dostep` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `dostep`) VALUES
(1, 'admin', 'wDBsqWEPgh3W4x_e4zPVbrFCra0_Fn78', '$2y$13$xjK24EOy8NlgRRtG.X9wYuIOHqg/64QTi.t5Jt43.awbFSvsyNiHu', NULL, 'admin@admin.pl', 10, 1493939584, 1493939584, 1),
(2, 'testuser', 'r3T3CNs1YGLYTt0WBTyLYcqIfTgaNnQG', '$2y$13$9q9829BRTwU6YbhK3TItheR9L0S5mgqvaCrYPUFxCGyZOOGElUKsW', NULL, 'testuser@test.pl', 10, 1494078957, 1494078957, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wynik`
--

CREATE TABLE `wynik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konto_id` int(11) NOT NULL,
  `zestaw_id` int(11) NOT NULL,
  `data_wyniku` date NOT NULL,
  `wynik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `wynik`
--

INSERT INTO `wynik` (`id`, `konto_id`, `zestaw_id`, `data_wyniku`, `wynik`) VALUES
(1, 1, 1, '2017-05-10', 90);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zestaw`
--

CREATE TABLE `zestaw` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konto_id` int(11) NOT NULL,
  `jezyk1_id` int(11) NOT NULL,
  `jezyk2_id` int(11) NOT NULL,
  `podkategoria_id` int(11) NOT NULL,
  `nazwa` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zestaw` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ilosc_slowek` int(11) NOT NULL,
  `data_dodania` date NOT NULL,
  `data_edycji` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `zestaw`
--

INSERT INTO `zestaw` (`id`, `konto_id`, `jezyk1_id`, `jezyk2_id`, `podkategoria_id`, `nazwa`, `zestaw`, `ilosc_slowek`, `data_dodania`, `data_edycji`) VALUES
(1, 1, 1, 2, 1, 'Zwierzęta domowee 1', 'kot;cat\r\npies;dog\r\nchomik;hamster\r\nżółw;turtle\r\npapuga;parrot', 5, '0000-00-00', '0000-00-00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `jezyk`
--
ALTER TABLE `jezyk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `podkategoria`
--
ALTER TABLE `podkategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `wynik`
--
ALTER TABLE `wynik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zestaw`
--
ALTER TABLE `zestaw`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `jezyk`
--
ALTER TABLE `jezyk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `podkategoria`
--
ALTER TABLE `podkategoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `wynik`
--
ALTER TABLE `wynik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `zestaw`
--
ALTER TABLE `zestaw`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
