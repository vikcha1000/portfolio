
<!-- Представление страницы для редактирования и удаления записей -->

<?php 
use app\assets\AppAsset;
	use yii\helpers\Html;
	use yii\helpers\CHtml;
	use yii\widgets\ActiveForm;
	use app\models\NoteForm;
  use yii\helpers\Url;
?>

<?php $this->beginPage() ?>


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <style type="text/css">
    .my_modal{position:fixed;top:0;right:0;bottom:0;left:0;background:rgba(0,0,0,0.5);z-index:1050;display:none;margin:0;padding:0;}.my_modal:target{display:block;overflow-y:auto;}.my_modal-dialog{position:relative;width:auto;margin:10px;}@media (min-width:576px){.my_modal-dialog{max-width:460px;margin:30px auto;}}.my_modal-content{position:relative;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid rgba(0,0,0,.2);border-radius:6px;outline:0;}@media (min-width:768px){.my_modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5);}}.my_modal-header{display:block;padding:14px 14px 4px;}.my_modal-title{margin-top:0;margin-bottom:0;line-height:1.5;font-size:1.25rem;font-weight:500;border-bottom:1px solid #d4d4d4;}.close{padding:1px 5px 0;border:1px solid #000;border-radius:50%;font-family:sans-serif;font-size:24px;font-weight:700;line-height:1;color:#000;text-shadow:0 1px 0 #fff;opacity:.5;text-decoration:none;top:4px;right:4px;position:absolute;}.close:focus,.close:hover{color:#000;text-decoration:none;cursor:pointer;opacity:.75;}.my_modal-body{position:relative;-webkit-box-flex:1;-webkit-flex:1 1 auto;-ms-flex:1 1 auto;flex:1 1 auto;padding:15px;overflow:auto;}
  </style>

</head>
<body>

<?php $this->head() ?>

<h1>Добро пожаловать в Панель Администратора</h1>
<br>
<h3>Создавать, размещать и редактировать Ваши новости очень просто!</h3>

	<!-- Список страниц, на которые можно перейти -->

<div class = "wrap">
<div class = "container">
<ul class ="nav nav-pills">
	<li role = "presentation" class = "active"><?= Html::a('Создать новую новость',['/admin/create'])?></a></li>
	<li role = "presentation"><?= Html::a('Редактирование существующих новостей',['/admin/list'])?></a></li>
</ul>
</div>
</div>

<h1>Все ваши новости</h1>




<?php foreach ($cats as $cat) { ?>

	<!-- Вывод всех записей в цикле -->

<p><?php echo $cat->id; ?></p>
<p><?php echo $cat->title; ?></p>
<p><?php echo $cat->data; ?></p>
<p><?php echo $cat->description; ?></p>


<!-- Ссылка на функции в контроллере, которые выполняют удаление и редактирование записей -->

<b><? echo Html::a('Удалить', Url::to(['admin/delete', 'id' => $cat->id])) ?></b>

<br>

<b><? echo Html::a('Редактировать запись', Url::to(['admin/edit', 'id' => $cat->id, 'title' => $cat->title, 'description' => $cat->description])) ?></b>

<br><br><br>

<?php } ?>
 

</body>
</html>
<?php $this->endPage() ?>