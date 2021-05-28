<article class="post">

   <div class="entry-header cf">
      <h1><?php the_title(); ?></h1>

      <p class="post-meta">           
         <span class="categories">
            Категории: <?php the_category(' / ', ''); ?>
         </span>
      </p>
   </div>

   <div class="post-thumb">
      <?php the_post_thumbnail('post_thumb'); ?>
   </div>

   <div class="post-content">
      <?php the_post(); ?>
      <?php the_content(); ?>

      <p>
         Автор: <span style="color: #313131;"><?php the_field('автор'); ?></span> <br>
         Год создания: <span style="color: #313131;"><?php the_field('год_создания'); ?></span> <br>
      </p>

      <span>QRCode: </span>
      <div class="qrcodeimg"><?php do_shortcode(get_theme_mod('qrcodepage_input')); ?></div>
                     
      <a href="javascript:(print());" class="print">Версия для печати</a>
                     
      <p class="tags">
  			<span>Теги: </span>:
         <?php the_tags('', ' / '); ?>
  		</p>
   </div>

</article>

<div class="print-table">
   <div class="qrcodeimg"><?php do_shortcode(get_theme_mod('qrcodepage_input')); ?></div>
   <div>

      <h3>
         <?php the_title(); ?> <br>
         <?php the_field('автор'); ?>, <?php the_field('год_создания'); ?>
      </h3>

      <h4>
         <?php the_tags('', ', '); ?>
      </h4>

      <hr>

   </div>                    
</div>