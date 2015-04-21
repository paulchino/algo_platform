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
		$this->load->view("algo2");
	}

	//returns json of all the questions
	public function jsonQuestions() {
		echo $this->load->view("./json/algo");
	}

	public function codes() {
		$this->load->view("algo3");
	}

	//returns json of 13 questions
	public function algoQuestions() {
		echo $this->load->view("./json/json_algo3");
	}
}

//end of main controller