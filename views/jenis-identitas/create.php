<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisIdentitas */

$this->title = 'Create Jenis Identitas';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Identitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive jenis-identitas-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
