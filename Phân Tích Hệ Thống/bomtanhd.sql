-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 14, 2021 lúc 10:58 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Cấu trúc bảng cho bảng `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nghiepvu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioithieu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `actor`
--

INSERT INTO `actor` (`id`, `ten`, `nghiepvu`, `avatar`, `gioithieu`, `slug`) VALUES
(1, 'Từ Hảo', 'dienvien', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Xuhao1.jpg/250px-Xuhao1.jpg', 'Từ Hảo (sinh ngày 30 tháng 10 năm 1995) tại Diêm Thành, Giang Tô,  Trung Quốc, là nữ diễn viên người Trung Quốc, tốt nghiệp Học viện Điện ảnh Bắc Kinh. Cô được biết đến với vai Ôn Tiểu Noãn trong phim Bạn gái lầu dưới xin ký nhận, Hạo Lan truyện vai Vân Mộng Công chúa, Huyền Môn Đại Sư vai Tử Lưu Ly, Người Thừa Kế vai Tiểu Tịnh và Run Rẩy Đi A Bộ vai Tiêu Như Ý.', 'tu-hao'),
(2, 'Vương Tinh', 'daodien', 'https://static1.dienanh.net/upload/2014/05/12/vuong-tinh-134.jpg', 'Vương Tinh (chữ Hán: 王晶\\\\\\\\\\\\\\\\; bính âm: Wáng Jīng\\\\\\\\\\\\\\\\; tên tiếng Anh: Wong Jing\\\\\\\\\\\\\\\\; sinh ngày 3 tháng 5 năm 1955) là một nhà làm phim của điện ảnh Hồng Kông. Trong vai trò nhà sản xuất', 'vuong-tinh'),
(3, 'Shigeru Chiba', 'daodien', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/9oajq1i3qzkA2MTDH3ciLOEenS9.jpg', 'Masaharu Maeda (前田 正治, Maeda Masaharu), known by the stage name Shigeru Chiba (千葉 繁, Chiba Shigeru), is a Japanese actor and voice actor. He has also worked as a sound effects director and music director. He is affiliated with the talent management firm 81 Produce.  He is most known for the roles of the narrator of Fist of the North Star, Megane (Urusei Yatsura), Rei Ichidō (High School\\! Kimengumi), Kazuma Kuwabara (Yu Yu Hakusho), Pilaf (Dragon Ball), Raditz and Garlic Jr. (Dragon Ball Z), Buggy the Clown (One Piece) Kefka Palazzo (Dissidia: Final Fantasy) and Kōichi Todome (Kerberos saga).', 'shigeru-chiba'),
(4, 'Thành Long', 'dienvien', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/nraZoTzwJQPHspAVsKfgl3RXKKa.jpg', 'Jackie Chan (Chinese: 成龍\\; born 7 April 1954), born Chan Kong-sang, is a Hong Kong actor, action choreographer, filmmaker, comedian, producer, martial artist, screenwriter, entrepreneur, singer and stunt performer. In his movies, he is known for his acrobatic fighting style, comic timing, use of improvised weapons, and innovative stunts. Jackie Chan has been acting since the 1970s and has appeared in over 100 films.  Chan has received stars on the Hong Kong Avenue of Stars and the Hollywood Walk of Fame. As a cultural icon, Chan has been referenced in various pop songs, cartoons, and video games. Chan is also a Cantopop and Mandopop star, having released a number of albums and sung many of the theme songs for the films in which he has starred.', 'thanh-long'),
(5, 'Asami Seto', 'dienvien', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/j88IskzIdGkyHBbjygPyg9EiE90.jpg', 'Asami Seto is a Japanese voice actress affiliated with Sigma Seven e. She made her debut in the television anime Hourou Musuko.', 'asami-seto'),
(6, 'Junya Enoki', 'dienvien', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/vBnNL3Jqy0zkS3ZgsXZmvDM9Dfz.jpg', 'We don&apos\\;t have a biography for Junya Enoki.', 'junya-enoki');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thich` int(100) NOT NULL,
  `thoiGian` timestamp NOT NULL DEFAULT current_timestamp(),
  `traloi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `username`, `thich`, `thoiGian`, `traloi`) VALUES
('14012021070804vuongnguyen', 'hello', 'vuongnguyen', 11, '2021-01-14 08:48:57', ',14012021081027hieugiddy,14012021090604hieugiddy,14012021094857hieugiddy'),
('14012021072157hieugiddy', 'hay', 'hieugiddy', 16, '2021-01-14 08:10:27', ',14012021090749hieugiddy,14012021091027hieugiddy,14012021091036hieugiddy'),
('14012021090604hieugiddy', 'tuyệt', 'hieugiddy', 4, '2021-01-14 08:06:04', NULL),
('14012021090749hieugiddy', 'được', 'hieugiddy', 3, '2021-01-14 08:07:49', NULL),
('14012021091027hieugiddy', 'phim hay lắm', 'hieugiddy', 3, '2021-01-14 08:10:27', NULL),
('14012021091036hieugiddy', 'xin chào', 'hieugiddy', 4, '2021-01-14 08:10:36', NULL),
('14012021092754hieugiddy', 'sfd', 'hieugiddy', 0, '2021-01-14 08:27:54', NULL),
('14012021092813hieugiddy', 'a\r\n', 'hieugiddy', 0, '2021-01-14 08:28:13', NULL),
('14012021092906hieugiddy', 'zsdf', 'hieugiddy', 0, '2021-01-14 08:29:06', NULL),
('14012021093004hieugiddy', 'zdf', 'hieugiddy', 0, '2021-01-14 08:30:04', NULL),
('14012021093925hieugiddy', 'hay', 'hieugiddy', 0, '2021-01-14 08:39:25', NULL),
('14012021094857hieugiddy', 'ok', 'hieugiddy', 1, '2021-01-14 08:48:57', NULL),
('14012021102113nguyenvanquocvuong', 'phim dơẻ', 'nguyenvanquocvuong', 5, '2021-01-14 09:55:01', ',14012021102128nguyenvanquocvuong,14012021105501hoaha'),
('14012021102128nguyenvanquocvuong', 'ko biết xem phim rồi ', 'nguyenvanquocvuong', 6, '2021-01-14 09:21:28', NULL),
('14012021102753hieugiddy', 'được', 'hieugiddy', 0, '2021-01-14 09:27:53', NULL),
('14012021105402hoaha', 'hay', 'hoaha', 2, '2021-01-14 09:54:02', NULL),
('14012021105501hoaha', 'phim hay mà', 'hoaha', 2, '2021-01-14 09:55:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbinhluan`
--

