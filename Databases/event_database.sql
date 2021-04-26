-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2021 pada 09.13
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efun`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_book`
--

CREATE TABLE `event_book` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `event_id` varchar(36) NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_qty` int(11) DEFAULT NULL,
  `booking_price` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_get`
--

CREATE TABLE `event_get` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `icon_url` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_type`
--

CREATE TABLE `event_type` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `name` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(30) DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL COMMENT 'hour,day'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event_type`
--

INSERT INTO `event_type` (`id`, `name`, `created_date`, `updated_date`, `deleted`, `created_by`, `updated_by`, `uom`) VALUES
('1ed36f57-a1d8-11eb-9692-00f48dc381a4', 'Event baru', '2021-04-20 07:58:36', '2021-04-20 13:04:54', 1, 'Testing', 'Testing', 'day'),
('4b71598a-91ee-11eb-b88b-00f48dc381a4', 'Seminar', '2021-03-31 06:57:03', '2021-04-20 08:05:06', 0, NULL, 'Testing', 'hour'),
('4b716eb4-91ee-11eb-b88b-00f48dc381a4', 'Tour', '2021-03-31 06:57:03', '2021-03-31 06:57:03', 0, NULL, NULL, 'day');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_event`
--

CREATE TABLE `m_event` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `name` varchar(50) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `time_event` varchar(15) NOT NULL,
  `event_get` varchar(30) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `is_refund` tinyint(1) NOT NULL DEFAULT 1,
  `is_reservation` tinyint(1) NOT NULL DEFAULT 1,
  `is_ots` tinyint(1) NOT NULL DEFAULT 1,
  `banner_image` varchar(50) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `time_code` varchar(5) DEFAULT NULL,
  `terms` longtext DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(30) DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `user_type_code` varchar(2) NOT NULL,
  `image` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(30) DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `phone`, `email`, `password`, `user_type_code`, `image`, `created_date`, `updated_date`, `deleted`, `created_by`, `updated_by`) VALUES
('5ec6313f-a1d8-11eb-9692-00f48dc381a4', 'Lana', 'Dotson', 'F', '+1 (355) 232-32', 'posorefut@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '02', NULL, '2021-04-20 08:00:23', '2021-04-20 13:04:32', 1, 'Testing', 'Testing'),
('92cfe437-99f5-11eb-a64f-00f48dc381a4', 'diaz', 'erlangga', 'M', '081213157673', 'diazerlanggaputra@ymail.com', 'e10adc3949ba59abbe56e057f20f883e', '01', 'assets/images/user/40ea6333d33c72720e71ed612929cb7a.png', '2021-04-10 07:09:17', '2021-04-10 07:22:33', 0, 'Testing', 'Testing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_type`
--

CREATE TABLE `user_type` (
  `codes` varchar(2) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(30) DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_type`
--

INSERT INTO `user_type` (`codes`, `name`, `created_date`, `updated_date`, `deleted`, `created_by`, `updated_by`) VALUES
('01', 'admin', '2021-03-31 07:00:51', '2021-03-31 07:00:51', 0, NULL, NULL),
('02', 'user', '2021-03-31 07:00:51', '2021-03-31 07:00:51', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `event_book`
--
ALTER TABLE `event_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `event_get`
--
ALTER TABLE `event_get`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_event`
--
ALTER TABLE `m_event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_code` (`user_type_code`);

--
-- Indeks untuk tabel `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`codes`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `event_get`
--
ALTER TABLE `event_get`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `event_book`
--
ALTER TABLE `event_book`
  ADD CONSTRAINT `event_book_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `m_event` (`id`),
  ADD CONSTRAINT `event_book_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_code`) REFERENCES `user_type` (`codes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
