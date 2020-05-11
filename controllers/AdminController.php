<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;
use app\models\NoteForm;
use app\models\NotesTable;


/*Контроллер прототипа Панели Администратора. 
Есть возможность создавать новости для свего портала. Новости заносятся в базу данных
Есть возможность редактировать и удалять новости из базы данных
*/


class AdminController extends Controller{


	public $layout='basic';		//присвоен собственный шаблон оформления страницы



 	public function actionCreate(){				//добавлен View Create для данного контроллера: возможность создавать новости с занесение их в базу данных

		$this->view->registerCssFile('@web/css/admin.css');  //подключение CSS стилей на старницу

		$note = new NoteForm();				//создание объекта формы NoteForm
		$note->data = date('Y.m.d');		//Полю дата присваем сегодняшнее число
		$note->save();						//запись в базу данных


		//Проверка валидации формы и записи ее в БД.
		if ( $note ->load (Yii::$app->request->post()) ){
			if( $note->validate() && $note->save() ) {
				Yii::$app->session->setFlash('success', 'Данные приняты');
				return $this->refresh();
			} else {
				Yii::$app->session->setFlash('error', 'Ошибка');
			}
		}


		return $this-> render('create', compact('note'));				//Передаем данные из контроллера
	 }


	public function actionList(){    //добавлен View List для данного контроллера


		$this->view->registerCssFile('@web/css/admin.css');   //подключение CSS стилей на старницу

		$cats = NotesTable::find()->limit(10)->orderby(['id' => SORT_DESC])->all();		//создаем массив всех записей таблицы БД с сортировкой

		return $this-> render ('list', compact('cats'), ['notes' => $note] );			//Передаем данные из контроллера


	}


	//Функция удаления записи из таблицы
	public function actionDelete($id = false)
	    {
	        if (isset($id)) {
	            if (NotesTable::deleteAll(['in', 'id', $id])) {
	                $this->redirect(['list']);
	            }
	        } else {
	            $this->redirect(['list']);
	        }
	    }



	//Функция редактирования записи из таблицы
	public function actionEdit($id= false, $title= false, $description= false){

		$this->view->registerCssFile('@web/css/admin.css');


		$cat = NoteForm::findOne($id);		//Присвоение массиву значения записи с нужных id

		//занесние в форму следующих данных. После редактирование запись в БД сохраняется с новыми данными

		$cat->data = date('Y.m.d');
		$cat->title = $title;
		$cat->description = $description;
		$cat->save();

		//Проверка валидации формы и записи ее в БД.

		if ( $cat ->load (Yii::$app->request->post()) ){
			if( $cat->validate() && $cat->save() ) {
				Yii::$app->session->setFlash('success', 'Данные приняты');
				$this->redirect(['list']);
			} else {
				Yii::$app->session->setFlash('error', 'Ошибка');
			}
		}


	 return $this-> render('edit', compact('cat')); //Передаем данные из контроллера
	 }



}



