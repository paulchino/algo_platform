

<html>
<head>
	<title>Algo 3. 13 Questions</title>
</head>

<script src="<?= base_url() ?>assets/javascript/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/javascript/underscore.js"></script>
<script src="<?= base_url() ?>assets/javascript/editor-class.js"></script>
<script src="<?= base_url() ?>assets/javascript/ace-builds/src-noconflict/ace.js"></script>
<script src="<?= base_url() ?>assets/javascript/helpers.js"></script>
<script src="<?= base_url() ?>assets/javascript/algo_helpers.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/stylesheets/style.css">

<style type="text/css">
    #text-editor { 
        /*position: absolute;*/
        margin-top: 40px;
        width: 100%;
        height: 400px;
        border-radius: 8px
    }

    .btn {
    	margin: 10px;
    }

</style>

<script type="text/javascript">

$(document).ready(function() {
		var jsondata;
		$.get("/main/algoQuestions", function(data) {
			jsondata = data.data;
			algohelper.appendlist(jsondata);
		}, "json");

	var editor = new Editor('text-editor');
	editor.setup();

	//from db there is a level_id which details where the student should start
	$(document).on("click", ".question-list li", function() {
		var id = ($(this).attr('data-id'));
		editor.setId(id);

		//pull out the object that has the id that matches
		var questObj = algohelper.getJsonObj(jsondata,id);

		//either number, array, string, or function
		editor.type = questObj.type

		//add the problem id as attr and put placeholder value in editor
		$('#text-editor').attr('data-id', id);
		editor.name.setValue(questObj.placeholder);

		//add the test input and output to editor.test_cases and editor.test_output
		if(questObj.type == 'function') {
			editor.test_cases = questObj.test_cases;
			editor.test_output = questObj.test_output;
		} else {
			editor.answer = questObj.answer;
		}

		//check to see if the updates are made
		console.log(editor);

		$('#problem-info').empty().html(algohelper.addDescription(jsondata,id));
	})

	$('.submit-btn').click(function() {
		console.log( editor.name.getValue() );
		//save the users input in a string to editor.input
		editor.getVal();
		console.log('this is the input');
		console.log(editor.input);
		algohelper.checkAnswer(editor);
	})

	$('.reset-btn').click(function() {
		var con = confirm('Are you sure you want to reset your code?');
		if (con) {
			var id = $('#text-editor').attr('data-id');
			var questObj = algohelper.getJsonObj(jsondata,id);
			console.log(questObj);
			//set the value to 
			editor.name.setValue(questObj.placeholder);


		}
	})
})

</script>

<body>
	<div class='container'>
		<div class='row'>
			<div class='col-md-3'>
				<div class='questions'>
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
				<div id='problem-info'>
					<h3>Print 1-255</h3>
					<p>Write a function that would return the sum of all the number from 1 to 255 (ex. 1+2+3+...+245+255).</p>
				</div>
				<!-- text box -->
				<div id='text-editor' data-id=''>
				</div>

				<div class='submit-div pull-right'>
					<button class="btn btn-danger reset-btn" type="submit">Reset</button>
					<button class="btn btn-default submit-btn" type="submit">Submit</button>
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