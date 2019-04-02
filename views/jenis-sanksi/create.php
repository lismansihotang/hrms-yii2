<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisSanksi */

$this->title = 'Create Jenis Sanksi';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Sanksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive jenis-sanksi-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
