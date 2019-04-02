<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ToleransiAbsensi */

$this->title = 'Create Toleransi Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Toleransi Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive toleransi-absensi-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
