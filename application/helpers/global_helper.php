<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_brands'))
{
	function get_brands()
	{
		$CI =& get_instance();

		$CI->load->model('brand_model');
        $CI->load->helper('url');

		$data['list']['0-9'] = $CI->brand_model->getBrand('0-9');
        
        for($i = 'A'; $i <= 'Z'; $i=chr(ord($i)+1)) {
            $data['list'][$i] = $CI->brand_model->getBrand($i);
        }

        return $data;
	}
}

if (!function_exists('get_categories'))
{
	function get_categories()
	{
		$CI =& get_instance();

		$CI->load->model('universal_query');
		$data = array();
        
        $result = $CI->universal_query->get_all_categories();
        foreach ($result as $value) {
        	$data[] = array(
        				"id" => $value->ID,
        				"name" => $value->category_name,
        				"alias" => $value->alias,
        				"parent" => $value->parent
        	);
        }

        return $data;
	}
}
if (!function_exists('get_product'))
{
    function get_product()
    {
        $CI =& get_instance();

        $CI->load->model('universal_query');
        $CI->load->helper('url');

        $result = $CI->universal_query->getProduct_randomize(12,0);//getProduct(10,0,"name_product","DESC"); //($limit,$offset,$index,$order)
        foreach ($result as $value) {
            $data[] = array(
                        "product_name" => $value['product_name'],
                        "brand_name" => $value['brand_name'],
                        "price" => $value['price'],
                        "image" => $value['images'],
                        "link" => $value['link'],
                        "price_discounted" => $value['price_discounted'] 
                        //"parent" => $value['parent']
            );
        }
       
        return $data;
    }
}
if (!function_exists('get_search_keyword'))
{
    function get_search_keyword()
    {
        $ci =& get_instance();
        $ci->load->helper('url');
		return $ci->input->get('keyword');
    }
}

if (!function_exists('image_curl'))
{
    function image_curl($original_url)
    {
        $ci =& get_instance();
        $ci->load->helper('url');
        
        // $original_url='http://srv-live.lazada.com.my/p/image-187357-1-product.jpg';
        //$original_url='http://srv-live.lazada.com.my/p/image-5780201-1-product.jpg';//404

        $url = parse_url($original_url); //status OK
        $host = $url['host'];
        $port = "";
        $path = $url['path'];
        $query ="";
        if(!$port)
            $port = 80;
        $request = "HEAD $path?$query HTTP/1.1\r\n"
                  ."Host: $host\r\n"
                  ."Connection: close\r\n"
                  ."\r\n";
      
    $i=0;
    while ($i<2){
          $address = gethostbyname($host);
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($socket, $address, $port);
        socket_write($socket, $request, strlen($request));
        $response = explode(' ', socket_read($socket, 1024));
        //$status = $response[1];

        $check = array('200', '404');
        if ( $response[1]  == $check [1]){
               $p = base_url()."images/404.jpg";
         }
        else {
                //print $url;
                $p = $original_url;
        }
        $i++;
    }
return $p;
        socket_close($socket);

        //return $url;
    }
}