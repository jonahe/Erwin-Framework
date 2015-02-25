<?php 
/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential config-file which also creates the $erwin variable with its defaults.
include(__DIR__.'/config.php'); 
 
 
// Do it and store it all in variables in the Anax container.
$erwin['title'] = "404";
$erwin['header'] = "";
$erwin['main'] = "This is a ERWIN 404. Document is not here.";
$erwin['footer'] = "";
 
// Send the 404 header 
header("HTTP/1.0 404 Not Found");
 
 
// Finally, leave it all to the rendering phase of Anax.
include(ERWIN_THEME_PATH);