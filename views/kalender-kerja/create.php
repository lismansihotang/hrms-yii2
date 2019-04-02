<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KalenderKerja */

$this->title = 'Create Kalender Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Kalender Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive kalender-kerja-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
