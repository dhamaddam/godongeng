     <h5> <?php  global $template;

     // var_dump($get_categories);
     ?></h5>

      <section class="ct-section ct-u-background--motive"  data-background="<?=base_url("assets/theme/default/images/content/background-go-dongeng.png")?>">
        <ul class="ct-js-gallery-filters ct-gallery-filters">

          <?php
          if($this->uri->segment(2)=="fabel"){
            echo '<li><a href="'. base_url('kumpulan/fabel') .'" data-filter="fabel" class=" active btn btn-motive-o btn-sm">fabel</a></li>';
            echo '<li><a href="'.base_url("kumpulan/dongeng").'" data-filter="dongeng" class="btn btn-motive-o btn-sm">dongeng</a></li>';
            echo '<li><a href="'.base_url("kumpulan/folklore").'" data-filter=".folklore" class="btn btn-motive-o btn-sm">folklore</a></li>';

          }
          else if($this->uri->segment(2)=="dongeng"){
            echo '<li><a href="'. base_url('kumpulan/fabel') .'" data-filter="fabel" class="btn btn-motive-o btn-sm">fabel</a></li>';
            echo '<li><a href="'.base_url("kumpulan/dongeng").'" data-filter="dongeng" class="active btn btn-motive-o btn-sm">dongeng</a></li>';
            echo '<li><a href="'.base_url("kumpulan/folklore").'" data-filter=".folklore" class="btn btn-motive-o btn-sm">folklore</a></li>';

          }
          else if($this->uri->segment(2)=="folklore"){
            echo '<li><a href="'. base_url('kumpulan/fabel') .'" data-filter="fabel" class="btn btn-motive-o btn-sm">fabel</a></li>';
            echo '<li><a href="'.base_url("kumpulan/dongeng").'" data-filter="dongeng" class=" btn btn-motive-o btn-sm">dongeng</a></li>';
            echo '<li><a href="'.base_url("kumpulan/folklore").'" data-filter=".folklore" class="active btn btn-motive-o btn-sm">folklore</a></li>';
          }
          else{
            echo '<li><a href="'. base_url('kumpulan/fabel') .'" data-filter="fabel" class="btn btn-motive-o btn-sm">fabel</a></li>';
            echo '<li><a href="'.base_url("kumpulan/dongeng").'" data-filter="dongeng" class=" btn btn-motive-o btn-sm">dongeng</a></li>';
            echo '<li><a href="'.base_url("kumpulan/folklore").'" data-filter=".folklore" class="btn btn-motive-o btn-sm">folklore</a></li>';
          }
          ?>
        </ul>
      </section>

      <!-- big_top_header -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-3559167457847068"
           data-ad-slot="8078361229"
           data-ad-format="link"
           data-full-width-responsive="true"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <script type="application/ld+json">
          {
           "@context": "http://schema.org",
           "@type": "BreadcrumbList",
           "itemListElement":
           [
            {
              "@type": "ListItem",
              "position": 1,
              "item":
             {
              "@id": "<?=base_url(); ?>",
              "name": "GoDongeng"
              }
            },
            {
              "@type": "ListItem",
              "position": 2,
              "item":
             {
               "@id": "<?=base_url('kumpulan/'.$this->uri->segment(2)); ?>",
               "name": "<?=$this->uri->segment(2) ?>"
             }
            }
           ]
          }
          </script>
      <div id="ct-gallery" class="ct-gallery ct-js-gallery ct-gallery--col5">

      <?php


     if(empty($article)){

     }
     else{

           foreach($article->result_array() as $item){


            $array = array('name_category' => 'name_subcategory', 'name_person' => 'status_user', $item["title"] => 'id_art');

            $str = $this->uri->assoc_to_uri($array);
            $find = array(" ","|");
            echo '<a href="'.base_url($item['uri']).'">';
              echo'
              <article class="ct-gallery-item '.$item["tag"].'">

                <figure><img src="'.base_url("assets/$template->theme"."images/content/".$item["picture"]).'" alt="'.str_replace("-", " ",$item["picture"]).'"/>
                  <figcaption>
                    <div class="ct-gallery-item-text">
                      <div class="inner"><span class="ct-gallery-item-title ct-section-header-decoration-center">'.$item["title"].'</span><span class="ct-gallery-item-tags">'.$item["tag"].'</span></div>
                    </div>
                  </figcaption>
                </figure>

              </article>
              </a>';

            }
          echo '<div class="row">
              <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

             <div class="col-sm-3">
                   <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-format="fluid"
                        data-ad-layout-key="-6t+ed+2i-1n-4w"
                        data-ad-client="ca-pub-3559167457847068"
                        data-ad-slot="6455880372"></ins>
                   <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                   </script>
             </div>

            </div>';
            ?>

            <ins class="adsbygoogle"
                 style="display:inline-block;width:970px;height:250px"
                 data-ad-client="ca-pub-3559167457847068"
                 data-ad-slot="1618140218"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

            <?php
            echo '<div id="tampil">
                    <div class="row"> </div>
                  </div>';
           echo '<div class="row">
             <button class="center pull-right col-lg-12 btn  btn-primary load-more">See more ...</button>
           </div>';

        }
      ?>
      </div>

      <!-- <section data-background="https://www.go-dongeng.com/assets/theme/default/images/content/background-go-dongeng.jpg" data-height="100%" data-parallax="50" class="ct-section ct-u-relative tablex ct-section-absolute-cta">
        <div class="ct-section-header ct-section-header-decoration-center"><span class="h5 ct-u-color--gray">Testimoni Pembaca</span>
          <h2 class="h1 ct-u-color--white"> Testimoni <br>Mereka</h2>
        </div>
        <div data-arrows="true" data-dots="true" class="ct-slick ct-js-slick ct-u-padding-bottom-40 ct-slick-arrows-top">
          <div class="tablex item">
            <div class="container">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="ct-testimonials">
                    <div class="ct-testimonials-inner">
                      <div class="ct-testimonials-image"><img src="https://www.go-dongeng.com/assets/theme/default/images/content/background-go-dongeng.jpg" alt=""/></div>
                      <div class="ct-testimonials-dsc">
                        <p>Keep up the excellent work. I'd be lost without Sella. Definitely worth the investment.</p>
                      </div>
                      <div class="ct-testimonials-client"><span class="ct-testimonials-name h4">jeffrey kendrick</span><span class="ct-testimonials-company h5">sales manager @ crisppi</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tablex item">
            <div class="container">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="ct-testimonials">
                    <div class="ct-testimonials-inner">
                      <div class="ct-testimonials-image"><img src="https://www.go-dongeng.com/assets/theme/default/images/content/background-go-dongeng.jpg" alt=""/></div>
                      <div class="ct-testimonials-dsc">
                        <p>I could probably go into sales for you. Sella is worth much more than I paid. Thanks guys, keep up the good work!</p>
                      </div>
                      <div class="ct-testimonials-client"><span class="ct-testimonials-name h4">Irene Marita</span><span class="ct-testimonials-company h5">support manager @ echo</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tablex item">
            <div class="container">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="ct-testimonials">
                    <div class="ct-testimonials-inner">
                      <div class="ct-testimonials-image"><img src="https://www.go-dongeng.com/assets/theme/default/images/content/background-go-dongeng.jpg" alt=""/></div>
                      <div class="ct-testimonials-dsc">
                        <p>I don't always clop, but when I do, it's because of Sella. We can't understand how we've been living without Sella.</p>
                      </div>
                      <div class="ct-testimonials-client"><span class="ct-testimonials-name h4">Danilo Federico</span><span class="ct-testimonials-company h5">account manager @ peko</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ct-call-to-action-bottom">
          <div class="container">
            <div class="ct-call-to-action ct-call-to-action-dark">
              <div class="ct-call-to-action-inner">
                <div class="ct-action-item"><a href="index.html"><img src="https://go-dongeng.com/assets/theme/default/images/content/logo-go-dongeng.png" alt="buku cerita dongeng fiksi "/></a></div>
                <div class="ct-action-item">
                  <h5 class="h2 ct-u-font-weight--300 ct-action-title"><span class="ct-u-font-weight--700"> Ayooo !</span></h5><span>Beli buku Go-dongeng Sekarang</span>
                </div>
                <div class="ct-action-item"><a href="#" class="btn-motive btn btn-lg">Beli Sekarang<i class="fa fa-shopping-cart"></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
