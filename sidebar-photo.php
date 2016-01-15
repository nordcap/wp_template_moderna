<?php
/**
 * Нижний сайдбар в котором предполагается размещение отдельных страниц
 */


if (!is_active_sidebar('footer-sidebar-photo')):?>

    <div class="widget">
        <h5 class="widgetheading"><?php esc_html_e('Flickr photostream','moderna')?></h5>
        <div class="flickr_badge">
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=34178660@N03"></script>
        </div>
        <div class="clear">
        </div>
    </div>
<?php else: ?>
    <?php dynamic_sidebar('footer-sidebar-photo'); ?>


<?php endif; ?>