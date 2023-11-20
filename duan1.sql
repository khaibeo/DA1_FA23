-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2023 lúc 05:13 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

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
(6, 'Giày Puma '),
(7, 'Giày Adidas');

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
(3, 'ahihi', 5, 1, 4);

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
  `product_image` varchar(255) NOT NULL COMMENT 'avatar sản phâm',
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `view` int(11) DEFAULT 0,
  `highlight` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `discounted_price`, `product_describe`, `product_image`, `date_add`, `category_id`, `view`, `highlight`, `status`) VALUES
(1, 'AIR FORCE 1', 3300000, 2500000, 'Huyền thoại lịch sử thương hiệu Nike – Nike Air Force 1 \r\nVới những người yêu thích sneaker thì chắc hẳn không thể thiếu một đôi Air Force 1 trong tủ giày của mình phải không nào. Đôi giày này trở thành đặc trưng của thương hiệu Nike và là mẫu giày được bán chạy nhất trong suốt 40 năm liên tục.\r\nĐể khẳng định đây là đôi giày hàng đầu dành cho các dân chơi bóng rổ, Nike đã không ngần ngại tốn chi phí khổng lồ để xâm nhập bà NBA và đã được nhiều ngôi sao Giải bóng rổ sử dụng trong các giải đấu lẫn ngoài đời thực. Và đây cũng chính là yếu tố giúp các sản phẩm của Nike Air Force  1 bán chạy.\r\nKhông chỉ chú trong tính thời trang trong từng đôi giày, công nghệ làm giày cũng được ông lớn Nike để ý hơn bao giờ hết. Cũng như những sản phẩm khác của Nike Air, Nike Air Force 1 Low 07 Fresh White sử dụng cộng nghệ Air tiên tiến với túi khí bên trong giúp giảm thiểu chấn thương cho người mang\r\nPhần đế giày được sử dụng cấu trúc đặc từ cao su để chống trơn trượt, tăng độ đàn hồi và mang cảm giác dễ chịu êm chân khi sử dụng. Phần upper có nhiều lỗ khí tạo sự thông thoáng khi đeo\r\nAir Force 1 thực sự đã làm rúng động làng sneaker và chưa có dấu hiệu hạ nhiệt. Sẽ thật là thiếu sót nếu bạn không sắm ngay một em Nike Air Force 1 Low 07 Fresh White DM0211-100', 'AF1-1.jpeg', '2023-11-09 08:31:49', 7, 0, 0, 1),
(2, 'Samba', 2550000, 2500000, 'SAMBA ORIGINALS\r\nRa đời trên sân bóng, giày Samba là biểu tượng kinh điển của phong cách đường phố. Phiên bản này trung thành với di sản, thể hiện qua thân giày bằng da mềm, dáng thấp, nhã nhặn, các chi tiết phủ ngoài bằng da lộn và đế gum, biến đôi giày trở thành item không thể thiếu trong tủ đồ của tất cả mọi người - cả trong và ngoài sân cỏ.', 'Samba-1.avif', '2023-11-12 10:19:13', 7, 0, 0, 1),
(3, 'FORUM 84 LOW', 2600000, 1800000, 'ĐÔI GIÀY TRAINER CỔ THẤP TÔN VINH PHONG CÁCH BÓNG RỔ THẬP NIÊN 80.\r\nLà lựa chọn yêu thích của những huyền thoại bóng rổ, các nghệ sĩ âm nhạc sở hữu đĩa bạch kim cũng như các tín đồ thời trang, giày adidas Forum là biểu tượng của sự vĩ đại. Mặc dù đã rời sân bóng rổ nhưng phiên bản này vẫn tiếp nối di sản giày Forum với các chi tiết thiết kế nguyên bản năm 1984 như quai dán ở cổ chân và chi tiết chữ X biểu tượng. Thân giày bằng da cao cấp và đế ngoài hầm hố cho phong cách đẳng cấp thường ngày.', 'FORUM 84 LOW-1.avif', '2023-11-12 10:30:39', 7, NULL, 0, 1),
(4, 'Air Jordan 1 Mid', 3500000, 2700000, 'Không bao giờ lộn xộn với một cổ điển. Giữ nét truyền thống trên đôi chân của bạn với vẻ ngoài trắng-trắng sẽ không bao giờ lỗi mốt.\r\n\r\nNhững lợi ích\r\nDa thật và da tổng hợp mang lại độ bền và kiểu dáng vượt trội.\r\nLưỡi đệm và phần trên bên trong để tăng thêm sự thoải mái và an toàn.\r\nLogo Air Jordan có cánh mang tính biểu tượng ở phía trên dành cho thương hiệu truyền thống.\r\nBộ phận Encapsulated Air ở gót chân mang lại lớp đệm nhẹ mà bạn biết và yêu thích.\r\nĐế ngoài bằng cao su rắn với rãnh cho lực kéo tiêu chuẩn.\r\n\r\nThông tin chi tiết sản phẩm\r\nLogo Swoosh được khâu xuống\r\nLogo đôi cánh trên cổ áo\r\nMàu sắc hiển thị: Trắng/Trắng/Đen\r\nPhong cách: DV0991-101\r\nQuốc gia/Khu vực xuất xứ: Việt Nam', 'b7d9211c-26e7-431a-ac24-b0540fb3c00f.webp', '2023-11-12 10:36:10', 7, 0, 0, 1);

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
(1, 1, 202, 40),
(2, 1, 200, 41),
(3, 1, 102, 42),
(38, 2, 302, 40),
(39, 2, 203, 41);

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
(1, 1, 'AF1.jpg'),
(2, 1, 'AF1-1.jpg'),
(3, 1, 'AF1-2.jpg'),
(4, 1, 'AF1-3.jpg'),
(5, 1, 'AF1-4.jpg'),
(6, 2, 'samba'),
(7, 2, 'samba-2'),
(8, 2, 'samba-3');

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
(1, 'Admin', 'Admin', 'Admin@gmail.com', 'admin', '1234567890', 'abc', '550AEACE-8837-4075-B0D2-FD0757175A40 (1).jpeg', 'admin'),
(2, 'Customer', 'Customer', 'Customer@gmail.com', 'customer', 'Customer', 'Customer', 'download.jpeg', 'customer');

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `product_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `products_image`
--
ALTER TABLE `products_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
