<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>寶可夢資料庫管理系統-戰役統計</title>
</head>
<body>
<center>
<h1>寶可夢資料庫管理系統-戰役統計</h1>
<hr>

<form id="form1" action="stastic.php" method="post">
	排序方式：
	<select name="way" size="1">
		<option value="AZ" >A-Z</option>
		<option value="ZA">Z-A</option>
	</select>
    <input type="radio" name="r" id="r1" value=1 checked>訓練家編號
    <input type="radio" name="r" id="r2" value=2> 訓練家姓名
    <input type="radio" name="r" id="r3" value=3>勝利次數
	<input type="radio" name="r" id="r4" value=4>落敗次數
    <input type="submit" name = "order" value="排序">
	
</form>
</br>
輸入關鍵字篩選:<input type="search" class="light-table-filter" data-table="order-table" placeholder="請輸入關鍵字">
</br>
</br>
<?php
$order = ' ORDER BY trainerID ASC';
$sql;
$link = @mysqli_connect("localhost", "root", "") or die("無法開啟MySQL資料庫連接!<br/>");
mysqli_select_db($link, "pokemon_system");  
//送出UTF8編碼的MySQL指令
mysqli_query($link, 'SET NAMES utf8');
if( isset($_POST["order"])){
	
	if($_POST["way"]=="AZ"){
		switch ($_POST["r"]){
			case 1:
				$order = ' ORDER BY trainerID ASC';
				echo "<font color=red>依訓練家編號，正向排序</font>";
				break;  
			case 2:
				$order = ' ORDER BY trainerName ASC';
				echo "<font color=red>依訓練家名字，正向排序</font>";
				break;
			case 3:
				$order = ' ORDER BY wintime ASC';
				echo "<font color=red>依勝利次數，正向排序</font>";
				break;
			case 4:
				$order = ' ORDER BY losetime ASC';
				echo "<font color=red>依落敗次數，正向排序</font>";
				break;
			default:
				$order = ' ORDER BY trainerID ASC';
				echo "<font color=red>依訓練家編號，正向排序</font>";
				break; 		
		}
	}else{
		switch ($_POST["r"]){
			case 1:
				$order = ' ORDER BY trainerID DESC';
				echo "<font color=red>依訓練家編號，反向排序</font>";
				break;  
			case 2:
				$order = ' ORDER BY trainerName DESC';
				echo "<font color=red>依訓練家名字，反向排序</font>";
				break;
			case 3:
				$order = ' ORDER BY wintime DESC';
				echo "<font color=red>依勝利次數，反向排序</font>";
				break;
			case 4:
				$order = ' ORDER BY losetime DESC';
				echo "<font color=red>依落敗次數，反向排序</font>";
				break;
			default:
				$order = ' ORDER BY trainerID DESC';
				echo "<font color=red>依訓練家編號，反向排序</font>";
				break; 		
		}
	}
	
}else{
	$order = ' ORDER BY trainerID ASC';
	echo "<font color=red>依訓練家編號，正向排序</font>";
}
$sql = "SELECT * FROM (SELECT t.trainerID, t.trainerName, ifnull(win.count,0) as wintime FROM trainer t LEFT JOIN (SELECT trainerID ,COUNT(*) as COUNT FROM battle b, trainer t WHERE t.trainerID = b.winnerID GROUP BY trainerID) as win on win.trainerID = t.trainerID) as winall NATURAL JOIN (SELECT t.trainerID, t.trainerName, ifnull(lose.count,0) as losetime FROM trainer t LEFT JOIN (SELECT trainerID ,COUNT(*) as COUNT FROM battle b, trainer t WHERE t.trainerID = b.loserID GROUP BY trainerID) as lose on lose.trainerID = t.trainerID) as loseall".$order ;
$result = mysqli_query($link, $sql); 
if(mysqli_num_rows($result) > 0) {
	if ( mysqli_errno($link) != 0 ) {
			echo "錯誤代碼: ".mysqli_errno($link)."<br/>";
			echo "錯誤訊息: ".mysqli_error($link)."<br/>";      
		}else{
			echo "<table border='1' class='order-table'>";
			echo "<thead>";
				echo "<tr>";
					
					echo "<td class='ID'>訓練家編號</td>";
					echo "<td class='name'>訓練家姓名</td>";
					echo "<td calss= 'win'>勝利次數</td>";
					echo "<td calss= 'lose'>落敗次數</td>";
				echo "</tr>";
			
			echo "</thead>";
			while ($rows = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
				$count = count($rows);
				echo "<tbody>";
				for($i = 0; $i < $count; $i++){
					echo "<tr>";
						echo "<td>".$rows[$i]['trainerID']."</td>";
						echo "<td>".$rows[$i]['trainerName']."</td>";
						echo "<td>".$rows[$i]['wintime']."</td>";
						echo "<td>".$rows[$i]['losetime']."</td>";

						
					echo "</tr>";
				
				}
			
			
			}
			echo "</tbody>";
			echo "</table>";
		}
}

?>

</br>

<form name="info" method="post">
<input type="button" value="回到主管理頁面" onclick="location.href='Main.php'">
</form>
<hr>
</center>
</body>
</html>

<script>
(function(document) {
  'use strict';

  // 建立 LightTableFilter
  var LightTableFilter = (function(Arr) {

    var _input;

    // 資料輸入事件處理函數
    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    // 資料篩選函數，顯示包含關鍵字的列，其餘隱藏
    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      // 初始化函數
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  // 網頁載入完成後，啟動 LightTableFilter
  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>



