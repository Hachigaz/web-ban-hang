
Enum "orders_status_of_order_enum" {
  "Pending"
  "Processing"
  "Shipped"
  "Delivered"
  "Cancelled"
}

Table "accounts" {
  "account_id" int(11) [pk, not null, increment]
  "username" varchar(200) [unique, not null]
  "password" varchar(300) [not null]
  "created_at" datetime [default: `now()`]
  "updated_at" datetime
  "is_active" tinyint(1) [default: 1]
}

Table "brands" {
  "brand_id" int(11) [pk, not null, increment]
  "brand_name" varchar(100) [unique, default: "", note: "Ex: SANYO, TOSHIBA,..."]
  "brand_logo" varchar(300) [default: ""]
  "supplier_id" varchar(20) [not null]
  "is_active" tinyint(1) [default: 1]
}

Table "categories" {
  "categories_id" int(11) [pk, not null, increment]
  "categories_name" varchar(100) [default: "", note: "Ex: Tủ lạnh, máy giặt,..."]
  "category_logo" varchar(300) [default: ""]
  "is_active" tinyint(1) [default: 1]
}

Table "customers" {
  "customer_id" varchar(20) [pk, not null]
  "customer_fullname" varchar(100) [default: ""]
  "role_id" int(11) [not null]
  "account_id" int(11) [not null]
  "gender" tinyint(1) [default: 0, note: "Male: 0, Female: 1"]
  "phone_number" varchar(20) [unique, default: ""]
  "customer_email" varchar(200) [unique, default: ""]
  "address" varchar(200) [default: "", note: "Địa chỉ của khách hàng"]
  "date_of_birth" date
  "is_active" tinyint(1) [default: 1]
}

Table "decentralizations" {
  "decentralization_id" int(11) [pk, not null, increment]
  "role_id" int(11) [not null]
  "module_id" int(11) [not null]
  "function_id" int(11) [not null]
  "is_active" tinyint(1) [default: 1]
}

Table "exports" {
  "export_id" int(11) [pk, not null, increment]
  "staff_id" int(11) [not null]
  "order_id" int(11) [not null]
  "export_date" datetime [default: `now()`]
  "total_price" decimal(10,2) [default: 0, note: "Không tự sinh đc như mysql"]
  "is_active" tinyint(1) [default: 1]
}

Table "export_details" {
  "export_detail_id" int(11) [pk, not null, increment]
  "export_id" int(11) [not null]
  "shipment_id" int(11) [not null]
  "unit_price_export" decimal(10,2) [default: 0]
  "quantity_export" int(50) [default: 0]
}

Table "functions" {
  "function_id" int(11) [pk, not null, increment]
  "function_name" varchar(100) [default: ""]
  "is_active" tinyint(1) [default: 1]
}

Table "imports" {
  "import_id" int(11) [pk, not null, increment]
  "staff_id" int(11) [not null]
  "import_date" datetime [default: `now()`]
  "is_active" tinyint(1) [default: 1]
}

Table "modules" {
  "module_id" int(11) [pk, not null, increment]
  "module_name" varchar(200) [default: ""]
  "is_active" tinyint(1) [default: 1]
}

Table "orders" {
  "order_id" int(11) [pk, not null, increment]
  "staff_id" int(11) [not null]
  "account_id" int(11) [not null]
  "receiver_name" varchar(100) [default: "", note: "Có thể giấu tên"]
  "email_of_receiver" varchar(100) [not null]
  "phone_number_of_receiver" varchar(20) [not null]
  "note" varchar(100) [default: ""]
  "order_date" datetime [default: `now()`]
  "status_of_order" orders_status_of_order_enum [default: "Pending"]
  "total_money" decimal(10,2) [default: 0]
  "shipping_method" varchar(100) [default: ""]
  "shipping_address" varchar(200) [not null]
  "shipping_date" datetime
  "tracking_number" varchar(100) [default: ""]
  "payment_method" varchar(100) [default: ""]
  "is_active" tinyint(1) [default: 1]
}

Table "order_details" {
  "order_detail_id" int(11) [pk, not null, increment]
  "order_id" int(11) [not null]
  "product_id" int(11) [not null]
  "price" decimal(10,2) [default: 0]
  "number_of_products" int(11) [default: 1, note: "Phải > 0"]
  // "total_money" float [default: 0, note: "Phải >= 0"]
  "color_of_product" varchar(20) [default: ""]
  // "is_active" tinyint(1) [default: 1]
}

