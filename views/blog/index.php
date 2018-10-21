<?php
require_once VIEWS.'shared/head.php';
require_once VIEWS.'shared/navigation.php';

?>
<div class="cf"></div>

<div class="breadcrumb"><?= $breadcrumb;?></div>
    <div class="row">
                          <h4>Search Blog</h4>
                            <form action="/blog/search" method="post">
                            <div id="custom-search-input">
                              <div class="input-group col-md-12">
                                <input type="text" class="search-query form-control" placeholder="Search" name="query" />
                                <span class="input-group-btn">
                                  <button class="btn btn-danger" type="submit">
                                    <span class=" glyphicon glyphicon-search"></span>
                                  </button>
                                </span>
                              </div>
                            </div>
                            </form>
                          </div>
    </div>
<div class="content-wrap">
  <?php
  printf("<h1 style='color: #%x%x%x'>%s</h1>", 165, 27, 45, $title);
  ?>
<?php if ($rowCount>0) : ?>

  <?php foreach ($posts as $post) : ?>

    <article class="entry">
    <header class="entry-header">
      <h2 class="entry-title">
        <a href="<?php echo '/blog/'.$post['id'];?>" title=""><?php echo $post['title'];?></a>
      </h2> 				 
      <div class="entry-meta">
        <ul>
          <li><?php echo $post['created_at'];?></li>
          <span class="meta-sep">&bull;</span>								
          <li><a href="#" title="" rel="category tag">Ghost</a></li>
          <span class="meta-sep">&bull;</span>
          <li>John Doe</li>
        </ul>
      </div> 
    </header> 

    <div class="entry-content">
      <p><h2 class="entry-title">
        <a href="<?php echo '/blog/'.$post['id'];?>" content=""><?php echo $post['content'];?></a>
      </h2> </p>
    
    
    </div> 

    </article> <!-- end entry -->

  <?php endforeach ?>
  <div class="middle">
     <?php echo $data['pagination']->get();?>
  </div>
<?php else : ?>
  <h1>No posts found....</h1>
<?php endif ?>
</div>
<!-- Page End -->
<div class="cf"></div>
<?php 
require_once VIEWS.'shared/aside.php';
require_once VIEWS.'shared/footer.php';
// require_once VIEWS.'shared/scripts.php';
?>

</body>
</html>
