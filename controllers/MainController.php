<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\KommentForm;
use yii\web\Request;

// Контроллер для формы оставления комментария с отправкой комментария на почту администратора и валидацией формы 

class MainController extends Controller{

	public $layout='basic';			//присвоен собственный шаблон оформления страницы





	public function actionIndex(){     //добавлен View Index для данного контроллера

 
        	
		$komment = new KommentForm(); 	//создание объекта формы KommentForm

		//Проверка, того, что форма заполнена, и письмо отправлено на почту администраротоа

		if ($komment->load (Yii::$app->request->post())){ 

		  	if($komment->contact(Yii::$app->params['adminEmail'])){
		        
        		YII::$app->session->setFlash('success', 'Спасибо, '.$komment[name]. ', за ваш комментарий!');

        		return $this->refresh();
				return $this->render('index', compact('komment'),'contact');
        		
        		        		
        	} else {
				YII::$app->session->setFlash('error', 'Ошибка при отправке!');
				return $this->render('index', compact('komment'));
       				}
       		
		}
	
       	return $this->render('index', compact('komment'));      //Передаем данные из контроллера

	}



	//Функция 

	public function actions()
	{
		return [
			'captcha' => [
			'class' => 'app\components\MathCaptchaAction',
			'minLength' => 1,
			'maxLength' => 10,
			],
		];
	}

  

}
