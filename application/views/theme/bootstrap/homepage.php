<div class="modal fade" id="mustLoginModal" tabindex="-1" role="dialog" aria-labelledby="mustLoginModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Login Required</h4>
            </div>
            <div class="modal-body">
                <p></p>
               

<!--                 <p><fb:login-button size="large" autologoutlink="true" scope="public_profile,email" onlogin="checkLoginState();">Login with Facebook</fb:login-button>
</p> -->
            </div>
<!--         <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
</div> -->

    </div>
  </div>
</div>
<?php foreach($products as $val){ ?>
<div class="col-lg-4">
        <div class="mWrap">
            <div class="innerUpper">
                <div class="logoWrap" style="background:url('') no-repeat center center"></div>


                <div class="detailWrap">
                    <p class="mName"><?php //echo $val['title'] ?></p>
                    <!--<p class="industry">Fashion</p>-->
                </div>

            </div>

                            <div class="rateWrap">
                        <p class="rateCap">Cashback</p>
                        <p class="percent"><?php //echo $val['price_cut'] ?></p>
                    </div>

            <p class="mDesc"><?php //echo $val['description'] ?></p>


            <a href="#" data-toggle="modal" data-target="#mustLoginModal" "="" class="goto btn btn-s-md btn-danger getitnow" id="linker_1" target="_blank">Go to Website</a>


        </div>
</div>
<?php } ?>