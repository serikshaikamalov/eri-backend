<?php
namespace app\modules\admin\controllers;
use Yii;
use app\models\Events;
use app\models\EventsSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class EventController extends AdminBaseController
{

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

   /*
    * Event: List
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

    /*
     * Event: View
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /*
     * Event: Create
     */
    public function actionCreate()
    {
        $model = new Events();

        if ($model->load(Yii::$app->request->post())) {

            $model->StartDay = date('Y-m-d', strtotime($model->StartDay));
            $model->CreatedDate = date('Y-m-d H:i:s');
            $model->UpdatedDate = date('Y-m-d H:i:s');
            $model->CreatedBy = Yii::$app->user->id;

            $model->save();
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('create', [
            'model' => $model,
            'eventCategoriesVM' => $this->loadEventCategories(),
            'languages' => $this->loadLanguages(),
            'statuses' => $this->loadStatuses()
        ]);
    }



    /*
     * Event: Update
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->UpdatedDate = date('Y-m-d H:i:s');

            $model->save();
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('update', [
            'model' => $model,
            'eventCategoriesVM' => $this->loadEventCategories(),
            'languages' => $this->loadLanguages(),
            'statuses' => $this->loadStatuses()    
        ]);
    }

    /*
     * Event: Delete
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /*
     * Event: Find one
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}