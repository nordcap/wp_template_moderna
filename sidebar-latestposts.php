<?php
/**
 * Нижний сайдбар в котором предполагается вывод названия 3 последних постов
 */


if (!is_active_sidebar('footer-sidebar-latest')):?>
    <div class="widget">
        <h5 class="widgetheading"><?php esc_html_e('Latest posts','moderna')?></h5>
        <ul class="link-list">
            <?php
            $query = new WP_Query(array('posts_per_page'=>3));
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>

                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                <? endwhile; endif; wp_reset_postdata(); ?>

        </ul>
    </div>
<?php else: ?>
    <?php dynamic_sidebar('footer-sidebar-latest'); ?>


<?php endif; ?>