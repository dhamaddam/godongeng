<header data-background="<?php global $template;
                          echo base_url("assets/$template->theme" . "images/content/background-go-dongeng.png") ?>" data-height="%" data-parallax="50" class="hidden-sm hidden-xs ct-u-display-tablex text-uppercase text-center" style="width:70%; margin-top:5%!important">
  <div class="inner">
    <h1 class="h1 ct-u-color--brown ct-u-margin-top-20"> <?= $global_article[0]['title']; ?></h1>
    <span class="ct-date ct-u-color--brown">
      <?php
      date_default_timezone_set("Asia/Jakarta");
      // if(!$global_article){
      //   redirect('/');
      // }
      $date = new DateTime($global_article[0]['created_on']);
      echo date_format($date, 'F Y');  ?>
      <?php //echo 'by '. $this->uri->segment(4);
      ?>
    </span>

  </div>

</header>
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "<?= base_url($global_article[0]['uri']); ?>"
    },
    "headline": "<?= $global_article[0]['title']; ?>",
    "image": [
      "<?= base_url("assets/$template->theme" . "images/content/" . $global_article['picture_description']) ?>",
      "<?= base_url("assets/$template->theme" . "images/content/" . $global_article['first_picture']) ?>",
      "<?= base_url("assets/$template->theme" . "images/content/" . $global_article['second_picture']) ?>",
      "<?= base_url("assets/$template->theme" . "images/content/" . $global_article['third_picture']) ?>",
      "<?= base_url("assets/$template->theme" . "images/content/" . $global_article['fourth_picture']) ?>"
    ],
    "datePublished": "<?= $global_article[0]['created_on'] ?>",
    "dateModified": "<?= $global_article[0]['updated_on'] ?>",
    "author": {
      "@type": "Person",
      "name": "Admin Go-Dongeng"
    },
    "publisher": {
      "@type": "Organization",
      "name": "IDtronic",
      "logo": {
        "@type": "ImageObject",
        "url": "https://www.go-dongeng.com/assets/theme/default/images/content/logo-go-dongeng.png"
      }
    },
    "description": "Ayo Baca Dongeng! Membaca kumpulan dongeng anak dan kisah sederhana,memberi pesan mendidik tanpa hardik dengan karya fiksi Indonesia"
  }
</script>

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "item": {
          "@id": "<?= base_url(); ?>",
          "name": "GoDongeng"
        }
      },
      {
        "@type": "ListItem",
        "position": 2,
        "item": {
          "@id": "<?= base_url($global_article[0]['uri']); ?>",
          "name": "<?= $global_article[0]['title'] ?>"
        }
      }
    ]
  }
</script>
<div class="ads-padding">
  <!-- topHeader -->
  <ins class="adsbygoogle" style="display:inline-block;width:970px;height:250px" data-ad-client="ca-pub-3559167457847068" data-ad-slot="1618140218"></ins>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
