<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>持有寶可夢資料庫管理系統-持有寶可夢更新</title>
</head>
<body>
<?php
	$name = $_POST["pname"];
?>
<?php
	$sql = "SELECT * FROM relationship r , pokemon p, trainer t where t.trainerID = r.trainerID AND r.pokemonID = p.pokemonID AND t.trainerName = '$name'"; 
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
<h1>持有寶可夢資料庫管理系統-持有寶可夢更新</h1>
<hr>
<h2>請選擇您要更新的寶可夢</h2>
<table border="1">
<?php
	while ($rows = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
				$count = count($rows);
				for($i = 0; $i < $count; $i++){
					echo "<tr>";
						echo "<td>".$rows[$i]['pokemonID']."</td>";
						$id = $rows[$i]['pokemonID'];
						echo "<td>".$rows[$i]['pokemonName']."</td>";
						echo "<form action='trainerpokemon_go_update2.php' method='post'>";
						echo "<input type ='hidden' name='pid' value ='$id'>";
						echo "<input type ='hidden' name='pname' value ='$name'>";
						echo "<td><input type='submit' name='Insert' value='更新'/></td>";
						echo "</form>";
					echo "</tr>";
				}	
	}
?>
</table>
<br/><br/>
<input type="button" value="回選擇訓練家頁面" onclick="location.href='trainerpokemon_update.php'">
<input type="button" value="回寶可夢管理主頁面" onclick="location.href='trainerpokemon_main.php'">
</form>
<hr>
</body>
</html>