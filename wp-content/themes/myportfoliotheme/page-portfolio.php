<?php 
/*
  Template Name: Portfolio Grid Template
*/
?>
<?php get_header(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
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
    </div>

    <div class="row">
      
    <?php 
      //Create a WP_Query loop to loop through the Portfolio pieces
      $args = array(
        'post_type' => 'portfolio'
        );
      $the_query = new WP_Query( $args );

    ?>
    <?php if( have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <div class="col-xs-3 portfolio-piece">
    <?php 
      //Get the feature image id
      $thumbnail_id = get_post_thumbnail_id();
      //Get the feature image by the url
      $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
     ?>
     <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>"></a></p>
      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

    </div>

    <?php 
    //Add a new row every 4th post
    $portfolio_count = $the_query->current_post + 1; 
    if( $portfolio_count % 4 == 0 ) : 

    ?>
    </div>
    <div class="row">

    <?php  endif; ?>

    <?php endwhile; endif; ?>

</div>


<?php get_footer(); ?>

