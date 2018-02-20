<?php
namespace app\modules\admin\controllers;
use Yii;
use app\models\EventCategory;
use app\models\EventCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class EventCategoryController extends Controller
{
    public $sidebar;

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
     * Lists all EventCategory models.
     * @return mixed
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
     * Displays a single EventCategory model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $eventCategories = $this->getEventCategories();

        $parentCategoryTitle = '';
        if( $eventCategories && count($eventCategories) > 0 ){
            $parentCategoryIndex = array_search( $model->ParentId,  $eventCategories);

            if( $model->ParentId == 0){
                $parentCategoryTitle = 'NONE';
            }else{
                $parentCategoryTitle = $eventCategories[$parentCategoryIndex]->Title;
            }

        }

        return $this->render('view', [
            'model' => $model,
            'parentCategoryTitle' => $parentCategoryTitle
        ]);
    }


    /*
     * @return language list
     */
    public function getLanguageList(){
        $languages = [];
        $languages[1] = 'English';
        $languages[2] = 'Turkish';
        $languages[3] = 'Russian';
        $languages[4] = 'Kazakh';
        return $languages;
    }
    
    
    public function getLanguageNameById( $id = null ){
        $languageTitle = null;
        
        if( !$id ){
        }
        
    }


    public function actionCreate()
    {
        // load eventCategories
        $eventCategories = $this->getEventCategories();

        // init dropDownlist
        $eventCategoriesDropdownList = $this->getEventCategoryDropdownList($eventCategories);

        $model = new EventCategory();

        // Post action
        if ($model->load(Yii::$app->request->post())) {
            $model->ParentId =  $model->ParentId ?  $model->ParentId : 0;

            $model->save();
            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('create', [
            'model' => $model,
            'eventCategoriesDropdownList' => $eventCategoriesDropdownList
        ]);
    }



    // load all categories
    public function getEventCategories(){

        return EventCategory::find()
            ->select(['Id', 'Title', 'LangId'])
            ->where(['IsActive' => 1])
            ->all();
    }

    public function getEventCategoryDropdownList( $items = [] ){
        $result = [];

        if( $items && count($items) > 0 ){
            foreach( $items as $item ){
                $result[$item->Id] = Helper::getLanguageNameById($item->LangId) .'-'.$item->Title;
            }
        }
        return $result;
    }


    /**
     * Updates an existing EventCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // load eventCategories
        $eventCategories = $this->getEventCategories();
        
        // init dropDownlist
        $eventCategoriesDropdownList = $this->getEventCategoryDropdownList($eventCategories);


        if ($model->load(Yii::$app->request->post())) {
            $model->ParentId =  $model->ParentId ?  $model->ParentId : 0;
            $model->save();

            return $this->redirect(['view', 'id' => $model->Id]);
        }

        return $this->render('update', [
            'model' => $model,
            'eventCategoriesDropdownList' => $eventCategoriesDropdownList
        ]);
    }

    /**
     * Deletes an existing EventCategory model.
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
     * Finds the EventCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EventCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EventCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
