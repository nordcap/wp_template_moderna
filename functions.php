<?php
/**
 * moderna functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package moderna
 */

if (!function_exists('moderna_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function moderna_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on moderna, use a find and replace
         * to change 'moderna' to the name of your theme in all the template files.
         */
        load_theme_textdomain('moderna', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');


        // This theme uses wp_nav_menu() in one location.
//	TODO: доработать меню, включить больше опций
        register_nav_menus(array(
            'primary_menu' => esc_html__('Primary', 'moderna'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'image',
            'gallery',
            'video',
            'quote',


        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('moderna_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }
endif;
add_action('after_setup_theme', 'moderna_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
//TODO: непонятно откуда задаются размеры контента
function moderna_content_width()
{
    $GLOBALS['content_width'] = apply_filters('moderna_content_width', 640);
}

add_action('after_setup_theme', 'moderna_content_width', 0);




/**
* Сделаем миниатюру ссылкой на пост
 */
function my_post_image_html($html, $post_id, $post_image_id )
{

    $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
    return $html;

}
add_filter('post_thumbnail_html', 'my_post_image_html', 10, 3);



/**
 * Регистрация нового типа - преимущества
 */
function new_type_plus()
{
    $args = array(
        //'label'  => null,
        'labels' => array(
            'name' => 'Преимущества', // основное название для типа записи
            'singular_name' => 'Преимущество', // название для одной записи этого типа
            'all_items' => 'Все преимущества', //названия для всех записей этого вида
            'add_new' => 'Добавить преимущество', // для добавления новой записи
            'add_new_item' => 'Добавить новое преимущество', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактировать преимущество', // для редактирования типа записи
            'new_item' => 'Новое преимущество', // текст новой записи
            'view_item' => 'Просмотр преимуществ', // для просмотра записи этого типа.
            'search_items' => 'Искать преимущества', // для поиска по этим типам записи
            'not_found' => 'Преимуществ не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => '', // если не было найдено в корзине
            'parent_item_colon' => '', // для родительских типов. для древовидных типов
            'menu_name' => 'Преимущества', // название меню
        ),
        'description' => 'Преимущества использования',
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => null,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-awards',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical' => false,
        'supports' => array('title', 'excerpt'),
        'taxonomies' => array(),
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
        'show_in_nav_menus' => true,
    );
    register_post_type('post_plus', $args);
}

add_action('init', 'new_type_plus');


/**
 * Регистрация нового типа - портфолио
 */

function new_type_portfolio()
{
    $args = array(
        //'label'  => null,
        'labels' => array(
            'name' => 'Портфолио', // основное название для типа записи
            'singular_name' => 'Работа', // название для одной записи этого типа
            'all_items' => 'Все работы', //названия для всех записей этого вида
            'add_new' => 'Добавить работу', // для добавления новой записи
            'add_new_item' => 'Добавить новую работу', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактировать работу', // для редактирования типа записи
            'new_item' => 'Новая работа', // текст новой записи
            'view_item' => 'Просмотр работы', // для просмотра записи этого типа.
            'search_items' => 'Искать работу', // для поиска по этим типам записи
            'not_found' => 'Работа не найдена', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => '', // если не было найдено в корзине
            'parent_item_colon' => '', // для родительских типов. для древовидных типов
            'menu_name' => 'Портфолио', // название меню
        ),
        'description' => 'Работы для портфолио',
        'public' => true,
        'publicly_queryable' => null,
        'exclude_from_search' => null,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-desktop',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical' => false,
        'supports' => array('title', 'excerpt'),
        'taxonomies' => array(),
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
        'show_in_nav_menus' => true,
    );
    register_post_type('post_portfolio', $args);
}

add_action('init', 'new_type_portfolio');


/**
 * Регистрация нового типа - контакты
 */

function new_type_contacts()
{
    $args = array(
        //'label'  => null,
        'labels' => array(
            'name' => 'Контакты', // основное название для типа записи
            'singular_name' => 'Контакт', // название для одной записи этого типа
            'all_items' => 'Все контакты', //названия для всех записей этого вида
            'add_new' => 'Добавить контакт', // для добавления новой записи
            'add_new_item' => 'Добавить новый контакт', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактировать контакт', // для редактирования типа записи
            'new_item' => 'Новый контакт', // текст новой записи
            'view_item' => 'Просмотр контакта', // для просмотра записи этого типа.
            'search_items' => 'Искать контакт', // для поиска по этим типам записи
            'not_found' => 'Контактов не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => '', // если не было найдено в корзине
            'parent_item_colon' => '', // для родительских типов. для древовидных типов
            'menu_name' => 'Контакты', // название меню
        ),
        'description' => 'Мои Контакты',
        'public' => true,
        'publicly_queryable' => null,
        'exclude_from_search' => null,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-twitter',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical' => false,
        'supports' => array('title'),
        'taxonomies' => array(),
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
        'show_in_nav_menus' => true,
    );
    register_post_type('post_contacts', $args);
}

add_action('init', 'new_type_contacts');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function moderna_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Search', 'moderna'),
        'id' => 'sidebar-search',
        'description' => 'В пустом виджете размещается поиск по сайту',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar Categories', 'moderna'),
        'id' => 'sidebar-categories',
        'description' => 'В пустом виджете размещается список категорий',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgetheading">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar Latest', 'moderna'),
        'id' => 'right-sidebar-latest',
        'description' => 'В пустом виджете размещаются последние посты с миниатюрами',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgetheading">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar Tags', 'moderna'),
        'id' => 'sidebar-tags',
        'description' => 'В пустом виджете размещаются популярные теги',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgetheading">',
        'after_title' => '</h5>',
    ));
//	TODO: обнаружен любопытный баг. Если id виджета будет вида "Название-Буква" то виджет обнуляется при перезагрузке страницы.
    register_sidebar(array(
        'name' => esc_html__('Sidebar Address', 'moderna'),
        'id' => "footer-sidebar-address",
        'description' => 'Виджет в котором размещается адрес',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgetheading">',
        'after_title' => '</h5>',

    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar Pages', 'moderna'),
        'id' => "footer-sidebar-pages",
        'description' => 'Виджет в котором размещатся отдельные страницы',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgetheading">',
        'after_title' => '</h5>',

    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar Latest Posts', 'moderna'),
        'id' => "footer-sidebar-latest",
        'description' => 'В пустом виджете по умолчанию размещаются последние посты.',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgetheading">',
        'after_title' => '</h5>',

    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar Photo', 'moderna'),
        'id' => "footer-sidebar-photo",
        'description' => 'В пустом виджете по умолчанию выводятся изображения из www.flickr.com',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgetheading">',
        'after_title' => '</h5>',

    ));

    register_sidebar(array(
        'name' => esc_html__('Sidebar Copyright', 'moderna'),
        'id' => "footer-sidebar-copyright",
        'description' => 'В пустом виджете по умолчанию выводится copyright',
        'before_widget' => '<div class="copyright">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgetheading">',
        'after_title' => '</h5>',

    ));

}

add_action('widgets_init', 'moderna_widgets_init');


/**
 * Роутинг
 */
function route($template)
{
    if (is_page('contact')) {
        if ($new_template = locate_template(array('contact.php'))) {
            return $new_template;
        }
    }





    return $template;
}

add_filter('template_include', 'route');


function replace_css_menu($items)
{
    function hasSub($id_item, $items)
    {
        foreach ($items as $item) {
            if ($item->menu_item_parent && $item->menu_item_parent == $id_item) {
                return true;
            }
        }
        return false;
    }

    foreach ($items as $item) {
        if (hasSub($item->ID, $items)) {
            $item->classes[] = "dropdown";
        }
    }

    return $items;

}

add_filter('wp_nav_menu_objects', 'replace_css_menu');


/**
 * Enqueue scripts and styles.
 */
function moderna_scripts()
{
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('fancybox-style', get_template_directory_uri() . '/css/fancybox/jquery.fancybox.css');
    wp_enqueue_style('slider-style', get_template_directory_uri() . '/css/flexslider.css');
    wp_enqueue_style('moderna-style', get_template_directory_uri() . '/css/style.css');

    //Theme skin
    wp_enqueue_style('skins-style', get_template_directory_uri() . '/skins/default.css');


    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', array(), '20150115', true);
    wp_enqueue_script('jquery.easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '20150115', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20150115', true);
    wp_enqueue_script('fancybox.pack', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array(), '20150115', true);
    wp_enqueue_script('fancybox-media', get_template_directory_uri() . '/js/jquery.fancybox-media.js', array(), '20150115', true);
    wp_enqueue_script('prettify', get_template_directory_uri() . '/js/google-code-prettify/prettify.js', array(), '20150115', true);
    wp_enqueue_script('quicksand', get_template_directory_uri() . '/js/portfolio/jquery.quicksand.js', array(), '20150115', true);
    wp_enqueue_script('setting', get_template_directory_uri() . '/js/portfolio/setting.js', array(), '20150115', true);
    wp_enqueue_script('slider', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '20150115', true);
    wp_enqueue_script('animate', get_template_directory_uri() . '/js/animate.js', array(), '20150115', true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array(), '20150115', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '20150115', true);


    /*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }*/
}

add_action('wp_enqueue_scripts', 'moderna_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
//т.к. мы убрали из body классы, то данный файл не нужен
//require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//не совсем понятен следующий файл - поддержка postMessage что за хрен?
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//для статистики
//require get_template_directory() . '/inc/jetpack.php';
