<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_article extends CI_Controller {

	public function index() {
		$this->load->library('form_validation');

		if (isset($_POST['add'])) {
			$this->load->model('rules_model');
			$this->form_validation->set_rules($this->rules_model->add_rules);
			$check = $this->form_validation->run();
			//var_dump($check);
			if ($check == TRUE) {
				$add['title'] = $this->input->post('title');
				$add['text'] = $this->input->post('text');
				$add['date'] = date('Y-m-d');
				$this->db->insert('articles', $add);
				$this->load->view('info_view');
			}
			else $this->load->view('add_article_view');
		} 
		else $this->load->view('add_article_view');
	}

}