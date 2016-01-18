<?php
/**
 * Сайдбар для поиска по сайту
 */


if (!is_active_sidebar('sidebar-search')):?>
    <div class="widget">
        <form class="form-search">
<!--            TODO:поиск не работает-->
            <input type="search" class="form-control" name="s" placeholder="<?php esc_html_e('Search..', 'moderna') ?>">
        </form>
    </div>
<?php else: ?>
    <?php dynamic_sidebar('sidebar-search'); ?>


<?php endif; ?>