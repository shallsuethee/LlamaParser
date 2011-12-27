<!DOCTYPE HTML>
<html>
<head>
<title>Parser</title>
</head>
<body>

<form action="index.php" method="post">
<textarea autofocus name="vstup" rows="20" cols="80"></textarea><br />
<input type="submit" value="Potvrdiť" />
</form>
<br />

<?php
	if(isset($_POST['vstup']))
	{
		$text = $_POST['vstup'];
		$text = stripslashes($text);

		$order = array("\r\n", "\n", "\r");
		$replace = '';
		$text = str_replace($order, $replace, $text);
		$text = preg_replace("#\<en id=\"(.+)\"\>\<p class=\"main\"\>\<b0\>(.+)\</b0\>#", '<d:entry id="$1" d:title="$2"><d:index d:value="$2" /><p class="main"><h1>$2</h1>', $text);
		$text = preg_replace("#\</en#", '</d:entry', $text);

		echo $text;
	}
	else
	{
			
	}
?>
</body>
</html>