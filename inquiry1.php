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
    <title>Испытательный срок</title>
</head>

<body>
<h1>Испытательный срок</h1>
<div class="container mtb-3">
<div class="table-responsive">

<?php
//запрос по отбору сотрудников, отработавших менее 90 дней
$inquiry =$pdo->query("SELECT user.first_name,user.last_name,user.created_at FROM `user` WHERE DATEDIFF(CURDATE(), created_at) <= 90 ORDER BY user.last_name");

//создаем переменную с помощью класса Table и помещаем в нее результат запроса, преобразованный в таблицу
$table = new Table;
echo $table->getTable($inquiry, 'Фамилия,Имя,Дата приема', 'last_name,first_name,created_at');
?>

</div>
</div>

<div class="buttons">
    <button class="button1" id="b1" onclick="window.location.href='index.php'">В начало</button>
    <button class="button2" id="b2" onclick="window.location.href='inquiry2.php'">Уволенные</button>
    <button class="button3" id="b3" onclick="window.location.href='inquiry3.php'">Последний найм</button>
</div>

</body>

</html>
