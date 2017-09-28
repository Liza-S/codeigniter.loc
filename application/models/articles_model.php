<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles_model extends CI_Model {
	
	function get_articles($num, $offset) {
		$query = $this->db->get("articles", $num, $offset);
		return $query->result_array();
	}

	function add_article($data) {
		$this->db->insert('articles', $data);
	}

	function edit_article($data) {
		$this->db->where('id', '5');
		$this->db->update('articles', $data);
	}

	function del_article($id) {
		$this->db->where('id', $id);
		$this->db->delete('articles');
	}

}