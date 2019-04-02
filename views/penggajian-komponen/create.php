<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKomponen */

$this->title = 'Create Penggajian Komponen';
$this->params['breadcrumbs'][] = ['label' => 'Penggajian Komponen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penggajian-komponen-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
