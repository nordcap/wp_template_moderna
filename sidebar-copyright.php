<?php
/**
* Нижний сайдбар в котором предполагается размещение адреса
*/


if (!is_active_sidebar('footer-sidebar-copyright')):?>
    <div class="copyright">
        <p>
            <span><?php printf(esc_html__('&copy; %1$s 2015 All right reserved. By','moderna'),'Moderna');?> </span><a href="<?php echo esc_url( __('http://bootstraptaste.com','moderna') )?>" target="_blank"><?php esc_html_e('Bootstrap Themes','moderna')?></a>
        </p>
        <!--
            All links in the footer should remain intact.
            Licenseing information is available at: http://bootstraptaste.com/license/
            You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Moderna
        -->
    </div>
<?php else: ?>
    <?php dynamic_sidebar('footer-sidebar-copyright'); ?>


<?php endif; ?>