<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Penggajian */

$this->title = 'Create Penggajian';
$this->params['breadcrumbs'][] = ['label' => 'Penggajian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penggajian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
