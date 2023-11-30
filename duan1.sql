-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2023 lúc 08:42 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`) VALUES
(2, 1),
(4, 2),
(1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `cart_detail_id` int(11) NOT NULL,
  `product_detail_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_size` int(2) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`cart_detail_id`, `product_detail_id`, `cart_id`, `product_quantity`, `product_size`, `total`) VALUES
(1, 1, 1, 2, 40, 6600000),
(3, 3, 1, 2, 42, 6600000),
(5, 1, 4, 1, 40, 3300000),
(7, 6, 1, 1, 40, 3200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Chưa phân loại'),
(2, 'Giày Nike'),
(3, 'ADIDAS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `evaluation`
--

CREATE TABLE `evaluation` (
  `evaluation_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `number_stars` tinyint(1) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `evaluation`
--

INSERT INTO `evaluation` (`evaluation_id`, `content`, `number_stars`, `product_id`, `user_id`) VALUES
(1, 'Sản phẩm rất đẹp', 4, 1, 4),
(2, 'Giày rất đẹp', 5, 1, 2),
(3, 'ahihi', 5, 1, 4),
(4, 'Sản phẩm không đẹp như tưởng tượng', 5, 1, 4),
(5, 'Sản phẩm tạm ổn', 4, 2, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `payment_method` enum('cod','banking','','') NOT NULL,
  `status` enum('pending','processing','shiped','delivered','canceled') NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `fullname`, `email`, `tel`, `address`, `total`, `payment_method`, `status`, `date_add`, `note`) VALUES
