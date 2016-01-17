<?php
/**
 * Шаблон отображения слайдера
 */
?>
<!--TODO: не знаю как вывести слайдер через контент статьи. Придется пока отображать как есть, через статичные пути к картинкам-->
<!-- start flexslider -->
<div id="post-slider" class="flexslider">
    <ul class="slides">
        <li>
            <img src="<?php echo get_template_directory_uri()?>/img/dummies/blog/img1.jpg" alt=""/>
        </li>
        <li>
            <img src="<?php echo get_template_directory_uri()?>/img/dummies/blog/img2.jpg" alt=""/>
        </li>
        <li>
            <img src="<?php echo get_template_directory_uri()?>/img/dummies/blog/img3.jpg" alt=""/>
        </li>
    </ul>
</div>
<!-- end flexslider -->


