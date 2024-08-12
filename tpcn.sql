-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 02:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpcn`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaDH` varchar(6) NOT NULL,
  `MaSP` varchar(6) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaDH`, `MaSP`, `SoLuong`, `ThanhTien`) VALUES
('DH001', 'SP001', 10, 5500000),
('DH001', 'SP002', 10, 7395000),
('DH001', 'SP005', 10, 1277000),
('DH001', 'SP010', 10, 4600000),
('DH001', 'SP020', 10, 678000),
('DH001', 'SP050', 10, 1521000),
('DH002', 'SP001', 10, 5500000),
('DH002', 'SP004', 10, 4500000),
('DH002', 'SP008', 10, 4830000),
('DH002', 'SP012', 10, 5200000),
('DH002', 'SP017', 10, 500000),
('DH002', 'SP033', 10, 12000000),
('DH002', 'SP035', 10, 4550000),
('DH003', 'SP002', 10, 7395000),
('DH003', 'SP004', 10, 4500000),
('DH003', 'SP006', 10, 4830000),
('DH003', 'SP008', 10, 4830000),
('DH003', 'SP010', 10, 4600000),
('DH003', 'SP012', 10, 5200000),
('DH011', 'SP007', 9, 8487000),
('DH011', 'SP050', 25, 3802500),
('DH012', 'SP048', 7, 1540000),
('DH013', 'SP045', 5, 210000),
('DH014', 'SP048', 12, 2640000),
('DH015', 'SP012', 9, 4680000),
('DH016', 'SP023', 1, 36000),
('DH016', 'SP038', 1, 629850),
('DH017', 'SP019', 100, 1700000),
('DH018', 'SP041', 3, 2798100),
('DH019', 'SP016', 13, 3510000),
('DH020', 'SP029', 7, 3808000),
('DH020', 'SP043', 5, 2244000),
('DH021', 'SP031', 1, 255000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` varchar(6) NOT NULL,
  `TenDM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `TenDM`) VALUES
('DM001', 'Chăm sóc sắc đẹp'),
('DM002', 'Nhóm tim mạch'),
('DM003', 'Nhóm hô hấp'),
('DM004', 'Nhóm Mắt/Tai/Mũi'),
('DM005', 'Chăm sóc tóc'),
('DM006', 'Vitamin tổng hợp và khoáng chất'),
('DM007', 'Chăm sóc sức khỏe nam và nữ'),
('DM008', 'Chăm sóc gan'),
('DM009', 'Nhóm thần kinh'),
('DM010', 'Giảm cân'),
('DM011', 'Nhóm khác'),
('DM012', 'Nhóm đường huyết'),
('DM013', 'Nhóm cơ xương khớp'),
('DM014', 'Nhóm dạ dày');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` varchar(6) NOT NULL,
  `MaKH` varchar(6) NOT NULL,
  `NgayDat` date NOT NULL,
  `DuKien` date NOT NULL,
  `PhuongThuc` varchar(20) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `TrangThai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDH`, `MaKH`, `NgayDat`, `DuKien`, `PhuongThuc`, `TongTien`, `TrangThai`) VALUES
