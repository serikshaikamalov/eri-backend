<?php

if(YII_ENV  == 'dev'){
    $connectionString[dsn] = 'mysql:host=localhost;dbname=yii2basic';
    $connectionString[username] = 'root';
    $connectionString[password] = '';
}else{
    $connectionString[dsn] = 'mysql:host=srv-pleskdb34.ps.kz;dbname=gosmartk_eri';
    $connectionString[username] = 'gosma_admin';
    $connectionString[password] = 'Admin_123';
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => $connectionString[dsn],
    'username' => $connectionString[username],
    'password' => $connectionString[password],
    'charset' => 'utf8'
];