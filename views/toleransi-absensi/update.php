<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ToleransiAbsensi */

$this->title = 'Update Toleransi Absensi: ' . $model->id_tolernasi;
$this->params['breadcrumbs'][] = ['label' => 'Toleransi Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tolernasi, 'url' => ['view', 'id' => $model->id_tolernasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive toleransi-absensi-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
