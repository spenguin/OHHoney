<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Syne:wght@400..800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo site_url(); ?>/style.css">
        <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
        <?php wp_head(); ?>
    </head>
    <style>
        .woocommerce-breadcrumb {
            display: none;
        }
    </style>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div id="wrapper" class="hfeed">
            <header id="header" role="banner">
                <?php get_template_part( 'template-parts/header-content' ); ?>
                <?php get_template_part( 'template-parts/header-navigation' ); ?>
                <?php get_template_part( 'template-parts/header-social-media' ); ?>
            </header>
            <div id="container" class="container">
                <!-- <main id="content" role="main"> -->