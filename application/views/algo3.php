

<html>
<head>
	<title>Algo 3. 13 Questions</title>
</head>

<!-- bring in jquery minified -->
<script src="<?= base_url() ?>assets/javascript/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/javascript/underscore.js"></script>
<script src="<?= base_url() ?>assets/javascript/ace-builds/src-noconflict/ace.js"></script>
<script src="<?= base_url() ?>assets/javascript/helpers.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/stylesheets/style.css">

<style type="text/css">
    #text-editor { 
        /*position: absolute;*/
        margin-top: 40px;
        width: 550px;
        height: 400px;
        border-radius: 8px

    }


</style>

<script type="text/javascript">

$(document).ready(function() {
		var jsondata;
		$.get("/main/algoQuestions", function(data) {
			//console.log(data.data);
			jsondata = data.data;
			var str = "";
			_.each(data.data, function(e,i) {
				str += "<li data-id = " + "'" + e.id + "'>" + e.title + "</li>";
			});
			$('.question-list').html(str);
		}, "json");

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

	Editor.prototype.setId = function(num) {
		this.id = num;
	}

	Editor.prototype.getVal = function() {
		//stringifys user input for eval function
		var re = /(function\s+.*\(\)\s+{)(.*)/;
		var str = this.name.getValue();
		this.input = String( str.replace(re, '$1\n     \'use strict\';\n$2') );
	}

	//place text editor in center
	var editor = new Editor('text-editor');
	editor.setup();

	//from db there is a level_id which details where the student should start
	$(document).on("click", ".question-list li", function() {
		var id = ($(this).attr('data-id'));
		editor.setId(id);
		console.log(id);
		//based on the data-id append the partial code to the text editor

		console.log(jsondata);
		//pull out the object that has the id that matches
		var questObj = getJsonObj(jsondata,id);

		editor.name.setValue(questObj.placeholder);
		//editor
		$('#text-editor').attr('data-id', id);
		

		//put the data id in the text editor div


	})

})

$(document)
</script>

<body>
	<div class='container'>
		<div class='row'>
			<div class='col-md-3'>
				<div class='questions'>
					<h2>Bootcamp</h2>
					<h2>Progess Check</h2>
					<ul class='question-list'>
<!-- 						<li data-id='401'>Print 1-255</li>
						<li data-id='402'>Print Sum</li>
						<li data-id='403'>Odd Numbers</li>
						<li data-id='404'>Iterate through the array</li>
						<li data-id='405'>Find Max</li>
						<li data-id='406'>Find Average</li>
						<li data-id='407'>Greater than Y</li>
						<li data-id='408'>Square the Values</li>
						<li data-id='409'>Eliminate Negative Numbers</li>
						<li data-id='410'>Max, Min, and Average</li>
						<li data-id='411'>Swap Values in the Array</li>
						<li data-id='412'>Number to String</li> -->
					</ul>
				</div>
			</div>
			<div class='col-md-6'>
				<!-- text box -->
				<div id='text-editor' data-id=''>
				</div>


			</div>
			<div class='col-md-3'>
				<div class='t-diagram'>
					<h3>T-Diagram</h3>

				</div>
			</div>

		</div>

	</div>

</body>
</html>