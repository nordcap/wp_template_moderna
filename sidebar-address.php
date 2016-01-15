<?php
/**
 * Нижний сайдбар в котором предполагается размещение адреса
 */


if (!is_active_sidebar('footer-sidebar-address')):?>
    <div class="widget">
        <h5 class="widgetheading"><?php esc_html_e('Get in touch with us','moderna')?></h5>
        <address>
            <strong>Moderna company Inc</strong><br>
            Modernbuilding suite V124, AB 01<br>
            Someplace 16425 Earth
        </address>
        <p>
            <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
            <i class="icon-envelope-alt"></i> <?php echo esc_url( __('escemail@domainname.com','moderna') )?>
        </p>
    </div>
    <?php else: ?>
    <?php dynamic_sidebar('footer-sidebar-address'); ?>


<?php endif; ?>