Table "products" {
  "product_id" int(11) [pk, not null, increment]
  "product_name" varchar(350) [not null]
  "brand_id" int(11) [not null]
  "categories_id" int(11) [not null]
  "price" decimal(10,2) [default: 0, note: "Phải >= 0"]
  "guarantee" int(11) [default: 0]
  "thumbnail" varchar(300) [default: "", note: "Phải có ảnh mặc định"]
  "description" longtext [default: "Đây là mô tả sản phẩm"]
  "created_at" datetime [default: `now()`]
  "updated_at" datetime
  "is_active" tinyint(1) [default: 1]
}

Table "like" {
  "like_id" int(11) [pk, not null, increment]
  "product_id" int(11) [not null]
  "customer_id" varchar(20) [not null]
  Indexes {
    (product_id, customer_id) [unique]
  }
}

Table "product_images" {
  "product_image_id" int(11) [pk, not null, increment]
  "product_id" int(11) [not null]
  "image_url" varchar(300) [default: "", note: "Phải có ít nhất 1 ảnh mặc định"]
  "is_active" tinyint(1) [default: 1]
}

// Table "reasons" {
//   "reason_id" int(11) [unique, pk, not null, increment]
//   "reason_name" varchar(200) [default: "", note: "Nhập, Bán, Trả, Khách trả"]
//   "is_active" tinyint(1) [default: 1]
// }

Table "roles" {
  "role_id" int(11) [pk, not null, increment]
  "role_name" varchar(20) [not null]
  "is_active" tinyint(1) [default: 1]
}

Table "shipments" {
  "shipment_id" int(11) [pk, not null, increment]
  "import_id" int(11) [not null]
  "product_id" int(11) [not null]
  "unit_price_import" decimal(10,2) [default: 0, note: "Phải > 0"]
  "quantity" int(50) [default: 0, note: "Phải > giá trị tối thiểu của 1 lô hàng"]
  "remain" int(50) [default: 0, note: "Phải bé 1 số lượng cụ thể thì mới nhập thêm lô"]
  "sku_id" int(11) [not null]
  "mfg" date 
  "exp" date
  "is_active" tinyint(1) [default: 1]
}

Table "skus" {
  "sku_id" int(11) [pk, not null, increment]
  "sku_code" varchar(100) [unique, default: "", note: "Phải đủ số lượng ký tự của 1 sku code, nếu có enum về color thì sẽ dễ quản lý hơn"]
  "product_id" int(11) [not null]
  "color_of_product" varchar(20) [default: "", note: "Nên có enums"]
  "weight_of_product" float [default: 0, note: "Phải > 0"]
  "is_active" tinyint(1) [default: 1]
}

Table "staffs" {
  "staff_id" int(11) [pk, not null, increment]
  "account_id" int(11) [not null]
  "staff_fullname" varchar(100) [not null]
  "staff_phone_number" varchar(20) [unique, not null]
  "staff_email" varchar(200) [unique, not null]
  "role_id" int(11) [not null]
  "gender" tinyint(1) [default: 0, note: "Male: 0, Female: 1"]
  "entry_date" date [default: `now()`]
  "is_active" tinyint(1) [default: 1]
}

Table "import_returns" {
  "import_return_id" int(11) [pk, not null, increment]
  "staff_id" int(11) [not null]
  "customer_supplier_id" varchar(20) [not null]
  "reason" varchar(100) [not null, note: "Nhập từ khách hàng, Trả về nhà cung cấp"]
}

Table "import_return_details" {
  "import_return_detail_id" int(11) [pk, not null, increment]
  "import_return_id" int(11) [not null]
  "product_id" int(11) [not null]
  "quantity" int(11) [default: 1, not null]
}

Table "statistics" {
  "statistic_id" int(11) [pk, not null, increment]
  "statistic_name" varchar(200) [not null, note: "Dùng các function, trigger, procedure, view,... Để tạo ra các dữ liệu muốn thống kê"]
  "value" float [default: 0, not null]
  "is_active" tinyint(1) [default: 1]
}

Table "suppliers" {
  "supplier_id" varchar(20) [pk, not null]
  "supplier_name" varchar(200) [not null]
  "phone_number_of_supplier" varchar(20) [unique, not null]
  "address_of_supplier" varchar(200) [not null]
  "email_of_supplier" varchar(100) [unique, not null]
  "is_active" tinyint(1) [default: 1]
}

// Table "salaries" {
//   "salary_id" int(11) [pk, not null, increment]
//   // "work_time" float [default: 0]
//   "base_salary" decimal(10,2) [default: 0]
//   // "allowance" decimal(10,2) [default: 0]
//   // "start_date" date
//   // "end_date" date
//   "is_active" tinyint(1) [default: 1]
// }

