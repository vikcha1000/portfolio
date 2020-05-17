
<!-- Создание представления  -->

<?php 
use yii\widgets\ActiveForm;
use yii\helpers\HTML;
use yii\captcha\Captcha;
?>

<h1>Оставьте свой комментарий </h1>
<br>




<!-- Оформление формы-->

<?php $form = ActiveForm::begin() ?>
<?= $form -> field ($komment, 'name') -> label ('Введите ваше имя') ?>
<?= $form -> field ($komment, 'email') -> label ('Введите e-mail') -> input ('email')?>
<?= $form -> field ($komment, 'phone') -> label ('Введите номер телефона') -> input('phone')-> widget(\yii\widgets\MaskedInput::className(), ['mask' => '+7 999-999-9999']) ?>
<?= $form -> field ($komment, 'text') -> textarea(['rows' => 5]) -> label ('Введите комментарий') ?>



<?php if (Captcha::checkRequirements()):  ?>
 	<div class="control-group">

 	<?= Captcha::widget ([
 			'model' => $komment,
 			'attribute' => 'verifyCode',
 			'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-7">{input}</div></div>'
 	]); ?>

	<br>
 	<?php echo Html::error($komment, 'verifyCode') ?>
 	</div>

 <?php endif; ?>
  
<br>

<?= Html::submitButton('Отправить' , ['class' => 'btn btn-success']) ?>

<?php $form = ActiveForm::end(); ?>