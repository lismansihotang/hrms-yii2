<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HubunganKeluarga */

$this->title = 'Create Hubungan Keluarga';
$this->params['breadcrumbs'][] = ['label' => 'Hubungan Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive hubungan-keluarga-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
