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

   <div class="content-outer">
      <div id="page-content" class="row">

         <div id="primary" class="eight columns two_col">
            <?php get_template_part('templates-post/posts'); ?>
         </div>

         <div id="secondary" class="four columns end">
            <?php get_sidebar(); ?>
         </div>

      </div>
   </div>

<?php get_footer(); ?>