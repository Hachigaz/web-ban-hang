---------------------------- ACCOUNTS ----------------------------
-- Dùng CHECK Kiểm tra mật khẩu có chứa username không
ALTER TABLE `accounts`
ADD CONSTRAINT check_password_accounts CHECK(INSTR(LOWER(password), LOWER(username)) = 0);
-- Dùng check Kiểm tra ký tự đặc biệt của username
ALTER TABLE `accounts`
ADD CONSTRAINT check_special_character_accounts CHECK (username NOT REGEXP '[^a-zA-Z0-9]');
-- Dùng check Kiểm tra xem ngày tạo tk có trước ngày cập nhật tk không
ALTER TABLE `accounts`
ADD CONSTRAINT check_created_bigger_updated_accounts CHECK (created_at < updated_at);


----------------------------- CUSTOMERS ---------------------------
-- trong Check không được phép dùng hàm và biểu thức động như curdate() => nên dùng trigger
-- ALTER TABLE `customers`
-- ADD CONSTRAINT check_age_customers CHECK (TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) >= 13);
-- ALTER TABLE `customers`
-- ADD CONSTRAINT check_age_customers CHECK (YEAR(CURDATE()) - YEAR(date_of_birth) > 13 OR (YEAR(CURDATE()) - YEAR(date_of_birth) = 13 AND DATE_FORMAT(date_of_birth, '%m-%d') <= DATE_FORMAT(CURDATE(), '%m-%d')))
-- Kiểm tra xem khách hàng có trên 13 tuổi không
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

-- Kiểm tra xem email nhập vào có đúng định dạng không
ALTER TABLE `customers`
ADD CONSTRAINT check_email_format_customers CHECK (`customers`.`customer_email` REGEXP '^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,6}$');
-- Kiểm Fullname khách hàng chỉ chứa chữ(có Tiếng Việt) và khoảng trắng
ALTER TABLE `customers`
ADD CONSTRAINT check_fullname_customers CHECK (`customers`.customer_fullname REGEXP '^[a-zA-z áàảãạÁÀẢÃẠăắằặẳẵĂẮẰẲẴẶâấầẩẫậÂẤẦẨẪẬéèẻẽẹÉÈẺẼẸêếềểễệÊẾỂỄỆíìỉĩịÍÌỈĨỊúùủũụÚÙỦŨỤưứừửữựƯỨỪỬỮỰóòỏõọÓÒỎÕỌôốồổỗộÔỐỒỔỖỘơớờởỡợƠỚỜỞỠỢđĐýỳỷỹỵÝỲỶỸỴ]+$');  
-- Kiểm tra Role_id của khách hàng phải là 5
ALTER TABLE `customers`
ADD CONSTRAINT check_role_customers CHECK (`customers`.role_id = 5);
-- Kiểm tra gender của khách hàng chỉ là 0 hoặc 1
ALTER TABLE `customers`
ADD CONSTRAINT check_gender_customers CHECK (`customers`.gender = 0 OR `customer`.gender = 1);
-- Kiểm tra Phone number phải có 10 số và bắt đầu bằng số 0
ALTER TABLE `customers`
ADD CONSTRAINT check_phone_number_customers CHECK (`customers`.phone_number REGEXP '^0[0-9]{9}$');