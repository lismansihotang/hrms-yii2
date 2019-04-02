<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AbsensiSummary */

$this->title = 'Update Absensi Summary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Absensi Summary', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="absensi-summary-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
