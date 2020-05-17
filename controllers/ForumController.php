<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\NotesTable;
use app\models\NoteForm;
use app\models\KommentTable;
use app\models\KommentForm;
use yii\web\Request;



class ForumController extends Controller
{

    public $layout = 'basic';        //присвоен собственный шаблон оформления страницы


    //отображение всех новостей
    public function actionDisplay()
    {

        $notes = NotesTable::find()->with('komment')->orderby(['id' => SORT_DESC])->all();   //создаем массив всех записей таблицы БД с сортировкой

        return $this->render('display', compact('notes'));
    }

    //добавление комментария к выбранной новости
    public function actionIndex($parent = false)
    {



        $komment = new KommentForm();     //создание объекта формы KommentForm
        $komment->parent = $parent;       //присвоение id родителя полю parent
        $komment->save();           //запись комментария в БД


        //Проверка, того, что форма заполнена, и письмо отправлено на почту администраротоа

        if ($komment->load(Yii::$app->request->post()) &&  $komment->validate()) {

            if ($komment->save() && $komment->contact(Yii::$app->params['adminEmail'])) {

                YII::$app->session->setFlash('success', 'Спасибо, ' . $komment['name'] . ', за ваш комментарий!');
                sleep(0.5);
                $this->redirect(['display']);
            } else {
                YII::$app->session->setFlash('error', 'Ошибка при отправке!');
            }
        }




        return $this->render('index', compact('komment'));      //Передаем данные из контроллера

    }



    //Функция капчи

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
