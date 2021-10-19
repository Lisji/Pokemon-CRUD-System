<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>寶可夢資料庫管理系統-戰役刪除</title>
</head>
<body>
<center>
<h1>寶可夢資料庫管理系統-戰役刪除</h1>
<hr>
<?php
$ans;
$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
mysqli_select_db($link, "pokemon_system");  
//送出UTF8編碼的MySQL指令
mysqli_query($link, 'SET NAMES utf8');
$sql = "SELECT battleID,t1.trainerName as t_1,t2.trainerName as t_2,battleDatetime,description FROM trainer t1,trainer t2 , battle b WHERE b.winnerID = t1.trainerID AND b.loserID = t2.trainerID order BY battleID ";
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
						echo "<td><input type='submit' name='get_battle_delete' value='刪除'/></td>";
						echo "</form>";
					echo "</tr>";
				
				}
			
			
			}
			echo "</table>";
	}
}
?>

<form name="info" method="post">
<br/>
<input type="button" value="回戰役管理主頁面" onclick="location.href='battle_main.php'">
</form>
<hr>
</center>
</body>
</html>