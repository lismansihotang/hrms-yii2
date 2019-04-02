<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipeShift */

$this->title = 'Update Tipe Shift: ' . $model->id_tipe_shift;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Shift', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipe_shift, 'url' => ['view', 'id' => $model->id_tipe_shift]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipe-shift-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
