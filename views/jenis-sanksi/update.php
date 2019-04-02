<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisSanksi */

$this->title = 'Update Jenis Sanksi: ' . $model->id_jenis_sanksi;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Sanksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis_sanksi, 'url' => ['view', 'id' => $model->id_jenis_sanksi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive jenis-sanksi-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
