<?php

namespace app\controllers;

use app\models\Tasks;
use app\models\TasksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TasksController реализует модель CRUD-действий для задач.
 */
class TasksController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['post'],
                    ],
                ],

            ]
        );
    }

    /**
     * Содержит список всех задач.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Отображает единую задачу.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException если модель не может быть найдена
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Создает новую модель задач.
     * Если создание прошло успешно, браузер будет перенаправлен на страницу "index".
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tasks();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                \Yii::$app->session->setFlash('success', 'Задача успешно создана!');
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Обновляет новую модель задач.
     * Если обновление прошло успешно, браузер будет перенаправлен на страницу "index".
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException если модель не может быть найдена
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Задача успешно сохранена!');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Удаляет существующую задачу.
     * Если удаление прошло успешно, браузер будет перенаправлен на страницу "index".
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException если модель не может быть найдена
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        \Yii::$app->session->setFlash('success', 'Задача удалена!');
        return $this->redirect(['index']);
    }

    public function actionRemove($id)
    {
        $this->findModel($id)->delete();
        \Yii::$app->session->setFlash('success', 'Задача удалена!');
        return $this->redirect(['index']);
    }

    /**
     * Находит модель задач на основе значения ее первичного ключа.
     * Если модель не найдена, будет выдано HTTP-исключение 404.
     * @param int $id ID
     * @return Tasks загруженная модель
     * @throws NotFoundHttpException если модель не может быть найдена
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }
}
