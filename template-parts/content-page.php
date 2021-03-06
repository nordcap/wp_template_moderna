<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moderna
 */

?>

<?php $format = get_post_format();

if ($format === false || $format === 'image') {
    $format = "image";
}
if ($format === 'gallery') {
    $format = "slider";
}

?>

<article>
    <div class="post-<?php echo $format ?>">
        <div class="post-heading">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>
        <?php get_template_part('template-parts/format', $format); ?>
    </div>

    <?php if ($format != "quote"): ?>
        <?php the_excerpt(); ?>
    <?php endif; ?>

    <div class="bottom-article">
        <ul class="meta-post">
            <?php moderna_date_author(); ?>
            <?php moderna_tag_comment(); ?>
        </ul>
        <a href="<?php the_permalink(); ?>" class="pull-right"><?php esc_html_e('Continue reading', 'moderna') ?><i
                class="icon-angle-right"></i></a>
    </div>

</article><!-- #post-## -->


