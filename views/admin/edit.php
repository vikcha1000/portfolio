
<!-- Представление страницы для редактирования записей -->

<?php
 use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $this->beginPage() ?>

<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $this->title ?></title>
	<?php $this->head() ?>



</head>

<body>
	
<br>
<h3>Отредактируйте вашу запись!</h3>

<h4>Редактировать запись</h4>

<!-- офрмление формы -->

<?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class = "col-md-6">
		<?= $form->field($cat, 'title')->textInput() ->label('Название') ?>
	</div>
	<div class = "col-md-6">
		<?= $form->field($cat, 'description')->textInput() ->label('Описание')-> textarea(['rows' => 5]) ?>
	</div>
	<div class = "col-md-12">
		<?= HTML::SubmitButton ('Сохранить изменения', ['class'=> 'btn btn-succsess']) ?>
	</div>
</div>

<?php ActiveForm::end(); ?>




</body>
</html>
<?php $this->endPage() ?>