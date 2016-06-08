<?php
	ini_set("display_errors", 1);
	error_reporting(0);
	
	$error = "";
	function ErrorHandler($errno, $errstr, $errfile, $errline, $errcontext) {
		$GLOBALS["error"] = $errstr;
	}	
	set_error_handler("errorhandler");
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<title>Daniel Gruber Tools</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta charset="utf-8" />
		
		<link rel="stylesheet" type="text/css" href="style.css" />
		
	</head>
	<body>
		
		<div class="document">
			<h1 class="title">Tools</h1>
			<ul class="tools">
			<?php
			
			$files = scandir("./");
			
			foreach($files as $file) {
				if(preg_match("/(.*)\.php$/i", $file, $matches) && $file != "index.php") {
					echo '<li><a href="./' . $file . '">'.$matches[1].'</a></li>';
				}
			}
			
			?>
			</ul>
			
			<div class="footer">
				<a href="/">Daniel Gruber</a>
			</div>
		</div>
		
		
	</body>
</html>

