DELIMITER $$
DROP VIEW IF EXISTS `v_karyawan`$$
CREATE VIEW `v_karyawan` AS 
SELECT
  `karyawan`.`id_karyawan`   AS `id_karyawan`,
  `karyawan`.`nik`           AS `nik`,
  `karyawan`.`status`        AS `status`,
  `karyawan`.`id_perusahaan` AS `id_perusahaan`,
  `karyawan`.`id_jabatan`    AS `id_jabatan`,
  `karyawan`.`tgl_bergabung` AS `tgl_bergabung`,
  `jabatan`.`nm_jabatan`     AS `nm_jabatan`,
  `informasi_pribadi`.`nama` AS `nama`,
  `perusahaan`.`nm_pt`       AS `nm_pt`
FROM (((`jabatan`
     JOIN `karyawan`
       ON ((`jabatan`.`id` = `karyawan`.`id_jabatan`)))
    JOIN `informasi_pribadi`
      ON ((`informasi_pribadi`.`id_karyawan` = `karyawan`.`id_karyawan`)))
   JOIN `perusahaan`
     ON ((`perusahaan`.`id` = `karyawan`.`id_perusahaan`)))$$

DELIMITER ;