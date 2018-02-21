<?php

namespace app\modules\admin\controllers;

use app\models\EventCategory;
use Yii;
use app\models\Events;
use app\models\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventController implements the CRUD actions for Events model.
 */
class EventController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Events();


        $eventCategories = EventCategory::find()
            ->select(['Id', 'Title'])
            ->all();

        // Convert to VM
        $eventCategoriesVM = [];
        if( $eventCategories && count( $eventCategories ) > 0 ){
            foreach ( $eventCategories as $eventCategory ){
                $eventCategoriesVM[ $eventCategory->Id ] = $eventCategory->Title;
            }
        }




        if ($model->load(Yii::$app->request->post())) {

            $model->save();

            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('create', [
            'model' => $model,
            'eventCategoriesVM' => $eventCategoriesVM
        ]);
    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $eventCategories = EventCategory::find()
            ->select(['Id', 'Title'])
            ->all();

        // Convert to VM
        $eventCategoriesVM = [];
        if( $eventCategories && count( $eventCategories ) > 0 ){
            foreach ( $eventCategories as $eventCategory ){
                $eventCategoriesVM[ $eventCategory->Id ] = $eventCategory->Title;
            }
        }



        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('update', [
            'model' => $model,
            'eventCategoriesVM' => $eventCategoriesVM
        ]);
    }

    /**
     * Deletes an existing Events model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
