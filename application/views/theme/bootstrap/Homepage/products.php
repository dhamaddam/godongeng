      <div id="modal_register" tabindex="-1" role="dialog" class="modal fade ct-modal ct-modal--small ct-js-modal">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
              <h2 class="ct-modal-title">Register</h2>
              
              <form>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" placeholder="Login *" id="login_reg" required="required" class="form-control form-control-light form-control-bordered-dark"/>
                      <label for="login_reg" class="sr-only">Login *</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" placeholder="Password *" id="password_reg" required="required" class="form-control form-control-light form-control-bordered-dark"/>
                      <label for="password_reg" class="sr-only">Password *</label>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input type="email" placeholder="Email *" id="email_reg" required="required" class="form-control form-control-light form-control-bordered-dark"/>
                      <label for="email_reg" class="sr-only">Email *</label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-motive">Register
                    <!-- Navigation-->
                  </button>
                </div>
              </form>


            </div>
          </div>
        </div>
      </div>
       <article itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" class="ct-article ct-article-aside">
                <h4 class="ct-article-title"><a href="blog-single.html" itemprop="url">this is aside post</a></h4><span itemprop="dateCreated" class="h5 ct-article-meta">July 9, 2015 by <a href="#" itemprop="url">Admin</a> in <a href="#" itemprop="url">Announcements</a></span>
                <div itemprop="text" class="ct-article-description">
                  <p>Nam a diam tincidunt, condimentum nisi et, fringilla lectus. Nullam nec lectus eu erat tempus pulvinar. Quisque mauris felis, porta et cursus vel. Nullam nec lectus eu erat tempus pulvinar. Quisque mauris felis, porta et cursus vel.</p>
                </div>
              </article>
              <nav>
                <ul class="pagination">
                  <li><a href="#" aria-label="Previous"><i class="fa fa-long-arrow-left"></i>Prev</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#" aria-label="Next">next<i class="fa fa-long-arrow-right"></i></a></li>
                </ul>
              </nav>
            </div>
          
          </div>
        </div>
      </section>
    









<!-- 

      <section itemscope itemtype="http://schema.org/Blog" class="ct-section ct-blog">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
             
            
             
            </div>
          
<tr>
  <h3 class="recommended_product b-b-3x">Recommended Products</h3>
    <?php
    $c = 0;
  
    foreach($products as $product){
    //print_r($product);

    if($c%4 == 0 ){
        echo '<div class="row m-n">';
    }
    ?>
    
<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 product_card">
    <a href="<?php global $template; echo $product['link']; ?> " target="_blank"  class="">
    <div class="thumbnail">
      <img alt="#" src="<?php echo  base_url("assets/".$template->theme."images/content/user.jpg");//$product['images'] ?>" title="<?php  echo ($product['brand_name'].' '.$product['product_name'].' at RM '. ($product['price_discounted'] > 0 && $product['price_discounted'] != $product['price'] ? $product['price_discounted'] : $product['price'])); ?>" src="<?php //$product['images']; ?>" class="scale img-responsive prod_img" />
          <div class="caption">
          <div class="product_brand"><?php echo ($product['brand_name'] ? $product['brand_name'] : "&nbsp;" ); ?></div>
          <div class="product_title"><?php echo substr($product['product_name'], 0, 90); ?></div>
          
          <span class="product_price <?php echo ( $product['price_discounted'] > 0 && $product['price_discounted'] != $product['price'] ? 'strikethru' : ''); ?>"><?php echo 'RM'.number_format($product['price'],2); ?></span>
          <span class="discounted_price m-l"><?php echo ($product['price_discounted'] > 0 && $product['price_discounted'] != $product['price'] ? 'RM'.number_format($product['price_discounted'],2) : '');  ?></span>
        </div>
    </div>
    </a>
</div>
        
    
<?php

    if($c > 0 && $c%4 == 3 || $c == sizeof($products)-1  ){
        echo '</div>';
    }
    
    $c++;
    
    
    }
?>
        
<nav class="text-center">
  <ul class="ss_pagination">
      
          <?php echo $this->pagination->create_links(); ?>
      
  </ul>
</nav>
</tr>

<script type="text/javascript" charset="utf-8">
  $('tr').css('background', '#e3e3e3');
</script>
            <div class="col-md-3">
              
              <div class="ct-sidebar">
                <form class="ct-form-search">
                  <div class="form-group">
                    <input type="text" placeholder="Search" id="search_sidebar" required="required" class="form-control form-control-light input-lg"/>
                    <label for="search_sidebar" class="sr-only">Search</label>
                    <button type="submit" class="ct-search-submit"><i class="fa fa-search"></i></button>
                  </div>
                </form>
             
              </div>
            </div>
          </div>
        </div>
      </section>
     
    </div>
   
        </div>
      </div>
    </div> -->