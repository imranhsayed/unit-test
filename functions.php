<?php

function get_header( ) {
	include "header.php";
}

function get_footer( ) {
	include "footer.php";
}

/**
 * For index.php
 * If user enters a correct password and clicks on login direct them to test page.
 */
if ( isset( $_POST[ 'login' ] ) && !empty( $_POST[ 'login' ] ) && ( 'wintersoldier' == $_POST[ 'password'] ) ) {
	$username = $_POST[ 'username' ];
	$file = "file.php";
	unlink( $file );
	file_put_contents( $file, $username. PHP_EOL, FILE_APPEND );
	header( 'Location: instructions.php' );
}


/**
 * For test-page.php
 */
$user_name = file_get_contents( 'file.php' );
//Created an empty array $correct_answer_array to store question name and correct answer.
$correct_answer_array = array( );
$result_array = array();

$questions = array(
	'What is Javascript?' => array(
		'a' => 'Javascript is a programming language that makes the website dance',
		'b' => 'Javascript is a scripting language that can do magic',
		'c' => 'Javascript is a programming language that controls the behaviour of the website',
		'd' => 'None of the above',
		'correct-answer' => 'c'
	),

	'What was the earlier name of Javascript and who invented it?' => array(
		'a' => 'Javascript earlier name was Moches or LiveScript and it is was written by Brendan Eic in 10 days',
		'b' => 'Javascript earlier name was Mocha or LiveScript and it is was written by James Reig in 10 days',
		'c' => 'Javascript earlier name was Mocha or LiveScript and it is was written by Brendan Eic in 10 days',
		'd' => 'None of the above',
		'correct-answer' => 'c'
	),

	'In 1996-97 Javascript was taken to ECMA who released ECMAScript or ES.What is the full form of ECMA and why was ES created?' => array(
		'a' => 'ECMA (European Computer Manufacturers Association) created ES to standardize JavaScript and to foster(/promote) multiple independent implementations.',
		'b' => 'ECMA (European Communications Manufacturers Association) created ES to standardize JavaScript and to foster(/promote) multiple independent implementations.',
		'c' => 'ECMA (European Computer Manufacturers Agency) created ES to standardize JavaScript and to foster(/promote) multiple independent implementations.',
		'd' => 'None of the above',
		'correct-answer' => 'a'
	),

	'What are the six Primitive data types according to ES6?' => array(
		'a' => 'Boolean, Undefined, Object, Null, String, Symbols',
		'b' => 'Boolean, Undefined, Constants, Null, String, Symbols',
		'c' => 'Boolean, Undefined, Object, Null, Functions, Symbols',
		'd' => 'Boolean, Undefined, Number, Null, String, Symbols',
		'correct-answer' => 'd'
	),

	'What are Objects?' => array(
		'a' => 'Objects are collection of properties excluding arrays and functions',
		'b' => 'Objects are collection of properties including arrays and functions',
		'c' => 'Objects have properties and methods',
		'd' => 'Both b and c',
		'correct-answer' => 'd'
	),

	'parseInt( \'string\', 10  ) converts String into integer .Why do we pass 10 as second parameter?' => array(
		'a' => 'we should always pass 10 as second parameter to tell the system that we a dealing with integer based numbers',
		'b' => 'we should always pass 10 as second parameter to tell the system that we a dealing with decimal based numbers',
		'c' => 'we should always pass 10 as second parameter to tell the system that we a dealing with decimal dancing numbers',
		'd' => 'we should always pass 10 as second parameter to tell the system that we a dealing with decimal 10 digit number',
		'correct-answer' => 'b'
	),

	'What does array.unshift method do ?' => array(
		'a' => 'It will add a value at the begining of the array',
		'b' => 'It will remove a value from the begining of the array',
		'c' => 'It will remove a value from the end of the array',
		'd' => 'It will unshift the complete array',
		'correct-answer' => 'a'
	),

	'What is Coercion?' => array(
		'a' => 'Javascript converts values from one data type to another automatically during multiplication only. This process is called Coercion  .e.g Coercion happens if we use 2 plus signs ( ++ ).',
		'b' => 'both a and c',
		'c' => 'Javascript converts values from one data type to another automatically during comparision. This process is called Coercion  .e.g Coercion happens if we use 2 equal signs ( == ).',
		'd' => 'None of the above',
		'correct-answer' => 'c'
	),

	'In the forloop expression for( initialization, z, increment ) { //code }, what should be written instead of z ?' => array(
		'a' => 'condition',
		'b' => 'cooperation',
		'c' => 'concatination',
		'd' => 'coercion',
		'correct-answer' => 'a'
	),

	'What is a for In Loop?' => array(
		'a' => 'Its is a loop that iterates through the properties of a constant',
		'b' => 'Its is a loop that iterates through the properties of a function',
		'c' => 'Its is a loop that skips through the properties of an object',
		'd' => 'Its is a loop that iterates through the properties of an object',
		'correct-answer' => 'd'
	),

	'What is the difference between methods and functions?' => array(
		'a' => 'They are the same',
		'b' => 'Functions outside an object is called function and Functions inside an object are called methods',
		'c' => 'Self executing functions are called methods',
		'd' => 'Both b and c',
		'correct-answer' => 'b'
	),

	'What is the difference between localStorage and sessionStorage Object ?' => array(
		'a' => 'localStorage stores local clothes and sessionStorage stores designer clothes',
		'b' => 'localStorage stores numbers and sessionStorage stores objects',
		'c' => 'localStorage object stores the data with no expiration date and sessionStorage object stores the data for only one session',
		'd' => 'both b and c',
		'correct-answer' => 'c'
	),

	'What is a DOM?' => array(
		'a' => 'DOM is an API (messenger) for HTML ,that represents webpage(document) as a free of object. DOM is the API or layer between the source code and what we see in the browser itself.',
		'b' => 'DOM is Don',
		'c' => 'DOM is an API (carrier) for HTML ,that represents webpage(document) as a tree of oranges. DOM is the API or layer between the source code and what we see in the television itself.',
		'd' => 'DOM is an API (messenger) for HTML ,that represents webpage(document) as a tree of object. DOM is the API or layer between the source code and what we see in the browser itself.',
		'correct-answer' => 'd'
	),

	'What is API?' => array(
		'a' => 'API ( Application Programming Interface) :In simple words API  is a messenger that takes your request to the system and tells it what to do and the delivers what you requested for.',
		'b' => 'API ( Application Procedural Interface) :In simple words API  is a messenger that takes your request to the system and tells it what to do and the delivers what you requested for.',
		'c' => 'API is a set of functions and procedures that allow the creation of applications which access the features or data of an operating system, application, or other service.',
		'd' => 'both a and c',
		'correct-answer' => 'd'
	),

	'Everything we can change in the document are nodes. These nodes have their specific number. Element Nodes has no 1 .What number do Comment nodes have?' => array(
		'a' => '9',
		'b' => '8',
		'c' => '4',
		'd' => '3',
		'correct-answer' => 'b'
	),

	'What is .nodeValue method used for ?' => array(
		'a' => 'It is used to get the value of the attribute',
		'b' => 'It is used to get the value of the textNodes',
		'c' => 'It is used to get the value of the elementNodes',
		'd' => 'None of the Above',
		'correct-answer' => 'a'
	),

	'How will you remove a class of an element in javaScript?' => array(
		'a' => 'element.classlist.unlink( \'classname\' )',
		'b' => 'element.remove.classlist( \'classname\' )',
		'c' => 'element.classlist.remove( \'classname\' )',
		'd' => 'element.unlink.classlist( \'classname\' )',
		'correct-answer' => 'c'
	),

	'What is window.getComputedStyle( ‘element name’ ); used for?' => array(
		'a' => 'This will give all the css properties applied to that element',
		'b' => 'This will give only the first css properties applied to that element',
		'c' => 'This will give the  last css properties applied to that element',
		'd' => 'both b and c',
		'correct-answer' => 'a'
	),

	'What is the difference between Window Object and Event Object?' => array(
		'a' => 'The window object represents a closed window in a browser and Event Object allow us to run our own code when certain actions take place.',
		'b' => 'The window object represents an open window and Event Object represent a balcony.',
		'c' => 'The window object represents an open array in a browser and Event Object closed array.',
		'd' => 'The window object represents an open window in a browser and Event Object allow us to run our own code when certain actions take place.',
		'correct-answer' => 'd'
	),

	'What is the difference between beforeunload and unload events?' => array(
		'a' => 'In beforeunload The window, the document and its resources are about to be unloaded. and in unload A page has been unloaded( for body )',
		'b' => 'In beforeunload The window, the header and the footer are about to be unloaded. and in unload A page has been unloaded( for body )',
		'c' => 'both a and c',
		'd' => 'None of the above',
		'correct-answer' => ''
	),

);

