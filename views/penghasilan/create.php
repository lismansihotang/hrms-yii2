<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Penghasilan */

$this->title = 'Create Penghasilan';
$this->params['breadcrumbs'][] = ['label' => 'Penghasilan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive penghasilan-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
