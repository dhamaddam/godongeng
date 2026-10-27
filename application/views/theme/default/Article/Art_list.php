
  <div class="clearfix"></div>
    <section data-background="<?php  global $template; echo base_url("assets/$template->theme"."images/content/parallax-section.jpg") ?>" data-height="60%" data-parallax="50" class="ct-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="row ct-u-color--white">
                <div class="col-sm-6">
                    <div class="ct-section-item ct-section-item-content ct-section-item-last">
                      <div class="ct-section-header ct-section-header-decoration-left ct-u-margin-bottom-30"><span class="h5 ct-u-color--gray"><?php  echo (isset($user_global_profiles['profile_desc']))? $user_global_profiles['profile_desc']: "";?> shortly speaking</span>
                            <h2 class="h1">let me show<br>how good i am</h2>
                    </div>
                    <span class="progress-bar-label">Karya Tulis<span><?php  echo (isset($user_global_profiles['karya_tulis']))? $user_global_profiles['karya_tulis'].'%': "50%";?></span></span>
                    <div class="progress">
                      <div role="progressbar" aria-valuenow="<?php  echo (isset($user_global_profiles['karya_tulis']))? $user_global_profiles['karya_tulis'].'%': "50%";?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo (isset($user_global_profiles['karya_tulis']))? $user_global_profiles['karya_tulis'].'%': "50%";?>" class="progress-bar"></div>
                    </div><span class="progress-bar-label">Ide Cerita<span><?php  echo (isset($user_global_profiles['ide_cerita']))? $user_global_profiles['ide_cerita'].'%': "50%";?></span></span>
                    <div class="progress">
                      <div role="progressbar" aria-valuenow="<?php  echo (isset($user_global_profiles['karya_tulis']))? $user_global_profiles['karya_tulis'].'%': "50%";?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo (isset($user_global_profiles['ide_cerita']))? $user_global_profiles['karya_tulis'].'%': "50%";?>" class="progress-bar"></div>
                    </div>

                    <span class="progress-bar-label">Design<span><?php  echo (isset($user_global_profiles['design']))? $user_global_profiles['design'].'%': "50%";?></span></span>
                    <div class="progress">
                      <div role="progressbar" aria-valuenow="<?php  echo (isset($user_global_profiles['design']))? $user_global_profiles['design'].'%': "50%";?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo (isset($user_global_profiles['design']))? $user_global_profiles['karya_tulis'].'%': "50%";?>" class="progress-bar"></div>
                    </div>
                  </div>
                 
                </div>
                <div class="col-sm-6">
                  <div class="ct-counter">
                    <img width="100px" height="100px" src="<?php echo $user = $this->session->userdata("image");  ?>" alt="">
                     
                    <div data-from="0" data-to="<?php  echo (isset($user_global_profiles['design']))? $user_global_profiles['design']: "50";?>" data-speed="5000" class="ct-js-counter"></div><span class="h4"> Created So Far</span> <img src="<?php echo base_url("assets/$template->theme"."images/content/logo-counter.png") ?>" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div id="1" role="tablist" aria-multiselectable="true" class="panel-group">
                <div class="panel panel-default">
                  <div role="tab" id="header-1" class="panel-heading">
                    <h4 class="panel-title"><a aria-controls="collapse-1" aria-expanded="true" data-parent="#1" data-toggle="collapse" href="#collapse-1" role="button" class="collapsed">Profile Description</a></h4>
                  </div>
                  <div id="collapse-1" role="tabpanel" aria-labelledby="header-1" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p><?php  echo (isset($user_global_profiles['profile_desc']))? $user_global_profiles['profile_desc']: "";?></p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div role="tab" id="header-2" class="panel-heading">
                    <h4 class="panel-title"><a aria-controls="collapse-2" aria-expanded="true" data-parent="#1" data-toggle="collapse" href="#collapse-2" role="button">More Profile Description </a></h4>
                  </div>
                  <div id="collapse-2" role="tabpanel" aria-labelledby="header-2" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <p> 
                      <?php  echo (isset($user_global_profiles['Profile_desc_one']))? $user_global_profiles['Profile_desc_one']: "";?></p>
                    </div>
                  </div>
                </div> 

              </div>
            </div>
          </div>
        </div>
      </section>