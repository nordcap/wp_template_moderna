<?php
/**
 * Правый сайдбар в котором предполагается вывод популярных тегов
 */


if (!is_active_sidebar('sidebar-tags')):?>
    <div class="widget">
        <h5 class="widgetheading"><?php esc_html_e('Popular tags', 'moderna') ?></h5>

        <ul class="tags">
            <?php
            $tags = get_tags();

            foreach ($tags as $tag):
                $tag_link = get_tag_link($tag->term_id); ?>
                <li><a href="<?php echo $tag_link; ?>"><?php echo $tag->name; ?></a></li>
            <?php endforeach;

            ?>

        </ul>
    </div>

<?php else: ?>
    <?php dynamic_sidebar('sidebar-tags'); ?>


<?php endif; ?>