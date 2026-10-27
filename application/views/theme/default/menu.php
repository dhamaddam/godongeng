      <nav class="ct-nav">
        <div class="navbar navbar-default navbar-fixed text-center">
          <div class="navbar-header">
          <a href="<?php echo base_url() ?>" class="navbar-brand navbar-panel">
            <img src="<?php global $template; echo base_url("assets/$template->theme"."images/content/logo-go-dongeng.png") ?>" alt="Logo ngedongeng Indonesia" >
          </a>
          </div>
      </div>
      </nav>
      <!-- <header data-background="<?php echo base_url("assets/$template->theme"."images/content/top_1.png") ?>" data-height="100%" data-parallax="10%" class="ct-u-display-tablex text-uppercase text-center">
        <div class="inner">
          <h1 class="h1 ct-u-color--white ct-u-margin-top-20">Contact Us</h1>
        </div>
      </header>
 -->


<script type="text/javascript">

function submit(){



          $.ajax({
            url : "<?php echo base_url('ajax/do_login')?>/"+username.value+"_"+password.value,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {

              if (data.status){
                    $("#login").hide();
                    window.location.href = "<?php echo base_url('insight'); ?>";
              }
              else{

                alert("wrong username or password");

              }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
function logout(){


          $.ajax({
            url : "<?php echo base_url('ajax/do_logout') ?>/",
            type: "POST",
            dataType: "JSON",
            success: function(data){
              $("#login").hide();
              $("#writeUp").hide();
              $("#insight").show();
              $('#pop_login').modal('hide');
              $('#modal_form').modal('show');
               window.location.href = "<?php echo base_url(); ?>";
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
</script>
<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Person Form</h3>
      </div>
       <div class="modal-body form">

            Welcome to Night

        </div>
    </div>
    </div>
  </div>
