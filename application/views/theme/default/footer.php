 <!-- Footer-->
      <footer class="ct-footer"  data-background="<?=base_url("assets/theme/default/images/content/godongeng-color-background-bottom.jpg")?>">
        <div class="ct-prefooter">
          <div class="container">
                <div class="col-md-6 col-lg-4">
                  <h4 class="petunjuk-header">Ayo Baca Dongeng</h4>
                  <p></p>
                  <p>Membaca kumpulan dongeng anak dan kisah sederhana, memberi pesan mendidik tanpa hardik dengan karya fiksi Indonesia </p>
                  <p>
                    <a href="<?=base_url("kumpulan/dongeng")?>"> Baca Buku dongeng Online  </a> <br>
                    <a href="<?=base_url("kumpulan/folklore")?>"> Baca Cerita Folklor Online  </a> <br>
                    <a href="<?=base_url("kumpulan/fabel")?>"> Baca Cerita anak anak  </a> <br>
                    <a href="<?=base_url("blog/buku-dongeng-anak")?>"> Cerita Bergambar Online  </a> <br>
                  </p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h4 class="petunjuk-header">Kontak</h4>

                    <p>+ (62)  896 0213 6722</p>
                    <p> appdorms@gmail.com</p>
                    <a href="javascript:void(0)" onclick="login_up()" > Login Penulis </a>
                    <h4 class="ct-footer-copyright">Download App</h4>
                    <p><a href="https://play.google.com/store/apps/details?id=com.dongengapp&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1"><img src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png" style="width: 175px"></a></p>

                </div>
                <div class="col-md-12 col-lg-4">

                </div>
          </div>
        </div>
        <div class="ct-postfooter">
          <div class="container">
            <div class="ct-footer-navigation">
              <ul class="list-inline list-unstyled text-uppercase">
              </ul>
            </div>
          </div>
          <div class="ct-footer-copyright">
            <div class="container">&copy; 2018 powered by <a href="https://idtronik.com" target="_blank"> IDtronik </a> </div>
          </div>
        </div>

    <script  type="text/javascript" src=" <?php global $template; echo base_url("assets/$template->theme"."js/jquery-2.1.4.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/$template->theme"."js/sella.min.js")?>"></script>
    <script src="<?php echo base_url("assets/$template->theme"."js/main.js")?>"></script>
    <script src="<?php echo base_url("assets/$template->theme"."form/js/contact-form.js")?>"></script>

    <script src="<?php echo base_url("assets/$template->theme"."js/jquery.dataTables.min.js")?>"></script>

    <script src="<?php echo base_url("assets/$template->theme"."js/dataTables.bootstrap.js")?>"></script>



    <script src="<?php echo base_url("assets/$template->theme"."js/bootstrap.min.js")?>"></script>

    <script  type="text/javascript" src="<?php echo base_url("assets/$template->theme"."js/jquery.form.js"); ?>"></script>


<div class="modal fade" id="pop_login" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Login Form</h3>
      </div>
      <div class="modal-body form">
        <div class="form-group">
          <input type="text" placeholder="username" id="username" required="required" class="form-control input-lg">
        </div>
        <div class="form-group">
          <input type="password" placeholder="password" id="password" required="required" class="form-control input-lg">
        </div>
          <a href="javascript:void(0)" onclick="submit()" class="btn btn-motive-o last">submit</a></li>
        </div>
    </div>
    </div>
  </div>

      </footer>
    </div>

    <script type="text/javascript">

     function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });
      }

    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
      }

      function login_up(){
        $('#pop_login').modal('show');
      }

jQuery(document).ready(function() {
    $('#form_picture').on('submit', function(e) {
        e.preventDefault();

        var idcp = $('#temp_idcp').val();
        jQuery('#'+idcp).html('<div style="padding:10px"><img src="<?php echo base_url('assets/'.$template->theme.'/images/ajax-loader.gif'); ?>" alt="Please Wait"/><span>Mengunggah...</span></div>');

        jQuery(this).ajaxSubmit({
          target: '#'+idcp,
          success:  sukses
         });
        $('#pop_formcp').modal('hide');
      });
 });

 jQuery(document).ready(function() {
    $('#form_picture_ads').on('submit', function(e) {
        e.preventDefault();

        var idcp = $('#temp_idcp').val();
        jQuery('#'+idcp).html('<div style="padding:10px"><img src="<?php echo base_url('assets/'.$template->theme.'/images/ajax-loader.gif'); ?>" alt="Please Wait"/><span>Mengunggah...</span></div>');

        jQuery(this).ajaxSubmit({
          target: '#'+idcp,
          success:  sukses
         });
        $('#pop_cp').modal('hide');
      });
 });

 var page = 1;
 var base = "<?=base_url()?>";
 var base_image = "<?=base_url("assets/$template->theme"."images/content/")?>";

   $(".load-more").not(".disabled").click(function () {
     $(this).html("Loading");
     page++;
    //  alert(page);
     mycontent(page,base);
   });

 function mycontent(mypage,base){
   $.post(base + 'ajax/load', {page: mypage}, function(data) {
     var hasil = JSON.parse(data);
     for ( var i = 0; i < hasil.length; i++){
       var a = '',b = '';
       if (i % 2 == 0  && i > 0){
         $('#tampil').append(
           '<div class="col-sm-4">\n' +
           '                <a href="'+ base + hasil[i]['uri'] + '">\n' +
           '                   <div class="ct-personBox"> <div class="ct-personBox-image">\n' +
           '                   <img src="'+ base_image +'/' + hasil[i]["picture"]+ '"/></div>\n' +
           '                        <div class="ct-personBox-description">\n' +
           '                    <div class="ct-personBox-meta">\n' +
           '                    <span class="h5 ct-personBox-name">'+ hasil[i]["title"] +'</span>\n' +
           '                    <span class="ct-personBox-position">'+ hasil[i]["tag"]+'</span>\n' +
           '                </div></div></div></a>\n' +
           '</div> </div> <div class="row">'
         )
       }
       else{
         $('#tampil').append(
           '<div class="col-sm-4">\n' +
           '                <a href="'+ base + hasil[i]['uri'] + '">\n' +
           '                   <div class="ct-personBox"> <div class="ct-personBox-image">\n' +
           '                   <img src="'+ base_image +'/' + hasil[i]["picture"]+ '"/></div>\n' +
           '                        <div class="ct-personBox-description">\n' +
           '                    <div class="ct-personBox-meta">\n' +
           '                    <span class="h5 ct-personBox-name">'+ hasil[i]["title"] +'</span>\n' +
           '                    <span class="ct-personBox-position">'+ hasil[i]["tag"]+'</span>\n' +
           '                </div></div></div></a>\n' +
           '</div> '
         )
       }


     }
     loadImage();
     if(hasil.length ==   0){
       $('.load-more').html("Last");
       $('.load-more').addClass('disabled').attr('disabled','');
     } else {
       $('.load-more').html("See More...");
     }
   });
 }
 function loadImage() {
   $('.item .img, .item .user-image').each(function() {
     var img = $(this);
     var src = img.data('src');
     img.css('background-image','url(' + src + ')');
   });
 }





</script>
