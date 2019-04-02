<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TempatPendidikan */

$this->title = 'Update Tempat Pendidikan: ' . $model->id_tp;
$this->params['breadcrumbs'][] = ['label' => 'Tempat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tp, 'url' => ['view', 'id' => $model->id_tp]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tempat-pendidikan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
