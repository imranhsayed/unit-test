<?php
$user_name = file_get_contents( 'file.php' );
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="instructions-section">
	<div class="instructions-image">
		<img src="images/instructions.gif" alt="">
	</div>
	<div class="instructions">

		<ul>
			<li><?php echo "Hi, $user_name!"; ?></li>
			<li>Welcome to the Online Test Programme developed by Mr Imran Sayed.</li>
			<li>Please read the instructions carefully before beginning the test</li>
			<li>There are 20 questions in the set. Each question has 4 options out of which 1 is correct answer.</li>
			<li>Each question has been alloted 5 marks and its a total of 100 marks test.</li>
			<li>Marks required to pass the test is 80</li>
			<li>It is a time based test. You will be able to see the timer at the top of the screen when you begin test</li>
			<li>If you are not able to complete the test within the required time then the test will automatically be closed and submitted when the time is over.</li>
			<li>So accuracy with efficiency is required while giving the test</li>
			<li>Note: Once you go to the next page ,you cannot hit the back button and come back to the previous page</li>
			<li>At the end of your test, you will be able to see your scores and the correct answers to the question</li>
			<li>At the end of the test, your scores along with answers you have given will be sent to the Organizer of the test</li>
			<li>All the Best! You can begin test now</li>


		</ul>
	</div>
	<div class="button-div">
		<button class="instructions-button submit-button"><a href="test-page.php">Begin Test</a></button>
	</div>

<script src="jquery.js"></script>
</body>
</html>
