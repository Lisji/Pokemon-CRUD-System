<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>寶可夢查詢結果</title>
</head>
<body>
<center>
<h1>寶可夢資料庫管理系統-寶可夢查詢</h1>
<hr>
<?php
if($_POST["pname"] != null){
	$name = $_POST["pname"];
}else{
	die("!請輸入資料!");
}
?>
<?php
// 是否是表單送回
if( isset($_POST["Query"])){
	// 取得SQL指令
	$sql = stripslashes($_POST["Sql"])." where p.pokemonID = pt.pokemonID AND t.typeID = pt.typeID AND p.pokemonName = '$name'";
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
			while ($rows = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
				if(count($rows)== 2){
					echo "<table border=1>";
					echo "<tr>";
					echo "<td>"."寶可夢編號"."</td>"."<td>".$rows[0]["pokemonID"]."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>"."寶可夢名字"."</td>"."<td>".$rows[0]["pokemonName"]."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>"."屬性"."</td>"."<td>".$rows[0]["typeName"]."、".$rows[1]["typeName"]."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>"."特性描述"."</td>"."<td>".$rows[0]["description"]."</td>";
					echo "</tr>";
					echo "</table>";
				}else{
					echo "<table border=1>";
					echo "<tr>";
					echo "<td>"."寶可夢編號"."</td>"."<td>".$rows[0]["pokemonID"]."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>"."寶可夢名字"."</td>"."<td>".$rows[0]["pokemonName"]."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>"."屬性"."</td>"."<td>".$rows[0]["typeName"]."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>"."特性描述"."</td>"."<td>".$rows[0]["description"]."</td>";
					echo "</tr>";
					echo "</table>";
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
   $sql = "SELECT * FROM pokemon p,pokemontype pt,type t"; 
}
?>
<br/><br/>
<input type="button" value="回寶可夢查詢畫面" onclick="location.href='pokemon_query.php'">
<input type="button" value="回寶可夢管理主畫面" onclick="location.href='pokemon_main.php'">
</center>
<hr>
</body>
</html>