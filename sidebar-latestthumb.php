<?php
/**
 * Нижний сайдбар в котором предполагается вывод названия 3 последних постов
 */


if (!is_active_sidebar('right-sidebar-latest')):?>
    <div class="widget">
        <h5 class="widgetheading"><?php esc_html_e('Latest posts','moderna')?></h5>
        <ul class="recent">
            <?php
            $query = new WP_Query(array('posts_per_page'=>3));
            if ( $query->have_posts() ) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <li>
                    <?php
                    if(has_post_thumbnail()){
                        the_post_thumbnail(array(65,65),array('class'=>'pull-left','alt'=>''));
                    }
                    ?>

                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                    <?php the_excerpt(); ?>

                </li>

            <? endwhile; endif; wp_reset_postdata(); ?>

        </ul>
    </div>
<?php else: ?>
    <?php dynamic_sidebar('right-sidebar-latest'); ?>


<?php endif; ?>