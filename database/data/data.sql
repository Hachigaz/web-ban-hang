INSERT INTO `accounts` (`account_id`, `username`, `password`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'TheHien', 'thehien123', '2024-02-28 21:37:42', '2024-02-01 21:36:37', 1),
(2, 'QuocHuy', 'quochuy123', '2024-02-28 21:37:42', '2024-02-02 21:36:37', 1),
(3, 'MinhLoc', 'minhloc123', '2024-02-28 21:39:01', '2024-02-03 21:38:37', 1),
(4, 'HongPhong', 'hongphong123', '2024-02-28 21:39:45', '2024-02-10 21:39:27', 1);

INSERT INTO `roles` (`role_id`, `role_name`, `is_active`) VALUES 
('1', 'Admin', '1'), 
('2', 'Nhân viên quản lý', '1'),
('3', 'Nhân viên bán hàng', '1'),
('4', 'Nhân viên kho', '1'),
('5', 'Khách hàng', '1');

INSERT INTO `staffs` (`staff_id`, `account_id`, `staff_fullname`, `staff_phone_number`, `staff_email`, `role_id`, `gender`, `entry_date`, `is_active`) VALUES 
('1', '1', 'Lê Nguyễn Thế Hiển', '0988722521', 'hien@gmail.com', '1', b'0', current_timestamp(), '1'),
('2', '2', 'Võ Quốc Huy', '0988722522', 'huy@gmail.com', '2', b'0', current_timestamp(), '1'),
('3', '3', 'Khổng Minh Lộc', '0988722523', 'loc@gmail.com', '3', b'0', current_timestamp(), '1'),
('4', '4', 'Lâm Hồng Phong', '0988722524', 'phong@gmail.com', '4', b'0', current_timestamp(), '1');

INSERT INTO `categories` (`categories_id`, `categories_name`, `is_active`) VALUES 
('1', 'Điện thoại', '1'),
('2', 'Laptop', '1'),
('3', 'Smartwatch', '1'),
('4', 'Sạc dự phòng', '1'),
('5', 'Tai nghe Bluetooth', '1'),
('6', 'Loa', '1'),
('7', 'Chuột máy tính', '1'),
('8', 'Bàn phím', '1');

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `phone_number_of_supplier`, `address_of_supplier`, `email_of_supplier`, `is_active`) VALUES 
('1', 'Apple Store Việt Nam', '0918001192', '268 Lý Thường Kiệt, Phường 14, Quận 10, Thành phố Hồ Chí Minh', 'applestorevn@gmail.com', '1'),
('2', 'Galaxy Store Việt Nam', '0918001193', '280 Đ. An Dương Vương, Phường 4, Quận 5, Thành phố Hồ Chí Minh', 'galaxystorevn@gmail.com', '1'),
('3', 'Xiaomi Store Việt Nam', '0918001194', '217 Đ. Hồng Bàng, Phường 11, Quận 5, Thành phố Hồ Chí Minh', 'mistorevn@gmail.com', '1'),
('4', 'OPPO Store Việt Nam', '0918001195', '01 Võ Văn Ngân, Linh Chiểu, Thủ Đức, Thành phố Hồ Chí Minh', 'oppostorevn@gmail.com', '1'),
('5', 'Acer Store Việt Nam', '0918001196', '704-05/37 Đ. Tôn Đức Thắng, Ward, Quận 1, Thành phố Hồ Chí Minh', 'acerstorevn@gmail.com', '1'),
('6', 'HP Store Việt Nam', '0918001197', '475A Đ. Điện Biên Phủ, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh', 'hpstorevn@gmail.com', '1'),
('7', 'ASUS Store Việt Nam', '0918001198', '196 Pasteur, Phường 6, Quận 3, Thành phố Hồ Chí Minh', 'asusstorevn@gmail.com', '1'),
('8', 'Lenovo Store Việt Nam', '0918001199', '55 Giải Phóng, Đồng Tâm, Hai Bà Trưng, Hà Nội', 'lenovostorevn@gmail.com', '1'),
('9', 'AVA Store Việt Nam', '0918001200', '136 Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội', 'avastorevn@gmail.com', '1'),
('10', 'Xmobile Store Việt Nam', '0918001201', 'Khu phố 6, TP Thủ Đức, Thành phố Hồ Chí Minh', 'xmobilestorevn@gmail.com', '1'),
('11', 'Baseus Store Việt Nam', '0918001202', '227 Đ. Nguyễn Văn Cừ, Phường 4, Quận 5, Thành phố Hồ Chí Minh', 'baseusstorevn@gmail.com', '1'),
('12', 'JBL Store Việt Nam', '0918001203', '12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Thành phố Hồ Chí Minh', 'jblstorevn@gmail.com', '1'),
('13', 'Sony Store Việt Nam', '0918001204', '97 Võ Văn Tần, Phường 6, Quận 3, Thành phố Hồ Chí Minh', 'sonystorevn@gmail.com', '1'),
('14', 'Logitech Store Việt Nam', '0918001205', '10-12 Đ. Đinh Tiên Hoàng, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh', 'logitechstorevn@gmail.com', '1'),
('15', 'Genius Store Việt Nam', '0918001206', '19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Thành phố Hồ Chí Minh', 'geniusstorevn@gmail.com', '1'),
('16', 'Corsair Store Việt Nam', '0918001207', '665-667-669 Đ. Điện Biên Phủ, Phường 1, Quận 3, Thành phố Hồ Chí Minh', 'corsairstorevn@gmail.com', '1'),
('17', 'Dareu Store Việt Nam', '0918001208', '180 Đ. Cao Lỗ, Phường 4, Quận 8, Thành phố Hồ Chí Minh', 'dareustorevn@gmail.com', '1'),
('18', 'Rapoo Store Việt Nam', '0918001209', '104 Đ. Nguyễn Văn Trỗi, Phường 8, Phú Nhuận, Thành phố Hồ Chí Minh', 'rapoostorevn@gmail.com', '1');

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_logo`, `supplier_id`, `is_active`) VALUES 
('1', 'Apple', '', '1', '1'),
('2', 'Samsung', '', '2', '1'),
('3', 'Xiaomi', '', '3', '1'),
('4', 'OPPO', '', '4', '1'),
('5', 'Acer', '', '5', '1'),
('6', 'HP', '', '6', '1'),
('7', 'ASUS', '', '7', '1'),
('8', 'Lenovo', '', '8', '1'),
('9', 'AVA', '', '9', '1'),
('10', 'Xmobile', '', '10', '1'),
('11', 'Baseus', '', '11', '1'),
('12', 'JBL', '', '12', '1'),
('13', 'Sony', '', '13', '1'),
('14', 'Logitech', '', '14', '1'),
('15', 'Genius', '', '15', '1'),
('16', 'Corsair', '', '16', '1'),
('17', 'Dareu', '', '17', '1'),
('18', 'Rapoo', '', '17', '1');