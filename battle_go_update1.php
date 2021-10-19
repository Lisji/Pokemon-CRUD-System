<!DOCTYPE html>
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
$bid = $_POST['battle_update'];
// 是否是表單送回
if( isset($_POST["get_battle_update"])){   
	echo "<form action='battle_go_update2.php' method='post'>";
	echo "<table border='0'>";
		echo "<tr>";
			echo "<td>戰役編號:</td>";
			echo "<td>$bid</td>";
			echo "<input type ='hidden' name='bid' value ='$bid'>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>更改贏家:</td>";
			echo "<td>";
			echo "<select name='win' size='1'>";
			echo "<option value=''>請選擇贏家</option>";
			
			$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
			mysqli_select_db($link, "pokemon_system");  
			//送出UTF8編碼的MySQL指令
			mysqli_query($link, 'SET NAMES utf8');
			$sql = "SELECT trainerName From trainer";
			$result = mysqli_query($link, $sql); 
			if(mysqli_num_rows($result) > 0) {
				if ( mysqli_errno($link) != 0 ) {
						echo "錯誤代碼: ".mysqli_errno($link)."<br/>";
						echo "錯誤訊息: ".mysqli_error($link)."<br/>";      
					}else{
						
						while ($rows = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
							$count = count($rows);
							for($i = 0; $i < $count; $i++){
								$trainer = $rows[$i]['trainerName'];
								echo "<option value='$trainer'>$trainer</option>";
							}
						}
				}
			}
			
			echo "</select>";
			echo "</td>";
		echo "</tr>";	
		echo "<tr>";
			echo "<td>更改輸家:</td>";
			echo "<td>";
			echo "<select name='lose' size='1'>";
			echo "<option value=''>請選擇輸家</option>";
			$sql = "SELECT trainerName From trainer";
			$result = mysqli_query($link, $sql); 
			if(mysqli_num_rows($result) > 0) {
				if ( mysqli_errno($link) != 0 ) {
						echo "錯誤代碼: ".mysqli_errno($link)."<br/>";
						echo "錯誤訊息: ".mysqli_error($link)."<br/>";      
					}else{
						
						while ($rows = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
							$count = count($rows);
							for($i = 0; $i < $count; $i++){
								$trainer = $rows[$i]['trainerName'];
								echo "<option value='$trainer'>$trainer</option>";
							}
						}
				}
			}
			
			echo "</select>";
			echo "</td>";
		echo "</tr>";	
		
		echo "<tr>";
			echo "<td>修改時間:</td>";
			echo "<td><input type='datetime-local' id='time' name='time'></td>";
		echo "</tr>";
		
		
		echo "<tr>";
			echo "<td>寶可夢描述:</td>";
			$rr = $_POST['battle_update1'];
			echo "<td><input type='text' name='description' value = '$rr' size='50'/></td>";
		echo "</tr>";			
	echo "</table>";
	echo "<br/>";
	echo "<input type='submit' name='Renew' value='修改'/>";
	echo "</form>";
	mysqli_free_result($result);

	mysqli_close($link); // 關閉資料庫連接

}
   

?>
<br/><br/>
<input type="button" value="回戰役修改畫面" onclick="location.href='battle_update.php'">
<input type="button" value="回戰役管理主畫面" onclick="location.href='battle_main.php'">
</center>
<hr>
</body>
</html>