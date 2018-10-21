<?php
require_once VIEWS.'shared/head.php';
require_once VIEWS.'shared/navigation.php';

?>
<div class="cf"></div>

<div class="breadcrumb"><?= $breadcrumb;?></div>

<div class="content-wrap">
  <?php
  printf("<h1 style='color: #%x%x%x'>%s</h1>", 165, 27, 45, $title);
  ?>

    <article class="entry">
    <header class="entry-header">
      <h2 class="entry-title">
        <?php echo $post['title'];?>
      </h2> 				 
      <div class="entry-meta">
        <ul>
          <li><?php echo $post["created_at"];?></li>
          <span class="meta-sep">&bull;</span>								
          <li><a href="#" title="" rel="category tag">Ghost</a></li>
          <span class="meta-sep">&bull;</span>
          <li>John Doe</li>
        </ul>
      </div> 
    </header> 

    <div class="entry-content">
      <p><?php echo $post["content"];?></p>
    </div> 

    </article> <!-- end entry -->
</div>
<!-- Page End -->
<div class="cf"></div>
<?php 
require_once VIEWS.'shared/aside.php';
require_once VIEWS.'shared/footer.php';
require_once VIEWS.'shared/scripts.php';
?>

</body>
</html>

