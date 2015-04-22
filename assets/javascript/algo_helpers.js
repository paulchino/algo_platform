var algohelper = {

	appendlist: function(data) {
		var str = "";
		_.each(data, function(e,i) {
			str += "<li data-id = " + "'" + e.id + "'>" + e.title + "</li>";
		});
		$('.question-list').html(str);		
	},

	getJsonObj: function(data,id) {
		for(var i = 0; i<data.length; i ++ ) {
        	if (data[i].id == id) {
            	return data[i];
        	}
    	}
	},

	addDescription: function(data,id) {
	    var obj = this.getJsonObj(data,id);

	    var str = "<h3>" + obj.title + "</h3>";
	        str +="<p>" + obj.description + "</p>";

	    return str
	},

	checkAnswer: function(editor) {
		if(editor.type == 'function') {
			//make it into a function and save to editor.test_function
			editor.convertedFunction();

			//check the test cases
			var flag = true;
			for(var i = 0; i<editor.test_cases.length; i++) {
				var result = editor.test_function(editor.test_cases[i]);
				console.log(result);
				if(_.isEqual(result, editor.test_output[i])) {
					console.log('correct answer!')
				} else {
					console.log('incorrect answer!')
					console.log('user output: ' + result);
					console.log('correct output: ' + editor.test_output[i]);
					flag = false;
				}
			}

			if (flag) {
				alert('correct answer');
			} else {
				alert('noob');
			}
			// console.log('this is the converted function');
			// console.log(editor.test_function);
			// console.log(typeof editor.test_function);
			console.log('editor after submit button');
			console.log(editor);
		} else {
			console.log('this is not a function');
			console.log(editor);
			//have this.input evaluated
			var ans = editor.evalCode(editor.input);
			//check if equal to answer
			if(_.isEqual(ans, editor.answer)) {
				alert('correct answer');
			} else {
				alert('noob');
			}
		}
	}
}