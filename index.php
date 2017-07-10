<?php
include "functions.php";
get_header();
?>

<div class="test-knowledge-img">
	<img src="images/test-your-knowledge.png" alt="#">
</div>
<form class ="login-form" action="" method="post">
	<ul>
		<li>
		<div>
			<label for="username">Username</label></br>
			<input type="text" name="username" id="username">
		</div>
		<div>
			<label for="password">Password</label></br>
			<input type="password" name="password">
			<?php
			/**
			 * If user enters a correct password and clicks on login direct them to test page.
			 */
			if ( isset( $_POST[ 'login' ] ) && !empty( $_POST[ 'login' ] ) && ( 'kajukamajalo' != $_POST[ 'password'] ) ){

      			echo "</br>" . '<p class="error-message"> ' . "Incorrect password" . '</p>';
			}

			?>
		</div>
		<div class="login-submit-div">
			<input type="submit" name="login" class="submit-button">
		</div>
		</li>
	</ul>
</form>
<?php get_footer(); ?>
