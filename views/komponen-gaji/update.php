<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenGaji */
$this->title = 'Update Komponen Gaji: ' . $model->id_komponen;
$this->params['breadcrumbs'][] = ['label' => 'Komponen Gaji', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_komponen, 'url' => ['view', 'id' => $model->id_komponen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="komponen-gaji-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ); ?>

</div>
