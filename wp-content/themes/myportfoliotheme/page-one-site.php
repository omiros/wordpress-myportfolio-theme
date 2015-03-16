<?php 
/**
* Template name: One Page Site
*/
?>
<?php get_header(); ?>
  <div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-md-9">
        <p class="pull-right visible-xs">
              <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Sidebar</button>
        </p>
        <?php 
          $args = array(
              'post_type' => 'page',
              'order' => 'ASC'
          );
          $the_query = new WP_Query( $args );       
      ?>
      <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 

      <?php get_template_part( 'content', 'page' ); ?>

      <?php endwhile; endif; ?>
<!--       <?php $pages = get_pages();

      foreach ($pages as $page_data) {

        $content = apply_filters('the_content', $page_data->post_content);
        $title = $page_data->post_title;
        $slug = $page_data->post_name;
        echo "<div class='$slug'>";
        echo "<h2>$title</h2>";
        echo $content;
        echo "</div>";
      }

      ?> -->

      </div>
      
      <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>
