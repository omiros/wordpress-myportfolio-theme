<?php

  //display only 4 posts
  $num_posts = ( is_front_page() ) ? 4 : -1;

  $args = array(
  'post_type' => 'portfolio',
  'post_per' => '$num_posts'
  );
  $query = new WP_Query( $args );

?>

<section class="row no-max pad">

  <?php if ( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

  <div class="small-6 medium-4 large-3 columns grid-item">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
  </div>

  <?php endwhile; endif; wp_reset_postdata(); ?>
</section>
