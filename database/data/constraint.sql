DELIMITER //
CREATE TRIGGER accounts_after_insert_update 
BEFORE INSERT
ON accounts FOR EACH ROW
BEGIN
    SET NEW.username = UPPER(NEW.username);
END; //
DELIMITER ;

-- ACCOUNT
-- Kiểm tra mật khẩu có chứa username không khi insert
DELIMITER //
CREATE TRIGGER check_password_insert
BEFORE INSERT ON accounts
FOR EACH ROW
BEGIN
IF INSTR(LOWER(NEW.password), LOWER(NEW.username)) > 0 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'ERROR: Password cannot contain the username.';
    END IF;
END; // 
DELIMITER ;
-- Kiểm tra mật khẩu có chứa username không khi update
DELIMITER //
CREATE TRIGGER check_password_update
BEFORE UPDATE ON accounts
FOR EACH ROW
BEGIN
IF INSTR(LOWER(NEW.password), LOWER(NEW.username)) > 0 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'ERROR: Password cannot contain the username.';
    END IF;
END; // 
DELIMITER ;