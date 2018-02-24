<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;


// Models
use app\models\EventCategory;
use app\models\EventCategorySearch;
use app\models\Language;
use app\models\Status;

// ViewModels
use app\viewmodels\EventCategoryViewModel;
use app\viewmodels\EventCategoryFormViewModel;

class EventCategoryController extends AdminBaseController
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

    /**
     * Event Category: List
     */
    public function actionIndex()
    {
        $searchModel = new EventCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Event Category: View
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        // ViewModel
        $vm = new EventCategoryViewModel();
        $vm->Id = $model->Id;
        $vm->Title = $model->Title;
        $vm->Status = Status::findOne($model->StatusId);
        $vm->Language = Language::findOne($model->LanguageId);
        $vm->Parent = EventCategory::findOne($model->ParentId);

        return $this->render('view', [
            'vm' => $vm
        ]);
    }


    /**
     * Event Category: Create
     */
    public function actionCreate()
    {
        // ViewModel
        $vm = new EventCategoryFormViewModel();
        $vm->model = new EventCategory();
        $vm->statuses = Status::find()->all();
        $vm->statuses = ArrayHelper::map($vm->statuses, 'Id', 'Title');
        $vm->languages = Language::find()->all();
        $vm->languages = ArrayHelper::map($vm->languages, 'Id', 'Title');
        $vm->parents = EventCategory::find()->all();
        $vm->parents = ArrayHelper::map($vm->parents, 'Id', 'Title');

        // Post action
        if ($vm->model->load(Yii::$app->request->post())) {
            $vm->model->ParentId =  $vm->model->ParentId ?  $vm->model->ParentId : 0;

            $vm->model->save();
            return $this->redirect(['view', 'id' => $vm->model->Id]);
        }

        return $this->render('create', [
            'vm' => $vm
        ]);
    }


    /**
     * Event Category: Update
     */
    public function actionUpdate($id)
    {
        // load model
        $model = $this->findModel($id);

        //ViewModel
        $vm = new EventCategoryFormViewModel();
        $vm->model = $model;
        $vm->statuses = Status::find()->all();
        $vm->statuses = ArrayHelper::map($vm->statuses, 'Id', 'Title');
        $vm->languages = Language::find()->all();
        $vm->languages = ArrayHelper::map($vm->languages, 'Id', 'Title');
        $vm->parents = EventCategory::find()->all();
        $vm->parents = ArrayHelper::map($vm->parents, 'Id', 'Title');

        if ($vm->model->load(Yii::$app->request->post()))
        {
            $vm->model->ParentId =  $model->ParentId ?  $vm->model->ParentId : 0;
            $vm->model->save();

            return $this->redirect(['view', 'id' => $vm->model->Id]);
        }

        return $this->render('update', [
            'vm' => $vm
        ]);
    }

    /**
     * Event Category: Delete
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Event Category: Find one
     */
    protected function findModel($id)
    {
        if (($model = EventCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

