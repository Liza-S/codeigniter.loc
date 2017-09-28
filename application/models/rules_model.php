<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules_model extends CI_Model {
	public $add_rules = array(
		array(
			'field' => 'title',
			'label' => 'Название статьи:',
			'rules' => 'required|xss_clean|min_length[5]|max_length[50]|trim'
		),
		array(
			'field' => 'text',
			'label' => 'Текст статьи:',
			'rules' => 'required|xss_clean|max_length[2000]|trim'
		),
	);
}