<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisIdentitas */

$this->title = 'Update Jenis Identitas: ' . $model->id_jenis_identitas;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Identitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis_identitas, 'url' => ['view', 'id' => $model->id_jenis_identitas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive jenis-identitas-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php
    echo $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
