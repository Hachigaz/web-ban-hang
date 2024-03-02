-- DELIMITER //
-- CREATE TRIGGER accounts_after_insert_update 
-- BEFORE INSERT
-- ON accounts FOR EACH ROW
-- BEGIN
--     SET NEW.username = UPPER(NEW.username);
-- END; //
-- DELIMITER ;

-- ---------------------------- ACCOUNTS ----------------------------
-- -- Kiểm tra mật khẩu có chứa username không
-- DELIMITER //
-- CREATE TRIGGER `accounts_check_password_insert` 
-- BEFORE INSERT ON `accounts`
-- FOR EACH ROW 
-- BEGIN
-- IF INSTR(LOWER(NEW.password), LOWER(NEW.username)) > 0 THEN
--     SIGNAL SQLSTATE '45000'
--     SET MESSAGE_TEXT = 'ERROR: Password cannot contain the username.';
--     END IF;
-- END; // 
-- DELIMITER ;
-- DELIMITER //
-- CREATE TRIGGER `accounts_check_password_update` 
-- BEFORE UPDATE ON `accounts`
-- FOR EACH ROW 
-- BEGIN
-- IF INSTR(LOWER(NEW.password), LOWER(NEW.username)) > 0 THEN
--     SIGNAL SQLSTATE '45000'
--     SET MESSAGE_TEXT = 'ERROR: Password cannot contain the username.';
--     END IF;
-- END; // 
-- DELIMITER ;

-- -- Kiểm tra ký tự đặc biệt của username
-- DELIMITER //
-- CREATE TRIGGER `accounts_check_username_special_characters_insert` 
-- BEFORE INSERT ON `accounts`
-- FOR EACH ROW begin
-- 	if new.username regexp '[^a-zA-z0-9]' then
--     	SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Error: Username must not contain special characters';
--     end if;
-- end; //
-- DELIMITER ;
-- DELIMITER //
-- CREATE TRIGGER `accounts_check_username_special_characters_update` 
-- BEFORE UPDATE ON `accounts`
-- FOR EACH ROW 
-- BEGIN
--     IF NEW.username REGEXP '[^a-zA-Z0-9]' THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Error: Username must not contain special characters';
--     END IF;
-- END; //
-- DELIMITER ;

-- -- Kiểm tra xem ngày tạo tk có trước ngày cập nhật tk không
-- DELIMITER //
-- CREATE TRIGGER `accounts_created_bigger_updated_insert` 
-- BEFORE INSERT ON `accounts`
-- FOR EACH ROW 
-- BEGIN
--     IF NEW.created_at >= NEW.updated_at THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Error: created_at must be before updated_at';
--     END IF;
-- END; //
-- DELIMITER ; 
-- DELIMITER //
-- CREATE TRIGGER `accounts_created_bigger_updated_update` 
-- BEFORE UPDATE ON `accounts`
-- FOR EACH ROW 
-- BEGIN
--     IF NEW.created_at >= NEW.updated_at THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Error: created_at must be before updated_at';
--     END IF;
-- END; //
-- DELIMITER ; 

---------------------------- ACCOUNTS ----------------------------
-- Dùng CHECK Kiểm tra mật khẩu có chứa username không
ALTER TABLE `accounts`
ADD CONSTRAINT check_password CHECK(INSTR(LOWER(password), LOWER(username)) = 0);
-- Dùng check Kiểm tra ký tự đặc biệt của username
ALTER TABLE `accounts`
ADD CONSTRAINT check_special_character CHECK (username NOT REGEXP '[^a-zA-Z0-9]');
-- Dùng check Kiểm tra xem ngày tạo tk có trước ngày cập nhật tk không
ALTER TABLE `accounts`
ADD CONSTRAINT check_created_bigger_updated CHECK (created_at < updated_at);
----------------------------- CUSTOMERS ---------------------------
