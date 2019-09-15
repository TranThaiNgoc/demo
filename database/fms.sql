-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 11, 2019 lúc 10:17 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bu`
--

CREATE TABLE `bu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `address` text,
  `bucategory_id` int(11) DEFAULT NULL,
  `tax` varchar(20) DEFAULT NULL,
  `follow` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bu`
--

INSERT INTO `bu` (`id`, `name`, `code`, `address`, `bucategory_id`, `tax`, `follow`, `mail`, `phone`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 'Công Ty a', '123456789', 'Bà Rịa - Vũng Tàu', 4, '123456789', '1', 'tranthaingoc0147@gmail.com', '0899784382', 'test', 0, '2019-08-28', '2019-08-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bucategory`
--

CREATE TABLE `bucategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bucategory`
--

INSERT INTO `bucategory` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(4, 'test1', 'test1', 0, '2019-08-27', '2019-08-27'),
(5, '212312', NULL, 1, '2019-09-03', '2019-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bufixcost`
--

CREATE TABLE `bufixcost` (
  `id` int(11) NOT NULL,
  `bu_id` int(11) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `itemcategory_id` int(11) DEFAULT NULL,
  `costcategory_id` int(11) DEFAULT NULL,
  `docnum` varchar(20) NOT NULL,
  `unit_id` varchar(255) DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bufixcost`
--

INSERT INTO `bufixcost` (`id`, `bu_id`, `item`, `itemcategory_id`, `costcategory_id`, `docnum`, `unit_id`, `qty`, `amount`, `total`, `date`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, '123456789', 1, 1, '123456789', 'amount', '1', '5600000', '5600000', '2019-08-29', 'Dây chuyền sản xuất 1', 0, '2019-08-29', '2019-08-29'),
(2, 1, '12345678', 1, 1, '12345678', 'amount', '2', '150000', '300000', '2019-08-29', 'Tiền nhân viên', 0, '2019-08-29', '2019-08-29'),
(3, 3, '12345678', 1, 1, 'Trần Thái Ngọc', 'amount', '4', '2000000', '8000000', '2019-09-09', 'chi phí biến đổi', 0, '2019-09-08', '2019-09-08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buprofitshare`
--

CREATE TABLE `buprofitshare` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cart_item` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bu_id` int(11) DEFAULT NULL,
  `docnum` varchar(20) DEFAULT NULL,
  `percent` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `buprofitshare`
--

INSERT INTO `buprofitshare` (`id`, `name`, `cart_item`, `bu_id`, `docnum`, `percent`, `amount`, `total`, `date`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Lợi nhuận gốc', '2', 3, 'Trần Thái Ngọc', '20', '1400000', '7000000', '2019-09-08', 'Lợi nhuận góc', 0, '2019-09-07 14:08:49', '2019-09-08 14:08:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `burevenue`
--

CREATE TABLE `burevenue` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `bu_id` int(11) DEFAULT NULL,
  `cart_item` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `docnum` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `burevenue`
--

INSERT INTO `burevenue` (`id`, `name`, `code`, `bu_id`, `cart_item`, `docnum`, `date`, `amount`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 'Gỗ công nghiệp MDF', NULL, 1, '1', '12345678', '2019-08-29', '30000000', 'Bán gỗ công nghiệp MDF', 0, '2019-08-29', '2019-08-29'),
(4, 'Bán lô hàng A', NULL, 3, '2', 'Trần Thái Ngọc', '2019-09-18', '27000000', 'Doanh thu bán lô hàng A', 0, '2019-09-08', '2019-09-08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buvarcost`
--

CREATE TABLE `buvarcost` (
  `id` int(11) NOT NULL,
  `bu_id` int(11) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `docnum` varchar(20) DEFAULT NULL,
  `itemcategory_id` int(11) DEFAULT NULL,
  `costcategory_id` int(11) DEFAULT NULL,
  `unit_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `person` varchar(50) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `buvarcost`
--

INSERT INTO `buvarcost` (`id`, `bu_id`, `item`, `docnum`, `itemcategory_id`, `costcategory_id`, `unit_id`, `qty`, `amount`, `total`, `date`, `person`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, '123456789', '12345678', 1, 1, 'amount', '1', '100000', '100000', '2019-08-29', NULL, 'Dây chuyền sản xuất', 0, '2019-08-29', '2019-08-29'),
(2, 1, '123456789', '123456789', 1, 1, 'amount', '1', '200000', '200000', '2019-08-29', NULL, 'Dây chuyền sản xuất 2', 0, '2019-08-29', '2019-08-29'),
(3, 1, '12345678', '213456789', 1, 1, 'amount', '1', '300000', '300000', '2019-08-22', NULL, 'Dây chuyền sản xuất 3', 0, '2019-08-29', '2019-08-29'),
(4, 3, '12345678', 'Trần Thái Ngọc', 1, 1, 'amount', '2', '6000000', '12000000', '2019-09-01', NULL, 'Chi phí biến đổi', 0, '2019-09-08', '2019-09-08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `costcategory`
--

CREATE TABLE `costcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `costcategory`
--

INSERT INTO `costcategory` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'test4', 'test4', 0, '2019-08-27', '2019-08-27'),
(2, 'adas', 'asd', 1, '2019-09-03', '2019-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `itemcategory`
--

CREATE TABLE `itemcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `itemcategory`
--

INSERT INTO `itemcategory` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Nguyên vật liệu', 'test6', 0, '2019-08-27', '2019-08-29'),
(2, 'Văn phòng', NULL, 0, '2019-08-29', '2019-08-29'),
(3, 'asd', 'asdas', 1, '2019-09-03', '2019-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `procategory`
--

CREATE TABLE `procategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `procategory`
--

INSERT INTO `procategory` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'test2', 'test2', 0, '2019-08-27', '2019-08-27'),
(2, 'qweqw', 'qw', 1, '2019-09-03', '2019-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `produce`
--

CREATE TABLE `produce` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `bu_id` int(11) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `address` text,
  `procategory_id` int(11) DEFAULT NULL,
  `follow` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `produce`
--

INSERT INTO `produce` (`id`, `name`, `bu_id`, `code`, `address`, `procategory_id`, `follow`, `mail`, `phone`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'Xưởng sản xuất 1', 2, '123456789', 'Vũng Tàu', 1, '1', 'xuongsanxuat1@gmail.com', '0899784382', 'Xưởng sản xuất 1', 0, '2019-08-29', '2019-09-03'),
(3, 'Sản xuất ghế', 1, '123457768', 'Vũng Tàu', 1, '2', 'tranthaingoc0147@gmail.com', '0899784382', 'Vũng Tàu', 0, '2019-08-29', '2019-08-29'),
(4, 'Xưởng sản xuất 1', 4, '12345678', 'bà rịa vũng tàu', 1, '2', 'thaingoc6@gmail.com', '123456789', 'Xưởng sản xuât1', 0, '2019-09-03', '2019-09-03'),
(5, 'Xưởng sản xuất 1', 5, '12345678', 'Vũng Tàu', 1, '1', 'xuangsanxuat1@gmail.com', '0899784382', 'xưởng sản xuất', 0, '2019-09-03', '2019-09-03'),
(6, 'Xưởng sản xuất 1', 6, '12345678', 'Vũng Tàu', 1, '1', 'xuongsanxuat1@gmail.com', '0899784382', 'xưởng sản xuất', 0, '2019-09-03', '2019-09-03'),
(7, 'Xưởng sản xuất 1', 3, '12345711', 'Vũng Tàu', 1, '1', 'xuongsanxuat1@gmail.com', '0899784382', 'xưởng sản xuất', 0, '2019-09-03', '2019-09-03'),
(8, 'xưởng sản xuất 2', 3, '12345678', 'Vũng Tàu', 1, '1', 'xuangsanxuat2@gmail.com', '0899784382', 'Xưởng sản xuất 2', 0, '2019-09-04', '2019-09-04'),
(9, 'test', NULL, '123456789', 'Vũng Tàu', NULL, 'Trần Thái Ngọc', 'tranthaingoc0147@gmail.com', '899784382', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profitsharecategory`
--

CREATE TABLE `profitsharecategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profixcost`
--

CREATE TABLE `profixcost` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `itemcategory_id` varchar(255) DEFAULT NULL,
  `costcategory_id` varchar(255) DEFAULT NULL,
  `docnum` text NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `profixcost`
--

INSERT INTO `profixcost` (`id`, `pro_id`, `item`, `itemcategory_id`, `costcategory_id`, `docnum`, `unit_id`, `amount`, `qty`, `total`, `date`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3, '12345678', '2', '1', '12345678', 3, '600000', '2', '1200000', '2019-09-03', 'Phí cố định', 0, '2019-09-03 06:09:20', '2019-09-03 06:09:20'),
(2, 7, '12345678', '1', '1', 'Trần Thái Ngọc', 3, '200000', '2', '400000', '2019-08-28', 'Định phí dây chuyền sản xuất 1', 0, '2019-09-04 15:52:34', '2019-09-04 15:52:34'),
(3, 7, '123456781', '1', '1', 'Trần Thái Ngọc', 3, '800000', '3', '2400000', '2019-09-04', 'Định phí xưởng sản xuất 2', 0, '2019-09-04 15:53:51', '2019-09-04 15:53:51'),
(4, 8, '12345678', '1', '1', 'Trần Thái Ngọc', 3, '1000000', '1', '1000000', '2019-09-04', 'Định phí xưởng sản xuất 2', 0, '2019-09-04 15:55:34', '2019-09-04 15:55:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `proline`
--

CREATE TABLE `proline` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `address` text,
  `prolinecategory_id` int(11) DEFAULT NULL,
  `follow` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `proline`
--

INSERT INTO `proline` (`id`, `name`, `pro_id`, `code`, `address`, `prolinecategory_id`, `follow`, `mail`, `phone`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Dây chuyền sản xuất', 1, '12345678', 'Vũng Tàu', 1, 'Trần  Thái Ngọc', 'daychuyensannxuat@gmail.com', '0899784382', 'Dây chuyền sản xuất', 0, '2019-09-03', '2019-09-03'),
(2, 'dây chuyền sản xuất', 2, '12345678', 'Vũng Tàu', 1, 'Trần Thái Ngọc', 'daychuyensannxuat@gmail.com', '0899784382', 'dây chuyền sản xuất', 0, '2019-09-04', '2019-09-04'),
(3, 'dây chuyền sản xuất', 7, '12345678', 'Vũng Tàu', 1, 'Trần Thái Ngọc', 'daychuyensannxuat@gmail.com', '0899784382', 'Dây chuyền sản xuất', 0, '2019-09-04', '2019-09-04'),
(4, 'dây chuyền sản xuất 2', 7, '12345678', 'Vũng Tàu', 1, 'Trần Thái Ngọc', 'daychuyensannxuat2@gmail.com', '0899784382', 'Dây chuyền sản xuất 2', 0, '2019-09-05', '2019-09-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prolinecategory`
--

CREATE TABLE `prolinecategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `prolinecategory`
--

INSERT INTO `prolinecategory` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'test3', 'test3', 0, '2019-08-27', '2019-08-27'),
(2, 'asdasd', 'asdasdsa', 1, '2019-09-03', '2019-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prolinefixcost`
--

CREATE TABLE `prolinefixcost` (
  `id` int(11) NOT NULL,
  `proline_id` int(11) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `itemcategory_id` int(11) DEFAULT NULL,
  `costcategory_id` int(11) DEFAULT NULL,
  `docnum` varchar(20) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `prolinefixcost`
--

INSERT INTO `prolinefixcost` (`id`, `proline_id`, `item`, `itemcategory_id`, `costcategory_id`, `docnum`, `unit_id`, `qty`, `amount`, `total`, `date`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3, '12345678', 2, 1, 'Trần Thái Ngọc', 3, '2', '600000', '1200000', '2019-09-03 17:00:00', 'Định phí dây chuyền sản xuất', 0, '2019-09-04 14:51:57', '2019-09-04 14:51:57'),
(2, 4, '12345678', 2, 1, 'Trần Thái Ngọc', 3, '2', '600000', '1200000', '2019-09-04 17:00:00', 'Định phí dây chuyền sản xuất 2', 0, '2019-09-05 08:12:49', '2019-09-05 08:12:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prolineprofitshare`
--

CREATE TABLE `prolineprofitshare` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cart_item` varchar(255) DEFAULT NULL,
  `proline_id` int(11) DEFAULT NULL,
  `docnum` varchar(20) DEFAULT NULL,
  `percent` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `prolineprofitshare`
--

INSERT INTO `prolineprofitshare` (`id`, `name`, `cart_item`, `proline_id`, `docnum`, `percent`, `amount`, `total`, `date`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'Lợi nhuận dây chuyền sản xuất', '1', 3, 'Trần Thái Ngọc', '20', '120000', '600000', '2019-09-03 17:00:00', 'Chia lợi nhuận dây chuyền sản xuất', 0, '2019-09-04 14:54:16', '2019-09-04 14:54:16'),
(3, 'Lợi nhuận dây chuyền sản xuất', '1', 4, 'Trần Thái Ngọc', '10', '320000', '3200000', '2019-09-04 17:00:00', 'Lợi nhuận dây chuyền sản xuất 2', 0, '2019-09-05 08:14:05', '2019-09-05 08:14:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prolinerevenue`
--

CREATE TABLE `prolinerevenue` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `proline_id` int(11) DEFAULT NULL,
  `cart_item` varchar(255) DEFAULT NULL,
  `docnum` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `prolinerevenue`
--

INSERT INTO `prolinerevenue` (`id`, `name`, `code`, `proline_id`, `cart_item`, `docnum`, `date`, `amount`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'sản xuất 5 bộ bàn ghế', NULL, 2, '2', '12345678', '2019-09-04', 10000000, 'sản xuất 5 bộ bàn ghế văn phòng', 0, '2019-09-04', '2019-09-04'),
(2, 'Doanh thu bán gỗ', NULL, 3, '1', '12345678', '2019-09-04', 200000, 'Doanh thu bán gỗ', 0, '2019-09-04', '2019-09-04'),
(3, 'Doanh thu làm 10 cái bàn', NULL, 3, '2', '12345678', '2019-09-04', 2000000, 'Doanh thu làm 10 bàn', 0, '2019-09-04', '2019-09-04'),
(4, 'Doanh thu dây chuyền sản xuất', NULL, 4, '1', '12345678', '2019-09-05', 6000000, 'Doanh thu dây chuyền sản xuất', 0, '2019-09-05', '2019-09-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prolinevarcost`
--

CREATE TABLE `prolinevarcost` (
  `id` int(11) NOT NULL,
  `proline_id` int(11) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `docnum` varchar(255) DEFAULT NULL,
  `itemcategory_id` int(11) DEFAULT NULL,
  `costcategory_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `prolinevarcost`
--

INSERT INTO `prolinevarcost` (`id`, `proline_id`, `item`, `docnum`, `itemcategory_id`, `costcategory_id`, `unit_id`, `qty`, `amount`, `total`, `date`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3, '12345678', 'Trần Thái Ngọc', 2, 1, 3, '2', '200000', '400000', '2019-09-03 17:00:00', 'Biến phí dây chuyền sản xuất', 0, '2019-09-04 14:51:26', '2019-09-04 14:51:26'),
(2, 4, '12345678', 'Trần Thái Ngọc', 1, 1, 3, '2', '800000', '1600000', '2019-09-04 17:00:00', 'Biến phí dây chuyền sản xuất 2', 0, '2019-09-05 08:12:11', '2019-09-05 08:12:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `proprofitshare`
--

CREATE TABLE `proprofitshare` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cart_item` varchar(255) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `docnum` varchar(255) DEFAULT NULL,
  `percent` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `proprofitshare`
--

INSERT INTO `proprofitshare` (`id`, `name`, `cart_item`, `pro_id`, `docnum`, `percent`, `amount`, `total`, `date`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(5, 'Bán hàng', '2', 4, '12345678', '10', '900000', '9000000', '2019-09-02 17:00:00', 'Tính lợi nhuận', 0, '2019-09-03 09:37:39', '2019-09-03 09:37:39'),
(6, 'lợi nhuận bán vật liệu', '1', 8, 'Trần Thái Ngọc', '21', '1218000', '5800000', '2019-09-04 17:00:00', 'lợi nhuận bán vật liệu', 0, '2019-09-05 07:44:43', '2019-09-05 07:44:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prorevenue`
--

CREATE TABLE `prorevenue` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `cart_item` varchar(255) DEFAULT NULL,
  `docnum` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `prorevenue`
--

INSERT INTO `prorevenue` (`id`, `name`, `code`, `pro_id`, `cart_item`, `docnum`, `date`, `amount`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(4, '5 bộ bàn ghế', NULL, 4, '2', '12345678', '2019-09-03', 1000000, 'bán 5 bộ bàn ghế', 0, '2019-09-03', '2019-09-03'),
(5, '5 bộ bàn ghế', NULL, 4, '1', '12345678', '2019-09-03', 10000000, 'test', 0, '2019-09-03', '2019-09-03'),
(6, 'doanh thu', NULL, 8, '1', '12345678', '2019-09-05', 2000000, 'as', 0, '2019-09-05', '2019-09-05'),
(7, 'bán vật liệu', NULL, 8, '1', '12345678', '2019-09-05', 6000000, 'doanh thu bán vật liệu', 0, '2019-09-05', '2019-09-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provarcost`
--

CREATE TABLE `provarcost` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `docnum` varchar(255) DEFAULT NULL,
  `itemcategory_id` int(11) DEFAULT NULL,
  `costcategory_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `provarcost`
--

INSERT INTO `provarcost` (`id`, `pro_id`, `item`, `docnum`, `itemcategory_id`, `costcategory_id`, `unit_id`, `amount`, `qty`, `total`, `date`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(6, 3, '12345678', '12345678', 1, 1, 3, '200000', '2', '400000', '2019-09-03', 'Phí biến đổi', 0, '2019-09-03 06:14:20', '2019-09-03 06:14:20'),
(7, 4, 'tiền thưởng nhân viên', '12345678', 1, 1, 3, '1000000', '2', '2000000', '2019-09-03', 'chi phí biến đổi', 0, '2019-09-03 09:16:42', '2019-09-03 09:16:42'),
(8, 7, '12345678', 'Trần Thái Ngọc', 1, 1, 3, '200000', '2', '400000', '2019-09-04', 'Biến phí xưởng sản xuất', 0, '2019-09-04 15:16:17', '2019-09-04 15:16:17'),
(9, 7, '12345678', 'Trần Thái Ngọc', 1, 1, 3, '100000', '2', '200000', '2019-09-04', 'Biến  bí xưởng sản xuất 1', 0, '2019-09-04 15:52:09', '2019-09-04 15:52:09'),
(10, 8, '12345678', 'Trần Thái Ngọc', 1, 1, 3, '600000', '2', '1200000', '2019-09-05', 'biến phí xưởng sản xuất 2', 0, '2019-09-05 06:53:22', '2019-09-05 06:53:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `renvenuecategory`
--

CREATE TABLE `renvenuecategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `renvenuecategory`
--

INSERT INTO `renvenuecategory` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'test5', 'test5', 0, '2019-08-27', '2019-08-27'),
(2, 'asdasd', 'esa', 1, '2019-09-03', '2019-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Not Yet', 'Not start doing enything', 0, NULL, '2018-12-06 16:33:00'),
(2, 'On going(advance)', NULL, 0, '2018-09-12 14:40:12', '2018-12-06 16:32:21'),
(3, 'On going(ontime)', NULL, 0, '2018-09-26 17:17:07', '2018-12-06 16:33:13'),
(4, 'On going(delay)', NULL, 0, '2018-09-28 13:21:40', '2018-12-06 16:33:24'),
(5, 'Confirming', NULL, 0, '2018-09-28 13:21:48', '2018-12-06 16:34:13'),
(6, 'Confirmed', NULL, 0, '2018-12-06 16:34:22', '2018-12-06 16:34:22'),
(7, 'Pending(advance)', NULL, 0, '2018-12-06 16:35:29', '2018-12-06 16:35:29'),
(8, 'Pending(Ontime)', NULL, 0, '2018-12-06 16:35:39', '2018-12-06 16:35:39'),
(9, 'Pending(delay)', NULL, 0, '2018-12-06 16:35:50', '2018-12-06 16:35:50'),
(10, 'Releasing', NULL, 0, '2018-12-06 16:36:28', '2018-12-06 16:36:28'),
(11, 'Released', NULL, 1, '2018-12-06 16:36:40', '2018-12-06 16:36:40'),
(12, 'Closed', NULL, 0, '2018-12-06 16:36:53', '2018-12-06 16:36:53'),
(13, 'test1', 'test1', 1, NULL, NULL),
(14, 'sad', 'asda', 1, NULL, NULL),
(15, 'test1', 'test1', 1, NULL, NULL),
(16, 'dasd', 'ad', 1, NULL, NULL),
(17, 'test', 'test', 1, NULL, NULL),
(18, 'tests', 'tests', 0, NULL, NULL),
(19, 'test2', 'test2', 0, NULL, NULL),
(20, 'test8', 'test8', 0, '2019-08-27 21:30:49', '2019-08-27 21:31:01'),
(21, 'asda', 'asd', 1, '2019-09-03 08:45:24', '2019-09-03 08:45:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `remark` text,
  `is_deleted` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `unit`
--

INSERT INTO `unit` (`id`, `name`, `remark`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'test7', 'test7', 1, '2019-08-27', '2019-09-03'),
(2, 'asdas', 'asdas', 1, '2019-09-03', '2019-09-03'),
(3, 'Amount', NULL, 0, '2019-09-03', '2019-09-03'),
(4, 'Mass', NULL, 0, '2019-09-03', '2019-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` tinyint(4) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `roles` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '["users","admin","supperadmin"]',
  `nmail` varchar(255) DEFAULT NULL,
  `category` tinyint(4) UNSIGNED DEFAULT NULL,
  `lang` varchar(2) DEFAULT 'en',
  `remark` text,
  `is_deleted` tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `address`, `phone`, `password`, `email`, `roles`, `nmail`, `category`, `lang`, `remark`, `is_deleted`, `deleted_at`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Hai', 1, 'Đinh Tiên Hoàng', '080-5762-5293', '$2y$10$sI8fNNB3L7wrEfMDTVYwZ.6zapoezC/YIQnQAGA.w9eYndj4CcXf6', 'chihai@gmail.com', '[]', 'aa@gmail.com', 0, 'en', 'asd', 0, NULL, '2016-03-06 09:51:00', '2019-08-24 03:47:01', 'H7M2uFk1FFSfKuG5Pl4LEnXXeNxZrlF2ZymSlnf5jFEgkV5GKxgwKqQWq9Rv'),
(2, 'cmsmem', 1, NULL, NULL, '$2y$10$VTMW9/BCYpYXX1Rohkv99uI.LKSJo6PQTDtdSbTO7v/P/2KIn6N2O', 'cmsmem@gmail.com', '[]', NULL, 0, 'vn', NULL, 0, NULL, '2018-09-26 03:27:54', '2018-09-26 03:27:54', NULL),
(3, 'abc', 1, 'akfl', '123465', '$2y$10$.BrSTry9vRJIliLdOjLx2.kZSj288XoA1WM0/sP8uToOdizzAK06G', 'admindemo@gmail.com', '[]', 'abc@gmail,com', 1, 'vn', 'adfs', 0, NULL, '2018-10-05 07:37:44', '2018-10-05 08:27:00', NULL),
(4, 'Demo', 1, NULL, NULL, '$2y$10$IDrdpZge/uZ2N8CkQ9Fvfer0IW0VwypizNmI5AfM4cScbqC2VGo32', 'demo@gmail.com', '[]', NULL, 0, 'en', NULL, 0, NULL, '2019-07-31 14:16:26', '2019-07-31 14:16:26', NULL),
(5, 'Trần Thái Ngọc', 1, NULL, NULL, '$2y$10$kI4xldAcXvuTdSj5a3ObDuBSukFDTqGwJ45TL.qKi7XxR2a41tCBW', 'tranthaingoc0147@gmail.com', '[\"users\",\"admin\",\"supperadmin\"]', NULL, 0, 'en', NULL, 0, NULL, '2019-08-24 12:07:43', '2019-08-24 12:07:43', 'hfc4Raj9vRyLWYwGWqmkS8bevnrexZJRyFMDQlB9OPN9dHRBHwMJfMD9qfUe'),
(9, 'user1', NULL, NULL, NULL, '$2y$10$q3Cce1mfuFowpeJw.uc.Kuu.DN5h6L4cHB/uDTxYNm6wRrHq.r8pm', 'user1@gmail.com', '[\"users\",\"admin\",\"supperadmin\"]', NULL, NULL, 'en', NULL, 0, NULL, '2019-09-11 08:09:09', '2019-09-11 08:09:09', 'bDUzlUkbyhaaATCvY4ydaxGBDuCvPhNdMgqCWu3S6h2IGCK4YWA2EVd1SxID');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bu`
--
ALTER TABLE `bu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bucategory`
--
ALTER TABLE `bucategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bufixcost`
--
ALTER TABLE `bufixcost`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `buprofitshare`
--
ALTER TABLE `buprofitshare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `burevenue`
--
ALTER TABLE `burevenue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `buvarcost`
--
ALTER TABLE `buvarcost`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `costcategory`
--
ALTER TABLE `costcategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `itemcategory`
--
ALTER TABLE `itemcategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `procategory`
--
ALTER TABLE `procategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profitsharecategory`
--
ALTER TABLE `profitsharecategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profixcost`
--
ALTER TABLE `profixcost`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `proline`
--
ALTER TABLE `proline`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prolinecategory`
--
ALTER TABLE `prolinecategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prolinefixcost`
--
ALTER TABLE `prolinefixcost`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prolineprofitshare`
--
ALTER TABLE `prolineprofitshare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prolinerevenue`
--
ALTER TABLE `prolinerevenue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prolinevarcost`
--
ALTER TABLE `prolinevarcost`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `proprofitshare`
--
ALTER TABLE `proprofitshare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prorevenue`
--
ALTER TABLE `prorevenue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `provarcost`
--
ALTER TABLE `provarcost`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `renvenuecategory`
--
ALTER TABLE `renvenuecategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bu`
--
ALTER TABLE `bu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bucategory`
--
ALTER TABLE `bucategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `bufixcost`
--
ALTER TABLE `bufixcost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `buprofitshare`
--
ALTER TABLE `buprofitshare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `burevenue`
--
ALTER TABLE `burevenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `buvarcost`
--
ALTER TABLE `buvarcost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `costcategory`
--
ALTER TABLE `costcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `itemcategory`
--
ALTER TABLE `itemcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `procategory`
--
ALTER TABLE `procategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `produce`
--
ALTER TABLE `produce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `profitsharecategory`
--
ALTER TABLE `profitsharecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `profixcost`
--
ALTER TABLE `profixcost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `proline`
--
ALTER TABLE `proline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `prolinecategory`
--
ALTER TABLE `prolinecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `prolinefixcost`
--
ALTER TABLE `prolinefixcost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `prolineprofitshare`
--
ALTER TABLE `prolineprofitshare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `prolinerevenue`
--
ALTER TABLE `prolinerevenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `prolinevarcost`
--
ALTER TABLE `prolinevarcost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `proprofitshare`
--
ALTER TABLE `proprofitshare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `prorevenue`
--
ALTER TABLE `prorevenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `provarcost`
--
ALTER TABLE `provarcost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `renvenuecategory`
--
ALTER TABLE `renvenuecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
