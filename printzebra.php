<?php
if (isset($_POST['printbc'])){
	$zplFile="utama.zpl";
      copy($zplFile, "//localhost/ZDesigner GK420t");
     unlink($zplFile);
}
?>

<html>
<body>
	<form action="printzebra.php" method="post">
		<input type="submit" name="printbc" value="Print ZPL">
	</form>
</body>
</html>