<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TempatPendidikan */

$this->title = 'Create Tempat Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Tempat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tempat-pendidikan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
