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
    <title>Последний найм</title>
</head>

<body>
<h1>Последний найм</h1>
<div class="container mtb-3">
<div class="table-responsive">

<?php
//запрос по отбору последних принятых сотрудников в каждый отдел организации, с выводом даты приемы и наименования отдела
$inquiry=$pdo->query ("SELECT   p.description, concat( u.last_name,' ',u.first_name) as fl, u.created_at FROM (SELECT up.department_id, d.description, max(up.user_id) as uid FROM user_position up left join department d on up.department_id=d.id group by up.department_id) p join user u on p.uid = u.id");

//создаем переменную с помощью класса Table и помещаем в нее результат запроса, преобразованный в таблицу
$table = new Table;
echo $table->getTable($inquiry, 'Фамилия Имя,Дата найма,Отдел', 'fl,created_at,description');
?>

</div>
</div>

<div class="buttons">
    <button class="button1" id="b1" onclick="window.location.href='index.php'">В начало</button>
    <button class="button2" id="b2" onclick="window.location.href='inquiry1.php'">Испытательный срок</button>
    <button class="button3" id="b3" onclick="window.location.href='inquiry2.php'">Уволенные</button>
</div>
</body>

</html>
