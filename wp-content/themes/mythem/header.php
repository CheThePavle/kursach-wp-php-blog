<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
   <meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php wp_head(); ?>
</head>

<body>
   <header>
      <div class="row">
         <div class="twelve columns adaptiv_menu">

            <div class="logo">
               <a href="<?php bloginfo('url'); ?>"><?php the_custom_logo(); ?></a>
            </div>

            <nav id="nav-wrap">

               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

               <?php wp_nav_menu([
                  'theme_location' => 'top',
                  'container' => null,
                  'menu_id' => 'nav',
                  'menu_class' => 'nav'
               ]) ?>

            </nav>

         </div>
      </div>
   </header>

   <?php if ((get_bloginfo( 'name' ) && get_bloginfo( 'description' )) !== '') { ?>
      <div id="page-title">

         <div class="row">

            <div class="ten columns centered text-center">
               <?php 
                  if (get_bloginfo( 'name' )!=='') {
                     echo "<h1>" . get_bloginfo( 'name' ) . "</h1>";
                  }
               ?>
               <?php 
                  if (get_bloginfo( 'description' )!=='') {
                     echo "<p>" . get_bloginfo( 'description' ) . "</p>";
                  }
               ?>
            </div>

         </div>

      </div>
   <?php } ?>

   <?php
      echo do_shortcode(get_theme_mod('slider_input'));
   ?>

