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
	if($_POST["pname"] != null && $_POST["type1"] != null && $_POST["decription"] != null){
		
		$sql = "SELECT * FROM pokemon WHERE '$_POST[pname]' in (SELECT pokemonName FROM pokemon)";
		$result = mysqli_query($link, $sql); 
		if(mysqli_num_rows($result) > 1) {
			echo "<font color=red>!寶可夢建立失敗，寶可夢已存在!</font><br/>";
		}else{
			$sql="INSERT INTO pokemon VALUES('','$_POST[pname]','$_POST[decription]')";		
			mysqli_query($link, 'SET NAMES utf8'); 	
			//新增寶可夢
			mysqli_query($link, $sql);
			
			//以下為將寶可夢建立屬性
			//尋找新增寶可夢的ID
			$n = $_POST["pname"];
			$sql="SELECT pokemonID FROM pokemon WHERE pokemonName = '$n'";
			$result = mysqli_query($link, $sql); 
			if (mysqli_num_rows($result) == 1) {
				while($row = mysqli_fetch_assoc($result)) {
					$ans = $row["pokemonID"];
					$ans = intval($ans);
				}
			}
			//尋找屬性相對應的屬性ID，type1
			$type1 = $_POST['type1'];
			$sql="SELECT typeID FROM type WHERE typeName = '$type1'";
			$result = mysqli_query($link, $sql); 
			if(mysqli_num_rows($result) == 1) {
				while($row = mysqli_fetch_assoc($result)){
					$type1 = $row["typeID"];
					$type1 = intval($type1);
				}
			}
			//尋找屬性相對應的屬性ID，type2
			$type2 = $_POST['type2'];
			$sql="SELECT typeID FROM type WHERE typeName = '$type2'";
			$result = mysqli_query($link, $sql); 
			if(mysqli_num_rows($result) == 1){
				while($row = mysqli_fetch_assoc($result)){
					$type2 = $row["typeID"];
					$type2 = intval($type2);
				}
			}
			
			if ($type2 == null){
				$sql="INSERT INTO pokemontype VALUES($ans,$type1)";			
				mysqli_query($link, $sql);
				echo "<font color=green>!寶可夢建立成功!</font><br/>";
			}else if($type2 != null && $type1 != $type2){
				$sql="INSERT INTO pokemontype VALUES($ans,$type1)";		
				mysqli_query($link, $sql);
				//--------------------------------------------------------
				$sql="INSERT INTO pokemontype VALUES($ans,$type2)";		
				mysqli_query($link, $sql);	
				echo "<font color=green>!寶可夢建立成功!</font><br/>";
			}else{
				echo "<font color=red>!寶可夢建立失敗，輸入資料有問題!</font><br/>";
			}
			
		}
	
	}else{
		echo "<font color=red>!寶可夢建立失敗，輸入資料包含空值，請重新輸入!</font><br/>";
	}
	
	mysqli_close($link);// 關閉資料庫連接

}
?>
<br/><br/>
<input type="button" value="回寶可夢新增畫面" onclick="location.href='pokemon_insert.php'">
<input type="button" value="回寶可夢管理主畫面" onclick="location.href='pokemon_main.php'">
<hr>
</body>
</html>

