var unitTest = {
	formEl: 'null',

	init: function () {
		window.addEventListener( 'load', unitTest.beginTimer );
		unitTest.changeResultPos();
		setTimeout( "unitTest.preventBack()", 0 );
		window.onunload = function () {
			null
		};
	},
	/**
	 * prevents the user from executing back button
	 */
	preventBack: function () {
		window.history.forward();
	},

	changeResultPos: function () {
		var testResultsEl = document.querySelector( '.test-results' ),
			formEl = document.getElementById( 'quiz' ),
			body = document.querySelector( 'body' );
		body.insertBefore( testResultsEl, formEl );
	},

	beginTimer: function () {
		var timer = 10 * 60, //duration of test in sec
			timerDiv = document.querySelector( '.timer-div' ),
			intervalName;

		if ( $( '#final-instruction' ).length ) {
		    return;
		}
		intervalName = setInterval( function () {
				timer--;
				timerDiv.textContent = timer;
				if ( 0 >= timer ) {
					clearInterval( intervalName );
					//auto clicking on quiz form submit button when time is over.
					$( '.quiz-submit-btn' ).click();
				}
			}, 1000  );
	}

};

unitTest.init();
