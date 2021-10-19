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
<form action="battle_go_insert.php" method="post">
<table border="0">
<tr>
	<td>戰役時間:</td>
	<td><input type="datetime-local" id="time" name="time"></td>
</tr>
<!---->
<tr>
	<td>贏家:</td>
	<td>
	<select name="win" size="1">
	<option value="">請選擇贏家</option>
	
<?php
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

?>
	</select>
	</td>
</tr>

<!---->
<tr>
	<td>輸家:</td>
	<td>
	<select name="lose" size="1">
	<option value="">請選擇輸家</option>
	
<?php
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

?>
	</select>
	</td>
</tr>


<!---->
<tr>
	<td>描述：</td>
	<td><input type="text" name="decription" size="50"/></td>
</tr>
</table>
<br/><br/>
<input type="submit" name="Insert" value="新增"/>
<input type="reset" value="清除"/>
<input type="button" value="回戰役管理主頁面" onclick="location.href='battle_main.php'">
</form>
<hr>
</center>
</body>
</html>
