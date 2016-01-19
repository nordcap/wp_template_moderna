<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package moderna
 */

if (!function_exists('moderna_date_author')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function moderna_date_author()
    {

        if ('post' === get_post_type()) {
            $time_string = '%1$s';
            if (get_the_time('U') !== get_the_modified_time('U')) {
                $time_string = '%2$s';
            }
//при обновлении статьи дата также будет обновляться
            $time_string = sprintf($time_string,
                esc_html(get_the_date('j F Y')),
                esc_html(get_the_modified_date('j F Y'))
            );


//выводим дату публикации
            echo '<li><i class="icon-calendar"></i><a href="' . esc_url(get_permalink()) . '">' . $time_string . '</a></li>';


            echo '<li><i class="icon-user"></i><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></li>';
        }
    }
endif;

if (!function_exists('moderna_tag_comment')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function moderna_tag_comment()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */

            /*            $categories_list = get_the_category_list(esc_html__(', ', 'moderna'));
                        if ($categories_list && moderna_categorized_blog()) {
                            printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'moderna') . '</span>', $categories_list); // WPCS: XSS OK.
                        }*/

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('','<div style="float: left;">,&nbsp;</div>');

                printf('<li><i class="icon-folder-open"></i>' . esc_html__('%1$s', 'moderna') . '</li>', $tags_list); // WPCS: XSS OK.
            }


        /*        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
                    echo '<span class="comments-link">';
                    comments_popup_link(esc_html__('Leave a comment', 'moderna'), esc_html__('1 Comment', 'moderna'), esc_html__('% Comments', 'moderna'));
                    echo '</span>';
                }

                edit_post_link(
                    sprintf(
                    // translators: %s: Name of current post
                        esc_html__('Edit %s', 'moderna'),
                        the_title('<span class="screen-reader-text">"', '"</span>', false)
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );*/
    }
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function moderna_categorized_blog()
{
    if (false === ($all_the_cool_cats = get_transient('moderna_categories'))) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories(array(
            'fields' => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number' => 2,
        ));

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count($all_the_cool_cats);

        set_transient('moderna_categories', $all_the_cool_cats);
    }

    if ($all_the_cool_cats > 1) {
        // This blog has more than 1 category so moderna_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so moderna_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in moderna_categorized_blog.
 */
function moderna_category_transient_flusher()
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient('moderna_categories');
}

add_action('edit_category', 'moderna_category_transient_flusher');
add_action('save_post', 'moderna_category_transient_flusher');
