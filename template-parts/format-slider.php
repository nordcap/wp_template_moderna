<?php
/**
 * Шаблон отображения слайдера
 */
?>


<!-- start flexslider -->
<div id="post-slider" class="flexslider">
    <ul class="slides">
        <?php
        $arrSlide = get_post_meta($post->ID, 'wpcf-gallery');
        foreach ($arrSlide as $slide):?>
            <li>
                <img src="<?php echo $slide?>" alt=""/>
            </li>
        <?php endforeach;?>
    </ul>
</div>
<!-- end flexslider -->


