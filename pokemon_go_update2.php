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
$pid = $_POST["pid"];
$pid = intval($pid);
$count = 0;
$type1;
$type2;
$name;

if($_POST['pname'] != null){
	$name = $_POST['pname'];
}else{
	die("!請輸入資料!");
}
if( isset($_POST["Renew"])){
	// 開啟MySQL的資料庫連接
	$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
	mysqli_select_db($link, "pokemon_system");  
	//送出UTF8編碼的MySQL指令
	mysqli_query($link, 'SET NAMES utf8');
	$sql = "SELECT * FROM pokemontype WHERE pokemonID = '$pid'";
	$result = mysqli_query($link, $sql); 
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			$count++;
		}
	}
	
	if($_POST["pname"] != null && $_POST["type1"] != null && $_POST["description"] != null){
		$name = $_POST['pname'];
		$type1 = $_POST['type1'];
		$type2 = $_POST['type2'];
		$description = $_POST['description'];
		//尋找屬性相對應的屬性ID，type1
		
		$sql="SELECT typeID FROM type WHERE typeName = '$type1'";
		$result = mysqli_query($link, $sql); 
		if(mysqli_num_rows($result) == 1) {
			while($row = mysqli_fetch_assoc($result)){
				$type1 = $row["typeID"];
				$type1 = intval($type1);
			}
		}
		//尋找屬性相對應的屬性ID，type2
		
		$sql="SELECT typeID FROM type WHERE typeName = '$type2'";
		$result = mysqli_query($link, $sql); 
		if(mysqli_num_rows($result) == 1){
			while($row = mysqli_fetch_assoc($result)){
				$type2 = $row["typeID"];
				$type2 = intval($type2);
			}
		}
		if($type1 != $type2){
			if($type2 == null && $count == 1){
				$sql = "UPDATE pokemon SET pokemonName = '$name', description = '$description' WHERE pokemonID = '$pid'";
				mysqli_query($link, $sql); 
				$sql = "UPDATE pokemontype SET typeID = '$type1' WHERE pokemonID = '$pid'";
				mysqli_query($link, $sql); 
				echo "<font color=green>!寶可夢更新成功!</font><br/>";
			}else if($type2 == null && $count == 2){
				$sql = "UPDATE pokemon SET pokemonName = '$name', description = '$description' WHERE pokemonID = '$pid'";
				mysqli_query($link, $sql);
				$sql = "DELETE FROM pokemontype WHERE pokemonID = '$pid'";
				mysqli_query($link, $sql); 
				$sql="INSERT INTO pokemontype VALUES($pid,$type1)";			
				mysqli_query($link, $sql);
				echo "<font color=green>!寶可夢更新成功!</font><br/>";
			}else if($type2 != null && $count == 1){
				$sql = "UPDATE pokemon SET pokemonName = '$name', description = '$description' WHERE pokemonID = '$pid'";
				mysqli_query($link, $sql);
				$sql = "DELETE FROM pokemontype WHERE pokemonID = '$pid'";
				mysqli_query($link, $sql); 		
				$sql="INSERT INTO pokemontype VALUES($pid,$type1)";			
				mysqli_query($link, $sql);
				$sql="INSERT INTO pokemontype VALUES($pid,$type2)";			
				mysqli_query($link, $sql);
				echo "<font color=green>!寶可夢更新成功!</font><br/>";
			}else if($type2 != null && $count == 2){
				$sql = "UPDATE pokemon SET pokemonName = '$name', description = '$description' WHERE pokemonID = '$pid'";
				mysqli_query($link, $sql);
				$sql = "DELETE FROM pokemontype WHERE pokemonID = '$pid'";
				mysqli_query($link, $sql); 		
				$sql="INSERT INTO pokemontype VALUES($pid,$type1)";			
				mysqli_query($link, $sql);
				$sql="INSERT INTO pokemontype VALUES($pid,$type2)";			
				mysqli_query($link, $sql);
				echo "<font color=green>!寶可夢更新成功!</font><br/>";
			}
		}else{
				echo "<font color=red>!寶可夢更新失敗，輸入資料有問題，請重新輸入!</font><br/>";
		}
	}else{
		echo "<font color=red>!寶可夢更新失敗，輸入資料包含空值，請重新輸入!</font><br/>";
	}
	// 關閉資料庫連接
	mysqli_close($link);
}
?>
<input type="button" value="回寶可夢修改畫面" onclick="location.href='pokemon_update.php'">
<input type="button" value="回寶可夢管理主畫面" onclick="location.href='pokemon_main.php'">
</center>
<hr>
</body>
</html>