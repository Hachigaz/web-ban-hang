---------------------------- ACCOUNTS ----------------------------
-- 1.Dùng CHECK Kiểm tra mật khẩu có chứa username không
ALTER TABLE `accounts`
ADD CONSTRAINT check_password_accounts CHECK(INSTR(LOWER(password), LOWER(username)) = 0);
-- 2.Dùng check Kiểm tra ký tự đặc biệt của username
ALTER TABLE `accounts`
ADD CONSTRAINT check_special_character_accounts CHECK (username NOT REGEXP '[^a-zA-Z0-9]');
-- 3.Dùng check Kiểm tra xem ngày tạo tk có trước ngày cập nhật tk không
ALTER TABLE `accounts`
ADD CONSTRAINT check_created_bigger_updated_accounts CHECK (created_at < updated_at);


----------------------------- CUSTOMERS ---------------------------
-- trong Check không được phép dùng hàm và biểu thức động như curdate() => nên dùng trigger
-- ALTER TABLE `customers`
-- ADD CONSTRAINT check_age_customers CHECK (TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) >= 13);
-- ALTER TABLE `customers`
-- ADD CONSTRAINT check_age_customers CHECK (YEAR(CURDATE()) - YEAR(date_of_birth) > 13 OR (YEAR(CURDATE()) - YEAR(date_of_birth) = 13 AND DATE_FORMAT(date_of_birth, '%m-%d') <= DATE_FORMAT(CURDATE(), '%m-%d')))
-- 1.Kiểm tra xem khách hàng có trên 13 tuổi không
DELIMITER //
CREATE TRIGGER check_age_customers_insert
BEFORE INSERT ON `customers`
FOR EACH ROW
BEGIN
    IF NOT TIMESTAMPDIFF(YEAR, NEW.date_of_birth, CURDATE()) >= 13 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = "Error: Customer's age must be over 13";
    END IF;
END; // 
DELIMITER ;
DELIMITER //
CREATE TRIGGER check_age_customers_update
BEFORE UPDATE ON `customers`
FOR EACH ROW
BEGIN
    IF NOT TIMESTAMPDIFF(YEAR, NEW.date_of_birth, CURDATE()) >= 13 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = "Error: Customer's age must be over 13";
    END IF;
END; // 
DELIMITER ;

-- 2.Kiểm tra xem email nhập vào có đúng định dạng không
ALTER TABLE `customers`
ADD CONSTRAINT check_email_format_customers CHECK (`customers`.`customer_email` REGEXP '^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,6}$');
-- 3.Kiểm Fullname khách hàng chỉ chứa chữ(có Tiếng Việt) và khoảng trắng
ALTER TABLE `customers`
ADD CONSTRAINT check_fullname_customers CHECK (`customers`.customer_fullname REGEXP '^[a-zA-z áàảãạÁÀẢÃẠăắằặẳẵĂẮẰẲẴẶâấầẩẫậÂẤẦẨẪẬéèẻẽẹÉÈẺẼẸêếềểễệÊẾỂỄỆíìỉĩịÍÌỈĨỊúùủũụÚÙỦŨỤưứừửữựƯỨỪỬỮỰóòỏõọÓÒỎÕỌôốồổỗộÔỐỒỔỖỘơớờởỡợƠỚỜỞỠỢđĐýỳỷỹỵÝỲỶỸỴ]+$');  
-- 4.Kiểm tra Role_id của khách hàng phải là 5
ALTER TABLE `customers`
ADD CONSTRAINT check_role_customers CHECK (`customers`.role_id = 5);
-- 5.Kiểm tra gender của khách hàng chỉ là 0 hoặc 1
ALTER TABLE `customers`
ADD CONSTRAINT check_gender_customers CHECK (`customers`.gender = 0 OR `customer`.gender = 1);
-- 6.Kiểm tra Phone number phải có 10 số và bắt đầu bằng số 0
ALTER TABLE `customers`
ADD CONSTRAINT check_phone_number_customers CHECK (`customers`.phone_number REGEXP '^0[0-9]{9}$');

------------------------------------ EXPORTS ----------------------------------------
-- 1.Kiểm tra xem role_id của staff đang thực hiện phiếu xuất có phải là role 1,2,4 không
-- Truy vấn phức tạp trên nhiều bảng thì phải dùng trigger
DELIMITER //
CREATE TRIGGER check_role_exports_insert
BEFORE INSERT ON `exports`
FOR EACH ROW
BEGIN
    DECLARE role_id INT;
    SELECT `staffs`.`role_id` INTO role_id FROM `staffs` WHERE `staff_id` = NEW.staff_id;
    IF NOT role_id IN (1,2,4) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: role_id of staff must be 1, 2, or 4';
    END IF;
END; //
DELIMITER ;
DELIMITER //
CREATE TRIGGER check_role_exports_update
BEFORE UPDATE ON `exports`
FOR EACH ROW
BEGIN
    DECLARE role_id INT;
    SELECT `staffs`.`role_id` INTO role_id FROM `staffs` WHERE `staff_id` = NEW.staff_id;
    IF NOT role_id IN (1,2,4) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: role_id of staff must be 1, 2, or 4';
    END IF;
END; //
DELIMITER ;
-- 2. Kiểm tra quantity_export > 0
ALTER TABLE `export_details`
ADD CONSTRAINT check_export_quantity_export_details CHECK (`export_details`.quantity_export > 0);
-- 3. Kiểm tra xem total_price = unit_price_export*quantity_export không
DELIMITER //
CREATE TRIGGER calculate_total_price_exports_insert
AFTER INSERT ON export_details
FOR EACH ROW
BEGIN
    UPDATE `exports`
    SET `exports`.total_price = (
        SELECT SUM(unit_price_export * quantity_export)
        FROM export_details
        WHERE export_id = NEW.export_id
    )
    WHERE export_id = NEW.export_id;
END; //
DELIMITER ;
DELIMITER //
CREATE TRIGGER calculate_total_price_exports_update
AFTER UPDATE ON export_details
FOR EACH ROW
BEGIN
    UPDATE `exports`
    SET `exports`.total_price = (
        SELECT SUM(unit_price_export * quantity_export)
        FROM export_details
        WHERE export_id = NEW.export_id
    )
    WHERE export_id = NEW.export_id;
END; //
DELIMITER ;