<?php
/**
 * Config-file for Erwin. Change settings here to affect installation.
 *
 */
 
/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
 
 
/**
 * Define Erwin paths.
 *
 */
define('ERWIN_INSTALL_PATH', __DIR__ . '/..');
define('ERWIN_THEME_PATH', ERWIN_INSTALL_PATH . '/theme/render.php');
 
 
/**
 * Include bootstrapping functions.
 *
 */
include(ERWIN_INSTALL_PATH . '/src/bootstrap.php');
 
 
/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();
 
 
/**
 * Create the Erwin variable.
 *
 */
$erwin = array();
 
 
/**
 * Site wide settings.
 * title_append läggs till efter den sidspecifika titeln
 */
$erwin['lang']         = 'sv';
$erwin['title_append'] = ' | Erwin en webbtemplate';


/**
 * Theme related settings.
 *
 */
$erwin['stylesheets'] = array('css/style.css');
$erwin['favicon']    = 'favicon.ico';

/**
 * Nav-menu content.
 *
 */

$menu = array(
  'callback' => 'modifyNavbar',
  'items' => array(
    'me.php'  => array('text'=>'Me',  'url'=>'me.php', 'class'=>null),
    'dice.php'  => array('text'=>'Dice',  'url'=>'dice.php', 'class'=>null),
    'slideshow.php' => array('text'=>'Slides', 'url'=>'slideshow.php', 'class'=>null),
    'source.php' => array('text'=>'Källkod', 'url'=>'source.php', 'class'=>null),
  ),
);

/**
 * Settings for JavaScript.
 *
 */
$erwin['modernizr'] = 'js/modernizr.js';
$erwin['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
//$erwin['jquery'] = null; // To disable jQuery
$erwin['javascript_include'] = array();
//$erwin['javascript_include'] = array('js/main.js'); // To add extra javascript files

/**
 * Google analytics.
 *
 */
$erwin['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics