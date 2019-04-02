<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\icons\Icon;

$this->title = 'Login ::: HR - Pratama';
Icon::map($this);
?>
<div class="site-login">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-1 col-xs-1-custom text-right no-padding-left no-padding-right">
                    <?php
                    echo Icon::showStack(
                            'user', 'circle', ['class' => 'fa-lg'], ['class' => 'fa-inverse']
                    );
                    ?>
                </div>
                <div class="col-xs-4">
                    <span class="font-24"><span class="font-10 block">Panel Admin</span><?php echo Html::encode($this->title) ?></span>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <p class="error-summary">Please fill out the following fields to login:</p>

            <?php
            $form = ActiveForm::begin(
                            [
                                'id' => 'login-form',
                                'options' => ['class' => 'form-horizontal'],
                                'fieldConfig' => [
                                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                                ],
                            ]
            );
            echo $form->field($model, 'username')->textInput(['autofocus' => true]);
            echo $form->field($model, 'password')->passwordInput();
            echo $form->field($model, 'rememberMe')->checkbox(
                    [
                        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ]
            );
            ?>
        </div>
        <div class="panel-footer">
            <?php echo Html::submitButton('<span class="glyphicon btn-glyphicon glyphicon-log-in img-circle text-muted"></span>Login', ['class' => 'btn icon-btn btn-default', 'name' => 'login-button']);
            ActiveForm::end();
            ?>
        </div>
    </div>
</div>
