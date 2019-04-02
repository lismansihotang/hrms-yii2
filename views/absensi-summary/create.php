<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AbsensiSummary */

$this->title = 'Create Absensi Summary';
$this->params['breadcrumbs'][] = ['label' => 'Absensi Summary', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-summary-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
