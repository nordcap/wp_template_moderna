<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package moderna
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>Moderna - Bootstrap 3 flat corporate template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content="http://alebu.ru"/>


    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body>
<div id="wrapper">
    <!-- start header -->
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php
                        $nameBlog = get_bloginfo('name');
                        echo substr_replace($nameBlog, '<span>' . substr($nameBlog, 0, 1) . '</span>', 0, 1);
                        ?></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <?php
                    $menu = wp_nav_menu(
                        array(
                            'theme_location' => 'primary_menu', //Идентификатор расположение меню в шаблоне.
                            'menu' => '',//Меню которое нужно вывести. Соответствие: id, слаг или название меню.
                            'container' => false,//Чем оборачивать ul тег. Допустимо: div или nav или false.
                            'container_class' => '',//Значение атрибута class у контейнера меню.
                            'container_id' => '',//Значение атрибута id у контейнера меню.
                            'menu_class' => 'nav navbar-nav',//Значение атрибута class у тега ul.
                            'menu_id' => '',//Значение атрибута id у тега ul.
                            'echo' => false, //Выводить на экран (true) или возвратить для обработки (false).
                            'fallback_cb' => '__return_empty_string',//Функция для обработки вывода, если никакое меню не найдено.
                            'before' => '',//Текст перед тегом <a> в меню.
                            'after' => '',//Текст после каждого тега </a> в меню.
                            'link_before' => '',//Текст перед анкором каждой ссылки в меню.
                            'link_after' => '',//Текст после анкора каждой ссылки в меню.
                            'items_wrap' => '<ul class="%2$s">%3$s</ul>',//Нужно ли оборачивать элементы в тег ul. Если нужно, указывается шаблон обертки.
                            'depth' => 0,//Сколько уровень вложенных друг в друга ссылок показывать. 0 - все уровни.
                            'walker' => '',//Объект, который будет использоваться для построения меню. (нужно указывать объект, а не строку)
                        ));

                    $menu = str_replace('class="sub-menu"', 'class="dropdown-menu"', $menu);
                    echo $menu;
                    ?>


                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
