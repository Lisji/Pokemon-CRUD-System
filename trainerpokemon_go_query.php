<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>持有寶可夢查詢結果</title>
</head>
<body>
<center>
<h1>持有寶可夢資料庫管理系統-持有寶可夢查詢</h1>
<hr>
<?php
	$name = $_POST["pname"]
?>

<?php
// 是否是表單送回
if( isset($_POST["Query"])){
	// 取得SQL指令
	$sql = " SELECT * FROM relationship r , pokemon p, trainer t where t.trainerID = r.trainerID AND r.pokemonID = p.pokemonID AND t.trainerName = '$name'";
	//echo "<small>SQL指令:<b> $sql</b><br/>";
	// 開啟MySQL的資料庫連接
	$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
	mysqli_select_db($link, "pokemon_system");  
	//送出UTF8編碼的MySQL指令
	mysqli_query($link, 'SET NAMES utf8'); 
	// 執行SQL查詢
	$result = mysqli_query($link, $sql); 
		if(mysqli_num_rows($result)>0){
		if ( mysqli_errno($link) != 0 ) {
			echo "錯誤代碼: ".mysqli_errno($link)."<br/>";
			echo "錯誤訊息: ".mysqli_error($link)."<br/>";      
		}else{ 
			echo "以下為 ".$name." 訓練家所擁有的寶可夢："."<br/><br/>";
			while ($rows = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
				$count = count($rows);
				for($i = 0; $i < $count; $i++){
					echo "<tr>";
						echo "<td>".$rows[$i]['pokemonName']."</td>";
						$ans = $rows[$i]['trainerName'];
						echo "<form action='trainerpokemon_go_query.php' method='post'>";
						echo "<input type ='hidden' name='pname' value ='$ans'>";
						echo "</form>";
					echo "</tr>";
				}	
	}
			mysqli_free_result($result);
		}
	}else{
		echo "寶可夢名字:".$name."<br/>";
		echo "<font color=red>"."!查詢寶可夢不存在!"."</font>";
	}
	mysqli_close($link); // 關閉資料庫連接
}else{
   $sql = "SELECT * FROM pokemon p,trainer t"; 
}
?>

<br/><br/>
<input type="button" value="回選擇訓練家畫面" onclick="location.href='trainerpokemon_query.php'">
<input type="button" value="回持有寶可夢管理主畫面" onclick="location.href='trainerpokemon_main.php'">
</center>
<hr>
</body>
</html>