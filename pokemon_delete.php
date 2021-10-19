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

$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
mysqli_select_db($link, "pokemon_system");  
//送出UTF8編碼的MySQL指令
mysqli_query($link, 'SET NAMES utf8');
$sql = "SELECT * FROM pokemon";
$result = mysqli_query($link, $sql); 
if(mysqli_num_rows($result) > 0) {
	if ( mysqli_errno($link) != 0 ) {
			echo "錯誤代碼: ".mysqli_errno($link)."<br/>";
			echo "錯誤訊息: ".mysqli_error($link)."<br/>";      
		}else{
			echo "<table border='1'>";
			while ($rows = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
				$count = count($rows);
				for($i = 0; $i < $count; $i++){
					echo "<tr>";
						echo "<td>".$rows[$i]['pokemonID']."</td>";
						$ans = $rows[$i]['pokemonID'];
						echo "<td>".$rows[$i]['pokemonName']."</td>";
						echo "<form action='pokemon_go_delete1.php' method='post'>";
						echo "<input type ='hidden' name='delete' value ='$ans'>";
						echo "<td><input type='submit' name='get_delete' value='刪除'/></td>";
						echo "</form>";
					echo "</tr>";
				
				}
			
			
			}
			echo "</table>";
}
}

?>
</br>
<form name="info" method="post">
<input type="button" value="回寶可夢管理主畫面" onclick="location.href='pokemon_main.php'">
</form>
<hr>
</center>
</body>
</html>