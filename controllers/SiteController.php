<?php

namespace app\controllers;

use app\models\Tasks;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 *
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
     * Отображает домашнюю страницу.
     *
     * @return string
     */
    public function actionIndex()
    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => Tasks::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
//        ]);

        $model = Tasks::find()->asArray()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

//    public function beforeAction($action)
//    {
//        $this->enableCsrfValidation = false;
//        return parent::beforeAction($action);
//    }

    /**
     * @return void
     */
    public function actionRenderData()
    {
        if (\Yii::$app->request->isAjax) {
        $this->layout = '@app/views/layouts/blank';
        $model = Tasks::find()->asArray()->all();
//            echo "<pre>";
//            print_r($data);
//            die();
            return $this->render('_chart_ajax',[
//            return $this->renderPartial('_chart',[
                'model' => $model
            ]);
        } else {
            echo "<pre>";
            print_r('ошибка');
            die();
        }
    }


    /**
     * Отображает страницу "О компании".
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
