<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>寶可夢資料庫管理系統-寶可夢更新</title>
</head>
<body>
<center>
<h1>寶可夢資料庫管理系統-寶可夢更新</h1>
<hr>

<?php
if($_POST["pname"] != null){
	$name = $_POST["pname"];
}else{
	die("!請輸入資料!");
}

$pid;
// 是否是表單送回
if( isset($_POST["Query"])){
	$sql = stripslashes($_POST["Sql"])." where p.pokemonID = pt.pokemonID AND t.typeID = pt.typeID AND p.pokemonName = '$name'";
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
			$sql = "SELECT pokemonID FROM pokemon WHERE pokemonName = '$name'";
			$result = mysqli_query($link, $sql); 
			if(mysqli_num_rows($result) == 1) {
				while($row = mysqli_fetch_assoc($result)){
					$pid = $row["pokemonID"];
					$pid = intval($pid);
				}
			}
			echo "<form action='pokemon_go_update2.php' method='post'>";
			echo "<table border='0'>";
				echo "<tr>";
					echo "<td>寶可夢編號:</td>";
					echo "<td>$pid</td>";
					echo "<input type ='hidden' name='pid' value ='$pid'>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>寶可夢名字:</td>";
					echo "<td><input type='text' name='pname' value = '$name' size='12'/></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>屬性一:</td>";
					echo "<td><select name='type1' size='1'><option value='' >請選擇第一屬性</option><option value='飛行' >飛行</option><option value='格鬥'>格鬥</option><option value='惡'>惡</option><option value='超能力'>超能力</option><option value='鋼'>鋼</option><option value='電'>電</option><option value='妖精'>妖精</option></select></td>";
				echo "</tr>";	
				echo "<tr>";
					echo "<td>屬性二:</td>";
					echo "<td><select name='type2' size='1'><option value='' >請選擇第二屬性</option><option value='' >無</option><option value='飛行' >飛行</option><option value='格鬥'>格鬥</option><option value='惡'>惡</option><option value='超能力'>超能力</option><option value='鋼'>鋼</option><option value='電'>電</option><option value='妖精'>妖精</option></select></td>";
				echo "</tr>";	
				echo "<tr>";
					echo "<td>寶可夢描述:</td>";
					echo "<td><input type='text' name='description' size='50'/></td>";
				echo "</tr>";			
			echo "</table>";
			echo "<br/>";
			echo "<input type='submit' name='Renew' value='修改'/>";
			echo "</form>";
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
<input type="button" value="回寶可夢修改畫面" onclick="location.href='pokemon_update.php'">
<input type="button" value="回寶可夢管理主畫面" onclick="location.href='pokemon_main.php'">
</center>
<hr>
</body>
</html>