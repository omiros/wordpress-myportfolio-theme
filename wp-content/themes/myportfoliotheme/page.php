<?php get_header(); ?>
  <div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-md-9">
          

        <p class="pull-right visible-xs">
              <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Sidebar</button>
        </p>

      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <div class="page-header">
          <h1><?php the_title(); ?></h1>
        </div>
        <?php the_content(); ?>

      <?php endwhile; else: ?>

        <div class="page-header">
            <h1>Oh no!</h1>
        </div>
        <p>No content!</p>

      <?php endif; ?>
      </div>

      <div class="col-sm-3">
      <?php dynamic_sidebar( 'front-right' ); ?>
      </div>
    </div>

<?php get_footer(); ?>
