<?php 
/*
  Template Name: Full Width
*/
?>
<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1><?php the_title(); ?></h1>
    </div>
  </div>
  </div>
  <section class="about-page">
    <div class="row">
      <div class="col-sm-4">
        <figure>
              <img src="<?php bloginfo('template_url'); ?>/images/about2.jpg">
        </figure>
      </div>
      <div class="col-sm-8">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div class="content"><?php the_content(); ?></div>


    </div>
    </div>
  </section>
  <footer class="about-footer">
    <div class="row">
      <div class="col-sm-4">
        <div class="box box-1" data-content="MAKE THINGS HAPPEN">
          <h2>Mindset</h2>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="box box-2" data-content="CREATIVE, AMBITIOUS, SOCIAL
        ">
          <h2>Characteristics</h2>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="box box-3" data-content="EVERY DAY LEARN SOMETHING NEW">
          <h2>Motto</h2>
        </div>
      </div>
    </div>
      <div class="likes">
        <h2><i class="fa fa-thumbs-up" title="like"></i> Likes:</h2>
        <ul>
          <li><h2><i class="fa fa-plane" title="travel"></i></h2></li>
          <li><h2><i class="fa fa-coffee" title="coffe"></i></h2></li>
          <li><h2><i class="fa fa-gamepad" title="gaming"></i></h2></li>
          <li><h2><i class="fa fa-apple"title="apple"></i></h2></li>
        </ul>
      </div>
  </footer>

  <?php get_footer(); ?>
        
  <?php endwhile; else: ?>

  <div class="page-header">
      <h1>Oh no!</h1>
  </div>
  <p>No content!</p>

  <?php endif; ?>

</div>     
    



