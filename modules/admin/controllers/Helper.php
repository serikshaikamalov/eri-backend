<?php
namespace app\modules\admin\controllers;

class Helper{

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
        $languageTitle = '';

        if( !$id || $id != null ){
            $languages = Helper::getLanguageList();
            $languageTitle = $languages[ $id ];
        }

        return $languageTitle;
    }
    
    
    public function getStatusNameById( $Id ){
        $items = [ 0 => 'False', 1 => 'True' ];
        return $items[$Id];
    }


}


