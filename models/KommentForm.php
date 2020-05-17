<?php
namespace app\models;
use yii\base\Model;
use Yii;
use yii\captcha\Captcha;
use yii\db\ActiveRecord;

// Создание формы KommentForm, правила валидации и функция отправки данных на почту администратора 


class KommentForm extends ActiveRecord{


   public $verifyCode;


    public static function tableName()
    {
        return 'komment_table';
    }

 
   
 /* функция валидации полей формы */
	public function rules(){

		return[
			[['name', 'email', 'text'], 'required', 'message' => 'Поле обязательно!'],
			['name', 'string', 'min'=> 2, 'tooShort'=> 'Слишком короткое Имя, минимум 2 символа!'],
			['name', 'string', 'max' => 10, 'tooLong' => 'Имя слишком длинное, максимум 10 символов!'],
			['email', 'email'],
			['phone', 'safe'],
		   ['verifyCode', 'captcha', 'skipOnEmpty' => !Captcha::checkRequirements(), 'message' => 'Код с картинки введен неверно!'],
			['text', 'trim'],
		];
}



 /* функция отправки письма на почту */
    public function contact($e_mail)
    {
        /* Проверяем форму на валидацию */
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($e_mail)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject('Письмо с комментарием от '.$this->name)
                ->setTextBody('Комментарий: "'.$this->text. '" '. "\n". 'Телефон комментатора: '. $this->phone)
                ->send();

            return true;
        }
        return false;
    }
}


