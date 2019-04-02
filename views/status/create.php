<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Status */

$this->title = 'Create Status';
$this->params['breadcrumbs'][] = ['label' => 'Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive status-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