CREATE TABLE `chitietbinhluan` (
  `idBinhLuan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idPhim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietbinhluan`
--

INSERT INTO `chitietbinhluan` (`idBinhLuan`, `idPhim`) VALUES
('14012021070804vuongnguyen', 253),
('14012021072157hieugiddy', 253),
('14012021090604hieugiddy', 261),
('14012021102113nguyenvanquocvuong', 253),
('14012021102753hieugiddy', 254),
('14012021105402hoaha', 259);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdaodien`
--

CREATE TABLE `chitietdaodien` (
  `idPhim` int(11) NOT NULL,
  `idDaoDien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdaodien`
--

INSERT INTO `chitietdaodien` (`idPhim`, `idDaoDien`) VALUES
(249, 'vuong-tinh'),
(251, 'vuong-tinh'),
(0, 'vuong-tinh'),
(259, 'hieu-giddy'),
(262, 'hieu-giddy'),
(254, 'vuong-tinh'),
(255, 'vuong-tinh'),
(256, 'vuong-tinh'),
(260, 'hieu-giddy'),
(261, 'hieu-giddy'),
(253, 'vuong-tinh'),
(263, 'shigeru-chiba');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdienvien`
--

CREATE TABLE `chitietdienvien` (
  `idPhim` int(11) NOT NULL,
  `idDienVien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdienvien`
--

INSERT INTO `chitietdienvien` (`idPhim`, `idDienVien`) VALUES
(259, 'tu-hao'),
(262, 'thanh-long'),
(254, 'thanh-long'),
(255, 'tu-hao'),
(256, 'tu-hao'),
(260, 'thanh-long'),
(261, 'thanh-long'),
(253, 'tu-hao'),
(253, 'thanh-long'),
(263, 'asami-seto'),
(263, 'junya-enoki');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphim`
--

CREATE TABLE `chitietphim` (
  `id` int(8) NOT NULL,
  `gioithieu` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `vote` float DEFAULT NULL,
  `poster` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imdb` float NOT NULL,
  `trailer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhbia` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tukhoa` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphim`
--

INSERT INTO `chitietphim` (`id`, `gioithieu`, `vote`, `poster`, `status`, `imdb`, `trailer`, `tagline`, `anhbia`, `tukhoa`) VALUES
(260, 'Bộ phim kể câu chuyện về Park Hoon (Lee Jong Suk), một cậu bé bị bắt cóc đến Triều Tiên cùng người cha bác sĩ. Ở Triều Tiên, Park Hoon được người cha của mình đào tạo thành bác sĩ. Park Hoon trở thành thiên tài phẫu thuật lồng ngực. Anh tìm cách trở về lại Hàn Quốc. Park Hoon được nhận vào làm tại bệnh viện danh tiếng nhất Hàn Quốc, bệnh viện Đại học Dong Woo nhưng anh lại cảm thấy mình như người ngoài. Để mang vể tình yêu của mình ở Bắc Hàn, anh làm bất cứ điều gì có thể để kiếm tiền...', 5, 'https://image.tmdb.org/t/p/w300//kRkhyJCfGvaQjGvOVupH9n4k02g.jpg', '20/20', 8, 'https://youtube.com/embed//R-eFm--k21c', 'Tagline', 'https://image.tmdb.org/t/p/w500//mTb5sBKD5GkAE6vHyjZH3kR3v1T.jpg', '닥터 이방인 (2014),Bác Sĩ Xứ Lạ -  Doctor Stranger (2014) - 닥터 이방인 (2014) | BomTanHD,'),
(261, 'Hé lộ khâu chuẩn bị cho các buổi biểu diễn, bộ phim tài liệu giới thiệu về thần tượng nhạc pop Việt Nam Sơn Tùng M-TP và đam mê ẩn sau chuyến lưu diễn Sky Tour của anh.', 4, 'https://image.tmdb.org/t/p/w300//dFyT5KUkcoa77mrX5PvlZuWuRBS.jpg', '94 phút', 0, 'https://youtube.com/embed//R-eFm--k21c', '', 'https://image.tmdb.org/t/p/w500//6PGMPeaXDhG4x6UVLPeQWUHiGwL.jpg', 'Sky Tour: The Movie (2020),Sơn Tùng M-TP: Sky Tour Movie (2020) - Sky Tour: The Movie (2020) | BomTanHD,'),
(253, 'CEO của công ty An Ninh Văn Hóa - Diệp Phi Mặc bỗng dưng bị bệnh mà biến mất khỏi tầm mắt khán giả khiến mọi người đoán An Ninh Văn Hóa đang gặp khủng hoảng. Mẹ Diệp cho rằng con trai vì nhớ mãi không quên bạn gái cũ mà sinh tâm bệnh nên đã thuê Ôn Tiểu Noãn - nữ diễn viên quần chúng giả làm người yêu thầm Diệp Phi Mặc. Vì kiếm tiền để duy trì gánh hát Hoàng Mai ở quê nhà mà Ôn Tiểu Noãn chấp nhận phi vụ này. Nhưng qua tiếp xúc hai người &quot\\;\\\\;\\\\\\;\\\\\\\\;\\\\\\\\\\;\\\\\\\\\\\\;phim giả tình thật&quot\\;\\\\;\\\\\\;\\\\\\\\;\\\\\\\\\\;\\\\\\\\\\\\; trở thành couple thực sự.', 5, 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/bQmRNBMXiFCu2nx3v0Q4Y6m4dqF.jpg', '36/36', 9.9, 'https://youtube.com/embed//R-eFm--k21c', 'Bạn Gái Lầu Dưới Xin Hãy Ký Nhận ', '/bomtanhd/public/img/upload/14012021103126pexels-chevanon-photography-1108099.jpg', '楼下女友请签收 (2020),Bạn Gái Lầu Dưới Xin Hãy Ký Nhận - Girlfriend (2020) - 楼下女友请签收 (2020) | BomTanHD,'),
(259, 'Sự kết hợp chưa từng có giữa Thanh Hằng và Chi Pu cùng câu chuyện ly kỳ về yêu - hận - tình - thù đằng sau hai người phụ nữ xinh đẹp chắc chắn sẽ khiến bạn tò mò.', 3, 'https://image.tmdb.org/t/p/w300//2bAjCwJ1sZMtpr1GywZSboKqXW1.jpg', '104 phút', 9, 'https://youtube.com/embed//R-eFm--k21c', 'Tất cả chỉ là dối trá thôi em à', 'https://image.tmdb.org/t/p/w500//kqq9zk5237TEGs4LKTCrIFKUem4.jpg', 'Chị Chị Em Em (2019),Chị Chị Em Em (2019) - Chị Chị Em Em (2019) | BomTanHD,Tất cả chỉ là dối trá thôi em à'),
(254, 'Người Tiên Phong bộ phim điện ảnh kể về công ty bảo an quốc tế Cấp Tiên Phong trong quá trình bảo vệ thương nhân Thái Quốc Lập và con gái ông là Fareeda đã anh dũng đối đầu với ” Sói Bắc Cực ” và đập tan kế hoạch do tổ chức sau lưng “Sói Bắc Cực” vạch ra.', 3, 'https://image.tmdb.org/t/p/w300//quqEuH1fhC3SbhJx00hN5lDNaEF.jpg', '107 phút', 7, 'Trailer', '', 'https://image.tmdb.org/t/p/w500//fX8e94MEWSuTJExndVYxKsmA4Hw.jpg', '急先锋 (2020),Người Tiên Phong (2020) - 急先锋 (2020) | BomTanHD,'),
(255, 'Quyết định đâm đầu vào chỗ chết, cựu quân nhân Jung Seok trở lại bán đảo vì số tiền hậu hĩnh lên đến 2,5 triệu USD. Tuy nhiên, anh và đồng đội bất ngờ bị phục kích bởi lữ đoàn biến chất 631 cùng bầy đàn zombie khát máu. Được gia đình Min Jung giải cứu, Jung Seok phải tìm cách đào thoát khỏi nơi đây trước khi quá trễ - Luật lệ duy nhất là sống sót', 1, 'https://image.tmdb.org/t/p/w300//9hLmHGY1qIdCI5fJ4JvAXWQQORk.jpg', '114 phút', 6, 'https://youtube.com/embed//R-eFm--k21c', 'Luật lệ duy nhất là sống sót.', 'https://image.tmdb.org/t/p/w500//d2UxKyaJ5GgzuHaSsWinFfv3g6L.jpg', '반도 (2020),Bán Đảo Peninsula (2020) - 반도 (2020) | BomTanHD,Luật lệ duy nhất là sống sót.'),
(256, 'Một tác phẩm đến từ hãng phim kinh dị Blumhouse và được nhào nặn qua nhà sản xuất của siêu phẩm INVISIBLE MAN và SPLIT, phim xoay quanh 4 cô gái phù thủy đang dần khai phá những tiềm năng ma thuật mới.', 5, 'https://image.tmdb.org/t/p/w300//yAktZ8CpwBkuIyUyUtKf6VFvXAI.jpg', '94 phút', 6, 'https://www.youtube.com/embed/', '', 'https://image.tmdb.org/t/p/w500//lIE7kfdLBRd0KENNtOaIqPPWNqh.jpg', 'The Craft: Legacy (2020),Phù Thủy Học Đường (2020) - The Craft: Legacy (2020) | BomTanHD,'),
(262, '', 4.4, 'https://image.tmdb.org/t/p/w300//5yuIJip8YJQ2rkLs7b7JlR38WY7.jpg', '69/69', 8, 'https://youtube.com/embed//R-eFm--k21c', '', 'https://image.tmdb.org/t/p/w500//iCBMJZFsdXALgpS121qu4CAe2Sa.jpg', 'SEAL Team (2017),SEAL Team (2017) - SEAL Team (2017) | BomTanHD,'),
(263, 'Vì một lý do kỳ lạ nào đó, Yuji Itadori, mặc dù với thể chất hoàn hảo nhưng anh lại đâm đầu vào tham gia CLB Huyền Bí. Tuy nhiên, họ đã sớm phát hiện ra là những câu chuyện huyền bí hoàn toàn có thật khi các thành viên trong CLB lần lượt bị tấn công\\! Trong khi đó, Megumi Fushiguro “bí ẩn” lại đang truy tìm một đối tượng bị nguyền rủa cấp đặc biệt và cuộc tìm kiếm này đã đưa nhóm bạn đến Itadori', 0, 'https://image.tmdb.org/t/p/w300//9MSNijZyyUGoRv01aUKkEYxccWB.jpg', '24/24', 8.7, 'https://www.youtube.com/embed/v8bZVdTgXoY', 'A boy fights... for &quot\\;the right death.&quot\\;', 'https://image.tmdb.org/t/p/w500//lthkKBLe1rX6iThgVFg22O02sJw.jpg', '呪術廻戦 (2020),Vật Thể Bị Nguyền Rủa - Sorcery Fight (2020) - 呪術廻戦 (2020) | BomTanHD,A boy fights... for &quot\\;the right death.&quot\\;');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietquocgia`
--

CREATE TABLE `chitietquocgia` (
  `idPhim` int(11) NOT NULL,
  `idQuocGia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietquocgia`
--

INSERT INTO `chitietquocgia` (`idPhim`, `idQuocGia`) VALUES
(259, 'viet-nam'),
(262, 'my'),
(254, 'trung-quoc'),
(254, 'hong-kong'),
(255, 'han-quoc'),
(256, 'my'),
(260, 'han-quoc'),
(261, 'viet-nam'),
(253, 'trung-quoc'),
(263, 'nhat-ban');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiettheloai`
--

CREATE TABLE `chitiettheloai` (
  `idPhim` int(11) NOT NULL,
  `idTheLoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiettheloai`
--

INSERT INTO `chitiettheloai` (`idPhim`, `idTheLoai`) VALUES
(259, 'ngon-tinh'),
(259, 'hai-huoc'),
(259, 'tam-ly'),
(262, 'hanh-dong'),
(262, 'hinh-su'),
(254, 'vo-thuat'),
(254, 'hanh-dong'),
(254, 'hinh-su'),
(255, 'ngon-tinh'),
(255, 'hanh-dong'),
(255, 'tam-ly'),
(256, 'hai-huoc'),
(256, 'kinh-di'),
(256, 'tam-ly'),
(260, 'ngon-tinh'),
(260, 'tam-ly'),
(261, 'hai-huoc'),
(261, 'tam-ly'),
(253, 'ngon-tinh'),
(263, 'hai-huoc'),
(263, 'anime');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachphat`
--

CREATE TABLE `danhsachphat` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dsphim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `tieude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tenweb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `tukhoa` text COLLATE utf8_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `luottruycap` int(11) NOT NULL,
  `linkweb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`tieude`, `tenweb`, `mota`, `tukhoa`, `favicon`, `logo`, `luottruycap`, `linkweb`, `tacgia`) VALUES
('BomTanHD - Film Bom Tấn Hành Động HD', 'BomTanHD CC', 'Tuyển tập phim hay', 'bomtanhd,phim hay, phim chieu rap moi, vuong bro, hehe', '/bomtanhd/public/img/upload/14012021104401favicon.ico', '/bomtanhd/public/img/upload/14012021104424bomtanhd.png', 20, '/bomtanhd', 'Nguyễn Văn Quốc Vương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linkphim`
--

CREATE TABLE `linkphim` (
  `id` int(11) NOT NULL,
  `idPhim` text COLLATE utf8_unicode_ci NOT NULL,
  `tenhienthi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `loai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `server` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngaythem` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `linkphim`
--

INSERT INTO `linkphim` (`id`, `idPhim`, `tenhienthi`, `link`, `loai`, `server`, `ngaythem`) VALUES
(4, 'ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020', 'Tập 1', 'https://drive.google.com/file/d/1p5RVdW1XRY8ManmiO5RYv2VgZHYdQ7BN/preview', 'xem', 'Siêu đỉnh', '2021-01-10 12:27:02'),
(5, 'ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020', 'Tập 2', 'https://drive.google.com/file/d/1BrZX8yhBVaui-TXjmAjJ-_FTNmIhZUQ0/preview', 'xem', 'Siêu nhanh', '2021-01-10 12:27:07'),
(6, 'ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020', 'Tập 3', 'https://drive.google.com/file/d/1p5RVdW1XRY8ManmiO5RYv2VgZHYdQ7BN/preview', 'xem', 'Siêu nhanh', '2021-01-10 12:27:11'),
(7, 'ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020', 'Tập 4', 'https://drive.google.com/file/d/1p5RVdW1XRY8ManmiO5RYv2VgZHYdQ7BN/preview', 'xem', 'Siêu nhanh', '2021-01-10 12:27:16'),
(8, 'ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020', 'Tập 1', 'https://drive.google.com/file/d/1BrZX8yhBVaui-TXjmAjJ-_FTNmIhZUQ0/preview', 'xem', 'Siêu vip', '2021-01-10 12:27:21'),
(16, 'ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020', 'Hiếu', 'https://drive.google.com/file/d/1p5RVdW1XRY8ManmiO5RYv2VgZHYdQ7BN/preview', 'xem', 'Siêu đỉnh', '2021-01-14 09:29:52'),
(10, 'ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020', 'Tập 2', 'https://bomtanhd.net/phim-le/chuyen-vieng-tham-tu-than-2019-guests--gosti-2019.html', 'tai', 'Siêu nhanh', '2021-01-10 12:27:34'),
(11, 'ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020', 'Tập 3', 'https://bomtanhd.net/phim-le/chuyen-vieng-tham-tu-than-2019-guests--gosti-2019.html', 'tai', 'Siêu nhanh', '2021-01-10 12:27:38'),
(12, 'ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020', 'Tập 4', 'https://bomtanhd.net/phim-le/chuyen-vieng-tham-tu-than-2019-guests--gosti-2019.html', 'tai', 'Siêu nhanh', '2021-01-10 12:27:52'),
(13, 'ban-gai-lau-duoi-xin-hay-ky-nhan---girlfriend-2020---2020-bomtanhd--2020', 'Tập 5', 'https://bomtanhd.net/phim-le/chuyen-vieng-tham-tu-than-2019-guests--gosti-2019.html', 'tai', 'Siêu nhanh', '2021-01-10 12:27:59'),
(15, 'bac-si-xu-la---doctor-stranger-2014---2014-bomtanhd--2014', 'Tập 1', 'https://bomtanhd.net/phim-le/chuyen-vieng-tham-tu-than-2019-guests--gosti-2019.html', 'xem', 'Siêu nhanh', '2021-01-13 04:44:52'),
(17, 'vat-the-bi-nguyen-rua---sorcery-fight-2020---2020-bomtanhd--2020', 'Tập 1', 'https://www.youtube.com/embed/uMAsVUOP-Ug', 'xem', 'Siêu nhanh', '2021-01-14 09:38:51'),
(18, 'vat-the-bi-nguyen-rua---sorcery-fight-2020---2020-bomtanhd--2020', 'Tập 1', 'https://www.youtube.com/embed/uMAsVUOP-Ug', 'tai', 'Siêu nhanh', '2021-01-14 09:38:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nam`
--

CREATE TABLE `nam` (
  `nam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nam`
--

INSERT INTO `nam` (`nam`) VALUES
(1998),
(2005),
(2018),
(2019);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `id` int(11) NOT NULL,
  `tenPhim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kieu` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'phimle',
  `nam` int(11) NOT NULL,
  `congtysx` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tengoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` timestamp NOT NULL DEFAULT current_timestamp(),
  `theloai` text COLLATE utf8_unicode_ci NOT NULL,
  `quocgia` text COLLATE utf8_unicode_ci NOT NULL,
  `daodien` text COLLATE utf8_unicode_ci NOT NULL,
  `dienvien` text COLLATE utf8_unicode_ci NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`id`, `tenPhim`, `kieu`, `nam`, `congtysx`, `tengoc`, `slug`, `ngaydang`, `theloai`, `quocgia`, `daodien`, `dienvien`, `luotxem`) VALUES
(259, 'Chị Chị Em Em (2019) - Chị Chị Em Em (2019) | BomTanHD', 'phimle', 2019, 'Đang cập nhật', 'Chị Chị Em Em (2019)', 'chi-chi-em-em-2019---chi-chi-em-em-2019-bomtanhd-chi-chi-em-em-2019', '2021-01-13 02:26:29', 'ngon-tinh,hai-huoc,tam-ly,', 'viet-nam,', 'hieu-giddy,', 'tu-hao,', 138),
(253, 'Bạn gái dưới lầu xin ký nhận', 'phimbo', 2020, 'Đang cập nhật', '楼下女友请签收 (2021)', 'ban-gai-duoi-lau-xin-ky-nhan--2021', '2021-01-10 06:09:44', 'ngon-tinh,', 'trung-quoc,', 'vuong-tinh,', 'tu-hao,thanh-long,', 309),
(254, 'Người Tiên Phong (2020) - 急先锋 (2020) | BomTanHD', 'phimle', 2020, 'China Film (Shanghai) International Media Co., China Film Group Corporation, Epitome Capital, Shanghai Lix Entertainment, Shanghai Tencent Pictures Culture Media, Shenzhen Media Film & Television, Tencent Pictures, ', '急先锋 (2020)', 'nguoi-tien-phong-2020---2020-bomtanhd--2020', '2021-01-10 06:12:16', 'vo-thuat,hanh-dong,hinh-su,', 'trung-quoc,hong-kong,', 'vuong-tinh,', 'thanh-long,', 35),
(255, 'Bán Đảo Peninsula (2020) - 반도 (2020) | BomTanHD', 'phimle', 2020, 'Next Entertainment World, RedPeter Film, Vantage Holdings, ', '반도 (2020)', 'ban-dao-peninsula-2020---2020-bomtanhd--2020', '2021-01-10 06:13:09', 'ngon-tinh,hanh-dong,tam-ly,', 'han-quoc,', 'vuong-tinh,', 'tu-hao,', 103),
(256, 'Phù Thủy Học Đường (2020) - The Craft: Legacy (2020) | BomTanHD', 'phimle', 2020, 'Blumhouse Productions, Red Wagon Entertainment, Columbia Pictures, ', 'The Craft: Legacy (2020)', 'phu-thuy-hoc-duong-2020---the-craft-legacy-2020-bomtanhd-the-craft-legacy-2020', '2021-01-10 06:14:12', 'hai-huoc,kinh-di,tam-ly,', 'my,', 'vuong-tinh,', 'tu-hao,', 5),
(260, 'Bác Sĩ Xứ Lạ -  Doctor Stranger (2014) - 닥터 이방인 (2014) | BomTanHD', 'phimbo', 2014, 'Say On Media, ', '닥터 이방인 (2014)', 'bac-si-xu-la---doctor-stranger-2014---2014-bomtanhd--2014', '2021-01-13 04:44:28', 'ngon-tinh,tam-ly,', 'han-quoc,', 'hieu-giddy,', 'thanh-long,', 70),
(261, 'Sơn Tùng M-TP: Sky Tour Movie (2020) - Sky Tour: The Movie (2020) | BomTanHD', 'phimle', 2020, 'Đang cập nhật', 'Sky Tour: The Movie (2020)', 'son-tung-m-tp-sky-tour-movie-2020---sky-tour-the-movie-2020-bomtanhd-sky-tour-the-movie-2020', '2021-01-13 06:34:02', 'hai-huoc,tam-ly,', 'viet-nam,', 'hieu-giddy,', 'thanh-long,', 90),
(262, 'SEAL Team (2017) - SEAL Team (2017) | BomTanHD', 'phimbo', 2017, 'CBS Television Studios, ', 'SEAL Team (2017)', 'seal-team-2017---seal-team-2017-bomtanhd-seal-team-2017', '2021-01-13 08:09:42', 'hanh-dong,hinh-su,', 'my,', 'hieu-giddy,', 'thanh-long,', 106),
(263, 'Vật Thể Bị Nguyền Rủa - Sorcery Fight (2020) - 呪術廻戦 (2020) | BomTanHD', 'phimbo', 2020, 'MAPPA, ', '呪術廻戦 (2020)', 'vat-the-bi-nguyen-rua---sorcery-fight-2020---2020-bomtanhd--2020', '2021-01-14 09:37:02', 'hai-huoc,anime,', 'nhat-ban,', 'shigeru-chiba,', 'asami-seto,junya-enoki,', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quocgia`
--

CREATE TABLE `quocgia` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quocgia`
--

INSERT INTO `quocgia` (`id`, `ten`, `slug`) VALUES
(50, 'Việt Nam', 'viet-nam'),
(53, 'Trung Quốc', 'trung-quoc'),
(54, 'Hàn Quốc', 'han-quoc'),
(55, 'Nhật Bản', 'nhat-ban'),
(56, 'Hồng Kông', 'hong-kong'),
(58, 'Âu Mỹ', 'my'),
(59, 'Nga', 'nga');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `tuphim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `danhsachphat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `password`, `ten`, `trangthai`, `avatar`, `email`, `gioithieu`, `tuphim`, `danhsachphat`, `quyen`) VALUES
(1, 'hieugiddy', '$2y$11$dCiRFLEkTnS4WRfYwANXpOvQlREHEXSb9q3KFpLsCZKKiTDPWT8Om', 'Hiếu Giddy', 1, '/bomtanhd/public/img/upload/14012021025229avt2.png', 'hieugiddy@gmail.com', 'Bro quá', '259,253,255,261,', '', 1),
(3, 'huaminhhieu', '$2y$11$HihvUqeSEbbMrN/y6sRqtu2.Yv4tZI.4edjfQN1jl5ODJ3Gocle8G', 'Hứa Văn Tèo', 1, 'https://static1.dienanh.net/upload/2014/05/12/vuong-tinh-134.jpg', 'thamnguyen1500@gmail.com', 'Vương Tinh (chữ Hán: 王晶\\\\\\\\\\\\\\\\\\\\; bính âm: Wáng Jīng\\\\\\\\\\\\\\\\\\\\; tên tiếng Anh: Wong Jing\\\\\\\\\\\\\\\\\\\\; sinh ngày 3 tháng 5 năm 1955) là một nhà làm phim của điện ảnh Hồng Kông. Trong vai trò nhà sản xuất', '', '', 0),
(23, 'hoaha', '$2y$11$iS/eVv8x5PCn3qNriuSlt.wXbtfmlo0U2KRbNLjNoUhn4AYDsTS0K', 'Trần Thị Hoa', 1, '/bomtanhd/public/img/upload/14012021104225ute18t1.jpg', 'hieugiddy.pro@gmail.com', 'Bro', '', '', 1),
(22, 'nguyenvanquocvuong', '$2y$11$rb7uAQE0E3ouTVl6TF5RBu4fFrQfIErdOyUPt86P.aQYznRBont4q', 'Nguyễn Văn Quốc ', 1, '/bomtanhd/public/img/upload/14012021101851122699374_392683805430344_2993264487821284112_n.jpg', 'thamnguyen1500@gmail.com', 'Xin chào đại gia đình BomTanHD...', '253,', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `maTL` int(11) NOT NULL,
  `tenTL` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`maTL`, `tenTL`, `slug`) VALUES
(25, 'Ngôn Tình', 'ngon-tinh'),
(24, 'Tiên Hiệp', 'tien-hiep'),
(23, 'Hài Hước', 'hai-huoc'),
(22, 'Võ Thuật', 'vo-thuat'),
(26, 'Anime', 'anime'),
(27, 'Hành Động', 'hanh-dong'),
(28, 'Hình Sự', 'hinh-su'),
(29, 'Cương Thi', 'cuong-thi'),
(30, 'Kinh Dị', 'kinh-di'),
(31, 'Tâm Lý', 'tam-ly'),
(32, 'Xã Hội Đen', 'xa-hoi-den'),
(34, 'Viễn Tưởng', 'vien-tuong');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietbinhluan`
--
ALTER TABLE `chitietbinhluan`
  ADD PRIMARY KEY (`idBinhLuan`);

--
-- Chỉ mục cho bảng `chitietphim`
--
ALTER TABLE `chitietphim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `danhsachphat`
--
ALTER TABLE `danhsachphat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `linkphim`
--
ALTER TABLE `linkphim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `nam`
--
ALTER TABLE `nam`
  ADD PRIMARY KEY (`nam`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quocgia`
--
ALTER TABLE `quocgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`maTL`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chitietphim`
--
ALTER TABLE `chitietphim`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT cho bảng `danhsachphat`
--
ALTER TABLE `danhsachphat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `linkphim`
--
ALTER TABLE `linkphim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT cho bảng `quocgia`
--
ALTER TABLE `quocgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `maTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
