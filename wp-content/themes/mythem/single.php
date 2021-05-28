<?php get_header('menu'); ?>

   <div class="content-outer">
      <div id="page-content" class="row">

         <div id="primary" class="eight columns two_col">
            <?php get_template_part('templates-post/post', get_post_format()); ?>
         </div>

         <div id="secondary" class="four columns end">
            <?php get_sidebar(); ?>
         </div>

      </div>
   </div>

<?php get_footer(); ?>