<?php
	function check_prime($num)
	{
		if ($num < 2)
			return 0;
		for ($i = 2; $i * $i <= $num; $i++)
			if ($num % $i == 0)
				return 0;
		return 1;
	}

	$str = "";
	if(isset($_GET['str']))
		$str = urldecode($_COOKIE['myJavascriptVar']);
	$nums = preg_split("/[\s,]+/", $str);
	sort($nums);
	$prime_str = array_filter($nums, function($val) { return check_prime($val); });
	$even_str = array_filter($nums, function($val) { return $val%2 == 0; });
	$odd_str = $nums;

?>

<!DOCTYPE html>
<html>
	<style>
		.red {
			color: red;
		}

		.green {
			color: green;
		}

		.blue {
			color: blue;
		}
	</style>
	<body>
		<form action="/PHP/3.php" method="get" onsubmit="setEncoded(event)">
  		<input type="text" name="str" onkeydown="InputKeyDown(event)" id='num'>
			<input type="submit" value="Submit">
		</form>
		<label><?php print_r($prime_str); ?></label> <br>
		<label><?php print_r($even_str);?></label> <br>
		<label><?php print_r($odd_str);?></label> <br>
		<label>blue: prime, red: non-prime</label> <br>
		<?php
			for($i=0; $i<sizeof($nums); $i++) {
				if($i != 0) echo ",";
				if(check_prime($nums[$i]))
					echo "<label class='blue'>$nums[$i]</label>";
				else echo "<label class='red'>$nums[$i]</label>";
			}
		?>
		<br>

		<label>green: even, black: odd</label> <br>
		<?php
			for($i=0; $i<sizeof($nums); $i++) {
				if($i != 0) echo ",";
				if($nums[$i] % 2 == 1)
					echo "<label class='green'>$nums[$i]</label>";
				else echo "<label class='black'>$nums[$i]</label>";
			}
		?>
	</body>

	<script>
		function InputKeyDown(e) {
			if('0' <= e.key && e.key <= '9' || e.keyCode == 32 || e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46)
				return true;
			else {
				alert('input only numbers');
				e.preventDefault();
			}
		}

		function setEncoded(e) {
			if(document.getElementById('num').value == '') {
				alert('please input number!');
				e.preventDefault();
			}
			document.cookie = "myJavascriptVar = " + document.getElementById('num').value;
		}
	</script>
</html>

