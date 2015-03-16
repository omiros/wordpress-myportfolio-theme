<?php 
/*
* Taxonomy index Template
*/
?>
<?php get_header(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="page-header">
        <?php
          $current_term = get_queried_object();
          $taxonomy = get_taxonomy($current_term->taxonomy);
          echo $taxonomy->label . ': ' . $current_term->name;
        ?>
        </div>


        <div class="page-header">
            <h1>Oh no!</h1>
        </div>
          <p>No content!</p>

        <?php endif; ?>

      </div>
    </div>

<?php get_footer(); ?>