('DH001', 'KH001', '2024-01-20', '2024-01-25', 'Momo', 20971000, 'Chưa giao'),
('DH002', 'KH001', '2024-01-20', '2024-01-24', 'Trực tiếp', 37080000, 'Chưa giao '),
('DH003', 'KH002', '2024-01-20', '2024-01-24', 'Zalopay', 31355000, 'Chưa giao '),
('DH004', 'KH003', '2024-01-20', '2024-01-24', 'Bank', 0, 'Chưa giao '),
('DH005', 'KH004', '2024-01-20', '2024-01-24', 'Momo', 0, 'Chưa giao '),
('DH006', 'KH005', '2024-01-20', '2024-01-24', 'Bank', 0, 'Chưa giao '),
('DH007', 'KH006', '2024-01-20', '2024-01-24', 'Trực tiếp', 0, 'Chưa giao '),
('DH008', 'KH007', '2024-01-20', '2024-01-24', 'Zalopay', 0, 'Chưa giao '),
('DH009', 'KH008', '2024-01-20', '2024-01-24', 'Zalopay', 0, 'Chưa giao '),
('DH010', 'KH009', '2024-01-20', '2024-01-24', 'Momo', 0, 'Chưa giao '),
('DH011', 'KH001', '2024-06-02', '2024-06-02', 'Tiền mặt', 12289500, 'Đã thanh toán'),
('DH012', 'KH002', '2024-06-02', '2024-06-02', 'Tiền mặt', 1540000, 'Đã thanh toán'),
('DH013', 'KH002', '2024-06-02', '2024-06-02', 'Tiền mặt', 210000, 'Đang xử lý'),
('DH014', 'KH001', '2024-06-03', '2024-06-03', 'Tiền mặt', 2640000, 'Đang xử lý'),
('DH015', 'KH001', '2024-06-03', '2024-06-03', 'Tiền mặt', 4680000, 'Đang xử lý'),
('DH016', 'KH002', '2024-06-03', '2024-06-03', 'Tiền mặt', 665850, 'Đang xử lý'),
('DH017', 'KH002', '2024-06-03', '2024-06-03', 'Tiền mặt', 1700000, 'Đang xử lý'),
('DH018', 'KH002', '2024-06-03', '2024-06-03', 'Tiền mặt', 2798100, 'Đang xử lý'),
('DH019', 'KH002', '2024-06-03', '2024-06-03', 'Tiền mặt', 3510000, 'Đang xử lý'),
('DH020', 'KH002', '2024-06-03', '2024-06-03', 'Tiền mặt', 6052000, 'Đang xử lý'),
('DH021', 'KH002', '2024-06-03', '2024-06-03', 'Tiền mặt', 255000, 'Đang xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `giaohang`
--

CREATE TABLE `giaohang` (
  `MaDH` varchar(6) NOT NULL,
  `TenNguoiNhan` varchar(30) NOT NULL,
  `DiaChiNhan` varchar(255) NOT NULL,
  `SDTNguoiNhan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaohang`
--

INSERT INTO `giaohang` (`MaDH`, `TenNguoiNhan`, `DiaChiNhan`, `SDTNguoiNhan`) VALUES
('DH001', 'Nguyễn Văn A', '225/19 Trần Phú, P5, Vũng Tàu', '0925850074'),
('DH002', 'Nguyễn Văn A', '225/19 Trần Phú, P5, Vũng Tàu', '0925850074'),
('DH003', 'Nguyễn Văn B', '225/19 Trần Phú, P5, Vũng Tàu', '0925850074'),
('DH004', 'Nguyễn Văn C', '225/19 Trần Phú, P5, Vũng Tàu', '0925850074'),
('DH005', 'Nguyễn Văn D', '225/19 Trần Phú, P5, Vũng Tàu', '0925850074'),
('DH006', 'Nguyễn Văn E', '225/19 Trần Phú, P5, Vũng Tàu', '0925850074'),
('DH007', 'Nguyễn Văn F', '225/19 Trần Phú, P5, Vũng Tàu', '0925850074'),
('DH008', 'Nguyễn Văn G', '225/19 Trần Phú, P5, Vũng Tàu', '0925850074'),
('DH009', 'Nguyễn Văn H', '225/19 Trần Phú, P5, Vũng Tàu', '0925850074'),
('DH010', 'Nguyễn Văn J', '225/19 Trần Phú, P5, Vũng Tàu', '0925850074'),
('DH011', 'Hoàng Trung', '140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, Thành phố Hồ Chí Minh', '0926850074'),
('DH012', 'Hoàng Trung', '140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, Thành phố Hồ Chí Minh', '0926850074'),
('DH013', 'Trần Thị B', '456 Đường Bạch Đằng, Hải Phòng', '0123456789'),
('DH014', 'Nguyễn Văn A', '123 Đường Láng, Hà Nội', '0913626270'),
('DH015', 'Nguyễn Văn A', '123 Đường Láng, Hà Nội', '0913626270'),
('DH016', 'Trần Thị B', '456 Đường Bạch Đằng, Hải Phòng', '0123456789'),
('DH017', 'Trần Thị B', '123 Trần Phú,Xã Lũng Chinh,Huyện Mèo Vạc,Tỉnh Hà Giang', '0123456789'),
('DH018', 'Trần Thị B', '123 Trần Phú,Xã Lũng Chinh,Huyện Mèo Vạc,Tỉnh Hà Giang', '0123456789'),
('DH019', 'Trần Thị B', '123 Trần Phú, Xã Thái Sơn, Huyện Bảo Lâm, Tỉnh Cao Bằng', '0123456789'),
('DH020', 'Trần Thị B', '123 Trần Phú,Xã Lũng Chinh,Huyện Mèo Vạc,Tỉnh Hà Giang', '0123456789'),
('DH021', 'Trần Thị B', '123 Trần Phú, Xã Mê Linh, Huyện Mê Linh, Thành phố Hà Nội', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` varchar(6) NOT NULL,
  `TenKH` varchar(30) NOT NULL,
  `GioiTinh` varchar(5) NOT NULL,
  `NgaySinh` date NOT NULL,
  `SoDT` varchar(12) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `MaTK` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `GioiTinh`, `NgaySinh`, `SoDT`, `DiaChi`, `Email`, `MaTK`) VALUES
('KH001', 'Nguyễn Văn A', 'Nam', '1990-05-15', '0913626270', '123 Đường Láng, Hà Nội', '2001216255@huit.edu.vn', 'TK001'),
('KH002', 'Trần Thị B', 'Nữ', '1992-08-25', '0123456789', '123 Trần Phú,Xã Lũng Chinh,Huyện Mèo Vạc,Tỉnh Hà Giang', 'tranthib@hufi.edu.vn', 'TK002'),
('KH003', 'Lê Minh C', 'Nam', '1985-03-10', '0901234567', '789 Đường Lê Lợi, Hồ Chí Minh', 'leminhc@gmail.com', 'TK003'),
('KH004', 'Phạm Thị D', 'Nữ', '1988-11-03', '0998877665', '321 Đường Nguyễn Huệ, Đà Nẵng', 'phamthid@gmail.com', 'TK004'),
('KH005', 'Hoàng Văn E', 'Nam', '1993-07-20', '0887654321', '654 Đường Lê Duẩn, Hà Nội', 'hoangvane@gmail.com', 'TK005'),
('KH006', 'Nguyễn Thị F', 'Nữ', '1991-01-30', '0976543210', '987 Đường Trần Hưng Đạo, Hồ Chí Minh', 'nguyenthif@gmail.com', 'TK006'),
('KH007', 'Trần Văn G', 'Nam', '1987-09-05', '0965432109', '234 Đường Lê Thánh Tôn, Hải Phòng', 'tranvang@gmail.com', 'TK007'),
('KH008', 'Lê Thị H', 'Nữ', '1986-04-12', '0912345678', '876 Đường Phan Đình Phùng, Đà Nẵng', 'lethih@gmail.com', 'TK008'),
('KH009', 'Nguyễn Văn I', 'Nam', '1994-06-22', '0954321098', '543 Đường Nguyễn Công Trứ, Hà Nội', 'nguyenvani@gmail.com', 'TK009'),
('KH010', 'Trần Thị K', 'Nữ', '1989-02-18', '0943210987', '210 Đường Trần Phú, Hồ Chí Minh', 'tranthik@gmail.com', 'TK010'),
('KH011', 'Phạm Văn L', 'Nam', '1984-12-08', '0932109876', '789 Đường Nguyễn Thị Minh Khai, Đà Nẵng', 'phamvanl@gmail.com', 'TK011'),
('KH012', 'Hoàng Thị M', 'Nữ', '1990-10-11', '0921098765', '876 Đường Lê Lai, Hà Nội', 'hoangthim@gmail.com', 'TK012'),
('KH013', 'Nguyễn Văn N', 'Nam', '1983-08-27', '0910987654', '321 Đường Phan Chu Trinh, Hồ Chí Minh', 'nguyenvann@gmail.com', 'TK013'),
('KH014', 'Trần Thị P', 'Nữ', '1995-04-03', '0909876543', '456 Đường Hùng Vương, Hải Phòng', 'tranthip@gmail.com', 'TK014'),
('KH015', 'Lê Văn Q', 'Nam', '1982-11-16', '0987654321', '543 Đường Lý Tự Trọng, Đà Nẵng', 'levanq@gmail.com', 'TK015');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` varchar(6) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `Gia` int(11) NOT NULL,
  `TonKho` int(11) NOT NULL,
  `HinhAnh` varchar(30) NOT NULL,
  `MaDM` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MoTa`, `Gia`, `TonKho`, `HinhAnh`, `MaDM`) VALUES
('SP001', 'Nước uống Collagen Goodlife Collagen Glow', 'Da căng ngăn lão hoá, cải thiện làn da sáng tự nhiên, cấp ẩm.', 550000, 20, 'sp001.png', 'DM001'),
('SP002', 'Nước uống Kolmar Beyou Collagen', 'Bổ sung collagen.', 739500, 50, 'sp002.png', 'DM001'),
('SP003', 'Nước uống Welson Beauty 10x Water Boost', 'Sản phẩm giúp cung cấp nước và độ ẩm, tăng độ đàn hồi tốt và cải thiện các sắc tố da một cách hiệu quả.', 595000, 50, 'sp003.png', 'DM001'),
('SP004', 'Thạch Kolmar Beyou Collagen', 'Bổ sung collagen, hỗ trợ đẹp da.', 450000, 100, 'sp004.png', 'DM001'),
('SP005', 'Viên uống Acnacare', 'Bổ sung các chất ngăn ngừa Oxy hóa, giúp ngăn ngừa, hỗ trợ làm giảm mụn và viêm các tuyến bã nhờn trên da, làm đẹp da.', 127700, 50, 'sp005.png', 'DM001'),
('SP006', 'Viên uống BLISSBERRY Pureskin Whitening Collagen', 'Giúp tăng cường độ ẩm, độ đàn hồi cho da, giúp làm đẹp da.', 483000, 10, 'sp006.png', 'DM001'),
('SP007', 'Viên uống CJ InnerB Aqua Rich Double Up', 'Cấp ẩm, tăng đàn hồi và bảo vệ da khỏi tổn thương của tia UV', 943000, 50, 'sp007.png', 'DM001'),
('SP008', 'Viên uống BLISSBERRY Purehealth Cholesterol Care K', '\r\nHỗ trợ hạn chế quá trình oxy hóa, giúp giảm cholesterol trong máu', 483000, 50, 'sp008.png', 'DM002'),
('SP009', 'Viên uống Blackmores Cholesterol Health', '\r\nHỗ trợ giảm cholesterol trong máu, giảm nguy cơ bệnh tim mạch.', 626400, 50, 'sp009.png', 'DM002'),
('SP010', 'Viên uống Blackmores CoQ10', '\r\nGiúp chống oxy hóa và tăng cường năng lượng cho tim, hỗ trợ duy trì sức khỏe tim mạch và làm chậm quá trình lão hóa cơ thể.', 460000, 50, 'sp010.png', 'DM002'),
('SP011', 'Viên uống Costar Garlic Oil tinh dầu tỏi', '\r\nGiúp tăng cường sức đề kháng, hỗ trợ giảm các triệu chứng cảm cúm thông thường. Người sức đề kháng kém, người bị cảm cúm thông thường và trẻ em trên 2 tuổi.', 152700, 50, 'sp011.png', 'DM002'),
('SP012', 'Viên uống DHC DHA', 'Hỗ trợ bổ sung DHA, EPA hỗ trợ giảm mỡ máu.', 520000, 50, 'sp012.png', 'DM002'),
('SP013', 'Viên uống DHG NattoEnzym', '\r\nHỗ trợ làm tan cục máu đông, giảm nguy cơ hình thành huyết khối, giúp tăng tuần hoàn và giảm nguy cơ di chứng sau tai biến mạch máu não do tắc mạch.', 367000, 50, 'sp013.png', 'DM002'),
('SP014', 'Viên uống Lohha', 'Hỗ trợ tăng cường hoạt động trí não. Hỗ trợ giảm các triệu chứng sa sút trí tuệ, teo não tuổi già như: Giảm trí nhớ, giảm khả năng ngôn ngữ, rối loạn hành vi.', 245000, 50, 'sp014.png', 'DM002'),
('SP015', 'Chai xịt keo ong xanh vị bạc hà Tracybee Mint & Ho', 'Hỗ trợ nâng cao sức đề kháng, bổ sung kháng thể tự nhiên của keo ong, giúp hạn chế quá trình oxy hóa, giúp kháng khuẩn trong khoang miệng và đường hô hấp: Viêm họng, ho, cảm cúm...', 270000, 50, 'sp015.png', 'DM003'),
('SP016', 'Chai xịt keo ong xanh vị trái cây cho bé Tracybee ', 'Hỗ trợ nâng cao sức đề kháng, bổ sung kháng thể tự nhiên của keo ong, giúp hạn chế quá trình oxy hóa, giúp kháng khuẩn trong khoang miệng và đường hô hấp.', 270000, 50, 'sp016.png', 'DM003'),
('SP017', 'Kẹo ngậm Cozz Candy', 'Làm ấm và thông họng, thơm miệng. Hỗ trợ giảm ho, đau rát họng và khản tiếng.', 50000, 50, 'sp017.png', 'DM003'),
('SP018', 'Kẹo ngậm Eugica Candy', 'Hỗ trợ làm ấm đường hô hấp, làm dịu cơn ho, giảm đau rát họng và khản tiếng.', 68000, 50, 'sp018.png', 'DM003'),
('SP019', 'Kẹo thảo dược Eugica Candy Cool Extra', 'Hơi thở thơm mát. Thông cổ, giảm nghẹt mũi. Làm dịu cơn ho, giảm đau rát họng và khản tiếng.', 17000, 50, 'sp019.png', 'DM003'),
('SP020', 'Siro Eugica Ivy Syrup', 'Hỗ trợ long đờm và giảm ho.', 67800, 50, 'sp020.png', 'DM003'),
('SP021', 'Siro IVY Extra', 'Hỗ trợ bổ phế, long đờm, giảm ho', 60000, 50, 'sp021.png', 'DM003'),
('SP022', 'Viên uống ABIPHA An Xoang', 'Hỗ trợ giảm các triệu chứng: ngạt mũi, chảy nước mũi, đau đầu do viêm xoang, viêm mũi dị ứng.', 103000, 50, 'sp022.png', 'DM004'),
('SP023', 'Viên uống DHG Eyelight Ganat', 'Hỗ trợ bảo vệ mắt, cải thiện thị lực, giúp giảm mỏi mắt, mờ mắt, thoái hóa võng mạc.', 36000, 50, 'sp023.png', 'DM004'),
('SP024', 'Viên uống Ecogreen WIT For Your Eyes', 'Tăng cường thị lực, giảm mờ và nhòe mắt. Bổ sung các dưỡng chất, hoạt chất sinh học tự nhiên, hỗ trợ điều tiết mắt, cải thiện các chứng khô mắt, mỏi mắt, đau nhức mắt.', 590000, 50, 'sp024.png', 'DM004'),
('SP025', 'Viên uống HGSG Pharma Vission Eye', 'Hỗ trợ tăng cường thị lực, hỗ trợ giảm các triệu chứng khô mắt, mỏi mắt, nhìn mờ. Hỗ trợ giảm nguy cơ thoái hoá điểm vàng, đục thuỷ tinh thể.', 129600, 50, 'sp025.png', 'DM004'),
('SP026', 'Viên uống Imexpharm Max Go Lutein', 'Hỗ trợ làm giảm triệu chứng khô mắt, mỏi mắt, nhức mắt, giúp giảm nguy cơ: thoái hóa điểm vàng, đục thủy tinh thể.', 133650, 50, 'sp026.png', 'DM004'),
('SP027', 'Viên uống Keiko Bilberon', 'Bổ sung các chất cần thiết cho mắt, hỗ trợ giảm nguy cơ lão hóa mắt, đục thủy tinh thể. Hỗ trợ cải thiện thị lực, giảm mỏi mắt, khô mắt, giúp mắt sáng khỏe.', 165000, 50, 'sp027.png', 'DM004'),
('SP028', 'Viên uống Kolmar Condition Eye', 'Bổ sung dưỡng chất hỗ trợ tăng cường thị lực cho mắt, giúp giảm nguy cơ thoái hóa điểm vàng, đục thủy tinh thể. Chống oxy hóa và làm chậm quá trình lão hóa của mắt.', 246500, 50, 'sp028.png', 'DM004'),
('SP029', 'Viên uống Vitabiotics Perfectil', 'Giúp bổ sung các vi chất cần thiết giúp nuôi dưỡng, hỗ trợ làm đẹp da, tóc móng chắc khỏe.', 544000, 50, 'sp029.png', 'DM005'),
('SP030', 'Bột uống Kolmar Condition Let’s C Family', 'Bổ sung vitamin C, Kẽm và B2 giúp tăng cường sức đề kháng cho cơ thể, hỗ trợ chống oxy hóa, hỗ trợ tăng hấp thụ sắt.', 187000, 50, 'sp030.png', 'DM006'),
('SP031', 'Nước uống Kolmar Hongsamjin Gold Hồng Sâm', 'Hỗ trợ nâng cao sức khỏe, giảm mệt mỏi.', 255000, 50, 'sp031.png', 'DM006'),
('SP032', 'Nước uống Nutine Hồng Sâm Hongsamjin Plus', 'Hỗ trợ cải thiện và tăng cường sức khỏe, giảm mệt mỏi  Người trưởng thành.', 490000, 50, 'sp032.png', 'DM006'),
('SP033', 'Nước uống Nutine Hồng sâm cô đặc Hongsamjin Everys', 'Hỗ trợ cải thiện và tăng cường sức khỏe, giảm mệt mỏi  Người trưởng thành.', 1200000, 50, 'sp033.png', 'DM006'),
('SP034', 'Nước uống đông trùng hạ thảo Welson Cordyceps', 'Cung cấp các dưỡng chất cần thiết cho việc tăng cường sức đề kháng và bồi bổ cơ thể.', 345000, 50, 'sp034.png', 'DM006'),
('SP035', 'Viên dầu cá Good Health Omega 3 Fish Oil', 'Viên dầu cá Omega 3 Fish Oil 1000Mg Goodhealth bổ sung EPA (icosapent) và DHA giúp phát triển não bộ, tốt cho mắt và tim mạch.', 455000, 50, 'sp035.png', 'DM006'),
('SP036', 'Viên dầu cá Healthy Life Omega 3', 'Hỗ trợ bổ sung Omega 3: EPA, DHA cho cơ thể. Tốt cho não, mắt và tim mạch, tăng cường sức khỏe, hỗ trợ giảm mỡ máu.', 465000, 50, 'sp036.png', 'DM006'),
('SP037', 'Bột LADOPHAR LADO CARE MARS', 'Hỗ trợ bổ thận, tráng dương, hỗ trợ cải thiện sinh lý nam giới. ', 485000, 50, 'sp037.png', 'DM007'),
('SP038', 'Tinh dầu hoa anh thảo Blackmores Evening Primrose ', 'Chống oxy hóa, hỗ trợ làm giảm các triệu chứng tiền kinh nguyệt.', 629850, 50, 'sp038.png', 'DM007'),
('SP039', 'Tinh dầu hoa anh thảo Costar Evening Primrose Oil', 'Hỗ trợ chống oxy hóa. Giúp giảm triệu chứng bốc hỏa ở phụ nữ tiền mãn kinh, mãn kinh.', 583200, 50, 'sp039.png', 'DM007'),
('SP040', 'Viên uống ALIPAS Ecogreen Men’s Ginseng', 'Hỗ trợ tăng cường sức khỏe sinh lý: cải thiện tình trạng rối loạn cương dương; cải thiện tình trạng vô sinh - hiếm muộn nam do tinh trùng yếu; cải thiện hội chứng mãn dục nam.', 750000, 50, 'sp040.png', 'DM007'),
('SP041', 'Viên uống Alltimes Care Kangaroo', 'Hỗ trợ tăng cường sinh lực ở nam giới. Hỗ trợ tăng cường sức khỏe.', 932700, 50, 'sp041.png', 'DM007'),
('SP042', 'Viên uống Bioco Huvit for Men', 'Hỗ trợ hạn chế tiến triển u xơ lành tính tuyến tiền liệt và tăng cường chức năng của hệ tiết niệu cho nam giới trên 45 tuổi. Hộ trợ giảm tiểu đêm do u xơ tiền liệt.', 680000, 50, 'sp042.png', 'DM007'),
('SP043', 'Viên uống Blackmores Multivitamin For Men', 'Bổ sung dưỡng chất cho cơ thể, hỗ trợ tăng cường sinh lực nam giới.', 448800, 50, 'sp043.png', 'DM007'),
('SP045', 'Nước uống Ladophar Lado Actiso Cao Ống Actiso', 'Hỗ trợ bảo vệ gan, lợi mật, lợi tiểu, hỗ trợ giải độc gan.', 42000, 50, 'sp045.png', 'DM008'),
('SP046', 'Viên uống Kolmar Condition Liver', 'Giúp mát gan, bảo vệ gan. Hỗ trợ tăng cường chức năng gan, giúp giảm tác hại của rượu bia gây hại cho gan.', 467500, 50, 'sp046.png', 'DM008'),
('SP047', 'Viên uống Nam Dược Cà gai leo', 'Thanh nhiệt, mát gan, hỗ trợ giải độc gan, bảo vệ gan và tăng cường chức năng gan trong các trường hợp: Suy gan, men gan cao, người dung nhiều bia rượu, uống các thuốc có hại cho gan. Hỗ trợ làm giảm các triệu chứng: chán ăn, vàng da, mẫn ngứa, nổi mề đay', 118000, 50, 'sp047.png', 'DM008'),
('SP048', 'Viên uống Naturen Z', 'Hạ men gan, bổ gan, mát gan, nhuận tràng. Giúp giảm dấu hiệu đau tức hạ sườn phải, mệt mỏi, vàng da, khô miệng, đắng miệng, trướng bụng, khó tiêu, ăn ngủ kém.', 220000, 50, 'sp048.png', 'DM008'),
('SP049', 'Viên uống hỗ trợ giảm rối loạn chức năng gan Vgold', 'Hỗ trợ giúp bổ gan, giúp bảo vệ gan, hỗ trợ tăng cường chức năng gan.', 210000, 50, 'sp049.png', 'DM008'),
('SP050', 'Viên uống An Huy Onepharm Livermaxs', 'Hỗ trợ thanh nhiệt, mát gan, giải độc gan và bảo vệ gan. Hỗ trợ tăng cường chức năng gan, hạn chế tác hại của rượu bia và hóa chất đối với gan.', 152100, 50, 'sp050.png', 'DM008'),
('SP051', 'Nước uống Usvip', 'Hỗ trợ giảm cảm giác nôn, buồn nôn, chóng mặt khi đi tàu xe.', 203000, 50, 'sp051.png', 'DM009'),
('SP052', 'Viên uống ABIPHA Ginkgo 360 Natto Q10', 'Hỗ trợ tăng cường tuần hoàn não, giảm nguy cơ hình thành cục máu đông, hỗ trợ giảm các triệu chứng đau đầu, chóng mặt, mất ngủ do thiểu năng tuần hoàn não.', 89000, 50, 'sp052.png', 'DM009'),
('SP053', 'Viên uống BioCo HuVit Gink forte', 'Hỗ trợ hoạt huyết, hỗ trợ làm tan cục máu đông, hỗ trợ tăng cường lưu thông máu lên não. Hỗ trợ giảm triệu chứng đau đầu, hoa mắt, chóng mặt, ù tai do thiểu năng tuần hoàn não.', 594000, 50, 'sp053.png', 'DM009'),
('SP054', 'Viên uống Bioco Huvit Valeria Max', 'Dưỡng tâm, an thần, hỗ trợ trấn an thần kinh, ngủ ngon, không mệt mỏi khi thức dậy.', 420000, 50, 'sp054.png', 'DM009'),
('SP055', 'Viên uống Blackmores Executive B Stress Formular', 'Bổ sung các vitamin và khoáng chất cho cơ thể. Hỗ trợ tăng cường sức khỏe, giảm mệt mỏi.', 428000, 50, 'sp055.png', 'DM009'),
('SP056', 'Viên uống Blackmores Ginkgoforte', 'Giúp cải thiện trí nhớ, chức năng nhận thức, tập trung và tăng cường sự tỉnh táo. Giúp cải thiện lưu thông máu trong não, làm tăng oxy và chất dinh dưỡng cung cấp cho hệ thống thần kinh trung ương, bảo vệ chống lại tổn thương oxy hóa của các tế bào thần k', 360800, 50, 'sp056.png', 'DM009'),
('SP057', 'Viên uống DHG Pharma Night Queen', 'Hỗ trợ dưỡng tâm, an thần, giúp dễ ngủ, ngủ sâu giấc.', 58000, 50, 'sp057.png', 'DM009'),
('SP058', 'Viên uống Hotchland MegaSlim', 'Hỗ trợ tăng cường chuyển hóa chất béo. Hỗ trợ giảm cân, hỗ trợ hạn chế nguy cơ béo phì.', 856000, 50, 'sp058.png', 'DM010'),
('SP059', 'Viên uống Nature Gift 15 Days', 'Hỗ trợ giảm béo, lấy lại vóc dáng,', 820000, 50, 'sp059.png', 'DM010'),
('SP060', 'Viên sủi hỗ trợ giảm cân Dr. Frei Slim Line L-Carn', 'Hỗ trợ giảm cân', 246759, 50, 'sp060.png', 'DM010'),
('SP061', 'Viên uống Alltimes Care Platinum Weightloss', 'Hỗ trợ giảm béo cho người thừa cân béo phì.', 638200, 50, 'sp061.png', 'DM010'),
('SP062', 'Cốm Natufib hỗ trợ tiêu hoá, ngăn ngừa táo bón cho', 'Bổ sung chất xơ hòa tan (Fructo Oligosaccharid) giúp làm mềm phân, hỗ trợ điều trị táo bón, giúp hệ vi sinh có lợi phát triển chống rối loạn tiêu hóa, tăng cường khả năng hấp thụ các chất dinh dưỡng.', 61000, 50, 'sp062.png', 'DM011'),
('SP063', 'Nhụy hoa nghệ tây đỏ hữu cơ Krokos Kozanis Pdo', 'Nhụy hoa nghệ tây đỏ hữu cơ Krokos Kozanis Pdo xuất xứ Hy Lạp, đảm bảo an toàn và chất lượng, giúp cung cấp thêm dưỡng chất và vị thơm ngon cho các món ăn, thức uống hàng ngày.', 275200, 50, 'sp063.png', 'DM011'),
('SP064', 'Viên uống Healthy Life Green Living Vein Care', 'Hỗ trợ tăng cường sức bền thành mạch, làm giảm các triệu chứng: phù nề, đau nhức chân do suy giãn tĩnh mạch, giảm các triệu chứng do trĩ.', 549000, 50, 'sp064.png', 'DM011'),
('SP065', 'Viên uống FUCOIDAN Immune Booster', 'Giúp chống oxy hóa, hổ trợ tăng cường sức đề kháng cho cơ thể.', 1650000, 50, 'sp065.png', 'DM011'),
('SP066', 'Viên uống Thái Minh Vương Niệu Đanh', 'Hỗ trợ giảm kích thích bàng quang, giúp cải thiện tình trạng tiểu đêm, tiểu nhiều lần, tiểu gấp, tiểu són, tiểu không tự chủ Dùng cho cả nam và nữ có chức năng bàng quang kém gây tiểu đêm, tiểu nhiều lần, tiểu gấp, tiểu són, tiểu không tự chủ.', 578000, 50, 'sp066.png', 'DM011'),
('SP067', 'Viên uống Ích Niệu Khang', 'Ích Niệu Khang hỗ trợ giảm chứng rối loạn tiểu tiện: tiểu đêm, tiểu nhiều lần, tiểu không kiểm soát (không tự chủ), tiểu rắt, tiểu són.', 155800, 50, 'sp067.png', 'DM011'),
('SP068', 'Viên uống Boni Diabet', 'Hỗ trợ giúp giảm lượng đường trong máu, giúp giảm các biến chứng của bệnh tiểu đường, hỗ trợ giảm cholesterol máu.', 405000, 50, 'sp068.png', 'DM012'),
('SP069', 'Viên uống Healthy Life Green Living Sugar Less', 'Hỗ trợ giảm đường huyết về mức ổn định, giảm nguy cơ mắc các bệnh về tim mạch vành do đái tháo đường, hỗ trợ sức khỏe mắt và tim mạch, giúp giảm các biến chứng do đái tháo đường.', 443100, 50, 'sp069.png', 'DM012'),
('SP070', 'Viên uống Nam Dược Diabetna', 'Hỗ trợ sinh tân, chỉ khát, làm hạ đường huyết hỗ trợ phòng ngừa bệnh tiểu đường, ổn định đường huyết và ngăn ngừa các biến chứng của bệnh tiểu đường.', 108000, 50, 'sp070.png', 'DM012'),
('SP071', 'Viên uống Nucos Diabetes', 'Hỗ trợ giúp giảm đường huyết cho người tiền tiểu đường, tiểu đường. Hỗ trợ giảm mỡ trong máu do đó tốt cho tim mạch. Hỗ trợ tăng cường sức đề kháng.', 495000, 50, 'sp071.png', 'DM012'),
('SP072', 'Viên uống Premium Omexxel Blood Sugar Health', 'Hỗ trợ ổn định đường huyết.', 476000, 50, 'sp072.png', 'DM012'),
('SP123', 'Chocolate Macaron', 'Bánh rất thơm và nồng mùi cacao', 70000, 50, 'sp011.png', 'DM005');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` varchar(6) NOT NULL,
  `TenTK` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `PhanQuyen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `TenTK`, `MatKhau`, `PhanQuyen`) VALUES
('TK000', 'admin', 'admin', 'admin'),
('TK001', 'user1', '123', 'user'),
('TK002', 'user2', 'user2', 'user'),
('TK003', 'user3', 'user3', 'user'),
('TK004', 'user4', 'user4', 'user'),
('TK005', 'user5', 'user5', 'user'),
('TK006', 'user6', 'user6', 'user'),
('TK007', 'user7', 'user7', 'user'),
('TK008', 'user8', 'user8', 'user'),
('TK009', 'user9', 'user9', 'user'),
('TK010', 'user10', 'user10', 'user'),
('TK011', 'user11', 'user11', 'user'),
('TK012', 'user12', 'user12', 'user'),
('TK013', 'user13', 'user13', 'user'),
('TK014', 'user14', 'user14', 'user'),
('TK015', 'user15', 'user15', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaDH`,`MaSP`),
  ADD KEY `fk_ctdh_masp` (`MaSP`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `fk_donhang_makh` (`MaKH`);

--
-- Indexes for table `giaohang`
--
ALTER TABLE `giaohang`
  ADD PRIMARY KEY (`MaDH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `fk_khachhang_matk` (`MaTK`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `fk_sanpham_madm` (`MaDM`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_ctdh_madh` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`),
  ADD CONSTRAINT `fk_ctdh_masp` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_donhang_makh` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);

--
-- Constraints for table `giaohang`
--
ALTER TABLE `giaohang`
  ADD CONSTRAINT `fk_giaohang_madh` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `fk_khachhang_matk` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_madm` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
