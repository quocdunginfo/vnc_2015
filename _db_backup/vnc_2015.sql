-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2015 at 08:10 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vnc_2015`
--

-- --------------------------------------------------------

--
-- Table structure for table `mpd_post`
--

CREATE TABLE IF NOT EXISTS `mpd_post` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `short_content` text NOT NULL,
  `avatar` text NOT NULL,
  `title` text NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `owner_id` bigint(20) NOT NULL,
  `lasteditor_id` bigint(20) NOT NULL,
  `type` int(11) NOT NULL,
  `post_cat_id` bigint(20) NOT NULL,
  `tpl_type` bigint(20) NOT NULL,
  `order` bigint(20) NOT NULL,
  `title_color` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `mpd_post`
--

INSERT INTO `mpd_post` (`id`, `content`, `short_content`, `avatar`, `title`, `date_modified`, `date_created`, `owner_id`, `lasteditor_id`, `type`, `post_cat_id`, `tpl_type`, `order`, `title_color`, `link`) VALUES
(2, '<p>Hướng dẫn mua hàng</p><p>Gom tất cả bài viết (trừ trang GIỚI THIỆU) vào module này. Chú ý: Khi click vào chữ dịch vụ thì danh mục xổ xuống, hiện ra danh mục con, thân trang không thay đổi. Khi chọn vào một danh mục con cụ thể thì nôi của phần đó hiện ra.</p><p>Tương tự như vậy cho mục HỖ TRỢ/HƯỚNG DẪN, GIAO HÀNG - THANH TOÁN, BẢO HÀNH - ĐỔI TrẢ.</p><p><b>RIÊNG MỤC FAQs, LIÊN HỆ, TÌM SHOP CÓ CẤU TRÚC KHÁC</b> (xem phần của nó).</p>', '', '', 'HƯỚNG DẪN MUA HÀNG', '2015-06-09 16:32:46', '2015-04-21 14:52:19', 1, 1, 0, 2, 0, 0, '', ''),
(5, '', '', '/vnc_2015/wp-content/uploads/2015/02/current-3.jpg', 'ĐIỆN THOẠI VÀ PHỤ KIỆN', '2015-06-10 16:23:12', '2015-04-22 09:25:35', 1, 1, 100, 3, 0, 0, '', ''),
(6, '<p>Gom tất cả bài viết (trừ trang GIỚI THIỆU) vào module này. Chú ý: Khi click vào chữ dịch vụ thì danh mục xổ xuống, hiện ra danh mục con, thân trang không thay đổi. Khi chọn vào một danh mục con cụ thể thì nôi của phần đó hiện ra.</p><p>Tương tự như vậy cho mục HỖ TRỢ/HƯỚNG DẪN, GIAO HÀNG - THANH TOÁN, BẢO HÀNH - ĐỔI TrẢ.</p><p><b>RIÊNG MỤC FAQs, LIÊN HỆ, TÌM SHOP CÓ CẤU TRÚC KHÁC</b> (xem phần của nó).</p>', '', '', 'DỊCH VỤ THU MUA VÀ THANH LÝ', '2015-06-09 16:32:34', '2015-04-22 16:12:34', 1, 1, 0, 1, 0, 0, '', ''),
(8, '', '', '/vnc_2015/wp-content/uploads/2015/02/lap-rap-may-phat-dien-vietnam.jpg', 'THỜI TRANG', '2015-06-10 16:22:22', '2015-04-23 16:29:30', 1, 1, 100, 3, 0, 0, '#1C42FF', ''),
(9, '', '', '/vnc_2015/wp-content/uploads/2015/02/current-3.jpg', 'TRANG SỨC CAO CẤP', '2015-06-10 16:22:07', '2015-04-23 16:30:14', 1, 1, 100, 3, 0, 0, '#5EFF89', 'http://yahoo.com'),
(11, '', '', '/vnc_2015/wp-content/uploads/2015/02/d.jpg', '', '2015-05-14 15:21:54', '2015-05-14 14:36:27', 1, 1, 57, 0, 0, 10, '', ''),
(12, '<p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>', '', '', 'CHỮ CANH GIỮA', '2015-05-14 15:51:31', '2015-05-14 14:37:50', 1, 1, 57, 0, 10, 20, '', ''),
(14, '<p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>', '', '/vnc_2015/wp-content/uploads/2015/02/d.jpg', 'CHỮ TRÁI/HÌNH PHẢI', '2015-05-14 15:51:49', '2015-05-14 15:08:36', 1, 1, 57, 0, 20, 30, '', ''),
(15, '<p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>', '', '/vnc_2015/wp-content/uploads/2015/02/d.jpg', 'HÌNH TRÁI/CHỮ PHẢI', '2015-05-14 15:52:12', '2015-05-14 15:09:16', 1, 1, 57, 0, 30, 40, '', ''),
(16, '<p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>', '', '/vnc_2015/wp-content/uploads/2015/02/d.jpg', 'CHỮ TRÁI/HÌNH PHẢI (02)', '2015-05-14 15:53:14', '2015-05-14 15:52:45', 1, 1, 57, 0, 20, 50, '', ''),
(17, '<p>[2]Gom tất cả bài viết (trừ trang GIỚI THIỆU) vào module này. Chú ý: Khi click vào chữ dịch vụ thì danh mục xổ xuống, hiện ra danh mục con, thân trang không thay đổi. Khi chọn vào một danh mục con cụ thể thì nôi của phần đó hiện ra.</p><p>Tương tự như vậy cho mục HỖ TRỢ/HƯỚNG DẪN, GIAO HÀNG - THANH TOÁN, BẢO HÀNH - ĐỔI TrẢ.</p><p><b>RIÊNG MỤC FAQs, LIÊN HỆ, TÌM SHOP CÓ CẤU TRÚC KHÁC</b> (xem phần của nó).</p>', '', '', '[2]DỊCH VỤ THU MUA VÀ THANH LÝ', '2015-06-09 17:14:08', '2015-06-09 17:08:06', 1, 1, 0, 1, 0, 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
