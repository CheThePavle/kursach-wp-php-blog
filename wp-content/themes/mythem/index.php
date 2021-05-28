<?php get_header(); ?>

   <?php
      if (get_theme_mod('about_block') != '') {
         ?>
            <section id="info" style="background-color: <?php echo get_theme_mod('about_background_color'); ?>;">

            <div class="row" id="about_muzei">

               <h2 
                  class="title_center" 
                  style="color: <?php echo get_theme_mod('about_title_color'); ?> !important; font-size: <?php echo get_theme_mod('about_title_size'); ?> !important;">
                  <?php echo get_theme_mod('about_title'); ?>
               </h2>

               <section 
                  class="about_p"
                  style="color: <?php echo get_theme_mod('about_text_color'); ?> !important;"
               >
                  <?php echo get_theme_mod('about_text'); ?>
               </section>

            </div>

            </section>
         <?php
      }
   ?>

   <?php if (get_theme_mod('block_posts') != '') { ?>
      <div class="content-outer" style="background-color: <?php echo get_theme_mod('posts_background_color'); ?> !important;">
         <div id="page-content" class="row portfolio">
            <h2 
               class="title_center" 
               style="color: <?php echo get_theme_mod('title_color_posts'); ?> !important;
               font-size: <?php echo get_theme_mod('title_size_posts'); ?> !important;"><?php echo get_theme_mod('title_posts'); ?>
            </h2>
            <section class="entry cf">
               <div id="primary" class="eight columns portfolio-list">
                  <div id="portfolio-wrapper" class="bgrid-halves cf">

      <?php
      $get_inuq_posts = explode(',',get_theme_mod('uniq_posts'));

      for ($i=0; $i < count($get_inuq_posts); $i++) { 
         $post = get_post($get_inuq_posts[$i]);
         setup_postdata($post);
      ?>

                     <div class="columns portfolio-item first">
                        <div class="item-wrap">
                           <a href="<?php the_permalink(); ?>">
                              <div
                                 style="background: url('<?php echo get_the_post_thumbnail_url( $post, 'post_thumb' ) ?> ') center;"
                                 class="auto_size_img"
                              >
                              </div>
                           </a>

                           <div class="portfolio-item-meta">
                              <h5>
                                 <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                              </h5>
                              <p>Год создания: <?php the_field('год_создания'); ?> г.</p>
                           </div>
                        </div>
                     </div>

      <?php
         wp_reset_postdata();
      }
      ?>

                  </div>
               </div>
            </section>
         </div>
      </div>
   <?php } ?>


   <?php if (get_theme_mod('our_contacts_block') != '') { ?>
      <section id="journal" style="background-color: <?php echo get_theme_mod('our_contacts_bg_color'); ?> !important;">
         <div class="row" id="contacts">
            <h2 
               class="title_center" 
               style="color: <?php echo get_theme_mod('our_contacts_title_color'); ?> !important;
               font-size: <?php echo get_theme_mod('our_contacts_title_size'); ?> !important;"
            >
            <?php echo get_theme_mod('our_contacts_title'); ?>
            </h2>

            <section>
               <?php echo get_theme_mod('our_contacts_text'); ?>
            </section>
         </div>
      </section>
   <?php } ?>


   <?php if (get_theme_mod('form_block') != '') { ?>
      <section id="call-to-action" style="background-color: <?php echo get_theme_mod('form_title_bg_color'); ?> !important;">
         <div class="row contact_form">

               <h2 class="title_center" style="color: <?php echo get_theme_mod('form_title_color'); ?> !important;">
               <?php echo get_theme_mod('form_title'); ?>
               </h2>
               <?php echo do_shortcode(get_theme_mod('form_content')); ?>

         </div>
      </section>
   <?php } ?>


   <?php if (get_theme_mod('map_block') != '') { ?>
      <section>
         <?php echo get_theme_mod('map_content'); ?>
      </section>
   <?php } ?>

<?php get_footer(); ?>