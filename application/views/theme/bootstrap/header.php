<head>

	<script src="#"></script>

<?php


if($this->uri->segment(1) === FALSE || $this->uri->segment(1) === 'list') {
  //echo '<meta name="description" content="Shop at all your favourite online shopping stores in Malaysia. Find the best price for online sales in Malaysia. Get the best deals for luxury, fashion, electronics and beauty items online." />';
}
else if($this->uri->segment(1) === 'shop')
{
	//echo '<meta name="description" content="Get the best price for '.$category_param.' from all online shopping destinations in Malaysia. Find '.$category_param.' deals in Malaysia and compare thousands of products in '.$category_param.' Online shopping in Malaysia made easy! />';
}
else if($this->uri->segment(1) === 'brand')
{
	//echo '<meta name="description" content="Get the best price for '.$category_param.' from all online shopping destinations in Malaysia. Find '.$category_param.' deals in Malaysia and compare thousands of products from '.$category_param.' Online shopping in Malaysia made easy!" />';
}
else if($this->uri->segment(1) === 'filter')
{
	//$keyword = $_GET['q'];
	//echo '<meta name="description" content="Find the best price and deals on '.ucfirst($keyword).'. Browse hundreds of online shopping destinations in Malaysia for '.ucfirst($keyword).' and get the best deals today!" />';
}
?>

    <link rel="alternate" href="http://go-dongeng.com/" hreflang="id-id">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Go Dongeng</title>
	<?php global $template;?>
    <link href="<?php echo base_url("assets/$template->theme"."css/bootstrap.css") ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/$template->theme"."css/bootstrap-theme.min.css") ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/$template->theme"."css/theme.css") ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/$template->theme"."css/mgmenu.css") ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/$template->theme"."css/custom.css") ?>" rel="stylesheet">
    
	
</head>