// Table "salary_details" {
//   "salary_detail_id" int(11) [pk, not null, increment]
//   "salary_id" int(11) [not null]
//   "staff_id" int(11) [not null]
//   "total_wage" decimal(10,2) [default: 0]
//   "multiplier_salary" float [not null, note: "Dựa vào role của staff sẽ gắn hệ số lương riêng"]
//   "number_of_days_off" int(11) [default: 0]
//   "payment_date" date [default: `now()`]
//   // "is_active" tinyint(1) [default: 1]
// }

Table "contracts" {
  "contract_id" int(11) [pk, not null, increment]
  "staff_id" int(11) [not null]
  "start_date" date [not null]
  "end_date" date [not null]
  "salary" decimal(10,2) [not null]
}

Table "timesheets" {
  "timesheet_id" int(11) [pk, not null, increment]
  "contract_id" int(11) [not null]
  "month" int(2) [not null]
  "year" int(2) [not null]
  "days_worked" int(2) [not null]
  "days_off" int(2) [not null]
  "days_late" int(2) [not null]
}

Table "timesheet_details" {
  "timesheet_detail_id" int(11) [pk, not null, increment]
  "timesheet_id" int(11) [not null]
  "total_salary" decimal(10,2) [not null]
}

Ref "brands_ibfk_1":"suppliers"."supplier_id" < "brands"."supplier_id"

Ref "customers_ibfk_1":"roles"."role_id" < "customers"."role_id"

Ref "decentralizations_ibfk_1":"roles"."role_id" < "decentralizations"."role_id"

Ref "decentralizations_ibfk_2":"modules"."module_id" < "decentralizations"."module_id"

Ref "decentralizations_ibfk_3":"functions"."function_id" < "decentralizations"."function_id"

Ref "exports_ibfk_1":"staffs"."staff_id" < "exports"."staff_id"

Ref "imports_ibfk_1":"staffs"."staff_id" < "imports"."staff_id"

// Ref "imports_ibfk_2":"reasons"."reason_id" < "imports"."reason_id"

Ref "orders_ibfk_1":"accounts"."account_id" < "orders"."account_id"

Ref "order_details_ibfk_1":"orders"."order_id" < "order_details"."order_id"

Ref "order_details_ibfk_2":"products"."product_id" < "order_details"."product_id"

Ref "products_ibfk_1":"brands"."brand_id" < "products"."brand_id"

Ref "products_ibfk_2":"categories"."categories_id" < "products"."categories_id"

Ref "product_images_ibfk_1":"products"."product_id" < "product_images"."product_id"

Ref "shipments_ibfk_1":"products"."product_id" < "shipments"."product_id"

Ref "skus_ibfk_1":"products"."product_id" < "skus"."product_id"

Ref "staffs_ibfk_1":"roles"."role_id" < "staffs"."role_id"

// Ref "wage_details_ibfk_1":"staffs"."staff_id" < "salary_details"."staff_id"

// Ref "wage_details_ibfk_2":"salaries"."salary_id" < "salary_details"."salary_id"


Ref: "imports"."import_id" < "shipments"."import_id"

Ref: "accounts"."account_id" < "customers"."account_id"

Ref: "accounts"."account_id" < "staffs"."account_id"

// Ref: "reasons"."reason_id" < "exports"."reason_id"

Ref: "skus"."sku_id" < "shipments"."sku_id"

Ref: "exports"."export_id" < "export_details"."export_id"

Ref: "shipments"."shipment_id" < "export_details"."export_detail_id"

Ref: "staffs"."staff_id" < "import_returns"."staff_id"

Ref: "import_returns"."import_return_id" < "import_return_details"."import_return_id"

Ref: "products"."product_id" < "import_return_details"."product_id"

Ref: "suppliers"."supplier_id" < "import_returns"."customer_supplier_id"

Ref: "customers"."customer_id" < "import_returns"."customer_supplier_id"

Ref: "products"."product_id" < "like"."product_id"

Ref: "customers"."customer_id" < "like"."customer_id"

Ref: "orders"."order_id" < "exports"."order_id"

Ref: "staffs"."staff_id" < "orders"."staff_id"

Ref: "contracts"."contract_id" < "timesheets"."contract_id"

Ref: "staffs"."staff_id" < "contracts"."staff_id"

Ref: "timesheets"."timesheet_id" - "timesheet_details"."timesheet_id"