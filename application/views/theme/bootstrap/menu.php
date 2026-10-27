<div id="ct-js-wrapper" class="ct-pageWrapper">
    <div id="modal_login" tabindex="-1" role="dialog" class="modal fade ct-modal ct-modal--small ct-js-modal">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
              <h2 class="ct-modal-title">Login</h2>
              <form>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" placeholder="Login *" id="login_log" required="required" class="form-control form-control-light form-control-bordered-dark"/>
                      <label for="login_log" class="sr-only">Login *</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" placeholder="Password *" id="password_log" required="required" class="form-control form-control-light form-control-bordered-dark"/>
                      <label for="password_log" class="sr-only">Password *</label>
                    </div>
                  </div>
                </div>
                <div class="text-center"><a href="#">Forgot password?</a><a data-toggle="modal" data-target="#modal_register">No account? Register</a></div>
                <div class="text-center">
                  <button type="submit" class="btn btn-motive">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <nav class="ct-nav">
        <div class="navbar navbar-default navbar-fixed text-center">
          <div class="navbar-header"><a href="index.html" class="navbar-brand navbar-panel"><img src="<?php global $template; echo base_url("assets/$template->theme"."images/content/logo.png") ?>" alt="" class="ct-img">
          <img src="<?php echo base_url("assets/$template->theme"."images/content/logo-dark.png") ?>" alt="" class="ct-img-show"></a><a href="tel:08001234567" class="navbar-panel"> <span class="ct-tel">0 800 123 4567</span><i class="fa fa-phone ct-tel-icon"></i></a>
            <ul class="ct-socials list-inline list-unstyled navbar-panel">
              <li class="ct-socials__itemfacebook"><a href="https://www.facebook.com/createITpl"><i class="fa fa-facebook"></i></a></li>
              <li class="ct-socials__itemtwitter"><a href="https://twitter.com/createitpl"><i class="fa fa-twitter"></i></a></li>
              <li class="ct-socials__iteminstagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
          <div class="ct-search ct-js-search">
            <div class="ct-search-icon"><i class="fa fa-search"></i></div>
            <div class="ct-search-fluid">
              <form class="form-group">
                <input type="text" class="form-control">
                <button><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
          <ul class="nav navbar-nav navbar-right navbar-fw">
            <li class="dropdown"><a href="index.html">Home</a>
              <ul class="dropdown-menu">
                <li><a href="coach.html">coach</a>
                </li>
                <li><a href="speaker.html">speaker</a>
                </li>
                <li><a href="training.html">training</a>
                </li>
                <li><a href="online-content.html">online content</a>
                </li>
                <li><a href="coming-soon.html">coming soon</a>
                </li>
                <li><a href="index.html">corporate</a>
                </li>
              </ul>
            </li>
            <li><a href="about.html">About me</a>
            </li>
            <li><a href="services.html">services</a>
            </li>
            <li><a href="portfolio.html">case study</a>
            </li>
            <li><a href="pricing.html">pricing</a>
            </li>
            <li><a href="testimonials.html">testimonials</a>
            </li>
          </ul>
        </div>
      </nav>
      <header data-background="<?php echo base_url("assets/$template->theme"."images/content/slider-bg.jpg") ?>" data-height="34%" data-parallax="50" class="ct-u-display-tablex text-uppercase text-center">
        <div class="inner">
          <h1 class="h1 ct-u-color--white ct-u-margin-top-20">blog</h1>
        </div>
      </header>