(1, 4, 'Ma Văn Khải', 'khaimv13@gmai.com', '0346315304', '61 ngõ 177 Cầu Diễn, Phúc Diễn, Bắc Từ Liêm, Hà Nội', 3300000, 'cod', 'delivered', '2023-11-22 16:59:25', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_detail_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_detail_id`, `price`, `quantity`) VALUES
(1, 1, 1, 3300000, 1),
(2, 1, 4, 4800000, 1),
(3, 1, 6, 3200000, 2),
(4, 1, 9, 4800000, 1),
(5, 1, 2, 3300000, 1),
(6, 1, 7, 3200000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_evaluation`
--

CREATE TABLE `order_evaluation` (
  `evaluation_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `number_stars` tinyint(1) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `product_describe` text DEFAULT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `view` int(11) DEFAULT NULL,
  `highlight` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `discounted_price`, `product_describe`, `date_add`, `category_id`, `view`, `highlight`, `status`) VALUES
(1, 'AIR FORCE 1', 3300000, 0, '<h3>Giày Nike Air Force 1</h3>\r\n        <p>\r\n            Air Force 1, một biểu tượng trong thế giới giày sneaker, không chỉ là một đôi giày mà còn là biểu tượng văn hóa và phong cách. Được thiết kế bởi Bruce Kilgore và ra mắt lần đầu tiên vào năm 1982, Air Force 1 nhanh chóng trở thành một biểu tượng của sự đẳng cấp và phong cách đường phố.\r\n        </p>\r\n        <p>\r\n            Đôi giày Air Force 1 không chỉ thu hút người hâm mộ bởi vẻ ngoại hình đẹp mắt mà còn bởi sự thoải mái và chất lượng vượt trội. Chúng sở hữu đế đệm Air-Sole, mang lại cảm giác êm ái và thoải mái cho đôi chân mỗi bước di chuyển. Chất liệu da cao cấp được sử dụng cho phần upper, tạo nên độ bền vững và đồng thời thêm vào đó là sự sang trọng.\r\n        </p>\r\n        <p>\r\n            Mẫu giày này không chỉ là biểu tượng thời trang mà còn là một bảng điều khiển cho sự sáng tạo cá nhân. Với sự đa dạng về màu sắc và kiểu dáng, Air Force 1 phản ánh cá tính và phong cách riêng biệt của người sử dụng. Từ phiên bản trắng kinh điển cho đến những biến thể độc đáo với các họa tiết và chất liệu đặc biệt, mỗi đôi giày Air Force 1 là một tác phẩm nghệ thuật thực sự.\r\n        </p>\r\n        <p>\r\n            Ngoài ra, logo dáng cánh bướm nổi tiếng của Nike nằm ở phía lưỡi gà và mũi giày, là điểm nhấn tinh tế thể hiện sự đẳng cấp và chất lượng của thương hiệu.\r\n        </p>\r\n        <p>\r\n            Air Force 1 không chỉ là một đôi giày, mà là biểu tượng thời trang thể hiện sự độc đáo và phong cách cá nhân. Cho dù bạn là người yêu thể thao, người sành điệu hay đơn giản chỉ là người đam mê phong cách, đôi giày Air Force 1 sẽ luôn là sự lựa chọn hoàn hảo để thể hiện cá tính và tinh thần độc lập của bạn.\r\n        </p>', '2023-11-09 08:31:49', 2, 0, 1, 1),
(2, 'NIKE ACG MOUNTAIN FLY 2 LOW', 4800000, NULL, NULL, '2023-11-14 03:48:24', 2, 0, 1, 1),
(3, 'NIKE TECH HERA', 3200000, NULL, NULL, '2023-11-14 03:51:54', 2, 0, 1, 1),
(4, 'AIR MAX 1', 4800000, NULL, NULL, '2023-11-14 03:51:54', 2, 0, 1, 1),
(5, 'REACT INFINITY RUN FK 3', 3800000, NULL, NULL, '2023-11-14 03:53:54', 2, 0, 0, 1),
(6, 'ADIDAS NMD_S1', 2900000, 3600000, NULL, '2023-11-14 04:00:44', 3, 0, 0, 1),
(7, 'ADIDAS DURAMO SL WIDE', 2200000, NULL, NULL, '2023-11-14 04:00:44', 3, 0, 0, 1),
(8, 'ADIDAS NMD_G1', 2900000, NULL, NULL, '2023-11-14 04:00:44', 3, 0, 0, 1),
(9, 'ADIDAS RUN FALCON 2.0', 1800000, NULL, NULL, '2023-11-14 04:00:44', 3, 0, 0, 1),
(10, 'ADIDAS SAMBA CLASSIC', 3200000, NULL, NULL, '2023-11-14 04:00:44', 3, 0, 0, 1),
(19, 'adidas 4', 2, 2, 'ahihi', '2023-11-24 06:53:09', 1, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_detail`
--

CREATE TABLE `products_detail` (
  `product_detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_size` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products_detail`
--

INSERT INTO `products_detail` (`product_detail_id`, `product_id`, `product_quantity`, `product_size`) VALUES
(1, 1, 5, 40),
(2, 1, 5, 41),
(3, 1, 3, 42),
(4, 2, 10, 40),
(5, 2, 20, 41),
(6, 3, 10, 40),
(7, 3, 20, 41),
(8, 3, 30, 42),
(9, 4, 10, 40),
(10, 4, 20, 41),
(11, 4, 5, 42),
(12, 5, 5, 40),
(13, 5, 10, 41),
(14, 5, 15, 42),
(15, 6, 5, 40),
(16, 6, 10, 41),
(17, 6, 12, 42),
(18, 6, 15, 43),
(19, 7, 20, 40),
(20, 7, 11, 41),
(21, 7, 12, 42),
(22, 8, 3, 40),
(23, 8, 12, 41),
(24, 8, 21, 42),
(25, 9, 10, 40),
(26, 9, 5, 41),
(27, 9, 25, 42),
(28, 10, 20, 39),
(29, 10, 15, 40),
(30, 10, 10, 41),
(31, 10, 5, 42),
(38, 19, 42, 40),
(39, 19, 43, 41);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_image`
--

CREATE TABLE `products_image` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products_image`
--

INSERT INTO `products_image` (`image_id`, `product_id`, `image_name`) VALUES
(1, 1, 'AF1.png'),
(2, 1, 'AF1-1.png'),
(3, 1, 'AF1-2.png'),
(4, 1, 'AF1-3.png'),
(5, 1, 'AF1-4.png'),
(6, 2, 'MT5.png'),
(7, 2, 'MT1.png'),
(8, 2, 'MT2.png'),
(9, 2, 'MT3.png'),
(10, 2, 'MT4.png'),
(11, 3, 'TECH5.png'),
(12, 3, 'TECH1.png'),
(13, 3, 'TECH2.png'),
(14, 3, 'TECH3.png'),
(15, 3, 'TECH4.png'),
(16, 4, 'MAX5.png'),
(17, 4, 'MAX1.png'),
(18, 4, 'MAX2.png'),
(19, 4, 'MAX3.png'),
(20, 4, 'MAX4.png'),
(21, 5, 'FK5.png'),
(22, 5, 'FK1.png'),
(23, 5, 'FK2.png'),
(24, 5, 'FK3.png'),
(25, 5, 'FK4.png'),
(26, 6, 'S1.jpg'),
(27, 6, 'S12.jpg'),
(28, 6, 'S13.jpg'),
(29, 6, 'S14.jpg'),
(30, 7, 'SL.jpg'),
(31, 7, 'SL1.jpg'),
(32, 7, 'SL2.jpg'),
(33, 7, 'SL3.jpg'),
(34, 7, 'SL4.jpg'),
(35, 8, 'G1.jpg'),
(36, 8, 'G2.jpg'),
(37, 8, 'G13.jpg'),
(38, 8, 'G14.jpg'),
(39, 8, 'G15.jpg'),
(40, 9, 'FA.jpg'),
(41, 9, 'FA1.jpg'),
(42, 9, 'FA2.jpg'),
(43, 9, 'FA3.jpg'),
(44, 9, 'FA4.jpg'),
(45, 10, 'SAM.jpg'),
(46, 10, 'SAM1.jpg'),
(47, 10, 'SAM2.jpg'),
(48, 10, 'SAM3.jpg'),
(49, 10, 'SAM4.jpg'),
(56, 19, 'IMG_20221231_122252.jpg'),
(57, 19, '285817439_713150529942130_4677825927594183435_n.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` enum('admin','customer','','') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `fullname`, `email`, `password`, `tel`, `address`, `avatar`, `role`) VALUES
(1, 'Admin', 'Admin', 'Admin@gmail.com', 'admin', '', '', '', 'admin'),
(2, 'customer', 'customer', 'customer@gmail.com', 'customer', '', '', '', 'customer'),
(4, 'khaimv13', 'Ma Văn Khải', 'khaimv13@gmail.com', 'khai', '0346315304', 'Kim Tân, Kim Phượng, Định Hóa, Thái Nguyên', 'banner3.png', 'admin'),
(6, 'ph33123', 'Ma Văn Khải', 'khaimvph33123@gmail.com', 'admin123', '0346315304', 'Thái Nguyên', 'ahaha.png', 'customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `category_code` tinyint(1) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_end` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `FOREIGN KEY` (`user_id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`cart_detail_id`),
  ADD KEY `FK_cart_detail_1` (`cart_id`),
  ADD KEY `FK_cart_detail_2` (`product_detail_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `FK1` (`product_id`),
  ADD KEY `FK2` (`user_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK1_order` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `FK_order` (`order_id`);

--
-- Chỉ mục cho bảng `order_evaluation`
--
ALTER TABLE `order_evaluation`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `FK1_eva` (`order_id`),
  ADD KEY `FK2_eva` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_sanpham` (`category_id`);

--
-- Chỉ mục cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`product_detail_id`),
  ADD KEY `FK1_sanpham` (`product_id`);

--
-- Chỉ mục cho bảng `products_image`
--
ALTER TABLE `products_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `FK1_image` (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `cart_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_evaluation`
--
ALTER TABLE `order_evaluation`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `product_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `products_image`
--
ALTER TABLE `products_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `FK_cart_detail_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cart_detail_2` FOREIGN KEY (`product_detail_id`) REFERENCES `products_detail` (`product_detail_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK1_order` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_evaluation`
--
ALTER TABLE `order_evaluation`
  ADD CONSTRAINT `FK1_eva` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_eva` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_sanpham` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Các ràng buộc cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  ADD CONSTRAINT `FK1_sanpham` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products_image`
--
ALTER TABLE `products_image`
  ADD CONSTRAINT `FK1_image` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
