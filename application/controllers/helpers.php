<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helpers extends CI_Controller {

	public function index()
	{
		$this->load->helper('html');
		$this->load->helper('text');
		$this->load->helper('string');
		$this->load->helper('captcha');

		$string = random_string('numeric', 7);

		$vals = array(
		    'word'	=> $string,
		    'img_path'	=> './img/captcha/',
		    'img_url'	=> base_url().'img/captcha/',
		    'font_path'	=> './system/fonts/texb.ttf',
		    'img_width'	=> 180,
		    'img_height' => 30,
		    'expiration' => 10
	    );

		$cap = create_captcha($vals);
		echo $cap['image'];

		$this->load->view('helpers_view');
	}

}