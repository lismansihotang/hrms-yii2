<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
    <head>
        <meta charset="<?php echo Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/ico" href="<?php echo yii\helpers\Url::to('@web') . '/favicon.ico'; ?>"/>
        <?php echo Html::csrfMetaTags() ?>
        <title><?php echo Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin(
                    [
                        'brandLabel' => Html::img('@web/images/pratama-logo-180.png', ['class' => 'img img-responsive', 'id' => 'img-main-login']) . ' HR - Pratama',
                        'brandUrl' => Yii::$app->homeUrl,
                        'options' => [
                            'class' => 'navbar-default navbar-fixed-top',
                        ],
                    ]
            );
            echo Nav::widget(
                    [
                        'encodeLabels' => false,
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => [
                            ['label' => '<span class="glyphicon glyphicon-home"> </span> Home', 'url' => ['/site/index']],
                            [
                                'label' => '<span class="glyphicon glyphicon-question-sign"> </span> Bantuan',
                                'url' => ['/site/about']
                            ],
                            Yii::$app->user->isGuest ? (
                                    ['label' => '<span class="glyphicon glyphicon-log-in"> </span> Login', 'url' => ['/site/login']]
                                    ) : (
                                    '<li>'
                                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                                    . Html::submitButton(
                                            'Logout (' . Yii::$app->user->identity->user_name . ')', ['class' => 'btn btn-link']
                                    )
                                    . Html::endForm()
                                    . '</li>'
                                    )
                        ],
                    ]
            );
            NavBar::end();
            ?>

            <div class="container">
                <?php
                echo Breadcrumbs::widget(
                        [
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]
                );
                echo $content;
                ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; HR - Pratama <?php echo date('Y'); ?></p>

                <p class="pull-right"><?php echo Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
