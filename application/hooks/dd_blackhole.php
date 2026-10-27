<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dd_blackhole{

    public function generate(){

        global $template;
        date_default_timezone_set('Asia/Jakarta');

		$theme = "default";
        //$theme = "bootstrap";
        $template = new StdClass();

        $template->title ="Baca kumpulan cerita dongeng dan fabel anak|karya fiksi Indonesia";
        $template->meta_description = "  Membaca kumpulan dongeng anak dan kisah sederhana,
          memberi pesan mendidik tanpa hardik dengan karya fiksi Indonesia.
          Cerita fabel anak dari kisah inspiratif yang menarik yang
          dapat dijadikan teladan.";
        $template->header ="theme/$theme/header.php";
        $template->footer ="theme/$theme/footer.php";
        $template->menu = "theme/$theme/menu.php";
        $template->layout = "theme/$theme/layout.php";
        $template->theme = "theme/$theme/";
        $template->data = array();
    }

    public function share(){
        global $template;
        $CI =& get_instance();
        if(empty($template->content)) {
            return;

        }
		$data = array();

        //$CI->load->helper('global_helper');
        //$CI->load->model('universal_query');

        //$data_menu['brands'] = get_brands();
        //$data_menu['categories'] = get_categories();

        //$data_menu['others_child_menu'] = $CI->universal_query->get_child_others();

        $data['header'] = $CI->load->view($template->header, null, true);
        $data['footer'] = $CI->load->view($template->footer, null, true);
    		$data['menu'] = $CI->load->view($template->menu,null,true);
    		$data['content'] = $template->content;
		    //$data['before_container'] = isset($template->before_container)?$template->before_container:"";
        $CI->load->view($template->layout, $data);

    }

}


?>
