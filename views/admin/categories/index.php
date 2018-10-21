<?php
require_once VIEWS.'shared/admin/header.php';
?>
  <div class="page-content">
    <div class="row">
      <div class="col-md-3">
        <?php
          include_once VIEWS.'shared/admin/_aside.php';
        ?>

      </div>
      <div class="col-md-9">
        <div class="content-box-large">
          <div class="panel-heading">
            <div class="panel-title"><h3><?= $title;?></h3></div>
            <a href="/admin/categories/create"><button class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Add New</button></a>
          </div>

          <div class="panel-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody class="table-items">
                  <?php foreach ($categories as $category):?>
                    <tr>
                      <td><?php echo $category->id?></td>
                      <td><?php echo $category->name?></td>
                      <td>
                        <button class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                        <button class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i> Update</button>
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
                        <button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</button></td>
                      </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
require_once VIEWS.'shared/admin/footer.php';
