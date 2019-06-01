<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title>dom xss</title>
</head>
<body>
	<script type="text/javascript">
		function test()
		{
			var str = document.getElementById('text').value;
			document.getElementById('t').innerHTML = "<a href='" + str + "'>testLink</a>";
		}
	</script>
    <div id="t"></div>
    <!-- '><img src=# onerror=alert(/xss2/) />/<' -->
	<input type="text" id="text" value="" />
	<input type="button" id="s" value="write" onclick="test()" />
</body>
</html>
