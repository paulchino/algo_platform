var Editor = function Editor(name) {
		this.editor = name;
		this.name = ace.edit(name);

		//question id
		this.id = "";
		//users code in string format
		this.input = "";

		//eval answer 
		this.studentEval = "";
		//compared with the studentEval answer
		this.answer = "";

		//cases for the function type questions
		this.test_cases = [ ];
		this.test_output = [ ];
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
			} catch(e) {
				console.log('there was an error running this function');
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
		document.getElementById('text-editor').style.fontSize='14px';
	}

	Editor.prototype.setId = function(num) {
		this.id = num;
	}

	//stringifys user input for eval function.
	Editor.prototype.getVal = function() {
		var re = /(function\s+.*\(\)\s+{)(.*)/;
		var str = this.name.getValue();
		this.input = String( str.replace(re, '$1\n     \'use strict\';\n$2') );
		if (this.type == 'number' || this.type == 'array' || this.type == 'string') {
			this.input = "(" + this.input +")()";
		}
	}

	//------ takes string and evals - used for type numbers, strings, and arrays
	Editor.prototype.evalCode = function(code) {
		try {
			return eval(code); 
		} catch (e) {
	    	//if (e instanceof SyntaxError) {
	        	return 'error'
	    	//} 
		}
	}

	//------ used for type string, num, and arr eval
	Editor.prototype.eval = function() {
		this.studentEval = this.evalCode(this.input);
	}