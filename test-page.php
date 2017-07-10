<?php
	include "functions.php";
	get_header();
?>

<!--Quiz section-->
	<div class="quiz-pic">
		<img src="images/quiz-pic.gif" alt="#">
	</div>
	<form action="<?php echo $_SERVER[ 'PHP_SELF' ]?>" name="test-form" method="post" id="quiz">
		<ul>
			<?php
				//Initializing counter
				$count = 0;

				//iterating through multidimensional $questions array
				foreach ( $questions as $key=>$value ) {

					$count++;
					//input name
					$name = "question-$count";

					//Question number and name
					echo "<h3>Q.$count-$key</h3>";

							//iterating through array of $keys of array $questions
							foreach ( $value as $key_var=>$value_var ) {
								//not displaying answer key-value pair
								if ( 'correct-answer' != $key_var ) {

									echo "<li>
											<div>
												<label for=$name >
												<input type='radio' name=$name value='$key_var'";
													 if ( isset( $_POST[ 'submit' ] ) && !empty( $_POST[ $name ] ) && $key_var == $_POST[ $name ] ) {
															echo "checked";
													 }

									            echo "> $key_var- $value_var
												</label>
											</div>
		                                 </li>";
								} else {
									//pushing question and correct answer into $correct_answer array
									$correct_answer_array[ $key ] = $value_var;
								}
							}
				}
			?>
			<li>
		</ul>

		<?php
			//Not displaying submit button if the form is submitted
			if ( !isset( $_POST[ 'submit' ] ) && empty( $_POST[ 'submit' ] ) ) { ?>
			<div class="submit-quiz">
				<input type="submit" name="submit" value="Submit Quiz" class="submit-button quiz-submit-btn" />
			</div>
		<?php }	?>

	</form>
	<!--End of Quiz Section-->

	<!--Result Section-->
	<div class="test-results">
		<?php
		//initializing $score, $counter, and $correctly_answered
		$score = 0;
		$counter = 0;
		$correctly_answered = 0;
		array_push( $result_array, 'username: ' . $user_name );
		echo "Hi $user_name!</br>";
		echo "Time Remaining : <div class='timer-div'></div>";

		//checking if the form is submitted
		if ( isset( $_POST[ 'submit' ] ) && !empty( $_POST[ 'submit' ] ) ) {
			echo "Thank You for giving the Test  Scroll Down to know your scores</br></br>";

			//iterating through $correct_answer array to display correct answer and add score
			foreach ( $correct_answer_array as $key_array => $val_array ) {
				$counter++;
				$question_name = "question-$counter";
				if ( isset( $_POST[ $question_name ] ) && !empty( $_POST[ $question_name ] ) ) {
					$comment =  "The Correct Answer to <strong>Q.$counter- $key_array </strong>was : $val_array, while you selected : {$_POST[ $question_name ]} </br> ";
					array_push( $result_array, $comment );
					echo $comment;
				}
				//adding score if answered correctly
				if (  isset( $_POST[ $question_name ] ) && !empty( $_POST[ $question_name ] ) &&  $val_array == $_POST[ $question_name ]  ) {
					$score += 5;
				}
			}
			$correctly_answered = $score / 5;
			$final_comment = "You answered $correctly_answered question(s) correctly </br> You scored : $score / 100 points";
			array_push( $result_array, $final_comment );
			echo "<p id='final-instruction'> $final_comment</p>";
			if ( 79 > $score ) {
			    echo "<p class='failed-test'>Sorry You Failed in the test. The passing marks was 80</p>";
			} else {
				echo "Congratulations you passed the test";
			}
		}


		//sending email containing result to Organizer
		//message
		$msg = '';
		foreach ( $result_array as $array_value ) {
			$msg .= "$array_value </br>";
		}
		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap( $msg, 70 );

		// send email
		mail("sayedwp@gmail.com, ghafir.sayed@gmail.com ","Test result for: $user_name ", $msg );

		?>
	</div>
<script src="jquery.js"></script>
<script src="javascript.js"></script>
</body>
</html>
