<html>
<head>
	<title>Prebootcamp Assessent II: Write the Codes</title>
</head>

<!-- bring in jquery minified -->
<script src="<?= base_url() ?>assets/javascript/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/javascript/underscore.js"></script>
<script src="<?= base_url() ?>assets/javascript/ace-builds/src-noconflict/ace.js"></script>
<script src="<?= base_url() ?>assets/javascript/helpers.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/stylesheets/style.css">

<style type="text/css">
    .code-box { 
        /*position: absolute;*/
        width: 600px;
        height: 200px;
        border-radius: 8px
    }
</style>

<script type="text/javascript">
var strict = 'hello world';


$(document).ready(function() {

	var Editor = function Editor(name) {
		this.editor = name;
		this.name = ace.edit(name);
		//question id
		this.id = "";
		//users code in string format
		this.input = "";
		//eval student code for non function types
		this.studentEval = "";
		//json answer if type number or string
		this.answer = "";
		//cases for the function type questions
		this.test_cases = [];
		this.test_output = [];
		//either number, string, array, or function
		this.type = "";

		//runs the test cases for the type function problems
		this.test_function = function() {

		}

		//the converts the users string to a function and saves to this.test_function
		this.convertedFunction = function() {
			//console.log(this.input)
			//console.log(typeof this.input);
			try {
				var test = eval("[" + this.input + "]")[0];
				test(this.test_cases[0]);

				this.test_function = eval("[" + this.input + "]")[0];
				//console.log(typeof this.test_function);
				//console.log('hello');
			} catch(e) {
				console.log('this is in the function errors');
				this.test_function = function(errors) {
					console.log('syntax error')

				}
			}
		}
	}
	//----- Setups text editor setttings
	Editor.prototype.setup = function() {
		this.name.setTheme("ace/theme/monokai");
		this.name.getSession().setMode("ace/mode/javascript");
	}

	//------ used for type string, num, and arr eval
	Editor.prototype.eval = function() {
		var evalStr = "(" + this.input +")()";
		this.studentEval = this.evalCode(evalStr);
	}

	//takes string and evals - used for type numbers, strings, and arrays
	Editor.prototype.evalCode = function(code) {
		try {
			return eval(code); 
		} catch (e) {
	    	//if (e instanceof SyntaxError) {
	        	return 'error'
	    	//} 
		}
	}

	Editor.prototype.getId = function(num) {
		this.id = num;
	}

	Editor.prototype.getVal = function() {
		//stringifys user input for eval function
		var re = /(function\s+.*\(\)\s+{)(.*)/;
		var str = this.name.getValue();
		this.input = String( str.replace(re, '$1\n     \'use strict\';\n$2') );
	}

	//array of instances
	var editors = [];
	var allQuestion = [];

	$.get("/main/jsonQuestions", function(data) {
		var easy = randomQuestions(data,'easy',3), medium = randomQuestions(data,'medium',2), hard = randomQuestions(data,'hard',2);
		allQuestions = easy.concat(medium,hard);
		console.log('this is questions');
		console.log(allQuestions);

		var strAppend = appendQuestions(allQuestions);
		$('#questions').append(strAppend);

		var editor0 = new Editor('editor0');
		var editor1 = new Editor('editor1');
		var editor2 = new Editor('editor2');
		var editor3 = new Editor('editor3');
		var editor4 = new Editor('editor4');
		var editor5 = new Editor('editor5');
		var editor6 = new Editor('editor6');

		editors.push(editor0, editor1, editor2, editor3, editor4, editor5, editor6);

		for(var i=0; i<editors.length; i++) {
			editors[i].setup();
			var jqueryID = "#" + editors[i].editor;
			editors[i].getId($(jqueryID).attr('data-id'));	
			editors[i].type = allQuestions[i].type;

			//if answer type='array' convert the answer to an array and append
			if (allQuestions[i].type == "array" || allQuestions[i].type == "string") {
				editors[i].answer = allQuestions[i].answer;
				//editors[i].answer = JSON.parse(allQuestions[i].answer);
			} else if (allQuestions[i].type == "function") {
				editors[i].test_cases = allQuestions[i].test_cases;
				editors[i].test_output = allQuestions[i].test_output;
			} else {
				editors[i].answer = allQuestions[i].answer;	
			}
		}
		console.log(editors);
	}, "json");

    $('#submit').click(function() {
    	//determines how many question correct
    	var algo_count_score = 0;

    	var con = confirm("Confirm submittal");
    	if (con) {
    		for(var i=0;i<editors.length;i++) {
    			//users code is input into instance as a string
    			editors[i].getVal();

    			// really need to close the users input off so their code does not access global variables

    			//based on the instance type the eval will be different
    			if (editors[i].type == 'number' || editors[i].type == 'string' || editors[i].type == 'array') {
    				editors[i].eval();	

    			    if ( _.isEqual(editors[i].answer, editors[i].studentEval) )  {
    					console.log('question ' + i + ' is correct. Is type number|string|array');
    					console.log('the answer is: ' + editors[i].answer );
    					algo_count_score++;
    				} else {
    					console.log('question ' + i + ' is wrong. Is type number|string|array');
    					console.log('answer: ' + editors[i].answer);
    					console.log('input: ' + editors[i].studentEval);
    				}

    			} else if (editors[i].type == "function") {
    				console.log('question ' + i + ' is a function type' );

    				//this takes the string input, converts it into a function and saves it to this.convertFunction() 
    				editors[i].convertedFunction();

    				console.log(editors);

    				//loop through each test case and run the this.testFunction through it
    				var flag = true;
    				for(var j = 0; j < editors[i].test_cases.length; j++) {
    					console.log('inside question ' + i);
    					//console.log('line 212!!!!!!!!');
    					console.log(editors[i].test_function(editors[i].test_cases[j]));

    					var result = editors[i].test_function(editors[i].test_cases[j]);
    					if (result != editors[i].test_output[j]) {
    						console.log('test case incorrect for case' + i );
    						console.log('answer: ' + editors[i].test_cases[j]);
    						console.log('input: ' + result);    						
    						flag = false;
    					}
    					//if (editors[i].casesFunction(editors[j].test))
    				}
    				if (flag) {
    					console.log('answer' + i + 'is correct');
    					algo_count_score++;
	    			} else {
	    				console.log('error in one of the editor question types');
						console.log('answer: ' + editors[i].test_cases[j]);
						console.log('input: ' + result);    	
	    			}
	    		}
    		}
    	}
    	console.log('your score is ' + algo_count_score);
    })
})
</script>

<body>
	<div>
		<h2>Prebootcamp Assessment II: Write the Codes</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>

	<div id='questions'>
<!-- 		<div class='easy'>
			<h2>Easy</h2>
		</div>
		<div class='intermediate'>
			<h2>Intermediate</h2>
		</div>
		<div class='hard'>
			<h2>Difficult</h2>
		</div> -->

	</div>

	<button id='submit'>submit</button>

</body>
</html>