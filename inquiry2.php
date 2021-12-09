<!doctype html>
<html lang="ru">

<?php
include('connection1.php');
include('table.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Уволенные</title>
</head>

<body>

<div class="container mtb-3">
<div class="table-responsive">

<?php
//запрос по отбору сотрудников, уволенных на сегодняшний день с выводом даты и причины увольнения
$inquiry2 = $pdo->query("SELECT user.first_name, user.last_name,dismission_reason.description,user_dismission.created_at FROM `user`,`user_dismission`,`dismission_reason` WHERE user.id = user_dismission.user_id AND DATEDIFF(CURDATE(), user_dismission.update_at)>0 AND user_dismission.reason_id = dismission_reason.id ORDER BY user.last_name");

//создаем переменную с помощью класса Table и помещаем в нее результат запроса, преобразованный в таблицу
$table2 = new Table;
echo $table2->getTable($inquiry2, 'Фамилия,Имя,Дата увольнения,Причина увольнения', 'last_name,first_name,created_at,description');
?>

</div>
</div>

<div class="buttons">
    <button class="button1" id="b1" onclick="window.location.href='index.php'">В начало</button>
    <button class="button2" id="b2" onclick="window.location.href='inquiry1.php'">Испытательный срок</button>
    <button class="button3" id="b3" onclick="window.location.href='inquiry3.php'">Последний найм</button>
</div>
</body>

</html>

