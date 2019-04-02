<?php

#var_dump($model);
\moonland\phpexcel\Excel::widget([
    'models' => $model,
    'mode' => 'export',
    'fileName' => 'export-' . date('Y'),
    'columns' => ['id', 'tgl', 'bulan'],
    'headers' => ['id' => 'Header Column 1', 'tgl' => 'Header Column 2', 'bulan' => 'Header Column 3']
]);
