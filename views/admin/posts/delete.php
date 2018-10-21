<?php
    require_once VIEWS.'shared/admin/header.php';
?>
<div class="page-content">
   <div class="row">
        <div class="col-md-3">
        <?php
          require_once VIEWS.'shared/admin/_aside.php';
        ?>
        </div>
      <div class="col-md-9">
        <div class="content-box-large">
          <div class="panel-heading">
                <div class="panel-title">
                    <?= $title;?> <?= $post['title']?>
                </div>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                    <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                </div>
          </div>

          <form class="form-horizontal" role="form" method="POST">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-12 control-label"><h2>This Post will be deleted! Are You Sure?</h2></label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button name="submit" type="submit" class="save btn btn-danger">Delete Post</button>
                  <button name="reset" class="save btn btn-info">Cansel</button>
                </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<?php
require_once VIEWS.'shared/admin/footer.php';
