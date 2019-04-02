<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipeShift */

$this->title = $model->id_tipe_shift;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Shift', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-shift-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <div class="btn-group">
        <?= Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_tipe_shift], ['class' => 'btn btn-sm btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tipe_shift], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        </div>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tipe_shift',
            'nm_shift',
        ],
    ]) ?>

</div>
