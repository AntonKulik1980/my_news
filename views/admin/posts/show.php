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
                    <?= $title;?>
                </div>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                    <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                </div>
          </div>

            <div class="panel-body">
                <h2><?= $post['title']?></h2>
                <div><?= $post['content']?></div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <a title="Редактировать" href="/admin/posts/edit/<?=$post['id']?>"><button class="save btn btn-danger">Edit Post</button></a>
                <a title="Index" href="/admin/posts">
                  <button class="save btn btn-info">Go Back</button></a>
                </div>
            </div>

        </div>
      </div>
  </div>
</div>

<?php
require_once VIEWS.'shared/admin/footer.php';
