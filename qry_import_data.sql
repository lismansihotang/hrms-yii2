SELECT ssn,COUNT(ssn) FROM userinfo GROUP BY ssn ORDER BY ssn

SELECT title FROM userinfo GROUP BY title

INSERT INTO karyawan(nik, tgl_bergabung) SELECT ssn,DATE(hiredday) FROM userinfo
UPDATE karyawan SET karyawan.`status`='Karyawan Tetap',id_perusahaan=1

INSERT INTO jabatan(nm_jabatan) SELECT title FROM userinfo GROUP BY title
UPDATE jabatan SET id_perusahaan=1

UPDATE karyawan SET id_jabatan=(SELECT id FROM jabatan JOIN userinfo WHERE jabatan.`nm_jabatan`=userinfo.`TITLE` AND karyawan.nik=userinfo.`SSN`)

SELECT *,(SELECT id FROM jabatan JOIN userinfo WHERE jabatan.`nm_jabatan`=userinfo.`TITLE` AND karyawan.nik=userinfo.`SSN`) 
FROM karyawan

INSERT INTO informasi_pribadi(nama, panggilan,jk,tgl_lahir)
SELECT  userinfo.`OPHONE`, userinfo.`Name`, userinfo.`Gender`, DATE(userinfo.`BIRTHDAY`) FROM userinfo

SELECT id_karyawan, nama, panggilan, 
(SELECT id_karyawan FROM karyawan JOIN userinfo WHERE karyawan.nik=userinfo.`SSN` AND userinfo.`Name`=informasi_pribadi.`panggilan` LIMIT 0,1)
FROM informasi_pribadi

UPDATE informasi_pribadi SET id_karyawan=(SELECT id_karyawan FROM karyawan JOIN userinfo WHERE karyawan.nik=userinfo.`SSN` AND userinfo.`Name`=informasi_pribadi.`panggilan` LIMIT 0,1)


INSERT INTO log_absensi(log_finger_id, log_fulldate, log_date, log_time)
SELECT userid, checktime, DATE(checktime), TIME(checktime) FROM checkinout WHERE userid IN(SELECT userid FROM userinfo)

INSERT INTO karyawan_finger_id(log_finger_id)
SELECT userid FROM userinfo

SELECT *,(SELECT id_karyawan FROM karyawan JOIN userinfo WHERE karyawan.nik=userinfo.`SSN` AND karyawan_finger_id.`log_finger_id`=userinfo.`USERID`) 
FROM karyawan_finger_id

UPDATE karyawan_finger_id SET id_karyawan=(SELECT id_karyawan FROM karyawan JOIN userinfo WHERE karyawan.nik=userinfo.`SSN` AND karyawan_finger_id.`log_finger_id`=userinfo.`USERID`)

INSERT INTO komponen_gaji_karyawan(id_karyawan)
SELECT id_karyawan FROM karyawan

UPDATE komponen_gaji_karyawan SET id_komponen=1, nominal=30000

SELECT * FROM log_absensi WHERE YEAR(log_date)=2017