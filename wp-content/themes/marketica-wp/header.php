<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="site-container sb-site-container">

        <?php get_template_part( 'block', 'header' ); ?>

        <?php do_action( 'tokopress_before_wrapper' ); ?>

        <div class="container-wrap">
        <div id="content">
