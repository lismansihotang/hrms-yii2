<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKaryawan */

$this->title = 'Create Penggajian Karyawan';
$this->params['breadcrumbs'][] = ['label' => 'Penggajian Karyawans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penggajian-karyawan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
