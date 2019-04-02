<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuotaCuti */

$this->title = 'Update Quota Cuti: ' . $model->id_quota;
$this->params['breadcrumbs'][] = ['label' => 'Quota Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_quota, 'url' => ['view', 'id' => $model->id_quota]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive quota-cuti-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
