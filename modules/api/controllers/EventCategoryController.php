<?php
namespace app\modules\api\controllers;

use Yii;
use app\models\EventCategory;
use app\modules\api\models\EventCategoryVM;


class EventCategoryController extends ApiBaseController
{
    /*
     * @returns:  List of staffs
     */
    public function actionList()
    {
        $eventCategoriesVM = array();

        //Find Staffs
        $eventCategories = EventCategory::find()->all();

        if( count($eventCategories) > 0 ){
            foreach ( $eventCategories as $ec){

                $eventCategoryVM = new EventCategoryVM();
                $eventCategoryVM->Id = $ec->Id;
                $eventCategoryVM->Title = $ec->Title;
                $eventCategoryVM->LangId = $ec->LangId;

                // Children
                $children = EventCategory::find()
                    ->where(['ParentId' => $ec->Id])
                    ->all();

                $eventCategoryVM->children = $children;


                $eventCategoriesVM[] = $eventCategoryVM;
            }
        }
        $response = Yii::$app->response;
        $response->format = 'json';
        $response->data = $eventCategoriesVM;
        return $response;
    }


    /*
     * @return staff by Id
     */
    public function actionOne( $Id )
    {
        if( $Id ){

            //Find Staffs
            $eventCategory = EventCategory::findOne(['Id' => $Id]);

            if( $eventCategory ){

                // Convert To VM
                $eventCategoryVM = new EventCategoryVM();
                $eventCategoryVM->Id = $eventCategory->Id;
                $eventCategoryVM->Title = $eventCategory->Title;
                $eventCategoryVM->LangId = $eventCategory->LangId;

                // Children
                $children = EventCategory::find()
                    ->where(['ParentId' => $eventCategory->Id])
                    ->all();

                $eventCategoryVM->children = $children;
            }
            $response = Yii::$app->response;
            $response->format = 'json';
            $response->data = $eventCategoryVM;
        }
    }
}
