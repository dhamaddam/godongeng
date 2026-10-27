<br><br>
<section>
  <div class="container">
    <div class="ct-call-to-action">
      <div class="ct-call-to-action-inner">
        <div class="ct-action-item"><a href="index.html"><img src="<?=base_url("assets/theme/default/images/content/godongeng-background.jpg")?>" alt="alt"/></a></div>
        <div class="ct-action-item">
          <h5 class="h2 ct-u-font-weight--300 ct-action-title">Maaf... <span class="ct-u-font-weight--700">Halaman Tidak Ditemukan!</span></h5>
          <span>Halaman yang Anda cari tidak bisa ditemukan</span>
        </div>
        <div class="ct-action-item"><a href="/" class="btn-dark btn btn-lg">Silahkan Kembali <i class="fa fa-shopping-cart"></i></a></div>
      </div>
    </div>
  </div>
</section>
<section class="ct-section">
  <div class="container">
    <div class="ct-section-header ct-section-header-decoration-center ct-u-margin-bottom-60"><span class="h5 ct-u-color--gray">Halaman lain yang dapat dikunjungi !</span>
      <h2 class="h1">Hal lain yang mungkin<br>Anda suka</h2>
    </div>
    <div class="ct-slick-columns">
      <div data-autoplay="true" data-autoplaySpeed="2000" data-arrows="false" data-items-xs="2" data-items-sm="2" data-items-lg="3" data-items="1" class="ct-slick ct-js-slick">

        <?php
        if(empty($article)){

        }
        else{

              foreach($article->result_array() as $item){


               $array = array('name_category' => 'name_subcategory', 'name_person' => 'status_user', $item["title"] => 'id_art');

               $str = $this->uri->assoc_to_uri($array);

               echo '<a href="'.base_url($item["uri"]).'">
               <div class="tablex item">
               <div class="ct-testimonials ct-testimonials--block">
               <div class="ct-testimonials-inner">
                 <div class="ct-item-label--circle">
                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="23px" height="17px" viewBox="0 0 23 17">
                   <text transform="translate(-25.00,10.00)" class="icon-svg">
                     <tspan y="42.60" x="16.88">“</tspan>
                   </text>
                 </svg>
                 </div>';
                 echo '<div class="ct-testimonials-dsc">
                   <p>'.$item["description"].'</p>
                 </div>
                 <div class="ct-testimonials-client">
                  <span class="ct-testimonials-name h4">'.$item["title"].'</span>
                  <span class="ct-testimonials-company h5">'.$item["tag"].'</span></div>
                 </div></a>';

               }
           }
         ?>
      </div>
      </div>
    </div>
  </div>
</section>
