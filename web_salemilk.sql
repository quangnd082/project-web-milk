-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 10:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_salemilk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `ten_danhmuc`) VALUES
(9, 'THTrueMilk'),
(10, 'NutiFood'),
(11, 'Vinamilk'),
(15, 'Milo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id_donhang` int(11) NOT NULL,
  `ten_kh` varchar(250) NOT NULL,
  `email_kh` varchar(250) NOT NULL,
  `diachi_kh` varchar(250) NOT NULL,
  `thanhpho_kh` varchar(250) NOT NULL,
  `sdt_kh` varchar(250) NOT NULL,
  `tongtien_sanpham` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id_donhang`, `ten_kh`, `email_kh`, `diachi_kh`, `thanhpho_kh`, `sdt_kh`, `tongtien_sanpham`, `id`) VALUES
(106, 'Nguyễn Mạnh Trung', 'nguyenmanhtrung_t65@hus.edu.vn', '10 ngách 29/42 Khương Hạ', 'Phường Khương Đình, Quận Thanh Xuân, Thành phố Hà Nội', '0327103128', '100800', 13),
(107, 'Nguyễn Mạnh Trung', 'nguyenmanhtrung_t65@hus.edu.vn', '10 ngách 29/42 Khương Hạ', 'Phường Khương Đình, Quận Thanh Xuân, Thành phố Hà Nội', '0327103128', '261200', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `ten_sanpham` varchar(250) NOT NULL,
  `soluong_dat` int(11) NOT NULL,
  `ma_sanpham` varchar(250) NOT NULL,
  `gia_sanpham` varchar(250) NOT NULL,
  `hinhanh_sanpham` text NOT NULL,
  `id_giohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giohang_dathanhtoan`
--

CREATE TABLE `tbl_giohang_dathanhtoan` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `ten_sanpham` varchar(250) NOT NULL,
  `soluong_dat` int(11) NOT NULL,
  `ma_sanpham` varchar(250) NOT NULL,
  `gia_sanpham` varchar(250) NOT NULL,
  `hinhanh_sanpham` text NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_dathang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_giohang_dathanhtoan`
--

INSERT INTO `tbl_giohang_dathanhtoan` (`id`, `id_sanpham`, `ten_sanpham`, `soluong_dat`, `ma_sanpham`, `gia_sanpham`, `hinhanh_sanpham`, `id_donhang`, `id_dathang`) VALUES
(13, 46, 'Sữa hạt vị cam', 4, '26', '25200', 'SCUTT-TOPKID-Cam-180-457x396.png', 106, 125),
(13, 52, 'Sữa trái cây', 10, '32', '11000', 'suatraicaysieuqua-product-img-61.png', 107, 126),
(13, 46, 'Sữa hạt vị cam', 6, '26', '25200', 'SCUTT-TOPKID-Cam-180-457x396.png', 107, 127);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `ten_sanpham` varchar(250) NOT NULL,
  `ma_sanpham` varchar(250) NOT NULL,
  `gia_sanpham` varchar(250) NOT NULL,
  `soluong_sanpham` int(11) NOT NULL,
  `hinhanh_sanpham` text NOT NULL,
  `tomtat_sanpham` tinytext NOT NULL,
  `noidung_sanpham` text NOT NULL,
  `tinhtrang_sanpham` int(11) NOT NULL,
  `giamgia_sanpham` int(11) DEFAULT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `ten_sanpham`, `ma_sanpham`, `gia_sanpham`, `soluong_sanpham`, `hinhanh_sanpham`, `tomtat_sanpham`, `noidung_sanpham`, `tinhtrang_sanpham`, `giamgia_sanpham`, `id_danhmuc`) VALUES
