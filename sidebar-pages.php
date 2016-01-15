<?php
/**
 * Нижний сайдбар в котором предполагается размещение отдельных страниц
 */


if (!is_active_sidebar('footer-sidebar-pages')):?>
    <div class="widget">
        <h5 class="widgetheading">Pages</h5>
        <ul class="link-list">
            <li><a href="<?php esc_url(home_url('/'));?>">Press release</a></li>
            <li><a href="<?php esc_url(home_url('/'));?>">Terms and conditions</a></li>
            <li><a href="<?php esc_url(home_url('/'));?>">Privacy policy</a></li>
            <li><a href="<?php esc_url(home_url('/'));?>">Career center</a></li>
            <li><a href="<?php esc_url(home_url('/'));?>">Contact us</a></li>
        </ul>
    </div>
<?php else: ?>
    <?php dynamic_sidebar('footer-sidebar-pages'); ?>


<?php endif; ?>