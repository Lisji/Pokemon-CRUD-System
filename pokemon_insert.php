<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>寶可夢資料庫管理系統-寶可夢新增</title>
</head>
<body>

<center>
<h1>寶可夢資料庫管理系統-寶可夢新增</h1>
<hr>
<form action="pokemon_go_insert.php" method="post">
<table border="0">
<tr>
	<td>寶可夢名稱:</td>
	<td><input type="text" name="pname" size ="12"/></td>
</tr>
<!---->
<tr>
	<td>屬性:</td>
	<td>
	<select name="type1" size="1">
		<option value="" >請選擇第一屬性</option>
		<option value="飛行" >飛行</option>
		<option value="格鬥">格鬥</option>
		<option value="惡">惡</option>
		<option value="超能力">超能力</option>
		<option value="鋼">鋼</option>
		<option value="電">電</option>
		<option value="妖精">妖精</option>
	</select>
    <select name="type2" size="1">
		<option value="" >請選擇第二屬性</option>
		<option value="" >無</option>
		<option value="飛行" >飛行</option>
		<option value="格鬥">格鬥</option>
		<option value="惡">惡</option>
		<option value="超能力">超能力</option>
		<option value="鋼">鋼</option>
		<option value="電">電</option>
		<option value="妖精">妖精</option>
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
<input type="button" value="回寶可夢管理主頁面" onclick="location.href='B10723059_main.php'">
</form>
<hr>
</center>
</body>
</html>
