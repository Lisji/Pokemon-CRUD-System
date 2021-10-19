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
$delete = $_POST['delete'];
if(isset($_POST["yes"])){
   $link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
   
   mysqli_select_db($link, "pokemon_system");  
   //送出UTF8編碼的MySQL指令
   mysqli_query($link, 'SET NAMES utf8'); 

	$sql ="DELETE FROM pokemon WHERE pokemonID = '$delete'";
	mysqli_query($link, $sql);

	echo "<font color=green>!寶可夢刪除成功!</font><br/><br/>";
	

	mysqli_close($link);// 關閉資料庫連接
}else{
	echo "<font color=red>!寶可夢刪除失敗!</font><br/><br/>";
}
?>
<input type="button" value="回寶可夢修改畫面" onclick="location.href='pokemon_delete.php'">
<input type="button" value="回寶可夢管理主畫面" onclick="location.href='pokemon_main.php'">
</center>
<hr>
</body>
</html>