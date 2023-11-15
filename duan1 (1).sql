-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2023 lúc 08:46 AM
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
(1, 2);

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
(1, 'AIR FORCE 1', 3300000, NULL, 'hiết kế mẫu giày Nike Air Force 1 được xem là đôi giày mang tính cách mạng trong thế giới sneaker, khi mà các nhà thiết kế kết hợp với các nhà khoa học cho ra mẫu giày có công nghệ ‘Air’ – một túi khí ở gót chân để đệm hỗ trợ.\r\n\r\nGiày Nike Sneaker AIR FORCE 1 \'07 Nam | KingShoes.vn Bán Giày Sneaker Chính Hãng Tại Tphcm\r\n\r\nCái tên ‘Air Force One’ được lấy ý tưởng từ chiếc chuyên cơ cùng tên chuyên dùng chở tổng thống Mỹ. AF1 có 3 hình thức chính: low (thấp) – mid (trung) – top (cao). Với các style Mid – Top, chúng ta dễ dàng nhận thấy một cọng dây đeo có khoá hoặc dán tạo vẻ chắc chắn cho đôi giày và có thể dịch chuyển theo tuỳ phiên bản. Đây là một sự đặc biệt của đôi giày Nike Air Force 1 so với các đôi giày khác cùng thời. Một điểm nhận dạng khác của các Nike Air Force 1 là một huy hiệu nhỏ ở giữa dây giày được làm bằng thiếc (có phiên bản được làm bằng nhựa hoặc bạc) có khắc dòng chữ ‘AF1’.\r\n\r\nGiày Nike Sneaker AIR FORCE 1 \'07 Nam | KingShoes.vn Bán Giày Sneaker Chính Hãng Tại Tphcm\r\n\r\nNike Air Force 1 có hơn 1.700 bản phối với nhiều màu khác nhau và ngày càng tăng lên. Nhưng 2 màu cơ bản White – on – White và Black – on – Black vẫn là hai phiên bản thành công nhất với số lượng sản phẩm bán ra chạy nhất trong suốt nhiều thập kỷ qua. 12 triệu là số lượng giày được bán ra trong thời kì đỉnh cao của Nike Air Force 1 vào năm 2005. Con số đã phần nào thể hiện được sự phổ biến của nó trên toàn thế giới. Nike Air Force 1 thu về hơn 800 triệu USD mỗi năm cho Nike, sự tồn tại của đôi giày này trong hơn 25 năm qua cho ta thấy vị trí của nó trong trái tim những người đam mê ‘footwear’ cao đến mức nào.\r\n\r\nVậy có nên mua giày Nike Air Force 1 không?\r\n\r\nNói đến đây thì chắc hẳn bạn đã biết được có nên mua giày Nike Air Force 1 rồi đúng không. Hiện nay, trên thị trường có rất nhiều giày Nike Air Force 1 fake.\r\n\r\nMua giày Nike Air Force 1 chính hãng hãy ghé King Shoes để luôn được trao tận tay những đôi giày Real và giá luôn luôn hấp dẫn.', '2023-11-09 08:31:49', 2, 0, 0, 1),
(2, 'NIKE ACG MOUNTAIN FLY 2 LOW', 4800000, NULL, NULL, '2023-11-14 03:48:24', 2, 0, 0, 1),
(3, 'NIKE TECH HERA', 3200000, NULL, NULL, '2023-11-14 03:51:54', 2, 0, 0, 1),
(4, 'AIR MAX 1', 4800000, NULL, NULL, '2023-11-14 03:51:54', 2, 0, 0, 1),
(5, 'REACT INFINITY RUN FK 3', 3800000, NULL, NULL, '2023-11-14 03:53:54', 2, 0, 0, 1),
(6, 'ADIDAS NMD_S1', 2900000, 3600000, NULL, '2023-11-14 04:00:44', 3, 0, 0, 1),
(7, 'ADIDAS DURAMO SL WIDE', 2200000, NULL, NULL, '2023-11-14 04:00:44', 3, 0, 0, 1),
(8, 'ADIDAS NMD_G1', 2900000, NULL, NULL, '2023-11-14 04:00:44', 3, 0, 0, 1),
(9, 'ADIDAS RUN FALCON 2.0', 1800000, NULL, NULL, '2023-11-14 04:00:44', 3, 0, 0, 1),
(10, 'ADIDAS SAMBA CLASSIC', 3200000, NULL, NULL, '2023-11-14 04:00:44', 3, 0, 0, 1);

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
(1, 1, 10, 40),
(2, 1, 20, 41),
(3, 1, 30, 42);

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
(49, 10, 'SAM4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` enum('admin','customer','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `fullname`, `email`, `password`, `tel`, `address`, `avatar`, `role`) VALUES
(1, 'Admin', 'Admin', 'Admin@gmail.com', 'admin', '', '', '', 'admin'),
(2, 'customer', 'customer', 'customer@gmail.com', 'customer', '', '', '', 'customer'),
(4, 'khaimv13', '', 'khaimv13@gmail.com', 'khai', '', '', '', 'admin');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `cart_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_evaluation`
--
ALTER TABLE `order_evaluation`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `product_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products_image`
--
ALTER TABLE `products_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `FK_cart_detail_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `FK_cart_detail_2` FOREIGN KEY (`product_detail_id`) REFERENCES `products_detail` (`product_detail_id`);

--
-- Các ràng buộc cho bảng `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `FK2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK1_order` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Các ràng buộc cho bảng `order_evaluation`
--
ALTER TABLE `order_evaluation`
  ADD CONSTRAINT `FK1_eva` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `FK2_eva` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_sanpham` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Các ràng buộc cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  ADD CONSTRAINT `FK1_sanpham` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `products_image`
--
ALTER TABLE `products_image`
  ADD CONSTRAINT `FK1_image` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
