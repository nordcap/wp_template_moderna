<?php
/**
 * Сайдбар для поиска по сайту
 */


if (!is_active_sidebar('sidebar-search')):?>
    <form class="form-search">
        <input type="search" class="form-control" name="s" placeholder="<?php esc_html_e('Search..','moderna')?>">
    </form>
<?php else: ?>
    <?php dynamic_sidebar('sidebar-search'); ?>


<?php endif; ?>