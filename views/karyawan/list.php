<?php

use yii\helpers\Html;

/* @var $model app\models\Karyawan */
/* @var $status */
$this->title = 'List Karyawan';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title . ' >> ' . strtoupper($status);
echo Html::beginTag('h2') . $this->title . Html::endTag('h2');
echo Html::beginTag('div', ['class' => 'karyawan-list']);
echo Html::beginTag('table', ['class' => 'table table-responsive table-hover table-border']);
echo Html::beginTag('thead');
echo Html::beginTag('tr');
echo Html::beginTag('th') . 'No' . Html::endTag('th');
echo Html::beginTag('th') . 'NIK' . Html::endTag('th');
echo Html::beginTag('th') . 'Karyawan' . Html::endTag('th');
echo Html::beginTag('th') . 'Status' . Html::endTag('th');
echo Html::beginTag('th') . 'Jabatan' . Html::endTag('th');
echo Html::beginTag('th') . '' . Html::endTag('th');
echo Html::endTag('tr');
echo Html::endTag('thead');
echo Html::beginTag('tbody');
if (count($model) > 0) {
    $i = 1;
    foreach ($model as $row) {
        echo Html::beginTag('tr');
        echo Html::beginTag('td') . $i . Html::endTag('td');
        echo Html::beginTag('td') . $row['nik'] . Html::endTag('td');
        echo Html::beginTag('td') . $row['nama'] . Html::endTag('td');
        echo Html::beginTag('td') . $row['nm_status'] . Html::endTag('td');
        echo Html::beginTag('td') . $row['nm_jabatan'] . Html::endTag('td');
        echo Html::beginTag('td') . Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['karyawan/view-list', 'id' => $row['id_karyawan'], 'status' => $status]) . Html::endTag('td');
        echo Html::endTag('tr');
        $i++;
    }
}
echo Html::endTag('tbody');
echo Html::endTag('table');
echo Html::endTag('div');
