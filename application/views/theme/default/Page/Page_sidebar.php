   <div class="col-md-3">
     <div id="fb-root"></div>
     <script>
       (function(d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s);
         js.id = id;
         js.src = "//connect.facebook.net/en_En/sdk.js#xfbml=1&version=v2.5";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
     </script>
     <div class="ct-sidebar ">




       <?php
        $user = $this->session->userdata();

        $login = $this->input->get("login");
        if ($login == "true") {

          echo '<button class="btn btn-motive btn-square" id="writeUp" onclick="write_up();">Write Up</button>';
          echo '<button class="btn btn-motive btn-square" id="addArticle" onclick="add_article()" style="display: none;">Add Article</button>';
          echo '<button class="btn btn-motive btn-square" id="saveArticle" onclick="save_article()" style="display: none;">Save</button>';
        } else {
        ?>
         <div class="widget widget_latest_posts sidebar-fixed hidden-xs hidden-sm ">
           <div class="widget-inner">


           </div>
           <div class="ads-padding">
             <!-- persegi -->
             <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3559167457847068" data-ad-slot="2483989858" data-ad-format="auto" data-full-width-responsive="true"></ins>
             <script>
               (adsbygoogle = window.adsbygoogle || []).push({});
             </script>
             <div class="media-left">

               <!-- ADS SIDEBAR -->
               <a href="<?php global $template;
                        echo (isset($advertisement[0]['url_ads_sidebar'])) ? $advertisement['0']['url_ads_sidebar'] : ""; ?>">
                 <img style="width: 100%;" src="<?php echo base_url("assets/$template->theme" . "images/content/" . $advertisement[0]['image_ads_sidebar']) ?>" class="media-object" alt="<?php echo str_replace("-", " ", $advertisement[0]['image_ads_sidebar']) ?>">
               </a>
             </div>

           </div>

         </div>

         <div class="widget widget_latest_posts  ">

           <div class="widget-inner">
             <h4 class="widget-title">recent posts</h4>
             <?php foreach ($recent_posts as $post) : ?>
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

             <?php endforeach ?>

           </div>
           <div class="ads-padding">
             <!-- 2ndsidebar -->
             <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3559167457847068" data-ad-slot="6337186251" data-ad-format="auto"></ins>
             <script>
               (adsbygoogle = window.adsbygoogle || []).push({});
             </script>
           </div>

           <div class="widget widget_tag_cloud ">
             <div class="widget-inner">
               <div class="tagcloud"><a href="#" class="tag-link-0"><?php //echo $global_article['tag'];
                                                                    ?></a>
               </div>
             </div>
           </div>

         </div>
       <?php
          echo '
                            <button class="btn btn-motive btn-square" style="display: none;" id="writeUp" onclick="write_up();">Write Up</button>';
        }
        ?>

     </div>
   </div>
   </div>
   </div>
   </section>


   <script>
     function reload_text() {

       var id_rev = $("input[name=id]").val();
       $.ajax({
         url: "<?php echo base_url('ajax/show_article') ?>/" + id_rev,
         type: "GET",
         dataType: "JSON",
         success: function(data) {

           $('[name="id"]').val(data.id);
           $('[name="description"]').val(data.description);
           $('#description').text(data.description);

           $('[name="paragraph1"]').val(data.paragraph1);
           $('#paragraph1').text(data.paragraph1);

           $('[name="paragraph2"]').val(data.paragraph2);
           $('#paragraph2').text(data.paragraph2);

           $('[name="paragraph3"]').val(data.paragraph3);
           $('#paragraph3').text(data.paragraph3);

         },
         error: function(jqXHR, textStatus, errorThrown) {
           alert('Error get data from ajax');
         }
       });
     }

     function write_up() {

       $("#addArticle").show();
       $(".ct-article-description").css("display", "none");
       $(".form-control").css("display", "block");
       //picture
       $(".picture").css("display", "block");
       $("#saveArticle").show();
       //cp_description
       $(".change_picture").css("display", "block");

       // alert(id_rev);
       // $(".ct-article-description").html('<textarea rows="5" class="form-control form-control-light ct-u-margin-both-0"></textarea>');
     }

     function click_ghost() {
       $("#click_ghost")[0].click();

     }

     function form_up(id) {
       $(".title-pop-up").text(id);
       var res = id.replace(" ", "_");
       res = res.replace(" ", "_");
       res = res.toLowerCase();
       $("#temp_idcp").val("ot_" + res);
       $('#picture_input').attr('name', res + '[]');

       $('#pop_formcp').modal('show');
     }

     function save_article() {
       url = "<?php echo base_url('ajax/update_article') ?>";

       $.ajax({
         url: url,
         type: "POST",
         data: $('#form').serialize(),
         dataType: "JSON",
         success: function(data) {
           $('#pop_info').modal('show');
         },
         error: function(jqXHR, textStatus, errorThrown) {
           alert('Error adding / update data');
         }
       });

       reload_text();
       $(".ct-article-description").css("display", "block");
       $(".form-control").css("display", "none");
       $(".picture").css("display", "none");

       $("#saveArticle").hide();
       $(".change_picture").css("display", "none");
     }

     function add_comments() {
       url = "<?php echo base_url('ajax/add_comment') . "/" . $global_article['id_art']; ?>";

       $.ajax({
         url: url,
         type: "POST",
         data: $('#form_comments').serialize(),
         dataType: "JSON",
         success: function(data) {
           $('#pop_info').modal('show');
         },
         error: function(jqXHR, textStatus, errorThrown) {
           alert('Error adding / update data');
         }
       });


     }

     function sukses() {
       jQuery('#form_picture').resetForm();

     }
   </script>

   <div class="modal fade" id="pop_info" role="dialog">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h3 class="modal-title">Information</h3>
         </div>
         <div class="modal-body form">

           Changes was updated

         </div>
       </div>
     </div>
   </div>

   <!-- pop_formcp -->
   <div class="modal fade" id="pop_formcp" role="dialog">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h3 class="modal-title">Change Picture</h3>
         </div>
         <div class="modal-body form">
           <form action="<?php echo base_url('ajax/upload_picture'); ?>" id="form_picture" enctype="multipart/form-data" class="form-horizontal">
             <label class="title-pop-up">Change Picture Head</label>
             <input id="picture_input" class="btn btn-motive btn-square" name="picture_head[]" type="file" />
             <label for="picture_input" class="sr-only">Your message *</label>
             <input type="hidden" value="<?php echo $global_article['id_art']; ?>" name="id" />
             <div class="form-group">
             </div>
             <input type="submit" id="hover_click" class="btn btn-motive btn-square" value="Upload">
           </form>

         </div>
       </div>
     </div>
   </div>
   </div>