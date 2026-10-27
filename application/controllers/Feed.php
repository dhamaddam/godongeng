<?php
 
class Feed extends CI_Controller
{  
    function __construct()
    {     
        parent::__construct();     
        $this->load->model('FeedModel_art','FeedModel');     
        $this->load->helper('xml');
        $this->load->helper('text');     
    }
    
    function index()
    {    
        global $template;
 
		$content = '';
        $data['encoding'] = 'utf-8';    
        $data['feed_name'] = 'www.go-dongeng.com';        
        $data['feed_url'] = 'https://www.go-dongeng.com';        
        $data['page_description'] = 'Welcome to www.go-dongeng.com feed url page';       
        $data['page_language'] = 'en-ca';        
        $data['creator_email'] = 'appdorms@gmail.com';        
        $query = $this->FeedModel->getFeedArticles();        
        $data['ARTICLE_DETAILS'] = null;        
        if ($query) {           
            $data['ARTICLE_DETAILS'] = $query;           
        }  
		
        header('Content-type: text/xml');      
        $this->load->view('rss', $data);  
        // $content = $this->load->view($template->theme."rss",$data, true);
		// $template->content = $content;    
    }   
}
?>