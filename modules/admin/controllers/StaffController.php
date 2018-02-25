<?php
namespace app\modules\admin\controllers;
use app\models\Language;
use app\models\StaffPosition;
use app\models\StaffType;
use app\models\Status;
use app\viewmodels\StaffFormViewModel;
use Symfony\Component\Finder\Tests\FinderTest;
use Yii;
use app\models\Staff;
use app\models\StaffSearch;
use yii\web\NotFoundHttpException;

class StaffController extends AdminBaseController
{
    /**
     * Staff: List
     */
    public function actionIndex()
    {
        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Staff: View
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Staff: Create
     */
    public function actionCreate()
    {
        $vm = new StaffFormViewModel();
        $vm->model = new Staff();

        $vm->statuses = Status::getStatusList();
        $vm->staffTypes = StaffType::getStaffTypeList();
        $vm->languages = Language::getLanguageList();
        $vm->staffPositions = StaffPosition::getStaffPositionList();



        if ($vm->model->load(Yii::$app->request->post())) {

            if( $vm->model->validate() ){
                $vm->model->save();

                return $this->redirect(['view', 'id' => $vm->model->Id]);
            }
        } else {
            return $this->render('create', [
                'vm' => $vm,
            ]);
        }
    }

    /**
     * Staff: Update
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Staff: Delete
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Staff: Find one
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
