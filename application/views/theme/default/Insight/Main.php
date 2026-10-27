<section class="ct-section">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="ct-section-header ct-section-header-decoration-left ct-u-margin-bottom-30"><span class="h5 ct-u-color--gray">looking for Jobs?</span>
          <h2 class="h1">Tell Us How Good You Are</h2>
        </div>
        <p class="ct-u-margin-bottom-30">

          Pengaturan Iklan Pada website

        </p>

        <form action="<?php global $template;
                      echo base_url('insight/add_advertise_custom'); ?>" method="post" enctype="multipart/form-data" class=" ct-form">
         <input type="text" style="display:none;" value="" id="temp_idcp" />
       
          <div id="1" role="tablist" aria-multiselectable="true" class="panel-group ct-accordion-dark">
            <div class="panel panel-default">
              <div role="tab" id="header-1" class="panel-heading">
                <h4 class="panel-title"><a aria-controls="collapse-1" aria-expanded="true" data-parent="#1" data-toggle="collapse" href="#collapse-1" role="button" class="collapsed">Ads pertama </a></h4>
              </div>
              <div id="collapse-1" role="tabpanel" aria-labelledby="header-1" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="form-group">
                    <input type="text" name="url_ads_1" value=" <?php  echo (isset($advertisement[0]['url_ads_1']))? $advertisement['0']['url_ads_1']: "";?>" placeholder="url ADS 1" required="required" class="form-control form-control-light input-lg" />

                  </div>
                  <a class="btn btn-motive btn-square change_picture" id="cp_picture_ads1" onclick="form_up('ADS 1')">Change Picture</a>
                  <div class="ct-article-media">
                    <div id="picture_ads_1">
                      <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $advertisement[0]['image_ads_1']) ?>" alt="<?php echo str_replace("-", " ", $advertisement[0]['image_ads_1']) ?>">
                    </div>
                  </div>


                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div role="tab" id="header-2" class="panel-heading">
                <h4 class="panel-title"><a aria-controls="collapse-2" aria-expanded="true" data-parent="#1" data-toggle="collapse" href="#collapse-2" role="button" class="collapsed">Ads Kedua</a></h4>
              </div>
              <div id="collapse-2" role="tabpanel" aria-labelledby="header-2" class="panel-collapse collapse ">
                <div class="panel-body">
                  <div class="form-group">
                    <input type="text" name="url_ads_2" value=" <?php  echo (isset($advertisement[0]['url_ads_2']))? $advertisement['0']['url_ads_2']: "";?>" placeholder="Ads Kedua" required="required" class="form-control form-control-light input-lg" />
                  </div>

                  <a class="btn btn-motive btn-square change_picture" id="cp_picture_ads2" onclick="form_up('ADS 2')">Change Picture</a>
                  <div class="ct-article-media">
                    <div id="picture_ads_2">
                      <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $advertisement[0]['image_ads_2']) ?>" alt="<?php echo str_replace("-", " ", $advertisement[0]['image_ads_2']) ?>">
                    </div>
                  </div>


                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div role="tab" id="header-3" class="panel-heading">
                <h4 class="panel-title"><a aria-controls="collapse-3" aria-expanded="true" data-parent="#1" data-toggle="collapse" href="#collapse-3" role="button" class="collapsed">Ads Ketiga </a></h4>
              </div>
              <div id="collapse-3" role="tabpanel" aria-labelledby="header-3" class="panel-collapse collapse ">
                <div class="panel-body">
                  <div class="form-group">
                    <input type="text" name="url_ads_3" value=" <?php  echo (isset($advertisement[0]['url_ads_3']))? $advertisement['0']['url_ads_3']: "";?>" placeholder="Ads Ketiga" required="required" class="form-control form-control-light input-lg" />
                  </div>

                  <a class="btn btn-motive btn-square change_picture" id="cp_picture_ads3" onclick="form_up('ADS 3')">Change Picture</a>
                  <div class="ct-article-media">
                    <div id="picture_ads_3">
                      <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $advertisement[0]['image_ads_3']) ?>" alt="<?php echo str_replace("-", " ", $advertisement[0]['image_ads_3']) ?>">
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div role="tab" id="header-4" class="panel-heading">
                <h4 class="panel-title"><a aria-controls="collapse-4" aria-expanded="true" data-parent="#1" data-toggle="collapse" href="#collapse-4" role="button" class="collapsed">Ads Keempat </a></h4>
              </div>
              <div id="collapse-4" role="tabpanel" aria-labelledby="header-4" class="panel-collapse collapse ">
                <div class="panel-body">
                  <div class="form-group">
                    <input type="text" name="url_ads_4" value=" <?php  echo (isset($advertisement[0]['url_ads_4']))? $advertisement['0']['url_ads_4']: "";?>" placeholder="url ads 4" required="required" class="form-control form-control-light input-lg" />
                  </div>

                  <a class="btn btn-motive btn-square change_picture" id="cp_picture_ads4" onclick="form_up('ADS 4')">Change Picture</a>
                  <div class="ct-article-media">
                    <div id="picture_ads_4">
                      <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $advertisement[0]['image_ads_4']) ?>" alt="<?php echo str_replace("-", " ", $advertisement[0]['image_ads_4']) ?>">
                    </div>
                  </div>

                </div>
              </div>
            </div>


            <div class="panel panel-default">
              <div role="tab" id="header-5" class="panel-heading">
                <h4 class="panel-title"><a aria-controls="collapse-5" aria-expanded="true" data-parent="#1" data-toggle="collapse" href="#collapse-5" role="button" class="collapsed"> ADS SIDEBAR</a></h4>
              </div>
              <div id="collapse-5" role="tabpanel" aria-labelledby="header-5" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="form-group">
                    <input type="text" name="url_ads_sidebar" value=" <?php  echo (isset($advertisement[0]['url_ads_sidebar']))? $advertisement['0']['url_ads_sidebar']: "";?>" placeholder="url ADS 5" required="required" class="form-control form-control-light input-lg" />
                  </div>
                  <a class="btn btn-motive btn-square change_picture" id="cp_picture_ads_sidebar" onclick="form_up('ADS SIDEBAR')">Change Picture</a>
                  <div class="ct-article-media">
                    <div id="picture_ads_sidebar">
                      <img src="<?php echo base_url("assets/$template->theme" . "images/content/" . $advertisement[0]['image_ads_sidebar']) ?>" alt="<?php echo str_replace("-", " ", $advertisement[0]['image_ads_sidebar']) ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-7">
              <button type="submit" class="btn btn-motive btn-square">SUBMIT</button>
            </div>
            <div class="col-xs-5">
              <button type="reset" class="btn btn-link"><i class="fa fa-close"></i>clear</button>
            </div>
        </form>
      </div>
    </div>

    <script>
      function form_up(id) {
        $(".title-pop-up").text(id);
        var res = id.replace(" ", "_");
        res = res.replace(" ", "_");
        res = res.toLowerCase();
       $("#temp_idcp").val("picture_" + res);
        $('#picture_input').attr('name', 'image_' + res + '[]');
        $('#pop_cp').modal('show');
      }
      function sukses() {
       jQuery('#form_picture').resetForm();

     }
    </script>
    

    <div class="modal fade" id="pop_cp" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Change Picture</h3>
          </div>
          <div class="modal-body form">
            <form action="<?php echo base_url('ajax/upload_picture_ads'); ?>" id="form_picture_ads" enctype="multipart/form-data" class="form-horizontal">
              <label class="title-pop-up">Change Picture</label>
              <input id="picture_input" class="btn btn-motive btn-square" name="picture_head[]" type="file" />
              <label for="picture_input" class="sr-only">Your message *</label>
              <input type="hidden" value="2" name="id" />
              <div class="form-group">
              </div>
              <input type="submit" id="hover_click" class="btn btn-motive btn-square" value="Upload">

            </form>
          </div>
        </div>
      </div>
    </div>