<?php if(!isset($_SESSION)){
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>The News Stand</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="css/style.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript">

	const session = <?php if(!$_SESSION['news']){
		echo 'false'; }
		else { echo 'true'; } ?>;
	</script>

</head>
<body>
	
