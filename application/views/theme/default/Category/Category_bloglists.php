<!-- big_top_header -->
<br><br>
<br><br>

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
          "@id": "<?= base_url('kumpulan/' . $this->uri->segment(2)); ?>",
          "name": "<?= $this->uri->segment(2) ?>"
        }
      }
    ]
  }
</script>
<section itemscope itemtype="http://schema.org/Blog" class="ct-section ct-blog">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <?php global $template;
        if (empty($article)) {
        } else {
          foreach ($article->result_array() as $item) {
            $array = array('name_category' => 'name_subcategory', 'name_person' => 'status_user', $item["title"] => 'id_art');
            $str = $this->uri->assoc_to_uri($array);
            $find = array(" ", "|");
            echo '
             <article itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" class="ct-article ' . $item["tag"] . '">
             
               <h4 class="ct-article-title"><a href="' . base_url($item['uri']) . '" itemprop="url">' . $item["title"] . '</a></h4><span itemprop="dateCreated" class="h5 ct-article-meta">' . $item["created_on"] . ' oleh <a href="' . base_url($item['uri']) . '" itemprop="url">Dongengers</a> dalam <a href="#" itemprop="url">' . $item["tag"] . '</a></span>
               <div class="ct-article-media"><a href="' . base_url($item['uri']) . '" itemprop="url"><img src=' . base_url("assets/$template->theme" . "images/content/" . $item["picture"]) . ' alt="' . str_replace("-", " ", $item["picture"]) . '"/></a>
               </div>
               <div itemprop="text" class="ct-article-description">
                 <p>  ' . $item['description'] . '</p>
               </div>
               <div class="ct-article-comments"><a href="' . base_url($item['uri']) . '" class="h6 text-uppercase pull-left">lanjut baca</a>
                 <div class="clearfix"></div>
               </div>
             </article>
             ';
            echo '<ins class="adsbygoogle"
                  style="display:block"
                  data-ad-client="ca-pub-3559167457847068"
                  data-ad-slot="8078361229"
                  data-ad-format="link"
                  data-full-width-responsive="true"></ins>
             <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
             </script>';
          }
        }
        ?>
      </div>
      <div class="col-md-3">

        <div class="ct-sidebar">

          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- persegi -->
          <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3559167457847068" data-ad-slot="2483989858" data-ad-format="auto" data-full-width-responsive="true"></ins>
          <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
          <p><a href="https://play.google.com/store/apps/details?id=com.dongengapp&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1">
              Download Aplikasi Ngedongeng di <img src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png" style="width: 175px"></a></p>

          <p>
            <a href="<?php echo (isset($advertisement[0]['url_ads_4'])) ? $advertisement['0']['url_ads_4'] : ""; ?>">
              <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $advertisement[0]['image_ads_4']) ?>" alt="<?php echo str_replace("-", " ", $advertisement[0]['image_ads_4']) ?>">
            </a>
          </p>


        </div>
      </div>
    </div>
  </div>
</section>