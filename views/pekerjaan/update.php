<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pekerjaan */

$this->title = 'Update Pekerjaan: ' . $model->id_pekerjaan;
$this->params['breadcrumbs'][] = ['label' => 'Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pekerjaan, 'url' => ['view', 'id' => $model->id_pekerjaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive pekerjaan-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
