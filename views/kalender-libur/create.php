<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KalenderLibur */

$this->title = 'Create Kalender Libur';
$this->params['breadcrumbs'][] = ['label' => 'Kalender Libur', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive kalender-libur-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
