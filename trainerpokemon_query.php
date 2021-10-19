<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>持有寶可夢資料庫管理系統-持有寶可夢查詢</title>
</head>
<body>
<?php
	$sql = "SELECT * FROM trainer"; 
	//echo "<small>SQL指令:<b> $sql</b><br/>";
	// 開啟MySQL的資料庫連接
	$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
	mysqli_select_db($link, "pokemon_system");  
	//送出UTF8編碼的MySQL指令
	mysqli_query($link, 'SET NAMES utf8'); 
	// 執行SQL查詢
	$result = mysqli_query($link, $sql); 
?>
<center>
<h1>持有寶可夢資料庫管理系統-持有寶可夢查詢</h1>
<hr>
<h2>請選擇您要查詢的訓練師</h2>
<table border="1">
<?php
	while ($rows = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
				$count = count($rows);
				for($i = 0; $i < $count; $i++){
					echo "<tr>";
						echo "<td>".$rows[$i]['trainerName']."</td>";
						$ans = $rows[$i]['trainerName'];
						echo "<form action='trainerpokemon_go_query.php' method='post'>";
						echo "<input type ='hidden' name='pname' value ='$ans'>";
						echo "<td><input type='submit' name ='Query' value='查詢'/></td>";
						echo "</form>";
					echo "</tr>";
				}	
	}
?>
</table>
<br/>
<form name="info" method="post">
<input type="button" value="回持有寶可夢管理主頁面" onclick="location.href='trainerpokemon_main.php'">
</form>
<hr>
</center>
</body>
</html>