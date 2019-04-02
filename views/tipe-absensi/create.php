<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipeAbsensi */

$this->title = 'Create Tipe Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Tipe Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-absensi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
