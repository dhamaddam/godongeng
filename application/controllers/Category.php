<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Universal_query','uq');
        $this->load->model('Category_art','ct');
        $this->load->helper('url');
      	$this->load->helper('global_helper');
        $this->load->library('pagination');
    }

	public function index(){


		global $template;
		$class = get_class();
		$content = '';
		$data['advertisement'] = $this->ct->get_advertisement();
	

		$data['param'] = "All thread";
		$param = empty($param) ? "all" : $param;
		$data['article']= $this->ct->get_article("dongeng",15,0);
		$data['categories'] = $this->ct->get_categories("1","32");
		$content = $this->load->view($template->theme."$class/Category_bloglists",$data, true);
		$template->content = $content;
	}

	public function show ($param = ' '){

		global $template;
		$class = get_class();
		$content = '';

		//$data['param'] = empty($param) ? "all" : $param;
		// var_dump($param); die();

		// $data['categories'] = $this->ct->get_sub_categories($param,"category");


		if ($param == "buku-dongeng-anak"){
			$data['article']= $this->ct->get_article_by_tag('dongeng',15,0);
			$content = $this->load->view($template->theme."$class/Category_blog",$data, true);
		}
		else{
				$data['article']= $this->ct->get_article_by_tag($param,15,0);
			$content = $this->load->view($template->theme."$class/Category_grid",$data, true);
		}

		$template->content = $content;

	}



}
