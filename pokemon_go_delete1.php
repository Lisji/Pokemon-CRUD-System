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
$delete = $_POST['delete'];
// 是否是表單送回
if( isset($_POST["get_delete"])){
	// 開啟MySQL的資料庫連接
	$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
	mysqli_select_db($link, "pokemon_system");  
	//送出UTF8編碼的MySQL指令
	mysqli_query($link, 'SET NAMES utf8'); 
	$sql = "SELECT * FROM pokemon p,pokemontype pt,type t WHERE p.pokemonID = pt.pokemonID AND t.typeID = pt.typeID AND p.pokemonID = '$delete'";
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
	}
	mysqli_close($link); // 關閉資料庫連接
}

echo "</br>";
echo "<form action='pokemon_go_delete2.php' method='post'>";
	echo "<font color=red>是否真的要刪除？</font>";
	echo "<input type ='hidden' name='delete' value ='$delete'>";
	echo "<input type='submit' name='yes' value='是'>";
	echo "<input type='button' name='no' value='否，回到寶可夢刪除畫面' onclick='location.href='pokemon_delete.php''>";
echo "</form>";

?>


</center>
<hr>
</body>
</html>