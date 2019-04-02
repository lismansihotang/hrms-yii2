<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuotaCuti */

$this->title = 'Create Quota Cuti';
$this->params['breadcrumbs'][] = ['label' => 'Quota Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive quota-cuti-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
