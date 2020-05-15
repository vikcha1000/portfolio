<?php 
namespace app\models;


// Таблица в БД

use yii\db\ActiveRecord;

class KommentTable extends ActiveRecord{

 public static function tableName()
 {
     return 'komment_table';
 }
 
/* public function getNotes(){
    return $this -> hasOne (NotesTable::className(), ['id' => 'parent'] );
 }*/

}
