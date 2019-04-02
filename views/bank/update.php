<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Update Bank: ' . $model->id_bank;
$this->params['breadcrumbs'][] = ['label' => 'Bank', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bank, 'url' => ['view', 'id' => $model->id_bank]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive bank-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
