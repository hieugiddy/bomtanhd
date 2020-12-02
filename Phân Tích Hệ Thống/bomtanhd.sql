-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 02, 2020 lúc 01:11 PM
-- Phiên bản máy phục vụ: 5.6.43
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bomtanhd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphim`
--

CREATE TABLE `chitietphim` (
  `id` int(8) NOT NULL,
  `gioithieu` longtext COLLATE utf8_unicode_ci,
  `vote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poster` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngayphathanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `imdb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trailer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhbia` text COLLATE utf8_unicode_ci NOT NULL,
  `thoiluong` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sotap` int(11) NOT NULL,
  `hot` int(1) NOT NULL,
  `uutien` int(11) NOT NULL,
  `tukhoa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphim`
--

INSERT INTO `chitietphim` (`id`, `gioithieu`, `vote`, `poster`, `status`, `ngayphathanh`, `imdb`, `trailer`, `tagline`, `anhbia`, `thoiluong`, `sotap`, `hot`, `uutien`, `tukhoa`) VALUES
(242, 'a', NULL, '', '', '', '', '', '', '', '', 0, 0, 0, ''),
(241, 'CEO của công ty An Ninh Văn Hóa - Diệp Phi Mặc bỗng dưng bị bệnh mà biến mất khỏi tầm mắt khán giả khiến mọi người đoán An Ninh Văn Hóa đang gặp khủng hoảng. Mẹ Diệp cho rằng con trai vì nhớ mãi không quên bạn gái cũ mà sinh tâm bệnh nên đã thuê Ôn Tiểu Noãn - nữ diễn viên quần chúng giả làm người yêu thầm Diệp Phi Mặc. Vì kiếm tiền để duy trì gánh hát Hoàng Mai ở quê nhà mà Ôn Tiểu Noãn chấp nhận phi vụ này. Nhưng qua tiếp xúc hai người \"phim giả tình thật\" trở thành couple thực sự.\r\n\r\n', '5,100', 'https://images.weserv.nl/?url=static.wapmaker.net%2f5cfafc47fce1810f802a08d0%2f0001%2fbangi.jpg', '36/36', '2020-04-04', '10,1', 'https://www.youtube.com/embed/iDgUIfgJC-A', 'Bạn gái dưới lầu xin ký nhận', 'https://image.tmdb.org/t/p/w533_and_h300_bestv2/eXQCc4OWryM6V99mM8v3nqbsUeh.jpg', '', 36, 1, 0, 'ban gai duoi lau xin ky nhan, girlfriend');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietphim`
--
ALTER TABLE `chitietphim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietphim`
--
ALTER TABLE `chitietphim`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
