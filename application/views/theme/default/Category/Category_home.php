<h5> <?php  global $template;

// var_dump($get_categories);
?></h5>

 <section class="ct-section ct-u-background--motive" data-background="<?=base_url("assets/theme/default/images/content/background-go-dongeng.png")?>" >
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

 <!-- topHeader -->
 <ins class="adsbygoogle"
      style="display:inline-block;width:970px;height:250px"
      data-ad-client="ca-pub-3559167457847068"
      data-ad-slot="1618140218"></ins>
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



 <?php
    if(empty($article)){

    }
    else{
       $i = 1;

          foreach($article->result_array() as $item){


           $array = array('name_category' => 'name_subcategory', 'name_person' => 'status_user', $item["title"] => 'id_art');

           $str = $this->uri->assoc_to_uri($array);
           $find = array(" ","|");
           $url = base_url($item['uri']);

           if ($i == 1 ){
             echo '<div class="row">';
           }
             echo' <div itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" class="col-md-4 col-sm-4">
               <a href="'.base_url($item['uri']).'" itemprop="url">
                 <div class="ct-personBox">
                   <div class="ct-personBox-image">
                   <img src="'.base_url("assets/$template->theme"."images/content/".$item["picture"]).'" alt="'.str_replace($find," ",$item["picture"]).'"/>
                   </div>
                   <div class="ct-personBox-description">
                     <div class="ct-personBox-meta">
                       <span class="h5 ct-personBox-name" itemprop="text" >'.$item["title"].'</span>
                        <span itemprop="dateCreated" class="ct-personBox-position">'.$item["created_on"].'</span>
                       <span class="ct-personBox-position">'.$item["tag"].'</span>
                     </div>
                   </div>
                 </div>
                </a>
             </div>
             ';
             if ($i % 3 == 0 ){
              echo '</div> <div class="row">';
             }
             $i++;



           }
           ?>

           <!-- topHeader -->
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
