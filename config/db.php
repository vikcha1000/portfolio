<?php

/*Подключение моей БД*/

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=news',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
;