<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KomponenGaji */

$this->title = 'Create Komponen Gaji';
$this->params['breadcrumbs'][] = ['label' => 'Komponen Gaji', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komponen-gaji-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
