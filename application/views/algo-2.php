<html>
<head>
	<title>Prebootcamp Assessent II: Write the Codes</title>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/javascript/helpers.js"></script>
<script src="<?= base_url() ?>assets/javascript/underscore.js"></script>
<script src="<?= base_url() ?>assets/javascript/ace-builds/src-noconflict/ace.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/stylesheets/style.css">

<style type="text/css">
    .code-box { 
        /*position: absolute;*/
        width: 400px;
        height: 200px;
    }
</style>

<script type="text/javascript">
//number of questions correct, move inside document.ready
var count = 0;

//constructor for text editor
var Editor = function Editor(name) {
	this.editor = name;
	this.name = ace.edit(name);
	//question id
	this.id = "";
	//users code in string format
	this.input = "";

	this.studentEval = "";
	this.answer = "";
	this.test_cases = [];
	this.test_output = [];
	this.type = "";

	//this function will be called by the test cases
	this.casesFunction = function(shouldBeReplaced) {
		return 'error'
	}

	//the function that will be called by the test cases
	this.convertFunction = function() {
		console.log(this.input)
		console.log(typeof this.input);
		try {
			//console.log('hello');
			return eval(this.input)();
			//console.log('in ok');
			
		} catch(e) {
			console.log('in errrors');
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

Editor.prototype.getId = function(num) {
	this.id = num;
}

Editor.prototype.getVal = function() {
	//stringifys user input for eval function
	this.input = String( this.name.getValue() );
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

//----- code not used

	// this.setup = function() {
	// 	this.name.setTheme("ace/theme/monokai");
	// 	this.name.getSession().setMode("ace/mode/javascript");
	// }

	// this.eval = function() {
	// 	var evalStr = "(" + this.input +")()";
	// 	this.studentEval = this.evalCode(evalStr);
	// 	//console.log(this.studentEval);
	// }

	// this.getId = function(num) {
	// 	this.id = num;
	// }

		//going in here
	
		// } else {
		// 	this.casesFunction = function(error) {
		// 		return 'error';
		// 	}
		// }

		// try {
		// 	if (eval("[" + this.input + "]")[0]) {
		// 		this.casesFunction = eval("[" + this.input + "]")[0];
		// 	}
		// } catch(e) {
		// 	console.log('in here');
		// 	this.casesFunction = function(error) {
		// 		return 'error'
		// 	}
		// }

	// this.getVal = function() {
	// 	//this works for all cases
	// 	this.input = String( this.name.getValue() );
	// }

	// this.evalCode = function(code) {
	// 	try {
	// 		//console.log(code);
 //    		return eval(code); 
	// 	} catch (e) {
	//     	//if (e instanceof SyntaxError) {
	//         	return 'error'
	//     	//} 
	// 	}
	// }


$(document).ready(function() {
	var editors = [];
	var studentSubmittal = {}, allQuestion = [];

	$.get("main/jsonQuestions", function(data) {
		var easy = randomQuestions(data,'easy',3);
		var medium = randomQuestions(data,'medium',2);
		var hard = randomQuestions(data,'hard',2);
		allQuestions = easy.concat(medium,hard);
		//console.log(allQuestions);

		str = appendQuestions(allQuestions);
		$('#questions').append(str);

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

			//add the question id to the editor instances
			editors[i].getId($(jqueryID).attr('data-id'));
			
			editors[i].type = allQuestions[i].type;

			//if answer type='array' convert the answer to an array and append
			if (allQuestions[i].type == "array") {
				editors[i].answer = JSON.parse(allQuestions[i].answer);
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
    	var con = confirm("Confirm submittal");
    	if (con) {
    		for(var i=0;i<editors.length;i++) {
    			//users code is input into instance
    			//this is a string
    			editors[i].getVal();

    			//based on the instance type the eval will be different
    			if (editors[i].type == 'number' || editors[i].type == 'string') {
    				editors[i].eval();	

    			    if (_.isEqual(editors[i].answer, editors[i].studentEval) || editors[i].answer == editors[i].studentEval)  {
    					console.log('question ' + i + ' is correct');
    					count++;
    				}
    			} else if (editors[i].type == "function") {
    				//this evals the string function, converts it into a function and 
    				//save it this.casesFunction
    				editors[i].convertFunction();
    				console.log('this is after convert function');
    				console.log(editors)

    				//loop through each test case and run the this.casesFunction through it
    				var flag = true;
    				for(var j=0; j<editors[i].test_cases.length; j++) {
    					console.log('inside question ' + i);
    					console.log('line 212!!!!!!!!');
    					console.log(editors[i].casesFunction(editors[i].test_cases[j]));
    				// 	var result = editors[i].casesFunction(editors[i].test_cases[j]);
    				// 	if (result != editors[i].test_output[j]) {
    				// 		console.log('test case incorrect for case' + j );
    				// 		flag = false;
    				// 	}
    				// 	//if (editors[i].casesFunction(editors[j].test))
    				// }
    				// if (flag) {
    				// 	console.log('answer' + i + 'is correct');
    				// 	count++;
    				}
    			}
    		}
    	}
    	console.log(editors);
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