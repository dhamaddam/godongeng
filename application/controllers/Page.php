<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->model('Universal_query', 'uq');
		$this->load->model('Page_art', 'Pa');
		$this->load->helper('url');
		$this->load->helper('global_helper');
		$this->load->library('pagination');
		$this->load->model('Category_art', 'ct');
	}

	public function index()
	{
		global $template;
		$class = get_class();
		$content = '';
		// $template->title = 'tes';
		$id_art = $this->uri->segment(6);

		$data['advertisement'] = $this->ct->get_advertisement();

		if (empty($id_art)) {
			$id_art = $this->uri->segment(4);
			// var_dump($id_art); die();
			if (!empty($id_art)) {
				$data['global_article'] = $this->Pa->get_global_article($id_art);
			}
		}
		if (empty($id_art)) {
			$uri_assoc = $this->uri->uri_string();
			$data['global_article'] = $this->Pa->get_global_article_v1($uri_assoc);
		} else {
			$data['global_article'] = $this->Pa->get_global_article($id_art);
		}

		// if($this->Pa->get_global_article($id_art)){
		// }
		// else{
		// 	$data['global_article'] = FALSE;
		// }
		$data['recent_posts'] = $this->Pa->get_last_article();
		$data['comments'] = $this->Pa->get_comments($data['global_article']['id_art']);
		$total_rows = '';
		$data['param'] = "Random Article";
		$content = $this->load->view($template->theme . "$class/Page_note", $data, true);
		$content .= $this->load->view($template->theme . "$class/Page_sidebar", $data, true);
		$template->content = $content;
	}


	public function show($param)
	{

		global $template;
		$class = get_class();
		$content = '';
		$total_rows = '';
		$param_decode = html_entity_decode(urldecode($param));

		// var_dump("'name_category' => 'name_subcategory', 'name_person' => 'status_user', 'title' => 'id_art'".$param);die();

	}
}
