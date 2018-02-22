<?php

namespace app\modules\admin\controllers;
use \yii\web\Controller;
use app\models\EventCategory;

class AdminBaseController extends  Controller{


    /*
     * Event Categories: List
     */
    public function loadEventCategories(){
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
        return $eventCategoriesVM;
    }

    /*
     * Languages
     */
    public function loadLanguages(){
        $languages = [];
        $languages[1] = 'English';
        $languages[2] = 'Turkish';
        $languages[3] = 'Russian';
        $languages[4] = 'Kazakh';
        return $languages;
    }

    /*
     * Language
     */
    public function loadLanguage( $id = null ){
        $languageTitle = '';

        if( !$id || $id != null ){
            $languages = Helper::getLanguageList();
            $languageTitle = $languages[ $id ];
        }

        return $languageTitle;
    }


    public function loadStatuses(){
        $statuses = [];
        $statuses[1] = 'Publish';
        $statuses[2] = 'Unpublish';
        return $statuses;
    }


}