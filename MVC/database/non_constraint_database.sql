CREATE TABLE `accounts` (
  `account_id` int(11) PRIMARY KEY NOT NULL,
  `role_id` int(11) DEFAULT null,
  `username` varchar(200) DEFAULT null,
  `password` varchar(300) DEFAULT null,
  `created_at` datetime DEFAULT null,
  `updated_at` datetime DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `brands` (
  `brand_id` int(11) PRIMARY KEY NOT NULL,
  `brand_name` varchar(100) DEFAULT null,
  `supplier_id` int(11) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `categories` (
  `categories_id` int(11) PRIMARY KEY NOT NULL,
  `categories_name` varchar(100) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `customers` (
  `customer_id` int(11) PRIMARY KEY NOT NULL,
  `customer_fullname` varchar(100) DEFAULT null,
  `role_id` int(11) DEFAULT null,
  `gender` bit(1) DEFAULT null,
  `phone_number` varchar(20) DEFAULT null,
  `customer_email` varchar(200) DEFAULT null,
  `address` varchar(200) DEFAULT null,
  `date_of_birth` date DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `decentralizations` (
  `decentralization_id` int(11) PRIMARY KEY NOT NULL,
  `role_id` int(11) DEFAULT null,
  `module_id` int(11) DEFAULT null,
  `function_id` int(11) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `exports` (
  `export_id` int(11) PRIMARY KEY NOT NULL,
  `staff_id` int(11) DEFAULT null,
  `invoice_date` datetime DEFAULT null,
  `unit_price_export` float DEFAULT null,
  `quantity_export` int(50) DEFAULT null,
  `total_price` float DEFAULT null,
  `customer_id` int(11) DEFAULT null,
  `reason_id` int(11) DEFAULT null,
  `order_detail_id` int(11) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `functions` (
  `function_id` int(11) PRIMARY KEY NOT NULL,
  `function_name` varchar(100) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `imports` (
  `import_id` int(11) PRIMARY KEY NOT NULL,
  `staff_id` int(11) DEFAULT null,
  `shipment_id` int(11) DEFAULT null,
  `reason_id` int(11) DEFAULT null,
  `import_date` datetime DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `modules` (
  `module_id` int(11) PRIMARY KEY NOT NULL,
  `module_name` varchar(200) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `orders` (
  `order_id` int(11) PRIMARY KEY NOT NULL,
  `account_id` int(11) DEFAULT null,
  `receiver_name` varchar(100) DEFAULT null,
  `email_of_receiver` varchar(100) DEFAULT null,
  `phone_number_of_receiver` varchar(20) DEFAULT null,
  `address_of_receiver` varchar(200) DEFAULT null,
  `note` varchar(100) DEFAULT null,
  `order_date` datetime DEFAULT null,
  `status_of_order` ENUM ('Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled') DEFAULT null,
  `total_money` float DEFAULT null,
  `shipping_method` varchar(100) DEFAULT null,
  `shipping_address` varchar(200) DEFAULT null,
  `shipping_date` datetime DEFAULT null,
  `tracking_number` varchar(100) DEFAULT null,
  `payment_method` varchar(100) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `order_details` (
  `order_detail_id` int(11) PRIMARY KEY NOT NULL,
  `order_id` int(11) DEFAULT null,
  `product_id` int(11) DEFAULT null,
  `price` float DEFAULT null,
  `number_of_products` int(11) DEFAULT null,
  `total_money` float DEFAULT null,
  `color_of_product` varchar(20) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `products` (
  `product_id` int(11) PRIMARY KEY NOT NULL,
  `product_name` varchar(350) DEFAULT null,
  `brand_id` int(11) DEFAULT null,
  `categories_id` int(11) DEFAULT null,
  `price` float DEFAULT null,
  `thumbnail` varchar(300) DEFAULT null,
  `description` longtext DEFAULT null,
  `created_at` datetime DEFAULT null,
  `updated_at` datetime DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `product_images` (
  `product_image_id` int(11) PRIMARY KEY NOT NULL,
  `product_id` int(11) DEFAULT null,
  `image_url` varchar(300) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `reasons` (
  `reason_id` int(11) PRIMARY KEY NOT NULL,
  `reason_name` varchar(200) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `roles` (
  `role_id` int(11) PRIMARY KEY NOT NULL,
  `role_name` varchar(20) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `shipments` (
  `shipment_id` int(11) PRIMARY KEY NOT NULL,
  `import_id` int(11) DEFAULT null,
  `product_id` int(11) DEFAULT null,
  `unit_price_import` float DEFAULT null,
  `quantity` int(50) DEFAULT null,
  `remain` int(50) DEFAULT null,
  `sku_id` int(11) DEFAULT null,
  `mfg` date DEFAULT null,
  `exp` date DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `skus` (
  `sku_id` int(11) PRIMARY KEY NOT NULL,
  `sku_code` varchar(100) DEFAULT null,
  `product_id` int(11) DEFAULT null,
  `color_of_product` varchar(20) DEFAULT null,
  `weight_of_product` float DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `staffs` (
  `staff_id` int(11) PRIMARY KEY NOT NULL,
  `staff_fullname` varchar(100) DEFAULT null,
  `staff_phone_number` varchar(20) DEFAULT null,
  `staff_email` varchar(200) DEFAULT null,
  `role_id` int(11) DEFAULT null,
  `gender` bit(1) DEFAULT null,
  `entry_date` date DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `statistics` (
  `statistic_id` int(11) PRIMARY KEY NOT NULL,
  `statistic_name` varchar(200) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `suppliers` (
  `supplier_id` int(11) PRIMARY KEY NOT NULL,
  `supplier_name` varchar(200) DEFAULT null,
  `phone_number_of_supplier` varchar(200) DEFAULT null,
  `address_of_supplier` varchar(200) DEFAULT null,
  `email_of_supplier` varchar(100) DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `wages` (
  `wage_id` int(11) PRIMARY KEY NOT NULL,
  `work_time` float DEFAULT null,
  `base_salary` float DEFAULT null,
  `allowance` float DEFAULT null,
  `start_date` date DEFAULT null,
  `end_date` date DEFAULT null,
  `is_active` bit(1) DEFAULT null
);

CREATE TABLE `wage_details` (
  `wage_detail_id` int(11) PRIMARY KEY NOT NULL,
  `wage_id` int(11) DEFAULT null,
  `staff_id` int(11) DEFAULT null,
  `payment_date` date DEFAULT null,
  `is_active` bit(1) DEFAULT null
);
