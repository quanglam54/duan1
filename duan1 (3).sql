-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2024 at 08:53 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(29, 27, 32, 'Xấu', '2024-11-03', 1),
(31, 25, 31, 'woww', '2024-11-19', 1),
(32, 25, 32, 'Được', '2024-11-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(96, 126, 26, 5),
(97, 126, 27, 5);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`) VALUES
(1, 'admin'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(14, 'Tròng kính', 'Cải thiện thị lực cho người cận, viễn, hỗ trợ nhìn gần.'),
(15, 'Kính râm', 'Kính bảo vệ mắt khỏi ánh nắng mặt trời, có khả năng chống UV.'),
(19, 'Kính cận', 'Kính dành cho người bị cận thị, giúp cải thiện thị lực khi nhìn xa.'),
(20, 'Gọng kính', 'Đỡ và giữ tròng kính.'),
(21, 'Kính râm trẻ em', 'Kính râm cho trẻ em.');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int NOT NULL DEFAULT '1',
  `trang_thai_id` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(150, 'DH001', 31, 'Lan Anh', 'anh@gmail.com', '0949607556', 'Trịnh Văn Bô', '2024-11-10', '6666000.00', 'abs', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(126, 31);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(46, 20, '../uploads/1730991964DeWatermark.ai_1730991828080.png'),
(47, 20, '../uploads/1730992085DeWatermark.ai_1730991921358.png'),
(48, 20, '../uploads/1730992170gong.png'),
(49, 21, '../uploads/1730992687gong3 (1) (1).jpeg'),
(50, 21, '../uploads/1730992751gong3_2 (1).jpeg'),
(51, 21, '../uploads/1730992803gong3_3 (1).jpeg'),
(55, 24, '../uploads/17309964801730801889tr2_2.png'),
(56, 24, '../uploads/17309965221730801924tre2.png'),
(57, 24, '../uploads/17309967821730801924tre2_3.png'),
(58, 27, '../uploads/1730992921ram2_@ (1).jpeg'),
(59, 27, '../uploads/1730993071ram2 (1).jpeg'),
(60, 27, '../uploads/1730993071ram2_3 (1).jpeg'),
(61, 40, '../uploads/17309934271730803732gong4.jpg'),
(62, 40, '../uploads/17309943231730803732gong4_2.jpg'),
(63, 40, '../uploads/17309943881730803732gong4_3.jpg'),
(64, 19, '../uploads/17308599904.jpg'),
(65, 19, '../uploads/17308601197.jpg'),
(66, 19, '../uploads/17309952711730801449ram1_2 (1).jpg'),
(67, 28, '../uploads/17309969961730558469ram3.jpg'),
(68, 28, '../uploads/1730997068ram3_2 (1).jpeg'),
(69, 28, '../uploads/1730997140ram3_3 (1).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD (thanh toán khi nhận hàng)'),
(2, 'Thanh toán qua Banking');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `mo_ta` text,
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(19, 'KR. KÍNH RÂM THỜI TRANG AN229080 (50.18.146)', '3000000.00', '200000.00', '17309949741730994696kinhram1.jpg', 4, 20, '2024-11-07', 'Kính Râm Thời Trang AN229080 (50.18.146) là sự kết hợp hoàn hảo giữa phong cách và chức năng. Với thiết kế hiện đại và thanh lịch, sản phẩm này không chỉ là phụ kiện thời trang mà còn bảo vệ đôi mắt khỏi tia UV. Khung kính chắc chắn và nhẹ tạo cảm giác thoải mái khi đeo, phù hợp cho mọi hoạt động ngoài trời. Màu sắc tinh tế và kiểu dáng thời thượng giúp bạn nổi bật trong mọi dịp. Chọn Kính Râm AN229080 để thể hiện phong cách cá nhân và bảo vệ sức khỏe đôi mắt một cách hiệu quả!', 15, 2),
(20, 'GK. GỌNG NHỰA CẦU KIM LOẠI TITAN CAO CẤP NA240235 (48.21.148)', '16000000.00', '0.00', '1730991939DeWatermark.ai_1730991828080.png', 4, 30, '2024-11-09', 'Gọng Nhựa Cầu Kim Loại Titan Cao Cấp NA240235 (48.21.148) mang đến sự kết hợp hoàn hảo giữa phong cách sang trọng và tính năng bền bỉ. Với thiết kế cầu kim loại tinh tế và khung nhựa titan nhẹ, sản phẩm này không chỉ tạo cảm giác thoải mái khi đeo mà còn đảm bảo độ bền cao. Gọng kính có khả năng chống va đập, giúp bảo vệ kính khỏi hư hại trong quá trình sử dụng. Màu sắc thanh lịch và kiểu dáng hiện đại sẽ dễ dàng phù hợp với nhiều phong cách thời trang, từ công sở đến dạo phố. Gọng Nhựa Cầu Kim Loại NA240235 là lựa chọn lý tưởng cho những ai muốn thể hiện phong cách cá nhân một cách tinh tế và đẳng cấp.', 20, 2),
(21, 'GK. GỌNG NHỰA CẦU KIM LOẠI TITAN CAO CẤP NA240237 (48.21.148)', '160000.00', '2000.00', '1730992678gong3 (1) (1).jpeg', 4, 40, '2024-10-29', 'Gọng Nhựa Cầu Kim Loại Titan Cao Cấp NA240237 (48.21.148) là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách hiện đại và sang trọng. Với thiết kế cầu kim loại tinh tế kết hợp với khung nhựa titan nhẹ, sản phẩm này mang lại cảm giác thoải mái và bền bỉ khi sử dụng. Gọng kính có khả năng chống va đập, bảo vệ kính khỏi hư hại và giữ cho sản phẩm luôn mới. Màu sắc trang nhã và kiểu dáng thanh lịch giúp dễ dàng phối hợp với nhiều trang phục, từ công sở đến dạo phố. Gọng Nhựa Cầu Kim Loại NA240237 không chỉ nâng tầm phong cách mà còn là biểu tượng của sự đẳng cấp và tinh tế.', 20, 1),
(24, 'KR. KÍNH RÂM TRẺ EM 7-136 (46.20.138)', '200000.00', NULL, '17309964741730801889tr2_2.png', 30, 15, '2024-10-30', 'Kính Râm Trẻ Em 7-136 (46.20.138) là sự lựa chọn hoàn hảo cho các bé yêu thích hoạt động ngoài trời. Với thiết kế ngộ nghĩnh và màu sắc tươi sáng, sản phẩm không chỉ tạo điểm nhấn thú vị mà còn bảo vệ đôi mắt của trẻ khỏi tia UV có hại. Khung kính nhẹ và bền, giúp trẻ dễ dàng đeo trong suốt cả ngày mà không cảm thấy khó chịu. Kính râm 7-136 rất phù hợp cho các hoạt động như đi biển, dã ngoại hay chơi thể thao. Lựa chọn Kính Râm Trẻ Em 7-136 để giúp các bé vừa phong cách vừa được bảo vệ an toàn khi vui chơi!', 21, 1),
(25, 'Tròng kính Sky Lens Chiết suất 1.56', '200000.00', NULL, '1730997250trong2.jpeg', 30, 10, '2024-10-30', 'Tròng Kính Sky Lens Chiết Suất 1.56 là lựa chọn hoàn hảo cho sự thoải mái và thẩm mỹ. Với chỉ số chiết suất 1.56, tròng kính này mỏng nhẹ, tạo cảm giác dễ chịu khi đeo. Công nghệ chống trầy xước và phản chiếu giúp tầm nhìn luôn rõ nét, trong khi khả năng chống tia UV bảo vệ mắt khỏi ánh nắng. Thiết kế hiện đại của Sky Lens không chỉ nâng cao phong cách mà còn mang lại sự tự tin cho người sử dụng.', 14, 1),
(26, 'Tròng kính Crizal Rock Chiết suất 1.56', '200000.00', '100000.00', '1730558442trong3.jpeg', 6, 5, '2024-11-08', 'Tròng Kính Crizal Rock Chiết Suất 1.56 là lựa chọn hoàn hảo cho những ai tìm kiếm sự kết hợp giữa hiệu suất quang học và tính thẩm mỹ. Với chỉ số chiết suất 1.56, tròng kính này mỏng nhẹ hơn, giúp giảm trọng lượng và độ dày, mang lại cảm giác thoải mái khi đeo.\r\n\r\nĐược trang bị công nghệ Crizal tiên tiến, sản phẩm không chỉ chống trầy xước mà còn giảm thiểu hiện tượng phản chiếu, cải thiện tầm nhìn rõ nét hơn trong mọi điều kiện ánh sáng. Đặc biệt, tròng kính này còn bảo vệ đôi mắt khỏi tia UV, giúp bảo vệ sức khỏe mắt một cách hiệu quả.', 14, 1),
(27, 'KR. KÍNH RÂM VUÔNG AN28004 (56.17.148)', '300000.00', NULL, '1730992908ram2_@ (1).jpeg', 35, 50, '2024-09-05', 'Kính Râm Vuông AN28004 (56.17.148) mang đến phong cách thời thượng và sự bảo vệ tối ưu cho đôi mắt. Với thiết kế vuông hiện đại, sản phẩm này không chỉ tạo nên điểm nhấn cá tính mà còn giúp bạn tự tin trong mọi hoạt động ngoài trời. Khung kính chắc chắn nhưng nhẹ, tạo cảm giác thoải mái khi đeo. Chất liệu cao cấp và khả năng chống tia UV hiệu quả giúp bảo vệ sức khỏe đôi mắt, đồng thời tôn vinh vẻ đẹp của bạn. Lựa chọn Kính Râm AN28004 để khẳng định phong cách và sự sang trọng!', 15, 1),
(28, 'KR. KÍNH RÂM THỜI TRANG AN22P9217 (51.23.149)', '300000.00', NULL, '17309969541730558469ram3.jpg', 35, 15, '2024-09-05', 'Kính Râm Thời Trang AN22P9217 (51.23.149) là sự lựa chọn hoàn hảo cho những tín đồ yêu thích phong cách hiện đại và sang trọng. Với thiết kế tinh tế và kiểu dáng hợp thời, sản phẩm không chỉ giúp bạn nổi bật mà còn bảo vệ đôi mắt khỏi tác hại của tia UV. Khung kính nhẹ và bền bỉ mang lại sự thoải mái khi đeo suốt cả ngày. Kính Râm AN22P9217 sẽ là phụ kiện lý tưởng cho mọi hoạt động ngoài trời, giúp bạn thể hiện cá tính và phong cách thời trang riêng biệt!', 15, 1),
(40, 'GK. GỌNG KÍNH S7198 (48.18.144)', '500000.00', NULL, '17309934171730803732gong4.jpg', 32, 30, '2024-09-06', 'Gọng kính S7198 (48.18.144) là một mẫu gọng kính thời trang, được thiết kế với kiểu dáng hiện đại và tinh tế. Với kích thước 48mm cho độ rộng tròng, 18mm cho khoảng cách giữa hai tròng và 144mm cho chiều dài gọng, sản phẩm này phù hợp với nhiều khuôn mặt khác nhau. Chất liệu gọng kính nhẹ và bền, mang lại cảm giác thoải mái khi đeo trong thời gian dài. Màu sắc đa dạng và phong phú, giúp dễ dàng phối hợp với nhiều trang phục. Gọng kính S7198 không chỉ giúp bảo vệ mắt mà còn nâng cao phong cách cá nhân của người sử dụng. Đây là lựa chọn lý tưởng cho những ai yêu thích sự trẻ trung và năng động.', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gioi_tinh` tinyint(1) DEFAULT '1',
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `mat_khau` varchar(255) NOT NULL,
  `chuc_vu_id` int DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(31, 'Lê Thị Lan Anh', NULL, '2015-11-03', 'anh@gmail.com', '0949607556', 2, 'Trịnh Văn Bô', '$2y$10$nlJmcubSBkMsg5eIS1ayKuKxE5wr8lImSkJgN7ANIrUvtnpszM4Km', 2, 2),
(32, 'Lê Văn Long', NULL, '2014-11-17', 'long@gmail.com', '0369562321', 1, 'Cầu Diễn', '$2y$10$bjw40QoRUaFDa3HJIq6TteRlyNOjUA8WvJ5n.dOxkrq2U1xEtXS0C', 2, 1),
(33, 'Lê Văn Minh', NULL, '2024-11-12', 'admin@gmail.com', '0335323863', 1, 'Trịnh Văn Bô', '$2y$10$Ebg.a2148uuWcXu/X6v.DuOV6JKJ3M.PqOVA1ZfL.4Fq94yp6VcZW', 1, 2),
(34, 'Nguyễn Thùy Chi', NULL, '2024-11-13', 'chi@gmail.com', '0998224551', 2, 'Cầu Diễn', '123@123ab', 1, 1),
(35, 'Trần Thanh Nga', NULL, NULL, 'nga@gmail.com', NULL, 1, NULL, '$2y$10$4P5qrP0UYRF4luA90zrrLuEcpQvrK/SUdQO82d3wrg7o2IEkUOZ5.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chưa xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Chưa thanh toán'),
(4, 'Đã thanh toán'),
(5, 'Đang chuẩn bị hàng'),
(6, 'Đang giao'),
(7, 'Đã giao'),
(8, 'Đã nhận'),
(9, 'Thành công'),
(10, 'Hoàn hàng'),
(11, 'Hủy đơn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`,`tai_khoan_id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_id` (`don_hang_id`,`san_pham_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hang_id` (`gio_hang_id`,`san_pham_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`,`phuong_thuc_thanh_toan_id`,`trang_thai_id`),
  ADD KEY `phuong_thuc_thanh_toan_id` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `trang_thai_id` (`trang_thai_id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_muc_id` (`danh_muc_id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `chuc_vu_id` (`chuc_vu_id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `binh_luans_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luans_ibfk_2` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_1` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD CONSTRAINT `chi_tiet_gio_hangs_ibfk_1` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_gio_hangs_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`),
  ADD CONSTRAINT `don_hangs_ibfk_2` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuong_thuc_thanh_toans` (`id`),
  ADD CONSTRAINT `don_hangs_ibfk_3` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_don_hangs` (`id`);

--
-- Constraints for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `gio_hangs_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`);

--
-- Constraints for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD CONSTRAINT `hinh_anh_san_phams_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_ibfk_1` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`);

--
-- Constraints for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD CONSTRAINT `tai_khoans_ibfk_1` FOREIGN KEY (`chuc_vu_id`) REFERENCES `chuc_vus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
