<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\NotesTable;
use app\models\KommentTable;



class ForumController extends Controller
{

    public $layout = 'basic';        //присвоен собственный шаблон оформления страницы



    public function actionDisplay()
    {

        $notes = NotesTable::find() -> with ('komment')->orderby(['id' => SORT_DESC]) -> all();

        return $this->render('display', compact('notes'));
    }
}
