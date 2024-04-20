INSERT INTO `accounts` (`account_id`, `phone_number`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_active`) VALUES
(1, '0988722521', 'hien@gmail.com', 'thien123', 'avatar_0988722521.jpg', current_timestamp(), current_timestamp(), 1),
(2, '0988722522', 'huy@gmail.com', 'qhuy123', 'avatar_0988722522.jpg',current_timestamp(), current_timestamp(), 1),
(3, '0988722523', 'loc@gmail.com', 'mloc123', 'avatar_0988722523.jpg',current_timestamp(), current_timestamp(), 1),
(4, '0988722524', 'phong@gmail.com', 'hphong123','avatar_0988722524.jpg',current_timestamp(), current_timestamp(), 1),
(5, '0988722525', 'lan@gmail.com', 'tlan123', '',current_timestamp(), current_timestamp(), 1),
(6, '0988722526', 'lieu@gmail.com', 'tlieu123', '',current_timestamp(), current_timestamp(), 1),
(7, '0988722527', 'lai@gmail.com', 'tlai123', '',current_timestamp(), current_timestamp(), 1),
(8, '0988722528', 'camhuong@gmail.com', 'chuong123', '',current_timestamp(), current_timestamp(), 1);

INSERT INTO `customers` (`customer_id`, `customer_fullname`, `role_id`, `account_id`, `gender`, `address`, `date_of_birth`, `is_active`) VALUES 
('1', 'Nguyễn Thị Lan', '5', '5', '1', 'Quận 1, Thành Phố Hồ Chí Minh', '2003-06-12', '1'),
('2', 'Nguyễn Thị Liễu', '5', '6', '1', 'Quận 2, Thành Phố Hồ Chí Minh', '2003-04-12', '1'),
('3', 'Nguyễn Thị Lài', '5', '7', '1', 'Quận 3, Thành Phố Hồ Chí Minh', '2004-02-11', '1'),
('4', 'Nguyễn Thị Cẩm Hường', '5', '8', '1', 'Quận 4, Thành Phố Hồ Chí Minh', '2001-05-11', '1')
;

INSERT INTO `roles` (`role_id`, `role_name`, `is_active`) VALUES 
('1', 'Admin', '1'), 
('2', 'Nhân viên quản lý', '1'),
('3', 'Nhân viên bán hàng', '1'),
('4', 'Nhân viên kho', '1'),
('5', 'Khách hàng', '1');

INSERT INTO `staffs` (`staff_id`, `account_id`, `staff_fullname`, `role_id`, `gender`, `address`,`entry_date`, `is_active`) VALUES 
('1', '1', 'Lê Nguyễn Thế Hiển', '1', '0', 'Tây Ninh', current_timestamp(), '1'),
('2', '2', 'Võ Quốc Huy', '2', '0', 'Cần Thơ',current_timestamp(), '1'),
('3', '3', 'Khổng Minh Lộc','3', '0', 'Nha Trang',current_timestamp(), '1'),
('4', '4', 'Lâm Hồng Phong', '4', '0', 'Vũng Tàu', current_timestamp(), '1');

INSERT INTO `categories` (`category_id`, `category_name`, `category_logo`, `is_active`) VALUES 
('1', 'Điện thoại','', '1'),
('2', 'Laptop','', '1'),
('3', 'Smartwatch','', '1'),
('4', 'Sạc dự phòng','', '1'),
('5', 'Tai nghe Bluetooth','', '1'),
('6', 'Loa','', '1'),
('7', 'Chuột máy tính','', '1'),
('8', 'Bàn phím','', '1');

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `phone_number_of_supplier`, `address_of_supplier`, `email_of_supplier`, `is_active`) VALUES 
('1', 'Apple Store Việt Nam', '0918001192', '268 Lý Thường Kiệt, Phường 14, Quận 10, Thành phố Hồ Chí Minh', 'applestorevn@gmail.com', '1'),
('2', 'Galaxy Store Việt Nam', '0918001193', '280 Đ. An Dương Vương, Phường 4, Quận 5, Thành phố Hồ Chí Minh', 'galaxystorevn@gmail.com', '1'),
('3', 'Xiaomi Store Việt Nam', '0918001194', '217 Đ. Hồng Bàng, Phường 11, Quận 5, Thành phố Hồ Chí Minh', 'mistorevn@gmail.com', '1'),
('4', 'OPPO Store Việt Nam', '0918001195', '01 Võ Văn Ngân, Linh Chiểu, Thủ Đức, Thành phố Hồ Chí Minh', 'oppostorevn@gmail.com', '1'),
('5', 'Acer Store Việt Nam', '0918001196', '704-05/37 Đ. Tôn Đức Thắng, Ward, Quận 1, Thành phố Hồ Chí Minh', 'acerstorevn@gmail.com', '1'),
('6', 'HP Store Việt Nam', '0918001197', '475A Đ. Điện Biên Phủ, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh', 'hpstorevn@gmail.com', '1'),
('7', 'ASUS Store Việt Nam', '0918001198', '196 Pasteur, Phường 6, Quận 3, Thành phố Hồ Chí Minh', 'asusstorevn@gmail.com', '1'),
('8', 'Lenovo Store Việt Nam', '0918001199', '55 Giải Phóng, Đồng Tâm, Hai Bà Trưng, Hà Nội', 'lenovostorevn@gmail.com', '1'),
('9', 'AVA+ Store Việt Nam', '0918001200', '136 Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội', 'avaplusstorevn@gmail.com', '1'),
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
('1', 'Apple', 'apple.jpg', '1', '1'),
('2', 'Samsung', 'samsung.png', '2', '1'),
('3', 'Xiaomi', 'xiaomi.png', '3', '1'),
('4', 'OPPO', 'oppo.jpg', '4', '1'),
('5', 'Acer', 'acer.png', '5', '1'),
('6', 'HP', 'hp.png', '6', '1'),
('7', 'ASUS', 'asus.png', '7', '1'),
('8', 'Lenovo', 'lenovo.png', '8', '1'),
('9', 'AVA+', 'ava.jpg', '9', '1'),
('10', 'Xmobile', 'xmobile.jpg', '10', '1'),
('11', 'Baseus', 'baseus.jpg', '11', '1'),
('12', 'JBL', 'jbl.jpg', '12', '1'),
('13', 'Sony', 'sony.jpg', '13', '1'),
('14', 'Logitech', 'logitech.jpeg', '14', '1'),
('15', 'Genius', 'genius.jpg', '15', '1'),
('16', 'Corsair', 'corsair.jpg', '16', '1'),
('17', 'Dareu', 'dareu.png', '17', '1'),
('18', 'Rapoo', 'rapoo.png', '18', '1');

INSERT INTO `modules` (`module_id`, `module_name`, `is_active`) VALUES 
('1', 'Tài khoản', '1'),
('2', 'Nhân viên', '1'),
('3', 'Khách hàng', '1'),
('4', 'Sản phẩm', '1'),
('5', 'Nhà cung cấp', '1'),
('6', 'Kho hàng', '1'),
('7', 'Nhập hàng', '1'),
('8', 'Xuất hàng', '1'),
('9', 'Hóa đơn', '1'),
('10', 'Lương', '1'),
('11', 'Thống kê', '1'),
('12', 'Phân quyền', '1');

INSERT INTO `decentralizations` (`decentralization_id`, `role_id`, `module_id`, `is_active`) VALUES 
('1', '1', '1', '1'),-- admin
('2', '1', '12', '1'),
('3', '2', '1', '1'),-- nhan vien quan ly
('4', '2', '2', '1'),
('5', '2', '3', '1'),
('6', '2', '4', '1'),
('7', '2', '5', '1'),
('8', '2', '6', '1'),
('9', '2', '7', '1'),
('10', '2', '8', '1'),
('11', '2', '9', '1'),
('12', '2', '10', '1'),
('13', '2', '11', '1'),
('14', '3', '1', '1'),-- nhan vien ban hang
('15', '3', '3', '1'),
('16', '3', '4', '1'),
('17', '3', '9', '1'),
('18', '4', '4', '1'),-- nhan vien kho
('19', '4', '5', '1'),
('20', '4', '6', '1'),
('21', '4', '7', '1'),
('22', '4', '8', '1');

INSERT INTO `products` (`product_id`, `product_name`, `brand_id`, `category_id`, `price`, `guarantee`, `thumbnail`, `description`, `created_at`, `updated_at`, `is_active`) VALUES 
('1', 'iPhone 15 Pro Max RAM 8GB/ROM 256GB', '1', '1', '34990000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('2', 'Samsung Galaxy S23 FE 5G RAM 8GB/ROM 128GB', '2', '1', '14890000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('3', 'Xiaomi Redmi Note 13 RAM 6GB/ROM 128GB', '3', '1', '4890000', '18', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('4', 'OPPO A57 RAM 4GB/ROM 128GB', '4', '1', '4990000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('5', 'Acer Aspire 5 A514 54 5127 i5 1135G7 (NX.A28SV.007) RAM 8GB/SSD 512GB', '5', '2', '15490000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('6', 'HP Pavilion 15 eg2062TX i5 1235U (7C0W7PA) RAM 8GB/SSD 512GB', '6', '2', '20590000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('7', 'Asus TUF Gaming F15 FX507ZC4 i5 12500H (HN074W) RAM 8GB/SSD 512GB', '7', '2', '23990000', '24', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('8', 'Lenovo Gaming Legion 5 16IRH8 i5 13500H (82YA00BSVN) RAM 16GB/SSD 512', '8', '2', '36990000', '36', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('9', 'AVA+ 15W JP399', '9', '4', '500000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('10', 'Xmobile 20W DS223B', '10', '4', '890000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('11', 'Baseus Comet 22.5W PPMD10 kèm cáp Lightning và Type C', '11', '4', '1100000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('12', 'Apple Watch SE 2023 GPS 40mm viền nhôm dây thể thao', '1', '3', '6390000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('13', 'Samsung Galaxy Watch5 Pro LTE 45mm dây silicone', '2', '3', '12990000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('14', 'Xiaomi Redmi Watch 4 47.5mm dây silicone', '3', '3', '2690000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('15', 'Tai nghe Bluetooth AirPods Pro Gen 2 MagSafe Charge (USB-C) Apple MTJV3', '1', '5', '6200000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('16', 'Tai nghe Bluetooth True Wireless Xiaomi Redmi Buds 5 Pro', '3', '5', '1990000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('17', 'Tai nghe Bluetooth True Wireless AVA+ FreeGo A20', '9', '5', '290000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('18', 'Loa Bluetooth JBL Pulse 5', '12', '6', '6690000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('19', 'Loa Bluetooth Sony SRS-XB13', '13', '6', '1290000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('20', 'Loa Bluetooth AVA+ FreeGo F13', '9', '6', '450000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('21', 'Chuột Không Dây Silent Rapoo B2S', '18', '7', '200000', '24', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('22', 'Chuột Không dây DareU LM106G', '17', '7', '150000', '24', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('23', 'Chuột Có dây Gaming Corsair M55 RGB Pro', '16', '7', '890000', '24', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('24', 'Chuột Có dây Gaming Genius Scorpion M700', '15', '7', '490000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('25', 'Bàn phím Bluetooth Logitech K380', '14', '8', '750000', '12', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1'),
('26', 'Bàn Phím Có Dây DareU EK87', '17', '8', '650000', '24', '', 'Đây là mô tả sản phẩm', current_timestamp(), current_timestamp(), '1');

INSERT INTO `orders` (`order_id`, `staff_id`, `account_id`, `receiver_name`, `email_of_receiver`, `phone_number_of_receiver`, `note`, `order_date`, `status_of_order`, `total_money`, `shipping_method`, `shipping_address`, `shipping_date`, `tracking_number`, `payment_method`, `is_active`) VALUES 
('1', '3', '5', 'Anh Hiển', 'thehien@gmail.com', '0786705877', 'Tặng anh Hiển', current_timestamp(), 'Pending', '35990000', 'express', 'Nghĩa Địa Gia Đôi', '2024-03-07 19:34:36', '70L1-13579', 'COD', '1');

-- INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `price`, `number_of_products`, `color_of_product`) VALUES 
-- ('1', '1', '1', '34990000', '1', 'Đen'),
-- ('2', '1', '9', '500000', '2', 'Đen');

INSERT INTO `leave_application` (`leave_application_id`, `staff_id`, `start_date`, `end_date`, `reason`, `status`) VALUES 
('1', '1', '2024-04-15', '2024-04-15', 'Lý do cá nhân', '0'),
('2', '2', '2024-04-15', '2024-04-15', 'Ốm đau, thai sản', '0'),
('3', '3', '2024-04-15', '2024-04-15', 'Ốm đau, thai sản', '0'),
('4', '2', '2024-04-16', '2024-04-16', 'Lý do cá nhân', '0'),
('5', '1', '2024-04-16', '2024-04-16', 'Ốm đau, thai sản', '0'),
('6', '3', '2024-04-16', '2024-04-16', 'Ốm đau, thai sản', '0');

INSERT INTO `contracts` (`contract_id`, `staff_id`, `start_date`, `end_date`, `salary`) VALUES 
('1', '1', '2024-04-01', '2025-04-01', '20000000'), 
('2', '2', '2024-04-01', '2025-04-01', '18000000'),
('3', '3', '2024-04-01', '2025-04-01', '13000000'),
('4', '4', '2024-04-01', '2025-04-01', '15000000');

INSERT INTO `timesheets` (`timesheet_id`, `contract_id`, `month`, `year`, `days_worked`, `days_off`, `days_leave`, `days_late`) VALUES ('1', '1', '4', '2025', '22', '1', '1', '2'),
('2', '2', '4', '2025', '26', '0', '0', '0'),
('3', '3', '4', '2025', '23', '0', '1', '2'),
('4', '4', '4', '2025', '25', '0', '1', '0');

INSERT INTO `attendance` (`attendance_id`, `timesheet_id`, `date`, `status`, `leave_application_id`) VALUES 
('1', '1', '2024-04-16', 'Present', '1'),
('2', '2', '2024-04-16', 'Present', '2'),
('3', '3', '2024-04-16', 'Present', '3');

-- INSERT INTO `attendance` (`attendance_id`, `timesheet_id`, `date`, `status`) VALUES 
-- ('1', '1', '2024-04-01', 'Present'),
-- ('2', '1', '2024-04-02', 'Present'),
-- ('3', '1', '2024-04-03', 'Present'),
-- ('4', '1', '2024-04-04', 'Present'),
-- ('5', '1', '2024-04-05', 'Present'),
-- ('6', '1', '2024-04-06', 'Present'),
-- ('7', '1', '2024-04-07', 'Present'),
-- ('8', '1', '2024-04-08', 'Present'),
-- ('9', '1', '2024-04-09', 'Present'),
-- ('10', '1', '2024-04-10', 'Present'),
-- ('11', '1', '2024-04-11', 'Present'),
-- ('12', '1', '2024-04-12', 'Present'),
-- ('13', '1', '2024-04-13', 'Present'),
-- ('14', '1', '2024-04-14', 'Present'),
-- ('15', '1', '2024-04-15', 'Present'),
-- ('16', '1', '2024-04-16', 'Present'),
-- ('17', '1', '2024-04-17', 'Present'),
-- ('18', '1', '2024-04-18', 'Present'),
-- ('19', '1', '2024-04-19', 'Present'),
-- ('20', '1', '2024-04-20', 'Present'),
-- ('21', '1', '2024-04-21', 'Present'),
-- ('22', '1', '2024-04-22', 'Present'),
-- ('23', '1', '2024-04-23', 'Present'),
-- ('24', '1', '2024-04-24', 'Present'),
-- ('25', '1', '2024-04-25', 'Present'),
-- ('26', '1', '2024-04-26', 'Present'),
-- ('27', '1', '2024-04-27', 'Present'),
-- ('28', '1', '2024-04-28', 'Present'),
-- ('29', '1', '2024-04-29', 'Present'),
-- ('30', '1', '2024-04-30', 'Present');

-- 12.Kiểm tra total_salary = salary/26 * days_worked - (salary/26 * days_late * 30%)
DELIMITER //
CREATE TRIGGER update_total_salary_timesheets_insert
AFTER INSERT ON timesheets
FOR EACH ROW
BEGIN
    DECLARE total_days_worked INT;
    DECLARE total_days_late INT;
    DECLARE total_salary DECIMAL(10, 2);
    SET total_days_worked = NEW.days_worked;
    SET total_days_late = NEW.days_late;
    SET total_salary = (SELECT salary FROM contracts WHERE contract_id = NEW.contract_id) / 26 * total_days_worked
                      - (SELECT salary FROM contracts WHERE contract_id = NEW.contract_id) / 26 * total_days_late * 0.3;
    INSERT INTO timesheet_details(timesheet_id, total_salary) VALUES (NEW.timesheet_id, total_salary);
    UPDATE timesheet_details SET timesheet_details.total_salary = total_salary WHERE timesheet_details.timesheet_id = NEW.timesheet_id;
END;
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER update_total_salary_timesheets_update
AFTER UPDATE ON timesheets
FOR EACH ROW
BEGIN
    DECLARE total_days_worked INT;
    DECLARE total_days_late INT;
    DECLARE total_salary DECIMAL(10, 2);
    SET total_days_worked = NEW.days_worked;
    SET total_days_late = NEW.days_late;
    SET total_salary = (SELECT salary FROM contracts WHERE contract_id = NEW.contract_id) / 26 * total_days_worked
                      - (SELECT salary FROM contracts WHERE contract_id = NEW.contract_id) / 26 * total_days_late * 0.3;
    UPDATE timesheet_details SET timesheet_details.total_salary = total_salary WHERE timesheet_details.timesheet_id = NEW.timesheet_id;
END;
//
DELIMITER ;