</div>
<section class="ct-section ct-blog ct-post">
  <div class="container">

    <div class="row">

      <div class="col-md-9">
        <div class="ct-article-media picture" style="display:none;">
          <?php
          $template->title = $global_article[0]['title'];
          $template->meta_description = $global_article['description'];
          ?>
        </div>
        <input type="text" style="display:none;" value="" id="temp_idcp" />
        <form action="<?php echo base_url('ajax/update_article'); ?>" id="form" class="form-horizontal">
          <input type="hidden" value="<?php echo $global_article['id_art']; ?>" name="id" />
          <div class="ct-article">
            <a class="btn btn-motive btn-square change_picture" id="cp_description" onclick="form_up('Picture Description')" style="display: none;">Change Picture</a>
            <div class="ct-article-media">
              <div id="ot_picture_description">
                <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $global_article['picture_description']) ?>" alt="<?php echo str_replace("-", " ", $global_article['picture_description']) ?>">
              </div>
              <div class="ct-article-share ct-u-background--gray-lighter">
                <div class="row">
                  <div class="col-lg-4"><span class="h4 ct-share-title">SHARE THIS POST</span></div>
                  <div class="col-lg-8">
                    <button class="btn-social ct-js-share s_facebook"><i class="fa fa-facebook"></i><span class="ct-js-share-counter c_facebook"></span></button>
                    <button class="btn-social ct-js-share s_twitter"><i class="fa fa-twitter"></i></button>
                    <button class="btn-social ct-js-share s_plus"><i class="fa fa-google-plus"></i><span class="ct-js-share-counter c_plus"></span></button>
                  </div>

                </div>
              </div>
            </div>

            <div class="ct-article-description">
              <p><a href="https://play.google.com/store/apps/details?id=com.dongengapp&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1">
                  Download Aplikasi Ngedongeng di <img src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png" style="width: 175px"></a>
              </p>
              <div class="media media_middle">
                <!-- ADS Custom Pertama -->
                <div class="ct-article-media">
                  <a href="<?php echo (isset($advertisement[0]['url_ads_1'])) ? $advertisement['0']['url_ads_1'] : ""; ?>">
                    <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $advertisement[0]['image_ads_1']) ?>"  alt="<?php echo str_replace("-", " ", $advertisement[0]['image_ads_1']) ?>">
                  </a>
                </div>
                <div class="media-body"><a href="https://invol.co/cl6es8s" target="_blank">
                    <h4 class="media-heading">Support Kami dengan membeli produk</h4>
                    <a href="https://invol.co/cl6es8s" class="btn-social ct-js-share ">Beli di Miniso</a>
                  </a>
                </div>
              </div>
              <br>
              <br>
              <p id="description">
                <?php
                echo $global_article['description'];
                ?>
              </p>
            </div>

            <textarea rows="15" class="form-control form-control-light ct-u-margin-both-0" style="display:none;" name="description">
                       <?php
                        echo $global_article['description'];
                        ?>
              </textarea>

          </div>
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- persegi -->
          <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3559167457847068" data-ad-slot="2483989858" data-ad-format="auto" data-full-width-responsive="true"></ins>
          <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
          <div class="ct-article">
            <a class="btn btn-motive btn-square change_picture" id="cp_picture_bd1" onclick="form_up('First Picture')" style="display: none;">Change Picture</a>
            <div class="ct-article-media">
              <div id="ot_first_picture">
                <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $global_article['first_picture']) ?>" alt="<?php echo str_replace("-", " ", $global_article['first_picture']) ?>">
              </div>
            </div>


            <div class="ct-article-description">
              <p><a href="https://play.google.com/store/apps/details?id=com.dongengapp&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1">
                  Download Aplikasi Ngedongeng di <img src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png" style="width: 175px"></a>
              </p>
              <div class="media media_middle">
                <div class="ct-article-media">
                  <!--ADS CUSTOM KEDUA  -->
                  <!-- ADS -->
                  <a rel="nofollow" href="<?php echo (isset($advertisement[0]['url_ads_2'])) ? $advertisement['0']['url_ads_2'] : ""; ?>">

                    <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $advertisement[0]['image_ads_2']) ?>"   alt="<?php echo str_replace("-", " ", $advertisement[0]['image_ads_2']) ?>">

                  </a>
                </div>
              </div>
              <br>
              <br>
              <p id="paragraph1">
                <?php
                echo $global_article['paragraph1'];
                ?>
              </p>
            </div>
            <textarea rows="15" class="form-control form-control-light ct-u-margin-both-0" style="display:none;" name="paragraph1">
                       <?php
                        echo $global_article['paragraph1'];
                        ?>
                  </textarea>

          </div>
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- persegi -->
          <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3559167457847068" data-ad-slot="2483989858" data-ad-format="auto" data-full-width-responsive="true"></ins>
          <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
          <div class="ct-article">
            <a class="btn btn-motive btn-square change_picture" id="cp_picture_bd2" onclick="form_up('Second Picture')" style="display: none;">Change Picture</a>
            <div class="ct-article-media">
              <div id="ot_second_picture">
                <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $global_article['second_picture']) ?>" alt="<?php echo str_replace("-", " ", $global_article['second_picture']) ?>">
              </div>
            </div>

            <div class="ct-article-description">
              <p id="paragraph2">
                <?php
                echo $global_article['paragraph2'];
                ?>
              </p>
            </div>

            <textarea rows="15" class="form-control form-control-light ct-u-margin-both-0" style="display:none;" name="paragraph2">
                       <?php
                        echo $global_article['paragraph2'];
                        ?>
            </textarea>

          </div>
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- persegi -->
          <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3559167457847068" data-ad-slot="2483989858" data-ad-format="auto" data-full-width-responsive="true"></ins>
          <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
          <div class="ct-article">
            <a class="btn btn-motive btn-square change_picture" id="cp_picture_bd3" onclick="form_up('Third Picture')" style="display: none;">Change Picture</a>
            <div class="ct-article-media">
              <div id="ot_third_picture">
                <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $global_article['third_picture']) ?>" alt="<?php echo str_replace("-", " ", $global_article['third_picture']) ?>">
              </div>
            </div>
            <div class="ct-article-description">
              <p><a href="https://play.google.com/store/apps/details?id=com.dongengapp&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1">
                  Download Aplikasi Ngedongeng di <img src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png" style="width: 175px"></a>
              </p>
              <div class="media media_middle">
                <div class="ct-article-media">
                  <!-- ADS CUSTOM KETIGA -->
                  <a rel="nofollow" href="<?php echo (isset($advertisement[0]['url_ads_3'])) ? $advertisement['0']['url_ads_3'] : ""; ?>">
                    <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $advertisement[0]['image_ads_3']) ?>"   alt="<?php echo str_replace("-", " ", $advertisement[0]['image_ads_3']) ?>">
                  </a>
                </div>
              </div>
              <br>
              <br>
              <p id="paragraph3">
                <?php
                echo $global_article['paragraph3'];
                ?>
              </p>
            </div>
            <textarea rows="15" class="form-control form-control-light ct-u-margin-both-0" style="display:none;" name="paragraph3">
                       <?php
                        echo $global_article['paragraph3'];
                        ?>
                </textarea>

            <a class="btn btn-motive btn-square change_picture" id="cp_picture_bd4" onclick="form_up('Fourth Picture')" style="display: none;">Change Picture</a>
            <div class="ct-article-media">
              <div id="ot_fourth_picture">
                <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $global_article['fourth_picture']) ?>" alt="<?php echo str_replace("-", " ", $global_article['fourth_picture']) ?>">
              </div>
            </div>

          </div>

          <?php foreach ($recent_posts as $post) : global $i;
            $i++; ?>
            <div class="media media_middle">
              <div class="media-left"><a href="<?php $find = array(" ", "|");
                                                echo base_url($post['uri']); ?>">
                  <img src="<?php global $template;
                            echo base_url("assets/$template->theme" . "images/content/thumbnails") . "/" . $post['picture']; ?>" alt="<?php echo str_replace("-", " ", $post['picture']) ?>" class="media-object image_sidebar" /></a></div>
              <div class="media-body"><a href="<?php echo base_url($post['uri']); ?>">
                  <h6 class="media-heading"><?php echo $post['title']; ?></h6>
                </a><span><?php
                          date_default_timezone_set("Asia/Jakarta");

                          $date = new DateTime($post['created_on']);
                          echo date_format($date, 'F Y');  ?></span>
                <span> with <a href="<?php echo base_url($post['uri']) . '#disqus_thread'; ?>"> </a> </span>
              </div>
            </div>

          <?php if ($i == 7) {
              break;
            }
          endforeach ?>
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- persegi -->
          <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3559167457847068" data-ad-slot="2483989858" data-ad-format="auto" data-full-width-responsive="true"></ins>
          <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
        </form>





        <div id="disqus_thread"></div>
        <script>
          /**
           *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
           *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
          /*
          var disqus_config = function () {
          this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
          this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
          };
          */
          (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
              s = d.createElement('script');
            s.src = 'https://go-dongeng.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
          })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <script id="dsq-count-scr" src="//go-dongeng.disqus.com/count.js" async></script>

      </div>