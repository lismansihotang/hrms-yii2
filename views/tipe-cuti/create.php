<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipeCuti */

$this->title = 'Create Tipe Cuti';
$this->params['breadcrumbs'][] = ['label' => 'Tipe Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-cuti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
