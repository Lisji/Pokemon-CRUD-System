<html>
<head>
<meta charset="utf-8" />
<title>寶可夢資料庫管理系統-戰役更新</title>
</head>
<body>
<center>
<h1>寶可夢資料庫管理系統-戰役更新</h1>
<hr>
<?php
$bid = $_POST["bid"];
$bid = intval($bid);
$winner;
$loser;
$date;


if( isset($_POST["Renew"])){
	// 開啟MySQL的資料庫連接
	$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
	mysqli_select_db($link, "pokemon_system");  
	//送出UTF8編碼的MySQL指令
	mysqli_query($link, 'SET NAMES utf8');
	if($_POST["win"] != null && $_POST["lose"] != null && $_POST["description"] != null && $_POST["time"] != null && $_POST["win"] != $_POST["lose"] ){
		$winner = $_POST["win"];
		$loser = $_POST["lose"];
		$description = $_POST['description'];
		$date = $_POST['time'];
		//尋找屬性相對應的訓練師ID，winner
		
		$sql="SELECT trainerID FROM trainer WHERE trainerName = '$winner'";
		$result = mysqli_query($link, $sql); 
		if(mysqli_num_rows($result) == 1) {
			while($row = mysqli_fetch_assoc($result)){
				$winner = $row["trainerID"];
			}
		}
		//尋找屬性相對應的訓練師ID，loser
		
		$sql="SELECT trainerID FROM trainer WHERE trainerName = '$loser'";
		$result = mysqli_query($link, $sql); 
		if(mysqli_num_rows($result) == 1){
			while($row = mysqli_fetch_assoc($result)){
				$loser = $row["trainerID"];
			}
		}
		
		$sql = "UPDATE battle SET battleDatetime = '$date' ,winnerID = '$winner', loserID = '$loser', description = '$description' WHERE battleID = '$bid'";
		mysqli_query($link, $sql); 
		
		
		echo "<font color=green>!戰役更新成功!</font><br/>";
		
	}else{
		echo "<font color=red>!戰役更新失敗，輸入資料包含空值，或資料格式不正確，請重新輸入!</font><br/>";
	}
	// 關閉資料庫連接
	mysqli_close($link);
}
?>
<input type="button" value="回戰役修改畫面" onclick="location.href='battle_update.php'">
<input type="button" value="回戰役管理主畫面" onclick="location.href='battle_main.php'">
</center>
<hr>
</body>
</html>