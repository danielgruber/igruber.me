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
		<title>Regexp Tester</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta charset="utf-8" />
		
		<link rel="stylesheet" type="text/css" href="style.css" />
		
	</head>
	<body>
		
		<div class="document">
			<h1 class="title">RegExp-Tester</h1>
			<?php
			
			if(isset($_POST["regexp"], $_POST["value"])) {
				try {
					if(preg_match($_POST["regexp"], $_POST["value"], $matches)) {
						echo "<h1 class='success'>Result</h1><pre>";
						print_r($matches);
						echo "</pre>";
					} else {
						echo "<h1 class='error'>Result</h1>";
						echo "<p>Does not match.</p>";
						echo "<p>" . $error . "</p>";
					}
				} catch(Exception $e) {
					echo "<h1 class='error'>Result</h1>";
					echo $e->getMessage();
				}
			}
			?>
			
			<h1>Expression</h1>
			<form method="post" action="">
				<div class="form_field">
					<label for="regexp">Reg-Exp</label>
					<input type="text" id="regexp" name="regexp" value="<?php echo isset($_POST['regexp']) ? $_POST['regexp'] : ''; ?>" />
				</div>
				<div class="form_field">
					<label for="value">Text</label>
					<textarea id="value" name="value"><?php echo isset($_POST['value']) ? $_POST['value'] : ''; ?></textarea>
				</div>
				
				<input type="submit" value="Execute" />
			</form>
			
			<div class="footer">
				<a href="/">Daniel Gruber</a>
			</div>
		</div>
		
		
	</body>
</html>

