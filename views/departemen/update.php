<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departemen */

$this->title = 'Update Departemen: ' . $model->id_dept;
$this->params['breadcrumbs'][] = ['label' => 'Departemen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dept, 'url' => ['view', 'id' => $model->id_dept]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive departemen-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
