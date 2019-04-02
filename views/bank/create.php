<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Create Bank';
$this->params['breadcrumbs'][] = ['label' => 'Bank', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive bank-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
