<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>寶可夢資料庫管理系統-戰役新增</title>
</head>
<body>
<center>
<h1>寶可夢資料庫管理系統-戰役新增</h1>
<hr>
<?php
$winner;
$loser;

// 是否是表單送回
if (isset($_POST["Insert"])) {

	// 開啟MySQL的資料庫連接
	$link = @mysqli_connect("localhost","root","") or die("無法開啟MySQL資料庫連接!<br/>");
	// 選擇資料庫
	mysqli_select_db($link, "pokemon_system"); 
	// 建立新增記錄的SQL指令字串
	if($_POST["time"] != null && $_POST["win"] != null && $_POST["lose"] != null && $_POST["decription"] != null && $_POST["win"] != $_POST["lose"]){	
		$winner = $_POST["win"];
		$loser = $_POST["lose"];
		$sql = "SELECT trainerID FROM trainer WHERE trainerName = '$winner'";
		$result = mysqli_query($link, $sql); 
		if(mysqli_num_rows($result) == 1) {
			while($row = mysqli_fetch_assoc($result)){
				$winner = $row["trainerID"];
			}
		}
		$sql = "SELECT trainerID FROM trainer WHERE trainerName = '$loser'";
		$result = mysqli_query($link, $sql); 
		if(mysqli_num_rows($result) == 1) {
			while($row = mysqli_fetch_assoc($result)){
				$loser = $row["trainerID"];
			}
		}
		
		$sql = "INSERT INTO battle VALUES('','$_POST[time]','$winner','$loser','$_POST[decription]')";		
		$result = mysqli_query($link, $sql); 
	
		echo "<font color=green>!戰役新增成功!</font><br/>";
	}else{
		echo "<font color=red>!戰役建立失敗，輸入資料包含空值，或格式有誤，請重新輸入!</font><br/>";
	}
	
	mysqli_close($link);// 關閉資料庫連接

}
?>
<br/><br/>
<input type="button" value="回戰役新增畫面" onclick="location.href='battle_insert.php'">
<input type="button" value="回戰役管理主畫面" onclick="location.href='battle_main.php'">
<hr>
</body>
</html>

