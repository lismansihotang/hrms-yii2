<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipeCuti */
$this->title = $model->id_tipe_cuti;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-cuti-view">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <div class="btn-group margin-bottom-5">
        <?= Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_tipe_cuti], ['class' => 'btn btn-sm btn-primary']) ?>
        <?= Html::a(
            'Delete',
            ['delete', 'id' => $model->id_tipe_cuti],
            [
                'class' => 'btn btn-sm btn-danger',
                'data'  => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method'  => 'post',
                ],
            ]
        ) ?>
    </div>

    <?= DetailView::widget(
        [
            'model'      => $model,
            'attributes' => [
                'id_tipe_cuti',
                'nm_tipe_cuti',
                'jatah_cuti',
            ],
        ]
    ) ?>

</div>
