<?php

if(YII_ENV  == 'dev'){
    $connectionString[dsn] = 'mysql:host=localhost;dbname=eri';
    $connectionString[username] = 'root';
    $connectionString[password] = '';
}else{
    $connectionString[dsn] = 'mysql:host=localhost;dbname=yii2basic';
    $connectionString[username] = 'ERIAdmin';
    $connectionString[password] = 'Admin_123';
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => $connectionString[dsn],
    'username' => $connectionString[username],
    'password' => $connectionString[password],
    'charset' => 'utf8'
];