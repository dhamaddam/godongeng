<section class="ct-section">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-md-push-3">
              <div class="ct-section-header ct-section-header-decoration-left ct-u-margin-bottom-30"><span class="h5 ct-u-color--gray">Write More Articles</span>
                <h2 class="h1">Adding New Thread </h2>
              </div>

                 <form action="<?php echo base_url('insight/add_article'); ?>" method="post" enctype="multipart/form-data" class=" ct-form">
                      <div class="inner-group">
                        <div class="form-group">
                          <select type="text" name="id_category" placeholder="Category *" id="category" required="required" class="form-control form-control-light input-lg">

                            <?php
                              foreach($categories->result_array() as $item){
                                    echo '<option value="'.$item["id"].'" >'.$item["alias"].'</option>';
                                  }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <input type="text" name="title" placeholder="Title *" required="required" class="form-control form-control-light input-lg"/>
                        </div>

                        <div class="form-group">
                          <input type="text" name="tag" placeholder="tag *"  required="required" class="form-control form-control-light input-lg"/>
                        </div>

                        <div class="form-group">
                          <input id="picture_input" class="btn btn-motive btn-square" name="picture[]" type="file" />
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-xs-7">
                          <button type="submit" class="btn btn-motive btn-square">Add Thread</button>
                        </div>
                        <div class="col-xs-5">
                          <button type="reset" class="btn btn-link"><i class="fa fa-close"></i>clear</button>
                        </div>
                      </div>
                    </form>


              </div>
