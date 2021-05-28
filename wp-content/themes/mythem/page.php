<?php get_header('menu'); ?>

   <div id="page-title">
         <div class="row">
            <div class="ten columns centered text-center">
               <h1>
                  <?php 
                     if (have_posts()) {
                        wp_title("", true);
                     } else {echo 'Ничего не найдено по запросу: '; the_search_query();
                  }?><span>.</span>
               </h1>
            </div>
         </div>
   </div>

   <section id="info" style="background-color: <?php echo get_theme_mod('about_background_color'); ?>;">
      <div class="row">
         <?php the_content(); ?>
      </div>
   </section>


<?php get_footer(); ?>