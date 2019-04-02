<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perusahaan */
$this->title = 'Create Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Perusahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perusahaan-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ); ?>

</div>
