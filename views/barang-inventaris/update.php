<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BarangInventaris */

$this->title = 'Update Barang Inventaris: ' . $model->id_barang_inventaris;
$this->params['breadcrumbs'][] = ['label' => 'Barang Inventaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_barang_inventaris, 'url' => ['view', 'id' => $model->id_barang_inventaris]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive barang-inventaris-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php
    echo $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
