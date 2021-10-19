<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>持有寶可夢資料庫管理系統</title>
</head>
<body>
<?php
$sql = "SELECT * FROM trainer t"; 
?>
<center>
<h1>持有寶可夢管理</h1>
<hr>
1.<input type="button" value="查詢持有寶可夢" onclick="location.href='trainerpokemon_query.php'"></br></br>
2.<input type="button" value="新增持有寶可夢" onclick="location.href='trainerpokemon_insert_main.php'"></br></br>
3.<input type="button" value="修改持有寶可夢" onclick="location.href='trainerpokemon_update.php'"></br></br>
4.<input type="button" value="刪除持有寶可夢" onclick="location.href='trainerpokemon_delete_main.php'"></br></br>



<hr>
</body>
</html>