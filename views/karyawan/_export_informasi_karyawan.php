<?php
/* @var $model */
\moonland\phpexcel\Excel::widget([
    'models' => $model,
    'mode' => 'export',
    'fileName' => 'export-informasi-karyawan-' . date('Y'),
    'columns' => ['nama', 'jk', 'nik', 'jabatan', 'dept', 'doj'],
    'headers' => ['nama' => 'Nama Karyawan', 'jk' => 'Jenis Kelamin', 'nik' => 'NIK', 'jabatan' => 'Jabatan',
        'dept' => 'Dept', 'doj' => 'Date of Joint']
]);