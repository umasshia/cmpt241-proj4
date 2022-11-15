<?php include("top.html"); ?>


<?php
	//Getting the information entered in the sign up page and assigning it to variables
	$name = $_POST["name"];
	$gender = $_POST["gender"];
	$age = $_POST["age"];
	$personality = $_POST["personality"];
	$os = $_POST["os"];
	$min = $_POST["min"];
	$max = $_POST["max"];
	$data = $name.",".$gender.",".$age.",".$personality.",".$os.",".$min.",".$max;
	//Writing the information to the .txt file
	file_put_contents("singles.txt", "\n".$data, FILE_APPEND);
?>

<!-- Outputing the welcome message specific to the user's name -->
<div>
	<h1>Thank you!</h1>
	<p>
	Welcome to NerdLuv, <?= $name ?>!
	<br /><br />
	Now <a href="matches.php">log in to see your matches!</a>
	</p>
</div>

<?php include("bottom.html"); ?>