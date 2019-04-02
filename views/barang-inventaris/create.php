<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BarangInventaris */

$this->title = 'Create Barang Inventaris';
$this->params['breadcrumbs'][] = ['label' => 'Barang Inventaris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive barang-inventaris-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
