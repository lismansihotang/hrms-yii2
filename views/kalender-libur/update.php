<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KalenderLibur */

$this->title = 'Update Kalender Libur: ' . $model->id_kalender_libur;
$this->params['breadcrumbs'][] = ['label' => 'Kalender Libur', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kalender_libur, 'url' => ['view', 'id' => $model->id_kalender_libur]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive kalender-libur-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
