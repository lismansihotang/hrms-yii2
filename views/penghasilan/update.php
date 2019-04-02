<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penghasilan */

$this->title = 'Update Penghasilan: ' . $model->id_penghasilan;
$this->params['breadcrumbs'][] = ['label' => 'Penghasilan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_penghasilan, 'url' => ['view', 'id' => $model->id_penghasilan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive penghasilan-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
