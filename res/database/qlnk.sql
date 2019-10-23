-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 27, 2019 lúc 08:37 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlnk`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cktk`
--

CREATE TABLE `cktk` (
  `id` int(11) NOT NULL,
  `socmnd` varchar(255) NOT NULL,
  `khaucu` varchar(255) NOT NULL,
  `khaumoi` varchar(255) NOT NULL,
  `lydo` varchar(255) NOT NULL,
  `loai` varchar(255) NOT NULL COMMENT 'Chuyển khẩu hoặc tách khẩu',
  `ngayth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cktk`
--

INSERT INTO `cktk` (`id`, `socmnd`, `khaucu`, `khaumoi`, `lydo`, `loai`, `ngayth`) VALUES
(1, '093333333', 'hk002', 'hk003', 'Đây là lý do', 'Chuyển khẩu', '2019-03-20'),
(3, '092222222', 'hk002', 'hk001', 'Debugging', 'Tách khẩu', '2019-03-21'),
(4, '092222222', 'hk001', 'hk002', 'Debugging', 'Tách khẩu', '2019-03-21'),
(5, '095555555', 'hk001', 'hk004', 'Debugging', 'Tách khẩu', '2019-03-21'),
(6, '096666666', 'hk001', 'hk005', 'Debuggggggggggg', 'Tách khẩu', '2019-03-21'),
(7, '097777777', 'hk001', 'hk006', 'Deuvayhsdbasd', 'Tách khẩu', '2019-03-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diadiem`
--

CREATE TABLE `diadiem` (
  `madd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tendd` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diadiem`
--

INSERT INTO `diadiem` (`madd`, `tendd`) VALUES
('09163-256-27', 'Phường Vũ Ninh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09166-256-27', 'Phường Đáp Cầu-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09169-256-27', 'Phường Thị Cầu-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09172-256-27', 'Phường Kinh Bắc-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09175-256-27', 'Phường Vệ An-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09178-256-27', 'Phường Tiền An-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09181-256-27', 'Phường Đại Phúc-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09184-256-27', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09187-256-27', 'Phường Suối Hoa-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09190-256-27', 'Phường Võ Cường-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09193-258-27', 'Thị trấn Chờ-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09196-258-27', 'Xã Dũng Liệt-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09199-258-27', 'Xã Tam Đa-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09202-258-27', 'Xã Tam Giang-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09205-258-27', 'Xã Yên Trung-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09208-258-27', 'Xã Thụy Hòa-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09211-258-27', 'Xã Hòa Tiến-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09214-256-27', 'Xã Hòa Long-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09217-258-27', 'Xã Đông Tiến-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09220-258-27', 'Xã Yên Phụ-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09223-258-27', 'Xã Trung Nghĩa-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09226-256-27', 'Phường Vạn An-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09229-258-27', 'Xã Đông Phong-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09232-258-27', 'Xã Long Châu-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09235-256-27', 'Phường Khúc Xuyên-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09238-258-27', 'Xã Văn Môn-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09241-258-27', 'Xã Đông Thọ-Huyện Yên Phong-Tỉnh Bắc Ninh'),
('09244-256-27', 'Phường Phong Khê-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09247-259-27', 'Thị trấn Phố Mới-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09250-259-27', 'Xã Việt Thống-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09253-259-27', 'Xã Đại Xuân-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09256-256-27', 'Xã Kim Chân-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09259-259-27', 'Xã Nhân Hòa-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09262-259-27', 'Xã Bằng An-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09265-259-27', 'Xã Phương Liễu-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09268-259-27', 'Xã Quế Tân-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09271-256-27', 'Phường Vân Dương-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09274-259-27', 'Xã Phù Lương-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09277-259-27', 'Xã Phù Lãng-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09280-259-27', 'Xã Phượng Mao-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09283-259-27', 'Xã Việt Hùng-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09286-256-27', 'Xã Nam Sơn-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09289-259-27', 'Xã Ngọc Xá-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09292-259-27', 'Xã Châu Phong-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09295-259-27', 'Xã Bồng Lai-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09298-259-27', 'Xã Cách Bi-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09301-259-27', 'Xã Đào Viên-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09304-259-27', 'Xã Yên Giả-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09307-259-27', 'Xã Mộ Đạo-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09310-259-27', 'Xã Đức Long-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09313-259-27', 'Xã Chi Lăng-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09316-259-27', 'Xã Hán Quảng-Huyện Quế Võ-Tỉnh Bắc Ninh'),
('09319-260-27', 'Thị trấn Lim-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09322-260-27', 'Xã Phú Lâm-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09325-256-27', 'Phường Khắc Niệm-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09328-260-27', 'Xã Nội Duệ-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09331-256-27', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh'),
('09334-260-27', 'Xã Liên Bão-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09337-260-27', 'Xã Hiên Vân-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09340-260-27', 'Xã Hoàn Sơn-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09343-260-27', 'Xã Lạc Vệ-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09346-260-27', 'Xã Việt Đoàn-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09349-260-27', 'Xã Phật Tích-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09352-260-27', 'Xã Tân Chi-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09355-260-27', 'Xã Đại Đồng-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09358-260-27', 'Xã Tri Phương-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09361-260-27', 'Xã Minh Đạo-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09364-260-27', 'Xã Cảnh Hưng-Huyện Tiên Du-Tỉnh Bắc Ninh'),
('09367-261-27', 'Phường Đông Ngàn-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09370-261-27', 'Xã Tam Sơn-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09373-261-27', 'Xã Hương Mạc-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09376-261-27', 'Xã Tương Giang-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09379-261-27', 'Xã Phù Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09382-261-27', 'Phường Đồng Kỵ-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09383-261-27', 'Phường Trang Hạ-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09385-261-27', 'Phường Đồng Nguyên-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09388-261-27', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09391-261-27', 'Phường Tân Hồng-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09394-261-27', 'Phường Đình Bảng-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09397-261-27', 'Xã Phù Chẩn-Thị xã Từ Sơn-Tỉnh Bắc Ninh'),
('09400-262-27', 'Thị trấn Hồ-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09403-262-27', 'Xã Hoài Thượng-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09406-262-27', 'Xã Đại Đồng Thành-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09409-262-27', 'Xã Mão Điền-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09412-262-27', 'Xã Song Hồ-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09415-262-27', 'Xã Đình Tổ-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09418-262-27', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09421-262-27', 'Xã Trí Quả-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09424-262-27', 'Xã Gia Đông-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09427-262-27', 'Xã Thanh Khương-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09430-262-27', 'Xã Trạm Lộ-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09433-262-27', 'Xã Xuân Lâm-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09436-262-27', 'Xã Hà Mãn-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09439-262-27', 'Xã Ngũ Thái-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09442-262-27', 'Xã Nguyệt Đức-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09445-262-27', 'Xã Ninh Xá-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09448-262-27', 'Xã Nghĩa Đạo-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09451-262-27', 'Xã Song Liễu-Huyện Thuận Thành-Tỉnh Bắc Ninh'),
('09454-263-27', 'Thị trấn Gia Bình-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09457-263-27', 'Xã Vạn Ninh-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09460-263-27', 'Xã Thái Bảo-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09463-263-27', 'Xã Giang Sơn-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09466-263-27', 'Xã Cao Đức-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09469-263-27', 'Xã Đại Lai-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09472-263-27', 'Xã Song Giang-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09475-263-27', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09478-263-27', 'Xã Lãng Ngâm-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09481-263-27', 'Xã Nhân Thắng-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09484-263-27', 'Xã Xuân Lai-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09487-263-27', 'Xã Đông Cứu-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09490-263-27', 'Xã Đại Bái-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09493-263-27', 'Xã Quỳnh Phú-Huyện Gia Bình-Tỉnh Bắc Ninh'),
('09496-264-27', 'Thị trấn Thứa-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09499-264-27', 'Xã An Thịnh-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09502-264-27', 'Xã Trung Kênh-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09505-264-27', 'Xã Phú Hòa-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09508-264-27', 'Xã Mỹ Hương-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09511-264-27', 'Xã Tân Lãng-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09514-264-27', 'Xã Quảng Phú-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09517-264-27', 'Xã Trừng Xá-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09520-264-27', 'Xã Lai Hạ-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09523-264-27', 'Xã Trung Chính-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09526-264-27', 'Xã Minh Tân-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09529-264-27', 'Xã Bình Định-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09532-264-27', 'Xã Phú Lương-Huyện Lương Tài-Tỉnh Bắc Ninh'),
('09535-264-27', 'Xã Lâm Thao-Huyện Lương Tài-Tỉnh Bắc Ninh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hokhau`
--

CREATE TABLE `hokhau` (
  `mahk` varchar(255) NOT NULL,
  `tench` varchar(255) DEFAULT NULL,
  `dc` varchar(255) NOT NULL,
  `ngay_tao_hk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hokhau`
--

INSERT INTO `hokhau` (`mahk`, `tench`, `dc`, `ngay_tao_hk`) VALUES
('hk001', 'Hoàng Mỹ Lệ', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', '2019-03-21'),
('hk002', 'Nguyễn Thị Lan Anh', 'Xã Bình Định-Huyện Lương Tài-Tỉnh Bắc Ninh', '2019-03-21'),
('hk003', 'Nguyễn Ngọc Hiên', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-20'),
('hk004', 'Hoàng Công Dũng', 'Xã Giang Sơn-Huyện Gia Bình-Tỉnh Bắc Ninh', '2019-03-21'),
('hk006', 'Quang Ngọc Lan', 'Xã Bình Định-Huyện Lương Tài-Tỉnh Bắc Ninh', '2019-03-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_cktk`
--

CREATE TABLE `log_cktk` (
  `id` int(11) NOT NULL,
  `socmnd` varchar(255) NOT NULL,
  `khaucu` varchar(255) NOT NULL,
  `khaumoi` varchar(255) NOT NULL,
  `lydo` varchar(255) NOT NULL,
  `loai` varchar(255) NOT NULL COMMENT 'Chuyển khẩu hoặc tách khẩu',
  `ngayth` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `nguoi_th` varchar(255) NOT NULL,
  `ngay_th` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `log_cktk`
--

INSERT INTO `log_cktk` (`id`, `socmnd`, `khaucu`, `khaumoi`, `lydo`, `loai`, `ngayth`, `type`, `nguoi_th`, `ngay_th`) VALUES
(0, '093333333', 'hk002', 'hk003', 'Đây là lý do', 'Chuyển khẩu', '2019-03-20', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:08:33'),
(0, '091111111', 'hk001', 'hk003', 'Debugging', 'Chuyển khẩu', '2019-03-20', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:50:06'),
(2, '091111111', 'hk001', 'hk003', 'Debugging', 'Chuyển khẩu', '2019-03-20', 'Xóa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 00:12:53'),
(0, '092222222', 'hk002', 'hk001', 'Debugging', 'Tách khẩu', '2019-03-21', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:17:00'),
(0, '092222222', 'hk001', 'hk002', 'Debugging', 'Tách khẩu', '2019-03-21', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:20:55'),
(0, '095555555', 'hk001', 'hk004', 'Debugging', 'Tách khẩu', '2019-03-21', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:34:47'),
(0, '096666666', 'hk001', 'hk005', 'Debuggggggggggg', 'Tách khẩu', '2019-03-21', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:48:51'),
(0, '097777777', 'hk001', 'hk006', 'Deuvayhsdbasd', 'Tách khẩu', '2019-03-21', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:57:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_hokhau`
--

CREATE TABLE `log_hokhau` (
  `mahk` varchar(255) NOT NULL,
  `tench` varchar(255) NOT NULL,
  `dc` varchar(255) NOT NULL,
  `ngay_tao_hk` date NOT NULL,
  `lydo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nguoi_th` varchar(255) NOT NULL,
  `ngay_th` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `log_hokhau`
--

INSERT INTO `log_hokhau` (`mahk`, `tench`, `dc`, `ngay_tao_hk`, `lydo`, `type`, `nguoi_th`, `ngay_th`) VALUES
('hk001', '', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-19', '', '', '', '0000-00-00 00:00:00'),
('hk001', 'Hoàng Công Thịnh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-19', 'Debugging', 'Xóa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-19 23:27:31'),
('hk001', '', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-19', 'Thêm mới hộ khẩu chưa có chủ hộ', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-19 23:27:58'),
('hk001', 'Hoàng Công Thịnh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-19', 'Sửa địa chỉ', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 00:27:21'),
('hk001', 'Hoàng Công Thịnh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', '2019-03-19', 'Sửa địa chỉ', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 00:27:49'),
('hk002', '', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', '2019-03-20', 'Thêm mới hộ khẩu chưa có chủ hộ', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 13:56:08'),
('hk003', '', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-20', 'Thêm mới hộ khẩu chưa có chủ hộ', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 14:15:21'),
('hk002', 'Nguyễn Minh Giang', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', '2019-03-20', 'Chuyển khẩu', 'Xóa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 14:57:13'),
('hk002', '', 'Phường Kinh Bắc-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-20', 'Thêm mới hộ khẩu chưa có chủ hộ', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 14:58:49'),
('hk002', 'Nguyễn Minh Giang', 'Phường Kinh Bắc-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-20', 'Chuyển khẩu', 'Xóa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:08:33'),
('hk001', 'Hoàng Công Thịnh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-19', 'Chuyển khẩu', 'Xóa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:39:43'),
('', '', '', '0000-00-00', 'Chủ hộ chuyển khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:44:43'),
('', '', '', '0000-00-00', 'Chủ hộ chuyển khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:50:06'),
('hk002', 'Nguyễn Thị Lan Anh', 'Phường Vũ Ninh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-21', 'Tách khẩu', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:14:27'),
('hk001', 'Nguyễn Thị Lan Anh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-19', 'Tách khẩu', 'Xóa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:14:27'),
('hk001', 'Nguyễn Thị Lan Anh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', '2019-03-21', 'Tách khẩu', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:17:00'),
('hk002', 'Nguyễn Thị Lan Anh', 'Phường Vũ Ninh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-21', 'Tách khẩu', 'Xóa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:17:00'),
('hk002', 'Nguyễn Thị Lan Anh', 'Xã Bình Định-Huyện Lương Tài-Tỉnh Bắc Ninh', '2019-03-21', 'Tách khẩu', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:20:54'),
('hk004', 'Hoàng Công Dũng', 'Xã Giang Sơn-Huyện Gia Bình-Tỉnh Bắc Ninh', '2019-03-21', 'Tách khẩu', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:34:47'),
('hk005', 'Hoàng Mỹ Lệ', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '2019-03-21', 'Tách khẩu', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:48:50'),
('', '', '', '0000-00-00', 'Chủ hộ tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:48:51'),
('hk006', 'Quang Ngọc Lan', 'Xã Bình Định-Huyện Lương Tài-Tỉnh Bắc Ninh', '2019-03-21', 'Tách khẩu', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:57:06'),
('hk001', 'Quang Ngọc Lan', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', '2019-03-21', 'Chủ hộ tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:57:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_nhankhau`
--

CREATE TABLE `log_nhankhau` (
  `socmnd` varchar(255) NOT NULL,
  `hvt` varchar(255) NOT NULL,
  `tenkhac` varchar(255) DEFAULT NULL,
  `gt` tinyint(4) NOT NULL COMMENT '0 là nữ, 1 là nam, 2 là k xác định',
  `ns` date NOT NULL,
  `dt` varchar(255) NOT NULL,
  `tg` varchar(255) NOT NULL,
  `dc` varchar(255) NOT NULL,
  `trinhdonn` varchar(255) NOT NULL,
  `noilamviec` varchar(255) NOT NULL,
  `choohiennay` varchar(255) NOT NULL,
  `quequan` varchar(255) NOT NULL,
  `tdhocvan` varchar(255) NOT NULL,
  `nghenghiep` varchar(255) NOT NULL,
  `mahk` varchar(255) NOT NULL,
  `qhvchuho` varchar(255) NOT NULL,
  `ngay_tao_nk` date NOT NULL,
  `lydo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL COMMENT 'Thêm - Sửa - Xóa',
  `nguoi_th` varchar(255) NOT NULL,
  `ngay_th` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `log_nhankhau`
--

INSERT INTO `log_nhankhau` (`socmnd`, `hvt`, `tenkhac`, `gt`, `ns`, `dt`, `tg`, `dc`, `trinhdonn`, `noilamviec`, `choohiennay`, `quequan`, `tdhocvan`, `nghenghiep`, `mahk`, `qhvchuho`, `ngay_tao_nk`, `lydo`, `type`, `nguoi_th`, `ngay_th`) VALUES
('091111111', 'Hoàng Công Thịnh', '', 1, '1987-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-19', 'Thêm mới', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-19 23:16:56'),
('091111111', 'Hoàng Công Thịnh', '', 1, '1987-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-19', 'Thêm mới', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-19 23:24:04'),
('091111111', 'Hoàng Công Thịnh', '', 1, '1987-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-19', 'Debugging', 'Xóa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-19 23:27:17'),
('091111111', 'Hoàng Công Thịnh', '', 1, '1987-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-19', 'Thêm mới', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-19 23:29:51'),
('092222222', 'Nguyễn Thị Lan Anh', '', 0, '1989-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Vợ', '2019-03-19', 'Thêm mới', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-19 23:31:48'),
('092222222', 'Nguyễn Thị Lan Anh', '', 0, '1989-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Vợ', '2019-03-19', 'Debugging', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 00:25:30'),
('093333333', 'Nguyễn Minh Giang', '', 1, '1985-03-01', 'Kinh', 'Không', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Không', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk002', 'Chủ hộ', '2019-03-20', 'Thêm mới', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 13:56:42'),
('094444444', 'Nguyễn Ngọc Hiên', '', 0, '1978-03-01', 'Kinh', 'Không', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk003', 'Chủ hộ', '2019-03-20', 'Thêm mới', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 14:16:51'),
('093333333', 'Nguyễn Minh Giang', '', 1, '1985-03-01', 'Kinh', 'Không', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Không', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk002', 'Chủ hộ', '2019-03-20', 'Chuyển khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 14:56:41'),
('093333333', 'Nguyễn Minh Giang', '', 1, '1985-03-01', 'Kinh', 'Không', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Không', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk002', 'Chủ hộ', '2019-03-20', 'Chuyển khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 14:57:13'),
('093333333', 'Nguyễn Minh Giang', '', 1, '1985-03-01', 'Kinh', 'Không', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Không', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk002', 'Chủ hộ', '2019-03-20', 'Chuyển khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:08:32'),
('091111111', 'Hoàng Công Thịnh', '', 1, '1987-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-19', 'Chuyển khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:39:43'),
('091111111', 'Hoàng Công Thịnh', '', 1, '1987-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-19', 'Chuyển khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:44:42'),
('092222222', 'Nguyễn Thị Lan Anh', '', 0, '1989-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Vợ bé', '2019-03-19', 'Chủ hộ chuyển khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:44:42'),
('091111111', 'Hoàng Công Thịnh', '', 1, '1987-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-19', 'Chuyển khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:50:06'),
('092222222', 'Nguyễn Thị Lan Anh', '', 0, '1989-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Vợ', '2019-03-19', 'Chủ hộ chuyển khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 15:50:06'),
('092222222', 'Nguyễn Thị Lan Anh', '', 0, '1989-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-19', 'Tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:14:27'),
('092222222', 'Nguyễn Thị Lan Anh', '', 0, '1989-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk002', 'Chủ hộ', '2019-03-19', 'Tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:17:00'),
('095555555', 'Hoàng Công Dũng', '', 1, '1999-03-02', 'Kinh', 'Không', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'B1', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Đại học', 'Sinh viên', 'hk001', 'Con', '2019-03-21', 'Thêm mới', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:19:50'),
('092222222', 'Nguyễn Thị Lan Anh', '', 0, '1989-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-19', 'Tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:20:54'),
('095555555', 'Hoàng Công Dũng', '', 1, '1999-03-02', 'Kinh', 'Không', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'B1', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Đại học', 'Sinh viên', 'hk001', 'Con', '2019-03-21', 'Chủ hộ tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:20:54'),
('096666666', 'Hoàng Mỹ Lệ', '', 0, '2000-05-15', 'Kinh', 'Không', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'A2', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Vợ', '2019-03-21', 'Thêm mới', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:33:17'),
('095555555', 'Hoàng Công Dũng', '', 1, '1999-03-02', 'Kinh', 'Không', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'B1', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Đại học', 'Sinh viên', 'hk001', 'Chủ hộ', '2019-03-21', 'Tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:34:47'),
('096666666', 'Hoàng Mỹ Lệ', '', 0, '2000-05-15', 'Kinh', 'Không', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'A2', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Vợ', '2019-03-21', 'Chủ hộ tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:34:47'),
('097777777', 'Quang Ngọc Lan', '', 0, '2000-03-06', 'Kinh', 'Không', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Không', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Dì', '2019-03-21', 'Thêm mới', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:44:52'),
('096666666', 'Hoàng Mỹ Lệ', '', 0, '2000-05-15', 'Kinh', 'Không', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'A2', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-21', 'Tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:48:51'),
('097777777', 'Quang Ngọc Lan', '', 0, '2000-03-06', 'Kinh', 'Không', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Không', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Dì', '2019-03-21', 'Chủ hộ tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:48:51'),
('097777777', 'Quang Ngọc Lan', '', 0, '2000-03-06', 'Kinh', 'Không', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Không', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-21', 'Tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:57:06'),
('096666666', 'Hoàng Mỹ Lệ', '', 0, '2000-05-15', 'Kinh', 'Không', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'A2', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Cháu', '2019-03-21', 'Chủ hộ tách khẩu', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-21 01:57:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_tttv`
--

CREATE TABLE `log_tttv` (
  `id` int(11) DEFAULT NULL,
  `socmnd` varchar(255) NOT NULL,
  `khaucu` varchar(255) NOT NULL,
  `khaumoi` varchar(255) DEFAULT NULL,
  `dc` varchar(255) DEFAULT NULL,
  `lydo` varchar(255) NOT NULL,
  `loai` varchar(255) NOT NULL COMMENT 'Tạm trú hoặc tạm vắng',
  `ngaybd` date NOT NULL,
  `ngaykt` date NOT NULL,
  `ngay_tao_tttv` date NOT NULL,
  `type` varchar(255) NOT NULL COMMENT '- Thêm - Sửa - Xóa',
  `nguoi_th` varchar(255) NOT NULL,
  `ngay_th` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `log_tttv`
--

INSERT INTO `log_tttv` (`id`, `socmnd`, `khaucu`, `khaumoi`, `dc`, `lydo`, `loai`, `ngaybd`, `ngaykt`, `ngay_tao_tttv`, `type`, `nguoi_th`, `ngay_th`) VALUES
(NULL, '092222222', 'hk001', NULL, 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Đi tù (Debugging)', 'Tạm vắng', '2019-03-01', '2019-03-01', '2019-03-20', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 00:43:03'),
(NULL, '092222222', 'hk001', NULL, 'Phường Khắc Niệm-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'aaaa', 'Tạm trú', '2019-02-28', '2019-03-07', '2019-03-20', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 01:14:22'),
(NULL, '', '', NULL, NULL, '', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 01:18:08'),
(3, '092222222', 'hk001', NULL, 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Sửa lý do (Debugging)', 'Tạm vắng', '2019-03-01', '2019-03-01', '2019-03-20', 'Sửa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 01:19:08'),
(3, '092222222', 'hk001', NULL, 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Đi tù (Debugging)', 'Tạm vắng', '2019-03-01', '2019-03-01', '2019-03-20', 'Xóa', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-20 01:19:29'),
(NULL, '093333333', 'hk003', NULL, 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Đây là lý do', 'Tạm vắng', '2019-03-01', '2019-03-30', '2019-03-26', 'Thêm', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-26 15:21:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhankhau`
--

CREATE TABLE `nhankhau` (
  `socmnd` varchar(255) NOT NULL,
  `hvt` varchar(255) NOT NULL,
  `tenkhac` varchar(255) DEFAULT NULL,
  `gt` tinyint(4) NOT NULL COMMENT '0 là nữ, 1 là nam, 2 là k xác định',
  `ns` date NOT NULL,
  `dt` varchar(255) NOT NULL,
  `tg` varchar(255) NOT NULL,
  `dc` varchar(255) NOT NULL,
  `trinhdonn` varchar(255) NOT NULL,
  `noilamviec` varchar(255) NOT NULL,
  `choohiennay` varchar(255) NOT NULL,
  `quequan` varchar(255) NOT NULL,
  `tdhocvan` varchar(255) NOT NULL,
  `nghenghiep` varchar(255) NOT NULL,
  `mahk` varchar(255) NOT NULL,
  `qhvchuho` varchar(255) NOT NULL,
  `ngay_tao_nk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhankhau`
--

INSERT INTO `nhankhau` (`socmnd`, `hvt`, `tenkhac`, `gt`, `ns`, `dt`, `tg`, `dc`, `trinhdonn`, `noilamviec`, `choohiennay`, `quequan`, `tdhocvan`, `nghenghiep`, `mahk`, `qhvchuho`, `ngay_tao_nk`) VALUES
('091111111', 'Hoàng Công Thịnh', '', 1, '1987-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk003', 'Chú', '2018-03-19'),
('092222222', 'Nguyễn Thị Lan Anh', '', 0, '1989-03-05', 'Kinh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Ninh Xá-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk002', 'Chủ hộ', '2019-03-19'),
('093333333', 'Nguyễn Minh Giang', '', 1, '1985-03-01', 'Kinh', 'Không', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Không', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk003', 'Cháu', '2019-03-20'),
('094444444', 'Nguyễn Ngọc Hiên', '', 0, '1978-03-01', 'Kinh', 'Không', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Không', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'Phường Hạp Lĩnh-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk003', 'Chủ hộ', '2019-03-20'),
('095555555', 'Hoàng Công Dũng', '', 1, '1999-03-02', 'Kinh', 'Không', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'B1', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Đại học', 'Sinh viên', 'hk004', 'Chủ hộ', '2019-03-21'),
('096666666', 'Hoàng Mỹ Lệ', '', 0, '2000-05-15', 'Kinh', 'Không', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'A2', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', 'Xã An Bình-Huyện Thuận Thành-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk001', 'Chủ hộ', '2019-03-21'),
('097777777', 'Quang Ngọc Lan', '', 0, '2000-03-06', 'Kinh', 'Không', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Không', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', 'Xã Bình Dương-Huyện Gia Bình-Tỉnh Bắc Ninh', '12/12', 'Tự do', 'hk006', 'Chủ hộ', '2019-03-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` varchar(255) NOT NULL,
  `hvt` varchar(255) NOT NULL,
  `gt` tinyint(4) NOT NULL COMMENT '0 là nữ, 1 là nam, 2 là k xác định',
  `ns` date NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `capbac` varchar(255) NOT NULL,
  `chucvu` varchar(255) NOT NULL,
  `donvi` varchar(255) NOT NULL,
  `quyenhan` tinyint(4) NOT NULL COMMENT '2: QTV - 1: NV - 0: NVTK',
  `ngay_tao_nv` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `hvt`, `gt`, `ns`, `sdt`, `email`, `password`, `code`, `capbac`, `chucvu`, `donvi`, `quyenhan`, `ngay_tao_nv`) VALUES
('nv001', 'Nguyễn Hoàng Lâm', 1, '1997-01-01', '0333444888', 'hoanglam97bn@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Thiếu Úy', 'Bộ trưởng', 'Bộ Công An', 2, '2019-03-03'),
('nv002', 'Nguyễn Chí Công', 1, '1997-01-27', '0353270197', 'nhanvien01@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Thiếu Tá', 'Nhân viên', 'Công An Xã', 1, '2019-03-03'),
('nv003', 'Hoàng Công Dung', 0, '2010-02-01', '0880030000', 'congdunghhh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Thượng Sĩ', 'Nhân viên', 'Công An Xã', 0, '2019-03-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tttv`
--

CREATE TABLE `tttv` (
  `id` int(11) NOT NULL,
  `socmnd` varchar(255) NOT NULL,
  `khaucu` varchar(255) NOT NULL,
  `khaumoi` varchar(255) DEFAULT NULL,
  `dc` varchar(255) DEFAULT NULL,
  `lydo` varchar(255) NOT NULL,
  `loai` varchar(255) NOT NULL COMMENT 'Tạm trú hoặc tạm vắng',
  `ngaybd` date NOT NULL,
  `ngaykt` date NOT NULL,
  `ngay_tao_tttv` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tttv`
--

INSERT INTO `tttv` (`id`, `socmnd`, `khaucu`, `khaumoi`, `dc`, `lydo`, `loai`, `ngaybd`, `ngaykt`, `ngay_tao_tttv`) VALUES
(4, '092222222', 'hk001', NULL, 'Phường Khắc Niệm-Thành phố Bắc Ninh-Tỉnh Bắc Ninh', 'aaaa', 'Tạm trú', '2019-02-28', '2019-03-07', '2019-03-20'),
(5, '093333333', 'hk003', NULL, 'Phường Châu Khê-Thị xã Từ Sơn-Tỉnh Bắc Ninh', 'Đây là lý do', 'Tạm vắng', '2019-03-01', '2019-03-30', '2019-03-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vipham`
--

CREATE TABLE `vipham` (
  `mavp` varchar(255) NOT NULL,
  `socmnd` varchar(255) NOT NULL,
  `toidanh` varchar(255) NOT NULL,
  `hinhphat` varchar(255) NOT NULL,
  `dvlap` varchar(255) NOT NULL,
  `nguoilap` varchar(255) NOT NULL,
  `ngay` date NOT NULL,
  `ngaylap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vipham`
--

INSERT INTO `vipham` (`mavp`, `socmnd`, `toidanh`, `hinhphat`, `dvlap`, `nguoilap`, `ngay`, `ngaylap`) VALUES
('toidanh001', '096666666', 'Xàm sỡ trong thang máy', '200.000 nghìn', 'Hà Nội', 'nv001 - Nguyễn Hoàng Lâm', '2019-03-01', '2019-03-26');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cktk`
--
ALTER TABLE `cktk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socmnd` (`socmnd`);

--
-- Chỉ mục cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  ADD PRIMARY KEY (`madd`);

--
-- Chỉ mục cho bảng `hokhau`
--
ALTER TABLE `hokhau`
  ADD PRIMARY KEY (`mahk`);

--
-- Chỉ mục cho bảng `nhankhau`
--
ALTER TABLE `nhankhau`
  ADD PRIMARY KEY (`socmnd`),
  ADD KEY `mahk` (`mahk`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`,`email`);

--
-- Chỉ mục cho bảng `tttv`
--
ALTER TABLE `tttv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socmnd` (`socmnd`);

--
-- Chỉ mục cho bảng `vipham`
--
ALTER TABLE `vipham`
  ADD PRIMARY KEY (`mavp`),
  ADD KEY `socmnd` (`socmnd`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cktk`
--
ALTER TABLE `cktk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tttv`
--
ALTER TABLE `tttv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cktk`
--
ALTER TABLE `cktk`
  ADD CONSTRAINT `cktk_ibfk_1` FOREIGN KEY (`socmnd`) REFERENCES `nhankhau` (`socmnd`);

--
-- Các ràng buộc cho bảng `nhankhau`
--
ALTER TABLE `nhankhau`
  ADD CONSTRAINT `nhankhau_ibfk_1` FOREIGN KEY (`mahk`) REFERENCES `hokhau` (`mahk`);

--
-- Các ràng buộc cho bảng `tttv`
--
ALTER TABLE `tttv`
  ADD CONSTRAINT `tttv_ibfk_1` FOREIGN KEY (`socmnd`) REFERENCES `nhankhau` (`socmnd`);

--
-- Các ràng buộc cho bảng `vipham`
--
ALTER TABLE `vipham`
  ADD CONSTRAINT `vipham_ibfk_1` FOREIGN KEY (`socmnd`) REFERENCES `nhankhau` (`socmnd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
