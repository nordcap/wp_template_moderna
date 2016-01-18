<?php
/**
 * Сайдбар для поиска по сайту
 */


if (!is_active_sidebar('sidebar-categories')):?>
    <div class="widget">
        <h5 class="widgetheading"><?php esc_html_e('Categories', 'moderna') ?></h5>
        <ul class="cat">
            <?php
            $args = array(
                'orderby' => 'name ',
                'order' => 'ASC',
            );

            $categories = get_categories($args);
            foreach ($categories as $category):?>
                <!-- TODO: Категория ссылается на страницу категорий (archive.php), для нее нужно сделать дизайн.-->
                <li><i class="icon-angle-right"></i><a
                        href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name; ?></a><span>&nbsp;(<?php echo($category->count); ?>
                        )</span></li>
            <? endforeach; ?>
        </ul>
    </div>

<?php else: ?>
    <?php dynamic_sidebar('sidebar-categories'); ?>


<?php endif; ?>