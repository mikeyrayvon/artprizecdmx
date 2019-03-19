<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
get_template_part('partials/globie');
get_template_part('partials/seo');
?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">

<?php if (is_singular() && pings_open(get_queried_object())) { ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php } ?>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

<section id="main-container">
  <div id="language-switch" class="font-size-small">
    <?php
      $lang = qtranxf_getLanguage() === 'en' ? 'es' : 'en';
      echo '<a href="?lang=' . $lang . '" hreflang="' . $lang . '">';
      _e('[:en]Leer en español[:es]Read in English[:]');
      echo '</a>';
    ?>
  </div>

  <header id="header">
    <h1 class="u-visuallyhidden">ArtprizeCDMX 2019</h1>
    <div id="logo-holder">
      <?php get_template_part('partials/artprizecdmx-logo.svg'); ?>
    </div>
  </header>

  <nav id="nav">
    <div class="grid-row font-size-small">
      <div class="grid-item no-gutter">
        <a class="nav-item" data-id="prize"><?php _e('[:en]Prize[:es]Premio[:]'); ?></a>
      </div>
      <div class="grid-item no-gutter">
        <a class="nav-item" data-id="judges"><?php _e('[:en]Jury[:es]Jurado[:]'); ?></a>
      </div>
      <div class="grid-item no-gutter">
        <a class="nav-item" data-id="apply"><?php _e('[:en]Apply[:es]Aplicar[:]'); ?></a>
      </div>
      <div class="grid-item no-gutter">
        <a class="nav-item" data-id="dates"><?php _e('[:en]Dates[:es]Fechas[:]'); ?></a>
      </div>
      <div class="grid-item no-gutter">
        <a class="nav-item" data-id="contact"><?php _e('[:en]Contact[:es]Contacto[:]'); ?></a>
      </div>
    </div>
  </nav>
