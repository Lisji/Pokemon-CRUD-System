<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>寶可夢新增結果</title>
</head>
<body>
<center>
<h1>寶可夢資料庫管理系統-寶可夢新增</h1>
<hr>
<?php
	$name = $_POST["pid"];
	$ans;
	$type1;
	$type2;

// 是否是表單送回
if (isset($_POST["Insert"])) {

	// 開啟MySQL的資料庫連接
	$link = @mysqli_connect("localhost","root","") or die("無法開啟MySQL資料庫連接!<br/>");
	// 選擇資料庫
	mysqli_select_db($link, "pokemon_system"); 
	// 建立新增記錄的SQL指令字串
		$sql = "SELECT * FROM relationship r , pokemon p, trainer t WHERE r.pokemonID = p.pokemonID AND t.trainerID = r.trainerID AND t.trainerName = '$_POST[pname]' AND r.pokemonID = '$_POST[pid]'";
		$result = mysqli_query($link, $sql); 
		if(mysqli_num_rows($result) >= 1) {
			echo "<font color=red>!寶可夢建立失敗，寶可夢已存在!</font><br/>";
		}else{
			$a = "SELECT trainerID FROM trainer t WHERE t.trainerName = '$_POST[pname]'";
			$aa = mysqli_query($link, $a);
			$rows = mysqli_fetch_all($aa, MYSQLI_ASSOC);
			$ans = (string)$rows[0]['trainerID'];
			$anss = (string)$name;
			//新增該訓練師寶可夢
			$sql="INSERT INTO relationship VALUES('$ans','$anss')";		
			mysqli_query($link, 'SET NAMES utf8'); 	
			//新增寶可夢
			mysqli_query($link, $sql);
			echo "<font color=green>!寶可夢建立成功!</font><br/>";
		}
	
	mysqli_close($link);// 關閉資料庫連接

}
?>
<br/><br/>
<input type="button" value="回選擇訓練家頁面" onclick="location.href='trainerpokemon_insert_main.php'">
<input type="button" value="回持有寶可夢管理主畫面" onclick="location.href='trainerpokemon_main.php'">
<hr>
</body>
</html>