(21, 'Grow Plus Gold', '1', '20000', 1, '47e28d672f91e66b5d6dd22309a45072.png', ' Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 1, 30, 10),
(22, 'Sữa tươi NutriFood', '2', '25000', 10, '610x610-2.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 2, NULL, 10),
(23, 'Sữa tiệt trùng Vinamilk', '3', '30000', 10, '1681193743-sua-tuoi-tiet-trung-c.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 11),
(24, 'Gói sữa tiệt trùng có đường Vinamilk', '4', '5000', 10, 'bich_fino_sua_tuoi_-_co_duong__1.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 11),
(25, 'Sữa dâu tiệt trùng Vinamilk', '5', '35000', 10, 'block_dau_110ml_c3030a3762834f17.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 2, NULL, 11),
(26, 'Sữa socola tiệt trùng Vinamilk', '6', '35000', 10, 'block_scl_110ml_960743ef7e94423d.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 2, NULL, 11),
(27, 'Sữa tiệt trùng ít đường Vinamilk', '7', '30000', 10, 'fm100_it_duong_1l_1_a13adfd202a9.png', ' Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 1, 30, 11),
(28, 'Sữa tiệt trùng không đường Vinamilk', '8', '30000', 10, 'fm100_khong_duong_1l_1__1__ea466.png', ' Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 1, 30, 11),
(29, 'Sữa milo ít đường', '9', '30000', 10, 'front-5.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 2, NULL, 15),
(30, 'Sữa ít đường Vinamilk', '10', '30000', 10, 'gf110-rid-leaf-chinhdien_8d59e1d.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 11),
(31, 'Grow Plus Red', '11', '300000', 10, 'growplusdo-900g.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 2, NULL, 10),
(32, 'Sữa cam THTruemilk', '12', '12000', 10, 'JUICE-milk-Cam-457x396-1.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 9),
(33, 'Sữa dâu THTruemilk', '13', '12000', 10, 'JUICE-milk-dau-457x396.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 9),
(34, 'Sữa chuối THTruemilk', '14', '12000', 10, 'JUICEmilkT7-2022-457x396-chuoi.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 9),
(35, 'Sữa việt quất THTruemilk', '15', '12000', 10, 'JUICEmilkT7-2022-457x396-vietquat.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 9),
(36, 'Milo nhí', '16', '8000', 10, 'MILO HỘP NHÍ UỐNG LIỀN_De.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 2, NULL, 15),
(37, 'Milo gói', '17', '5000', 10, 'MILO_ProductResize_230522_Sachet.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 15),
(38, 'Milo lon', '18', '15000', 10, 'milolon-hinhsanpham.png', ' Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 1, 30, 15),
(39, 'Milo hộp to', '19', '40000', 10, 'milo-powder-400g.png', ' Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 1, 30, 15),
(40, 'Milo hộp nắp', '20', '15000', 10, 'milo-teen.png', ' Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 1, 30, 15),
(41, 'Sữa lúa mạch THTruemilk', '21', '25000', 10, 'MISTORI-110-457x396.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 9),
(42, 'Milo ngũ cốc', '22', '50000', 10, 'Ngũ cốc Milo 700g 1-600x315.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 15),
(43, 'Sữa hạt', '23', '36000', 10, 'OAT-457x396-180.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 2, NULL, 9),
(44, 'Sữa chua lên men', '24', '24000', 10, 'SCU-Len-men-CD-457x396.png', ' Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 1, 30, 9),
(45, 'Sữa chua lên men vị dâu', '25', '24000', 10, 'SCU-Len-men-dau-457x396.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 9),
(46, 'Sữa hạt vị cam', '26', '36000', 0, 'SCUTT-TOPKID-Cam-180-457x396.png', ' Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 1, 30, 9),
(47, 'Sữa tươi nguyên chất', '27', '50000', 10, 'STTT-nguyen-chat-950ml.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 2, NULL, 9),
(48, 'Sữa hạt vị dâu', '28', '36000', 10, 'SCUTT-TOPKID-Dau-180-457x396.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 9),
(49, 'Sữa hạt vị chuối ', '29', '36000', 10, 'SCUTT-TOPKIDT8-2022-457x396-chuoi.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 9),
(50, 'Sữa milo có đường', '30', '30000', 10, 'hop-giay-uong-lien_Details_Thumb.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 15),
(51, 'Tuýp sữa ông thọ', '31', '21000', 10, 'tuyp__1__383cc9dc4df9400ebb6d54d.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 11),
(52, 'Sữa trái cây', '32', '11000', 0, 'suatraicaysieuqua-product-img-61.png', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 'Sữa giúp tăng chiều cao, có nhiều chất dinh dưỡng cần thiết cho trẻ nhỏ', 0, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signup`
--

CREATE TABLE `tbl_signup` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_signup`
--

INSERT INTO `tbl_signup` (`id`, `username`, `birthday`, `email`, `password`) VALUES
(13, 'admin', '2002-09-05', 'nguyenmanhtrung_t65@hus.edu.vn', '$2y$10$RyEkrJcIllPuzBsfktTs5u8ydx//nxGDyb4tblJWVcXNId55tALTm'),
(14, 'NguyenTrung', '2002-09-05', 'trunggokuty123@gmail.com', '$2y$10$kcs2TYecbDMwZezOpsFJC.K5L0YLLcuHE5e0Yca6Kv0Oc9qybYwZ2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tintuc`
--

CREATE TABLE `tbl_tintuc` (
  `id_tintuc` int(11) NOT NULL,
  `tieude_tintuc` varchar(250) NOT NULL,
  `hinhanh_tintuc` text NOT NULL,
  `lienket_tintuc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tintuc`
--

INSERT INTO `tbl_tintuc` (`id_tintuc`, `tieude_tintuc`, `hinhanh_tintuc`, `lienket_tintuc`) VALUES
(10, 'NutiFood vận hành trang trại bò sữa tại Gia Lai', 'bai1.jpg', 'https://vnexpress.net/nutifood-van-hanh-trang-trai-bo-sua-tai-gia-lai-4149789.html'),
(11, 'Khám phá vẻ đẹp của Trang trại bò sữa Daily Farm Mộc Châu', 'bai2.jpg', 'https://mia.vn/cam-nang-du-lich/kham-pha-ve-dep-cua-trang-trai-bo-sua-daily-farm-moc-chau-3793'),
(12, 'Một số hình ảnh về trang trại chăn nuôi bò sữa của Công ty Cổ phần Sữa Việt Nam -Vinamilk', 'bai3.jpg', 'http://huongkhe.hatinh.gov.vn/mot-so-hinh-anh-ve-trang-trai-chan-nuoi-bo-sua-cua-cong-ty-co-phan-sua-viet-namvinamilk-1563851631.html'),
(13, 'Vinamilk khánh thành trang trại bò sữa lớn nhất châu Á', 'bai4.jpg', 'https://bnews.vn/vinamilk-khanh-thanh-trang-trai-bo-sua-lon-nhat-chau-a/116855.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Indexes for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_giohang`);

--
-- Indexes for table `tbl_giohang_dathanhtoan`
--
ALTER TABLE `tbl_giohang_dathanhtoan`
  ADD PRIMARY KEY (`id_dathang`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Indexes for table `tbl_signup`
--
ALTER TABLE `tbl_signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  ADD PRIMARY KEY (`id_tintuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `tbl_giohang_dathanhtoan`
--
ALTER TABLE `tbl_giohang_dathanhtoan`
  MODIFY `id_dathang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_signup`
--
ALTER TABLE `tbl_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  MODIFY `id_tintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
