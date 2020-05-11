
<!-- Представление страницы для создания записей -->

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
	<h1>Добро пожаловать в Панель Администратора</h1>
<br>
<h3>Создавать, размещать и редактировать Ваши новости очень просто!</h3>

</head>

<body>
	
	<!-- Список страниц, на которые можно перейти -->

<div class = "wrap">
<div class = "container">
<ul class ="nav nav-pills">
	<li role = "presentation" class = "active"><?= Html::a('Создать новую новость',['/admin/create'])?></a></li>
	<li role = "presentation"><?= Html::a('Редактирование существующих новостей',['/admin/list'])?></a></li>
</ul>
</div>
</div>


<h4>Создать</h4>

<!-- офрмление формы -->

<?php $form = ActiveForm::begin(); ?>

<div class="row">
	<div class = "col-md-6">
		<?= $form->field($note, 'title')->textInput() ->label('Название') ?>
	</div>
	<div class = "col-md-6">
		<?= $form->field($note, 'description')->textInput() ->label('Описание')-> textarea(['rows' => 5]) ?>
	</div>
	<div class = "col-md-12">
		<?= HTML::SubmitButton ('Добавить', ['class'=> 'btn btn-succsess']) ?>
	</div>
</div>

<?php ActiveForm::end(); ?>




</body>
</html>
<?php $this->endPage() ?>