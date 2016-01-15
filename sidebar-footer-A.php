<?php
/**
 * Нижний сайдбар в котором предполагается размещение адреса
 */


if (!is_active_sidebar('footer-sidebar-address')):?>
    <div class="widget">
        <h5 class="widgetheading">Get in touch with us (default)</h5>
        <address>
            <strong>Moderna company Inc</strong><br>
            Modernbuilding suite V124, AB 01<br>
            Someplace 16425 Earth
        </address>
        <p>
            <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
            <i class="icon-envelope-alt"></i> email@domainname.com
        </p>
    </div>
    <?php else: ?>
    <?php dynamic_sidebar('footer-sidebar-address'); ?>


<?php endif; ?>




