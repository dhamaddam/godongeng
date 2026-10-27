<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Universal_query','uq');
        $this->load->helper('url');
      	$this->load->helper('global_helper');
        $this->load->library('pagination');
    }

	public function index($page = 0)
	{
		global $template;
		$class = get_class();
		$content = '';
		$content = $this->load->view($template->theme."$class/Home", null, true);
		$template->content = $content;
	}

	public function home($page = 0)
	{
		global $template;
		$class = get_class();
		$content = '';

		$content = $this->load->view($template->theme."$class/ere", null, true);
		$template->content = $content;
	}



}
