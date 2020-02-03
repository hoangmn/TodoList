-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th2 03, 2020 lúc 09:33 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_todolistproject`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event`
--

CREATE TABLE `event` (
  `id` int(8) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preview` text COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `start_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_time` datetime NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `event`
--

INSERT INTO `event` (`id`, `title`, `preview`, `detail`, `start_time`, `end_time`, `created_time`, `updated_time`, `status`) VALUES
(1, 'Plan 01222', 'This in plan 01 intro', '\"This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content ', '2020-02-01 10:00:00', '2020-02-01 01:00:00', '2020-02-01 07:13:36', '2020-02-03 09:28:43', 0),
(2, 'Plan 01', 'This in plan 01 intro', 'This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content ', '2020-02-01 10:00:00', '2020-02-01 13:00:00', '2020-02-01 07:13:41', '2020-02-01 07:13:41', 1),
(3, 'Plan 02', 'This in plan 02 intro', 'This is plan 02 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content ', '2020-02-02 10:00:00', '2020-02-02 13:00:00', '2020-02-01 07:14:14', '2020-02-01 07:14:14', -1),
(34, 'New Plan', 'This is review', 'Nothing', '2020-02-03 11:00:00', '2020-02-03 02:00:00', '2020-02-03 08:25:11', '2020-02-03 08:25:11', -1),
(35, 'Plan 01', 'This in plan 01 intro', '\"This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content This is plan 01 detail content ', '2020-02-01 10:00:00', '2020-02-01 01:00:00', '2020-02-03 09:05:26', '2020-02-03 09:05:26', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `event`
--
ALTER TABLE `event`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
