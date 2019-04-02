<?php
/* @var $model */
\moonland\phpexcel\Excel::widget([
    'models' => $model,
    'mode' => 'export',
    'fileName' => 'export-absensi-' . $nmKaryawan . '-' . date('Y'),
    'columns' => ['tgl', 'in', 'out', 'total', 'rest', 'work', 'm', 'n', 'o', 'p', 'q'],
    'headers' => ['tgl' => 'Tanggal', 'in' => 'IN', 'out' => 'OUT', 'total' => 'Total',
        'rest' => 'Rest', 'work' => 'Work', 'm' => 'M', 'n' => 'N', 'o' => 'O', 'p' => 'P', 'q' => 'Q']
]);