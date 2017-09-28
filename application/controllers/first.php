<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class First extends CI_Controller {

	public function index()
	{
		$this->load->view('hello_view');
	}

	function about($id) {
		$data['name'] = "Liza";
		$data['surname'] = "S";
		$data['age'] = 20;
		$this->load->view('about_view', $data);
		if ($id = 1) {
			echo "par 1";
		}
	}

	function articles() {
		$config['base_url'] = base_url().'index.php/first/articles/';
		$config['total_rows'] = $this->db->count_all('articles');
		$config['per_page'] = 2;
		$config['full_tag_open'] = "<p style='text-align:center; color:red'>";
		$config['full_tag_close'] = "</p>"; 

		$this->pagination->initialize($config);

		$this->load->model("articles_model");
		$data['articles'] = $this->articles_model->get_articles($config['per_page'], $this->uri->segment(3));
		$this->load->view("articles_view", $data);
	}

	function upload_photo() {
		if (isset($_POST['download'])) {
			$config['upload_path'] = './img/photos';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces'] = TRUE;

			$this->load->library('upload', $config);

			$this->upload->do_upload();

			$image_data = $this->upload->data();


			$config['image_library'] = 'gd2';
			$config['source_image']	= $image_data['full_path'];
			$config['new_image'] = APPPATH.'../img/photos/thumbs';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 75;
			$config['height']	= 50;


			$this->load->library('image_lib', $config); 

			$this->image_lib->resize();

			$config['source_image']	= $image_data['full_path'];
			$config['new_image'] = APPPATH.'../img/photos/wm';
			$config['wm_text'] = 'Copyright 2017 - Liza-S';
			$config['wm_type'] = 'text';
			$config['wm_font_path'] = './system/fonts/texb.ttf';
			$config['wm_font_size']	= '16';
			$config['wm_font_color'] = 'ff00ff';
			$config['wm_vrt_alignment'] = 'top';
			$config['wm_hor_alignment'] = 'center';
			$config['wm_padding'] = '20';

			$this->image_lib->initialize($config); 

			$this->image_lib->watermark();
			
			$add['img'] = $image_data['file_name'];
			$this->db->insert('photos', $add);

			echo "Файл успешно загружен";

		}
		else $this->load->view('upload_view');
	}

	function add_article() {
		$data['title'] = 'пять';
		$data['text'] =  'Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, "consectetur", и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги "de Finibus Bonorum et Malorum"';
		$data['date'] = '2017-09-29';
		$this->load->model('articles_model');
		$this->articles_model->add_article($data);
	}

	function edit_article() {
		$data['title'] = 'новый пять';
		$data['text'] = 'Текст';
		$data['date'] = '2018-09-29';
		$this->load->model('articles_model');
		$this->articles_model->edit_article($data);
	}

	function del_article($id) {
		$this->load->model('articles_model');
		$this->articles_model->del_article($id);
	}
}