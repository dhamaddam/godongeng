<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Universal_query','uq');
        $this->load->model('tank_auth/Users','us');
        $this->load->helper('url');
      	$this->load->helper('global_helper');
        $this->load->library('pagination');
  //       if($this->uq->check_login() === false ){
		// 	redirect(base_url('login'));
		// }
    } 
	
	public function index()
	{ 
		//var_dump("All writer Article ");
		global $template;
		$class = get_class();
		$content = '';
		$data['param'] = "All writer Article";
		$content = $this->load->view($template->theme."$class/Art_list",$data, true);
		$template->content = $content;
	}

	public function show ($param = " "){
		//var_dump("Article list from writer ".$param);
		// var_dump($this->uq->check_login()); die();
	
			global $template;
			$class = get_class();
			$content = '';
			$param_decode = html_entity_decode(urldecode($param));
			$data['param'] = "Article list from writer ".$param;

			// $id_user_details = $this->session->userdata('id_user');
			$id_user_details = $this->us->get_id_user_by_name($param);

			$temp = $this->uq->get_globaldetails($id_user_details);
			
	        $global_details=array();

	        foreach ($temp as $item) 
	        {
	            $global_details[$item['attribute']] = $item['value']; 
	        }
			
			$data['user_global_profiles'] = $global_details ;

			$content = $this->load->view($template->theme."$class/Art_list",$data, true);
			$template->content = $content;

	}
}
