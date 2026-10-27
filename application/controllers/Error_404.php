<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error_404 extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Universal_query','uq');
        $this->load->helper('url');
				$this->load->model('Category_art','ct');
      	$this->load->helper('global_helper');
        $this->load->library('pagination');
    }

	public function index($page = 0)
	{
		global $template;
		$class = get_class();
		$content = '';
		$template->title = "Not Found 404";
		$data['article'] = $this->ct->get_article("cpns",15,0);
		$content = $this->load->view($template->theme."$class/Page_404", $data, true);
		$template->content = $content;
	}


}
