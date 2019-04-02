<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shift */

$this->title = 'Update Shift: ' . $model->id_shift;
$this->params['breadcrumbs'][] = ['label' => 'Shift', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_shift, 'url' => ['view', 'id' => $model->id_shift]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shift-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
