

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
<script src="<?= base_url() ?>assets/javascript/13challenges.js"></script>
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

    .submit-div {
    	width: 100%;
    }

	#right_content #diagram {
	  margin-bottom: 20px;
	  min-height: 298px;
	}
	#right_content #diagram h4 {
	  color: #444849;
	  display: inline-block;
	  margin-bottom: 6px;
	  vertical-align: top;
	  width: 100px;
	}
	#right_content #diagram form {
	  width: 100%;
	  max-height: 540px;
	  overflow: auto;
	}
	#right_content #diagram form .form_content {
	  display: inline-block;
	  height: 51px !important;
	  margin-top: 5px;
	  vertical-align: top;
	  width: 100%;
	}
	#right_content #diagram form .form_content * {
	  font-family: 'AvenirLTStd-Medium';
	  font-size: 12px;
	}
	#right_content #diagram form .form_content input[type=text] {
	  border: 0px;
	  background: #CDEAF8;
	  height: 28px;
	  float: left;
	  font-size: 14px;
	  margin-right: 11px;
	  padding: 0px 5px;
	  width: 80px !important;
	}
	#right_content #diagram form .form_content textarea {
	  border: 0px;
	  background: #CDEAF8;
	  float: right;
	  font-size: 14px;
	  height: 35px;
	  padding: 5px;
	  resize: none;
	  width: 150px !important;
	  margin-right: 15px;
	}

</style>


<body>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-3'>
				<div class='questions'>
					<h2>Progess Check</h2>
					<ul class='question-list'>
					</ul>
				</div>
			</div>
			<div class='col-lg-6'>
				<div id='problem-info'>
					<h3>Print 1-255</h3>
					<p>Write a function that would return the sum of all the number from 1 to 255 (ex. 1+2+3+...+245+255).</p>
				</div>
				<!-- text box -->
				<div id='text-editor' data-id=''>
				</div>

				<div class='submit-div'>
					<button class="btn btn-default submit-btn pull-right" type="submit">Submit</button>
					<button class="btn btn-danger reset-btn pull-right" type="submit">Reset</button>
				</div>

				<div id="middle_content_footer">
					<div class="message"><p></p></div>
					<div id="video">
						<a href="/"><img src="/assets/images/04_Video/PlayButton.png" alt="video"></a>
						<div id="video_description">
							<h3>Not quite correct. Try again or watch video for help.</h3>
							<p class="instructor">Illustration by Trey Villafane</p>
							<p class="branch_position">Mountain View Instructor</p>
						</div>
					</div>
					<div id="video_player">
						<iframe class="video_iframe" id="video_answer" src="http://player.vimeo.com/video/117231706" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>


			</div>
			<div class='col-lg-3'>
				<div id="right_content" class="content">
					<h2>T DIAGRAM</h2>

					<div id="diagram">
						<h4>Variable</h4>
						<h4>Values</h4>
						<form action="#" method="post" id="t_diagram">
							<div class="form_content">
								<input autocomplete="off" type="text" name="variable" placeholder="(e.g. x)">
								<textarea name="value" placeholder="(e.g. 3, 5, 7, 4)"></textarea>
								<div class="clear"></div>
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>