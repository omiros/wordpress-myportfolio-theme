<?php get_header(); ?>
  <!-- <img src="<?php bloginfo('template_url'); ?>/images/elias-tahmazidis.png"> -->
<div id="element" class="introLoading"></div>
<div class="container">
<div id="home">
  <div id="insta-slider" class="slide"></div>
<!--     <?php  if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

    <?php endwhile; endif; ?> -->
  <div id="logo">
<!--       <?php  if( get_theme_mod( 'wp_logo' ) != "" ): ?>
    <img src="<?php echo get_theme_mod( 'wp_logo' ); ?>">
      <?php endif; ?> -->
      <div class="logo-text">
      <h2>Elias Tahmazidis<br><span>WEB DEVELOPER</span></h2>
      </div>
  </div>
</div>
<section id="widgets">
  <div class="row">
      <div class="col-sm-4 post-plugin">
        <?php if( dynamic_sidebar( 'front-left' ) ); ?>
      </div>
      <div class="col-sm-4">
        <?php if( dynamic_sidebar( 'front-center' ) ); ?>
      </div>
      <div class="col-sm-4">
        <?php if( dynamic_sidebar( 'front-right' ) ); ?>
      </div>
  </div>
</section>

<section id="about-me">
  <div class="row">
    <div class="about-me-text col-xs-6">
<!--       <?php 

        $the_query = new WP_Query( 'pagename=about-page' );
        // The Loop
        if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

          echo '<h2 class="section-title">';
          the_title();
          echo '</h2>';
          the_content();

         endwhile; endif;
         // Restore original Post data
         wp_reset_postdata();

      ?> -->
        <div class="text">
            <span class="g_hi">hi!</span>
            <span class="g_my">My name is</span>
            <span class="g_go">Elias</span>
            <span class="g_ca">Tahmazidis</span>
            <span class="g_an">and i'm a</span>
            <span class="g_fr">Front End Developer</span>
            <span class="g_ni">Nice to meet you!</span>
        </div>
    </div>
    <div class="col-sm-6">
      <figure>
        <img src="<?php bloginfo('template_url'); ?>/images/about-dude.png">
        <img class="hidden-img" src="<?php bloginfo('template_url'); ?>/images/about-mobile.png">
      </figure>
    </div>
    </div>
</section>

<section id="portfolio">
      <div class="row">
        <div class="col-md-12">
          <?php 

            $the_query = new WP_Query( 'pagename=portfolio-grid-w-custom-posts' );
            // The Loop
            if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

              echo '<h2 class="section-title">';
              the_title();
              echo '</h2>';
              the_content();

             endwhile; endif;
             // Restore original Post data
             wp_reset_postdata(); 

          ?>
        </div><!-- /.col-md-12 -->
      </div><!-- /.row -->
      <div class="row second-row">
    <?php

      //Create a WP_Query loop to loop through the Portfolio pieces
      $args = array(
        'post_type' => 'portfolio'
        );
      $the_query = new WP_Query( $args );
      
    ?>
    <?php if( have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <div class="col-xs-3 portfolio-piece">
      <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
        <div class="flipper">
          <div class="front">
      <?php 
        //Get the feature image id
        $thumbnail_id = get_post_thumbnail_id();
        //Get the feature image by the url
        $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
       ?>
       <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>"></a></p>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        </div>
        <div class="back">
              <p><a href="<?php the_permalink(); ?>"><?php the_content(); ?></p></a><!-- back content -->
        </div>
        </div>
      </div>
    </div><!-- /.portfolio-piece -->

      <?php 
      //Add a new row every 4th post
      $portfolio_count = $the_query->current_post + 1; 
      if( $portfolio_count % 4 == 0 ) : 

      ?>
    </div><!-- /.row -->
    <div class="row">

  <?php  endif; ?>

  <?php endwhile; endif; ?>

    </div><!-- /.row -->
</section>
<section id="quote">
  <img src="<?php bloginfo('template_url'); ?>/images/citat.png">
</section>
<section id="skills">  
  <h2><i class="fa fa-pie-chart"></i> My <span>Skills</span></h2>
    <ul class="buttons">
      <li class="submit"data-value="90">HTML5</li>
      <li class="submit"data-value="80">CSS3</li>
      <li class="submit"data-value="70">jQuery</li>
      <li class="submit"data-value="75">API</li>
      <li class="submit"data-value="65">PHP</li>
      <li class="submit"data-value="70">WordPress</li>
      <li class="submit"data-value="75">LESS</li>
      <li class="submit"data-value="75">Sass</li>
      <li class="submit"data-value="90">Bootstrap</li>
  </ul>
  <input class="knob" data-width="200" data-displayPrevious=true data-fgColor="#489d8a" data-skin="tron" data-thickness=".2" value="0">
  <p>and...<br />Working<br />to be<br /><strong>greater</strong></p>
</section>
<!-- <section id="blog">
  <div class="row">
    <?php 

      $the_query = new WP_Query( 'pagename=blog' );
      // The Loop
      if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

        echo '<h2 class="section-title">';
        the_title();
        echo '</h2>';
        the_content();

       endwhile; endif;
       // Restore original Post data
       wp_reset_postdata(); 

    ?>
  </div>
</section> -->
<section id="contact-me">
  <div class="row">
    <div class="col-xs-12">
      <div id="contactform" class="contactform">
      
        <?php 

        $the_query = new WP_Query( 'pagename=contact' );
        // The Loop
        if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

        echo '<h2 class="section-title">';
        the_title();
        echo '</h2>';
        the_content();

        endwhile; endif;
        // Restore original Post data
        wp_reset_postdata();

        ?>

        <a href="http://se.linkedin.com/in/eliastahmazidis" class="in fadeInSkills" title="Linkedin" target="_blank"><span><i class="fa fa-linkedin"></i></span></a>
        <a href="https://www.facebook.com/elias.tahmazidis" target="_blank"class="fb fadeInSkills" title="Facebook"><span><i class="fa fa-facebook"></i></span></a>
        <a href="#contactForm" data-toggle="modal" data-target="#contactForm" class="email fadeInSkills" title="Email"><span><i class="fa fa-envelope-o"></i></span></a>
        <a href="#" class="cv fadeInSkills" title="CV"><span><i class="fa fa-file-pdf-o"></i></span></a>
        <a class="mobile fadeInSkills" title="mobile"><span><i class="fa fa-mobile"></i></span></a>
        <a class="number-overlay">+46760290302</a>
      </div>
    </div>
    </div> 
    <div class="row">
      <div class="col-xs-12">
        <div id="googlemaps"></div>
      </div>
    </div>
</section>
<section>
<div class="row">
<div class="col-xs-12">
    <footer>
        <h3>Thank you <br /><span>for your time!</span></h3>
        <div class="button">
            <a href="#" class="bt-up"><span></span></a>
            <p>go back</p>
        <!-- <p>&copy; <?php bloginfo( 'name' ) ?> <?php echo date( 'Y' ) ?></p> -->
        </div>
    </footer>
  </div>
</div>
</section>
<?php get_footer(); ?>
</div>
</p>
</div>
</div>

