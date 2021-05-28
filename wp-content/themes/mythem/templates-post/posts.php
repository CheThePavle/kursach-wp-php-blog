<?php if(have_posts()) {while (have_posts()) {the_post(); ?>
    <article class="post hover_post">

        <div class="entry-header cf">
            <h1><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h1>

            <p class="post-meta">        
                <span class="categories">
                    Год создания: <b><?php the_field('год_создания'); ?></b>
                </span>
            </p>
        </div>

        <div class="post-thumb">
            <a href="<?php the_permalink(); ?>" title=""><?php the_post_thumbnail('post_thumb'); ?></a>
        </div>

        <div class="post-content">
            <?php the_excerpt(); ?>
        </div>

    </article> <!-- post end -->
        
    <?php } //end While ?>
    <?php the_posts_pagination(); ?>
<?php } //end if ?>