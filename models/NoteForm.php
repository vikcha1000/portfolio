
<!-- Создание формы NoteForm, которая вносит данные в БД -->

<?php
namespace app\models;
use yii\db\ActiveRecord;


class NoteForm extends ActiveRecord{

	public static function tableName() {
	 	return 'notes_table';
	}

 /* функция валидации полей формы */
	public function rules(){
		return[
			[['title', 'description'], 'required', 'message' => 'Поле обязательно!'],
			[['title', 'description'], 'trim'],
		];
	}


}