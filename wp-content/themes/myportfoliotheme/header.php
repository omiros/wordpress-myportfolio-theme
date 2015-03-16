<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico?v=2">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   
    <title><?php wp_title( '|', true,'right'); ?>
            <?php bloginfo( 'name' ) ?>
    </title>
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
      <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCOVdF3l1Ob4hDAF9F0dVmgalNSCMA0Lec"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.0/TweenMax.min.js"></script>
    <?php wp_head();  ?>

  </head>

  <body <?php body_class(); ?>>
    

         <?php

          if (is_front_page()){ 
        ?>
<input type="checkbox" id="navbutton" name="navbutton"> 
<nav class="sm-menu">
  <label for="navbutton" class="nav-trigger"><i class="fa fa-bars"></i></label>
  <ul class="na-menu">

        <?php

            $args = array(
            'menu'       => 'header-menu',
            'container'  => false
            );

          wp_nav_menu( $args );

        ?>

    <li><a href="#home"><i class="fa fa-home"></i><span>Home</span></a></li>
    <li><a href="#about-me"><i class="fa fa-smile-o"></i><span>Me</span></a></li>
    <li><a href="#portfolio"><i class="fa fa-briefcase"></i><span>Portfolio</span></a></li>
    <li><a href="#skills"> <i class="fa fa-html5"></i><span>Skills</span></a></li>
    <li><a href="#contact-me"><i class="fa fa-map-marker"></i><span>Contact me</span></a></li>
  </ul>
</nav>
      <?php

      } 
      else {
      ?>

<nav class="navbar navbar-inverse">
<div class="row">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">

    <?php

      $args = array(
      'menu' => 'Primary',
      'menu_class'     => 'nav navbar-nav',
      'container'      => false
      );

    wp_nav_menu( $args );
    ?>
  </div><!--/.navbar-collapse -->
</div>
</nav>
    <?php

        }

    ?>

