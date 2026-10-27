<!DOCTYPE HTML>
<html lang="en">
	<?php echo $header ?>
<body class="cssAnimate">
<?php

if( base_url() == "http://www.go-dongeng.com/"){
?>


<?php
}
?>
	<?php echo isset($menu)?$menu:"" ?>
	
		<?php echo isset($content)?$content:"" ?>
	
	<?php echo $footer ?>
	</body>
</html>