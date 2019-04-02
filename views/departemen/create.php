<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Departemen */

$this->title = 'Create Departemen';
$this->params['breadcrumbs'][] = ['label' => 'Departemen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive departemen-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
