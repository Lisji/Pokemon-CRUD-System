<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>寶可夢資料庫管理系統-寶可夢更新</title>
</head>
<body>
<?php

$sql = "SELECT * FROM pokemon p,pokemontype pt,type t"; 

?>
<center>
<h1>寶可夢資料庫管理系統-寶可夢更新</h1>
<hr>
<form name="info" method="post" action="pokemon_go_update1.php">
輸入將更新寶可夢名字: <input type="text" name="pname" size="15"/>
<br/>
<br/>
<input type ="hidden" name="Sql" value ="<?php echo $sql ?>">

<input type="submit" name ="Query" value="確認"/>
<input type="reset" value="清除"/>
<input type="button" value="回寶可夢管理主頁面" onclick="location.href='pokemon_main.php'">
</form>
<hr>
</center>
</body>
</html>