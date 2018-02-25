<?php
namespace app\modules\admin\controllers;
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
        $model = new Staff();

        if ($model->load(Yii::$app->request->post())) {

            if( $model->validate() ){
                $model->save();

                return $this->redirect(['view', 'id' => $model->Id]);
            }


        } else {
            return $this->render('create', [
                'model' => $model,
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
