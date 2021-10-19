<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>寶可夢資料庫管理系統-寶可夢刪除</title>
</head>
<body>
<center>
<h1>寶可夢資料庫管理系統-寶可夢刪除</h1>
<hr>
<?php
$name = $_POST["pname"];
$pname = $_POST["name"];
$delete = $_POST['delete'];
// 是否是表單送回
if( isset($_POST["get_delete"])){
	// 開啟MySQL的資料庫連接
	$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
	mysqli_select_db($link, "pokemon_system");  
	//送出UTF8編碼的MySQL指令
	mysqli_query($link, 'SET NAMES utf8'); 
	$sql = "SELECT * FROM relationship r , pokemon p, trainer t WHERE r.pokemonID = p.pokemonID AND t.trainerID = r.trainerID AND t.trainerName = '$name' AND r.pokemonID = '$delete'";
	// 執行SQL查詢
	$result = mysqli_query($link, $sql); 
	echo "<font color=red>您確定要刪除 $name 的 $pname 嗎？</font><br/>";
	mysqli_close($link); // 關閉資料庫連接
}

echo "</br>";
echo "<form action='trainerpokemon_go_delete2.php' method='post'>";
	echo "<input type ='hidden' name='delete' value ='$delete'>";
	echo "<input type='submit' name='yes' value='是'>";
echo "</form>";

?>
<input type="button" value="否" onclick="location.href='trainerpokemon_delete_main.php'">
</center>
<hr>
</body>
</html>