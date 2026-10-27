<head>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-3559167457847068",
    enable_page_level_ads: true
  });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-102319295-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-102319295-1');
</script>


<?php
global $template;

if($this->uri->segment(1) == FALSE) {

  echo'<title> '.$template->title .'</title>';
  echo '<meta name="description" content="
  Membaca kumpulan dongeng anak dan kisah sederhana,
  memberi pesan mendidik tanpa hardik dengan karya fiksi Indonesia.
  Cerita fabel anak dari kisah inspiratif yang menarik yang
  dapat dijadikan teladan." />';
}
else if($this->uri->segment(1) == "category" || $this->uri->segment(1) == "kumpulan" ) {


  if($this->uri->segment(2)=="fabel"){
    echo '<title>Baca kumpulan cerita fabel anak | Cerita anak bergambar </title>';
    echo '<meta name="description" content="
    Cerita fabel adalah karya fiksi yang menceritakan kehidupan hewan yang berkelakuan menyerupai manusia.
    cerita fabel memasukkan karakter minoritas tokoh manusia dalam cerita. Ayo baca cerita !
    " />';
  }
  else if($this->uri->segment(2)=="dongeng"){
    echo '<title>Cerita dongeng anak bergambar | Go-dongeng </title>';
    echo '<meta name="description" content="
    Baca karya sastra lama yang bercerita tentang suatu kejadian yang luar biasa yang penuh khayalan (fiksi),
    Kumpulan Dongeng bisa dibaca secara gratis di go-dongeng.com .
    " />';
  }
  else if($this->uri->segment(2)=="folklore"){
    echo'<title>Cerita folklor Indonesia | Cerita anak bergambar </title>';
    echo '<meta name="description" content="
    kumpulan cerita folklor yang berisi adat istiadat tradisional dan cerita rakyat yang diwariskan secara turun-temurun bisa dibaca disini !
    " />';
  }
  else{
    echo'<title> kumpulan buku cerita anak | Cerita fiksi </title>';
    echo '<meta name="description" content="
    Membaca kumpulan buku cerita anak bergambar online
    memberi pesan mendidik tanpa hardik dengan karya fiksi Indonesia.
    dibuat seidentik dengan buku dongeng binatang atau cerita fabel" />';
  }

}
else if($this->uri->segment(1) === 'page' || $this->uri->segment(1) === 'p')
{
  $page =  $this->uri->segment(7);
  echo'<title>'.str_replace("-"," ", $template->title) .'| Cerita fiksi </title>';
  // echo '<meta name="description" content="Cerita kisah sederhana '.$page.'. Untuk membangun karakter anak sejak dini. Baca karya fiksi asli Indonesia. "/>';
	echo '<meta name="description" content="'.$template->meta_description.'"/>';

}
else if($this->uri->segment(1) === 'blog' )
{
  $page =  $this->uri->segment(7);
  echo'<title>Blog Cerita Dongeng Online | Cerita fiksi </title>';
  // echo '<meta name="description" content="Cerita kisah sederhana '.$page.'. Untuk membangun karakter anak sejak dini. Baca karya fiksi asli Indonesia. "/>';
	echo '<meta name="description" content="Blog berisi tentang cerita anak anak online,
  buku dongeng untuk anak-anak jaman now"/>';
}
else if($this->uri->segment(1) === 'thread')
{
  echo'<title> '.$this->uri->segment(1).' '. $this->uri->segment(2) .' </title>';
	echo '<meta name="description" content="Cerita kisah sederhana '.$this->uri->segment(2).' dari karya fiksi asli Indonesia !" />';
}
// login
else if($this->uri->segment(1) === 'login')
{
  $title = $this->uri->segment(1);
  echo'<title> '.ucfirst($title).' untuk menulis cerita | Cerita dongeng </title>';
	echo '<meta name="description" content="Login dengan google untuk menulis
  cerita kisah sederhana '.$this->uri->segment(2).' dari karya fiksi asli Indonesia !" />';
}
else if($this->uri->segment(1) === 'filter')
{
	//$keyword = $_GET['q'];
	//echo '<meta name="description" content="Find the best price and deals on '.ucfirst($keyword).'. Browse hundreds of online shopping destinations in Malaysia for '.ucfirst($keyword).' and get the best deals today!" />';
}
?>
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="alternate" href="https://go-dongeng.com" hreflang="id-id" />

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url("assets/$template->theme"."css/bootstrap.min.css") ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/$template->theme"."css/font-awesome.min.css") ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/$template->theme"."css/style.css") ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/$template->theme"."css/dataTables.bootstrap.css")?>" rel="stylesheet">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="285906474366-bp9ji1pc8d7qautpqhlsoe9lthps5u0e.apps.googleusercontent.com">
  <meta name="msvalidate.01" content="46D3CB4A7FFDEE5CF4B36DF8CD86D645" />
  <link href="<?php //echo base_url("assets/$template->theme"."css/main.css"); ?>" rel='stylesheet' type='text/css' >

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-102319295-1', 'auto');
      ga('send', 'pageview');

    </script>

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1524060914327250',
          cookie     : true,
          xfbml      : true,
          version    : 'v2.10'
        });
        FB.AppEvents.logPageView();
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

    </script>
    <style type="text/css">
      .user_google{
          border-radius: 50%;
          width: 32px;
          height: 32px;
        }
        .account-sprites {
        background: url("../social-buttons.png") no-repeat top left;
      }
      .connect-with-button {
            display: block;
            float: left;
            margin: 0;
            width: 132px;
            height: 33px;
          }
        .marginleft13 {
            margin-left: 13px;
          }
        .account-sprites-facebook {
            background-position: 0 0;
          }

        .account-sprites-google {
            background-position: 0 -34px;
          }

        .shared-divider {
        position: relative;
        margin: 50px 0 20px 0;
        border-top: 1px solid #DDD;
        text-align: center;
      }

      .shared-divider-label {
        margin-top: -12px;
      }

      .shared-divider-label span {
        padding: 0 10px;
        font-size: 12px;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: white;
      }

    </style>


</head>
<!-- Hotjar Tracking Code for go-dongeng.com -->
<!-- <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:838849,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script> -->
