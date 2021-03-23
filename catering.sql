-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Gru 2019, 11:23
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `catering`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `caterings`
--

CREATE TABLE `caterings` (
  `id` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Godzina_realizacji` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `caterings`
--

INSERT INTO `caterings` (`id`, `Nazwa`, `Godzina_realizacji`, `created_at`, `updated_at`, `employee_id`) VALUES
(12, 'Pomidorek', '12:00', '2019-11-17 20:22:49', '2019-11-17 20:22:49', 10),
(13, 'Ogórek', '15:00', '2019-12-13 14:23:56', '2019-12-13 14:23:56', NULL),
(14, 'Brzoskwinia', '15:00', '2019-12-18 17:11:52', '2019-12-18 17:11:52', NULL),
(15, 'Cytryna', '16:00', '2019-12-18 17:12:02', '2019-12-18 17:12:02', NULL),
(16, 'Blabla', '12:00', '2019-12-18 17:12:11', '2019-12-18 17:12:11', 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `daily_orders`
--

CREATE TABLE `daily_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `Dzien` date NOT NULL,
  `Zamowienia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dishes`
--

CREATE TABLE `dishes` (
  `id` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cena` int(11) NOT NULL,
  `Kalorycznosc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Menu_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `dishes`
--

INSERT INTO `dishes` (`id`, `Nazwa`, `Cena`, `Kalorycznosc`, `Menu_id`, `created_at`, `updated_at`) VALUES
(1, 'Szarlotka', 77, '41', 3, '2019-11-17 20:55:36', '2019-11-17 20:56:50'),
(3, 'Pomidorek2', 21, '123', 3, '2019-12-13 14:03:35', '2019-12-13 14:03:35'),
(4, 'Brzoskwinia', 7, '103', 7, '2019-12-18 18:07:15', '2019-12-18 18:08:11'),
(5, 'Cytryna', 4, '103', 7, '2019-12-18 18:07:30', '2019-12-18 18:08:19');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `Imie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nazwisko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pesel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stanowisko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kwota_dofinansowania` int(11) DEFAULT NULL,
  `Pozostała_kwota` int(11) DEFAULT NULL,
  `Uprawnienia` int(11) NOT NULL,
  `Catering_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `employees`
--

INSERT INTO `employees` (`id`, `Imie`, `Nazwisko`, `Pesel`, `Email`, `password`, `Stanowisko`, `Kwota_dofinansowania`, `Pozostała_kwota`, `Uprawnienia`, `Catering_id`, `created_at`, `updated_at`, `remember_token`) VALUES
(10, 'Dawid', 'Miklas', '11111111111', 'patate@gmail.com', '$2y$10$uUYRbyYn1uRs8cYr7Mz6ve5eaTg51ocMk8A1H4V09gaxMH3bIrYGu', 'Terminator', 0, 0, 2, 12, '2019-11-17 20:38:27', '2019-12-13 12:36:41', NULL),
(12, 'Mariusz', 'Pudzianowski', '11111111112', 'blabla2@gmail.com', '$2y$10$Ao//Bd/qH.QiZIFYXWE73OrOar.L06cHVffSwzCMaU0KJfDmIYSki', 'Terminator', 0, 0, 1, NULL, '2019-12-13 12:34:16', '2019-12-13 13:54:13', NULL),
(13, 'Marcin', 'Brzechwa', '90090515836', 'blabla3@gmail.com', '$2y$10$PLjjpK7i97zvpXXQDHh6buhcSF8A3Kuv31YG6QJoIcFJLxVBDHl4W', 'Kierowca taksówki', 300, 300, 3, NULL, '2019-12-13 12:35:02', '2019-12-13 12:35:02', NULL),
(15, 'elo', 'elo', '11111111115', 'blabla5@gmail.com', '$2y$10$a1z5S.juKq717NY1H.pumePsWTl7EyAht./uJoOLKDfVqQFskC/WK', 'operator bierkow pod woda', 0, 0, 2, 15, '2019-12-18 17:34:50', '2019-12-18 17:34:50', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `Nazwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Catering_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `menus`
--

INSERT INTO `menus` (`id`, `Nazwa`, `Catering_id`, `created_at`, `updated_at`) VALUES
(3, 'Pomidorek', 12, '2019-11-17 20:22:49', '2019-11-17 20:22:49'),
(4, 'Ogórek', 13, '2019-12-13 14:23:56', '2019-12-13 14:23:56'),
(5, 'Brzoskwinia', 14, '2019-12-18 17:11:52', '2019-12-18 17:11:52'),
(6, 'Cytryna', 15, '2019-12-18 17:12:02', '2019-12-18 17:12:02'),
(7, 'Blabla', 16, '2019-12-18 17:12:12', '2019-12-18 17:12:12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_11_12_122251_create_caterings_table', 1),
(2, '2019_11_12_133844_create_menus_table', 1),
(3, '2019_11_13_123623_create_employees_table', 1),
(4, '2019_11_13_135051_create_dishes_table', 1),
(5, '2019_11_13_140931_create_orders_table', 1),
(6, '2019_11_13_141802_create_daily_orders_table', 1),
(7, '2019_12_18_195818_create_order_dishes_table', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `Data zamówienia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Pracownik_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_dishes`
--

CREATE TABLE `order_dishes` (
  `id` int(10) UNSIGNED NOT NULL,
  `Potrawa_id` int(10) UNSIGNED NOT NULL,
  `Zamowienie_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `caterings`
--
ALTER TABLE `caterings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `daily_orders`
--
ALTER TABLE `daily_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_orders_zamowienia_id_foreign` (`Zamowienia_id`);

--
-- Indeksy dla tabeli `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_menu_id_foreign` (`Menu_id`);

--
-- Indeksy dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Pesel` (`Pesel`),
  ADD KEY `employees_catering_id_foreign` (`Catering_id`);

--
-- Indeksy dla tabeli `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_catering_id_foreign` (`Catering_id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `orders_pracownik_id_foreign` (`Pracownik_id`);

--
-- Indeksy dla tabeli `order_dishes`
--
ALTER TABLE `order_dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_dishes_zamowienia_id_foreign` (`Zamowienie_id`),
  ADD KEY `order_dishes_potrawa_id_foreign` (`Potrawa_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `caterings`
--
ALTER TABLE `caterings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `daily_orders`
--
ALTER TABLE `daily_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `order_dishes`
--
ALTER TABLE `order_dishes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `daily_orders`
--
ALTER TABLE `daily_orders`
  ADD CONSTRAINT `daily_orders_zamowienia_id_foreign` FOREIGN KEY (`Zamowienia_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_menu_id_foreign` FOREIGN KEY (`Menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_catering_id_foreign` FOREIGN KEY (`Catering_id`) REFERENCES `caterings` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_catering_id_foreign` FOREIGN KEY (`Catering_id`) REFERENCES `caterings` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_pracownik_id_foreign` FOREIGN KEY (`Pracownik_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `order_dishes`
--
ALTER TABLE `order_dishes`
  ADD CONSTRAINT `order_dishes_potrawy_id_foreign` FOREIGN KEY (`Potrawa_id`) REFERENCES `dishes` (`id`),
  ADD CONSTRAINT `order_dishes_zamowienia_id_foreign` FOREIGN KEY (`Zamowienie_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
