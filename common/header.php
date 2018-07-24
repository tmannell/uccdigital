<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
        <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!-- Will build the page <title> -->
    <?php
        if (isset($title)) { $titleParts[] = strip_formatting($title); }
        $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Need to add custom and third-party CSS files? Include them here -->
    <link rel="stylesheet" media="all" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?php
        queue_css_file('style');
        echo head_css();
    ?>

    <!-- Need more JavaScript files? Include them here -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
        queue_js_file('globals');
        echo head_js();
    ?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header role="banner">
        <nav class="navbar navbar-default top-nav">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a id="top-ln-1" href="/about">About Us</a></li>
                    <li><a id="top-ln-2" href="/contact">Contact Us</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            <div id="logo-title" class="row">
                <div class="col-sm-3 logo">
                    <a href="/" title="Home"><img class="image" src="/themes/uccdigital/images/cropped-Logo-e1519826732401.png" alt="United Church Archives Logo"/></a>
                </div>
                <div class="col-sm-9 bottom-align-text text-right">
                    <h1 class="site-title pull-right"><a href="/">Digital Collections</a></h1>
                </div>
            </div>


        </div>

        <nav class="navbar navbar-default" role="navigation">
            <div class="container navbar-container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-navigation">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="primary-navigation">
                    <?php echo public_nav_main_bootstrap(); ?>

                    <form class="navbar-form navbar-right" role="search" action="<?php echo public_url(''); ?>search">
                        <?php echo search_form(array('show_advanced' => false)); ?>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main id="content" role="main">
      <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
