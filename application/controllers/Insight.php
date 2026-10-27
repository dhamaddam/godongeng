<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insight extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->load->model('Universal_query','uq');
        $this->load->model('Category_art','ct');
        $this->load->helper('url');
      	$this->load->helper('global_helper');
        $this->load->library('pagination');

        // if($this->uq->check_login() === false ){
		// 				redirect(base_url('login'));
		// 			}
    }

	public function index(){


		global $template;
		$class = get_class();
		$content = '';
		$data['param'] = "All thread";
		$param = empty($param) ? "all" : $param;
		$data['article']= $this->ct->get_article($param,15,0);

		$data['advertisement'] = $this->ct->get_advertisement();
		$data['categories'] = $this->ct->get_categories("0","0");
		$content = $this->load->view($template->theme."$class/Main",$data, true);
		$content .= $this->load->view($template->theme."$class/Sidebar",$data, true);
		$template->content = $content;


	}

	public function addthread(){
		global $template;
		$class = get_class();
		$content = '';

		$data['param'] = "All thread";
		$data['categories'] = $this->ct->get_categories("1","nan");
		$content = $this->load->view($template->theme."$class/Add_article",$data, true);
		$content .= $this->load->view($template->theme."$class/Sidebar",'',true);
		$template->content = $content;
	}

	public function about(){


		global $template;
		$class = get_class();
		$content = '';

		$data['param'] = "All thread";
		$param = empty($param) ? "all" : $param;
		$data['article']= $this->ct->get_article($param,15,0);
		$data['categories'] = $this->ct->get_categories("0","0");
		$content = $this->load->view($template->theme."$class/Main",$data, true);
		$content .= $this->load->view($template->theme."$class/Sidebar",$data, true);
		$template->content = $content;


	}

public function add_article(){

	global $template;
	$class = get_class();
	$data_article = array();
	$content = '';
	$id_user = $this->session->userdata('id_user');
	$id_input_category = $this->input->post('id_category');

	$data['param'] = "All thread";
	$param = empty($param) ? "all" : $param;
	$id = (!empty($id_user))? ($this->session->userdata('id_user')) :"0";
	$id_cat = (!empty($id_input_category))? ($this->input->post('id_category')) :"";
	$category= $this->ct->get_alias_categories($id_cat);
	$id_art_user_category = $this->specify_number_user($id).$this->specify_number_cat($id_cat);

	$d_static =
		array(
				'id_art_user_category' => $id_art_user_category,
				'title' => $this->input->post('title'),
				'picture' => ($_FILES['picture']['name'][0]),
				'rating' => '1',
				'tag' => $this->input->post('tag'),
				'is_viewed' => '1',
				'created_on' => date('Y:m:d')
			);

		//models self
		$this->db->insert('article',$d_static);
		$id = $this->db->insert_id();
		$id_art_user_category .= $this->specify_number_art($id);
		$username = $this->session->userdata('username');
		$level = $this->session->userdata('level');
		$find = array(" ", "|", ",");
		$title = str_replace($find, "-", $this->input->post('title'));
		$find = array("---", "--", ",");
		$title = str_replace($find, "-", $title);
		$title = strtolower($title);
		$username = (!empty($username)) ? ($this->session->userdata('username')) : "no_name";
		$level = (!empty($level)) ? ($this->session->userdata('level')) : "1";
		$data =
			array(
				'id_art_user_category' => $id_art_user_category,
				// 'uri'	=> '/projek/kreatif' . $category['alias_child'] . '/' . $title . '/' . ($id_art_user_category),
				'uri'	=> 'p/cerita-dongeng-bergambar/' . $title,
			);
		//insert to article data table
		$this->db->where('id_article',$id);
		$this->db->update('article', $data);

		$atr_static = array(
				'picture_description' =>"blog-post.jpg" ,
				'description' => "description",
				'paragraph1' => "paragraph1",
				'paragraph2' => "paragraph2",
				'paragraph3' => "paragraph3",
				'first_picture' => "blog-post.jpg",
				'second_picture' => "blog-post.jpg",
				'third_picture' => "blog-post.jpg",
				'fourth_picture' => "blog-post.jpg",
				'viewed' => "1",
				'tag' => "berita nasional",
				'etc' => "etc",

		);

		//insert to global_article data table
		foreach ($atr_static as $key => $value) {
			$d_static = array(
				'id_art_user_category' => $id_art_user_category,
				'attribute' => $key,
				'value' => $value
			);

			$this->db->insert('global_article',$d_static);
		}

		//var_dump($data['uri']); die();
		redirect(base_url($data['uri'].$str = str_replace(" ", "-", $this->input->post('title'))));

	}


	public function specify_number_art($nmb){

		if ($nmb < 10) {
			$nmb = '000'.$nmb ;
		} elseif($nmb > 10 && $nmb < 100) {
			$nmb = '00'.$nmb ;
		}
		elseif($nmb > 100 && $nmb < 1000) {
			$nmb = '0'.$nmb ;
		}
		return $nmb ;
	}

	public function specify_number_cat($nmb){

		if ($nmb < 10) {
			$nmb = '0'.$nmb ;
		}
		return $nmb ;
	}

	public function specify_number_user($nmb){

		if ($nmb < 10) {
			$nmb = '00'.$nmb ;
		} elseif($nmb > 10 && $nmb < 100) {
			$nmb = '0'.$nmb ;
		}
		return $nmb ;
	}


	public function add_global_profiles(){

		$atr_static = $this->input->post();

		//insert to global_article data table
		foreach ($atr_static as $key => $value) {
			$d_static = array(
				'id_user_details' => $this->session->userdata('id_user'),
				'attribute' => $key,
				'value' => $value
			);

			$this->db->insert('user_global_profiles',$d_static);
		}

		redirect(base_url('art/'.$this->session->userdata('name')));
	}

	public function add_advertise_custom(){

		$atr_static = $this->input->post();

		//insert to global_article data table
			$d_static = array(
				//url for ADS1
		//		'image_ads_1' => $this->input->post('image_ads_1'),
				'url_ads_1' => $this->input->post('url_ads_1'),

		//		'image_ads_2' => $this->input->post('image_ads_2'),
				'url_ads_2' => $this->input->post('url_ads_2'),
				
			//	'image_ads_3' => $this->input->post('image_ads_3'),
				'url_ads_3' => $this->input->post('url_ads_3'),

				
			//	'image_ads_4' => $this->input->post('image_ads_4'),
				'url_ads_4' => $this->input->post('url_ads_4'),
				

			//	'image_ads_sidebar' => $this->input->post('image_ads_sidebar'),
				'url_ads_sidebar' => $this->input->post('url_ads_sidebar'),
				
			);
			$this->db->set($d_static);
			$this->db->where('id', 2);
			$this->db->update('advertisement'); 


		redirect(base_url('insight/'));
	}

}
