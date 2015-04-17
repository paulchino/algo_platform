<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('question');
		//$this->output->enable_profiler();
	}

	public function index()
	{
		//grab all the questions
		//$questions['all_questions'] = $this->question->show();
		$this->load->view("algo-2");
		//echo "Welcome to CodeIgniter. The default Controller is Main.php";
	}

	//returns json of all the questions
	public function jsonQuestions() {
		echo $this->load->view("./json/algo");
	}
}

//end of main controller