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

			//reset the t-diagram
			$("#t_diagram").html('<div class="form_content"> \
					<input autocomplete="off" type="text" name="variable" placeholder="(e.g. x)"> \
					<textarea name="value" placeholder="(e.g. 3, 5, 7, 4)"></textarea> \
					<div class="clear"></div> \
				</div>');
		}
	})


	//t diagram
	//add new inputs fields in t_diagram once a user inputs a variable
	$('#t_diagram').on('blur', '.form_content input', function(){
		var diagram_variable = $(this);

		if((diagram_variable.val()) != '' && ! diagram_variable.hasClass('with_content'))
		{
			diagram_variable.addClass('with_content');
			$('#t_diagram').append('<div class="form_content"> \
				<input autocomplete="off" type="text" name="variable" placeholder="(e.g. x)"> \
				<textarea name="value" placeholder="(e.g. 3, 5, 7, 4)"></textarea> \
				<div class="clear"></div> \
			</div>');
		}
	});
})
