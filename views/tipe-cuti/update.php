<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipeCuti */

$this->title = 'Update Tipe Cuti: ' . $model->id_tipe_cuti;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipe_cuti, 'url' => ['view', 'id' => $model->id_tipe_cuti]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipe-cuti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
