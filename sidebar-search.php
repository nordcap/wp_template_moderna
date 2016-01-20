<?php
/**
 * Сайдбар для поиска по сайту
 */


if (!is_active_sidebar('sidebar-search')):?>
    <div class="widget">
        <form  method="post" role="search" class="form-search" action="<?php echo esc_url(home_url('/'))?>">
            <input type="search" class="form-control" name="s" placeholder="<?php esc_html_e('Search..', 'moderna') ?>">
        </form>
    </div>
<?php else: ?>
    <?php dynamic_sidebar('sidebar-search'); ?>


<?php endif; ?>