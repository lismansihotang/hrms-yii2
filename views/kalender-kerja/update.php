<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KalenderKerja */

$this->title = 'Update Kalender Kerja: ' . $model->id_kalender;
$this->params['breadcrumbs'][] = ['label' => 'Kalender Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kalender, 'url' => ['view', 'id' => $model->id_kalender]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive kalender-kerja-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
