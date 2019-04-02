<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HubunganKeluarga */

$this->title = 'Update Hubungan Keluarga: ' . $model->id_hub_keluarga;
$this->params['breadcrumbs'][] = ['label' => 'Hubungan Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hub_keluarga, 'url' => ['view', 'id' => $model->id_hub_keluarga]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive hubungan-keluarga-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
