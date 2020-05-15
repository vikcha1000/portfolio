<?php
use app\assets\AppAsset;
use yii\helpers\Html;
?>


<!doctype html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <h1>Добро пожаловать в новостной портал!</h1>
<br>
    <h3>Оставляйте комментарии под новостями!</h3>


<?php
foreach($notes as $note) {
    echo '<ul>';
        echo '<li>' . '<b>' . $note-> title . '</b>' . '<br>';
        echo $note-> data . '<br>';
        echo $note -> description . '</li>';
        $komments = $note -> komment;
        foreach ( $komments as $komment) {
            echo '<ul>';
            echo '<li>' . '<b>' . $komment -> name . '</b>' . '<br>';
            echo '"' . $komment -> text . '"' . '</li>';
            echo '</ul>';
        }

        echo '</ul>';
}

?>


</body>

</html>