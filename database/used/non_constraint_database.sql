CREATE TABLE `accounts` (
  `account_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime,
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `brands` (
  `brand_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) DEFAULT '' COMMENT 'Ex: SANYO, TOSHIBA,...',
  `brand_logo` varchar(300) DEFAULT '',
  `supplier_id` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `categories` (
  `categories_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(100) DEFAULT '' COMMENT 'Ex: Tủ lạnh, máy giặt,...',
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `customers` (
  `customer_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `customer_fullname` varchar(100) DEFAULT '',
  `role_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `gender` tinyint(1) DEFAULT 0 COMMENT 'Male: 0, Female: 1',
  `phone_number` varchar(20) DEFAULT '',
  `customer_email` varchar(200) DEFAULT '',
  `address` varchar(200) DEFAULT '' COMMENT 'Địa chỉ của khách hàng',
  `date_of_birth` date,
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `decentralizations` (
  `decentralization_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `exports` (
  `export_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `export_date` datetime DEFAULT (now()),
  `total_price` decimal(10,2) DEFAULT 0 COMMENT 'Không tự sinh đc như mysql',
  `reason_id` int(11) NOT NULL COMMENT 'bán - customer, trả - supllier',
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `export_details` (
  `export_detail_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `export_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `unit_price_export` decimal(10,2) DEFAULT 0,
  `quantity_export` int(50) DEFAULT 0
);

CREATE TABLE `functions` (
  `function_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `function_name` varchar(100) DEFAULT '',
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `imports` (
  `import_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `reason_id` int(11) NOT NULL,
  `import_date` datetime DEFAULT (now()),
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `modules` (
  `module_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `module_name` varchar(200) DEFAULT '',
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `orders` (
  `order_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `receiver_name` varchar(100) DEFAULT '' COMMENT 'Có thể giấu tên',
  `email_of_receiver` varchar(100) NOT NULL,
  `phone_number_of_receiver` varchar(20) NOT NULL,
  `address_of_receiver` varchar(200) NOT NULL,
  `note` varchar(100) DEFAULT '',
  `order_date` datetime DEFAULT (now()),
  `status_of_order` ENUM ('Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
  `total_money` decimal(10,2) DEFAULT 0,
  `shipping_method` varchar(100) DEFAULT '',
  `shipping_address` varchar(200) DEFAULT '',
  `shipping_date` datetime,
  `tracking_number` varchar(100) DEFAULT '',
  `payment_method` varchar(100) DEFAULT '',
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `order_details` (
  `order_detail_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT 0,
  `number_of_products` int(11) DEFAULT 1 COMMENT 'Phải > 0',
  `total_money` float DEFAULT 0 COMMENT 'Phải >= 0',
  `color_of_product` varchar(20) DEFAULT ''
);

CREATE TABLE `products` (
  `product_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `product_name` varchar(350) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT 0 COMMENT 'Phải >= 0',
  `thumbnail` varchar(300) DEFAULT '' COMMENT 'Phải có ảnh mặc định',
  `description` longtext DEFAULT 'Đây là mô tả sản phẩm',
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime,
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `product_images` (
  `product_image_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(300) DEFAULT '' COMMENT 'Phải có ít nhất 1 ảnh mặc định',
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `roles` (
  `role_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `shipments` (
  `shipment_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `import_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price_import` decimal(10,2) DEFAULT 0 COMMENT 'Phải > 0',
  `quantity` int(50) DEFAULT 0 COMMENT 'Phải > giá trị tối thiểu của 1 lô hàng',
  `remain` int(50) DEFAULT 0 COMMENT 'Phải bé 1 số lượng cụ thể thì mới nhập thêm lô',
  `sku_id` int(11) NOT NULL,
  `mfg` date,
  `exp` date,
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `skus` (
  `sku_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `sku_code` varchar(100) DEFAULT '' COMMENT 'Phải đủ số lượng ký tự của 1 sku code, nếu có enum về color thì sẽ dễ quản lý hơn',
  `product_id` int(11) NOT NULL,
  `color_of_product` varchar(20) DEFAULT '' COMMENT 'Nên có enums',
  `weight_of_product` float DEFAULT 0 COMMENT 'Phải > 0',
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `staffs` (
  `staff_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `staff_fullname` varchar(100) NOT NULL,
  `staff_phone_number` varchar(20) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `gender` tinyint(1) DEFAULT 0 COMMENT 'Male: 0, Female: 1',
  `entry_date` date DEFAULT (now()),
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `import_returns` (
  `import_return_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `customer_supplier_id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL COMMENT 'Nhập từ khách hàng, Trả về nhà cung cấp'
);

CREATE TABLE `import_return_details` (
  `import_return_detail_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `import_return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
);

CREATE TABLE `statistics` (
  `statistic_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `statistic_name` varchar(200) NOT NULL COMMENT 'Dùng các function, trigger, procedure, view,... Để tạo ra các dữ liệu muốn thống kê',
  `value` float NOT NULL DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `suppliers` (
  `supplier_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(200) NOT NULL,
  `phone_number_of_supplier` varchar(20) NOT NULL,
  `address_of_supplier` varchar(200) NOT NULL,
  `email_of_supplier` varchar(100) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `salaries` (
  `salary_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `base_salary` decimal(10,2) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1
);

CREATE TABLE `salary_details` (
  `salary_detail_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `salary_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `total_wage` decimal(10,2) DEFAULT 0,
  `multiplier_salary` float NOT NULL COMMENT 'Dựa vào role của staff sẽ gắn hệ số lương riêng',
  `number_of_days_off` int(11) DEFAULT 0,
  `payment_date` date DEFAULT (now())
);
