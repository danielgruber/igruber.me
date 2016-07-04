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
		<title>Substr Tester</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta charset="utf-8" />
		
		<link rel="stylesheet" type="text/css" href="style.css" />
		
	</head>
	<body>
		
		<div class="document">
			<h1 class="title">Substr-Tester</h1>
			<?php
			
			if(isset($_POST["substr"], $_POST["start"])) {
				
				?><h1 class="success">Result</h1><pre><?php
					echo substr($_POST["substr"], $_POST["start"], $_POST["length"] != "" ? $_POST["length"] : strlen($_POST["substr"]));
				?></pre><?php
			}
			?>
			
			<h1>String</h1>
			<form method="post" action="">
				<div class="form_field">
					<label for="string">String</label>
					<input type="text" id="string" name="substr" value="<?php echo isset($_POST['substr']) ? $_POST['substr'] : ''; ?>" />
				</div>
				<div class="form_field">
					<label for="start">Start</label>
					<textarea id="start" name="start"><?php echo isset($_POST['start']) ? $_POST['start'] : ''; ?></textarea>
				</div>
				<div class="form_field">
					<label for="length">Length</label>
					<textarea id="length" name="length"><?php echo isset($_POST['length']) ? $_POST['length'] : ''; ?></textarea>
				</div>
				
				<input type="submit" value="Execute" />
			</form>
			
			<div class="footer">
				<a href="/">Daniel Gruber</a>
			</div>
		</div>
		
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-35626092-1']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>
		
	</body>
</html>

