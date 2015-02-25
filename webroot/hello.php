<?php 
/**
 * This is a Erwin pagecontroller.
 *
 */
// Include the essential config-file which also creates the $erwin variable with its defaults.
include(__DIR__.'/config.php'); 
 
 
// Do it and store it all in variables in the Erwin container.
$erwin['title'] = "Hello World";
 
$erwin['header'] = <<<EOD
<img class='sitelogo' src='img/erwin.png' alt='Erwin Logo' style="height:100px;"/>
<span class='sitetitle'>Erwin webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;
 
$erwin['main'] = <<<EOD
<h1>Hej Världen</h1>
<p>Detta är en exempelsida som visar hur Erwin ser ut och fungerar.</p>
EOD;
 
$erwin['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Mikael Roos (me@mikaelroos.se) | <a href='https://github.com/mosbth/Erwin-base'>Erwin på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;
 
 
// Finally, leave it all to the rendering phase of Erwin.
include(ERWIN_THEME_PATH);