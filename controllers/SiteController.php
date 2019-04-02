<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Karyawan;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'login', 'index', 'about'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'logout'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $modelKaryawan = new Karyawan();
        $countKaryawan = $modelKaryawan->find()->where('id_status IN("2","3","4")')->count();
        $countMagang = $modelKaryawan->find()->where(['id_status' => '1'])->count();
        $countPKL = $modelKaryawan->find()->where(['id_status' => '9'])->count();
        $countNonKaryawan = $modelKaryawan->find()->where(['id_status' => '8'])->count();
        $countNonAktif = $modelKaryawan->find()->where('id_status IN("5","6","7")')->count();
        $modelPenggajian = new \app\models\Penggajian();
        $countPenggajian = $modelPenggajian->find()->count();
        $modelAbsensi = new \app\models\Absensi();
        $countAbsensiCuti = $modelAbsensi->find()->where(['id_tipe_absensi' => '3'])->count();
        $modelAllAbsensi = new \app\models\LogAbsensi();
        $countLogAbsensi = $modelAllAbsensi->find()->count();
        return $this->render(
            'index',
            [
                'countKaryawan' => $countKaryawan,
                'countPenggajian' => $countPenggajian,
                'countAbsensiCuti' => $countAbsensiCuti,
                'countLogAbsensi' => $countLogAbsensi,
                'countMagang' => $countMagang,
                'countPKL' => $countPKL,
                'countNonKaryawan' => $countNonKaryawan,
                'countNonAktif' => $countNonAktif
            ]
        );
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = 'main-login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render(
            'login',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render(
            'contact',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
