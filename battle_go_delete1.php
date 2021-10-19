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
$delete = $_POST['battle_delete'];

// 是否是表單送回
if( isset($_POST["get_battle_delete"])){
	// 開啟MySQL的資料庫連接
	$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
	mysqli_select_db($link, "pokemon_system");  
	//送出UTF8編碼的MySQL指令
	mysqli_query($link, 'SET NAMES utf8'); 
	$sql = "SELECT battleID,t1.trainerName as t_1,t2.trainerName as t_2,battleDatetime,description FROM trainer t1,trainer t2 , battle b WHERE b.winnerID = t1.trainerID AND b.loserID = t2.trainerID AND b.battleID = '$delete' ";
	// 執行SQL查詢
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
							echo "<td>".$rows[$i]['battleID']."</td>";
							$ans = $rows[$i]['battleID'];
							echo "<td>".$rows[$i]['t_1']."</td>";
							echo "<td>".$rows[$i]['t_2']."</td>";
							echo "<td>".$rows[$i]['battleDatetime']."</td>";
							echo "<td>".$rows[$i]['description']."</td>";
							$ans1 = $rows[$i]['description'];
							echo "<form action='battle_go_delete1.php' method='post'>";
							echo "<input type ='hidden' name='battle_delete' value ='$ans'>";
							echo "<input type ='hidden' name='battle_delete1' value ='$ans1'>";
							echo "</form>";
						echo "</tr>";
					
					}
				
				
				}
				echo "</table>";
			}
		}
	
	mysqli_close($link); // 關閉資料庫連接
}

echo "</br>";
echo "<form action='battle_go_delete2.php' method='post'>";
	echo "<font color=red>是否真的要刪除？</font>";
	echo "<input type ='hidden' name='delete' value ='$delete'>";
	echo "<input type='submit' name='yes' value='是'>";
	echo "<input type='button' name='no' value='否，回到戰役刪除畫面' onclick='location.href='battle_delete.php''>";
echo "</form>";

?>


</center>
<hr>
</body>
</html>