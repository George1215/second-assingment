-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 May 2017, 17:03:59
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `olx_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cell Phones', '2017-05-15 10:04:32', '2017-05-15 11:59:30'),
(5, 'Camera & Photo', '2017-05-15 11:59:41', '2017-05-15 11:59:41'),
(6, 'Clothing & Accessories', '2017-05-15 11:59:46', '2017-05-15 11:59:46'),
(7, 'Electronics (Consumer)', '2017-05-15 11:59:52', '2017-05-15 11:59:52'),
(8, 'Home & Garden', '2017-05-15 12:00:04', '2017-05-15 12:00:04'),
(9, 'Industrial & Scientific', '2017-05-15 12:00:18', '2017-05-15 12:00:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `topic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_14_213324_create_categories_table', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(8, '2017_05_14_213352_create_products_table', 3),
(10, '2017_05_15_224934_create_messages_table', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `price`, `description`, `year`, `image`, `report`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'Phasellus pulvinar', '343454', 'Phasellus pulvinar, orci vestibulum vestibulum maximus, nisi libero pharetra ex,', '4354', 'uploads/image_5919fe15c393b.jpg', 0, '2017-05-15 16:14:29', '2017-05-15 16:14:29'),
(2, 1, 7, 'Sed blandit lobortis lobortis', '454', 'Sed blandit lobortis lobortisSed blandit lobortis lobortis', '453', 'uploads/image_5919fec4835ec.jpg', 1, '2017-05-15 16:16:10', '2017-05-15 16:38:33'),
(3, 3, 8, 'Curabitur non ex imperdiet', '454', 'Curabitur non ex imperdiet Curabitur non ex imperdiet', '3434', 'uploads/image_5919fefe0bcae.jpg', 1, '2017-05-15 16:18:22', '2017-05-15 16:38:38'),
(4, 3, 9, 'Sed rhoncus nibh vel sodales', '6744', 'Sed rhoncus nibh vel sodales  Sed rhoncus nibh vel sodales', '345', 'uploads/image_5919ff23ead96.jpg', 0, '2017-05-15 16:18:59', '2017-05-15 16:18:59'),
(5, 3, 1, 'Aenean nec porta enim', '754', 'Aenean nec porta enim Aenean nec porta enim', '2017', 'uploads/image_5919ff560e923.jpg', 0, '2017-05-15 16:19:50', '2017-05-15 16:19:50'),
(6, 3, 9, 'User product', '4354', 'Nullam vestibulum vel mi a luctus. Sed rhoncus sem auctor magna dignissim malesuada.', '1900', 'uploads/image_591a43473afbd.jpg', 0, '2017-05-15 21:09:43', '2017-05-15 21:09:43'),
(7, 4, 7, 'Nullam eu nunc vitae metus malesuada ultricies', '234324', 'Nulla pretium turpis at felis mattis, in aliquam ante volutpat. Nullam ut congue turpis. In vestibulum leo nibh, eu mattis est sollicitudin a. Aliquam eu accumsan diam. Morbi sed porta nulla, eget tempus ex.', '1987', 'uploads/image_591afcbabe5c0.jpg', 0, '2017-05-16 10:12:18', '2017-05-16 10:20:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `phone`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'name@domain.com', 'admin', 'admin', '$2y$10$bzew2.GBYekbtzE9kdK1xO4515QLhv/zUtXhPUTGeYH3pDJ3hdama', '3454364', '1', '0h0vyS28rhTihLFFHlSsjsPhXLwXbS45I1ACN4T49E0cWl4Se1yCgiDs8NoD', '2017-05-15 14:47:24', NULL),
(3, 'user', 'davispatricktest@gmailx.com', 'Forrest', 'Test', '$2y$10$vwASESeYOST4hm6SKHCll.c9wbFBo6y6RIfrAAN6On3Hi8IO94keq', '3223443', '2', 'Z0ZQui9WYXShKuqdV00e57QtWHJ9WfCfHf8LiPZDVgyqwhu9BG2pxQ6WcbQF', '2017-05-15 16:57:10', '2017-05-15 16:57:10'),
(4, 'test', 'test@gmail.com', 'Test', 'Yoo', '$2y$10$FZ1x1njIBOhfHVuAbUK3V.o4WAt826z0zIoaR6cC4J2tJkoUowNwe', '34534', '2', 'ibdPe6UxGaoj3FEh4Qljvqkm4KAj3HNyJl5buyNwrKxgOgFJvWvqg9lZ3rPH', '2017-05-16 09:14:59', '2017-05-16 09:14:59');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
