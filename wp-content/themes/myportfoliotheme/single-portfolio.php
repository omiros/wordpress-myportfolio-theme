<?php get_header(); ?>
  <div class="container">
    <div class="page-header">
      <div class="row">
        <div class="col-xs-9">
          <h1>Portfolio</h1>
        </div>
        <div class="col-xs-3 prev-next">
          <?php next_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-left"></span>' ) ?>
          <a href="<?php bloginfo('url'); ?>/?p=119"><span class="glyphicon glyphicon-th"></span></a>
          <?php previous_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-right"></span>' ) ?>
        </div>
      </div>
    </div>


    <div class="row">
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <div class="col-md-8 portfolio-image">
        <?php 
          //Get the feature image id
          $thumbnail_id = get_post_thumbnail_id();
          //Get the feature image by the url
          $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );

         ?>
         <img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>">
          
        </div>
        <div class="col-sm-4">

          <h2><?php the_title(); ?></h2>
          <hr>
            <?php the_content(); ?>
        </div>
        
        <?php endwhile; else: ?>

        <div class="page-header">
            <h1>Oh no!</h1>
        </div>
        <p>No content!</p>

        <?php endif; ?>

    </div>

<?php get_footer(); ?>

