<?php 
namespace app\models;


// Таблица в БД

use yii\db\ActiveRecord;

class NotesTable extends ActiveRecord{

   
 public function getKomment(){
    return $this -> hasMany (KommentTable::className(), ['parent' => 'id'] );
 }

}

?>