<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cuti */

$this->title = 'Create Cuti';
$this->params['breadcrumbs'][] = ['label' => 'Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
