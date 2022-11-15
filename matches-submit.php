<?php include("top.html"); ?>

<?php
//Function to print the matches of the user
	function printMatches() {
		//Creating variable for user info
		$userInfo = "";
		//Going over the whole .txt file
		foreach(file("singles.txt",FILE_IGNORE_NEW_LINES) as $userInfo) {
			//Variable for the name in a certain line in the file
			$exploded = explode(",", $userInfo);
			//If the names match, we found the user and the loop stops
			if($_GET["name"] == $exploded[0]) {
				break;
				}
		}
		//Variable storing the user's different data in an array
		$user = explode(",", $userInfo);
		//Going over the file again to find matches
	foreach(file("singles.txt", FILE_IGNORE_NEW_LINES) as $matchInfo) {
		//Three variables.
		//One that stores the potential match's info in an array
		//And two for the user's and the match's personality type split into letters
		$match = explode(",", $matchInfo);
		$splituser = str_split($user[3]);
		$splitmatch = str_split($match[3]);
			if ( 
				//Making sure a match is not the user themselves
				   $user[0] != $match[0]
				//Making sure the genders are opposite
				&& $user[1] != $match[1]
				//Making sure both people match each-other's age preferences
				&& $user[2] >= $match[5]
				&& $user[2] <= $match[6]
				&& $match[2] >= $user[5]
				&& $match[2] <= $user[6]
				//Making sure the Operating Systems match
				&& $user[4] == $match[4]
				//Comparing each letter in the personality type
				&& ($splituser[0] == $splitmatch[0]
					|| $splituser[1] == $splitmatch[1]
					|| $splituser[2] == $splitmatch[2]
					|| $splituser[3] == $splitmatch[3]
					)
				) { 
?>
				<!-- If everything matches, printing the person's info -->
					<p><img src='user.jpg' alt='user icon'><?= $match[0] ?></p>
					<ul>
						<li><strong> gender: </strong><?= $match[1] ?></li>
						<li><strong> age: </strong><?= $match[2] ?></li>
						<li><strong> type: </strong><?= $match[3] ?></li>
						<li><strong> OS: </strong><?= $match[4] ?></li> 
					</ul>
					<?php
					}
		}
	}
					?>
<!-- Calling the above written function -->
<h1>Matches for <?= $_GET["name"] ?></h1>
<div class='match'>

    <?php printMatches(); ?>
</div>

<?php include("bottom.html"); ?>