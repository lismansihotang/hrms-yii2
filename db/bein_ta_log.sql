DELIMITER $$

CREATE
    TRIGGER `zsofttadb`.`bein_ta_log` AFTER INSERT
    ON `zsofttadb`.`ta_log`
    FOR EACH ROW BEGIN
	INSERT INTO db_payroll.`log_absensi`(log_match_id, log_finger_id, log_fulldate, log_type, log_date, log_time)
	VALUES (New.Mach_id, New.Fid, DATE_FORMAT(STR_TO_DATE(New.`DateTime`,'%d/%m/%Y %H:%i:%s'),'%Y-%m-%d %H:%i:%s'), New.In_out, DATE_FORMAT(STR_TO_DATE(New.Tanggal_Log,'%d/%m/%Y'),'%Y-%m-%d'), New.Jam_Log);
    END$$

DELIMITER ;