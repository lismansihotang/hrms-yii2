<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKomponen */

$this->title = 'Update Penggajian Komponen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penggajian Komponen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penggajian-komponen-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
