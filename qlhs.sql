-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 05, 2024 lúc 07:25 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlhs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `password`, `type`) VALUES
('trandink', '123456', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangdiem`
--

CREATE TABLE `bangdiem` (
  `id_bangdiem` int(11) NOT NULL,
  `id_monhoc` int(11) NOT NULL,
  `hocky` int(11) NOT NULL,
  `id_lop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bangdiem`
--

INSERT INTO `bangdiem` (`id_bangdiem`, `id_monhoc`, `hocky`, `id_lop`) VALUES
(2, 6, 1, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdiem`
--

CREATE TABLE `chitietdiem` (
  `id_hocsinh` int(11) NOT NULL,
  `diem15phut` float NOT NULL,
  `diem1tiet` float NOT NULL,
  `diemcuoiky` float NOT NULL,
  `id_bangdiem` int(11) NOT NULL,
  `id_chitietdiem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdiem`
--

INSERT INTO `chitietdiem` (`id_hocsinh`, `diem15phut`, `diem1tiet`, `diemcuoiky`, `id_bangdiem`, `id_chitietdiem`) VALUES
(21, 10, 10, 10, 2, 3),
(27, 9, 9, 9, 2, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `id_hocsinh` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `gioitinh` varchar(5) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `id_lop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`id_hocsinh`, `hoten`, `gioitinh`, `ngaysinh`, `diachi`, `id_lop`) VALUES
(21, 'Thanh Tâm', 'Nữ', '2024-05-13', 'Hải Phòng', 25),
(22, 'Trần Định', 'Nam', '2024-05-16', 'Hải Phòng', 16),
(24, 'Hùng Anh', 'Nam', '2024-05-18', 'Hải Phòng', 19),
(25, 'Quân', 'Nam', '2024-05-09', 'Hải Phòng', 18),
(26, 'Thiên Trang', 'Nữ', '2024-05-10', 'Hạ Long', 18),
(27, 'Nguyễn Oanh', 'Nữ', '2023-06-28', 'Hải Phòng', 25),
(28, 'Minh Quân', 'Nam', '2024-04-18', 'Hải Phòng', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id_lop` int(11) NOT NULL,
  `tenlop` varchar(20) NOT NULL,
  `khoi` int(11) NOT NULL,
  `siso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id_lop`, `tenlop`, `khoi`, `siso`) VALUES
(14, 'Không', 0, 0),
(16, '1A1', 1, 0),
(17, '1A2', 1, 0),
(18, '2A1', 2, 0),
(19, '2A2', 2, 0),
(20, '3A1', 3, 0),
(21, '3A2', 3, 0),
(22, '4A1', 4, 0),
(23, '4A2', 4, 0),
(24, '5A1', 5, 0),
(25, '5A2', 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `id_monhoc` int(11) NOT NULL,
  `tenmonhoc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`id_monhoc`, `tenmonhoc`) VALUES
(6, 'Toán'),
(7, 'Tiếng Việt'),
(8, 'Khoa Học'),
(9, 'Đạo Đức'),
(10, 'Tiếng Anh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD PRIMARY KEY (`id_bangdiem`),
  ADD KEY `id_monhoc` (`id_monhoc`),
  ADD KEY `id_lop` (`id_lop`);

--
-- Chỉ mục cho bảng `chitietdiem`
--
ALTER TABLE `chitietdiem`
  ADD PRIMARY KEY (`id_chitietdiem`),
  ADD KEY `id_hocsinh` (`id_hocsinh`),
  ADD KEY `id_bangdiem` (`id_bangdiem`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`id_hocsinh`),
  ADD KEY `id_lop` (`id_lop`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id_lop`),
  ADD UNIQUE KEY `unique_tenlop` (`tenlop`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id_monhoc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  MODIFY `id_bangdiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chitietdiem`
--
ALTER TABLE `chitietdiem`
  MODIFY `id_chitietdiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `id_hocsinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id_lop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id_monhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD CONSTRAINT `bangdiem_ibfk_2` FOREIGN KEY (`id_monhoc`) REFERENCES `monhoc` (`id_monhoc`),
  ADD CONSTRAINT `bangdiem_ibfk_3` FOREIGN KEY (`id_lop`) REFERENCES `lop` (`id_lop`);

--
-- Các ràng buộc cho bảng `chitietdiem`
--
ALTER TABLE `chitietdiem`
  ADD CONSTRAINT `chitietdiem_ibfk_1` FOREIGN KEY (`id_hocsinh`) REFERENCES `hocsinh` (`id_hocsinh`),
  ADD CONSTRAINT `chitietdiem_ibfk_2` FOREIGN KEY (`id_bangdiem`) REFERENCES `bangdiem` (`id_bangdiem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
