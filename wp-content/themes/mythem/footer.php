   <footer>
      <div class="row">
         <div class="twelve columns">

            <?php wp_nav_menu([
                  'theme_location' => 'bottom',
                  'container' => null,
                  'menu_class' => 'footer-nav size_a'
            ]) ?>

            <ul class="footer-social">
               <?php dynamic_sidebar('footer_sidebar'); ?>
            </ul>
            
            <?php echo get_theme_mod('footer_content'); ?>

            <ul class="footer-logo-company">
               <li><a href="minkultura.udmurt.ru/"><?php echo "<img src='" . get_template_directory_uri() . "/assets/images/лого_мин культуры и туризма УР.jpg' alt='logo3'>"; ?></a></li>
               <li><a href="#"><?php echo "<img src='" . get_template_directory_uri() . "/assets/images/лого_арт-резиденция.png' alt='logo1'>"; ?></a></li>
               <li><a href="#"><?php echo "<img src='" . get_template_directory_uri() . "/assets/images/лого_мин культуры и туризма УР.png' alt='logo4'>"; ?></a></li>   
               <li><a href="#"><?php echo "<img src='" . get_template_directory_uri() . "/assets/images/лого_иж_инфо_портал.png' alt='logo2'>"; ?></a></li>
            </ul>

         <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>
      </div>
   </footer>

   <?php wp_footer(); ?>
    
</body>
</html>